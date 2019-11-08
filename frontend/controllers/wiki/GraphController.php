<?php

namespace frontend\controllers\wiki;

use Yii;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;

class GraphController extends \yii\web\Controller
{
    public function actionIndexpie()
    {

		//Obteniendo datos de una consulta sql======================================
		$provider = new SqlDataProvider([
                        'db'  => Yii::$app->db4,
 			'sql' => 'SELECT count(*) as conteo,type FROM clientes GROUP BY type',
			'sort' => [
				'attributes' => [
					'conteo',
					'type',
				],
			],
		]);


		return $this->render('/wiki/graph/graphpie', [
            'dataProvider' => $provider,
        ]);
    }


	 public function actionIndexbar()
    {

		//Obteniendo datos de una consulta sql===================================
		$provider = new SqlDataProvider([
                        'db'  => Yii::$app->db4,
			'sql' => 'SELECT count(*) as conteo,type FROM clientes GROUP BY type',
			'sort' => [
				'attributes' => [
					'conteo',
					'type',
				],
			],
		]);


		return $this->render('/wiki/graph/graphbar', [
            'dataProvider' => $provider,
        ]);
    }


	 public function actionIndexline()
    {

		//Obteniendo datos de un array ============================================
		$data = [
			['año' => '2015', 'activos' => 10, 'inactivos' => 0],
			['año' => '2016', 'activos' => 5, 'inactivos' => 5],
			['año' => '2017', 'activos' => 15, 'inactivos' => 1],
			['año' => '2018', 'activos' => 20, 'inactivos' => 4],
		];

		$provider = new ArrayDataProvider([
			'allModels' => $data,
			'sort' => [
				'attributes' => ['año', 'activos','inactivos'],
			],
		]);


		return $this->render('/wiki/graph/graphline', [
            'dataProvider' => $provider,
        ]);
    }

}
