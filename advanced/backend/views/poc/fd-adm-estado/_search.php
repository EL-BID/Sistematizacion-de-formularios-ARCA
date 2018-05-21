<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdAdmEstadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-adm-estado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_adm_estado') ?>

    <?= $form->field($model, 'nom_adm_estado') ?>

    <?= $form->field($model, 'cod_rol') ?>

    <?= $form->field($model, 'id_modulo') ?>

    <?= $form->field($model, 'p_actualizar') ?>

    <?php // echo $form->field($model, 'p_crear') ?>

    <?php // echo $form->field($model, 'p_borrar') ?>

    <?php // echo $form->field($model, 'p_ejecutar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
