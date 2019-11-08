<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaSolicitudSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cda-solicitud-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cda_solicitud') ?>

    <?= $form->field($model, 'num_solicitud') ?>

    <?= $form->field($model, 'fecha_solicitud') ?>

    <?= $form->field($model, 'fecha_ingreso') ?>

    <?= $form->field($model, 'id_cproceso_arca') ?>

    <?php // echo $form->field($model, 'id_cproceso_senagua') ?>

    <?php // echo $form->field($model, 'tramite_administrativo') ?>

    <?php // echo $form->field($model, 'numero_tramites') ?>

    <?php // echo $form->field($model, 'id_cda_rol') ?>

    <?php // echo $form->field($model, 'id_dh_cac') ?>

    <?php // echo $form->field($model, 'rol_en_calidad') ?>

    <?php // echo $form->field($model, 'enviado_por') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
