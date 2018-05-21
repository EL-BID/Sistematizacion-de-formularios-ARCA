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
    
        
    <?= $form->field($model, 'fuente_solicitada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Fuente Solicitada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Fuente Solicitada'        
                                         ]) ?>
    
    <?= $form->field($model, 'id_tfuente')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\cda\CdaTipoFuente::find()->all(),'id_tfuente','nom_tfuente'),['prompt'=>'Indique el valor para Tipo Fuente']) ?>

    <?= $form->field($modelUbicacion, 'cod_provincia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(),'cod_provincia','nombre_provincia'),['prompt'=>'Indique la provincia','onchange' => '
    $.post("index.php?r=site/actualiza-canton&cod_provincia=' . '"+$(this).val(),function(data){
      $("select#fdubicacion-cod_canton").html(data);
    });']) ?>
    <?= $form->field($modelUbicacion, 'cod_canton')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Cantones::find()->all(),'cod_canton','nombre_canton'),['prompt'=>'Indique el canton','onchange' => '
    $.post(\'index.php?r=site/actualiza-parroquia&cod_canton=' . '\'+$(this).val()+\'&cod_provincia=\'' . '+$(\'select#fdubicacion-cod_provincia\').val(),function(data){
      $(\'select#fdubicacion-cod_parroquia\').html(data);
    });']) ?>
    <?= $form->field($modelUbicacion, 'cod_parroquia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Parroquias::find()->all(),'cod_parroquia','nombre_parroquia'),['prompt'=>'Indique la parroquia']) ?>

    <?= $form->field($model, 'sector_solicitado')->textInput([
                                    'maxlength' => true,
                                    'title' => 'Indique Sector Solicitado',
                                    'data-toggle' => 'tooltip',
                                    'placeholder'=>'Indique Sector Solicitado'        
                                     ]) ?>
    
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
                                        'title' => 'Indique Q Solicitado en l/s',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Q Solicitado en l/s'        
                                         ]) ?>

    <?= $form->field($model, 'id_uso_solicitado')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaUsoSolicitado::find()->all(),'id_uso_solicitado','nom_uso_solicitado'),['prompt'=>'Indique el valor para Uso Solicitado']) ?>

    <?= $form->field($model, 'id_destino')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaDestino::find()->all(),'id_destino','nom_destino'),['prompt'=>'Indique el valor para Destino']) ?>

    <?= $form->field($model, 'proba_excedencia_certificado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Probabilidad de excedencia certificado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Probabilidad de excedencia certificado'        
                                         ]) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
