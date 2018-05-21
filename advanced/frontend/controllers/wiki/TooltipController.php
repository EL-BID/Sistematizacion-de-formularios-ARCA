<?php
//El controlador se guardar en la carpeta frontend\controllers -- y se denomina LviewController

namespace frontend\controllers\wiki;
use yii\data\ArrayDataProvider;
use common\models\wiki\Clientesform;

class TooltipController extends \yii\web\Controller
{


	public function actionIndex(){

		 $model = new Clientesform();
                return $this->render('/wiki/tooltip/index', [
                'model' => $model,
            ]);
	}

}
