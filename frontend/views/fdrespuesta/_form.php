<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model frontend\models\fdrespuesta */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fdrespuesta-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'ra_fecha')->
             widget(DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'ra_check')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique ra_check',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique ra_check'        
                                         ]) ?>

    <?= $form->field($model, 'ra_descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ra_entero')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique ra_entero',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique ra_entero'        
                                         ]) ?>

    <?= $form->field($model, 'ra_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique ra_decimal',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique ra_decimal'        
                                         ]) ?>

    <?= $form->field($model, 'ra_porcentaje')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique ra_porcentaje',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique ra_porcentaje'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_respuesta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_conjunto_respuesta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_conjunto_respuesta'        
                                         ]) ?>

    <?= $form->field($model, 'ra_moneda')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique ra_moneda',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique ra_moneda'        
                                         ]) ?>

    <?= $form->field($model, 'id_pregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_pregunta'        
                                         ]) ?>

    <?= $form->field($model, 'id_opcion_select')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_opcion_select',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_opcion_select'        
                                         ]) ?>

    <?= $form->field($model, 'id_tpregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_tpregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_tpregunta'        
                                         ]) ?>

    <?= $form->field($model, 'id_capitulo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_capitulo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_capitulo'        
                                         ]) ?>

    <?= $form->field($model, 'id_formato')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_formato',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_formato'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_pregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_conjunto_pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_conjunto_pregunta'        
                                         ]) ?>

    <?= $form->field($model, 'id_version')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_version',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_version'        
                                         ]) ?>

    <?= $form->field($model, 'cantidad_registros')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique cantidad_registros',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique cantidad_registros'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
