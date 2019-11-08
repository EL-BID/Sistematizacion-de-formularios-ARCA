<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosGeneralesRiegoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-datos-generales-riego-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_datos_generales_riego') ?>

    <?= $form->field($model, 'nombres_prestador_servicio') ?>

    <?= $form->field($model, 'direccion_oficinas') ?>

    <?= $form->field($model, 'nombres_apellidos_replegal') ?>

    <?= $form->field($model, 'posee_convencional') ?>

    <?php // echo $form->field($model, 'num_convencional') ?>

    <?php // echo $form->field($model, 'num_celular') ?>

    <?php // echo $form->field($model, 'num_celular_otro') ?>

    <?php // echo $form->field($model, 'posee_email') ?>

    <?php // echo $form->field($model, 'correo_electronico') ?>

    <?php // echo $form->field($model, 'id_conjunto_respuesta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
