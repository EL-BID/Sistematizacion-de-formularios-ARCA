<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\PsCactividadProcesoControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * PsCactividadProcesoController implementa las acciones a través del sistema CRUD para el modelo PsCactividadProceso.
 */
class PsCactividadProcesoController extends ControllerPry
{
  //private $facade =    PsCactividadProcesoControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  PsCactividadProcesoControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  PsCactividadProcesoControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo PsCactividadProceso que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  PsCactividadProcesoControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo PsCactividadProceso.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  PsCactividadProcesoControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo PsCactividadProceso .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  PsCactividadProcesoControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_cactividad_proceso]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo PsCactividadProceso.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     * @tipo = null muestra el formulario de actualizacion por defecto segun la plantilla de YII
     * @tipo = 1 permite modificar solo el usuario del modelo
     */
    public function actionUpdate($id,$tipo=null,$id_cda=null)
    {
        $facade =  new  PsCactividadProcesoControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$tipo);
        $model = $modelE['model'];
        
        

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda]);	
            
        }elseif($modelE['update']=='Ajax'){
            
            if($tipo==1){
                
                 return $this->renderAjax('updateresponsable', [
                            '_ajax'=> TRUE,
                            'model' => $model,'listusuarios'=>$modelE['listusuarios']
                ]);
                
            }else{
                return $this->renderAjax('update', [
                            '_ajax'=> TRUE,
                            'model' => $model
                ]);
            }
        } 
        else {
            
            if($tipo==1){
                return $this->render('updateresponsable', [
                'model' => $model,'listusuarios'=>$modelE['listusuarios']
                ]);
                
            }else{
                return $this->render('update', [
                'model' => $model,
                ]);
            }
            
           
        }
    }
    
    
     /**
     * Modifica un dato existente en el modelo PsCactividadProceso.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatedetproceso($id_cactividad_proceso,$id_cda)
    {
        $facade =  new  PsCactividadProcesoControllerFachada;
        $modelE= $facade->actionUpdatedetproceso($id_cactividad_proceso,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda]);	
            
        }else if($modelE['update'] == 'False'){
            
             Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => $modelE['mensaje'],
                       ]);
             
              return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('updatedetproceso', [
                        'model' => $model,'listusuarios' => $modelE['listusuarios'],'listcausal' => $modelE['listcausal'],'visibles'=> $modelE['visibles'],'disabled' => $modelE['disabled'],'_ajax'=>TRUE
            ]);
        }else{
            return $this->render('updatedetproceso', [
                'model' => $model,'listusuarios' => $modelE['listusuarios'],'listcausal' => $modelE['listcausal'],'visibles'=> $modelE['visibles'],'disabled' => $modelE['disabled']
            ]);
        }
    }
    
    
    /*Permite pasar a la actividad destino con tipo_pantalla = 0 en acciones dinamicas*/
    public function actionAdddestino($id_cproceso,$id_cda,$id_actividad_destino,$id_cactividad_proceso,$id_eproceso=null,$id_actividad_origen,$modeltosave=null)
    {
        $facade =  new  PsCactividadProcesoControllerFachada;
        $modelE= $facade->actionCreateactividadDestino($id_actividad_destino,Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cactividad_proceso,$id_cproceso,$id_actividad_origen,$id_eproceso);
        
        if ($modelE['create'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda]);	
            
        }else if($modelE['create'] == 'False'){
            
             Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => $modelE['mensaje'],
                       ]);
             
              return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda]);
            
        }elseif($modelE['create']=='Ajax'){
            return $this->renderAjax('create', [
                        'model' =>  $modelE['model'],'listusuarios' => $modelE['listusuarios'],'listcausal' => $modelE['listcausal'],'visibles'=> $modelE['visibles'],'disabled' => $modelE['disabled']
            ]);
        }else{
            return $this->render('create', [
                'model' => $modelE['model'],'listusuarios' => $modelE['listusuarios'],'listcausal' => $modelE['listcausal'],'visibles'=> $modelE['visibles'],'disabled' => $modelE['disabled']
            ]);
        }
    }
    
    
    /**
     * Permite modificar un registro de la tabla ps_cactividad_proceso solo si cumple las condiciones
     * 
     */
    public function actionHabupdate($id_cproceso,$id_cda,$id_actividad_destino,$id_cactividad_proceso,$id_eproceso=null,$id_actividad_origen,$modeltosave=null){
        
       $facade =  new  PsCactividadProcesoControllerFachada; 
      /*1= Si la ultima actividad "ps_cactividad_proceso.ult_id_actividad" tiene el campo subpantalla de la tabla ps_actividad se debe revisr
       * que el campo diligencia de la tabla ps_cactividad_proceso tiene 0S0, para continuar con la actividad seleccionada, de lo contrario sale un 
       * mensaje indicando que debe diligenciar el detalle de la actividad
       */
       
       $validacion1 = $facade->findcondicionCont($id_cproceso,$id_cactividad_proceso);
          
      
       if($validacion1[0] == FALSE){
            
           Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => 'Diligencie el detalle de la actividad',
                       ]);
             
              return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda]);
       
              
       }else{
           
           if(is_null($modeltosave)){
               
               $resultado = $facade->dinamicaSave($id_cproceso, $id_actividad_destino, $id_eproceso, $id_actividad_origen);
               
               if($resultado == TRUE){
                   
                    Yii::$app->getSession()->setFlash('success', [
                           'type' => 'success',
                           'message' => 'Actividad guardada con Exito',
                       ]);
                    
                     return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda]);
               }
               
           }
           
       }
    }
    
    
    
     /**
     * Permite modificar un registro de la tabla ps_cactividad_proceso solo si cumple las condiciones
     * 
     */
    public function actionHabupdatepqrs($id_cproceso,$id_pqrs,$id_actividad_destino,$id_cactividad_proceso,$id_eproceso=null,$id_actividad_origen,$modeltosave=null,$numero){
        
       $facade =  new  PsCactividadProcesoControllerFachada; 
      /*1= Si la ultima actividad "ps_cactividad_proceso.ult_id_actividad" tiene el campo subpantalla de la tabla ps_actividad se debe revisr
       * que el campo diligencia de la tabla ps_cactividad_proceso tiene 0S0, para continuar con la actividad seleccionada, de lo contrario sale un 
       * mensaje indicando que debe diligenciar el detalle de la actividad
       */
       $validacion1 = $facade->findcondicionCont($id_cproceso,$id_cactividad_proceso);
       
       if($validacion1[0] == 2){
            
           Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => 'Diligencie el detalle de la actividad',
                       ]);
             
              return  $this->redirect(['pqrs/detallepqrs/index', 'numero' => $numero,'id_pqr'=>$id_pqrs]);    
              
       }else{
           
           if(is_null($modeltosave)){
               
               $resultado = $facade->dinamicaSave($id_cproceso, $id_actividad_destino, $id_eproceso, $id_actividad_origen);
               
               if($resultado == TRUE){
                   
                    Yii::$app->getSession()->setFlash('success', [
                           'type' => 'success',
                           'message' => 'Actividad guardada con Exito',
                       ]);
                    
                     return  $this->redirect(['pqrs/detallepqrs/index', 'numero' => $numero,'id_pqr'=>$id_pqrs]);    
               }
               
           }
           
       }
    }
    
    
    /*Permite pasar a la actividad destino con tipo_pantalla = 0 en acciones dinamicas pqrs*/
    
    public function actionAdddestinopqrs($id_cproceso,$id_pqrs,$id_actividad_destino,$id_cactividad_proceso,$id_eproceso=null,$id_actividad_origen,$modeltosave=null,$numero)
    {
        $facade =  new  PsCactividadProcesoControllerFachada;
        $modelE= $facade->actionCreateactividadDestino($id_actividad_destino,Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cactividad_proceso,$id_cproceso,$id_actividad_origen,$id_eproceso);
        
        if ($modelE['create'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
           return  $this->redirect(['pqrs/detallepqrs/index', 'numero' => $numero,'id_pqr'=>$id_pqrs]);  
            
        }else if($modelE['create'] == 'False'){
            
             Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => $modelE['mensaje'],
                       ]);
             
              return  $this->redirect(['pqrs/detallepqrs/index', 'numero' => $numero,'id_pqr'=>$id_pqrs]);  
            
        }elseif($modelE['create']=='Ajax'){
            return $this->renderAjax('create', [
                        'model' =>  $modelE['model'],'listusuarios' => $modelE['listusuarios'],'listcausal' => $modelE['listcausal'],'visibles'=> $modelE['visibles'],'disabled' => $modelE['disabled']
            ]);
        }else{
            return $this->render('create', [
                'model' => $modelE['model'],'listusuarios' => $modelE['listusuarios'],'listcausal' => $modelE['listcausal'],'visibles'=> $modelE['visibles'],'disabled' => $modelE['disabled']
            ]);
        }
    }
    
    
    /**
     * Deletes an existing PsCactividadProceso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  PsCactividadProcesoControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
    
    //=================================================================FUNCIONES PARA PQRS============================================//
    
    /*Edicion de un registor en la ps_cactividad
     * asociada a una pqr
     */
    
    public function actionUpdatepqrs($id_cactividad_proceso,$id_pqrs,$numero)
    {
        
        $facade =  new  PsCactividadProcesoControllerFachada;
        
        $modelE= $facade->actionUpdatedetproceso($id_cactividad_proceso,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['pqrs/detallepqrs/index', 'numero' => $numero,'id_pqr'=>$id_pqrs]);
            
        }else if($modelE['update'] == 'False'){
            
             Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => $modelE['mensaje'],
                       ]);
             
              return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('updatedetproceso', [
                        '_ajax'=>TRUE,
                        'model' => $model,'listusuarios' => $modelE['listusuarios'],'listcausal' => $modelE['listcausal'],'visibles'=> $modelE['visibles'],'disabled' => $modelE['disabled']
            ]);
        }else{
            return $this->render('updatedetproceso', [
                'model' => $model,'listusuarios' => $modelE['listusuarios'],'listcausal' => $modelE['listcausal'],'visibles'=> $modelE['visibles'],'disabled' => $modelE['disabled']
            ]);
        }
         
    }
    
    
    
    public function actionResponsable($id,$tipo=null,$id_pqrs,$numero)
    {
        $facade =  new  PsCactividadProcesoControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$tipo);
        $model = $modelE['model'];
        
        

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
           return  $this->redirect(['pqrs/detallepqrs/index', 'numero' => $numero,'id_pqr'=>$id_pqrs]);
            
        }elseif($modelE['update']=='Ajax'){
            
            if($tipo==1){
                
                 return $this->renderAjax('updateresponsable', [
                            '_ajax'=>TRUE,
                            'model' => $model,'listusuarios'=>$modelE['listusuarios']
                ]);
                
            }else{
                return $this->renderAjax('update', [
                            '_ajax'=>TRUE,
                            'model' => $model
                ]);
            }
        } 
        else {
            
            if($tipo==1){
                return $this->render('updateresponsable', [
                'model' => $model,'listusuarios'=>$modelE['listusuarios']
                ]);
                
            }else{
                return $this->render('update', [
                'model' => $model,
                ]);
            }
            
           
        }
    }
    
    
    
}
