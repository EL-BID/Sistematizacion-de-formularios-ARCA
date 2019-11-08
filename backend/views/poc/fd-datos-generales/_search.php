<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosGeneralesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-datos-generales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_datos_generales') ?>

    <?= $form->field($model, 'nombres') ?>

    <?= $form->field($model, 'num_documento') ?>

    <?= $form->field($model, 'num_convencional') ?>

    <?= $form->field($model, 'correo_electronico') ?>

    <?php // echo $form->field($model, 'num_celular') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'descripcion_trabajo') ?>

    <?php // echo $form->field($model, 'nombres_apellidos_replegal') ?>

    <?php // echo $form->field($model, 'id_tdocumento') ?>

    <?php // echo $form->field($model, 'id_natu_juridica') ?>

    <?php // echo $form->field($model, 'id_conjunto_respuesta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
