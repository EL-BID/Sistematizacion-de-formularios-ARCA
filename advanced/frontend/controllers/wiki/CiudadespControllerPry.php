<?php

namespace frontend\controllers\wiki;

use Yii;
use yii\web\Controller;


/**
 * CiudadespControllerPry implementa las acciones a través del sistema CRUD para el modelo Ciudadesp.
 */
class CiudadespControllerPry extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {

    }


    	/**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....*/

	public function actionProgress($urlroute=null,$id=null){

	}



    /**
     * Listado todos los datos del modelo Ciudadesp que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {

    }

    /**
     * Presenta un dato unico en el modelo Ciudadesp.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {

    }

    /**
     * Crea un nuevo dato sobre el modelo Ciudadesp .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {

    }

    /**
     * Modifica un dato existente en el modelo Ciudadesp.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

    }

    /**
     * Deletes an existing Ciudadesp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {

    }


}
