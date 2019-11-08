<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\TarTareaProgramadaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tar-tarea-programada-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tarea_programada') ?>

    <?= $form->field($model, 'nom_tarea_programada') ?>

    <?= $form->field($model, 'fecha_inicio') ?>

    <?= $form->field($model, 'fecha_termina') ?>

    <?= $form->field($model, 'fecha_proxima_eje') ?>

    <?php // echo $form->field($model, 'intervalo_ejecucion') ?>

    <?php // echo $form->field($model, 'numero_ejecucion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
