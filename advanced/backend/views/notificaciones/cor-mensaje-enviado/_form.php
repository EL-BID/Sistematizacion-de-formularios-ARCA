<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorMensajeEnviado */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cor-mensaje-enviado-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'cor_parametro')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
              ]) ?>

    <?= $form->field($model, 'cor_destinatario')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
              ]) ?>

    <?= $form->field($model, 'asunto')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Asunto',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Asunto'        
                                         ]) ?>

    <?= $form->field($model, 'id_correo')->dropDownList(\yii\helpers\ArrayHelper::map(cor_correo::find()->all(),'id_correo','id_correo'),['prompt'=>'Indique el valor para el Correo']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
