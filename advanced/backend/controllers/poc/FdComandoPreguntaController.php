<?php

namespace backend\controllers\poc;

use Yii;
use backend\controllers\poc\FdComandoPreguntaControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * FdComandoPreguntaController implementa las acciones a través del sistema CRUD para el modelo FdComandoPregunta.
 */
class FdComandoPreguntaController extends ControllerPry
{
  //private $facade =    FdComandoPreguntaControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  FdComandoPreguntaControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  FdComandoPreguntaControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo FdComandoPregunta que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  FdComandoPreguntaControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo FdComandoPregunta.
     * @param integer $id_comando
     * @param integer $id_pregunta
     * @return mixed
     */
    public function actionView($id_comando, $id_pregunta)
    {
        $facade =  new  FdComandoPreguntaControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id_comando, $id_pregunta),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo FdComandoPregunta .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  FdComandoPreguntaControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id_comando' => $model->id_comando, 'id_pregunta' => $model->id_pregunta]);		
			
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
     * Modifica un dato existente en el modelo FdComandoPregunta.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id_comando
     * @param integer $id_pregunta
     * @return mixed
     */
    public function actionUpdate($id_comando, $id_pregunta)
    {
        $facade =  new  FdComandoPreguntaControllerFachada;
        $modelE= $facade->actionUpdate($id_comando, $id_pregunta,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id_comando' => $model->id_comando, 'id_pregunta' => $model->id_pregunta]);
            
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
     * Deletes an existing FdComandoPregunta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_comando
     * @param integer $id_pregunta
     * @return mixed
     */
    public function actionDeletep($id_comando, $id_pregunta)
    {
        $facade =  new  FdComandoPreguntaControllerFachada;
        $facade->actionDeletep($id_comando, $id_pregunta);

        return $this->redirect(['index']);
    }

    
}
