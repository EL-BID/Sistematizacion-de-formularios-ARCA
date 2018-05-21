<?php

namespace frontend\controllers\wiki;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\wiki\Clientesform;


class TabsController extends Controller
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
     *
     */
    public function actionTabs($msg=null)
    {

        $model = new Clientesform();

        if ($model->load(Yii::$app->request->post())) {

			$passdata="Datos del Formulario capturados con exito Name: ".$model->name." and Lastname: ".
			$model->lastname;
			return $this->redirect(['tabs','msg'=>$passdata,]);

    }else{
            return $this->render('/wiki/tabs/form', [
                'msg'=>$msg,'model' => $model,
            ]);
        }


    }


}
