<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsActividad */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-actividad-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_actividad')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Actividad',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Actividad'        
                                         ]) ?>

    <?= $form->field($model, 'nom_actividad')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Actividad',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Actividad'        
                                         ]) ?>

    <?= $form->field($model, 'orden')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Orden',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Orden'        
                                         ]) ?>

    <?= $form->field($model, 'id_proceso')->dropDownList(\yii\helpers\ArrayHelper::map(ps_proceso::find()->all(),'id_proceso','id_proceso'),['prompt'=>'Indique el valor para id_proceso']) ?>

    <?= $form->field($model, 'id_tactividad')->dropDownList(\yii\helpers\ArrayHelper::map(ps_tipo_actividad::find()->all(),'id_tactividad','id_tactividad'),['prompt'=>'Indique el valor para id_tactividad']) ?>

    <?= $form->field($model, 'subpantalla')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Subpantalla',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Subpantalla'        
                                         ]) ?>

    <?= $form->field($model, 'id_tselect')->dropDownList(\yii\helpers\ArrayHelper::map(ps_tipo_select::find()->all(),'id_tselect','id_tselect'),['prompt'=>'Indique el valor para id_tselect']) ?>

    <?= $form->field($model, 'id_clasif_actividad')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Clasif Actividad',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Clasif Actividad'        
                                         ]) ?>

    <?= $form->field($model, 'plazo_alerta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Plazo Alerta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Plazo Alerta'        
                                         ]) ?>

    <?= $form->field($model, 'campo_fecha_alerta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Campo Fecha Alerta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Campo Fecha Alerta'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
