<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\wiki\Clientes;
?>

<h1>Validar Formulario</h1>
<?php $form = ActiveForm::begin([
    "method" => "post",
	'enableClientValidation' => false,
]);
?>
<div class="form-group">
 
 <?=  $form->field($model, "id_cliente")->dropDownList(
		ArrayHelper:: map(clientes::find()->all(),'Id','name'),
		['prompt'=>'Seleccione un cliente']
		)?>
</div>

<div class="form-group">
 <?= $form->field($model, 'comentario')->widget(\yii\redactor\widgets\Redactor::className(), [
    'clientOptions' => [
		'lang' => 'es',
	    'plugins' => ['clips', 'fontcolor','imagemanager']
    ]
  ])?>
</div>

<?= Html::submitButton("Enviar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>