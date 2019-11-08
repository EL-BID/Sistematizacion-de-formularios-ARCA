<?php
namespace frontend\helpers;
use yii\validators\Validator;
use Yii;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of restnumber
 *
 * @author magaly.ceron
 */
class restnumber extends Validator {
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
        $_resultado= $this->params['resultado'];
        $_messageerror = $this->params['mensaje'];
        
return <<<JS
 
var respuestas = String("$_respuestas");
var resultado = String("$_resultado");
var mensaje_info = String("$_messageerror");
var resta = 0;


var v_respuestas = respuestas.split("-");
var campo_val1= document.getElementById('detcapitulo-rpta'+v_respuestas[0]).value;
var campo_val2= document.getElementById('detcapitulo-rpta'+v_respuestas[1]).value;

        if(campo_val1.indexOf(",")>0){            
            campo_val1 = campo_val1.replace(new RegExp(',', 'g'), '');}
        if(campo_val2.indexOf(",")>0){
            campo_val2 = campo_val2.replace(new RegExp(',', 'g'), '');}
        var resta = parseFloat(campo_val1)-parseFloat(campo_val2);
         var mensaje ='';       
        if (isNaN(resta) == false)
        {
            if(resta==0){mensaje='No ha generado pérdida/utilidad';}
            else if(resta>0) {            
               mensaje='Está seguro que su utlidad es de $'+resta;}
            else{         
               mensaje='Está seguro que su pérdida es de $'+resta;}                             
       document.getElementById("detcapitulo-rpta" + resultado).value=resta.toFixed(2); 
       //messages.push(mensaje_info);
        }  
        

JS;
        
    }
}

?>