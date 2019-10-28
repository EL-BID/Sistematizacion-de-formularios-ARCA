<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
use common\models\poc\FdTipoSelect;
use common\models\poc\FdDetallesFuente;
use common\models\poc\FdOpcionSelect;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdDetallesFuente */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>
<script>
    function Mostrar_especifique(campo)
    {     
        
       var id =campo.id;
       
       var selObj = document.getElementById(id);
       var selIndex = selObj.options[selObj.selectedIndex].text;
       

        if(selIndex=='Otros')
        {            
            document.getElementById('fddetallesfuente-especifique').style.display="block";        
            document.getElementById('label_especifique').style.display="block";
        }
        else
        {
            document.getElementById('fddetallesfuente-especifique').value='';
            document.getElementById('fddetallesfuente-especifique').style.display ="none";        
            document.getElementById('label_especifique').style.display ="none"; 
        }
    }  
</script>
<div class="fd-detalles-fuente-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); 

    $bande = false;
    $bande2 = false;
    $_nombrevalor = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'TIPO FUENTE COMUN'])
                        ->one();
                $valor_tselect= $_nombrevalor->id_tselect;
    
    $_nombrevalorestado = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'PROBLEMAS FUENTE COMUN'])
                        ->one();
                $valor_tselectestado= $_nombrevalorestado->id_tselect;             
    
   $_nombrevalorautorizacion = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'SI/NO'])
                        ->one();
                $valor_tselectautorizacion= $_nombrevalorautorizacion->id_tselect;     
                
  $id = @$_GET['id'];       
                
   if (!empty($id)) {
        $_detfuente = FdDetallesFuente::find()
                ->where(['id_detalles_fuente' => $id])
                ->one();
        $valor_capta = $_detfuente->id_problema_fuente;



        $otros = FdOpcionSelect::find()
                ->where(['id_opcion_select' => $valor_capta])
                ->one();
        
        $nom_otros ="";
        if(!empty($otros))
            $nom_otros = $otros->nom_opcion_select;
        if ($nom_otros == "Otros") {
            $bande = true;
        }
        
        
      $_detfuente1 = FdDetallesFuente::find()
                ->where(['id_detalles_fuente' => $id])
                ->one();
        $valor_aut_sen = $_detfuente1->autorizacion_senagua;  
        
        $aut_sen = FdOpcionSelect::find()
                ->where(['id_opcion_select' => $valor_aut_sen])
                ->one();
        
        $nom_aut_sen ="";
        if(!empty($aut_sen))
            $nom_aut_sen = $aut_sen->nom_opcion_select;
        if ($nom_aut_sen == "No") {
            $bande2 = true;
        }
    }             
                
                          
    ?>

         <table class="tbcapitulo">
        <tr>
            <td class="nomcapitulo" colspan="4"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpregunta"> Nombre de la fuente 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Nombre fuente',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
	   <td class="inputpregunta">
              <?= $form->field($model, 'nombre_fuente')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombre Fuente',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombre Fuente'        
                                         ])->label(false); ?>
           </td>
        </tr>      
        <tr>                    
            <td class="labelpregunta">Tipo fuente
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione un tipo de fuente", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_t_fuente')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselect])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un tipo de fuente'])->label(false); ?>       
            </td>           
           </tr>
           <tr>
            <td class="labelpregunta">Coordenada X 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Coordenada X',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
	   <td class="inputpregunta">
              <?= $form->field($model, 'coor_x')->textInput([
                                        'maxlength' => 13,
                                        'onkeypress'=> 'return NumCheck(event,this)',
                                        'title' => 'Indique Coor X',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Coor X'        
                                         ])->label(false); ?>
           </td>
        </tr>
        <tr>
            <td class="labelpregunta">Coordenada Y 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Coordenada Y',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
	   <td class="inputpregunta">
              <?= $form->field($model, 'coor_y')->textInput([
                                        'maxlength' => 13,
                                        'onkeypress'=> 'return NumCheck(event,this)',
                                        'title' => 'Indique Coor Y',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Coor Y'        
                                         ])->label(false); ?>
           </td>
        </tr>
        <tr>
            <td class="labelpregunta">Cota 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Cota',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
	   <td class="inputpregunta">
              <?= $form->field($model, 'coor_z')->textInput([
                                        'maxlength' => 7,
                                        'onkeypress'=> 'return NumCheck(event,this)',
                                        'title' => 'Indique Coor Z',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Coor Z'        
                                         ])->label(false); ?>
           </td>
        </tr>
        
        
        <tr>                    
            <td class="labelpregunta">¿La fuente cuenta con Autorización de Senagua?
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'autorizacion_senagua')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectautorizacion])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            
                                            ['prompt'=>'Seleccione',
                                            'onchange'=>'Bloqueo_campo_det_fte(this,\'caudal_autorizado\')'
                                            ])->label(false); ?>       
            </td>          
           </tr>
        
        
        <tr>
            <td class="labelpregunta">Caudal autorizado (l/s) 
                                       <?= yii\helpers\Html::a(yii\helpers\Html::img('@web/images/icono.jpg')
                                        ,'#',
                                        ['title' => 'Caudal autorizado (l/s)',
                                          'data-toggle' => 'tooltip',
                                        ]); ?>   
            </td>
            
            
            <?php if ($bande2) { ?>  
                <td class="inputpregunta"> 
                   
                    <?= $form->field($model, 'caudal_autorizado')->textInput([
                    'maxlength' => 7,
                    'onkeypress'=> 'return NumCheck(event,this)',
                    'title' => 'Indique Caudal Autorizado',
                    'data-toggle' => 'tooltip',
                    'placeholder'=>'Indique Caudal Autorizado',
                    'disabled' => true
                     ])->label(false); ?>
                    
                </td>  
            <?php
            } else {
                ?> 
                <td class="inputpregunta"> 
                   <?= $form->field($model, 'caudal_autorizado')->textInput([
                    'maxlength' => 7,
                    'onkeypress'=> 'return NumCheck(event,this)',
                    'title' => 'Indique Caudal Autorizado',
                    'data-toggle' => 'tooltip',
                    'placeholder'=>'Indique Caudal Autorizado'        
                     ])->label(false); ?> 
                </td>  
            <?php } ?>
        </tr>
        <tr>                    
            <td class="labelpregunta">Problemas en la fuente
                                        <?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                        ,"#", 
                                        ["title" => "Seleccione un tipo de problema en la fuente", 
                                          "data-toggle" => "tooltip", 
                                            ] ); ?>
            </td>
            
                <td class="inputpregunta"> <?= $form->field($model, 'id_problema_fuente')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(['id_tselect'=>$valor_tselectestado])->all(),
                                            'id_opcion_select','nom_opcion_select'),
                                            ['prompt'=>'Seleccione un tipo de problema en la fuente','onchange' => 'Mostrar_especifique(this)'])->label(false); ?>       
            </td>           
           </tr>
           <tr>                    
            <td class="labelpregunta"></td>  
            
            <?php if ($bande) { ?>  
                <td class="inputpregunta"> <?= $form->field($model, 'especifique')->textInput(['maxlength' => 50,'style' => 'display: block'])->label('Especifique',['id'=>'label_especifique','style' => 'display: block']); ?>   
                </td>  
            <?php
            } else {
                ?> 
                <td class="inputpregunta"> <?= $form->field($model, 'especifique')->textInput(['maxlength' => 50,'style' => 'display:none'])->label('Especifique',['id'=>'label_especifique','style' => 'display:none']); ?> 
                </td>  
            <?php } ?>
                      
           </tr>
           
           
  
           
           
           
 </table>    

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
