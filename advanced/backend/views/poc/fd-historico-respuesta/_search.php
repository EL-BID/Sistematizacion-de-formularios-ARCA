<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdHistoricoRespuestaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-historico-respuesta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_historico_respuesta') ?>

    <?= $form->field($model, 'observaciones') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'usuario') ?>

    <?= $form->field($model, 'id_conjunto_respuesta') ?>

    <?php // echo $form->field($model, 'id_adm_estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
