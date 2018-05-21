<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\SopSoportesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sop-soportes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_soportes') ?>

    <?= $form->field($model, 'ruta_soporte') ?>

    <?= $form->field($model, 'titulo_soporte') ?>

    <?= $form->field($model, 'palabras_clave') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'fuente_soporte') ?>

    <?php // echo $form->field($model, 'autor_soporte') ?>

    <?php // echo $form->field($model, 'idioma_soporte') ?>

    <?php // echo $form->field($model, 'formato_soportes') ?>

    <?php // echo $form->field($model, 'tamanio_soportes') ?>

    <?php // echo $form->field($model, 'id_respuesta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
