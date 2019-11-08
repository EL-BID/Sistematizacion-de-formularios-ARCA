<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsResponsablesProceso */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-responsables-proceso-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_usuario')->dropDownList(\yii\helpers\ArrayHelper::map($tecnicos,'id_usuario','nombres'),['prompt'=>'Indique el valor para id_usuario']) ?>

    <?= $form->field($model, 'id_tresponsabilidad')->dropDownList(\yii\helpers\ArrayHelper::map($tipos_responsabilidad,'id_tresponsabilidad','nom_responsabilidad'),['prompt'=>'Indique el valor para id_tresponsabilidad']) ?>

    <?= $form->field($model, 'observacion')->textarea(['rows' => '6']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
