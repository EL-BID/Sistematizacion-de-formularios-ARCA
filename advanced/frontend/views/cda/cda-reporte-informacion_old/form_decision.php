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
    
  
    <?php echo $form->field($model, 'decision')->dropDownList(
            ['S' => 'Aprobada', 'N' => 'Devuelto']
    ); ?>
    
    <?= $form->field($model, 'observaciones_decision')->textarea([
                                        'maxlength' => true,
                                        'title' => 'Indique Observacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observacion',
                                         ]); ?>
    
   
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
