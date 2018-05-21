<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CantonesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cantones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cod_canton') ?>

    <?= $form->field($model, 'nombre_canton') ?>

    <?= $form->field($model, 'cod_provincia') ?>

    <?= $form->field($model, 'id_demarcacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
