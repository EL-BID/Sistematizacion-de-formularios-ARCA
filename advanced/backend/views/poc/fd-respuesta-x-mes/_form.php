<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdRespuestaXMes */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-respuesta-xmes-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'ene_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ene Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ene Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'feb_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Feb Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Feb Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'mar_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Mar Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Mar Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'abr_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Abr Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Abr Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'may_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique May Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique May Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'jun_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Jun Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Jun Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'jul_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Jul Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Jul Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'ago_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ago Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ago Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'sep_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sep Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sep Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'oct_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Oct Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Oct Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'nov_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nov Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nov Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'dic_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Dic Decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Dic Decimal'        
                                         ]) ?>

    <?= $form->field($model, 'id_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdRespuesta::find()->all(),'id_respuesta','id_respuesta'),['prompt'=>'Indique el valor para id_respuesta']) ?>

    <?= $form->field($model, 'id_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_pregunta','id_pregunta'),['prompt'=>'Indique el valor para id_pregunta']) ?>

    <?= $form->field($model, 'descripcion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Descripcion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Descripcion'        
                                         ]) ?>

    <?= $form->field($model, 'id_opcion_select')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdOpcionSelect::find()->all(),'id_opcion_select','id_opcion_select'),['prompt'=>'Indique el valor para id_opcion_select']) ?>

    <?= $form->field($model, 'id_respuesta_x_mes')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Respuesta X Mes',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Respuesta X Mes'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    