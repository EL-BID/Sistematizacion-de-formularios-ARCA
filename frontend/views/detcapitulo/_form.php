<script>
    /*mceron
	Se realiza cambios para agregar parroquias en combos dependientes*/
    function demarcaciones(){
        
        var selector = document.getElementById('fdubicacion_var-cod_provincia');
        var x = selector[selector.selectedIndex].value;
        
        var selector2 = document.getElementById('fdubicacion_var-cod_canton');
        var y = selector2[selector2.selectedIndex].value;
        
       
        $.post("index.php?r=fdubicacion/listadopd&id_prov="+x+"&id="+y,function(data){
             var res = data.split("::"); 
             if($("#fdubicacion_var-id_demarcacion").length > 0)
             {
             $("#fdubicacion_var-id_demarcacion").html(res[0]);
             }
             /*Si existe el campo para parroquia*/
             if($("#fdubicacion_var-cod_parroquia").length > 0) {                 
                 $("#fdubicacion_var-cod_parroquia").html(res[1]);
            }
             
             
        });
    }
  //-----------------------------------------------  
    function comboscumunitatioap(){      
        var selector = document.getElementById('fdubicacion_var_ap-cod_provincia');
        var x = selector[selector.selectedIndex].value;

        var selector2 = document.getElementById('fdubicacion_var_ap-cod_canton');
        var y = selector2[selector2.selectedIndex].value;
 
       
        $.post("index.php?r=fdubicacion/listadopd&id_prov="+x+"&id="+y,function(data){
             var res = data.split("::"); 
             
             /*Si existe el campo para parroquia*/
             if($("#fdubicacion_var_ap-cod_parroquia").length > 0) {                 
                 $("#fdubicacion_var_ap-cod_parroquia").html(res[1]);
              }
             
             
        });
    }
  //-----------------------------------------------
 
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
                    //alert("Error al Intentar Borrar la respuesta");
                    alertify.alert('Mensaje','Error al Intentar Borrar la respuesta').set('label', 'Aceptar').set({transition:'zoom'}).show();
                }
            }
        });
    }


    /*
     * 
     * @param {type} $sel => larray de la caja de select one que habilita espeficique
     * @param {type} $hab => nombre de la caja a habilitar 
     * @param {type} $comparar  => tipo de opciones que habilitan
     * @returns {undefined}
     */
    function setEspecifique(sel,hab,comparar){
        
        //Obteniendo seleccion de la caja habilitadora
        var e = document.getElementById("detcapitulo-rpta" + sel);
        var strHab = e.options[e.selectedIndex].value;
        
        //Sacando vector de id's que habilitan la caja
        var ids = comparar.split("//");
        var bandera = false;
        
        for (i = 0; i < ids.length; ++i) {
            if(ids[i] == strHab){
                bandera = true;
            }
        }        
        if(bandera == true){            
            document.getElementById("detcapitulo-otros_" + hab).disabled = false;
            document.getElementById("detcapitulo-otros_" + hab).value=''; //para el caso opci�n mixto
            $('input[type="hidden"][id=detcapitulo-otros_'+hab+']').remove();
        }else{            
            document.getElementById("detcapitulo-otros_" + hab).disabled = true;
            document.getElementById("detcapitulo-otros_" + hab).value='';
            /*Se crea campo input hidden cuando el elemento se deshabilita, ya que un disabled no reconoce el post y no se actualiza el valor*/
            var element1 = document.createElement("input");
            element1.type = "hidden";
            element1.value = "";
            element1.id = "detcapitulo-otros_" + hab;
            element1.name = "Detcapitulo[otros_"+ hab+"]";
            document.getElementById("create-form").appendChild(element1);  
        }
        
    }

/*mceron
Se realizan cambios para los bloqueos de varios campos*/
    function setCondicion(_hab,_cond,_tipo,_operacion,formato,tipocondicion,valor,objthis,opcion_ch){              
      if(tipocondicion === '1'){
          
         
          //Obteniendo la caja de la pregunta condicionada el numero para el id;
          if(_cond.indexOf(",")>0)
          {    
               array_rela = new Array();
               var _condi = condiciones(_hab);
               
               if(valor.indexOf(",")>0){
                separa =valor.split(",");
               }
             
               //Inicio del for cuando hay mas de una condicion ================================================ 
               for (key in _condi){
                    
                var micondi= _condi[key];
                if(valor.indexOf(",")>0){
                  array_rela[micondi]=separa[key];
                }
                else
                {
                    //Obteniendo valor seleccionado de la caja de la respuesta habilitadora=======================
                    var e = document.getElementById("detcapitulo-rpta" + _hab);
                    var strHab = e.options[e.selectedIndex].value;
                    //Evaluando condicion de acuerdo a la operacion =============================================
                    if(_operacion === '='){
                        if(strHab!='')
                        {
                            if(strHab == valor){
                                
                                $('#create-form').yiiActiveForm('validateAttribute', "#detcapitulo-rpta" + micondi);
                                document.getElementById("detcapitulo-rpta" + micondi).disabled = false;                                    
                                $('input[type="hidden"][id=detcapitulo-rpta'+micondi+']').remove();
                                $('#create-form').yiiActiveForm('add', {
                                    id: 'detcapitulo-rpta'+micondi,
                                    name: 'Detcapitulo[rpta'+micondi+']',
                                    container: '.field-address',
                                    input: '#detcapitulo-rpta'+micondi,
                                    error: '.help-block',
                                    validate:  function (attribute, value, messages, deferred, $form) {
                                        yii.validation.required(value, messages, {message: "Este campo es obligatorio"});
                                    }
                                });     
                            }else{
                                
                                document.getElementById("detcapitulo-rpta" + micondi).disabled = true;
                                document.getElementById("detcapitulo-rpta" + micondi).value= '';
                                 /*Se crea campo input hidden cuando el elemento se deshabilita, ya que un disabled no reconoce el post y no se actualiza el valor*/
                                var element1 = document.createElement("input");
                                element1.type = "hidden";
                                element1.value = "";
                                element1.id = "detcapitulo-rpta" + micondi;
                                element1.name = "Detcapitulo[rpta"+ micondi+"]";
                                document.getElementById("create-form").appendChild(element1);   
                            }
                         }
                         else
                             {
                                 document.getElementById("detcapitulo-rpta" + micondi).disabled = false;
                                 document.getElementById("detcapitulo-rpta" + micondi).value= '';
                             }
                      }     
                    }
               }
               //end del for ==========================================================================
               
               
               
               if(valor.indexOf(",")>0){      
                   
                   var e = document.getElementById("detcapitulo-rpta" + _hab);
                   var strHab = e.options[e.selectedIndex].value;
                   for(valos in array_rela)
                   {
                       valor = array_rela[valos];
                       console.log ('ver valor '+valor +' y valos' + valos);
                       if(strHab==1){
                       if(valor==1)
                           {
                               document.getElementById("detcapitulo-rpta" + valos).disabled = false; 
                               document.getElementById("detcapitulo-rpta" + valos).value= '';
                               $('input[type="hidden"][id=detcapitulo-rpta'+valos+']').remove();
                               //$("#detcapitulo-rpta" + valos).attr('required', 'true'); 
                               $('#create-form').yiiActiveForm('add', {
                                id: 'detcapitulo-rpta'+valos,
                                name: 'Detcapitulo[rpta'+valos+']',
                                container: '.field-address',
                                input: '#detcapitulo-rpta'+valos,
                                error: '.help-block',
                                validate:  function (attribute, value, messages, deferred, $form) {
                                    yii.validation.required(value, messages, {message: "Este campo es obligatorio"});
                                }
                            });
                               
                           }
                        else
                            {
                                document.getElementById("detcapitulo-rpta" + valos).disabled = true;  
                                document.getElementById("detcapitulo-rpta" + valos).value= '';
                                 /*Se crea campo input hidden cuando el elemento se deshabilita, ya que un disabled no reconoce el post y no se actualiza el valor*/
                                var element1 = document.createElement("input");
                                element1.type = "hidden";
                                element1.value = "";
                                element1.id = "detcapitulo-rpta" + valos;
                                element1.name = "Detcapitulo[rpta"+ valos+"]";
                                document.getElementById("create-form").appendChild(element1);   
                            }
                       }
                       else
                       {
                           if(valor==2)
                           {
                               document.getElementById("detcapitulo-rpta" + valos).disabled = false;
                               document.getElementById("detcapitulo-rpta" + valos).value= '';
                               $('input[type="hidden"][id=detcapitulo-rpta'+valos+']').remove();
                               //$("#detcapitulo-rpta" + micondi).attr('required', 'true');  
                               $('#create-form').yiiActiveForm('add', {
                                id: 'detcapitulo-rpta'+valos,
                                name: 'Detcapitulo[rpta'+valos+']',
                                container: '.field-address',
                                input: '#detcapitulo-rpta'+valos,
                                error: '.help-block',
                                validate:  function (attribute, value, messages, deferred, $form) {
                                    yii.validation.required(value, messages, {message: "Este campo es obligatorio"});
                                }
                            });
                               
                           }
                           else
                            {
                                document.getElementById("detcapitulo-rpta" + valos).disabled = true; 
                                document.getElementById("detcapitulo-rpta" + valos).value= '';
                                 /*Se crea campo input hidden cuando el elemento se deshabilita, ya que un disabled no reconoce el post y no se actualiza el valor*/
                                var element1 = document.createElement("input");
                                element1.type = "hidden";
                                element1.value = "";
                                element1.id = "detcapitulo-rpta" + valos;
                                element1.name = "Detcapitulo[rpta"+ valos+"]";
                                document.getElementById("create-form").appendChild(element1);   
                            }
                               
                       }
                   }
               }
          }
          else
              {
                  
                    console.log("hola paso por aqui 2");
                    //Obteniendo la caja de la pregunta condicionada el numero para el id;
                    var _cond = condiciones(_hab);                  
                    //Obteniendo valor seleccionado de la caja de la respuesta habilitadora=======================                  
                    if(opcion_ch =="checked")
                    {
                          var strHab = objthis.checked;                  
                          if(strHab)strHab=1;
                          else strHab=2;
                    }
                    else
                    {                      
                          var e = document.getElementById("detcapitulo-rpta" + _hab);
                          var strHab = e.options[e.selectedIndex].value;
                    }
                
                    //Evaluando condicion de acuerdo a la operacion =============================================
                    if(_operacion === '='){
                        if(strHab!='')
                        {
                            
                            if(strHab == valor){
                                document.getElementById("detcapitulo-rpta" + _cond).disabled = false;
                                $('input[type="hidden"][id=detcapitulo-rpta'+_cond+']').remove();
                                //$("#detcapitulo-rpta" + _cond).attr('required', 'true');                                                                   
                                $('#create-form').yiiActiveForm('add', {
                                id: 'detcapitulo-rpta'+_cond,
                                name: 'Detcapitulo[rpta'+_cond+']',
                                container: '.field-address',
                                input: '#detcapitulo-rpta'+_cond,
                                error: '.help-block',
                                validate:  function (attribute, value, messages, deferred, $form) {
                                    yii.validation.required(value, messages, {message: "Este campo es obligatorio"});
                                }
                            });
                                
                            }else{                                
                                document.getElementById("detcapitulo-rpta" + _cond).disabled = true;
                                document.getElementById("detcapitulo-rpta" + _cond).value ='';
                                /*Se crea campo input hidden cuando el elemento se deshabilita, ya que un disabled no reconoce el post y no se actualiza el valor*/
                                var element1 = document.createElement("input");
                                element1.type = "hidden";
                                element1.value = "";
                                element1.id = "detcapitulo-rpta" + _cond;
                                element1.name = "Detcapitulo[rpta"+_cond+"]";
                                document.getElementById("create-form").appendChild(element1);                                
                            }
                        }
                        else{
                            document.getElementById("detcapitulo-rpta" + _cond).disabled = false;
							document.getElementById("detcapitulo-rpta" + _cond).value ='';
                        }
                    }else if(_operacion === '<>' || _operacion ==='!='){
                        
                        if(strHab!=''){
                            
                            if(strHab != valor){
                                document.getElementById("detcapitulo-rpta" + _cond).disabled = false;
                                $('input[type="hidden"][id=detcapitulo-rpta'+_cond+']').remove();
                                $('#create-form').yiiActiveForm('add', {
                                    id: 'detcapitulo-rpta'+_cond,
                                    name: 'Detcapitulo[rpta'+_cond+']',
                                    container: '.field-address',
                                    input: '#detcapitulo-rpta'+_cond,
                                    error: '.help-block',
                                    validate:  function (attribute, value, messages, deferred, $form) {
                                        yii.validation.required(value, messages, {message: "Este campo es obligatorio"});
                                    }
                                });
                            }else{                                
                                document.getElementById("detcapitulo-rpta" + _cond).disabled = true;
                                document.getElementById("detcapitulo-rpta" + _cond).value ='';
                                /*Se crea campo input hidden cuando el elemento se deshabilita, ya que un disabled no reconoce el post y no se actualiza el valor*/
                                var element1 = document.createElement("input");
                                element1.type = "hidden";
                                element1.value = "";
                                element1.id = "detcapitulo-rpta" + _cond;
                                element1.name = "Detcapitulo[rpta"+_cond+"]";
                                document.getElementById("create-form").appendChild(element1);                                
                            }    
                            
                            
                            
                        }else{
                            document.getElementById("detcapitulo-rpta" + _cond).disabled = false;
                        }
                        
                        
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
if($_habreportes == TRUE){
	$this->params['itemsmn']=[ 
								['label' => 'Excel', 'icon' => '', 'url' => Url::to(['/detformato/genexcel','id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$id_version,'estado'=>$estado,'id_capitulo'=>$id_capitulo,'idjunta'=>$idjunta])],
								['label' => 'Word', 'icon' => '', 'url' => Url::to(['/detformato/genword','id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$id_version,'estado'=>$estado,'id_capitulo'=>$id_capitulo,'idjunta'=>$idjunta])], 
								['label' => 'PDF2', 'icon' => '', 'url' => Url::to(['/detformato/genpdf','id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$id_version,'estado'=>$estado,'id_capitulo'=>$id_capitulo,'idjunta'=>$idjunta])], 
							 ]; 
}						 
?>

<div class="detcapitulo-form">

    <?php $form = ActiveForm::begin(['options' => [ 'id' => 'create-form','enctype' => 'multipart/form-data'],'enableClientValidation' => true,
     'enableAjaxValidation' => false ]); ?>  
    
    <!--ASIGNANDO input PARA verificar obligatorios----------------------->
    <?php if(!empty($model)){
     echo  $form->field($model, 'hidden1')->hiddenInput()->label(false); 
    } 
    ?>
    
    <!--ASIGNANDO BOTON REGRESAR------------------------------------------->
    <div class="form-group">
        <?php 
        echo Html::a('Regresar', $_urlmiga, ['class'=>'btn btn-default']);  ?>
    
    
    
    <!---ASIGNANDO BOTON SI TIENE PERMISOS DE MODIFICAR--------------------->
        <?php
        if($permisos['p_actualizar'] == 'S'){
        ?>
              
                <?= Html::submitButton($tipo ? 'Guardar' : 'Actualizar', ['class' => $tipo ? 'btn btn-success' : 'btn btn-primary','id'=>'botoncrear2','value'=>'1',"onclick"=>"clicked='principal'"]) ?>
            
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
            <?= Html::submitButton($tipo ? 'Guardar' : 'Actualizar', ['class' => $tipo ? 'btn btn-success' : 'btn btn-primary','id'=>'botoncrear2','name'=>'botoncrear2','value'=>'0',"onclick"=>"clicked='principal'"]) ?>
        </div>
    <?php
    }
     
    ?>
 
    
    <?php ActiveForm::end(); ?>    
    
</div>

<?php
if(empty($focus))$focus=0;
$script = <<< JS
    var idfocus;
    var tipo = ''+$focus;         
    if(tipo === 'null' || tipo =='0'){    
        
    }else{
        idfocus = 'detcapitulo-rpta'+$focus;
        document.getElementById(idfocus).focus();
    }
    
JS;
$this->registerJs($script);
?>
