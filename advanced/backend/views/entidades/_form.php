<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\Entidades */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="entidades-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_entidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_entidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cod_canton')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cod_canton_p')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cod_provincia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cod_provincia_p')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cod_parroquia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipo_entidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
