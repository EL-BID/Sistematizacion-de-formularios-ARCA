<?php

namespace backend\controllers\poc;

use Yii;
use common\models\poc\FdComandoPregunta;
use common\models\poc\FdComandoPreguntaSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * FdComandoPreguntaControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo FdComandoPregunta.
 */
class FdComandoPreguntaControllerFachada extends FachadaPry
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
     * Listado todos los datos del modelo FdComandoPregunta que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                $searchModel = new FdComandoPreguntaSearch();
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
            }

    /**
     * Presenta un dato unico en el modelo FdComandoPregunta.
     * @param integer $id_comando
     * @param integer $id_pregunta
     * @return mixed
     */
    public function actionView($id_comando, $id_pregunta)
    {       
            return $this->findModel($id_comando, $id_pregunta);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo FdComandoPregunta .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax)
    {
        $model = new FdComandoPregunta();

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
     * Modifica un dato existente en el modelo FdComandoPregunta.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id_comando
     * @param integer $id_pregunta
     * @return mixed
     */
    public function actionUpdate($id_comando, $id_pregunta,$request,$isAjax)
    {
        $model = $this->findModel($id_comando, $id_pregunta);

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
     * Deletes an existing FdComandoPregunta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_comando
     * @param integer $id_pregunta
     * @return mixed
     */
    public function actionDeletep($id_comando, $id_pregunta)
    {
        $this->findModel($id_comando, $id_pregunta)->delete();

    }

    /**
     * Finds the FdComandoPregunta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_comando
     * @param integer $id_pregunta
     * @return FdComandoPregunta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_comando, $id_pregunta)
    {
                    if (($model = FdComandoPregunta::findOne(['id_comando' => $id_comando, 'id_pregunta' => $id_pregunta])) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
}
