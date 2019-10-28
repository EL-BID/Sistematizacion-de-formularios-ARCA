<?php
namespace frontend\helpers;
use yii\validators\Validator;
use Yii;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of totnumber
 *
 * @author magaly.ceron
 */
class totnumber extends Validator {
    //put your code here
    
    public $params;
    
    
    public function init()
    {
        parent::init();
    }
    
    public function validateAttribute($model,$attribute)
    {
        $value = $model->$attribute;
        $v_value =  str_split($value);
        $v_format = str_split($this->params['sumandos']);
    }
    
    public function clientValidateAttribute($model,$attribute,$view)
    {
        $_respuestas = $this->params['operandos'];        
        $_messageerror = $this->params['mensaje'];
        $_messageerror2 = $this->params['mensaje2'];
        $value = $attribute;        
return <<<JS
  
var respuestas = String("$_respuestas");
var mensaje = String("$_messageerror");
var mensaje2 = String("$_messageerror2");
var id_campo = String("$value");
        
var v_respuestas = respuestas.split("+");
var suma =0;
res = 100;
var resultados_v = []; 
val_campo = 'detcapitulo-'+id_campo;
contador=0;
for (i=0;i<v_respuestas.length;i++) 
{
   clave ='detcapitulo-rpta'+v_respuestas[i];
   campo_resul = parseInt(document.getElementById(clave).value);   
   if(isNaN(campo_resul)==true)campo_resul=0;  
   resultados_v[v_respuestas[i]]=campo_resul;
   suma+=parseInt(campo_resul);
   if(suma>res)
   {
     messages.push(mensaje2); 
   }
   if(suma==res)
   {     

     if(campo_resul>0)/*Tiene información*/
     {
       document.getElementById(clave).disabled=false;     
     }
     else
     {
        document.getElementById(clave).disabled=true;
        var element1 = document.createElement("input");
        element1.type = "hidden";
        element1.value = "";
        element1.id = clave;
        element1.name = "Detcapitulo[rpta"+v_respuestas[i]+"]";
        document.getElementById("create-form").appendChild(element1);  
     }     
   }
}
if(suma!='' && suma>=0)
{
    if(suma!=res)
    {
        messages.push(mensaje);   
        for(var i in resultados_v) {                  
            document.getElementById("detcapitulo-rpta"+i ).disabled=false;    
        }
    }
    else
    {
        for(var i in resultados_v) {
            $( "#detcapitulo-rpta"+i ).blur();      
            valo = document.getElementById("detcapitulo-rpta"+i ).value;
            if(valo>0)
            {
               console.log('correcto');
            }
            else
            {
                document.getElementById("detcapitulo-rpta"+i ).disabled=true;
                var element1 = document.createElement("input");
                element1.type = "hidden";
                element1.value = "";
                element1.id = clave;
                element1.name = "Detcapitulo[rpta"+i+"]";
                document.getElementById("create-form").appendChild(element1);
            }
        }
    }
} 
if(document.getElementById('detcapitulo-rpta36').value>0)
{
 document.getElementById('detcapitulo-rpta37').disabled=false;
}
else
   {
        document.getElementById('detcapitulo-rpta37').value='';
        document.getElementById('detcapitulo-rpta37').disabled=true;
   }
JS;
        
    }
}

?>