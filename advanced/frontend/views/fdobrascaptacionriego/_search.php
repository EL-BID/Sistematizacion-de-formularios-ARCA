<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdObrasCaptacionRiegoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-obras-captacion-riego-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_obracaptacion') ?>

    <?= $form->field($model, 'numero_obras') ?>

    <?= $form->field($model, 'tipo_obra') ?>

    <?= $form->field($model, 'estado_obra') ?>

    <?= $form->field($model, 'id_conjunto_respuesta') ?>

    <?php // echo $form->field($model, 'id_pregunta') ?>

    <?php // echo $form->field($model, 'id_respuesta') ?>

    <?php // echo $form->field($model, 'id_capitulo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
