<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdResulIndicadoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-resul-indicadores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_resul_indicadores') ?>

    <?= $form->field($model, 'id_indicador') ?>

    <?= $form->field($model, 'resultado') ?>

    <?= $form->field($model, 'recomendacion') ?>

    <?= $form->field($model, 'id_conjunto_respuesta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
