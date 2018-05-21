<?php

namespace frontend\controllers\pqrs;

use Yii;
use common\models\pqrs\Pqrs;
use common\models\pqrs\PqrsSearch;
use common\models\cda\PsEstadoProceso;
use common\models\cda\PsCproceso;
use common\models\cda\PsHistoricoEstados;
use common\models\cda\PsCactividadProceso;
use common\models\cda\PsResponsablesProceso;
use common\models\autenticacion\UsuariosAp;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * PqrsControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Pqrs.
 */
class PqrsControllerFachada extends FachadaPry
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

	
	
    /**
     * Listado todos los datos del modelo Pqrs que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
            $searchModel = new PqrsSearch();
            
            //Averiguando si el usuario en session es Tecnico de Recursos Hidricos, si lo es se envie filtro predefinido para responsable
            if(Yii::$app->user->identity->codRols[0]->cod_rol == '1' and empty($queryParams['id_usuario'])){
                $searchModel->nombres = Yii::$app->user->identity->id_usuario;
            }
            
            $dataProvider = $searchModel->search_modify($queryParams);

            return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
            ];
    }

    /**
     * Presenta un dato unico en el modelo Pqrs.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo Pqrs .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax,$tipo)
    {
        $model = new Pqrs();
        $fechaactual = date(Yii::$app->fmtfechaphp);
        
        if($tipo == 'peticion'){
            $model ->setScenario('sc_peticion');
            $model->tipo_pqrs = '1';
        }else if($tipo == 'queja'){
            $model ->setScenario('sc_quejas');
            $model->tipo_pqrs = '2';
        }else if($tipo == 'denuncia'){
            $model ->setScenario('sc_denuncia');
            $model->tipo_pqrs = '3';
        }else if($tipo == 'felicitacion'){
            $model ->setScenario('sc_felicitacion');
            $model->tipo_pqrs = '4';
        }
        
        //Buscando usuario con rol 21 ==============================================
        $_responsable= $this->getResponsable();
        
        //Pasos para guardar son ------------------------------------------------------
        /* 1. Guardar el Ps_cproceso (id_cproceso, ult_id_eproceso = '7', 'id_proceso', 'id_usuario' = null, 
         * 'id_modulo' = 2, num_quipux = null, fecha_registro_quipux = null, asunto-quipux =null, tipo_documento_quipux = null,  
         * 'ult_id_actividad' = 100, ult_id_usuario = $_responsable, ult_fecha_actividad = fecha del sistema, ult_fecha_estado fecha del sistema,
         * 'numero' -> creado con diameshhmm
         * 2.Guardar datos en la tabla PQR's y anexar fecha_rececion -> sistema, id_cproceso -> codigo del anterior
         * 3. Guardar historico_estados.
         * 4. Guardar ps_cactividad_proceso
         * 5. guardar responsable en ps_responsableproceso
         */
        
        
        if ($model->load($request)) {
	
            
                $transaction = Yii::$app->db->beginTransaction();
                
                //1. crear nuevo registro en pscproceso===============================================================
                $_pscproceso = new PsCproceso();
                $_pscproceso->ult_id_eproceso = '7';
                $_pscproceso->id_proceso = '2';
                $_pscproceso->id_modulo = '2';
                $_pscproceso->ult_id_actividad = '100';
                $_pscproceso->ult_id_usuario = $_responsable;
                $_pscproceso->ult_fecha_actividad =$fechaactual;
                $_pscproceso->ult_fecha_estado = $fechaactual;
                $_pscproceso->numero = date('dmhhmmss');
                $_pscproceso->fecha_solicitud = $fechaactual;
                
                if($_pscproceso->save()){
                    
                    $_idcproceso = $_pscproceso->id_cproceso;
                    $_numero = $_pscproceso->numero;
                    
                    //Guardar la PQRS=============================================================================
                    $model->id_cproceso = $_idcproceso;
                    $model->fecha_recepcion =$fechaactual;
                    
                    if($model->save()){
                        
                        //GUARDAR HISTORICO ESTADOS ==============================================
                        $_historicoestados = new PsHistoricoEstados();
                        $_historicoestados->fecha_estado =  $fechaactual;
                        $_historicoestados->id_eproceso = '7';
                        $_historicoestados->id_cproceso = $_idcproceso;
                        $_historicoestados->id_actividad = '100';
                        
                        if($_historicoestados->save()){
                            
                            $_pscactividad = new PsCactividadProceso();
                            $_pscactividad->fecha_realizacion = $fechaactual;
                            $_pscactividad->id_cproceso = $_idcproceso;
                            $_pscactividad->id_usuario = $_responsable;
                            $_pscactividad->id_actividad = '100';
                            $_pscactividad->fecha_creacion = $fechaactual;
                            $_pscactividad->diligenciado = 'S';
                            
                            if($_pscactividad->save()){
                                
                                $_responsableproceso = new PsResponsablesProceso();
                                $_responsableproceso->id_cproceso = $_idcproceso;
                                $_responsableproceso->fecha = $fechaactual;
                                $_responsableproceso->id_usuario = $_responsable;
                                
                                $transaction->commit();
                                return [
                                    'model' => $model,
                                    'mensaje' => 'Se ha recibido su Petición/Queja/Reclamo/solicitud y se le ha asignado el número '.$_numero. ''
                                    . 'con este número usted podra hacerle seguimiento a su Petición/Queja/Reclamo/solicitud',
                                    'create' => 'True'
                                ];
                                
                            }else{
                                
                                $transaction->rollBack();
                                return [
                                    'model' => $model,
                                    'create' => 'False',
                                    'mensaje' => 'Error al guardar registro en Histórico Estados',
                                ];
                            }
                            
                            
                        }else{
                           
                            $transaction->rollBack();
                            return [
                                'model' => $model,
                                'create' => 'False',
                                'mensaje' => 'Error al guardar registro en Historico Estados',
                            ];
                        }
                        
                        
                        
                        
                    }else{
                        
                        $transaction->rollBack();
                        return [
                            'model' => $model,
                            'create' => 'False',
                            'mensaje' => 'Error al guardar registro en PQRS',
                        ];
                    }
                    
                    
                    
                }else{
                    $transaction->rollBack();
                    return [
                        'model' => $model,
                        'create' => 'False',
                        'mensaje' => 'Error al crear registro en PsCproceso',
                    ];
                }               
                
            
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
                    'create' => 'Fullscreen'
                ];

        }
    }

    /**
     * Modifica un dato existente en el modelo Pqrs.
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
     * Deletes an existing Pqrs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de Pqrs basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return Pqrs el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = Pqrs::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  Pqrs     */
    protected function findModelByParams($params)
    {
        if (($model = Pqrs::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo Pqrs     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type Pqrs     */
     public function cargaPqrs($params){
        return $this->findModelByParams($params);
    }
    
    
    
    /*Listado de estados para el proceso PQR's*/
    
    /*Funcion que entrega el listado de Estado de procesos asociales al procesos PQRS--*/
    public function list_estados_pqrs(){
    
        $_listestados = PsEstadoProceso::find()
                        ->where(['=','id_proceso','2'])->asArray()->all();
        
        return $_listestados;
        
    }
    
    
    /*Funcion que entrega el listado de las actividad del proceso pqrs*/
    
    public function findActividades(){
        
        $list_actividades= \common\models\cda\PsActividad::find()
                        ->select(['id_actividad','nom_actividad'])
                        ->where(['=','id_proceso','2'])
                        ->asArray()->all();
        
        return $list_actividades;
    }
    
    
    public function findUsuarios($id_usuario){
        
        $list_usuarios=UsuariosAp::find()
                        ->select(['usuarios_ap.id_usuario','usuarios_ap.nombres'])
                        ->leftJoin('perfiles','perfiles.id_usuario = usuarios_ap.id_usuario')
                        ->leftJoin('ps_actvidad_ruta','ps_actvidad_ruta.cod_rol = perfiles.cod_rol')
                        ->leftJoin('ps_actividad','ps_actividad.rol_a_asignar =  perfiles.cod_rol')
                        ->where(['=','usuarios_ap.id_usuario',$id_usuario])
                        ->one();
        
        
        if(!empty($list_usuarios)){
            
            $listusuarios=UsuariosAp::find()
                        ->select(['usuarios_ap.id_usuario','usuarios_ap.nombres'])
                        ->leftJoin('perfiles','perfiles.id_usuario = usuarios_ap.id_usuario')
                        ->leftJoin('ps_actvidad_ruta','ps_actvidad_ruta.cod_rol = perfiles.cod_rol')
                        ->leftJoin('ps_actividad','ps_actividad.rol_a_asignar =  perfiles.cod_rol')
                        ->where(['=','usuarios_ap.id_usuario',$id_usuario])
                        ->asArray()->all();
            
        }else{
            
           $list_usuarios=UsuariosAp::find()
                        ->select(['usuarios_ap.id_usuario','usuarios_ap.nombres']) 
                        ->where(['=','usuarios_ap.id_usuario',$id_usuario]);
                        
            
           $listusuarios=UsuariosAp::find()
                        ->select(['usuarios_ap.id_usuario','usuarios_ap.nombres'])
                        ->leftJoin('perfiles','perfiles.id_usuario = usuarios_ap.id_usuario')
                        ->leftJoin('ps_actvidad_ruta','ps_actvidad_ruta.cod_rol = perfiles.cod_rol')
                        ->leftJoin('ps_actividad','ps_actividad.rol_a_asignar =  perfiles.cod_rol')
                        ->where(['=','usuarios_ap.id_usuario',$id_usuario]);
           
          $listusuarios = $list_usuarios->union($list_usuarios2)->asArray()->all();
            
        }
        
        return $listusuarios;
        
    }
    
    
    /*Funcion que entreg aun usuario responsable para guardar la peticion*/
    protected function getResponsable(){
        
        $_responsable=UsuariosAp::find()
                       ->leftJoin('perfiles','perfiles.id_usuario = usuarios_ap.id_usuario')
                       ->where(['=','perfiles.cod_rol','21'])->one();
        
        if(!empty($_responsable->id_usuario)){
            return $_responsable->id_usuario;
        }else{
            throw new NotFoundHttpException('No existen usuarios con rol 21.');
        }
        
    }
    
    /*Funcion que entrega el encabezado de pqrs*/
    
    public function getEncabezado($id_pqr){
        
        $_encabezado = Pqrs::find()
                       ->where(['id_pqrs'=>$id_pqr]) 
                       ->with('idCproceso')
                       ->with('estado')
                       ->with('usuario')
                       ->with('actividad')
                       ->one();
        
        return $_encabezado;
        
    }
    
 /* funcion que toma los datos delprocespara el excel*/
    public function getPcproceso($id_pqr=null){
        $_proceso= null;
        
        if($_proceso){
            $_proceso = Pqrs::find()
                       ->where(['id_pqrs'=>$id_pqr]) 
                       ->with('idCproceso')
                       ->with('estado')
                       ->with('usuario')
                       ->with('actividad')
                       ->one();
        }else{
            $_proceso = Pqrs::find()
                       ->with('idCproceso')
                       ->with('estado')
                       ->with('usuario')
                       ->with('actividad')
                       ->all();
        }
        
        
        return $_proceso;
        
    }
    
    public function getPqrs($id_pqr=null){
        $_pqrs= null;
        
        if($_pqrs){
            $_pqrs = Pqrs::find()
                       ->where(['id_pqrs'=>$id_pqr]) 
                       ->with('solCodProvincia') //canton solicitante
                       ->with('enNomCodProvincia') //canton empresa
                       ->with('solCodProvincia0') // provincia solicitante
                       ->with('enNomCodProvincia0') // provincia empresa
                       ->one();
        }else{
            $_pqrs = Pqrs::find()
                       ->with('solCodProvincia') //canton solicitante
                       ->with('enNomCodProvincia') //canton empresa
                       ->with('solCodProvincia0') // provincia solicitante
                       ->with('enNomCodProvincia0') // provincia empresa
                       ->one();
        }
        
        
        return $_pqrs;
        
    }
}