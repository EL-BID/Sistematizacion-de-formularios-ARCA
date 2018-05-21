<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			//Para la confirmacion, ver archivo web/js/yiioverride
use yii\jui\DatePicker;						//Libreria para el modulo de fechas

SweetSubmitAsset::register($this)
?>


<div class="clientesform-form">

    <?php $form = ActiveForm::begin([
                'options' => [
                    'id' => 'create-form'
                ]
    ]); ?>

	<table>
		<tr>
			<td style="padding: 2px 5px;">
				<?= $form->field($model, 'name')->textInput(['maxlength' => true,'size'=>20,'autofocus' => 'autofocus', 'tabindex' => '1']) ?>
			</td>
			<td style="padding: 2px 5px;">
				<?= $form->field($model, 'lastname')->textInput(['maxlength' => true,'size'=>20,'autofocus' => 'autofocus', 'tabindex' => '3']) ?>
			</td>
			<td>
		</tr>
		<tr>
			<td style="padding: 2px 5px;"> 
				<?php echo $form->field($model,'birthdate')->
				widget(DatePicker::className(),[
					'dateFormat' => Yii::$app->fmtfechasql,
					'options'=>['size'=>20,'autofocus' => 'autofocus', 'tabindex' => '2','class' => 'form-control'],
					'clientOptions' => [
						'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
						'changeYear' => true,			//Permitir cambio de año
						'changeMonth' => true]			//Permitir cambio de Mes
				]); ?>
			</td>
			<td style="padding: 2px 5px;">
				<?= $form->field($model, 'type')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '','autofocus' =>'autofocus', 'tabindex' => '4' ]) ?>
			</td>
		</tr>
		<tr>
		<td>
			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
		</td>
		</tr>
	</table>


    <?php ActiveForm::end(); ?>

</div>