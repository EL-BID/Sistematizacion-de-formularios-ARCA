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
    
    <?= $form->field($modelCoordenada, 'longitud')->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "##.#####",]); ?> 
    
    <?= $form->field($modelCoordenada, 'latitud')->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "##.#####",]); ?> 
    
    <?= $form->field($modelCoordenada, 'altura')->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "####.##",]); ?> 
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
