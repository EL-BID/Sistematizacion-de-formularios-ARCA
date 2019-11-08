<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTrataguaDesinfeccionApscomSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-tratagua-desinfeccion-apscom-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_trat_aguadesinf_apscom') ?>

    <?= $form->field($model, 'ubicacion_lug_tratamiento') ?>

    <?= $form->field($model, 'realiza_desinfeccion') ?>

    <?= $form->field($model, 'metodo_desinfeccion') ?>

    <?= $form->field($model, 'especifique_otro_metdesinf') ?>

    <?php // echo $form->field($model, 'mide_salida_desinfeccion') ?>

    <?php // echo $form->field($model, 'estado_func_sistema') ?>

    <?php // echo $form->field($model, 'problemas_identificados') ?>

    <?php // echo $form->field($model, 'especifique_otros_problemas') ?>

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
