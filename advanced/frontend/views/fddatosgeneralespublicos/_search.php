<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosGeneralesPublicosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-datos-generales-publicos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_datos_generales_publicos') ?>

    <?= $form->field($model, 'pagina_web_prestador') ?>

    <?= $form->field($model, 'correo_electronico_prestador') ?>

    <?= $form->field($model, 'fecha_llenado_fichas') ?>

    <?= $form->field($model, 'nombres_responsable_informacion') ?>

    <?php // echo $form->field($model, 'cargo_desempenia') ?>

    <?php // echo $form->field($model, 'correo_electronico') ?>

    <?php // echo $form->field($model, 'num_celular') ?>

    <?php // echo $form->field($model, 'id_conjunto_respuesta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
