<?php
//Se crea la carpeta lview  y la vista se denomina list.php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Tabla Simple';
$this->params['breadcrumbs'][] = $this->title;
?>

<!--Se crea gridView-->

<?= GridView::widget([
    'dataProvider' => $dataProvider,				//Objeto de Datos
    'filterModel' => $searchModel,					//Objeto de Busqueda
	'layout'=>"{pager}\n{summary}\n{items}",		//Modelo de presentacion paginado en la parte superior, luego aparecera la lista de items resumen y por lo ultimo los datos de la tabla
    'columns' => [									//Columnas a presentar
        ['class' => 'yii\grid\SerialColumn'],		

        'Id',
        'name',
        'lastname',
		[
            'attribute' => 'birthdate',
			'format' =>  ['date', 'php:d-m-Y'],
			'filter' => \yii\jui\DatePicker::widget(
							['language' => 'es', 
							'model'=>$searchModel,
							'dateFormat' => 'dd-MM-yyyy',
							'class' => 'yii\grid\RangeFilter',
							'attribute'=>'birthdate',
							'clientOptions' => [
								'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
								'changeYear' => true,			//Permitir cambio de año
								'changeMonth' => true			//Permitir cambio de Mes
							]			
							]),
            'options' => ['width' => '200']
		],
    ],
]); ?>

