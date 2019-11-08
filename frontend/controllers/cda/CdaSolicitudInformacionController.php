<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\CdaSolicitudInformacionControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdasolicitudinformacionController implementa las acciones a través del sistema CRUD para el modelo CdaSolicitudInformacion.
 */
class CdaSolicitudInformacionController extends ControllerPry
{
  //private $facade =    CdasolicitudinformacionControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  CdaSolicitudInformacionControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null,$id_cda,$id_cactividad_proceso){
            $facade =  new  CdasolicitudinformacionControllerFachada;
            echo $facade->actionProgress($urlroute,$id,$id_cda,$id_cactividad_proceso);
    }

	
	
    /**
     * Listado todos los datos del modelo CdaSolicitudInformacion que se encuentran en el tablename.
     * @return mixed
     * @id_cda_tramite => para las actividades superior a 200 es id_cda_tramite tipo=2
     * @id_cda_solcitud => para la actividad 13 es id_cda_solicitud tipo=1
     */
    public function actionIndex($id_cda_tramite=null,$id_cda_solicitud=null,$actividadactual,$labelmiga,$id_cproceso,$tipo)
    {
        $facade =  new  CdaSolicitudInformacionControllerFachada;
        
        if(is_null($id_cda_tramite)){
            $dataAndModel= $facade->actionIndexSolicitud(Yii::$app->request->queryParams,$id_cda_solicitud,$actividadactual,$id_cproceso);
        }else{
            $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams,$id_cda_tramite,$actividadactual,$id_cproceso);
        }
       
        
        if($actividadactual == '209'){                                 //Modificado 2019-03-13
            return $this->render('index', [
                'searchModel' => $dataAndModel['searchModel'],
                'dataProvider' => $dataAndModel['dataProvider'],
                'id_cda_tramite' =>$id_cda_tramite,
                'id_cactividad_proceso'=>$dataAndModel['pscactividadproceso']->id_cactividad_proceso,
                'encabezado'=>$dataAndModel['encabezado'],
                'labelmiga'=>$labelmiga,
                'id_cproceso'=>$id_cproceso,
                'actividadactual'=>$actividadactual
            ]);
        }else if($actividadactual == '227' or $actividadactual == '205'){
                  
            return $this->render('datossalida', [
                'searchModel' => $dataAndModel['searchModel'],
                'dataProvider' => $dataAndModel['dataProvider'],
                'id_cda_tramite' =>$id_cda_tramite,
                'id_cactividad_proceso'=>$dataAndModel['pscactividadproceso']->id_cactividad_proceso,
                'encabezado'=>$dataAndModel['encabezado'],
                'labelmiga'=>$labelmiga,
                'id_cproceso'=>$id_cproceso,
                'actividadactual'=>$actividadactual,
                'enableCreate'=>$dataAndModel['enableCreate']
            ]); 
        }else if($actividadactual== '13'){
            
            return $this->render('indexsolicitud', [
                'searchModel' => $dataAndModel['searchModel'],
                'dataProvider' => $dataAndModel['dataProvider'],
                'encabezado'=>$dataAndModel['encabezado'],
                'labelmiga'=> $labelmiga,
                'id_cda_solicitud' => $id_cda_solicitud,
                'id_cproceso' => $id_cproceso,
                'actividadactual' => $actividadactual,
                'id_cactividad_proceso'=>$dataAndModel['pscactividadproceso']->id_cactividad_proceso,
            ]);
        }

    }

    /**
     * Presenta un dato unico en el modelo CdaSolicitudInformacion.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  CdasolicitudinformacionControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Permite dar respuesta a una solicitud para la actividad 211
     * $clase => TRUE
     * $id_cda_tramite => id del registro en la tabla $id_cda_tramite
     * $id_cactividad_proceso => ultima actividad del proceso registrada
     * @return mixed
     */
    public function actionCreate($id_cda_tramite,$id_cactividad_proceso,$labelmiga)
    {
       $facade =  new  CdasolicitudinformacionControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cda_tramite,$id_cactividad_proceso);
       $model = $modelE['model'];
       
       
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            /*
             * Se envia la index $actividadactual,$labelmiga,$id_cproceso,$tipo
             */
            return  $this->redirect(['index','id_cda_tramite' => $id_cda_tramite, 'labelmiga' =>$labelmiga,'tipo'=>2,'actividadactual'=> $modelE['actividadactual'],'id_cproceso'=>$modelE['id_cproceso']]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        '_ajax'=>TRUE,
                        'model' => $model,
                        'listinfofaltante' => $modelE['listinfofaltante'],
                        'listtiporeporte'=>$modelE['listtiporeporte'],
                        'listtipoatencion'=>$modelE['listtipoatencion']
                        
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
                'listinfofaltante' => $modelE['listinfofaltante'],
                'listtiporeporte'=>$modelE['listtiporeporte'],
                'listtipoatencion'=>$modelE['listtipoatencion']
               
            ]);
        }
    }
    
    /*
     * Creando datos salida para la actividad 13 que hace parte de cda_solicitud
     */
    public function actionCreatesolicitud($id_cda_solicitud,$labelmiga,$id_cproceso,$actividadactual){
        
        $facade =  new  CdasolicitudinformacionControllerFachada;
        $modelE= $facade->actionCreateSolicitud(Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cda_solicitud,$actividadactual,$id_cproceso);
        $model = $modelE['model'];
        $listadocdas=array();
        
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['index','id_cda_solicitud' => $id_cda_solicitud, 'labelmiga' =>$labelmiga,'tipo'=>1,'actividadactual'=> $actividadactual,'id_cproceso'=>$modelE['id_cproceso']]);		
			
        }elseif($modelE['create']=='Ajax'){
            
                $datasend = [
                            '_ajax'=>TRUE,
                            'model' => $model,
                            'listinfofaltante' => $modelE['listinfofaltante'],
                            'listtiporeporte'=>$modelE['listtiporeporte'],
                            'listtipoatencion'=>$modelE['listtipoatencion'],
                            'ps_cproceso'=>$id_cproceso,
                            'actividadactual'=> $actividadactual,
                            'listadocdas' => $listadocdas,
                            'listadodemarcacion'=>$modelE['demarcaciones'],
                            'listadocentro'=>$modelE['centros'],
                            'botondisabled'=>FALSE
                        ];
                
            return $this->renderAjax('createdatosalida',$datasend);
        } 
        else {
            return $this->render('createdatosalida', [
               'model' => $model,
                'listinfofaltante' => $modelE['listinfofaltante'],
                'listtiporeporte'=>$modelE['listtiporeporte'],
                'listtipoatencion'=>$modelE['listtipoatencion'],
                'ps_cproceso'=>$id_cproceso,
                'actividadactual'=> $actividadactual,
                'listadocdas' => $listadocdas,
                'listadodemarcacion'=>$modelE['demarcaciones'],
                'listadocentro'=>$modelE['centros'],
                'botondisabled'=>FALSE
               
            ]);
        }
        
    }
    
    
    
    /*
     * Creando datos de salida actividad 225
     */
    
    public function actionCreatedatossalida($id_cda_tramite,$id_cactividad_proceso,$labelmiga,$id_cproceso,$actividadactual)
    {
       //Obteniendo cda's======================================================
       $listadocdas = $this->getCdas($id_cproceso); 
       if(!empty($listadocdas)){
           $cda_Flag= 1;
       } else{
           $cda_Flag = 0;
       }
       
       $facade =  new  CdasolicitudinformacionControllerFachada;
       $modelE= $facade->actionCreatedatossalida(Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cda_tramite,$id_cactividad_proceso,$actividadactual,$id_cproceso,$cda_Flag);
       $model = $modelE['model'];
              
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['index','id_cda_tramite' => $id_cda_tramite, 'labelmiga' =>$labelmiga,'tipo'=>2,'actividadactual'=> $actividadactual,'id_cproceso'=>$modelE['id_cproceso']]);		
			
        }elseif($modelE['create']=='Ajax'){
            
                $datasend = [
                            '_ajax'=>TRUE,
                            'model' => $model,
                            'listinfofaltante' => $modelE['listinfofaltante'],
                            'listtiporeporte'=>$modelE['listtiporeporte'],
                            'listtipoatencion'=>$modelE['listtipoatencion'],
                            'ps_cproceso'=>$id_cproceso,
                            'actividadactual'=> $actividadactual,
                            'listadocdas' => $listadocdas,
                            'listadodemarcacion'=>$modelE['demarcaciones'],
                            'listadocentro'=>$modelE['centros'],
                            'botondisabled'=>TRUE
                        ];
                
            return $this->renderAjax('createdatosalida',$datasend);
        } 
        else {
            return $this->render('createdatosalida', [
                'model' => $model,
                'listinfofaltante' => $modelE['listinfofaltante'],
                'listtiporeporte'=>$modelE['listtiporeporte'],
                'listtipoatencion'=>$modelE['listtipoatencion'],
                'ps_cproceso'=>$id_cproceso,
                'actividadactual'=> $actividadactual
               
            ]);
        }
    }
    
    /*
     * funcion que entrega listados de cda's
     */
    protected function getCdas($ps_cproceso){
        
        $_cdas = \common\models\cda\PsCodCda::find()
                ->leftJoin('cda','cda.id_cda = ps_cod_cda.id_cda')
                ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda.id_cactividad_proceso')    
                ->where(['id_cproceso'=>$ps_cproceso])->all();
        
        return $_cdas;
    }
    

    /**
     * Modifica un dato existente en el modelo CdaSolicitudInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$id_cda,$id_cactividad_proceso,$_labelmiga)
    {
        $facade =  new  CdasolicitudinformacionControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cactividad_proceso);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
             return  $this->redirect(['index','id_cda' => $id_cda, 'id_cactividad_proceso' =>$id_cactividad_proceso,'tipo'=>2,'_labelmiga'=> $_labelmiga ]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        '_ajax'=>TRUE,
                        'model' => $model,
                        'listinfofaltante' => $modelE['listinfofaltante'],
                        'listtiporeporte'=>$modelE['listtiporeporte'],
                        'listtipoatencion'=>$modelE['listtipoatencion'],
                        'clase' => TRUE
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,
                'listinfofaltante' => $modelE['listinfofaltante'],
                'listtiporeporte'=>$modelE['listtiporeporte'],
                'listtipoatencion'=>$modelE['listtipoatencion'],
                'clase' => TRUE
            ]);
        }
    }
    
    /**
     * Modifica un dato existente en el modelo CdaSolicitudInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatesolicitud($id,$id_cda,$id_cactividad_proceso,$_labelmiga)
    {
        $facade =  new  CdasolicitudinformacionControllerFachada;
        $modelE= $facade->actionUpdatesolicitud($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cactividad_proceso);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
             return  $this->redirect(['index','id_cda' => $id_cda, 'id_cactividad_proceso' =>$id_cactividad_proceso,'tipo'=>2,'_labelmiga'=> $_labelmiga ]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('updatesol', [
                        '_ajax'=>TRUE,
                        'model' => $model,
                        'listinfofaltante' => $modelE['listinfofaltante'],
                        'listtiporeporte'=>$modelE['listtiporeporte'],
                        'listtipoatencion'=>$modelE['listtipoatencion'],
                        'clase' => TRUE
            ]);
        } 
        else {
            return $this->render('updatesol', [
                'model' => $model,
                'listinfofaltante' => $modelE['listinfofaltante'],
                'listtiporeporte'=>$modelE['listtiporeporte'],
                'listtipoatencion'=>$modelE['listtipoatencion'],
                'clase' => TRUE
            ]);
        }
    }
    
    
    /*
     * Modifica para datos salida 
     */
     public function actionUpdatedatosalida($id,$id_cda_tramite,$id_cproceso,$id_cactividad_proceso,$labelmiga,$actividadactual)
    {
       $listadocdas = $this->getCdas($id_cproceso); 
       if(!empty($listadocdas)){
           $cda_Flag= 1;
       } else{
           $cda_Flag = 0;
       } 
         
        $facade =  new  CdasolicitudinformacionControllerFachada;
        $modelE= $facade->actionUpdatedatossalida($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cda_tramite,$id_cactividad_proceso,$actividadactual,$cda_Flag);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['index','id_cda_tramite' => $id_cda_tramite, 'labelmiga' =>$labelmiga,'tipo'=>2,'actividadactual'=> $modelE['actividadactual'],'id_cproceso'=>$modelE['id_cproceso']]);		
	
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('updatedatossalida', [
                        '_ajax'=>TRUE,
                        'model' => $model,
                        'listinfofaltante' => $modelE['listinfofaltante'],
                        'listtiporeporte'=>$modelE['listtiporeporte'],
                        'listtipoatencion'=>$modelE['listtipoatencion'],
                        'ps_cproceso'=>$id_cproceso,
                        'actividadactual'=> $actividadactual,
                        'clase' => TRUE,
                        'listadocdas' => $listadocdas,
                        'listadodemarcacion'=>$modelE['demarcaciones'],
                        'listadocentro'=>$modelE['centros'],
                        'listadocodcanton'=>$modelE['listadocodcanton'],
                        'botondisabled'=>TRUE
            ]);
        } 
        else {
            return $this->render('updatedatossalida', [
                'model' => $model,
                'listinfofaltante' => $modelE['listinfofaltante'],
                'listtiporeporte'=>$modelE['listtiporeporte'],
                'listtipoatencion'=>$modelE['listtipoatencion'],
                'ps_cproceso'=>$id_cproceso,
                'actividadactual'=> $actividadactual,
                'clase' => TRUE,
                'listadocdas' => $listadocdas,
                'listadodemarcacion'=>$modelE['demarcaciones'],
                'listadocentro'=>$modelE['centros'],
                'listadocodcanton'=>$modelE['listadocodcanton'],
                'botondisabled'=>TRUE
            ]);
        }
    }
    
    
    

    /**
     * Deletes an existing CdaSolicitudInformacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id,$id_cda_tramite,$id_cactividad_proceso,$id_cproceso,$labelmiga,$actividadactual)
    {
        $facade =  new  CdasolicitudinformacionControllerFachada;
        $facade->actionDeletep($id,$id_cda_tramite,$id_cactividad_proceso);
          
        return  $this->redirect(['index','id_cda_tramite' => $id_cda_tramite, 'id_cactividad_proceso' =>$id_cactividad_proceso,'tipo'=>2,'labelmiga'=>$labelmiga,'id_cproceso'=>$id_cproceso,'actividadactual'=>$actividadactual]);
    }

    
    public function actionHabilitar($valor){
        return $valor;
    }
    
    
    public function actionInfocda($id=null){
        
        $basicas = New BasicController();
        $respuestas=Array();
        
        if(is_null($id)){
            $respuestas['id_demarcacion']="";
            $respuestas['id_centro']="";
            $respuestas['centros']="";
            $respuestas['q_solicitado']="";
            
        }else{
        
            $_cda = \common\models\cda\Cda::find()
                    ->leftJoin('ps_cod_cda', 'ps_cod_cda.id_cda = cda.id_cda')->where(['ps_cod_cda.id_cod_cda'=>$id])->one();

            $respuestas['id_demarcacion'] = $_cda->id_demarcacion;
            $respuestas['id_centro'] = $_cda->cod_centro_atencion_ciudadano;
            $respuestas['beneficiario_representante'] = $_cda->solicitante;
            $respuestas['beneficiario_razonsocial'] = $_cda->institucion_solicitante;
            $respuestas['fecha_ingreso_quipux'] = $_cda->fecha_ingreso_quipux;
            $respuestas['fecha_oficio'] = $_cda->fecha_oficio;
            $respuestas['fecha_ingreso_anexos_fisicos'] = $_cda->fecha_ingreso_anexos_fisicos;
            $respuestas['fecha_recepcion_anexos'] = $_cda->fecha_recepcion_anexos;
            
            
            //Informacion para canton y provincia ====================================================================
            $_reporteprov = \common\models\cda\CdaReporteInformacion::find()->where(['id_cod_cda'=>$id,'id_actividad'=>'223'])->with('fdUbicacion')->one();

            if(!empty($_reporteprov['fdUbicacion']->cod_provincia)){
               $cantones = $basicas->codcanton_cda($_reporteprov['fdUbicacion']->cod_provincia);
                  
                $respuestas['cod_provincia'] = $_reporteprov['fdUbicacion']->cod_provincia;
                $respuestas['cod_canton'] = $_reporteprov['fdUbicacion']->cod_canton;
                $respuestas['cantones'] = $cantones;
            }else{
                $respuestas['cod_provincia'] = '';
                $respuestas['cod_canton'] = '';
                $respuestas['cantones'] = '';
            }


            //Recogiendo centros asociados ===========================================================================
            $centrociudadano = $basicas ->centrociudadano_cda($_cda->id_demarcacion);
            $respuestas['centros'] = $centrociudadano;

            //Recogiendo informacion de caudal solicitado =================================
            $_reporteinfo = \common\models\cda\CdaReporteInformacion::find()->where(['id_cod_cda'=>$id,'id_actividad'=>'214'])->one();

            $respuestas['q_solicitado'] = round($_reporteinfo->q_solicitado,2);
            $respuestas['id_uso_solicitado'] = $_reporteinfo->id_uso_solicitado;
            $respuestas['id_destino'] = $_reporteinfo->id_destino;
            
            

            $retorna = json_encode($respuestas, JSON_PRETTY_PRINT);
        }
        
        return $retorna;
        
    }
}
