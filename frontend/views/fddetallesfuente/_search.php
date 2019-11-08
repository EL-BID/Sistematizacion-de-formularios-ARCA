<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDetallesFuenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-detalles-fuente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_detalles_fuente') ?>

    <?= $form->field($model, 'nombre_fuente') ?>

    <?= $form->field($model, 'id_t_fuente') ?>

    <?= $form->field($model, 'coor_x') ?>

    <?= $form->field($model, 'coor_y') ?>

    <?php // echo $form->field($model, 'coor_z') ?>

    <?php // echo $form->field($model, 'caudal_captado') ?>

    <?php // echo $form->field($model, 'caudal_autorizado') ?>

    <?php // echo $form->field($model, 'id_problema_fuente') ?>

    <?php // echo $form->field($model, 'id_conjunto_respuesta') ?>

    <?php // echo $form->field($model, 'id_pregunta') ?>

    <?php // echo $form->field($model, 'id_respuesta') ?>

    <?php // echo $form->field($model, 'id_capitulo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
