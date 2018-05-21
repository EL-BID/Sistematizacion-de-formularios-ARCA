<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\CdaControllerFachada;
use frontend\controllers\cda\CdaSolicitudInformacionControllerFachada;
use frontend\controllers\cda\CdaReporteInformacionControllerFachada;
use common\models\cda\Cda;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use frontend\helpers\helperHTML;
use yii\data\ArrayDataProvider;
use common\general\documents\genPDF;


/**
 * CdaController implementa las acciones a través del sistema CRUD para el modelo Cda.
 */
class CdaController extends ControllerPry
{
  //private $facade =    CdaControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  CdaControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  CdaControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo Cda que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  CdaControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }
    
    
    
    /**
     * Funcion Indes de CDA utilizada para la presentacion de la pantalla principal de CDA
     * Fecha Modificado: 2018-03-17
     * DBA
     */
    
     public function actionPantallaprincipal()
    {
        
        if(empty(Yii::$app->user->identity->usuario)){
             return $this->redirect(['site/index']);
        }        
        
        $facade =  new  CdaControllerFachada;
        $dataAndModel= $facade->actionPantallaprincipal(Yii::$app->request->queryParams);
        
              
        $datos = new ArrayDataProvider([
                   'allModels' => $dataAndModel['dataProvider'],
                   'pagination' => [
                       'pageSize' => 10,
                   ],
                   'sort' => [
                       'attributes' => ['id_cda','numero', 'nom_actividad','nom_eproceso','nombres','ult_fecha_actividad','ult_fecha_estado','id_cproceso','ult_id_actividad','fecha_solicitud'],
                   ],
               ]);
        
       
        //Habilitando Boton de CREAR CDA==================================================================
        $_botoncrear= in_array(Yii::$app->user->identity->codRols[0]->cod_rol,[2,25,26]);
        
        //Estado para CDA=================================================================================
        $_listestados=  $facade->list_estados_cda();
        
        //Listado de Usuarios============================================================================
        $_listusuarios = $facade->findUsuarios(Yii::$app->user->identity->id_usuario);
        
        //Listado de Actividades=========================================================================
        $_listactividades = $facade->findActividades();
        
        
        
        return $this->render('pantallaprincipal', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $datos,'botoncrear' => $_botoncrear,'listestados' => $_listestados,'listresponsables'=>$_listusuarios,'listactividades'=>$_listactividades
        ]);
    }
    
    
     /**
     * Funcion que habilita la pantalla registrar datos solicitantes
     */
    public function actionRegistrardatos($id_cda,$id_cproceso)
    {
        $facade =  new  CdaControllerFachada;
        $modelE= $facade->actionRegistrardatos($id_cda,$id_cproceso);
        $model = $modelE['model'];
      
        
        //Traiendo datos del encabezado=====================================================
        $dataEncabezado = $facade->findEncabezado($id_cda);

        if($modelE['update'] == 'True') {
	
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('registrar_datos_solicitante', [
                        'ajax'=>'1','model' => $model,'_editararca'=>$modelE['_editarca'],'id_cda'=>$id_cda,
                        'encabezado'=>$dataEncabezado,'listadocentro'=>$modelE['listadocentro'], 'listadodemarcacion' => $modelE['listadodemarcacion'],'ajax'=>'1'
            ]);
        } 
        else {
            return $this->render('registrar_datos_solicitante', [
                'model' => $model,'_editararca'=>$modelE['_editarca'],'id_cda'=>$id_cda,
                'encabezado'=>$dataEncabezado,'listadocentro'=>$modelE['listadocentro'], 
                'listadodemarcacion' => $modelE['listadodemarcacion']
            ]);
        }
        
    }
    

    /**
     * Presenta un dato unico en el modelo Cda.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  CdaControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Cda .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  CdaControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_cda]);		
			
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
     * Crea un nuevo dato sobre el modelo Cda .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate_cda()
    {
       if(empty(Yii::$app->user->identity->usuario)){
             return $this->redirect(['site/index']);
        }
        
       //Creando variable en modelo solo para cambio de validaciones===================================
       $facade =  new  CdaControllerFachada;
       $modelE= $facade->actionCreate_cda();
       $model = $modelE['model'];
       $modelpscproceso = $modelE['modelpscproceso'];
       
        if ($modelE['create'] == 'True') {
			
            return  $this->redirect(['progress', 'urlroute' => 'pantallaprincipal']);		
			
        }elseif($modelE['create']=='Ajax'){
            
            
             return $this->renderAjax('create_cda', [
                        'model' => $model,'modelpscproceso'=>$modelpscproceso,'_ajax'=>TRUE
            ]);
        } 
        else {
             
            return $this->render('create_cda', [
                'model' => $model,'modelpscproceso'=>$modelpscproceso
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo Cda.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  CdaControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_cda]);
            
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
     * Modifica los parametros del formulario del cproceso y parametros de la ps_cactividad
     * botton ver en la pantalla de detalle proceso
     */
    /**
     * Modifica un dato existente en el modelo Cda.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateproceso($id_cda,$tipo,$ult_id_actividad)
    {
        $facade =  new  CdaControllerFachada;
        
        //Traiendo datos del encabezado=====================================================
        $dataEncabezado = $facade->findEncabezado($id_cda);
        

        //Habilitando boton para actualizar ================================================
        if($dataEncabezado[0]['ult_id_usuario'] == Yii::$app->user->identity->id_usuario){
            $boleanbotton = TRUE;
        }else{
            $boleanbotton = FALSE;
        }
        
        //Obteniendo modelos de datos========================================================
        $modelE= $facade->actionUpdatecda($id_cda,$ult_id_actividad);
        $model = $modelE['model'];
        $modelpscproceso = $modelE['modelpscproceso'];
       
        if ($modelE['update'] == 'True') {
	
            if($tipo==1){
                return $this->redirect(['progress', 'urlroute' => 'index']);
            }else if($tipo==2){
                Yii::$app->session->setFlash('FormSubmitted','1');		
                return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda]);
            }
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('updatepantallaprincipal', [
                        'ajax'=>'1','model' => $model,'modelpscproceso'=>$modelpscproceso,'_editararca' => $modelE['editarca'], '_editarsenagua' =>  $modelE['editsenagua'],'encabezado'=>$dataEncabezado,'boleanbotton'=>$boleanbotton,'id_cda'=>$id_cda
            ]);
        } 
        else {
            return $this->render('updatepantallaprincipal', [
                'model' => $model,'modelpscproceso'=>$modelpscproceso,'_editararca' => $modelE['editarca'], '_editarsenagua' =>  $modelE['editsenagua'],'encabezado'=>$dataEncabezado,'boleanbotton'=>$boleanbotton,'id_cda'=>$id_cda
            ]);
        }
    }
    
    
     /**
     * Funcion que habilita la pantalla analizar informacion
     */
    public function actionAnalisis($id_cda,$id_cproceso)
    {
        $facade =  new  CdaControllerFachada;
        $modelE= $facade->actionAnalizarinformacion($id_cda,$id_cproceso);
        $model = $modelE['model'];
      
        
        //Traiendo datos del encabezado=====================================================
        $dataEncabezado = $facade->findEncabezado($id_cda);

        if($modelE['update'] == 'True') {
	
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('analisis', [
                        'model' => $model,'_editararca'=>$modelE['_editarca'],'id_cda'=>$id_cda,'encabezado'=>$dataEncabezado,'ajax'=>'1'
            ]);
        } 
        else {
            return $this->render('analisis', [
                'model' => $model,'_editararca'=>$modelE['_editarca'],'id_cda'=>$id_cda,'encabezado'=>$dataEncabezado
            ]);
        }
        
    }
    

    /**
     * Deletes an existing Cda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  CdaControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
    public function actionPdf($id_cda){
        
        //Obteniendo ultima id_cactividad_proceso registrada=================================================================================
        if (($model = Cda::findOne($id_cda)) !== null) {
            $id_cactividad_proceso = $model->obtenerultidcactividaproceso['id_cactividad_proceso'];
        }
              
        //========================Buscando Encabezado================================================================================//
        
        $facade =  new  CdaControllerFachada;
        $encabezado = $facade->findEncabezado($id_cda);
        
        //=====================Puntos solicitados y Codigo solicitud Tecnico=========================================================//
        $analizar_informacion=$facade->findModelAnalisis($id_cda);
        $registrar_datos_solicitante=$facade->findModelRegistrarDatos($id_cda);
        
        
        
        //==========================Solicitud Informacion ==============================================================================
        $facade2 = new CdaSolicitudInformacionControllerFachada();
        $solicitar_informacion = $facade2->getSolicitudes($id_cda,$id_cactividad_proceso);
        
        //====================Respuesta soliicitud informacion ==========================================================================
        $facade2 = new CdaSolicitudInformacionControllerFachada();
        $respuesta_informacion = $facade2->getSolicitudes2($id_cda,$id_cactividad_proceso);
        
        
        //=======================FALTA REGISTRO $datos_tecnicos de la solicitud ===========================================================================
        //puede ser un objeto o un array
        $facade2=new CdaReporteInformacionControllerFachada();
        $datos_tecnicos= $facade2->actiongetDatosTecnicos($id_cda, $id_cactividad_proceso);
        
        
        //=======================FALTA DATOS SENAGUA======================================================================================
        $datos_senagua= $facade2->actiongetDatosSenagua($id_cda, $id_cactividad_proceso);
       
        
         //=======================FALTA DATOS EPA======================================================================================
        $datos_epa=$facade2->actiongetDatosEpa($id_cda, $id_cactividad_proceso);
        
         //=======================FALTA ERRORES======================================================================================
        $error_pres=$facade2->actiongetErrores($id_cda);
        
        //=======================FALTA DATOS_VISTA======================================================================================
        $datos_visita=$facade2->actiongetVisita($id_cda, $id_cactividad_proceso);
        
        //=======================FALTA REGISTRO CDA======================================================================================
        $registro_cda=$facade2->actiongetDatosRegistroCDApdf($id_cda, $id_cactividad_proceso);
        
        //==========================ANALISIS HIDROLOGICOS===========================================================================
        $analisis_hidrologico=$facade2->actiongetAnalisisHidrologico($id_cda);
        
        
        //======================ULTIMA LINEA DE PUNTOS===================================================================================
        $puntos=array();
        
        $_callhelper = New helperHTML();
        $_stringhtml = $_callhelper->gen_htmlCDA($encabezado, $analizar_informacion, $registrar_datos_solicitante, $solicitar_informacion,$respuesta_informacion,$datos_tecnicos,$datos_senagua,$datos_epa,$error_pres,$datos_visita,$registro_cda,$puntos,$analisis_hidrologico);
        $nombre_formato = 'CDA '.$encabezado[0]['numero'];
        
        //Iniciando array de retorno
        $datos=[];
        
        //Declarando Metodos header and footer
        $methods = [ 
            'SetHeader'=>['CDA'], 
            'SetFooter'=>['{PAGENO}'],
        ];
        
        $GeneraPdf = new genPDF();
        $propiedades=array('formato'=>$GeneraPdf::FORMATO_A4,'destino'=>$GeneraPdf::DESTINO_NAVEGADOR,'orientation'=>$GeneraPdf::ORIENTACION_HORIZONTAL);
        $retorno=$GeneraPdf->generadorPDF($_stringhtml,$nombre_formato,$propiedades,null,$methods,null,'@vendor/kartik-v/yii2-mpdf/assets/cda.css');
        $datos['pdf']=$retorno; 
    }
    
}
