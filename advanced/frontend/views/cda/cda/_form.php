<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\cda\Cda */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?php //$form->field($model, 'fecha_ingreso_quipux')->
//             widget(\yii\jui\DatePicker::className(),[
//                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
//                'clientOptions' => [
//                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
//                    'changeYear' => true,            //Permitir cambio de año
//                    'changeMonth' => true]            //Permitir cambio de Mes
            //]) ?>

    <?= $form->field($model, 'institucion_solicitante')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Institucion Solicitante',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Institucion Solicitante'        
                                         ]) ?>

    <?= $form->field($model, 'solicitante')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Solicitante',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Solicitante'        
                                         ]) ?>

    <?= $form->field($model, 'id_demarcacion')->dropDownList(\yii\helpers\ArrayHelper::map(
                                $listadodemarcacion,'id_demarcacion','nombre_demarcacion'),['prompt'=>'Indique Demarcacion','onchange'=>'$.post("index.php?r=cda/cda/centrociudadano&id='.'"+$(this).val(),function(data){
                                            $("#cda-cod_centro_atencion_ciudadano").html(data);
                                        });']
                           ) ?>
    
    <?php 
            
        if(empty($model->cod_centro_atencion_ciudadano) and empty($listadocentro)){
            echo $form->field($model, 'cod_centro_atencion_ciudadano')->dropDownList([],['prompt'=>'Indique Centro de Atencion']
                           ); 

        }else{

            echo $form->field($model, 'cod_centro_atencion_ciudadano')->dropDownList(\yii\helpers\ArrayHelper::map(
                                $listadocentro,'cod_centro_atencion_ciudadano','nom_centro_atencion_ciudadano'),['prompt'=>'Indique Centro de Atencion']
                           ); 
        }


    ?> 
    
    
     <?php
     
     if($tipo == '1'){
        echo $form->field($model, 'especifique')->textInput([
                                           'maxlength' => true,
                                           'title' => 'Indique Especificacion',
                                           'data-toggle' => 'tooltip',
                                           'placeholder'=>'Indique Especificacion'        
                                            ]); 
     }else{
         
        
        echo $form->field($model, 'fecha_ingreso_quipux')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Seleccione fecha y hora'],
            'pluginOptions' => [
                    'autoclose' => true,
                    'format' => Yii::$app->fmtfechahoradatepicker
            ]
        ]);
        
       
       echo $form->field($model, 'fecha_oficio')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Seleccione fecha y hora'],
            'pluginOptions' => [
                    'autoclose' => true,
                    'format' => Yii::$app->fmtfechahoradatepicker
            ]
        ]);

    
        echo $form->field($model, 'fecha_ingreso_anexos_fisicos')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Seleccione fecha y hora'],
            'pluginOptions' => [
                    'autoclose' => true,
                    'format' => Yii::$app->fmtfechahoradatepicker
            ]
        ]);
        
         echo $form->field($model, 'fecha_recepcion_anexos')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Seleccione fecha y hora'],
            'pluginOptions' => [
                    'autoclose' => true,
                    'format' => Yii::$app->fmtfechahoradatepicker
            ]
        ]);


     }        
             
    ?>
    
    <?php //$form->field($model, 'cod_cda')->textInput([
//                                        'maxlength' => true,
//                                        'title' => 'Indique Cod Cda',
//                                        'data-toggle' => 'tooltip',
//                                        'placeholder'=>'Indique Cod Cda'        
//                                         ]) ?>
    
    
     <!--Asignando campos para ps_cactividad_proceso anterior detalle --->
    <?php
    if(!empty($stringClasificacion)){
    ?>    
    
        <hr>
        <div>
            <h4>Detalle de la Actividad</h4>
            <?php eval('?>'.$stringClasificacion); ?>
        </div>    
    <?php
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
