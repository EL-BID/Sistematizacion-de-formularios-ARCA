<?php
namespace frontend\helpers;
use yii\validators\Validator;
use Yii;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sumnumber
 *
 * @author magaly.ceron
 */
class sumnumber extends Validator {
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
        $_respuestas = $this->params['sumandos'];
        $_resultado= $this->params['resultado'];
        $_messageerror = $this->params['mensaje'];
        
return <<<JS
 
var respuestas = String("$_respuestas");
var resultado = String("$_resultado");
var mensaje = String("$_messageerror");
    
var v_respuestas = respuestas.split("+");
var suma =0;
res = parseFloat(document.getElementById('detcapitulo-rpta'+resultado).value);
var resultados_v = []; 

for (i=0;i<v_respuestas.length;i++) 
{
   campo_resul = parseFloat(document.getElementById('detcapitulo-rpta'+v_respuestas[i]).value);   
   if(isNaN(campo_resul)==true)campo_resul=0;  
   resultados_v[v_respuestas[i]]=campo_resul;
   suma+=parseFloat(campo_resul);
} 
if(res!='' && res>0)
{
    if(suma!=parseFloat(res))
    {
        messages.push(mensaje);   
    }
    else
    {
        for(var i in resultados_v) {          
            $( "#detcapitulo-rpta"+i ).blur();
        }
    }
}
JS;
        
    }
}

?>
