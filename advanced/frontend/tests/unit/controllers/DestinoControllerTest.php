<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\FdpreguntaControllerFachada;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * FdpreguntaController implementa las acciones a través del sistema CRUD para el modelo fdpregunta.
 */
class FdpreguntaController extends FdpreguntaControllerPry
{
  private $facade =    FdpreguntaControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return $this->facade->behaviors();
    }
	
	
	/**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....*/
	
	public function actionProgress($urlroute=null,$id=null){

		echo $this->facade->actionProgress($urlroute,$id);
	}

	
	
    /**
     * Listado todos los datos del modelo fdpregunta que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataAndModel= $this->facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo fdpregunta.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo fdpregunta .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $modelE= $this->facade->actionCreate();
       $model = $modelE['model'];
        if ($modelE['create']) {
			
//			Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_pregunta]);
			
			
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo fdpregunta.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelE= $this->facade->actionCreate($id);
        $model = $modelE['model'];

        if ($modelE['create']) {
			
			return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_pregunta]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing fdpregunta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
}
