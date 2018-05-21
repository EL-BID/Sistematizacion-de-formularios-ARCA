<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsCactividadProceso */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-cactividad-proceso-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'observacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Observacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observacion'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_realizacion')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'fecha_prevista')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'numero_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Numero Quipux',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Numero Quipux'        
                                         ]) ?>

    <?= $form->field($model, 'id_cproceso')->dropDownList(\yii\helpers\ArrayHelper::map(ps_cproceso::find()->all(),'id_cproceso','id_cproceso'),['prompt'=>'Indique el valor para id_cproceso']) ?>

    <?= $form->field($model, 'id_usuario')->dropDownList(\yii\helpers\ArrayHelper::map(usuarios_ap::find()->all(),'id_usuario','id_usuario'),['prompt'=>'Indique el valor para id_usuario']) ?>

    <?= $form->field($model, 'id_actividad')->dropDownList(\yii\helpers\ArrayHelper::map(ps_actividad::find()->all(),'id_actividad','id_actividad'),['prompt'=>'Indique el valor para id_actividad']) ?>

    <?= $form->field($model, 'fecha_creacion')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'diligenciado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Diligenciado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Diligenciado'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
