<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdBombasCaptacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-bombas-captacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //$form->field($model, 'id_bombas_captacion') ?>

    <?= $form->field($model, 'nombre_bomba') ?>

    <?= $form->field($model, 'id_material_tuberia') ?>

    <?php // $form->field($model, 'id_estado_infrestructura') ?>

    <?php // $form->field($model, 'potencia_bomba') ?>

    <?=  echo $form->field($model, 'anio_instalacion') ?>

    <?php // echo $form->field($model, 'id_problema_bomba') ?>

    <?php // echo $form->field($model, 'especifique_material_caseta') ?>

    <?php // echo $form->field($model, 'especifique_problema_bomba') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

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
