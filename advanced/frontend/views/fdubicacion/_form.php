<style>
   /* 
    .tbcapitulo{
        margin: 0 auto;
        width: 90%;
        border: 1px solid #000;
    }
    
    .nomcapitulo{
        font-size: 1.3em;
        color:#8CD4F5;
        font-weight: bolder;
        border: solid 2px #000;
    }
    
    .tbseccion{
       width: 100%; 
    }
    .titleseccion{
       font-size: 1.2em;
       font-weight: bolder;
       background-color: #C7CCD1;
       border-bottom: solid 1px #ccc;
    }
    
    .labelpregunta{
        border: dotted 1px #000;
        border-bottom: solid 1px #ccc;
        padding: 2px 2px;
        font-size:0.9em;
        width: 25%;
        color:#0044cc;
        
    }
    
     .inputpregunta{
        border-right: solid 1px #000;
        border-bottom: solid 1px #ccc;
        padding: 2px 2px;
    }*/
</style>  
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdUbicacion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-ubicacion-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>
    
    <!--div class="form-group"  style="text-align:right">
       <?= ($botton === FALSE )? Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']):'' ?>
    </div-->


    <?php /*$form->field($model, 'id_ubicacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Ubicacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Ubicacion'        
                                         ])*/ ?>
    
    <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        
        <tr>
            
            <!----------------------------------------------------PREGUNTA PARA PROVINCIA--------------------------------------------------->
            <td class="labelpregunta"><?= $numerar; ?>1. Provincia:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                        ] ); ?>  
            </td>
            <td class="inputpregunta"><?= $form->field($model, 'cod_provincia')
                         ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(),'cod_provincia','nombre_provincia'),
                           ['prompt'=>'Seleccione una provincia',"disabled" => $botton,
                          'onchange'=>'$.post("index.php?r=fdubicacion/listado&id='.'"+$(this).val(),function(data){
                              $("#fdubicacion-cod_canton").html(data);
                          });'])->label(false) ?></td>
            
            
            <!----------------------------------------------------PREGUNTA PARA DEMARCACION HIDROGRAFICAS--------------------------------------------------->
           
            <td class="labelpregunta"><?= $numerar; ?>4. Demarcacion Hidrográfica:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione Demarcación Hidrográfica", 
                                          "data-toggle" => "tooltip", 
                                        ] ); ?>  
            </td>
            
            <?php
            if($model->isNewRecord){
                
            ?>
                <td class="inputpregunta"><?= $form->field($model, 'id_demarcacion')
                                          ->dropDownList([],['prompt'=>'Seleccione una Demarcación',"disabled" => $botton,'onchange'=>'$.post("index.php?r=fdubicacion/centrociudadano&id='.'"+$(this).val(),function(data){
                                                $("#fdubicacion-cod_centro_atencion_ciudadano").html(data);
                                            });'])->label(false) ?></td>
           <?php
            }else{
           ?>     
                <td class="inputpregunta"><?= $form->field($model, 'id_demarcacion')
                                            ->dropDownList(\yii\helpers\ArrayHelper::map($demarcacionespost,'id_demarcacion','nombre_demarcacion'),
                                            ['prompt'=>'Seleccione una Demarcación',"disabled" => $botton,
                                            'onchange'=>'$.post("index.php?r=fdubicacion/centrociudadano&id='.'"+$(this).val(),function(data){
                                                $("#fdubicacion-cod_centro_atencion_ciudadano").html(data);
                                            });'])->label(false) ?></td>
      
                
           <?php     
            }
           ?>
        </tr>
        
        <tr>
            
            <!----------------------------------------------------PREGUNTA PARA CANTONES--------------------------------------------------->

            <td class="labelpregunta"><?= $numerar; ?>2. Cantón:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "", 
                                          "data-toggle" => "tooltip", 
                                        ] ); ?> 
            </td>
            
            <?php
            if($model->isNewRecord){
                
            ?>
                    <td class="inputpregunta"> <?= $form->field($model, 'cod_canton')
                                                    ->dropDownList([],['prompt'=>'Seleccione un Canton',"disabled" => $botton,
                                                        'onchange'=>'$.post("index.php?r=fdubicacion/listadopd&id_prov='.'"+$("#fdubicacion-cod_provincia :selected").val()+"'.'&id='.'"+$(this).val(),function(data){
                                                        var res = data.split("::");
                                                        $("#fdubicacion-id_demarcacion").html(res[0]);
                                                        $("#fdubicacion-cod_parroquia").html(res[1]);
                                                    });'])->label(false) ?></td>
            
             <?php
            }else{
            ?>  
                  <td class="inputpregunta"> <?= $form->field($model, 'cod_canton')
                                            ->dropDownList(\yii\helpers\ArrayHelper::map($cantonesPost,'cod_canton','nombre_canton'),['prompt'=>'Seleccione un Canton',"disabled" => $botton,
                                                'onchange'=>'$.post("index.php?r=fdubicacion/listadopd&id_prov='.'"+$("#fdubicacion-cod_provincia :selected").val()+"'.'&id='.'"+$(this).val(),function(data){
                                                var res = data.split("::");
                                                $("#fdubicacion-id_demarcacion").html(res[0]);
                                                $("#fdubicacion-cod_parroquia").html(res[1]);
                                            });'])->label(false) ?></td>
            
            <?php     
            }
           ?>
            
            <td class="labelpregunta"><?= $numerar; ?>5. Centro de Atencion al Ciudadano:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Centro de atención al ciudadano", 
                                          "data-toggle" => "tooltip", 
                                        ] ); ?>   
            </td>
            
             <?php
            if($model->isNewRecord){
                
            ?>
                <td class="inputpregunta"><?= $form->field($model, 'cod_centro_atencion_ciudadano')
                                          ->dropDownList([],['prompt'=>'Seleccione un Centro',"disabled" => $botton])->label(false) ?></td>
           <?php
            }else{
           ?>     
                <td class="inputpregunta"><?= $form->field($model, 'cod_centro_atencion_ciudadano')
                                            ->dropDownList(\yii\helpers\ArrayHelper::map($centrosPost,'cod_centro_atencion_ciudadano','nom_centro_atencion_ciudadano'),
                                            ['prompt'=>'Seleccione un centro',"disabled" => $botton])->label(false) ?></td>
      
                
           <?php     
            }
           ?>                           
        </tr>
        
        <tr>
            <td class="labelpregunta"><?= $numerar; ?>3. Parroquia:
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Parroquia", 
                                          "data-toggle" => "tooltip", 
                                        ] ); ?>   
            </td>
            
            <?php
            if($model->isNewRecord){
                
            ?>
            <td class="inputpregunta"> <?= $form->field($model, 'cod_parroquia')
                                        ->dropDownList([],
                                        ['prompt'=>'Indique la parroquia',"disabled" => $botton])->label(false) ?></td>

            <?php
            }else{
            ?>
            <td class="inputpregunta"> <?= $form->field($model, 'cod_parroquia')
                                        ->dropDownList(\yii\helpers\ArrayHelper::map($parroquiasPost,'cod_parroquia','nombre_parroquia'),
                                        ['prompt'=>'Indique la parroquia',"disabled" => $botton])->label(false) ?></td>
            <?php     
            }
           ?>
            
            <td class="labelpregunta"></td>
            <td class="inputpregunta"></td>
        </tr>
        <tr>
            <td class="labelpregunta" colspan="4"><?= $numerar; ?>6. Descripción Ubicación:
                                                   <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Descripción", 
                                          "data-toggle" => "tooltip", 
                                        ] ); ?>   
            </td>
        </tr>
        <tr>
            <td class="inputpregunta" colspan="4"><?= $form->field($model, 'descripcion_ubicacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Descripción Ubicación',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Descripción Ubicación',
                                        "disabled" => $botton
                                         ])->label(false) ?></td>
        </tr>
        
    </table>

    <?php /*$form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) 

    $form->field($model, 'id_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_pregunta','id_pregunta'),['prompt'=>'Indique el valor para id_pregunta']) 
    $form->field($model, 'id_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdRespuesta::find()->all(),'id_respuesta','id_respuesta'),['prompt'=>'Indique el valor para id_respuesta'])*/ ?>

    <div class="form-group"  style="text-align:right">
        <?= ($botton === FALSE )? Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']):'' ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
