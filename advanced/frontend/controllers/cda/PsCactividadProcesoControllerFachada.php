<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\PsCactividadProceso;
use common\models\cda\PsCactividadProcesoSearch;
use common\models\cda\PsOpcTipoSelect;
use common\models\cda\PsClasifActividad;
use common\models\cda\PsHistoricoEstados;
use common\controllers\controllerspry\FachadaPry;
use common\models\autenticacion\UsuariosAp;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * PsCactividadProcesoControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo PsCactividadProceso.
 */
class PsCactividadProcesoControllerFachada extends FachadaPry
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
     * Listado todos los datos del modelo PsCactividadProceso que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                $searchModel = new PsCactividadProcesoSearch();
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
            }

    /**
     * Presenta un dato unico en el modelo PsCactividadProceso.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo PsCactividadProceso .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax)
    {
        $model = new PsCactividadProceso();

        if ($model->load($request) && $model->save()) {
			
                return [
                    'model' => $model,
                    'create' => 'True'
                ];	

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
                    'create' => 'False'
                ];

        }
    }

    /**
     * Modifica un dato existente en el modelo PsCactividadProceso.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$request,$isAjax,$tipo)
    {
        $model = $this->findModel($id);
        
        if($tipo==1){
            $listusuarios = $this->findUsuarios($id,$model->id_usuario);
        }else{
            $listusuarios="";
        }

        if ($model->load($request) && $model->save()) {
			
			
			return [
                            'model' => $model,
                            'update' => 'True'
                        ];
        } 
         elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'update' => 'Ajax',
                    'listusuarios'=>$listusuarios
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'update' => 'False',
                            'listusuarios'=>$listusuarios
                        ];
        }
    }
    
    
    /**
     * Modifica un dato existente en el modelo PsCactividadProceso.
     * en el modulo detalleproceso segun id_cactividad_proceso 
     * @param integer $id
     * @return mixed
     */
     public function actionUpdatedetproceso($id,$request,$isAjax)
    {
        $fechaactual = date(Yii::$app->fmtfechaphp); 
              
        //Consulta el registro de la id_cactividad_proceso que se va a editar ===========================================
        $model = $this->findModel($id);
        
        //Listando usuarios de la tabla usuarios_ap para el campo id_usuario de la tabla ps_cactividad_proceso
        //El istado contiene los usuarios que tiene el rol indicado en el campo cod_rol cuando la actividad actual es igual
        //al campo id_actividad_destino de la tabla ruta_actividad, se verifica si el usuario asignado actualmente existe en ese listado
        //sino se agrega al conjunto de objeto @id-> id de la actividad_cproceso
        $listusuarios = $this->findUsuarios($id,$model->id_usuario);
        
        
        //Obteniendo Listado de causales de pausa================================================================================
        $list_causal = $this->findCausal();
        
        
        //Obteniendo clasificaciones==============================================================================================
        $validaciones = $this->ps_clasif_actividad($model->id_actividad);
        
        //Generando nuevo Modelo para reglas de validacion========================================================================
        $model_rules = new \common\models\cda\PsCactividadProcesoDinamico($validaciones[0],$validaciones[1]);
        
        $model_rules->id_cactividad_proceso = $model->id_cactividad_proceso;
        $model_rules ->observacion = $model->observacion;
        $model_rules ->fecha_prevista = $model->fecha_prevista;
        $model_rules ->numero_quipux= $model->numero_quipux;
        $model_rules ->id_cproceso = $model->id_cproceso;
        $model_rules ->id_usuario = $model->id_usuario;
        $model_rules ->fecha_realizacion = $model->fecha_realizacion;
        $model_rules ->id_actividad = $model->id_actividad;
        $model_rules ->fecha_creacion = $model->fecha_creacion;
        $model_rules ->diligenciado = $model->diligenciado;
        $model_rules ->dias_pausa = $model->dias_pausa;
        $model_rules ->id_opc_tselect = $model->id_opc_tselect;
        $model_rules ->otro_cuales = $model->otro_cuales;
        $model_rules ->id_clasif_actividad = $model->id_clasif_actividad;
        $model_rules->isNewRecord = '';
       
        
        if (!empty($request) and $model_rules->load($request) ) {
            
            
            //Si el campo OBLIGATORIO_DILIGENCIAMIENTO esta en 'S' se debe validar que la actividad origen tenga una 'S' guardada ene l campo
            //Diligenciado,si esto no se cumple no se puede continuar y se reporta un mensaje qe no se ha diligenciado toda la informacion de la actividad.
            $_checkdiligenciamiento = $this->findDiligenciado($model->id_cactividad_proceso);
            
            if($_checkdiligenciamiento[0] == TRUE){
                return [
                 'mensaje' => $_checkdiligenciamiento[1],
                 'update' => 'False',
                 'model' => $model_rules,
                ];
            }
                        
            
            //Guardando datos sobre el modeulo Dinamico=============================================================================
            $model_save = new PsCactividadProceso();
            $model_save ->id_cproceso =  (!empty($request['PsCactividadProcesoDinamico']['id_cproceso']))? $request['PsCactividadProcesoDinamico']['id_cproceso']:$model->id_cproceso;
            $model_save ->id_actividad = (!empty($request['PsCactividadProcesoDinamico']['id_actividad']))? $request['PsCactividadProcesoDinamico']['id_actividad']:$model->id_actividad;
            $model_save ->fecha_creacion = $fechaactual;
            $model_save ->diligenciado = 'N';
            $model_save ->id_clasif_actividad = $this->idclasificacion((!empty($request['PsCactividadProcesoDinamico']['id_actividad']))? $request['PsCactividadProcesoDinamico']['id_actividad']:$model->id_actividad);
            $model_save ->numero_quipux = (!empty($request['PsCactividadProcesoDinamico']['numero_quipux']))? $request['PsCactividadProcesoDinamico']['numero_quipux']:$model->numero_quipux;
            $model_save ->observacion = (!empty($request['PsCactividadProcesoDinamico']['observacion']))? $request['PsCactividadProcesoDinamico']['observacion']:$model->observacion;
            $model_save ->fecha_realizacion =(!empty($request['PsCactividadProcesoDinamico']['fecha_realizacion']))? $request['PsCactividadProcesoDinamico']['fecha_realizacion']:$model->fecha_realizacion;
            $model_save ->dias_pausa = (!empty($request['PsCactividadProcesoDinamico']['dias_pausa']))? $request['PsCactividadProcesoDinamico']['dias_pausa']:$model->dias_pausa;
            $model_save ->id_opc_tselect =(!empty($request['PsCactividadProcesoDinamico']['id_opc_tselect']))? $request['PsCactividadProcesoDinamico']['id_opc_tselect']:$model->id_opc_tselect;
            $model_save ->otro_cuales = (!empty($request['PsCactividadProcesoDinamico']['otro_cuales']))? $request['PsCactividadProcesoDinamico']['otro_cuales']:$model->otro_cuales;
            $model_save ->id_usuario = (!empty($request['PsCactividadProcesoDinamico']['id_usuario']))? $request['PsCactividadProcesoDinamico']['id_usuario']:$model->id_usuario;
        
           
            //Si dias pausa esta visible y fecha prevista esta visible, y el fecha prevista esta deshabilitado
            //se calcula la fecha prevista con: fecha_actua+dias_pausa
            
            if($validaciones[2]['dias_pausa']==TRUE and $validaciones[2]['fecha_prevista']==TRUE and $validaciones[3]['fecha_prevista']==TRUE){
               
                $fecha = $fechaactual;
                $nuevafecha = strtotime ( '+'.$model_rules->dias_pausa. 'day' , strtotime ( $fecha ) ) ;
                $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
                $model_save->fecha_prevista =  $nuevafecha;
               
            }else{
                 $model_save->fecha_prevista =  (!empty($request['PsCactividadProcesoDinamico']['fecha_prevista']))? $request['PsCactividadProcesoDinamico']['fecha_prevista']:$model->fecha_prevista;
            }
            
            
            
            
            //===========================================ORGANIZANDO INFORMACION PARA EL MODELO PS_RESPONSABLE PROCESO=======================
            if($model_rules->id_usuario != $model_save->id_usuario){
                        
                        $model3 = new \common\models\hidricos\PsResponsablesProceso();
                        $model3->id_usuario = $model_save ->id_usuario;
                        $model3->observacion = $model_save->observacion;
                        $model3->id_cproceso = $model_save->id_cproceso;
                        $model3->fecha = $fechaactual;
                                
            }
            
            //=========================================ORGANIZANDO INFORMACION PARA EL MODELO PS_CPROCESO===================================
            $model2 = $this->findIdcproceso($model_save->id_cproceso);
            $model2->ult_id_actividad = $model_save->id_actividad;
            
             if($model_rules->id_usuario != $model_save->id_usuario){
                 $model2->ult_id_usuario = $model_save->id_usuario;
             }
            
             
             //======================Si el registro de la actividad no ha sido creado y se va a crear por primera vez se debe crear un registro 
             //En la tabla PS_HISTORICO_ESTADO con la siguiente informacion: ===============================================================
             
             /****************************************OJO*********************************************************************************/
             
//             if(empty($model->id_cactividad_proceso)){
//                 $model4 = New PsHistoricoEstados();
//                 $model4->fecha_estado = $fechaactual;
//                 $model4->observaciones = "Cambio de estado por Actividad";
//                 $model4->id_eproceso = 
//            }
             
             
            //Iniciando Transaccion=======================================================================================================
            $transaction = Yii::$app->db->beginTransaction();
            
            try{
                if(!empty($model_save) and $model_save->save()){
                    if(!empty($model3) and $model3->save()){
                        
                        if(!empty($model2) and $model2->save()){
                            $transaction->commit();
                        }else{
                            $transaction->rollBack();
                            throw new NotFoundHttpException('Error al guardar el modelo 2 - modelo 3 incluido.');
                        }
                        
                    }else if(empty($model3)){
                        
                        if(!empty($model2) and $model2->save()){
                             $transaction->commit();
                        }else{
                            $transaction->rollBack();
                            throw new NotFoundHttpException('Error al guardar el modelo 2 - modelo 3 vacio.');
                        }
                        
                    }else{
                        $transaction->rollBack();
                        throw new NotFoundHttpException('Error al guardar el modelo 3');
                    }
                }else{
                   $transaction->rollBack(); 
                    throw new NotFoundHttpException('Error al guardar el modelo 1');
                }
                
                
            } catch (Exception $ex) {
                    $transaction->rollBack();
            }
           
                
            return [
                 'model' => $model_save,
                 'update' => 'True'
             ];
            
        } 
         elseif ($isAjax) {
             
             
        
                return [
                    'model' => $model_rules,
                    'update' => 'Ajax',
                    'listusuarios' => $listusuarios,
                    'listcausal' => $list_causal,
                    'visibles' => $validaciones[2],
                    'disabled' => $validaciones[3]
                ];	
           
        }  
        else {
                         return [
                            'model' => $model_rules,
                            'update' => 'False',
                             'listusuarios' => $listusuarios,
                             'listcausal' => $list_causal,
                             'visibles' => $validaciones[2],
                             'disabled' => $validaciones[3]
                        ];
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
        $this->findModel($id)->delete();

    }

    /**
     * Finds the PsCactividadProceso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PsCactividadProceso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
                    if (($model = PsCactividadProceso::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /*
     * Funcion para buscar el modelo de datos del registro que contiene el id_cproceso
     */
    
     protected function findIdcproceso($id)
    {
        if (($model = \common\models\cda\PsCproceso::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*Funcion para buscar listado de usuarios para el select
     * del formulario de edicion actividades del modulo detalleproceso
     * @id_actividadcproceso => id de la actividad cproceso
     * @id_usuario => id del usuario actual, pues de no cumplir el rol se debe unir al listado que si cumple el rol
     */
    protected function findUsuarios($id_actividadcproceso=null,$id_usuario=null){
        
        
        //1) Se buscan los usuarios que tienen el rol indicado en el campo ROL_A_ASIGNAR de la tabla  PS_ACTIVIDAD
        $list_usuarios=UsuariosAp::find()
                       ->select(['usuarios_ap.id_usuario','usuarios_ap.nombres']) 
                       ->leftJoin('perfiles','perfiles.id_usuario = usuarios_ap.id_usuario')
                       ->leftJoin('ps_actividad','ps_actividad.rol_a_asignar = perfiles.cod_rol')
                       ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_actividad =  ps_actividad.id_actividad')
                       ->where(['=','ps_cactividad_proceso.id_cactividad_proceso',$id_actividadcproceso])
                        ->all();
                       
        if(empty($list_usuarios)){
            
        $list_usuarios=UsuariosAp::find()
                   ->select(['usuarios_ap.id_usuario','usuarios_ap.nombres'])
                   ->leftJoin('perfiles','perfiles.id_usuario = usuarios_ap.id_usuario')
                   ->leftJoin('ps_actvidad_ruta','ps_actvidad_ruta.cod_rol = perfiles.cod_rol')
                   ->leftJoin('ps_actividad','ps_actividad.id_actividad = ps_actvidad_ruta.id_actividad_destino')
                   ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_actividad = ps_actividad.id_actividad')
                   ->where(['=','ps_cactividad_proceso.id_cactividad_proceso',$id_actividadcproceso])->all(); 
            
        }        
        
        if(empty($list_usuarios)){
            $list_usuarios=UsuariosAp::find()->select(['usuarios_ap.id_usuario','usuarios_ap.nombres'])->where(['=','id_usuario',$id_usuario])->all();
        }
        
        
        return $list_usuarios;
        
    }
    
    
    /* Entre array de causales que se encuentra en la tabla  ps_opc_tipo_select
     * que se encuentran relacionadas al id_actividad a traves de la tabla ps_tipo_select, y el id_actividad
     * 
     * esta relacionado al id_actividadcproceso de la tabla ps_catividad_proceso
     */
     protected function findCausal(){
         
          $list_pausa=PsOpcTipoSelect::find()
                        ->select(['ps_opc_tipo_select.id_opc_tselect','nom_opc_tselect'])
                        ->leftJoin('ps_tipo_select','ps_tipo_select.id_tselect = ps_opc_tipo_select. id_tselect')
                        ->leftJoin('ps_actividad','ps_actividad.id_tselect = ps_tipo_select.id_tselect')
                        ->where(['=','id_actividad','3'])
                        ->all();
          
          return $list_pausa;
     }
     
     
     protected function idclasificacion($id_actividad){
         $id_clasificacion= \common\models\cda\PsActividad::find($id_actividad)->one();
         
         return $id_clasificacion->id_clasif_actividad;
     }
     
      /*Array que entrega que campos se van a mostrar al usuario segun la tabla PS_CLASIF_ACTIVIDAD,
      * la cual se encuentra relacionada con la tabla id_actividad 
      *   'id_cactividad_proceso' => 'Id Cactividad Proceso',
            'observacion' => 'Observacion',
            'fecha_realizacion' => 'Fecha Realizacion',
            'fecha_prevista' => 'Fecha Prevista',
            'numero_quipux' => 'Numero Quipux',
            'id_cproceso' => 'Id Cproceso',
            'id_usuario' => 'Id Usuario',
            'id_actividad' => 'Id Actividad',
            'fecha_creacion' => 'Fecha Creacion',
            'diligenciado' => 'Diligenciado',
            'dias_pausa' => 'Dias Pausa', 
           'id_opc_tselect' => 'Causal', 
           'otro_cuales' => 'Otro Cuales', 
           'id_clasif_actividad' => 'Id Clasif Actividad', 
      */
     
     protected function ps_clasif_actividad($id_actividad){
         
         
         $_visibles=array();
         $_nombres=array();
         $_obligatorio=array();
         $_habilitado=array();        
                 
         $list_clasificacion = PsClasifActividad::find()
                               ->leftJoin('ps_actividad','ps_actividad.id_clasif_actividad = ps_clasif_actividad.id_clasif_actividad')
                               ->where(['=','id_actividad',$id_actividad])
                               ->one();
         
         
         //Llenando vector de nombres para la construccion del modelo dinamico
         $_nombres=['observacion'=>$list_clasificacion->nom_c_obs,
                    'fecha_realizacion'=>$list_clasificacion->nom_c_fec_rea,
                    'fecha_prevista' => $list_clasificacion->nom_c_fec_pre,
                    'numero_quipux' => $list_clasificacion->nom_c_num_qpx,
                    'id_usuario' => $list_clasificacion->nom_c_usua,
                    'diligenciado' => 'Diligenciado',
                    'otro_cuales' => 'Otro', 
                    'dias_pausa' => $list_clasificacion->nom_c_dia_pau,
                    'id_opc_tselect' => $list_clasificacion->nom_c_caus, 
                    ];
         
         //Evaluando para campo observacion============================================================
         
         if($list_clasificacion->vis_c_obs == 'S'){
             
            $_visibles['observacion'] = TRUE;
            
            if($list_clasificacion->hab_c_obs == 'S'){
                
                    //Se agrega observacion a habilitados
                    $_habilitado['observacion'] = FALSE;
                    
                    //Se agrega al vector de obligatorios
                    if($list_clasificacion->obl_c_obs == 'S'){
                        $_obligatorio[] = 'observacion';
                    }
                    
            }else{
                    $_habilitado['observacion'] = TRUE;
            }
            
            
             
         }else{
             
            $_visibles['observacion'] = FALSE;
            $_habilitado['observacion'] = TRUE;
         }
         
         //Evaluando apra fecha_realizacion================================================================
         
         if($list_clasificacion->vis_c_fec_rea == 'S'){
             
            $_visibles['fecha_realizacion'] = TRUE;
            
            if($list_clasificacion->hab_c_fec_rea == 'S'){
                
                    //Se agrega observacion a habilitados
                    $_habilitado['fecha_realizacion'] = FALSE;
                    
                    //Se agrega al vector de obligatorios
                    if($list_clasificacion->obl_c_fec_rea == 'S'){
                        $_obligatorio[] = 'fecha_realizacion';
                    }
                    
            }else{
                    $_habilitado['fecha_realizacion'] = TRUE;
            }
            
            
             
         }else{
             
            $_visibles['fecha_realizacion'] = FALSE;
            $_habilitado['fecha_realizacion'] = TRUE;
         }
         
         //Evaluando para fecha prevista===================================================================
         if($list_clasificacion->vis_c_fec_pre == 'S'){
             
            $_visibles['fecha_prevista'] = TRUE;
            
            if($list_clasificacion->hab_c_fec_pre == 'S'){
                
                    //Se agrega observacion a habilitados
                    $_habilitado['fecha_prevista'] = FALSE;
                    
                    //Se agrega al vector de obligatorios
                    if($list_clasificacion->obl_c_fec_pre == 'S'){
                        $_obligatorio[] = 'fecha_prevista';
                    }
                    
            }else{
                    $_habilitado['fecha_prevista'] = TRUE;
            }
            
            
             
         }else{
             
            $_visibles['fecha_prevista'] = FALSE;
            $_habilitado['fecha_prevista'] = TRUE;
         }
         
         
         //Evaluando para numero qpx==========================================================================
         if($list_clasificacion->vis_c_num_qpx == 'S'){
             
            $_visibles['numero_quipux'] = TRUE;
            
            if($list_clasificacion->hab_c_num_qpx == 'S'){
                
                    //Se agrega observacion a habilitados
                    $_habilitado['numero_quipux'] = FALSE;
                    
                    //Se agrega al vector de obligatorios
                    if($list_clasificacion->hab_c_num_qpx == 'S'){
                        $_obligatorio[] = 'numero_quipux';
                    }
                    
            }else{
                    $_habilitado['numero_quipux'] = TRUE;
            }
            
            
             
         }else{
             
            $_visibles['numero_quipux'] = FALSE;
            $_habilitado['numero_quipux'] = TRUE;
         }
         
         //Evaluando para dias pausa==========================================================================
         if($list_clasificacion->vis_c_dia_pau == 'S'){
             
            $_visibles['dias_pausa'] = TRUE;
            
            if($list_clasificacion->hab_c_dia_pau == 'S'){
                
                    //Se agrega observacion a habilitados
                    $_habilitado['dias_pausa'] = FALSE;
                    
                    //Se agrega al vector de obligatorios
                    if($list_clasificacion->hab_c_dia_pau == 'S'){
                        $_obligatorio[] = 'dias_pausa';
                    }
                    
            }else{
                    $_habilitado['dias_pausa'] = TRUE;
            }
            
            
             
         }else{
             
            $_visibles['dias_pausa'] = FALSE;
            $_habilitado['dias_pausa'] = TRUE;
         }
         
          //Evaluando para causal==========================================================================
         if($list_clasificacion->vis_c_caus == 'S'){
             
            $_visibles['id_opc_tselect'] = TRUE;
            
            if($list_clasificacion->hab_c_caus == 'S'){
                
                    //Se agrega observacion a habilitados
                    $_habilitado['id_opc_tselect'] = FALSE;
                    
                    //Se agrega al vector de obligatorios
                    if($list_clasificacion->hab_c_caus == 'S'){
                        $_obligatorio[] = 'id_opc_tselect';
                    }
                    
            }else{
                    $_habilitado['id_opc_tselect'] = TRUE;
            }
            
            
             
         }else{
             
            $_visibles['id_opc_tselect'] = FALSE;
            $_habilitado['id_opc_tselect'] = TRUE;
         }
         
          //Evaluando para usuarios==========================================================================
         if($list_clasificacion->vis_c_usua == 'S'){
             
            $_visibles['id_usuario'] = TRUE;
            
            if($list_clasificacion->hab_c_usua == 'S'){
                
                    //Se agrega observacion a habilitados
                    $_habilitado['id_usuario'] = FALSE;
                    
                    //Se agrega al vector de obligatorios
                    if($list_clasificacion->hab_c_usua == 'S'){
                        $_obligatorio[] = 'id_usuario';
                    }
                    
            }else{
                    $_habilitado['id_usuario'] = TRUE;
            }
            
            
             
         }else{
             
            $_visibles['id_usuario'] = FALSE;
            $_habilitado['id_usuario'] = TRUE;
         }
         
         return [$_nombres,$_obligatorio,$_visibles,$_habilitado];
         
     }
     
     
      public function findcondicioneshab($id_actividad_origen,$id_cproceso){
         
         $habilitacion = \common\models\cda\PsActividad::find()
                        ->select(['ps_actividad.subpantalla','ps_cactividad_proceso.diligenciado','ps_cactividad_proceso.id_cactividad_proceso'])
                        ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_actividad = ps_actividad.id_actividad')
                        ->where(['=','ps_cactividad_proceso.id_cproceso',$id_cproceso])
                        ->andwhere(['=','ps_cactividad_proceso.id_actividad',$id_actividad_origen])
                        ->one();
        
        if(!empty($habilitacion->subpantalla) and $habilitacion->diligenciado=='S'){
            return [TRUE,$habilitacion->subpantalla,$habilitacion->id_cactividad_proceso];
        }else{
            return [FALSE];
        }
        
        return $acciondinamica; 
         
     }
     
     
     /*
      * Entrega TRUE O FALSE, Y MENSAJE, de acuerdo al requerimiento anexado
      * Si el campo OBLIGTORIO_DILIGENCIAMIENTO está en S se debe validar que la actividad origen tenga en el campo DILIGENCIADO S S, al no cumplirse de no permite continuar y se reporta un mensaje que no se ha diligenciado toda la información de la actividadindicando que fue diligenciada, si el campo OBLIGTORIO_DILIGENCIAMIENTO esta N no aplica estesta validación.  
        Pero si el campo OBLIGTORIO_DILIGENCIAMIENTO está en O revisa que el campo DILIGENCIADO de la actividad  origen estaestá en N, de o cumplirse se reporta el siguiente mensaje “Para ir a la actividad seleccionada no puede tener información diligenciada en la actividad actual”
      * 
      */
     
     public function findDiligenciado($id_cactividad_proceso){
        
         $cumplimiento = \common\models\cda\PsActvidadRuta::find()
                         ->select(['ps_actvidad_ruta.obligatorio_diligenciamiento','ps_cactividad_proceso.diligenciado'])
                         ->leftJoin('ps_actividad','ps_actividad.id_actividad = ps_actvidad_ruta.id_actividad_origen')
                         ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_actividad = ps_actividad.id_actividad')
                         ->where(['=','ps_cactividad_proceso.id_cactividad_proceso',$id_cactividad_proceso])
                         ->one();
         
         if($cumplimiento->obligatorio_diligenciamiento == 'S' and $cumplimiento->diligenciado != 'S'){
            return [TRUE,'No se ha diligenciado toda la informacion de la actividad'];
         }else if($cumplimiento->obligatorio_diligenciamiento == 'O' and $cumplimiento->diligenciado != 'N'){
            return [TRUE,'Para ir a la actividad selecionado no puede tener informacion diligenciada en la actividad actual'];
         }else if($cumplimiento->obligatorio_diligenciamiento == 'N'){
            return FALSE;
         }
     }
     
     public function findcondicionCont($id_cproceso,$id_cactividad_proceso){
         
         $habilitacion = \common\models\cda\PsActividad::find()
                        ->select(['ps_actividad.subpantalla','ps_cactividad_proceso.diligenciado','ps_cactividad_proceso.id_cactividad_proceso'])
                        ->leftJoin('ps_cproceso','ps_cproceso.ult_id_actividad = ps_actividad.id_actividad')
                        ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cproceso = ps_cproceso.id_cproceso')
                        ->where(['=','ps_cproceso.id_cproceso',$id_cproceso])
                        ->andwhere(['=','ps_cactividad_proceso.id_cactividad_proceso',$id_cactividad_proceso])
                        ->one();

      
         
         
        if(!empty($habilitacion->subpantalla) and $habilitacion->diligenciado=='S'){
            return [TRUE,$habilitacion->subpantalla];
        }else if(empty($habilitacion->subpantalla) and $habilitacion->diligenciado=='N'){
            return [TRUE];
        }else{
            return [FALSE];
        }
         
     }
     
      public function dinamicaSave($id_cproceso,$id_actividad_destino,$id_eproceso,$id_actividad_origen){
         
          $fechaactual = date(Yii::$app->fmtfechaphp);
          
          $model_save = new PsCactividadProceso();
          $model_save ->id_cproceso =  $id_cproceso;
          $model_save ->id_actividad = $id_actividad_destino;
          $model_save ->fecha_creacion = $fechaactual;
          $model_save ->diligenciado = 'N';
          $model_save ->id_clasif_actividad = $this->idclasificacion($id_actividad_destino);
          $model_save ->id_usuario = Yii::$app->user->identity->id_usuario;
        
          $transaction = Yii::$app->db->beginTransaction();
          
          if($model_save->save()){
              
              $model_cproceso = $this->findIdcproceso($id_cproceso);
              $model_cproceso->ult_id_actividad = $id_actividad_destino;
              
              if(!empty($id_eproceso)){
               
                  $model_cproceso->ult_id_eproceso = $id_eproceso;
                  if($model_cproceso->save()){
                      
                      
                        $model4 = New PsHistoricoEstados();
                        $model4->fecha_estado = $fechaactual;
                        $model4->observaciones = "Cambio de estado por Actividad";
                        $model4->id_eproceso = $id_eproceso;
                        $model4->id_cproceso = $id_cproceso;
                        $model4 ->id_usuario = Yii::$app->user->identity->id_usuario;
                        $model4 ->id_actividad = $id_actividad_origen;
                        $model4 ->id_tgestion = null;
                        
                        if($model4->save()){
                             $transaction->commit();
                             return TRUE;
                        }else{
                            $transaction->rollBack(); 
                            throw new NotFoundHttpException('Error al guardar historico de estados');
                            return FALSE;
                        }
                                            
                  }else{
                       $transaction->rollBack(); 
                        throw new NotFoundHttpException('Error al guardar historico de estados');
                        return FALSE;
                  }
                  
              }else{
                  
                  if($model_cproceso->save()){
                    $transaction->commit();
                    return TRUE;
                  }else{
                     $transaction->rollBack(); 
                    throw new NotFoundHttpException('Error al actualizar proceso');
                    return FALSE; 
                  }
              }
              
          }else{
               $transaction->rollBack(); 
                throw new NotFoundHttpException('Error al guardar Actividad');
                return FALSE;
          }
     }
     
     
    /*Funcion para llenar el formulario actividad de la actividad_destino
      * cuando tipo_pantalla = 0
      */
     
     public function actionCreateactividadDestino($id_actividad_destino,$request,$isAjax,$id_actividad_cproceso,$id_cproceso,$id_actividad_origen,$id_eproceso)
    {
        $fechaactual = date(Yii::$app->fmtfechaphp);
        
        //Consulta el registro de la id_cactividad_proceso que se va a editar ===========================================
        $model = New PsCactividadProceso();
        
        //Listando usuarios de la tabla usuarios_ap para el campo id_usuario de la tabla ps_cactividad_proceso
        //El istado contiene los usuarios que tiene el rol indicado en el campo cod_rol cuando la actividad actual es igual
        //al campo id_actividad_destino de la tabla ruta_actividad, se verifica si el usuario asignado actualmente existe en ese listado
        //sino se agrega al conjunto de objeto @id-> id de la actividad_cproceso
        $listusuarios = $this->findUsuarios($id_actividad_cproceso);
        
        
        //Obteniendo Listado de causales de pausa================================================================================
        $list_causal = $this->findCausal();
        
        
        //Obteniendo clasificaciones==============================================================================================
        $validaciones = $this->ps_clasif_actividad($id_actividad_destino);
        
        //Generando nuevo Modelo para reglas de validacion========================================================================
        $model_rules = new \common\models\cda\PsCactividadProcesoDinamico($validaciones[0],$validaciones[1]);
        $model_rules->isNewRecord = TRUE;
       
        
        if (!empty($request) and $model_rules->load($request) ) {
            
            $model_rules ->id_cproceso =  $id_cproceso;
            $model_rules ->id_actividad = $id_actividad_destino;
            $model_rules ->fecha_creacion = $fechaactual;
            $model_rules ->diligenciado = 'N';
            $model_rules ->id_clasif_actividad = $this->idclasificacion($id_actividad_destino);
            $model_rules ->id_usuario = Yii::$app->user->identity->id_usuario;
            
            $transaction = Yii::$app->db->beginTransaction();
            
            if($model_rules->save()){
                
                if(!empty($id_eproceso)){
               
                  $model_cproceso = $this->findIdcproceso($id_cproceso);
                  $model_cproceso->ult_id_actividad = $id_actividad_destino;
                  $model_cproceso->ult_id_eproceso = $id_eproceso;
                  
                  if($model_cproceso->save()){
                      
                      
                        $model4 = New PsHistoricoEstados();
                        $model4->fecha_estado = $fechaactual;
                        $model4->observaciones = "Cambio de estado por Actividad";
                        $model4->id_eproceso = $id_eproceso;
                        $model4->id_cproceso = $id_cproceso;
                        $model4 ->id_usuario = Yii::$app->user->identity->id_usuario;
                        $model4 ->id_actividad = $id_actividad_origen;
                        $model4 ->id_tgestion = null;
                        
                        if($model4->save()){
                             $transaction->commit();
                             return [
                                'model' => $model_rules,
                                'create' => TRUE,
                                ];
                        }else{
                            $transaction->rollBack(); 
                            throw new NotFoundHttpException('Error al guardar historico de estados');
                            return [
                            'model' => $model_rules,
                            'create' => FALSE,
                            ];
                        }
                                            
                  }else{
                       $transaction->rollBack(); 
                        throw new NotFoundHttpException('Error al guardar historico de estados');
                        return [
                        'model' => $model_rules,
                        'create' => FALSE,
                        ];
                  }
                  
                }else{

                     $transaction->commit();
                     return [
                        'model' => $model_rules,
                        'create' => TRUE,
                    ];	
                }
                
            }else{
               $transaction->rollBack(); 
                throw new NotFoundHttpException('Error al guardar Actividad');
                 return [
                        'model' => $model_rules,
                        'create' => FALSE,
                        ];
            }
            
        } 
        elseif ($isAjax) {
             
             
        
                return [
                    'model' => $model_rules,
                    'create' => 'Ajax',
                    'listusuarios' => $listusuarios,
                    'listcausal' => $list_causal,
                    'visibles' => $validaciones[2],
                    'disabled' => $validaciones[3]
                ];	
           
        }  
        else {
            return [
               'model' => $model_rules,
               'create' => 'screen',
                'listusuarios' => $listusuarios,
                'listcausal' => $list_causal,
                'visibles' => $validaciones[2],
                'disabled' => $validaciones[3]
           ];
        }
    } 
     
     
      /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  CdaReporteInformacion     */
    protected function findModelByParams($params)
    {
        if (($model = PsCactividadProceso::findOne($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo CdaReporteInformacion     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type CdaReporteInformacion     */
     public function cargaPsCactividadProceso($params){
        return $this->findModelByParams($params);
    }
}
