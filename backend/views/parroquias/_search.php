<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ParroquiasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parroquias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod_parroquia') ?>

    <?= $form->field($model, 'nombre_parroquia') ?>

    <?= $form->field($model, 'cod_canton') ?>

    <?= $form->field($model, 'cod_provincia') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
