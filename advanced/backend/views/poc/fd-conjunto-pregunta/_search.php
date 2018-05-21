<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConjuntoPreguntaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-conjunto-pregunta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_conjunto_pregunta') ?>

    <?= $form->field($model, 'id_formato') ?>

    <?= $form->field($model, 'id_version') ?>

    <?= $form->field($model, 'id_tipo_view_formato') ?>

    <?= $form->field($model, 'cod_rol') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
