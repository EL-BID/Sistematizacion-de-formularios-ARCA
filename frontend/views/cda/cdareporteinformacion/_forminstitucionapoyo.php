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
                                ['prompt'=>'Seleccione Codigo CDA']) ?>

    
    <?= $form->field($model2,  "x")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "######.##",]); ?> 
    
    <?= $form->field($model2,  "y")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "########.##",]); ?> 
    
    <?= $form->field($model2,  "altura")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "####.##",]); ?> 
    
    
   

    <?= $form->field($model, 'abscisa')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Abscisa',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Abscisa'        
                                         ]) ?>
    
    <?= $form->field($model, 'fuente_solicitada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Fuente',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Fuente'        
                                         ]) ?>
    
    <?= $form->field($model, 'q_solicitado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Q en l/s',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Q en l/s'        
                                         ]) ?>

    <?= $form->field($model, 'id_uso_solicitado')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaUsoSolicitado::find()->all(),'id_uso_solicitado','nom_uso_solicitado'),['prompt'=>'Indique el valor para Uso Solicitado']) ?>

    <?= $form->field($model, 'id_destino')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaDestino::find()->all(),'id_destino','nom_destino'),['prompt'=>'Indique el valor para Destino']) ?>
    
    <?= $form->field($model, 'id_subdestino')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaSubdestino::find()->all(),'id_subdestino','nom_subdestino'),['prompt'=>'Indique el valor para SubDestino']) ?>

    <?php //$form->field($model, 'institucion_apoyo_otros')->textInput([
//                                        'maxlength' => true,
//                                        'title' => 'Indique Institucion',
//                                        'data-toggle' => 'tooltip',
//                                        'placeholder'=>'Indique Institucion'        
//                                         ]) ?>
 
    <?= $form->field($model, 'id_actividad')->hiddenInput()->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
