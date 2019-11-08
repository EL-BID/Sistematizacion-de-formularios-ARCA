<?php

namespace frontend\controllers\wiki;

use Yii;
use common\models\wiki\Clientesprueba;
use common\models\wiki\ClientespruebaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\BaseYii;

/**
 * ClientespruebaController implementa las acciones a través del sistema CRUD para el modelo Clientesprueba.
 */
class ClientespruebaController extends Controller
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


		/*echo "<div style='display:block;margin:auto;width:50%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>";
        echo "<div style='display:block;margin:auto;width:50%;text-align:center'>Guardando</div>";*/
        echo "<div class='imgProgress'>".Html::img('@web/images/lazul.gif')."</div>"; 
		echo "<div class='textProgress'>Guardando</div>"; 

		echo "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";
	}



    /**
     * Listado todos los datos del modelo Clientesprueba que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientespruebaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $pepe=" hola mundo";
        Yii::trace('error practica 2'.$pepe, 'DEBUG');
        Yii::beginProfile('add to basket', 'DEBUG');
        Yii::endProfile('add to basket', 'DEBUG');

        return $this->render('/wiki/clientesprueba/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Presenta un dato unico en el modelo Clientesprueba.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('/wiki/clientesprueba/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Clientesprueba .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clientesprueba();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('FormSubmitted','2');
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->Id]);


        } else {

            return $this->render('/wiki/clientesprueba/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo Clientesprueba.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

			Yii::$app->session->setFlash('FormSubmitted','1');
			return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->Id]);
        } else {
            return $this->render('/wiki/clientesprueba/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Clientesprueba model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/wiki/clientesprueba/index']);
    }

    /**
     * Finds the Clientesprueba model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Clientesprueba the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Clientesprueba::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
