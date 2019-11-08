<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
use \frontend\helpers\validateMoneda;
use \frontend\helpers\formatnumber;
use \frontend\helpers\savecapitulo;
use \frontend\helpers\sumnumber;
use \frontend\helpers\restnumber;
use \frontend\helpers\totnumber;

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
    public $_arraysRpta;			
    public $_operacionesModel;					




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
        $_vrequires2=array();
        $vscenario=array();
	//$_arraysRpta=array();
	


        for($a=0;$a<count($_arraycap);$a++){

            $model_indicap = $_arraycap[$a];

            /*==================================PARA PREGUNTAS SIN SECCION============================================*/
            if(!empty($v_preguntans[$model_indicap])){


                foreach ($v_preguntans[$model_indicap] as $clave){
                    
                    

                    $_bandera=0;
					
					
                    /*Almacenar en vector id de pregunta BDD asociado al array de los campos que se construyen en el formulario*/
		    $_arraysRpta[$clave['id_pregunta']] = $l_array;
                    
                    if($clave['caracteristica_preg']=='S' and $clave['obligatorio']=='S'){

                         if(empty($clave['tipo_agrupacion']) and $clave['id_tpregunta']!='11'){
                             $_vrequires[]='rpta'.$l_array;
                             $_bandera=1;
                         }

                         if($clave['id_tpregunta']=='11' and empty($clave['id_respuesta'])){
                             $_vrequires2[]='rpta'.$l_array;
                             $_bandera=1;
                         }

                    }else if($clave['caracteristica_preg']=='M' and $clave['obligatorio']=='S'){


                        //Averiguando si la pregunta tiene respuestas ===========================================================
                       if(empty($clave['id_respuesta'])){
                           $_vrequires[]='rpta'.$l_array;
                           $_bandera=1;
                       }
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
				   
				   	//Modificacion para las preguntas tipo 5 que tiene como atributo una sumatoria
					 //Fecha:2019-03-14, si existe otro tipo de validacion especial se agrega aqui =================================================
                   if(!empty($clave['atributos']) and $clave['id_tpregunta']=='5'){	//Cambio aplicado para sumatorias
			$_dataAtributos[]=$clave['atributos'];
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
				$_arraysRpta[$_clasepreg['id_pregunta']] = $l_array;
                                
                                if($_clasepreg['caracteristica_preg']=='S' and $_clasepreg['obligatorio']=='S'){

                                    if(empty($_clasepreg['tipo_agrupacion']) and $_clasepreg['id_tpregunta']!='11'){
                                        $_vrequires[]='rpta'.$l_array;
                                        $_bandera=1;
                                    }

                                    if($_clasepreg['id_tpregunta']=='11' and empty($_clasepreg['id_respuesta'])){
                                        $_vrequires2[]='rpta'.$l_array;
                                        $_bandera=1;
                                    }

                               }else if($_clasepreg['caracteristica_preg']=='M' and $_clasepreg['obligatorio']=='S'){

                                 //Averiguando si la pregunta tiene respuestas ===========================================================
                                  if(empty($_clasepreg['id_respuesta'])){
                                      $_vrequires[]='rpta'.$l_array;
                                      $_bandera=1;
                                  }
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
								
								//Modificacion para las preguntas tipo 5 que tiene como atributo una sumatoria
							   //Fecha:2019-03-14, si existe otro tipo de validacion especial se agrega aqui =================================================
							   
				if(!empty($_clasepreg['atributos']) and ($_clasepreg['id_tpregunta']=='5' or $_clasepreg['id_tpregunta']=='8' or $_clasepreg['id_tpregunta']=='6')){			//Cambio aplicado para sumatorias
                                    $_dataAtributos[]=$_clasepreg['atributos'];
				}


                                $l_array=$l_array+1;                        //Conteo para pasar a siguiente respuesta....IMPORTANTE OJO!!
                            }
                       }

                }

            }

        }


        //Requeridos para otros diferentes a 11 ===================================================================================
        $_vrules[]=[$_vrequires,'required','message' => 'Campo requerido','when' => function ($model) {
            return $model->hidden1 == '1';
            }, 'whenClient' => "function (attribute, value) {
            return $('#detcapitulo-hidden1').val() == '1';
            }"];
            
        //Requeridos para 11 ====================================================================================================
        $_vrules[]=[$_vrequires2, 'required', 'message' => 'Se necesita un archivo.', 'when' => function($model) {
                    //return  ($model->rpta23) ? 0:1;
                     return $model->hidden1 == '1';
                    }, 'whenClient' => "function (attribute, value) {
                           return $('#detcapitulo-hidden1').val() == '1';
                   }"];

	//Funciones que se leen desde la base de datos en la columna atributos para crear nuevas reglas
        if(!empty($_dataAtributos)){
            $_vrulesattrb = $this->atributosEspeciales($_dataAtributos,$_arraysRpta);
            if(!empty($_vrulesattrb))
            {
                foreach($_vrulesattrb as $_clvrulesAtrb){
                     $_vrules[]=$_clvrulesAtrb;
                }
            }
        }
		
		//$_vrules[]=['rpta24',sumnumber::className(),'params'=>['sumandos'=>'24+25','resultado'=>'23','mensajeVis'=>'Hola que carajos pasa']]; Ejemplo de lo que estoy enviando
		//==========================================================================================================================
		
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

                /*Asignando Formato: tener presente que si la fecha en "application esta separada con '/' debe usarse el mismo*/
                $_formato = Yii::$app->fmtfechasql;           //Este es el formato en que se envia la fecha a la bd
                $_formatphp = Yii::$app->fmtfechaphp;         //Este es el formato en que php reconoce la fecha, que debe quedar igual que la fecha sql

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
                if(empty($v_data['max_date'])){
                    $date_fmt = date_create($v_data['max_date']);
                    $v_data['max_date']= date_format($date_fmt, $_formatphp);
                }

                if(empty($v_data['min_date'])){
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
        $skipEmpty = true;
      
        $_vlinea=[$name,$tipo,'message'=>$message,'skipOnEmpty'=>$skipEmpty];

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
            $pattern="/".$v_data['reg_exp']."/";
            if($v_data['reg_exp'] == ''){
                $message='Correo no Valido';
            }else{   
                 $message='Valor no valido';
            }
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

          $_vlinea['skipOnEmpty'] = true;
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
            $message='El campo debe ser un número entero';
            $_vlinea=[$name,$tipo,'message'=>$message];

            if(!empty($v_data['min_number'])){
                $_vlinea['min']=(int)$v_data['min_number'];
                $_vlinea['tooSmall']='El campo debe ser minimo '.(int)$v_data['min_number'];
            }

            if($v_data['caracteristica_preg']=='S'){
                    $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
            }
            $name='rpta'.$l_array;
            $tipo='integer';
            $message='El campo debe ser un numero entero';
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


                    $_lenghtformato = strlen($v_data['format']);						//obteniendo tamaï¿½o de parte entera
                    $_lengthfmtrpta = strlen($v_data['respuesta']);						//obteniendo tamaï¿½o de parte decimal

                    if($_lenghtformato == $_lengthfmtrpta and $_lengthfmtrpta>0){								//si las partes enteras son iguales se deja quieto

                            $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe

				}else if($_lengthfmtrpta==0){
									
					$this->{'rpta'.$l_array} = $v_data['respuesta'];
				}else{																//si difieren las partes enteras se calcula el fatante y se anexan ceros

					$_cerosfaltantes =($_lenghtformato-$_lengthfmtrpta);
					$_addrpta = str_pad($v_data['respuesta'], $_cerosfaltantes, "0", STR_PAD_LEFT);
					$this->{'rpta'.$l_array} = $_addrpta; //Se asigna respuesta a la pregunta si existe
				}
				
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
		
        $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }

	/*Función creada para leer parámetro desde la base de datos en la columna atributo para realizar las operaciones*/
	
	public function atributosEspeciales($_dataAtributos,$_arraysRpta){
            $_vrules_attrb = array();
		foreach($_dataAtributos as $clave){
			$_vectorAtributos = explode(":",$clave);
		/*Para función tipo suma*/
			if($_vectorAtributos[0] == 'S'){ 
				
				
				$_preguntasasociadas = explode("=",$_vectorAtributos[1]);
				
				$_larrayresp = $_arraysRpta[$_preguntasasociadas[1]];
				
				$_sumandos = explode("+",$_preguntasasociadas[0]);
				$sumandos="";
				
				foreach($_sumandos as $_pregu_sumandos){
					$sumandos .= $_arraysRpta[$_pregu_sumandos]."+";
				}
				$sumandos = substr($sumandos,0,-1);
				
				foreach($_sumandos as $_pregu_sumandos){
					$name='rpta'.$_arraysRpta[$_pregu_sumandos];		
					$_vlinea=[$name,sumnumber::className()];
					$_vlinea['params']['sumandos']=$sumandos;
					$_vlinea['params']['resultado']=$_larrayresp;
					$_vlinea['params']['mensaje']='Error en la suma, revise los valores';
					$_vlinea['skipOnEmpty'] = true;
					$_vrules_attrb[] = $_vlinea;
				}				
				//return $_vrules_attrb;
				/*Para función tipo cálculo utilidad (resta)*/
			}else if($_vectorAtributos[0] == 'U'){
				

				$_preguntasasociadas = explode("=",$_vectorAtributos[1]);
				

				$_larrayresp = $_arraysRpta[$_preguntasasociadas[1]];
				

				$_operandos = explode("-",$_preguntasasociadas[0]);
				$operandos="";
				
				foreach($_operandos as $_pregu_operandos){
					$operandos .= $_arraysRpta[$_pregu_operandos]."-";
				}
				$operandos = substr($operandos,0,-1);
				
                                foreach($_operandos as $_pregu_operandos){
					$name='rpta'.$_arraysRpta[$_pregu_operandos];		
					$_vlinea=[$name,restnumber::className()];
					$_vlinea['params']['operandos']=$operandos;
					$_vlinea['params']['resultado']=$_larrayresp;
					$_vlinea['params']['mensaje']='Está seguro que su pérdida/utilidad es de';
					 $_vlinea['skipOnEmpty'] = true;
					$_vrules_attrb[] = $_vlinea;
				}				
				//return $_vrules_attrb;
                                
			
                        }else if($_vectorAtributos[0] == 'T'){
				
				//Separo vector para obtener campos suma y resultado
				$_preguntasasociadas = $_vectorAtributos[1];
				
				//Obteniendo respuesta asociada al resultado ========================				
				
				//Obteniendo los sumandos ===========================================
				$_operandos = explode("+",$_preguntasasociadas);
				$operandos="";
				
				foreach($_operandos as $_pregu_operandos){
					$operandos .= $_arraysRpta[$_pregu_operandos]."+";
				}
				$operandos = substr($operandos,0,-1);
				
				//Esto se aplica a todas las preguntas involucradas en sumandos ========================================================
				foreach($_operandos as $_pregu_operandos){
					$name='rpta'.$_arraysRpta[$_pregu_operandos];		//Caja a la que se aplica, las cajas llevan de nombre detcapitulo-rptaxxx esto es el rptaxxx que le da yii2
					$_vlinea=[$name,totnumber::className()];
					$_vlinea['params']['operandos']=$operandos;					
					$_vlinea['params']['mensaje']='Error en los datos, el total debe sumar 100%';
                                        $_vlinea['params']['mensaje2']='Error en los valores, no puede sumar más de 100%';
					 $_vlinea['skipOnEmpty'] = true;
					$_vrules_attrb[] = $_vlinea;
				}				
				//return $_vrules_attrb;
                                
			}
                        else
                        {
                            Yii::trace("Cualquier cosa");
                        }
		}
                return $_vrules_attrb;
	}

    /*Funcion que valida decimales
     * ['dato2', 'number','numberPattern' => '/^[0-9]+(\,[0-9]{1,2})?$/', 'message'=>'El valor debe ser numerico - separar centavos con "."']
     */
    public function tipo_6($v_data,$l_array){

        if(empty($v_data['format'])){

            if($v_data['caracteristica_preg']=='S'){
                $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
            }
            $name='rpta'.$l_array;
            $tipo='number';
            $message="El valor debe ser numerico con 2 decimales - separar decimales con '.' ";
            $pattern="/^[0-9]+(\.[0-9]{1,2})?$/";

            $_vlinea=[$name,$tipo,'numberPattern'=>$pattern,'message'=>$message];

            if(!empty($v_data['min_number'])){
                $_vlinea['min']=$v_data['min_number'];
                $_vlinea['tooSmall']='El campo debe ser minimo '.$v_data['min_number'];
            }

            if(!empty($v_data['max_number'])){
                $_vlinea['max']=$v_data['max_number'];
                $_vlinea['tooBig']='El campo debe ser maximo '.$v_data['max_number'];
            }
            if(!empty($v_data['respuesta']))
            {
                $_addrpta= number_format($v_data['respuesta'], 2,".","");
                $this->{'rpta'.$l_array} = $_addrpta;
            }

        }else{

           if($v_data['caracteristica_preg']=='S'){

           		//Se anexa correccion del numero en string para entregar a la mascara de forma correcta ==============
			//PROBAR SI DA SOLUCION ==============================================================================



				$_candesincomas = str_replace(",","",$v_data['format']);			// quitando comas al formato
				$_posicionpunto =  strpos($_candesincomas,".");						//estableciendo posicion del punto de decimal
				$_formatnodecimal = substr($_candesincomas,0,$_posicionpunto);		//estableciendo formato sin decimales
				$_lenghtformato = strlen($_formatnodecimal);						//obteniendo tama�o de parte entera



          		$_puntorpta= strpos($v_data['respuesta'],".");						//obteniendo posici�n del punto
          		$_formatnodecimal = substr($v_data['respuesta'],0,$_puntorpta);		//sacando parte entera
                        $_lengthfmtrpta = strlen($_formatnodecimal);						//obteniendo tama�o de parte decimal


                                
				if($_lenghtformato == $_lengthfmtrpta or $_lengthfmtrpta==0){								//si las partes enteras son iguales se deja quieto

					$this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe

				}else{																//si difieren las partes enteras se calcula el fatante y se anexan ceros

					$_cerosfaltantes =strlen($v_data['respuesta'])+($_lenghtformato-$_lengthfmtrpta);
					$_addrpta = str_pad($v_data['respuesta'], $_cerosfaltantes, "0", STR_PAD_LEFT);
					//Yii::trace("cual es el resultado aqui ".$_addrpta."  ".$_cerosfaltantes." que es aqui ".$_puntorpta,"DEBUG");
					$this->{'rpta'.$l_array} = $_addrpta; //Se asigna respuesta a la pregunta si existe

				}

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


         $_vlinea['skipOnEmpty'] = true;
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
				
				$_candesincomas = str_replace(",","",$v_data['format']);			// quitando comas al formato
				$_posicionpunto =  strpos($_candesincomas,".");						//estableciendo posicion del punto de decimal
				$_formatnodecimal = substr($_candesincomas,0,$_posicionpunto);		//estableciendo formato sin decimales
				$_lenghtformato = strlen($_formatnodecimal);						//obteniendo tama�o de parte entera



          		$_puntorpta= strpos($v_data['respuesta'],".");						//obteniendo posici�n del punto
          		$_formatnodecimal = substr($v_data['respuesta'],0,$_puntorpta);		//sacando parte entera
				$_lengthfmtrpta = strlen($_formatnodecimal);						//obteniendo tama�o de parte decimal



				if($_lenghtformato == $_lengthfmtrpta or $_lengthfmtrpta==0){									//si las partes enteras son iguales se deja quieto

					$this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe

				}else{																//si difieren las partes enteras se calcula el fatante y se anexan ceros

					$_cerosfaltantes =strlen($v_data['respuesta'])+($_lenghtformato-$_lengthfmtrpta);
					$_addrpta = str_pad($v_data['respuesta'], $_cerosfaltantes, "0", STR_PAD_LEFT);
					//Yii::trace("cual es el resultado aqui ".$_addrpta."  ".$_cerosfaltantes." que es aqui ".$_puntorpta,"DEBUG");
					$this->{'rpta'.$l_array} = $_addrpta; //Se asigna respuesta a la pregunta si existe

				}
				
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

         $_vlinea['skipOnEmpty'] = true;
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

        $_vlinea['params']['decimales']=2;              //Cantidad de Decimales a validar
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

         $_vlinea['skipOnEmpty'] = true;
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
         $_vlinea['skipOnEmpty'] = true;
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
         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }

    /*Funcion que valida SOPORTE
     *  [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf, xlsx, docx','maxSize'=>'512000','tooBig'=>"El maximo permitido son 500k", 'maxFiles' => 4],

     *  campo max_number => tamaño maximo del archivo
     *  campo max_files => cantidad de archivos admitidos     */

    public function tipo_11($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='file';
        
        if(empty($v_data['max_files'])){
            $v_data['max_files'] = 1;
        }
        //if($v_data['obligatorio'] == 'N'){
            $skipOnEmpty = true;
        //$extensions="png, jpg, pdf, xlsx, docx";

        $_vlinea=[$name,$tipo,'skipOnEmpty'=>$skipOnEmpty,'maxFiles'=>$v_data['max_files'],'tooMany'=>'El maximo permitido son '.$v_data['max_files'].' archivos'];

        if(!empty($v_data['max_number'])){
            $_vlinea['maxSize'] = $v_data['max_number'];
            $_vlinea['tooBig'] = "Tamaño maximo del archivo ".$v_data['max_number']."k";
        }

        if(!empty($v_data['min_number'])){
            $_vlinea['minSize'] = $v_data['min_number'];
            $_vlinea['tooSmall'] = "Tamaño maximo del archivo ".$v_data['min_number']."k";
        }
        
         $_vlinea['skipOnEmpty'] = true;
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


           $_vlinea['skipOnEmpty'] = true;
          return $_vlinea;
    }

     /*Las preguntas tipo 16 se validan en la subventana aqui no existen validaciones*/

    //edwin replicando funcion 13 VM_continua funcion 20
     public function tipo_16($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];

         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    
    /*mceron 2018-11-15
     Funcion para n campos de fuentes hidricas*/
     public function tipo_17($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];

         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    
     /*mceron 2018-11-16
     Funcion para n campos de ubicacion geografica*/
     public function tipo_18($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;

        return $_vlinea;
    }
 
     
/*mceron 2018-12-04
  Funcion para n campos de obras captacion*/
     public function tipo_19($v_data,$l_array)
	{

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    
    //VM replicando funcion 13 
     public function tipo_20($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    public function tipo_21($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    public function tipo_22($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
        $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    
    
    public function tipo_23($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    
    
    public function tipo_24($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    
    
    public function tipo_25($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];

        return $_vlinea;
    }
    
        /*Funcion valida string / y expresiones regulares
     * Tipo = 4 en la tabla fd_tipo_pregunta
     * Fecha-Modificado: 2017-08-16
     */

    public function tipo_26($v_data,$l_array){

          $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
          $name='rpta'.$l_array;

          /*Se cambio expresio regular para correo
           * // ^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$
           */
          if(!empty($v_data['reg_exp'])){

            $tipo='match';
            $pattern="/".$v_data['reg_exp']."/";
            if($v_data['reg_exp'] == ''){
                $message='Correo no Valido';
            }else{   
                 $message='Valor no valido';
            }
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


           $_vlinea['skipOnEmpty'] = true;
          return $_vlinea;
    }
	
	    /*mceron
     * Tipo de pregunta caudales
     */
    public function tipo_27($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];

         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    
        /*mceron
     * Tipo de pregunta caudales
     */
    public function tipo_28($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];

         $_vlinea['skipOnEmpty'] = true;    
        return $_vlinea;
    }
    
    /* VM REPLICANDO FUNCTION 16*/
    public function tipo_29($v_data,$l_array){
         $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    
    //EE
      /* EE REPLICANDO FUNCTION 16*/
    public function tipo_31($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }

     /* EE REPLICANDO FUNCTION 16*/
    public function tipo_32($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    
      /* EE REPLICANDO FUNCTION 16*/
    public function tipo_33($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    
    
            /*mceron
     * Tipo de pregunta caudales
     */
    public function tipo_34($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    
              /*mceron
     * Tipo de pregunta caudales
     */
    public function tipo_35($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';

        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;
        return $_vlinea;
    }
    
     public function tipo_36($v_data,$l_array){

        $this->{'rpta'.$l_array} = $v_data['respuesta']; //Se asigna respuesta a la pregunta si existe
        $name='rpta'.$l_array;
        $tipo='string';
    
        $_vlinea=[$name,$tipo];
         $_vlinea['skipOnEmpty'] = true;
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
    public function upload($_rpta,$rutaformato,$nameformato)
    {
        $_filesup=array();

        //$ruti = '//192.168.10.119/repo_ee/';
        //Creando carpeta ==========================================================================
        if(substr($rutaformato, 0) == "/"){
                $_ruta = $rutaformato.'/'.$nameformato.'/'.Yii::$app->user->identity->usuario.'/';
        }else{
                $_ruta = '../../'.$rutaformato.'/'.$nameformato.'/'.Yii::$app->user->identity->usuario.'/';
                //$_ruta = $ruti.$rutaformato.'/'.$nameformato.'/'.Yii::$app->user->identity->usuario.'/';
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
