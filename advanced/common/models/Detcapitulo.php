<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
use \frontend\helpers\validateMoneda;
use \frontend\helpers\formatnumber;
use \frontend\helpers\savecapitulo;
use Yii;

/**
 * Este es el modelo para la clase "clientes".
 *
 * @property string $Id
 * @property string $name
 * @property string $lastname
 * @property string $birthdate
 * @property string $createdate
 * @property string $type
 *
 * @property Cometarios[] $cometarios
 */
class Detcapitulo extends Model
{
    public $v_preguntas;
    public $v_preguntans;
    public $total_rpta;
    public $v_rules;
    public $v_label;
    public $filename;
    public $folder;
    public $_preguntasagrupadas;
    public $_larray;
    public $hidden1;
        
   
    

/*===========================================================================================================================================*/
/*=================================Construyendo las variables asociadas a public=============================================================*/
/*===========================================================================================================================================*/    
    private $data;
    
    public function __get($varName){

      if (!array_key_exists($varName,$this->data)){
          //this attribute is not defined!
          Yii::warning("Variable no definida.".$varName);
      }
      else return $this->data[$varName];

   }

   public function __set($varName,$value){
      $this->data[$varName] = $value;
   }
   
   
/*===========================================================================================================================================*/
/*=================================Construyendo el modelo=====================================================================================*/
/*===========================================================================================================================================*/ 
    
   function __construct($_arraycap,$v_preguntans,$r_secciones,$v_preguntass) {
       
        $l_array=0;                                             //Numeracion de las preguntas y respuestas...
        $_vrules=array();                                       //Guarda las reglas del modelo como se ve en la funcion rules de un modelo normal
        $_vlabels=array();
        $_vrequires=array();
        $vscenario=array();
        
        
        for($a=0;$a<count($_arraycap);$a++){
            
            $model_indicap = $_arraycap[$a];
            
            /*==================================PARA PREGUNTAS SIN SECCION============================================*/
            if(!empty($v_preguntans[$model_indicap])){
                
            
                foreach ($v_preguntans[$model_indicap] as $clave){
                    
                    $_bandera=0;
                    
                    if($clave['obligatorio']=='S' and empty($clave['tipo_agrupacion']) and $clave['id_tpregunta']!='11'){
                        $_vrequires[]='rpta'.$l_array;
                        $_bandera=1;
                    }
                    
                    if($clave['obligatorio']=='S' and $clave['id_tpregunta']=='11' and empty($clave['id_respuesta'])){
                        $_vrequires[]='rpta'.$l_array;
                        $_bandera=1;
                    }

                    $v_linea=$this->{"tipo_".$clave['id_tpregunta']}($clave,$l_array);
                    
           
                    if(!empty($v_linea)){

                        $_vrules[]=$v_linea;                        //Agregando a vector de reglas -> simula el rules de una clase normal
                        $_indicelabels='rpta'.$l_array;             //Creando vector de labels -> simula el attibutelabels de una clase normal
                        $_vlabels[$_indicelabels]='';               //Nombre vacios dado que se dese colocar al lado y no arriba

                   }
                   
                   if($_bandera == 0){
                       $vscenario[]='rpta'.$l_array;
                   }

                    $l_array=$l_array+1;                        //Conteo para pasar a siguiente respuesta....IMPORTANTE OJO!!
                }
            
                
            }
            
            /*==================================PARA PREGUNTAS CON SECCION============================================*/
        
            if(!empty($r_secciones[$model_indicap])){
                    
                foreach($r_secciones[$model_indicap] as $_clasesec){

                        $_indicesec=$_clasesec['id_seccion'];

                        if(!empty($v_preguntass[$model_indicap][$_indicesec])){ 
                            
                        
                            foreach($v_preguntass[$model_indicap][$_indicesec] as $_clasepreg){
                                
                                $_bandera=0;
                                
                                if($_clasepreg['obligatorio']=='S' and empty($_clasepreg['tipo_agrupacion']) and $_clasepreg['id_tpregunta']!='11'){
                                    $_vrequires[]='rpta'.$l_array;
                                    $_bandera=1;
                                }

                                if($_clasepreg['obligatorio']=='S' and $_clasepreg['id_tpregunta']=='11' and empty($_clasepreg['id_respuesta'])){
                                    $_vrequires[]='rpta'.$l_array;
                                    $_bandera=1;
                                }

                                 $v_linea=$this->{"tipo_".$_clasepreg['id_tpregunta']}($_clasepreg,$l_array);
                                 
                                 if(!empty($v_linea)){

                                     $_vrules[]=$v_linea;                        //Agregando a vector de reglas -> simula la funcion rules de un modelo comun
                                     $_indicelabels='rpta'.$l_array;             //Creando vector de labels  -> simula la funcion attributelabels  de un modelo comun 
                                     $_vlabels[$_indicelabels]='';               //Nombre vacios dado que se dese colocar al lado y no arriba
                                  
                                }
                                
                                if($_bandera == 0){
                                    $vscenario[]='rpta'.$l_array;
                                }

                                $l_array=$l_array+1;                        //Conteo para pasar a siguiente respuesta....IMPORTANTE OJO!!
                            }
                       }

                }
                
            }
            
        }
        
        

        $_vrules[]=[$_vrequires,'required','message' => 'Campo requerido','when' => function ($model) {
            return $model->hidden1 == '1';
            }, 'whenClient' => "function (attribute, value) {
            return $('#detcapitulo-hidden1').val() == '1';
            }"];     
               
        
        $this->v_rules = $_vrules;
        $this->v_label = $_vlabels;
       
   }
   
   
/*===========================================================================================================================================*/
/*=================================FUNCIONES DE UN MODELO COMUN=====================================================================================*/
/*===========================================================================================================================================*/ 

  
   
    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return $this->v_rules;
    }
    
    

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return $this->v_label;
    }
    
   
    
/*===========================================================================================================================================*/
/*=================================CONSTRUYENDO VALIDACIONES=================================================================================*/
/*===========================================================================================================================================*/ 
    
    /*Funcion valida fechas
     * Tipo = 1 en la tabla fd_tipo_pregunta
     * Fecha-Modificado: 2017-08-16
     * Para tener en cuenta si una fecha es condicionada por otro fecha deben tener el mismo formato.
     */
    
    public function tipo_1($v_data,$l_array){

                /*Asignando Formato*/
                if(!empty($_vdata['format'])){

                  $_formato = $_vdata['format'];
                  $_formatphp = $this->formatear($_formato);

                }else{

                  $_formato = 'dd/MM/yyyy';
                  $_formatphp = 'd/m/Y';  
                
                }
        
               //La respuesta solo se asigna en casilla si la pregunta es de tipo caracteristica preg 'S' 
               if($v_data['caracteristica_preg']=='S'){
                  $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe 
               } 
               
               $name='rpta'.$l_array;
               $tipo='date';
               $_vlinea=[$name,$tipo,'format'=>$_formato];
 
               
                if($v_data['atributos']=="NOW" and $v_data['max_date']=="1900-01-01" and $v_data['min_date']!="1900-01-01"){
                    $v_data['max_date']=gmdate($_formatphp);
                    $b_2='1';
                }else if($v_data['atributos']=="NOW" and $v_data['min_date']=="1900-01-01" and $v_data['max_date']!="1900-01-01"){
                    $v_data['min_date']=gmdate($_formatphp);
                    $b_1='1';
                }
                
                /*Transformado Fecha d/m/Y*/
                if(empty($b_2)){
                    $date_fmt = date_create($v_data['max_date']);
                    $v_data['max_date']= date_format($date_fmt, $_formatphp);
                }

                if(empty($b_1)){
                    $date_fmt = date_create($v_data['min_date']);
                    $v_data['min_date']= date_format($date_fmt, $_formatphp);
                }
                
                /*Organiznado validacion*/

                if(!empty($v_data['min_date']) and empty($v_data['max_date'])){
                   $message='El campo debe ser una fecha, fecha minima'.$v_data['min_date']; 
                   $_vlinea['min']=$v_data['min_date'];
                }else if(empty($v_data['min_date']) and !empty($v_data['max_date'])){
                   $message='El campo debe ser una fecha, fecha maxima'.$v_data['max_date']; 
                   $_vlinea['max']=$v_data['max_date'];
                }else if(!empty($v_data['min_date']) and !empty($v_data['max_date'])){
                    $message='El campo debe ser una fecha, y estar entre '.$v_data['min_date'].' y '.$v_data['max_date'];  
                    $_vlinea['min']=$v_data['min_date'];
                    $_vlinea['max']=$v_data['max_date'];
                }
                
               $_vlinea['message']=$message;
               
               return $_vlinea;
    }
    
     /*Funcion para Checkbox
     * valida que el valor sea string S o N
     */
    public function tipo_2($v_data,$l_array){
        
        /*Asignando Respuesta si existe*/
        if(empty($v_data['id_agrupacion'])){
            
            if(!empty($v_data['respuesta']) and $v_data['respuesta'] == 'S'){
                $this->{'rpta'.$l_array} = TRUE; //Se asigna respuesta a la pregunta si existe
            }else{
                $this->{'rpta'.$l_array} = FALSE; //Se asigna respuesta a la pregunta si existe 
            }
            
        }else if(!empty($v_data['id_agrupacion']) and $v_data['tipo_agrupacion'] == '2'){
         
            if(!empty($v_data['respuesta']) and $v_data['respuesta'] == 'S'){
                $this->{'rpta'.$l_array} = TRUE; //Se asigna respuesta a la pregunta si existe
            }else{
                $this->{'rpta'.$l_array} = FALSE; //Se asigna respuesta a la pregunta si existe 
            }
            
        }else if(!empty($v_data['id_agrupacion']) and $v_data['tipo_agrupacion'] == '1'){ 
            
            $_idagrupacion = $v_data['id_agrupacion'];
            
            if(!isset($this->_preguntasagrupadas[$_idagrupacion])){
                $this->_preguntasagrupadas[$_idagrupacion] = $l_array; 
            }else{
                $l_array =  $this->_preguntasagrupadas[$_idagrupacion];  
            } 
            
            if(isset($v_data['respuesta']) and $v_data['respuesta'] == 'S'){
                $this->{'rpta'.$l_array} = $v_data['id_pregunta'];
            } 
        
        }   
        
        /*Construyendo Rules()*/
        $name='rpta'.$l_array;
        $tipo='string';
        
        $_vlinea=[$name,$tipo];

        return $_vlinea;
    }
    
    
    /*Funcion para COMBOBOX
     * valida que el valor a ingresar sea del tipo combobox
     */
    public function tipo_3($v_data,$l_array){
        
       if($v_data['caracteristica_preg']=='S'){
             $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe 
        } 
        $name='rpta'.$l_array;
        $tipo='integer';        
        $message="Seleccione una opcion";

        $_vlinea=[$name,$tipo,'message'=>$message];

        return $_vlinea;
    }
   
    /*Funcion valida string / y expresiones regulares
     * Tipo = 4 en la tabla fd_tipo_pregunta
     * Fecha-Modificado: 2017-08-16
     */
    
    public function tipo_4($v_data,$l_array){
        
          $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
          $name='rpta'.$l_array;
        
          /*Se cambio expresio regular para correo
           * // ^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$
           */
          if(!empty($v_data['reg_exp'])){
            
            $tipo='match';  
            $message='Correo no Valido';
            $pattern="/".$v_data['reg_exp']."/";
            $_vlinea=[$name,$tipo,'message'=>$message,'pattern'=>$pattern]; 
             
          }else if(!empty($v_data['min_largo']) and !empty($v_data['max_largo'])){
            
            $tipo='match';  
            $message='Minimo '.$v_data['min_largo'].' y maximo '.$v_data['max_largo'];
            $pattern='^.{'.$v_data['min_largo'].','.$v_data['max_largo'].'}$';
            $_vlinea=[$name,$tipo,'message'=>$message,'pattern'=>$pattern]; 
            
          }else{
             $tipo='string';
             $_vlinea=[$name,$tipo,'message'=>"asigne un string"]; 
          }
          

          
          return $_vlinea;
    }
    
    
    
    /*Funcion valida enteros
     * Para todo formato "." son decimales y "," son miles
     * Tipo =5
     * Si no tiene formato se puede usar tipo entero
     * Si tiene formato se utiliza la clase formatnumber
     *  @format => formato que se guardo en la BD ###,###.##
     *  @tp_pregunta => 5
     * Fecha-Modificado: 2017-09-02
     */
    
    public function tipo_5($v_data,$l_array){
        
        if(empty($v_data['format'])){
            
            if($v_data['caracteristica_preg']=='S'){
                $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe 
            } 
            $name='rpta'.$l_array;
            $tipo='integer';
            $message='El campo debe ser un entero';
            $_vlinea=[$name,$tipo,'message'=>$message];
            
            if(!empty($v_data['min_number'])){
                $_vlinea['min']=(int)$v_data['min_number'];
                $_vlinea['tooSmall']='El campo debe ser minimo '.(int)$v_data['min_number'];
            }

            if(!empty($v_data['max_number'])){
                $_vlinea['max']=(int)$v_data['max_number'];
                $_vlinea['tooBig']='El campo debe ser maximo '.(int)$v_data['max_number'];
            }
       
        }else{
            
            if($v_data['caracteristica_preg']=='S'){
                $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe 
            } 
            $name='rpta'.$l_array;
            $_vlinea=[$name,formatnumber::className()];
            $_vlinea['params']['format']=$v_data['format']; 
            $_vlinea['params']['tp_pregunta']='5';
            
            if(!empty($v_data['min_number'])){
                $_vlinea['params']['min']=(int)$v_data['min_number'];
                $_vlinea['params']['tooSmall']='El campo debe ser minimo '.(int)$v_data['min_number'];
            }

            if(!empty($v_data['max_number'])){
                $_vlinea['params']['max']=(int)$v_data['max_number'];
                $_vlinea['params']['tooBig']='El campo debe ser maximo '.(int)$v_data['max_number'];
            }
            
        }
        
        return $_vlinea;
    }
    
    
    
    
    /*Funcion que valida decimales
     * ['dato2', 'number','numberPattern' => '/^[0-9]+(\,[0-9]{1,2})?$/', 'message'=>'El valor debe ser numerico - separar centavos con ","']
     */
    public function tipo_6($v_data,$l_array){
        
        if(empty($v_data['format'])){
            
            if($v_data['caracteristica_preg']=='S'){
                $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe 
            } 
            $name='rpta'.$l_array;
            $tipo='number';
            $message="El valor debe ser numerico - separar decimales con '.' ";
            $pattern="/^[0-9]+(\.[0-9]{1,4})?$/";

            $_vlinea=[$name,$tipo,'numberPattern'=>$pattern,'message'=>$message];

            if(!empty($v_data['min_number'])){
                $_vlinea['min']=$v_data['min_number'];
                $_vlinea['tooSmall']='El campo debe ser minimo '.$v_data['min_number'];
            }

            if(!empty($v_data['max_number'])){
                $_vlinea['max']=$v_data['max_number'];
                $_vlinea['tooBig']='El campo debe ser maximo '.$v_data['max_number'];
            }
            
        }else{
            
           if($v_data['caracteristica_preg']=='S'){
                $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe 
            } 
            $name='rpta'.$l_array;
            $_vlinea=[$name,formatnumber::className()];
            $_vlinea['params']['format']=$v_data['format']; 
            $_vlinea['params']['tp_pregunta']='6';
            
            if(!empty($v_data['min_number'])){
                $_vlinea['params']['min']=(int)$v_data['min_number'];
                $_vlinea['params']['tooSmall']='El campo debe ser minimo '.(int)$v_data['min_number'];
            }

            if(!empty($v_data['max_number'])){
                $_vlinea['params']['max']=(int)$v_data['max_number'];
                $_vlinea['params']['tooBig']='El campo debe ser maximo '.(int)$v_data['max_number'];
            }
            
        }
        
       

        return $_vlinea;
    }
    
    
    
    
    /*Funcion que valida tipo porcentaje
    Separador de decimales con "."
    */
    
    public function tipo_7($v_data,$l_array){
        
         if(empty($v_data['format'])){
            
            if($v_data['caracteristica_preg']=='S'){
                $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe 
            } 
            $name='rpta'.$l_array;
            $tipo='number';
            $message="El valor debe ser numerico - separar decimales con '.' ";
            $pattern="/^[0-9]+(\.[0-9]{1,4})?$/";

            $_vlinea=[$name,$tipo,'numberPattern'=>$pattern,'message'=>$message];

            if(!empty($v_data['min_number'])){
                $_vlinea['min']=$v_data['min_number'];
                $_vlinea['tooSmall']='El campo debe ser minimo '.$v_data['min_number'];
            }

            if(!empty($v_data['max_number'])){
                $_vlinea['max']=$v_data['max_number'];
                $_vlinea['tooBig']='El campo debe ser maximo '.$v_data['max_number'];
            }
            
        }else{
            
            if($v_data['caracteristica_preg']=='S'){
                $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe 
            } 
            $name='rpta'.$l_array;
            $_vlinea=[$name,formatnumber::className()];
            $_vlinea['params']['format']=$v_data['format']; 
            $_vlinea['params']['tp_pregunta']='7';
            
            if(!empty($v_data['min_number'])){
                $_vlinea['params']['min']=(int)$v_data['min_number'];
                $_vlinea['params']['tooSmall']='El campo debe ser minimo '.(int)$v_data['min_number'];
            }

            if(!empty($v_data['max_number'])){
                $_vlinea['params']['max']=(int)$v_data['max_number'];
                $_vlinea['params']['tooBig']='El campo debe ser maximo '.(int)$v_data['max_number'];
            }
            
        }
        
        return $_vlinea;
    }
    
    
    
    /*Funcion que valida tipo moneda
     * Separador de decimales con "."
     * Separador de miles con ","
     * @params['min'] numero minimo a validar           -> Opcional
     * @params['max'] numero maximo a validar           -> Opcional
     * @params['tooSmall']  Mensaje de error cuando el valor sea menor al minimo
     * @params['tooBig']  Mensaje de error cuando el valor sea mayor al valor maximo
     * @params['separadec'] Caracter separados de decimales -> Obligatorio
     * @params['separamiles'] Caracter separados de miles -> Obligatorio
     * @params['decimales'] Cantidad de decimales admitidos -> Obligatorio 
     */
    
    public function tipo_8($v_data,$l_array){
        
      //La respuesta solo se asigna en casilla si la pregunta es de tipo caracteristica preg 'S' 
         if($v_data['caracteristica_preg']=='S'){
            $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe 
         } 
         
        $name='rpta'.$l_array;
        $_vlinea=[$name,validateMoneda::className()];
        
        $_vlinea['params']['decimales']=4;              //Cantidad de Decimales a validar
        $_vlinea['params']['separadec']=".";              //Tipo de Separador de Decimales
        $_vlinea['params']['separamiles']=",";              //Tipo de Separador de Decimales
        
        if(!empty($v_data['min_number'])){
            $_vlinea['params']['min']=$v_data['min_number'];
            $_vlinea['params']['tooSmall']='El campo debe ser minimo '.$v_data['min_number'];
        }
        
        if(!empty($v_data['max_number'])){
            $_vlinea['params']['max']=$v_data['max_number'];
            $_vlinea['params']['tooBig']='El campo debe ser maximo '.$v_data['max_number'];
        }
        
        
        return $_vlinea;
    }
    
    
    /*Funcion que valida DETALLE MENSUAL DECIMAL 
   */ 
    public function tipo_9($v_data,$l_array){
        
        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';
        $message="falta programar";

        $_vlinea=[$name,$tipo,'message'=>$message];

        return $_vlinea;
    }
    
    
    
    /*Funcion que valida BOTON
     * No se ha terminado de programar
     */
    
    public function tipo_10($v_data,$l_array){
        
        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';
        $message="falta programar";

        $_vlinea=[$name,$tipo,'message'=>$message];

        return $_vlinea;
    }
    
    /*Funcion que valida SOPORTE
     *  [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf, xlsx, docx','maxSize'=>'512000','tooBig'=>"El maximo permitido son 500k", 'maxFiles' => 4],
     */
    
    public function tipo_11($v_data,$l_array){
        
        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='file';
        $skipOnEmpty = true;
        //$extensions="png, jpg, pdf, xlsx, docx";
        
        $_vlinea=[$name,$tipo,'skipOnEmpty'=>$skipOnEmpty,'maxFiles'=>15];
        
        if(!empty($v_data['max_number'])){
            $_vlinea['maxSize'] = $v_data['max_number'];
            $_vlinea['tooBig'] = "Tamaño maximo del archivo ".$v_data['max_number']."k";
        }
        
        if(!empty($v_data['min_number'])){
            $_vlinea['minSize'] = $v_data['min_number'];
            $_vlinea['tooSmall'] = "Tamaño maximo del archivo ".$v_data['min_number']."k";
        }

        return $_vlinea;
    }
    
    public function tipo_12($v_data,$l_array){
        
        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';
        $message="falta programar";

        $_vlinea=[$name,$tipo,'message'=>$message];

        return $_vlinea;
    }
    
    public function tipo_13($v_data,$l_array){
        
        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';
        $message="falta programar";

        $_vlinea=[$name,$tipo,'message'=>$message];

        return $_vlinea;
    }
    
    /*Las preguntas tipo 14 se validan en la subventana aqui no existen validaciones*/
    
     public function tipo_14($v_data,$l_array){
         
        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];

        return $_vlinea;
    }
    
    
    
     /*Funcion valida string / y expresiones regulares
     * Tipo = 15 en la tabla fd_tipo_pregunta
     * Fecha-Modificado: 2017-08-16
     */
    
    public function tipo_15($v_data,$l_array){
        
        //La respuesta solo se asigna en casilla si la pregunta es de tipo caracteristica preg 'S' 
         if($v_data['caracteristica_preg']=='S'){
            $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe 
         } 
          
         $name='rpta'.$l_array;
        
          /*Se cambio expresio regular para correo
           * // ^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$
           */
          if(!empty($v_data['reg_exp'])){
            
            $tipo='match';  
            $message='Correo no Valido';
            $pattern="/".$v_data['reg_exp']."/";
            $_vlinea=[$name,$tipo,'message'=>$message,'pattern'=>$pattern]; 
             
          }else if(!empty($v_data['min_largo']) and !empty($v_data['max_largo'])){
            
            $tipo='match';  
            $message='Minimo '.$v_data['min_largo'].' y maximo '.$v_data['max_largo'];
            $pattern='^.{'.$v_data['min_largo'].','.$v_data['max_largo'].'}$';
            $_vlinea=[$name,$tipo,'message'=>$message,'pattern'=>$pattern]; 
            
          }else{
             $tipo='string';
             $_vlinea=[$name,$tipo,'message'=>"asigne un string"]; 
          }
          

          
          return $_vlinea;
    }
    
     /*Las preguntas tipo 16 se validan en la subventana aqui no existen validaciones*/
    
     public function tipo_16($v_data,$l_array){
         
        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];

        return $_vlinea;
    }
    
    /********************************************FORMATEOS***************************************************/
   /*Reemplaza para construir el formato de fecha valido para PHP
    * dd -> d => entrega el dia en formato de dos digitos
    * MM -> m => entrega el mes en formato de dos digitos
    * YYYY -> Y => entrega el año en formato de 4 digitos
    */ 
   protected function formatear($tipoformato){
       
       $tipoformato = str_replace("dd", "d", $tipoformato);
       $tipoformato = str_replace("MM", "m", $tipoformato);
       $tipoformato = str_replace("yyyy", "Y", $tipoformato);
       
       return $tipoformato;
   }
   
   /**************************************SUBIENDO ARCHIVOS**********************************************
    * Se debe enviar nombre del campo de busqueda**/
    public function upload($_rpta,$rutaformato,$id_conj_rpta)
    {
        $_filesup=array();
        
                
        //Creando carpeta ==========================================================================
		if(substr($rutaformato, 0) == "/"){
			$_ruta = $rutaformato;
		}else{
			$_ruta = '../../'.$rutaformato.'/'.$id_conj_rpta.'/';
		}
		
		
        
        if(!file_exists($_ruta)){
            if(!mkdir($_ruta, 0777, true)) {
                return [false];
            }
        }
        
        
        foreach ($this->{''.$_rpta} as $file) {

            if($file->saveAs($_ruta. $file->baseName . '.' . $file->extension)){

                $this->filename = $file->baseName;
                $this->folder = $_ruta;
                $_filesup[]=$this->filename.":::".$this->folder.":::".$file->extension.":::".$file->size;
            }else{
                return [false];
            }
        }
        return [true,$_filesup];
                
    }
    
    
}
