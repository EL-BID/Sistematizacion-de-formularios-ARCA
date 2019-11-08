<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaErrores */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-errores-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>
    <?= $form->field($model, 'id_terror')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaTipoError::find()->all(),'id_terror','id_terror'),['prompt'=>'Indique el valor para id_terror']) ?>

    <?= $form->field($model, 'observaciones')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Observaciones',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observaciones'        
                                         ]) ?>

    <?= $form->field($model, 'id_cda')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
