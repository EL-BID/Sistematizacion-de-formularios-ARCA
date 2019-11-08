<?php

namespace frontend\controllers\wiki;

use Yii;
use common\models\wiki\Comentarios;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera

class EditorController extends \yii\web\Controller
{
     /**
     * Crea un cliente con comentario
     * @return mixed
     */

	 /**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....**/
	public function actionProgress($urlroute=null){


		/*echo "<div style='display:block;margin:auto;width:50%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>";
        echo "<div style='display:block;margin:auto;width:50%;text-align:center'>Guardando</div>";*/
        echo "<div class='imgProgress'>".Html::img('@web/images/lazul.gif')."</div>"; 
		echo "<div class='textProgress'>Guardando</div>"; 

		echo "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute])."'>";
	}


    public function actionIndex()
    {
        $model = new Comentarios();

        if ($model->load(Yii::$app->request->post())) {

			$model->save();

			//==============================================================================
			return $this->redirect(['progress', 'urlroute' => 'index']);
		} else {
            return $this->render('/wiki/editor/editor', [
                'model' => $model,
            ]);
        }
    }
}
