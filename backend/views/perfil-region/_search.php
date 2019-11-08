<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PerfilRegionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-region-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'estado_per_reg') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'cod_rol') ?>

    <?= $form->field($model, 'cod_region') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
