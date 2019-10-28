<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\Cda;
use common\models\cda\CdaSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use frontend\controllers\cda\PsCactividadProcesoControllerFachada;

/**
 * CdaControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Cda.
 */
class CdaControllerFachada extends FachadaPry
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

    public function actionProgress($urlroute = null, $id = null)
    {
        $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif').'</div>';
        $progressbar = $progressbar."<div style='text-align:center'>Guardando</div>";
        $progressbar = $progressbar."<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";

        return $progressbar;
    }

    /**
     * Listado todos los datos del modelo Cda que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
        $searchModel = new CdaSearch();
        $dataProvider = $searchModel->search($queryParams);

        return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ];
    }

    /**
     * Presenta un dato unico en el modelo Cda.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->findModel($id);
    }

    /**
     * Crea un nuevo dato sobre el modelo Cda .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($id_tipoproceso,$pscactividaproceso,$request,$isAjax,$tipo)
    {
        $fechaactual = date(Yii::$app->fmtfechaphp);
        $fechahoraactual = date(Yii::$app->fmtfechahoraphp);
        $model = new Cda();
        
        //Cargando basicas para traer demarcaciones =====================================
        $basicas = New BasicController();
        $demarcaciones = $basicas->listDemarcaciones();
        $centros=array();
        
        //Trayendo las fechas ingreso quipux y fecha oficio de la solicitud asociada al tramite
        if($tipo=='2'){
            $_cdasolicitud = \common\models\cda\CdaSolicitud::find()
                    ->leftJoin('cda_tramite','cda_tramite.id_cda_solicitud = cda_solicitud.id_cda_solicitud')
                    ->where(['id_cda_tramite'=>$id_tipoproceso])->one();
            
            $model->fecha_ingreso_quipux = $_cdasolicitud->fecha_ingreso;
            $model->fecha_oficio = $_cdasolicitud->fecha_solicitud;
            $model->id_demarcacion = $_cdasolicitud->id_demarcacion;
            
            //Ajustando centro ===============================================================================
            $centros = $basicas->listcentroatencion($model->id_demarcacion);
            $model->cod_centro_atencion_ciudadano = $_cdasolicitud->cod_centro_atencion_ciudadano;
            
        }

        //Trayendo datos para pasar a devolver tramite actividad 9 ==========================================
        if($pscactividaproceso->id_actividad == 9){
         
            $_cdasolicitud = \common\models\cda\CdaSolicitud::find()
                    ->where(['id_cda_solicitud'=>$id_tipoproceso])->one();
            
           
            $model->id_demarcacion = $_cdasolicitud->id_demarcacion;
            
             //Ajustando centro ===============================================================================
            $centros = $basicas->listcentroatencion($model->id_demarcacion);
            $model->cod_centro_atencion_ciudadano = $_cdasolicitud->cod_centro_atencion_ciudadano;
        }
        
        
        //Agregando el detalle actividad ====================================================
         
          $facade_ps =  new PsCactividadProcesoControllerFachada;
          $model_ps= $facade_ps->actionUpdatedetproceso($pscactividaproceso->id_cactividad_proceso,'',TRUE,$tipo,$id_tipoproceso);
          $model_psc = $model_ps['model'];
          $model_psc->fecha_realizacion = $fechaactual;
          $listcausal = (!empty($model_ps['listcausal']))? $model_ps['listcausal']:'';
          $visibles = $model_ps['visibles'];
          $disabled = $model_ps['disabled'];


          $string_detalle = $basicas->genHtmlClasificacion($visibles,$listcausal,$disabled);

          //================================================================================
        
        if ($model->load($request)) {

            $transaction = Yii::$app->db->beginTransaction();
            
            //Guardando ps_cactividad_proceso diligenciada ================================================================
            if($model_psc->load(Yii::$app->request->post())){
                   
                   $model_ps= $facade_ps->actionUpdatedetproceso($pscactividaproceso->id_cactividad_proceso,Yii::$app->request->post(),true,$tipo,$id_tipoproceso);
                    
                   if($model_ps['update'] != TRUE){
                       throw new \yii\web\HttpException(404, 'Error al guardar trazabilidad '); 
                       $transaction->rollBack();
                   }else{
                       $modelpscactividadproceso = $model_ps['model'];
                   }
            }else{
                 throw new \yii\web\HttpException(404, 'Error al guardar trazabilidad '); 
                 $transaction->rollBack();
            } 
            //=============================================================================================================
            $model->id_cactividad_proceso = $modelpscactividadproceso->id_cactividad_proceso;
            
            
            if($model->save()){
                
                /*Guardando la nueva ps_cactividad_proceso ========================================*/
               $pscactividaproceso -> diligenciado = 'S';
               
               if($pscactividaproceso->save()){
                   
                    $transaction->commit();
                    return [
                        'model' => $model,
                        'demarcaciones' => $demarcaciones,
                        'create' => 'True'
                    ];
               }else{
                   
                    $transaction->rollBack();
                    throw new \yii\web\HttpException(404, 'Error al cerrar la diligencia');
               }
                
            }else{
                
                $transaction->rollBack();
                throw new \yii\web\HttpException(404, 'Error al guardar la devolucion del tramite');
            }
               	

        }
        elseif ($isAjax) {
        
            
                return [
                    'model' => $model,
                    'demarcaciones' => $demarcaciones,
                    'create' => 'Ajax',
                    'stringClasificacion'=>$string_detalle,
                    'modelpsactividad' => $model_psc,
                    'centros' => $centros,
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                    'demarcaciones' => $demarcaciones,
                    'create' => 'False',
                    'centros' => $centros,
                ];

        }
    }

    /**
     * Modifica un dato existente en el modelo Cda.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     * @idtipoproceso => puede ser el id_cda_solicitud o el id_cda_tramite
     */
    public function actionUpdate($idtipoproceso,$pscactividadproceso,$request,$isAjax,$tipo)
    {
        $fechaactual = date(Yii::$app->fmtfechaphp);
        $fechahoraactual = date(Yii::$app->fmtfechahoraphp);
        
        //Buscando ultimo id_cda asociado a la ps_cactividad_proceso.id_cactividad_proceso ========================================
        $model = Cda::find()->where(['id_cactividad_proceso'=>$pscactividadproceso->id_cactividad_proceso])->orderBy(['id_cda'=>SORT_DESC])->one();
        
        //Cargando basicas para traer demarcaciones =====================================
        $basicas = New BasicController();
        $demarcaciones = $basicas->listDemarcaciones();
        
        //Cargando Centro teniendo en cuenta la demarcacion seleccionada ======================
        $centros = $basicas->listcentroatencion($model->id_demarcacion);
      
         //Agregando el detalle actividad ====================================================
         
          $facade_ps =  new PsCactividadProcesoControllerFachada;
          $model_ps= $facade_ps->actionUpdatedetproceso($pscactividadproceso->id_cactividad_proceso,'',TRUE,$tipo,$idtipoproceso);
          $model_psc = $model_ps['model'];
          $model_psc->fecha_realizacion = $fechaactual;
          $listcausal = (!empty($model_ps['listcausal']))? $model_ps['listcausal']:'';
          $visibles = $model_ps['visibles'];
          $disabled = $model_ps['disabled'];


          $string_detalle = $basicas->genHtmlClasificacion($visibles,$listcausal,$disabled);

          //================================================================================
        
          
        if ($model->load($request)) {
            
            //Guardando ps_cactividad_proceso diligenciada ================================================================
            if($model_psc->load(Yii::$app->request->post())){
                   
                   $model_ps= $facade_ps->actionUpdatedetproceso($pscactividadproceso->id_cactividad_proceso,Yii::$app->request->post(),true,$tipo,$idtipoproceso);
                    
                   if($model_ps['update'] != TRUE){
                       throw new \yii\web\HttpException(404, 'Error al guardar trazabilidad '); 
                   }else{
                       $modelpscactividadproceso = $model_ps['model'];
                   }
            }else{
                 throw new \yii\web\HttpException(404, 'Error al guardar trazabilidad '); 
            } 
            
            $model->id_cactividad_proceso = $modelpscactividadproceso->id_cactividad_proceso;
            
            if($model->save()){
                return [
                    'model' => $model,
                    'update' => 'True'
                ];
            }else{
                throw new \yii\web\HttpException(404, 'Error al guardar cambios '); 
            }
        } 
         elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'update' => 'Ajax',
                    'demarcaciones' => $demarcaciones,
                    'centros' => $centros,
                    'stringClasificacion'=>$string_detalle,
                    'modelpsactividad' => $model_psc,
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
     * Deletes an existing Cda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de Cda basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return Cda el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
        if (($model = Cda::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  Cda     */
    protected function findModelByParams($params)
    {
        if (($model = Cda::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo Cda     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type Cda     */
     public function cargaCda($params){
        return $this->findModelByParams($params);
    }
}