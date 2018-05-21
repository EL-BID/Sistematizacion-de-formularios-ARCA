<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\CdaSolicitudInformacion;
use common\models\cda\CdaSolicitudInformacionSearch;
use common\controllers\controllerspry\FachadaPry;
use common\models\hidricos\CdaTipoInfoFaltante;
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

	
	
    /**
     * Listado todos los datos del modelo CdaSolicitudInformacion que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams,$id_cda,$id_cactividad_proceso,$tipo)
    {
        $searchModel = new CdaSolicitudInformacionSearch();

        
        
        if($tipo == 1){
            
            $searchModel->tipo = 1;
            $queryParams['CdaSolicitudInformacionSearch']['id_cda'] = $id_cda;
            $queryParams['CdaSolicitudInformacionSearch']['id_cactividad_proceso'] = $id_cactividad_proceso;
        
            
        }else if($tipo == 2){
            
            $searchModel->tipo = 2;
            $queryParams['CdaSolicitudInformacionSearch']['id_cactividad_proceso_res'] = $id_cactividad_proceso;
        }
      
        //\yii\helpers\VarDumper::dump($queryParams);
        $dataProvider = $searchModel->search($queryParams);

        return [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id_cda' =>$id_cda
        ];
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
     * Crea un nuevo dato sobre el modelo CdaSolicitudInformacion .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax,$id_cda,$id_cactividad_proceso)
    {
        $model = new CdaSolicitudInformacion();
        $_listinfofaltante = $this->listcdatipofaltante();
        $_listtiporeporte = $this->listcdatiporeporte();
        $_listtipoatencion = $this->listcdatipoatencion();

        if ($model->load($request)) {
            
                $transaction = Yii::$app->db->beginTransaction();
                 
                $model->id_cda = $id_cda;
		$model->id_cactividad_proceso = $id_cactividad_proceso;
                
                if($model->save()){
                    
                    $model2 = $this->findPscactividadProceso($id_cactividad_proceso);
                    $model2->diligenciado = 'S';
                    
                    if($model2->save()){
                        
                          $transaction->commit();
                         return [
                            'model' => $model,
                            'create' => 'True'
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

    /**
     * Deletes an existing CdaSolicitudInformacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id,$id_cda,$id_cactividad_proceso)
    {
        $this->findModel($id)->delete();
        
        //Asignando diligenciado 'N' si se borran todas las solicitures ============================
        $_cantidad = $this->conteoSolicitudes($id_cda,$id_cactividad_proceso);
        
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
    
    
    protected  function conteoSolicitudes($id_cda,$id_cactividad_proceso){
        
        $conteo = CdaSolicitudInformacion::find()
                ->where(['id_cda'=>$id_cda])
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



