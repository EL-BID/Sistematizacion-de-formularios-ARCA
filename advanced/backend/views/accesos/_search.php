<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AccesosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accesos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id__acceso') ?>

    <?= $form->field($model, 'nombre_acceso') ?>

    <?= $form->field($model, 'id_pagina') ?>

    <?= $form->field($model, 'id_tipo_acceso') ?>

    <?= $form->field($model, 'cod_rol') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
