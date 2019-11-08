<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdHistoricoRespuesta */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-historico-respuesta-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_historico_respuesta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Historico Respuesta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Historico Respuesta'        
                                         ]) ?>

    <?= $form->field($model, 'observaciones')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Observaciones',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observaciones'        
                                         ]) ?>

    <?= $form->field($model, 'fecha')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'usuario')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Usuario',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Usuario'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) ?>

    <?= $form->field($model, 'id_adm_estado')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdAdmEstado::find()->all(),'id_adm_estado','id_adm_estado'),['prompt'=>'Indique el valor para id_adm_estado']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
