<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaReporteInformacion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-reporte-informacion-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>
    
  
    <?= $form->field($model, 'fuente_solicitada')->textInput([
                                    'maxlength' => true,
                                    'title' => 'Indique Fuente Solicitada',
                                    'data-toggle' => 'tooltip',
                                    'placeholder'=>'Indique Fuente Solicitada'        
                                     ]) ?>
    
    <?= $form->field($model, 'id_tfuente')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\cda\CdaTipoFuente::find()->all(),
                                                'id_tfuente','nom_tfuente'),['prompt'=>'Indique Tipo de Fuente']) ?>
    
    <?= $form->field($model2, 'cod_provincia')
                         ->dropDownList(\yii\helpers\ArrayHelper::map($combobox[0],'cod_provincia','nombre_provincia'),
                           ['prompt'=>'Seleccione una provincia',
                          'onchange'=>'$.post("index.php?r=fdubicacion/listado&id='.'"+$(this).val(),function(data){
                              $("#fdubicacion-cod_canton").html(data);
                          });']); ?>
    
    
    <?php
        if(empty($model2->cod_canton)){
            
            echo $form->field($model2, 'cod_canton')->dropDownList([],['prompt'=>'Seleccione un Canton',
                                                        'onchange'=>'$.post("index.php?r=fdubicacion/listadopd&id_prov='.'"+$("#fdubicacion-cod_provincia :selected").val()+"'.'&id='.'"+$(this).val(),function(data){
                                                        var res = data.split("::");
                                                        $("#fdubicacion-cod_parroquia").html(res[1]);
                                                    });']);
        }else{
            
            echo $form->field($model2, 'cod_canton')
                                            ->dropDownList(\yii\helpers\ArrayHelper::map($cantonesPost,'cod_canton','nombre_canton'),['prompt'=>'Seleccione un Canton',
                                                'onchange'=>'$.post("index.php?r=fdubicacion/listadopd&id_prov='.'"+$("#fdubicacion-cod_provincia :selected").val()+"'.'&id='.'"+$(this).val(),function(data){
                                                var res = data.split("::");
                                                 $("#fdubicacion-cod_parroquia").html(res[1]);
                                            });']);
            
        }
    ?>
    
    <?php
        if(empty($model2->cod_provincia) and !empty($model2->cod_canton)){
            
           echo $form->field($model2, 'cod_parroquia')
                                        ->dropDownList([],
                                        ['prompt'=>'Indique la parroquia']);
            
            
        }else{
            
             echo $form->field($model2, 'cod_parroquia')->dropDownList(\yii\helpers\ArrayHelper::map($parroquiasPost,'cod_parroquia','nombre_parroquia'),['prompt'=>'Indique la parroquia']);
        }
    ?>

    <?= $form->field($model, 'sector_solicitado')->textInput([
                                    'maxlength' => true,
                                    'title' => 'Indique Sector Solicitado',
                                    'data-toggle' => 'tooltip',
                                    'placeholder'=>'Indique Sector Solicitado'        
                                     ]) ?>
    
    <?= $form->field($modelCoordenada, 'x')->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "##.#####",]); ?> 
    
    
    <?= $form->field($modelCoordenada, 'y')->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "##.#####",]); ?> 
    
    
    <?= $form->field($modelCoordenada, 'altura')->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "####.##",]); ?> 
    
    <?= $form->field($model, 'abscisa')->textInput([
                                    'maxlength' => true,
                                    'title' => 'Indique Abscisa',
                                    'data-toggle' => 'tooltip',
                                    'placeholder'=>'Indique Abscisa'        
                                     ]) ?>
    
    <?= $form->field($model, 'q_solicitado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Q Solicitado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Q Solicitado'        
                                         ]) ?>
    
    <?= $form->field($model, 'id_uso_solicitado')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaUsoSolicitado::find()->all(),'id_uso_solicitado','nom_uso_solicitado'),['prompt'=>'Indique el valor para id_uso_solicitado']) ?>

    <?= $form->field($model, 'id_destino')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaDestino::find()->all(),'id_destino','nom_destino'),['prompt'=>'Indique el valor para id_destino']) ?>

    <?= $form->field($model, 'proba_excedencia_certificado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Probabilidad Excedencia Certificada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Probabilidad Excedencia Certificada'        
                                         ]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
