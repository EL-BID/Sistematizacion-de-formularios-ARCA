<?php

namespace frontend\helpers;
use yii\validators\Validator;
use Yii;

/*Tener en cuenta que solo es para formato de numeros
 * valida solo "#" ,".","," -> los valores numericos en php no reciben espacios
 * para formatos como #### #### use un tipo string y asigne una expresion regular
 * Los separadores de miles se tienen por defecto en "," y los decimales en "."
 */

class formatnumber extends Validator
{
    public $params;
    public $_bandera;

    public function init()
    {
        parent::init();
    }

    /* Validacion post envio para el controlador*/
    public function validateAttribute($model, $attribute)
    {
       $value = $model->$attribute;
       $v_value = str_split($value);
       $v_format= str_split($this->params['format']);
       
       
       
       /*==================================Revisando Formato====================================================*/
       if(!empty($value) and count($v_value)==count($v_format)){
           
           for($c=0;$c<count($v_format);$c++){
               
               if($v_format[$c]=="#" and is_numeric($v_value[$c]) === FALSE){
                  $model->addError($attribute,'El formato del campo debe ser '.$this->params['format']);
               }else if($v_format[$c]=="." and $v_value[$c]!="."){
                  $model->addError($attribute,'El formato del campo debe ser '.$this->params['format']);
               }else if($v_format[$c]=="," and $v_value[$c]!=","){
                   $model->addError($attribute,'El formato del campo debe ser '.$this->params['format']);
               }
               
           }
       }else if(!empty($value) and count(v_value)!=count(v_format)){
           $model->addError($attribute,'El formato del campo debe ser '.$this->params['format']);
       }
       
       /*===================================Revisando Valor Minimo y Valor Maximo===============================*/
       
       /*Si es tipo 5 no tiene decimales pero puede tener separador de miles se retiran y se convierte a entero*/
       if(!empty($value) and (!empty($this->params['tp_pregunta'])) and $this->params['tp_pregunta']=='5'){
           $value = str_replace(",", "", $value);
           $value = (int)$value;
       }else if(!empty($value) and (!empty($this->params['tp_pregunta'])) and $this->params['tp_pregunta']=='6'){
           $value = str_replace(",", "", $value);
       }
       
       
       if(!empty($this->params['min']) and $value<$this->params['min'] and !empty($value)){
           $model->addError($attribute, $this->params['tooSmall']);
       }
       
       if(!empty($this->params['max']) and $value>$this->params['max'] and !empty($value)){
           $model->addError($attribute, $this->params['tooBig']);
       }
       
    }
   

    /* Validacion del lado del cliente*/
    public function clientValidateAttribute($model, $attribute, $view)
    {
        
        //Evaluando formato **************************************************************/
        $_formato = $this->params['format'];
        $_messageformat = json_encode('El formato establecido es '.$_formato, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
             
        /*Evaluando maximos minimos, cantidad de decimales y separadores*******************/
        $eval_min=0;
        $eval_max=0;
                
               
        if(empty($this->params['min'])){
            $eval_min=1;
            $min=0;
        }else{
            $min= $this->params['min'];
        }
        
        if(empty($this->params['max'])){
            $eval_max=1;
            $max=0;
        }else{
            $max= $this->params['max'];
        }
        
        if(!empty($this->params['tooSmall'])){
           $tooSmall = json_encode($this->params['tooSmall'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }else{
           $tooSmall = json_encode('Numero es demasiado pequeño', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
       
        if(!empty($this->params['tooBig'])){
            $tooBig = json_encode($this->params['tooBig'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }else{
            $tooBig = json_encode('Numero es demasiado grande', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
        
        
 return <<<JS

var formato = String("$_formato");
var v_formato = formato.split("");
var v_value = value.split("");
         
if(v_formato.length ==  v_value.length && value!=''){
    for (i=0;i<v_formato.length;i++) { 
         
         
        if(v_formato[i]=="#" && isNaN(v_value[i])){
            messages.push($_messageformat);
        }else if(v_formato[i]=="." && v_value[i]!="."){
            messages.push($_messageformat);
        }else if(v_formato[i]=="," && v_value[i]!=","){
            messages.push($_messageformat);
        }else if(v_formato[i]=="9" && isNaN(v_value[i])){
           messages.push($_messageformat);
        }
    }   
}else if(v_formato.length !=  v_value.length && value!=''){
   messages.push($_messageformat);      
}        

        
if ($eval_min==0 && value!='') {
    var min=value.replace(",","");
    if( min<$min ){    
        messages.push($tooSmall);
    }     
}
         
if ($eval_max==0 && value!='') {
    var max=parseFloat(value.replace(",",""));
    if( max>$max ){
         messages.push($tooBig);
    }
    
}      

JS;
        

    }
}

