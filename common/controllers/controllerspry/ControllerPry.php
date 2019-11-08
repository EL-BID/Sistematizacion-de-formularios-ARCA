<?php

namespace common\controllers\controllerspry;

use Yii;
use yii\web\Controller;


/**
 * EstadoAguaControllerPry implementa las acciones a través del sistema CRUD para el modelo EstadoAgua.
 */
class ControllerPry extends Controller
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
     * Listado todos los datos del modelo EstadoAgua que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
   
    }

    /**
     * Presenta un dato unico en el modelo EstadoAgua.
     * @param string $id
     * @return mixed
     */
    public function actionView()
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
    

}
