<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdAgrupacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fd Agrupacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-agrupacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Fd Agrupacion', 
        ['value' =>Url::to(['poc/fd-agrupacion/create']), 'title' => 'Create Fd Agrupacion',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_agrupacion',
            'nom_agrupacion',
            'id_tagrupacion',
            'num_col',
            'num_row',

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => ' {view} {update} {delete}',
                'buttons' => [
                    'view' => function($url, $model){
                            return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',$url,[
                                    'title' => Yii::t('app', 'View'),
                                    'data-method' => 'post',
                            ]);
                    },
                    'update' => function ($url, $model) {
                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada id_agrupacion                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['poc/fd-agrupacion/deletep','id' => $model->id_agrupacion],true);
                            return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url,[
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?::'.$url2),
                            ]);
                    }
                                        
                                        
            ],
			
			
	],
        ],
    ]); ?>
</div>
