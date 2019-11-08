<?php

namespace frontend\controllers\wiki;

use Yii;
use common\models\wiki\Ciudadesp;
use common\models\wiki\CiudadespSearch;
use frontend\controllers\wiki\CiudadespControllerFachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CiudadespControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Ciudadesp.
 */
class CiudadespControllerFachada extends CiudadespControllerFachadaPry
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return parent::behaviors();
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
     * Listado todos los datos del modelo Ciudadesp que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                        $searchModel = new CiudadespSearch();
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
            }

    /**
     * Presenta un dato unico en el modelo Ciudadesp.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
            return $this->findModel($id);

    }

    /**
     * Crea un nuevo dato sobre el modelo Ciudadesp .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ciudadesp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                Yii::$app->session->setFlash('FormSubmitted','2');
                return [
                    'model' => $model,
                    'create' => 'True'
                ];

        }
        elseif (Yii::$app->request->isAjax) {

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
     * Modifica un dato existente en el modelo Ciudadesp.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

			Yii::$app->session->setFlash('FormSubmitted','1');
			return [
                            'model' => $model,
                            'update' => 'True'
                        ];
        }
         elseif (Yii::$app->request->isAjax) {

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
     * Deletes an existing Ciudadesp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Finds the Ciudadesp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Ciudadesp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
                                if (($model = Ciudadesp::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
}
