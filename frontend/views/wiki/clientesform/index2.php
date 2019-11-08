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
            'birthdate',
            'createdate',
            // 'type',

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
