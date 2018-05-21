<?php

namespace frontend\helpers;
use yii\validators\Validator;

class validateMoneda extends Validator
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
       $v_value=explode($this->params['separadec'],$value);
       
       if(!empty($this->params['decimales']) and strlen($v_value[1])>$this->params['decimales']){
           $model->addError($attribute, 'El maximo de decimales es '.$this->params['decimales']);
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
             
        /*Evaluando maximos minimos, cantidad de decimales y separadores*******************/
        $eval_min=0;
        $eval_max=0;
                

        $_sdec = $this->params['separadec'];            //Separador de Decimales
        $_smil = $this->params['separamiles'];          //Separador de Miles
        $_cdec = $this->params['decimales'];            //cantidad de decimales
        $_messagedec = json_encode('El maximo de decimales es '.$this->params['decimales'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        
        
        
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

        
var v_value=value.split("$_sdec");

if(v_value.length>1){ 
    if(v_value[1].length>$_cdec){
      messages.push($_messagedec);
    }
}
        
if ($eval_min==0 && value!='') {
    var min=value.replace("$_smil","");
    if( min<$min ){    
        messages.push($tooSmall);
    }     
}
         
if ($eval_max==0 && value!='') {
    var max=parseFloat(value.replace("$_smil",""));
    if( max>$max ){
         messages.push($tooBig);
    }
    
}      

JS;
        

    }
}

