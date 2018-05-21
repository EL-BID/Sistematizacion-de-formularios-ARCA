<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\PsResponsablesProceso;
use common\models\cda\PsResponsablesProcesoSearch;
use common\controllers\controllerspry\FachadaPry;
use common\models\autenticacion\UsuariosAp;
use common\models\cda\PsTipoResponsabilidad;
use common\models\cda\PsCproceso;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * PsResponsablesProcesoControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo PsResponsablesProceso.
 */
class PsResponsablesProcesoControllerFachada extends FachadaPry
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
     * Listado todos los datos del modelo PsResponsablesProceso que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                $searchModel = new PsResponsablesProcesoSearch();
                
                //Agregando Filtro fijo para el modulo ersponsable proceso de detalle proceso================================
                if(!empty($queryParams['id_cproceso'])){
                    $searchModel->id_cproceso = $queryParams['id_cproceso'];
                }
                
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
   }

    /**
     * Presenta un dato unico en el modelo PsResponsablesProceso.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo PsResponsablesProceso .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax)
    {
        $model = new PsResponsablesProceso();

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
     * Crea un nuevo dato sobre el modelo PsResponsablesProceso .
     * Para el modulo de detalle proceso de cda
     * @return mixed
     */
    public function actionCreatedetproceso($request,$isAjax,$id_cproceso,$id_cda)
    {
        $fechaactual = date(Yii::$app->fmtfechaphp);
        
        $model = new PsResponsablesProceso();
        $model->id_cproceso = $id_cproceso;
        $model->fecha = $fechaactual;
        
        $tecnicos = $this->actionUsuarios('1');
        $tipos_responsabilidad = $this->actionResponsabilidades();

        if ($model->load($request) && $model->save()) {
		
            
                //Actualizando Dato en la tabla ps_cproceso=========================================//
                $model2 = PsCproceso::findOne(['id_cproceso'=>$id_cproceso]);
                $model2->ult_id_usuario = $model->id_usuario;
                
                if($model2->save()){
                    return [
                        'model' => $model,
                        'create' => 'True','id_cda'=>$id_cda
                    ];
                }else{
                    
                    throw new NotFoundHttpException('No se pudo guardar usuario responsable');
                }
            
                	

        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'create' => 'Ajax','id_cda'=>$id_cda, 'tecnicos' => $tecnicos,'tipos_responsabilidad'=>$tipos_responsabilidad
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                    'create' => 'False','id_cda'=>$id_cda, 'tecnicos' => $tecnicos, 'tipos_responsabilidad'=>$tipos_responsabilidad
                ];

        }
    }
    

    /**
     * Modifica un dato existente en el modelo PsResponsablesProceso.
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
     * Deletes an existing PsResponsablesProceso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de PsResponsablesProceso basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return PsResponsablesProceso el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = PsResponsablesProceso::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  PsResponsablesProceso     */
    protected function findModelByParams($params)
    {
        if (($model = PsResponsablesProceso::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo PsResponsablesProceso     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type PsResponsablesProceso     */
     public function cargaPsResponsablesProceso($params){
        return $this->findModelByParams($params);
    }
    
    
        
    /**
     * Finds the Cda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public  function findResponsable($params)
    {
        if (($model = $this->findModelByParams($params)) !== null) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    protected function actionUsuarios($cod_rol){
        
        $list = UsuariosAp::find()
                -> leftJoin('perfiles', 'perfiles.id_usuario=usuarios_ap.id_usuario')
                ->where(['=', 'perfiles.cod_rol', '1'])
                ->all();
        
        
        return $list;
        
    }
    
    
     protected function actionResponsabilidades($id_tiporesponsabilidad=null){
        
        if($id_tiporesponsabilidad == null){
            $list = PsTipoResponsabilidad::find()
                ->all();
        }
        
        
        return $list;
        
    }
    
    public function getResponsables($ps_cproceso,$id_usuario){
        return PsResponsablesProceso::find()
        ->where(['id_cproceso'=>$ps_cproceso,'id_usuario'=>$id_usuario])
                ->with('idUsuario')
                ->with('idTresponsabilidad')
                ->orderBy(['fecha'=> SORT_DESC])
                ->one();
    }
    

}