<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdSeccionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-seccion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_seccion') ?>

    <?= $form->field($model, 'nom_seccion') ?>

    <?= $form->field($model, 'orden') ?>

    <?= $form->field($model, 'id_capitulo') ?>

    <?= $form->field($model, 'num_columnas') ?>

    <?php // echo $form->field($model, 'num_col') ?>

    <?php // echo $form->field($model, 'stylecss') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
