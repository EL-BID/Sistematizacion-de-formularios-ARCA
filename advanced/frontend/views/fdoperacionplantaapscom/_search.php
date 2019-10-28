<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdOperacionplantaApscomSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-operacionplanta-apscom-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_operacionplanta') ?>

    <?= $form->field($model, 'manual_operacion') ?>

    <?= $form->field($model, 'operacion_planta') ?>

    <?= $form->field($model, 'personal_capacitado') ?>

    <?= $form->field($model, 'frecuencia_mantenimiento') ?>

    <?php // echo $form->field($model, 'problemas') ?>

    <?php // echo $form->field($model, 'id_conjunto_respuesta') ?>

    <?php // echo $form->field($model, 'id_junta') ?>

    <?php // echo $form->field($model, 'id_pregunta') ?>

    <?php // echo $form->field($model, 'id_respuesta') ?>

    <?php // echo $form->field($model, 'id_capitulo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
