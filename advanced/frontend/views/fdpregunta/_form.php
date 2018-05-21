<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model frontend\models\fdpregunta */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fdpregunta-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

   
    <?= $form->field($model, 'nom_pregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique nom_pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique nom_pregunta'        
                                         ]) ?>
    
     <?= $form->field($model, 'orden')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique orden',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique orden'        
                                         ]) ?>
    
     <?= $form->field($model, 'estado')->dropDownList([ 'S' => 'S', 'N' => 'N' ], 
            ['prompt' => '','title'=>'Selecciones un valor',
                'data-toggle' => 'tooltip',
                'data-trigger' => 'focus']) ?>

   
    
    <?= $form->field($model, 'visible')->dropDownList([ 'S' => 'S', 'N' => 'N' ], 
            ['prompt' => '','title'=>'Selecciones un valor',
                'data-toggle' => 'tooltip',
                'data-trigger' => 'focus']) ?>
    
     <?= $form->field($model, 'visible_desc_preg')->dropDownList([ 'S' => 'S', 'N' => 'N' ], 
            ['prompt' => '','title'=>'Selecciones un valor',
                'data-toggle' => 'tooltip',
                'data-trigger' => 'focus']) ?>
    
    <?= $form->field($model, 'num_col_label')->hiddenInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_conjunto_pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_conjunto_pregunta',
                                        'value'=>'1',
                                         ])->label(false); ?>
    
    
    <?= $form->field($model, 'num_col_input')->hiddenInput([
                                        'maxlength' => true,
                                        'title' => 'Indique num_col_input',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique num_col_input',
                                        'value'=>'1',
                                         ])->label(false); ?>
    
    
    <?= $form->field($model, 'numerada')->hiddenInput([
                                        'maxlength' => true,
                                        'title' => 'Indique num_col_input',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique num_col_input',
                                        'value'=>'S',
                                         ])->label(false); ?>

     <?= $form->field($model, 'ayuda_pregunta')->hiddenInput([
                                        'maxlength' => true,
                                        'title' => 'Indique ayuda_pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique ayuda_pregunta',
                                        'value'=>'pregunta tipo agrupacion',
                                         ])->label(false); ?>
    
    <?= $form->field($model, 'obligatorio')->hiddenInput([
                                        'maxlength' => true,
                                        'title' => 'Indique ayuda_pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique ayuda_pregunta',
                                        'value'=>'S',
                                         ])->label(false); ?>


   
   
    <?= $form->field($model, 'id_tpregunta')->hiddenInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_tpregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_tpregunta' ,       
                                         ])->label(false); ?>

    <?= $form->field($model, 'id_capitulo')->hiddenInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_capitulo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_capitulo' ,       
                                         ])->label(false); ?>

    <?= $form->field($model, 'id_seccion')->hiddenInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_seccion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_seccion' ,       
                                         ])->label(false); ?>

    <?= $form->field($model, 'id_agrupacion')->hiddenInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_agrupacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_agrupacion',        
                                         ])->label(false); ?>

   
    <?= $form->field($model, 'caracteristica_preg')->hiddenInput([
                                        'maxlength' => true,
                                        'title' => 'Indique caracteristica_preg',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique caracteristica_preg',        
                                         ])->label(false); ?>

    <?= $form->field($model, 'id_conjunto_pregunta')->hiddenInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_conjunto_pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_conjunto_pregunta'        
                                         ])->label(false); ?>
				
    <?php /*$form->field($model, 'numerada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique numerada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique numerada'        
                                         ]) */ ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
