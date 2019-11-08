<?php

namespace frontend\controllers\wiki;

use Yii;
use common\models\wiki\Tipodatovalidator;
use yii\web\Controller;
use yii\filters\VerbFilter;


class TipodatoController extends Controller
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
     * Se necesita el modelo TipodatoValidator()
     * Si la validación es correcta se creará el cliente en la base de datos y se enviara a la vista /views/tipodato/create.php junto con el mensaje exitoso, si no regresara a la vista del formulario /views/tipodato/create.php presentando los errores
	 * Modelo de formulario POST
	 * @return mixed
     */
    public function actionCreate($msg=null)
    {
        $model = new Tipodatovalidator();

        if ($model->load(Yii::$app->request->post())) {
			$passdata="Datos del Formulario capturados con exito Name: ".$model->dato;
			return $this->redirect(['create','msg'=>$passdata,]);
	    }else{
            return $this->render('/wiki/tipodato/create', [
                'model' => $model,'msg'=>$msg,
            ]);
        }


    }


}
