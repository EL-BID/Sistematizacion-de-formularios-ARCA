<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

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

    <?= ($visible['fecha_realizacion']==TRUE)? $form->field($model, 'fecha_realizacion')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
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
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'options'=>[
                    'disabled'=>$disabled['fecha_prevista']
                ],
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
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

    <?= $form->field($model, 'id_usuario')->dropDownList(\yii\helpers\ArrayHelper::map
                                            ($listusuarios,'id_usuario','nombres'),['prompt'=>'Seleccione un Usuario',
                                                'disabled' => $disabled['id_usuario']]) ?>

    <?= ($visible['dias_pausa']==TRUE)? $form->field($model, 'dias_pausa')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Dias de Pausa',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Dias de Pausa',
                                        'disabled' => $disabled['dias_pausa']
                                         ]):'' ?>
    
    <?= $form->field($model, 'id_opc_tselect')->dropDownList(\yii\helpers\ArrayHelper::map($listcausal,'id_opc_tselect','nom_opc_tselect'),
                                ['prompt'=>'Seleccione una causal','disabled' => $disabled['id_opc_tselect']]) ?>
    
     <?= $form->field($model, 'otro_cuales')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Otra Causal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Otra Causal', 
                                        'disabled' => true
                                         ]) ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$this->registerJs("
$(function(){
   $('#pscactividadproceso-id_opc_tselect').change(function(){
        getDisabled(this.value); 
    });
   function getDisabled(value) {
      if(value == '6'){
        $('#pscactividadproceso-otro_cuales').removeAttr('disabled');
      }else{
        $('#pscactividadproceso-otro_cuales').attr('disabled', 'disabled');  
      }
  }
  });
");
        
?>