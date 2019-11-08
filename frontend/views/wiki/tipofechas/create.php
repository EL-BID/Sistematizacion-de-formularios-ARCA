<?php
use yii\helpers\Html;					//Libreria para las etiquetas HTML
use yii\widgets\ActiveForm;				//Libreria para el envio del formulario y relacionar con la validacion
use yii\jui\DatePicker;					//Libreria para el modulo de fechas
?>

<h1>Validar Formulario</h1>
<?php $form = ActiveForm::begin([
    "method" => "post",
	"enableClientValidation" => true,
]);
?>

<div class="form-group">
 <!--Tipos de Formatos de Fecha:
		MM/dd/yy
		yy/MM/dd
		dd/MM/yyyy -->
 
 
 <!--Modelo DatePicker con formato para fecha -->
 <?php echo $form->field($model,'dato')->
    widget(DatePicker::className(),[
       'dateFormat' => Yii::$app->fmtfechasql,
        'clientOptions' => [
            'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
            'changeYear' => true,			//Permitir cambio de año
			'changeMonth' => true]			//Permitir cambio de Mes
    ]); ?>
	
	
 <!--Modelo DatePicker con formato para fecha para validar fecha maxima -->
 <?php echo $form->field($model,'dato2')->
    widget(DatePicker::className(),[
        'dateFormat' => Yii::$app->fmtfechasql,
        'clientOptions' => [
			'minDate'	=> '01/01/2017',	//Fecha Minima permitida para seleccionar en el calendario
            'changeYear' => true,			//Permitir cambio de año
			'changeMonth' => true]			//Permitir cambio de Mes
    ]); ?>
	
	
 <!--Modelo DatePicker con formato para fecha para validar fecha minima -->
 <?php echo $form->field($model,'dato3')->
    widget(DatePicker::className(),[
      'dateFormat' => Yii::$app->fmtfechasql,
        'clientOptions' => [
            'yearRange' => '-1:+0',			//Años habilitados 1 años atras hasta el actual
			'maxDate'	=> '01/03/2017',	//Fecha Maxima permitida para seleccionar en el calendario	
            'changeYear' => true,			//Permitir cambio de año
			'changeMonth' => true]			//Permitir cambio de Mes
    ]); ?>
	
</div>   



<?= Html::submitButton("Enviar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>

<?= $msg; ?>