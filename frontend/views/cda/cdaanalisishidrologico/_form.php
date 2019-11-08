<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaAnalisisHidrologico */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-analisis-hidrologico-form">

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
    
    
    <?= $form->field($model, 'id_cartografia')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaCartografia::find()->all(),'id_cartografia','nom_cartografia'),['prompt'=>'Seleccione cartografía']) ?>

    <?= $form->field($model, 'id_ehidrografica')->dropDownList(
                                                        \yii\helpers\ArrayHelper::map(
                                                        common\models\cda\CdaEstacionHidrologica::find()->all(),'id_ehidrografica','cod_ehidrografica_base'),
                                                   ['prompt'=>'Selecciones estado Hidrologica','onchange' => '
                                                    $.post("index.php?r=cda/cdaanalisishidrologico/nomhidrografica&idehidrografica=' . '"+$(this).val(),function(data){
                                                      $("#cdaanalisishidrologico-nom_ehidrografica").val(data);
                                                    });']     
                                                ) ?>
    
    <?= $form->field($model, 'nom_ehidrografica')->textInput([
                                                    'maxlength' => true,
                                                    'title' => 'Estación Hidrográfica',
                                                    'data-toggle' => 'tooltip',
                                                    'placeholder'=>'Estación Hidrográfica',
                                                    'readonly' => true
                                                     ]) ?>

    <?= $form->field($model, 'id_emeteorologica')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaEstacionMeteorologica::find()->all(),'id_emeteorologica','cod_emeteorologica_base'),
                                                    ['prompt'=>'Seleccione estación meteorológica','onchange' => '
                                                    $.post("index.php?r=cda/cdaanalisishidrologico/nommeteorlogica&id=' . '"+$(this).val(),function(data){
                                                      $("#cdaanalisishidrologico-nom_emeteorologica").val(data);
                                                    });']) ?>
    
    <?= $form->field($model, 'nom_emeteorologica')->textInput([
                                                    'maxlength' => true,
                                                    'title' => 'Estación meteorológica',
                                                    'data-toggle' => 'tooltip',
                                                    'placeholder'=>'Estación meteorológica',
                                                    'readonly' => true
                                                     ]) ?>

    <?= $form->field($model, 'id_metodologia')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaMetodologia::find()->all(),'id_metodologia','nom_metodologia'),['prompt'=>'Seleccione metodología']) ?>

    <?= $form->field($model, 'informe_utilizado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Informe Utilizado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Informe Utilizado'        
                                         ]) ?>

    <?= $form->field($model, 'probabilidad')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Probabilidad',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Probabilidad'        
                                         ]) ?>

    <?= $form->field($model, 'observacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Observacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observación'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
