<?php

namespace backend\controllers;

use Yii;
use common\models\autenticacion\Parroquias;
use backend\models\autenticacion\ParroquiasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * ParroquiasController implementa las acciones a través del sistema CRUD para el modelo Parroquias.
 */
class ParroquiasController extends Controller
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
		
	
		echo "<div class='imgProgress'>".Html::img('@web/images/lazul.gif')."</div>"; 
		echo "<div class='textProgress'>Guardando</div>"; 
				
		echo "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";
	}

	
	
    /**
     * Listado todos los datos del modelo Parroquias que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ParroquiasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Presenta un dato unico en el modelo Parroquias.
     * @param string $cod_parroquia
     * @param string $cod_canton
     * @param string $cod_provincia
     * @return mixed
     */
    public function actionView($cod_parroquia, $cod_canton, $cod_provincia)
    {
        return $this->render('view', [
            'model' => $this->findModel($cod_parroquia, $cod_canton, $cod_provincia),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Parroquias .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Parroquias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			Yii::$app->session->setFlash('FormSubmitted','2');
            return	$this->redirect(['progress', 'urlroute' => 'view', 'cod_parroquia' => $model->cod_parroquia, 'cod_canton' => $model->cod_canton, 'cod_provincia' => $model->cod_provincia]);
			
			
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo Parroquias.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $cod_parroquia
     * @param string $cod_canton
     * @param string $cod_provincia
     * @return mixed
     */
    public function actionUpdate($cod_parroquia, $cod_canton, $cod_provincia)
    {
        $model = $this->findModel($cod_parroquia, $cod_canton, $cod_provincia);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			Yii::$app->session->setFlash('FormSubmitted','1');
			return $this->redirect(['progress', 'urlroute' => 'view', 'cod_parroquia' => $model->cod_parroquia, 'cod_canton' => $model->cod_canton, 'cod_provincia' => $model->cod_provincia]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Parroquias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $cod_parroquia
     * @param string $cod_canton
     * @param string $cod_provincia
     * @return mixed
     */
    public function actionDeletep($cod_parroquia, $cod_canton, $cod_provincia)
    {
        $this->findModel($cod_parroquia, $cod_canton, $cod_provincia)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Parroquias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $cod_parroquia
     * @param string $cod_canton
     * @param string $cod_provincia
     * @return Parroquias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cod_parroquia, $cod_canton, $cod_provincia)
    {
        if (($model = Parroquias::findOne(['cod_parroquia' => $cod_parroquia, 'cod_canton' => $cod_canton, 'cod_provincia' => $cod_provincia])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
