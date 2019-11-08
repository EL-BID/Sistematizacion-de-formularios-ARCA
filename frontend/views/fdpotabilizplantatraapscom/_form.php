<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;
use common\models\poc\FdTipoSelect;
use common\models\poc\FdPotabilizPlantatraApscom;
use common\models\poc\FdOpcionSelect;/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPotabilizPlantatraApscom */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>
<script>
    function Mostrar_especifique_t_planta(campo)
    {     
        var id =campo.id;
        var selObj = document.getElementById(id);
        var selIndex = selObj.options[selObj.selectedIndex].text;
        
        if(selIndex=='Otro')
        {            
            document.getElementById('fdpotabilizplantatraapscom-especifique_tplantat').style.display="block";        
            document.getElementById('label_especifique').style.display="block";
        }
        else
        {
             document.getElementById('fdpotabilizplantatraapscom-especifique_tplantat').value='';
            document.getElementById('fdpotabilizplantatraapscom-especifique_tplantat').style.display ="none";
                                     
            
            document.getElementById('label_especifique').style.display ="none"; 
        }
    }
    
    function Mostrar_esp_otro_metdesinfeccion(campo)
    {     
        var id =campo.id;
        var selObj = document.getElementById(id);
        var selIndex = selObj.options[selObj.selectedIndex].text;
        
        if(selIndex=='Otro')
        {            
            document.getElementById('fdpotabilizplantatraapscom-especifique_metdesinfeccionp').style.display="block";        
            document.getElementById('label_especifique2').style.display="block";
        }
        else
        {
             document.getElementById('fdpotabilizplantatraapscom-especifique_metdesinfeccionp').value='';
            document.getElementById('fdpotabilizplantatraapscom-especifique_metdesinfeccionp').style.display ="none";
            document.getElementById('label_especifique2').style.display ="none"; 
        }
    }
    
    
</script>
<div class="fd-potabiliz-plantatra-apscom-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]);
    
    
    $tipo_planta_t=  FdTipoSelect::find()
                   ->where(['nom_tselect'=>'TIPO DE PLANTA DE TRATAMIENTO'])
                  ->one();
                $valor_tplanta_trat= $tipo_planta_t->id_tselect;
    
   $metodo_desinf_planta_t=  FdTipoSelect::find()
                   ->where(['nom_tselect'=>'METODO DESINFECCION'])
                  ->one();
                $valor_met_desinf_planta= $metodo_desinf_planta_t->id_tselect;
                
  $estado_planta_t=  FdTipoSelect::find()
                   ->where(['nom_tselect'=>'ESTADO CONDUCCION'])
                  ->one();
                $valor_estado_planta= $estado_planta_t->id_tselect; 
                
  $realiza_med_agua_trat=  FdTipoSelect::find()
                   ->where(['nom_tselect'=>'SI/NO'])
                  ->one();
                $valor_med_agua_tratada= $realiza_med_agua_trat->id_tselect;              
    
                
  $bande = false; 
  $bande2 = false; 
   $id = @$_GET['id'];


    if (!empty($id)) {
        $_tipo_planta = FdPotabilizPlantatraApscom::find()
                ->where(['id_potab_plantatr_apscom' => $id])
                ->one();
        $valor_tipo_planta = $_tipo_planta->tipo_planta_tratatmiento;
        $valor_met_desinfplanta = $_tipo_planta->metodo_desinfeccion_planta;



        $otros = FdOpcionSelect::find()
                ->where(['id_opcion_select' => $valor_tipo_planta])
                ->one();
        $nom_otros="";
        if(!empty($nom_otros))
          $nom_otros = $otros->nom_opcion_select;
        if ($nom_otros == "Otro") {
            $bande = true;
        }
        
        
        $otros_met_desinfplanta = FdOpcionSelect::find()
                ->where(['id_opcion_select' => $valor_met_desinfplanta])
                ->one();
        $met_desinf_otros="";
        if(!empty($met_desinf_otros))
          $met_desinf_otros = $otros_met_desinfplanta->nom_opcion_select;
        if ($met_desinf_otros == "Otro") {
            $bande2 = true;
        }
        
        
        
        
        
        
    }                
    
    ?>
<table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpregunta"> Ubicación de la planta de tratamiento: 
                                    <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                                            ,'#',
                                                            ['title' => 'Ubicación de la planta de tratamiento',
                                                              'data-toggle' => 'tooltip',
                                                            ]); ?>   
             </td>
             <td>
                
                                        <?= $form->field($model, 'ubicacion_lug_ptratamiento')->textInput([
                                                            'maxlength' => 200,
                                                            'title' => 'Indique Ubicacion Lug Ptratamiento',
                                                            'data-toggle' => 'tooltip',
                                                                   
                                                             ])->label(false) ?>
            </td>
        </tr>    
     <tr>
         <td class="labelpregunta"> Tipo de planta de tratamiento: 
                                    <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                                            ,'#',
                                                            ['title' => 'Tipo de lanta de tratamiento',
                                                              'data-toggle' => 'tooltip',
                                                            ]); ?>   
          </td>
          <td>
                        <?= $form->field($model, 'tipo_planta_tratatmiento')
                                                             ->dropDownList(
                                                                           \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tplanta_trat])->all(),
                                                                           'id_opcion_select','nom_opcion_select'),
                                                                           ['prompt'=>'Seleccione un item','onchange' => 'Mostrar_especifique_t_planta(this)'])->label(false);    
                                                             ?>
          </td>
     </tr>  
     
      <tr>
            <td class="labelpregunta"></td> 
            <?php if ($bande) { ?>                                   
                <td class="inputpregunta"> <?= $form->field($model, 'especifique_tplantat')->textInput(['maxlength' => 50,'style' => 'display: block'])->label('Especifique',['id'=>'label_especifique','style' => 'display: block']); ?>   
                </td>  
            <?php
            } else {
                ?> 
                <td class="inputpregunta"> <?= $form->field($model, 'especifique_tplantat')->textInput(['maxlength' => 50,'style' => 'display: none'])->label('Especifique',['id'=>'label_especifique','style' => 'display: none']); ?>   
                </td>  
            <?php } ?>
        </tr>
     
     
     
     
     
     
     
     
     <tr>
         <td class="labelpregunta">Método de desinfección: 
                                    <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                                            ,'#',
                                                            ['title' => 'Método de desinfección',
                                                              'data-toggle' => 'tooltip',
                                                            ]); ?>   
          </td>
          <td>
            <?= $form->field($model, 'metodo_desinfeccion_planta')->dropDownList(
                                                                    \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_met_desinf_planta])->all(),
                                                                    'id_opcion_select','nom_opcion_select'),
                                                                    ['prompt'=>'Seleccione un item','onchange' => 'Mostrar_esp_otro_metdesinfeccion(this)'])->label(false);     ?>
          </td>
     </tr>
     
      <tr>
            <td class="labelpregunta"></td> 
            <?php if ($bande2) { ?>                                   
                <td class="inputpregunta"> <?= $form->field($model, 'especifique_metdesinfeccionp')->textInput(['maxlength' => 50,'style' => 'display: block'])->label('Especifique otro método de desinfección',['id'=>'label_especifique2','style' => 'display: block']); ?>   
                </td>  
            <?php
            } else {
                ?> 
                <td class="inputpregunta"> <?= $form->field($model, 'especifique_metdesinfeccionp')->textInput(['maxlength' => 50,'style' => 'display: none'])->label('Especifique otro método de desinfección',['id'=>'label_especifique2','style' => 'display: none']); ?>   
                </td>  
            <?php } ?>
        </tr>
      <tr>
         <td class="labelpregunta">Realiza la medición del agua tratada en la planta: 
                                    <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                                            ,'#',
                                                            ['title' => 'Realiza la medición del agua tratada en la planta',
                                                              'data-toggle' => 'tooltip',
                                                            ]); ?>   
          </td>
          <td>
              <?= $form->field($model, 'midicion_agua_tratplanta')                                         
                                         ->dropDownList(
                                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_med_agua_tratada])->all(),
                                                            'id_opcion_select','nom_opcion_select'),
                                                            ['prompt'=>'Seleccione un item'])->label(false);   ?>                              
                                         
           </td>
      </tr>
      <tr>
         <td class="labelpregunta"> Estado de la planta: 
                                    <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                                            ,'#',
                                                            ['title' => 'Estado de la planta',
                                                              'data-toggle' => 'tooltip',
                                                            ]); ?>   
          </td>
          <td>
                    <?= $form->field($model, 'estado_planta')->dropDownList(
                                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_estado_planta])->all(),
                                                            'id_opcion_select','nom_opcion_select'),
                                                            ['prompt'=>'Seleccione un item'])->label(false);   ?>
          </td>
      </tr>  
<tr>
         <td class="labelpregunta">Problemas identificados: 
                                    <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                                            ,'#',
                                                            ['title' => 'Problemas identificados',
                                                              'data-toggle' => 'tooltip',
                                                            ]); ?>   
          </td>
          <td>
                <?= $form->field($model, 'problemas_identificados')->textInput([
                                                    'maxlength' => 400,
                                                    'title' => 'Indique Problemas Identificados',
                                                    'data-toggle' => 'tooltip',                                                    
                                                     ])->label(false) ?>
          </td>
</tr>         
</table>
    

    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
