<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsCproceso */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-cproceso-form aplicativo table-responsive">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'ult_id_eproceso')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ult Id Eproceso',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ult Id Eproceso'        
                                         ]) ?>

    <?= $form->field($model, 'id_proceso')->dropDownList(\yii\helpers\ArrayHelper::map(ps_proceso::find()->all(),'id_proceso','id_proceso'),['prompt'=>'Indique el valor para id_proceso']) ?>

    <?= $form->field($model, 'id_usuario')->dropDownList(\yii\helpers\ArrayHelper::map(usuarios_ap::find()->all(),'id_usuario','id_usuario'),['prompt'=>'Indique el valor para id_usuario']) ?>

    <?= $form->field($model, 'id_modulo')->dropDownList(\yii\helpers\ArrayHelper::map(fd_modulo::find()->all(),'id_modulo','id_modulo'),['prompt'=>'Indique el valor para id_modulo']) ?>

    <?= $form->field($model, 'num_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Quipux',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Quipux'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_registro_quipux')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'asunto_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Asunto Quipux',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Asunto Quipux'        
                                         ]) ?>

    <?= $form->field($model, 'tipo_documento_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Tipo Documento Quipux',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Tipo Documento Quipux'        
                                         ]) ?>

    <?= $form->field($model, 'ult_id_actividad')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ult Id Actividad',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ult Id Actividad'        
                                         ]) ?>

    <?= $form->field($model, 'ult_id_usuario')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ult Id Usuario',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ult Id Usuario'        
                                         ]) ?>

    <?= $form->field($model, 'ult_fecha_actividad')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'ult_fecha_estado')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'numero')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Numero',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Numero'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
