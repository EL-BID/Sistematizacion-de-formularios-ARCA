<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model frontend\models\Anexos */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="anexos-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'cod_anexo')->textInput() ?>

    <?= $form->field($model, 'anexo1')->checkbox() ?>

    <?= $form->field($model, 'anexo2')->checkbox() ?>

    <?= $form->field($model, 'anexo3')->checkbox() ?>

    <?= $form->field($model, 'anexo4')->checkbox() ?>

    <?= $form->field($model, 'anexo5')->checkbox() ?>

    <?= $form->field($model, 'anexo6')->checkbox() ?>

    <?= $form->field($model, 'anexo7')->checkbox() ?>

    <?= $form->field($model, 'anexo8')->checkbox() ?>

    <?= $form->field($model, 'anexo9')->checkbox() ?>

    <?= $form->field($model, 'cod_ficha')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
