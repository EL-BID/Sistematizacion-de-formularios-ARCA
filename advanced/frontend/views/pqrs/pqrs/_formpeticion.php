<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\pqrs\Pqrs */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="pqrs-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <table style="text-align:center" width="100%">
        <tr>
            <td colspan='4' class='titulopqr'>FORMATO DE PETICIONES</td>
        </tr>
        <!------------------------------------IDENTIFICACIONES DEL FORMATO------------------------------------------->
        <tr>
            <td class='campopqr'>Fecha de Recepcion</td>
            <td><?= $form->field($model, 'fecha_recepcion')->textInput(['disabled' => true])->label(false) ?></td>
            <td class='campopqr'>No. Consecutivo</td>
            <td><?= $form->field($model, 'num_consecutivo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Consecutivo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Consecutivo',
                                        'disabled' => true
                                         ])->label(false) ?>
            </td>
        </tr>
        
         <!--------------------------------IDENTIFICACION DEL USUARIO ---------------------------------------------------->
        <tr>
            <td colspan='4' class='titulopqr'>IDENTIFICACION DEL USUARIO</td>
        </tr>
        <tr>
            <td class='campopqr'>Nombres y Apellidos completos</td>
            <td colspan='3'> <?= $form->field($model, 'sol_nombres')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique nombres y apellidos completos',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique nombres y apellidos completos'
                                         ])->label(false) ?>
            </td>
        <tr>
            <td class='campopqr'>Documento de Identificación</td>    
            <td colspan='3'><?= $form->field($model, 'sol_doc_identificacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Documento de Identificación',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Documento de Identificación'
                                         ])->label(false) ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Dirección</td>    
            <td colspan='3'> <?= $form->field($model, 'sol_direccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Dirección',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Dirección'
                                         ])->label(false) ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Email</td>    
            <td colspan='3'> <?= $form->field($model, 'sol_email')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Correo electrónico',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Correo electrónico'        
                                         ])->label(false) ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Teléfono</td>    
            <td colspan='3'> <?= $form->field($model, 'sol_telefono')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique número de Teléfono',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique número de Teléfono'        
                                         ])->label(false) ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Provincia</td>
            <td>
                 <?= $form->field($model, 'sol_cod_provincia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(),'cod_provincia','nombre_provincia'),
                                    ['prompt'=>'Seleccione una provincia',
                                    'onchange'=>'$.post("index.php?r=pqrs/pqrs/listadocantones&id='.'"+$(this).val(),function(data){
                                        $("#pqrs-sol_cod_canton").html(data);
                                    });'])->label(false) ?>
            </td>
            <td class='campopqr'>Canton</td>
            <td>
                <?= $form->field($model, 'sol_cod_canton')->dropDownList([],['prompt'=>'Seleccione un Canton'])->label(false) ?>
            </td>
        </tr>
        
    
   
        <!-----------------------EMPRESA REPRESENTADA------------------------------------------------------------->
        <tr>
            <td colspan='4' class='titulopqr'>***Si usted escribe en representación de una empresa o una organización por favor incluya</td>
        </tr>

        <tr>
            <td class='campopqr'>Nombre</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_nombres')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique Nombre de la empresa u organización',
                                            'data-toggle' => 'tooltip',
                                            'placeholder'=>'Indique Nombre de la empresa u organización'        
                                             ])->label(false) ?>
            </td>
        </tr>

        <tr>
            <td class='campopqr'>Ruc</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_ruc')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique Ruc',
                                            'data-toggle' => 'tooltip',
                                            'placeholder'=>'Indique Ruc'        
                                             ])->label(false) ?>
            </td>
        </tr>

        <tr>
            <td class='campopqr'>Dirección</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_direccion')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique Dirección',
                                            'data-toggle' => 'tooltip',
                                            'placeholder'=>'Indique Dirección'        
                                             ])->label(false) ?>
            </td>
        </tr>


        <tr>
            <td class='campopqr'>Email</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_email')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique Email',
                                            'data-toggle' => 'tooltip',
                                            'placeholder'=>'Indique Email'        
                                             ])->label(false) ?>
            </td>
        </tr> 

        <tr>
            <td class='campopqr'>Teléfono</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_telefono')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique número de teléfono',
                                            'data-toggle' => 'tooltip',
                                            'placeholder'=>'Indique número de teléfono'        
                                             ])->label(false) ?>
            </td>
        </tr> 


        <tr>
              <td class='campopqr'>Provincia</td>
              <td>
                   <?= $form->field($model, 'en_nom_cod_provincia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(),'cod_provincia','nombre_provincia'),
                                        ['prompt'=>'Seleccione una provincia',
                                        'onchange'=>'$.post("index.php?r=pqrs/pqrs/listadocantones&id='.'"+$(this).val(),function(data){
                                            $("#pqrs-en_nom_cod_canton").html(data);
                                        });'])->label(false) ?>
              </td>
              <td class='campopqr'>Canton</td>
              <td>
                  <?= $form->field($model, 'en_nom_cod_canton')->dropDownList([],['prompt'=>'Seleccione un Canton'])->label(false) ?>
              </td>
        </tr>

    
    <!----------------------------------------DESCRIPCION DE LA PETICION------------------------------------------>
        <tr>
            <td colspan='4' class='titulopqr'>DESCRIPCIÓN DE LA PETICIÓN</td>
        </tr>
        
        
        <tr>
            <td class='campopqr'>Proceso, servicio, producto a que se dirige la petición</td>    
            <td colspan='3'> <?= $form->field($model, 'aquien_dirige')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique A quien Dirige la petición',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique A quien Dirige la petición'        
                                         ])->label(false) ?>
            </td>
        </tr> 
        
        
        <tr>
            <td class='campopqr'>Objeto de la petición</td>    
            <td colspan='3'> <?= $form->field($model, 'objeto_peticion')->widget(\yii\redactor\widgets\Redactor::className(), [
                                'clientOptions' => [
                                 'lang' => 'es',
                                 'plugins' => ['clips', 'fontcolor','imagemanager']
                                ]
                              ])->label(false) ?>
            </td>
        </tr> 
        
        <tr>
            <td class='campopqr'>Descripción de la petición</td>    
            <td colspan='3'> <?= $form->field($model, 'descripcion_peticion')->widget(\yii\redactor\widgets\Redactor::className(), [
                                'clientOptions' => [
                                    'lang' => 'es',
                                    'plugins' => ['clips', 'fontcolor','imagemanager']
                                ]
                              ])->label(false) ?>
            </td>
        </tr> 
        
    </table> 


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
