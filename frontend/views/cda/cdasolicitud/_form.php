<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaSolicitud */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-solicitud-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    
    <?= $form->field($model, 'num_solicitud')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Solicitud',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Número Solicitud',
                                        'readonly'=>true
                                         ]) ?>
    
     <?= $form->field($modelpscproceso['model2'], '[model2]num_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Numero Quipux Arca',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Número Quipux Arca',
                                        'disabled' => $_editararca,
                                         ]); ?>
    
    <?= $form->field($modelpscproceso['model3'], '[model3]num_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Numero Quipux Senagua',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Número Quipux Senagua',
                                        'disabled' => $_editarsenagua,
                                         ]); ?>

    <?php
    
      echo $form->field($model, 'fecha_ingreso')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Seleccione fecha y hora'],
            'pluginOptions' => [
                    'autoclose' => true,
                    'format' => Yii::$app->fmtfechahoradatepicker
            ]
        ]);
      
        echo $form->field($model, 'fecha_solicitud')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Seleccione fecha y hora'],
            'pluginOptions' => [
                    'autoclose' => true,
                    'format' => Yii::$app->fmtfechahoradatepicker
            ]
        ]);
        
//         echo $form->field($model, 'fecha_recepcion_anexos')->widget(DateTimePicker::classname(), [
//            'options' => ['placeholder' => 'Seleccione fecha y hora','readonly' => true],
//            'pluginOptions' => [
//                    'autoclose' => true,
//                    'format' => Yii::$app->fmtfechahoradatepicker
//            ]
//        ]);
//         
//          echo $form->field($model, 'fecha_ingreso_fisico_arca')->widget(DateTimePicker::classname(), [
//            'options' => ['placeholder' => 'Seleccione fecha y hora'],
//            'pluginOptions' => [
//                    'autoclose' => true,
//                    'format' => Yii::$app->fmtfechahoradatepicker
//            ]
//        ]);
    ?>     
  

 
    <?php
        echo $form->field($model, 'tramite_administrativo')->dropDownList(
            ['Disponibilidad de Agua' => 'Disponibilidad de Agua', 'Certificado Disponibilidad de Agua' => 'Certificado Disponibilidad de Agua'],['prompt' => 'Seleccione un trámite' ]
    );
    ?>

    <?= $form->field($model, 'numero_tramites')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Numero Tramites',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Numero Tramites'        
                                         ]) ?>

    <?= $form->field($model, 'id_cda_rol')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaRol::find()->all(),'id_cda_rol','nom_cda_rol'),['prompt'=>'Seleccione rol']) ?>

    <?php //$form->field($model, 'id_dh_cac')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaDhCac::find()->all(),'id_dh_cac','nom_dh_cac'),['prompt'=>'Seleccione DH/CAC']) ?>
    
    <?= $form->field($model, 'id_demarcacion')->dropDownList(\yii\helpers\ArrayHelper::map(
                                $listadodemarcacion,'id_demarcacion','nombre_demarcacion'),['prompt'=>'Indique Demarcacion','onchange'=>'$.post("index.php?r=cda/cdasolicitud/centrociudadano&id='.'"+$(this).val(),function(data){
                                            $("#cdasolicitud-cod_centro_atencion_ciudadano").html(data);
                                        });']
                           ) ?>
    
    <?php 
            
        if($model->isNewRecord){
            echo $form->field($model, 'cod_centro_atencion_ciudadano')->dropDownList([],['prompt'=>'Indique Centro de Atencion']
                           ); 

        }else{

            echo $form->field($model, 'cod_centro_atencion_ciudadano')->dropDownList(\yii\helpers\ArrayHelper::map(
                                $listadocentro,'cod_centro_atencion_ciudadano','nom_centro_atencion_ciudadano'),['prompt'=>'Indique Centro de Atencion']
                           ); 
        }


    ?> 
    

      <?php
        echo $form->field($model, 'rol_en_calidad')->dropDownList(
            ['Encargado' => 'Encargado', 'Subrogante' => 'Subrogante', '-' => '-'],['prompt' => 'Seleccione un rol' ]
    );
    ?>
    

    <?= $form->field($model, 'enviado_por')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Enviado Por',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Enviado Por'        
                                         ]) ?>
    
    
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
        <?= Html::submitButton($model->isNewRecord ? 'Generar Solicitud al DRH' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
