<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorMensajeEnviadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cor-mensaje-enviado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_mensaje_enviado') ?>

    <?= $form->field($model, 'cor_parametro') ?>

    <?= $form->field($model, 'cor_destinatario') ?>

    <?= $form->field($model, 'asunto') ?>

    <?= $form->field($model, 'id_correo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
