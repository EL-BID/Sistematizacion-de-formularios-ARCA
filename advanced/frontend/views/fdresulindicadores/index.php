<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdResulIndicadoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fd Resul Indicadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-resul-indicadores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Fd Resul Indicadores', 
        ['value' =>Url::to(['fd-resul-indicadores/create']), 'title' => 'Create Fd Resul Indicadores',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_resul_indicadores',
            'id_indicador',
            'resultado',
            'recomendacion',
            'id_conjunto_respuesta',

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
                    }, //Primera columna encontrada id_resul_indicadores                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['fd-resul-indicadores/deletep','id' => $model->id_resul_indicadores],true);
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
