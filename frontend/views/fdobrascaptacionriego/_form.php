<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;   /* Para la confirmacion, ver archivo web/js/yiioverride */
use yii\jui\DatePicker;     /* Libreria para el modulo de fechas */
use common\models\poc\FdTipoSelect;
use common\models\poc\FdObrasCaptacionRiego;
use common\models\poc\FdOpcionSelect;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdObrasCaptacionRiego */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>
<script>
    function Mostrar_especifique(campo)
    {     
        var id =campo.id;
        var selObj = document.getElementById(id);
        var selIndex = selObj.options[selObj.selectedIndex].text;
        
        if(selIndex=='Otro')
        {            
            document.getElementById('fdobrascaptacionriego-especifique').style.display="block";        
            document.getElementById('label_especifique').style.display="block";
        }
        else
        {
            document.getElementById('fdobrascaptacionriego-especifique').value="";
            document.getElementById('fdobrascaptacionriego-especifique').style.display ="none";        
            document.getElementById('label_especifique').style.display ="none"; 
        }
    }
    
        function Mostrar_especifique_ubicacion(campo)
    {     
        var id =campo.id;
        var selObj = document.getElementById(id);
        var selIndex = selObj.options[selObj.selectedIndex].text;
        
        if(selIndex=='Otro')
        {            
            document.getElementById('fdobrascaptacionriego-especifique_ubicacion').value ="";
            document.getElementById('fdobrascaptacionriego-especifique_ubicacion').style.display="block";        
            document.getElementById('label_especifiqueu').style.display="block";
        }
        else
        {
            document.getElementById('fdobrascaptacionriego-especifique_ubicacion').style.display ="none";        
            document.getElementById('label_especifiqueu').style.display ="none"; 
        }
    }
</script>

<div class="fd-obras-captacion-riego-form">

    <?php
    $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
                ]
            ]);
    ?>
    <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpregunta">Número obras 
                <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                ,'#',
                ['title' => 'Número obras',
                'data-toggle' => 'tooltip',
                ]); ?>   
            </td>
            <td>
                <?= $form->field($model, 'numero_obras')->textInput(['maxlength' => 2])->label(false); ?>
            </td>
        </tr>
        <tr>                    
            <td class="labelpregunta">Tipo obra
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Seleccione un tipo de obra de captación", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'tipo_obra')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_tselect,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione una obra captación','onchange' => 'Mostrar_especifique(this)'])->label(false); ?>       
            </td>           
        </tr>
        <tr>
            <td class="labelpregunta"></td>                 
                <td class="inputpregunta">  <?= ($bande=== true) ? $form->field($model, 'especifique')->textInput(['maxlength' => 50,'style' => 'display: block', 'onkeyup'=>'return soloMayusculas(event,this)'])->label('Especifique',['id'=>'label_especifique','style' => 'display: block']) : $form->field($model, 'especifique')->textInput(['maxlength' => 50,'style' => 'display: none','onkeyup'=>'return soloMayusculas(event,this)'])->label('Especifique',['id'=>'label_especifique','style' => 'display: none'])  ?>   
                </td>  
        </tr>
        <tr>
            <td class="labelpregunta">Estado obra
                <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                ,'#',
                ['title' => 'Estado obra',
                'data-toggle' => 'tooltip',
                ]); ?>   
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'estado_obra')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_tselectestado,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione el estado de la obra'])->label(false); ?>

            </td>
        </tr>

        <tr>
            <td class="labelpregunta">Ubicación obra
                <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                ,'#',
                ['title' => 'Ubicación obra',
                'data-toggle' => 'tooltip',
                ]); ?>   
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'ubicacion_obra')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_tselectubicacion,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione la ubicación de la obra','onchange' => 'Mostrar_especifique_ubicacion(this)'])->label(false); ?>

            </td>
        </tr>
        <tr>
            <td class="labelpregunta"></td> 
                <td class="inputpregunta">  <?= ($bande=== true) ? $form->field($model, 'especifique_ubicacion')->textInput(['maxlength' => 50,'style' => 'display: block','onkeyup'=>'return soloMayusculas(event,this)'])->label('Especifique ubicación',['id'=>'label_especifiqueu','style' => 'display: block']) : $form->field($model, 'especifique_ubicacion')->textInput(['maxlength' => 50,'style' => 'display: none','onkeyup'=>'return soloMayusculas(event,this)'])->label('Especifique ubicación',['id'=>'label_especifiqueu','style' => 'display: none'])  ?>   
                </td>  
        </tr>
    </table>    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
