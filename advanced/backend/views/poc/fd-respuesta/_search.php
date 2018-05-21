<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdRespuestaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-respuesta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_respuesta') ?>

    <?= $form->field($model, 'ra_fecha') ?>

    <?= $form->field($model, 'ra_check') ?>

    <?= $form->field($model, 'ra_descripcion') ?>

    <?= $form->field($model, 'ra_entero') ?>

    <?php // echo $form->field($model, 'ra_decimal') ?>

    <?php // echo $form->field($model, 'ra_porcentaje') ?>

    <?php // echo $form->field($model, 'id_conjunto_respuesta') ?>

    <?php // echo $form->field($model, 'ra_moneda') ?>

    <?php // echo $form->field($model, 'id_pregunta') ?>

    <?php // echo $form->field($model, 'id_opcion_select') ?>

    <?php // echo $form->field($model, 'id_tpregunta') ?>

    <?php // echo $form->field($model, 'id_capitulo') ?>

    <?php // echo $form->field($model, 'id_formato') ?>

    <?php // echo $form->field($model, 'id_conjunto_pregunta') ?>

    <?php // echo $form->field($model, 'id_version') ?>

    <?php // echo $form->field($model, 'cantidad_registros') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
