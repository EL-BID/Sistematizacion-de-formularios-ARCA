<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;
use common\models\poc\FdTipoSelect;
use common\models\poc\FdConduccionImpulsionApscom;
use common\models\poc\FdOpcionSelect;
/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdConduccionImpulsionApscom */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>
<script>
    function Mostrar_especifique(campo)
    {     
        var id =campo.id;
        var selObj = document.getElementById(id);
        var selIndex = selObj.options[selObj.selectedIndex].text;
        
        if(selIndex=='Otra')
        {            
            document.getElementById('fdconduccionimpulsionapscom-especifique_otro_tuberia').style.display="block";        
            document.getElementById('label_especifique').style.display="block";
        }
        else
        {
             document.getElementById('fdconduccionimpulsionapscom-especifique_otro_tuberia').value='';
            document.getElementById('fdconduccionimpulsionapscom-especifique_otro_tuberia').style.display ="none"; 
            
            document.getElementById('label_especifique').style.display ="none"; 
        }
    }
    
    
</script>
<div class="fd-conduccion-impulsion-apscom-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); 
    $material_tub=  FdTipoSelect::find()
                   ->where(['nom_tselect'=>'MATERIAL DE TUBERIA'])
                  ->one();
                $valor_tselectmaterialtub= $material_tub->id_tselect;
                
               
    $estado_tub=  FdTipoSelect::find()
                   ->where(['nom_tselect'=>'ESTADO CONDUCCION'])
                  ->one();
                $valor_tselectestadotub= $estado_tub->id_tselect;   
                

    $frecuencia_mant_tub=  FdTipoSelect::find()
                   ->where(['nom_tselect'=>'FRECUENCIA MANTENIMIENTO CONDUCCION'])
                  ->one();
                $valor_tselectfrecuenciamantetub= $frecuencia_mant_tub->id_tselect;               
                
    $bande = false;  
   $id = @$_GET['id'];


    if (!empty($id)) {
        $_materialtub = FdConduccionImpulsionApscom::find()
                ->where(['id_cond_impulsion_apscom' => $id])
                ->one();
        $valor_mattub = $_materialtub->id_material_tuberia;



        $otros = FdOpcionSelect::find()
                ->where(['id_opcion_select' => $valor_mattub])
                ->one();
        $nom_otros="";
        if(!empty($otros))
          $nom_otros = $otros->nom_opcion_select;
        if ($nom_otros == "Otra") {
            $bande = true;
        }
    }             
                
                
                
    ?>

    <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpregunta">Nombre o lugar de la conducción: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Nombre o lugar de la conduccion',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
             </td>
             <td>
                 <?= $form->field($model, 'nombre_lug_conduccion')->textInput([
                                              'maxlength' => 200,
                                              'title' => 'Indique Nombre Lug Conduccion',                                              
                                              'data-toggle' => 'tooltip',
                                              'placeholder'=>'Indique Nombre Lug Conduccion'        
                                         ])->label(false) ?>
             </td>
          </tr>
          <tr>
               <td class="labelpregunta"> Material de la tubería: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Material de la tubería',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
               </td>
               <td class="inputpregunta">
                    <?= $form->field($model, 'id_material_tuberia')
                                                         ->dropDownList(
                                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectmaterialtub])->all(),
                                                            'id_opcion_select','nom_opcion_select'),
                                                            ['prompt'=>'Seleccione un item','onchange' => 'Mostrar_especifique(this)'])->label(false);                                     
                                                         ?>
              </td>
         </tr>
         <tr>
            <td class="labelpregunta"></td> 
            <?php if ($bande) { ?>                                   
                <td class="inputpregunta"> <?= $form->field($model, 'especifique_otro_tuberia')->textInput(['maxlength' => 50,'style' => 'display: block'])->label('Especifique',['id'=>'label_especifique','style' => 'display: block']); ?>   
                </td>  
            <?php
            } else {
                ?> 
                <td class="inputpregunta"> <?= $form->field($model, 'especifique_otro_tuberia')->textInput(['maxlength' => 50,'style' => 'display: none'])->label('Especifique',['id'=>'label_especifique','style' => 'display: none']); ?>   
                </td>  
            <?php } ?>
        </tr>
          
          <tr>
               <td class="labelpregunta"> Estado de la tubería: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Estado de la tubería',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
               </td>
               <td>                                     

                <?= $form->field($model, 'id_estado_tuberia')                     
                                                     ->dropDownList(
                                                        \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectestadotub])->all(),
                                                        'id_opcion_select','nom_opcion_select'),
                                                        ['prompt'=>'Seleccione un item'])->label(false);
                                                     ?>
               </td>
          </tr>   

          <tr>
               <td class="labelpregunta"> Frecuencia de mantenimiento de la conducción con impulsión: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Frecuencia de mantenimiento de la conducción con impulsión',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
               </td>
               <td>                                     
                <?= $form->field($model, 'id_frec_mantenimiento_condimp')                                         
                                                     ->dropDownList(
                                                        \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectfrecuenciamantetub])->all(),
                                                        'id_opcion_select','nom_opcion_select'),
                                                        ['prompt'=>'Seleccione un item'])->label(false);
                                                     ?>

                </td>
           </tr>
                                         
   <tr>
               <td class="labelpregunta"> Estado de la bomba: 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Estado de la bomba',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
               </td>
               <td>                                                                                                                    
                   <?= $form->field($model, 'id_estado_bomba')                                         
                                         ->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectestadotub])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un item'])->label(false);
                                         
                                         ?>
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
                                        'placeholder'=>'Indique Problemas Identificados'        
                                         ])->label(false) ?>
              </td>
  </tr>            
    </table>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
