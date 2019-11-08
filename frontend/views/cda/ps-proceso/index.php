<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\PsProcesoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ps Procesos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-proceso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Nuevo Ps Proceso', 
        ['value' =>Url::to(['ps-proceso/create']), 'title' => 'Nuevo Ps Proceso',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_proceso',
            'nom_proceso',
            'id_tproceso',
            'id_modulo',
            'url_datos_basicos:url',

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => ' {view} {update} {delete}',
                'buttons' => [
                    'view' => function($url, $model){
                            return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                    'title' => Yii::t('app', 'Ver'),
                                    'data-method' => 'post',
                            ]);
                    },
                    'update' => function ($url, $model) {
                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada id_proceso                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['ps-proceso/deletep','id' => $model->id_proceso],true);
                            return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                    'title' => Yii::t('app', 'Borrar'),
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t('yii', '¿Desea Eliminar el Registro?'),
                            ]);
                    }
                                        
                                        
            ],
			
			
	],
        ],
    ]); ?>
</div>
