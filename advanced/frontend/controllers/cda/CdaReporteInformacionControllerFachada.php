<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\CdaReporteInformacion;
use common\models\cda\CdaReporteInformacionSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdaReporteInformacionControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo CdaReporteInformacion.
 */
class CdaReporteInformacionControllerFachada extends FachadaPry
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
	
	public function actionProgress($urlroute=null,$id_cda=null,$id_cactividad_proceso=null,$id=null){
		
	
            $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>"; 
            $progressbar = $progressbar . "<div style='text-align:center'>Guardando</div>";
            
            if(!is_null($id_cda) and !is_null($id_cactividad_proceso)){
                $_ruta = Url::toRoute([$urlroute, 'id_cda' => $id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso]);
            }else{
                $_ruta = Url::toRoute([$urlroute, 'id' => $id]);
            }
            
            $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".$_ruta."'>";
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo CdaReporteInformacion que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                $searchModel = new CdaReporteInformacionSearch();
                $dataProvider = $searchModel->search($queryParams);
           
                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
    }
    
    
    public function actionIndexDatosTecnicos($queryParams,$id_cda,$id_cactividad_proceso)
    {
                $searchModel = new CdaReporteInformacionSearch();
                $queryParams['CdaReporteInformacionSearch']['id_cda'] = $id_cda;
                $queryParams['CdaReporteInformacionSearch']['id_cactividad_proceso'] = $id_cactividad_proceso;
                $dataProvider = $searchModel->search($queryParams,'datos');

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
    }
    
    public function actionIndexInformacionSenagua($queryParams,$id_cda,$id_cactividad_proceso)
    {
                $searchModel = new CdaReporteInformacionSearch();
                $queryParams['CdaReporteInformacionSearch']['id_cda'] = $id_cda;
                $queryParams['CdaReporteInformacionSearch']['id_cactividad_proceso'] = $id_cactividad_proceso;
                $dataProvider = $searchModel->search($queryParams,'senagua');

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
    }
    
    public function actionIndexInformacionEpa($queryParams,$id_cda,$id_cactividad_proceso)
    {
                $searchModel = new CdaReporteInformacionSearch();
                $queryParams['CdaReporteInformacionSearch']['id_cda'] = $id_cda;
                $queryParams['CdaReporteInformacionSearch']['id_cactividad_proceso'] = $id_cactividad_proceso;
                $dataProvider = $searchModel->search($queryParams,'epa');

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
    }
    
    public function actionIndexVisitaTecnica($queryParams,$id_cda,$id_cactividad_proceso)
    {
                $searchModel = new CdaReporteInformacionSearch();
                $queryParams['CdaReporteInformacionSearch']['id_cda'] = $id_cda;
                $queryParams['CdaReporteInformacionSearch']['id_cactividad_proceso'] = $id_cactividad_proceso;
                $dataProvider = $searchModel->search($queryParams,'visita');

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
    }
    
    public function actionIndexCoordenadas($queryParams,$id_cda,$id_cactividad_proceso,$id_reporte_informacion)
    {
                $searchModel = new CdaReporteInformacionSearch();
                $queryParams['CdaReporteInformacionSearch']['id_cda'] = $id_cda;
                $queryParams['CdaReporteInformacionSearch']['id_cactividad_proceso'] = $id_cactividad_proceso;
                $queryParams['CdaReporteInformacionSearch']['id_reporte_informacion'] = $id_reporte_informacion;
                $dataProvider = $searchModel->search($queryParams,'coordenadas');

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
    }


    /**
     * Presenta un dato unico en el modelo CdaReporteInformacion.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaReporteInformacion .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax)
    {
        $model = new CdaReporteInformacion();
        
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
     * Crea un nuevo dato sobre el modelo CdaReporteInformacion .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreateReporteInformacion($request,$isAjax,$id_cda,$id_cactividad_proceso)
    {
        
        $model = new CdaReporteInformacion();
        $modelUbicacion = New \common\models\poc\FdUbicacion();
        $modelCoordenada = new \common\models\poc\FdCoordenada();

        
        if ($model->load($request) && $modelUbicacion->load($request) && $modelCoordenada->load($request)) {
            $transaction = Yii::$app->db->beginTransaction();

            try  {
                    $model->id_actividad=8;
                    $model->id_cda = $id_cda;
                    $model->id_cactividad_proceso = $id_cactividad_proceso;
                    if($model->save()){
                        $modelCoordenada->id_tcoordenada=1;
                        $modelCoordenada->id_reporte_informacion=$model->id_reporte_informacion;
                        if($modelCoordenada->save(false)){
                          //  $model->id_ubicacion=$modelUbicacion->id_ubicacion;
                            $modelUbicacion->id_reporte_informacion=$model->id_reporte_informacion;
                          //  $model->id_coordenada=$modelCoordenada->id_coordenada;
                            if($modelUbicacion->save(false)){
                                $transaction->commit();
                            }else{
                                echo var_dump($modelCoordenada->getErrors());
                                $transaction->rollBack();
                            }
                            
                        }else{
                            echo var_dump($model->getErrors());
                            $transaction->rollBack();
                            
                        }
                    }else{
                         echo var_dump($modelUbicacion->getErrors());
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                    echo $e->message;
                }

                return [
                    'model' => $model,
                    'modelUbicacion' => $modelUbicacion,
                    'modelCoordenada' => $modelCoordenada,
                    'create' => 'True'
                ];	

        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'modelUbicacion' => $modelUbicacion,
                    'modelCoordenada' => $modelCoordenada,
                    'create' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                     'modelUbicacion' => $modelUbicacion,
                     'modelCoordenada' => $modelCoordenada,
                    'create' => 'False'
                ];

        }
    }
    
    
      /**
     * Crea un nuevo dato sobre el modelo CdaReporteInformacion .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreateVisitaTecnica($request,$isAjax,$id_cda,$id_cactividad_proceso)
    {
        
        $model = new CdaReporteInformacion();

        
        if ($model->load($request)) {
            $transaction = Yii::$app->db->beginTransaction();

            try  {
                    $model->id_actividad=9;
                    $model->id_cda = $id_cda;
                    $model->id_cactividad_proceso = $id_cactividad_proceso;
                    if($model->save(false)){

                            $transaction->commit();

                    }else{
                            echo var_dump($model->getErrors());
                            $transaction->rollBack();

                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                    echo $e->message;
                }

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
     * Crea un nuevo dato sobre el modelo CdaReporteInformacion .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreateInformacionSenagua($request,$isAjax,$id_cda,$id_cactividad_proceso)
    {
        
        $model = new CdaReporteInformacion();
        $modelCoordenada = new \common\models\poc\FdCoordenada();
        
        if ($model->load($request) && $modelCoordenada->load($request)) {
            $transaction = Yii::$app->db->beginTransaction();

            try  {      
                $model->id_actividad=12;
                $model->id_cda = $id_cda;
                $model->id_cactividad_proceso = $id_cactividad_proceso;        
                        if($model->save(false)){
                            
                            $modelCoordenada->id_tcoordenada=1;
                            $modelCoordenada->id_reporte_informacion=$model->id_reporte_informacion;
                            if($modelCoordenada->save(false)){
                                $transaction->commit();
                            }else{
                                echo var_dump($modelCoordenada->getErrors());
                                $transaction->rollBack();
                            }
                            
                        }else{
                            echo var_dump($model->getErrors());
                            $transaction->rollBack();
                            
                        }

                } catch (Exception $e) {
                    $transaction->rollBack();
                    echo $e->message;
                }

                return [
                    'model' => $model,
                    'modelCoordenada' => $modelCoordenada,
                    'create' => 'True'
                ];	

        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'modelCoordenada' => $modelCoordenada,
                    'create' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                     'modelCoordenada' => $modelCoordenada,
                    'create' => 'False'
                ];

        }
    }
    
    
    public function actionCreateInformacionEpa($request,$isAjax,$id_cda,$id_cactividad_proceso)
    {
        
        $model = new CdaReporteInformacion();
        $modelCoordenada = new \common\models\poc\FdCoordenada();
        
        if ($model->load($request) && $modelCoordenada->load($request)) {
            $transaction = Yii::$app->db->beginTransaction();

            try  {     
                    $model->id_actividad=13;
                    $model->id_cda = $id_cda;
                    $model->id_cactividad_proceso = $id_cactividad_proceso;    
                        if($model->save(false)){
                            $modelCoordenada->id_tcoordenada=1;
                            $modelCoordenada->id_reporte_informacion=$model->id_reporte_informacion;
                            if($modelCoordenada->save(false)){
                                $transaction->commit();
                            }else{
                                echo var_dump($modelCoordenada->getErrors());
                                $transaction->rollBack();
                            }
                            
                        }else{
                            echo var_dump($model->getErrors());
                            $transaction->rollBack();
                            
                        }

                } catch (Exception $e) {
                    $transaction->rollBack();
                    echo $e->message;
                }

                return [
                    'model' => $model,
                    'modelCoordenada' => $modelCoordenada,
                    'create' => 'True'
                ];	

        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'modelCoordenada' => $modelCoordenada,
                    'create' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                     'modelCoordenada' => $modelCoordenada,
                    'create' => 'False'
                ];

        }
    }
    
    public function actionCreateCoordenadas($request,$isAjax,$id_cda,$id_cactividad_proceso,$id_reporte_infromacion)
    {
        
        $model = new CdaReporteInformacion();
        $modelCoordenada = new \common\models\poc\FdCoordenada();
        
        if ($model->load($request) && $modelCoordenada->load($request)) {
            $transaction = Yii::$app->db->beginTransaction();

            try  {  
                    if ($id_reporte_infromacion==0){ 
                        
                        $model->id_actividad=9;
                        $model->id_cda = $id_cda;
                        $model->id_cactividad_proceso = $id_cactividad_proceso;  
                        
                        if($model->save(false)){
                            $modelCoordenada->id_tcoordenada=1;
                            $modelCoordenada->id_reporte_informacion=$model->id_reporte_informacion;
                            if($modelCoordenada->save(false)){
                                $transaction->commit();
                            }else{
                                echo var_dump($modelCoordenada->getErrors());
                                $transaction->rollBack();
                            } 
                        }else{
                            echo var_dump($model->getErrors());
                            $transaction->rollBack();   
                        } 
                    }else{
                            $modelCoordenada->id_tcoordenada=1;
                            $modelCoordenada->id_reporte_informacion=$id_reporte_infromacion;
                            if($modelCoordenada->save(false)){
                                $transaction->commit();
                            }else{
                                echo var_dump($modelCoordenada->getErrors());
                                $transaction->rollBack();
                            }
                    }
                   

                } catch (Exception $e) {
                    $transaction->rollBack();
                    echo $e->message;
                }

                return [
                    'model' => $model,
                    'modelCoordenada' => $modelCoordenada,
                    'create' => 'True'
                ];	

        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'modelCoordenada' => $modelCoordenada,
                    'create' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                     'modelCoordenada' => $modelCoordenada,
                    'create' => 'False'
                ];

        }
    }
    
    /**
     * Modifica un dato existente en el modelo CdaReporteInformacion.
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
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateReporteInformacion($id,$request,$isAjax)
    {
        $model = $this->findModel($id);
        $ubicacion = New \frontend\controllers\poc\FdUbicacionControllerFachada();
        $coordenada = new \frontend\controllers\poc\FdCoordenadaControllerFachada();
        
        $modelUbicacion=$ubicacion->cargaUbicacion(['id_reporte_informacion'=>$id]);
        $modelCoordenada=$coordenada->cargaCoordenada(['id_reporte_informacion'=>$id]);

        
        if ($model->load($request) && $modelUbicacion->load($request) && $modelCoordenada->load($request) && $model->save() && $modelUbicacion->save(false) && $modelCoordenada->save(false)) {
			
			return [
                            'model' => $model,
                            'modelUbicacion' => $modelUbicacion,
                            'modelCoordenada' => $modelCoordenada,
                            'update' => 'True'
                        ];
        } 
         elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'modelUbicacion' => $modelUbicacion,
                    'modelCoordenada' => $modelCoordenada,
                    'update' => 'Ajax'
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'modelUbicacion' => $modelUbicacion,
                            'modelCoordenada' => $modelCoordenada,
                            'update' => 'False'
                        ];
        }
    }
    
         /**
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
     public function actionUpdateVisitaTecnica($id,$request,$isAjax)
    {
        $model = $this->findModel($id);
        if ($model->load($request) && $model->save(false)) {
			
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
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateSenagua($id,$request,$isAjax)
    {
        $model = $this->findModel($id);
        $coordenada = new \frontend\controllers\poc\FdCoordenadaControllerFachada();
        $modelCoordenada=$coordenada->cargaCoordenada(['id_reporte_informacion'=>$id]);

        
        if ($model->load($request) && $modelCoordenada->load($request) && $model->save(false) && $modelCoordenada->save(false)) {
			
			return [
                            'model' => $model,
                            'modelCoordenada' => $modelCoordenada,
                            'update' => 'True'
                        ];
        } 
         elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'modelCoordenada' => $modelCoordenada,
                    'update' => 'Ajax'
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'modelCoordenada' => $modelCoordenada,
                            'update' => 'False'
                        ];
        }
    }
    
             /**
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateEpa($id,$request,$isAjax)
    {
        $model = $this->findModel($id);
        $coordenada = new \frontend\controllers\poc\FdCoordenadaControllerFachada();
        $modelCoordenada=$coordenada->cargaCoordenada(['id_reporte_informacion'=>$id]);

        
        if ($model->load($request) && $modelCoordenada->load($request) && $model->save(false) && $modelCoordenada->save(false)) {
			
			return [
                            'model' => $model,
                            'modelCoordenada' => $modelCoordenada,
                            'update' => 'True'
                        ];
        } 
         elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'modelCoordenada' => $modelCoordenada,
                    'update' => 'Ajax'
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'modelCoordenada' => $modelCoordenada,
                            'update' => 'False'
                        ];
        }
    }


             /**
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateCoordenadas($id,$request,$isAjax)
    {
        $model = $this->findModel($id);
        $coordenada = new \frontend\controllers\poc\FdCoordenadaControllerFachada();
        $modelCoordenada=$coordenada->cargaCoordenada(['id_reporte_informacion'=>$id]);

        
        if ($model->load($request) && $modelCoordenada->load($request) && $model->save(false) && $modelCoordenada->save(false)) {
			
			return [
                            'model' => $model,
                            'modelCoordenada' => $modelCoordenada,
                            'update' => 'True'
                        ];
        } 
         elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'modelCoordenada' => $modelCoordenada,
                    'update' => 'Ajax'
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'modelCoordenada' => $modelCoordenada,
                            'update' => 'False'
                        ];
        }
    }

            /**
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateDecision($id,$request,$isAjax)
    {
        $model = $this->findModel($id);
      
        
        if ($model->load($request) &&  $model->save(false) ) {
			
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
     * Deletes an existing CdaReporteInformacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de CdaReporteInformacion basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return CdaReporteInformacion el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = CdaReporteInformacion::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  CdaReporteInformacion     */
    protected function findModelByParams($params)
    {
        if (($model = CdaReporteInformacion::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo CdaReporteInformacion     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type CdaReporteInformacion     */
     public function cargaCdaReporteInformacion($params){
        return $this->findModelByParams($params);
    }
    
    
    /*Informacion para PDF organizada*/
    
    public function actiongetDatosTecnicos($id_cda,$id_cactividad_proceso)
    {
            $arrayData =    CdaReporteInformacion::find()
                             ->where(['id_cda'=>$id_cda])
                             ->andwhere(['id_actividad'=>8])
                             ->andwhere(['id_cactividad_proceso'=>$id_cactividad_proceso])
                             ->with('fdCoordenadas')
                             ->with('idUbicacion')
                             ->with('idCda')
                             ->with('idTfuente')
                             ->with('idSubtfuente')
                             ->with('idCaracteristica')
                             ->with('idUsoSolicitado')
                             ->with('idDestino')
                             ->all();
            
            return $arrayData;
    }
    
    
    public function actiongetDatosSenagua($id_cda,$id_cactividad_proceso)
    {
            $arrayData =    CdaReporteInformacion::find()
                             ->where(['id_cda'=>$id_cda])
                             ->andwhere(['id_actividad'=>12])
                             ->andwhere(['id_cactividad_proceso'=>$id_cactividad_proceso])
                             ->with('fdCoordenadas')
                             ->with('idUbicacion')
                             ->with('idCda')
                             ->with('idTfuente')
                             ->with('idSubtfuente')
                             ->with('idCaracteristica')
                             ->with('idUsoSolicitado')
                             ->with('idDestino')
                             ->all();
            
            return $arrayData;
    }
    
    
    public function actiongetDatosEpa($id_cda,$id_cactividad_proceso)
    {
            $arrayData =    CdaReporteInformacion::find()
                             ->where(['id_cda'=>$id_cda])
                             ->andwhere(['id_actividad'=>13])
                             ->andwhere(['id_cactividad_proceso'=>$id_cactividad_proceso])
                             ->with('fdCoordenadas')
                             ->with('idUbicacion')
                             ->with('idCda')
                             ->with('idTfuente')
                             ->with('idSubtfuente')
                             ->with('idCaracteristica')
                             ->with('idUsoSolicitado')
                             ->with('idDestino')
                             ->all();
            
            return $arrayData;
    }
    
    
    public function actiongetErrores($id_cda)
    {
            $arrayData = \common\models\cda\CdaErrores::find()
                             ->where(['id_cda'=>$id_cda])
                             ->with('idTerror')
                             ->all();
            
            return $arrayData;
    }
    
    
    public function actiongetVisita($id_cda,$id_cactividad_proceso)
    {
            $arrayData = CdaReporteInformacion::find()
                         ->where(['id_cda'=>$id_cda])
                         ->andwhere(['id_cactividad_proceso'=>$id_cactividad_proceso])
                         ->with('fdCoordenadasvista')
                         ->all();
            
            return $arrayData;
    }
    
    
     public function actiongetDatosRegistroCDApdf($id_cda,$id_cactividad_proceso)
    {
            $arrayData =    CdaReporteInformacion::find()
                             ->where(['id_cda'=>$id_cda])
                             ->andwhere(['id_actividad'=>15])
                             ->andwhere(['id_cactividad_proceso'=>$id_cactividad_proceso])
                             ->with('fdCoordenadas')
                             ->with('idUbicacion')
                             ->with('idCda')
                             ->with('idTfuente')
                             ->with('idSubtfuente')
                             ->with('idCaracteristica')
                             ->with('idUsoSolicitado')
                             ->with('idDestino')
                             ->all();
            
            return $arrayData;
    }
    
    
    public function actiongetAnalisisHidrologico($id_cda)
    {
            $arrayData = \common\models\cda\CdaAnalisisHidrologico::find()
                             ->where(['id_cda'=>$id_cda])
                             ->with('idCda')
                             ->with('idCartografia')
                             ->with('idEhidrografica')
                             ->with('idEmeteorologica')
                             ->with('idMetodologia')
                             ->all();
            
            return $arrayData;
    }
}