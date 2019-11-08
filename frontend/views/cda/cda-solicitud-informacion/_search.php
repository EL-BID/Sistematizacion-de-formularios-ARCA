<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\CdaSolicitudInformacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cda-solicitud-informacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_solicitud_info') ?>

    <?= $form->field($model, 'id_tinfo_faltante') ?>

    <?= $form->field($model, 'id_treporte') ?>

    <?= $form->field($model, 'id_cactividad_proceso') ?>

    <?= $form->field($model, 'id_tatencion') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'oficio_atencion') ?>

    <?php // echo $form->field($model, 'fecha_atencion') ?>

    <?php // echo $form->field($model, 'id_cda') ?>

    <?php // echo $form->field($model, 'id_trespuesta') ?>

    <?php // echo $form->field($model, 'observaciones_res') ?>

    <?php // echo $form->field($model, 'oficio_respuesta') ?>

    <?php // echo $form->field($model, 'fecha_respuesta') ?>

    <?php // echo $form->field($model, 'id_cactividad_proceso_res') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
