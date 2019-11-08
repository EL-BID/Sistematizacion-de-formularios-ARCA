<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorDestinatarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cor-destinatario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_destinatario') ?>

    <?= $form->field($model, 'val_defecto') ?>

    <?= $form->field($model, 'consulta_sql') ?>

    <?= $form->field($model, 'id_correo') ?>

    <?= $form->field($model, 'id_tdestinatario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
