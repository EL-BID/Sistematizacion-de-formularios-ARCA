<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConduccionGravedadApSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-conduccion-gravedad-ap-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'id_conduccion_gravedad_ap') ?>

    <?= $form->field($model, 'nombre_conduccion_g') ?>

    <?= $form->field($model, 'id_forma_conduccion_g') ?>

    <?= $form->field($model, 'id_material_conduccion_g') ?>

    <?= $form->field($model, 'id_frec_mantenimiento_g') ?>

    <?php // echo $form->field($model, 'id_estado_conduccion_g') ?>

    <?php // echo $form->field($model, 'problemas_identificados') ?>

    <?php // echo $form->field($model, 'id_conjunto_respuesta') ?>

    <?php // echo $form->field($model, 'id_pregunta') ?>

    <?php // echo $form->field($model, 'id_respuesta') ?>

    <?php // echo $form->field($model, 'id_capitulo') ?>

    <?php // echo $form->field($model, 'id_junta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
