<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\PsActividadQuipuxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Oficios Relacionados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-actividad-quipux-index">

   
        <?php
            if(empty($_ajax)){
        ?>
             <h1><?= Html::encode($this->title) ?></h1>
        <?php
            }
        ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /*Html::button('Create Ps Actividad Quipux', 
        ['value' =>Url::to(['psactividadquipux/create']), 'title' => 'Create Ps Actividad Quipux',
        'class' => 'showModalButton btn btn-success']);*/ ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_actividad_quipux',
            ['label'=>'Fecha','attribute'=>'fecha_actividad_quipux','value'=>'fecha_actividad_quipux'],
            //'usuario_actual_quipux',
            //'accion_realizada',
            //'descripcion',
            // 'estado_actual',
            'numero_referencia',
            // 'usuario_origen_quipux',
            // 'usuario_destino_quipux',
            // 'respondido_a',
            // 'fecha_carga',
            // 'id_cproceso',

            /*[
			
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
                    }, //Primera columna encontrada id_actividad_quipux                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['psactividadquipux/deletep','id' => $model->id_actividad_quipux],true);
                            return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?'),
                            ]);
                    }
                                        
                                        
            ],
			
			
	],*/
        ],
    ]); ?>
</div>
