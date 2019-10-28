<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdUbicacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-ubicacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ubicacion') ?>

    <?= $form->field($model, 'cod_parroquia') ?>

    <?= $form->field($model, 'cod_canton') ?>

    <?= $form->field($model, 'cod_provincia') ?>

    <?= $form->field($model, 'id_demarcacion') ?>

    <?php // echo $form->field($model, 'cod_centro_atencion_ciudadano') ?>

    <?php // echo $form->field($model, 'descripcion_ubicacion') ?>

    <?php // echo $form->field($model, 'id_conjunto_respuesta') ?>

    <?php // echo $form->field($model, 'id_pregunta') ?>

    <?php // echo $form->field($model, 'id_respuesta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
