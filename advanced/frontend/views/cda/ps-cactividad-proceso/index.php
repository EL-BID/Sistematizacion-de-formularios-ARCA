<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\PsCactividadProcesoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ps Cactividad Procesos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-cactividad-proceso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Ps Cactividad Proceso', 
        ['value' =>Url::to(['pscactividadproceso/create']), 'title' => 'Create Ps Cactividad Proceso',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            'id_cactividad_proceso',
            'observacion',
            'fecha_realizacion',
            'fecha_prevista',
            'numero_quipux',
            // 'id_cproceso',
            // 'id_usuario',
            // 'id_actividad',
            // 'fecha_creacion',
            // 'diligenciado',

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
                    }, //Primera columna encontrada id_cactividad_proceso                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['pscactividadproceso/deletep','id' => $model->id_cactividad_proceso],true);
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
