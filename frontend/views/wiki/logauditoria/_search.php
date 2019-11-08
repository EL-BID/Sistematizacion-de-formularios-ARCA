<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AuditoriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auditoria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'usuario') ?>

    <?= $form->field($model, 'ip_origen') ?>

    <?= $form->field($model, 'texto') ?>

    <?= $form->field($model, 'json') ?>

    <?php // echo $form->field($model, 'id_tevento') ?>

    <?php // echo $form->field($model, 'id_tmensaje') ?>

    <?php // echo $form->field($model, 'id_taccion') ?>

    <?php // echo $form->field($model, 'fecha_hora') ?>

    <?php // echo $form->field($model, 'id_pagina') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'pagina') ?>

    <?php // echo $form->field($model, 'modulo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
