<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\CdaSolicitud;
use common\models\cda\CdaSolicitudSearch;
use common\models\cda\PsCproceso;
use common\controllers\controllerspry\FachadaPry;
use common\models\cda\PantallaprincipalSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\base\Model;


use common\models\cda\PsCactividadProceso;
use common\models\cda\PsResponsablesProceso;
use common\models\cda\PsHistoricoEstados;

/**
 * CdasolicitudControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo CdaSolicitud.
 */
class CdasolicitudControllerFachada extends FachadaPry
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
	
	public function actionProgress($urlroute=null,$id_cda_solicitud=null,$labelmiga=null){
		
	
            $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif').'</div>';
            $progressbar = $progressbar."<div style='text-align:center'>Guardando</div>";
            $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id_cda_solicitud' => $id_cda_solicitud,'labelmiga'=>$labelmiga])."'>";
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo CdaSolicitud que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
        $searchModel = new CdaSolicitudSearch();
        $dataProvider = $searchModel->search($queryParams);

        return [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ];
    }

    /**
     * Presenta un dato unico en el modelo CdaSolicitud.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaSolicitud .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax)
    {
        
        $fechaactual = date(Yii::$app->fmtfechaphp);
        $fechahoraactual = date(Yii::$app->fmtfechahoraphp);
        $model = new CdaSolicitud();
        
        //Llamando a basicas ===================================================================
        $basicas = New BasicController();
        
        //Modelos de los procesos senagua y arca ================================================
        $model2 = new PsCproceso();
        $model2->setScenario('pscprocesoarca');

        $model3 = new PsCproceso();
        $model3->setScenario('pscprocesoseagua');

        $model_pscproceso = ['model2' => $model2, 'model3' => $model3];

        //Sacando listado de demarcaciones =================================================
        $demarcaciones = $basicas->listDemarcaciones();
        
        if ($model->load(Yii::$app->request->post())) {
            
                //Guarndado proceso ARCA==================================================================================
                $transaction = Yii::$app->db->beginTransaction();
                
                if (Model::loadMultiple($model_pscproceso, Yii::$app->request->post()) && Model::validateMultiple($model_pscproceso)) {
                    
                    //Generando codigo CDA ============================================================================
                    $model->num_solicitud = $basicas->codigoSolicitud();
                    
                    $model2 = $model_pscproceso['model2'];
                    $model3 = $model_pscproceso['model3'];

                    $model2->numero = $model->num_solicitud;
                    $model2->ult_id_eproceso = 1;
                    $model2->id_proceso = 1;
                    $model2->id_usuario = Yii::$app->user->identity->Id;
                    $model2->id_modulo = 2;
                    $model2->fecha_registro_quipux = $model->fecha_ingreso;
                    $model2->asunto_quipux = null;              //No se que asunto aplica aqui de donde sale este texto
                    $model2->tipo_documento_quipux = null;
                    $model2->ult_id_actividad = 1;              //Se modifica ult_id_actividad por 200 dado que es la inicial de tramite
                    $model2->ult_id_usuario = Yii::$app->user->identity->Id;
                    $model2->ult_fecha_actividad = $fechaactual;
                    $model2->ult_fecha_estado = $fechaactual;

                    if ($model2->save()) {
                        $id_cprocesoarca = $model2->id_cproceso;
                        
                        //Guardando proceso SEAGUA===================================================================================
                        if ($model3->load(Yii::$app->request->post())) {
                                $model3->ult_id_eproceso = null;
                                $model3->id_proceso = null;
                                $model3->id_usuario = Yii::$app->user->identity->Id;
                                $model3->id_modulo = null;
                                $model3->fecha_registro_quipux = null;
                                $model3->asunto_quipux = null;
                                $model3->tipo_documento_quipux = null;
                                $model3->ult_id_actividad = 1;
                                $model3->ult_id_usuario = Yii::$app->user->identity->Id;
                                $model3->ult_fecha_actividad = $fechaactual;
                                $model3->ult_fecha_estado = $fechaactual;
                                $model3->numero = null;

                                if ($model3->save()) {
                                    
                                    $id_cprocesoseagua = $model3->id_cproceso;
                                    //Guardando Solicitud==============================================================================
                                    $model->id_cproceso_arca = $id_cprocesoarca;
                                    $model->id_cproceso_senagua = $id_cprocesoseagua;
                                    
                                 
                                    
                                    if ($model->save()) {
                                        
                                        $model4 = new PsHistoricoEstados();
                                        $model4->fecha_estado = $fechaactual;
                                        $model4->observaciones = null;
                                        $model4->id_eproceso = 1;
                                        $model4->id_cproceso = $id_cprocesoarca;
                                        $model4->id_usuario = Yii::$app->user->identity->Id;
                                        $model4->id_actividad = 1;
                                        $model4->id_tgestion = null;
                                        
                                        if ($model4->save()) {
                                            
                                            $model5 = new PsCactividadProceso();
                                            $model5->observacion = null;
                                            $model5->fecha_realizacion = $fechaactual;
                                            $model5->fecha_prevista = null;
                                            $model5->numero_quipux = null;
                                            $model5->id_cproceso = $id_cprocesoarca;
                                            $model5->id_usuario = Yii::$app->user->identity->Id;
                                            $model5->id_actividad = 1;
                                            $model5->fecha_creacion = $fechahoraactual;
                                            $model5->diligenciado = 'N';
                                            $model5->tipo='1';

                                            if ($model5->save()) {
                                                
                                                $model6 = new PsResponsablesProceso();
                                                $model6->observacion = null;
                                                $model6->id_cproceso = $id_cprocesoarca;
                                                $model6->id_tresponsabilidad = 1;
                                                $model6->fecha = $fechaactual;
                                                $model6->id_usuario = Yii::$app->user->identity->Id;

                                                if ($model6->save()) {
                                                    $transaction->commit();
                                                    Yii::$app->session->setFlash('FormSubmitted', '2');
                                                    return [
                                                            'model' => $model,
                                                            'modelpscproceso' => $model_pscproceso,
                                                            'create' => 'True',
                                                        ];
                                                }else{
                                                    
//                                                    $errores = $model6->getErrors();
//                                                                    foreach($errores as $clave){
//                                                                        $_revisando = implode(",",$clave);
//                                                                        Yii::trace("sera que asi si: ".$_revisando,"DEBUG");
//                                                                    }
                                                                    
                                                            $transaction->rollBack();
                                                            throw new \yii\web\HttpException(404, 'Error en Responsable Proceso');
                                                }
                                            }else{
                                                
                                                $transaction->rollBack();
                                                throw new \yii\web\HttpException(404, 'Error en Actividad Proceso');
                                            }
                                        }else{
                                            $transaction->rollBack();
                                            throw new \yii\web\HttpException(404, 'Error en Historico Estado');
                                        }
                                        
                                    }else{
                                        $transaction->rollBack();
                                        throw new \yii\web\HttpException(404, 'Error en cda solicitud');
                                    }
                                    
                                }else{
                                    $transaction->rollBack();
                                    throw new \yii\web\HttpException(404, 'Error en proceso arca');
                                }
                        }else{
                            $transaction->rollBack();
                           throw new \yii\web\HttpException(404, 'Error en proceso arca');
                        }

                    }else{
                        $transaction->rollBack();
                        throw new \yii\web\HttpException(404, 'Error en proceso senagua'); 
                    }
                    
                    return [
                        'model' => $model,
                        'modelpscproceso' => $model_pscproceso,
                        'create' => 'True'
                    ];
                }else{
                   
                    return [
                        'model' => $model,
                        'modelpscproceso' => $model_pscproceso,
                        'create' => 'Ajax'
                    ];
                }
        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'modelpscproceso' => $model_pscproceso,
                    'demarcaciones' => $demarcaciones,
                    'create' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                    'modelpscproceso' => $model_pscproceso,
                    'demarcaciones' => $demarcaciones,
                    'create' => 'False'
                ];

        }
    }

    /**
     * Modifica un dato existente en el modelo CdaSolicitud.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id_cda_solicitud,$id_cproceso,$request,$isAjax)
    {
        $fechaactual = date(Yii::$app->fmtfechaphp);
        $fechahoraactual = date(Yii::$app->fmtfechahoraphp);
       
        
        //Agregando campos para guardar en ps_cactividad_proceso========================================================
        $basicas = New BasicController();
        $pscactividad = $basicas->actualPsCactividadProceso($id_cproceso);
        
        //Sacando listado de demarcaciones =============================================================================
        $demarcaciones = $basicas->listDemarcaciones();
        
        
        $facade_ps =  new PsCactividadProcesoControllerFachada;
        $model_ps= $facade_ps->actionUpdatedetproceso($pscactividad->id_cactividad_proceso,'',TRUE,'1',$id_cda_solicitud);
        $model_psc = $model_ps['model'];
        $model_psc->fecha_realizacion = $fechaactual;
        $listcausal = (!empty($model_ps['listcausal']))? $model_ps['listcausal']:'';
        $visibles = $model_ps['visibles'];
        $disabled = $model_ps['disabled'];
        
        
        $string_detalle = $basicas->genHtmlClasificacion($visibles,$listcausal,$disabled);
        
        //Fin de campos para guardar en ps_cactividad_proceso===========================================================
        $model = $this->findModel($id_cda_solicitud);
        
        //Cargando Centro teniendo en cuenta la demarcacion seleccionada ======================
        $centros = $basicas->listcentroatencion($model->id_demarcacion);
        
        $model2 = PsCproceso::findOne($id_cproceso);
        $model2->setScenario('pscprocesoarca');

        $model3 = PsCproceso::findOne($model->id_cproceso_senagua);
        $model3->setScenario('pscprocesoseagua');

        $model_pscproceso = ['model2' => $model2, 'model3' => $model3];
        
        //Datos de Encabezado ===============================================================================
        $searchModel = new PantallaprincipalSearch();
        $searchModel->id_cda_solicitud = $id_cda_solicitud;
        
        /*======================================================================*/
        $params=array();
        $encabezado = $searchModel->search($params);

        if ($model->load( Yii::$app->request->post() ) ){
			
            $transaction = Yii::$app->db->beginTransaction();
                
            if (Model::loadMultiple($model_pscproceso, Yii::$app->request->post()) && Model::validateMultiple($model_pscproceso)) {
            
                //Se agrega el guardar de ps_cactividad_proceso 20190414=========================================================================
               if($model_psc->load(Yii::$app->request->post())){
                   
                   $model_ps= $facade_ps->actionUpdatedetproceso($pscactividad->id_cactividad_proceso,Yii::$app->request->post(),true,'1',$id_cda_solicitud);
                    
                   if($model_ps['update'] != TRUE){
                       throw new \yii\web\HttpException(404, 'Error al guardar trazabilidad '); 
                        $transaction->rollBack();
                   }
               }else{
                    throw new \yii\web\HttpException(404, 'Error al guardar trazabilidad '); 
                    $transaction->rollBack();
               } 
               
               //Se realiza proceso de actividad actual ==========================================================================================
               $model2 = $model_pscproceso['model2'];
               $model2->numero = $model->num_solicitud;
               
               
               $model3 = $model_pscproceso['model3'];
               
               if($model2->save()){
                   
                   if($model3->save()){
                       
                       if($model->save()){
                           
                            $model4 = new PsHistoricoEstados();
                            $model4->fecha_estado = $fechaactual;
                            $model4->observaciones = null;
                            $model4->id_eproceso = 1;
                            $model4->id_cproceso = $model2->id_cproceso;
                            $model4->id_usuario = Yii::$app->user->identity->Id;
                            $model4->id_actividad = $model2->ult_id_actividad;
                            $model4->id_tgestion = null;
                            
                            if($model4->save()){
                    
                                      $transaction->commit();
                                      Yii::$app->session->setFlash('FormSubmitted', '2');

                                     return [
                                        'model' => $model,
                                        'modelpscproceso' => $model_pscproceso,
                                        'encabezado' => $encabezado,
                                        'centros' => $centros,
                                        'update' => 'True',
                                        'demarcaciones' => $demarcaciones,
                                    ];
                               
                                
                            }else{
                                $transaction->rollBack();
                                throw new \yii\web\HttpException(404, 'Error en historico estados'); 
                            }
                       }else{
                            $transaction->rollBack();
                            throw new \yii\web\HttpException(404, 'Error en solicitud'); 
                       }
                       
                   }else{
                        $transaction->rollBack();
                        throw new \yii\web\HttpException(404, 'Error en proceso arca'); 
                   }
                   
               }else{
                   
                    $transaction->rollBack();
                    throw new \yii\web\HttpException(404, 'Error en proceso senagua'); 
               }
                
                
            }else{
               return [
                    'model' => $model,
                    'modelpscproceso' => $model_pscproceso,
                    'encabezado' => $encabezado,
                    'centros' => $centros,
                    'demarcaciones' => $demarcaciones,
                    'update' => 'Ajax'
                ];	
            }
        } 
         elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'modelpsactividad' => $model_psc,
                    'modelpscproceso' => $model_pscproceso,
                    'encabezado' => $encabezado,
                    'stringClasificacion'=>$string_detalle,
                    'centros' => $centros,
                    'demarcaciones' => $demarcaciones,
                    'update' => 'Ajax'
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'modelpscproceso' => $model_pscproceso,
                            'encabezado' => $encabezado,
                            'demarcaciones' => $demarcaciones,
                            'centros' => $centros,
                            'update' => 'False'
                        ];
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
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de CdaSolicitud basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return CdaSolicitud el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = CdaSolicitud::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  CdaSolicitud     */
    protected function findModelByParams($params)
    {
        if (($model = CdaSolicitud::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo CdaSolicitud     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type CdaSolicitud     */
     public function cargaCdaSolicitud($params){
        return $this->findModelByParams($params);
    }
    
    
    /*
     * Funcion que realiza la consulta para traer los datos apresentar
     * en index de solicitudes
     */
     public function actionPantallaprincipal($queryParams)
    {
        $searchModel = new PantallaprincipalSearch();

        //Averiguando si el usuario en session es Tecnico de Recursos Hidricos, si lo es se envie filtro predefinido para responsable
        if (Yii::$app->user->identity->codRols[0]->cod_rol == '1' and empty($queryParams['id_usuario'])) {
            $searchModel->nombres = Yii::$app->user->identity->id_usuario;
        }else if(Yii::$app->user->identity->codRols[0]->cod_rol == '25'){
            $searchModel->roles = Yii::$app->user->identity->codRols[0]->cod_rol; 
        }

        $dataProvider = $searchModel->search($queryParams);

        return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ];
    }
    
    /*
     * Fucion que realiza todo el procesomiento de informacion para la pantalla de Solicitud
     */
    public function actionProceso($id_cda_solicitud,$tipo){
        
        $searchModel = new PantallaprincipalSearch();
        $searchModel->id_cda_solicitud = $id_cda_solicitud;
        
        /*======================================================================*/
        $params=array();
        $encabezado = $searchModel->search($params);
        
        //Sacando datos de basicas =============================================//
        $basicas = new BasicController();
        
        /*Listado de Actividades Ejecutadas===========*/
        $actividades = $basicas->findActividadesCproceso($encabezado[0]['id_cproceso'],$tipo);
        
        /*Ultima activida y usuarios asignado al proceso **********************/
        $pscproceso = $basicas->findUltimaAsignacion($encabezado[0]['id_cproceso']);
        
        //Datos de la actividad actual en la que vamos **********************/
        $actActual = $basicas->findActividades(null,$pscproceso['ult_id_actividad']);
        
        /*Actividad que pueden seguir en la ruta ***************************/
        $actRuta = $basicas->findActividadRuta($actActual['id_actividad']);
        
         /*Revisando si la solicitud va en crear Tramite actividad con id_actividad =6
         * se revisa si el total de tramites guardados en la solicitud, para esto deben exitir 
         * tantos registros en ps_cactividad_proceso con id_actividad=209 y valor 'S' en diligenciado
         * indicados al id_cproceso         */
        if($actActual['id_actividad'] == '6'){
            $habActividades =  $this->CierreTramites($id_cda_solicitud, $encabezado[0]['numero_tramites']);
        }else{
            $habActividades = TRUE;
        }
                
        return ['encabezado' => $encabezado,
                'actividades' => $actividades,
                'asignaciones' => $pscproceso,
                'actividadactual' => $actActual,
                'actividadruta'=>$actRuta,
                'habactividades'=>$habActividades
                ];
    }
    
    
    /*
     * Devuelve true o false si la cantidad de tramites
     * en actividad 209 del id_cproceso es igual a la cantidad
     * de tramites indicada en cda_solicitud
     * @id_cproceso => id_cproceso de la solicitud es igual al id_Cproceso al que se encuentra amarrados los tramites
     * @cantidadTsolicitud => cantidad de tramites que se asignaron a la solicitud segun registro inicial
     */
    
    protected function CierreTramites($id_cda_solicitud,$cantidadTsolicitud){
        
        $ps_Tramites = \common\models\cda\CdaTramite::find()
                        ->leftjoin('ps_cactividad_proceso', 'ps_cactividad_proceso.id_cproceso = cda_tramite.id_cproceso')
                        ->where(['id_cda_solicitud'=>$id_cda_solicitud])
                        ->andwhere(['in','id_actividad',['228','206']])
                        ->count();
        
        Yii::trace("que llega aqui ".$ps_Tramites." y de esto ".$cantidadTsolicitud,"DEBUG");
        if($cantidadTsolicitud == $ps_Tramites){
          return TRUE;   
        }else{
          return FALSE;  
        }
    }
    
    
        
}