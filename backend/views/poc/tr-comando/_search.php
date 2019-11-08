<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\TrComandoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-comando-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_comando') ?>

    <?= $form->field($model, 'nom_comando') ?>

    <?= $form->field($model, 'clase_comando') ?>

    <?= $form->field($model, 'hash_comando') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
