<?php

namespace frontend\controllers\wiki;

use Yii;
use common\models\wiki\Proyectos;
use common\models\wiki\ProyectosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * ProyectosControllerFachadaPry implementa las variables globales y estaticas, las funciones y valores base para el modelo Proyectos.
 */
class ProyectosControllerFachadaPry
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


	}



    /**
     * Listado todos los datos del modelo Proyectos que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {

    }

    /**
     * Presenta un dato unico en el modelo Proyectos.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {

    }

    /**
     * Crea un nuevo dato sobre el modelo Proyectos .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {

    }

    /**
     * Modifica un dato existente en el modelo Proyectos.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

    }

    /**
     * Deletes an existing Proyectos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {

    }

    /**
     * Finds the Proyectos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Proyectos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {

    }
}
