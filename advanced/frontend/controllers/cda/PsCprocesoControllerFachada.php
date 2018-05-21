<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\PsCproceso;
use common\models\cda\PsCprocesoSearch;
use common\models\cda\PsEstadoProceso;
use common\models\autenticacion\UsuariosAp;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

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
                $searchModel = new PsCprocesoSearch();
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
            }
            
            
    /**
     * Listado todos los datos del modelo PsCproceso que se encuentran en el tablename.
     * @return mixed
     * 1-> procesos cda
     * 2-> procesos pqrs
     */
    public function actionIndex_gestor($queryParams,$tipo)
    {
                $searchModel = new PsCprocesoSearch();
                //$searchModel ->setScenario('pscprocesoarca');
                
                $queryParams['PsCprocesoSearch']['ult_id_usuario'] = Yii::$app->user->identity->id_usuario;
                $searchModel->not_estado = 6;
                $searchModel->numnotempty = 1;
                $searchModel->tipo=$tipo;
             
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
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
}