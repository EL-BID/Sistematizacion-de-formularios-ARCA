<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Region', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cod_region',
            'nombre_region',

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
						$url2 = Url::toRoute(['regioncontroller/deletep','id' => $model->Id],true);
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
