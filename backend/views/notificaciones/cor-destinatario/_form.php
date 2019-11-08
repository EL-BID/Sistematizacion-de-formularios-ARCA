<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorDestinatario */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cor-destinatario-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>


    <?= $form->field($model, 'val_defecto')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Valor Por Defecto',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Valor Por Defecto'        
                                         ]) ?>

    <?= $form->field($model, 'consulta_sql')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
              ]) ?>

    <?= $form->field($model, 'id_correo')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\notificaciones\CorCorreo::find()->all(),'id_correo','nom_correo'),['prompt'=>'Indique el valor para Correo']) ?>

    <?= $form->field($model, 'id_tdestinatario')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\notificaciones\CorTipoDestinatario::find()->all(),'id_tdestinatario','nom_tdestinatario'),['prompt'=>'Indique el valor para el tipo de destinatario']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
