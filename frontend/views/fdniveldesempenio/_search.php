<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdNivelDesempenioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-nivel-desempenio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_nivel') ?>

    <?= $form->field($model, 'intervalo_inicio') ?>

    <?= $form->field($model, 'intervalo_fin') ?>

    <?= $form->field($model, 'nivel_desempenio') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'semaforizacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
