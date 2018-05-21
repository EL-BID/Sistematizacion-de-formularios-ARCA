<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Auditoria */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Auditorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auditoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

	
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'usuario',
            'ip_origen',
            'texto:ntext',
            'json:ntext',
            'id_tevento',
            'id_tmensaje',
            'id_taccion',
            'fecha_hora',
            'id_pagina',
            'accion',
            'pagina',
            'modulo',
        ],
    ]) ?>

</div>
