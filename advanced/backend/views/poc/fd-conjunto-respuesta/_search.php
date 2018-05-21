<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConjuntoRespuestaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-conjunto-respuesta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_conjunto_respuesta') ?>

    <?= $form->field($model, 'id_conjunto_pregunta') ?>

    <?= $form->field($model, 'id_entidad') ?>

    <?= $form->field($model, 'id_formato') ?>

    <?= $form->field($model, 'ult_id_adm_estado') ?>

    <?php // echo $form->field($model, 'id_periodo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
