<style>
    
   /* .tbcapitulo{
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
/* @var $model common\models\poc\FdInvolucrado */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-involucrado-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>
    
     <!--div class="form-group"  style="text-align:right">
        <?= ($botton === FALSE )? Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']):'' ?>
    </div-->


     <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="2"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
             <td class="labelpregunta"><?= $numerar; ?>1. Nombre:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Asigne valor de x en metros", 
                                          "data-toggle" => "tooltip", 
                                        ] ); ?>  
            </td>
            <td class="inputpregunta">
                    <?= $form->field($model, 'nombre')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombre',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombre'        
                                         ])->label(false); ?>
            </td>
            
        </tr>
        <tr>
            <td class="labelpregunta"><?= $numerar; ?>2. Telefono Convencional:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Asigne valor de x en metros", 
                                          "data-toggle" => "tooltip", 
                                        ] ); ?>  
            </td>
            
             <td class="inputpregunta">
                  <?= $form->field($model, 'telefono_convencional')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Telefono Convencional',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Telefono Convencional'        
                                         ])->label(false); ?>
             </td>     
        </tr>
        
        <tr>
            <td class="labelpregunta"><?= $numerar; ?>3. Celular:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Asigne valor de x en metros", 
                                          "data-toggle" => "tooltip", 
                                        ] ); ?>  
            </td>
            
             <td class="inputpregunta">
                 <?= $form->field($model, 'celular')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Celular',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Celular'        
                                         ])->label(false); ?>
             </td>     
        </tr>
        
         <tr>
            <td class="labelpregunta"><?= $numerar; ?>4. Correo:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Asigne valor de x en metros", 
                                          "data-toggle" => "tooltip", 
                                        ] ); ?>  
            </td>
            
             <td class="inputpregunta">
                 <?= $form->field($model, 'correo_electronico')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Correo Electronico',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Correo Electronico'        
                                         ])->label(false); ?>
             </td>     
        </tr>
    
     </table>
   

    

   

    <?php //$form->field($model, 'id_conjunto_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdConjuntoRespuesta::find()->all(),'id_conjunto_respuesta','id_conjunto_respuesta'),['prompt'=>'Indique el valor para id_conjunto_respuesta']) ?>

    <?php //$form->field($model, 'id_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_pregunta','id_pregunta'),['prompt'=>'Indique el valor para id_pregunta']) ?>

    <?php //$form->field($model, 'id_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdRespuesta::find()->all(),'id_respuesta','id_respuesta'),['prompt'=>'Indique el valor para id_respuesta']) ?>

   <div class="form-group"  style="text-align:right">
        <?= ($botton === FALSE )? Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']):'' ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
