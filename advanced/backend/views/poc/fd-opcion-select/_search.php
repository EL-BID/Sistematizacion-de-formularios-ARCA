<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdOpcionSelectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-opcion-select-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_opcion_select') ?>

    <?= $form->field($model, 'nom_opcion_select') ?>

    <?= $form->field($model, 'orden') ?>

    <?= $form->field($model, 'id_tselect') ?>

    <?= $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
