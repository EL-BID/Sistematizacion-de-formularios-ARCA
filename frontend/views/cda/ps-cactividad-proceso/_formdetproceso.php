<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsCactividadProceso */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-cactividad-proceso-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>
    
    
    <?= ($visible['observacion']==TRUE)? $form->field($model, 'observacion')->textarea([
                                        'maxlength' => true,
                                        'title' => 'Indique Observacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observacion',
                                        'disabled' => $disabled['observacion']
                                         ]):'' ?>
    
    <?= ($visible['puntos']==TRUE)? $form->field($model, 'puntos')->textarea([
                                        'maxlength' => true,
                                        'title' => 'Indique Puntos',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Puntos',
                                        'disabled' => $disabled['puntos']
                                         ]):'' ?>

    <?= ($visible['fecha_realizacion']==TRUE)? $form->field($model, 'fecha_realizacion')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                'options'=>[
                    'disabled'=>$disabled['fecha_realizacion']
                ],
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]):'' ?>

    <?= ($visible['fecha_prevista']==TRUE)? $form->field($model, 'fecha_prevista')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                'options'=>[
                    'disabled'=>$disabled['fecha_prevista']
                ],
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual
                    'minDate' => 'today',           //fecha minima de ingreso
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]):'' ?>

    <?= ($visible['numero_quipux']==TRUE)? $form->field($model, 'numero_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Numero Quipux',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Numero Quipux',
                                        'disabled' => $disabled['numero_quipux']
                                         ]):'' ?>

  
    <?= ($visible['dias_pausa']==TRUE)? $form->field($model, 'dias_pausa')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Dias de Pausa',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Dias de Pausa',
                                        'disabled' => $disabled['dias_pausa']
                                         ]):'' ?>
    
    <?= ($visible['id_opc_tselect'] == TRUE)? $form->field($model, 'id_opc_tselect')->dropDownList(\yii\helpers\ArrayHelper::map($listcausal,'id_opc_tselect','nom_opc_tselect'),
                                ['prompt'=>'Seleccione una causal','disabled' => $disabled['id_opc_tselect']]):'' ?>
    
     <?= ($visible['id_opc_tselect'] == TRUE)? $form->field($model, 'otro_cuales')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Otra Causal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Otra Causal', 
                                        'disabled' => true
                                         ]):'' ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$_ulrsend = Url::toRoute('cda/ps-cactividad-proceso/esotra', true);

$this->registerJs("
$(function(){
   $('#pscactividadprocesodinamico-id_opc_tselect').change(function(){
        getDisabled(this.value); 
    });
    
    $('#pscactividadproceso-id_opc_tselect').change(function(){
        getDisabled2(this.value); 
    });

   function getDisabled(value) {
        
      //Averiguando valor en campo es_otra ===================//
      $.ajax({
       url: '$_ulrsend',
       type: 'get',
       data: {
                 id_opc_select: value 
             },
        success: function (data) {
            if(value == '6'){
                $('#pscactividadprocesodinamico-otro_cuales').removeAttr('disabled');
            }else if(data == 'S'){
                 $('#pscactividadprocesodinamico-otro_cuales').removeAttr('disabled');
            }else{
                $('#pscactividadprocesodinamico-otro_cuales').attr('disabled', 'disabled');  
            }
        }
       });

     
  }
  

    function getDisabled2(value) {
        
      //Averiguando valor en campo es_otra ===================//
      $.ajax({
       url: '$_ulrsend',
       type: 'get',
       data: {
                 id_opc_select: value 
             },
        success: function (data) {
            if(value == '6'){
                $('#pscactividadproceso-otro_cuales').removeAttr('disabled');
            }else if(data == 'S'){
                 $('#pscactividadproceso-otro_cuales').removeAttr('disabled');
            }else{
                $('#pscactividadproceso-otro_cuales').attr('disabled', 'disabled');  
            }
        }
       });
    } 

  });
");
        
?>