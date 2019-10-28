<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaErroresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cda-errores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_error') ?>

    <?= $form->field($model, 'observaciones') ?>

    <?= $form->field($model, 'id_terror') ?>

    <?= $form->field($model, 'id_reporte_informacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
