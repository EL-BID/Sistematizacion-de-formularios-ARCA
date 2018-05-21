<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesprueba */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="clientesprueba-form">

    <?php $form = ActiveForm::begin(['options' => 			[
                    'id' => 'create-form'
				]
                ]); ?>
	
	

    <?= $form->field($model, 'name')->textInput([
										'maxlength' => true,
										'title' => 'Indique el nombre completo',
										'data-toggle' => 'tooltip',
										'data-trigger' => 'focus',
										'placeholder'=>'Focus me!'		
										 ]) ?>

    <?= $form->field($model, 'lastname')->textInput([
											'maxlength' => true,
											'title' => 'Indique apellidos completos',
											'data-toggle' => 'tooltip',
											'data-trigger' => 'focus',
											'placeholder'=>'Focus me!']) ?>

	<!--A continuacion se modificaran los campos de fechas con el modulo personalizado DatePicker-->
	
    <!--<?= $form->field($model, 'birthdate')->textInput() ?>

    <?= $form->field($model, 'createdate')->textInput() ?>-->
	
	
	<!--Se reemplazan por -->
	
	<?php echo $form->field($model,'birthdate')->
    widget(DatePicker::className(),[
       'dateFormat' => Yii::$app->fmtfechasql,
		'options'=>[
					'size'=>20,
					'class' => 'form-control',
					'title' =>'Agregue una fecha Ejemplo',
					'data-toggle' => 'tooltip',
					'data-trigger' => 'focus',
					'placeholder'=>'Focus me!'
					],
        'clientOptions' => [
            'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
            'changeYear' => true,			//Permitir cambio de año
			'changeMonth' => true]			//Permitir cambio de Mes
    ]); ?>
	
	<?php echo $form->field($model,'createdate')->
    widget(DatePicker::className(),[
        'dateFormat' => Yii::$app->fmtfechasql,
		'options'=>[
					'size'=>20,
					'class' => 'form-control',
					'title' =>'Agregue una fecha Ejemplo 2017-01-01',
					'data-toggle' => 'tooltip',
					'data-trigger' => 'focus',
					'placeholder'=>'Focus me!'],
        'clientOptions' => [
            'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
            'changeYear' => true,			//Permitir cambio de año
			'changeMonth' => true]			//Permitir cambio de Mes
    ]); ?>

    <?= $form->field($model, 'type')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '','title'=>'Seleccione un estado','data-toggle' => 'tooltip','data-trigger' => 'focus']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
