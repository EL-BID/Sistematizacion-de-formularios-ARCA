<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\PsCprocesoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ps Cprocesos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-cproceso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Nuevo Ps Cproceso', 
        ['value' =>Url::to(['ps-cproceso/create']), 'title' => 'Nuevo Ps Cproceso',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cproceso',
            'ult_id_eproceso',
            'id_proceso',
            'id_usuario',
            'id_modulo',
            // 'num_quipux',
            // 'fecha_registro_quipux',
            // 'asunto_quipux',
            // 'tipo_documento_quipux',
            // 'ult_id_actividad',
            // 'ult_id_usuario',
            // 'ult_fecha_actividad',
            // 'ult_fecha_estado',
            // 'numero',

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
                    }, //Primera columna encontrada id_cproceso                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['ps-cproceso/deletep','id' => $model->id_cproceso],true);
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
