<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsCproceso */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this);
?>

<div class="ps-cproceso-form">

   
    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>
    
     <?= $form->field($model, 'numero')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Numero',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Numero'        
                                         ]) ?>
    
    <?= $form->field($model, 'ult_id_eproceso')->dropDownList(\yii\helpers\ArrayHelper::map(
                                    $ult_eproceso,'id_eproceso','nom_eproceso'),['prompt'=>'Indique estado']
                                    ) ?>

    <?= $form->field($model, 'ult_id_usuario')->dropDownList(
                                            \yii\helpers\ArrayHelper::map($ult_usuario,'id_usuario','nombres'),
                                            ['prompt'=>'Indique el valor para id_usuario']) ?>

    <?= $form->field($model, 'ult_fecha_actividad')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'ult_fecha_estado')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>
    
    
     <?= $form->field($model, 'fecha_solicitud')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

