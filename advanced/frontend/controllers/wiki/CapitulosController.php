<?php

namespace frontend\controllers\wiki;

use Yii;
use frontend\controllers\CapitulosControllerFachada;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CapitulosController implementa las acciones a través del sistema CRUD para el modelo Capitulos.
 */
class CapitulosController extends CapitulosControllerPry
{
  //private $facade =    CapitulosControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  CapitulosControllerFachada;
        return $facade->behaviors();
    }


	/**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....*/

	public function actionProgress($urlroute=null,$id=null){
                $facade =  new  CapitulosControllerFachada;
		echo $facade->actionProgress($urlroute,$id);
	}



    /**
     * Listado todos los datos del modelo Capitulos que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  CapitulosControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo Capitulos.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  CapitulosControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Capitulos .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($id_prta,$id_fmt,$id_rpta,$last)
    {

       $facade =  new  CapitulosControllerFachada;
       $modelE= $facade->actionCreate($id_prta,$id_fmt,$id_rpta,$last);
       $model = $modelE['model'];
       $model2 =$modelE['model2'];


        if ($modelE['create'] == 'True') {

    	     return Yii::$app->response->redirect(Url::to(['dashboard/index', 'id_prta' => $modelE['id_prta'],'id_fmt'=>$modelE['id_fmt'], 'id_rpta'=>$modelE['id_rpta'], 'last'=>$modelE['last'] ]));

        }elseif($modelE['create']=='Ajax'){

            return $this->renderAjax('create', [
                        'model' => $model,'model2'=>$model2
            ]);


        }
        else {
            return $this->render('create', [
                'model' => $model,'model2'=>$model2
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo Capitulos.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$id_prta,$id_fmt,$id_rpta,$last)
    {
        $facade =  new  CapitulosControllerFachada;
        $modelE= $facade->actionUpdate($id,$id_prta,$id_fmt,$id_rpta,$last);
        $model = $modelE['model'];
        $model2 =$modelE['model2'];

        if ($modelE['update'] == 'True') {

           	     return Yii::$app->response->redirect(Url::to(['dashboard/index', 'id_prta' => $modelE['id_prta'],'id_fmt'=>$modelE['id_fmt'], 'id_rpta'=>$modelE['id_rpta'], 'last'=>$modelE['last'] ]));

        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model,'model2'=>$model2
            ]);
        }
        else {
            return $this->render('update', [
                'model' => $model,'model2'=>$model2
            ]);
        }
    }

    /**
     * Deletes an existing Capitulos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id,$id_prta,$id_fmt,$id_rpta,$last)
    {
        $facade =  new  CapitulosControllerFachada;
        $facade->actionDeletep($id,$id_prta,$id_fmt,$id_rpta,$last);

        return Yii::$app->response->redirect(Url::to(['dashboard/index', 'id_prta' => $id_prta,'id_fmt'=>$id_fmt, 'id_rpta'=>$id_rpta, 'last'=>$last ]));
    }


}
