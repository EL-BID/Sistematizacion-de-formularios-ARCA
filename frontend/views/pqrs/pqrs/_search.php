<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\pqrs\PqrsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pqrs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pqrs') ?>

    <?= $form->field($model, 'fecha_recepcion') ?>

    <?= $form->field($model, 'num_consecutivo') ?>

    <?= $form->field($model, 'sol_nombres') ?>

    <?= $form->field($model, 'sol_doc_identificacion') ?>

    <?php // echo $form->field($model, 'sol_direccion') ?>

    <?php // echo $form->field($model, 'sol_email') ?>

    <?php // echo $form->field($model, 'sol_telefono') ?>

    <?php // echo $form->field($model, 'en_nom_nombres') ?>

    <?php // echo $form->field($model, 'en_nom_ruc') ?>

    <?php // echo $form->field($model, 'en_nom_direccion') ?>

    <?php // echo $form->field($model, 'en_nom_email') ?>

    <?php // echo $form->field($model, 'en_nom_telefono') ?>

    <?php // echo $form->field($model, 'aquien_dirige') ?>

    <?php // echo $form->field($model, 'objeto_peticion') ?>

    <?php // echo $form->field($model, 'descripcion_peticion') ?>

    <?php // echo $form->field($model, 'subtipo_queja') ?>

    <?php // echo $form->field($model, 'subtipo_reclamo') ?>

    <?php // echo $form->field($model, 'subtipo_controversia') ?>

    <?php // echo $form->field($model, 'por_quien_qrc') ?>

    <?php // echo $form->field($model, 'lugar_hechos') ?>

    <?php // echo $form->field($model, 'fecha_hechos') ?>

    <?php // echo $form->field($model, 'naracion_hechos') ?>

    <?php // echo $form->field($model, 'elementos_probatorios') ?>

    <?php // echo $form->field($model, 'denunc_nombre') ?>

    <?php // echo $form->field($model, 'denunc_direccion') ?>

    <?php // echo $form->field($model, 'denunc_telefono') ?>

    <?php // echo $form->field($model, 'subtipo_sugerencia') ?>

    <?php // echo $form->field($model, 'subtipo_felicitacion') ?>

    <?php // echo $form->field($model, 'descripcion_sugerencia') ?>

    <?php // echo $form->field($model, 'sol_cod_provincia') ?>

    <?php // echo $form->field($model, 'sol_cod_canton') ?>

    <?php // echo $form->field($model, 'en_nom_cod_provincia') ?>

    <?php // echo $form->field($model, 'en_nom_cod_canton') ?>

    <?php // echo $form->field($model, 'id_cproceso') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
