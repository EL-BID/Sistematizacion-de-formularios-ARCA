<?php

namespace backend\controllers;

use Yii;
use common\models\autenticacion\PerfilRegion;
use backend\models\autenticacion\PerfilRegionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * PerfilRegionController implementa las acciones a través del sistema CRUD para el modelo PerfilRegion.
 */
class PerfilRegionController extends Controller
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
     * Listado todos los datos del modelo PerfilRegion que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PerfilRegionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Presenta un dato unico en el modelo PerfilRegion.
     * @param string $id_usuario
     * @param string $cod_rol
     * @param string $cod_region
     * @return mixed
     */
    public function actionView($id_usuario, $cod_rol, $cod_region)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_usuario, $cod_rol, $cod_region),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo PerfilRegion .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PerfilRegion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			Yii::$app->session->setFlash('FormSubmitted','2');
            return	$this->redirect(['progress', 'urlroute' => 'view', 'id_usuario' => $model->id_usuario, 'cod_rol' => $model->cod_rol, 'cod_region' => $model->cod_region]);
			
			
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo PerfilRegion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id_usuario
     * @param string $cod_rol
     * @param string $cod_region
     * @return mixed
     */
    public function actionUpdate($id_usuario, $cod_rol, $cod_region)
    {
        $model = $this->findModel($id_usuario, $cod_rol, $cod_region);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			Yii::$app->session->setFlash('FormSubmitted','1');
			return $this->redirect(['progress', 'urlroute' => 'view', 'id_usuario' => $model->id_usuario, 'cod_rol' => $model->cod_rol, 'cod_region' => $model->cod_region]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PerfilRegion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_usuario
     * @param string $cod_rol
     * @param string $cod_region
     * @return mixed
     */
    public function actionDeletep($id_usuario, $cod_rol, $cod_region)
    {
        $this->findModel($id_usuario, $cod_rol, $cod_region)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PerfilRegion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_usuario
     * @param string $cod_rol
     * @param string $cod_region
     * @return PerfilRegion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_usuario, $cod_rol, $cod_region)
    {
        if (($model = PerfilRegion::findOne(['id_usuario' => $id_usuario, 'cod_rol' => $cod_rol, 'cod_region' => $cod_region])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
