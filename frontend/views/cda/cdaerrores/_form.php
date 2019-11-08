<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaErrores */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-errores-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_cod_cda')
                        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\cda\PsCodCda::find()
                                                                    ->leftJoin('cda','cda.id_cda = ps_cod_cda.id_cda')
                                                                    ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda.id_cactividad_proceso')    
                                                                    ->where(['id_cproceso'=>$ps_cproceso])->all(),'id_cod_cda','cod_cda'),
                                ['prompt'=>'Seleccione Código CDA']) ?>
    
    <?php echo $form->field($model, 'tipoerror')->checkboxList(
			$listadoerrores)
                        ->label("Tipos de errores: Seleccione los errores")
    ?>

    
    <?= $form->field($model, 'observaciones')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Observaciones',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observaciones Corrección Error'        
                                         ]) ?>

   
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
   $('#cdaerrores-tipoerror').change(function(){
        $('input[name="CdaErrores[tipoerror][]"]:checked').each(function() {
            if(this.value == 7 ){
                if($(this).is(':checked')){
                    $('input[type=checkbox]').attr('disabled',true);
                    $(this).attr('disabled',false);
                }else{
                    $('input[type=checkbox]').attr('disabled',false);
                }
            }    
        });
      
    })
JS;
$this->registerJs($script);
?>

