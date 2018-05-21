<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdInvolucrado */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-involucrado-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_involucrado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Involucrado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Involucrado'        
                                         ]) ?>

    <?= $form->field($model, 'nombre')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombre',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombre'        
                                         ]) ?>

    <?= $form->field($model, 'telefono_convencional')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Telefono Convencional',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Telefono Convencional'        
                                         ]) ?>

    <?= $form->field($model, 'celular')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Celular',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Celular'        
                                         ]) ?>

    <?= $form->field($model, 'correo_electronico')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Correo Electronico',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Correo Electronico'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) ?>

    <?= $form->field($model, 'id_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_pregunta','id_pregunta'),['prompt'=>'Indique el valor para id_pregunta']) ?>

    <?= $form->field($model, 'id_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdRespuesta::find()->all(),'id_respuesta','id_respuesta'),['prompt'=>'Indique el valor para id_respuesta']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
