<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdFuentesHidricasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-fuentes-hidricas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_fuentehidrica') ?>

    <?= $form->field($model, 'nom_fuente') ?>

    <?= $form->field($model, 'id_conjunto_respuesta') ?>

    <?= $form->field($model, 'id_pregunta') ?>

    <?= $form->field($model, 'id_respuesta') ?>

    <?php // echo $form->field($model, 'id_capitulo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
