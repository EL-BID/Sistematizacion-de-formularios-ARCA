<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CdaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cda-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cda') ?>

    <?= $form->field($model, 'fecha_ingreso_quipux') ?>

    <?= $form->field($model, 'institucion_solicitante') ?>

    <?= $form->field($model, 'solicitante') ?>

    <?= $form->field($model, 'cod_centro_atencion_ciudadano') ?>

    <?php // echo $form->field($model, 'id_demarcacion') ?>

    <?php // echo $form->field($model, 'cod_cda') ?>

    <?php // echo $form->field($model, 'id_cda_tramite') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
