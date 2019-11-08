<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdElementoCondicionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-elemento-condicion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'valor') ?>

    <?= $form->field($model, 'id_condicion') ?>

    <?= $form->field($model, 'id_tcondicion') ?>

    <?= $form->field($model, 'id_pregunta_habilitadora') ?>

    <?= $form->field($model, 'id_pregunta_condicionada') ?>

    <?php // echo $form->field($model, 'id_capitulo_condicionado') ?>

    <?php // echo $form->field($model, 'id_adm_estado') ?>

    <?php // echo $form->field($model, 'cod_rol') ?>

    <?php // echo $form->field($model, 'operacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
