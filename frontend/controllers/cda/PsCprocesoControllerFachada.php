<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\PsCproceso;
use common\models\cda\PsCprocesoSearch;
use common\models\cda\PsEstadoProceso;
use common\models\autenticacion\UsuariosAp;
use common\controllers\controllerspry\FachadaPry;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\data\SqlDataProvider;

/**
 * PsCprocesoControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo PsCproceso.
 */
class PsCprocesoControllerFachada extends FachadaPry
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
	
	/**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....*/
	
	public function actionProgress($urlroute=null,$id=null){
		
	
            $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>"; 
            $progressbar = $progressbar . "<div style='text-align:center'>Guardando</div>";
            $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo PsCproceso que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
        
//        if(!is_null($gestor)){
//            $queryParams['PsCprocesoSearch']['ult_id_usuario'] = Yii::$app->user->identity->Id;
//        }
        
        $searchModel = new PsCprocesoSearch();
        $dataProvider = $searchModel->search($queryParams);

        return [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ];
   }
            
            
    /**
    Modificado Diana B: 2019-02-25
     */
    public function actionIndex_gestor()
    {        
        
//        $query1= PsCproceso::find()
//                 ->select(['ps_cproceso.id_cproceso,"Tramite" as tipo, cda_solicitud.num_solicitud,cda_tramite.num_tramite,
//                            cda_tramite.])
        $query= "SELECT
                    ps_cproceso.id_cproceso,
                    'Tramite' AS tipo,
                    cda_solicitud.num_solicitud,
                    cda_tramite.num_tramite,
                    cda_tramite.cod_solicitud_tecnico,
                    ps_actividad.id_actividad,
                    ps_actividad.nom_actividad,
                    ult_fecha_actividad as fecha,
                    id_cda_tramite as idinicial
            FROM
                    ps_cproceso
                    LEFT JOIN cda_tramite ON cda_tramite.id_cproceso = ps_cproceso.id_cproceso
                    LEFT JOIN cda_solicitud ON cda_tramite.id_cda_solicitud = cda_solicitud.id_cda_solicitud 
                    LEFT JOIN ps_actividad ON ps_actividad.id_actividad = ps_cproceso.ult_id_actividad	
            WHERE
                    ps_cproceso.ult_id_usuario = :usuario
                    AND ps_cproceso.id_proceso = '3' UNION
            SELECT
                    ps_cproceso.id_cproceso,
                    'Solicitud' AS tipo,
                    cda_solicitud.num_solicitud, 
                   null as num_tramite,
                    null as cod_solicitud_tecnico,
                    ps_actividad.id_actividad,
                    ps_actividad.nom_actividad,
                    ult_fecha_actividad as fecha,
                    id_cda_solicitud as idinicial
            FROM
                    ps_cproceso
                    LEFT JOIN cda_solicitud ON cda_solicitud.id_cproceso_arca = ps_cproceso.id_cproceso
              LEFT JOIN ps_actividad ON ps_actividad.id_actividad = ps_cproceso.ult_id_actividad	
            WHERE
                    ps_cproceso.ult_id_usuario = :usuario 
                    AND ps_cproceso.id_proceso = '1' ORDER BY cod_solicitud_tecnico ASC";
        
        $exec_query = Yii::$app->db->createCommand($query, [':usuario' => Yii::$app->user->identity->Id])->queryAll();
        
        $count=count($exec_query);
        

         
        $provider = new SqlDataProvider([
            'sql' => $query,
            'params' => [':usuario' => Yii::$app->user->identity->Id],
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => [
                    'id_cproceso',
                    'tipo',
                    'num_solicitud',
                    'num_tramite',
                    'cod_solicitud_tecnico',
                    'id_actividad',
                    'nom_actividad',
                    'fecha',
                    'idinicial'
                ],
            ],
        ]);
        

        return [
            'dataProvider' => $provider
        ];
    }

    
    /*+
     * Se modifica para el gestor de pqrs, se separa de cda
     * Fecha: 20181013
     */
    public function actionIndex_gestorpqrs(){
        
        
        $count = Yii::$app->db->createCommand('SELECT count(*) '
                                . 'FROM ps_cactividad_proceso '
                                . 'LEFT JOIN ps_cproceso ON ps_cproceso.id_cproceso=ps_cactividad_proceso.id_cproceso and ps_cproceso.ult_id_actividad=ps_cactividad_proceso.id_actividad '
                                . 'LEFT JOIN pqrs ON pqrs.id_cproceso=ps_cproceso.id_cproceso   '
                                . 'LEFT JOIN ps_actividad ON ps_actividad.id_actividad=ps_cactividad_proceso.id_actividad '
                                . 'JOIN ( '
                                . ' SELECT max(ps_cactividad_proceso.id_cactividad_proceso) as maxids FROM ps_cactividad_proceso
								GROUP BY id_cproceso '
                                . ') AS maximos ON maximos.maxids = ps_cactividad_proceso.id_cactividad_proceso '
                                . ' WHERE (NOT (ps_cproceso.ult_id_eproceso=6)) AND (NOT (ps_cproceso.numero IS NULL)) AND (ps_cactividad_proceso.id_usuario='.Yii::$app->user->identity->id_usuario.')')->queryScalar();
        
                                
        $_sql = 'SELECT ps_cproceso.numero, ps_actividad.nom_actividad, ps_actividad.subpantalla, pqrs.id_pqrs, ps_cactividad_proceso.id_cactividad_proceso, ps_cproceso.id_cproceso, ps_actividad.id_actividad '
                                . 'FROM ps_cactividad_proceso '
                                . 'LEFT JOIN ps_cproceso ON ps_cproceso.id_cproceso=ps_cactividad_proceso.id_cproceso and ps_cproceso.ult_id_actividad=ps_cactividad_proceso.id_actividad '
                                . 'LEFT JOIN pqrs ON pqrs.id_cproceso=ps_cproceso.id_cproceso   '
                                . 'LEFT JOIN ps_actividad ON ps_actividad.id_actividad=ps_cactividad_proceso.id_actividad '
                                . 'JOIN ( '
                                . ' SELECT max(ps_cactividad_proceso.id_cactividad_proceso) as maxids FROM ps_cactividad_proceso
								GROUP BY id_cproceso '
                                . ') AS maximos ON maximos.maxids = ps_cactividad_proceso.id_cactividad_proceso '
                                . ' WHERE (NOT (ps_cproceso.ult_id_eproceso=6)) AND (NOT (ps_cproceso.numero IS NULL)) AND (ps_cactividad_proceso.id_usuario='.Yii::$app->user->identity->id_usuario.')';
        
        $provider = new SqlDataProvider([
                    'sql' => $_sql,
                    'totalCount' => $count,
                    'pagination' => [
                        'pageSize' => 10,
                    ],
            'sort' => [
                        'attributes' => [
                            'nom_actividad',
                            'subpantalla',
                            'id_pqrs',
                            'id_cactividad_proceso','numero'
                        ],
                    ],
                ]);

        

        return [
                    'dataProvider' => $provider
                ];
    }
    
    
    
    
    /**
     * Presenta un dato unico en el modelo PsCproceso.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo PsCproceso .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax)
    {
        $model = new PsCproceso();

        if ($model->load($request) && $model->save()) {
			
                return [
                    'model' => $model,
                    'create' => 'True'
                ];	

        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'create' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                    'create' => 'False'
                ];

        }
    }

    /**
     * Modifica un dato existente en el modelo PsCproceso.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$request,$isAjax)
    {
        $model = $this->findModel($id);
        
        if ($model->load($request) && $model->save()) {
			
			
			return [
                            'model' => $model,
                            'update' => 'True'
                        ];
        } 
         elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'update' => 'Ajax'
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'update' => 'False'
                        ];
        }
    }
    
    
    /**
     * Modifica un dato existente en el modelo PsCproceso.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatedetproceso($id,$request,$isAjax)
    {
        $model = $this->findModel($id);
        $model ->setScenario('pscprocesoarca');
        
        //Asignando datos en la tabla PS_ESTADO_PROCESO===================================================================
        $_estados = $this->findEstados();
        
        //Asignando listado en la tabla PS_USUARIOSAP=====================================================================
        $_usuarios = $this->findUsuarios();
        
        if ($model->load($request) && $model->save()) {
			
			
			return [
                            'model' => $model,
                            'update' => 'True'
                            
                        ];
        } 
         elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'update' => 'Ajax',
                    'ult_eproceso' => $_estados,
                    'ult_usuario' => $_usuarios,
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'update' => 'False',
                            'ult_eproceso' => $_estados,
                            'ult_usuario' => $_usuarios,
                        ];
        }
    }

    /**
     * Deletes an existing PsCproceso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de PsCproceso basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return PsCproceso el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = PsCproceso::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  PsCproceso     */
    protected function findModelByParams($params)
    {
        if (($model = PsCproceso::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo PsCproceso     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type PsCproceso     */
     public function cargaPsCproceso($params){
        return $this->findModelByParams($params);
    }
    
    
    /*Entregando Listado de estados de la tabla PS_ESTADO_PROCESO*/
     public function findEstados()
    {
        $estados = PsEstadoProceso::find()->all();
                
        return $estados;               
    }
    
    
     /*Entrega listado de tecnicos*/
    protected function findUsuarios(){
        
        $list = UsuariosAp::find()
                -> leftJoin('perfiles', 'perfiles.id_usuario=usuarios_ap.id_usuario')
                ->where(['=', 'perfiles.cod_rol', '1'])
                ->all();
        
        
        return $list;
        
    }
    
     
    public function cargaPsCprocesoUsuario($id){
        $query = new \yii\db\Query;
         $query  ->select(['ps_cproceso.id_cproceso', 'ps_cproceso.ult_id_usuario','ps_cproceso.numero',
                            'usuarios_ap.nombres', 'usuarios_ap.email'])
                 ->from('ps_cproceso')
                 ->innerJoin('usuarios_ap', 'ps_cproceso.ult_id_usuario=usuarios_ap.id_usuario')
                 ->where('id_cproceso='.$id);
         $command = $query->createCommand();
         $data = $command->queryAll();
         return $data;
    }
}