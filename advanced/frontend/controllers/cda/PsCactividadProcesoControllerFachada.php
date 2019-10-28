<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\PsCactividadProceso;
use common\models\cda\PsCactividadProcesoSearch;
use common\models\cda\PsOpcTipoSelect;
use common\models\cda\PsClasifActividad;
use common\models\cda\PsHistoricoEstados;
use common\models\cda\PsActividad;
use common\controllers\controllerspry\FachadaPry;
use common\models\autenticacion\UsuariosAp;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera

/**
 * PsCactividadProcesoControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo PsCactividadProceso.
 */
class PsCactividadProcesoControllerFachada extends FachadaPry
{
    /**
     * {@inheritdoc}
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

    public function actionProgress($urlroute = null, $id = null)
    {
        $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif').'</div>';
        $progressbar = $progressbar."<div style='text-align:center'>Guardando</div>";
        $progressbar = $progressbar."<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";

        return $progressbar;
    }

    /**
     * Listado todos los datos del modelo PsCactividadProceso que se encuentran en el tablename.
     *
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
        $searchModel = new PsCactividadProcesoSearch();
        $dataProvider = $searchModel->search($queryParams);

        return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ];
    }

    /**
     * Presenta un dato unico en el modelo PsCactividadProceso.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->findModel($id);
    }

    /**
     * Crea un nuevo dato sobre el modelo PsCactividadProceso .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     *
     * @return mixed
     */
    public function actionCreate($request, $isAjax)
    {
        $model = new PsCactividadProceso();

        if ($model->load($request) && $model->save()) {
            return [
                    'model' => $model,
                    'create' => 'True',
                ];
        } elseif ($isAjax) {
            return [
                    'model' => $model,
                    'create' => 'Ajax',
                ];
        } else {
            return [
                    'model' => $model,
                    'create' => 'False',
                ];
        }
    }
    
    /*
     * Modificando responsable ===================================================================================================
     * var1 => id_cproceso Reponsable del proceso
     * var2 => id_cactividad_proceso
     * var3 => id_actividad_Actual
     */
    public function actionCederactividad($var1, $request, $isAjax,$var2,$var3,$var6){
        
        $basicas = New BasicController();
        $fechaactual = date(Yii::$app->fmtfechahoraphp);
         
        $model = $this->findModel($var2);
        $model_cproceso = $basicas->findUltimaAsignacion($var1);
       
        
        //Averiguando actividad anterior  =================================================================
        $actividades = $basicas->findActividadesCproceso($var1,$var6);
        $c_actividad = count($actividades)-2;
        $last = $actividades[$c_actividad]->id_actividad;
        
        
        Yii::trace("que actividad llega aqui"+$last,"DEBUG");
        
         if(!empty($request)){
             
             $id_usuario = $_POST['id_usuario'];
              
             
             $modelNew = New PsCactividadProceso();
             $modelNew->observacion = $model->observacion;
             $modelNew->fecha_realizacion = $model->fecha_realizacion;
             $modelNew->fecha_prevista = $model->fecha_prevista;
             $modelNew->numero_quipux = $model->numero_quipux;
             $modelNew->id_cproceso = $model->id_cproceso;
             $modelNew->id_usuario = $id_usuario;
             $modelNew->id_actividad = $model->id_actividad;
             $modelNew->fecha_creacion = $fechaactual;
             $modelNew->diligenciado = $model->diligenciado;
             $modelNew->dias_pausa = $model->dias_pausa;
             $modelNew->id_opc_tselect = $model->id_opc_tselect;
             $modelNew->otro_cuales = $model->otro_cuales;
             $modelNew->id_clasif_actividad = $model->id_clasif_actividad;
             $modelNew->puntos = $model->puntos;
             $modelNew->tipo = $model->tipo;
             
             
             $model_cproceso->ult_id_usuario =$id_usuario;
             $transaction = Yii::$app->db->beginTransaction();   
             
              try {
            
                    if ($modelNew->save()) { 

                        if($model_cproceso->save()){

                                $transaction->commit();
                                 return [
                                    'update' => 'TRUE',
                                   ];

                        }else{

                             $transaction->rollBack();
                             throw new NotFoundHttpException('Error actualiznado el proceso');
                        }

                    }else{

                         $transaction->rollBack();
                         throw new NotFoundHttpException('Error al guardar la actividad del proceso');
                    }
            

                } catch (Exception $ex) {
                    $transaction->rollBack();
                    return [
                     'update' => 'False',
                     'error' => 'Error de base de datos '
                    ];
                }
             
             
             
         }else{
           
            $listusuarios = $basicas->findUsuariosrutaActividad($last,$var3);
            
            if(empty($listusuarios)){

             return [
                     'update' => 'False',
                     'error' => 'No hay roles de usuarios a la actividad '
                 ];

            }else{
                
                $cantidadUsuarios = count($listusuarios);
                
                if($cantidadUsuarios == '1'){
                    
                    return [
                     'update' => 'False',
                     'error' => 'No existe mas usuarios para asignar '
                    ];
                }else{
                    
                    return [
                                'listusuarios' => $listusuarios,
                                'update' => 'Ajax',
                                'selectone' => FALSE,
                            ];
                }
                
            }
        
            
        }
        
    }
    
    /*Replicar ps_catividad_proceso cuando se pasa de una actividad a otra en una solicitud ========================================================
     * Creada: 2019-03-13
     * Diana B.
     */
    protected function actionNext_pscactividadproceso($model_old, $id_actividad,$id_usuario,$tipo,$id_cda_tramite = null)
    {
     
        $basicas = New BasicController();
        
        /* Buscando datos de actividad **************************************************/
        $dataactividad = $basicas->findActividadRutaDestino($model_old->id_actividad, $id_actividad);
        
        /* Modelo para ps_cactividad_proceso ********************************************/
         $model = new PsCactividadProceso();
         $fechaactual = date(Yii::$app->fmtfechahoraphp);
         
         $model->observacion = NULL;
         $model->fecha_realizacion = NULL;
         $model->fecha_creacion = $fechaactual;
         $model->fecha_prevista = NULL;
         $model->numero_quipux = $model_old->numero_quipux;
         $model->id_cproceso = $model_old->id_cproceso;
         $model->id_usuario = $id_usuario;
         $model->id_actividad = $id_actividad;
         $model->diligenciado = 'N';
         $model->tipo = $tipo;
         
        /* Modelo ps_cproeso **********************************************************/
        $model_cproceso = $basicas->findUltimaAsignacion($model_old->id_cproceso);
        $model_cproceso->ult_id_actividad = $id_actividad;
        $model_cproceso->ult_id_eproceso = $dataactividad->id_eproceso;
        $model_cproceso->ult_id_usuario = $id_usuario;
        $model_cproceso->ult_fecha_actividad = $fechaactual;
        
        
        
        /* Modelo Historico Estados **************************************************/
        $model_Historico = new PsHistoricoEstados();
        $model_Historico->fecha_estado = $fechaactual;
        $model_Historico->observaciones = 'Cambio de estado por Actividad';
        $model_Historico->id_eproceso = $dataactividad->id_eproceso;
        $model_Historico->id_cproceso = $model_old->id_cproceso;
        $model_Historico->id_usuario = Yii::$app->user->identity->id_usuario;
        $model_Historico->id_actividad = $id_actividad;
        $model_Historico->id_tgestion = null;
        
        
        
        $transaction = Yii::$app->db->beginTransaction();   
         
        try {
            
           if ($model->save()) { 
               
               if($model_cproceso->save()){
                   
                   if($model_Historico->save()){
                       
                       $transaction->commit();
                       return TRUE;
                       
                   }else{
                       $transaction->rollBack();
                        //$errores = $model_Historico->getErrors();
                        //foreach($errores as $clave){
                          //  $_revisando = implode(",",$clave);
                          //  Yii::trace("sera que asi si: ".$_revisando,"DEBUG");
                        //}
                        throw new NotFoundHttpException('Error al guardando Trazabilidad ');
                   }
                   
               }else{
                   
                   $errores = $model_cproceso->getErrors();
                foreach($errores as $clave){
                    $_revisando = implode(",",$clave);
                    Yii::trace("sera que asi si: ".$_revisando,"DEBUG");
                } 
                   
                    $transaction->rollBack();
                    throw new NotFoundHttpException('Error actualiznado el proceso');
               }
               
           }else{
               
                $transaction->rollBack();
                throw new NotFoundHttpException('Error al guardar la actividad del proceso');
               
           }
            

        } catch (Exception $ex) {
            $transaction->rollBack();
            return FALSE;
        }
         
        
         
    }
    
    
    
    /**
     * Modifica un dato existente en el modelo PsCactividadProceso.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     *
     * @param int $id
     *
     * @return mixed
     * Modificada para PQRS -> 2018-08-05
     */
    public function actionUpdate($id, $request, $isAjax, $tipo, $pqrs = false, $idpqr = null)
    {
        $model = $this->findModel($id);
        $basicas = New BasicController();
        
        if ($tipo == 1) {
            if ($pqrs == true) {
                $listusuarios = $this->findusuariosPQR($model->id_actividad, $idpqr, $model->id_usuario);
            }
        } else {
            $listusuarios = '';
        }

        if ($model->load($request) && $model->save()) {
			
			if(!empty($model2)){
					
					$model2->ult_id_usuario = $model->id_usuario;
					
					if($model2->save()){
						return [
								'model' => $model,
								'update' => 'True',
							];
					}
			}else{
				return [
                    'model' => $model,
                    'update' => 'Ajax',
                    'listusuarios' => $listusuarios,
                ];
				
			}				
        } elseif ($isAjax) {
            return [
                    'model' => $model,
                    'update' => 'Ajax',
                    'listusuarios' => $listusuarios,
                ];
        } else {
            return [
                            'model' => $model,
                            'update' => 'False',
                            'listusuarios' => $listusuarios,
                        ];
        }
    }
    
    /***
     * Habilita la ventana para pausa
     * esta ventana alimenta la tabla ps_cactividad_proceso
     * en la actividad pausa a través del boton detalle actividad
     * Modificado: 2019-03-01
     * Por: Diana B
     */
    public function actionPausa($id_cproceso,$tipo,$request, $isAjax){
        
        $fechaactual = date(Yii::$app->fmtfechahoraphp);
        $basicas = New BasicController();
        $ps_cactividad_proceso = $basicas->actualPsCactividadProceso($id_cproceso);
        
        //Buscando la clasificacion 9 que habilita el detalle actividad de pausa ==================================================
//        if($tipo=='1'){
//            $clasif_detalle=9;
//        }else{
//            $clasif_detalle=10;
//        }
        
        $ps_clasificacion=$basicas->findActividades(null,$ps_cactividad_proceso->id_actividad);
        $clasif_detalle = $ps_clasificacion['id_clasif_actividad'];
        
        $validaciones = $this->ps_clasif_actividad(null,$clasif_detalle);
        
        //Causales de la actividad pausa =============================================================
        $list_causal = $this->findCausal($ps_cactividad_proceso->id_actividad);

        //Trayendo modelo de la ps_cactividad_proceso ================================================
        $model = $this->findModel($ps_cactividad_proceso->id_cactividad_proceso);
        $model->fecha_realizacion = $fechaactual;
        
        if ($model->load($request)) {
            
            $transaction = Yii::$app->db->beginTransaction();
            $model->diligenciado = 'S';
            
            if($model->save()){
                
                $model4 = new PsHistoricoEstados();
                $model4->fecha_estado = $fechaactual;
                $model4->observaciones = null;
                $model4->id_eproceso = 4;
                $model4->id_cproceso = $id_cproceso;
                $model4->id_usuario = Yii::$app->user->identity->Id;
                $model4->id_actividad = $model->id_actividad;
                $model4->id_tgestion = null;
                
                if($model4->save()){
                    $transaction->commit();
                }else{
                    $transaction->rollBack();
                    throw new NotFoundHttpException('Error al guardar trazabilidad de Estados');
                }
            }else{
                $transaction->rollBack();
                throw new NotFoundHttpException('Error al actualizar detalle de la actividad');
            }
            
            return [
                    'model' => $model,
                    'update' => 'True',
                ];
        }else if($isAjax){
            
            return [
                    'model' => $model,
                    'update' => 'Ajax',
                    'listcausal' => $list_causal,
                    'visibles' => $validaciones[2],
                    'disabled' => $validaciones[3],
                ];
            
        }        
        
    }
    
    
    

    /**
     * Modifica un dato existente en el modelo PsCactividadProceso.
     * en el modulo detalleproceso segun id_cactividad_proceso.
     *
     * $id => id del registro en la tabla ps_cactividad_proceso
     * $tipo => tipo 'solicitud' valor 1, 'tramite valor 2
     * $id_cda_tipo => id de la solicitud o del tramite segun convenga
     * @return mixed
     */
    public function actionUpdatedetproceso($id, $request, $isAjax, $tipo, $id_cda_tipo)
    {
     
        $fechaactual = date(Yii::$app->fmtfechahoraphp);
        $basicas = New BasicController();

        //Consulta el registro de la id_cactividad_proceso que se va a editar ===========================================
        $model = $this->findModel($id);

        //Obteniendo Listado de causales de pausa================================================================================
        $list_causal = $this->findCausal($model->id_actividad);

        //Obteniendo clasificaciones==============================================================================================
        $validaciones = $this->ps_clasif_actividad($model->id_actividad);

        //Generando nuevo Modelo para reglas de validacion========================================================================
        $model_rules = new \common\models\cda\PsCactividadProcesoDinamico($validaciones[0], $validaciones[1],$validaciones[4]);

        $model_rules->id_cactividad_proceso = $model->id_cactividad_proceso;
        $model_rules->observacion = $model->observacion;
        $model_rules->fecha_prevista = $model->fecha_prevista;
        $model_rules->numero_quipux = $model->numero_quipux;
        $model_rules->id_cproceso = $model->id_cproceso;
        $model_rules->id_usuario = $model->id_usuario;
        $model_rules->fecha_realizacion = $model->fecha_realizacion;
        $model_rules->id_actividad = $model->id_actividad;
        $model_rules->fecha_creacion = $model->fecha_creacion;
        $model_rules->diligenciado = $model->diligenciado;
        $model_rules->dias_pausa = $model->dias_pausa;
        $model_rules->id_opc_tselect = $model->id_opc_tselect;
        $model_rules->otro_cuales = $model->otro_cuales;
        $model_rules->id_clasif_actividad = $model->id_clasif_actividad;
        $model_rules->puntos = $model->puntos;
        $model_rules->tipo = $tipo;                                     //1 solicitud , 2 tramite
        $model_rules->isNewRecord = '';

        if (!empty($request) and $model_rules->load($request)) {
            
            //Guardando datos sobre el modeulo Dinamico=============================================================================
            $model_save = new PsCactividadProceso();
            $model_save->id_cproceso = (!empty($request['PsCactividadProcesoDinamico']['id_cproceso'])) ? $request['PsCactividadProcesoDinamico']['id_cproceso'] : $model->id_cproceso;
            $model_save->id_actividad = (!empty($request['PsCactividadProcesoDinamico']['id_actividad'])) ? $request['PsCactividadProcesoDinamico']['id_actividad'] : $model->id_actividad;
            $model_save->fecha_creacion = $fechaactual;
            $model_save->diligenciado = 'S';
            $model_save->id_clasif_actividad = $this->idclasificacion((!empty($request['PsCactividadProcesoDinamico']['id_actividad'])) ? $request['PsCactividadProcesoDinamico']['id_actividad'] : $model->id_actividad);
            $model_save->numero_quipux = (!empty($request['PsCactividadProcesoDinamico']['numero_quipux'])) ? $request['PsCactividadProcesoDinamico']['numero_quipux'] : $model->numero_quipux;
            $model_save->observacion = (!empty($request['PsCactividadProcesoDinamico']['observacion'])) ? $request['PsCactividadProcesoDinamico']['observacion'] : $model->observacion;
            $model_save->fecha_realizacion = (!empty($request['PsCactividadProcesoDinamico']['fecha_realizacion'])) ? $request['PsCactividadProcesoDinamico']['fecha_realizacion'] : $model->fecha_realizacion;
            $model_save->dias_pausa = (!empty($request['PsCactividadProcesoDinamico']['dias_pausa'])) ? $request['PsCactividadProcesoDinamico']['dias_pausa'] : $model->dias_pausa;
            $model_save->id_opc_tselect = (!empty($request['PsCactividadProcesoDinamico']['id_opc_tselect'])) ? $request['PsCactividadProcesoDinamico']['id_opc_tselect'] : $model->id_opc_tselect;
            $model_save->otro_cuales = (!empty($request['PsCactividadProcesoDinamico']['otro_cuales'])) ? $request['PsCactividadProcesoDinamico']['otro_cuales'] : $model->otro_cuales;
            $model_save->id_usuario = (!empty($request['PsCactividadProcesoDinamico']['id_usuario'])) ? $request['PsCactividadProcesoDinamico']['id_usuario'] : $model->id_usuario;
            $model_save->puntos = (!empty($request['PsCactividadProcesoDinamico']['puntos'])) ? $request['PsCactividadProcesoDinamico']['puntos'] : $model->puntos;
            $model_save->tipo = $tipo;
                    
            
            //=========================================ORGANIZANDO INFORMACION PARA EL MODELO PS_CPROCESO===================================
            $model2 = $this->findIdcproceso($model_save->id_cproceso);
            $model2->ult_id_actividad = $model_save->id_actividad;
            

            //Iniciando Transaccion=======================================================================================================
            $transaction = Yii::$app->db->beginTransaction();

            try {
                    if(!empty($model_save) and $model_save->save()) {
                        if (!empty($model2) and $model2->save()) {
                            $transaction->commit();
                             return [
                                'model' => $model_save,
                                'update' => 'True',
                             ];
                        }else{
                            $transaction->rollBack();
                            throw new NotFoundHttpException('Error al guardar el modelo 2 - modelo 3 incluido.');
                        }
                    }else{
                        $transaction->rollBack();
                        throw new NotFoundHttpException('Error al guardar el modelo 3');
                    }
            } catch (Exception $ex) {
                $transaction->rollBack();
            }

           
        } elseif ($isAjax) {
            return [
                    'model' => $model_rules,
                    'update' => 'Ajax',
                    'listcausal' => $list_causal,
                    'visibles' => $validaciones[2],
                    'disabled' => $validaciones[3],
                ];
        } else {
            return [
                            'model' => $model_rules,
                            'update' => 'Normal',
                             'listcausal' => $list_causal,
                             'visibles' => $validaciones[2],
                             'disabled' => $validaciones[3],
                        ];
        }
    }
    
    
    /*
     * Funcion para asignar responsables de actividad en el proceso de CDA
     * Modificado: Diana B 2019-02-25
     * Version 1
     */
    public function actionResponsablescda($id_cactividad_proceso, $request, $isAjax, $idnextactividad,$tipo,$id_cda_tramite=null){
        
        //Buscando informacion de la id_cactividad_proceso anterior
        $model_old = $this->findModel($id_cactividad_proceso);
        $basicas = New BasicController();
        
        if(!empty($request)){
           
            $id_usuario = $_POST['id_usuario'];
            $_guardando = $this->actionNext_pscactividadproceso($model_old, $idnextactividad, $id_usuario,$tipo,$id_cda_tramite);
            
                if($_guardando == TRUE){

                    return [
                        'update' => 'TRUE',
                    ];

                }else{
                    return [
                        'update' => 'error',
                        'mensaje' => 'No se pudo pasar a la siguiente actividad'
                    ];
                }
            
        }else{
            
            
            //Averiguando listado de usuarios para el combobox de responsable ============================
            /* Si existe un unico usuario para asigar el responsable se selecciona por defecto
             * Si el responsable actual es el mismo que continua no sale pantalla sino que se deja igual
             */
            $listusuarios = $basicas->findUsuariosrutaActividad($model_old->id_actividad,$idnextactividad);
            
            
            //Valida que se termine el cda_tramite===========================================================================
            if($idnextactividad == '228' and $tipo=='2'){
                $_guardando = $this->actionNext_pscactividadproceso($model_old, $idnextactividad, null,$tipo,$id_cda_tramite);
                if($_guardando == TRUE){

                    return [
                        'update' => 'TRUE',
                    ];

                }else{
                    return [
                        'update' => 'error',
                        'mensaje' => 'No se pudo pasar a la siguiente actividad'
                    ];
                }

            }
            
            //Valida que se termine la solicitud ==============================================================================
            if($idnextactividad == '17' and $tipo=='1'){
                $_guardando = $this->actionNext_pscactividadproceso($model_old, $idnextactividad, null,$tipo,$id_cda_tramite);
                if($_guardando == TRUE){

                    return [
                        'update' => 'TRUE',
                    ];

                }else{
                    return [
                        'update' => 'error',
                        'mensaje' => 'No se pudo pasar a la siguiente actividad'
                    ];
                }

            }
            
            if(empty($listusuarios)){
               
                return [
                        'update' => 'False',
                        'error' => 'No hay roles de usuarios a la actividad '
                    ];
                
            }else{
                
                $cantidadUsuarios = count($listusuarios);
                
                
                if($cantidadUsuarios == '1'){
                    foreach($listusuarios as $usuario){

                            //Guardando sin mostrar en pantalla ===================================================================
                            $_guardando = $this->actionNext_pscactividadproceso($model_old, $idnextactividad, $usuario->id_usuario,$tipo,$id_cda_tramite);

                            if($_guardando == TRUE){

                                return [
                                    'update' => 'TRUE',
                                ];

                            }else{
                                return [
                                    'update' => 'error',
                                    'mensaje' => 'No se pudo pasar a la siguiente actividad'
                                ];
                            }

                    }
                }else{
                    
                     foreach($listusuarios as $usuario){
                        if($usuario->id_usuario == $model_old->id_usuario and Yii::$app->user->identity->codRols[0]->cod_rol == '1'){
                                    
                                $_guardando = $this->actionNext_pscactividadproceso($model_old, $idnextactividad, $usuario->id_usuario,$tipo,$id_cda_tramite);

                                if($_guardando == TRUE){

                                    return [
                                        'update' => 'TRUE',
                                    ];

                                }else{
                                    return [
                                        'update' => 'error',
                                        'mensaje' => 'Error al asignar actividad'
                                    ];
                                }
                                
                        }
                    }
                    
                     return [
                                'listusuarios' => $listusuarios,
                                'update' => 'Ajax',
                                'selectone' => FALSE,
                            ];
                    
                }
                
            }
            
        }
    }
    
    

    /*Modificado para secuencia PQR
     * 2018-08-05
     */
    public function actionUpdatedetprocesopqrs($id, $request, $isAjax, $registro = null)
    {
        $fechaactual = date(Yii::$app->fmtfechahoraphp);

        //Consulta el registro de la id_cactividad_proceso que se va a editar ===========================================
        $model = $this->findModel($id);

        //Listando usuarios de la tabla usuarios_ap para el campo id_usuario de la tabla ps_cactividad_proceso
        //El istado contiene los usuarios que tiene el rol indicado en el campo cod_rol cuando la actividad actual es igual
        //al campo id_actividad_destino de la tabla ruta_actividad, se verifica si el usuario asignado actualmente existe en ese listado
        //sino se agrega al conjunto de objeto @id-> id de la actividad_cproceso
        $listusuarios = $this->findUsuarios($id, $model->id_usuario);

        //Obteniendo Listado de causales de pausa================================================================================
        $list_causal = $this->findCausal($model->id_actividad);

        //Obteniendo clasificaciones==============================================================================================
        $validaciones = $this->ps_clasif_actividad($model->id_actividad);

        //Generando nuevo Modelo para reglas de validacion========================================================================
        $model_rules = new \common\models\cda\PsCactividadProcesoDinamico($validaciones[0], $validaciones[1]);

        $model_rules->id_cactividad_proceso = $model->id_cactividad_proceso;
        $model_rules->observacion = $model->observacion;
        $model_rules->fecha_prevista = $model->fecha_prevista;
        $model_rules->numero_quipux = $model->numero_quipux;
        $model_rules->id_cproceso = $model->id_cproceso;
        $model_rules->id_usuario = $model->id_usuario;
        $model_rules->fecha_realizacion = $model->fecha_realizacion;
        $model_rules->id_actividad = $model->id_actividad;
        $model_rules->fecha_creacion = $model->fecha_creacion;
        $model_rules->diligenciado = $model->diligenciado;
        $model_rules->dias_pausa = $model->dias_pausa;
        $model_rules->id_opc_tselect = $model->id_opc_tselect;
        $model_rules->otro_cuales = $model->otro_cuales;
        $model_rules->id_clasif_actividad = $model->id_clasif_actividad;
        $model_rules->isNewRecord = '';

        if (!empty($request) and $model_rules->load($request)) {
            //Si el campo OBLIGATORIO_DILIGENCIAMIENTO esta en 'S' se debe validar que la actividad origen tenga una 'S' guardada ene l campo
            //Diligenciado,si esto no se cumple no se puede continuar y se reporta un mensaje qe no se ha diligenciado toda la informacion de la actividad.
            if (is_null($registro)) {
                $_checkdiligenciamiento = $this->findDiligenciado($model->id_cactividad_proceso);

                if ($_checkdiligenciamiento[0] == true) {
                    return [
                     'mensaje' => $_checkdiligenciamiento[1],
                     'update' => 'False',
                     'model' => $model_rules,
                    ];
                }
            }

            //Guardando datos sobre el modeulo Dinamico=============================================================================
            $model_save = new PsCactividadProceso();
            $model_save->id_cproceso = (!empty($request['PsCactividadProcesoDinamico']['id_cproceso'])) ? $request['PsCactividadProcesoDinamico']['id_cproceso'] : $model->id_cproceso;
            $model_save->id_actividad = (!empty($request['PsCactividadProcesoDinamico']['id_actividad'])) ? $request['PsCactividadProcesoDinamico']['id_actividad'] : $model->id_actividad;
            $model_save->fecha_creacion = $fechaactual;
            $model_save->diligenciado = 'S';
            $model_save->id_clasif_actividad = $this->idclasificacion((!empty($request['PsCactividadProcesoDinamico']['id_actividad'])) ? $request['PsCactividadProcesoDinamico']['id_actividad'] : $model->id_actividad);
            $model_save->numero_quipux = (!empty($request['PsCactividadProcesoDinamico']['numero_quipux'])) ? $request['PsCactividadProcesoDinamico']['numero_quipux'] : $model->numero_quipux;
            $model_save->observacion = (!empty($request['PsCactividadProcesoDinamico']['observacion'])) ? $request['PsCactividadProcesoDinamico']['observacion'] : $model->observacion;
            $model_save->fecha_realizacion = (!empty($request['PsCactividadProcesoDinamico']['fecha_realizacion'])) ? $request['PsCactividadProcesoDinamico']['fecha_realizacion'] : $model->fecha_realizacion;
            $model_save->dias_pausa = (!empty($request['PsCactividadProcesoDinamico']['dias_pausa'])) ? $request['PsCactividadProcesoDinamico']['dias_pausa'] : $model->dias_pausa;
            $model_save->id_opc_tselect = (!empty($request['PsCactividadProcesoDinamico']['id_opc_tselect'])) ? $request['PsCactividadProcesoDinamico']['id_opc_tselect'] : $model->id_opc_tselect;
            $model_save->otro_cuales = (!empty($request['PsCactividadProcesoDinamico']['otro_cuales'])) ? $request['PsCactividadProcesoDinamico']['otro_cuales'] : $model->otro_cuales;
            $model_save->id_usuario = (!empty($request['PsCactividadProcesoDinamico']['id_usuario'])) ? $request['PsCactividadProcesoDinamico']['id_usuario'] : $model->id_usuario;

            //Iniciando Transaccion=======================================================================================================
            $transaction = Yii::$app->db->beginTransaction();

            try {
                if (!empty($model_save) and $model_save->save()) {
                   return [
                        'model' => $model_save,
                        'update' => 'True',
                    ];
                } else {
                    $transaction->rollBack();
                    throw new NotFoundHttpException('Error al modificar el actividad del proceso');
                }
            } catch (Exception $ex) {
                $transaction->rollBack();
            }

            
        } elseif ($isAjax) {
            return [
                    'model' => $model_rules,
                    'update' => 'Ajax',
                    'listusuarios' => $listusuarios,
                    'listcausal' => $list_causal,
                    'visibles' => $validaciones[2],
                    'disabled' => $validaciones[3],
                ];
        } else {
            return [
                            'model' => $model_rules,
                            'update' => 'normal',
                             'listusuarios' => $listusuarios,
                             'listcausal' => $list_causal,
                             'visibles' => $validaciones[2],
                             'disabled' => $validaciones[3],
                        ];
        }
    }

    /**
     * Deletes an existing PsCactividadProceso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();
    }

    /**
     * Finds the PsCactividadProceso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return PsCactividadProceso the loaded model
     *
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
//    protected function findUsuarios($id_actividadcproceso = null, $id_usuario = null)
//    {
//        //1) Se buscan los usuarios que tienen el rol indicado en el campo ROL_A_ASIGNAR de la tabla  PS_ACTIVIDAD
//        $list_usuarios = UsuariosAp::find()
//                       ->select(['usuarios_ap.id_usuario', 'usuarios_ap.nombres'])
//                       ->leftJoin('perfiles', 'perfiles.id_usuario = usuarios_ap.id_usuario')
//                       ->leftJoin('ps_actividad', 'ps_actividad.rol_a_asignar = perfiles.cod_rol')
//                       ->leftJoin('ps_cactividad_proceso', 'ps_cactividad_proceso.id_actividad =  ps_actividad.id_actividad')
//                       ->where(['=', 'ps_cactividad_proceso.id_cactividad_proceso', $id_actividadcproceso])
//                        ->all();
//
//        if (empty($list_usuarios)) {
//            $list_usuarios = UsuariosAp::find()
//                   ->select(['usuarios_ap.id_usuario', 'usuarios_ap.nombres'])
//                   ->leftJoin('perfiles', 'perfiles.id_usuario = usuarios_ap.id_usuario')
//                   ->leftJoin('ps_actividad_ruta', 'ps_actividad_ruta.cod_rol = perfiles.cod_rol')
//                   ->leftJoin('ps_actividad', 'ps_actividad.id_actividad = ps_actividad_ruta.id_actividad_destino')
//                   ->leftJoin('ps_cactividad_proceso', 'ps_cactividad_proceso.id_actividad = ps_actividad.id_actividad')
//                   ->where(['=', 'ps_cactividad_proceso.id_cactividad_proceso', $id_actividadcproceso])->all();
//        }
//
//        /*if (empty($list_usuarios)) {
//            $list_usuarios = UsuariosAp::find()->select(['usuarios_ap.id_usuario', 'usuarios_ap.nombres'])->where(['=', 'id_usuario', $id_usuario])->all();
//        }*/
//
//        return $list_usuarios;
//    }

    /*
     * Usuarios para PQR's asignacion de responsables,
     * Se busca si la actividad tiene algun rol asignado en el campo cod_rol de la tabla ps_actividad_ruta,
     * cruzando el id_actividad actual del proceso con el campo ps_actividad_ruta.id_actividad_destino,
     * y solo muestro los usuarios relacionados con la entidad a través de rol->perfiles->perfil_region->region_entidades->entidades
     * teniendo en cuenta que cuando se guarda la PQR's se trae cod_provincia, cod_canton... Queda la duda
     * si se debe cruzar tambien con cod_provincia_p y cod_canton_p, y en caso de que la PQR's va en nombre de una empresa
     * se utiliza el cod_canton y el cod_provincia del usuario o de la emrpesa.
     */
    /*
     * Codigo anterior:
     * //1: Buscando el cod_rol asociado a la actividad destino de la tabla ps_actividad_ruta, segun
       //la actividad en la q se encuentra anctualmente
       //Se ejecuta SELECT ps_actividad_ruta.cod_rol FROM ps_actividad
       //LEFT JOIN ps_actividad_ruta ON ps_actividad_ruta.id_actividad_destino = ps_actividad.id_actividad
       //WHERE ps_actividad.id_actividad = '100'
       //==========================================

//        $_codrol = PsActividad::find()
//                    ->leftJoin('ps_actividad_ruta', 'ps_actividad_ruta.id_actividad_destino = ps_actividad.id_actividad')
//                   ->where(['=', 'ps_actividad.id_actividad', $_idactividad])
//                    ->with('psActIvidadRutas0')->one();
//
//        $codrol = (!empty($_codrol->psActividadRutas0['cod_rol'])) ? $_codrol->psActividadRutas0['cod_rol'] : '';
//
//        //2: Sacando listado de usuarios a través de la tabla rol, si el cod_rol se encuentra vacio se enviara
//        //solo el responsable del proceso
//        /*SELECT * FROM usuarios_ap
//        LEFT JOIN perfiles ON perfiles.id_usuario = usuarios_ap.id_usuario
//        LEFT JOIN perfil_region ON perfil_region.id_usuario = perfiles.id_usuario and perfil_region.cod_rol = perfiles.cod_rol
//        LEFT JOIN regionentidades ON regionentidades.cod_region = perfil_region.cod_region
//        LEFT JOIN entidades ON entidades.id_entidad = regionentidades.id_entidad
//        LEFT JOIN pqrs ON pqrs.sol_cod_canton = entidades.cod_canton and pqrs.sol_cod_provincia = entidades.cod_provincia
//        WHERE pqrs.id_pqrs = 12 and perfiles.cod_rol='20';*/
//
//        if (!empty($codrol)) {
//            $list_usuarios = UsuariosAp::find()
//                           ->select(['usuarios_ap.id_usuario', 'usuarios_ap.nombres'])
//                           ->leftJoin('perfiles', 'perfiles.id_usuario = usuarios_ap.id_usuario')
//                           ->leftJoin('perfil_region', 'perfil_region.id_usuario = perfiles.id_usuario and perfil_region.cod_rol = perfiles.cod_rol ')
//                           ->leftJoin('regionentidades', 'regionentidades.cod_region = perfil_region.cod_region')
//                           ->leftJoin('entidades', 'entidades.id_entidad =  regionentidades.id_entidad')
//                           ->leftJoin('pqrs', 'pqrs.sol_cod_canton =  entidades.cod_canton and pqrs.sol_cod_provincia = entidades.cod_provincia')
//                           ->where(['=', 'pqrs.id_pqrs', $_idpqrs])
//                           ->where(['=', 'perfiles.cod_rol', $codrol])
//                            ->all();
//        }else{
//
//            //Se habilitan todos los roles =========================================================================================================
//
//            $list_usuarios = UsuariosAp::find()
//                           ->select(['usuarios_ap.id_usuario', 'usuarios_ap.nombres'])
//                           ->leftJoin('perfiles', 'perfiles.id_usuario = usuarios_ap.id_usuario')
//                           ->leftJoin('perfil_region', 'perfil_region.id_usuario = perfiles.id_usuario and perfil_region.cod_rol = perfiles.cod_rol ')
//                           ->leftJoin('regionentidades', 'regionentidades.cod_region = perfil_region.cod_region')
//                           ->leftJoin('entidades', 'entidades.id_entidad =  regionentidades.id_entidad')
//                           ->leftJoin('pqrs', 'pqrs.sol_cod_canton =  entidades.cod_canton and pqrs.sol_cod_provincia = entidades.cod_provincia')
//                           ->where(['=', 'pqrs.id_pqrs', $_idpqrs])
//                           ->where([
//                                'perfiles.cod_rol' => [12,15,13,17,18,19,20,21],
//                            ])
//                            ->all();
//        }
//
//        /*if (empty($list_usuarios)) {
//            $list_usuarios = UsuariosAp::find()->select(['usuarios_ap.id_usuario', 'usuarios_ap.nombres'])->where(['=', 'id_usuario', $id_usuario])->all();
//        }*/

    protected function findusuariosPQR($_idactividad, $_idpqrs, $id_usuario)
    {
        if (empty($_idactividad)) {
            $_roles = \common\models\cda\PsActividad::find()
                   ->where(['=', 'ps_actividad.id_tactividad', '1'])
                   ->all();

            foreach ($_roles as $_clave) {
                $_vroles[] = $_clave->rol_a_asignar;
            }

            $_roles = \common\models\cda\PsActividadRuta::find()
                          ->leftJoin('ps_actividad', 'ps_actividad.id_actividad =  ps_actividad_ruta.id_actividad_origen')
                          ->where(['=', 'ps_actividad.id_tactividad', '1'])
                          ->all();

            foreach ($_roles as $_clave) {
                $_vroles[] = $_clave->cod_rol;
            }

            //Eliminando si existen roles repetidos ================================================================
            $roles = array_values(array_unique($_vroles));

            //Buscando Usuarios =======================================================
            $list_usuarios = UsuariosAp::find()
                    ->select(['usuarios_ap.id_usuario', 'usuarios_ap.nombres'])
                    ->leftJoin('perfiles', 'perfiles.id_usuario = usuarios_ap.id_usuario')
                     ->where([
                            'perfiles.cod_rol' => $roles,
                        ])
                     ->asArray()->all();
        } else {
            $_roles = \common\models\cda\PsActividad::find()
                   ->where(['=', 'ps_actividad.id_tactividad', '1'])
                   ->andwhere(['=', 'ps_actividad.id_actividad', $_idactividad])
                   ->all();

            foreach ($_roles as $_clave) {
                $_vroles[] = $_clave->rol_a_asignar;
            }

            //Buscando roles en ps_actividad_ruta ==================================================================
            //1) Buscando de que activida viene anteriormente ======================================================
            $_actividadanterior = PsCactividadProceso::find()->select('id_actividad')->joinWith('pqrs')->where(['id_pqrs' => $_idpqrs])->orderBy(['id_cactividad_proceso' => SORT_DESC])->all();
            $_a = 1;

            foreach ($_actividadanterior as $_claveant) {
				
                if ((!isset($id_actividad_ant)) and $_a >= 2 and $_claveant->id_actividad != id_actividad_ant ) {
                    $_actividadid = $_claveant->id_actividad;
					$_roles = \common\models\cda\PsActividadRuta::find()->where(['id_actividad_origen' => $_actividadid, 'id_actividad_destino' => $_idactividad])->one();
					$_vroles[] = $_roles->cod_rol;
                }
				
                ++$_a;
				$id_actividad_ant = $_claveant->id_actividad;
            }

           

            //Eliminando si existen roles repetidos ================================================================
            $roles = array_values(array_unique($_vroles));

            $list_usuarios = UsuariosAp::find()
                    ->select(['usuarios_ap.id_usuario', 'usuarios_ap.nombres'])
                    ->leftJoin('perfiles', 'perfiles.id_usuario = usuarios_ap.id_usuario')
                     ->where([
                            'perfiles.cod_rol' => $roles,
                        ])
                     ->asArray()->all();
        }

        return $list_usuarios;
    }

    /* Entre array de causales que se encuentra en la tabla  ps_opc_tipo_select
     * que se encuentran relacionadas al id_actividad a traves de la tabla ps_tipo_select, y el id_actividad
     *
     * esta relacionado al id_actividadcproceso de la tabla ps_catividad_proceso
     */
    protected function findCausal($id_actividad)
    {
        $list_pausa = PsOpcTipoSelect::find()
                        ->select(['ps_opc_tipo_select.id_opc_tselect', 'nom_opc_tselect'])
                        ->leftJoin('ps_tipo_select', 'ps_tipo_select.id_tselect = ps_opc_tipo_select. id_tselect')
                        ->leftJoin('ps_actividad', 'ps_actividad.id_tselect = ps_tipo_select.id_tselect')
                        ->where(['=', 'id_actividad', $id_actividad])
                        ->all();

        return $list_pausa;
    }

    protected function idclasificacion($id_actividad)
    {
        $id_clasificacion = \common\models\cda\PsActividad::find($id_actividad)->one();

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

    protected function ps_clasif_actividad($id_actividad=null,$id_clasificacion_actividad=null)
    {
        $_visibles = array();
        $_nombres = array();
        $_obligatorio = array();
        $_habilitado = array();
        $_existentes=array();

        if(!is_null($id_actividad)){
            $list_clasificacion = PsClasifActividad::find()
                                   ->leftJoin('ps_actividad', 'ps_actividad.id_clasif_actividad = ps_clasif_actividad.id_clasif_actividad')
                                   ->where(['=', 'id_actividad', $id_actividad])
                                   ->one();
        }else{
             $list_clasificacion = PsClasifActividad::find()
                                   ->where(['=', 'id_clasif_actividad', $id_clasificacion_actividad])
                                   ->one();
        }

        //Llenando vector de nombres para la construccion del modelo dinamico
        $_nombres = ['observacion' => $list_clasificacion->nom_c_obs,
                    'fecha_realizacion' => $list_clasificacion->nom_c_fec_rea,
                    'fecha_prevista' => $list_clasificacion->nom_c_fec_pre,
                    'numero_quipux' => $list_clasificacion->nom_c_num_qpx,
                    'id_usuario' => $list_clasificacion->nom_c_usua,
                    'diligenciado' => 'Diligenciado',
                    'otro_cuales' => 'Otro',
                    'dias_pausa' => $list_clasificacion->nom_c_dia_pau,
                    'id_opc_tselect' => $list_clasificacion->nom_c_caus,
                    'puntos' => $list_clasificacion->nom_c_puntos,
                    ];

        //Evaluando para campo observacion============================================================

        if ($list_clasificacion->vis_c_obs == 'S') {
            
            $_visibles['observacion'] = true;
            $_existentes [] = 'observacion';

            if ($list_clasificacion->hab_c_obs == 'S') {
                //Se agrega observacion a habilitados
                $_habilitado['observacion'] = false;

                //Se agrega al vector de obligatorios
                if ($list_clasificacion->obl_c_obs == 'S') {
                    $_obligatorio[] = 'observacion';
                }
            } else {
                $_habilitado['observacion'] = true;
            }
        } else {
            $_visibles['observacion'] = false;
            $_habilitado['observacion'] = true;
        }

        //Evaluando apra fecha_realizacion================================================================

        if ($list_clasificacion->vis_c_fec_rea == 'S') {
            $_visibles['fecha_realizacion'] = true;
            $_existentes [] = 'fecha_realizacion';

            if ($list_clasificacion->hab_c_fec_rea == 'S') {
                //Se agrega observacion a habilitados
                $_habilitado['fecha_realizacion'] = false;

                //Se agrega al vector de obligatorios
                if ($list_clasificacion->obl_c_fec_rea == 'S') {
                    $_obligatorio[] = 'fecha_realizacion';
                }
            } else {
                $_habilitado['fecha_realizacion'] = true;
            }
        } else {
            $_visibles['fecha_realizacion'] = false;
            $_habilitado['fecha_realizacion'] = true;
        }

        //Evaluando para fecha prevista===================================================================
        if ($list_clasificacion->vis_c_fec_pre == 'S') {
            $_visibles['fecha_prevista'] = true;
            $_existentes [] = 'fecha_prevista';

            if ($list_clasificacion->hab_c_fec_pre == 'S') {
                //Se agrega observacion a habilitados
                $_habilitado['fecha_prevista'] = false;

                //Se agrega al vector de obligatorios
                if ($list_clasificacion->obl_c_fec_pre == 'S') {
                    $_obligatorio[] = 'fecha_prevista';
                }
            } else {
                $_habilitado['fecha_prevista'] = true;
            }
        } else {
            $_visibles['fecha_prevista'] = false;
            $_habilitado['fecha_prevista'] = true;
        }

        //Evaluando para numero qpx==========================================================================
        if ($list_clasificacion->vis_c_num_qpx == 'S') {
            $_visibles['numero_quipux'] = true;
            $_existentes [] = 'numero_quipux';

            if ($list_clasificacion->hab_c_num_qpx == 'S') {
                //Se agrega observacion a habilitados
                $_habilitado['numero_quipux'] = false;

                //Se agrega al vector de obligatorios
                if ($list_clasificacion->hab_c_num_qpx == 'S') {
                    $_obligatorio[] = 'numero_quipux';
                }
            } else {
                $_habilitado['numero_quipux'] = true;
            }
        } else {
            $_visibles['numero_quipux'] = false;
            $_habilitado['numero_quipux'] = true;
        }

        //Evaluando para dias pausa==========================================================================
        if ($list_clasificacion->vis_c_dia_pau == 'S') {
            $_visibles['dias_pausa'] = true;
            $_existentes [] = 'dias_pausa';
            
            if ($list_clasificacion->hab_c_dia_pau == 'S') {
                //Se agrega observacion a habilitados
                $_habilitado['dias_pausa'] = false;

                //Se agrega al vector de obligatorios
                if ($list_clasificacion->hab_c_dia_pau == 'S' and $list_clasificacion->obl_c_dia_pau == 'S') {
                    $_obligatorio[] = 'dias_pausa';
                }
            } else {
                $_habilitado['dias_pausa'] = true;
            }
        } else {
            $_visibles['dias_pausa'] = false;
            $_habilitado['dias_pausa'] = true;
        }

        //Evaluando para causal==========================================================================
        if ($list_clasificacion->vis_c_caus == 'S') {
            $_visibles['id_opc_tselect'] = true;
            $_existentes [] = 'id_opc_tselect';

            if ($list_clasificacion->hab_c_caus == 'S') {
                //Se agrega observacion a habilitados
                $_habilitado['id_opc_tselect'] = false;

                //Se agrega al vector de obligatorios
                if ($list_clasificacion->hab_c_caus == 'S' and $list_clasificacion->obl_c_caus == 'S') {
                    $_obligatorio[] = 'id_opc_tselect';
                }
            } else {
                $_habilitado['id_opc_tselect'] = true;
            }
        } else {
            $_visibles['id_opc_tselect'] = false;
            $_habilitado['id_opc_tselect'] = true;
        }

        //Evaluando para usuarios==========================================================================
        if ($list_clasificacion->vis_c_usua == 'S') {
            $_visibles['id_usuario'] = true;
            $_existentes [] = 'id_usuario';
            
            if ($list_clasificacion->hab_c_usua == 'S') {
                //Se agrega observacion a habilitados
                $_habilitado['id_usuario'] = false;

                //Se agrega al vector de obligatorios
                if ($list_clasificacion->hab_c_usua == 'S' and $list_clasificacion->obl_c_usua == 'S') {
                    $_obligatorio[] = 'id_usuario';
                }
            } else {
                $_habilitado['id_usuario'] = true;
            }
        } else {
            $_visibles['id_usuario'] = false;
            $_habilitado['id_usuario'] = true;
        }
        
        
        //Evaluando para puntos ===========================================================================
         if ($list_clasificacion->vis_c_puntos == 'S') {
            $_visibles['puntos'] = true;
            $_existentes [] = 'puntos';

            if ($list_clasificacion->hab_c_puntos == 'S') {
                //Se agrega observacion a habilitados
                $_habilitado['puntos'] = false;

                //Se agrega al vector de obligatorios
                if ($list_clasificacion->hab_c_puntos == 'S' and $list_clasificacion->obl_c_puntos == 'S') {
                    $_obligatorio[] = 'puntos';
                }
            } else {
                $_habilitado['puntos'] = true;
            }
        } else {
            $_visibles['puntos'] = false;
            $_habilitado['puntos'] = true;
        }
        
        
        return [$_nombres, $_obligatorio, $_visibles, $_habilitado,$_existentes];
    }

  
    /*
     * Devuelve FALSE si no toca diligenciar
     * Devueve TRUE si hay que diligenciar para continuar
     * Modificado 2019-02-22
     */
    public function findObligatorio($actividadactual, $actividadruta, $subpantalla,$id_cproceso,$tipo)
    {
        
       $_query = \common\models\cda\PsActividadRuta::find()
                                   ->where(['id_actividad_origen' => $actividadactual,
                                                   'id_actividad_destino' => $actividadruta ])
                                   ->one();
        
       if(!empty($subpantalla) and  $_query->obligatorio_diligenciamiento=='S'){
           
           //Averiguando si ya fue diligenciado ese detalle actividad ======================================
           /*Si la actividad tiene subpantalla y el ultimo registro
            * ps_cactividad_proceso.id_cproceso, junto con ps_cactividad_proceso.id_actividad = actividadactual
            * esta en N, se envia false, si esta en 'S' se envia TRUE            * 
            */
           
           $habilitacion = \common\models\cda\PsCactividadProceso::find()
                            ->where(['id_cproceso'=>$id_cproceso,'id_actividad'=>$actividadactual,'tipo'=>$tipo])
                            ->orderBy(['id_cactividad_proceso'=>SORT_DESC])->one();
           
           if($habilitacion->diligenciado == 'N'){
               return [TRUE,$habilitacion->id_cactividad_proceso];
           }else{
               return [FALSE,$habilitacion->id_cactividad_proceso];
           } 
       }else{
           
           $habilitacion = \common\models\cda\PsCactividadProceso::find()
                            ->where(['id_cproceso'=>$id_cproceso,'id_actividad'=>$actividadactual,'tipo'=>$tipo])
                            ->orderBy(['id_cactividad_proceso'=>SORT_DESC])->one();
           return [FALSE,$habilitacion->id_cactividad_proceso];
       }

    }



    public function findConditionPQR($id_cactividad_proceso, $id_cproceso, $id_actividad_origen, $id_actividad_destino)
    {
        //1) Buscando Obligatorio diligenciamiento en la actividad ===============================
        /*SELECT ps_actividad_ruta.obligatorio_diligenciamiento FROM ps_actividad_ruta
        LEFT JOIN ps_cactividad_proceso ON ps_cactividad_proceso.id_actividad = ps_actividad_ruta.id_actividad_origen
        WHERE ps_cactividad_proceso.id_cproceso=444 and id_cactividad_proceso=276*/

        $_obligatorio = \common\models\cda\PsActividadRuta::find()
                         ->select(['ps_actividad_ruta.obligatorio_diligenciamiento', 'ps_cactividad_proceso.diligenciado'])
                         ->leftJoin('ps_cactividad_proceso', 'ps_cactividad_proceso.id_actividad = ps_actividad_ruta.id_actividad_origen')
                         ->where(['=', 'ps_cactividad_proceso.id_cproceso', $id_cproceso])
                         ->andwhere(['=', 'ps_cactividad_proceso.id_cactividad_proceso', $id_cactividad_proceso])
                         ->andwhere(['=', 'ps_actividad_ruta.id_actividad_destino', $id_actividad_destino])
                         ->one();

        if (!empty($_obligatorio->obligatorio_diligenciamiento) and $_obligatorio->obligatorio_diligenciamiento == 'N') {
            return true;
        } elseif (!empty($_obligatorio->obligatorio_diligenciamiento) and $_obligatorio->obligatorio_diligenciamiento == 'O') {
            if ($_obligatorio->diligenciado == 'S') {
                return false;
            } else {
                return true;
            }
        } elseif (!empty($_obligatorio->obligatorio_diligenciamiento) and $_obligatorio->obligatorio_diligenciamiento == 'S') {
            if ($_obligatorio->diligenciado == 'S') {
                return true;
            } else {
                return false;
            }
        }
    }

    public function dinamicaSave($id_cproceso, $id_actividad_destino, $id_eproceso, $id_actividad_origen)
    {
       // Yii::trace("que zona tengo ". date_default_timezone_get(),"DEBUG");
        $fechaactual = date(Yii::$app->fmtfechaphp);
        $fechahoraactual = date(Yii::$app->fmtfechahoraphp);

        //Averiguando si es la actividad despausar para volver a la actividad anterior a pausar 
        //Se debe tener en cuenta que pausar y despausar son los id fijo 4 y 18
        if($id_actividad_destino == '18'){
            $id_actividad_destino = $this->despausar($id_cproceso,$id_eproceso); 
        }
        
        $model_save = new PsCactividadProceso();
        $model_save->id_cproceso = $id_cproceso;
        $model_save->id_actividad = $id_actividad_destino;
        $model_save->fecha_creacion = $fechahoraactual;
        $model_save->diligenciado = 'N';
        $model_save->id_clasif_actividad = $this->idclasificacion($id_actividad_destino);
        $model_save->id_usuario = Yii::$app->user->identity->id_usuario;

        $transaction = Yii::$app->db->beginTransaction();

        if ($model_save->save()) {
            $model_cproceso = $this->findIdcproceso($id_cproceso);
            $model_cproceso->ult_id_actividad = $id_actividad_destino;

            if (!empty($id_eproceso)) {
                $model_cproceso->ult_id_eproceso = $id_eproceso;
                if ($model_cproceso->save()) {
                    $model4 = new PsHistoricoEstados();
                    $model4->fecha_estado = $fechaactual;
                    $model4->observaciones = 'Cambio de estado por Actividad';
                    $model4->id_eproceso = $id_eproceso;
                    $model4->id_cproceso = $id_cproceso;
                    $model4->id_usuario = Yii::$app->user->identity->id_usuario;
                    $model4->id_actividad = $id_actividad_origen;
                    $model4->id_tgestion = null;

                    if ($model4->save()) {
                        
                                               
                        $transaction->commit();

                        return true;
                    } else {
                        $transaction->rollBack();
                        throw new NotFoundHttpException('Error al guardar historico de estados');

                        return false;
                    }
                } else {
                    $transaction->rollBack();
                    throw new NotFoundHttpException('Error al guardar historico de estados');

                    return false;
                }
            } else {
                if ($model_cproceso->save()) {
                    $transaction->commit();

                    return true;
                } else {
                    $transaction->rollBack();
                    throw new NotFoundHttpException('Error al actualizar proceso');

                    return false;
                }
            }
        } else {
            $transaction->rollBack();
            throw new NotFoundHttpException('Error al guardar Actividad');

            return false;
        }
    }

  

    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica.
     *
     * @param type $params contiene array con valores de query a columnas de la tabla
     *
     * @return type  CdaReporteInformacion     */
    protected function findModelByParams($params)
    {
        if (($model = PsCactividadProceso::findOne($params)) !== null) {
            return $model;
        } else {
            return null;
        }
    }

    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo CdaReporteInformacion.
     *
     * @param type $params contiene array con valores de query a columnas de la tabla
     *
     * @return type CdaReporteInformacion     */
    public function cargaPsCactividadProceso($params)
    {
        return $this->findModelByParams($params);
    }
    
    /*
     * Funcion para despausar 
     * @id
     */
    protected function despausar($id_cproceso){
        
        
        //1) Buscando actividad anterior
        $model = PsCactividadProceso::find()->where(['id_cproceso'=>$id_cproceso])->limit('2')->orderBy(['id_cactividad_proceso' => SORT_DESC])->all();
        $a=1;
        foreach($model as $clave){
            
            if($a==2){
               $id_actividad_destino = $clave->id_actividad;
            }
            
            $a+=1;
        }
        
        return $id_actividad_destino;
    }
    
    /*
     * Guarda actividad con salto de origen con el fin de llevar al usuario
     * a editar actividad Destino.....
     */
    public function saltaOrigen($id_cactividad_proceso,$id_actividad_destino,$tipo,$id_cda_tramite=null){
        
        $fechaactual = date(Yii::$app->fmtfechaphp);
        $fechahoraactual = date(Yii::$app->fmtfechahoraphp);
        $basicas = New BasicController();
        
        //Modelo actual de la ps_cactividad_origen ======================================================================
        $model = $this->findModel($id_cactividad_proceso);
        
        //Guardando actualizacion de ps_cactividad_origen de actividad orgien ===========================================
        $model_save = new PsCactividadProceso();
        $model_save->id_cproceso = $model->id_cproceso;
        $model_save->id_actividad = $model->id_actividad;
        $model_save->fecha_creacion = $fechahoraactual;
        $model_save->diligenciado = 'S';
        $model_save->id_clasif_actividad = $model->id_actividad;
        $model_save->numero_quipux = $model->numero_quipux;
        $model_save->observacion = 'Se salta editar actividad';
        $model_save->fecha_realizacion = $fechaactual;
        $model_save->dias_pausa = '0';
        $model_save->id_opc_tselect = $model->id_opc_tselect;
        $model_save->otro_cuales = $model->otro_cuales;
        $model_save->id_usuario = '';
        $model_save->tipo = $tipo;

        //Pasando el proceso a la actual actividad ====================================================================
        $model2 = $this->findIdcproceso($model_save->id_cproceso);
        $model2->ult_id_actividad = $model->id_actividad;
        
        $transaction2 = Yii::$app->db->beginTransaction();

        if($model_save->save()){
            
            if($model2->save()){

                //Creando procso para la actividad destino =======================================================================
                $_guardando = $this->actionNext_pscactividadproceso($model_save, $id_actividad_destino,Yii::$app->user->identity->id_usuario,$tipo);
                if($_guardando == TRUE){
                    $transaction2->commit();
                    return [TRUE,$id_actividad_destino];
                }else{
                    $transaction2->rollBack();
                    throw new NotFoundHttpException('Error al actualizar el proceso');
                }


            }else{

                $transaction2->rollBack();
                throw new NotFoundHttpException('Error al actualizar el proceso');
            }
            
        }else{
            
            $transaction->rollBack();
            throw new NotFoundHttpException('Error al actualizar la actividad');
        }
        
    }
}
