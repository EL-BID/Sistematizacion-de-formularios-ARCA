<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConduccionImpulsionApscomSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-conduccion-impulsion-apscom-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cond_impulsion_apscom') ?>

    <?= $form->field($model, 'nombre_lug_conduccion') ?>

    <?= $form->field($model, 'id_material_tuberia') ?>

    <?= $form->field($model, 'id_estado_tuberia') ?>

    <?= $form->field($model, 'id_frec_mantenimiento_condimp') ?>

    <?php // echo $form->field($model, 'id_estado_bomba') ?>

    <?php // echo $form->field($model, 'problemas_identificados') ?>

    <?php // echo $form->field($model, 'especifique_otro_tuberia') ?>

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
