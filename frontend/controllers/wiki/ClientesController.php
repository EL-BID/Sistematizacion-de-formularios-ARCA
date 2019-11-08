<?php

namespace frontend\controllers\wiki;

use Yii;
use common\models\wiki\Clientes;
use common\models\wiki\ClientesSearch;

class ClientesController extends \yii\web\Controller
{
    public function actionIndex()
    {
	$searchModel = new ClientesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

	return $this->render('/wiki/clientes/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
