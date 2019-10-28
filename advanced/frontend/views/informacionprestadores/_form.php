<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/


/* @var $this yii\web\View */
/* @var $model common\models\poc\Informacionprestadores */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this);
?>

<div class="informacionprestadores-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <table class="tbcapitulo">        
        <tr>
            <td class="labelpregunta">1.1.1. ¿Existen otros prestadores o juntas dentro de su cabecera cantonal?
                <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                ,'#',
                ['title' => 'Seleccione una opción SI o NO',
                'data-toggle' => 'tooltip',
                ]); ?>   
            </td>
            <td class="inputpregunta"> <?= $form->field($model, 'posee_prestadores')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_tselect,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione','onchange'=>'BloquearCampos(this);'])->label(false); ?>       
            </td>     
        </tr>
        <tr>                    
            <td class="labelpregunta">1.1.2. ¿Cantidad de prestadores comunitarios en la localidad?
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Indique el número de prestadores comuntarios", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>
            <td>
                <?= $form->field($model, 'numero_prestadores')->textInput(['maxlength' => 4, 'onkeypress'=>'return soloNumeros(event,this)'])->label(false); ?>
            </td>      
        </tr>
        <tr>                    
            <td class="labelpregunta">1.1.3. ¿Cantidad de prestadores comunitarios con reconocimiento Legal?
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Indique el número de prestadores comuntarios con reconocimiento legal", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>
            <td>
                <?= $form->field($model, 'numero_prestadores_legal')->textInput(['maxlength' => 4, 'onkeypress'=>'return soloNumeros(event,this)'])->label(false); ?>
            </td>      
        </tr>
        <tr>                    
            <td class="labelpregunta">1.1.4. ¿Cantidad de prestadores comunitarios con apoyo económico?
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Indique el número de prestadores comuntarios con apoyo económico", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>
            <td>
                <?= $form->field($model, 'numero_prestadores_economico')->textInput(['maxlength' => 4, 'onkeypress'=>'return soloNumeros(event,this)'])->label(false); ?>
            </td>      
        </tr>
        <tr>                    
            <td class="labelpregunta">1.1.5. ¿Cantidad de prestadores comunitarios con apoyo técnico?
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Indique el número de prestadores comuntarios con apoyo técnico", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>
            <td>
                <?= $form->field($model, 'numero_prestadores_tecnico')->textInput(['maxlength' => 4, 'onkeypress'=>'return soloNumeros(event,this)'])->label(false); ?>
            </td>      
        </tr>
    </table>
    


    <div class="form-group"><br/>
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','onclick' => $model->isNewRecord ? 'return ValidarPrestadores();' : 'return ValidarPrestadores();']) ?>
    </div>
    <script>
        function BloquearCampos(campo)
        {
             var valor = campo.value;
             if(valor==2)
                {
                    document.getElementById('informacionprestadores-numero_prestadores').disabled=true;
                    document.getElementById('informacionprestadores-numero_prestadores_legal').disabled=true;
                    document.getElementById('informacionprestadores-numero_prestadores_economico').disabled=true;
                    document.getElementById('informacionprestadores-numero_prestadores_tecnico').disabled=true;
                    
                    document.getElementById('informacionprestadores-numero_prestadores').value ='';
                    document.getElementById('informacionprestadores-numero_prestadores_legal').value ='';
                    document.getElementById('informacionprestadores-numero_prestadores_economico').value ='';
                    document.getElementById('informacionprestadores-numero_prestadores_tecnico').value ='';
                }
                else
                {
                     document.getElementById('informacionprestadores-numero_prestadores').disabled=false;
                    document.getElementById('informacionprestadores-numero_prestadores_legal').disabled=false;
                    document.getElementById('informacionprestadores-numero_prestadores_economico').disabled=false;
                    document.getElementById('informacionprestadores-numero_prestadores_tecnico').disabled=false;                        
                }
        }
        function ValidarPrestadores()
        {            
            var valor2 = document.getElementById('informacionprestadores-posee_prestadores').value;
            var campo = document.getElementById('informacionprestadores-posee_prestadores');
            console.log(valor2);
            if(valor2==2)
                {
                    alertify.alert('Mensaje','La opción seleccionada no es correcta ').set('label', 'Aceptar').set({transition:'zoom'}).set('onfocus', function(){ campo.focus();}).show();
                    return false;
                }
            var valor = document.getElementById('informacionprestadores-numero_prestadores').value;
            var campo2 = document.getElementById('informacionprestadores-numero_prestadores');
            if(valor=='' || valor==0)
                {
                    alertify.alert('Mensaje','Debe ingresar un valor en el campo cantidad de prestadores ').set('label', 'Aceptar').set({transition:'zoom'}).set('onfocus', function(){campo2.value='';  campo2.focus();}).show();
                    return false;
                }
                return true;
        }
    </script>
    <?php ActiveForm::end(); ?>

</div>