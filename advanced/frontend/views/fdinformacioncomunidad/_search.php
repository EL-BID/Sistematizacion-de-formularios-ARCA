<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdInformacionComunidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-informacion-comunidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_info_comunida') ?>

    <?= $form->field($model, 'parroquia') ?>

    <?= $form->field($model, 'comunidad') ?>

    <?= $form->field($model, 'habitantes') ?>

    <?= $form->field($model, 'id_conjunto_respuesta') ?>

    <?php // echo $form->field($model, 'id_pregunta') ?>

    <?php // echo $form->field($model, 'id_respuesta') ?>

    <?php // echo $form->field($model, 'id_capitulo') ?>

    <?php // echo $form->field($model, 'cod_parroquia') ?>

    <?php // echo $form->field($model, 'cod_canton') ?>

    <?php // echo $form->field($model, 'cod_provincia') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
