<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EntidadesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entidades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_entidad') ?>

    <?= $form->field($model, 'nombre_entidad') ?>

    <?= $form->field($model, 'cod_canton') ?>

    <?= $form->field($model, 'cod_canton_p') ?>

    <?= $form->field($model, 'cod_provincia') ?>

    <?php // echo $form->field($model, 'cod_provincia_p') ?>

    <?php // echo $form->field($model, 'cod_parroquia') ?>

    <?php // echo $form->field($model, 'id_tipo_entidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
