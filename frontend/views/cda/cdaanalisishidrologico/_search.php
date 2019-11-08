<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaAnalisisHidrologicoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cda-analisis-hidrologico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_analisis_hidrologico') ?>

    <?= $form->field($model, 'id_cartografia') ?>

    <?= $form->field($model, 'id_ehidrografica') ?>

    <?= $form->field($model, 'id_emeteorologica') ?>

    <?= $form->field($model, 'id_metodologia') ?>

    <?php // echo $form->field($model, 'id_cod_cda') ?>

    <?php // echo $form->field($model, 'informe_utilizado') ?>

    <?php // echo $form->field($model, 'probabilidad') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
