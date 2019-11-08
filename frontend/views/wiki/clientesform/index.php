<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Clientesforms';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="clientesform-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Clientesform', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
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
            [
            'attribute' => 'createdate',
			'format' =>  ['date', 'php:d-m-Y'],
			'filter' => \yii\jui\DatePicker::widget(
							['language' => 'es', 
							'model'=>$searchModel,
							'dateFormat' => 'dd-MM-yyyy',
							'class' => 'yii\grid\RangeFilter',
							'attribute'=>'createdate',
							'clientOptions' => [
								'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
								'changeYear' => true,			//Permitir cambio de año
								'changeMonth' => true			//Permitir cambio de Mes
							]			
							]),
            'options' => ['width' => '200']
		],
            'type',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => ' {update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="btn-xs btn-primary">Editar</span>', $url, [
                                    'title' => Yii::t('app', 'Edit'),
                        ]);
                    },
					'delete' => function($url, $model){
						$url2 = Url::toRoute(['clientesform/deletep','id' => $model->Id],true);
						return Html::a('<span class="btn-xs btn-primary">Borrar</span>',$url,[
							'title' => Yii::t('app', 'Delete'),
							'data-confirm' => Yii::t('yii', 'Desea Borrar el Cliente?::'.$url2),
                            'data-method' => 'post',
						]);
					}
                ],
			],
        ],
    ]); ?>
	
	
</div>
