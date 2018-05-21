<?php

namespace common\controllers\controllerspry;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 *  FachadaPry plantea las variables globales y estaticas, las funciones y valores base para el modelo.
 */
class FachadaPry 
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        
    }
	

    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....
    */
    public function actionProgress($urlroute=null,$id=null){


    }
	
	
    /**
     * Listado todos los datos del modelo que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {

    }

    /**
     * Presenta un dato unico en el modelo.
     * @return mixed
     */
    public function actionView($id)
    {
      
    }

    /**
     * Crea un nuevo dato sobre el modelo.
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       
    }

    /**
     * Modifica un dato existente en el modelo.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @return mixed
     */
    public function actionUpdate()
    {

    }

    /**
     * Deletes an existing EstadoAgua model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionDeletep()
    {

    }

    /**
     * Finds the model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @return values of the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel()
    {

    }
}
