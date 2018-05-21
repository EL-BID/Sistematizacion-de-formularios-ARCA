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
    
        
    <?= $form->field($model, 'observaciones_decision')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique la Observación',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique la Observación'     
                                         ]) ?>
    
    <?= $form->field($model, 'decision')->dropDownList([ 'S' => 'SI', 'N' => 'NO'],['prompt'=>'Indique el valor para Tipo Fuente']) ?>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
