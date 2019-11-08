<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cda-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fecha_ingreso') ?>

    <?= $form->field($model, 'fecha_solicitud') ?>

    <?= $form->field($model, 'tramite_administrativo') ?>

    <?= $form->field($model, 'id_cproceso_arca') ?>

    <?= $form->field($model, 'id_cproceso_senagua') ?>

    <?php // echo $form->field($model, 'rol_en_calidad') ?>

    <?php // echo $form->field($model, 'numero_tramites') ?>

    <?php // echo $form->field($model, 'id_cda') ?>

    <?php // echo $form->field($model, 'id_usuario_enviado_por') ?>

    <?php // echo $form->field($model, 'institucion_solicitante') ?>

    <?php // echo $form->field($model, 'solicitante') ?>

    <?php // echo $form->field($model, 'cod_centro_atencion_ciudadano') ?>

    <?php // echo $form->field($model, 'id_demarcacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
