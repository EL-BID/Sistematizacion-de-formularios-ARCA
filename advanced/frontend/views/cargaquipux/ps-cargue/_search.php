<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cargaquipux\PsCargueSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ps-cargue-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cargues') ?>

    <?= $form->field($model, 'ruta') ?>

    <?= $form->field($model, 'procesado') ?>

    <?= $form->field($model, 'fecha_cargue') ?>

    <?= $form->field($model, 'fecha_proceso') ?>

    <?php // echo $form->field($model, 'id_archivo_cargue') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
