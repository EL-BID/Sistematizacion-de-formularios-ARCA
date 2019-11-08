<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\CdaTramite;
use common\models\cda\CdaTramiteSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdatramiteControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo CdaTramite.
 */
class CdatramiteControllerFachada extends FachadaPry
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
	
	public function actionProgress($urlroute=null,$id=null,$id_cda_solicitud=null,$id_cproceso=null,$labelmiga=null,$actividadactual=null){
		
	
            $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif').'</div>';
            $progressbar = $progressbar."<div style='text-align:center'>Guardando</div>";$progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id,'labelmiga' => $labelmiga,'id_cda_solicitud'=>$id_cda_solicitud,'id_cproceso'=>$id_cproceso,'actividadactual'=>$actividadactual])."'>";
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo CdaTramite que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams,$labelmiga=null,$id_cda_solicitud=null,$id_cproceso=null,$actividadactual=null,$disable_button=null)
    {
        
        if(!is_null($id_cda_solicitud)){
            
            //Encabezado de la solicitud =======================================================
            $searchSolicitud = new \common\models\cda\PantallaprincipalSearch();
            $searchSolicitud->id_cda_solicitud = $id_cda_solicitud;
            
            $params=array();
            $encabezado = $searchSolicitud->search($params);
            
            
            //Tramites de la solicitud =========================================================
            $searchModel = new CdaTramiteSearch();
            
            //Habilitando el tecnico de recursos hidricos para el tramites ==========================
            if(!is_null($disable_button) and Yii::$app->user->identity->codRols[0]->cod_rol == '1'){
                $queryParams['CdaTramiteSearch']['id_usuario'] = Yii::$app->user->identity->Id;
                $disable_edit = TRUE;
            }else{
                $disable_edit = FALSE;
            }
            
            $dataProvider = $searchModel->search($queryParams);
            $total_creados = $dataProvider->getTotalCount();            
           
            
            //Averiguando cantidad de tramites, vs cantidad de tramites a crear ======================
            if(is_null($disable_button)){
                 Yii::trace("que llega aqui del boton ".$encabezado[0]['numero_tramites']."::".$total_creados."::".$disable_button,"DEBUG");
           
            }
            
            if(is_null($disable_button) and $encabezado[0]['numero_tramites'] > $total_creados){
                $disable_button = FALSE;
                $disable_edit = FALSE;
            }else if(is_null($disable_button) and $encabezado[0]['numero_tramites'] <= $total_creados){
                $disable_button = TRUE;
                $disable_edit = FALSE;
            }
            
            
            return [
                    'encabezado' => $encabezado[0],
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'disable_button' => $disable_button,
                    'disable_edit' => $disable_edit
                ];
            
        }else{
            
            $searchModel = new CdaTramiteSearch();
            $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
        }
                
   }

    /**
     * Presenta un dato unico en el modelo CdaTramite.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaTramite .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax,$id_cda_solicitud=null,$id_cproceso=null,$labelmiga=null)
    {
        $model = new CdaTramite();
        $fechaactual = date(Yii::$app->fmtfechaphp);
        $fechahoraactual = date(Yii::$app->fmtfechahoraphp);
        
        //Sacando listado de usuarios anexos a la actividad 200, el paso de crear tramites 
        //a iniciar tramite no existe en la tabla ps_actividad_ruta, por tanto
        //solo se vale el campo ps_actividad.cod_rol ==================================
        $basicas = New BasicController();
        $listusuario = $basicas->findUsuariosrutaActividad(null,'200');
        
        if(empty($listusuario)){
             throw new \yii\web\HttpException(404, 'No hay roles asignados a la acividad');
        }
        
        if ($model->load(Yii::$app->request->post())) {
            
		$transaction = Yii::$app->db->beginTransaction();	
            
                //Creando codigo tecnico ====================================================================
                $codigoTc = $basicas->Codtecnico($model->id_usuario);
                
                //Agregando parametros fijos =================================================================
                $model->id_cda_solicitud = $id_cda_solicitud;
                $model->fecha_solicitud = $fechaactual;
                $model->cod_solicitud_tecnico = $codigoTc;
                
                //Abriendo ps_cproceso =======================================================================
                //Creando Idcproeso para el tramite =======================================================
                $model3 = new \common\models\cda\PsCproceso();
                $model3->ult_id_eproceso = '20';
                $model3->id_proceso = 3;
                $model3->id_usuario = Yii::$app->user->identity->Id;
                $model3->ult_id_actividad = '200';
                $model3->ult_id_usuario = $model->id_usuario;
                $model3->ult_fecha_actividad = $fechaactual;
                $model3->ult_fecha_estado = $fechaactual;
                $model3->fecha_solicitud = $fechaactual;
                
                if($model3->save()){
                    
                    $model->id_cproceso = $model3->id_cproceso;
                    
                    if($model->save()){
                        
                        $model4 = new \common\models\cda\PsHistoricoEstados();
                        $model4->fecha_estado = $fechaactual;
                        $model4->observaciones = 'Cambio por creacion de Tramite';
                        $model4->id_eproceso = '20';
                        $model4->id_cproceso = $model3->id_cproceso;
                        $model4->id_usuario = Yii::$app->user->identity->Id;
                        $model4->id_actividad = '200';
                        $model4->id_tgestion = null;
                        
                        if($model4->save()){
                            
                            $model5 = new \common\models\cda\PsCactividadProceso();
                            $model5->observacion = null;
                            $model5->fecha_realizacion = $fechaactual;
                            $model5->fecha_prevista = null;
                            $model5->numero_quipux = null;
                            $model5->id_cproceso = $model3->id_cproceso;
                            $model5->id_usuario = $model->id_usuario;
                            $model5->id_actividad = '200';
                            $model5->fecha_creacion = $fechahoraactual;
                            $model5->diligenciado = 'N';
                            $model5->tipo = '2';
                        
                            if($model5->save()){
                               
                                $transaction->commit();
                                return [
                                    'model' => $model,
                                    'create' => 'True'
                                ];
                                
                            }else{
                                
                                $transaction->rollBack();
                                throw new \yii\web\HttpException(404, 'Error al registrar actividad');
                            }
                            
                        }else{
                            
                            
                            
                            $transaction->rollBack();
                            throw new \yii\web\HttpException(404, 'Error al registrar trazabilidad');
                            
                        }
                        
                        
                    }else{
                        
                        $errores = $model->getErrors();
                        foreach($errores as $clave){
                            $_revisando = implode(",",$clave);
                            Yii::trace("sera que: ".$_revisando,"DEBUG");
                        }
                        
                        $transaction->rollBack();
                        throw new \yii\web\HttpException(404, 'Error al registrar el proceso');
                    }
                    
                                        
                }else{
                    $transaction->rollBack();
                    throw new \yii\web\HttpException(404, 'Error al guardar el tramite');
                }
        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'create' => 'Ajax',
                    'listusuario' => $listusuario,
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                    'create' => 'False',
                    'listusuario' => $listusuario, 
                ];

        }
    }

    /**
     * Modifica un dato existente en el modelo CdaTramite.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$request,$isAjax)
    {
        $model = $this->findModel($id);
        
        $fechaactual = date(Yii::$app->fmtfechaphp);
        $fechahoraactual = date(Yii::$app->fmtfechahoraphp);
        
        //Sacando listado de usuarios anexos a la actividad 200, el paso de crear tramites 
        //a iniciar tramite no existe en la tabla ps_actividad_ruta, por tanto
        //solo se vale el campo ps_actividad.cod_rol ==================================
        $basicas = New BasicController();
        $listusuario = $basicas->findUsuariosrutaActividad(null,'200');

        if ($model->load($request)) {
            
            
                $transaction = Yii::$app->db->beginTransaction();
            
                $model3 = \common\models\cda\PsCproceso::findOne($model->id_cproceso);
                $model3->ult_id_eproceso = '20';
                $model3->id_proceso = 3;
                $model3->id_usuario = Yii::$app->user->identity->Id;
                $model3->ult_id_actividad = '200';
                $model3->ult_id_usuario = $model->id_usuario;
                $model3->ult_fecha_actividad = $fechaactual;
                $model3->ult_fecha_estado = $fechaactual;
                $model3->fecha_solicitud = $fechaactual;
                
                if($model3->save()){
                    
                    $model5 = new \common\models\cda\PsCactividadProceso();
                    $model5->observacion = null;
                    $model5->fecha_realizacion = $fechaactual;
                    $model5->fecha_prevista = null;
                    $model5->numero_quipux = null;
                    $model5->id_cproceso = $model3->id_cproceso;
                    $model5->id_usuario = $model->id_usuario;
                    $model5->id_actividad = '200';
                    $model5->fecha_creacion = $fechahoraactual;
                    $model5->diligenciado = 'N';
                    $model5->tipo = '2';
                    
                    if($model5->save()){
                        if($model->save()){
                            
                            $transaction->commit();
                            return [
                                'model' => $model,
                                'update' => 'True'
                            ];
                            
                            
                        }else{
                            
                            $transaction->rollBack();
                            throw new \yii\web\HttpException(404, 'Error al guardar el tramite');
                        }
                        
                    }else{
                        
                        $transaction->rollBack();
                        throw new \yii\web\HttpException(404, 'Error al crear actividad');
                    }
                }else{
                    
                    $transaction->rollBack();
                    throw new \yii\web\HttpException(404, 'Error al guardar el Proceso');
                }
            
               
        } 
        elseif ($isAjax) {
        
            return [
                'model' => $model,
                'update' => 'Ajax',
                'listusuario' => $listusuario,
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
     * Deletes an existing CdaTramite model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de CdaTramite basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return CdaTramite el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = CdaTramite::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  CdaTramite     */
    protected function findModelByParams($params)
    {
        if (($model = CdaTramite::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo CdaTramite     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type CdaTramite     */
     public function cargaCdaTramite($params){
        return $this->findModelByParams($params);
    }
    
    
    
    /*
     * Fucion que realiza todo el procesomiento de informacion para la pantalla de Tramite
     * Diana B
     * Modificado: 2019-03-12
     */
    public function actionProceso($id_cda_tramite,$tipo){
        
        $searchModel = new \common\models\cda\PantallaprincipalSearch();
        $encabezado = $searchModel->searchT($id_cda_tramite);
        
        //Sacando datos de basicas =============================================//
        $basicas = new BasicController();
        
        /*Listado de Actividades Ejecutadas===========*/
        $actividades = $basicas->findActividadesCproceso($encabezado[0]['id_cproceso'],$tipo);
       
        //Datos de la actividad actual en la que vamos **********************/
        $actActual = $basicas->findActividades(null,$encabezado[0]['ult_id_actividad']);
        
        
        /*Ultima activida y usuarios asignado al proceso **********************/
        $pscproceso = $basicas->findUltimaAsignacion($encabezado[0]['id_cproceso']);
        
       
        $stringencabezado = $basicas->encabezadoTramite($encabezado[0]);
        
        if($encabezado[0]['devolver']=='1' and $encabezado[0]['ult_id_actividad'] == '200'){
            
            /*Actividad que pueden seguir en la ruta ***************************/
            $actRuta = $basicas->findActividadRuta($encabezado[0]['ult_id_actividad'],null,'207');
            
        }else{
        
            /*Actividad que pueden seguir en la ruta ***************************/
            $actRuta = $basicas->findActividadRuta($encabezado[0]['ult_id_actividad'],null,null);
        }
        
//         /*Revisando si la solicitud va en crear Tramite actividad con id_actividad =6
//         * se revisa si el total de tramites guardados en la solicitud, para esto deben exitir 
//         * tantos registros en ps_cactividad_proceso con id_actividad=209 y valor 'S' en diligenciado
//         * indicados al id_cproceso         */
//        if($actActual['id_actividad'] == '6'){
//            $habActividades =  $this->CierreTramites($encabezado[0]['id_cproceso'], $encabezado[0]['tramite_administrativo']);
//        }else{
//            $habActividades = TRUE;
//        }
                
        return ['encabezado' => $encabezado[0],
                'stringencabezado'=>$stringencabezado,
                'actividades' => $actividades,
                'actividadactual' => $actActual,
                'asignaciones' => $pscproceso,
                'actividadruta'=>$actRuta
                ];
    }
}