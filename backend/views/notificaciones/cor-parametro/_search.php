<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorParametroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cor-parametro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_parametro') ?>

    <?= $form->field($model, 'nom_parametro') ?>

    <?= $form->field($model, 'val_defecto') ?>

    <?= $form->field($model, 'consulta_sql') ?>

    <?= $form->field($model, 'id_correo') ?>

    <?php // echo $form->field($model, 'id_tparametro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
