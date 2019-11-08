<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsCprocesoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ps-cproceso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cproceso') ?>

    <?= $form->field($model, 'ult_id_eproceso') ?>

    <?= $form->field($model, 'id_proceso') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'id_modulo') ?>

    <?php // echo $form->field($model, 'num_quipux') ?>

    <?php // echo $form->field($model, 'fecha_registro_quipux') ?>

    <?php // echo $form->field($model, 'asunto_quipux') ?>

    <?php // echo $form->field($model, 'tipo_documento_quipux') ?>

    <?php // echo $form->field($model, 'ult_id_actividad') ?>

    <?php // echo $form->field($model, 'ult_id_usuario') ?>

    <?php // echo $form->field($model, 'ult_fecha_actividad') ?>

    <?php // echo $form->field($model, 'ult_fecha_estado') ?>

    <?php // echo $form->field($model, 'numero') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
