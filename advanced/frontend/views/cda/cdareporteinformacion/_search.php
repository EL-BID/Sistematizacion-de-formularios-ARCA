<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaReporteInformacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cda-reporte-informacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_reporte_informacion') ?>

    <?= $form->field($model, 'sector_solicitado') ?>

    <?= $form->field($model, 'institucion_solicitante') ?>

    <?= $form->field($model, 'solicitante') ?>

    <?= $form->field($model, 'fuente_solicitada') ?>

    <?php // echo $form->field($model, 'q_solicitado') ?>

    <?php // echo $form->field($model, 'tiempo_years') ?>

    <?php // echo $form->field($model, 'id_tfuente') ?>

    <?php // echo $form->field($model, 'id_subtfuente') ?>

    <?php // echo $form->field($model, 'id_caracteristica') ?>

    <?php // echo $form->field($model, 'id_treporte') ?>

    <?php // echo $form->field($model, 'id_destino') ?>

    <?php // echo $form->field($model, 'id_uso_solicitado') ?>

    <?php // echo $form->field($model, 'id_ubicacion') ?>

    <?php // echo $form->field($model, 'abscisa') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'proba_excedencia_obtenida') ?>

    <?php // echo $form->field($model, 'proba_excedencia_certificado') ?>

    <?php // echo $form->field($model, 'decision') ?>

    <?php // echo $form->field($model, 'observaciones_decision') ?>

    <?php // echo $form->field($model, 'id_actividad') ?>

    <?php // echo $form->field($model, 'id_cactividad_proceso') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'causa_anulacion') ?>

    <?php // echo $form->field($model, 'causa_correccion') ?>

    <?php // echo $form->field($model, 'id_tipo') ?>

    <?php // echo $form->field($model, 'id_tramite') ?>

    <?php // echo $form->field($model, 'id_cod_cda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
