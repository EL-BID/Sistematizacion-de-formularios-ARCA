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
    
    
    <?= $form->field($model, 'id_tfuente')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\cda\CdaTipoFuente::find()->all(),'id_tfuente','nom_tfuente'),['prompt'=>'Seleccione Tipo Fuente']) ?>

    <?= $form->field($model, 'id_subtfuente')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaSubtipoFuente::find()->all(),'id_subtfuente','nom_subtfuente'),['prompt'=>'Seleccione Subtipo Fuente']) ?>

    <?= $form->field($model, 'id_uso_solicitado')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaUsoSolicitado::find()->all(),'id_uso_solicitado','nom_uso_solicitado'),['prompt'=>'Seleccione uso solicitado']) ?>

    <?= $form->field($model, 'id_destino')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaDestino::find()->all(),'id_destino','nom_destino'),['prompt'=>'Seleccione Destino']) ?>

    <?= $form->field($model, 'fuente_solicitada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Fuente Solicitada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Seleccione Fuente Solicitada'        
                                         ]) ?>
    

    <?= $form->field($model, 'id_actividad')->hiddenInput()->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
