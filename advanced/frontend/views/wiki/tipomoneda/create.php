<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Validar Formulario</h1>
<?php $form = ActiveForm::begin([
    "method" => "post",
	"enableClientValidation" => true,
]);
?>
<div class="form-group">
 <?= $form->field($model, "dato1")->input("text") ?>   	<!--Validará tipo moneda separador .-->
 <?= $form->field($model, "dato2")->input("text") ?> 	<!--Validará tipo moneda separador ,-->
</div>


<?= Html::submitButton("Enviar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>

<?= $msg; ?>