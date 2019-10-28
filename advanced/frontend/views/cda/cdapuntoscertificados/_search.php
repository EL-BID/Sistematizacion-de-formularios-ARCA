<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaPuntosCertificadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cda-puntos-certificados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_puntos_certificados') ?>

    <?= $form->field($model, 'puntos_solicitados_tramite') ?>

    <?= $form->field($model, 'puntos_visita_tecnica') ?>

    <?= $form->field($model, 'puntos_verificados_senagua') ?>

    <?= $form->field($model, 'puntos_certificados') ?>

    <?php // echo $form->field($model, 'puntos_devueltos') ?>

    <?php // echo $form->field($model, 'id_cda_solicitud') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
