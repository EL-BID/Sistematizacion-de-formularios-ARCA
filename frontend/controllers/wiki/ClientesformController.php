<?php

namespace frontend\controllers\wiki;

use Yii;
use common\models\wiki\Clientesform;
use common\models\wiki\ClientesformSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * ClientesformController implements the CRUD actions for Clientesform model.
 */
class ClientesformController extends Controller
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
	Ubicación: @web = frontend\web....**/
	public function actionProgress($urlroute=null,$id=null){


		/*echo "<div style='display:block;margin:auto;width:50%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>";
        echo "<div style='display:block;margin:auto;width:50%;text-align:center'>Guardando</div>";*/
        echo "<div class='imgProgress'>".Html::img('@web/images/lazul.gif')."</div>"; 
		echo "<div class='textProgress'>Guardando</div>"; 

		echo "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";
	}



    /**
     * Accion que lista todos los cliente creados en la tabla
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientesformSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Presenta los datos de un cliente en particular
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea un cliente
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clientesform();
        $fechaactual = date(Yii::$app->fmtfechaphp);

        if ($model->load(Yii::$app->request->post())) {

			$model->createdate = $fechaactual;
			$model->save();

			//Verificando envio de informacion==============================================
			Yii::$app->session->setFlash('FormSubmitted');

			//==============================================================================
			return $this->redirect(['progress', 'urlroute' => 'view','id'=>$model->Id]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Accion para modificar un cliente en especifico, y retorna al listado general.

     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

			//Verificando envio de informacion==============================================
			Yii::$app->session->setFlash('FormSubmitted');

			//==============================================================================
			return $this->redirect(['progress', 'urlroute' => 'view','id'=>$model->Id]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Accion para borrar un cliente en especifico, y retorna al listado general
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Encuentra un cliente basado en la llave primaria del modelo.
     */
    protected function findModel($id)
    {
        if (($model = Clientesform::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
