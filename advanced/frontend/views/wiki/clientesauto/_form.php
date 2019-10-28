<?php
/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesauto */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;						/*Libreria para el modulo de fechas*/
use yii\web\JsExpression;
use yii\jui\AutoComplete;


/*Habilita la funcion register de la ventana de confirmación*/
SweetSubmitAsset::register($this);
?>
<div class="aplicativo">
<div class="clientesauto-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
	
	<!--AUTOCOMPLETE SOLO TEXTO =================================================-->

    <?= $form->field($model, 'ciudad')->widget(AutoComplete::classname(), [
										'clientOptions' => [
											'source'=>$autocomplete2,
											'autoFill'=>true,
											'minLength'=>'2',
										],
										'options'=>[
											'size'=>60,
											'class' => 'form-control',
											'title' =>'Indique una ciudad, a los dos caracteres emitirá un autocomplete',
											'data-toggle' => 'tooltip',
											'data-trigger' => 'focus',
											'placeholder'=>'Focus me!'
										],
									]) ?>
									
	<!--AUTOCOMPLETE CON CODIGO ASOCIADO================================================-->
	
	<label>Ciudad ID</label>
        <?=  AutoComplete::widget([   
						'clientOptions' => [
						'source' => $autocomplete,
						'minLength'=>'3', 
						'autoFill'=>true,
						'select' => new JsExpression("function( event, ui ) {  $('#ciudad2_id').val(ui.item.id); }") 
						],
						'options'=>[
											'size'=>60,
											'class' => 'form-control',
											'title' =>'Indique una ciudad entre Bucaramanga o Bogotá',
											'data-toggle' => 'tooltip',
											'data-trigger' => 'focus',
											'placeholder'=>'Focus me!'
						],
						]);
	
	/**Importante: Este campo oculto es el que pasa el id del elemento seleccionado por el cliente**/
	echo $form->field($model, 'ciudad2_id')->hiddenInput(['id'=>'ciudad2_id','value'=>$model->ciudad2_id])->label(false); ?>
	
	<!--==========================================================================-->

        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
