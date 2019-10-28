<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDetallesCaptacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-detalles-captacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_detalles_captacion') ?>

    <?= $form->field($model, 'nombre_captacion') ?>

    <?= $form->field($model, 'id_estruc_hidrau') ?>

    <?= $form->field($model, 'id_material_estruc') ?>

    <?php // echo $form->field($model, 'id_problema_capt') ?>

    <?php // echo $form->field($model, 'id_estado_capt') ?>

    <?php // echo $form->field($model, 'id_t_medicion') ?>

    <?php // echo $form->field($model, 'id_problema_fuente') ?>

    <?php // echo $form->field($model, 'especifique_mat_estr') ?>

    <?php // echo $form->field($model, 'especifique_probl') ?>

    <?php // echo $form->field($model, 'especifique_t_med') ?>

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
