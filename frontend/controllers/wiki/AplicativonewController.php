<?php

namespace frontend\controllers\wiki;

use Yii;
use frontend\controllers\AplicativonewControllerFachada;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\data\ArrayDataProvider;


//Agregando Modelos
use frontend\models\wiki\Cantones_new;                   //Se agrega modelo cantones
use frontend\models\wiki\Parroquias_new;                 //Se agrega modelo parroquias
use frontend\models\wiki\Admestado_new;                  //Se agrega modelo Admestado
use frontend\models\wiki\Trperiodo_new;                  //Se agrega modelo Trperiodo

/**
 * ProvinciasController implementa las acciones a través del sistema CRUD para el modelo Provincias.
 */
class AplicativonewController extends AplicativonewControllerPry
{
  //private $facade =    ProvinciasControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new AplicativonewControllerFachada;
        return $facade->behaviors();
    }


    /**
     * Da el acceso de entrada al aplicativo
     * @return mixed
     */
    public function actionIndex()
    {
        $facade =  new  AplicativonewControllerFachada;
        $dataAndModel= $facade->actionIndex();

        return $this->render('index', [
            'dataProvider' => '','list' =>$dataAndModel["list"]
        ]);
    }

    //Accion que llena el listado de cantones con la provincia
    public function actionListado($id){
        $facade =  new  AplicativonewControllerFachada;
        $htmlprint =$facade->actionListado($id);
        echo $htmlprint;
    }

    //Accion que llena el listado de parroquias con el canton seleccionado
    public function actionListadop($id){
        $facade =  new  AplicativonewControllerFachada;
        $htmlprint =$facade->actionListadop($id);
        echo $htmlprint;
    }

    //Accion que llena el listado de parroquias con el canton seleccionado
    public function actionListadoe($id){
        $facade =  new  AplicativonewControllerFachada;
        $htmlprint =$facade->actionListadoe($id);
        echo $htmlprint;
    }



    public function actionGrilla()
    {

        $facade =  new  AplicativonewControllerFachada;
        $provincia = (Yii::$app->request->post('provincia'))? Yii::$app->request->post('provincia'):NULL;
        $cantones = (Yii::$app->request->post('cantones'))? Yii::$app->request->post('cantones'):NULL;
        $parroquias = (Yii::$app->request->post('parroquias'))? Yii::$app->request->post('parroquias'):NULL;
        $formato = (Yii::$app->request->post('formato'))? Yii::$app->request->post('formato'):NULL;
        $periodos = (Yii::$app->request->post('periodos'))? Yii::$app->request->post('periodos'):NULL;
        $estado = (Yii::$app->request->post('estados'))? Yii::$app->request->post('estados'):NULL;

        $model=$facade->actionGrilla($provincia,$cantones,$parroquias,$formato,$periodos,$estado);

        return $this->renderPartial('_grilla',[
            'dataProvider' => $model,
        ]);
    }

}
