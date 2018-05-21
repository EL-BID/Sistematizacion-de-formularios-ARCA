<?php

namespace frontend\controllers\wiki;

use Yii;
use common\models\wiki\Clientesvalidator;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * ClientevController implements the CRUD actions for Clientesvalidator model.
 */
class ClientevController extends Controller
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




    /**
     * Crear un nuevo cliente se necesita usar el modelo ClientesValidator()
     * Si la validación es correcta se creará el cliente en la base de datos y se enviara a la vista /views/clientev/create.php junto con el mensaje exitoso, si no regresara a la vista del formulario /views/clientev/create.php presentando los errores
	 * Modelo de formulario POST
	 * Se guarda sobre la tabla "clientes" la cual se encuentra asignada en el modelo y se usa la clase save()
     * @return mixed
     */
    public function actionCreate($msg=null)
    {
        $model = new Clientesvalidator();

        if ($model->load(Yii::$app->request->post())) {
			$passdata="Datos del Formulario capturados con exito Name: ".$model->name." and Lastname: ".$model->lastname;
			return $this->redirect(['create','msg'=>$passdata,]);
	    }else{
            return $this->render('/wiki/clientev/create', [
                'model' => $model,'msg'=>$msg,
            ]);
        }


    }


}
