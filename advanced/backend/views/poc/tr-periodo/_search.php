<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\TrPeriodoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-periodo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_periodo') ?>

    <?= $form->field($model, 'nom_periodo') ?>

    <?= $form->field($model, 'identificador') ?>

    <?= $form->field($model, 'vigencia') ?>

    <?= $form->field($model, 'id_tperiodo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
