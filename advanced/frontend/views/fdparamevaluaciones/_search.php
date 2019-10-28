<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdParamEvaluacionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-param-evaluaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_evaluacion') ?>

    <?= $form->field($model, 'componente') ?>

    <?= $form->field($model, 'criterio') ?>

    <?= $form->field($model, 'item') ?>

    <?= $form->field($model, 'condicionante') ?>

    <?php // echo $form->field($model, 'id_pregunta') ?>

    <?php // echo $form->field($model, 'tipo_valoracion') ?>

    <?php // echo $form->field($model, 'porcentaje_ponderacion') ?>

    <?php // echo $form->field($model, 'puntuacion') ?>

    <?php // echo $form->field($model, 'formato') ?>

    <?php // echo $form->field($model, 'detalle') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
