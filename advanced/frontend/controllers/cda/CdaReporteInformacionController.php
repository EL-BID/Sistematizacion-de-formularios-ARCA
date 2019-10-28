<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\CdareporteinformacionControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdareporteinformacionController implementa las acciones a través del sistema CRUD para el modelo CdaReporteInformacion.
 */
class CdareporteinformacionController extends ControllerPry
{
  //private $facade =    CdareporteinformacionControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  CdareporteinformacionControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null,$labelmiga=null,$id_cda_tramite=null,$id_cproceso=null,$actividadactual=null,$tipo=null){
            $facade =  new  CdareporteinformacionControllerFachada;
            echo $facade->actionProgress($urlroute,$id,$labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo);
    }

	
	
    /**
     * Listado todos los datos del modelo CdaReporteInformacion que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo)
    {
        $facade =  new  CdareporteinformacionControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams,$id_cda_tramite,$actividadactual,$id_cproceso);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'id_cda_tramite' =>$id_cda_tramite,
            'id_cactividad_proceso'=>$dataAndModel['pscactividadproceso']->id_cactividad_proceso,
            'encabezado'=>$dataAndModel['encabezado'],
            'labelmiga'=>$labelmiga,
            'id_cproceso'=>$id_cproceso,
            'actividadactual'=>$actividadactual,
            'tipo'=>$tipo,
            'enableCreate'=>$dataAndModel['enableCreate']
        ]);
    }
    
    /*
     * Funcion para datos de la actividad Verificar Apoyo
     */
    
    public function actionIndex_verificar($labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo){
        
        $facade =  new  CdareporteinformacionControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams,$id_cda_tramite,$actividadactual,$id_cproceso);
        
        return $this->render('index_verificar_datos_apoyo', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'id_cda_tramite' =>$id_cda_tramite,
            'id_cactividad_proceso'=>$dataAndModel['pscactividadproceso']->id_cactividad_proceso,
            'encabezado'=>$dataAndModel['encabezado'],
            'labelmiga'=>$labelmiga,
            'id_cproceso'=>$id_cproceso,
            'actividadactual'=>$actividadactual,
            'tipo'=>$tipo,
            'enableCreate'=>$dataAndModel['enableCreate']
        ]);
    }
    
    
     /*
     * Funcion para datos de la actividad Registrar visita tecnica
     */
    
    public function actionIndex_visita($labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo){
        
        $facade =  new  CdareporteinformacionControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams,$id_cda_tramite,$actividadactual,$id_cproceso);
        
         
        return $this->render('index_visita', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'id_cda_tramite' =>$id_cda_tramite,
            'id_cactividad_proceso'=>$dataAndModel['pscactividadproceso']->id_cactividad_proceso,
            'encabezado'=>$dataAndModel['encabezado'],
            'labelmiga'=>$labelmiga,
            'id_cproceso'=>$id_cproceso,
            'actividadactual'=>$actividadactual,
            'tipo'=>$tipo,
            'enableCreate'=>$dataAndModel['enableCreate'],
            'nomactividad'=>$dataAndModel['nombreactividad']
        ]);
    }
    
    /*
     * Funcion para la actividad Registrar Informacion Senagua
     */
    
    public function actionIndex_institucion_apoyo($labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo){
        
        $facade =  new  CdareporteinformacionControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams,$id_cda_tramite,$actividadactual,$id_cproceso);
        
        return $this->render('index_institucion_apoyo', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'id_cda_tramite' =>$id_cda_tramite,
            'id_cactividad_proceso'=>$dataAndModel['pscactividadproceso']->id_cactividad_proceso,
            'encabezado'=>$dataAndModel['encabezado'],
            'labelmiga'=>$labelmiga,
            'id_cproceso'=>$id_cproceso,
            'actividadactual'=>$actividadactual,
            'tipo'=>$tipo,
            'enableCreate'=>$dataAndModel['enableCreate'],
            'nomactividad'=>$dataAndModel['nombreactividad']
        ]);
    }
    

    /**
     * Listado todos los datos del modelo CdaReporteInformacion que se encuentran en el tablename para la actividad Registrar cd
     * @return mixed
     */
    public function actionIndexregistrar($labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo)
    {
        $facade =  new  CdareporteinformacionControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams,$id_cda_tramite,$actividadactual,$id_cproceso);
        
        return $this->render('indexregistrar', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'id_cda_tramite' =>$id_cda_tramite,
            'id_cactividad_proceso'=>$dataAndModel['pscactividadproceso']->id_cactividad_proceso,
            'encabezado'=>$dataAndModel['encabezado'],
            'labelmiga'=>$labelmiga,
            'id_cproceso'=>$id_cproceso,
            'actividadactual'=>$actividadactual,
            'tipo'=>$tipo,
            'enableCreate'=>$dataAndModel['enableCreate']
        ]);
    }
    
    /**
     * Presenta un dato unico en el modelo CdaReporteInformacion.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  CdareporteinformacionControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaReporteInformacion .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso)
    {
       $facade =  new  CdareporteinformacionControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax,$actividadactual,$id_cproceso,$pscactividadproceso,$tipo,$id_cda_tramite);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            /*
             * $labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo
             */
            return  $this->redirect(['progress', 'urlroute' => 'index','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model,  'model2' => $modelE['model2'],
                    'model3' => $modelE['model3'],'ps_cproceso'=>$id_cproceso,'_ajax'=>true,'stringClasificacion'=>$modelE['stringClasificacion'],
                                'modelpsactividad'=>$modelE['modelpsactividad']
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,'model2' => $modelE['model2'],'ps_cproceso'=>$id_cproceso,
                    'model3' => $modelE['model3'],
            ]);
        }
    }
    
    
    /*
     * Crea un registro par ala actividad verificar apoyo
     */
    
     public function actionCreateverificar($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso)
    {
       $facade =  new  CdareporteinformacionControllerFachada;
       $modelE= $facade->actionCreateverificar(Yii::$app->request->post(),Yii::$app->request->isAjax,$actividadactual,$id_cproceso,$pscactividadproceso);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'index_verificar','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create_verificar_datos', [
                        'model' => $model,  'ps_cproceso'=>$id_cproceso,'_ajax'=>true
            ]);
        } 
        else {
            return $this->render('create_verificar_datos', [
                'model' => $model,'ps_cproceso'=>$id_cproceso,
                    
            ]);
        }
    }
    
    /*
     * Funcion create para Registro informacion senagua y epa
     */
    
    public function actionCreateinstitucionapoyo($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso)
    {
       $facade =  new  CdareporteinformacionControllerFachada;
       $modelE= $facade->actionCreateinstitucionapoyo(Yii::$app->request->post(),Yii::$app->request->isAjax,$actividadactual,$id_cproceso,$pscactividadproceso);
       $model = $modelE['model'];
 
       if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'index_institucion_apoyo','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('createinstitucionapoyo', [
                        'model' => $model,  'model2' => $modelE['model2'],'ps_cproceso'=>$id_cproceso,'_ajax'=>true
            ]);
        } 
        else {
            return $this->render('createinstitucionapoyo', [
                'model' => $model,'model2' => $modelE['model2'],'ps_cproceso'=>$id_cproceso,
            ]);
        }
    }
    
    /*
     * Creando registro en visita tecnica
     */
    public function actionCreatevisita($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso)
    {
       $facade =  new  CdareporteinformacionControllerFachada;
       $modelE= $facade->actionCreatevisita(Yii::$app->request->post(),Yii::$app->request->isAjax,$actividadactual,$id_cproceso,$pscactividadproceso);
       $model = $modelE['model'];
 
       if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'index_visita','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('createvisita', [
                        'model' => $model,  'model2' => $modelE['model2'],'ps_cproceso'=>$id_cproceso,'_ajax'=>true
            ]);
        } 
        else {
            return $this->render('createvisita', [
                'model' => $model,'model2' => $modelE['model2'],'ps_cproceso'=>$id_cproceso,
            ]);
        }
    }

    /**
     * Create para registrar 
     */
    
    public function actionCreateregistrar($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso)
    {
       $facade =  new  CdareporteinformacionControllerFachada;
       $modelE= $facade->actionCreateRegistrar(Yii::$app->request->post(),Yii::$app->request->isAjax,$actividadactual,$id_cproceso,$pscactividadproceso,$tipo,$id_cda_tramite);
       $model = $modelE['model'];
       
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            /*
             * $labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo
             */
            return  $this->redirect(['progress', 'urlroute' => 'indexregistrar','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('createregistrar', [
                        'model' => $model,  'model2' => $modelE['model2'],
                    'model3' => $modelE['model3'],'ps_cproceso'=>$id_cproceso,'_ajax'=>true
            ]);
        } 
        else {
            return $this->render('createregistrar', [
                'model' => $model,'model2' => $modelE['model2'],'ps_cproceso'=>$id_cproceso,
                    'model3' => $modelE['model3'],
            ]);
        }
    }
    
    /**
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    
    public function actionUpdateinstitucionapoyo($labelmiga,$id,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso){
        
       $facade =  new  CdareporteinformacionControllerFachada;
       $modelE= $facade->actionUpdateinstitucionapoyo($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$actividadactual,$id_cproceso,$pscactividadproceso,$tipo,$id_cda_tramite);
       $model = $modelE['model'];
       
       
        if ($modelE['update'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'index_institucion_apoyo','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		
			
        }elseif($modelE['update']=='Ajax'){
             return $this->renderAjax('updateinstitucionapoyo', [
                    'model' => $model,  'model2' => $modelE['model2'],
                    'ps_cproceso'=>$id_cproceso,'_ajax'=>true,
            ]);
        } 
        else {
            return $this->render('updateinstitucionapoyo', [
                'model' => $model,'model2' => $modelE['model2'],'ps_cproceso'=>$id_cproceso,
                    
            ]);
        }
        
    }
    
    
    /**
     * Modifica un dato existente en el modelo CdaReporteInformacion para visita tecnica
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    
    public function actionUpdatevisita($labelmiga,$id,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso){
        
       $facade =  new  CdareporteinformacionControllerFachada;
       $modelE= $facade->actionUpdatevisita($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$actividadactual,$id_cproceso,$pscactividadproceso,$tipo,$id_cda_tramite);
       $model = $modelE['model'];
       
       
        if ($modelE['update'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'index_visita','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		
			
        }elseif($modelE['update']=='Ajax'){
            
             Yii::trace("que llega en fecha visita ".$model->fecha_visita,"DEBUG");
            if($model->fecha_visita == "9999-12-12 00:00:00"){
                $model->fecha_visita = "";
            }
            
            return $this->renderAjax('updatevisita', [
                    'model' => $model,  'model2' => $modelE['model2'],
                    'ps_cproceso'=>$id_cproceso,'_ajax'=>true,
            ]);
        } 
        else {
            return $this->render('updatevisita', [
                'model' => $model,'model2' => $modelE['model2'],'ps_cproceso'=>$id_cproceso,
                    
            ]);
        }
        
    }
    
    /**
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    
    public function actionUpdate($labelmiga,$id,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso){
        
       $facade =  new  CdareporteinformacionControllerFachada;
       $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$actividadactual,$id_cproceso,$pscactividadproceso,$tipo,$id_cda_tramite);
       $model = $modelE['model'];
       
       
        if ($modelE['update'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'index','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		
			
        }elseif($modelE['update']=='Ajax'){
             return $this->renderAjax('update', [
                    'model' => $model,  'model2' => $modelE['model2'],
                    'model3' => $modelE['model3'],'ps_cproceso'=>$id_cproceso,'_ajax'=>true,
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,'model2' => $modelE['model2'],'ps_cproceso'=>$id_cproceso,
                    'model3' => $modelE['model3'],
            ]);
        }
        
    }
    
    /**
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda de la actividad registrar datos certificados,
     * setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    
    public function actionUpdateregistrar($labelmiga,$id,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso){
        
       $facade =  new  CdareporteinformacionControllerFachada;
       $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$actividadactual,$id_cproceso,$pscactividadproceso,$tipo,$id_cda_tramite);
       $model = $modelE['model'];
       
       
        if ($modelE['update'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'indexregistrar','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		
			
        }elseif($modelE['update']=='Ajax'){
             return $this->renderAjax('updateregistrar', [
                    'model' => $model,  'model2' => $modelE['model2'],
                    'model3' => $modelE['model3'],'ps_cproceso'=>$id_cproceso,'_ajax'=>true,
            ]);
        } 
        else {
            return $this->render('updateregistrar', [
                'model' => $model,'model2' => $modelE['model2'],'ps_cproceso'=>$id_cproceso,
                    'model3' => $modelE['model3'],
            ]);
        }
        
    }
    
    
    /*
     * Update para verificar datos de apoyo
     * Fecha Mod: 2019-04-23
     */
     public function actionUpdateverificar($id,$labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso)
    {
       $facade =  new  CdareporteinformacionControllerFachada;
       $modelE= $facade->actionUpdateverificar($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$actividadactual,$id_cproceso,$pscactividadproceso);
       $model = $modelE['model'];
    
        if ($modelE['update'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'index_verificar','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		
			
        }elseif($modelE['update']=='Ajax'){
             return $this->renderAjax('create_verificar_datos', [
                        'model' => $model,  'ps_cproceso'=>$id_cproceso,'_ajax'=>true
            ]);
        } 
        else {
            return $this->render('create_verificar_datos', [
                'model' => $model,'ps_cproceso'=>$id_cproceso,
                    
            ]);
        }
    }
    
    
    public function actionUpdateold($id)
    {
        $facade =  new  CdareporteinformacionControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_reporte_informacion]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,
            ]);
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
        $facade =  new  CdareporteinformacionControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }
    
    
    
    public function actionSinvisita($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso){
        
        $facade =  new  CdareporteinformacionControllerFachada;
        
       $_codsCda= \common\models\cda\PsCodCda::find()
                ->leftJoin('cda','cda.id_cda = ps_cod_cda.id_cda')
                ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda.id_cactividad_proceso')    
                ->where(['id_cproceso'=>$id_cproceso])->all();
       
       $transaction = Yii::$app->db->beginTransaction();
        
       foreach($_codsCda as $clavecod){
           
           $model = new \common\models\cda\CdaReporteInformacion();
           $model->setScenario('registravisita');
           
           $model->id_cod_cda = $clavecod->id_cod_cda;
           $model->fecha_visita = "9999-12-12";             //Con esta fecha se valida que la linea sea -
           $model->oficio_visita = "-";
           $model->id_tfuente = "5";
           $model->id_subtfuente = "20";
           $model->fuente_solicitada = "-";
           $model->id_uso_solicitado  = "4";
           $model->id_destino = "11";                       //aqui es 11 para su bd
           $model->id_actividad = $actividadactual;
           $model->id_tipo = '2';
           $model->id_subdestino = '14';
           $model->id_cactividad_proceso = $pscactividadproceso;
           
           
           //Buscano campo coordenada vacio ========================================
           $_corrdenadas = \common\models\poc\FdCoordenada::find()->where(['x'=>'0','y'=>'0','altura'=>'0','id_tcoordenada'=>'1'])->one();
           $model->id_coordenada= $_corrdenadas->id_coordenada;
           $_a=0;
           
           if($model->save()){
               
               $model4 = $facade->findPscactividadProceso($pscactividadproceso);
               $model4->diligenciado = 'S';
               
                if($model4->save()){
                    
                    $_a+=1;
                    
                }else{
                    $transaction->rollBack(); 
                    throw new \yii\web\HttpException(404, 'Error al registrar actividad');
                }
               
           }else{
               
               
                $errores = $model->getErrors();
                foreach($errores as $clave){
                    $_revisando = implode(",",$clave);
                    Yii::trace("sera que asi si: ".$_revisando,"DEBUG");
                }
               
               $transaction->rollBack(); 
               throw new \yii\web\HttpException(404, 'Error al registrar  visita'); 
           }
       }
       
       if($_a>0){
           $transaction->commit();
           Yii::$app->session->setFlash('FormSubmitted','2');
           return  $this->redirect(['progress', 'urlroute' => 'index_visita','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		
       }
        
    }

    
}
