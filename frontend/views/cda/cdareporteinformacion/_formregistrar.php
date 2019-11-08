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
    
    <?= $form->field($model, 'id_cod_cda')
                        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\cda\PsCodCda::find()
                                                                    ->leftJoin('cda','cda.id_cda = ps_cod_cda.id_cda')
                                                                    ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso = cda.id_cactividad_proceso')    
                                                                    ->where(['id_cproceso'=>$ps_cproceso])->all(),'id_cod_cda','cod_cda'),
                                ['prompt'=>'Seleccione Código CDA']) ?>

    
    <?= $form->field($model2,  "x")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "######.##",]); ?> 
    
    <?= $form->field($model2,  "y")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "########.##",]); ?> 
    
    <?= $form->field($model2,  "altura")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "####.##",]); ?> 
    
    
    <?= $form->field($model, 'abscisa')->textInput([
                                        'maxlength' => true,
                                        'title' => 'abscisa',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Abscisa'        
                                         ]) ?>
    
     <?= $form->field($model3, 'cod_provincia')
                        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(),'cod_provincia','nombre_provincia'),
                                ['prompt'=>'Indique la provincia','onchange' => '
                                $.post("index.php?r=site/actualiza-canton&cod_provincia=' . '"+$(this).val(),function(data){
                                  $("select#fdubicacion-cod_canton").html(data);
                                });']) 
     ?>
    
    <?php
        
        if(!empty($model3->cod_provincia)){
            $busqueda_can = \yii\helpers\ArrayHelper::map(\common\models\autenticacion\Cantones::find()->where(['cod_provincia'=>$model3->cod_provincia])->all(),'cod_canton','nombre_canton');
        }else{
            $busqueda_can = \yii\helpers\ArrayHelper::map(\common\models\autenticacion\Cantones::find()->all(),'cod_canton','nombre_canton');
        }
    
        echo $form->field($model3, 'cod_canton')
                    ->dropDownList($busqueda_can,
                            ['prompt'=>'Indique el canton','onchange' => '
                            $.post(\'index.php?r=site/actualiza-parroquia&cod_canton=' . '\'+$(this).val()+\'&cod_provincia=\'' . '+$(\'select#fdubicacion-cod_provincia\').val(),function(data){
                              $(\'select#fdubicacion-cod_parroquia\').html(data);
                            });']) 
    ?>
    
    <?php
    
       if(!empty($model3->cod_provincia) and !empty($model3->cod_canton)){
            $busqueda_par = \yii\helpers\ArrayHelper::map(\common\models\autenticacion\Parroquias::find()->where(['cod_provincia'=>$model3->cod_provincia,'cod_canton'=>$model3->cod_canton])->all(),'cod_parroquia','nombre_parroquia');
        }else{
            $busqueda_par = \yii\helpers\ArrayHelper::map(\common\models\autenticacion\Parroquias::find()->all(),'cod_parroquia','nombre_parroquia');
        }
        
        echo $form->field($model3, 'cod_parroquia')->dropDownList($busqueda_par,['prompt'=>'Seleccione la parroquia']);
    ?>

    <?= $form->field($model, 'sector_solicitado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sector Certificado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sector Solicitado'        
                                         ]) ?>
    
    <?= $form->field($model, 'fuente_solicitada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Fuente Certificada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Fuente Certificada'        
                                         ]) ?>
    
    <?= $form->field($model, 'id_tfuente')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\cda\CdaTipoFuente::find()->all(),'id_tfuente','nom_tfuente'),['prompt'=>'Indique el valor para Tipo Fuente']) ?>

    <?= $form->field($model, 'q_solicitado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Q Certificado en l/s',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Q Certificado en l/s'        
                                         ]) ?>

    <?= $form->field($model, 'id_uso_solicitado')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaUsoSolicitado::find()->all(),'id_uso_solicitado','nom_uso_solicitado'),['prompt'=>'Seleccione Uso Solicitado']) ?>

    <?= $form->field($model, 'id_destino')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaDestino::find()->all(),'id_destino','nom_destino'),['prompt'=>'Seleccione Destino']) ?>
    
    <?= $form->field($model, 'id_subdestino')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaSubdestino::find()->all(),'id_subdestino','nom_subdestino'),['prompt'=>'Seleccione SubDestino']) ?>


    <?= $form->field($model, 'proba_excedencia_certificado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Probabilidad Excedencia Certificada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Probabilidad Excedencia Certificada'        
                                         ]) ?>
    

    <?= $form->field($model, 'id_actividad')->hiddenInput()->label(false); ?>
  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
