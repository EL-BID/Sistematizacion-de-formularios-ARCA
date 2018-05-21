<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaReporteInformacion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-reporte-informacion-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>
    
    <?= $form->field($model, 'id_cda')->hiddenInput()->label(false) ?>
    
    <?= $form->field($modelCoordenada, 'longitud')->textInput([
                                    'maxlength' => true,
                                    'title' => 'Indique Longitud',
                                    'data-toggle' => 'tooltip',
                                    'placeholder'=>'Indique Longitud'        
                                     ]) ?>
    <?= $form->field($modelCoordenada, 'latitud')->textInput([
                                    'maxlength' => true,
                                    'title' => 'Indique Latitud',
                                    'data-toggle' => 'tooltip',
                                    'placeholder'=>'Indique Latitud'        
                                     ]) ?>
    <?= $form->field($modelCoordenada, 'altura')->textInput([
                                    'maxlength' => true,
                                    'title' => 'Indique Altura',
                                    'data-toggle' => 'tooltip',
                                    'placeholder'=>'Indique Altura'        
                                     ]) ?>
    
    <?= $form->field($model, 'abscisa')->textInput([
                                    'maxlength' => true,
                                    'title' => 'Indique Abscisa',
                                    'data-toggle' => 'tooltip',
                                    'placeholder'=>'Indique Abscisa'        
                                     ]) ?>
    
    <?= $form->field($model, 'q_solicitado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Q Solicitado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Q Solicitado'        
                                         ]) ?>
    
    <?= $form->field($model, 'id_tfuente')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\cda\CdaTipoFuente::find()->all(),'id_tfuente','nom_tfuente'),['prompt'=>'Indique Fuente SENAGUA']) ?>


    <?= $form->field($model, 'id_uso_solicitado')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaUsoSolicitado::find()->all(),'id_uso_solicitado','nom_uso_solicitado'),['prompt'=>'Indique el valor para id_uso_solicitado']) ?>

    <?= $form->field($model, 'id_destino')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaDestino::find()->all(),'id_destino','nom_destino'),['prompt'=>'Indique el valor para id_destino']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
