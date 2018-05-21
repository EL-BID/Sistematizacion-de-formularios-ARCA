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
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
