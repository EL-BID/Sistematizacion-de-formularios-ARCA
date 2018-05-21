<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\autenticacion\UsuariosApSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-ap-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'usuario') ?>

    <?= $form->field($model, 'clave') ?>

    <?= $form->field($model, 'login') ?>

    <?= $form->field($model, 'tipo_usuario') ?>

    <?php // echo $form->field($model, 'estado_usuario') ?>

    <?php // echo $form->field($model, 'identificacion') ?>

    <?php // echo $form->field($model, 'nombres') ?>

    <?php // echo $form->field($model, 'usuario_digitador') ?>

    <?php // echo $form->field($model, 'fecha_digitacion') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
