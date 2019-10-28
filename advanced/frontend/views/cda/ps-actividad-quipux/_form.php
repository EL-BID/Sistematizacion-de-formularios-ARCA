<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsActividadQuipux */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-actividad-quipux-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_actividad_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Actividad Quipux',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Actividad Quipux'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_actividad_quipux')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'usuario_actual_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Usuario Actual Quipux',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Usuario Actual Quipux'        
                                         ]) ?>

    <?= $form->field($model, 'accion_realizada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Accion Realizada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Accion Realizada'        
                                         ]) ?>

    <?= $form->field($model, 'descripcion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Descripcion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Descripcion'        
                                         ]) ?>

    <?= $form->field($model, 'estado_actual')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Estado Actual',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Estado Actual'        
                                         ]) ?>

    <?= $form->field($model, 'numero_referencia')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Numero Referencia',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Numero Referencia'        
                                         ]) ?>

    <?= $form->field($model, 'usuario_origen_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Usuario Origen Quipux',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Usuario Origen Quipux'        
                                         ]) ?>

    <?= $form->field($model, 'usuario_destino_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Usuario Destino Quipux',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Usuario Destino Quipux'        
                                         ]) ?>

    <?= $form->field($model, 'respondido_a')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Respondido A',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Respondido A'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_carga')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'id_cproceso')->dropDownList(\yii\helpers\ArrayHelper::map(ps_cproceso::find()->all(),'id_cproceso','id_cproceso'),['prompt'=>'Indique el valor para id_cproceso']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
