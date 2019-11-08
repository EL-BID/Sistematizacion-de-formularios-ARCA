<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
use common\models\poc\FdTipoSelect;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdBombasCaptacion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>
<script>
    function Mostrar_especifique_material(campo)
    {     

       var id =campo.id;

       var selObj = document.getElementById(id);
       var selIndex = selObj.options[selObj.selectedIndex].text;
       if(selIndex=='Otro material')
        {            
            document.getElementById('fdbombascaptacion-especifique_material_caseta').style.display="block";        
            document.getElementById('label_especifique1').style.display="block";
        }
        else
        {
            document.getElementById('fdbombascaptacion-especifique_material_caseta').value='';
            document.getElementById('fdbombascaptacion-especifique_material_caseta').style.display ="none";        
            document.getElementById('label_especifique1').style.display ="none"; 
        } 
    }
    
    function Mostrar_especifique_problemas(campo)
    {     

       var id =campo.id;

       var selObj = document.getElementById(id);
       var selIndex = selObj.options[selObj.selectedIndex].text;
       if(selIndex=='Otros problemas')
        {            
            document.getElementById('fdbombascaptacion-especifique_problema_bomba').style.display="block";        
            document.getElementById('especifique_probl').style.display="block";
        }
        else
        {
            document.getElementById('fdbombascaptacion-especifique_problema_bomba').value='';
            document.getElementById('fdbombascaptacion-especifique_problema_bomba').style.display ="none";        
            document.getElementById('especifique_probl').style.display ="none"; 
        } 
    }
  
</script>

<div class="fd-bombas-captacion-form">

    
    
    
    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); 
    $_nombrevalormaterial = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'MATERIAL TUBERIA'])
                        ->one();
                $valor_tselectmaterial= $_nombrevalormaterial->id_tselect;
              
    $_nombrevalorestado = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'ESTADO CONDUCCION'])
                        ->one();
                $valor_tselectestado= $_nombrevalorestado->id_tselect;
                
    $_nombrevalorfrecuencia = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'FRECUENCIA MANTENIMIENTO BOMBA'])
                        ->one();
                $valor_tselectfrecuencia= $_nombrevalorfrecuencia->id_tselect;
    
    $_nombrevalorproblema = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'PROBLEMA BOMBA'])
                        ->one();
                $valor_tselectproblema= $_nombrevalorproblema->id_tselect;
    
               
                
    ?>

<table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpregunta">Nombre o lugar de la bomba: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Nombre captacion',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
	   <td>
              <?= $form->field($model, 'nombre_bomba')->textInput([
                                        'maxlength' => 200,
                                        'title' => 'Indique Nombre Bomba',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombre Bomba'           
                                         ])->label(false); ?>
           </td>
        </tr>      
      
        <tr>                    
            <td class="labelpregunta">Material de la tubería
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione material", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_material_tuberia')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectmaterial])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione material'])->label(false); ?>       
            </td>           
           </tr>

        <tr>                    
            <td class="labelpregunta">Estado de la bomba
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione estado de la bomba", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_estado_tuberia')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectestado])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione estado de la bomba'])->label(false); ?>       
            </td>           
           </tr>   
           
           
           <tr>                    
            <td class="labelpregunta">Frecuencia de mantenimiento de la bomba
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione frecuencia", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_frec_mantenimiento')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectfrecuencia])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione frecuencia'])->label(false); ?>       
            </td>           
           </tr>  
           
           
        <tr>
            <td class="labelpregunta">Año de instalación de la bomba: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Anio de instalacion',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
	   <td>
              <?= $form->field($model, 'anio_instalacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Anio Instalacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Anio Instalacion'           
                                         ])->label(false); ?>
           </td>
        </tr>  
        <tr>                    
            <td class="labelpregunta">Problemas de las bombas:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Problemas de las bombas", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_problema_bomba')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectproblema])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un problema','onchange' => 'Mostrar_especifique_problemas(this)'])->label(false); ?>       
            </td>           
           </tr>
           <tr>                    
            <td class="labelpregunta"></td>            
            <td class="inputpregunta"> <?= $form->field($model, 'especifique_problema_bomba')->textInput(['maxlength' => 50,'style' => 'display:none'])->label('Especifique',['id'=>'especifique_probl','style' => 'display:none']); ?>   
            </td>           
           </tr>
           <tr>
            <td class="labelpregunta">Observaciones 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Observaciones',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
	   <td>
              <?= $form->field($model, 'observaciones')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Observaciones',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Observaciones'           
                                         ])->label(false); ?>
           </td>
        </tr>
</table>    
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
