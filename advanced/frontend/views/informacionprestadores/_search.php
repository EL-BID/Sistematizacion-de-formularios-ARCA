<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\InformacionprestadoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="informacionprestadores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_informacion_prestadores') ?>

    <?= $form->field($model, 'posee_prestadores') ?>

    <?= $form->field($model, 'numero_prestadores') ?>

    <?= $form->field($model, 'numero_prestadores_legal') ?>

    <?= $form->field($model, 'numero_prestadores_economico') ?>

    <?php // echo $form->field($model, 'numero_prestadores_tecnico') ?>

    <?php // echo $form->field($model, 'id_conjunto_respuesta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
