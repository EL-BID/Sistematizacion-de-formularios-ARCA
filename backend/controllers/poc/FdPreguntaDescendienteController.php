<?php

namespace backend\controllers\poc;

use Yii;
use backend\controllers\poc\FdPreguntaDescendienteControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * FdPreguntaDescendienteController implementa las acciones a través del sistema CRUD para el modelo FdPreguntaDescendiente.
 */
class FdPreguntaDescendienteController extends ControllerPry
{
  //private $facade =    FdPreguntaDescendienteControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  FdPreguntaDescendienteControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  FdPreguntaDescendienteControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo FdPreguntaDescendiente que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  FdPreguntaDescendienteControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo FdPreguntaDescendiente.
     * @param integer $id_pregunta_padre
     * @param integer $id_pregunta_descendiente
     * @param integer $id_version_descendiente
     * @param integer $id_version_padre
     * @return mixed
     */
    public function actionView($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre)
    {
        $facade =  new  FdPreguntaDescendienteControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo FdPreguntaDescendiente .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  FdPreguntaDescendienteControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id_pregunta_padre' => $model->id_pregunta_padre, 'id_pregunta_descendiente' => $model->id_pregunta_descendiente, 'id_version_descendiente' => $model->id_version_descendiente, 'id_version_padre' => $model->id_version_padre]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo FdPreguntaDescendiente.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id_pregunta_padre
     * @param integer $id_pregunta_descendiente
     * @param integer $id_version_descendiente
     * @param integer $id_version_padre
     * @return mixed
     */
    public function actionUpdate($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre)
    {
        $facade =  new  FdPreguntaDescendienteControllerFachada;
        $modelE= $facade->actionUpdate($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id_pregunta_padre' => $model->id_pregunta_padre, 'id_pregunta_descendiente' => $model->id_pregunta_descendiente, 'id_version_descendiente' => $model->id_version_descendiente, 'id_version_padre' => $model->id_version_padre]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FdPreguntaDescendiente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_pregunta_padre
     * @param integer $id_pregunta_descendiente
     * @param integer $id_version_descendiente
     * @param integer $id_version_padre
     * @return mixed
     */
    public function actionDeletep($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre)
    {
        $facade =  new  FdPreguntaDescendienteControllerFachada;
        $facade->actionDeletep($id_pregunta_padre, $id_pregunta_descendiente, $id_version_descendiente, $id_version_padre);

        return $this->redirect(['index']);
    }

    
}
