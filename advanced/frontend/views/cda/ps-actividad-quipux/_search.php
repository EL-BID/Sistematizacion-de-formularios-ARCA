<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsActividadQuipuxSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ps-actividad-quipux-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_actividad_quipux') ?>

    <?= $form->field($model, 'fecha_actividad_quipux') ?>

    <?= $form->field($model, 'usuario_actual_quipux') ?>

    <?= $form->field($model, 'accion_realizada') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'estado_actual') ?>

    <?php // echo $form->field($model, 'numero_referencia') ?>

    <?php // echo $form->field($model, 'usuario_origen_quipux') ?>

    <?php // echo $form->field($model, 'usuario_destino_quipux') ?>

    <?php // echo $form->field($model, 'respondido_a') ?>

    <?php // echo $form->field($model, 'fecha_carga') ?>

    <?php // echo $form->field($model, 'id_cproceso') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
