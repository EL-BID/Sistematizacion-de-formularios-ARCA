<?php

namespace frontend\controllers\wiki;

use Yii;
use frontend\controllers\wiki\ProyectosControllerFachada;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * ProyectosController implementa las acciones a través del sistema CRUD para el modelo Proyectos.
 */
class ProyectosController extends ProyectosControllerPry
{
  //private $facade =    ProyectosControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  ProyectosControllerFachada;
        return $facade->behaviors();
    }


	/**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....*/

	public function actionProgress($urlroute=null,$id=null){
                $facade =  new  ProyectosControllerFachada;
		echo $facade->actionProgress($urlroute,$id);
	}



    /**
     * Listado todos los datos del modelo Proyectos que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
        $facade =  new  ProyectosControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);

        return $this->render('/wiki/proyectos/index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo Proyectos.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  ProyectosControllerFachada;
        return $this->render('/wiki/proyectos/view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Proyectos .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  ProyectosControllerFachada;
       $modelE= $facade->actionCreate();
       $model = $modelE['model'];
       $model2 = $modelE['model2'];

        if ($modelE['create'] == 'True') {

            return  $this->redirect(['progress', 'urlroute' => '/wiki/proyectos/view', 'id' => $model->Id]);

        }elseif($modelE['create']=='Ajax'){

            return $this->renderAjax('/wiki/proyectos/create', [
                        'model' => $model,'model2' =>$model2,
            ]);
        }else {

            return $this->render('/wiki/proyectos/create', [
                'model' => $model,'model2' =>$model2
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo Proyectos.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  ProyectosControllerFachada;
        $modelE= $facade->actionUpdate($id);
        $model = $modelE['model'];
        $model2 = $modelE['model2'];

        if ($modelE['update'] == 'True') {

            return $this->redirect(['progress', 'urlroute' => '/wiki/proyectos/view', 'id' => $model->Id]);

        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('/wiki/proyectos/update', [
                        'model' => $model,'model2' =>$model2,
            ]);
        }
        else {
            return $this->render('/wiki/proyectos/update', [
                'model' => $model,'model2' =>$model2,
            ]);
        }
    }

    /**
     * Deletes an existing Proyectos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  ProyectosControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['/wiki/proyectos/index']);
    }


}
