<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\autenticacion\MenusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menus-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_menu') ?>

    <?= $form->field($model, 'nom_menu') ?>

    <?= $form->field($model, 'nivel') ?>

    <?= $form->field($model, 'id_pagina') ?>

    <?= $form->field($model, 'parametros') ?>

    <?php // echo $form->field($model, 'id_menu_padre') ?>

    <?php // echo $form->field($model, 'tipo_menu') ?>

    <?php // echo $form->field($model, 'orden') ?>

    <?php // echo $form->field($model, 'estilos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
