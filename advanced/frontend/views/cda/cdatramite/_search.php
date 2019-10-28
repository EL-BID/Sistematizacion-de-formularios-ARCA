<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaTramiteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cda-tramite-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cda_tramite') ?>

    <?= $form->field($model, 'id_cda_solicitud') ?>

    <?= $form->field($model, 'num_tramite') ?>

    <?= $form->field($model, 'cod_solicitud_tecnico') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?php // echo $form->field($model, 'fecha_solicitud') ?>

    <?php // echo $form->field($model, 'puntos_solicitados') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
