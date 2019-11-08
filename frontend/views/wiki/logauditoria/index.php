<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AuditoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auditorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auditoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'usuario',
            'ip_origen',
            //'texto:ntext',
            //'json:ntext',
            ['attribute'=>'id_tevento','value'=>'idTevento.nom_tevento'],
            ['attribute'=>'id_tmensaje','value'=>'idTmensaje.nom_tmensaje'],
            ['attribute'=>'id_taccion','value'=>'idTaccion.nom_accion'],
            'fecha_hora',
            // 'id_pagina',
            // 'status',
            'pagina',
            'modulo',

            [
			
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Action',
                    'template' => '{view}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="btn-xs btn-primary">Ver</span>', $url, [
                                        'title' => Yii::t('app', 'View'),
                            ]);
                        }
                                           
                    ],
			
			
	    ],
        ],
    ]); ?>
</div>
