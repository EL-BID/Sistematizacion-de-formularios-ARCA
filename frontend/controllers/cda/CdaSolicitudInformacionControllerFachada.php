<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\CdaSolicitudInformacion;
use common\models\cda\CdaSolicitudInformacionSearch;
use common\controllers\controllerspry\FachadaPry;
use common\models\cda\CdaTipoInfoFaltante;
use common\models\cda\CdaTipoReporte;
use common\models\cda\CdaTipoAtencion;
use common\models\cda\PsCactividadProceso;
use common\models\cda\PantallaprincipalSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdasolicitudinformacionControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo CdaSolicitudInformacion.
 */
class CdaSolicitudInformacionControllerFachada extends FachadaPry
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

    /*
     * Diligenciar salida par ala solicitud
     * 
     */    
     public function actionIndexSolicitud($queryParams,$id_cda_solicitud,$actividadactual,$id_cproceso){
         
        //Encabezado de la solicitud =======================================================
        $searchSolicitud = new \common\models\cda\PantallaprincipalSearch();
        $searchSolicitud->id_cda_solicitud = $id_cda_solicitud;

        $params=array();
        $encabezado = $searchSolicitud->search($params);
        
        
        //Buscando informacion de datos salida para un asolicitud ==========================
        $searchModel = new \common\models\cda\CdaSolicitudInformacionSearch();
        $queryParams['CdaSolicitudInformacionSearch']['id_cda_solicitud'] = $id_cda_solicitud;
        $dataProvider = $searchModel->search($queryParams);
        
        //Buscando actividad proceso =====================================================
        $basicas = New BasicController();
        $ps_cactividad_proceso = $basicas->actualPsCactividadProceso($id_cproceso);
        
        return [
                'encabezado' => $encabezado[0],
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'pscactividadproceso'=>$ps_cactividad_proceso,
        ];
         
     }  
        
	
    /**
     * Listado todos los datos del modelo CdaSolicitudInformacion que se encuentran en el tablename.
     * @return mixed
     * Modificada: Diana B
     * Fecha: 2019-03-13
     * tipo 1 => para la actividad Solicitar informacion a quien corresponda
     */
    public function actionIndex($queryParams,$id_cda_tramite,$actividadactual,$id_cproceso)
    {
        
        //Obteniendo la informacion del encabezado =====================================================
        $searchModel = new \common\models\cda\PantallaprincipalSearch();
        $encabezado = $searchModel->searchT($id_cda_tramite);
        
        //Sacando el html para el encabezado ===========================================================
        $basicas = New BasicController();
        $encabezado = $basicas->encabezadoTramite($encabezado[0]);
        
        //Averiguando id_cactividad_proceso actual ====================================================
        $ps_cactividad_proceso = $basicas->actualPsCactividadProceso($id_cproceso,$id_cda_tramite);
        
        //Llamando al modelo de busqueda de la tabla cda_solicitud_informacion==========================
        $searchModel = new CdaSolicitudInformacionSearch();
        $queryParams['CdaSolicitudInformacionSearch']['id_cda_tramite'] = $id_cda_tramite;
        $queryParams['CdaSolicitudInformacionSearch']['id_cactividad_proceso'] = $ps_cactividad_proceso->id_cactividad_proceso;
        $dataProvider = $searchModel->search($queryParams);
            
        if($actividadactual == '227'){
           // $enableCreate = $this->TotalCodCda($id_cproceso,$dataProvider);
            $enableCreate = TRUE;
        }else{
            $enableCreate = FALSE;
        }
            
        
        

        return [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'encabezado' => $encabezado,
            'pscactividadproceso' => $ps_cactividad_proceso,
            'enableCreate'=>$enableCreate,
        ];
    }
    
    
    /*
     * Habilitando Boton de crear cuando depende de los cod_cda
     */
    protected function TotalCodCda($id_cproceso,$dataProvider){
        
        //Averiguando cantidad de codigos CDA asociados al tramite ====================================
        $_totalcodcda = \common\models\cda\PsCodCda::find()
                ->leftJoin('cda','cda.id_cda=ps_cod_cda.id_cda')
                ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso =  cda.id_cactividad_proceso')
                ->where(['ps_cactividad_proceso.id_cproceso'=>$id_cproceso])
                ->count();
        if ($dataProvider->getTotalCount()<$_totalcodcda) {
            $enableCreate=true;
        }else{
            $enableCreate=false;
        }
        
        
        return $enableCreate;
        
    }
    
    
    /*
     * Listado todos los datos del modelo CdaSolicitudInformacion que tienen el campo OFICIO_RESPUESTA NULO o
     * el campo id_cactividad_proceso_res es la activdad que selecciono el usuario 
     */
    public function actionRespuestasolicitud($queryParams,$id_cda,$id_cactividad_proceso){
        
        $searchModel = new CdaSolicitudInformacionSearch();
        
        $queryParams['CdaSolicitudInformacionSearch']['id_cda'] = $id_cda;
        $queryParams['CdaSolicitudInformacionSearch']['id_cactividad_proceso_res'] = $id_cactividad_proceso;
        
       
        $dataProvider = $searchModel->search($queryParams);
        
        return [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id_cda' =>$id_cda
        ];
    }

    /**
     * Presenta un dato unico en el modelo CdaSolicitudInformacion.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     *Crea un registro para la activdad solicitar informacion a quien corresponda esta amarrado al tramite.
     */
    public function actionCreate($request,$isAjax,$id_cda_tramite,$id_cactividad_proceso)
    {
        $model = new CdaSolicitudInformacion();
        $_listinfofaltante = $this->listcdatipofaltante();
        $_listtiporeporte = $this->listcdatiporeporte();
        $_listtipoatencion = $this->listcdatipoatencion();

        if ($model->load($request)) {
            
                $transaction = Yii::$app->db->beginTransaction();
                $model->id_cactividad_proceso = $id_cactividad_proceso;
                $model->id_cda_tramite = $id_cda_tramite;
                
                if($model->save()){
                    
                    $model2 = $this->findPscactividadProceso($id_cactividad_proceso);
                    $model2->diligenciado = 'S';
                    
                    if($model2->save()){
                        
                         $transaction->commit();
                         
                         
                      
                         return [
                            'model' => $model,
                            'actividadactual' => $model2['id_actividad'],
                            'id_cproceso' => $model2['id_cproceso'], 
                            'create' => 'True'
                        ];
                    }else{
                        $transaction->rollBack();
                        throw new NotFoundHttpException('Error al actualizar la actividad');
                    }
                    
                   	
                }else{
                    
                                    $errores = $model->getErrors();
                        foreach($errores as $clave){
                            $_revisando = implode(",",$clave);
                            Yii::trace("sera que asi si: ".$_revisando,"DEBUG");
                        }
                    
                    
                    $transaction->rollBack();
                    throw new NotFoundHttpException('Error al guardar Solicitud');
                }

        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'create' => 'Ajax',
                    'listinfofaltante' => $_listinfofaltante,
                    'listtiporeporte' => $_listtiporeporte,
                    'listtipoatencion' =>$_listtipoatencion
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                    'create' => 'False',
                     'listinfofaltante' => $_listinfofaltante,
                      'listtiporeporte' => $_listtiporeporte,
                    'listtipoatencion' =>$_listtipoatencion
                ];

        }
    }
    
    
    
    public function actionCreateSolicitud($request,$isAjax,$id_cda_solicitud,$actividadactual,$id_cproceso){
        
        $model = new CdaSolicitudInformacion();
        $model->setScenario('datossolicitud');
        
        
        //Buscando ultima actividadproceso ====================================================================================
        $basicas = New BasicController();
        $model_cactividad_proceso = $basicas->actualPsCactividadProceso($id_cproceso);
        $id_cactividad_proceso = $model_cactividad_proceso->id_cactividad_proceso;
        
        //Buscando demarcaciones ===============================================================================================
        $demarcaciones = $basicas->listDemarcaciones();
        $centros=array();
        
        //Trayend informacion de la solicitud ===================================================================================
        $dataSolicitud = \common\models\cda\CdaSolicitud::findOne($id_cda_solicitud);
        
        //Sacando modelo listo ==================================================================================================
        $model->tienecda = 'no';
        $model->fecha_ingreso_quipux = $dataSolicitud->fecha_ingreso;
        $model->id_demarcacion = $dataSolicitud->id_demarcacion;
        $model->cod_centro_atencion_ciudadano = $dataSolicitud->cod_centro_atencion_ciudadano;
        $model->fecha_oficio = $dataSolicitud->fecha_solicitud;
        $model->fecha_ingreso_anexos_fisicos = $dataSolicitud->fecha_ingreso_fisico_arca;
        $model->fecha_recepcion_anexos = $dataSolicitud->fecha_recepcion_anexos;
        
        
        //Trayendo informacion del represetante =================================================================================
        $modelLast = $basicas->cdaLast($id_cproceso);
        $model->beneficiario_representante = $modelLast->solicitante;
        $model->beneficiario_razonsocial = $modelLast->institucion_solicitante;
        
        
        //Ajustando centro ===============================================================================
        if(!empty($model->id_demarcacion)){
          $centros = $basicas->listcentroatencion($model->id_demarcacion);
        }
        
        $_listinfofaltante = $this->listcdatipofaltante();
        $_listtiporeporte = $this->listcdatiporeporte();
        $_listtipoatencion = $this->listcdatipoatencion();
        
        
        //=================================================CARGANDO INFORMACION DADA POR EL USUARIO ============================================//
        if ($model->load($request)) {
            
                $transaction = Yii::$app->db->beginTransaction();
                $model->id_cactividad_proceso = $id_cactividad_proceso;
                $model->id_cda_solicitud = $id_cda_solicitud;
                
                if($model->save()){
                    
                    $model2 = $this->findPscactividadProceso($id_cactividad_proceso);
                    $model2->diligenciado = 'S';
                    
                    if($model2->save()){
                        
                         $transaction->commit();
                         
                      
                         return [
                            'model' => $model,
                            'actividadactual' => $model2['id_actividad'],
                            'id_cproceso' => $model2['id_cproceso'], 
                            'create' => 'True'
                        ];
                    }else{
                        $transaction->rollBack();
                        throw new NotFoundHttpException('Error al actualizar la actividad');
                    }
                    
                   	
                }else{
                        $errores = $model->getErrors();
                        foreach($errores as $clave){
                            $_revisando = implode(",",$clave);
                            Yii::trace("sera que asi si: ".$_revisando,"DEBUG");
                        }
                    
                    $transaction->rollBack();
                    throw new NotFoundHttpException('Error al guardar Solicitud');
                }

        }
        elseif ($isAjax) {
             return [
                'model' => $model,
                'create' => 'Ajax',
                'listinfofaltante' => $_listinfofaltante,
                'listtiporeporte' => $_listtiporeporte,
                'listtipoatencion' =>$_listtipoatencion,
                'centros' => $centros,
                'demarcaciones' => $demarcaciones,
            ];
        }else {
        
            return [
                'model' => $model,
                'create' => 'False',
                'listinfofaltante' => $_listinfofaltante,
                'listtiporeporte' => $_listtiporeporte,
                'listtipoatencion' =>$_listtipoatencion,
                'centros' => $centros,
                'demarcaciones' => $demarcaciones,
           ];

        }
        
    }
    
    /**
     *Crea un registro para la activdad 225 datos salida, se encuentra amarrado al tramite 
     * se escribe en id_cactividad_proceso
     */
    public function actionCreatedatossalida($request,$isAjax,$id_cda_tramite,$id_cactividad_proceso,$actividadactual,$id_cproceso,$cda_Flag)
    {
        $model = new CdaSolicitudInformacion();
        $model->setScenario('datossalida');
        
        
        //Buscando demarcaciones ===============================================================================================
        $basicas = New BasicController();
        $demarcaciones = $basicas->listDemarcaciones();
        $centros=array();
        
        //Estos datos solo se usan si no existe cod_cda para anexar =====================================================
        if($cda_Flag == 0){
       
            //Ultimo registro en cda para obtener los datos heredados
            $modelLast = $basicas->cdaLast($id_cproceso);

            if(!empty($modelLast)){
                $model->tienecda = 'no';
                $model->fecha_ingreso_quipux = $modelLast->fecha_ingreso_quipux;
                $model->id_demarcacion = $modelLast->id_demarcacion;
                $model->cod_centro_atencion_ciudadano = $modelLast->cod_centro_atencion_ciudadano;
                $model->fecha_oficio = $modelLast->fecha_oficio;
                $model->fecha_ingreso_anexos_fisicos = $modelLast->fecha_ingreso_anexos_fisicos;
                $model->fecha_recepcion_anexos = $modelLast->fecha_recepcion_anexos;
                $model->beneficiario_representante = $modelLast->solicitante;
                $model->beneficiario_razonsocial = $modelLast->institucion_solicitante;
            }
            
            
            //Averiguando si existe registra en datos certificados
            $datoscertificados = $basicas->ReporteInformacion($id_cproceso,'223');
            
            if(!empty($datoscertificados)){
                foreach($datoscertificados as $_cldatcert){
                    $model->cod_provincia = $_cldatcert['fdUbicacion']->cod_provincia;
                    $model->cod_canton = $_cldatcert['fdUbicacion']->cod_canton;
                }
            }
            
        }else{
            $model->tienecda = 'si';
        }

        //Buscando Numero de Tramite ======================================================================
        $data_tramite = $basicas->findTramite($id_cda_tramite);
        $model->no_tramite_administrativo = $data_tramite->num_tramite;
        
        //Ajustando centro ===============================================================================
        if(!empty($model->id_demarcacion)){
          $centros = $basicas->listcentroatencion($model->id_demarcacion);
        }
        
        $_listinfofaltante = $this->listcdatipofaltante();
        $_listtiporeporte = $this->listcdatiporeporte();
        $_listtipoatencion = $this->listcdatipoatencion();
        
     
        //=================================================CARGANDO INFORMACION DADA POR EL USUARIO ============================================//
        if ($model->load($request)) {
            
                $transaction = Yii::$app->db->beginTransaction();
                $model->id_cactividad_proceso = $id_cactividad_proceso;
                $model->id_cda_tramite = $id_cda_tramite;
                
                if($model->save()){
                    
                    $model2 = $this->findPscactividadProceso($id_cactividad_proceso);
                    $model2->diligenciado = 'S';
                    
                    if($model2->save()){
                        
                         $transaction->commit();
                         
                      
                         return [
                            'model' => $model,
                            'actividadactual' => $model2['id_actividad'],
                            'id_cproceso' => $model2['id_cproceso'], 
                            'create' => 'True'
                        ];
                    }else{
                        $transaction->rollBack();
                        throw new NotFoundHttpException('Error al actualizar la actividad');
                    }
                    
                   	
                }else{
                    
                    $errores = $model->getErrors();
                    foreach($errores as $clave){
                        $_revisando = implode(",",$clave);
                        Yii::trace("sera que asi si: ".$_revisando,"DEBUG");
                    }
                    $transaction->rollBack();
                    throw new NotFoundHttpException('Error al guardar Solicitud');
                }

        }
        elseif ($isAjax) {
            
          
                return [
                    'model' => $model,
                    'create' => 'Ajax',
                    'listinfofaltante' => $_listinfofaltante,
                    'listtiporeporte' => $_listtiporeporte,
                    'listtipoatencion' =>$_listtipoatencion,
                    'centros' => $centros,
                    'demarcaciones' => $demarcaciones,
                ];
        }  
        
        else {
        
                 return [
                    'model' => $model,
                    'create' => 'False',
                     'listinfofaltante' => $_listinfofaltante,
                      'listtiporeporte' => $_listtiporeporte,
                    'listtipoatencion' =>$_listtipoatencion
                ];

        }
    }

    
       /*
     * Modifica update datos salida
     */
     public function actionUpdatedatossalida($id,$request,$isAjax,$id_cda_tramite,$id_cactividad_proceso,$actividadactual,$cda_Flag)
    {
        $model = $this->findModel($id);
        $model->setScenario('datossalida');
        
        //Buscando demarcaciones ===============================================================================================
        $basicas = New BasicController();
        $demarcaciones = $basicas->listDemarcaciones();
        $centros=array();
        
        //Ajustando centro ===============================================================================
        if(!empty($model->id_demarcacion)){
          $centros = $basicas->listcentroatencion($model->id_demarcacion);
        }
        
        //Cargando listado de cantones si se tiene seleccionada 
        if(!empty($model->cod_provincia)){
            $_listadocodcanton = \common\models\autenticacion\Cantones::find()
                                ->where(['=', 'cantones.cod_provincia', $model->cod_provincia])
                                ->all();
        }
        
        $_listinfofaltante = $this->listcdatipofaltante();
        $_listtiporeporte = $this->listcdatiporeporte();
        $_listtipoatencion = $this->listcdatipoatencion();

        if ($model->load($request)) {
            
                $transaction = Yii::$app->db->beginTransaction();
                $model->id_cactividad_proceso = $id_cactividad_proceso;
                $model->id_cda_tramite = $id_cda_tramite;
                
                if($model->save()){
                    
                    $model2 = $this->findPscactividadProceso($id_cactividad_proceso);
                    $model2->diligenciado = 'S';
                    
                    if($model2->save()){
                        
                         $transaction->commit();
                         return [
                            'model' => $model,
                            'actividadactual' => $model2['id_actividad'],
                            'id_cproceso' => $model2['id_cproceso'], 
                            'update' => 'True'
                        ];
                    }else{
                        $transaction->rollBack();
                        throw new NotFoundHttpException('Error al actualizar la actividad');
                    }
                    
                   	
                }else{
                    $transaction->rollBack();
                    throw new NotFoundHttpException('Error al guardar Solicitud');
                }

        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'update' => 'Ajax',
                    'listinfofaltante' => $_listinfofaltante,
                    'listtiporeporte' => $_listtiporeporte,
                    'listtipoatencion' =>$_listtipoatencion,
                    'centros' => $centros,
                    'demarcaciones' => $demarcaciones,
                    'listadocodcanton'=>$_listadocodcanton,
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                    'update' => 'False',
                    'listinfofaltante' => $_listinfofaltante,
                    'listtiporeporte' => $_listtiporeporte,
                    'listtipoatencion' =>$_listtipoatencion,
                    'centros' => $centros,
                    'demarcaciones' => $demarcaciones,
                    'listadocodcanton'=>$_listadocodcanton,
                ];

        }
    }
    
    
    
    /**
     * Modifica un dato existente en el modelo CdaSolicitudInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$request,$isAjax,$id_cactividad_proceso)
    {
        $model = $this->findModel($id);
        $model2 = $this->findPscactividadProceso($id_cactividad_proceso);
        
        //Llenado casillas para los dropdown ======================================================
        $_listinfofaltante = $this->listcdatipofaltante();
        $_listtiporeporte = $this->listcdatiporeporte();
        $_listtipoatencion = $this->listcdatipoatencion();
        $model->id_cactividad_proceso_res = $id_cactividad_proceso;
        
        $transaction = Yii::$app->db->beginTransaction();
        
        if ($model->load($request)) {
			
                    if($model->save()){
                        
                        $model2->diligenciado = 'S';
                        
                        if($model2->save()){
                            
                            $transaction->commit();
                            return [
                            'model' => $model,
                            'update' => 'True'
                            ];
                            
                        }else{
                            $transaction->rollBack();
                            throw new NotFoundHttpException('Error al guardar respuesta');
                        }
                    }else{
                        $transaction->rollBack();
                        throw new NotFoundHttpException('Error al guardar respuesta');
                    }
            
			
        } 
         elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'update' => 'Ajax',
                    'listinfofaltante' => $_listinfofaltante,
                    'listtiporeporte' => $_listtiporeporte,
                    'listtipoatencion' =>$_listtipoatencion
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'update' => 'False',
                            'listinfofaltante' => $_listinfofaltante,
                            'listtiporeporte' => $_listtiporeporte,
                            'listtipoatencion' =>$_listtipoatencion
                        ];
        }
    }
    
    
    public function actionUpdatesolicitud($id,$request,$isAjax,$id_cactividad_proceso)
    {
        $model = $this->findModel($id);
        $model2 = $this->findPscactividadProceso($id_cactividad_proceso);
        
        //Llenado casillas para los dropdown ======================================================
        $_listinfofaltante = $this->listcdatipofaltante();
        $_listtiporeporte = $this->listcdatiporeporte();
        $_listtipoatencion = $this->listcdatipoatencion();
        $model->id_cactividad_proceso_res = $id_cactividad_proceso;
        
        $transaction = Yii::$app->db->beginTransaction();
        
        if ($model->load($request)) {
			
                    if($model->save()){
                        
                        $model2->diligenciado = 'S';
                        
                        if($model2->save()){
                            
                            $transaction->commit();
                            return [
                            'model' => $model,
                            'update' => 'True'
                            ];
                            
                        }else{
                            $transaction->rollBack();
                            throw new NotFoundHttpException('Error al guardar respuesta');
                        }
                    }else{
                        $transaction->rollBack();
                        throw new NotFoundHttpException('Error al guardar respuesta');
                    }
            
			
        } 
         elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'update' => 'Ajax',
                    'listinfofaltante' => $_listinfofaltante,
                    'listtiporeporte' => $_listtiporeporte,
                    'listtipoatencion' =>$_listtipoatencion
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'update' => 'False',
                            'listinfofaltante' => $_listinfofaltante,
                            'listtiporeporte' => $_listtiporeporte,
                            'listtipoatencion' =>$_listtipoatencion
                        ];
        }
    }

    /**
     * Deletes an existing CdaSolicitudInformacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id,$id_cda_tramite,$id_cactividad_proceso)
    {
        $this->findModel($id)->delete();
        
        //Asignando diligenciado 'N' si se borran todas las solicitures ============================
        $_cantidad = $this->conteoSolicitudes($id_cda_tramite,$id_cactividad_proceso);
        
        if($_cantidad == 0){
            $_modelpscactividad = $this->findPscactividadProceso($id_cactividad_proceso);
            $_modelpscactividad->diligenciado = 'N';
            
            if($_modelpscactividad->save()){
                return TRUE;
            }
        }
    }

    /**
     * Finds the CdaSolicitudInformacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CdaSolicitudInformacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
                    if (($model = CdaSolicitudInformacion::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    
    /*Funcion que tra eel listado de datos de cda_tipo_info_faltante*/
    
    protected function listcdatipofaltante(){
        $_listcdatipofaltante = CdaTipoInfoFaltante::find()->all();
        return $_listcdatipofaltante;
    }
    
    /*Funcion para traer el listado de datos de cda_tipo_reporte*/
    protected function listcdatiporeporte(){
        $_listcdatiporeporte = CdaTipoReporte::find()->all();
        return $_listcdatiporeporte;
    }
    
    /*Funcion para traer el listado de datos de cda_tipo_reporte*/
    protected function listcdatipoatencion(){
        $_listcdatipoatencion = CdaTipoAtencion::find()->all();
        return $_listcdatipoatencion;
    }
    
    /*Funcion que trae el modelo de la tabla ps_cactividad_prcoesos*/
    public function findPscactividadProceso($id_cactividad_cproceso){
       
        if (($model = PsCactividadProceso::findOne($id_cactividad_cproceso)) !== null) {
              return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*Funcion para traer el encabezado de las paginas*/
    public function findEncabezado($id_cda){
        
        $searchModel = new PantallaprincipalSearch();
            
        if(!empty($id_cda)){
            $searchModel->id_cda = $id_cda;
        }

        //Informacion general obtenida de la consulta para datos basicos / Cabezote =======================================
         $dataProvider = $searchModel->searchdetalleproceso();
        
        return $dataProvider;
    }
    
     /*Funcion para traer el encabezado si es solicitud*/
    public function findEncabezadoSolicitud($id_cda){
        
        $searchModel = new PantallaprincipalSearch();
            

        //Informacion general obtenida de la consulta para datos basicos / Cabezote =======================================
        $dataProvider = $searchModel->searchdetalleSolicitud($id_cda);
        
        return $dataProvider;
    }
    
    
    protected  function conteoSolicitudes($id_cda_tramite,$id_cactividad_proceso){
        
        $conteo = CdaSolicitudInformacion::find()
                ->where(['id_cda_tramite'=>$id_cda_tramite])
                ->andwhere(['id_cactividad_proceso'=>$id_cactividad_proceso])
                ->count();
        
        return $conteo;
    }
    
    
    
    public  function getSolicitudes($id_cda,$id_cactividad_proceso){
        
        $solicitar_informacion = CdaSolicitudInformacion::find()
                ->leftJoin('cda_tipo_info_faltante','cda_tipo_info_faltante.id_tinfo_faltante = cda_solicitud_informacion.id_tinfo_faltante')
                ->leftJoin('cda_tipo_reporte','cda_tipo_reporte.id_treporte = cda_solicitud_informacion.id_treporte')
                ->leftJoin('cda_tipo_atencion','cda_tipo_atencion.id_tatencion = cda_solicitud_informacion.id_tatencion')
                ->where(['id_cda'=>$id_cda])
                ->andwhere(['id_cactividad_proceso'=>$id_cactividad_proceso])
                ->with('idTinfoFaltante')
                ->with('idTreporte')
                ->with('idTatencion')
                ->all();
        
        return $solicitar_informacion;
    }
    
    
     public  function getSolicitudes2($id_cda,$id_cactividad_proceso){
        
        $solicitar_informacion = CdaSolicitudInformacion::find()
                ->leftJoin('cda_tipo_info_faltante','cda_tipo_info_faltante.id_tinfo_faltante = cda_solicitud_informacion.id_tinfo_faltante')
                ->leftJoin('cda_tipo_reporte','cda_tipo_reporte.id_treporte = cda_solicitud_informacion.id_treporte')
                ->leftJoin('cda_tipo_atencion','cda_tipo_atencion.id_tatencion = cda_solicitud_informacion.id_tatencion')
                ->where(['id_cda'=>$id_cda])
                ->andwhere(['id_cactividad_proceso_res'=>$id_cactividad_proceso])
                ->with('idTinfoFaltante')
                ->with('idTreporte')
                ->with('idTatencion')
                ->with('idTrespuesta')
                ->all();
        
        return $solicitar_informacion;
    }
}



