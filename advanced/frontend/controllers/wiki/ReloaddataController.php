<?php

namespace frontend\controllers\wiki;
use yii\data\ArrayDataProvider;


class ReloaddataController extends \yii\web\Controller
{
    public function actionIndex()
    {

    }

    public function actionPbar() {
     return $this->render('/wiki/reloaddata/viebar');
    }

    public function actionList(){

        //For para alargar el tiempo de presentación
        for($a=0;$a<80;$a++){


        }

        $alldata = [
            ['id'=>'1','nombre' => 'Pedro', 'apellido' => 'Perez','fecha'=>'1980-01-01'],
            ['id'=>'2','nombre' => 'Pablo', 'apellido' => 'Gonzalez','fecha'=>'1985-01-01'],
            ['id'=>'3','nombre' => 'Marcela', 'apellido' => 'Jaramillo','fecha'=>'1987-01-01'],
            ['id'=>'4','nombre' => 'Marcela', 'apellido' => 'Jaramillo','fecha'=>'1987-01-01'],
            ['id'=>'5','nombre' => 'Marcela', 'apellido' => 'Jaramillo','fecha'=>'1987-01-01'],
	];

	$provider = new ArrayDataProvider([
		'allModels' => $alldata,
		'pagination' => [
                    'pageSize' => 10,
		],
		'sort' => [
			'attributes' => ['nombre', 'apellido','fecha'],
		],
	]);

	$searchModel=[];

        return $this->renderAjax('/wiki/reloaddata/list',['listDataProvider' => $provider,'searchModel'=>$searchModel]);
    }

}
