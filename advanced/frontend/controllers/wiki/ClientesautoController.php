<?php

namespace frontend\controllers\wiki;

use Yii;
use common\models\wiki\Clientesauto;
use common\models\wiki\ClientesautoSearch;
use common\models\wiki\ciudades;			//Modelo de datos de la tabla ciudades
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\helpers\ArrayHelper;

/**
 * ClientesautoController implementa las acciones a través del sistema CRUD para el modelo Clientesauto.
 */
class ClientesautoController extends Controller
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
     * Listado todos los datos del modelo Clientesauto que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientesautoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/wiki/clientesauto/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Presenta un dato unico en el modelo Clientesauto.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('/wiki/clientesauto/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Clientesauto .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clientesauto();

		/*=====================MODELO 1: PRESENTA TEXTO Y GUARDA ID=============================*/
		/*Busqueda para el autocomplete desde la base de dato con un codigo Id*/
		$data = ciudades::find()
				->select(['ciudades as name','ciudades as label','Id as id'])
				->asArray()
				->all();

		/*=====================MODELO 2: SOLO TEXTO =============================*/
		/*Busqueda para el autocomplete desde la base de datos guarda texto*/
		$data2 = ciudades::find()
				->select(['ciudades as label'])
				->asArray()
				->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

			Yii::$app->session->setFlash('FormSubmitted','2');
            return	$this->redirect(['progress', 'urlroute' => '/wiki/clientesauto/view', 'id' => $model->Id]);


        } else {
            return $this->render('/wiki/clientesauto/create', [
                'model' => $model,'autocomplete'=>$data,'autcomplete2'=>$data2,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo Clientesauto.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


		/*=====================MODELO 1: PRESENTA TEXTO Y GUARDA ID=============================*/
		/*Busqueda para el autocomplete desde la base de dato con un codigo Id*/
		$data = ciudades::find()
				->select(['ciudades as name','ciudades as label','Id as id'])
				->asArray()
				->all();

		/*Buscando nombre del Id de la ciudad del registro a editar*/
		if($model->ciudad2_id!=null){
			$findname = ciudades::find()
							->where(['Id' => $model->ciudad2_id])
							->one();
			$nameciudad = $findname->ciudades;
		}else{
			$nameciudad = '';
		}



		/*=====================MODELO 2: SOLO TEXTO =============================*/
		/*Busqueda para el autocomplete desde la base de datos guarda texto*/
		$data2 = ciudades::find()
				->select(['ciudades as label'])
				->asArray()
				->all();





        if ($model->load(Yii::$app->request->post()) && $model->save()) {

			Yii::$app->session->setFlash('FormSubmitted','1');
			return $this->redirect(['progress', 'urlroute' => '/wiki/clientesauto/view', 'id' => $model->Id]);
        } else {
            return $this->render('/wiki/clientesauto/update', [
                'model' => $model,'autocomplete'=>$data,'autcomplete2'=>$data2,'custom'=>$nameciudad,
            ]);
        }
    }

    /**
     * Deletes an existing Clientesauto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/wiki/clientesauto/index']);
    }

    /**
     * Finds the Clientesauto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Clientesauto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Clientesauto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
