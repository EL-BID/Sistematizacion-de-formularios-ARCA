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
    public function actionUpdate($id,$tipo=null,$id_cda=null,$_labelmiga)
    {
        $facade =  new  PsCactividadProcesoControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$tipo);
        $model = $modelE['model'];



        if ($modelE['update'] == 'True') {

            Yii::$app->session->setFlash('FormSubmitted','1');
            return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda,'_labelmiga'=>$_labelmiga]);

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
      * 'var1'=>$id_cda_solicitud o $id_cda_tramite,
        'var2'=>$labelmiga,
        'var3'=>$actividadruta,
        'var4'=>$id_cactividad_proceso,
      * 'var5'=> tipo '1' solicitud , 2 tramite
     * @return mixed
      * Modificado 2019-02-21
     */
    public function actionUpdatedetproceso($var1,$var2,$var3,$var4,$var5)
    {
        $facade =  new  PsCactividadProcesoControllerFachada;
        $basicas = new BasicController();
        
        //Editando actividad actual ============================================================================================
        $modelE= $facade->actionUpdatedetproceso($var4,Yii::$app->request->post(),Yii::$app->request->isAjax,$var5,$var1);
        $model = $modelE['model'];
        
        
        if ($modelE['update'] == 'True') {
            
            //Buscando datos para la siguiente actividad y pasando el ultimo id_cactividad_proceso para la informacion necesaria
            $datos_siguiente = $basicas->findActividades(null,$var3);
            
            Yii::$app->getSession()->setFlash('error', [
                           'type' => 'url',
                           'message' => '¿Está seguro de pasar a la actividad '.$datos_siguiente['nom_actividad'].'?',
                           'message2'=> 'Asignando responsable para la actividad '.$datos_siguiente['nom_actividad'],
                           'urlgo' => 'cda/ps-cactividad-proceso/responsableactividad',
                           'var1'=>$model->id_cactividad_proceso,                   //id_cactividad_proceso que se acabo de modificar
                           'var2'=>$var2,
                           'var3'=>$var3,
                           'var4'=>$var1,
                           'var5'=>$var5
                    ]);
            
            $this->retornoPantalla($var1, $var1, $var2, $var5);

        }else if($modelE['update'] == 'False'){

             Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => $modelE['mensaje'],
                       ]);

              $this->retornoPantalla($var1, $var1, $var2, $var5);  

        }elseif($modelE['update']=='Ajax'){
            
            return $this->renderAjax('updatedetproceso', [
                        'model' => $model,'listcausal' => $modelE['listcausal'],'visibles'=> $modelE['visibles'],'disabled' => $modelE['disabled'],'_ajax'=>TRUE
            ]);
            
        }else{
            return $this->render('updatedetproceso', [
                'model' => $model,'listcausal' => $modelE['listcausal'],'visibles'=> $modelE['visibles'],'disabled' => $modelE['disabled']
            ]);
        }
    }

    
    /*
     * Cambio de responsable, no se cambia de actividad
     * $var2 = id_cproceso
     * $var3 = id_actividad_actual
     * $var4 = id_cda_tramite
     * $var5 = labelmiga
     * $var6 = tipo
     */
    public function actionCederactividad($var2,$var3,$var4,$var5,$var6){
       
        $basicas = New BasicController(); 
        $pscactividad = $basicas->actualPsCactividadProceso($var2);
        $var1= $pscactividad->id_cactividad_proceso;
        
        $facade =  new  PsCactividadProcesoControllerFachada;
        $modelE= $facade->actionCederactividad($var2,Yii::$app->request->post(),TRUE,$var1,$var3,$var6);
        
              
        
        if($modelE['update'] == 'Ajax'){
            
            return $this->renderAjax('updateresponsable', [
                        'listusuarios' => $modelE['listusuarios'],'_ajax'=>TRUE,'title'=>'Asignando Responsable'
            ]);
            
        }else if($modelE['update'] == 'TRUE'){
            
            Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => 'Actividad asignada con éxito',
                       ]);
            
            $this->retornoPantalla($var4, $var4, $var5, $var6);
                    
        }else{
           Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => $modelE['error']]);
           
           $this->retornoPantalla($var4, $var4, $var5, $var6);
        }
        
    }
    
    /*
     * Funcion en la cual se asigna el responsable y se pasa a la siguiente actividad
     * var1 => $id_cactividad_proceso actualmente diligenciada en el sistema
     * var2 => labelmiga
     * var3 => id_actividad de la actividad que sigue
     * var5 => tipo '1' solicitud , '2' tramite
     * var4 => $id_cda_tramite=null
     * var6 => id_cprocso
     * Modificado: 2019-14-04
     */
     public function actionResponsableactividad($var1=null,$var2,$var3,$var4=null,$var5,$var6=null){
         
        $basicas = New BasicController(); 
        
        if(is_null($var1) and !is_null($var6)){
            
            $pscactividad = $basicas->actualPsCactividadProceso($var6);
            $var1= $pscactividad->id_cactividad_proceso;
            
        }else if(is_null($var1) and is_null($var6)){
            
            Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => 'Erro para asignar responsable']);
           
           $this->retornoPantalla($var4, $var4, $var2, $var5);
        } 
        
        
        $facade =  new  PsCactividadProcesoControllerFachada;
        $modelE= $facade->actionResponsablescda($var1,Yii::$app->request->post(),TRUE,$var3,$var5,$var4);
        
              
        if($modelE['update'] == 'Ajax'){
            
            return $this->renderAjax('updateresponsable', [
                        'listusuarios' => $modelE['listusuarios'],'_ajax'=>TRUE,'title'=>'Asignando Responsable'
            ]);
            
        }else if($modelE['update'] == 'TRUE'){
            
            Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => 'Actividad asignada con éxito',
                       ]);
            
            $this->retornoPantalla($var4, $var4, $var2, $var5);
                    
        }else{
           Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => $modelE['error']]);
           
           $this->retornoPantalla($var4, $var4, $var2, $var5);
        }
    
     }
     
     
    
    /*Permite pasar a la actividad destino con tipo_pantalla = 0 en acciones dinamicas*/
    public function actionAdddestino($id_cproceso,$id_cda,$id_actividad_destino,$id_cactividad_proceso,$id_eproceso=null,$id_actividad_origen,$modeltosave=null,$_labelmiga)
    {
        $facade =  new  PsCactividadProcesoControllerFachada;
        $modelE= $facade->actionCreateactividadDestino($id_actividad_destino,Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cactividad_proceso,$id_cproceso,$id_actividad_origen,$id_eproceso);

        if ($modelE['create'] == 'True') {

            Yii::$app->session->setFlash('FormSubmitted','1');
            return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda,'_labelmiga'=>$_labelmiga]);

        }else if($modelE['create'] == 'False'){

             Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => $modelE['mensaje'],
                       ]);

              return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda,'_labelmiga'=>$_labelmiga]);

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
    public function actionHabupdate($proceso,$actividadactual,$actividadruta,$labelmiga,$subpantalla=null,$id_cda_solicitud=null,$tipo,$id_cda_tramite=null){

        $facade =  new  PsCactividadProcesoControllerFachada;
      
        //Averiguando obligatorio diligenciamiento ===========================================
	$obligatorio = $facade->findObligatorio($actividadactual,$actividadruta,$subpantalla,$proceso,$tipo);
	$id_cactividad_proceso = $obligatorio[1];
        
        
        //La actividad no contiene saltos entonces se procede a revisar la obligatoriedad ===================================
        if($obligatorio[0] == TRUE){

            Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => 'Diligencie el detalle de la actividad',
                       ]);

            $this->retornoPantalla($id_cda_solicitud,$id_cda_tramite,$labelmiga,$tipo);    

       }else{
           
           
            //Averiguando si es actividad de salto ====================== Ejemplo Enviar Solicitud - Recibir Solicitud
            //Evaluando id_actividad_ruta =========================================================================================
            $basicos = new BasicController();
            $salta_edicion = $basicos->findActividadRutaDestino($actividadactual,$actividadruta);  

            if($salta_edicion->salto_editar_origen == '1'){
                $saltar_origen = $facade->saltaOrigen($id_cactividad_proceso, $salta_edicion->id_actividad_destino,$tipo,$id_cda_tramite);
                $this->retornoPantalla($id_cda_solicitud,$id_cda_tramite,$labelmiga,$tipo);  
            }else{

                //Datos que se necesitan para continuar =====================================================
                //@id_cproceso,id_cda_solicitud,nombre_actividadactual,labelmiga
                $datos_siguiente = $basicos->findActividades(null,$actividadruta);
                $id_cda_tipo = (is_null($id_cda_solicitud))? $id_cda_tramite:$id_cda_solicitud;
                
                 Yii::$app->getSession()->setFlash('error', [
                           'type' => 'url',
                           'message' => '¿Está seguro de pasar a la actividad '.$datos_siguiente['nom_actividad'].'?',
                           'message2'=> 'Asignando responsable para la actividad '.$datos_siguiente['nom_actividad'],
                           'urlgo' => 'cda/ps-cactividad-proceso/responsableactividad',
                           'var1'=>$id_cactividad_proceso,                   //id_cactividad_proceso que se acabo de modificar
                           'var2'=>$labelmiga,
                           'var3'=>$actividadruta,
                           'var4'=>$id_cda_tipo,
                           'var5'=>$tipo
                    ]);

//                 Yii::$app->getSession()->setFlash('error', [
//                                'type' => 'url',
//                                'message' => 'Se editará primero la actividad '.$datos_actual['nom_actividad'],
//                                'message2'=> $datos_actual['nom_actividad'],
//                                'urlgo' => 'cda/ps-cactividad-proceso/updatedetproceso',
//                                'var1'=>$id_cda_tipo,
//                                'var2'=>$labelmiga,
//                                'var3'=>$actividadruta,
//                                'var4'=>$id_cactividad_proceso,
//                                'var5'=>$tipo
//                            ]);

                 $this->retornoPantalla($id_cda_solicitud,$id_cda_tramite,$labelmiga,$tipo);  
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
       
       
       if(is_null($id_pqrs)){
            
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
                                'message' => 'Actividad guardada con éxito',
                            ]);

                          return  $this->redirect(['pqrs/detallepqrs/index', 'numero' => $numero,'id_pqr'=>$id_pqrs]);
                    }

                }

            }
       }else{
           
           
           $validacion1= $facade->findConditionPQR($id_cactividad_proceso, $id_cproceso, $id_actividad_origen, $id_actividad_destino);
           
           if($validacion1 == TRUE){
               
               
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
               
               
           }else{
               
               Yii::$app->getSession()->setFlash('error', [
                                'type' => 'error',
                                'message' => 'Diligencie el detalle de la actividad',
                            ]);

               return  $this->redirect(['pqrs/detallepqrs/index', 'numero' => $numero,'id_pqr'=>$id_pqrs]);
           }
           
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

    /*
     * Modificado: Diana B 20190228
     * Funcion para la actividad Pausa
     * var1 =>labelmiga
     * var2 =>
     */
    public function actionPausa($labelmiga,$id_cda_solicitud=null,$id_cproceso,$actividadactual,$id_cda_tramite=null,$tipo){
   
        
        $facade =  new  PsCactividadProcesoControllerFachada;
        $modelE = $facade->actionPausa($id_cproceso,$tipo, Yii::$app->request->post(),Yii::$app->request->isAjax);

        
        if ($modelE['update'] == 'True') {
            
           Yii::$app->session->setFlash('FormSubmitted','1');	
           $this->retornoPantalla($id_cda_solicitud, $id_cda_tramite, $labelmiga, $tipo);
            
        }else if($modelE['update']=='Ajax'){

            return $this->renderAjax('updatedetproceso', [
                        'model' => $modelE['model'],
                        'listcausal' => $modelE['listcausal'],
                        'visibles'=> $modelE['visibles'],
                        'disabled' => $modelE['disabled'],'_ajax'=>TRUE
            ]);
             
        }
    }


    //=================================================================FUNCIONES PARA PQRS============================================//

    
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
    
    /*Edicion de un registor en la ps_cactividad
     * asociada a una pqr
     */

    public function actionUpdatepqrs($id_cactividad_proceso,$id_pqrs,$numero,$_labelmiga,$registro=null)
    {

        $facade =  new  PsCactividadProcesoControllerFachada;
        
        $modelE= $facade->actionUpdatedetprocesopqrs($id_cactividad_proceso,Yii::$app->request->post(),Yii::$app->request->isAjax,$registro);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {

            Yii::$app->session->setFlash('FormSubmitted','1');
            return  $this->redirect(['pqrs/detallepqrs/index', 'numero' => $numero,'id_pqr'=>$id_pqrs]);

        }else if($modelE['update'] == 'False'){

             Yii::$app->getSession()->setFlash('error', [
                           'type' => 'error',
                           'message' => $modelE['mensaje'],
                       ]);
             
             if(is_null($id_pqrs)){
                  return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda,'_labelmiga'=>$_labelmiga]);
             }else{
                  return  $this->redirect(['pqrs/detallepqrs/index', 'numero' => $numero,'id_pqr'=>$id_pqrs]);
             }

             

        }else if($modelE['update']=='Ajax'){
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


    /*
     * tipo 1 => Aplica para pqr
     * tipo 2=> Modelo normal
     */

    public function actionResponsable($id,$tipo=null,$id_pqrs=null,$numero=null)
    {
        $facade =  new  PsCactividadProcesoControllerFachada;
        
        if(!is_null($id_pqrs)){
            $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$tipo,true,$id_pqrs);
        }else{
            $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$tipo);
        }
        
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


    public function actionEsotra($id_opc_select){
        
        $_modeesotra = \common\models\cda\PsOpcTipoSelect::find()->where(['id_opc_tselect'=>$id_opc_select])->one();
        
        return $_modeesotra->es_otra;
    }
    
    
    /*
     * Funcion que retorna a la solicitud o al tramite
     * @id_retorno => id de retorno de la solicitud o tramite segun el tipo
     * @labemiga => label de la miga de pan
     */
    protected function retornoPantalla($id_cda_solicitud,$id_cda_tramite,$labelmiga,$tipo){
        
        if($tipo == '1'){
            return  $this->redirect(['cda/cdasolicitud/subproceso', 'id_cda_solicitud' => $id_cda_solicitud,'labelmiga'=>$labelmiga]);
        }else if($tipo == '2'){
           return  $this->redirect(['cda/cdatramite/subproceso', 'id_cda_tramite' => $id_cda_tramite,'labelmiga'=>$labelmiga]);
        }
    }
}
