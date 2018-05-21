<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\fdpreguntasearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fdpregunta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pregunta') ?>

    <?= $form->field($model, 'nom_pregunta') ?>

    <?= $form->field($model, 'ayuda_pregunta') ?>

    <?= $form->field($model, 'obligatorio') ?>

    <?= $form->field($model, 'max_largo') ?>

    <?php // echo $form->field($model, 'min_largo') ?>

    <?php // echo $form->field($model, 'max_date') ?>

    <?php // echo $form->field($model, 'min_date') ?>

    <?php // echo $form->field($model, 'orden') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'ini_fecha') ?>

    <?php // echo $form->field($model, 'fin_fecha') ?>

    <?php // echo $form->field($model, 'id_tpregunta') ?>

    <?php // echo $form->field($model, 'id_capitulo') ?>

    <?php // echo $form->field($model, 'id_seccion') ?>

    <?php // echo $form->field($model, 'id_agrupacion') ?>

    <?php // echo $form->field($model, 'id_tselect') ?>

    <?php // echo $form->field($model, 'caracteristica_preg') ?>

    <?php // echo $form->field($model, 'id_conjunto_pregunta') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <?php // echo $form->field($model, 'visible_desc_preg') ?>

    <?php // echo $form->field($model, 'num_col_label') ?>

    <?php // echo $form->field($model, 'num_col_input') ?>

    <?php // echo $form->field($model, 'stylecss') ?>

    <?php // echo $form->field($model, 'format') ?>

    <?php // echo $form->field($model, 'min_number') ?>

    <?php // echo $form->field($model, 'max_number') ?>

    <?php // echo $form->field($model, 'atributos') ?>

    <?php // echo $form->field($model, 'reg_exp') ?>

    <?php // echo $form->field($model, 'numerada') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
