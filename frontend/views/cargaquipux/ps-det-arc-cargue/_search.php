<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cargaquipux\PsDetArcCargueSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ps-det-arc-cargue-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_archivo_cargue') ?>

    <?= $form->field($model, 'id_det_arc_cargue') ?>

    <?= $form->field($model, 'num_nom_hoja') ?>

    <?= $form->field($model, 'num_columna_excel') ?>

    <?= $form->field($model, 'nom_columna_cargue') ?>

    <?php // echo $form->field($model, 'nom_columna_excel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
