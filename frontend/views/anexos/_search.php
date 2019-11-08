<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UsosSearchfrontend */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anexos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod_anexo') ?>

    <?= $form->field($model, 'anexo1')->checkbox() ?>

    <?= $form->field($model, 'anexo2')->checkbox() ?>

    <?= $form->field($model, 'anexo3')->checkbox() ?>

    <?= $form->field($model, 'anexo4')->checkbox() ?>

    <?php // echo $form->field($model, 'anexo5')->checkbox() ?>

    <?php // echo $form->field($model, 'anexo6')->checkbox() ?>

    <?php // echo $form->field($model, 'anexo7')->checkbox() ?>

    <?php // echo $form->field($model, 'anexo8')->checkbox() ?>

    <?php // echo $form->field($model, 'anexo9')->checkbox() ?>

    <?php // echo $form->field($model, 'cod_ficha') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
