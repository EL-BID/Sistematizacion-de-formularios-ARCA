<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use kartik\widgets\DateTimePicker;/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\CdaSolicitudInformacion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-solicitud-informacion-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'crear-form'
					]
                ]); ?>
    
    <table class="datos_salida" width="100%">
        <tr>
            <td colspan="2">
                <?= $form->field($model, 'no_tramite_administrativo')->textInput([
                                          'maxlength' => true,
                                          'title' => 'Indique No. Tramite Administrativo',
                                          'data-toggle' => 'tooltip',
                                          'placeholder'=>'Indique No. Tramite Administrativo'        
                                           ]); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $form->field($model, 'tienecda')->dropDownList(
                        ['si' => 'SI', 'no' => 'NO'],['prompt' => 'Seleccione Uno','onchange'=>'$.post("index.php?r=cda/cda-solicitud-informacion/habilitar&valor='.'"+$(this).val(),function(data){
                                          if(data == "no"){
                                             $("#cdasolicitudinformacion-id_cod_cda").attr("disabled", "disabled");
                                          }else{
                                            $("#cdasolicitudinformacion-id_cod_cda").removeAttr("disabled");
                                          }
                                        });']); ?>
            </td> 
           <td><?= $form->field($model, 'id_cod_cda')
                           ->dropDownList(\yii\helpers\ArrayHelper::map($listadoscda,'id_cod_cda','cod_cda'),
                                          ['prompt'=>'Seleccione Código CDA','onchange'=>'$.post("index.php?r=cda/cda-solicitud-informacion/infocda&id='.'"+$(this).val(),function(data){
                                            var content = JSON.parse(data);
                                            console.log(content);
                                            $("#cdasolicitudinformacion-cod_centro_atencion_ciudadano").html(content["centros"]);
                                            $("#cdasolicitudinformacion-cod_canton").html(content["cantones"]);
                                            $("#cdasolicitudinformacion-id_demarcacion").val(content["id_demarcacion"]);
                                            $("#cdasolicitudinformacion-cod_centro_atencion_ciudadano").val(content["id_centro"]);
                                            $("#cdasolicitudinformacion-q_solicitado").val(content["q_solicitado"]);
                                            $("#cdasolicitudinformacion-id_uso_solicitado").val(content["id_uso_solicitado"]);
                                            $("#cdasolicitudinformacion-id_destino").val(content["id_destino"]);
                                            $("#cdasolicitudinformacion-beneficiario_razonsocial").val(content["beneficiario_razonsocial"]);
                                            $("#cdasolicitudinformacion-beneficiario_representante").val(content["beneficiario_representante"]);
                                            $("#cdasolicitudinformacion-fecha_ingreso_quipux").val(content["fecha_ingreso_quipux"]);
                                            $("#cdasolicitudinformacion-fecha_oficio").val(content["fecha_oficio"]);
                                            $("#cdasolicitudinformacion-fecha_ingreso_anexos_fisicos").val(content["fecha_ingreso_anexos_fisicos"]);
                                            $("#cdasolicitudinformacion-fecha_recepcion_anexos").val(content["fecha_recepcion_anexos"]);
                                            $("#cdasolicitudinformacion-cod_provincia").val(content["cod_provincia"]);
                                            $("#cdasolicitudinformacion-cod_canton").val(content["cod_canton"]);
                                            
                                        });',['disabled' => ($model->tienecda=='si') ? 'disabled' : false]]);
                                        
                                        ?></td>  
        </tr>
        
        <!-----------------------LINEA 2 ----------------------------------------->
        <tr>
            <td><?=  $form->field($model, 'id_demarcacion')->dropDownList(\yii\helpers\ArrayHelper::map(
                                $listadodemarcacion,'id_demarcacion','nombre_demarcacion'),['prompt'=>'Indique Demarcación','onchange'=>'$.post("index.php?r=cda/cda/centrociudadano&id='.'"+$(this).val(),function(data){
                                            $("#cdasolicitudinformacion-cod_centro_atencion_ciudadano").html(data);
                                        });']
                           ); ?>
            </td>
            <td>
                <?php
                    if(empty($model->cod_centro_atencion_ciudadano) and empty($listadocentro)){
                        echo $form->field($model, 'cod_centro_atencion_ciudadano')->dropDownList([],['prompt'=>'Indique Centro de Atencion']
                                       ); 

                    }else{

                        echo $form->field($model, 'cod_centro_atencion_ciudadano')->dropDownList(\yii\helpers\ArrayHelper::map(
                                            $listadocentro,'cod_centro_atencion_ciudadano','nom_centro_atencion_ciudadano'),['prompt'=>'Indique Centro de Atencion']
                                       ); 
                    }
                ?>
            </td>
        </tr>
        
        
        <!-----------------------------------LINEA 3 ---------------------------------------------->
        <tr>
            <td>
                <?= $form->field($model, 'cod_provincia')
                         ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(),'cod_provincia','nombre_provincia'),
                           ['prompt'=>'Seleccione una provincia',
                          'onchange'=>'$.post("index.php?r=fdubicacion/listado&id='.'"+$(this).val(),function(data){
                              $("#cdasolicitudinformacion-cod_canton").html(data);
                          });']); ?>
            </td>
            <td>
                <?php  
                    if(empty($model->cod_canton)){
                        echo $form->field($model, 'cod_canton')->dropDownList([],['prompt'=>'Seleccione un Canton']);
                    }else{
                        echo $form->field($model, 'cod_canton')->dropDownList(\yii\helpers\ArrayHelper::map(
                                            $listadocodcanton,'cod_canton','nombre_canton'),['prompt'=>'Indique Centro de Atencion']
                                       ); 
                    }
                ?>
            </td>
        </tr>
        
        <!-------------------------------LINEA 4------------------------------------------------->
        <tr>
            <td>
                <?= $form->field($model, 'q_solicitado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Q en l/s',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Q en l/s'        
                                         ]); ?>
            </td>
            <td>
                <?=  $form->field($model, 'id_uso_solicitado')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaUsoSolicitado::find()->all(),'id_uso_solicitado','nom_uso_solicitado'),['prompt'=>'Indique el valor para Uso Solicitado']); ?>
            </td>
        </tr>
        
        
        <!-------------------------LINEA 5 ----------------------------------------------------->
        <tr>
            <td>
                <?= $form->field($model, 'id_destino')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaDestino::find()->all(),'id_destino','nom_destino'),['prompt'=>'Indique el valor para Destino']); ?>
            </td>
            <td>
                <?= $form->field($model, 'id_subdestino')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cda\CdaSubdestino::find()->all(),'id_subdestino','nom_subdestino'),['prompt'=>'Indique el valor para SubDestino']) ?>
            </td>
        </tr>
        
        <!---------------------LINEA 6 --------------------------------------------------------->
        <tr>
            <td><?= $form->field($model, 'beneficiario_razonsocial')->textInput([
                                          'maxlength' => true,
                                          'title' => 'Indique Razon Social',
                                          'data-toggle' => 'tooltip',
                                          'placeholder'=>'Indique Razon Social'        
                                           ]); ?> </td>
            
            <td><?= $form->field($model, 'beneficiario_representante')->textInput([
                                          'maxlength' => true,
                                          'title' => 'Indique Representante',
                                          'data-toggle' => 'tooltip',
                                          'placeholder'=>'Indique Representante'        
                                           ]); ?></td>
        </tr>
        
        <!--------------LINEA 7 ----------------------------------------------------------------->
        <tr>
            <td>
                <?= $form->field($model, 'fecha_ingreso_quipux')->widget(DateTimePicker::classname(), [
                        'options' => ['placeholder' => 'Seleccione fecha y hora'],
                        'pluginOptions' => [
                                'autoclose' => true,
                                'format' => Yii::$app->fmtfechahoradatepicker
                        ]
                    ]); ?>
            </td>
            <td>
                <?= 
                       $form->field($model, 'fecha_oficio')->widget(DateTimePicker::classname(), [
                            'options' => ['placeholder' => 'Seleccione fecha y hora'],
                            'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => Yii::$app->fmtfechahoradatepicker
                            ]
                        ]);
                ?>
            </td>
        </tr>
        
         <!--------------LINEA 8 ----------------------------------------------------------------->
        
        <tr>
            <td> 
                <?= $form->field($model, 'fecha_ingreso_anexos_fisicos')->widget(DateTimePicker::classname(), [
                        'options' => ['placeholder' => 'Seleccione fecha y hora'],
                        'pluginOptions' => [
                                'autoclose' => true,
                                'format' => Yii::$app->fmtfechahoradatepicker
                        ]
                    ]);
               ?>
            </td>
            <td>
                <?= $form->field($model, 'fecha_recepcion_anexos')->widget(DateTimePicker::classname(), [
                        'options' => ['placeholder' => 'Seleccione fecha y hora'],
                        'pluginOptions' => [
                                'autoclose' => true,
                                'format' => Yii::$app->fmtfechahoradatepicker
                        ]
                    ]);
               ?>
            </td>
        </tr>
        
        <!--------------LINEA 9 ----------------------------------------------------------------->
        <tr>
            <td>
                 <?=  $form->field($model, 'fecha_elaboracion_quipux')->widget(DateTimePicker::classname(), [
                                'options' => ['placeholder' => 'Seleccione fecha y hora'],
                                'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => Yii::$app->fmtfechahoradatepicker
                                ]
                      ]); 
                  ?>
            </td>
            <td>
                <?php //  $form->field($model, 'fecha_respuesta')->widget(DateTimePicker::classname(), [
//                                'options' => ['placeholder' => 'Seleccione fecha y hora'],
//                                'pluginOptions' => [
//                                        'autoclose' => true,
//                                        'format' => Yii::$app->fmtfechahoradatepicker
//                                ]
//                      ]); 
                  ?>
            </td>
        </tr>
        
        <tr>
            <td>
               <?= $form->field($model, 'puntos_solicitados')->textInput([
                                          'maxlength' => true,
                                          'title' => 'Indique Puntos Solicitados',
                                          'data-toggle' => 'tooltip',
                                          'placeholder'=>'Indique Puntos Solicitados'        
                                           ]);  ?>
            </td>
            <td>
                <?=  $form->field($model, 'estado')->dropDownList(
                        ['atendido' => 'Atendido', 'anulado' => 'Anulado', '-' => '-','devuelto'=>'Devuelto'],['prompt' => 'Seleccione Uno' ]
                ); ?>
            </td>
        </tr>
        
        <tr>
            <td>
                <?= $form->field($model, 'puntos_simplificados')->textInput([
                                          'maxlength' => true,
                                          'title' => 'Indique Puntos Simplificados',
                                          'data-toggle' => 'tooltip',
                                          'placeholder'=>'Indique Puntos Simplificados'        
                                           ]);
                ?>
            </td>
            
            <td>
                <?= $form->field($model, 'puntos_devueltos')->textInput([
                                          'maxlength' => true,
                                          'title' => 'Indique Puntos Devueltos',
                                          'data-toggle' => 'tooltip',
                                          'placeholder'=>'Indique Puntos Devueltos'        
                                           ]);  
                ?>
            </td>
        </tr>
        
        <tr>
            <td>
                 <?= $form->field($model, 'mes_salida')->textInput([
                                          'maxlength' => true,
                                          'title' => 'Indique Mes Salida Respuesta',
                                          'data-toggle' => 'tooltip',
                                          'placeholder'=>'Indique Mes Salida Respuesta'        
                                           ]);  ?>
            </td>
            <td>
                 <?php // $form->field($model, 'oficio_respuesta')->textInput([
//                                          'maxlength' => true,
//                                          'title' => 'Indique No. Oficio Respuesta',
//                                          'data-toggle' => 'tooltip',
//                                          'placeholder'=>'Indique No. Oficio Respuesta'        
//                                           ]);  ?>
            </td>
          
            
        </tr>
        
        <tr>
            <td>
                <?= $form->field($model, 'oficio_atencion')->textInput([
                                          'maxlength' => true,
                                          'title' => 'Indique Oficio Atencion',
                                          'data-toggle' => 'tooltip',
                                          'placeholder'=>'Indique Oficio Atencion'        
                                           ]) ?>
            </td>
            <td>
                <?=  $form->field($model, 'fecha_atencion')->widget(DateTimePicker::classname(), [
                            'options' => ['placeholder' => 'Seleccione fecha y hora'],
                            'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => Yii::$app->fmtfechahoradatepicker
                            ]
                    ]);
                ?>
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                  <?= $form->field($model, 'forma_atencion_cda')->dropDownList(
                          ['1' => 'CDA Anulado', '2' => 'CDA Corregido', '3' => 'CDA Emitido', '-' => '-'],
                          ['prompt' => 'Seleccione Uno','onchange'=>'$.post("index.php?r=cda/cda-solicitud-informacion/habilitar&valor='.'"+$(this).val(),function(data){
                              if(data == "1"){
                                document.getElementById("cdasolicitudinformacion-causa_anulacion").disabled = false;
                                document.getElementById("cdasolicitudinformacion-causa_correccion").disabled = true;
                              }else if(data == "2"){
                                 document.getElementById("cdasolicitudinformacion-causa_anulacion").disabled = true;
                                document.getElementById("cdasolicitudinformacion-causa_correccion").disabled = false;
                              }else{
                                document.getElementById("cdasolicitudinformacion-causa_anulacion").disabled = true;
                                document.getElementById("cdasolicitudinformacion-causa_correccion").disabled = true;
                              }
                          });']); ?>

            </td>
        </tr>
        
        <tr>
            <td>
                 <?= $form->field($model, 'causa_anulacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Causa',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Causa',
                                        'disabled' => $botondisabled
                                         ]); ?>
            </td>
            <td>
                <?= $form->field($model, 'causa_correccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Causa',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Causa',
                                         'disabled' => $botondisabled
                                         ]); ?>
            </td>
        </tr>
        
        <tr>
            <td>
                <?= $form->field($model, 'observaciones')->textarea([
                                    'maxlength' => true,
                                    'title' => 'Indique Observaciones',
                                    'data-toggle' => 'tooltip',
                                    'placeholder'=>'Indique Observaciones'        
                                     ]) ?>
            </td>
            <td>
                <?php //  $form->field($model, 'fecha_salida')->widget(DateTimePicker::classname(), [
//                            'options' => ['placeholder' => 'Seleccione fecha y hora'],
//                            'pluginOptions' => [
//                                    'autoclose' => true,
//                                    'format' => Yii::$app->fmtfechahoradatepicker
//                            ]
//                    ]);
                ?>
            </td>
        </tr>
    </table>
      
      


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


