<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsCproceso */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-cproceso-form">

    
    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'formdatosbasicos-form'
					]
                ]); ?>
    
    <?= $form->field($model, 'numero')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Numero',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Numero'        
                                         ]) ?>
    
    
   
    <?= $form->field($model, 'num_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Quipux',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Quipux'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_registro_quipux')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>
    
    
    <?= Html::label('Tipo PQRS:', 'xxx') ?>
    <?= Html::input('text', 'tipo_pqr', $tipo_pqr,['class'=>'form-control','disabled' => true]) ?>
    <br/>

    <?= $form->field($model, 'asunto_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Asunto Quipux',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Asunto Quipux'        
                                         ]) ?>
    
    
    <?= $form->field($model, 'fecha_solicitud')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                'clientOptions' => [
                    'minDate' => '-1',            //Permitir cambio de año
                    'maxDate' => '-2']            //Permitir cambio de Mes
            ]) ?>

    
    <?= Html::label('Fecha Ingreso', 'xxx') ?>
    <?= Html::input('text', 'fecha_ingreso', $fecha_recepcion,['class'=>'form-control']) ?>


    <div class="form-group">
        <?= ($disabled_responsable === FALSE)? Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']):''; ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
