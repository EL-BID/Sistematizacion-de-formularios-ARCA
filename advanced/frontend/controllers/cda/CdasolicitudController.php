<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\CdasolicitudControllerFachada;
use frontend\controllers\cda\BasicController;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\data\ArrayDataProvider;
use common\general\documents\genPDF;

/**
 * CdasolicitudController implementa las acciones a través del sistema CRUD para el modelo CdaSolicitud.
 */
class CdasolicitudController extends ControllerPry
{
  //private $facade =    CdasolicitudControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  CdasolicitudControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id_cda_solicitud=null,$labelmiga=null){
            $facade =  new  CdasolicitudControllerFachada;
            echo $facade->actionProgress($urlroute,$id_cda_solicitud,$labelmiga);
    }

	
	
    /**
     * Listado todos los datos del modelo CdaSolicitud que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  CdasolicitudControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo CdaSolicitud.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  CdasolicitudControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaSolicitud .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  CdasolicitudControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
       $modelpscproceso = $modelE['modelpscproceso'];
       
       
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            //return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_cda_solicitud]);		
            return  $this->redirect(['progress', 'urlroute' => 'pantallaprincipal']);
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model,'modelpscproceso' => $modelpscproceso,'_ajax' => true,'listadodemarcacion'=>$modelE['demarcaciones']
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,'modelpscproceso' => $modelpscproceso,'listadodemarcacion'=>$modelE['demarcaciones']
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo CdaSolicitud.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($labelmiga,$id_cda_solicitud,$id_cproceso,$actividadactual)
    {
        $facade =  new  CdasolicitudControllerFachada;
        $modelE= $facade->actionUpdate($id_cda_solicitud,$id_cproceso,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];
        $modelpscproceso = $modelE['modelpscproceso'];
        $encabezado = $modelE['encabezado'];
        
    
        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');	
            return  $this->redirect(['progress', 'urlroute' => 'subproceso','id_cda_solicitud'=>$model->id_cda_solicitud,'labelmiga'=>$labelmiga]);
      
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model,'modelpscproceso' => $modelpscproceso,'encabezado'=>$encabezado,'labelmiga'=>$labelmiga,'modelpsactividad'=>$modelE['modelpsactividad'],'stringClasificacion'=>$modelE['stringClasificacion'],'listadodemarcacion'=>$modelE['demarcaciones'],'listadocentro'=>$modelE['centros'],
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,'modelpscproceso' => $modelpscproceso, 'encabezado'=>$encabezado,'labelmiga'=>$labelmiga,'listadodemarcacion'=>$modelE['demarcaciones'],'modelpsactividad'=>$modelE['modelpsactividad'],'stringClasificacion'=>$modelE['stringClasificacion'],'listadocentro'=>$modelE['centros'],
            ]);
        }
    }

    /**
     * Deletes an existing CdaSolicitud model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  CdasolicitudControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
    /* Funcion para presentar la pantalla principal de solicitudes
    2018-02-21 -- Diana    */
    
     public function actionPantallaprincipal()
    {
        if (empty(Yii::$app->user->identity->usuario)) {
            return $this->redirect(['site/index']);
        }

        //Se modifica el codigo en la pantalla principal apareceran las solicitudes ==== tomado de la tabla cda_solicitudes
        $facade = new CdasolicitudControllerFachada();
        $dataAndModel = $facade->actionPantallaprincipal(Yii::$app->request->queryParams);

        $datos = new ArrayDataProvider([
                   'allModels' => $dataAndModel['dataProvider'],
                   'pagination' => [
                       'pageSize' => 10,
                   ],
                   'sort' => [
                       'attributes' => ['id_cda_solicitud', 'numero', 'nom_actividad', 'nom_eproceso', 'nombres', 'ult_fecha_actividad', 'ult_fecha_estado', 'id_cproceso', 'ult_id_actividad', 'fecha_solicitud'],
                   ],
               ]);

        //Habilitando Boton de CREAR CDA==================================================================
        $_botoncrear = in_array(Yii::$app->user->identity->codRols[0]->cod_rol, [10,12]);
        
        /* Llamando a funciones de basicas =============================================================*/
        $basicas = new BasicController();        
        
        //Estado para CDA=================================================================================
        $id_proceso='1';
        $_listestados = $basicas->list_estados_cda($id_proceso);
        
        //Tipos de procesos =============================================================================
        $tiproceso = array('1');
        $_listprocesos = $basicas->list_procesos($tiproceso);
        
        //Listado de Usuarios============================================================================
        $_listusuarios = $basicas->findUsuarios(Yii::$app->user->identity->id_usuario);

        //Listado de Actividades=========================================================================
        $_listactividades = $basicas->findActividades($id_proceso,null);

        return $this->render('pantallaprincipal', [
            'searchModel' => $dataAndModel['searchModel'],'listprocesos'=>$_listprocesos,
            'dataProvider' => $datos, 'botoncrear' => $_botoncrear, 'listestados' => $_listestados, 'listresponsables' => $_listusuarios, 'listactividades' => $_listactividades,
        ]);
    }
    
    
    /*
     * Pantalla para el subproceso de la solicitud
     */
    public function actionSubproceso($id_cda_solicitud,$labelmiga,$numero=null){
        
        if(empty(Yii::$app->user->identity->usuario)){
             return $this->redirect(['site/index']);
        }
        
        //Guardando en Trazabilidad Informacion el acceso=====================================================================//
        Yii::info("Ingreso al módulo CDA numero de Solicitud: ".$numero."&6&1","Trazabilidad");
       
        //Procesando la informacion ============================================================================
        $facade = new CdasolicitudControllerFachada();
        $_dataP = $facade->actionProceso($id_cda_solicitud,'1');
        
        //Pasando validacion del ultimo usuario asignado =====================================================
        if($_dataP['asignaciones']['ult_id_usuario'] == Yii::$app->user->identity->id_usuario){
            $editar_actividad = TRUE;
        }else{
            $editar_actividad = FALSE;
        }

        return $this->render('subproceso', ['encabezado'=>$_dataP['encabezado'][0],
                                            'labelmiga' =>$labelmiga,
                                            'tipo'=>'Solicitud',
                                            'actividades'=>$_dataP['actividades'],
                                            'editarActividad'=>$editar_actividad,
                                            'asignaciones'=>$_dataP['asignaciones'],
                                            'actividadactual'=>$_dataP['actividadactual'],
                                            'actividadruta'=>$_dataP['actividadruta'],
                                            'habContinuidad'=>$_dataP['habactividades']
                                            ]);
    }
    
    
    /*
     * Funcion que genera el archivo pdf de reporte final de la CDA SOLICITUD 
     * seleccionada
     */
    
    /*
    *
     * Funcion PDF 
     */
    public function actionPdf($id_cda_solicitud){
        
        $html="";
        $searchModel = new \common\models\cda\PantallaprincipalSearch();
        $searchModel->id_cda_solicitud = $id_cda_solicitud; 
               
        $params=array();
        $encabezado = $searchModel->search($params);
        
        //Datos Administrativos de la solicitud CDA =====================================
        $basicas = new BasicController();
        
        //Informacion de tramites ==========================================================
        $tramites=$basicas->CdaTramites($id_cda_solicitud);
        $sendHtml=array();
        
        foreach($tramites as $_cltramite){
                
            $_idtramite = $_cltramite->id_cda_tramite;
            $_pscproceso = $_cltramite->id_cproceso;
            
            
            //Cabezote 1 =================================================================
            $sendHtml[$_idtramite]['num_tramite'] = $_cltramite->num_tramite;
            $sendHtml[$_idtramite]['usuario'] = $_cltramite->usuario;
            $sendHtml[$_idtramite]['cod_solicitud_tecnico'] = $_cltramite->cod_solicitud_tecnico;
            
            
            //Puntos ======================================================================
            $_datossalida = $basicas->cdaCertificados($_idtramite);
            $sendHtml[$_idtramite]['puntos_solicitados'] = (!empty($_datossalida->puntos_solicitados))? $_datossalida->puntos_solicitados:'';
            
            //Datos Basicos =================================================================
            $_datosBasicos = $basicas->CdadatosBasicos($_pscproceso);
            $centroatencion = (!empty($_datosBasicos->cod_centro_atencion_ciudadano))? $basicas->CentroAtencion($_datosBasicos->cod_centro_atencion_ciudadano):'';
            $demarcaciones =(!empty($_datosBasicos->id_demarcacion))?  $basicas->Demarcacion($_datosBasicos->id_demarcacion):'';

            $sendHtml[$_idtramite]['solicitante'] = (!empty($_datosBasicos))? $_datosBasicos->solicitante:'';
            $sendHtml[$_idtramite]['institucion_solicitante'] = (!empty($_datosBasicos))? $_datosBasicos->institucion_solicitante:'';
            $sendHtml[$_idtramite]['nom_centro_atencion_ciudadano'] = (!empty($centroatencion))? $centroatencion->nom_centro_atencion_ciudadano:'';
            $sendHtml[$_idtramite]['nombre_demarcacion'] = (!empty($demarcaciones->nombre_demarcacion))? $demarcaciones->nombre_demarcacion:'';
            
            //Solicitud informacion ==========================================================
            $sendHtml[$_idtramite]['solicitud_informacion'] = $basicas->SolicitudInformacion($_pscproceso); 
            
            //Registrar respuestas ============================================================
            $sendHtml[$_idtramite]['registrar_respuestas'] = $basicas->RegistraRespuesta($_pscproceso); 
             
            //Datos Tecnicos de la Solicitud ==================================================
            $sendHtml[$_idtramite]['datos_tecnicos_solicitud'] = $basicas->ReporteInformacion($_pscproceso,'214');
//            print("<pre>".print_r($sendHtml[$_idtramite]['datos_tecnicos_solicitud'],true)."</pre>");
            
            //Datos Senagua ===================================================================
            $sendHtml[$_idtramite]['datos_senagua'] = (array) $basicas->ReporteInformacion($_pscproceso,'215');
            
            //Datos Otras Instituciones ========================================================
            $sendHtml[$_idtramite]['otras_instituciones'] = (array) $basicas->ReporteInformacion($_pscproceso,'216');
            
            //Errores Presentacios ==============================================================
            $sendHtml[$_idtramite]['error_pres'] = (array) $basicas->Errorescda($_pscproceso);
            
            //DATOS VISITA ===================================================================
            $sendHtml[$_idtramite]['datos_visita'] = (array) $basicas->ReporteInformacion($_pscproceso,'220');
    
            //ANALISIS HIDROLOGICO ===========================================================
            $sendHtml[$_idtramite]['analisis_hidrologico'] = (array) $basicas->AnalisisHidrologico($_pscproceso);
            
            //REGISTRAR DATOS CERTIFICADOS ==================================================
            $sendHtml[$_idtramite]['registra_datos'] = (array) $basicas->ReporteInformacion($_pscproceso,'223');
            
        }
        
        //Puntos Solicitados y codigo Solicitud Tecnico ==================================
        $analizar_informacion=$basicas->cdaCertificadosSolicitud($id_cda_solicitud);

        
//        Sacando contenido HTML =========================================================
        $_callhelper = new \frontend\helpers\helperHTML();
        
        $_stringhtml = $_callhelper->gen_htmlCDA($encabezado[0], $analizar_informacion, $sendHtml);
        
//        echo $_stringhtml;
        $nombre_formato = 'CDA '.$encabezado[0]['numero'];

        //Iniciando array de retorno
        $datos = [];

        //Declarando Metodos header and footer
        $methods = [
            'SetHeader' => ['CDA'],
            'SetFooter' => ['{PAGENO}'],
        ];

        $GeneraPdf = new genPDF();
        $propiedades = array('formato' => $GeneraPdf::FORMATO_A4, 'destino' => $GeneraPdf::DESTINO_NAVEGADOR, 'orientation' => $GeneraPdf::ORIENTACION_HORIZONTAL);
        $retorno = $GeneraPdf->generadorPDF($_stringhtml, $nombre_formato, $propiedades, null, $methods, null, '@vendor/kartik-v/yii2-mpdf/assets/cda.css');
        $datos['pdf'] = $retorno;
    }
    
    
    /*
     * 
     */
    
    public function actionCentrociudadano($id=null){
    
        $basicas = New BasicController();
        $centrociudadano = $basicas ->centrociudadano($id);
        
        return $centrociudadano;
        
    }
    
    
    /*
     * 
     */
    public function actionCronograma(){
        
        
        $basicas = New BasicController();
        $string = $basicas->genHTMLCronograma();
        
        return $this->render('cronograma', ['string'=>$string]);
    }
}
