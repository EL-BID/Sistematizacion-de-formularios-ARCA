<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPreguntaDescendienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-pregunta-descendiente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pregunta_padre') ?>

    <?= $form->field($model, 'id_pregunta_descendiente') ?>

    <?= $form->field($model, 'id_version_descendiente') ?>

    <?= $form->field($model, 'id_version_padre') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
