<script>
    
    function getRptaM(id_conjrpta,id_conjprta,id_prta,id_rpta,id_fmt,idtprta,idversion,idcapitulo,l_array){
        
        var valor = document.getElementById('detcapitulo-rpta'+l_array).value;
        var nombrediv = 'prueba'+l_array;
        
        $.ajax({
            type: "POST", 
            url: "?r=detcapitulo/prueba", 
            data: {
                   id_conjrpta: id_conjrpta, 
                   id_conjprta: id_conjprta, 
                   id_prta: id_prta,
                   id_rpta: id_rpta,
                   id_fmt: id_fmt,
                   idtprta:idtprta,
                   idversion: idversion,
                   idcapitulo: idcapitulo,
                   valor: valor 
                   },
            success: function(result){
                htmldiv = $("#"+nombrediv).html();
                htmldiv = $('#'+nombrediv).html()+result;
                $("#"+nombrediv).html(htmldiv);
                 
                document.getElementById('detcapitulo-rpta'+l_array).value = '';
            }
        });
    }
    
    function deleteRpta(id_rpta){
        
        $.ajax({
            type: "POST", 
            url: "?r=detcapitulo/deletrpta", 
            data: {
                   id_rpta: id_rpta
                   },
            success: function(result){
                if(result == 1){
                    $("#"+id_rpta).remove();
                }else{
                    alert("Error al Intentar Borrar la respuesta");
                }
            }
        });
    }


    function setCondicion(_hab,_cond,_tipo,_operacion,formato,tipocondicion,valor,objthis){
       
      if(tipocondicion === '1'){
          
          //Obteniendo la caja de la pregunta condicionada el numero para el id;
          var _cond = condiciones(_hab);
          
          //Obteniendo valor seleccionado de la caja de la respuesta habilitadora=======================
          var e = document.getElementById("detcapitulo-rpta" + _hab);
          var strHab = e.options[e.selectedIndex].value;
          
          //Evaluando condicion de acuerdo a la operacion =============================================
            if(_operacion === '='){
                
                if(strHab == valor){
                    document.getElementById("detcapitulo-rpta" + _cond).disabled = false;
                }else{
                    document.getElementById("detcapitulo-rpta" + _cond).disabled = true;
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

<?php
 eval('?>'.$dinamicjavascript);
?>


<style>
    
   /* .tbcapitulo{
        margin: 0 auto;
        width: 90%;
        border: 1px solid #000;
    }
    
    .nomcapitulo{
        font-size: 1.3em;
        color:#8CD4F5;
        font-weight: bolder;
        border: solid 2px #000;
    }
    
    .tbseccion{
       width: 100%; 
    }
    .titleseccion{
       font-size: 1.2em;
       font-weight: bolder;
       background-color: #C7CCD1;
       border-bottom: solid 1px #ccc;
    }
    
    .labelpregunta{
        border: dotted 1px #000;
        border-bottom: solid 1px #ccc;
        padding: 2px 2px;
        font-size:0.9em;
        width: 25%;
        color:#0044cc;
        
    }
    
     .inputpregunta{
        border-right: solid 1px #000;
        border-bottom: solid 1px #ccc;
        padding: 2px 2px;
    }*/
</style>  

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

SweetSubmitAsset::register($this);
$variable="1";


//Declarando Menu Vertical 
$this->params['itemsmn']=[ 
                            ['label' => 'Excel', 'icon' => '', 'url' => Url::to(['/detformato/genexcel','id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$id_version,'estado'=>$estado,'id_capitulo'=>$id_capitulo])],
                            ['label' => 'Word', 'icon' => '', 'url' => Url::to(['/detformato/genword','id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$id_version,'estado'=>$estado,'id_capitulo'=>$id_capitulo])], 
                            ['label' => 'PDF2', 'icon' => '', 'url' => Url::to(['/detformato/genpdf','id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$id_version,'estado'=>$estado,'id_capitulo'=>$id_capitulo])], 
                         ]; 
?>

<div class="detcapitulo-form">

    <?php $form = ActiveForm::begin(['options' => [ 'id' => 'create-form','enctype' => 'multipart/form-data'],'enableClientValidation' => true,
     'enableAjaxValidation' => false ]); ?>  
    
    <!--ASIGNANDO input PARA verificar obligatorios----------------------->
    <?php if(!empty($model)){
     echo  $form->field($model, 'hidden1')->hiddenInput()->label(false); 
    } ?>
    
    <!--ASIGNANDO BOTON REGRESAR------------------------------------------->
    <div class="form-group">
        <?php echo Html::a('Regresar', $_urlmiga, ['class'=>'btn btn-default']);  ?>
    
    
    
    <!---ASIGNANDO BOTON SI TIENE PERMISOS DE MODIFICAR--------------------->
        <?php
        if($permisos['p_actualizar'] == 'S'){
        ?>
              
                <?= Html::submitButton($tipo ? 'Crear' : 'Actualizar', ['class' => $tipo ? 'btn btn-success' : 'btn btn-primary','id'=>'botoncrear2','value'=>'1',"onclick"=>"clicked='principal'"]) ?>
            
        <?php
        }
        ?>
    </div>
 

    <!---------------IMPRIMIENDO FORMULAIO------------------------------------->
    <?php
    foreach($vista as $_clave){
       eval('?>'.$_clave);
    }
    
    
   ?>
    
    <!---ASIGNANDO BOTON SI TIENE PERMISOS DE MODIFICAR--------------------->
    <?php
    if($permisos['p_actualizar'] == 'S'){
    ?>
        <div class="form-group" style="text-align: right;padding-top:10px;padding-bottom:10px">
            <?= Html::submitButton($tipo ? 'Crear' : 'Actualizar', ['class' => $tipo ? 'btn btn-success' : 'btn btn-primary','id'=>'botoncrear2','name'=>'botoncrear2','value'=>'0',"onclick"=>"clicked='principal'"]) ?>
        </div>
    <?php
    }
   
    ?>

    <?php ActiveForm::end(); ?>
    
    
</div>

<?php
$script = <<< JS
    var idfocus;
    idfocus = 'detcapitulo-rpta'+$focus;
    document.getElementById(idfocus).focus();
JS;
$this->registerJs($script);
?>
