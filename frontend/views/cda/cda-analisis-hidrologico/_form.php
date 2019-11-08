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


    <?= $form->field($model, 'id_cartografia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\cda\CdaCartografia::find()->all(),'id_cartografia','id_cartografia'),['prompt'=>'Indique el valor para id_cartografia']) ?>

    <?= $form->field($model, 'id_ehidrografica')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\cda\CdaEstacionHidrologica::find()->all(),'id_ehidrografica','id_ehidrografica'),['prompt'=>'Indique el valor para id_ehidrografica']) ?>

    <?= $form->field($model, 'id_emeteorologica')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaEstacionMeteorologica::find()->all(),'id_emeteorologica','id_emeteorologica'),['prompt'=>'Indique el valor para id_emeteorologica']) ?>

    <?= $form->field($model, 'id_metodologia')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaMetodologia::find()->all(),'id_metodologia','id_metodologia'),['prompt'=>'Indique el valor para id_metodologia']) ?>
    
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
                                        'placeholder'=>'Indique Observacion'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
