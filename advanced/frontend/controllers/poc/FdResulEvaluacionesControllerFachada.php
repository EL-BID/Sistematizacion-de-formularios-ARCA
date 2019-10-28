<?php

namespace frontend\controllers\poc;

use Yii;
use common\models\poc\FdResulEvaluaciones;
use common\models\poc\FdResulEvaluacionesSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * FdResulEvaluacionesControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo FdResulEvaluaciones.
 */
class FdResulEvaluacionesControllerFachada extends FachadaPry
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
		
	
            $progressbar = "<div style='display:block;margin:auto;width:50%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>"; 
            $progressbar = $progressbar . "<div style='display:block;margin:auto;width:50%;text-align:center'>Guardando</div>"; 	
            $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo FdResulEvaluaciones que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                $searchModel = new FdResulEvaluacionesSearch();
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
            }

    /**
     * Presenta un dato unico en el modelo FdResulEvaluaciones.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo FdResulEvaluaciones .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($id,$puntaje,$id_cnj_rpta)
    {

        $model = new FdResulEvaluaciones();
        
        if(!empty($id_cnj_rpta)){
            $model->id_conjunto_respuesta =$id_cnj_rpta;
        }
        $model->id_evaluacion =$id;
        $model->puntaje =$puntaje;
        $model->periodo=date('Y')-1;

        $_verifica = FdResulEvaluaciones::findOne(['id_evaluacion'=>$id,'id_conjunto_respuesta'=>$id_cnj_rpta]);        
        if(count($_verifica)>0)
        {
            
            $model = $this->findModel($_verifica['id_resul_evaluaciones']);
            $model->puntaje =$puntaje;
            $model->periodo=date('Y')-1;
        }

        if ($model->save()) {
			
                return [
                    'model' => $model,
                    'create' => 'True'
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
     * Modifica un dato existente en el modelo FdResulEvaluaciones.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$request,$isAjax)
    {
        $model = $this->findModel($id);
        $model->periodo=date('Y')-1;
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
     * Deletes an existing FdResulEvaluaciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de FdResulEvaluaciones basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return FdResulEvaluaciones el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = FdResulEvaluaciones::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  FdResulEvaluaciones     */
    protected function findModelByParams($params)
    {
        if (($model = FdResulEvaluaciones::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo FdResulEvaluaciones     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type FdResulEvaluaciones     */
     public function cargaFdResulEvaluaciones($params){
        return $this->findModelByParams($params);
    }
}