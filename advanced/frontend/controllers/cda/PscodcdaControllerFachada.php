<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\PsCodCda;
use common\models\cda\PsCodCdaSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * PscodcdaControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo PsCodCda.
 */
class PscodcdaControllerFachada extends FachadaPry
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
	
	public function actionProgress($urlroute=null,$id=null,$labelmiga=null,$id_cproceso=null,$id_cda_tramite=null,$actividadactual=null,$tipo=null){
		
	
            $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif').'</div>';
            $progressbar = $progressbar."<div style='text-align:center'>Guardando</div>";
            $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id,'labelmiga'=>$labelmiga,
            'id_cda_tramite'=>$id_cda_tramite,
            'id_cproceso'=>$id_cproceso,
            'actividadactual'=>$actividadactual,
            'tipo'=>$tipo])."'>";
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo PsCodCda que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams,$id_cproceso,$id_cda_tramite)
    {
        
        //Trayendo encabezado para la pantalla ================================
        $searchModel = new \common\models\cda\PantallaprincipalSearch();
        $encabezado = $searchModel->searchT($id_cda_tramite);
        
        //Sacando el html para el encabezado ===========================================================
        $basicas = New BasicController();
        $encabezado = $basicas->encabezadoTramite($encabezado[0]);
        
        
        
        $searchModel = new PsCodCdaSearch();
        $searchModel->id_cproceso = $id_cproceso;
        $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'encabezado' => $encabezado
                ];
    }

    /**
     * Presenta un dato unico en el modelo PsCodCda.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo PsCodCda .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax,$id_cproceso,$id_cda_tramite)
    {
        $model = new PsCodCda();

        //Buscando id_cda al cual se encuentra asociado el proceso ========================================================
        $s_cda = \common\models\cda\Cda::find()
                ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda.id_cactividad_proceso')
                ->where(['ps_cactividad_proceso.id_cproceso'=>$id_cproceso])->one();
        
        
        //Buscando ps_cactividad_proeso actual =============================================
        $basicas = New BasicController();
        $pscactividadproceso = $basicas->actualPsCactividadProceso($id_cproceso);
        
        if ($model->load($request)) {
            
            $transaction = Yii::$app->db->beginTransaction();	

            $model->id_cda = $s_cda->id_cda;
            
            if($model->validate() && $model->save()){
                
                //Agregando puntos al cda_tramite ==========================================================================
                $modelT = $this->findModelTramite($id_cda_tramite);
                $modelT->puntos_solicitados = ($modelT->puntos_solicitados+1);
                        
                if($modelT->save()){
                    
                    $pscactividadproceso->diligenciado = 'S';
                    
                    if($pscactividadproceso->save()){
                        $transaction->commit();
                        return [
                            'model' => $model,
                            'create' => 'True'
                        ];
                    }else{
                        throw new \yii\web\HttpException(404, 'Error al actualizar el estado de la tarea'); 
                    }
                }else{     
                  $transaction->rollBack();
                  throw new \yii\web\HttpException(404, 'Error al actualizar el numero de puntos'); 
                }
            }else{
                $transaction->rollBack();
                throw new \yii\web\HttpException(404, 'Error al crear el codigo cda asignado, verifique que no exista ya este codigo');
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

    /**
     * Modifica un dato existente en el modelo PsCodCda.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id
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
                    'update' => 'Ajax','_ajax'=>true
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
     * Deletes an existing PsCodCda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de PsCodCda basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param string $id
     * @return PsCodCda el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = PsCodCda::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /*
     * Buscando CdaTramite asociado
     */
    
    protected function findModelTramite($id){
        
        if(($modelT = \common\models\cda\CdaTramite::findOne($id))!= null){
            
            return $modelT;
            
        }else{
            
            throw new NotFoundHttpException('No se encuentra el tramite asociado');
        }
        
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  PsCodCda     */
    protected function findModelByParams($params)
    {
        if (($model = PsCodCda::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo PsCodCda     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type PsCodCda     */
     public function cargaPsCodCda($params){
        return $this->findModelByParams($params);
    }
}