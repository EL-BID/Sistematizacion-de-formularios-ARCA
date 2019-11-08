<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoPreguntaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fd-tipo-pregunta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tpregunta') ?>

    <?= $form->field($model, 'nom_tpregunta') ?>

    <?= $form->field($model, 'pantalla_lectura') ?>

    <?= $form->field($model, 'url_subpantalla') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
