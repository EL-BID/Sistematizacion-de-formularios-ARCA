<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdResulEvaluacionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-resul-evaluaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_resul_evaluaciones') ?>

    <?= $form->field($model, 'id_evaluacion') ?>

    <?= $form->field($model, 'puntaje') ?>

    <?= $form->field($model, 'id_conjunto_respuesta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
