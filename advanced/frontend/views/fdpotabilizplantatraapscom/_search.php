<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPotabilizPlantatraApscomSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-potabiliz-plantatra-apscom-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_potab_plantatr_apscom') ?>

    <?= $form->field($model, 'ubicacion_lug_ptratamiento') ?>

    <?= $form->field($model, 'tipo_planta_tratatmiento') ?>

    <?= $form->field($model, 'especifique_tplantat') ?>

    <?= $form->field($model, 'metodo_desinfeccion_planta') ?>

    <?php // echo $form->field($model, 'especifique_metdesinfeccionp') ?>

    <?php // echo $form->field($model, 'midicion_agua_tratplanta') ?>

    <?php // echo $form->field($model, 'estado_planta') ?>

    <?php // echo $form->field($model, 'problemas_identificados') ?>

    <?php // echo $form->field($model, 'id_conjunto_respuesta') ?>

    <?php // echo $form->field($model, 'id_pregunta') ?>

    <?php // echo $form->field($model, 'id_respuesta') ?>

    <?php // echo $form->field($model, 'id_capitulo') ?>

    <?php // echo $form->field($model, 'id_junta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
