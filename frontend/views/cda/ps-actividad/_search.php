<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsActividadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ps-actividad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_actividad') ?>

    <?= $form->field($model, 'nom_actividad') ?>

    <?= $form->field($model, 'orden') ?>

    <?= $form->field($model, 'id_proceso') ?>

    <?= $form->field($model, 'id_tactividad') ?>

    <?php // echo $form->field($model, 'subpantalla') ?>

    <?php // echo $form->field($model, 'id_tselect') ?>

    <?php // echo $form->field($model, 'id_clasif_actividad') ?>

    <?php // echo $form->field($model, 'plazo_alerta') ?>

    <?php // echo $form->field($model, 'campo_fecha_alerta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
