<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\PsResponsablesProcesoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reponsables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-responsables-proceso-index">

    
        <?php
            if(empty($_ajax)){
        ?>
             <h1><?= Html::encode($this->title) ?></h1>
        <?php
            }
        ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_responsable_proceso',
            ['label'=>'Usuario','attribute'=>'id_usuario','value'=>'idUsuario.nombres'],
            ['label'=>'Responsabilidad','attribute'=>'id_tresponsabilidad','value'=>'idTresponsabilidad.nom_responsabilidad'],
            //'id_usuario',
            //'id_cproceso',
            'fecha',
            // 'observacion',

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
                    }, //Primera columna encontrada id_responsable_proceso                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['ps-responsablesproceso/deletep','id' => $model->id_responsable_proceso],true);
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
