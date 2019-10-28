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
            <td colspan='4' class='titulopqr'>FORMATO DE SUGERENCIA  Y FELICITACIONES</td>
        </tr>
        <tr>
            <td colspan='4' class='comentariopqr'>Seleccione la casilla correspondiente a la diligencia que usted desea realizar</td>
        </tr>
        <tr>
            <td class='campopqr'>Sugerencia</td>
            <td><?= $form->field($model, 'subtipo_sugerencia')->checkbox(array('label' => '')); ?></td>  
            <td class='campopqr'>Felicitación</td>
            <td><?= $form->field($model, 'subtipo_felicitacion')->checkbox(array('label' => '')); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                Propuesta que se presenta para incidir o mejorar un proceso cuyo objeto esta relacionado con la prestación de un
                servicio o el cumplimiento de una función pública.
            </td>
             <td colspan="2">
              Expresión de la alegria y satisfacción que se siente por la atención de los servidores de la ARCA y/o provisión de un servicio de la ARCA.
            </td>
            
        </tr>
        
        <tr>
            <td class='campopqr'>Fecha de Recepción</td>
            <td><?= $form->field($model, 'fecha_recepcion')->textInput(['disabled' => true])->label(false); ?></td>
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
                                        'title' => 'Indique Sol Nombres',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sol Nombres'
                                         ])->label(false) ?>
            </td>
        <tr>
            <td class='campopqr'>Documento de Identificación</td>    
            <td colspan='3'><?= $form->field($model, 'sol_doc_identificacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Doc Identificacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sol Doc Identificacion'
                                         ])->label(false) ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Dirección</td>    
            <td colspan='3'> <?= $form->field($model, 'sol_direccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Direccion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sol Direccion'
                                         ])->label(false) ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Email</td>    
            <td colspan='3'> <?= $form->field($model, 'sol_email')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Email',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sol Email'        
                                         ])->label(false) ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Teléfono</td>    
            <td colspan='3'> <?= $form->field($model, 'sol_telefono')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Telefono',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sol Telefono'        
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
                                            'title' => 'Indique En Nom Nombres',
                                            'data-toggle' => 'tooltip',
                                            'placeholder'=>'Indique En Nom Nombres'        
                                             ])->label(false) ?>
            </td>
        </tr>

        <tr>
            <td class='campopqr'>Ruc</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_ruc')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique En Nom Ruc',
                                            'data-toggle' => 'tooltip',
                                            'placeholder'=>'Indique En Nom Ruc'        
                                             ])->label(false) ?>
            </td>
        </tr>

        <tr>
            <td class='campopqr'>Dirección</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_direccion')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique En Nom Direccion',
                                            'data-toggle' => 'tooltip',
                                            'placeholder'=>'Indique En Nom Direccion'        
                                             ])->label(false) ?>
            </td>
        </tr>


        <tr>
            <td class='campopqr'>Email</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_email')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique En Nom Email',
                                            'data-toggle' => 'tooltip',
                                            'placeholder'=>'Indique En Nom Email'        
                                             ])->label(false) ?>
            </td>
        </tr> 

        <tr>
            <td class='campopqr'>Teléfono</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_telefono')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique En Nom Telefono',
                                            'data-toggle' => 'tooltip',
                                            'placeholder'=>'Indique En Nom Telefono'        
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
            <td colspan='4' class='titulopqr'>DESCRIPCION DE LA SUGERENCIA/FELICITACION</td>
        </tr>
        
        <tr>
            <td class='campopqr'>Proceso, servicio producto o persona a quien se dirige la comunicacion</td>    
            <td colspan='3'> <?= $form->field($model, 'aquien_dirige')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Aquien Dirige',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Aquien Dirige'        
                                         ])->label(false) ?>
            </td>
        </tr> 
        
        <tr>
            <td class='campopqr'>Descripcion de la sugerencia o felicitación</td>    
            <td colspan='3'> <?= $form->field($model, 'descripcion_sugerencia')->widget(\yii\redactor\widgets\Redactor::className(), [
                            'clientOptions' => [
                                'lang' => 'es',
                                'plugins' => ['bold','italic','orderedlist'],
                                'buttonsHide' => ['image','file','html','formatting','deleted','outdent','indent','link','alignment','horizontalrule'],
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
<script>
    
$(document).ready(function() {
    //set initial state.
    $('#pqrs-subtipo_sugerencia').prop('checked', true);
    
    $('#pqrs-subtipo_felicitacion').val($(this).is(':checked'));
    $('#pqrs-subtipo_sugerencia').val($(this).is(':checked'));
    //$('#pqrs-subtipo_controversia').val($(this).is(':checked'));

    $('#pqrs-subtipo_sugerencia').change(function() {
        if($(this).is(":checked")) {
            $('#pqrs-subtipo_felicitacion').prop('checked', false);
            //$('#pqrs-subtipo_controversia').prop('checked', false);
        }
    });
    
    $('#pqrs-subtipo_felicitacion').change(function() {
        if($(this).is(":checked")) {
            $('#pqrs-subtipo_sugerencia').prop('checked', false);
            //$('#pqrs-subtipo_controversia').prop('checked', false);
        }
    });
      
});    
</script>