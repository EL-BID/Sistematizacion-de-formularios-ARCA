<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsHistoricoEstadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ps-historico-estados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_hisotrico_cproceso') ?>

    <?= $form->field($model, 'fecha_estado') ?>

    <?= $form->field($model, 'observaciones') ?>

    <?= $form->field($model, 'id_eproceso') ?>

    <?= $form->field($model, 'id_cproceso') ?>

    <?php // echo $form->field($model, 'id_usuario') ?>

    <?php // echo $form->field($model, 'id_actividad') ?>

    <?php // echo $form->field($model, 'id_tgestion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
