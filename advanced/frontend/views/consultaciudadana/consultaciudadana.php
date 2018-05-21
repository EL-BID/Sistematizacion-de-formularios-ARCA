<link rel="stylesheet" href="css/site.css">
<script>
    

    function setCondicion(_hab,_cond,_tipo,_operacion,formato,tipocondicion,valor,objthis){
       
      if(tipocondicion === '1'){
          
          //Obteniendo la caja de la pregunta condicionada el numero para el id;
          var _cond = condiciones(_hab);
          
          //Obteniendo valor seleccionado de la caja de la respuesta habilitadora=======================
          var e = document.getElementById("consultaciudadana-rpta" + _hab);
          var strHab = e.options[e.selectedIndex].value;
          
          //Evaluando condicion de acuerdo a la operacion =============================================
            if(_operacion === '='){
                
                if(strHab == valor){
                    document.getElementById("consultaciudadana-rpta" + _cond).disabled = false;
                }else{
                    document.getElementById("consultaciudadana-rpta" + _cond).disabled = true;
                }
            }
          
          
      }else{  
            if(_tipo=='1'){
                 var _revrptacond_df = document.getElementById("detcapitulo-rpta" + _cond).value; 
                 var _revrptahab_df = document.getElementById("detcapitulo-rpta" + _hab).value; 


                 if(formato == 'dd/MM/yyyy'){
                     var _vfechacond = _revrptacond_df.split("/");
                     var _vfechahab = _revrptahab_df.split("/");
                 }else{
                     var _vfechacond = _revrptacond_df.split("/");
                     var _vfechahab = _revrptahab_df.split("/");
                 }

                 var _revrptacond = new Date(_vfechacond[2],_vfechacond[1],_vfechacond[0]);
                 var _revrptahab = new Date(_vfechahab[2],_vfechahab[1],_vfechahab[0]);
             }else{
                 var _revrptacond_df = document.getElementById("detcapitulo-rpta" + _cond).value; 
                 var _revrptahab_df = document.getElementById("detcapitulo-rpta" + _hab).value; 
             }


             /*Habilitadora debe ser mayor que condicionada*/
             if(_operacion == '>'){

                 if(_revrptahab < _revrptacond){

                   var targetDiv = document.getElementsByClassName("condicion-block");
                   targetDiv[_cond].innerHTML = "<p style='color:red'>El valor debe ser menor a "+_revrptahab_df+"</p>";
                   document.getElementById("botoncrear1").disabled = true;
                   document.getElementById("botoncrear2").disabled = true;

                  }else{

                   var targetDiv = document.getElementsByClassName("condicion-block");   
                   targetDiv[_cond].innerHTML = ""; 
                   document.getElementById("botoncrear1").disabled = false;
                   document.getElementById("botoncrear2").disabled = false;
                 }
             }

             /*Habilitadora es menor que condicionada*/
             else if(_operacion == '<'){

                  if(_revrptahab > _revrptacond){

                   var targetDiv = document.getElementsByClassName("condicion-block");
                   targetDiv[_cond].innerHTML = "<p style='color:red'>El valor debe ser mayor a "+_revrptahab_df+"</p>";
                   document.getElementById("botoncrear1").disabled = true;
                   document.getElementById("botoncrear2").disabled = true;

                  }else{

                   var targetDiv = document.getElementsByClassName("condicion-block");   
                   targetDiv[_cond].innerHTML = ""; 
                   document.getElementById("botoncrear1").disabled = false;
                   document.getElementById("botoncrear2").disabled = false;
                 }
             }

              /*Habilitadora es igual que condicionada*/
             else if(_operacion == '='){

                  if(_revrptahab != _revrptacond){

                   var targetDiv = document.getElementsByClassName("condicion-block");
                   targetDiv[_cond].innerHTML = "<p style='color:red'>El valor debe ser igual a "+_revrptahab_df+"</p>";
                   document.getElementById("botoncrear1").disabled = true;
                   document.getElementById("botoncrear2").disabled = true;

                  }else{

                   var targetDiv = document.getElementsByClassName("condicion-block");   
                   targetDiv[_cond].innerHTML = ""; 
                   document.getElementById("botoncrear1").disabled = false;
                   document.getElementById("botoncrear2").disabled = false;
                 }
             }

              /*Habilitadora es diferente que condicionada*/
             else if(_operacion === '<>'){

                  if(_revrptahab === _revrptacond){

                   var targetDiv = document.getElementsByClassName("condicion-block");
                   targetDiv[_cond].innerHTML = "<p style='color:red'>El valor debe ser diferente a "+_revrptahab_df+"</p>";
                   document.getElementById("botoncrear1").disabled = true;
                   document.getElementById("botoncrear2").disabled = true;

                  }else{

                   var targetDiv = document.getElementsByClassName("condicion-block");   
                   targetDiv[_cond].innerHTML = ""; 
                   document.getElementById("botoncrear1").disabled = false;
                   document.getElementById("botoncrear2").disabled = false;
                 }
             }
         }
        
    }
</script>

<!--Funcion dinamica de javascript para las condiciones, me muestra el numero de la caja del formulario relacionada a la pregunta,
ante la duda ver codigo fuente funcion condiciones-->
<?php
 eval('?>'.$dinamicjavascript);
?>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\Cda */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="consulta-create">
 
    <div class="headSection"><h1 class="titSection"><?= Html::encode('Formulario para Participación Ciudadana') ?></h1></div>
    
    <div class="aplicativo table-responsive">
        <div class="consulta-form">
        <!----------------------------------Encabezado------------------------------------>
        <?php $form = ActiveForm::begin(['options' => [
                            'id' => 'crear-form',
                           'enableClientValidation' => true,                     ]
                        ]); ?>
        
                <table class="table table-bordered">
                    <tr>
                        <td class="labelpregunta"> Nombres: </td>
                        <td class="inputpregunta">
                            <table width="100%">
                                <tr>
                                    <td width="50%"><?= $form->field($modelgenerales, 'nombres')
                                                        ->textInput()->label(false) ?></td>
                                </tr>
                            </table>
                        </td>
                        
                    </tr>
                    <tr>
                    <td class="labelpregunta"> Identificacion: </td>
                        <td class="inputpregunta"><?= $form->field($modelgenerales, 'num_documento')
                                                        ->textInput()->label(false)  ?></td>
                    </tr>
                    <tr>
                        <td class="labelpregunta"> Correo: </td>
                        <td class="inputpregunta"><?= $form->field($modelgenerales, 'correo_electronico')
                                                        ->textInput()->label(false)  ?> </td>
                    </tr>
                    <tr>
                        <?php
                        if(empty($id_conj_rpta) or \is_null($id_conj_rpta) == TRUE){
                        ?>    
                            <td colspan="2">
                                 <?= $form->field($modelgenerales, 'captcha')->widget(Captcha::className()) ?>
                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                    <?php
                        if($hab_continuar == true){
                    ?>  
                        <tr>
                            <td colspan="4"><?= Html::submitButton('Continuar', ['class' => 'btn btn-success','id'=>'botonhabilitar','name'=>'botonhabilitar','value'=>'1']) ?></td>
                        </tr>
                    <?php
                        }
                    ?>    
                </table> 

               
                <?php
                foreach($vista as $_clave){
                   eval('?>'.$_clave);
                }
                ?>
               
    

               
            <?php
                if($hab_continuar == false){
            ?>     

            <div class="form-group" style="text-align: right;padding-top:10px;padding-bottom:10px">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success','id'=>'botoncrear2','name'=>'botoncrear2','value'=>'1',"onclick"=>"clicked='principal'"]) ?>
            </div>
        
            <?php
                }
            ?>

        <?php ActiveForm::end(); ?>
        </div>     
    </div>
</div>
