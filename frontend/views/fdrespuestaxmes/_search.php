<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdRespuestaXMesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-respuesta-xmes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ene_decimal') ?>

    <?= $form->field($model, 'feb_decimal') ?>

    <?= $form->field($model, 'mar_decimal') ?>

    <?= $form->field($model, 'abr_decimal') ?>

    <?= $form->field($model, 'may_decimal') ?>

    <?php // echo $form->field($model, 'jun_decimal') ?>

    <?php // echo $form->field($model, 'jul_decimal') ?>

    <?php // echo $form->field($model, 'ago_decimal') ?>

    <?php // echo $form->field($model, 'sep_decimal') ?>

    <?php // echo $form->field($model, 'oct_decimal') ?>

    <?php // echo $form->field($model, 'nov_decimal') ?>

    <?php // echo $form->field($model, 'dic_decimal') ?>

    <?php // echo $form->field($model, 'id_respuesta') ?>

    <?php // echo $form->field($model, 'id_pregunta') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'id_opcion_select') ?>

    <?php // echo $form->field($model, 'id_respuesta_x_mes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
