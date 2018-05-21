<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsProcesoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ps-proceso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_proceso') ?>

    <?= $form->field($model, 'nom_proceso') ?>

    <?= $form->field($model, 'id_tproceso') ?>

    <?= $form->field($model, 'id_modulo') ?>

    <?= $form->field($model, 'url_datos_basicos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
