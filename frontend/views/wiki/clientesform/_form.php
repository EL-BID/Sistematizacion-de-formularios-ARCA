<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			//Para la confirmacion, ver archivo web/js/yiioverride
use yii\jui\DatePicker;					//Libreria para el modulo de fechas

/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesform */
/* @var $form yii\widgets\ActiveForm */

SweetSubmitAsset::register($this)
?>

<!--FORMULARIO ---->
<div class="clientesform-form">

    <?php $form = ActiveForm::begin([
                'options' => [
                    'id' => 'create-form'
                ]
    ]); ?>

    <?= $form->field($model, 'name')->textInput([
		'maxlength' => true,
		'title' => 'Tooltip content',
		'data-toggle' => 'tooltip',
		'data-trigger' => 'focus',
		'placeholder'=>'Focus me!'		
        ]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
	
	<?php echo $form->field($model,'birthdate')->
            widget(DatePicker::className(),[
        'dateFormat' => Yii::$app->fmtfechasql,
		'options'=>['size'=>20,'class' => 'form-control'],
        'clientOptions' => [
            'yearRange' => '-90:+0',		//Años habilitados 90 años atras hasta el actual		
            'changeYear' => true,			//Permitir cambio de año
			'changeMonth' => true]			//Permitir cambio de Mes
    ]); ?>


    <?= $form->field($model, 'type')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
