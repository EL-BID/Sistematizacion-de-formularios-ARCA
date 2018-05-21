<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorCorreoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cor-correo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_correo') ?>

    <?= $form->field($model, 'nom_correo') ?>

    <?= $form->field($model, 'asunto') ?>

    <?= $form->field($model, 'cuerpo') ?>

    <?= $form->field($model, 'id_tarea_programada') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
