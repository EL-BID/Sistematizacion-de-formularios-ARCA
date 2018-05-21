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
 <?= $form->field($model, "name")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "lastname")->input("text") ?>   
</div>

<div class="form-group">
<?= $form->field($model, 'moneda')->widget(\yii\widgets\MaskedInput::className(), [
        'clientOptions' => [
        'alias' => 'decimal',
        'groupSeparator' => ',',
        'autoGroup' => true,
        'removeMaskOnSubmit' => true
        ]
]);
?>
</div>   

<?= Html::submitButton("Enviar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>

<?= $msg; ?>