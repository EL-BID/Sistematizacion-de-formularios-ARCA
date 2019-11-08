<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClientespruebaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientespruebas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientesprueba-index">

    <div class="headSection">
    <h1 class="titSection"><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Clientesprueba', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="aplicativo">
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
                            $url2 = Url::toRoute(['clientesprueba/deletep','id' => $model->Id],true);
                            return Html::a('<span class="btn-xs btn-primary">Borrar</span>',$url,[
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
</div>
