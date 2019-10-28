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
            <td class="labelpregunta"> Ubicación del tanque
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Ingrese una ubicación", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>

            <td class="inputpregunta">  <?= $form->field($model, 'ubicacion_tanque')->textInput([
                                        'maxlength' => 200,
                                        'title' => 'Indique ubicación tanque',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique ubicación del tanque'        
                                         ])->label(false); ?>  
            </td>           
        </tr>
        <tr>                    
            <td class="labelpregunta">Capacidad del tanque (metros cúbicos)
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Ingrese la capacidad del tanque en m3", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>
            <td class="inputpregunta">  <?= $form->field($model, 'capacidad_tanque')->textInput([
                                        'maxlength' => 27,
                                        'onkeypress'=> 'return NumCheck(event,this)',
                                        'title' => 'Indique capacidad del tanque',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique capacidad del tanque'        
                                         ])->label(false); ?>  
            </td>           
        </tr>
        <tr>                    
            <td class="labelpregunta">¿Realiza la medición a la entrada del tanque?
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Seleccione una opción", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'medicion_entrada')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_tselect,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione una opción'])->label(false); ?>       
            </td>           
        </tr>
       <tr>                    
            <td class="labelpregunta">Material
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Seleccione un tipo de material", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'material')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_material,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione una opción','onchange' => 'Mostrar_especifique(this)'])->label(false); ?>       
            </td>           
        </tr>
       <tr>
            <td class="labelpregunta"></td>                                          
                <td class="inputpregunta">  <?= ($bande=== true) ? $form->field($model, 'especifique')->textInput(['maxlength' => 50,'style' => 'display: block'])->label('Especifique',['id'=>'label_especifique','style' => 'display: block']) : $form->field($model, 'especifique')->textInput(['maxlength' => 50,'style' => 'display: none'])->label('Especifique',['id'=>'label_especifique','style' => 'display: none'])  ?>   
                </td>  
      </tr>
        <tr>                    
            <td class="labelpregunta">Frecuencia de mantenimiento
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Seleccione una opción para frecuencia", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'frecuencia_mantenimiento')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_fecuencia,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione una opción'])->label(false); ?>       
            </td>           
        </tr>
       <tr>                    
            <td class="labelpregunta">Estado de la estructura del tanque
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Seleccione un estado de la estructura del tanque", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'estado_tanque')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_estado,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione una opción'])->label(false); ?>       
            </td>           
        </tr>
        <tr>                    
            <td class="labelpregunta">Problemas identificados
                <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                ,"#", 
                ["title" => "Seleccione una opción para problemas", 
                "data-toggle" => "tooltip", 
                ] ); ?>
            </td>

            <td class="inputpregunta"> <?= $form->field($model, 'problemas')->dropDownList(
                \yii\helpers\ArrayHelper::map($valor_problemas,'id_opcion_select','nom_opcion_select'),
                ['prompt'=>'Seleccione una opción'])->label(false); ?>       
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
        
        if(selIndex=='Otros')
        {            
            document.getElementById('fdtanquesalmacenaapscom-especifique').style.display="block";        
            document.getElementById('label_especifique').style.display="block";
        }
        else
        {
            document.getElementById('fdtanquesalmacenaapscom-especifique').value="";
            document.getElementById('fdtanquesalmacenaapscom-especifique').style.display ="none";        
            document.getElementById('label_especifique').style.display ="none"; 
        }
    }
</script>