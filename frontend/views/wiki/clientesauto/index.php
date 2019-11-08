<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClientesautoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientesautos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientesauto-index">
    <div class="headSection">
    <h1 class="titSection"><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Clientesauto', ['create'], ['class' => 'btn btn-success']) ?>
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
            'birthdate',
            'createdate',
            // 'type',
            // 'ciudad',
            // 'ciudad2_id',

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
						$url2 = Url::toRoute(['clientesauto/deletep','id' => $model->Id],true);
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
