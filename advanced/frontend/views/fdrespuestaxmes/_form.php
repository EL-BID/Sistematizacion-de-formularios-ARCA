<style>
    
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
    }
</style>  

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdRespuestaXMes */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-respuesta-xmes-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>
    
     
    
     <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="6"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        
        
       <!------------------------------------------pregunta Descrcipcion---------------------------------->
        <tr>
            <td class="labelpregunta" ><?= $numerar; ?>.1 Descripción:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Ingrese un valor decimal separe decimales con '.' ", 
                                          "data-toggle" => "tooltip", 
                                        ] ); ?> 
              </td>
              <td class="inputpregunta" colspan="5">
                                     <?= (empty($tipo_select))? $form->field($model, 'descripcion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Descripcion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Descripcion'        
                                         ])->label(false):
                    
                                     $form->field($model, 'id_opcion_select')
                                    ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdOpcionSelect::find()->where("id_tselect=$tipo_select")->all(),
                                    'id_opcion_select','nom_opcion_select'),['prompt'=>'Seleccione un valor'])->label(false);
                                    ?>
                  
              </td>
            
        </tr>
        
        <!----------------------------------------PREGUNTAS ENERO, FEBRERO Y MARZO------------------------------------------>
        <tr>
            <td class="labelpregunta"><?= $numerar; ?>.2 Enero:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta">
                 <?= $form->field($model, 'ene_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => '',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>''        
                                         ])->label(false) ?>
                
                
            </td>
            
            <td class="labelpregunta"><?= $numerar; ?>.2 Febrero:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta">
                 <?= $form->field($model, 'feb_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => '',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>''        
                                         ])->label(false) ?>
                
                
            </td>
            
            <td class="labelpregunta"><?= $numerar; ?>.3 Marzo:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta">
                 <?= $form->field($model, 'mar_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => '',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>''        
                                         ])->label(false) ?>
                
                
            </td>
            
        </tr>
        
        <!----------------------------------------ABRIL MAYO Y JUNIO------------------------------------------------------------->
         <tr>
            <td class="labelpregunta"><?= $numerar; ?>.4 Abril:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta">
                 <?= $form->field($model, 'abr_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => '',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>''        
                                         ])->label(false) ?>
                
                
            </td>
            
            <td class="labelpregunta"><?= $numerar; ?>.5 Mayo:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta">
                 <?= $form->field($model, 'may_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => '',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>''        
                                         ])->label(false) ?>
                
                
            </td>
            
            <td class="labelpregunta"><?= $numerar; ?>.6 Junio:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta">
                 <?= $form->field($model, 'jun_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => '',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>''        
                                         ])->label(false) ?>
                
                
            </td>
            
        </tr>
        
        
        
        <!----------------------------------------JULIO AGOSTO SEPTIEMBRE------------------------------------------------------------->
         <tr>
            <td class="labelpregunta"><?= $numerar; ?>.7 Julio:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta">
                 <?= $form->field($model, 'jul_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => '',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>''        
                                         ])->label(false) ?>
                
                
            </td>
            
            <td class="labelpregunta"><?= $numerar; ?>.8 Agosto:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta">
                 <?= $form->field($model, 'ago_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => '',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>''        
                                         ])->label(false) ?>
                
                
            </td>
            
            <td class="labelpregunta"><?= $numerar; ?>.9 Septiembre:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta">
                 <?= $form->field($model, 'sep_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => '',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>''        
                                         ])->label(false) ?>
                
                
            </td>
            
        </tr>
        
        <!----------------------------------------OCTUBRE NOVIEMBRE DICIEMBRE------------------------------------------------------------->
         <tr>
            <td class="labelpregunta"><?= $numerar; ?>.10 Octubre:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta">
                 <?= $form->field($model, 'oct_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => '',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>''        
                                         ])->label(false) ?>
                
                
            </td>
            
            <td class="labelpregunta"><?= $numerar; ?>.11 Noviembre:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta">
                 <?= $form->field($model, 'nov_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => '',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>''        
                                         ])->label(false) ?>
                
                
            </td>
            
            <td class="labelpregunta"><?= $numerar; ?>.12 Diciembre:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione una Provincia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?></td>
            
            <td class="inputpregunta">
                 <?= $form->field($model, 'dic_decimal')->textInput([
                                        'maxlength' => true,
                                        'title' => '',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>''        
                                         ])->label(false) ?>
                
                
            </td>
            
        </tr>
     </table>


    <?php //$form->field($model, 'id_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdRespuesta::find()->all(),'id_respuesta','id_respuesta'),['prompt'=>'Indique el valor para id_respuesta']) ?>

    <?php //$form->field($model, 'id_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_pregunta','id_pregunta'),['prompt'=>'Indique el valor para id_pregunta']) ?>

   
    <?php /*$form->field($model, 'id_respuesta_x_mes')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Respuesta X Mes',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Respuesta X Mes'        
                                         ])*/ ?>

    <div class="form-group"  style="text-align:right">
        <?= ($botton === FALSE )? Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']):'' ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    