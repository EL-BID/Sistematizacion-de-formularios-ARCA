<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPonderacionRespuestaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-ponderacion-respuesta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ponderacion_resp') ?>

    <?= $form->field($model, 'id_tpondera') ?>

    <?= $form->field($model, 'descripcion_ponderacion') ?>

    <?= $form->field($model, 'valor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
