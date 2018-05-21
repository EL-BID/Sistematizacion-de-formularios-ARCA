<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdAgrupacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-agrupacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_agrupacion') ?>

    <?= $form->field($model, 'nom_agrupacion') ?>

    <?= $form->field($model, 'id_tagrupacion') ?>

    <?= $form->field($model, 'num_col') ?>

    <?= $form->field($model, 'num_row') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
