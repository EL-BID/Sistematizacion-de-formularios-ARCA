<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdOperacionplantaApscom */
/* @var $form yii\widgets\ActiveForm */
SweetSubmitAsset::register($this)
?>

<div class="fd-operacionplanta-apscom-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); 
    ?>

   <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>                    
            <td class="labelpregunta"> ¿Dispone de manual de operación del método aplicado para tratamiento?
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Indicar si dispone de un manual de operación del método aplicado para tratamiento", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'manual_operacion')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_tselect, 'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione una opción'])->label(false); ?>       
            </td>           
        </tr>
        <tr>                    
            <td class="labelpregunta"> ¿Se realiza la operación de la planta en base al manual?
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Indicar si se realiza la operación de la planta en base al manual", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'operacion_planta')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_tselect,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione una opción'])->label(false); ?>       
            </td>           
        </tr>
        <tr>                    
            <td class="labelpregunta">¿Existe personal capacitado?
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Indicar si existe personal capacitado", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'personal_capacitado')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_tselect,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione una opción'])->label(false); ?>       
            </td>           
        </tr>
        <tr>                    
            <td class="labelpregunta">Frecuencia de mantenimiento
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Seleccione la frecuencia con la que se realiza mantenimiento", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'frecuencia_mantenimiento')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_fecuencia,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione una opción'])->label(false); ?>       
            </td>           
        </tr>
        <tr>                    
            <td class="labelpregunta">Problemas identificados
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Seleccione un problema", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'problemas')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_problemas,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione una opción','onchange' => 'Mostrar_especifique(this)'])->label(false); ?>       
            </td>           
        </tr>  
        <tr>
            <td class="labelpregunta"></td>                                          
                <td class="inputpregunta">  <?= ($bande=== true) ? $form->field($model, 'especifique')->textInput(['maxlength' => 50,'style' => 'display: block'])->label('Especifique',['id'=>'label_especifique','style' => 'display: block']) : $form->field($model, 'especifique')->textInput(['maxlength' => 50,'style' => 'display: none'])->label('Especifique',['id'=>'label_especifique','style' => 'display: none'])  ?>   
                </td>  
      </tr>
   </table>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function Mostrar_especifique(campo)
    {     
        var id =campo.id;
        var selObj = document.getElementById(id);
        var selIndex = selObj.options[selObj.selectedIndex].text;
        
        if(selIndex=='Otro (indicar)')
        {            
            document.getElementById('fdoperacionplantaapscom-especifique').style.display="block";        
            document.getElementById('label_especifique').style.display="block";
        }
        else
        {
            document.getElementById('fdoperacionplantaapscom-especifique').value="";
            document.getElementById('fdoperacionplantaapscom-especifique').style.display ="none";        
            document.getElementById('label_especifique').style.display ="none"; 
        }
    }
</script>