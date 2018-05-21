<?php

namespace backend\controllers\poc;

use Yii;
use common\models\poc\FdPreguntaDescendiente;
use common\models\poc\FdPreguntaDescendienteSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * FdPreguntaDescendienteControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo FdPreguntaDescendiente.
 */
class FdPreguntaDescendienteControllerFachada extends FachadaPry
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
     * Listado todos los datos del modelo FdPreguntaDescendiente que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                $searchModel = new FdPreguntaDescendienteSearch();
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
            }

    /**
     * Presenta un dato unico en el modelo FdPreguntaDescendiente.
     * @param integer $id_pregunta_padre
     * @param integer $id_pregunta_descendiente
     * @param integer $id_version_descendiente
     * @param integer $id_version_padre
     * @return mixed
     */
    public function actionView($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre)
    {       
            return $this->findModel($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo FdPreguntaDescendiente .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax)
    {
        $model = new FdPreguntaDescendiente();

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
     * Modifica un dato existente en el modelo FdPreguntaDescendiente.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id_pregunta_padre
     * @param integer $id_pregunta_descendiente
     * @param integer $id_version_descendiente
     * @param integer $id_version_padre
     * @return mixed
     */
    public function actionUpdate($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre,$request,$isAjax)
    {
        $model = $this->findModel($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre);

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
     * Deletes an existing FdPreguntaDescendiente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_pregunta_padre
     * @param integer $id_pregunta_descendiente
     * @param integer $id_version_descendiente
     * @param integer $id_version_padre
     * @return mixed
     */
    public function actionDeletep($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre)
    {
        $this->findModel($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre)->delete();

    }

    /**
     * Finds the FdPreguntaDescendiente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_pregunta_padre
     * @param integer $id_pregunta_descendiente
     * @param integer $id_version_descendiente
     * @param integer $id_version_padre
     * @return FdPreguntaDescendiente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre)
    {
                    if (($model = FdPreguntaDescendiente::findOne(['id_pregunta_padre' => $id_pregunta_padre, 'id_pregunta_descendiente' => $id_pregunta_descendiente, 'id_version_descendiente' => $id_version_descendiente, 'id_version_padre' => $id_version_padre])) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
}
