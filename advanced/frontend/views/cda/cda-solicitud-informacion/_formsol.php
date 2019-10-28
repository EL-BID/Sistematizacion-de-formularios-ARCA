<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\CdaSolicitudInformacion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-solicitud-informacion-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'crear-form'
					]
                ]); ?>
    
    <?= $form->field($model, 'fecha_atencion')->
             widget(\yii\jui\DatePicker::className(),[
               'dateFormat' => Yii::$app->fmtfechasql,
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>
    
    <?= $form->field($model, 'oficio_atencion')->textInput([
                                      'maxlength' => true,
                                      'title' => 'Indique Oficio Atencion',
                                      'data-toggle' => 'tooltip',
                                      'placeholder'=>'Indique Oficio Atencion'        
                                       ]) ?>
    
    <?= $form->field($model, 'estado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Estado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Estado'        
                                         ]); ?>

    <?= $form->field($model, 'id_tatencion')->dropDownList(\yii\helpers\ArrayHelper::map($listtipoatencion,'id_tatencion','nom_tatencion'),['prompt'=>'Seleccione uno']) ?>

    <?= $form->field($model, 'causa_anulacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Estado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Estado'        
                                         ]); ?>
    
    <?= $form->field($model, 'causa_correcion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Estado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Estado'        
                                         ]); ?>
    
    
    <?= $form->field($model, 'observaciones')->textarea([
                                        'maxlength' => true,
                                        'title' => 'Indique Observaciones',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observaciones'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
