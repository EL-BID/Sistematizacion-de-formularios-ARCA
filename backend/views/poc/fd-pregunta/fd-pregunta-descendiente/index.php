<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdPreguntaDescendienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fd Pregunta Descendientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-pregunta-descendiente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Fd Pregunta Descendiente', 
        ['value' =>Url::to(['fd-pregunta-descendiente/create']), 'title' => 'Create Fd Pregunta Descendiente',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pregunta_padre',
            'id_pregunta_descendiente',
            'id_version_descendiente',
            'id_version_padre',

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => ' {view} {update} {delete}',
                'buttons' => [
                    'view' => function($url, $model){
                            return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                    'title' => Yii::t('app', 'View'),
                                    'data-method' => 'post',
                            ]);
                    },
                    'update' => function ($url, $model) {
                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada id_pregunta_padre                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['fd-pregunta-descendiente/deletep','id_pregunta_padre' => $model->id_pregunta_padre, 'id_pregunta_descendiente' => $model->id_pregunta_descendiente, 'id_version_descendiente' => $model->id_version_descendiente, 'id_version_padre' => $model->id_version_padre],true);
                            return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?'),
                            ]);
                    }
                                        
                                        
            ],
			
			
	],
        ],
    ]); ?>
</div>
