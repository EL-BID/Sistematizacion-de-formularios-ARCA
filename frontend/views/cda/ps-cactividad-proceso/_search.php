<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsCactividadProcesoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ps-cactividad-proceso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cactividad_proceso') ?>

    <?= $form->field($model, 'observacion') ?>

    <?= $form->field($model, 'fecha_realizacion') ?>

    <?= $form->field($model, 'fecha_prevista') ?>

    <?= $form->field($model, 'numero_quipux') ?>

    <?php // echo $form->field($model, 'id_cproceso') ?>

    <?php // echo $form->field($model, 'id_usuario') ?>

    <?php // echo $form->field($model, 'id_actividad') ?>

    <?php // echo $form->field($model, 'fecha_creacion') ?>

    <?php // echo $form->field($model, 'diligenciado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
