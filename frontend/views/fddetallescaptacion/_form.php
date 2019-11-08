<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
use common\models\poc\FdTipoSelect;
use common\models\poc\FdDetallesCaptacion;
use common\models\poc\FdOpcionSelect;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDetallesFuente */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>
<script>
    function Mostrar_especifique_material(campo)
    {     

       var id =campo.id;

       var selObj = document.getElementById(id);
       var selIndex = selObj.options[selObj.selectedIndex].text;
       if(selIndex=='Otros materiales')
        {            
            document.getElementById('fddetallescaptacion-especifique_mat_estr').style.display="block";        
            document.getElementById('label_especifique1').style.display="block";
        }
        else
        {
            document.getElementById('fddetallescaptacion-especifique_mat_estr').value='';
            document.getElementById('fddetallescaptacion-especifique_mat_estr').style.display ="none";        
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
            document.getElementById('fddetallescaptacion-especifique_probl').style.display="block";        
            document.getElementById('label_especifique2').style.display="block";
        }
        else
        {
            document.getElementById('fddetallescaptacion-especifique_probl').value='';
            document.getElementById('fddetallescaptacion-especifique_probl').style.display ="none";        
            document.getElementById('label_especifique2').style.display ="none"; 
        } 
    }
     function Mostrar_especifique_t_medicion(campo)
    {     

       var id =campo.id;

       var selObj = document.getElementById(id);
       var selIndex = selObj.options[selObj.selectedIndex].text;
       
       
        if(selIndex=='Otros')
        {            
            document.getElementById('fddetallescaptacion-especifique_t_med').style.display="block";        
            document.getElementById('label_especifique').style.display="block";
        }
        else
        {
            document.getElementById('fddetallescaptacion-especifique_t_med').value='';
            document.getElementById('fddetallescaptacion-especifique_t_med').style.display ="none";        
            document.getElementById('label_especifique').style.display ="none"; 
        }
    }
    
    
</script>
<div class="fd-detalles-fuente-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); 
    $_nombrevalorcuenta = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'SI/NO'])
                        ->one();
                $valor_tselectcuenta= $_nombrevalorcuenta->id_tselect;
    
    $_nombrevalormaterial = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'MATERIAL ESTRUCTURA CAPT'])
                        ->one();
                $valor_tselectmaterial= $_nombrevalormaterial->id_tselect;
    
    $_nombrevalorproblemas = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'PROBLEMA ESTRUCTURA CAPT'])
                        ->one();
                $valor_tselectproblemas= $_nombrevalorproblemas->id_tselect;             
                
    $_nombrevalorestado = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'ESTADO ESTRUCTURA CAPT'])
                        ->one();
                $valor_tselectestado= $_nombrevalorestado->id_tselect;
    
    $_nombrevalortipomed = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'TIPO DE MEDICION'])
                        ->one();
                $valor_tselecttipomed= $_nombrevalortipomed->id_tselect;
    
   $id = @$_GET['id'];       
   $bande = false;             
   if (!empty($id)) {
        $_detfuente = FdDetallesCaptacion::find()
                ->where(['id_detalles_captacion' => $id])
                ->one();
        $valor_capta = $_detfuente->id_t_medicion;



        $otros = FdOpcionSelect::find()
                ->where(['id_opcion_select' => $valor_capta])
                ->one();
        
        $nom_otros ="";
        if(!empty($otros))
            $nom_otros = $otros->nom_opcion_select;
        if ($nom_otros == "Otros") {
            $bande = true;
        }
    }             
                
                
    ?>

    <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpregunta">Nombre de la captación: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Nombre captacion',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
	   <td>
              <?= $form->field($model, 'nombre_captacion')->textInput([
                                        'maxlength' => 200,
                                        'title' => 'Indique Nombre Captacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombre Captacion'           
                                         ])->label(false); ?>
           </td>
        </tr>      
        <tr>                    
            <td class="labelpregunta">Cuenta con estructura hidráulica de captación:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Cuenta con estructura", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_estruc_hidrau')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectcuenta])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un item'])->label(false); ?>       
            </td>           
           </tr>
           
           <tr>                    
            <td class="labelpregunta">Material de la estructura:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione un tipo de problema en la fuente", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_material_estruc')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectmaterial])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un tipo de material','onchange' => 'Mostrar_especifique_material(this)'])->label(false); ?>       
            </td>           
           </tr>
           <tr>                    
            <td class="labelpregunta"></td>            
            <td class="inputpregunta"> <?= $form->field($model, 'especifique_mat_estr')->textInput(['maxlength' => 50,'style' => 'display:none'])->label('Especifique',['id'=>'label_especifique1','style' => 'display:none']); ?>   
            </td>           
           </tr>
           <tr>                    
            <td class="labelpregunta">Problemas de la Captación:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione un tipo de problema en la fuente", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_problema_capt')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectproblemas])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un tipo de problema','onchange' => 'Mostrar_especifique_problemas(this)'])->label(false); ?>       
            </td>           
           </tr>
           <tr>                    
            <td class="labelpregunta"></td>            
            <td class="inputpregunta"> <?= $form->field($model, 'especifique_probl')->textInput(['maxlength' => 50,'style' => 'display:none'])->label('Especifique',['id'=>'label_especifique2','style' => 'display:none']); ?>   
            </td>           
           </tr>
           <tr>                    
            <td class="labelpregunta">Estado de la captación:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione un tipo de estado", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_estado_capt')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectestado])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un tipo de captación'])->label(false); ?>       
            </td>           
           </tr>
           <tr>                    
            <td class="labelpregunta">Tipo de Medición:
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione un tipo de medicion", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_t_medicion')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselecttipomed])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un tipo de medición','onchange' => 'Mostrar_especifique_t_medicion(this)'])->label(false); ?>       
            </td>           
           </tr>
           <tr>                    
            <td class="labelpregunta"></td>         
            
            <?php if ($bande) { ?>  
                <td class="inputpregunta"> <?= $form->field($model, 'especifique_t_med')->textInput(['maxlength' => 50,'style' => 'display:block'])->label('Especifique',['id'=>'label_especifique','style' => 'display:block']); ?> 
                </td>  
            <?php
            } else {
                ?> 
                <td class="inputpregunta"> <?= $form->field($model, 'especifique_t_med')->textInput(['maxlength' => 50,'style' => 'display:none'])->label('Especifique',['id'=>'label_especifique','style' => 'display:none']); ?> 
                </td>  
            <?php } ?>
            
               
            </td>           
           </tr>
            <tr>
            <td class="labelpregunta">Observaciones: 
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
