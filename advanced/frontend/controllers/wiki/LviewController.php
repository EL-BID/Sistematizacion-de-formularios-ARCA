<?php
//El controlador se guardar en la carpeta frontend\controllers -- y se denomina LviewController

namespace frontend\controllers\wiki;
use yii\data\ArrayDataProvider;

class LviewController extends \yii\web\Controller
{

	
	public function actionList(){
		
			
		$alldata = [
					['id'=>'1','nombre' => 'Pedro', 'apellido' => 'Perez','fecha'=>'1980-01-01'],
					['id'=>'2','nombre' => 'Pablo', 'apellido' => 'Gonzalez','fecha'=>'1985-01-01'],
					['id'=>'3','nombre' => 'Marcela', 'apellido' => 'Jaramillo','fecha'=>'1987-01-01'],
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

        /*la ubicacion se da en la carpeta de la vista lview, si estuviera directamente en views sin la carpeta wiki solo
         * se asigna el nombre de la vista as:
         * return $this->render('list',['listDataProvider' => $provider,'searchModel'=>$searchModel]);
         */        
        return $this->render('/wiki/lview/list',['listDataProvider' => $provider,'searchModel'=>$searchModel]);
	}

}
