<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

//Tooltip en una imagen======================================================================

$url='@web/images/icono.jpg';
$url2='http://google.com';


$viewimage=Html::img($url,[
			'alt'=>'',
			'width'=>'30',
			'height'=>'30']);

echo Html::a( $viewimage, $url, [
								'title' => 'Indique el nombre completo',
								'data-toggle' => 'tooltip',
								] );

								
//Tooltip en formularios==========================================================	

$form = ActiveForm::begin(['options' => 			[
                    'id' => 'create-form'
				]
                ]); 						
?>								


 <?= $form->field($model, 'name')->textInput([
										'maxlength' => true,
										'title' => 'Indique el nombre completo',
										'data-toggle' => 'tooltip',
										'placeholder'=>'Focus me!'		
										 ]) ?>
										 

 <?php echo $form->field($model,'birthdate')->
    widget(DatePicker::className(),[
        'dateFormat' => Yii::$app->fmtfechasql,	//Formato de la fecha
		'options'=>[
					'size'=>20,
					'class' => 'form-control',
					'title' =>'Agregue una fecha Ejemplo 2017-01-01',
					'data-toggle' => 'tooltip',
					'data-trigger' => 'focus',
					'placeholder'=>'Focus me!'
					],
        'clientOptions' => [
            'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
            'changeYear' => true,			//Permitir cambio de año
			'changeMonth' => true]			//Permitir cambio de Mes
    ]); ?>
	
 <?= $form->field($model, 'type')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '','title'=>'Seleccione un estado','data-toggle' => 'tooltip','data-trigger' => 'focus']); 
 
 
 ActiveForm::end(); ?>
