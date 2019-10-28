<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;
use common\models\poc\FdTipoSelect;
use common\models\poc\FdTrataguaDesinfeccionApscom;
use common\models\poc\FdOpcionSelect;/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTrataguaDesinfeccionApscom */
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
            document.getElementById('fdtrataguadesinfeccionapscom-especifique_otro_metdesinf').style.display="block";        
            document.getElementById('label_especifique').style.display="block";
        }
        else
        {
             document.getElementById('fdtrataguadesinfeccionapscom-especifique_otro_metdesinf').value='';
            document.getElementById('fdtrataguadesinfeccionapscom-especifique_otro_metdesinf').style.display ="none"; 
            
            document.getElementById('label_especifique').style.display ="none"; 
        }
    }
    
    function Mostrar_especifique_otro_problem(campo)
    {     
        var id =campo.id;
        var selObj = document.getElementById(id);
        var selIndex = selObj.options[selObj.selectedIndex].text;
        
        if(selIndex=='Otro')
        {            
            document.getElementById('fdtrataguadesinfeccionapscom-especifique_otros_problemas').style.display="block";        
            document.getElementById('label_especifique2').style.display="block";
        }
        else
        {
             document.getElementById('fdtrataguadesinfeccionapscom-especifique_otros_problemas').value='';
            document.getElementById('fdtrataguadesinfeccionapscom-especifique_otros_problemas').style.display ="none";
            document.getElementById('label_especifique2').style.display ="none"; 
        }
    }
    
    
</script>
<div class="fd-tratagua-desinfeccion-apscom-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); 
    
    
    $met_desinf_agua=  FdTipoSelect::find()
                   ->where(['nom_tselect'=>'METODO DESINFECCION'])
                  ->one();
                $valor_tdesinfeccionagua= $met_desinf_agua->id_tselect;
    
    
    $estado_func_sistema=  FdTipoSelect::find()
                   ->where(['nom_tselect'=>'ESTADO CONDUCCION'])
                  ->one();
                $valor_testado_sistema= $estado_func_sistema->id_tselect; 

                
     $realiza_desinfeccion=  FdTipoSelect::find()
                   ->where(['nom_tselect'=>'SI/NO'])
                  ->one();
                $valor_trealizadesinfeccion= $realiza_desinfeccion->id_tselect;
                
     $problemas_identificados=  FdTipoSelect::find()
                   ->where(['nom_tselect'=>'PROBLEMAS DESINFECCION'])
                  ->one();
                $valor_tproblemasindetif= $problemas_identificados->id_tselect; 
                
     $bande = false; 
     $bande2 = false; 
   $id = @$_GET['id'];  
   
   if (!empty($id)) {
        $_tipotratmiento = FdTrataguaDesinfeccionApscom::find()
                ->where(['id_trat_aguadesinf_apscom' => $id])
                ->one();
        $valor_tratamiento = $_tipotratmiento->metodo_desinfeccion;
        $valor_problemas_identificados = $_tipotratmiento->problemas_identificados;
       
        $otros = FdOpcionSelect::find()
                ->where(['id_opcion_select' => $valor_tratamiento])
                ->one();
        $nom_otros="";
        if(!empty($otros))
          $nom_otros = $otros->nom_opcion_select;        
        if ($nom_otros == "Otro") {
            $bande = true;
        }
        
        $otros_problemas = FdOpcionSelect::find()
                ->where(['id_opcion_select' => $valor_problemas_identificados])
                ->one();
        $problemas_otros="";
        if(!empty($otros_problemas))
          $problemas_otros = $otros_problemas->nom_opcion_select;
       
        if ($problemas_otros == "Otro") {
            $bande2 = true;
        }
    }
    ?>
<table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpregunta"> Ubicación del tratamiento: 
                                           <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                            ,'#',
                                            ['title' => 'Ubicación del tratamiento',
                                              'data-toggle' => 'tooltip',
                                            ]); ?>   
             </td>
             <td class="inputpregunta" >
                    <?= $form->field($model, 'ubicacion_lug_tratamiento')->textInput([
                                                        'maxlength' => 200,
                                                        'title' => 'Indique Ubicacion Lug Tratamiento',
                                                        'data-toggle' => 'tooltip',
                                                        'placeholder'=>'Indique Ubicacion Lug Tratamiento'        
                                                         ])->label(false) ?>
              </td>
         </tr>
         <tr>
              <td class="labelpregunta"> Realiza desinfección al agua cruda: 
                                           <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                            ,'#',
                                            ['title' => 'Realiza desinfección al agua cruda',
                                              'data-toggle' => 'tooltip',
                                            ]); ?>   
               </td>
               <td class="inputpregunta">

                                <?= $form->field($model, 'realiza_desinfeccion')->dropDownList(
                                                                 \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_trealizadesinfeccion])->all(),
                                                                 'id_opcion_select','nom_opcion_select'),
                                                                 ['prompt'=>'Seleccione un item'])->label(false);
                                                                     ?>
                </td>                                   
         </tr>
         <tr>
                <td class="labelpregunta"> Método de desinfección: 
                                             <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                              ,'#',
                                              ['title' => 'Método de desinfección',
                                                'data-toggle' => 'tooltip',
                                              ]); ?>   
                 </td>
                 <td class="inputpregunta">         

                          <?= $form->field($model, 'metodo_desinfeccion')                                                                                 
                                                               ->dropDownList(
                                                                              \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tdesinfeccionagua])->all(),
                                                                              'id_opcion_select','nom_opcion_select'),
                                                                              ['prompt'=>'Seleccione un item','onchange' => 'Mostrar_especifique(this)'])->label(false);
                                               ?>
                  </td>                                    
          </tr>         
           <tr>
            <td class="labelpregunta"></td> 
            <?php if ($bande) { ?>                                   
                <td class="inputpregunta"> <?= $form->field($model, 'especifique_otro_metdesinf')->textInput(['maxlength' => 50,'style' => 'display: block'])->label('Especifique otro método de desinfección',['id'=>'label_especifique','style' => 'display: block']); ?>   
                </td>  
            <?php
            } else {
                ?> 
                <td class="inputpregunta"> <?= $form->field($model, 'especifique_otro_metdesinf')->textInput(['maxlength' => 50,'style' => 'display: none'])->label('Especifique otro método de desinfección',['id'=>'label_especifique','style' => 'display: none']); ?>   
                </td>  
            <?php } ?>
        </tr>                          
          <tr>                         
                     <td class="labelpregunta"> Realiza medición a la salida de la desinfección: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Realiza medición a la salida de la desinfección',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
                      </td>
                      <td class="inputpregunta">                                          
                                    <?= $form->field($model, 'mide_salida_desinfeccion')->dropDownList(
                                                        \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_trealizadesinfeccion])->all(),
                                                        'id_opcion_select','nom_opcion_select'),
                                                        ['prompt'=>'Seleccione un item'])->label(false);
                                         ?>
                       </td>
          </tr>
          <tr>
                      <td class="labelpregunta"> Estado del funcionamiento del sistema: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Estado del funcionamiento del sistema',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
                       </td>
                      <td class="inputpregunta">      
                                   <?= $form->field($model, 'estado_func_sistema')->dropDownList(
                                                        \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_testado_sistema])->all(),
                                                        'id_opcion_select','nom_opcion_select'),
                                                        ['prompt'=>'Seleccione un item'])->label(false);                                         
                                         ?>
                       </td> 
            </tr>
            <tr>
                      <td class="labelpregunta"> Problemas identificados: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Problemas identificados',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
                       </td>
                       <td class="inputpregunta"> 
                                  <?= $form->field($model, 'problemas_identificados')->dropDownList(
                                                        \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tproblemasindetif])->all(),
                                                        'id_opcion_select','nom_opcion_select'),
                                                        ['prompt'=>'Seleccione un item','onchange' => 'Mostrar_especifique_otro_problem(this)'])->label(false); ?>
                         </td>
            </tr>
            <tr>
            <td class="labelpregunta"></td> 
            <?php if ($bande2) { ?>                                   
                <td class="inputpregunta"> <?= $form->field($model, 'especifique_otros_problemas')->textInput(['maxlength' => 50,'style' => 'display: block'])->label('Especifique otro problema',['id'=>'label_especifique2','style' => 'display: block']); ?>   
                </td>  
            <?php
            } else {
                ?> 
                <td class="inputpregunta"> <?= $form->field($model, 'especifique_otros_problemas')->textInput(['maxlength' => 50,'style' => 'display: none'])->label('Especifique otro problema',['id'=>'label_especifique2','style' => 'display: none']); ?>   
                </td>  
            <?php } ?>
        </tr>     
</table>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
