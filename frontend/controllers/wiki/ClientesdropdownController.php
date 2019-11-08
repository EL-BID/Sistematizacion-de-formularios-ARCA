<?php

namespace frontend\controllers\wiki;

use Yii;
use common\models\wiki\Clientesdropdown;
use common\models\wiki\ClientesdropdownSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * ClientesdropdownController implementa las acciones a través del sistema CRUD para el modelo Clientesdropdown.
 */
class ClientesdropdownController extends Controller
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
     * Listado todos los datos del modelo Clientesdropdown que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientesdropdownSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/wiki/clientesdropdown/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Presenta un dato unico en el modelo Clientesdropdown.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('/wiki/clientesdropdown/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Clientesdropdown .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clientesdropdown();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

			Yii::$app->session->setFlash('FormSubmitted','2');
            return	$this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->Id]);


        } else {
            return $this->render('/wiki/clientesdropdown/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo Clientesdropdown.
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
            return $this->render('/wiki/clientesdropdown/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Clientesdropdown model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/wiki/clientesdropdown/index']);
    }

    /**
     * Finds the Clientesdropdown model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Clientesdropdown the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Clientesdropdown::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
