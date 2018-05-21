<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsResponsablesProcesoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ps-responsables-proceso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_responsable_proceso') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'id_cproceso') ?>

    <?= $form->field($model, 'id_tresponsabilidad') ?>

    <?= $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
