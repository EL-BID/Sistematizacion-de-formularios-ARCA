<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/

/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\pqrs\Pqrs */
/* @var $form yii\widgets\ActiveForm */

SweetSubmitAsset::register($this);
?>

<div class="pqrs-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form',
                    ],
                ]); ?>
    
    <table style="text-align:center" width="100%">
        <tr>
            <td colspan='3' class='titulopqr'>FORMATO DE QUEJA/ RECLAMO / CONTROVERSIA</td>
        </tr>
        <tr>
            <td colspan='3' class='comentariopqr'>Seleccionar la casilla correspondiente a la diligencia que usted desea realizar</td>
        </tr>
        <tr>
            <td width='33%'>
                <table class='intro'>
                    <tr>
                        <td>Queja</td>
                        <td><?= $form->field($model, 'subtipo_queja')->checkbox(array('label'=>'')); ?></td>
                    </tr>
                </table>
            </td>
            <td width='33%'>
                <table class='intro'>
                    <tr>
                        <td>Reclamo</td>
                        <td><?= $form->field($model, 'subtipo_reclamo')->checkbox(array('label'=>'')); ?>
                            
                        </td>
                    </tr>
                </table>
            </td>
            <td width='33%'>
                <table class='intro'>
                    <tr>
                        <td>Controversia</td>
                        <td><?= $form->field($model, 'subtipo_controversia')->checkbox(array('label'=>'')); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>Manifestación de protesta, censura, descontento o inconformidad debidamente
                motivada, que formula una persona con relación a la conducta irregular realizada por un servidor público
                de la ARCA en el desarrollo de sus funciones.</td>
            <td> Manifestación debidamente mofivada, referente a la prestacion indebida de los servicios de la ARCA o falla de atención
                oportuna de una solicitud presentada ante la ARCA</td>
            <td> Discusión de opiniones contrpuestas entre dos o mas personas</td>
        </tr>
        
    </table>
    
    <table width='100%'>
        <tr>
            <td class='campopqr'>Fecha de Recepción</td>
            <td><?= $form->field($model, 'fecha_recepcion')->textInput(['disabled' => true])->label(false); ?></td>
            <td class='campopqr'>No. Consecutivo</td>
            <td><?= $form->field($model, 'num_consecutivo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Número Consecutivo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Número Consecutivo',
                                        'disabled' => true,
                                         ])->label(false); ?>
            </td>
        </tr>
    
      

     <!--------------------------------IDENTIFICACION DEL USUARIO ---------------------------------------------------->
        <tr>
            <td colspan='4' class='titulopqr'>IDENTIFICACIÓN DEL USUARIO</td>
        </tr>
        <tr>
            <td class='campopqr'>Nombres y Apellidos completos</td>
            <td colspan='3'> <?= $form->field($model, 'sol_nombres')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombres y Apellidos completos',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Nombres y apellidos',
                                         ])->label(false); ?>
            </td>
        <tr>
            <td class='campopqr'>Documento de Identificación</td>    
            <td colspan='3'><?= $form->field($model, 'sol_doc_identificacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Documento de  Identificación',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Documento de Identificación',
                                         ])->label(false); ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Dirección</td>    
            <td colspan='3'> <?= $form->field($model, 'sol_direccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Dirección',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Dirección',
                                         ])->label(false); ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Email</td>    
            <td colspan='3'> <?= $form->field($model, 'sol_email')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Email',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Email',
                                         ])->label(false); ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Teléfono</td>    
            <td colspan='3'> <?= $form->field($model, 'sol_telefono')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Número de teléfono',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Número de teléfono',
                                         ])->label(false); ?>
            </td>
        </tr>
        
        <tr>
            <td class='campopqr'>Provincia</td>
            <td>
                 <?= $form->field($model, 'sol_cod_provincia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(), 'cod_provincia', 'nombre_provincia'),
                                    ['prompt' => 'Seleccione una provincia',
                                    'onchange' => '$.post("index.php?r=pqrs/pqrs/listadocantones&id='.'"+$(this).val(),function(data){
                                        $("#pqrs-sol_cod_canton").html(data);
                                    });', ])->label(false); ?>
            </td>
            <td class='campopqr'>Canton</td>
            <td>
                <?= $form->field($model, 'sol_cod_canton')->dropDownList([], ['prompt' => 'Seleccione un Canton'])->label(false); ?>
            </td>
        </tr>
    
    <!-----------------------EMPRESA REPRESENTADA------------------------------------------------------------->

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
                                            'placeholder' => 'Indique Nombre de la empresa u organización',
                                             ])->label(false); ?>
            </td>
        </tr>

        <tr>
            <td class='campopqr'>Ruc</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_ruc')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique Ruc',
                                            'data-toggle' => 'tooltip',
                                            'placeholder' => 'Indique Ruc',
                                             ])->label(false); ?>
            </td>
        </tr>

        <tr>
            <td class='campopqr'>Dirección</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_direccion')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique Dirección',
                                            'data-toggle' => 'tooltip',
                                            'placeholder' => 'Indique Dirección',
                                             ])->label(false); ?>
            </td>
        </tr>


        <tr>
            <td class='campopqr'>Email</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_email')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique Email',
                                            'data-toggle' => 'tooltip',
                                            'placeholder' => 'Indique Email',
                                             ])->label(false); ?>
            </td>
        </tr> 

        <tr>
            <td class='campopqr'>Teléfono</td>    
            <td colspan='3'> <?= $form->field($model, 'en_nom_telefono')->textInput([
                                            'maxlength' => true,
                                            'title' => 'Indique número de Teléfono',
                                            'data-toggle' => 'tooltip',
                                            'placeholder' => 'Indique número de Teléfono',
                                             ])->label(false); ?>
            </td>
        </tr> 


        <tr>
              <td class='campopqr'>Provincia</td>
              <td>
                   <?= $form->field($model, 'en_nom_cod_provincia')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(), 'cod_provincia', 'nombre_provincia'),
                                        ['prompt' => 'Seleccione una provincia',
                                        'onchange' => '$.post("index.php?r=pqrs/pqrs/listadocantones&id='.'"+$(this).val(),function(data){
                                            $("#pqrs-en_nom_cod_canton").html(data);
                                        });', ])->label(false); ?>
              </td>
              <td class='campopqr'>Canton</td>
              <td>
                  <?= $form->field($model, 'en_nom_cod_canton')->dropDownList([], ['prompt' => 'Seleccione un Canton'])->label(false); ?>
              </td>
        </tr>

    <!----------------------------------------DESCRIPCION DE LA QUEJA RECLAMO CONTROVERSIA------------------------------------------>
   
        <tr>
            <td colspan='4' class='titulopqr'>DESCRIPCIÓN QUEJA/RECLAMO/CONTROVERSIA</td>
        </tr>

        <tr>
            <td class='campopqr'>Queja/Proceso, servicio o producto objeto de reclamo/ Ente o persona con el que surgio la controversia</td>    
            <td colspan='3'> <?= $form->field($model, 'por_quien_qrc')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Servicio o producto objeto del reclamo, en caso de ser una controversia ente o persona con la que surgio, y para el caso de una queja ante cual proceso desea instaurar la queja. ',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Proceso, Servicio o producto, ente o persona',
                                         ])->label(false); ?>
            </td>
        </tr> 
        
         <tr>
              <td class='campopqr'>Lugar donde ocurrio el hecho?</td>
              <td>
                   <?= $form->field($model, 'lugar_hechos')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique el Lugar Hechos',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique el Lugar Hechos',
                                         ])->label(false); ?>
              </td>
              <td class='campopqr'>Fecha</td>
              <td>
                  <?= $form->field($model, 'fecha_hechos')->
                                    widget(\yii\jui\DatePicker::className(), [
                                       'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                                       'options'=>['readOnly'=>'readOnly'], 
                                       'clientOptions' => [
                                           'yearRange' => '-90:+0',        //A�os habilitados 90 a�os atras hasta el actual
                                           'changeYear' => true,            //Permitir cambio de a�o
                                           'changeMonth' => true, ],            //Permitir cambio de Mes
                                   ])->label(false); ?>
              </td>
        </tr>

  
        <tr>
            <td class='campopqr'>Narración de los hechos</td>    
            <td colspan='3'> <?= $form->field($model, 'naracion_hechos')->widget(\yii\redactor\widgets\Redactor::className(), [
                                'clientOptions' => [
                                    'lang' => 'es',
                                    'plugins' => ['bold','italic','orderedlist'],
                                    'buttonsHide' => ['image','file','html','formatting','deleted','outdent','indent','link','alignment','horizontalrule'],
                                ],
                              ])->label(false); ?>
            </td>
        </tr> 
        
        <tr>
            <td class='campopqr'>Elementos de prueba</td>    
            <td colspan='3'> <?= $form->field($model, 'elementos_probatorios')->widget(\yii\redactor\widgets\Redactor::className(), [
                                'clientOptions' => [
                                    'lang' => 'es',
                                    'plugins' => ['bold','italic','orderedlist'],
                                    'buttonsHide' => ['image','file','html','formatting','deleted','outdent','indent','link','alignment','horizontalrule'],
                                ],
                              ])->label(false); ?>
            </td>
        </tr> 
    </table>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    
$(document).ready(function() {
    //set initial state.
    $('#pqrs-subtipo_queja').prop('checked', true);
    
    $('#pqrs-subtipo_queja').val($(this).is(':checked'));
    $('#pqrs-subtipo_reclamo').val($(this).is(':checked'));
    $('#pqrs-subtipo_controversia').val($(this).is(':checked'));

    $('#pqrs-subtipo_queja').change(function() {
        if($(this).is(":checked")) {
            $('#pqrs-subtipo_reclamo').prop('checked', false);
            $('#pqrs-subtipo_controversia').prop('checked', false);
        }
    });
    
    $('#pqrs-subtipo_reclamo').change(function() {
        if($(this).is(":checked")) {
            $('#pqrs-subtipo_queja').prop('checked', false);
            $('#pqrs-subtipo_controversia').prop('checked', false);
        }
    });
    
    $('#pqrs-subtipo_controversia').change(function() {
        if($(this).is(":checked")) {
            $('#pqrs-subtipo_queja').prop('checked', false);
            $('#pqrs-subtipo_reclamo').prop('checked', false);
        }
    });
});    
</script>