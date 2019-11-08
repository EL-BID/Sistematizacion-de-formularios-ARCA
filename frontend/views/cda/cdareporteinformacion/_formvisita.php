<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use kartik\widgets\DateTimePicker;					/*Libreria para el modulo de fechas*/

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
    
    <?= $form->field($model, 'id_cod_cda')
                        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\cda\PsCodCda::find()
                                                                    ->leftJoin('cda','cda.id_cda = ps_cod_cda.id_cda')
                                                                    ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda.id_cactividad_proceso')    
                                                                    ->where(['id_cproceso'=>$ps_cproceso])->all(),'id_cod_cda','cod_cda'),
                                ['prompt'=>'Seleccione Código CDA']) ?>
    <?php
    echo $form->field($model, 'fecha_visita')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Seleccione fecha y hora'],
            'pluginOptions' => [
                    'language'=> 'es',
                    'autoclose' => true,
                    'format' => Yii::$app->fmtfechahoradatepicker
            ]
        ]);
    ?>
    <?= $form->field($model, 'oficio_visita')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique oficio visita',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Oficio visita'        
                                         ]) ?>
    
    <?= $form->field($model2,  "x")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "######.##",]); ?> 
    
    <?= $form->field($model2,  "y")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "########.##",]); ?> 
    
    <?= $form->field($model2,  "altura")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "####.##",]); ?> 
    
    <?= $form->field($model, 'id_tfuente')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\cda\CdaTipoFuente::find()->all(),'id_tfuente','nom_tfuente'),['prompt'=>'Seleccione Tipo Fuente']) ?>

    <?= $form->field($model, 'id_subtfuente')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaSubtipoFuente::find()->all(),'id_subtfuente','nom_subtfuente'),['prompt'=>'Seleccione Subtipo Fuente']) ?>

    <?= $form->field($model, 'fuente_solicitada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Fuente',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Fuente'        
                                         ]) ?>

    <?= $form->field($model, 'id_uso_solicitado')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaUsoSolicitado::find()->all(),'id_uso_solicitado','nom_uso_solicitado'),['prompt'=>'Seleccione Uso Solicitado']) ?>

    <?= $form->field($model, 'id_destino')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaDestino::find()->all(),'id_destino','nom_destino'),['prompt'=>'Seleccione Destino']) ?>

    <?= $form->field($model, 'id_subdestino')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaSubdestino::find()->all(),'id_subdestino','nom_subdestino'),['prompt'=>'Seleccione SubDestino']) ?>
    
    <?= $form->field($model, 'id_actividad')->hiddenInput()->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
