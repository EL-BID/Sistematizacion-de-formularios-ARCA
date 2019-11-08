<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClientespruebaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes Modal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientesprueba-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
    <?= Html::button('Crear Nuevo Cliente', ['value' => Url::to(['clientesmodal/create']), 'title' => 'Crear Nuevo Cliente', 'class' => 'showModalButton btn btn-success']); ?>
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
                    'update'=>function ($url, $model) {
                          return Html::button('<span class="glyphicon glyphicon-pencil"></span>', 
                                       ['value'=>Url::to(['clientesmodal/update', 'id'=>$model->Id]),
                                        'class' => 'btn btn-default btn-xs showModalButton'
                                        ]);
                    },
					'delete' => function($url, $model){
						$url2 = Url::toRoute(['clientesmodal/deletep','id' => $model->Id],true);
						return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,[
							'title' => Yii::t('app', 'Delete'),
							'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?::'.$url2),
                            'data-method' => 'post',
						]);
					}
                ],
			
			
			],
        ],
    ]); ?>
</div>
