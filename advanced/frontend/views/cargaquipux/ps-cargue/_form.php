<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cargaquipux\PsCargue */
/* @var $form yii\widgets\ActiveForm */
  /*   <?= $form->field($model, 'ruta')->fileInput([
                                        'title' => 'Indique Ruta del Archivo Excel de QUIPUX',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ruta del Archivo Excel de QUIPUX'        
                                         ]) ?>
   *          <?= $form->field($model, 'ruta') ->widget(kartik\widgets\FileInput::classname(), [
        
    'options' => [ 'title' => 'Indique Ruta del Archivo Excel de QUIPUX',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ruta del Archivo Excel de QUIPUX'        ,],
]) ?>
*/


SweetSubmitAsset::register($this)
?>

<div class="ps-cargue-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form',
                    'enctype'=>'multipart/form-data',
					]
                ]); ?>

    
     <?= $form->field($model, 'id_archivo_cargue')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\cargaquipux\PsArchivoCargue::find()->all(),'id_archivo_cargue','nom_archivo_cargue'),['prompt'=>'Indique el valor para el tipo de archivo']) ?>

    
     <?= $form->field($model, 'ruta')->fileInput([
                                        'title' => 'Indique Ruta del Archivo Excel de QUIPUX',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ruta del Archivo Excel de QUIPUX'        
                                         ]) ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         <?= Html::Button('Cancelar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','data-dismiss'=>'modal']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
