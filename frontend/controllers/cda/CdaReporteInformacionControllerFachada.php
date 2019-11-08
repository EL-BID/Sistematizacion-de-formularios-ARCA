<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\CdaReporteInformacion;
use common\models\cda\CdaReporteInformacionSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdareporteinformacionControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo CdaReporteInformacion.
 */
class CdareporteinformacionControllerFachada extends FachadaPry
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
	
	public function actionProgress($urlroute=null,$id=null,$labelmiga=null,$id_cda_tramite=null,$id_cproceso=null,$actividadactual=null,$tipo=null){
		
	
            $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif').'</div>';
            $progressbar = $progressbar."<div style='text-align:center'>Guardando</div>"; 	
            $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id,'labelmiga'=>$labelmiga,'actividadactual'=>$actividadactual,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo])."'>";
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo CdaReporteInformacion que se encuentran en el tablename.
     * @return mixed
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
        
        //Nombre de la actividad actual =======================================================
        $nameactividad = $basicas->findActividades(null,$actividadactual);
        
        //Averiguando cantidad de codigos CDA asociados al tramite ====================================
        $_totalcodcda = \common\models\cda\PsCodCda::find()
                ->leftJoin('cda','cda.id_cda=ps_cod_cda.id_cda')
                ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso =  cda.id_cactividad_proceso')
                ->where(['ps_cactividad_proceso.id_cproceso'=>$id_cproceso])
                ->count();
         
        $searchModel = new CdaReporteInformacionSearch();
        $queryParams['CdaReporteInformacionSearch']['id_cactividad_proceso'] = $ps_cactividad_proceso->id_cactividad_proceso;
        $dataProvider = $searchModel->search($queryParams);
        
       // Yii::trace("que llega por aqui ".count($dataProvider)."::".$_totalcodcda,"DEBUG");
        if ($dataProvider->getTotalCount()<$_totalcodcda) {
              $enableCreate=true;
         }else{
              $enableCreate=false;
         }

        return [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'encabezado' => $encabezado,
            'pscactividadproceso' => $ps_cactividad_proceso,
            'enableCreate'=>$enableCreate,
            'nombreactividad'=>$nameactividad['nom_actividad']
            
        ];
    }

    /**
     * Presenta un dato unico en el modelo CdaReporteInformacion.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaReporteInformacion .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso,$tipo,$id_cda_tramite)
    {
        $basicas = New BasicController();
        $fechaactual = date(Yii::$app->fmtfechahoraphp);
        
        
        $model = new CdaReporteInformacion();
        
        $model2 = new \common\models\poc\FdCoordenada();
        $model2->setScenario('createcoordenada');
        
        $model3 = new \common\models\poc\FdUbicacion();
        $model3->setScenario('createubicacion');
        
        
         //Agregando el detalle actividad ====================================================
         
          $facade_ps =  new PsCactividadProcesoControllerFachada();
          $model_ps= $facade_ps->actionUpdatedetproceso($pscactividad_proceso,'',TRUE,$tipo,$id_cda_tramite);
          $model_psc = $model_ps['model'];
          $model_psc->fecha_realizacion = $fechaactual;
          $listcausal = (!empty($model_ps['listcausal']))? $model_ps['listcausal']:'';
          $visibles = $model_ps['visibles'];
          $disabled = $model_ps['disabled'];


          $string_detalle = $basicas->genHtmlClasificacion($visibles,$listcausal,$disabled);

          //================================================================================
        
        
        
        
        if ($model->load($request) && $model2->load($request) && $model3->load($request) && $model_psc->load($request)) {
		
             $transaction = Yii::$app->db->beginTransaction();
             
             $model->id_tipo = '2';
             $model->id_actividad = $actividadactual;
             $model->id_cactividad_proceso = $pscactividad_proceso;
             
            $model2->id_tcoordenada = 1;

            if($model2->save()){

                if($model3->save()){

                    $model->id_ubicacion = $model3->id_ubicacion;
                    $model->id_coordenada = $model2->id_coordenada;
                    
                    if($model->save()){

                        //Averiguando si el numero de cod_cda asociados al tramite es igual a los reportes de informacion creados ==================
                        $crear_pscactividadproceso = $this->pasardiligenciada($id_cproceso, $pscactividad_proceso);
                        
                        if($crear_pscactividadproceso == TRUE){
                            
                            $model4 = $this->findPscactividadProceso($pscactividad_proceso);
                            $model4->diligenciado = 'S';
                            
                            if($model4->save()){
                                
                                $transaction->commit();

                                return [
                                    'model' => $model,
                                    'model2' => $model2,
                                    'model3'=>$model3,
                                    'create' => 'True'
                                ];
                            
                            }else{
                                
                                $transaction->rollBack(); 
                                throw new \yii\web\HttpException(404, 'Error al diligenciar ACTIVIDAD');
                                
                            }
                        }else{
                        
                            $transaction->commit();

                            return [
                                'model' => $model,
                                'model2' => $model2,
                                'model3'=>$model3,
                                'create' => 'True'
                            ];
                        }
                    }else{
                        
                        $transaction->rollBack(); 
                        throw new \yii\web\HttpException(404, 'Error en Reporte Informacion');
                    }


                }else{

                    $transaction->rollBack(); 
                    throw new \yii\web\HttpException(404, 'Error guardando Ubicacion');

                }

            }else{
               $transaction->rollBack(); 
               throw new \yii\web\HttpException(404, 'Error guardando Coordenada');
            }


        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'model2' => $model2,
                    'model3' => $model3,
                    'stringClasificacion'=>$string_detalle,
                    'modelpsactividad' => $model_psc,
                    'create' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model, 'model2' => $model2,
                    'model3' => $model3,
                    'create' => 'False'
                ];

        }
    }
    
    /*
     * Funcion para modificar la informacion para la actividad de verificar datos
     */
    
    public function actionUpdateverificar($id,$request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso){
        
        $model=$this->findModel($id);
        
        if ($model->load($request)) {
            
            $transaction = Yii::$app->db->beginTransaction();
             
             
            if($model->save()){
                
                    $transaction->commit();
                    return [
                        'model' => $model,
                        'update' => 'True'
                    ];
                   
            }else{
               $transaction->rollBack(); 
               throw new \yii\web\HttpException(404, 'Error guardando Verificacion de Datos');
            }
            
            
        }elseif ($isAjax) {
        
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
    
    /*
     * Funcion que guarda en reporte informacion para la actividad verificar datos 
     */
    public function actionCreateverificar($request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso)
    {
        $model = new CdaReporteInformacion();
        
        if ($model->load($request)) {
		
             $transaction = Yii::$app->db->beginTransaction();
             
             $model->id_tipo = '2';                         //Se guarda para tramite tipo '2', si fuera solicitud seria '1'
             $model->id_actividad = $actividadactual;
             $model->id_cactividad_proceso = $pscactividad_proceso;
             
            if($model->save()){

                //Averiguando si el numero de cod_cda asociados al tramite es igual a los reportes de informacion creados ==================
                $crear_pscactividadproceso = $this->pasardiligenciada($id_cproceso, $pscactividad_proceso);
                        
                if($crear_pscactividadproceso == TRUE){
                    $model4 = $this->findPscactividadProceso($pscactividad_proceso);
                    $model4->diligenciado = 'S';

                    if($model4->save()){

                        $transaction->commit();

                        return [
                            'model' => $model,
                            'create' => 'True'
                        ];

                    }else{

                        $transaction->rollBack(); 
                        throw new \yii\web\HttpException(404, 'Error al diligenciar ACTIVIDAD');

                    }
                }else{

                    $transaction->commit();

                    return [
                        'model' => $model,
                        'create' => 'True'
                    ];
                }
                   
            }else{
               $transaction->rollBack(); 
               throw new \yii\web\HttpException(404, 'Error guardando Verificacion de Datos');
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
                    'create' => 'False'
                ];

        }
    }
    
    
    /*
     * Funcion para registrar senagua y epa
     */
    public function actionCreateinstitucionapoyo($request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso)
    {
        $model = new CdaReporteInformacion();
        
        $model2 = new \common\models\poc\FdCoordenada();
        $model2->setScenario('createcoordenada');
        
        
        if ($model->load($request) && $model2->load($request) ) {
		
             $transaction = Yii::$app->db->beginTransaction();
             
             $model->id_tipo = '2';
             $model->id_actividad = $actividadactual;
             $model->id_cactividad_proceso = $pscactividad_proceso;
             
            $model2->id_tcoordenada = 1;

            if($model2->save()){

                    $model->id_coordenada = $model2->id_coordenada;
                    
                    if($model->save()){

                        //Averiguando si el numero de cod_cda asociados al tramite es igual a los reportes de informacion creados ==================
                        $crear_pscactividadproceso = $this->pasardiligenciada($id_cproceso, $pscactividad_proceso);
                        
                        if($crear_pscactividadproceso == TRUE){
                            $model4 = $this->findPscactividadProceso($pscactividad_proceso);
                            $model4->diligenciado = 'S';
                            
                            if($model4->save()){
                                
                                $transaction->commit();

                                return [
                                    'model' => $model,
                                    'model2' => $model2,
                                    'create' => 'True'
                                ];
                            
                            }else{
                                
                                $transaction->rollBack(); 
                                throw new \yii\web\HttpException(404, 'Error al diligenciar ACTIVIDAD');
                                
                            }
                        }else{
                        
                            $transaction->commit();

                            return [
                                'model' => $model,
                                'model2' => $model2,
                                'create' => 'True'
                            ];
                        }
                    }else{
                        
                        $transaction->rollBack(); 
                        throw new \yii\web\HttpException(404, 'Error en Reporte Informacion');
                    }


                } else{
                    $transaction->rollBack(); 
                    throw new \yii\web\HttpException(404, 'Error guardando Coordenada');
               }


        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'model2' => $model2,
                    'create' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model, 'model2' => $model2,
                    'create' => 'False'
                ];

        }
    }
    
    
    /*
     * Funcion para registrar visita
     */
    public function actionCreatevisita($request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso)
    {
        $model = new CdaReporteInformacion();
        $model->setScenario('registravisita');
        
        $model2 = new \common\models\poc\FdCoordenada();
        $model2->setScenario('createcoordenada');
        
        
        if ($model->load($request) && $model2->load($request) ) {
		
             $transaction = Yii::$app->db->beginTransaction();
             
             $model->id_tipo = '2';
             $model->id_actividad = $actividadactual;
             $model->id_cactividad_proceso = $pscactividad_proceso;
             
            $model2->id_tcoordenada = 1;

            if($model2->save()){

                    $model->id_coordenada = $model2->id_coordenada;
                    
                    if($model->save()){

                        //Averiguando si el numero de cod_cda asociados al tramite es igual a los reportes de informacion creados ==================
                        $crear_pscactividadproceso = $this->pasardiligenciada($id_cproceso, $pscactividad_proceso);
                        
                        if($crear_pscactividadproceso == TRUE){
                            $model4 = $this->findPscactividadProceso($pscactividad_proceso);
                            $model4->diligenciado = 'S';
                            
                            if($model4->save()){
                                
                                $transaction->commit();

                                return [
                                    'model' => $model,
                                    'model2' => $model2,
                                    'create' => 'True'
                                ];
                            
                            }else{
                                
                                $transaction->rollBack(); 
                                throw new \yii\web\HttpException(404, 'Error al diligenciar ACTIVIDAD');
                                
                            }
                        }else{
                        
                            $transaction->commit();

                            return [
                                'model' => $model,
                                'model2' => $model2,
                                'create' => 'True'
                            ];
                        }
                    }else{
                        
                        $transaction->rollBack(); 
                        throw new \yii\web\HttpException(404, 'Error en Reporte Informacion');
                    }


                } else{
                    $transaction->rollBack(); 
                    throw new \yii\web\HttpException(404, 'Error guardando Coordenada');
               }


        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'model2' => $model2,
                    'create' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model, 'model2' => $model2,
                    'create' => 'False'
                ];

        }
    }
    
    
    /*
     * Create para Registrar Datos Certificados
     * Mod: 20190504
     */
    
     public function actionCreateRegistrar($request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso,$tipo,$id_cda_tramite)
    {
        $basicas = New BasicController();
        $fechaactual = date(Yii::$app->fmtfechahoraphp);
        
        
        $model = new CdaReporteInformacion();
        $model->setScenario('registrardatoscertificados');
        
        $model2 = new \common\models\poc\FdCoordenada();
        $model2->setScenario('createcoordenada');
        
        $model3 = new \common\models\poc\FdUbicacion();
        $model3->setScenario('createubicacion');
        
        
        
        if ($model->load($request) && $model2->load($request) && $model3->load($request)) {
		
             $transaction = Yii::$app->db->beginTransaction();
             
             $model->id_tipo = '2';
             $model->id_actividad = $actividadactual;
             $model->id_cactividad_proceso = $pscactividad_proceso;
             
            $model2->id_tcoordenada = 1;

            if($model2->save()){

                if($model3->save()){

                    $model->id_ubicacion = $model3->id_ubicacion;
                    $model->id_coordenada = $model2->id_coordenada;
                    
                    if($model->save()){

                        //Averiguando si el numero de cod_cda asociados al tramite es igual a los reportes de informacion creados ==================
                        $crear_pscactividadproceso = $this->pasardiligenciada($id_cproceso, $pscactividad_proceso);
                        
                        if($crear_pscactividadproceso == TRUE){
                            
                            $model4 = $this->findPscactividadProceso($pscactividad_proceso);
                            $model4->diligenciado = 'S';
                            
                            if($model4->save()){
                                
                                $transaction->commit();

                                return [
                                    'model' => $model,
                                    'model2' => $model2,
                                    'model3'=>$model3,
                                    'create' => 'True'
                                ];
                            
                            }else{
                                
                                $transaction->rollBack(); 
                                throw new \yii\web\HttpException(404, 'Error al diligenciar ACTIVIDAD');
                                
                            }
                        }else{
                        
                            $transaction->commit();

                            return [
                                'model' => $model,
                                'model2' => $model2,
                                'model3'=>$model3,
                                'create' => 'True'
                            ];
                        }
                    }else{
                        
                        $transaction->rollBack(); 
                        throw new \yii\web\HttpException(404, 'Error en Reporte Informacion');
                    }


                }else{

                    $transaction->rollBack(); 
                    throw new \yii\web\HttpException(404, 'Error guardando Ubicacion');

                }

            }else{
               $transaction->rollBack(); 
               throw new \yii\web\HttpException(404, 'Error guardando Coordenada');
            }


        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'model2' => $model2,
                    'model3' => $model3,
                    'create' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model, 'model2' => $model2,
                    'model3' => $model3,
                    'create' => 'False'
                ];

        }
    }
    
    
    /**
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     * $request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso,$tipo,$id_cda_tramite
     */
    public function actionUpdate($id,$request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso,$tipo,$id_cda_tramite)
    {
        
        $basicas = New BasicController();
        $fechaactual = date(Yii::$app->fmtfechahoraphp);
        
        $model = $this->findModel($id);

        $model2 = $this->findModelcoordenada($model->id_coordenada);
        $model2->setScenario('createcoordenada');
        
        $model3 = $this->findModelubicacion($model->id_ubicacion);
        $model3->setScenario('createubicacion');
        
         
        if ($model->load($request) && $model2->load($request) && $model3->load($request)) {
		
            $transaction = Yii::$app->db->beginTransaction();
             
            if($model2->save()){

                if($model3->save()){

                    if($model->save()){

                        
                        $transaction->commit();

                        return [
                            'model' => $model,
                            'model2' => $model2,
                            'model3'=>$model3,
                            'update' => 'True'
                        ];

                    }else{
                        
                        $transaction->rollBack(); 
                        throw new \yii\web\HttpException(404, 'Error en Reporte Informacion');
                    }


                }else{

                    $transaction->rollBack(); 
                    throw new \yii\web\HttpException(404, 'Error guardando Ubicacion');

                }

            }else{
               $transaction->rollBack(); 
               throw new \yii\web\HttpException(404, 'Error guardando Coordenada');
            }


        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'model2' => $model2,
                    'model3' => $model3,
                    'update' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model, 'model2' => $model2,
                    'model3' => $model3,
                    'update' => 'False'
                ];

        }
    }
    
    public function actionUpdateregistrar($id,$request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso,$tipo,$id_cda_tramite)
    {
        
        $basicas = New BasicController();
        $fechaactual = date(Yii::$app->fmtfechahoraphp);
        
        $model = $this->findModel($id);
        $model->setScenario('registrardatoscertificados');
        
        $model2 = $this->findModelcoordenada($model->id_coordenada);
        $model2->setScenario('createcoordenada');
        
        $model3 = $this->findModelubicacion($model->id_ubicacion);
        $model3->setScenario('createubicacion');
        
         
        if ($model->load($request) && $model2->load($request) && $model3->load($request)) {
		
            $transaction = Yii::$app->db->beginTransaction();
             
            if($model2->save()){

                if($model3->save()){

                    if($model->save()){

                        
                        $transaction->commit();

                        return [
                            'model' => $model,
                            'model2' => $model2,
                            'model3'=>$model3,
                            'update' => 'True'
                        ];

                    }else{
                        
                        $transaction->rollBack(); 
                        throw new \yii\web\HttpException(404, 'Error en Reporte Informacion');
                    }


                }else{

                    $transaction->rollBack(); 
                    throw new \yii\web\HttpException(404, 'Error guardando Ubicacion');

                }

            }else{
               $transaction->rollBack(); 
               throw new \yii\web\HttpException(404, 'Error guardando Coordenada');
            }


        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'model2' => $model2,
                    'model3' => $model3,
                    'update' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model, 'model2' => $model2,
                    'model3' => $model3,
                    'update' => 'False'
                ];

        }
    }
    
    
    
    public function actionUpdateinstitucionapoyo($id,$request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso,$tipo,$id_cda_tramite)
    {
        
        $basicas = New BasicController();
        $fechaactual = date(Yii::$app->fmtfechahoraphp);
          
        $model = $this->findModel($id);

        
        $model2 = $this->findModelcoordenada($model->id_coordenada);
        $model2->setScenario('createcoordenada');
        
        if ($model->load($request) && $model2->load($request)) {
		
            $transaction = Yii::$app->db->beginTransaction();
             
            if($model2->save()){

                $model->id_coordenada = $model2->id_coordenada;

                if($model->save()){
                 
                        $transaction->commit();

                        return [
                            'model' => $model,
                            'model2' => $model2,
                            'update' => 'True'
                        ];

                }else{

                    $transaction->rollBack(); 
                    throw new \yii\web\HttpException(404, 'Error guardando institucion apoyo');

                }

            }else{
               $transaction->rollBack(); 
               throw new \yii\web\HttpException(404, 'Error guardando Coordenada');
            }
        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'model2' => $model2,
                    'update' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model, 'model2' => $model2,
                    'update' => 'False'
                ];

        }
    }
    
    
    
     public function actionUpdatevisita($id,$request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso,$tipo,$id_cda_tramite)
    {
        
        $basicas = New BasicController();
        $fechaactual = date(Yii::$app->fmtfechahoraphp);
          
        $model = $this->findModel($id);
        $model->setScenario('registravisita');
        
        $model2 = $this->findModelcoordenada($model->id_coordenada);
        $model2->setScenario('createcoordenada');
        
        if ($model->load($request) && $model2->load($request)) {
		
            $transaction = Yii::$app->db->beginTransaction();
             
            if($model2->save()){

                $model->id_coordenada = $model2->id_coordenada;

                if($model->save()){
                 
                        $transaction->commit();

                        return [
                            'model' => $model,
                            'model2' => $model2,
                            'update' => 'True'
                        ];

                }else{

                    $transaction->rollBack(); 
                    throw new \yii\web\HttpException(404, 'Error guardando institucion apoyo');

                }

            }else{
               $transaction->rollBack(); 
               throw new \yii\web\HttpException(404, 'Error guardando Coordenada');
            }
        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'model2' => $model2,
                    'update' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model, 'model2' => $model2,
                    'update' => 'False'
                ];

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
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de CdaReporteInformacion basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return CdaReporteInformacion el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = CdaReporteInformacion::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    
    
    protected function findModelcoordenada($id_coordenada)
    {
        if (($model = \common\models\poc\FdCoordenada::findOne($id_coordenada)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    protected function findModelubicacion($id_ubicacion)
    {
        if (($model = \common\models\poc\FdUbicacion::findOne($id_ubicacion)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  CdaReporteInformacion     */
    protected function findModelByParams($params)
    {
        if (($model = CdaReporteInformacion::findAll($params)) !== null) {
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
     public function cargaCdaReporteInformacion($params){
        return $this->findModelByParams($params);
    }
    
    /*
     * Funcion que pasa la solicitud a diligenciada
     */
    protected function pasardiligenciada($id_cproceso,$id_cactividad_proceso){
        
        $_totalcodcda = \common\models\cda\PsCodCda::find()
                ->leftJoin('cda','cda.id_cda=ps_cod_cda.id_cda')
                ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso =  cda.id_cactividad_proceso')
                ->where(['ps_cactividad_proceso.id_cproceso'=>$id_cproceso])
                ->count();
        
        $_totalreporte = CdaReporteInformacion::find()->where(['id_cactividad_proceso'=>$id_cactividad_proceso])->count();
        
        
        if($_totalcodcda == $_totalreporte){
            return TRUE;
        }else{
            return FALSE;
        }
        
    }
    
    public function findPscactividadProceso($id_cactividad_cproceso){
       
        if (($model = \common\models\cda\PsCactividadProceso::findOne($id_cactividad_cproceso)) !== null) {
              return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
}