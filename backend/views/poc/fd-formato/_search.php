<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdFormatoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-formato-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_formato') ?>

    <?= $form->field($model, 'nom_formato') ?>

    <?= $form->field($model, 'num_formato') ?>

    <?= $form->field($model, 'id_tipo_view_formato') ?>

    <?= $form->field($model, 'id_modulo') ?>

    <?php // echo $form->field($model, 'ult_id_version') ?>

    <?php // echo $form->field($model, 'cod_rol') ?>

    <?php // echo $form->field($model, 'numeracion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
