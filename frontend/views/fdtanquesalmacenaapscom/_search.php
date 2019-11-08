<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTanquesAlmacenaApscomSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-tanques-almacena-apscom-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tanquesalmacena') ?>

    <?= $form->field($model, 'ubicacion_tanque') ?>

    <?= $form->field($model, 'capacidad_tanque') ?>

    <?= $form->field($model, 'medicion_entrada') ?>

    <?= $form->field($model, 'material') ?>

    <?php // echo $form->field($model, 'frecuencia_mantenimiento') ?>

    <?php // echo $form->field($model, 'estado_tanque') ?>

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
