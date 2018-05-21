<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CapitulosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capitulos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_capitulo') ?>

    <?= $form->field($model, 'nom_capitulo') ?>

    <?= $form->field($model, 'orden') ?>

    <?= $form->field($model, 'url') ?>

    <?= $form->field($model, 'consulta') ?>

    <?php // echo $form->field($model, 'id_tview_cap') ?>

    <?php // echo $form->field($model, 'id_tcapitulo') ?>

    <?php // echo $form->field($model, 'icono') ?>

    <?php // echo $form->field($model, 'id_conjunto_pregunta') ?>

    <?php // echo $form->field($model, 'id_comando') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
