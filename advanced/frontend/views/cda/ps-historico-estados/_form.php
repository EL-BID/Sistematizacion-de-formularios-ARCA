<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsHistoricoEstados */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-historico-estados-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_hisotrico_cproceso')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Hisotrico Cproceso',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Hisotrico Cproceso'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_estado')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'observaciones')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Observaciones',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observaciones'        
                                         ]) ?>

    <?= $form->field($model, 'id_eproceso')->dropDownList(\yii\helpers\ArrayHelper::map(ps_estado_proceso::find()->all(),'id_eproceso','id_eproceso'),['prompt'=>'Indique el valor para id_eproceso']) ?>

    <?= $form->field($model, 'id_cproceso')->dropDownList(\yii\helpers\ArrayHelper::map(ps_cproceso::find()->all(),'id_cproceso','id_cproceso'),['prompt'=>'Indique el valor para id_cproceso']) ?>

    <?= $form->field($model, 'id_usuario')->dropDownList(\yii\helpers\ArrayHelper::map(usuarios_ap::find()->all(),'id_usuario','id_usuario'),['prompt'=>'Indique el valor para id_usuario']) ?>

    <?= $form->field($model, 'id_actividad')->dropDownList(\yii\helpers\ArrayHelper::map(ps_actividad::find()->all(),'id_actividad','id_actividad'),['prompt'=>'Indique el valor para id_actividad']) ?>

    <?= $form->field($model, 'id_tgestion')->dropDownList(\yii\helpers\ArrayHelper::map(ps_tipo_gestion::find()->all(),'id_tgestion','id_tgestion'),['prompt'=>'Indique el valor para id_tgestion']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
