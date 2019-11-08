<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\DetalleprocesoControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\data\ArrayDataProvider;

/**
 * ModulocdaController implementa las acciones a través del sistema CRUD para el modelo Cda.
 */
class DetalleprocesoController extends ControllerPry
{
  //private $facade =    ModulocdaControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  DetalleprocesoControllerFachada;
        return $facade->behaviors();
    }
	
   
	
	/**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....*/
	
	public function actionProgress($urlroute=null,$id=null){
                $facade =  new  DetalleprocesoControllerFachada;
		echo $facade->actionProgress($urlroute,$id);
	}

	
	
    /**
     * Presenta un dato unico en el modelo Cda.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  DetalleprocesoControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Cda .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  DetalleprocesoControllerFachada;
       $modelE= $facade->actionCreate();
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_cda]);		
			
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
     * Modifica un dato existente en el modelo Cda.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  DetalleprocesoControllerFachada;
        $modelE= $facade->actionUpdate($id);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
			
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_cda]);
            
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
     * Deletes an existing Cda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  DetalleprocesoControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
}
