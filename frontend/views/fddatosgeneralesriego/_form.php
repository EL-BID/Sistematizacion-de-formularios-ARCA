<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDatosGeneralesRiego */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-datos-generales-riego-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'nombres_prestador_servicio')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombres Prestador Servicio',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombres Prestador Servicio'        
                                         ]) ?>

    <?= $form->field($model, 'direccion_oficinas')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Direccion Oficinas',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Direccion Oficinas'        
                                         ]) ?>

    <?= $form->field($model, 'nombres_apellidos_replegal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombres Apellidos Replegal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombres Apellidos Replegal'        
                                         ]) ?>

    <?= $form->field($model, 'posee_convencional')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Posee Convencional',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Posee Convencional'        
                                         ]) ?>

    <?= $form->field($model, 'num_convencional')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Convencional',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Convencional'        
                                         ]) ?>

    <?= $form->field($model, 'num_celular')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Celular',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Celular'        
                                         ]) ?>

    <?= $form->field($model, 'num_celular_otro')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Celular Otro',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Celular Otro'        
                                         ]) ?>

    <?= $form->field($model, 'posee_email')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Posee Email',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Posee Email'        
                                         ]) ?>

    <?= $form->field($model, 'correo_electronico')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Correo Electronico',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Correo Electronico'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
