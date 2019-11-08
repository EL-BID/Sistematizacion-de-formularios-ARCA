<?php

namespace frontend\helpers;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\poc\SopSoportes;
use common\models\poc\FdInvolucrado;
use common\models\poc\FdCoordenada;
use common\models\poc\FdUbicacion;
use common\models\poc\FdOpcionSelect;
use common\models\poc\FdRespuestaXMes;
// VM
use common\models\poc\FdInformacionComunidad;
use common\models\poc\FdRepresentantesPrestador;
use common\models\poc\FdDatosAguaPotable;
use common\models\poc\FdDatosSaneamientoAmbiental;
use common\models\poc\FdDetallesFuente;
use common\models\poc\FdDetallesCaptacion;
use common\models\poc\FdBombasCaptacion;
use common\models\poc\FdTipoSelect;
use common\models\poc\FdConduccionGravedadAp;


//MC
use common\models\poc\FdFuentesHidricas;
use common\models\poc\FdUbicacionGeografica;
use common\models\poc\FdObrasCaptacionRiego;
use common\models\poc\FdCaudalAguaPublicos;
use common\models\autenticacion\Parroquias;
use common\models\autenticacion\Cantones;
use common\models\autenticacion\Provincias;
use common\models\poc\FdElementoCondicion;

//EE
use common\models\poc\FdConduccionImpulsionApscom;
use common\models\poc\FdPotabilizPlantatraApscom;
use common\models\poc\FdTrataguaDesinfeccionApscom;

//---unico helper se indicación

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class helperHTML
{
    public $_stringhtml;
    public $htmlvista;

    /*Para detalle capitulo*/
    public $_larray;
    public $_numcapitulo = 0;
    public $_numseccion = 0;
    public $_numpregunta = 0;
    public $_estnumerado;
    public $last_seccion = 0;
    public $last_capitulo = 0;
    public $_stringvista;
    public $_varpass;
    private $_vrelaciones;
    private $_condicion = "<div class='condicion-block'></div>";
    public $_tiposoporte;
    public $_pcrear;             //Guarda permisos de crear
    public $_pactualizar;        //Guarda permisos de modificar "S" o "N"
    public $_pborrar;            //Guarda permisos de borrar "S" o "N"
    public $_pejecutar;          //Guardar permisos para ejecutar "S" o "N"
    public $id_pregagrupadas;
    public $agrupadas;
    public $vactual;
    public $td_agrupadas = array();
    public $_vectorcntag = array();
    public $tipo_archivo;
    public $preguntascondiciones;
    public $preguntashabilitadoras;
    public $_stringjavascriptcond;
    public $aplicadisable = 2;

    /*Pasando variables generales para la funcion*/
    public $id_conj_rpta;
    public $id_fmt;
    public $id_version;
    public $antvista;
    public $estado;
    public $parroquias;
    public $cantones;
    public $periodos;
    public $provincia;
    public $capituloid;
    public $idjunta;
    public $_arraysRpta;

    //==========================================================================================================================================//
    //============================================FUNCIONES GENERADORAS PARA DASHBOARD, DETCAPITULO, FORMATOHTML Y LISTCAPITULO===============//
    //==========================================================================================================================================//

    /*Funcion Generadora para la vista ListCapitulo***********************************/
    /* @_arraydata => contiene la informacion de la consulta asociada en formato vector
    * $alldata[] = ['id'=>$clave['id_capitulo'],'orden'=>$n_romano,'nomcapitulo' => $clave['nom_capitulo'], 'icono'=> $clave['icono'], 'modificar' => $clave['p_actualizar'], 'borrar' => $clave['p_borrar'], 'crear' =>$clave['p_crear'] ];
    * @id_conj_rpta => id conjunto respuesta
    * @id_conj_prta => id conjunto pregunta
    * @id_fmt => id formato
    * @last => id version
    * @estado = id estado
    * @antvista = vista de retorno en los enlaces
    */                                     
    public function gen_listcapitulos($_arraydata, $id_conj_rpta, $id_conj_prta, $id_fmt, $last, $estado, $antvista, $_permisosuser, $_datosgenerales, $_datosgenubicacion,$_datosgeneralesriego,$_dil_DatosGeneralescomunitario_ap,$_dil_DatosGeneralespublicos,$idjunta)
    {
        $var_create = $_permisosuser['p_crear'];
        $var_actualizar = $_permisosuser['p_actualizar'];
        $var_ejecutar = $_permisosuser['p_ejecutar'];
        $var_borrar = $_permisosuser['p_borrar'];

        $_stringhtml[] = '<table class="listado">';

        foreach ($_arraydata as $clave) {
            //Pasando Numero de Orden a Romano
            $n_romano = $this->romanic_number($clave['orden']);
            $_url5 = '';

            //Creando url se accedera a la siguiente pagina segun el id_tipo capitulo que se tenga en la tabla fd_capitulo

            if ($clave['id_tcapitulo'] == 1 and $var_actualizar == 'S') {
                $_url5 = Url::toRoute(['detcapitulo/index', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista,'idjunta'=>$idjunta], true);
            } elseif ($clave['id_tcapitulo'] == 1 and $var_actualizar == 'N') {
                $_url5 = Url::toRoute(['detformato/genhtml', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista,'idjunta'=>$idjunta], true);
            } elseif ($clave['id_tcapitulo'] == 2 and $clave['url'] !== null and !empty($var_actualizar)) {
                if ($clave['url'] == 'poc/datosbasicos.php') {
                    $_url5 = Url::toRoute(['detcapitulo/index', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista], true);

                    if (!empty($_datosgenerales->id_datos_generales)) {
                        $clave['respuestas'] = $clave['preguntas'];
                    } else {
                        $clave['respuestas'] = 0;
                        $clave['preguntas'] = 8;
                    }
                } elseif ($clave['url'] == 'poc/basicosubicacioncoordenada.php') {
                    $_url5 = Url::toRoute(['detcapitulo/index', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista,'idjunta'=>$idjunta], true);

                    if (!empty($_datosgenubicacion->id_datos_generales)) {
                        $clave['respuestas'] = $clave['preguntas'];
                    } else {
                        $clave['respuestas'] = 0;
                        $clave['preguntas'] = 4;
                    }
                } 
                elseif ($clave['url'] == 'poc/datosgeneralesriego.php') { /*mceron agrego para validacion del acceso a la ruta*/
                    $_url5 = Url::toRoute(['detcapitulo/index', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista], true);
                    
                    if (!empty($_datosgeneralesriego->id_datos_generales_riego)) {
                        $clave['respuestas'] = $clave['preguntas'];
                    } else {
                        $clave['respuestas'] = 0;
                        $clave['preguntas'] = 9;
                    }
                }elseif ($clave['url'] == 'poc/datosgeneralescomunitarioap.php') { /*eespinoza agrego para validacion del acceso a la ruta*/
                    $_url5 = Url::toRoute(['detcapitulo/index', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista,'idjunta'=>$idjunta], true);
                    
                    if (!empty($_dil_DatosGeneralescomunitario_ap->id_datos_generales_cumunitario_ap)) {
                        $clave['respuestas'] = $clave['preguntas'];
                    } else {
                        $clave['respuestas'] = 0;
                        $clave['preguntas'] = 4;
                    }
                } elseif ($clave['url'] == 'poc/datosgeneralespublicos.php') { /*eespinoza agrego para validacion del acceso a la ruta*/
                    $_url5 = Url::toRoute(['detcapitulo/index', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista], true);
                    
                    if (!empty($_dil_DatosGeneralespublicos->id_datos_generales_publicos)) {
                        $clave['respuestas'] = $clave['preguntas'];
                    } else {
                        $clave['respuestas'] = 0;
                        $clave['preguntas'] = 7;
                    }
                } 
                
                else {
                    $_url5 = Url::toRoute([$clave['url']]);
                }
            } elseif ($clave['id_tcapitulo'] == 3) {
                //================================================
            }

            //Yii::trace('En listado Capitulos'.$clave['id_capitulo'].'::'.$_url5, 'DEBUG');

            //Seleccionando clase segun cantidad de respuestas dadas a las preguntas=================================================
            if ($clave['respuestas'] == $clave['preguntas']) {
                $_clase = 'finish';
            } else {
                $_clase = 'title';
            }

            $_stringhtml[] = '<tr>';
            $_stringhtml[] = '<td class="'.$_clase.'">';
            $_stringhtml[] = Html::a('<span>'.$n_romano.'. '.$clave['nom_capitulo'].'</span>', $_url5);
            $_stringhtml[] = '</td>';
            $_stringhtml[] = '<td class="porcentaje">';
            /*$_stringhtml[]='50';*/
            $_stringhtml[] = '</td>';
            $_stringhtml[] = '<td class="botton">';
            $_stringhtml[] = Html::a(Html::img('@web/images/iconnext.png'), $_url5);
            $_stringhtml[] = '</td>';
            $_stringhtml[] = '</tr>';
        }

        $_stringhtml[] = '</table>';

        return [$_stringhtml, $var_actualizar, $var_create, $var_ejecutar, $var_borrar];
    }

    //Funcion Generadora de vista Dashboard*******************************************//
    /* @_arraydata => contiene la informacion de la consulta asociada en formato vector
     * $alldata[] = ['id'=>$clave['id_capitulo'],'orden'=>$n_romano,'nomcapitulo' => $clave['nom_capitulo'], 'icono'=> $clave['icono'], 'modificar' => $clave['p_actualizar'], 'borrar' => $clave['p_borrar'], 'crear' =>$clave['p_crear'] ];
     * @id_conj_rpta => id conjunto respuesta
     * @id_conj_prta => id conjunto pregunta
     * @id_fmt => id formato
     * @last => id version
     * @estado = id estado
     * @antvista = vista de retorno en los enlaces
    */

    public function gen_dashboardview($_arraydata, $id_conj_rpta, $id_conj_prta, $id_fmt, $last, $estado, $antvista, $_permisosuser, $_datosgenerales, $_datosgenubicacion,$_datosgenriego,$_dil_DatosGeneralescomunitario_ap,$_dil_DatosGeneralespublicos,$idjunta)
    {
        $var_create = $_permisosuser['p_crear'];
        $var_actualizar = $_permisosuser['p_actualizar'];
        $var_ejecutar = $_permisosuser['p_ejecutar'];
        $var_borrar = $_permisosuser['p_borrar'];

        foreach ($_arraydata as $clave) {
            //Pasando Numero de Orden a Romano
            $n_romano = $this->romanic_number($clave['orden']);
            $_url5 = '';

            //Creando url se accedera a la siguiente pagina segun el id_tipo capitulo que se tenga en la tabla fd_capitulo

            if ($clave['id_tcapitulo'] == 1 and $var_actualizar == 'S') {
                $_url5 = Url::toRoute(['detcapitulo/index', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista,'idjunta'=>$idjunta], true);
            } elseif ($clave['id_tcapitulo'] == 1 and $var_actualizar == 'N') {
                $_url5 = Url::toRoute(['detformato/genhtml', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista,'idjunta'=>$idjunta], true);
            } elseif ($clave['id_tcapitulo'] == 2 and $clave['url'] !== null and !empty($var_actualizar)) {
                if ($clave['url'] == 'poc/datosbasicos.php') {
                    $_url5 = Url::toRoute(['detcapitulo/index', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista], true);

                    if (!empty($_datosgenerales->id_datos_generales)) {
                        $clave['respuestas'] = $clave['preguntas'];
                    } else {
                        $clave['respuestas'] = 0;
                        $clave['preguntas'] = 8;
                    }
                } elseif ($clave['url'] == 'poc/basicosubicacioncoordenada.php') {
                    $_url5 = Url::toRoute(['detcapitulo/index', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista], true);

                    if (!empty($_datosgenubicacion->id_datos_generales)) {
                        $clave['respuestas'] = $clave['preguntas'];
                    } else {
                        $clave['respuestas'] = 0;
                        $clave['preguntas'] = 4;
                    }
                } 
                   elseif ($clave['url'] == 'poc/datosgeneralesriego.php') {
                    $_url5 = Url::toRoute(['detcapitulo/index', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista], true);

                    if (!empty($_datosgenriego->id_datos_generales_riego)) {
                        $clave['respuestas'] = $clave['preguntas'];
                    } else {
                        $clave['respuestas'] = 0;
                        $clave['preguntas'] = 4; 
                    }
                } elseif ($clave['url'] == 'poc/datosgeneralescomunitarioap.php') {
                    $_url5 = Url::toRoute(['detcapitulo/index', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista,'idjunta'=>$idjunta], true);

                    if (!empty($_dil_DatosGeneralescomunitario_ap->id_datos_generales_cumunitario_ap)) {
                        $clave['respuestas'] = $clave['preguntas'];
                    } else {
                        $clave['respuestas'] = 0;
                        $clave['preguntas'] = 4;
                    }
                }
                elseif ($clave['url'] == 'poc/datosgeneralespublicos.php') {
                    $_url5 = Url::toRoute(['detcapitulo/index', 'id_conj_rpta' => $id_conj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $last, 'estado' => $estado, 'id_capitulo' => $clave['id_capitulo'], '_lastvista' => $antvista], true);

                    if (!empty($_dil_DatosGeneralespublicos->id_datos_generales_publicos)) {
                        $clave['respuestas'] = $clave['preguntas'];
                    } else {
                        $clave['respuestas'] = 0;
                        $clave['preguntas'] = 4;
                    }
                } 
                else {
                    $_url5 = Url::toRoute([$clave['url']]);
                }
            } elseif ($clave['id_tcapitulo'] == 3) {
                //F================================================
            }

            //Seleccionando clase segun cantidad de respuestas dadas a las preguntas=================================================
            if ($clave['respuestas'] == $clave['preguntas']) {
                $_clase = 'finish';
            } else {
                $_clase = 'title';
            }
            $space=" ";
            $_stringhtml[] = '<div class="caja">';
            $_stringhtml[] = '<div class="linea1">';
            $_stringhtml[] = '<div class="'.$_clase.'">';
            $_stringhtml[] = '<div>'.$n_romano.'</div>';
            $_stringhtml[] = '<?= yii\helpers\Html::a("<div class=\'numcap\'>'.$space.$clave['nom_capitulo'].'</div>","'.$_url5.'"); ?>';
            $_stringhtml[] = '</div>';
            $_stringhtml[] = '</div>';
            $_stringhtml[] = '<div class="linea2">';
            $_stringhtml[] = '<div class="icono">';
            $_stringhtml[] = '<img src="'.$clave['icono'].'" width="90%" height="70%"/>';
            $_stringhtml[] = '</div>';
            /*$_stringhtml[]='<div class="valores">';
            $_stringhtml[]='<p>10/20</p>';
            $_stringhtml[]='<p>50%</p>';
            $_stringhtml[]='</div>';*/
            $_stringhtml[] = '</div>';
            $_stringhtml[] = '</div>';
        }

        if (!empty($_stringhtml)) {
            return [$_stringhtml, $var_actualizar, $var_create, $var_ejecutar, $var_borrar];
        } else {
            throw new \yii\web\HttpException(404, 'No existen capitulos asociadas al formato');
        }
    }

    /*Funcion Generadora de HTML Detalle Capitulo y Detalle Formato**************************************************************/
    public function gen_detacapituloview($_capitulos, $r_preguntans, $r_secciones, $r_pregunta, $formanumber, $_permisos, $_modelogenerales, $_modelbasicos, $_modelbasicos_coordenadas, $_modelbasicos_ubicacion,$_modelogeneralesriego,$_modelriego_ubicacion,$_modelgeneralescomunitarioap,$_modelcomunitarioap_ubicacion,$_modelgeneralespublicos,$_modelpublicos_ubicacion)
    {        
        $this->_larray = 0;
        $this->_stringvista = array();
        $this->vactual = 'detcapitulo/genvistaformato';

        /*Asignando Permisos=====================================================*/
        $this->_pcrear = $_permisos['p_crear'];
        $this->_pactualizar = $_permisos['p_actualizar'];
        $this->_pborrar = $_permisos['p_borrar'];
        $this->_pejecutar = $_permisos['p_ejecutar'];

        //Asignando Vista para las preguntas de Datos generales si se necesitan*/
        if (!empty($_modelogenerales)) {
            $this->gen_capitulogenerales($this->_pactualizar);
        }

                  //Asignando Vista para las preguntas de Datos basicos*/
        if (!empty($_modelbasicos) or !empty($_modelbasicos_coordenadas) or !empty($_modelbasicos_ubicacion)) {
                $this->gen_capitulobasico($this->_pactualizar, $_modelbasicos_ubicacion, $_modelbasicos_coordenadas);
        }
        
         //Asignando Vista para las preguntas de Datos generales para riego*/  - mfceron  agrego  para que permita el ingreso a la función para la ficha de riego
        if (!empty($_modelogeneralesriego) and !empty($_modelriego_ubicacion)) {
            $this->gen_capitulogeneralesriego($this->_pactualizar,$_modelriego_ubicacion,$_modelogeneralesriego);
        }
        
         //Asignando Vista para las preguntas de Datos generales comunitario para aps*/  - 
        if (!empty($_modelgeneralescomunitarioap) and !empty($_modelcomunitarioap_ubicacion)) {
            $this->gen_capitulogeneralescomunitarioap($this->_pactualizar,$_modelcomunitarioap_ubicacion);
        }
         //Asignando Vista para las preguntas de Datos generales prestadores públicos*/  - 
        if (!empty($_modelgeneralespublicos) and !empty($_modelpublicos_ubicacion)) {
            $this->gen_capitulogeneralespublicos($this->_pactualizar,$_modelpublicos_ubicacion);
        }        
        
        /*Declara arrays para grabar preguntas y respuestas   --mceron */
        $capitulo_seccion = array();
        $pregunta_respuesta = array();
        $pregunta_atributo = array();
    
        /*Organizando titulo de capitulo ==========================================*/
        foreach ($_capitulos as $_cpclave) {            
            $_indicecap = $_cpclave['id_capitulo'];

            /*Asignando total de columnas=============================================*/
            $_tcolumnas = $_cpclave['num_columnas'];

            /*Habilitando numeracion==================================================*/
            if ($formanumber == 'S') {
                $this->_numcapitulo = $_cpclave['orden'];
                $this->_estnumerado = 'S';
            }

            //Agregando Titulo del capitulo encontrado==============================
            $this->gen_capitulo($_cpclave, $_tcolumnas);

            /*Organizando preguntas sin seccion ====================================*/

            if (!empty($r_preguntans[$_indicecap])) {
                $this->gen_preguntans($r_preguntans[$_indicecap], $_tcolumnas, $this->_larray);
            }
            
             /*Organiznado secciones===================================================
            *Aqui se generar tambien las preguntas con seccion gen_preguntassec
            **/
            if (!empty($r_secciones[$_indicecap]) and !empty($r_pregunta[$_indicecap])) {
                $_vsecciones = $this->gen_secciones($r_secciones[$_indicecap], $_tcolumnas, $r_pregunta[$_indicecap], $this->_larray);
            }              
            /*Se recorre el array para validar las preguntas que tengan respuestas --mceron*/     
            if(!empty($r_pregunta[$_indicecap]))
            {
                $capitulo_seccion=$r_pregunta[$_indicecap];            
                foreach($capitulo_seccion as $valor)
                {      
                    foreach($valor as $v)
                    {
                        $pregunta= $v['id_pregunta'];                
                        $respuesta= $v['respuesta'];
                        /*Para los casos de check*/
                        if($respuesta=='S')$respuesta=1;                       
                        $pregunta_respuesta[$pregunta]=$respuesta;
                        $atributo = $v['atributos'];
                        $pregunta_atributo[$pregunta] =$atributo;
                    }                      
                }
            }
        }
        
        $this->_stringvista[] = '</table>';
        $this->_stringhtml = $this->_stringvista;
                 
        $_disablestring = ""; 
        $_stringjavascript ="";               
        if (!empty($this->preguntascondiciones) and !empty($this->preguntashabilitadoras)) {
                                 
            $_stringjavascript = '<script>'
                    .'function condiciones(larrayhab){ '
                    .' var arrayRelaciones= new Array(); ';
            
            $_stringjavascript .= ' arrayRelaciones={';
                                    
            $coma_ini="";
            //print_r($pregunta_respuesta);
            for ($q = 0; $q < count($this->preguntashabilitadoras); ++$q) {
                $js_hab = $this->preguntashabilitadoras[$q];
                $js_cond = $this->preguntascondiciones[$q];
                $_larrayhabilitadora = $this->_vrelaciones[$js_hab];
                $_larraycondicionada = $this->_vrelaciones[$js_cond];
                
                $_pregunta = $js_hab;
                $_bloqueos = \common\models\poc\FdElementoCondicion::find()
                     ->where(['id_pregunta_habilitadora'=>$_pregunta])->all();
                $_countbloqueos =  \common\models\poc\FdElementoCondicion::find()
                     ->where(['id_pregunta_habilitadora'=>$_pregunta])->count(); 
                                
                /*Se valida si la pregunta habilitadora fue respondida, para que en la edici&oacute;n se habilite o no los campos -- mceron*/
                $band_respuesta=false;                
                
                if(array_key_exists($js_hab,$pregunta_respuesta)){
                  $band_respuesta=true;     //mceron: valor 2 respuesta NO valor 1 respuesta si, valor 0 campo entero respuesta 0

		 //vALIDACION PARA RESPUESTA SI O NO DONDE 2 ES NO Y 1 ES SI =======================================================================
                  if($pregunta_respuesta[$js_hab]==2 or $pregunta_respuesta[$js_hab]=='' or $pregunta_respuesta[$js_hab]==0)$band_respuesta=false;   

                 //sE VALIDA LA RESPUESTA PARA VER SI SE BLOQUEA  O NO EL CAMPO ==========================================================
                  if($_countbloqueos==1){                      
                      $valor =$_bloqueos[0]['valor'];          
                      $operacion = $_bloqueos[0]['operacion'];
                      $id_pregunta_condicionada = $_bloqueos[0]['id_pregunta_condicionada'];
                                                                  
                      $band_respuesta = TRUE;               /*Modificado Diana B: 2019-02-25 se agrega*/
                      
                      if($operacion == '=' and $valor == $pregunta_respuesta[$js_hab]){
                          $band_respuesta = FALSE;
                      }else if($operacion == '<>' and $valor != $pregunta_respuesta[$js_hab]){
                          $band_respuesta = FALSE;
                      }else if($operacion == '!=' and $valor != $pregunta_respuesta[$js_hab]){
                           $band_respuesta = FALSE;
                      }else if($operacion == '>' and $valor<$pregunta_respuesta[$js_hab]){      //Si la respuesta a la pregunta habilitadora es mayor que el dato en fd_elemento_condicion.valor
                          $band_respuesta = FALSE;                          /*Modificado Diana B: 2019-02-25 se quita un igual*/
                      }else if($operacion == '<' and  $valor>$pregunta_respuesta[$js_hab] ){    //Si la respuesta a la pregunta habilitadora es menor que el dato en fd_elemento_condicion.valor
                          $band_respuesta = FALSE;                          /*Modificado Diana B: 2019-02-25 se quita un igual*/    
                      }
		      
                  }
                }
                
                
                
                //=====================================================PARA CUANDO SE TIENEN MUCHAS PREGUNTAS CODICIONADAS POR UNA SOLA ===================//
                $coma="";
                $i=0;
                $j=0;
                $_stringjavascript .= $coma_ini.' "'.$_larrayhabilitadora.'"';
                if($_countbloqueos>1)
                {
                   
                    $_stringjavascript .= ' :{';
                    foreach($_bloqueos as $bloque)
                    {
                        
                        /*Modificado por Diana B: 2019-0-25*/
                        $valor =$bloque->valor;          
                        $operacion = $bloque->operacion;
                        $band_respuesta = TRUE;               /*Modificado Diana B: 2019-02-25 se agrega*/
                        $data_response = (!empty($pregunta_respuesta[$bloque->id_pregunta_habilitadora]))? $pregunta_respuesta[$bloque->id_pregunta_habilitadora]:'';
                        
                        $coma_condi="";
                        if($i>0)$coma=",";                                                                             
                        $_pregunta_condiciona=$bloque->id_pregunta_condicionada;
                        $_condi=$this->_vrelaciones[$_pregunta_condiciona];   
                        
                        
                        
                        
                        if($operacion == '=' and $valor == $data_response){
                          $band_respuesta = FALSE;
                        }else if($operacion == '<>' and $valor != $data_response){
                            $band_respuesta = FALSE;
                        }else if($operacion == '!=' and $valor != $data_response){
                            $band_respuesta = FALSE;
                        }else if($operacion == '>' and $data_response>$valor){
                            $band_respuesta = FALSE;                          /*Modificado Diana B: 2019-02-25 se quita un igual*/
                        }else if($operacion == '<' and  $data_response<$valor){
                            $band_respuesta = FALSE;                          /*Modificado Diana B: 2019-02-25 se quita un igual*/    
                        }
                       /*Quemo para la información del RUC -- validacion inútil solicitada*/
                        if($bloque->id_pregunta_habilitadora==1298)
                        {                                                                          
                            if($data_response==1)
                            {                                                             
                                $_disablestring .= 'document.getElementById("detcapitulo-rpta10").disabled =false;';
                                $_disablestring .= 'document.getElementById("detcapitulo-rpta9").disabled =true;';
                                
                            } 
                            else
                            {
                               $_disablestring .= 'document.getElementById("detcapitulo-rpta10").disabled =true;';   
                            }
                        }
                        else
                        {
                        
                        if(!empty($band_respuesta)){
                            $_disablestring .= 'document.getElementById("detcapitulo-rpta'.$_condi.'").disabled = '.$band_respuesta.';';
                        
                            if($band_respuesta == TRUE){
                                
                                //Averiguando tipo de pregunta de la pregunta condicionada ======================================================
                                $_tipo = $this->getTipoPregunta($bloque->id_pregunta_condicionada);
                                
                                if($_tipo != "NA"){
                                     $_disablestring .= 'document.getElementById("detcapitulo-rpta'.$_condi.'").value = "'.$_tipo.'";';
                                }                                                              
                            }
                        }
                        }
                        /*Final modificacion*/
                        
                        if($j<$_countbloqueos-1)$coma_condi=","; 
                        $_stringjavascript .= ' "'.$j.'" : '.$_condi.$coma_condi;
                        $i++;
                        $j++;
                    }                    
                    $_stringjavascript .= '}';

                }
                else
                {
                     $_stringjavascript .= ' : '.$_larraycondicionada.'';
     
                   /*Quemo para la información del RUC -- validacion inútil solicitada*/
                    if($js_hab==1299)
                        {                            
                            if($pregunta_respuesta[$js_hab] == 1)
                            {                                
                                $_disablestring .= 'document.getElementById("detcapitulo-rpta10").disabled =false;';                                
                            }
                            else
                            {
                                if(!empty($pregunta_respuesta[$js_hab]))
                                $_disablestring .= 'document.getElementById("detcapitulo-rpta10").disabled =true;';
                            }                            
                        }
                        else                        
                        {                                                           
                        /*Modificado Diana B: 2019-02-25 se re-programa*/
                        if(!empty($band_respuesta)){
                            $_disablestring .= 'document.getElementById("detcapitulo-rpta'.$_larraycondicionada.'").disabled = '.$band_respuesta.';';
                            if($band_respuesta == TRUE){
                                $_tipo = $this->getTipoPregunta($id_pregunta_condicionada);
                                if($_tipo != "NA"){
                                    $_disablestring .= 'document.getElementById("detcapitulo-rpta'.$_larraycondicionada.'").value = "'.$_tipo.'";';
                                }
                            }
                        }
                }
                    
         
                }
              $coma_ini=",";
               
            }

            $_stringjavascript .= '}; return arrayRelaciones[larrayhab]; '
                                   .' }</script>';

            
                Yii::trace("probando la funcion de javascript dinamica ".$_stringjavascript,"DEBUG");
        }
        
        /*Se valida para bloqueo del caso especial de los valores */
        if(!empty($pregunta_atributo)){
            $buscar="T:";
            $suma = 0;
            
            $resultados_v = array();
            foreach($pregunta_atributo as $k=>$att)
            {
                if(strpos($att,$buscar)!== false){  
                    $suma+=$pregunta_respuesta[$k];
                    $_larraycondicionada = $this->_vrelaciones[$k];
                    $resultados_v[$k]=$pregunta_respuesta[$k];
                    if($suma==100)
                    {                        
                        if($pregunta_respuesta[$k]>0){
                         $band_respuesta="false";
                         $_disablestring .= 'document.getElementById("detcapitulo-rpta'.$_larraycondicionada.'").disabled = '.$band_respuesta.';';
                        }
                        else
                        {
                            $band_respuesta="true";
                            $_disablestring .= 'document.getElementById("detcapitulo-rpta'.$_larraycondicionada.'").disabled = '.$band_respuesta.';';
                        }
                    }                
                }
            }  
                if($suma==100)
                {
                    foreach($resultados_v as $k=>$v)
                    {
                        $_larraycondicionada = $this->_vrelaciones[$k];
                        if($v>0)
                        {
                          $band_respuesta="false";
                         $_disablestring .= 'document.getElementById("detcapitulo-rpta'.$_larraycondicionada.'").disabled = '.$band_respuesta.';';
                        }
                        else
                        {
                            $band_respuesta="true";
                            $_disablestring .= 'document.getElementById("detcapitulo-rpta'.$_larraycondicionada.'").disabled = '.$band_respuesta.';';
                        }
                    }
                }            
          }    
       
       $_stringjavascript .= '<script>'
                               .'window.onload = function (){ '
                               .$_disablestring.'} </script>';

           $this->_stringjavascriptcond = $_stringjavascript;
        return true;
    }

    /*Funcion que genera string sin cajitas ni eventos HTML para el FORMATOHTML*/
    public function gen_formatoHTML($_capitulos, $r_preguntans, $r_secciones, $r_pregunta, $formanumber, $_permisos, $_modelogenerales, $modelpreguntas, $_modelbasicos, $_modelbasicos_coordenadas, $_modelbasicos_ubicacion,$_modelgeneralesriego="",$_modelriego_ubicacion="",$_modelgeneralescomunitarioap="",$_modelcomunitarioap_ubicacion="",$_modelgeneralespublicos="",$_modelpublicos_ubicacion="",$idjunta="")
    {
        $this->_larray = 0;
        //Asignando Vista para las preguntas de Datos generales si se necesitan*/
        if (!empty($_modelogenerales)) {
            $this->gen_capitulogeneralesHTML($_modelogenerales);
        }

        if (!empty($_modelbasicos) or !empty($_modelbasicos_coordenadas) or !empty($_modelbasicos_ubicacion)) {
            $this->gen_capitulobasicoHTML($_modelbasicos, $_modelbasicos_ubicacion, $_modelbasicos_coordenadas);
        }
        
        if (!empty($_modelgeneralesriego) or !empty($_modelriego_ubicacion)) {
            $this->gen_capitulogeneralesriegoHTML($_modelgeneralesriego,$_modelriego_ubicacion,$_modelgeneralesriego);
        }
        
        if (!empty($_modelgeneralescomunitarioap) or !empty($_modelcomunitarioap_ubicacion)) {
            $this->gen_capitulogeneralescomunitarioapHTML($_modelgeneralescomunitarioap,$_modelcomunitarioap_ubicacion);
        }
        if (!empty($_modelgeneralespublicos) or !empty($_modelpublicos_ubicacion)) {
            $this->gen_capitulogeneralespublicosHTML($_modelgeneralespublicos,$_modelpublicos_ubicacion);
        }

        /*Organizando titulo de capitulo ==========================================*/

        foreach ($_capitulos as $_cpclave) {
            $_indicecap = $_cpclave['id_capitulo'];

            /*Asignando total de columnas=============================================*/
            $_tcolumnas = $_cpclave['num_columnas'];

            /*Habilitando numeracion==================================================*/
            if ($formanumber == 'S') {
                $this->_numcapitulo = $_cpclave['orden'];
                $this->_estnumerado = 'S';
            }

            //Agregando Titulo del capitulo encontrado==============================
            $this->gen_capituloHTML($_cpclave, $_tcolumnas);

            /*Organizando preguntas sin seccion ====================================*/

            if (!empty($r_preguntans[$_indicecap])) {
                $this->gen_preguntansHTML($r_preguntans[$_indicecap], $_tcolumnas, $this->_larray, $modelpreguntas);
            }

            /*Organiznado secciones===================================================
            *Aqui se generar tambien las preguntas con seccion gen_preguntassec
            **/
            if (!empty($r_secciones[$_indicecap]) and !empty($r_pregunta[$_indicecap])) {
                $this->gen_seccionesHTML($r_secciones[$_indicecap], $_tcolumnas, $r_pregunta[$_indicecap], $this->_larray, $modelpreguntas,$idjunta);
            }

            $this->htmlvista .= '</table>';
        }

        $this->_stringhtml = $this->htmlvista;
    }

    //===================================================================================================================================//
    /*=====================================================SUBFUNCIONES GENERADORAS======================================================*/
    //===================================================================================================================================//

    /*Funcion para generar el inicio
     * del capitulo en detalle capitulo para llenar por el usuario
     */
    protected function gen_capitulo($m_capitulo, $_tcolumnas)
    {
        /*Habilitando numeracion==================================================*/
        if ($this->_estnumerado == 'S') {
            $this->_numcapitulo = $m_capitulo['orden'];
        }

        $this->_stringvista[] = '<table class="tbcapitulo">';

        //'labelpregunta'.$_clavepns['stylecss']
        if (!empty($m_capitulo)) {
            $this->_stringvista[] = '<tr>
                                    <td class="nomcapitulo'.$m_capitulo['stylecss'].'" colspan="'.$_tcolumnas.'">
                                               '.$this->romanic_number($m_capitulo['orden']).'. '.$m_capitulo['nom_capitulo'].'
                                    </td>
                                </tr>';
        }
    }

    /*Funcion para general el inicio del capitulo
     * en formatoHTML================== SE SACA POR APARTE POR SI SE DEBE REALIZAR ALGUN CAMBIO DE STILOS O DE FORMA
     */
    protected function gen_capituloHTML($m_capitulo, $_tcolumnas)
    {        
        $clase="nomcapitulo".$m_capitulo['stylecss'];
        /*Habilitando numeracion==================================================*/
        if ($this->_estnumerado == 'S') {
            $this->_numcapitulo = $m_capitulo['orden'];
        }        
        $this->htmlvista .= '<table class="tbcapitulo" >';

        if (!empty($m_capitulo)) {
            $this->htmlvista .= '<tr>
                                    <td class="'.$clase.'" colspan="'.$_tcolumnas.'">
                                               '.$this->romanic_number($m_capitulo['orden']).'.'.htmlentities($m_capitulo['nom_capitulo']).'
                                    </td>
                                </tr>';
        }
    }

    /*Funcion para agregar las casillas para ingresar datos
     * del capitulo tipo datos basicos con ubicacion y coordenadas
     * verificar que este capitulo existe solos si en fd_capitulos se encuentra un capitulo tipo ='2' and url = poc/basicosubicacioncoordenada.php
     * model_basicos => fd_datos_generales
     * model_basicos_coordenadas => fd_coordendas  */

    protected function gen_capitulobasico($varactualizar, $_modelbasicos_ubicacion, $_modelbasicos_coordenadas)
    {
        /*Verificando permisos para desactivar casillas*/
        if ($varactualizar == 'S') {
            $_disabled = 'FALSE';
        } else {
            $_disabled = 'TRUE';
        }

        $this->_stringvista[] = '<table class="tbcapitulo" ><tr>
                                 <td class="nomcapitulo" colspan="4">
                                            '.$this->romanic_number('1').'.FICHA DE AUTOEVALUACION PARA LA PRESENTACION DEL SERVICIO DE RIEGO
                                 </td>
                             </tr>';

        $this->_stringvista[] = '<tr><td width="25%" class="labelpregunta">NOMBRE DEL PRESTADOR DEL SERVICIO: '
                                    .$this->fnt_tooltip('texto pregunta 1').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta" width="25%"><?= $form->field($_modelbasicos, "nombres")->textInput(["disabled" => '.$_disabled.'])->label(false); ?></td>';

        $this->_stringvista[] = '<td  width="25%" class="labelpregunta">NOMBRE DEL SISTEMA DE RIEGO: '
                                    .$this->fnt_tooltip('texto pregunta 1').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta"  width="25%"><?= $form->field($_modelbasicos, "nom_sistema")->textInput(["disabled" => '.$_disabled.'])->label(false); ?></td></tr>';

        $this->_stringvista[] = '<tr><td width="25%" class="labelpregunta">Provincia: '
                                    .$this->fnt_tooltip('texto pregunta 1').'</td>';

        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelbasicos_ubicacion, "cod_provincia")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(),'
                                .'"cod_provincia","nombre_provincia"),'
                                .'["prompt"=>"Seleccione una provincia","disabled"=>'.$_disabled.',"onchange"=>\'$.post("index.php?r=fdubicacion/listado&id=\'.\'"+$(this).val(),function(data){'
                                .'$("#fdubicacion_var-cod_canton").html(data);'
                                .'});\'])->label(false); ?></td>';

        $this->_stringvista[] = '<td width="25%" class="labelpregunta">Cant&oacute;n: '
                                    .$this->fnt_tooltip('texto pregunta 1').'</td>';

        if (!empty($_modelbasicos_ubicacion->cod_canton)) {
            $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelbasicos_ubicacion, "cod_canton")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map($cantonesPost,"cod_canton","nombre_canton"),'
                                .'["prompt"=>"Seleccione un canton","disabled"=>'.$_disabled.',"onchange"=>\'demarcaciones()\'])->label(false); ?></td></tr>';
        } else {
            $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelbasicos_ubicacion, "cod_canton")->dropDownList('
                                .'[],'
                                .'["prompt"=>"Seleccione un canton","disabled"=>'.$_disabled.',"onchange"=>\'demarcaciones()\'])->label(false); ?></td></tr>';
        }

        $this->_stringvista[] = '<tr><td width="25%" class="labelpregunta">Demarcaci&oacute;n Hidrogr&aacute;fica: '
                                    .$this->fnt_tooltip('texto pregunta 1').'</td>';

        if (!empty($_modelbasicos_ubicacion->id_demarcacion)) {
            $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelbasicos_ubicacion, "id_demarcacion")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map($demarcacionespost,"id_demarcacion","nombre_demarcacion"),'
                                .'["prompt"=>"Seleccione una demarcaci&oacute;n","disabled"=>'.$_disabled.'])->label(false); ?></td>';
        } else {
            $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelbasicos_ubicacion, "id_demarcacion")->dropDownList('
                                .'[],'
                                .'["prompt"=>"Seleccione una demarcaci&oacute;n","disabled"=>'.$_disabled.'])->label(false); ?></td>';
        }

        $this->_stringvista[] = '<td width="25%" class="labelpregunta">Coordenadas X: '
                                    .$this->fnt_tooltip('texto pregunta 1').'</td>';

        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelbasicos_coordenadas, "x")->widget(\yii\widgets\MaskedInput::className(),'
                  .'["mask" => "99.99999","options"=>["disabled" =>'.$_disabled.']])->label(false); ?></td></tr>';

        $this->_stringvista[] = '<tr><td width="25%" class="labelpregunta">Coordenadas Y: '
                                    .$this->fnt_tooltip('texto pregunta 1').'</td>';

        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelbasicos_coordenadas, "y")->widget(\yii\widgets\MaskedInput::className(),'
                  .'["mask" => "99.99999","options"=>["disabled" =>'.$_disabled.']])->label(false); ?></td>';

        $this->_stringvista[] = '<td width="25%" class="labelpregunta">Altura: '
                                    .$this->fnt_tooltip('texto pregunta 1').'</td>';

        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelbasicos_coordenadas, "altura")->widget(\yii\widgets\MaskedInput::className(),'
                  .'["mask" => "99.99999","options"=>["disabled" =>'.$_disabled.']])->label(false); ?></td>';

        $this->_stringvista[] = '<tr><td width="25%" class="labelpregunta">Tipo de Coordenada: '
                                    .$this->fnt_tooltip('texto pregunta 1').'</td>';

        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelbasicos_coordenadas, "id_tcoordenada")->dropDownList('
                                .'yii\helpers\ArrayHelper::map(common\models\poc\TrTipoCoordenada::find()->all(),'
                                .'"id_tcoordenada","nom_tcoordenada"),'
                                .'["prompt"=>"Seleccione","disabled"=>'.$_disabled.'])->label(false); ?></td>';

        $this->_stringvista[] = '<td width="25%" class="labelpregunta">Nombre del Representante Legal: '
                                    .$this->fnt_tooltip('texto pregunta 1').'</td>';

        $this->_stringvista[] = '<td class="inputpregunta" width="25%"><?= $form->field($_modelbasicos, "nom_replegal")->textInput(["disabled" => '.$_disabled.'])->label(false); ?></td></tr>';

        $this->_stringvista[] = '<tr><td width="25%" class="labelpregunta">Fecha: '
                                    .$this->fnt_tooltip('texto pregunta 1').'</td>';

        $this->_stringvista[] = '<td class="inputpregunta" width="25%"><?= $form->field($_modelbasicos, "fecha")->'
                                .'widget(yii\jui\DatePicker::className(),['
                                .'"dateFormat"=>"dd/MM/yyyy",'
                                .'"clientOptions"=>['
                                .'"changeYear" => true,'
                                .'"changeMonth" => true]'
                                .'])->label(false); ?></td></tr></table>';
    }

    /*Funcion que genera el stringhtml valido para
     * los documentos de excel, word y pdf
     */

    protected function gen_capitulobasicoHTML($_modelbasicos, $_modelbasicos_ubicacion, $_modelbasicos_coordenadas)
    {
        $this->htmlvista .= '<table class="tbcapitulo"><tr>
                                 <td class="nomcapitulo" colspan="4">
                                            '.$this->romanic_number('1').'.FICHA DE AUTOEVALUACION PARA LA PRESENTACION DEL SERVICIO DE RIEGO
                                 </td>
                             </tr>';
        $this->htmlvista .= '<tr><td class="labelpregunta">NOMBRE DEL PRESTADOR DEL SERVICIO: </td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelbasicos->nombres.'</td>';

        $this->htmlvista .= '<td class="labelpregunta">NOMBRE DEL SISTEMA DE RIEGO:</td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelbasicos->nom_sistema.'</td></tr>';

        $this->htmlvista .= '<tr><td class="labelpregunta">PROVINCIA: </td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$this->nom_provincia($_modelbasicos_ubicacion->cod_provincia).'</td>';

        $this->htmlvista .= '<td class="labelpregunta">CANTON: </td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$this->nom_canton($_modelbasicos_ubicacion->cod_canton, $_modelbasicos_ubicacion->cod_provincia).'</td></tr>';

        $this->htmlvista .= '<tr><td class="labelpregunta">Demarcacion: </td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$this->demarcaciones($_modelbasicos_ubicacion->id_demarcacion).'</td>';

        $this->htmlvista .= '<td class="labelpregunta">COORDENADA X: </td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelbasicos_coordenadas->x.'</td></tr>';

        $this->htmlvista .= '<tr><td class="labelpregunta">COORDENADA Y: </td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelbasicos_coordenadas->y.'</td>';

        $this->htmlvista .= '<td class="labelpregunta">ALTURA: </td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelbasicos_coordenadas->altura.'</td></tr>';

        $this->htmlvista .= '<tr><td class="labelpregunta">TIPO DE COORDENADA: </td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$this->tipocoordenada($_modelbasicos_coordenadas->id_tcoordenada).'</td>';

        $this->htmlvista .= '<td class="labelpregunta">NOMBRE REPRESENTANTE LEGAL: </td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelbasicos->nom_replegal.'</td></tr>';

        $this->htmlvista .= '<tr><td class="labelpregunta">FECHA: </td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelbasicos->fecha.'</td></tr></table>';
    }

    /*Funcion que agrega las casillas para ingresar datos a la tabla
     * Fd_Datos_Generales si el formato asi lo requiere
     */
    protected function gen_capitulogenerales($varactualizar)
    {
        /*Verificando permisos para desactivar casillas*/
        if ($varactualizar == 'S') {
            $_disabled = 'FALSE';
        } else {
            $_disabled = 'TRUE';
        }

        $this->_stringvista[] = '<table class="tbcapitulo" ><tr>
                                 <td class="nomcapitulo" colspan="4">
                                            '.$this->romanic_number('1').'.INFORMACI&Oacute;N GENERAL DEL SOLICITANTE
                                 </td>
                             </tr>';

        $this->_stringvista[] = '<tr><td colspan="2" width="50%" class="labelpregunta">NOMBRES Y APELLIDOS DEL USUARIO AUTORIZADO/CONCESIONADO, REPRESENTANTE LEGAL O SOLICITANTES AUTORIZADO: '.$this->fnt_tooltip('texto pregunta 1').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta" colspan="2" width="50%"><?= $form->field($modelgenerales, "nombres")->textInput(["disabled" => '.$_disabled.'])->label(false); ?></td></tr>';

        $this->_stringvista[] = '<tr><td class="labelpregunta">Numero de Celular:'.$this->fnt_tooltip('texto pregunta 2').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($modelgenerales, "num_celular")->textInput(["disabled" => '.$_disabled.'])->label(false); ?></td>';
        $this->_stringvista[] = '<td class="labelpregunta">Numero Convencional:'.$this->fnt_tooltip('texto pregunta 3').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($modelgenerales, "num_convencional")->textInput(["disabled" => '.$_disabled.'])->label(false); ?></td></tr>';

        $this->_stringvista[] = '<tr><td class="labelpregunta">Tipo de Documento:'.$this->fnt_tooltip('texto pregunta 4').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($modelgenerales, "id_tdocumento")->dropDownList('
                                .'yii\helpers\ArrayHelper::map(common\models\poc\TrTipoDocumento::find()->all(),'
                                .'"id_tdocumento","nom_tdocumento"),'
                                .'["prompt"=>"Seleccione","disabled"=>'.$_disabled.'])->label(false); ?></td>';

        $this->_stringvista[] = '<td class="labelpregunta">C&eacute;dula y/o RUC:</td>';
        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($modelgenerales, "num_documento")->textInput(["disabled" => '.$_disabled.'])->label(false); ?></td></tr>';

        $this->_stringvista[] = '<tr><td colspan="1" class="labelpregunta">Direccion:</td>';
        $this->_stringvista[] = '<td colspan="3" class="inputpregunta"><?= $form->field($modelgenerales, "direccion")->textInput(["disabled" => '.$_disabled.'])->label(false); ?></td></tr>';

        $this->_stringvista[] = '<tr><td colspan="1" class="labelpregunta">Descripcion Trabajo:</td>';
        $this->_stringvista[] = '<td colspan="3" class="inputpregunta"><?= $form->field($modelgenerales, "descripcion_trabajo")->textInput(["disabled" => '.$_disabled.'])->label(false); ?></td></tr>';

        $this->_stringvista[] = '<tr><td colspan="1" class="labelpregunta">Correo Electronico:</td>';
        $this->_stringvista[] = '<td colspan="3" class="inputpregunta"><?= $form->field($modelgenerales, "correo_electronico")->textInput(["disabled" => '.$_disabled.'])->label(false); ?></td></tr>';

        $this->_stringvista[] = '<tr><td class="labelpregunta">Tipo de Personal:</td>';
        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($modelgenerales, "id_natu_juridica")->dropDownList('
                                .'yii\helpers\ArrayHelper::map(common\models\poc\TrTipoNatuJuridica::find()->all(),'
                                .'"id_natu_juridica","nom_natu_juridica"),'
                                .'["prompt"=>"Seleccione","disabled"=>'.$_disabled.'])->label(false); ?></td>';
        $this->_stringvista[] = '<td class="labelpregunta">Nombres y Apellidos Rep. Legal:</td>';
        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($modelgenerales, "nombres_apellidos_replegal")->textInput(["disabled" => '.$_disabled.'])->label(false); ?></td></tr></table>';
    }
    
    
     /*mceron
       Funcion que agrega las casillas para ingresar datos a la tabla
     * Fd_Datos_GeneralesRiego si el formato asi lo requiere
     */
    protected function gen_capitulogeneralesriego($varactualizar,$_modelriego_ubicacion,$_modelogeneralesriego)
    {
        
        /*Verificando permisos para desactivar casillas*/
        if ($varactualizar == 'S') {
            $_disabled = 'FALSE';
        } else {
            $_disabled = 'TRUE';
        }
        $bande_fono='FALSE';
        $bande_email='FALSE';
        if(!empty($_modelogeneralesriego))
        {
            $posee_fono  = $_modelogeneralesriego["posee_convencional"];            
            $posee_email = $_modelogeneralesriego["posee_email"];            
            if(($posee_fono==2) or ($posee_fono=='')){$bande_fono='TRUE';}
            if(($posee_email==2) or ($posee_email=='')){$bande_email='TRUE';}
        }        
         $_nombrevalor = FdTipoSelect::find()
                        ->where(['nom_tselect'=>'SI/NO'])
                        ->one();
                $valor_tselect= $_nombrevalor->id_tselect;
        
        $this->_stringvista[] = '<table class="tbcapitulo" ><tr>
                                 <td class="nomcapitulo" colspan="4">
                                            '.$this->romanic_number('1').'. IDENTIFICACI&Oacute;N Y UBICACI&Oacute;N DEL PRESTADOR DEL SERVICIO</td></tr>';
        
        $this->_stringvista[] = '<tr><td class="labelpregunta">Nombre del Prestador del Servicio: '.$this->fnt_tooltip('Colocar el nombre del Prestador del Servicio Público de Riego y Drenaje como se encuentre registrado en la autorizaci&oacute;n del uso y aprovechamiento del agua').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta" colspan="2" width="75%"><?= $form->field($modelgeneralesriego, "nombres_prestador_servicio")->textInput(["disabled" => '.$_disabled.',"maxlength" => 200,"onkeyUp"=>"return soloMayusculas(event,this)"])->label(false); ?></td></tr>';

        $this->_stringvista[] = '<tr><td class="labelpregunta">Direcci&oacute;n de las oficinas:'.$this->fnt_tooltip('Especificar el lugar donde se realizan las asambleas generales de manera frecuente y una referencia exacta del lugar').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta" colspan="2" width="75%" ><?= $form->field($modelgeneralesriego, "direccion_oficinas")->textInput(["disabled" => '.$_disabled.',"maxlength" => 300, "onkeyUp"=>"return soloMayusculas(event,this)"])->label(false); ?></td></tr>';
        
        $this->_stringvista[] = '<tr><td class="labelpregunta" >Nombre del representante legal:'.$this->fnt_tooltip('Colocar los 2 nombres y los 2 apellidos').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta" colspan="2" width="75%"><?= $form->field($modelgeneralesriego, "nombres_apellidos_replegal")->textInput(["disabled" => '.$_disabled.', "onkeypress"=>"return soloLetras(event)","onkeyUp"=>"return soloMayusculas(event,this)"])->label(false); ?></td></tr>';
        
        $this->_stringvista[] = '</table><table>'; 
        $this->_stringvista[] = '<tr><td class="labelpregunta">Tel&eacute;fono del representante legal: '.$this->fnt_tooltip('Colocar el número convencional anteponiendo el código de la provincia y el número de celular').'</td>';
        
        $this->_stringvista[] = '<td class="labelpregunta3">Posee tel&eacute;fono convencional:</td>';
        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($modelgeneralesriego, "posee_convencional")->dropDownList('
                                .'yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(["id_tselect"=>'.$valor_tselect.'])->all(),' 
                                .'"id_opcion_select","nom_opcion_select"),'
                                .'["prompt"=>"Seleccione","disabled"=>'.$_disabled.',"onchange"=>"Bloqueocampo(this,\'num_convencional\');"])->label(false); ?></td>';
        
        $this->_stringvista[] = '<td class="labelpregunta3">Convencional:';
        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($modelgeneralesriego, "num_convencional")->textInput(["disabled" => '.$bande_fono.',"maxlength" => 9,"onkeypress"=>"return soloNumeros(event,this)"])->label(false); ?></td><tr>';

        $this->_stringvista[] = '<tr><td class="labelpregunta3"></td>';
        $this->_stringvista[] = '<td class="labelpregunta3">Celular 1:</td>';
        $this->_stringvista[] = '<td class="inputpregunta" ><?= $form->field($modelgeneralesriego, "num_celular")->textInput(["disabled" => '.$_disabled.',"maxlength" => 10,"onkeypress"=>"return soloNumeros(event,this)"])->label(false); ?></td>';
        
        $this->_stringvista[] = '<td class="labelpregunta3">Celular 2:</td>';
        $this->_stringvista[] = '<td class="inputpregunta" ><?= $form->field($modelgeneralesriego, "num_celular_otro")->textInput(["disabled" => '.$_disabled.',"maxlength" => 10,"onkeypress"=>"return soloNumeros(event,this)"])->label(false); ?></td></tr>';
        
        //$this->_stringvista[] = '</table><table>'; 

        $this->_stringvista[] = '<tr><td class="labelpregunta">Correo electr&oacute;nico del representante legal: '.$this->fnt_tooltip('Ingresar el correo electr&oacute;nico').'</td>';
        $this->_stringvista[] = '<td class="labelpregunta3">Posee correo electr&oacute;nico:</td>';
        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($modelgeneralesriego, "posee_email")->dropDownList('
                                .'yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where(["id_tselect"=>'.$valor_tselect.'])->all(),' 
                                .'"id_opcion_select","nom_opcion_select"),'
                                .'["prompt"=>"Seleccione","disabled"=>'.$_disabled.',"onchange"=>"Bloqueocampo(this,\'correo_electronico\');"])->label(false); ?></td>';
        
        $this->_stringvista[] = '<td class="labelpregunta3">Correo electr&oacute;nico:</td>';
        $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($modelgeneralesriego, "correo_electronico")->textInput(["disabled" => '.$bande_email.',"maxlength" => 100,"onkeyUp"=>"return soloMinusculas(this)"])->label(false); ?></td></tr>';
                       
        $this->_stringvista[] = '</table><table>'; 
      
               
        $this->_stringvista[] = '<tr><td width="25%" class="labelpregunta">Provincia: '
                                    .$this->fnt_tooltip('Seleccione provincia').'</td>';
        
        
         $_select_cjresp = \common\models\poc\FdConjuntoRespuesta::find()
                        ->where(['id_conjunto_respuesta'=>$this->id_conj_rpta])
                        ->one();
         $valor_cjresp= $_select_cjresp->id_entidad;
         
         $_select_entidad = \common\models\autenticacion\Entidades::find()
                        ->where(['id_entidad'=>$valor_cjresp])
                        ->one();
         $valor_prov= $_select_entidad->cod_provincia_p;           
         $valor_canton= $_select_entidad->cod_canton_p;           
                                

        $this->_stringvista[] = '<td class="inputpregunta" width="25%"><?= $form->field($_modelriego_ubicacion, "cod_provincia")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(),"cod_provincia","nombre_provincia"),'
                                .'["prompt"=>"Seleccione una provincia","disabled"=>true,"onchange"=>\'$.post("index.php?r=fdubicacion/listado&id=\'.\'"+$(this).val(),function(data){'
                                .'$("#fdubicacion_var-cod_canton").html(data);'
                                .'});\','
                                .'"options" =>
                                       ['
                                        .$valor_prov.'=>["selected" => true]
                                       ]
                                    ]'
                                .')->label(false); ?></td>';
        $this->_stringvista[] = '<?= $form->field($_modelriego_ubicacion, "cod_provincia")->hiddenInput(["value"=>'.$valor_prov.'])->label(false); ?>';
        
        $this->_stringvista[] = '<td width="25%" class="labelpregunta">Cant&oacute;n: '
                                    .$this->fnt_tooltip('Seleccione cantón').'</td>';           

        //if (!empty($_modelriego_ubicacion->cod_canton)) {
        $this->_stringvista[] = '<td class="inputpregunta" width="25%" ><?= $form->field($_modelriego_ubicacion, "cod_canton")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map($cantonesPost,"cod_canton","nombre_canton"),'
                                .'["prompt"=>"Seleccione un canton","disabled"=>true,"onchange"=>\'demarcaciones()\','
                                .'"options" =>
                                       ['
                                        .$valor_canton.'=>["selected" => true]
                                       ]
                                    ]'  
                                .')->label(false); ?></td></tr>';
        
        $this->_stringvista[] = '<?= $form->field($_modelriego_ubicacion, "cod_canton")->hiddenInput(["value"=>'.$valor_canton.'])->label(false); ?>';
        /*} else {
            $this->_stringvista[] = '<td class="inputpregunta" width="25%"><?= $form->field($_modelriego_ubicacion, "cod_canton")->dropDownList('
                                .'[],'
                                .'["prompt"=>"Seleccione un canton","disabled"=>'.$_disabled.',"onchange"=>\'demarcaciones()\'])->label(false); ?></td></tr>';
        }*/
        $this->_stringvista[] = '<tr><td width="25%"  class="labelpregunta">Parroquia: '
                                    .$this->fnt_tooltip('Seleccione parroquia').'</td>';

        //if (!empty($_modelriego_ubicacion->cod_parroquia)) {
            $this->_stringvista[] = '<td class="inputpregunta" width="25%" ><?= $form->field($_modelriego_ubicacion, "cod_parroquia")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map($parroquiasPost,"cod_parroquia","nombre_parroquia"),'
                                .'["prompt"=>"Seleccione una parroquia","disabled"=>'.$_disabled.'])->label(false); ?></td>';
                        
        /*} else {
            $this->_stringvista[] = '<td class="inputpregunta" width="25%"><?= $form->field($_modelriego_ubicacion, "cod_parroquia")->dropDownList('
                                .'[],'
                                .'["prompt"=>"Seleccione una parroquia","disabled"=>'.$_disabled.'])->label(false); ?></td>';
        }*/
        
            $cantones=Cantones::find()
                        ->where(['=', 'cantones.cod_provincia', $valor_prov])
                        ->andWhere(['=', 'cantones.cod_canton', $valor_canton])
                        ->one();
            $demarcacion = $cantones->id_demarcacion;
            
            
         $this->_stringvista[] = '<td width="15%" class="labelpregunta">Demarcaci&oacute;n Hidrogr&aacute;fica: '
                                    .$this->fnt_tooltip('Seleccione demarcación hidrográfica').'</td>';

       // if (!empty($_modelriego_ubicacion->id_demarcacion)) {
         $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelriego_ubicacion, "id_demarcacion")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map($demarcacionespost,"id_demarcacion","nombre_demarcacion"),'
                                .'["prompt"=>"Seleccione una demarcación","disabled"=>true,'
                                .'"options" =>
                                       ['
                                        .$demarcacion.'=>["selected" => true]
                                       ]
                                    ]' 
                                .')->label(false); ?></td></tr>';
         
         $this->_stringvista[] = '<?= $form->field($_modelriego_ubicacion, "id_demarcacion")->hiddenInput(["value"=>'.$demarcacion.'])->label(false); ?>';
       /* } else {
            $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelriego_ubicacion, "id_demarcacion")->dropDownList('
                                .'[],'
                                .'["prompt"=>"Seleccione una demarcación","disabled"=>'.$_disabled.'])->label(false); ?></td></tr>';
        }*/
        $this->_stringvista[] = '<tr></table>'; 
    }
    
    //----------------------------
     /*eespinoza
       Funcion que agrega las casillas para ingresar datos a la tabla
     * fd_datos_generales_comunitario_ap si el formato asi lo requiere
     */
    protected function gen_capitulogeneralescomunitarioap($varactualizar,$_modelcomunitarioap_ubicacion)
    {
        /*Verificando permisos para desactivar casillas*/
        if ($varactualizar == 'S') {
            $_disabled = 'FALSE';
        } else {
            $_disabled = 'TRUE';
        }

        $this->_stringvista[] = '<table class="tbcapitulo" ><tr><td colspan="4" style="font-style: italic;"><b> Importante:</b> La información que se encuentra marcada con ( '.$this->fnt_obligatorio().') debe ser ingresada de forma obligatoria </td></tr>
                                 <tr><td class="nomcapitulo" colspan="4">
                                            '.$this->romanic_number('1').'. INFORMACIÓN GENERAL DEL PRESTADOR</td></tr>';
        
        $valor_nom_presta = \common\models\Juntasgad::find()
                ->where(['id_conjunto_respuesta' => $this->id_conj_rpta])
                ->andWhere(['id_junta' => $this->idjunta])
                ->one();
        
        $nom_junta="";
        if(!empty($valor_nom_presta))
          $nom_junta = $valor_nom_presta->nombre_junta;
        
        $this->_stringvista[] = '<tr class="tbseccion">
                                 <td class="titleseccion" colspan="4">DATOS GENERALES DEL PRESTADOR</td></tr>';
        $this->_stringvista[] = '<tr><td class="labelpregunta">1.1.1 Nombre del Prestador: '.$this->fnt_tooltip('Ingrese nombre del prestador del servicio').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta" colspan="4"><?= $form->field($modelgeneralescomunitarioap, "nombres_prestador")->textInput(["readonly" => "true","maxlength" => "200","value"=>"'.$nom_junta.'"])->label(false); ?></td></tr>';
                

         $this->_stringvista[] = '<tr><td width="25%" class="labelpregunta">1.1.2 Provincia: '
                                    .$this->fnt_tooltip('Seleccione provincia').'</td>';
         
         $_select_cjresp = \common\models\poc\FdConjuntoRespuesta::find()
                        ->where(['id_conjunto_respuesta'=>$this->id_conj_rpta])
                        ->one();
         $valor_cjresp= $_select_cjresp->id_entidad;
         
         $_select_entidad = \common\models\autenticacion\Entidades::find()
                        ->where(['id_entidad'=>$valor_cjresp])
                        ->one();
         $valor_prov= $_select_entidad->cod_provincia_p;           
         $valor_canton= $_select_entidad->cod_canton_p;  

        $this->_stringvista[] = '<td class="inputpregunta" width="25%"><?= $form->field($_modelcomunitarioap_ubicacion, "cod_provincia")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(),"cod_provincia","nombre_provincia"),'
                                .'["prompt"=>"Seleccione una provincia","disabled"=>true,"onchange"=>\'$.post("index.php?r=fdubicacion/listado&id=\'.\'"+$(this).val(),function(data){'
                                .'$("#fdubicacion_var_ap-cod_canton").html(data);'
                               .'});\','
                                .'"options" =>
                                       ['
                                        .$valor_prov.'=>["selected" => true]
                                       ]
                                    ]'
                                .')->label(false); ?></td>';
        
        $this->_stringvista[] = '<?= $form->field($_modelcomunitarioap_ubicacion, "cod_provincia")->hiddenInput(["value"=>'.$valor_prov.'])->label(false); ?>';

        $this->_stringvista[] = '<td width="25%" class="labelpregunta">1.1.3 Cant&oacute;n: '
                                    .$this->fnt_tooltip('Seleccione cantón').'</td>';
        
        //if (!empty($_modelcomunitarioap_ubicacion->cod_canton)) {
        $this->_stringvista[] = '<td class="inputpregunta" width="25%" ><?= $form->field($_modelcomunitarioap_ubicacion, "cod_canton")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map($cantonesPost,"cod_canton","nombre_canton"),'
                                .'["prompt"=>"Seleccione un canton","disabled"=>true,"onchange"=>\'demarcaciones()\','
                                .'"options" =>
                                       ['
                                        .$valor_canton.'=>["selected" => true]
                                       ]
                                    ]'  
                                .')->label(false); ?></td></tr>';
        
        $this->_stringvista[] = '<?= $form->field($_modelcomunitarioap_ubicacion, "cod_canton")->hiddenInput(["value"=>'.$valor_canton.'])->label(false); ?>';
        /*} else {
            $this->_stringvista[] = '<td class="inputpregunta" width="25%"><?= $form->field($_modelriego_ubicacion, "cod_canton")->dropDownList('
                                .'[],'
                                .'["prompt"=>"Seleccione un canton","disabled"=>'.$_disabled.',"onchange"=>\'demarcaciones()\'])->label(false); ?></td></tr>';
        }*/
        
        $this->_stringvista[] = '<tr><td width="25%"  class="labelpregunta">1.1.4 Parroquia: '
                .$this->fnt_tooltip('Seleccione parroquia').$this->fnt_obligatorio().'</td>';

        //if (!empty($_modelcomunitarioap_ubicacion->cod_parroquia)) {
            $this->_stringvista[] = '<td class="inputpregunta" colspan="4" width="25%" ><?= $form->field($_modelcomunitarioap_ubicacion, "cod_parroquia")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map($parroquiasPost,"cod_parroquia","nombre_parroquia"),'
                                .'["prompt"=>"Seleccione una parroquia","disabled"=>'.$_disabled.'])->label(false); ?></td>';
       /* } else {
            $this->_stringvista[] = '<td class="inputpregunta" colspan="3" width="25%"><?= $form->field($_modelcomunitarioap_ubicacion, "cod_parroquia")->dropDownList('
                                .'[],'
                                .'["prompt"=>"Seleccione una parroquia","disabled"=>'.$_disabled.'])->label(false); ?></td></tr>';
        } */  
        
        
        $this->_stringvista[] = '<tr><td class="labelpregunta" width="25%" >1.1.5 Comunidad / recinto / sector:'.$this->fnt_tooltip('Ingrese nombre de la comunidad').$this->fnt_obligatorio().'</td>';
        $this->_stringvista[] = '<td class="inputpregunta" width="25%" colspan="4"><?= $form->field($modelgeneralescomunitarioap, "nombre_comunidad")->textInput(["disabled" => '.$_disabled.',"maxlength" => 300])->label(false); ?></td></tr>';                                        
        $this->_stringvista[] = '<tr><td class="labelpregunta" width="25%" >1.1.6 ¿A cu&aacute;ntas personas brinda el servicio de agua?'.$this->fnt_tooltip('Número de personas que tienen el servicio de agua').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta" width="25%" colspan="4"><?= $form->field($modelgeneralescomunitarioap, "numero_personas_servicio")->textInput(["disabled" => '.$_disabled.',"onkeypress"=>"return soloNumeros(event,this)","maxlength" => 6])->label(false); ?></td></tr>';
        
        $tipo_prestador = FdTipoSelect::find()
                ->where(['nom_tselect'=>"TIPO PREST COMUNITARIO"])                
                ->one();
       
        $this->_stringvista[] = '<tr><td class="labelpregunta">1.1.7 Señale el tipo del prestador comunitario'.$this->fnt_tooltip('Tipo prestador comunitario').$this->fnt_obligatorio().'</td>';        
        
       $this->_stringvista[] = '<td class="inputpregunta" width="25%" ><?= $form->field($modelgeneralescomunitarioap, "tipo_prestador_comunitario")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where("id_tselect='.$tipo_prestador->id_tselect.'")->orderBy(["id_opcion_select" => SORT_ASC])->all(),"id_opcion_select","nom_opcion_select"),'
                                .'["prompt"=>"Seleccione tipo de prestador","onchange"=>"ValidaTipoPrestador(this);"])->label(false); ?></td>';
        
       $bande=false;
       //$this->_stringvista[] ='<td class="labelpregunta"></td>'; 
       
        
        $valor_presta = \common\models\poc\FdDatosGeneralesComunitarioAp::find()
                ->where(['id_conjunto_respuesta' => $this->id_conj_rpta])
                ->andWhere(['id_junta' => $this->idjunta])
                ->one();
        
        if(count($valor_presta)>0)
        {
            $valor_p = $valor_presta->tipo_prestador_comunitario;

            $otros = FdOpcionSelect::find()
                    ->where(['id_opcion_select' => $valor_p])
                    ->one();
            $nom_otros="";
            if(count($otros)>0)
              $nom_otros = $otros->nom_opcion_select;


            if ($nom_otros == "Otros") {
                $bande = true;
           }           
        }

       if ($bande) {                                 
           $this->_stringvista[] ='<td class="inputpregunta" colspan="2" width="25%"><?= $form->field($modelgeneralescomunitarioap, "especifique")->textInput(["maxlength" => 50,"style" => "display: block"])->label("Especifique",["id"=>"label_especifique","style" => "display: block"])?></td>';                  
           
       } else {
           $this->_stringvista[] ='<td class="inputpregunta" colspan="2" width="25%"><?= $form->field($modelgeneralescomunitarioap, "especifique")->textInput(["maxlength" => 50,"style" => "display: none"])->label("Especifique",["id"=>"label_especifique","style" => "display: none"])?></td>';
           }               
                     
        $this->_stringvista[] = '</tr></table>'; 
    }
    
/*mceron
       Funcion que agrega las casillas para ingresar datos a la tabla
     * fd_datos_generales_publicos si el formato asi lo requiere
     */
    protected function gen_capitulogeneralespublicos($varactualizar,$_modelpublicos_ubicacion)
    {
        /*Verificando permisos para desactivar casillas*/
        if ($varactualizar == 'S') {
            $_disabled = 'FALSE';
        } else {
            $_disabled = 'TRUE';
        }

        $this->_stringvista[] = '<table class="tbcapitulo" ><tr>
                                 <td class="nomcapitulo" colspan="4">
                                            '.$this->romanic_number('1').'. INFORMACI&Oacute;N GENERAL</td></tr>';
        

         $this->_stringvista[] = '<tr><td width="25%" class="labelpregunta">Provincia: '
                                    .$this->fnt_tooltip('Seleccione provincia').'</td>';

        $this->_stringvista[] = '<td class="inputpregunta" width="25%"><?= $form->field($_modelpublicos_ubicacion, "cod_provincia")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map(\common\models\autenticacion\Provincias::find()->all(),"cod_provincia","nombre_provincia"),'
                                .'["prompt"=>"Seleccione una provincia","disabled"=>'.$_disabled.',"onchange"=>\'$.post("index.php?r=fdubicacion/listado&id=\'.\'"+$(this).val(),function(data){'
                                .'$("#fdubicacion_var-cod_canton").html(data);'
                                .'});\'])->label(false); ?></td></tr>';

        $this->_stringvista[] = '<tr><td width="25%" class="labelpregunta">Cant&oacute;n: '
                                    .$this->fnt_tooltip('Seleccione cantón').'</td>';

        if (!empty($_modelpublicos_ubicacion->cod_canton)) {
            $this->_stringvista[] = '<td class="inputpregunta" width="25%" ><?= $form->field($_modelpublicos_ubicacion, "cod_canton")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map($cantonesPost,"cod_canton","nombre_canton"),'
                                .'["prompt"=>"Seleccione un canton","disabled"=>'.$_disabled.',"onchange"=>\'demarcaciones()\'])->label(false); ?></td></tr>';
        } else {
            $this->_stringvista[] = '<td class="inputpregunta" width="25%"><?= $form->field($_modelpublicos_ubicacion, "cod_canton")->dropDownList('
                                .'[],'
                                .'["prompt"=>"Seleccione un cantón","disabled"=>'.$_disabled.',"onchange"=>\'demarcaciones()\'])->label(false); ?></td></tr>';
        }
          $this->_stringvista[] = '<td width="15%" class="labelpregunta">Demarcaci&oacute;n Hidrogr&aacute;fica: '
                                    .$this->fnt_tooltip('Seleccione demarcación hidrográfica').'</td>';
        if (!empty($_modelpublicos_ubicacion->id_demarcacion)) {
            $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelpublicos_ubicacion, "id_demarcacion")->dropDownList('
                                .'\yii\helpers\ArrayHelper::map($demarcacionespost,"id_demarcacion","nombre_demarcacion"),'
                                .'["prompt"=>"Seleccione una demarcación","disabled"=>'.$_disabled.'])->label(false); ?></td></tr>';
        } else {
            $this->_stringvista[] = '<td class="inputpregunta"><?= $form->field($_modelpublicos_ubicacion, "id_demarcacion")->dropDownList('
                                .'[],'
                                .'["prompt"=>"Seleccione una demarcación","disabled"=>'.$_disabled.'])->label(false); ?></td></tr>';
        }
        
        $this->_stringvista[] = '<tr><td class="labelpregunta" width="25%">P&aacute;gina web del prestador:'.$this->fnt_tooltip('Página web del prestador').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta" width="25%" ><?= $form->field($modelgeneralespublicos, "pagina_web_prestador")->textInput(["disabled" => '.$_disabled.',"maxlength" => 300])->label(false); ?></td></tr>';                                        
        
        $this->_stringvista[] = '<tr><td class="labelpregunta" width="25%" >Correo electr&oacute;nico del prestador:'.$this->fnt_tooltip('Correo electrónico del prestador').'</td>';
        $this->_stringvista[] = '<td class="inputpregunta" width="25%" ><?= $form->field($modelgeneralespublicos, "correo_electronico_prestador")->textInput(["disabled" => '.$_disabled.', "onkeyUp"=>"return soloMinusculas(this)"])->label(false); ?></td></tr>';
        
        $this->_stringvista[] = '<tr><td class="labelpregunta" >Fecha de llenado de las fichas:'.$this->fnt_tooltip('Fecha de llenado de las fichas').'</td>';
        
        $maxdate = new DateTime('2037/12/31');
        $mindate = new DateTime('2000/01/01');
        
         
        $campo_fecha = '<td  class="inputpregunta"><?= $form->field($modelgeneralespublicos, "fecha_llenado_fichas")->widget(yii\jui\DatePicker::className(),["dateFormat"=>"'.$formato.'","language" => "es",';
        $campo_fecha.='"clientOptions"=>['
                    .'"dateFormat" => "'.Yii::$app->fmtfechasql.'",'
                    .'"yearRange" =>"2000:2050",'
                    .'"maxDate" =>"'.$maxdate->format(Yii::$app->fmtfechasql).'",'
                    .'"minDate" =>"'.$mindate->format(Yii::$app->fmtfechasql).'",'                    
                    .'"changeYear" => true,'
                    .'"changeMonth" => true,';
         $campo_fecha .= ']])->label(false); ';
         $campo_fecha.='?></td></tr>';  

        $this->_stringvista[]=$campo_fecha;
        
        $this->_stringvista[] = '<tr><td class="labelpregunta">Nombre del responsable que entrega la informaci&oacute;n:'.$this->fnt_tooltip('Nombre del responsable que entrega la información').'</td>';
        $this->_stringvista[] = '<td colspan="2"  class="inputpregunta"><?= $form->field($modelgeneralespublicos, "nombres_responsable_informacion")->textInput(["disabled" => '.$_disabled.',"maxlength" => 100,"onkeypress"=>"return soloLetras(event)","onkeyUp"=>"return soloMayusculas(event,this)"])->label(false); ?></td></tr>';
        
        $this->_stringvista[] = '<tr><td class="labelpregunta">Cargo que desempeña:'.$this->fnt_tooltip('Cargo que desempeña').'</td>';
        $this->_stringvista[] = '<td colspan="3"  class="inputpregunta"><?= $form->field($modelgeneralespublicos, "cargo_desempenia")->textInput(["disabled" => '.$_disabled.',"maxlength" => 100])->label(false); ?></td></tr>';      
        
        $this->_stringvista[] = '<tr><td class="labelpregunta">Correo electr&oacute;nico:'.$this->fnt_tooltip('Correo electrónico').'</td>';
        $this->_stringvista[] = '<td colspan="3"  class="inputpregunta"><?= $form->field($modelgeneralespublicos, "correo_electronico")->textInput(["disabled" => '.$_disabled.',"maxlength" => 100, "onkeyUp"=>"return soloMinusculas(this)"])->label(false); ?></td></tr>';      
        
        $this->_stringvista[] = '<tr><td class="labelpregunta">N&uacute;mero de celular:'.$this->fnt_tooltip('Número de celular').'</td>';
        $this->_stringvista[] = '<td colspan="3"  class="inputpregunta"><?= $form->field($modelgeneralespublicos, "num_celular")->textInput(["disabled" => '.$_disabled.',"maxlength" => 10, "onkeypress"=>"return tipo(event,this)"])->label(false); ?></td></tr>';      
        
        
        //$this->_stringvista[] = '</table><table>';                        
            
         
        $this->_stringvista[] = '</table>'; 
    }    
//------------------------------------
    /**Funcion que general el HTML para formatoHTML
     * puro de datosgenerales
     * De donde sale el total de columnas para esto?????? OJO CON ESE 4 DE COLSPAN PUEDE TRAER ERRORES SE DEBE BUSCAR EN BD
     */
    protected function gen_capitulogeneralesHTML($_modelogenerales)
    {
        $this->htmlvista .= '<table class="tbcapitulo" ><tr>
                                 <td class="nomcapitulo" colspan="4">
                                            '.$this->romanic_number('1').'.INFORMACI&Oacute;N GENERAL DEL SOLICITANTE
                                 </td>
                             </tr>';

        $this->htmlvista .= '<tr><td colspan="2" width="50%" class="labelpregunta">NOMBRES Y APELLIDOS DEL USUARIO AUTORIZADO/CONCESIONADO, REPRESENTANTE LEGAL O SOLICITANTES AUTORIZADO: </td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="2" width="50%">'.$_modelogenerales->nombres.'</td></tr>';

        $this->htmlvista .= '<tr><td class="labelpregunta">Numero de Celular: </td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelogenerales->num_celular.'</td>';

        $this->htmlvista .= '<td class="labelpregunta">Numero Convencional:</td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelogenerales->num_convencional.'</td></tr>';

        $this->htmlvista .= '<tr><td class="labelpregunta">Tipo de Documento:</td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelogenerales->idTdocumento['nom_tdocumento'].'</td>';

        $this->htmlvista .= '<td class="labelpregunta">C&eacute;dula y/o RUC:</td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelogenerales->num_documento.'</td></tr>';

        $this->htmlvista .= '<tr><td colspan="1" class="labelpregunta">Direccion:</td>';
        $this->htmlvista .= '<td colspan="3" class="inputpregunta">'.$_modelogenerales->direccion.'</td></tr>';

        $this->htmlvista .= '<tr><td colspan="1" class="labelpregunta">Descripcion Trabajo:</td>';
        $this->htmlvista .= '<td colspan="3" class="inputpregunta">'.$_modelogenerales->descripcion_trabajo.'</td></tr>';

        $this->htmlvista .= '<tr><td colspan="1" class="labelpregunta">Correo Electronico:</td>';
        $this->htmlvista .= '<td colspan="3" class="inputpregunta">'.$_modelogenerales->correo_electronico.'</td></tr>';

        $this->htmlvista .= '<tr><td class="labelpregunta">Tipo de Personal:</td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelogenerales->idNatuJuridica['nom_natu_juridica'].'</td>';

        $this->htmlvista .= '<td class="labelpregunta">Nombres y Apellidos Rep. Legal:</td>';
        $this->htmlvista .= '<td class="inputpregunta">'.$_modelogenerales->nombres_apellidos_replegal.'</td></tr></table>';
    }
    /*mceron
	Funcion generar el html pantalla especial riego
	*/
    protected function gen_capitulogeneralesriegoHTML($_modelogeneralesriego,$_modelriego_ubicacion)
    {
        $this->htmlvista .= '<table class="tbcapitulo" width="100%"><tr>
                                 <td class="nomcapitulo" colspan="4">
                                            '.$this->romanic_number('1').'. IDENTIFICACI&Oacute;N Y UBICACI&Oacute;N DEL PRESTADOR DEL SERVICIO
                                 </td>
                             </tr>';

        $this->htmlvista .= '<tr><td colspan="1" width="50%" class="labelpregunta3">Nombre del Prestador del Servicio: </td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="3" width="50%">'.htmlentities($_modelogeneralesriego->nombres_prestador_servicio).'</td></tr>';

        $this->htmlvista .= '<tr><td colspan="1" class="labelpregunta3" width="50%">Direcci&oacute;n de las oficinas: </td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="3" width="50%">'.htmlentities($_modelogeneralesriego->direccion_oficinas).'</td></tr>';

        $this->htmlvista .= '<tr><td colspan="1" class="labelpregunta3" width="50%">Nombre del representante legal:</td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="3" width="50%">'.htmlentities($_modelogeneralesriego->nombres_apellidos_replegal).'</td></tr>';
        
        $posee_con='NO';
        if($_modelogeneralesriego->posee_convencional==1)$posee_con = 'SI';
        
        $this->htmlvista .= '<tr><td class="labelpregunta3" width="25%">Posee n&uacute;mero convencional :</td>';
        $this->htmlvista .= '<td class="inputpregunta" width="25%">'.$posee_con.'</td>';        
        
        $this->htmlvista .= '<td class="labelpregunta3" width="25%">Tel&eacute;fono convencional :</td>';
        $this->htmlvista .= '<td class="inputpregunta" width="25%">'.$_modelogeneralesriego->num_convencional.'</td></tr>';

        $this->htmlvista .= '<tr><td colspan="1" class="labelpregunta3" width="25%">Tel&eacute;fono celular:</td>';
        $this->htmlvista .= '<td colspan="1" class="inputpregunta" width="25%">'.$_modelogeneralesriego->num_celular.'</td>';
        
        $this->htmlvista .= '<td colspan="1" class="labelpregunta3" width="25%">Tel&eacute;fono celular 2:</td>';
        $this->htmlvista .= '<td colspan="1" class="inputpregunta" width="25%">'.$_modelogeneralesriego->num_celular_otro.'</td></tr>';     

        $posee_email='NO';
        if($_modelogeneralesriego->posee_email==1)$posee_email = 'SI';
       
        $this->htmlvista .= '<tr><td class="labelpregunta3" width="25%">Posee email :</td>';
        $this->htmlvista .= '<td class="inputpregunta" width="25%">'.$posee_email.'</td>';        
        
        $this->htmlvista .= '<td colspan="1" class="labelpregunta3" width="25%">Correo Electr&oacute;nico:</td>';
        $this->htmlvista .= '<td colspan="3" class="inputpregunta" width="25%">'.$_modelogeneralesriego->correo_electronico.'</td></tr>';
        
        $this->htmlvista .= '<tr><td class="labelpregunta3" width="25%">Provincia: </td>';
        $this->htmlvista .= '<td class="inputpregunta" width="25%">'.htmlentities($this->nom_provincia($_modelriego_ubicacion->cod_provincia)).'</td>';

        $this->htmlvista .= '<td class="labelpregunta3" width="25%">Cant&oacute;n: </td>';
        $this->htmlvista .= '<td class="inputpregunta" width="25%">'.htmlentities($this->nom_canton($_modelriego_ubicacion->cod_canton, $_modelriego_ubicacion->cod_provincia)).'</td></tr>';
        
        $this->htmlvista .= '<tr><td class="labelpregunta3" width="25%">Parroquia: </td>';
        $this->htmlvista .= '<td class="inputpregunta" width="25%">'.htmlentities($this->nom_parroquia($_modelriego_ubicacion->cod_parroquia,$_modelriego_ubicacion->cod_canton, $_modelriego_ubicacion->cod_provincia)).'</td>';
        
        $this->htmlvista .= '<td class="labelpregunta3" width="25%">Demarcaci&oacute;n: </td>';
        $this->htmlvista .= '<td class="inputpregunta" width="25%">'.htmlentities($this->demarcaciones($_modelriego_ubicacion->id_demarcacion)).'</td></tr></table>';
    }
    
    
    /*eespinoza
	Funcion generar el html pantalla especial aps comunitario
	*/
    protected function gen_capitulogeneralescomunitarioapHTML($_modelogeneralescomunitario,$_model_ubicacioncomunitario_ap)
    {
        $this->htmlvista .= '<table class="tbcapitulo" ><tr>
                                 <td class="nomcapitulo" colspan="4">
                                            '.$this->romanic_number('1').'. INFORMACIÓN GENERAL DEL PRESTADOR</td></tr>';
        
        $this->htmlvista .= '<tr class="tbseccion">
                                 <td class="titleseccion" colspan="4">DATOS GENERALES DEL PRESTADOR</td></tr>';	

        $this->htmlvista .= '<tr>
                               <td colspan="1" width="20%" class="labelpregunta">Nombre del Prestador: </td>';
        $this->htmlvista .=   '<td class="inputpregunta" colspan="3" width="50%">'.htmlentities($_modelogeneralescomunitario->nombres_prestador).'</td></tr>';
        
        
        $this->htmlvista .= '<tr><td class="labelpregunta" width="25%">Provincia: </td>';
        $this->htmlvista .= '<td class="inputpregunta" width="25%">'.htmlentities($this->nom_provincia($_model_ubicacioncomunitario_ap->cod_provincia)).'</td>';

        $this->htmlvista .= '<td class="labelpregunta" width="25%">Cantón: </td>';
        $this->htmlvista .= '<td class="inputpregunta" width="25%">'.htmlentities($this->nom_canton($_model_ubicacioncomunitario_ap->cod_canton, $_model_ubicacioncomunitario_ap->cod_provincia)).'</td>
                            </tr>';        
        $this->htmlvista .= '<tr>
                             <td class="labelpregunta" width="25%">Parroquia:  </td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="3">'.htmlentities($this->nom_parroquia($_model_ubicacioncomunitario_ap->cod_parroquia,$_model_ubicacioncomunitario_ap->cod_canton, $_model_ubicacioncomunitario_ap->cod_provincia)).'
                            </td></tr>';
        $this->htmlvista .= '<tr><td colspan="1" width="25%" class="labelpregunta"> Comunidad / recinto / sector: </td>';
        $this->htmlvista .= '<td class="inputpregunta" width="25%">'.htmlentities($_modelogeneralescomunitario->nombre_comunidad).'</td>';
        $this->htmlvista .= '<td  width="25%" class="labelpregunta">¿A cuántas personas brinda el servicio de agua?</td>';
        $this->htmlvista .= '<td class="inputpregunta" width="25%">'.htmlentities($_modelogeneralescomunitario->numero_personas_servicio).'</td></tr>';        
        $this->htmlvista .= '<tr><td class="labelpregunta" width="25%">Señale el tipo del prestador comunitario:</td>';
        $_nomselect = FdOpcionSelect::find()->where(['id_opcion_select' => $_modelogeneralescomunitario->tipo_prestador_comunitario])->one();
        $this->htmlvista .= '<td  width="25%"  class="inputpregunta">'.$_nomselect['nom_opcion_select'].'</td></tr>';
                      
        $this->htmlvista .= '</table>';
        
    }
    
    protected function gen_capitulogeneralespublicosHTML($_modelogeneralespublicos,$_model_ubicacionpublicos)
    {
        $this->htmlvista .= '<table class="tbcapitulo" >
                             <tr>
                                 <td class="nomcapitulo" colspan="4">'.'INFORMACI&Oacute;N GENERAL</td>
                             </tr>';

        $this->htmlvista .= '<tr><td class="labelpregunta" colspan="2">Provincia:</td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="2">'.htmlentities($this->nom_provincia($_model_ubicacionpublicos->cod_provincia)).'</td></tr>';

        $this->htmlvista .= '<tr><td class="labelpregunta" colspan="2">Cantón:</td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="2">'.htmlentities($this->nom_canton($_model_ubicacionpublicos->cod_canton, $_model_ubicacionpublicos->cod_provincia)).'</td></tr>';   
        
        $this->htmlvista .= '<tr><td class="labelpregunta" colspan="2">Demarcación:</td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="2">'.htmlentities($this->demarcaciones($_model_ubicacionpublicos->id_demarcacion)).'</td></tr>';
        
        $this->htmlvista .= '<tr><td class="labelpregunta" colspan="2">Página web del prestador:</td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="2">'.htmlentities($_modelogeneralespublicos->pagina_web_prestador).'</td></tr>';
        
        $this->htmlvista .= '<tr><td class="labelpregunta" colspan="2">Correo electrónico del prestador:</td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="2">'.htmlentities($_modelogeneralespublicos->correo_electronico_prestador).'</td></tr>';  
        
        $this->htmlvista .= '<tr><td class="labelpregunta" colspan="2">Fecha de llenado de las fichas:</td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="2">'.$_modelogeneralespublicos->fecha_llenado_fichas.'</td></tr>';  
        
        $this->htmlvista .= '<tr><td class="labelpregunta" colspan="2">Nombre del responsable que entrega la información:</td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="2">'.$_modelogeneralespublicos->nombres_responsable_informacion.'</td></tr>';  
        
        $this->htmlvista .= '<tr><td class="labelpregunta" colspan="2">Cargo que desempeña:</td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="2">'.$_modelogeneralespublicos->cargo_desempenia.'</td></tr>';       
        
        $this->htmlvista .= '<tr><td class="labelpregunta" colspan="2">Correo Electrónico:</td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="2">'.$_modelogeneralespublicos->correo_electronico.'</td></tr>';  
        
        $this->htmlvista .= '<tr><td class="labelpregunta" colspan="2">Número celular:</td>';
        $this->htmlvista .= '<td class="inputpregunta" colspan="2">'.$_modelogeneralespublicos->num_celular.'</td></tr>';        
        $this->htmlvista .= '</table>';
        
    }

    /*======================================================================preguntas sin secciones=========================================*/
    /***************************************************************************************************************************************/

    /***Funcion para generar la vista
     * de las preguntas sin secciones con cajitas y eventos para detcapitulo
     */
    protected function gen_preguntans($r_preguntans, $_tcolumnas, $_larray)
    {            
        $this->_larray = $_larray;
        $_acces = 0;                                          //Lleva el conteo de columnas para el salto de linea
        $larray_agrupados = array();                          //Vector que guarda la posicion de larray para una pregunta tipo checkbox con agrupacion
                                                            // De esa forma no se debe recorrer todo el array de preguntas para saber en que posicion queda

        $larray_radiobutton = array();                        //Vector que guarda el nombre del grupo de radio buttons
        $_contagrupacion = array();

        $_vtipo1 = [1, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13, 14, 15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36];           //Tipo de preguntas que llevan caja de label y caja de input, estas tambien pueden salir en la seccion
        $_vtipo2 = [10, 2];                                    //Diferentes pueden llevar o no label, o llevar o no caja
        foreach ($r_preguntans as $_clavepns) {
            /**1) Columnas para Presentacion de la pregunta******************************************************/
            $cols_l = $_clavepns['num_col_label'];            //Numero de columnas para el label
            $cols_i = $_clavepns['num_col_input'];            //Numero de columnas para el input

            /**2) Asignando las relaciones necesarias para cuando se va a guardar *****************/
            $this->fnt_varpass($this->_larray, $_clavepns['id_pregunta'], $_clavepns['id_tpregunta'], $_clavepns['id_respuesta'], $_clavepns['id_capitulo']);

            /*Asignando Tooltip====================================================*/
            $_tooltip = '';
            if (!empty($_clavepns['ayuda_pregunta'])) {
                $_tooltip = $this->fnt_tooltip($_clavepns['ayuda_pregunta']);
            }

            /*Asignando Boton Adicionar si caracteristica_preg es Multiple => 'M' ==========================*/
            $_adicionar = '';

            /*if($_clavepns['caracteristica_preg'] == 'M' and $this->_pactualizar == 'S'){

                $_adicionar=$this->fnt_adicionar(array("id_tpregunta"=>$_clavepns['id_tpregunta'],"id_seccion"=>"","id_agrupacion"=>$_clavepns['id_agrupacion'],"id_capitulo"=>$_clavepns['id_capitulo'],"id_conjunto_pregunta"=>$_clavepns['id_conjunto_pregunta']));
            }*/

            /*Declarando inicio de linea en la tabla =====================================*/
            if ($_acces == 0) {
                $this->_stringvista[] = '<tr>';
            }

            /*Agregando a la vista para preguntas en el vector tipo 1======================*/
            if ($_clavepns['visible_desc_pregunta'] == 'S' and in_array($_clavepns['id_tpregunta'], $_vtipo1)) {
                $_contenido = $_clavepns['nom_pregunta'].' ';
                $_contenido2 = $_tooltip.' '.$_adicionar;
                $this->gen_celdas($cols_l, '', 'labelpregunta'.$_clavepns['stylecss'], $_contenido, $_contenido2);
                $_acces = $_acces + $cols_l;
            }

            if ($_clavepns['visible'] == 'S' and in_array($_clavepns['id_tpregunta'], $_vtipo1)) {
                $_contenido = $this->{'tipo_'.$_clavepns['id_tpregunta']}($_clavepns, $this->_larray);
                $this->gen_celdas($cols_i, '', 'inputpregunta'.$_clavepns['stylecss'], $_contenido, '');
                $_acces = $_acces + $cols_i;
            }

            /*Agregando a la vista para preguntas en el vector tipo 2======================*/
            if (in_array($_clavepns['id_tpregunta'], $_vtipo2)) {
                if ($_clavepns['id_tpregunta'] == 10) {
                    $_contenido = $this->{'tipo_'.$_clavepns['id_tpregunta']}($_clavepns, $this->_larray);
                    $_contenido2 = $_tooltip.' '.$_adicionar;
                    $this->gen_celdas($cols_i, '', 'inputpregunta'.$_clavepns['stylecss'], $_contenido, $_contenido2);

                    $_acces = $_acces + $cols_i;
                }

                /*Checkbox sin Agrupacion********************************************************/
                elseif ($_clavepns['id_tpregunta'] == 2 and empty($_clavepns['id_agrupacion'])) {
                    if ($_clavepns['visible_desc_pregunta'] == 'S') {
                        $_contenido = $_clavepns['nom_pregunta'].' ';
                        $_contenido2 = $_tooltip.' '.$_adicionar;
                        $this->gen_celdas($cols_l, '', 'labelpregunta'.$_clavepns['stylecss'], $_contenido, $_contenido2);

                        $_acces = $_acces + $cols_l;
                    }

                    if ($_clavepns['visible'] == 'S') {
                        $_contenido = $this->{'tipo_'.$_clavepns['id_tpregunta']}($_clavepns, $this->_larray);
                        $this->gen_celdas($cols_i, '', 'inputpregunta'.$_clavepns['stylecss'], $_contenido, '');

                        $_acces = $_acces + $cols_i;
                    }
                }

                /*Checkbox con Agrupacion********************************************************/
                elseif ($_clavepns['id_tpregunta'] == 2 and !empty($_clavepns['id_agrupacion'])) {
                    /*Este pedazo del algoritmo funcion asi:
                     */
                    $_indiagrupacion = $_clavepns['id_agrupacion'];

                    if (empty($larray_agrupados[$_indiagrupacion])) {
                        /*Averiguando si es de seleccion multiple o seleccion unica
                         *Se guarda el numero de l_array para la rptaNo. dado que si es tipo 1
                         *es de seleccion unica entonces todos los radio button deben llevar el mismo
                         *nombre "name" , el valor de cada radiobutton sera la pregunta que
                         * escogio el usuario.    */
                        if (!empty($_clavepns['tipo_agrupacion']) and $_clavepns['tipo_agrupacion'] == '1') {
                            $larray_radiobutton[$_indiagrupacion] = $this->_larray;
                            $larray_rdbttn = $larray_radiobutton[$_indiagrupacion];
                        } else {
                            $larray_rdbttn = $this->_larray;
                        }

                        /*Posicion del label*******/
                        $_posicionlabel = count($this->_stringvista);
                        $larray_agrupados[$_indiagrupacion][0] = $_posicionlabel;
                        $this->_stringvista[] = '';

                        /*Se guarda la posici&oacute;n para las cajitas checkbos o radio button*/
                        $larray_agrupados[$_indiagrupacion][1] = count($this->_stringvista);
                        $this->_stringvista[] = '';
                        $_posicioninput = $larray_agrupados[$_indiagrupacion][1];

                        /*Se suman las columnas usadas tanto por el label como por el input*/
                        //$_acces=$_acces+$_clavepns['ag_num_col']+$cols_l;
                        $_acces = $_acces + $cols_i + $cols_l;
                        $_finallinea[$_indiagrupacion] = '';

                        if ($_acces == $_tcolumnas) {
                            $_finallinea[$_indiagrupacion] = '</tr>';
                        }
                    } else {
                        /*En este caso ya debe existir una posicion previa para este grupo de preguntas*/
                        $_posicionlabel = $larray_agrupados[$_indiagrupacion][0];
                        $_posicioninput = $larray_agrupados[$_indiagrupacion][1];

                        /*En este caso ya debe existir una posicion previa para este grupo de preguntas*/
                        if (!empty($_clavepns['tipo_agrupacion']) and $_clavepns['tipo_agrupacion'] == '1') {
                            $larray_rdbttn = $larray_radiobutton[$_indiagrupacion];
                        } else {
                            $larray_rdbttn = $this->_larray;
                        }
                    }

                    /*Visualizacion en pantalla**********************************************/
                    /*Se guarda en stringvista el td para label, junto con el respectivo label*/
                    if ($_clavepns['visible_desc_pregunta'] == 'S') {
                        //Si la primera interaccion lleva final de carrera se asigna igual para el resto=========================
                        $filasagrupacion[$_indiagrupacion] = (empty($filasagrupacion[$_indiagrupacion])) ? 1 : $filasagrupacion[$_indiagrupacion] + 1;
                        $_contenido = $_clavepns['ag_descripcion'].' ';
                        $_contenido2 = $_tooltip.' '.$_adicionar;
                        $this->gen_celdaspos($_posicionlabel, $cols_l, '1', 'labelpregunta'.$_clavepns['stylecss'], $_contenido, $_contenido2);
                    }

                    if ($_clavepns['visible'] == 'S') {
                        $_contagrupacion[$_indiagrupacion] = (empty($_contagrupacion[$_indiagrupacion])) ? $this->{'tipo_'.$_clavepns['id_tpregunta']}($_clavepns, $larray_rdbttn).' ' : $_contagrupacion[$_indiagrupacion].$this->{'tipo_'.$_clavepns['id_tpregunta']}($_clavepns, $larray_rdbttn).' ';
                        $this->gen_celdaspos($_posicioninput, $cols_i, '1', 'inputpregunta'.$_clavepns['stylecss'], $_contagrupacion[$_indiagrupacion], '');
                    }
                }
            }

            ++$this->_larray;

            if ($_acces == $_tcolumnas) {
                $this->_stringvista[] = '</tr>';
                $_acces = 0;
            }
        }
    }

    /***Funcion para generar la vista
     * de las preguntas sin secciones solo contenido pregunta y respuesta
     * no genera cajitas ni eventos
     */
    protected function gen_preguntansHTML($r_preguntans, $_tcolumnas, $_larray, $modelpreguntasns)
    {
        $this->_larray = $_larray;
        $_acces = 0;                                          //Lleva el conteo de columnas para el salto de linea
        $larray_agrupados = array();                          //Vector que guarda la posicion de larray para una pregunta tipo checkbox con agrupacion
                                                            // De esa forma no se debe recorrer todo el array de preguntas para saber en que posicion queda

        $larray_radiobutton = array();                        //Vector que guarda el nombre del grupo de radio buttons
        $_contagrupacion = array();

        $_vtipo1 = [1, 3, 4, 5, 6, 7, 8, 15,26];                        //Cajas con una unica respuesta
        $_vtipo2 = [9, 11, 12, 13, 14,16,17,18,19,20,21,22,23,24,25,27,28,29,30,31,32,33,34,35,36];                                //Cajas de multiples respuestas tabla por aparte 14

        foreach ($r_preguntans as $_clavepns) {
            /**1) Columnas para Presentacion de la pregunta******************************************************/
            $cols_l = $_clavepns['num_col_label'];            //Numero de columnas para el label
            $cols_i = $_clavepns['num_col_input'];            //Numero de columnas para el input

            /*Declarando inicio de linea en la tabla =====================================*/
            if ($_acces == 0) {
                $this->htmlvista .= '<tr>';
            }

            /*Agregando a la vista para preguntas en el vector tipo 1======================*/
            if ($_clavepns['visible_desc_pregunta'] == 'S' and in_array($_clavepns['id_tpregunta'], $_vtipo1)) {
                $_contenido = $_clavepns['nom_pregunta'].' ';
                $this->gen_celdashtml($cols_l, '', 'labelpregunta'.$_clavepns['stylecss'], $_contenido);
                $_acces = $_acces + $cols_l;
            }

            if ($_clavepns['visible'] == 'S' and in_array($_clavepns['id_tpregunta'], $_vtipo1)) {
                $_contenido = $this->tipohtmltexto($modelpreguntasns, $this->_larray, $_clavepns);
                $this->gen_celdashtml($cols_i, '', 'inputpregunta'.$_clavepns['stylecss'], $_contenido);
                $_acces = $_acces + $cols_i;
            }

            /*Agregando a la vista preguntas tipo checkbox sin agrupacion=================================*/

            if ($_clavepns['id_tpregunta'] == 2 and empty($_clavepns['id_agrupacion'])) {
                if ($_clavepns['visible_desc_pregunta'] == 'S') {
                    $_contenido = $_clavepns['nom_pregunta'].' ';
                    $this->gen_celdashtml($cols_l, '', 'labelpregunta '.$_clavepns['stylecss'], $_contenido);
                    $_acces = $_acces + $cols_l;
                }

                if ($_clavepns['visible'] == 'S') {
                    $_contenido = $this->tipohtmlcheck1($modelpreguntasns, $this->_larray);
                    $this->gen_celdashtml($cols_i, '', 'inputpregunta '.$_clavepns['stylecss'], $_contenido);
                    $_acces = $_acces + $cols_i;
                }
            }

            /*Agregando a la vista preguntas tipo checkbox con agrupacion==================================*/
            elseif ($_clavepns['id_tpregunta'] == 2 and !empty($_clavepns['id_agrupacion'])) {
                $_regagrupacion = $_clavepns['id_agrupacion'];

                if (empty($this->td_agrupadas[$_regagrupacion])) {
                    $this->htmlvista .= '<td>agrupacion'.$_regagrupacion.'</td>';
                }

                $_creandohtml = $this->tipohtmlcheck_grupo($modelpreguntasns, $this->_larray, $_clavepns, $_tcolumnas, $_acces);
                $_acces = $_acces + $_creandohtml[0] + $_creandohtml[1];
            }

            /*Agregando tipo de pregunta 10 -BOTON =====================================================*/

            /*Agregando tipo pregunta 11 SOPORTE========================================================*/
            if (in_array($_clavepns['id_tpregunta'], $_vtipo2)) {
                if ($_acces > 0) {
                    $this->htmlvista .= '</tr><tr>';
                }

                $_acces = $_tcolumnas;
                $this->{'tipohtml_'.$_clavepns['id_tpregunta']}($_clavepns, $_tcolumnas);
            }

            ++$this->_larray;

            if ($_acces == $_tcolumnas) {
                $this->htmlvista .= '</tr>';
                $_acces = 0;
            }
        }

        //Agregando agrupadas a la vista html====================================================
        foreach ($this->td_agrupadas as $_clagrupadas => $_vlagrupadas) {
            $ind_clagrupado = $_clagrupadas;
            $_linearemplazo = $_vlagrupadas['ag_descripcion'];
            $_linearemplazo .= $_vlagrupadas['respuestas'].'</td>';

            $this->htmlvista = str_replace('<td>agrupacion'.$ind_clagrupado.'</td>', $_linearemplazo, $this->htmlvista);
        }
        $this->td_agrupadas = array();
    }

    /********************************************************************generando preguntas con secciones************************************/
    /*****************************************************************************************************************************************/

    /* Funcion para generar secciones*/
    public function gen_secciones($r_secciones, $_tcolumnas, $r_pregunta, $_larray)
    {
        $this->_larray = $_larray;

        foreach ($r_secciones as $_clavesec) {
            $_numcoltitle = $_tcolumnas;
            $_colxfila = $_tcolumnas / $_numcoltitle;
            $_porcentajefila = 100 / $_colxfila;

            /*Asignando inicio de tabla===================================================//
             */
            $this->_stringvista[] = '<tr><td colspan="'.$_tcolumnas.'"><table class="tbseccion">';

            /*Asignando Numeracion=========================================================*/
            if ($this->_estnumerado == 'S') {
                /*Se compara con el anteriro capitulo si cambio se reinicia la numeracion de seccion*/
                if ($this->_numcapitulo != $this->last_capitulo) {
                    $this->_numseccion = 0;
                }

                ++$this->_numseccion;
                $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion;
                $this->last_capitulo = $this->_numcapitulo;
            } else {
                $_numeracion = '';
            }

            /*Se realizan dos tareas diferentes la pregunta es igual
             * a la seccion o no, si el dato comparar viene vacio no es igual*/
            if (!empty($_clavesec['comparar'])) {
                $this->_stringvista[] = '<tr>';
                $this->_stringvista[] = '<td colspan="'.$_numcoltitle.'" class="titleseccion" width="'.$_porcentajefila.'%">';
                $this->_stringvista[] = $_numeracion.' '.$_clavesec['nom_seccion'];
                $this->_stringvista[] = '</td>';
                $this->_stringvista[] = '</tr>';
            } else {
              
                
                $this->_stringvista[] = '<tr>';

                $this->_stringvista[] = '<td colspan="'.$_tcolumnas.'" class="titleseccion'.$_clavesec['stylecss'].'">';
                $this->_stringvista[] = $_clavesec['nom_seccion'];
                $this->_stringvista[] = '</td>';
                $this->_stringvista[] = '</tr>';
            }

            /*Organizando preguntas asociadas a la seccion*/
            $_indiseccion = $_clavesec['id_seccion'];

            if (!empty($r_pregunta[$_indiseccion])) {
                $_vpreguntassec = $this->gen_pregutasec($_clavesec['comparar'], $_numcoltitle, $r_pregunta[$_indiseccion], $this->_larray, $_tcolumnas);
            }

            $this->_stringvista[] = '</table></td></tr>';
        }
    }

    /*Funcion para generar seccion
     * para el contenido del formato HTML
     */

    public function gen_seccionesHTML($r_secciones, $_tcolumnas, $r_pregunta, $_larray, $modelpreguntas,$idjunta="")
    {
        $this->_larray = $_larray;
        
        $clase="titleseccion";
        foreach ($r_secciones as $_clavesec) {
            $_numcoltitle = $_tcolumnas;
            $_colxfila = $_tcolumnas / $_numcoltitle;
            //$_porcentajefila=100/$_colxfila;
            $_porcentajefila = 100;

            /*Asignando inicio de tabla===================================================//
             */
            if ($this->tipo_archivo == 'excel') {
                $this->htmlvista .= '</table><table class="tbseccion" width="100%">';
            } else {
                $this->htmlvista .= '<tr><td colspan="'.$_tcolumnas.'"><table class="tbseccion" width="100%">';
            }

            /*Asignando Numeracion=========================================================*/
            if ($this->_estnumerado == 'S') {
                /*Se compara con el anteriro capitulo si cambio se reinicia la numeracion de seccion*/
                if ($this->_numcapitulo != $this->last_capitulo) {
                    $this->_numseccion = 0;
                }

                ++$this->_numseccion;
                $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion;
                $this->last_capitulo = $this->_numcapitulo;
            } else {
                $_numeracion = '';
            }            
           
            /*Se realizan dos tareas diferentes la pregunta es igual
             * a la seccion o no, si el dato comparar viene vacio no es igual*/
            if (!empty($_clavesec['comparar'])) {
                $this->htmlvista .= '<tr>';
                $this->htmlvista .= '<td colspan="'.$_numcoltitle.'" class="'.$clase.'" width="100%">';
                $this->htmlvista .= $_numeracion.' '.htmlentities($_clavesec['nom_seccion']);
                $this->htmlvista .= '</td>';
            } else {
                $this->htmlvista .= '<tr>';
                $this->htmlvista .= '<td colspan="'.$_tcolumnas.'" class="'.$clase.$_clavesec['stylecss'].'" width="100%">';
                $this->htmlvista .= htmlentities($_clavesec['nom_seccion']);
                $this->htmlvista .= '</td>';
                $this->htmlvista .= '</tr>';
            }
            
//Yii::trace("que llega en clases ".$clase.$_clavesec['stylecss'],"DEBUG");
            /*Organizando preguntas asociadas a la seccion*/
            $_indiseccion = $_clavesec['id_seccion'];

            
            if (!empty($r_pregunta[$_indiseccion])) {
                
                $_vpreguntassec = $this->gen_pregutasecHTML($_clavesec['comparar'], $_numcoltitle, $r_pregunta[$_indiseccion], $this->_larray, $_tcolumnas, $modelpreguntas,$idjunta);
            }

            if ($this->tipo_archivo == 'excel') {
                $this->htmlvista .= '</table>';
            } else {
                $this->htmlvista .= '</table></td></tr>';
            }
        }
    }
    /*Funcion para las preguntas por seccion
     * esta funcion aplica para formularios de llenado
     * contiene cajitas de texto con eventos */
    
    public function gen_pregutasec($secpregunta, $_numcoltitle, $r_preguntasecc, $_larray, $_tcolumnas)
    {
        $_accesp = 1;
        $valor_fuente;
        $col_for = 0;                                    //Columnas por entrada
        $this->_larray = $_larray;
        $_vtipo1 = [1, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13, 14, 15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36];       //Tipo de preguntas que llevan caja de label y caja de input, estas tambien pueden salir en la seccion
        $_vtipo2 = [10, 2];
        $_vtipo3 = [2];                                    //Preguntas tipo preg M que llevan boton de +
        $cont_cap="";
        if(empty($cont_cap)){
            $cont_cap=$this->_numcapitulo-1;
        }
        
        foreach ($r_preguntasecc as $_claveps) {
            /**Organizando Vista******************************************************************/

            $cols_l = $_claveps['num_col_label'];            //Numero de columnas para el label
                    $cols_i = $_claveps['num_col_input'];            //Numero de columnas para el input

                    /**2) Asignando las relaciones necesarias para cuando se va a guardar *****************/
            $this->fnt_varpass($this->_larray, $_claveps['id_pregunta'], $_claveps['id_tpregunta'], $_claveps['id_respuesta'], $_claveps['id_capitulo']);

            /*Asignando Tooltip====================================================*/
            $_tooltip = '';
            if (!empty($_claveps['ayuda_pregunta'])) {
                $_tooltip = $this->fnt_tooltip($_claveps['ayuda_pregunta']);
            }
            $_obliga='';
            if ($_claveps['obligatorio'] =='S' ) {
                $_obliga = $this->fnt_obligatorio();
            }

            /*Asignando Boton Adicionar si caracteristica_preg es Multiple => 'M' ==========================*/
            $_adicionar = '';
            /*if($_claveps['caracteristica_preg'] == 'M' and $this->_pactualizar == 'S' and in_array($_claveps['id_tpregunta'], $_vtipo3)){
                $_adicionar=$this->fnt_adicionar(array("id_tpregunta"=>$_claveps['id_tpregunta'],"id_seccion"=>"","id_agrupacion"=>$_claveps['id_agrupacion'],"id_capitulo"=>$_claveps['id_capitulo'],"id_conjunto_pregunta"=>$_claveps['id_conjunto_pregunta']));
            }*/

            /*Asignando Numeracion=========================================================*/
            if ($this->_estnumerado == 'S') {
                /*Reiniciamos contador de preguntas al cambiar de seccion*/
                if ($this->_numseccion != $this->last_seccion ) {
                    $this->_numpregunta = 0;
                }
                if ($cont_cap != $this->last_capitulo)
                {
                    $cont_cap=$cont_cap+1;
                    $this->_numpregunta = 0;
                }
               

                $_agrupnumber = (!empty($_claveps['id_agrupacion']))? $_claveps['id_agrupacion']:NULL;
                
                if(is_null($_agrupnumber) or empty($larray_agrupados[$_agrupnumber])){
                    ++$this->_numpregunta;
                    $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
                    $this->last_seccion = $this->_numseccion;
                }
               
            } else {
                $_numeracion = '';
            }

            /*Si contador es igual a 0 y la respuesta no esta asociada a la pregunta de la seccion
             * se inicia nueva fila
             */
            if ($col_for == 0) {
                $this->_stringvista[] = '<tr>';
            }

            /*Vista para tipos del 1 al 9****************/
            if (in_array($_claveps['id_tpregunta'], $_vtipo1)) {
                if ($_accesp == 1 and !empty($secpregunta) and $_claveps['visible'] == 'S') {
                    $_contenido = $this->{'tipo_'.$_claveps['id_tpregunta']}($_claveps, $this->_larray);
                    $this->gen_celdas($_numcoltitle, '', 'titleseccion ', $_contenido, '');
                    $col_for = $col_for + $_numcoltitle;
                    $this->_stringvista[] = '</tr>';
                    $_tcolumnas = $col_for;
                } else {
                    if ($_claveps['visible_desc_pregunta'] == 'S') {
                        $_contenido = $_numeracion.' &nbsp; '.$_claveps['nom_pregunta'];
                        $this->gen_celdas($cols_l, '', 'labelpregunta'.$_claveps['stylecss'], $_contenido, $_tooltip.$_obliga.' '.$_adicionar);
                        $col_for = $col_for + $cols_l;
                    }

                    if ($_claveps['visible'] == 'S') {
                        $valor_fuente='';
                        if($_claveps['nom_pregunta']=='¿De cuántas fuentes hídricas capta el recurso hídrico?'){
                            $valor_fuente=$_claveps['respuesta'];
                        }
                        if($_claveps['id_tpregunta']==17)
                        {
                            //print "aki ".$valor_fuente;
                            //print_r($_claveps);
                            $_claveps['num_fuente']=$valor_fuente;
                            print "<br><br>";
                            //print_r($_claveps);
                        }
                        
                        $_contenido = $this->{'tipo_'.$_claveps['id_tpregunta']}($_claveps, $this->_larray);
                        $this->gen_celdas($cols_i, '', 'inputpregunta'.$_claveps['stylecss'], $_contenido, '');
                        $col_for = $col_for + $cols_i;
                    }
                }
            } elseif (in_array($_claveps['id_tpregunta'], $_vtipo2)) {
                /*Vista para el tipo 10**********************************************/
                if ($_claveps['id_tpregunta'] == 10 and $_claveps['visible'] == 'S') {
                    $_contenido = $this->{'tipo_'.$_claveps['id_tpregunta']}($_claveps, $this->_larray);
                    $this->gen_celdas($cols_i, '', 'inputpregunta'.$_claveps['stylecss'], $_contenido, $_tooltip.' '.$_adicionar);
                    $col_for = $col_for + $cols_i;
                }

                /*Checkbox sin Agrupacion********************************************************/
                elseif ($_claveps['id_tpregunta'] == 2 and empty($_claveps['id_agrupacion'])) {
                    if ($_accesp == 1 and !empty($secpregunta) and $_claveps['visible'] == 'S') {
                        $_contenido = $this->{'tipo_'.$_claveps['id_tpregunta']}($_claveps, $this->_larray);
                        $this->gen_celdas($_numcoltitle, '', 'titleseccion '.$_claveps['stylecss'], $_contenido, '');
                        $col_for = $col_for + $_numcoltitle;
                    } else {
                        if ($_claveps['visible_desc_pregunta'] == 'S') {
                            $_contenido = $_numeracion.' &nbsp; '.$_claveps['nom_pregunta'].'';
                            $this->gen_celdas($cols_l, '', 'labelpregunta'.$_claveps['stylecss'], $_contenido, $_tooltip.' '.$_adicionar);
                            $col_for = $col_for + $cols_l;
                        }

                        if ($_claveps['visible'] == 'S') {
                            $_contenido = $this->{'tipo_'.$_claveps['id_tpregunta']}($_claveps, $this->_larray);
                            $this->gen_celdas($cols_i, '', 'inputpregunta'.$_claveps['stylecss'], $_contenido, '');
                            $col_for = $col_for + $cols_l;
                        }
                    }
                }

                /*Checkbox con Agrupacion********************************************************/
                elseif ($_claveps['id_tpregunta'] == 2 and !empty($_claveps['id_agrupacion'])) {
                    
                    /*Este pedazo del algoritmo funcion asi:
                     */
                    $_indiagrupacion = $_claveps['id_agrupacion'];

                    if (empty($larray_agrupados[$_indiagrupacion])) {
                        
                        /*Averiguando si es de seleccion multiple o seleccion unica
                         *Se guarda el numero de l_array para la rptaNo. dado que si es tipo 1
                         *es de seleccion unica entonces todos los radio button deben llevar el mismo
                         *nombre "name" , el valor de cada radiobutton sera la pregunta que
                         * escogio el usuario.    */
                        if (!empty($_claveps['tipo_agrupacion']) and $_claveps['tipo_agrupacion'] == '1') {
                            $larray_radiobutton[$_indiagrupacion] = $this->_larray;
                            $larray_rdbttn = $larray_radiobutton[$_indiagrupacion];
                        } else {
                            $larray_rdbttn = $this->_larray;
                        }

                        /*Posicion del label*******/
                        $_posicionlabel = count($this->_stringvista);
                        $larray_agrupados[$_indiagrupacion][0] = $_posicionlabel;
                        $this->_stringvista[] = '';
                        
                        /*Se guarda la numeracion ****/
                        if ($this->_estnumerado == 'S') {
                            $larray_numerados[$_indiagrupacion] = $_numeracion;
                        }

                        /*Se guarda la posici&oacute;n para las cajitas checkbos o radio button*/
                        $larray_agrupados[$_indiagrupacion][1] = count($this->_stringvista);
                        $this->_stringvista[] = '';
                        $_posicioninput = $larray_agrupados[$_indiagrupacion][1];

                        /*Se suman las columnas usadas tanto por el label como por el input*/
                        $col_for = $col_for + $_claveps['ag_num_col'] + $cols_i;
                    } else {
                        /*En este caso ya debe existir una posicion previa para este grupo de preguntas*/
                        $_posicionlabel = $larray_agrupados[$_indiagrupacion][0];
                        $_posicioninput = $larray_agrupados[$_indiagrupacion][1];

                        /*En este caso ya debe existir una posicion previa para este grupo de preguntas*/
                        if (!empty($_claveps['tipo_agrupacion']) and $_claveps['tipo_agrupacion'] == '1') {
                            $larray_rdbttn = $larray_radiobutton[$_indiagrupacion];
                        } else {
                            $larray_rdbttn = $this->_larray;
                        }
                    }

                    /*Visualizacion en pantalla**********************************************/
                    /*Se guarda en stringvista el td para label, junto con el respectivo label*/
                    if ($_claveps['visible_desc_pregunta'] == 'S') {
                        $_contenido = $larray_numerados[$_indiagrupacion].' &nbsp; '.$_claveps['ag_descripcion'].' ';
                        $_contenido2 = $_tooltip.' '.$_adicionar;
                        $this->gen_celdaspos($_posicionlabel, $_claveps['ag_num_col'], $_claveps['ag_num_row'], 'labelpregunta'.$_claveps['stylecss'], $_contenido, $_contenido2);
                    }

                    if ($_claveps['visible'] == 'S') {
                        $_contagrupacion[$_indiagrupacion] = (empty($_contagrupacion[$_indiagrupacion])) ? $this->{'tipo_'.$_claveps['id_tpregunta']}($_claveps, $larray_rdbttn).' ' : $_contagrupacion[$_indiagrupacion].$this->{'tipo_'.$_claveps['id_tpregunta']}($_claveps, $larray_rdbttn).' ';
                        $this->gen_celdaspos($_posicioninput, $cols_i, $_claveps['ag_num_row'], 'inputpregunta'.$_claveps['stylecss'], $_contagrupacion[$_indiagrupacion], '');
                    }
                }
            }
            
            
            ++$_accesp;
            ++$this->_larray;

            /*Cuando el Numero de celdas de la fila de la seccion sea igual al numero total de columnas que tiene el
             * capitulo entonces cierra la fila, y se reinicia contador para la siguiente fila*/
            if ($_tcolumnas == $col_for) {
                $this->_stringvista[] = '</tr>';
                $col_for = 0;
            }
        }
    }
    /*mceron 2019-01-15
     * Funcion que valida la respuesta de una pregunta habilitadora*/
    public function verificabloqueo($pregunta_habili,$id_cnj_resp,$junta="")
    {
        if(!empty($junta))
        {
                $_condidata = \common\models\poc\FdRespuesta::find()->where(['id_pregunta' => $pregunta_habili])
                ->andWhere(['id_conjunto_respuesta' => $id_cnj_resp])
                ->andWhere(['id_junta' => $junta])
                ->one();
        }
        else
        {
                $_condidata = \common\models\poc\FdRespuesta::find()->where(['id_pregunta' => $pregunta_habili])
                ->andWhere(['id_conjunto_respuesta' => $id_cnj_resp])                
                ->one();
            
        }
        return $_condidata['id_opcion_select'];
    }
    
    /*mceron 2019-01-15
     * Funcion que valida la pregunta habilitadora y la opcion que habilita*/
    public function preguntacondicion($_idcondicion)
    {
        $_condidata = FdElementoCondicion::find()->where(['id_pregunta_condicionada' => $_idcondicion])->all();       
        $_count = FdElementoCondicion::find()->where(['id_pregunta_condicionada' => $_idcondicion])->count();                
        $habilitadora="";
        $concatenta="";
        if($_count>1)
        {
            foreach($_condidata as $valor)
            {
                $habili = $valor['id_pregunta_habilitadora'];
                $opcion = $valor['valor'];
                $habilitadora.= $concatenta.$habili.'-'.$opcion;
                $concatenta="-";
            }  
        }
        else
        {
            if($_count>0)
            {
                foreach($_condidata as $valor)
                {
                    $habili = $valor['id_pregunta_habilitadora'];
                    $opcion = $valor['valor'];
                    $habilitadora = $habili.'-'.$opcion;
                }          
            }
        }
        return $habilitadora;
    }

    /*Funcion para generar espacios de respuesta de las preguntas
     * que pertenece a una seccion solo aplica para FORMATOHTML
     */
    public function gen_pregutasecHTML($secpregunta, $_numcoltitle, $r_preguntasecc, $_larray, $_tcolumnas, $modelpreguntasns,$idjunta="")
    {   
        $this->_larray = $_larray;
        $_acces = 0;                                          //Lleva el conteo de columnas para el salto de linea
        $larray_agrupados = array();                          //Vector que guarda la posicion de larray para una pregunta tipo checkbox con agrupacion
                                                            // De esa forma no se debe recorrer todo el array de preguntas para saber en que posicion queda

        $larray_radiobutton = array();                        //Vector que guarda el nombre del grupo de radio buttons
        $_contagrupacion = array();

        $_vtipo1 = [1, 3, 4, 5, 6, 7, 8, 15,26];                            //Cajas con una unica respuesta
        $_vtipo2 = [9, 11, 12, 13, 14,16,17,18,19,20,21,22,23,24,25,27,28,29,30,31,32,33,34,35,36];                                //Cajas de multiples respuestas tabla por aparte 14

        foreach ($r_preguntasecc as $_claveps) {
            /**1) Columnas para Presentacion de la pregunta******************************************************/
            $cols_l = $_claveps['num_col_label'];            //Numero de columnas para el label
            $cols_i = $_claveps['num_col_input'];            //Numero de columnas para el input
            
            /*Declarando inicio de linea en la tabla =====================================*/
            if ($_acces == 0) {
                $this->htmlvista .= '<tr>';
            }

            if ($_acces == 0 and !empty($secpregunta) and $_claveps['visible'] == 'S') {
                $_claveps['visible_desc_pregunta'] = 'N';
                $_claveps['visible'] = 'S';
            }

            //Agregando vista para preguntas en el vector tipo 1===========================//
            if ($_claveps['visible_desc_pregunta'] == 'S' and in_array($_claveps['id_tpregunta'], $_vtipo1)) {
                $_contenido = $_claveps['nom_pregunta'].' ';                
                $this->gen_celdashtml($cols_l, '', 'labelpregunta'.$_claveps['stylecss'], $_contenido);
                $_acces = $_acces + $cols_l;
            }

            if ($_claveps['visible'] == 'S' and in_array($_claveps['id_tpregunta'], $_vtipo1)) {
                if (!empty($secpregunta)) {
                    $_contenido = $this->tipohtmltexto($modelpreguntasns, $this->_larray, $_claveps);
                    $this->gen_celdashtml($_tcolumnas, '', 'inputpregunta'.$_claveps['stylecss'], $_contenido);
                    $_acces = $_tcolumnas;
                    $secpregunta = '';
                } else {
                    $_contenido = $this->tipohtmltexto($modelpreguntasns, $this->_larray, $_claveps);
                    /*validacion para que se visualice el valor como bloqueado en el html*/
                    $habil = $this->preguntacondicion($_claveps['id_pregunta']);
                    if(!empty($habil))
                    {                        
                        $separa = explode('-', $habil);
                        if(count($separa)>2)
                        {
                            $veri = $this->verificabloqueo($separa[0],$this->id_conj_rpta,$idjunta);
                            if($veri ==2 && $separa[1]==1)$_claveps['stylecss']='bloqueo';
                            if($veri ==1 && $separa[1]==2)$_claveps['stylecss']='bloqueo';
                            $veri2 = $this->verificabloqueo($separa[2],$this->id_conj_rpta);
                            if($veri2 ==2 && $separa[3]==1)$_claveps['stylecss']='bloqueo,$idjunta';
                            if($veri2 ==1 && $separa[3]==2)$_claveps['stylecss']='bloqueo';
                        }
                        else
                        {
                            $veri = $this->verificabloqueo($separa[0],$this->id_conj_rpta,$idjunta);
                            if($veri ==2 && $separa[1]==1)$_claveps['stylecss']='bloqueo';
                            if($veri ==1 && $separa[1]==2)$_claveps['stylecss']='bloqueo';
                        }
                    }                      
                    $this->gen_celdashtml($cols_i, '', 'inputpregunta'.$_claveps['stylecss'], $_contenido);
                    $_acces = $_acces + $cols_i;
                }
            }

            /*Agregando a la vista preguntas tipo checkbox sin agrupacion=================================*/
            if ($_claveps['id_tpregunta'] == 2 and empty($_claveps['id_agrupacion'])) {
                if ($_claveps['visible_desc_pregunta'] == 'S') {
                    $_contenido = $_claveps['nom_pregunta'].' ';
                    $this->gen_celdashtml($cols_l, '', 'labelpregunta'.$_claveps['stylecss'], $_contenido);
                    $_acces = $_acces + $cols_l;
                }

                if ($_claveps['visible'] == 'S') {
                    $_contenido = $this->tipohtmlcheck1($modelpreguntasns, $this->_larray);
                    $this->gen_celdashtml($cols_i, '', 'inputpregunta'.$_claveps['stylecss'], $_contenido);
                    $_acces = $_acces + $cols_i;
                }
            }

            /*Agregando a la vista preguntas tipo checkbox con agrupacion==================================*/
            elseif ($_claveps['id_tpregunta'] == 2 and !empty($_claveps['id_agrupacion'])) {
                $_regagrupacion = $_claveps['id_agrupacion'];

                if (empty($this->td_agrupadas[$_regagrupacion])) {
                    $this->htmlvista .= '<td>agrupacion'.$_regagrupacion.'</td>';
                }

                $_creandohtml = $this->tipohtmlcheck_grupo($modelpreguntasns, $this->_larray, $_claveps, $_tcolumnas, $_acces);
                $_acces = $_acces + $_creandohtml[0] + $_creandohtml[1];
            }

            /*Agregando tipo pregunta 11 SOPORTE========================================================*/
            if (in_array($_claveps['id_tpregunta'], $_vtipo2)) {
                if ($_acces > 0) {
                    $this->htmlvista .= '</tr><tr>';
                }

                $_acces = $_tcolumnas;
                $this->{'tipohtml_'.$_claveps['id_tpregunta']}($_claveps, $_tcolumnas,$idjunta);
            }

            ++$this->_larray;
            if ($_acces == $_tcolumnas) {
                $this->htmlvista .= '</tr>';
                $_acces = 0;
            }
        }

        //Agregando agrupadas a la vista html====================================================
        foreach ($this->td_agrupadas as $_clagrupadas => $_vlagrupadas) {
            $ind_clagrupado = $_clagrupadas;
            $_linearemplazo = $_vlagrupadas['ag_descripcion'];
            $_linearemplazo .= $_vlagrupadas['respuestas'];
            $_linearemplazo .= '</td>';

            $this->htmlvista = str_replace('<td>agrupacion'.$ind_clagrupado.'</td>', $_linearemplazo, $this->htmlvista);
        }

        $this->td_agrupadas = array();
    }
    


    /*Funcion que asigna valores a varpass, para relacionar
     * el id_pregunta con el id_respuesta esta variable $this->varpass se usa para gestionar el guardado en la base de datos
     * de las respuestas que asigna el usuario
     */
    private function fnt_varpass($_larray, $_idpregunta, $_idtpregunta, $_idrespuesta, $_idcapitulo)
    {
        /*Recogiendo variables para data_pass id_pregunta,id_tpregunta,id_respuesta*/
        $this->_varpass .= $_larray.':::'.$_idpregunta.':::'.$_idtpregunta.':::'.$_idrespuesta.':::'.$_idcapitulo.'%%';
        $_indrelaciones = $_idpregunta;
        $this->_vrelaciones[$_indrelaciones] = $_larray;
    }

    /*Funcion para genera un boton tipo tooltip
     *
     */

    private function fnt_tooltip($_textotooltip)
    {
        $_botontool = '<?= yii\helpers\Html::a(yii\helpers\Html::img("@web/images/icono.jpg")
                                    ,"", 
                                    ["title" => "'.$_textotooltip.'", 
                                      "data-toggle" => "tooltip", 
                                      "class" => "not-active",
                                    ] ); ?>';

        return $_botontool;
    }
    
    private function fnt_obligatorio()
    {
        $_botontool = '<?= yii\helpers\Html::img("@web/images/obligatorio.jpg")?>';

        return $_botontool;
    }

    /*Funcion que genera el boton de agregar mas preguntas*/

    private function fnt_adicionar($_varsget)
    {
        /*Adicionar debe seguir siendo un boton pero se debe tener en cuenta que
        debe hacer lo mismo que los multiples que apuntan a otras tablas:
         *
         * 1) al dar clic debe ir a fd_respuesta
         * 2) el boton se debe llegar id_pregunta, id_conjunto_prta, id_capitulo, etc...
         * 3) se debe habilitar una casilla de acuerdo al tipo de pregunta y debe salir un gridview
         * con las respustas que ha seleccionado el cliente que ya se han ido guardando.
         * 4) Tener presente que al abrirse la ventana debe ser de tipo modal y al cerrar no debe afectar la ventana, o en cuyo caso
         * se debe guardar lo que se lleve antes de abrir la solucion multiple.
         * 5) Al regresar debe dejar el focus en donde va el usuario
         *
         */

        $_adicionar = '<?= yii\helpers\Html::button("+", 
                            ["value"=>yii\helpers\Url::toRoute(["fdpregunta/createm",
                            "_tipopregunta"=>"'.$_varsget['id_tpregunta'].'"'
                            .',"id_seccion"=>"'.$_varsget['id_seccion'].'",'
                            .'"id_agrupacion"=>"'.$_varsget['id_agrupacion'].'",'
                            .'"id_capitulo"=>"'.$_varsget['id_capitulo'].'",'
                            .'"id_conj_prta"=>"'.$_varsget['id_conjunto_pregunta'].'",'
                            .'"id_conj_rpta"=>'.$this->id_conj_rpta.','
                            .'"id_fmt"=>'.$this->id_fmt.','
                            .'"id_version"=>'.$this->id_version.','
                            .'"antvista"=>"'.$this->antvista.'",'
                            .'"estado"=>'.$this->estado.','
                            .'"parroquias"=>"'.$this->parroquias.'",'
                            .'"cantones"=>"'.$this->cantones.'",'
                            .'"provincia"=>"'.$this->provincia.'",'
                            .'"periodos"=>"'.$this->periodos.'",'
                            .'"capituloid"=>"'.$this->capituloid.'"],true),
                             "class" => "btn btn-default btn-xs showModalButton"
                            ]); ?>';

        return $_adicionar;
    }

    /*Funcion para agregar celdas sin posicionamiento exclusivo
     * Si es label con tooltip :
     * $this->_stringvista[]='<td colspan="'.$cols_l.'" class="labelpregunta'.$_clavepns['stylecss'].' ">';
                $this->_stringvista[]=$_clavepns['nom_pregunta'];
                $this->_stringvista[]=$_tooltip.' '.$_adicionar.'</td>'; */

    private function gen_celdas($_colspan, $_rowspan, $_style, $_html_1, $_html_2)
    {
        $_style = trim($_style);
        $this->_stringvista[] = '<td colspan="'.$_colspan.'" rowspan="'.$_rowspan.'" class="'.$_style.' ">';
        $this->_stringvista[] = $_html_1;
        $this->_stringvista[] = $_html_2.'</td>';
    }

    private function gen_celdashtml($_colspan, $_rowspan, $_style, $_html_1)
    {
        $_style = trim($_style);  //Retira espacios al inicio y al final de la clas
        
        $this->htmlvista .= '<td colspan="'.$_colspan.'" rowspan="'.$_rowspan.'" class="'.$_style.'">';
        $this->htmlvista .= $_html_1.'</td>';
    }

    /*Funcion para agregar celdas con posicionamiento exclusivo
     * Si es label con tooltip :
     * $this->_stringvista[]='<td colspan="'.$cols_l.'" class="labelpregunta'.$_clavepns['stylecss'].' ">';
                $this->_stringvista[]=$_clavepns['nom_pregunta'];
                $this->_stringvista[]=$_tooltip.' '.$_adicionar.'</td>'; */

    private function gen_celdaspos($_posicion, $_colspan, $_rowspan, $_style, $_html_1, $_html_2)
    {
        $_style = trim($_style);
        $this->_stringvista[$_posicion] = '<td colspan="'.$_colspan.'" rowspan="'.$_rowspan.'" class="'.$_style.' ">';
        $this->_stringvista[$_posicion] .= $_html_1;
        $this->_stringvista[$_posicion] .= $_html_2.'</td>';
    }

    public function gen_htmlCDA($cabezote, $analizar_informacion, $tramites)
    {
        $_string = '';

        //----------------------------INICIA CABEZOTE DATOS BASICOS --------------------------------->
        if (!empty($cabezote)) {
            $_string = '<table class="cda">';

            $_string .= '<tr>'
                    .'<td class="datosbasicos1"> N&uacute;mero CDA </td>'
                        .'<td class="datosbasicos2">'
                            .'<table width="100%">
                                <tr>
                                    <td width="50%">'.$cabezote['numero'].'</td>
                                </tr>
                            </table>
                        </td>'
                        .'<td class="datosbasicos1"> Tr&uacute;mite Administrativo </td>
                        <td class="datosbasicos2">'.$cabezote['tramite_administrativo'].'</td>'
                    .'</tr>
                    <tr>
                        <td class="datosbasicos1"> N&uacute;mero de Quipux ARCA </td>
                        <td class="datosbasicos2">'.$cabezote['qpxarca'].'</td>'
                        .'<td class="datosbasicos1"> N&uacute;mero de Quipux SENAGUA </td>
                        <td class="datosbasicos2">'.$cabezote['qpxsenagua'].'</td>
                    </tr>
                    <tr>
                        <td class="datosbasicos1"> Fecha Ingreso </td>
                        <td class="datosbasicos2">'.$cabezote['fecha_ingreso'].'</td>
                        <td class="datosbasicos1"> Fecha de Solicitud </td>
                        <td class="datosbasicos2">'.$cabezote['fecha_solicitud'].'</td>
                    </tr>
                    <tr>
                        <td class="datosbasicos1"> NÃºmero de Tr&aacute;mites </td>
                        <td class="datosbasicos2">'.$cabezote['numero_tramites'].'</td>
                        <td class="datosbasicos1"> Enviado Por </td>
                        <td class="datosbasicos2">'.$cabezote['enviado_por'].'</td>
                    </tr>
                    <tr>
                        <td class="datosbasicos1"> En Calidad de </td>
                        <td class="datosbasicos2" colspan="3">'.$cabezote['rol_en_calidad'].'</td>
                    </tr>';

            //AQUI EMPIEZA A SALIR LA INFORMACION DE TRAMITE =============================================================================
            foreach($tramites as $_htmtramite){
            
                
                $_string .= '<tr><td colspan="4" class="cdatitulos">Responsables del CDA</td></tr>';
                $_string .= '<tr>'
                            .'<td class="datosbasicos1">Numero de Tramite: </td>'
                            .'<td class="datosbasicos2">'.$_htmtramite['num_tramite'].'</td>'
                            .'<td class="datosbasicos1">Nombre del Responsable: </td>'
                            .'<td class="datosbasicos2">'.$_htmtramite['usuario'].'</td>'
                            .'</tr>';
                
                
               $_string .= '<tr>
                        <td class="datosbasicos1"> Puntos Solicitados </td>
                        <td class="datosbasicos2">'.$_htmtramite['puntos_solicitados'].'</td>
                        <td class="datosbasicos1"> C&oacute;digo Solicitud del T&eacute;cnico </td>
                        <td class="datosbasicos2">'.$_htmtramite['cod_solicitud_tecnico'].'</td>
                    </tr>';
               
               
                //Registrar datos del solicitante=========================================================================
                $_string .= '<tr><td colspan="4" class="cdatitulos">Registrar datos del Solicitante</td></tr>';

                $_string .= '<tr>
                            <td class="datosbasicos1"> Instituci&oacute;n o gremio solicitante: </td>
                            <td class="datosbasicos2">'.$_htmtramite['institucion_solicitante'].'</td>
                            <td class="datosbasicos1"> Demarcaci&oacute;n Hidrogr&aacute;fica </td>
                            <td class="datosbasicos2">'.$_htmtramite['nombre_demarcacion'].'</td>
                        </tr>';

                $_string .= '<tr>
                            <td class="datosbasicos1"> Solicitante Representante: </td>
                            <td class="datosbasicos2">'.$_htmtramite['solicitante'].'</td>
                            <td class="datosbasicos1"> Centro de Atenci&oacute;n Ciudadano: </td>
                            <td class="datosbasicos2">'.$_htmtramite['nom_centro_atencion_ciudadano'].'</td>
                        </tr>';
                
//                //Solicitudes de Informacion=============================================================================
                $_string .= '<tr><td colspan="4" class="cdatitulos">Solicitudes de Informaci&oacute;n</td></tr>';
                $_string .= '<tr><td colspan="4">';

                $_string .= '<table width="100%">';
                $_string .= '<tr>
                            <td class="datosbasicos1"> Tipo de Informaci&oacute;n faltante </td>
                            <td class="datosbasicos1"> Informaci&oacute;n solicitada a</td>
                            <td class="datosbasicos1"> Tipo de Atenci&oacute;n </td>
                            <td class="datosbasicos1"> Observaciones </td>
                            <td class="datosbasicos1"> Oficio de Atenci&oacute;n </td>
                            <td class="datosbasicos1"> Fecha de Atenci&oacute;n </td>
                        </tr>';
                
                foreach ($_htmtramite['solicitud_informacion'] as $sol_clave) {
                    
                    $_string .= '<tr>
                            <td class="datosbasicos2">'.$sol_clave->idTinfoFaltante['nom_tinfo_faltante'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idTreporte['nom_treporte'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idTatencion['nom_tatencion'].' </td>
                            <td class="datosbasicos2">'.$sol_clave['observaciones'].' </td>
                            <td class="datosbasicos2">'.$sol_clave->oficio_atencion.'</td>
                            <td class="datosbasicos2">'.$sol_clave->fecha_atencion.'</td>
                        </tr>';
                }
                
                $_string .= '</table>';
                $_string .= '</td></tr>';
//
//                
//                //Solicitudes de Informacion=============================================================================
                $_string .= '<tr><td colspan="4" class="cdatitulos">Registrar Respuesta</td></tr>';
                $_string .= '<tr><td colspan="4">';

                $_string .= '<table>';
                $_string .= '<tr>
                            <td class="datosbasicos1"> Tipo de Informaci&oacute;n faltante </td>
                            <td class="datosbasicos1"> Informaci&oacute;n solicitada a</td>
                            <td class="datosbasicos1"> Tipo de Atenci&oacute;n </td>
                            <td class="datosbasicos1"> Oficio de Atenci&oacute;n </td>
                            <td class="datosbasicos1"> Fecha de Atenci&oacute;n </td>
                            <td class="datosbasicos1"> Tipo de Respuesta </td>
                            <td class="datosbasicos1"> Oficio de Respuesta </td>
                            <td class="datosbasicos1"> Fecha de Respuesta </td>
                             <td class="datosbasicos1"> Observaciones </td>


                        </tr>';

                foreach ($_htmtramite['registrar_respuestas'] as $sol_clave) {
                    $_string .= '<tr>
                            <td class="datosbasicos2">'.$sol_clave->idTinfoFaltante['nom_tinfo_faltante'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idTreporte['nom_treporte'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idTatencion['nom_tatencion'].' </td>
                            <td class="datosbasicos2">'.$sol_clave->oficio_atencion.'</td>  
                            <td class="datosbasicos2">'.$sol_clave->fecha_atencion.'</td>
                            <td class="datosbasicos2">'.$sol_clave->idTrespuesta['nom_tatencion'].'</td>  
                            <td class="datosbasicos2">'.$sol_clave->oficio_respuesta.'</td> 
                            <td class="datosbasicos2">'.$sol_clave->fecha_respuesta.'</td>
                            <td class="datosbasicos2">'.$sol_clave->observaciones.' </td>
                            </tr>';
                }
                
                $_string .= '</table>';
                $_string .= '</td></tr>';

//            //Datos tecnicos de la solicitud=========================================================================
                $_string .= '<tr><td colspan="4" class="cdatitulos">Datos Tecnicos de la solicitud</td></tr>';
                $_string .= '<tr><td colspan="4">';

                $_string .= '<table>';
                $_string .= '<tr>
                            <td class="datosbasicos1"> C&oacute;digo CDA </td>
                            <td class="datosbasicos1"> Latitud Solicitada </td>
                            <td class="datosbasicos1"> Longitud Solicitada </td>
                            <td class="datosbasicos1"> Altura solicitada </td>
                            <td class="datosbasicos1"> Pronvicia Solicitada </td>
                            <td class="datosbasicos1"> Cant&oacute;n Solicitado </td>
                            <td class="datosbasicos1"> Parroquia solicitada </td>
                            <td class="datosbasicos1"> Sector Solicitado </td>
                            <td class="datosbasicos1"> Fuente Solicitada </td>
                            <td class="datosbasicos1"> Tipo Fuente Solicitada </td>
                            <td class="datosbasicos1"> Subtipo Fuente Solicitada </td>
                            <td class="datosbasicos1"> Caracteristica </td>
                            <td class="datosbasicos1"> q Solicitado l/s </td>
                            <td class="datosbasicos1"> Uso / aprovechamiento solicitado </td>
                            <td class="datosbasicos1"> Destino Solicitado </td>
                            <td class="datosbasicos1"> Tiempo (aÃ±os) </td>
                         </tr>';

                foreach ($_htmtramite['datos_tecnicos_solicitud'] as $sol_clave) {
                    $_string .= '<tr>
                            <td class="datosbasicos2">'.$sol_clave->psCodCda['cod_cda'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['x'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['y'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['altura'].'</td>
                            <td class="datosbasicos2">'.$this->nom_provincia($sol_clave->fdUbicacion['cod_provincia']).'</td>
                            <td class="datosbasicos2">'.$this->nom_canton($sol_clave->fdUbicacion['cod_canton'], $sol_clave->fdUbicacion['cod_canton']).'</td>
                            <td class="datosbasicos2">'.$this->nom_parroquia($sol_clave->fdUbicacion['cod_parroquia'], $sol_clave->fdUbicacion['cod_canton'], $sol_clave->fdUbicacion['cod_provincia']).'</td>
                            <td class="datosbasicos2">'.$sol_clave->sector_solicitado.'</td>
                            <td class="datosbasicos2">'.$sol_clave->fuente_solicitada.'</td>
                            <td class="datosbasicos2">'.$sol_clave->idTfuente['nom_tfuente'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idSubtfuente['nom_subtfuente'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idCaracteristica['nom_caracteristica'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->q_solicitado.'</td>
                            <td class="datosbasicos2">'.$sol_clave->idUsoSolicitado['nom_uso_solicitado'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idDestino['nom_destino'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->tiempo_years.'</td>
                            </tr>';
                }

                $_string .= '</table>';
                $_string .= '</td></tr>';
//                
//            
//            //Datos de Senagua===================================================================================
                $_string .= '<tr><td colspan="4" class="cdatitulos">Datos de Senagua</td></tr>';
                $_string .= '<tr><td colspan="4">';

                $_string .= '<table width="100%">';
                $_string .= '<tr>
                             <td class="datosbasicos1"> C&oacute;digo CDA </td>
                            <td class="datosbasicos1"> Longitud SENAGUA </td>
                            <td class="datosbasicos1"> Latitud SENAGUA </td>
                            <td class="datosbasicos1"> Altura </td>
                            <td class="datosbasicos1"> Abscisa SENAGUA </td>
                            <td class="datosbasicos1"> Q SENAGUA (l/s) </td>
                            <td class="datosbasicos1"> Fuente SENAGUA </td>
                            <td class="datosbasicos1"> Uso/Aprovechamiento  </td>
                            <td class="datosbasicos1"> Destino SENAGUA </td>
                            </tr>';

                foreach ($_htmtramite['datos_senagua'] as $sol_clave) {
                    $_string .= '<tr>
                            <td class="datosbasicos2">'.$sol_clave->psCodCda['cod_cda'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['x'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['y'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['altura'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->abscisa.'</td>
                            <td class="datosbasicos2">'.$sol_clave->q_solicitado.'</td>
                            <td class="datosbasicos2">'.$sol_clave->fuente_solicitada.'</td>
                            <td class="datosbasicos2">'.$sol_clave->idUsoSolicitado['nom_uso_solicitado'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idDestino['nom_destino'].'</td>
                            </tr>';
                }

                $_string .= '</table>';
                $_string .= '</td></tr>';
                
                  //Datos de Otras instituciones===================================================================================
          
                $_string .= '<tr><td colspan="4" class="cdatitulos">Datos Otras Instituciones</td></tr>';
                $_string .= '<tr><td colspan="4">';

                $_string .= '<table width="100%">';
                $_string .= '<tr>
                            <td class="datosbasicos1"> C&oacute;digo CDA </td>
                            <td class="datosbasicos1"> Longitud OTRAS </td>
                            <td class="datosbasicos1"> Latitud OTRAS </td>
                            <td class="datosbasicos1"> Altura OTRAS</td>
                            <td class="datosbasicos1"> Abscisa OTRAS </td>
                            <td class="datosbasicos1"> Q OTRAS (l/s) </td>
                            <td class="datosbasicos1"> Fuente OTRAS </td>
                            <td class="datosbasicos1"> Uso/Aprovechamiento </td>
                            <td class="datosbasicos1"> Destino OTRAS </td>
                            </tr>';
                
                
                foreach ($_htmtramite['otras_instituciones'] as $sol_clave) {
                    $_string .= '<tr>
                       <td class="datosbasicos2">'.$sol_clave->psCodCda['cod_cda'].'</td> 
                       <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['x'].'</td>
                       <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['y'].'</td>
                       <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['altura'].'</td>
                       <td class="datosbasicos2">'.$sol_clave->abscisa.'</td>
                       <td class="datosbasicos2">'.$sol_clave->q_solicitado.'</td>
                       <td class="datosbasicos2">'.$sol_clave->fuente_solicitada.'</td>
                       <td class="datosbasicos2">'.$sol_clave->idUsoSolicitado['nom_uso_solicitado'].'</td>
                       <td class="datosbasicos2">'.$sol_clave->idDestino['nom_destino'].'</td>
                    </tr>';
                }
                
                $_string .= '</table>';
                $_string .= '</td></tr>';
                
                //Errores Presentados=============================================================================

                $_string .= '<tr><td colspan="4" class="cdatitulos">Errores Presentados</td></tr>';
                $_string .= '<tr><td colspan="4">';

                $_string .= '<table width="100%">';
                $_string .= '<tr>
                            <td class="datosbasicos1"> Tipo de Errores </td>
                            <td class="datosbasicos1"> Observaciones </td>
                            </tr>';

                foreach ($_htmtramite['error_pres'] as $sol_clave) {
                    $_string .= '<tr>
                            <td class="datosbasicos2">'.$sol_clave->tipoerror.'</td>
                            <td class="datosbasicos2">'.$sol_clave->observaciones.'</td>
                            </tr>';
                }

                $_string .= '</table>';
                $_string .= '</td></tr>';
                
                
                //Datos Visita=============================================================================

                $_string .= '<tr><td colspan="4" class="cdatitulos">Datos Visita</td></tr>';
                $_string .= '<tr><td colspan="4">';

                $_string .= '<table width="100%">';
                $_string .= '<tr>
                            <td class="datosbasicos1"> C&oacute;digo CDA </td>
                            <td class="datosbasicos1"> X Observados </td>
                            <td class="datosbasicos1"> Y Observados </td>
                            <td class="datosbasicos1"> Altitud Observados </td>
                            </tr>';

                foreach ($_htmtramite['datos_visita'] as $sol_clave) {
                    $_string .= '<tr>
                            <td class="datosbasicos2">'.$sol_clave->psCodCda['cod_cda'].'</td> 
                            <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['x'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['y'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['altura'].'</td>
                            </tr>';
                }

                $_string .= '</table>';
                $_string .= '</td></tr>';
                
                
                //AnÃ lisis Hidrologico=============================================================================

                $_string .= '<tr><td colspan="4" class="cdatitulos">An&aacute;lisis Hidrol&oacute;gico</td></tr>';
                $_string .= '<tr><td colspan="4">';

                $_string .= '<table width="100%">';
                $_string .= '<tr>
                             <td class="datosbasicos1"> C&oacute;digo CDA </td>
                            <td class="datosbasicos1"> Cartograf&iacute;a</td>
                            <td class="datosbasicos1"> Estacion Hidrol&oacute;gica base</td>
                            <td class="datosbasicos1"> Estacion Meterol&oacute;gica base </td>
                            <td class="datosbasicos1"> MetodologÃ­a </td>
                            <td class="datosbasicos1"> Probabilidad de </td>
                            <td class="datosbasicos1"> Observaci&oacute;n </td>
                            </tr>';

                foreach ($_htmtramite['analisis_hidrologico'] as $sol_clave) {
                    $_string .= '<tr>
                            <td class="datosbasicos2">'.$sol_clave->idCodCda['cod_cda'].'</td> 
                            <td class="datosbasicos2">'.$sol_clave->idCartografia['nom_cartografia'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idEhidrografica['nom_ehidrografica'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idEmeteorologica['nom_emeteorologica'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idMetodologia['nom_metodologia'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->probabilidad.'</td>
                            <td class="datosbasicos2">'.$sol_clave->observacion.'</td>
                                </tr>';
                }

                $_string .= '</table>';
                $_string .= '</td></tr>';
                
                
               //Registro CDA=============================================================================

                $_string .= '<tr><td colspan="4" class="cdatitulos">Registro CDA</td></tr>';
                $_string .= '<tr><td colspan="4">';

                $_string .= '<table width="100%">';
                $_string .= '<tr>
                            <td class="datosbasicos1"> Codigo CDA</td>
                            <td class="datosbasicos1"> Longitud solicitado </td>
                            <td class="datosbasicos1"> Latitud solicitado </td>
                            <td class="datosbasicos1"> Altura solicitado </td>
                            <td class="datosbasicos1"> Provincia solicitada </td>
                            <td class="datosbasicos1"> Canton solicitado </td>
                            <td class="datosbasicos1"> Parroquia solicitada </td>
                            <td class="datosbasicos1"> Sector solicitado </td>
                            <td class="datosbasicos1"> Fuente solicitada </td>
                            <td class="datosbasicos1"> Tipo Fuente solicitada </td>
                            <td class="datosbasicos1"> Subtipo Fuente solicitada </td>
                            <td class="datosbasicos1"> Carateristica </td>
                            <td class="datosbasicos1"> Q Solicitado l/s </td>
                            <td class="datosbasicos1"> Uso / aprovechamiento </td>
                            <td class="datosbasicos1"> Destino solicitado </td>
                            <td class="datosbasicos1"> Tiempo (aÃ±os) </td>
                            <td class="datosbasicos1"> Observaciones </td>
                            </tr>';

                foreach ($_htmtramite['registra_datos'] as $sol_clave) {
                    $_string .= '<tr>
                            <td class="datosbasicos2">'.$sol_clave->psCodCda['cod_cda'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['latitud'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['longitud'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->fdCoordenadas['altura'].'</td>
                            <td class="datosbasicos2">'.$this->nom_provincia($sol_clave->fdUbicacion['cod_provincia']).'</td>
                            <td class="datosbasicos2">'.$this->nom_canton($sol_clave->fdUbicacion['cod_canton'], $sol_clave->fdUbicacion['cod_canton']).'</td>
                            <td class="datosbasicos2">'.$this->nom_parroquia($sol_clave->fdUbicacion['cod_parroquia'], $sol_clave->fdUbicacion['cod_canton'], $sol_clave->fdUbicacion['cod_provincia']).'</td>
                            <td class="datosbasicos2">'.$sol_clave->sector_solicitado.'</td>
                            <td class="datosbasicos2">'.$sol_clave->fuente_solicitada.'</td>
                            <td class="datosbasicos2">'.$sol_clave->idTfuente['nom_tfuente'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idSubtfuente['nom_subtfuente'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idCaracteristica['nom_caracteristica'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->q_solicitado.'</td>
                            <td class="datosbasicos2">'.$sol_clave->idUsoSolicitado['nom_uso_solicitado'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->idDestino['nom_destino'].'</td>
                            <td class="datosbasicos2">'.$sol_clave->tiempo_years.'</td>    
                            <td class="datosbasicos2">'.$sol_clave->observaciones.'</td>
                            </tr>';
                }

                $_string .= '</table>';
                $_string .= '</td></tr>';
                
                
            }
            
            
            //=========================Numero de Puntos====================================================
            foreach($analizar_informacion as $sol_clave){
                
                $_string .= '<tr><td colspan="4">';

                $_string .= '<table width="100%">';
                $_string .= '<tr>
                                <td class="datosbasicos1">Solicitados: </td>
                                <td class="datosbasicos2">'.$sol_clave->puntos_solicitados_tramite.'</td>';

                $_string .= '<td class="datosbasicos1">Visita Tecnica: </td>
                                <td class="datosbasicos2">'.$sol_clave->puntos_visita_tecnica.'</td>';

                $_string .= '<td class="datosbasicos1">Verificados SENAGUA: </td>
                                <td class="datosbasicos2">'.$sol_clave->puntos_verificados_senagua.'</td>';

                $_string .= '<td class="datosbasicos1">Puntos Certificados: </td>
                                <td class="datosbasicos2">'.$sol_clave->puntos_certificados.'</td>';

                $_string .= '<td class="datosbasicos1">Numero Devueltos: </td>
                                <td class="datosbasicos2">'.$sol_clave->puntos_devueltos.'</td>';
                
                $_string .= '<td class="datosbasicos1">Simplificados: </td>
                                <td class="datosbasicos2">'.$sol_clave->puntos_simplificados.'</td>';

                $_string .= '</table>';
                $_string .= '</td></tr>';
                
            }


            //Cierre tabla general=========================================================================
            $_string .= '</table>';

            return $_string;
        }
    }

    /*===================================================================================================================================*/
    /*=========================================FUNCIONES PARA CREAR LAS CAJAS DE ENTRADA SEGUN TIPO DE PREGUNTA =========================*/
    /******************************======================FUNCIONES PARA LAS CAJAS DE RESPUESTAS==================================********/

    /*Funcion para tipo_fecha
    Modificado Diana B: 2019-02-25     */
        public function tipo_1($_vdata, $_larray)
    {
        /*Asignando Formato*/
        if (!empty($_vdata['format'])) {
            $_formato = $_vdata['format'];
            $_formatphp = $this->formatear($_formato);
        } else {
            $_formato = Yii::$app->fmtfechasql;
            $_formatphp = Yii::$app->fmtfechaphp;   /*Esto es super importante para mantener correctamente todo los formatos de fecha, ver word para que sepa de donde sale*/
        }

        /*Revisando fecha maxima y fecha minima */
        if ($_vdata['atributos'] == 'NOW' and $_vdata['max_date'] == '1900-01-01' and $_vdata['min_date'] != '1900-01-01') {
            $_vdata['max_date'] = gmdate($_formatphp);
            $b_2 = '1';
        } elseif ($_vdata['atributos'] == 'NOW' and $_vdata['min_date'] == '1900-01-01' and $_vdata['max_date'] != '1900-01-01') {
            $_vdata['min_date'] = gmdate($_formatphp);
            $b_1 = '1';
        }

        /*Transformado Fecha d/m/Y*/
        if (empty($b_2)) {
            $date_fmt = date_create($_vdata['max_date']);
            $_vdata['max_date'] = date_format($date_fmt, $_formatphp);
        }

        if (empty($b_1)) {
            $date_fmt = date_create($_vdata['min_date']);
            $_vdata['min_date'] = date_format($date_fmt, $_formatphp);
        }

        /*Averiguando si la pregunta es multiple o es sencilla ===========================================================*/
        if ($_vdata['caracteristica_preg'] == 'M') {
            //=====================================Averiguando si existen respuestas asociadas a la pregunta tipo M========================//
            $_stringresponse = $this->getResponse('1', $_vdata['id_pregunta'], $_vdata['id_capitulo'], $this->id_fmt, $this->id_version, $_vdata['id_conjunto_pregunta'], $this->id_conj_rpta);

            $_string4 = '<?php echo $form->field($model, "rpta'.$_larray.'")->'
                    .'widget(yii\jui\DatePicker::className(),['
                    .'"dateFormat"=>"'.$_formato.'","language" => "es",'                    
                    .'"clientOptions"=>['
                    .'"maxDate" =>"'.$_vdata['max_date'].'",'
                    .'"minDate" =>"'.$_vdata['min_date'].'",'                    
                    .'"changeYear" => true,'
                    .'"changeMonth" => true,';
            $_string4 .= ']';
            $_string4 .= ']); ';
            $_string4 .= ' echo "'.$this->_condicion.'"; ?>';
            $_string4 .= ' <div>';
            $_string4 .= ' <div style="float:left">';
            $_string4 .= ' <?= yii\helpers\Html::button("Adicionar", '
                            .'["onclick"=> "getRptaM'
                                         .'('.$this->id_conj_rpta.','.
                                             $_vdata['id_conjunto_pregunta'].','
                                             .$_vdata['id_pregunta'].','
                                             .'0,'
                                             .$this->id_fmt.','
                                             .$_vdata['id_tpregunta'].','
                                             .$this->id_version.','
                                             .$_vdata['id_capitulo'].','
                                             .$_larray.')" ]); ?>';
            $_string4 .= ' </div>';
            $_string4 .= ' <div style="float:right"  id="prueba'.$_larray.'">';
            $_string4 .= $_stringresponse;
            $_string4 .= '</div>';
            $_string4 .= ' </div>';
        } else {
            /*Creando caja para la vista*/
            $anio_fin="2037";
            $anio_ini="1950";
            
            if(!empty($_vdata['max_date'])){
                $anio_fin = date("Y", strtotime($_vdata['max_date']));  
            }
            
            if(!empty($_vdata['min_date'])){
                $anio_ini = date("Y", strtotime($_vdata['min_date'])); 
            }
            
           $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->'
                    .'widget(yii\jui\DatePicker::className(),['
                    .'"dateFormat"=>"'.$_formato.'","language" => "es",'
                    .'"options" =>["readonly"=>"readonly"],'
                    .'"clientOptions"=>['
                    .'"yearRange" =>"'.$anio_ini.':'.$anio_fin.'",'
                    .'"maxDate" =>"'.$_vdata['max_date'].'",'
                    .'"minDate" =>"'.$_vdata['min_date'].'",'
                    .'"changeYear" => true,'
                    .'"changeMonth" => true,';
            $_string4 .= '],';

            if (!empty($_vdata['operacion'])) {           //Aplica para caso 2 la respuesta de la pregunta condicionada no puede varia la operacion dada en fd_elementocondicion de acuerdo al valor de la habilitadora
                $_idhab = $_vdata['id_pregunta_habilitadora'];       //Recogiendo id de  la pregunta habilitadora
                $_cond = $_larray;                                 //numera de la caja de respuesta de la pregunta condicionada
                $_hab = $this->_vrelaciones[$_idhab];               //numero de la caja de la respuesta habilitadora
                $_idtcond = $_vdata['id_tcondicion'];
                $_valor = $_vdata['valor'];

                $_string4 .= '"options" =>[';
                $_string4 .= ' "onchange" => new \yii\web\JsExpression("setCondicion(\''.$_hab.'\',\''.$_cond.'\',\'1\',\''.$_vdata['operacion'].'\',\''.$_vdata['format'].'\',\''.$_idtcond.'\',\''.$_valor.'\',this)")';
                $_string4 .= ']';
            }

            if (!empty($_vdata['opercond'])) {          //Aplica para caso 1 la pregunta habilitadora permite contestar la pregunta condicionada
                $_idcond = $_vdata['id_pregunta_condicionada'];       //Recogiendo id de  la pregunta habilitadora

                //Se guarda el id de la pregunta condicionada en un vector para enviar una funciona javascript que retorna el larray para su uso
                //en el formulario esto se hace por que si la pregunta condicionada esta mas adelante de la habilitadora no se puede saber el numero
                //de la caja hasta tene todo el formulario listo para envio========================================================================
                $this->preguntascondiciones[] = $_idcond;
                $this->preguntashabilitadoras[] = $_vdata['id_pregunta'];

                $_hab = $_larray;
                $_idtcond = $_vdata['tcond'];
                $_valor = $_vdata['valorcond'];

                $_string4 .= '"options" =>[';
                $_string4 .= ' "onchange" => new \yii\web\JsExpression("setCondicion(\''.$_hab.'\',\''.$_idcond.'\',\'2\',\''.$_vdata['opercond'].'\',\''.$_vdata['format'].'\',\''.$_idtcond.'\',\''.$_valor.'\',this)")';
                $_string4 .= ']';
            }

            $_string4 .= ']); ';

            /*Caja para escribir si la condicion es valida o no*/
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';
        }
        
        return $_string4;
    }

    /*Funcion para tipo check
        Este campo tiene un modelo interno
     *  SI id_agrupacion == null => entonces se debe sacar una caja de checkbox unica
     *  Si id_agrupaicon != null y fd_tipo_agrupacion.id_t_agrupacion==1 muestra un radio button
     *  Si id_agrupacion != null y fd_tipo_agrupacion.id_t_agrupacion==2 muestra checkbox
     *      */
    public function tipo_2($_vdata, $_larray)
    {
        
        /*Se habilita boton de eleminar si el usuario tiene permisos de editar y su preg_caracteristica = m*/
        $_eliminar = '';

        if ($_vdata['caracteristica_preg'] == 'M' and $this->_pactualizar == 'S') {
            /*Se consulta si existe respuesta relacionada conla pregunta
             * si existe se envia mensaje en la ventana de confirmacion con "Existe una respuesta asociada desea continuar"
             * Si no se envia mensaje desea eliminar el registro
             */
            if (!empty($_vdata['id_respuesta'])) {
                $_msjpreg = 'Existe una respuesta asociada, desea continuar..';
                $_idrpta = $_vdata['id_respuesta'];
            } else {
                $_msjpreg = 'Desea eliminar el registro..';
                $_idrpta = '';
            }

            /*Llama a delete_M se deben enviar las siguiente variables
            * $_tipopregunta,$id_seccion,$id_agrupacion,$id_capitulo,$id_conj_prta,$id_conj_rpta,$id_fmt,$id_version,$antvista,$estado                 */
            $_urlm = 'yii\helpers\Url::toRoute(["fdpregunta/deletem","id"=>'.$_vdata['id_pregunta'].',"id_rpta"=>"'.$_idrpta.'","id_capitulo"=>'.$_vdata['id_capitulo'].',"id_conj_prta"=>'.$_vdata['id_conjunto_pregunta'].',"id_conj_rpta"=>'.$this->id_conj_rpta.',"id_fmt"=>'.$this->id_fmt.',"id_version"=>'.$this->id_version.',"antvista"=>"'.$this->antvista.'","estado"=>'.$this->estado.',"parroquias"=>"'.$this->parroquias.'","cantones"=>"'.$this->cantones.'","provincia"=>"'.$this->provincia.'","periodos"=>"'.$this->periodos.'","capituloid"=>"'.$this->capituloid.'"],true)';
            $_eliminar = ' yii\helpers\Html::a("-","",'
                        .'["class"=>"btn btn-info","title" => Yii::t("app", "Delete"),'
                        .'"data-confirm" => Yii::t("yii",\''.$_msjpreg.'::\'.'.$_urlm.'),'
                        .'"data-method" => "post"]) ';
        }

        if (empty($_vdata['id_agrupacion'])) {            
            $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->checkbox(); ';
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';
        } elseif (!empty($_vdata['id_agrupacion']) and $_vdata['tipo_agrupacion'] == '1') {
            $_indiceagrupadas = $_vdata['id_agrupacion'];
            $_idpregunta = $_vdata['id_pregunta'];

            /*Se crea la cajita para raddio button*/

            $_string4 = '<?php echo "<table><tr><td>".$form->field($model, "rpta'.$_larray.'")->radio(["label" => "'.$_vdata['nom_pregunta'].'","value"=>"'.$_vdata['id_pregunta'].'","uncheck"=>null])."</td>"; ';
            $_string4 .= (!empty($_eliminar)) ? ' echo "<td>".'.$_eliminar.'."</td>" ;' : '';
            $_string4 .= ' echo "<td>'.$this->_condicion.'</td></tr></table>"; ';

            /*Guardando el id de la pregunta con agrupacion*/
            $this->agrupadas[$_idpregunta] = $_indiceagrupadas;  //Grupo para guardar======================

            $_string4 .= '?>';
        } elseif (!empty($_vdata['id_agrupacion']) and $_vdata['tipo_agrupacion'] == '2') {
            $functionjs="";

            if (!empty($_vdata['opercond'])) {          //Aplica para caso 1 la pregunta habilitadora permite contestar la pregunta condicionada
                    $_idcond = $_vdata['id_pregunta_condicionada'];       //Recogiendo id de  la pregunta habilitadora

                    //Se guarda el id de la pregunta condicionada en un vector para enviar una funciona javascript que retorna el larray para su uso
                    //en el formulario esto se hace por que si la pregunta condicionada esta mas adelante de la habilitadora no se puede saber el numero
                    //de la caja hasta tene todo el formulario listo para envio========================================================================
                    $this->preguntascondiciones[] = $_idcond;
                    $this->preguntashabilitadoras[] = $_vdata['id_pregunta'];

                    $_hab = $_larray;
                    $_idtcond = $_vdata['tcond'];
                    $_valor = $_vdata['valorcond'];                                
                  $functionjs= ', "onchange" => new \yii\web\JsExpression("setCondicion(\''.$_hab.'\',\''.$_idcond.'\',\'2\',\''.$_vdata['opercond'].'\',\''.$_vdata['format'].'\',\''.$_idtcond.'\',\''.$_valor.'\',this,\'checked\')")';
            }
            $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->checkbox(["label" => "'.$_vdata['nom_pregunta'].'" '.$functionjs.' ]); ';
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';
        }

        return $_string4;
    }

    /*Funcion para tipo SELECT ONE
     * El combobox se llena con los datos obtenidos de FD_OPCION.SELECT.ID_TSELECT=FD_PREGUNTA.ID_TSELECT
     */
    public function tipo_3($_vdata, $_larray)
    {
        
        $id_tselect = $_vdata['id_tselect'];
       
        
        //Averiguando si campo especifique tiene valor 'S' ==============================================
        $flagespe=FALSE;
        $_especifique = \common\models\poc\FdOpcionSelect::find()
                        ->where(['id_tselect'=>$id_tselect,'especifique'=>'S'])->all();
        
        $_countespe = \common\models\poc\FdOpcionSelect::find()
                        ->where(['id_tselect'=>$id_tselect,'especifique'=>'S'])->count();
        
        
        $_string4 = '<?php echo $form->field($model, "rpta'.$_larray.'")->dropDownList('
                .'yii\helpers\ArrayHelper::map(common\models\poc\FdOpcionSelect::find()->where("id_tselect='.$id_tselect.'")->orderBy(["id_opcion_select" => SORT_ASC])->all(),'
                .'"id_opcion_select","nom_opcion_select"),'
                .'["prompt"=>"Seleccione"';
       
        if($_countespe>0){
            
            $_sel = $_larray;
            $_hab = $_larray;
            $_ids='';
            $flagespe = TRUE;
            
            
            foreach($_especifique as $_espcl){
                $_ids.=$_espcl->id_opcion_select."//";
            }
            
            $_ids = substr($_ids, 0,-2);
                        
            $_string4 .= ', "onchange" => new \yii\web\JsExpression("setEspecifique(\''.$_sel.'\',\''.$_hab.'\',\''.$_ids.'\',this)")';
        }
        
        
        if (!empty($_vdata['operacion']) && $flagespe==FALSE) {
            $_idhab = $_vdata['id_pregunta_habilitadora'];       //Recogiendo id de  la pregunta habilitadora
            $_hab = $this->_vrelaciones[$_idhab];
            $_idcond = $_larray;
            $_idtcond = $_vdata['id_tcondicion'];
            $_valor = $_vdata['valor'];
                        
            $_string4 .= ', "onchange" => new \yii\web\JsExpression("setCondicion(\''.$_hab.'\',\''.$_idcond.'\',\'1\',\''.$_vdata['operacion'].'\',\''.$_vdata['format'].'\',\''.$_idtcond.'\',\''.$_valor.'\',this)")';
        }        
        if (!empty($_vdata['opercond']) ) {          //Aplica para caso 1 la pregunta habilitadora permite contestar la pregunta condicionada
            $_idcond = $_vdata['id_pregunta_condicionada'];       //Recogiendo id de  la pregunta habilitadora

            //Se guarda el id de la pregunta condicionada en un vector para enviar una funciona javascript que retorna el larray para su uso
            //en el formulario esto se hace por que si la pregunta condicionada esta mas adelante de la habilitadora no se puede saber el numero
            //de la caja hasta tene todo el formulario listo para envio========================================================================
            $this->preguntascondiciones[] = $_idcond;
            $this->preguntashabilitadoras[] = $_vdata['id_pregunta'];

            $_hab = $_larray;
            $_idtcond = $_vdata['tcond'];
                      
            $_valor = $_vdata['valorcond'];
		/*mceron
		Agrego para bloquear mas de un campo en funcion al valor de la relacion de la tabla fd_elemento_condicion
		*/
            $_pregunta = $_vdata['id_pregunta'];
            $_bloqueos = \common\models\poc\FdElementoCondicion::find()
                     ->where(['id_pregunta_habilitadora'=>$_pregunta])->all();
            $_countbloqueos =  \common\models\poc\FdElementoCondicion::find()
                     ->where(['id_pregunta_habilitadora'=>$_pregunta])->count();

        /*Se presenta un caso de la pregunta condicionada tiene 2 valores, se debe grabar los valores por pregunta*/  
        $valores_el="";
        if($_countbloqueos>1)
        {  
            
               $_condicionadas="";
               $coma="";
               $i=0;               
               foreach($_bloqueos as $bloque)
               {
                   
                   if($i>0)$coma=",";                                 
                   $_pregunta_condiciona =$bloque->id_pregunta_condicionada;
                   $valores_el.= $coma.$bloque->valor;//.'-'.$bloque->valor;                    
                   $_condicionadas.=$coma.$_pregunta_condiciona;                                      
                   $i++;
               }               
               $bande_valor = $this->Validar_respuesta($valores_el);
               if(count($bande_valor)>1)$_valor=$valores_el;
               $_string4 .= ', "onchange" => new \yii\web\JsExpression("setCondicion(\''.$_hab.'\',\''.$_condicionadas.'\',\'2\',\''.$_vdata['opercond'].'\',\''.$_vdata['format'].'\',\''.$_idtcond.'\',\''.$_valor.'\',this)")';
           }
        else
        {        
            $_string4 .= ', "onchange" => new \yii\web\JsExpression("setCondicion(\''.$_hab.'\',\''.$_idcond.'\',\'2\',\''.$_vdata['opercond'].'\',\''.$_vdata['format'].'\',\''.$_idtcond.'\',\''.$_valor.'\',this)")';
        }
        }
        $_string4 .= ']); ';
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';
        
        if($flagespe == 'S'){
            $_string4 .= '<br/> ';
            $valor_otro="";
            Yii::trace("que llega en esta caja ".$_vdata['ra_otros'],"DEBUG");
            if(!empty($_vdata['ra_otros'])){
                $_banddis = 'false';
                $valor_otro = $_vdata['ra_otros'];
            }else{
                $_banddis = 'true';
            }            
            $_string4 .= '<?php echo "Especifique:"; echo $form->field($model, "otros_'.$_larray.'")->textInput(["disabled" => '.$_banddis.',"value" => "'.$valor_otro.'","onkeyup"=>"return soloMayusculas(event,this)"])->label(false); ?>';
        }

        /*Averiguando si la pregunta es multiple o es sencilla ===========================================================*/
        if ($_vdata['caracteristica_preg'] == 'M') {
            //=====================================Averiguando si existen respuestas asociadas a la pregunta tipo M========================//
            $_stringresponse = $this->getResponse('3', $_vdata['id_pregunta'], $_vdata['id_capitulo'], $this->id_fmt, $this->id_version, $_vdata['id_conjunto_pregunta'], $this->id_conj_rpta);

            /*Caja para escribir si la condicion es valida o no*/
            $_string4 .= '<?= "'.$this->_condicion.'"; ?>';

            $_string4 .= ' <div>';
            $_string4 .= ' <div style="float:left">';
            $_string4 .= ' <?= yii\helpers\Html::button("Adicionar", '
                            .'["onclick"=> "getRptaM'
                                         .'('.$this->id_conj_rpta.','.
                                             $_vdata['id_conjunto_pregunta'].','
                                             .$_vdata['id_pregunta'].','
                                             .'0,'
                                             .$this->id_fmt.','
                                             .$_vdata['id_tpregunta'].','
                                             .$this->id_version.','
                                             .$_vdata['id_capitulo'].','
                                             .$_larray.')" ]); ?>';
            $_string4 .= ' </div>';
            $_string4 .= ' <div style="float:right"  id="prueba'.$_larray.'">';
            $_string4 .= $_stringresponse;
            $_string4 .= '</div>';
            $_string4 .= ' </div>';
        }

        return $_string4;
    }

    /*Funcion para tipo DESCRIPCION
        Ejemplo de lo que debe entregar la funcion: <?= $form->field($model, "rpta1")->input("text") ?>
     *
     *      */
    public function tipo_4($_vdata, $_larray)
    {
        if (!empty($_vdata['reg_exp'])) {
            $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->input("text"); ';
        } else {
            $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->widget(\yii\redactor\widgets\Redactor::className(), [ 
                      "clientOptions" => [ 
                      "lang" => "es", 
                      "buttons" => ["format", "bold", "italic","underline", "ol", "ul", "indent", "outdent"],
                      "plugins" => ["clips", "fontcolor","imagemanager"] 
                      ] 
                      ]); ';
        }

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }

    /*Funcion para tipo ENTERO*/
    public function tipo_5($_vdata, $_larray)
    {
        /*Averiguando si la pregunta es multiple o es sencilla ===========================================================*/
        if ($_vdata['caracteristica_preg'] == 'M') {
            //=====================================Averiguando si existen respuestas asociadas a la pregunta tipo M========================//
            $_stringresponse = $this->getResponse('5', $_vdata['id_pregunta'], $_vdata['id_capitulo'], $this->id_fmt, $this->id_version, $_vdata['id_conjunto_pregunta'], $this->id_conj_rpta);

            if (empty($_vdata['format'])) {
                $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->input("text")->label(false); ';
            } else {
                $formato = str_replace('#', '9', $_vdata['format']);
                $_string4 = '<?= $form->field($model,  "rpta'.$_larray.'")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "'.$formato.'",])->label(false); ';
            }

            /*Caja para escribir si la condicion es valida o no*/
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

            $_string4 .= ' <div>';
            $_string4 .= ' <div style="float:left">';
            $_string4 .= ' <?= yii\helpers\Html::button("Adicionar", '
                            .'["onclick"=> "getRptaM'
                                         .'('.$this->id_conj_rpta.','.
                                             $_vdata['id_conjunto_pregunta'].','
                                             .$_vdata['id_pregunta'].','
                                             .'0,'
                                             .$this->id_fmt.','
                                             .$_vdata['id_tpregunta'].','
                                             .$this->id_version.','
                                             .$_vdata['id_capitulo'].','
                                             .$_larray.')" ]); ?>';
            $_string4 .= ' </div>';
            $_string4 .= ' <div style="float:right"  id="prueba'.$_larray.'">';
            $_string4 .= $_stringresponse;
            $_string4 .= '</div>';
            $_string4 .= ' </div>';
        } else {
            if (empty($_vdata['format'])) {  
                /*mceron: Se agrega validacion para funcion sumar que realiza suma entre 2 campos --2018-12-03*/
                $funcion_js="";
                $campos_resp="";
                $coma="";
                
                if(!empty($_vdata['atributos']))
                {                          
                    $buscar ="sumar";   
                    $evento ="onblur";
                    if(strpos($_vdata['atributos'],$buscar)!== false){                    
                        $reemplazo = str_replace($buscar,"",$_vdata['atributos']);
                        $reemplazo = str_replace("(","",$reemplazo);
                        $reemplazo = str_replace(")","",$reemplazo);
                        $separa_campos = explode(",", $reemplazo);

                        for($i=0;$i<count($separa_campos);$i++)
                        {
                            if($i>0)$coma=",";                        
                            $campo1=$this->_vrelaciones[$separa_campos[$i]];
                            $campos_resp.=$coma.$campo1;
                        }                                       
                           $rem_n = str_replace(")","",$_vdata['atributos']);
                           $funcion_js .= ' ,"'.$evento.'" => "js:'.$rem_n.','.$campos_resp.');"';
                    }                                       
                    else
                    {   
                        /*Funciones que se leen desde el controlador */
                        $bus = ":";
                        if(strpos($_vdata['atributos'],$bus)!== false){ 
                            
                            $funcion_js="";
                        }
                        else
                        {
                            if($_vdata['atributos']=="soloNumeros")$evento ="onkeypress";
                            $funcion_js .= ' ,"'.$evento.'" => "js:return '.$_vdata['atributos'].'(event,this);"';
                        }
                    }
                    //Yii::trace("valor atributos ".$_vdata['atributos']." evento ".$evento,"DEBUG");
                }
                
                if (empty($_vdata['max_largo'])) {
                    //$_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->input("text")->label(false); ';                    
                    $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->textInput(["maxlength" => false '.$funcion_js.'])->label(false); ';
                }
                else
                {                             
                    $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->textInput(["maxlength" => '.$_vdata['max_largo'].' '.$funcion_js.'])->label(false); ';
                }
                
                
            if (!empty($_vdata['opercond'])) {          //Aplica para caso 1 la pregunta habilitadora permite contestar la pregunta condicionada
            $_idcond = $_vdata['id_pregunta_condicionada'];       //Recogiendo id de  la pregunta habilitadora

            //Se guarda el id de la pregunta condicionada en un vector para enviar una funciona javascript que retorna el larray para su uso
            //en el formulario esto se hace por que si la pregunta condicionada esta mas adelante de la habilitadora no se puede saber el numero
            //de la caja hasta tene todo el formulario listo para envio========================================================================
            $this->preguntascondiciones[] = $_idcond;
            $this->preguntashabilitadoras[] = $_vdata['id_pregunta'];           
			}

            } else {
                $formato = str_replace('#', '9', $_vdata['format']);
                $_string4 = '<?= $form->field($model,  "rpta'.$_larray.'")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "'.$formato.'",])->label(false);';
            }

            /*Caja para escribir si la condicion es valida o no*/
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';
        }

        return $_string4;
    }

    /*Funcion para tipo Decimal*/
    public function tipo_6($_vdata, $_larray)
    {
        /*Averiguando si la pregunta es multiple o es sencilla ===========================================================*/
        if ($_vdata['caracteristica_preg'] == 'M') {
            //=====================================Averiguando si existen respuestas asociadas a la pregunta tipo M========================//
            $_stringresponse = $this->getResponse('6', $_vdata['id_pregunta'], $_vdata['id_capitulo'], $this->id_fmt, $this->id_version, $_vdata['id_conjunto_pregunta'], $this->id_conj_rpta);

            if (empty($_vdata['format'])) {
                $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->input("text")->label(false); ';
            } else {
                $formato = str_replace('#', '9', $_vdata['format']);
                $_string4 = '<?= $form->field($model,  "rpta'.$_larray.'")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "'.$formato.'",])->label(false); ';
            }

            /*Caja para escribir si la condicion es valida o no*/
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

            $_string4 .= ' <div>';
            $_string4 .= ' <div style="float:left">';
            $_string4 .= ' <?= yii\helpers\Html::button("Adicionar", '
                            .'["onclick"=> "getRptaM'
                                         .'('.$this->id_conj_rpta.','.
                                             $_vdata['id_conjunto_pregunta'].','
                                             .$_vdata['id_pregunta'].','
                                             .'0,'
                                             .$this->id_fmt.','
                                             .$_vdata['id_tpregunta'].','
                                             .$this->id_version.','
                                             .$_vdata['id_capitulo'].','
                                             .$_larray.')" ]); ?>';
            $_string4 .= ' </div>';
            $_string4 .= ' <div style="float:right"  id="prueba'.$_larray.'">';
            $_string4 .= $_stringresponse;
            $_string4 .= '</div>';
            $_string4 .= ' </div>';
        } else {
            if (empty($_vdata['format'])) {
                
                $funcion_js="";
                $campos_resp="";
                $coma="";
                $func="onblur";
                if(!empty($_vdata['atributos']))
                {      
                    $buscar ="sumar";
		    $buscar2 ="sumdecimales";
                    if(strpos($_vdata['atributos'],$buscar)!== false){                    
                        $reemplazo = str_replace($buscar,"",$_vdata['atributos']);
                        $reemplazo = str_replace("(","",$reemplazo);
                        $reemplazo = str_replace(")","",$reemplazo);
                        $separa_campos = explode(",", $reemplazo);

                        for($i=0;$i<count($separa_campos);$i++)
                        {
                            if($i>0)$coma=",";                        
                            $campo1=$this->_vrelaciones[$separa_campos[$i]];
                            $campos_resp.=$coma.$campo1;
                        }                                       
                           $rem_n = str_replace(")","",$_vdata['atributos']);
                           $funcion_js .= ' ,"'.$func.'" => "js:'.$rem_n.','.$campos_resp.');"';

                    }
		    elseif(strpos($_vdata['atributos'],$buscar2)!== false){                    
                        $reemplazo = str_replace($buscar2,"",$_vdata['atributos']);
                        $reemplazo = str_replace("(","",$reemplazo);
                        $reemplazo = str_replace(")","",$reemplazo);
                        $separa_campos = explode(",", $reemplazo);

                        for($i=0;$i<count($separa_campos);$i++)
                        {
                            if($i>0)$coma=",";                        
                            $campo1=$this->_vrelaciones[$separa_campos[$i]];
                            $campos_resp.=$coma.$campo1;
                        }                                       
                           $rem_n = str_replace(")","",$_vdata['atributos']);
                           $funcion_js .= ' ,"'.$func.'" => "js:'.$rem_n.','.$campos_resp.');"';

                    }
                    else
                    { 
                                                /*Funciones que se leen desde el controlador */
                        $bus = ":";
                        if(strpos($_vdata['atributos'],$bus)!== false){ 
                            
                            $funcion_js="";
                        }
                        else
                        {
                        if($_vdata['atributos']=="NumCheck")$func = "onkeypress";                          
                        $funcion_js .= ' ,"'.$func.'" => "js:return '.$_vdata['atributos'].'(event,this);"';
                        }
                    }
                }
                
                
                /*if (empty($_vdata['max_largo'])) {
                    $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->input("text")->label(false); ';
                }
                else
                {
                    $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->textInput(["maxlength" => '.$_vdata['max_largo'].'])->label(false); ';
                }*/
                
                 if (empty($_vdata['max_largo'])) {
                    //$_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->input("text")->label(false); ';                    
                    $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->textInput(["maxlength" => false '.$funcion_js.'])->label(false); ';
                }
                else
                {                             
                    $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->textInput(["maxlength" => '.$_vdata['max_largo'].' '.$funcion_js.'])->label(false); ';
                }
            } else {
                $formato = str_replace('#', '9', $_vdata['format']);
                $_string4 = '<?= $form->field($model,  "rpta'.$_larray.'")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "'.$formato.'",])->label(false); ';
            }

            /*Caja para escribir si la condicion es valida o no*/
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';
        }

        return $_string4;
    }

    /*Funcion para tipo Porcentaje*/
    public function tipo_7($_vdata, $_larray)
    {
        /*Averiguando si la pregunta es multiple o es sencilla ===========================================================*/
        if ($_vdata['caracteristica_preg'] == 'M') {
            //=====================================Averiguando si existen respuestas asociadas a la pregunta tipo M========================//
            $_stringresponse = $this->getResponse('7', $_vdata['id_pregunta'], $_vdata['id_capitulo'], $this->id_fmt, $this->id_version, $_vdata['id_conjunto_pregunta'], $this->id_conj_rpta);

            if (empty($_vdata['format'])) {
                $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->input("text")->label(false); ';
            } else {
                $formato = str_replace('#', '9', $_vdata['format']);
                $_string4 = '<?= $form->field($model,  "rpta'.$_larray.'")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "'.$formato.'",])->label(false); ';
            }

            /*Caja para escribir si la condicion es valida o no*/
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

            $_string4 .= ' <div>';
            $_string4 .= ' <div style="float:left">';
            $_string4 .= ' <?= yii\helpers\Html::button("Adicionar", '
                            .'["onclick"=> "getRptaM'
                                         .'('.$this->id_conj_rpta.','.
                                             $_vdata['id_conjunto_pregunta'].','
                                             .$_vdata['id_pregunta'].','
                                             .'0,'
                                             .$this->id_fmt.','
                                             .$_vdata['id_tpregunta'].','
                                             .$this->id_version.','
                                             .$_vdata['id_capitulo'].','
                                             .$_larray.')" ]); ?>';
            $_string4 .= ' </div>';
            $_string4 .= ' <div style="float:right"  id="prueba'.$_larray.'">';
            $_string4 .= $_stringresponse;
            $_string4 .= '</div>';
            $_string4 .= ' </div>';
        } else {
            if (empty($_vdata['format'])) {
                $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->input("text")->label(false); ';
            } else {
                $formato = str_replace('#', '9', $_vdata['format']);
                $_string4 = '<?= $form->field($model,  "rpta'.$_larray.'")->widget(\yii\widgets\MaskedInput::className(), [
                "mask" => "'.$formato.'",])->label(false); ';
            }

            /*Caja para escribir si la condicion es valida o no*/
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';
        }

        return $_string4;
    }

    /*Funcion para tipo Moneda
    */

    public function tipo_8($_vdata, $_larray)
    {
        /*Averiguando si la pregunta es multiple o es sencilla ===========================================================*/
        if ($_vdata['caracteristica_preg'] == 'M') {
            //=====================================Averiguando si existen respuestas asociadas a la pregunta tipo M========================//
            $_stringresponse = $this->getResponse('8', $_vdata['id_pregunta'], $_vdata['id_capitulo'], $this->id_fmt, $this->id_version, $_vdata['id_conjunto_pregunta'], $this->id_conj_rpta);

            $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->widget(\yii\widgets\MaskedInput::className(), ['
                .'"clientOptions" => ['
                .'"alias" => "decimal",'
                .'"groupSeparator" => ",",'
                .'"autoGroup" => true,'
                .'"removeMaskOnSubmit" => true'
                .']'
                .']); ';

            /*Caja para escribir si la condicion es valida o no*/
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

            $_string4 .= ' <div>';
            $_string4 .= ' <div style="float:left">';
            $_string4 .= ' <?= yii\helpers\Html::button("Adicionar", '
                            .'["onclick"=> "getRptaM'
                                         .'('.$this->id_conj_rpta.','.
                                             $_vdata['id_conjunto_pregunta'].','
                                             .$_vdata['id_pregunta'].','
                                             .'0,'
                                             .$this->id_fmt.','
                                             .$_vdata['id_tpregunta'].','
                                             .$this->id_version.','
                                             .$_vdata['id_capitulo'].','
                                             .$_larray.')" ]); ?>';
            $_string4 .= ' </div>';
            $_string4 .= ' <div style="float:right"  id="prueba'.$_larray.'">';
            $_string4 .= $_stringresponse;
            $_string4 .= '</div>';
            $_string4 .= ' </div>';
        } else {
            /*mceron: Se agrega validacion para funcion utilidad que realiza diferencia entre 2 campos --2018-12-03*/
                $funcion_js="";
                $campos_resp="";
                $coma="";
                $valor_maxl="";
                if(!empty($_vdata['atributos']))
                {                      
                    $buscar ="utilidad";
                    if(strpos($_vdata['atributos'], $buscar)!== false)
                    {
                        $reemplazo = str_replace($buscar,"",$_vdata['atributos']);
                        $reemplazo = str_replace("(","",$reemplazo);
                        $reemplazo = str_replace(")","",$reemplazo);
                        $separa_campos = explode(",", $reemplazo);

                        for($i=0;$i<count($separa_campos);$i++)
                        {
                            if($i>0)$coma=",";
                            //print "aki".$separa_campos[$i].'<br>';
                            $campo1=$this->_vrelaciones[$separa_campos[$i]];
                            $campos_resp.=$coma.$campo1;
                        }                                       
                    
                       $rem_n = str_replace(")","",$_vdata['atributos']);
                       $funcion_js .= ' "onblur" => "js: '.$rem_n.','.$campos_resp.',7);"';
                    }
                }
                if(!empty($_vdata['max_largo']))$valor_maxl=$_vdata['max_largo'];                
            
            $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->widget(\yii\widgets\MaskedInput::className(), ['
                    .'"clientOptions" => ['
                    .'"alias" => "decimal",'
                    .'"groupSeparator" => ",",'
                    .'"autoGroup" => true,'
                    .'"removeMaskOnSubmit" => true,'                      
                    .'"rightAlign"=>false'
                    .']'
                    .',"options"=>['
                    .'"maxlength"=>"'.$valor_maxl.'",'                    
                    .$funcion_js.']'   
                    .']); ';
//.'"style"=>"text-align: left"'
            /*Caja para escribir si la condicion es valida o no*/
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';
        }

        return $_string4;
    }

    /*Funcion para Detalle Mensual Decimal
     * Esta pantalla tiene una variacion debe
     * enviar: formato, version, estado, conjunto_respuesta, pregunta, respuesta
    */
    public function tipo_9($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Diligenciar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_detallemensual%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_tselect'].'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /* $_string4 = '<?= yii\helpers\Html::a(Yii::t("app","'.$_titulo.'"),
                     ["'.$_vdata["tp_url_subpantalla"].'","id_fmt"=>'.$this->id_fmt.',"id_version"=>'.$this->id_version.',"id_cnj_rpta"=>'.$this->id_conj_rpta.',"id_capitulo"=>'.$_vdata["id_capitulo"].',"id_conj_prta"=>'.$_vdata["id_conjunto_pregunta"].',"id_prta"=>'.$_vdata["id_pregunta"].',"id_rpta"=>"'.$_vdata["id_respuesta"].'","numerar"=>"'.$_numeracion.'","nom_prta"=>"'.$_vdata["nom_pregunta"].'","migadepan"=>"'.$this->vactual.'","estado"=>"'.$this->estado.'","capitulo"=>"'.$this->capituloid.'","provincia"=>"'.$this->provincia.'","cantones"=>"'.$this->cantones.'","parroquias"=>"'.$this->parroquias.'","periodos"=>"'.$this->periodos.'","antvista"=>"'.$this->antvista.'","tipo_select"=>"'.$_vdata['id_tselect'].'"],
                     ["class" => "btn btn-default btn-xs "]); ';*/

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }

    /*Funcion para tipo Boton
     *FALTA ASIGNAR A DONDE VA EL BOTOOOON? */

    public function tipo_10($_vdata, $_larray)
    {
        $_string4 = '<?php echo yii\helpers\Html::button("'.$_vdata['nom_pregunta'].'", 
                    ["value"=>yii\helpers\Url::toRoute(["detcapitulo/ejec_comand","id_prta"=>'.$_vdata['id_pregunta'].',"id_conj_prta"=>'.$_vdata['id_conjunto_pregunta'].'],true),
                     "class" => "btn btn-default btn-xs showModalButton"
                    ]); ';

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }

    /*Funcion para tipo SOPORTE
     * Se  asigna input para recibir archivo
     *
     */
    public function tipo_11($_vdata, $_larray)
    {
        //Recoge los nombres de los iput que son tipo archivo ejemplo rpta0,rpta1
        $this->_tiposoporte[] = 'rpta'.$_larray;

        $_string4 = '<?= $form->field($model, "rpta'.$_larray.'[]")->fileInput(["multiple" => true, "accept" => "file_extension|image/*"])->label(false); ';

        //Averigua si existen archivos para presentarlos ====================//
        if (!empty($_vdata['id_respuesta'])) {
            $sop_idrespuesta = $_vdata['id_respuesta'];
            $_soportes = Yii::$app->db->createCommand('SELECT ruta_soporte,titulo_soporte FROM sop_soportes WHERE id_respuesta='.$sop_idrespuesta)->queryAll();

            foreach ($_soportes as $_clave11) {                
                /*para almacenar en otro servidor*/
                //$valores = str_replace('/', '\\', $_clave11['ruta_soporte']);
                
                $_string4 .= 'echo "<li><a href='.$_clave11['ruta_soporte'].$_clave11['titulo_soporte'].' download='.$_clave11['titulo_soporte'].'>'.$_clave11['titulo_soporte'].'</li>" ;';
                
            }
        }

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }

    /*Funcion para tipo COORDENADAS
    * Se  programa el enlace a tp_url_subpantalla en modo showModalButton
    */
    public function tipo_12($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Diligenciar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_coordenadas%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        //      $_string4 = '<?= yii\helpers\Html::a(Yii::t("app","'.$_titulo.'"),
        //                ["'.$_vdata["tp_url_subpantalla"].'","id_fmt"=>'.$this->id_fmt.',
        //                "id_version"=>'.$this->id_version.',"id_cnj_rpta"=>'.$this->id_conj_rpta.',
        //                "id_capitulo"=>'.$_vdata["id_capitulo"].',"id_conj_prta"=>'.$_vdata["id_conjunto_pregunta"].',
        //                "id_prta"=>'.$_vdata["id_pregunta"].',"id_rpta"=>"'.$_vdata["id_respuesta"].'","numerar"=>"'.$_numeracion.'","nom_prta"=>"'.$_vdata["nom_pregunta"].'","migadepan"=>"'.$this->vactual.'","estado"=>"'.$this->estado.'","capitulo"=>"'.$this->capituloid.'","provincia"=>"'.$this->provincia.'","cantones"=>"'.$this->cantones.'","parroquias"=>"'.$this->parroquias.'","periodos"=>"'.$this->periodos.'","antvista"=>"'.$this->antvista.'"],
        //              ["class" => "btn btn-default btn-xs "]); ';

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }

    /*Funcion para tipo INVOLUCRADOS*/
    public function tipo_13($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Diligenciar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_involucrados%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /* $_string4 = '<?= yii\helpers\Html::a(Yii::t("app","'.$_titulo.'"),
                     ["'.$_vdata["tp_url_subpantalla"].'","id_fmt"=>'.$this->id_fmt.',"id_version"=>'.$this->id_version.',"id_cnj_rpta"=>'.$this->id_conj_rpta.',"id_capitulo"=>'.$_vdata["id_capitulo"].',"id_conj_prta"=>'.$_vdata["id_conjunto_pregunta"].',"id_prta"=>'.$_vdata["id_pregunta"].',"id_rpta"=>"'.$_vdata["id_respuesta"].'","numerar"=>"'.$_numeracion.'","nom_prta"=>"'.$_vdata["nom_pregunta"].'","migadepan"=>"'.$this->vactual.'","estado"=>"'.$this->estado.'","capitulo"=>"'.$this->capituloid.'","provincia"=>"'.$this->provincia.'","cantones"=>"'.$this->cantones.'","parroquias"=>"'.$this->parroquias.'","periodos"=>"'.$this->periodos.'","antvista"=>"'.$this->antvista.'"],
                     ["class" => "btn btn-default btn-xs "]); ';*/

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }

    /*Funcion para tipo UBICACION
     * Se retira la ventana modal = showModalButton     */
    public function tipo_14($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Diligenciar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_ubicacion%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /*$_string4 = '<?= yii\helpers\Html::a(Yii::t("app","'.$_titulo.'"),
                    ["'.$_vdata["tp_url_subpantalla"].'","id_fmt"=>'.$this->id_fmt.',"id_version"=>'.$this->id_version.',"id_cnj_rpta"=>'.$this->id_conj_rpta.',"id_capitulo"=>'.$_vdata["id_capitulo"].',"id_conj_prta"=>'.$_vdata["id_conjunto_pregunta"].',"id_prta"=>'.$_vdata["id_pregunta"].',"id_rpta"=>"'.$_vdata["id_respuesta"].'","numerar"=>"'.$_numeracion.'","nom_prta"=>"'.$_vdata["nom_pregunta"].'","migadepan"=>"'.$this->vactual.'","estado"=>"'.$this->estado.'","capitulo"=>"'.$this->capituloid.'","provincia"=>"'.$this->provincia.'","cantones"=>"'.$this->cantones.'","parroquias"=>"'.$this->parroquias.'","periodos"=>"'.$this->periodos.'","antvista"=>"'.$this->antvista.'"],
                    ["class" => "btn btn-default btn-xs "]); ';*/

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    
    

    /*Funcion para tipo TEXTO
       Ejemplo de lo que debe entregar la funcion: <?= $form->field($model, "rpta1")->input("text") ?>
    *
    *      */
    public function tipo_15($_vdata, $_larray)
    {
        /*Averiguando si la pregunta es multiple o es sencilla ===========================================================*/
        if ($_vdata['caracteristica_preg'] == 'M') {
            //=====================================Averiguando si existen respuestas asociadas a la pregunta tipo M========================//
            $_stringresponse = $this->getResponse('15', $_vdata['id_pregunta'], $_vdata['id_capitulo'], $this->id_fmt, $this->id_version, $_vdata['id_conjunto_pregunta'], $this->id_conj_rpta);

            $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->input("text"); ';

            /*Caja para escribir si la condicion es valida o no*/
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

            $_string4 .= ' <div>';
            $_string4 .= ' <div style="float:left">';
            $_string4 .= ' <?= yii\helpers\Html::button("Adicionar", '
                            .'["onclick"=> "getRptaM'
                                         .'('.$this->id_conj_rpta.','.
                                             $_vdata['id_conjunto_pregunta'].','
                                             .$_vdata['id_pregunta'].','
                                             .'0,'
                                             .$this->id_fmt.','
                                             .$_vdata['id_tpregunta'].','
                                             .$this->id_version.','
                                             .$_vdata['id_capitulo'].','
                                             .$_larray.')" ]); ?>';
            $_string4 .= ' </div>';
            $_string4 .= ' <div style="float:right"  id="prueba'.$_larray.'">';
            $_string4 .= $_stringresponse;
            $_string4 .= '</div>';
            $_string4 .= ' </div>';
        } else {
            $funcion_js="";
                if(!empty($_vdata['atributos']))
                {                          
                                            
                        $evento ="onkeyUp";
                        $funcion_js .= ' ,"'.$evento.'" => "js:return '.$_vdata['atributos'].'(event,this);"';
                }
                            
            $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->textInput(["maxlength" => false '.$funcion_js.'])->label(false); ';

                if (empty($_vdata['max_largo'])) {
                    $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->textInput(["maxlength" => false '.$funcion_js.']); ';                    
                }
                else
                {
                    $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->textInput(["maxlength" => '.$_vdata['max_largo'].' '.$funcion_js.'])->label(false); ';
                }
            /*Caja para escribir si la condicion es valida o no*/
            $_string4 .= 'echo "'.$this->_condicion.'"; ?>';
        }

        return $_string4;
    }

    /*eespinoza*/
      /*Funcion para tipo informacioncomunidad*/
    public function tipo_16($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Diligenciar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_informacioncomunidad%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /* $_string4 = '<?= yii\helpers\Html::a(Yii::t("app","'.$_titulo.'"),
                     ["'.$_vdata["tp_url_subpantalla"].'","id_fmt"=>'.$this->id_fmt.',"id_version"=>'.$this->id_version.',"id_cnj_rpta"=>'.$this->id_conj_rpta.',"id_capitulo"=>'.$_vdata["id_capitulo"].',"id_conj_prta"=>'.$_vdata["id_conjunto_pregunta"].',"id_prta"=>'.$_vdata["id_pregunta"].',"id_rpta"=>"'.$_vdata["id_respuesta"].'","numerar"=>"'.$_numeracion.'","nom_prta"=>"'.$_vdata["nom_pregunta"].'","migadepan"=>"'.$this->vactual.'","estado"=>"'.$this->estado.'","capitulo"=>"'.$this->capituloid.'","provincia"=>"'.$this->provincia.'","cantones"=>"'.$this->cantones.'","parroquias"=>"'.$this->parroquias.'","periodos"=>"'.$this->periodos.'","antvista"=>"'.$this->antvista.'"],
                     ["class" => "btn btn-default btn-xs "]); ';*/

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    /*mceron 2018-11-15*/
     /*Funcion para tipo Fuentes hiricas tabla fd_fuentes_hidricas
       */
    public function tipo_17($_vdata, $_larray)
    {
        //print_r($_vdata);
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        //Esto estaba antes se comentario por que la funcion onclick que se llama no es necesaria para eso tengo el id_pregunta...y ahi la anidacion
//        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
//                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_fuenteshidricas%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla]); ';

        
        //Modificado Diana B: se hace cambio para evitar el uso de una funcion extra, como se necesita la variable fuente
        //Lo que se hace es que se crea un campo en bd diciendo que se llama fd_pregunta.anidar_pregunta asi si se necesita usar la reespuesta a otra
        //pregunta se verifica esta pregunta
       $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_involucrados%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'","onclick"=>"return Validar_fuente();"]); ';

        

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    
    /*mceron 2018-11-16*/
     /*Funcion para n campos Ubicacion geografica tabla fd_ubicacion_geografica
       */
    public function tipo_18($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }
        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_ubicaciongeografica%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'","onclick"=>"return Validar_obras();"]); ';

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }


    /*mceron 2018-12-04*/
     /*Funcion para n campos Obras de captaci&oacute;n tabla fd_obras_captacion_riego*/

    public function tipo_19($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_obrascaptacionriego%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'","onclick"=>"return Validar_obras();"]);';

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    
    // VM Funcion para tipo representantesprestador
    public function tipo_20($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Diligenciar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_representantesprestador%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /* $_string4 = '<?= yii\helpers\Html::a(Yii::t("app","'.$_titulo.'"),
                     ["'.$_vdata["tp_url_subpantalla"].'","id_fmt"=>'.$this->id_fmt.',"id_version"=>'.$this->id_version.',"id_cnj_rpta"=>'.$this->id_conj_rpta.',"id_capitulo"=>'.$_vdata["id_capitulo"].',"id_conj_prta"=>'.$_vdata["id_conjunto_pregunta"].',"id_prta"=>'.$_vdata["id_pregunta"].',"id_rpta"=>"'.$_vdata["id_respuesta"].'","numerar"=>"'.$_numeracion.'","nom_prta"=>"'.$_vdata["nom_pregunta"].'","migadepan"=>"'.$this->vactual.'","estado"=>"'.$this->estado.'","capitulo"=>"'.$this->capituloid.'","provincia"=>"'.$this->provincia.'","cantones"=>"'.$this->cantones.'","parroquias"=>"'.$this->parroquias.'","periodos"=>"'.$this->periodos.'","antvista"=>"'.$this->antvista.'"],
                     ["class" => "btn btn-default btn-xs "]); ';*/

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }   
    // VM Funcion para tipo datosaguapotable
    public function tipo_21($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Diligenciar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_datosaguapotable%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /* $_string4 = '<?= yii\helpers\Html::a(Yii::t("app","'.$_titulo.'"),
                     ["'.$_vdata["tp_url_subpantalla"].'","id_fmt"=>'.$this->id_fmt.',"id_version"=>'.$this->id_version.',"id_cnj_rpta"=>'.$this->id_conj_rpta.',"id_capitulo"=>'.$_vdata["id_capitulo"].',"id_conj_prta"=>'.$_vdata["id_conjunto_pregunta"].',"id_prta"=>'.$_vdata["id_pregunta"].',"id_rpta"=>"'.$_vdata["id_respuesta"].'","numerar"=>"'.$_numeracion.'","nom_prta"=>"'.$_vdata["nom_pregunta"].'","migadepan"=>"'.$this->vactual.'","estado"=>"'.$this->estado.'","capitulo"=>"'.$this->capituloid.'","provincia"=>"'.$this->provincia.'","cantones"=>"'.$this->cantones.'","parroquias"=>"'.$this->parroquias.'","periodos"=>"'.$this->periodos.'","antvista"=>"'.$this->antvista.'"],
                     ["class" => "btn btn-default btn-xs "]); ';*/

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    // VM Funcion para tipo datossaneamientoambiental
    public function tipo_22($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Diligenciar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_datosaguapotable%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /* $_string4 = '<?= yii\helpers\Html::a(Yii::t("app","'.$_titulo.'"),
                     ["'.$_vdata["tp_url_subpantalla"].'","id_fmt"=>'.$this->id_fmt.',"id_version"=>'.$this->id_version.',"id_cnj_rpta"=>'.$this->id_conj_rpta.',"id_capitulo"=>'.$_vdata["id_capitulo"].',"id_conj_prta"=>'.$_vdata["id_conjunto_pregunta"].',"id_prta"=>'.$_vdata["id_pregunta"].',"id_rpta"=>"'.$_vdata["id_respuesta"].'","numerar"=>"'.$_numeracion.'","nom_prta"=>"'.$_vdata["nom_pregunta"].'","migadepan"=>"'.$this->vactual.'","estado"=>"'.$this->estado.'","capitulo"=>"'.$this->capituloid.'","provincia"=>"'.$this->provincia.'","cantones"=>"'.$this->cantones.'","parroquias"=>"'.$this->parroquias.'","periodos"=>"'.$this->periodos.'","antvista"=>"'.$this->antvista.'"],
                     ["class" => "btn btn-default btn-xs "]); ';*/

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    // VM Funcion para tipo detallesfuente
    public function tipo_23($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_datosaguapotable%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /* $_string4 = '<?= yii\helpers\Html::a(Yii::t("app","'.$_titulo.'"),
                     ["'.$_vdata["tp_url_subpantalla"].'","id_fmt"=>'.$this->id_fmt.',"id_version"=>'.$this->id_version.',"id_cnj_rpta"=>'.$this->id_conj_rpta.',"id_capitulo"=>'.$_vdata["id_capitulo"].',"id_conj_prta"=>'.$_vdata["id_conjunto_pregunta"].',"id_prta"=>'.$_vdata["id_pregunta"].',"id_rpta"=>"'.$_vdata["id_respuesta"].'","numerar"=>"'.$_numeracion.'","nom_prta"=>"'.$_vdata["nom_pregunta"].'","migadepan"=>"'.$this->vactual.'","estado"=>"'.$this->estado.'","capitulo"=>"'.$this->capituloid.'","provincia"=>"'.$this->provincia.'","cantones"=>"'.$this->cantones.'","parroquias"=>"'.$this->parroquias.'","periodos"=>"'.$this->periodos.'","antvista"=>"'.$this->antvista.'"],
                     ["class" => "btn btn-default btn-xs "]); ';*/

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    // VM Funcion para tipo detallescaptacion
    public function tipo_24($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_datosaguapotable%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /* $_string4 = '<?= yii\helpers\Html::a(Yii::t("app","'.$_titulo.'"),
                     ["'.$_vdata["tp_url_subpantalla"].'","id_fmt"=>'.$this->id_fmt.',"id_version"=>'.$this->id_version.',"id_cnj_rpta"=>'.$this->id_conj_rpta.',"id_capitulo"=>'.$_vdata["id_capitulo"].',"id_conj_prta"=>'.$_vdata["id_conjunto_pregunta"].',"id_prta"=>'.$_vdata["id_pregunta"].',"id_rpta"=>"'.$_vdata["id_respuesta"].'","numerar"=>"'.$_numeracion.'","nom_prta"=>"'.$_vdata["nom_pregunta"].'","migadepan"=>"'.$this->vactual.'","estado"=>"'.$this->estado.'","capitulo"=>"'.$this->capituloid.'","provincia"=>"'.$this->provincia.'","cantones"=>"'.$this->cantones.'","parroquias"=>"'.$this->parroquias.'","periodos"=>"'.$this->periodos.'","antvista"=>"'.$this->antvista.'"],
                     ["class" => "btn btn-default btn-xs "]); ';*/

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    // VM Funcion para tipo detallescaptacion
    public function tipo_25($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_datosaguapotable%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /* $_string4 = '<?= yii\helpers\Html::a(Yii::t("app","'.$_titulo.'"),
                     ["'.$_vdata["tp_url_subpantalla"].'","id_fmt"=>'.$this->id_fmt.',"id_version"=>'.$this->id_version.',"id_cnj_rpta"=>'.$this->id_conj_rpta.',"id_capitulo"=>'.$_vdata["id_capitulo"].',"id_conj_prta"=>'.$_vdata["id_conjunto_pregunta"].',"id_prta"=>'.$_vdata["id_pregunta"].',"id_rpta"=>"'.$_vdata["id_respuesta"].'","numerar"=>"'.$_numeracion.'","nom_prta"=>"'.$_vdata["nom_pregunta"].'","migadepan"=>"'.$this->vactual.'","estado"=>"'.$this->estado.'","capitulo"=>"'.$this->capituloid.'","provincia"=>"'.$this->provincia.'","cantones"=>"'.$this->cantones.'","parroquias"=>"'.$this->parroquias.'","periodos"=>"'.$this->periodos.'","antvista"=>"'.$this->antvista.'"],
                     ["class" => "btn btn-default btn-xs "]); ';*/

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
     /*Funcion para tipo DESCRIPCION
        Ejemplo de lo que debe entregar la funcion: <?= $form->field($model, "rpta1")->input("text") ?>
     *
     *      */
    public function tipo_26($_vdata, $_larray)
    {
        $funcion_js="";
        $evento="";
        if(!empty($_vdata['atributos']))
        {             
                if($_vdata['atributos']=="soloMayusculas")$evento ="onkeyup";
                $funcion_js .= ' "'.$evento.'" => "js:return '.$_vdata['atributos'].'(event,this);"'; 
        }
        if (!empty($_vdata['reg_exp'])) {
            $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->input("text"); ';
        } else {                       
             $_string4 = '<?= $form->field($model, "rpta'.$_larray.'")->textarea(["rows" => "6", '.$funcion_js.']); ';
        }

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    /*mceron 2019-01-30
     * Para la pregunta tipo caudal de agua publicos
     */
     public function tipo_27($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_caudalaguapublicos%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';


        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    /*mceron 2019-01-31
     * Para la pregunta tipo detalle valores
     */
     public function tipo_28($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_detallevalorespublicos%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';


        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    
    
    //EE
    public function tipo_31($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_informacioncomunidad%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    
    
    public function tipo_32($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_informacioncomunidad%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    
    public function tipo_33($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_informacioncomunidad%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    } 
    
    
    
    
    
        /*mceron 2019-03-08
     * Para la pregunta Operación de planta de tratamiento para agua potable Aps-comunitario
     */
     public function tipo_34($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_operacionplantaapscom%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';


        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    
       /*mceron 2019-03-11
     * Para la pregunta Operación de planta de tratamiento para agua potable Aps-comunitario
     */
     public function tipo_35($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_tanquesalmacenaapscom%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';


        /*Caja para escribir si la condicion es valida o no*/
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    public function tipo_36($_vdata, $_larray)
    {
        if ($this->_estnumerado == 'S' and !empty($this->_numseccion)) {
            $_numeracion = $this->_numcapitulo.'.'.$this->_numseccion.'.'.$this->_numpregunta;
        } else {
            $_numeracion = '';
        }

        if ($this->_pactualizar == 'S') {
            $_titulo = 'Ingresar';
        } else {
            $_titulo = 'Ver';
        }

        $_string4 = '<?= yii\helpers\Html::submitButton("'.$_titulo.'", '
                 .'["class"=>"btn btn-default btn-xs btn-primary","id"=>"detcapitulo-rpta'.$_larray.'","value"=>"tp_informacioncomunidad%%'.$_vdata['tp_url_subpantalla'].'%%'.$_vdata['id_pregunta'].'%%'.$_vdata['id_respuesta'].'%%'.$_numeracion.'%%'.$_vdata['nom_pregunta'].'%%'.$this->vactual.'%%'.$_vdata['id_capitulo'].'%%'.$_larray.'","name"=>"subpantalla","onclick"=>"clicked=\'subpantalla\'"]); ';

        

        
        $_string4 .= 'echo "'.$this->_condicion.'"; ?>';

        return $_string4;
    }
    
    /*=====================================================FUNCIONES PARA TIPO DE FORMATO HTML=======================================*/
    /*===============================================================================================================================*/

    /*Funcion para presentacion de texto segun tipo de pregunta
     * se presenta solo el contenido de la respuesta aplica para tipos
     * 1,3,4
     */

    public function tipohtmltexto($model, $_larray, $vectordata)
    {
        $_htmlrespuesta = '';

        if ($vectordata['id_tpregunta'] == '3') {
            $_namevalue = FdOpcionSelect::find()->where(['id_tselect' => $vectordata['id_tselect'], 'id_opcion_select' => $model->{'rpta'.$_larray}])->asArray()->all();

            foreach ($_namevalue as $_textocl) {
                $_htmlrespuesta = $_textocl['nom_opcion_select'];
            }
        } else {
            $_htmlrespuesta = $model->{'rpta'.$_larray};
        }

        return $_htmlrespuesta;
    }

    /*Funcion para tipo check sin agrupacion*/
    public function tipohtmlcheck1($model, $_larray)
    {
        if ($model->{'rpta'.$_larray} == true) {
            $_htmlrespuesta = ' &#9745;';
        } else {
            $_htmlrespuesta = ' &#9744;';
        }

        return $_htmlrespuesta;
    }

    /*Funcion para tipo check con agrupacion+/
     *
     */
    public function tipohtmlcheck_grupo($model, $_larray, $vectordata, $totalcolumnas, $access)
    {
        /*Este pedazo del algoritmo funcion asi:
        */
        $_indiceagrupado = $vectordata['id_agrupacion'];
        $iniciolinea = '';
        $finlinea = '';

        //Iniciando linea si access es igual a 0
        if ($access == 0 and empty($this->td_agrupadas[$_indiceagrupado]['ag_descripcion'])) {
            $iniciolinea = '<tr>';
        }

        if ($model->{'rpta'.$_larray} == true) {
            $_htmlrespuesta = '&#9745; '.$vectordata['nom_pregunta'];
        } else {
            $_htmlrespuesta = '&#9744; '.$vectordata['nom_pregunta'];
        }

        if (empty($this->td_agrupadas[$_indiceagrupado])) {
            //sumando columnas utilizadas
            $access = $access + $vectordata['num_col_label'] + $vectordata['num_col_input'];

            $this->td_agrupadas[$_indiceagrupado]['respuestas'] = "<td class='inputpregunta".$vectordata['stylecss']."' colspan='".$vectordata['num_col_input']."'>".$_htmlrespuesta;
            $this->_vectorcntag[$_indiceagrupado] = 1;

            $_colsl = $vectordata['num_col_label'];
            $_colsi = $vectordata['num_col_input'];
        } else {
            $_ancho = $vectordata['num_col_label'] + $vectordata['num_col_input'];

            $this->td_agrupadas[$_indiceagrupado]['respuestas'] = $this->td_agrupadas[$_indiceagrupado]['respuestas'].'<br/>'.$_htmlrespuesta;
            $this->_vectorcntag[$_indiceagrupado] = $this->_vectorcntag[$_indiceagrupado] + 1;
            $_colsl = $vectordata['num_col_label'];
            $_colsi = $_colsi = $vectordata['num_col_input'];
        }

        //Guardando Descripcion=========================================================
        /*rowspan='".($this->_vectorcntag[$_indiceagrupado])."'*/
        $this->td_agrupadas[$_indiceagrupado]['ag_descripcion'] = $iniciolinea."<td class='labelpregunta".$vectordata['stylecss']."' colspan='".$vectordata['num_col_label']."' >".$vectordata['ag_descripcion'].'</td>';

        return [$_colsi, $_colsl];
    }

    /*Funcion para presentar la informacion
     * de una pregunta tipo 9 -> Detalle mensual en el formato de imrpesion HTML
     */

    public function tipohtml_9($vectordata, $totalcolumnas)
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            if ($totalcolumnas < 13) {
                $_anchoinicial = 13;
                $_ancho_1 = 1;
                $_ancho_2 = 1;
            } else {
                $_anchoinicial = $totalcolumnas;
                $_anchocolumnas = $totalcolumnas / 13;

                if (!is_int($_anchocolumnas)) {
                    $_ancho_1 = floor($_anchocolumnas);
                    $_ancho_2 = ceil($_anchocolumnas);
                } else {
                    $_ancho_1 = $_anchocolumnas;
                    $_ancho_2 = $_anchocolumnas;
                }
            }
        } else {
            $_anchoinicial = 13;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";

            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%'><tr><td colspan='".$_anchoinicial."' class='labelpregunta2'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td class='tdtable_tipo' colspan='".$_ancho_2."'>Descripcion</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Enero</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Febrero</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Marzo</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Abril</td> "
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Mayo</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Junio</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Julio</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Agosto</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Septiembre</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Octubre</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Noviembre</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Diciembre</td></tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdRespuestaXMes::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta']])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo13cl) {
                if (!empty($_tipo13cl['id_opcion_select'])) {
                    $_nomselect = FdOpcionSelect::find()->where(['id_opcion_select' => $vectordata['id_tselect']])
                            ->one();

                    $this->htmlvista .= "<tr><td class='inputpregunta'>".$_nomselect->nom_opcion_select.'</td>';
                } else {
                    $this->htmlvista .= "<tr><td class='inputpregunta'>".$_tipo13cl['descripcion'].'</td>';
                }

                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['ene_decimal'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['feb_decimal'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['mar_decimal'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['abr_decimal'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['may_decimal'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['jun_decimal'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['jul_decimal'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['ago_decimal'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['sep_decimal'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['oct_decimal'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['nov_decimal'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['dic_decimal'].'</td></tr>';

                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='13' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }

    /*Funcion para tipo de pregunta soporte
     * esta funcion genera una tabla por aparte que es incluida en el formato
     * dado que es de tipo ventana independiente
     */
    public function tipohtml_11($vectordata, $totalcolumnas)
    {
        //1)Busqueda de las respuestas que se encuentra en la tabla sop_soporte asociadas a la respuesta en fd_respuesta de la pregunta
        //en fd_pregunta
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 2;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 2;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta2'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td class='tdtable_tipo' colspan='".$_ancho_2."'>Soporte</td><td class='tdtable_tipo' colspan='".$_ancho_1."'>Tama&ntilde;o en Bytes</td></tr>";

        if (!empty($vectordata['id_respuesta'])) {
            $_searchsop = SopSoportes::find()->where(['id_respuesta' => $vectordata['id_respuesta']])->asArray()->all();

            foreach ($_searchsop as $_tipo11cl) {
                $this->htmlvista .= "<tr><td class='inputpregunta' align='center' colspan='".$_ancho_2."'>".$_tipo11cl['titulo_soporte'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' align='center' colspan='".$_ancho_1."'>".$_tipo11cl['tamanio_soportes'].'</td></tr>';
            }
        } else {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }

    /*Funcion para tipo de pregunta coordenadas
     * esta funcion genera una tabla por aparte que es incluida en el formato
     * dado que es de tipo ventana independiente
     */
    public function tipohtml_12($vectordata, $totalcolumnas)
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            if ($totalcolumnas < 6) {
                $_anchoinicial = 6;
                $_ancho_1 = 1;
                $_ancho_2 = 1;
            } else {
                $_anchoinicial = $totalcolumnas;
                $_anchocolumnas = $totalcolumnas / 6;

                if (!is_int($_anchocolumnas)) {
                    $_ancho_1 = floor($_anchocolumnas);
                    $_ancho_2 = ceil($_anchocolumnas);
                } else {
                    $_ancho_1 = $_anchocolumnas;
                    $_ancho_2 = $_anchocolumnas;
                }
            }
        } else {
            $_anchoinicial = 6;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta2'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td class='tdtable_tipo' colspan='".$_ancho_1."'>X</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Y</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Altura</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Longitud</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Latitud</td> "
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Tipo de Coordenada</td></tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchcoor = FdCoordenada::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchcoor as $_tipo12cl) {
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo12cl['x'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo12cl['y'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo12cl['altura'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo12cl['longitud'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo12cl['latitud'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo12cl['id_tcoordenada'].'</td></tr>';

                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }

    /*Funcion para tipo de preggunta involucrados
     * este funcion genera una tabla por aparte que es incluida en el formato
     * dado que es de tipo ventana independiente
     */

    public function tipohtml_13($vectordata, $totalcolumnas)
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 4;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 4;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta2'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td class='tdtable_tipo' colspan='".$_ancho_2."'>Nombre</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_1."'>Telefono</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Celular</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Correo Electr&oacute;nico</td> </tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdInvolucrado::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo13cl) {
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['nombre'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo13cl['telefono_convencional'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['celular'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo13cl['correo_electronico'].'</td></tr>';

                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }

    /*Funcion para tipo de preggunta ubicacion
     * este funcion genera una tabla por aparte que es incluida en el formato
     * dado que es de tipo ventana independiente
     */

    public function tipohtml_14($vectordata, $totalcolumnas)
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 4;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 4;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";

            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta2'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td class='tdtable_tipo' colspan='".$_ancho_1."'>Parroquia</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Demarcacion</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Centro atencion ciudadano</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Descripcion</td></tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchubc = FdUbicacion::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchubc as $_tipo14cl) {
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_ancho_1."'>".$this->nom_parroquia($_tipo14cl['cod_parroquia'], $_tipo14cl['cod_canton'], $_tipo14cl['cod_provincia']).'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$this->demarcaciones($_tipo14cl['id_demarcacion']).'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$this->centrociudadano($_tipo14cl['cod_centro_atencion_ciudadano']).'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo14cl['descripcion_ubicacion'].'</td></tr>';

                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }
    
    
    
    
    /*VM 09/01/2019
     * Funcion para tipo de preggunta JAAP Regional
     * este funcion genera una tabla por aparte que es incluida en el formato
     * dado que es de tipo ventana independiente
     */

    public function tipohtml_16($vectordata, $totalcolumnas)
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 4;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 4;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta2'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td class='tdtable_tipo' colspan='".$_ancho_2."'>Parroquia</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_1."'>Comunidad</td>"
                        ."<td class='tdtable_tipo' colspan='".$_ancho_2."'>Habitantes</td>"
                        ."</tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdInformacionComunidad::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();
            

            foreach ($_searchinv as $_tipo16cl) {
                $_data = Parroquias::find()->where(['cod_provincia' => $_tipo16cl['cod_provincia'],'cod_canton' => $_tipo16cl['cod_canton'],'cod_parroquia' => $_tipo16cl['cod_parroquia']])->one();
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_ancho_2."'>".$_data->nombre_parroquia.'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo16cl['comunidad'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo16cl['habitantes'].'</td></tr>';
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }
    
    
    
    
    
    
    
    
    /*mceron 2018-11-15
     * Funcion para el ingreso de fuente hidrica
     * este informacion es de la tabla fd_fuentes_hidricas     
     */
     public function tipohtml_17($vectordata, $totalcolumnas)
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 3;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 3;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td class='labelpregunta' colspan='".$_anchoinicial."'>Nombre de la fuente</td></tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdFuentesHidricas::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo17cl) {
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_anchoinicial."'>".$_tipo17cl['nom_fuente'].'</td></tr>';  
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }

     /*mceron 2018-11-16
     * Funcion para el ingreso de ubicacion geografica
     * este informacion es de la tabla fd_ubicacion_geografica
     */
     public function tipohtml_18($vectordata, $totalcolumnas)
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 3;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 3;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td class='labelpregunta' colspan='".$_ancho_1."'>X</td>"
                        ."<td class='labelpregunta' colspan='".$_ancho_1."'>Y</td>"                        
                        ."<td class='labelpregunta' colspan='".$_ancho_1."'>Cota</td> </tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdUbicacionGeografica::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo18cl) {
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo18cl['x'].'</td>';  
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo18cl['y'].'</td>';  
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo18cl['cota'].'</td></tr>';  

                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }
    
     /*mceron 2018-12-05
     * Funcion para el ingreso de ubicacion geografica
     * este informacion es de la tabla fd_obras_captacion_riego
     */
     public function tipohtml_19($vectordata, $totalcolumnas)
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 3;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 6;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table  width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>N&uacute;mero obra</td>"
                        ."<td width='20%' class='labelpregunta3' colspan='".$_ancho_1."'>Tipo obra captaci&oacute;n</td>"     
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Especifique tipo</td>"     
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Estado obra captaci&oacute;n</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Ubicaci&oacute;n obra captaci&oacute;n</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Especifique ubicaci&oacute;n</td></tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdObrasCaptacionRiego::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo19cl) {
                
                $_tipo_obra = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$_tipo19cl['tipo_obra']])
                        ->one();
                 $_estado_obra = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$_tipo19cl['estado_obra']])
                        ->one();
                 $_ubicacion_obra = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$_tipo19cl['ubicacion_obra']])
                        ->one();
                
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo19cl['numero_obras'].'</td>';  
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo_obra['nom_opcion_select'].'</td>'; 
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo19cl['especifique'].'</td>';                 
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_estado_obra['nom_opcion_select'].'</td>';  
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_ubicacion_obra['nom_opcion_select'].'</td>';  
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo19cl['especifique_ubicacion'].'</td></tr>';                 

                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }
    
    
    
    /*VM 09/01/2019
     * Funcion para tipo de preggunta Representantes Prestador
     * este funcion genera una tabla por aparte que es incluida en el formato
     * dado que es de tipo ventana independiente
     */

    public function tipohtml_20($vectordata, $totalcolumnas)
    {
       /* if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 4;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 4;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta2'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td  colspan='".$_ancho_2."'>Nombre</td>"
                        ."<td  colspan='".$_ancho_1."'>Cargo</td>"
                        ."<td  colspan='".$_ancho_2."'>Teléfono</td>"
                        ."<td  colspan='".$_ancho_2."'>Correo</td></tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdRepresentantesPrestador::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo20cl) {
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo20cl['nombre'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo20cl['cargo'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo20cl['telefono'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo20cl['correo'].'</td></tr>';
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";*/
    }
    
    /*VM 10/01/2019
     * Funcion para tipo de preggunta Datos de Agua Potable
     * este funcion genera una tabla por aparte que es incluida en el formato
     * dado que es de tipo ventana independiente
     */

    public function tipohtml_21($vectordata, $totalcolumnas)
    {
       /* if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 4;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 4;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta2'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td c colspan='".$_ancho_2."'>Comunidad</td>"
                        ."<td  colspan='".$_ancho_1."'>Viviendas existentes</td>"
                        ."<td  colspan='".$_ancho_2."'>Viviendas con agua potable</td>"
                        ."<td  colspan='".$_ancho_2."'>Viviendas con medidores</td></tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdDatosAguaPotable::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo21cl) {
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo21cl['comunidad'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo21cl['viviendas_existentes'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo21cl['viviendas_agua_potable'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo21cl['viviendas_medidores'].'</td></tr>';
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";*/
    }
    
    /*VM 10/01/2019
     * Funcion para tipo de preggunta Datos de Agua Potable
     * este funcion genera una tabla por aparte que es incluida en el formato
     * dado que es de tipo ventana independiente
     */

    public function tipohtml_22($vectordata, $totalcolumnas)
    {
        /*if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 4;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 4;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta2'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td  colspan='".$_ancho_2."'>Comunidad</td>"
                        ."<td  colspan='".$_ancho_1."'>Viviendas existentes</td>"
                        ."<td  colspan='".$_ancho_2."'>Viviendas con conexiones</td>"
                        ."<td  colspan='".$_ancho_2."'>Viviendas con conexion afosa septica o letrina</td></tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdDatosSaneamientoAmbiental::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo22cl) {
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo22cl['comunidad'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo22cl['viviendas_existentes'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo22cl['viviendas_conexiones'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo22cl['viviendas_conex_fsept_letrinas'].'</td></tr>';
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";*/
    }
    
    /*VM 10/01/2019
     * Funcion para tipo de preggunta Datos de la Fuente
     * este funcion genera una tabla por aparte que es incluida en el formato
     * dado que es de tipo ventana independiente
     */

    public function tipohtml_23($vectordata, $totalcolumnas, $idjunta="")
    {
        /*if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 4;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 9;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            $this->htmlvista .= '</table>';
        }
                            
        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='9' class='labelpregunta2'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr>
                          <td  width='150' style='text-align:center;font-size: 10px;font-weight:bold;' colspan='".$_ancho_2."'>Nombre fuente</td>"
                        ."<td  width='150' style='text-align:center;font-size: 10px;font-weight:bold;' colspan='".$_ancho_2."'>Tipo fuente</td>"
                        ."<td  width='150' style='text-align:center;font-size: 10px;font-weight:bold;' colspan='".$_ancho_2."'>Coordenada X</td>"
                        ."<td  width='150' style='text-align:center;font-size: 10px;font-weight:bold;' colspan='".$_ancho_2."'>Coordenada Y</td>"
                        ."<td  width='150' style='text-align:center;font-size: 10px;font-weight:bold;' colspan='".$_ancho_2."'>Cota</td>"
                        ."<td  width='150' style='text-align:center;font-size: 10px;font-weight:bold;' colspan='".$_ancho_2."'>La fuente cuenta con autorización de Senagua</td>"
                        ."<td  width='150' style='text-align:center;font-size: 10px;font-weight:bold;' colspan='".$_ancho_2."'>Caudal autorizado (l/s)</td>"
                        ."<td  width='150' style='text-align:center;font-size: 10px;font-weight:bold;' colspan='".$_ancho_2."'>Problemas en la fuente</td>"
                        ."<td  width='150' style='text-align:center;font-size: 10px;font-weight:bold;' colspan='".$_ancho_2."'>Especifique</td></tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdDetallesFuente::find()
                    
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta,'id_junta'=>$idjunta])
                            ->asArray()->all();
            foreach ($_searchinv as $_tipo23cl) {
           $_data = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo23cl['id_t_fuente']])->one();
           $t_fuente="";
           if(!empty($_data)) $t_fuente=$_data->nom_opcion_select;
           $_data2 = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo23cl['id_problema_fuente']])->one();
           $problema_fuente="";
           if(!empty($_data2)) $problema_fuente=$_data2->nom_opcion_select;
           $_data3 = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo23cl['autorizacion_senagua']])->one();
           $aut_fuente="";
           if(!empty($_data3)) $aut_fuente=$_data3->nom_opcion_select;

                $this->htmlvista .= "<tr><td class='inputpregunta' style='font-size: 10px;' colspan='".$_ancho_2."'>".$_tipo23cl['nombre_fuente'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' style='font-size: 10px;' colspan='".$_ancho_1."'>".$t_fuente.'</td>';
                $this->htmlvista .= "<td class='inputpregunta' style='font-size: 10px;' colspan='".$_ancho_2."'>".$_tipo23cl['coor_x'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' style='font-size: 10px;' colspan='".$_ancho_2."'>".$_tipo23cl['coor_y'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' style='font-size: 10px;' colspan='".$_ancho_2."'>".$_tipo23cl['coor_z'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' style='font-size: 10px;' colspan='".$_ancho_1."'>".$aut_fuente.'</td>';
                $this->htmlvista .= "<td class='inputpregunta' style='font-size: 10px;' colspan='".$_ancho_2."'>".$_tipo23cl['caudal_autorizado'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' style='font-size: 10px;' colspan='".$_ancho_2."'>".$problema_fuente.'</td>';
                $this->htmlvista .= "<td class='inputpregunta' style='font-size: 10px;' colspan='".$_ancho_2."'>".$_tipo23cl['especifique'].'</td></tr>';
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";*/
    }    
    
    /*VM 10/01/2019
     * Funcion para tipo de preggunta Datos de la Captación
     * este funcion genera una tabla por aparte que es incluida en el formato
     * dado que es de tipo ventana independiente
     */

    public function tipohtml_24($vectordata, $totalcolumnas, $idjunta="")
    {
        Yii::trace('total col '.$totalcolumnas, "DEBUG");
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            //$_anchoinicial = $totalcolumnas;
            $_anchoinicial =10;
            $_anchocolumnas = $totalcolumnas / 1;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 10;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr>
                          <td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Nombre o lugar de la captación</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>¿Cuenta con estructura hidráulica de captación?</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Material de la estructura</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Especifique</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Problemas de la captación</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Especifique</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Estado de la captación</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Tipo de medición</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Especifique</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Observaciones</td></tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdDetallesCaptacion::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo24cl) {
                $_data_estruc = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo24cl['id_estruc_hidrau']])->one();
                $estruc_captacion="";
                if(!empty($_data_estruc)) $estruc_captacion=$_data_estruc->nom_opcion_select;
                
                $_data_mat_estruc = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo24cl['id_material_estruc']])->one();
                $mat_captacion="";
                if(!empty($_data_mat_estruc)) $mat_captacion=$_data_mat_estruc->nom_opcion_select;
                
                $_data_probl_estruc = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo24cl['id_problema_capt']])->one();
                $probl_captacion="";
                if(!empty($_data_probl_estruc)) $probl_captacion=$_data_probl_estruc->nom_opcion_select;
                
                $_data_est_estruc = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo24cl['id_estado_capt']])->one();
                $estado_captacion="";
                if(!empty($_data_est_estruc)) $estado_captacion=$_data_est_estruc->nom_opcion_select;
                
                $_data_t_med = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo24cl['id_t_medicion']])->one();
                $medicion_captacion="";
                if(!empty($_data_t_med)) $medicion_captacion=$_data_t_med->nom_opcion_select;
                
                $this->htmlvista .= "<tr><td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo24cl['nombre_captacion'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_1."'>".$estruc_captacion.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$mat_captacion.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo24cl['especifique_mat_estr'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$probl_captacion.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo24cl['especifique_probl'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$estado_captacion.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$medicion_captacion.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo24cl['especifique_t_med'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo24cl['observaciones'].'</td></tr>';
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }    
    
    /*VM 10/01/2019
     * Funcion para tipo de preggunta Datos de la Captación
     * este funcion genera una tabla por aparte que es incluida en el formato
     * dado que es de tipo ventana independiente
     */

    public function tipohtml_25($vectordata, $totalcolumnas, $idjunta="")
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 4;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 7;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr>
                          <td width='25%' class='labelpregunta3' colspan='".$_ancho_2."'>Ubicación del bombeo</td>"
                        ."<td width='15%' class='labelpregunta3' colspan='".$_ancho_2."'>Material de la tubería</td>"
                        ."<td width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Estado de la bomba</td>"
                        ."<td width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Frecuencia de mantenimiento de la bomba</td>"
                        ."<td width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Año de instalación de la bomba</td>"
                        ."<td width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Problemas de las bombas</td>"
                        ."<td width='20%' class='labelpregunta3' colspan='".$_ancho_2."'>Especifique</td></tr>";

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdBombasCaptacion::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo25cl) {
                $_data_bom_mate = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo25cl['id_material_tuberia']])->one();
                $mate_bomba="";
                if(!empty($_data_bom_mate)) $mate_bomba=$_data_bom_mate->nom_opcion_select;
                
                $_data_bom_est = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo25cl['id_estado_tuberia']])->one();
                $estado_bomba="";
                if(!empty($_data_bom_est)) $estado_bomba=$_data_bom_est->nom_opcion_select;
                
                $_data_bom_mant = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo25cl['id_frec_mantenimiento']])->one();
                $mantenimiento_bomba="";
                if(!empty($_data_bom_mant)) $mantenimiento_bomba=$_data_bom_mant->nom_opcion_select;
                
                $_data_bom_probl = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo25cl['id_problema_bomba']])->one();
                $problema_bomba="";
                if(!empty($_data_bom_probl)) $problema_bomba=$_data_bom_probl->nom_opcion_select;
                
                $this->htmlvista .= "<tr><td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo25cl['nombre_bomba'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$mate_bomba.'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$estado_bomba.'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$mantenimiento_bomba.'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo25cl['anio_instalacion'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$problema_bomba.'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo25cl['especifique_problema_bomba'].'</td></tr>';
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }
    
    /*mceron 2019-01-30
     * Funcion para el ingreso de caudal de agua publicos
     * este informacion es de la tabla fd_obras_captacion_riego
     */
     public function tipohtml_27($vectordata, $totalcolumnas)
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 3;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 6;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table  width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Código</td>"
                        ."<td width='20%' class='labelpregunta3' colspan='".$_ancho_1."'>Enero</td>"     
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Febrero</td>"     
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Marzo</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Abril</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Mayo</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Junio</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Julio</td>"                
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Agosto</td>"                
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Septiembre</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Octubre</td>"                
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Noviembre</td>"                
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Diciembre</td></tr>";                
                

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdCaudalAguaPublicos::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo27cl) {
                                
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['codigo'].'</td>';  
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['enero'].'</td>'; 
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['febrero'].'</td>';                 
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['marzo'].'</td>';  
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['abril'].'</td>';  
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['mayo'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['junio'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['julio'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['agosto'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['septiembre'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['octubre'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['noviembre'].'</td>';                
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['diciembre'].'</td></tr>';                 

                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }
    
    /*mceron 2019-01-30
     * Funcion para el ingreso de caudal de agua publicos
     * este informacion es de la tabla fd_obras_captacion_riego
     */
     public function tipohtml_28($vectordata, $totalcolumnas)
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 3;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 13;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table  width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Código</td>"
                        ."<td width='20%' class='labelpregunta3' colspan='".$_ancho_1."'>Enero</td>"     
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Febrero</td>"     
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Marzo</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Abril</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Mayo</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Junio</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Julio</td>"                
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Agosto</td>"                
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Septiembre</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Octubre</td>"                
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Noviembre</td>"                
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_1."'>Diciembre</td></tr>";                
                

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdCaudalAguaPublicos::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo27cl) {
                                
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['codigo'].'</td>';  
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['enero'].'</td>'; 
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['febrero'].'</td>';                 
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['marzo'].'</td>';  
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['abril'].'</td>';  
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['mayo'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['junio'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['julio'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['agosto'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['septiembre'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['octubre'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['noviembre'].'</td>';                
                $this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_tipo27cl['diciembre'].'</td></tr>';                 

                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }
    
    //EE
    public function tipohtml_31($vectordata, $totalcolumnas,$idjunta="")
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 4;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 7;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td  width='25%' class='labelpregunta3' colspan='".$_ancho_2."'>Nombre conducción</td>"
                        ."<td  width='10%'  class='labelpregunta3' colspan='".$_ancho_1."'>Material de la tubería</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_1."'>Otra tubería</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Estado de la Tubería</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Frecuencia de mantenimiento de la conducción</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Estado de la bomba</td>"
                        ."<td  width='25%' class='labelpregunta3' colspan='".$_ancho_2."'>Problemas identificados</td></tr>";
                        
                        

        $_ct = 0;
        
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdConduccionImpulsionApscom::find()//FdDetallesCaptacion::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta,'id_junta'=>$idjunta])
                            ->asArray()->all();           
             

            foreach ($_searchinv as $_tipo31cl) {
                
                $_data_mat_tub = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo31cl['id_material_tuberia']])->one();//ok
                $mate_impulsion="";
                if(!empty($_data_mat_tub)) $mate_impulsion=$_data_mat_tub->nom_opcion_select;
                
                $_estado_tuberia = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo31cl['id_estado_tuberia']])->one();//ok
                $estado_impulsion="";
                if(!empty($_estado_tuberia)) $estado_impulsion=$_estado_tuberia->nom_opcion_select;
                
                $_frec_mant_tub = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo31cl['id_frec_mantenimiento_condimp']])->one();//ok
                $mantenimiento_impulsion="";
                if(!empty($_frec_mant_tub)) $mantenimiento_impulsion=$_frec_mant_tub->nom_opcion_select;
                
                $_estado_bomba= FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo31cl['id_estado_bomba']])->one();//ok
                $estado_bomba_impulsion="";
                if(!empty($_estado_bomba)) $estado_bomba_impulsion=$_estado_bomba->nom_opcion_select;
                
                //$this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_personal_capacitado['nom_opcion_select'].'</td>';
                $this->htmlvista .= "<tr><td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo31cl['nombre_lug_conduccion'].'</td>';//ok                
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$mate_impulsion.'</td>';//ok
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo31cl['especifique_otro_tuberia'].'</td>';//ok                
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$estado_impulsion.'</td>';//ok               
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$mantenimiento_impulsion.'</td>';//ok                
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$estado_bomba_impulsion.'</td>';//ok                                                                
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo31cl['problemas_identificados'].'</td></tr>';//
                
                
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }    
    
    //tratamiento con desinfeccion
    public function tipohtml_32($vectordata, $totalcolumnas,$idjunta="")
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 4;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 8;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr>
                          <td  width='20%' class='labelpregunta3'  colspan='".$_ancho_2."'>Ubicación del tratamiento</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_1."'>Realiza desinfección al agua cruda</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Método de desinfección</td>"
                        ."<td  width='15%' class='labelpregunta3' colspan='".$_ancho_2."'>Especifique otro método de desinfección</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Realiza medición a la salida de la desinfección</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Estado del funcionamiento del sistema</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Problemas identificados</td>"
                        ."<td  width='15%' class='labelpregunta3' colspan='".$_ancho_2."'>Especifique otros problemas</td></tr>";
                        

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdTrataguaDesinfeccionApscom::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta,'id_junta'=>$idjunta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo32cl) {
                
                $_desinfeccion_agua = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo32cl['realiza_desinfeccion']])->one();
                $agua_desinfeccion="";
                if(!empty($_desinfeccion_agua)) $agua_desinfeccion=$_desinfeccion_agua->nom_opcion_select;
                
                $_met_desinf_agua = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo32cl['metodo_desinfeccion']])->one();
                $metodo_desinfeccion="";
                if(!empty($_met_desinf_agua)) $metodo_desinfeccion=$_met_desinf_agua->nom_opcion_select;
                
                $_mide_salida_desinf = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo32cl['mide_salida_desinfeccion']])->one();//ok
                $mide_sal_desinfeccion="";
                if(!empty($_mide_salida_desinf)) $mide_sal_desinfeccion=$_mide_salida_desinf->nom_opcion_select;
                
                $_estado_fun_sistema = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo32cl['estado_func_sistema']])->one();//ok
                $estado_desinfeccion="";
                if(!empty($_estado_fun_sistema)) $estado_desinfeccion=$_estado_fun_sistema->nom_opcion_select;
                
                $_probl_identif_sistema = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo32cl['problemas_identificados']])->one();//ok
                $problema_desinfeccion="";
                if(!empty($_probl_identif_sistema)) $problema_desinfeccion=$_probl_identif_sistema->nom_opcion_select;
                
                
                $this->htmlvista .= "<tr><td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo32cl['ubicacion_lug_tratamiento'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$agua_desinfeccion.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$metodo_desinfeccion.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo32cl['especifique_otro_metdesinf'].'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$mide_sal_desinfeccion.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$estado_desinfeccion.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$problema_desinfeccion.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo32cl['especifique_otros_problemas'].'</td></tr>';
                
                
                
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }    
    
    public function tipohtml_33($vectordata, $totalcolumnas,$idjunta="")
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 4;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 8;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr>
                          <td  width='20%' class='labelpregunta3' colspan='".$_ancho_2."'>Ubicación de la planta de tratamiento</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_1."'>Tipo de planta de tratamiento</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_1."'>Otro tipo de planta de tratamiento</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Método de desinfección</td>"
                        ."<td  width='15%' class='labelpregunta3' colspan='".$_ancho_2."'>Especifique otro método de desinfección</td>"
                        ."<td  width='15%' class='labelpregunta3' colspan='".$_ancho_2."'>Realiza medición del agua tratada en la planta</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Estado de la planta</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Problemas identificados</td></tr>";
                        
                        

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdPotabilizPlantatraApscom::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo33cl) {
                
                $_tplantatratmiento = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo33cl['tipo_planta_tratatmiento']])->one();//ok               
                $tipo_planta_tra="";
                if(!empty($_tplantatratmiento)) $tipo_planta_tra=$_tplantatratmiento->nom_opcion_select;
                
                $_met_desinf_plantt = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo33cl['metodo_desinfeccion_planta']])->one();//ok                
                $metodo_planta_tra="";
                if(!empty($_met_desinf_plantt)) $metodo_planta_tra=$_met_desinf_plantt->nom_opcion_select;
                
                $_medicion_planta_t = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo33cl['midicion_agua_tratplanta']])->one();//ok                
                $medicion_planta_tra="";
                if(!empty($_medicion_planta_t)) $medicion_planta_tra=$_medicion_planta_t->nom_opcion_select;
                
                $_estado_planta_t = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo33cl['estado_planta']])->one();//
                $estado_planta_tra="";
                if(!empty($_estado_planta_t)) $estado_planta_tra=$_estado_planta_t->nom_opcion_select;

                $this->htmlvista .= "<tr><td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo33cl['ubicacion_lug_ptratamiento'].'</td>';//ok       
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$tipo_planta_tra.'</td>';//ok        
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo33cl['especifique_tplantat'].'</td>';//ok
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$metodo_planta_tra.'</td>';//ok
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo33cl['especifique_metdesinfeccionp'].'</td>';//ok
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$medicion_planta_tra.'</td>';    //ok             
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$estado_planta_tra.'</td>'; //ok               
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo33cl['problemas_identificados'].'</td></tr>';//ok
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }   
     /*mceron 2019-03-13
     * Funcion para el ingreso de OPERACIÓN DE LA PLANTA DE TRATAMIENTO PARA AGUA POTABLE Aps comunitarios
     * este informacion es de la tabla fd_operacion_planta_apscom
     */
     public function tipohtml_34($vectordata, $totalcolumnas,$idjunta="")
    {
         if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 3;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 6;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td  width='16%' class='labelpregunta3' colspan='".$_ancho_2."'>¿Dispone de manual de operación del método aplicado para tratamiento</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_2."'>¿Se realiza la operación de la planta en base al manual?</td>"     
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_2."'>¿Existe personal capacitado?</td>"     
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_2."'>Frecuencia de mantenimiento</td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_2."'>Problemas identificados </td>"
                        ."<td width='16%' class='labelpregunta3' colspan='".$_ancho_2."'>Especifique problemas</td></tr>";
        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = \common\models\poc\FdOperacionplantaApscom::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta,'id_junta'=>$idjunta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo34cl) {
                
                $_manual_operacion = FdOpcionSelect::find()->where(['id_opcion_select'=>$_tipo34cl['manual_operacion']])->one();
                $manual_planta="";
                if(!empty($_manual_operacion)) $manual_planta=$_manual_operacion->nom_opcion_select;
                
                $_operacion_planta = FdOpcionSelect::find()->where(['id_opcion_select'=>$_tipo34cl['operacion_planta']])->one();
                $operacion_planta="";
                if(!empty($_operacion_planta)) $operacion_planta=$_operacion_planta->nom_opcion_select;
                
                $_personal_capacitado = FdOpcionSelect::find()->where(['id_opcion_select'=>$_tipo34cl['personal_capacitado']]) ->one();
                $personal_planta="";
                if(!empty($_personal_capacitado)) $personal_planta=$_personal_capacitado->nom_opcion_select;
                
                $_frecuencia_mantenimiento = FdOpcionSelect::find()->where(['id_opcion_select'=>$_tipo34cl['frecuencia_mantenimiento']])->one();
                $mantenimiento_planta="";
                if(!empty($_frecuencia_mantenimiento)) $mantenimiento_planta=$_frecuencia_mantenimiento->nom_opcion_select;
                
                $_problemas = FdOpcionSelect::find()->where(['id_opcion_select'=>$_tipo34cl['problemas']])->one();
                $problemas_planta="";
                if(!empty($_problemas)) $problemas_planta=$_problemas->nom_opcion_select;
              
                $this->htmlvista .= "<tr><td class='inputpregunta'  colspan='".$_ancho_2."'>".$manual_planta.'</td>';  
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$operacion_planta.'</td>';  
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$personal_planta.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$mantenimiento_planta.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$problemas_planta.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo34cl['especifique'].'</td></tr>';                 

                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }
    
    
    /*mceron 2019-03-13
     * Funcion para el ingreso de ALMACENAMIENTO (TANQUES) Aps comunitarios
     * este informacion es de la tabla fd_tanques_almacena_apscom
     */
     public function tipohtml_35($vectordata, $totalcolumnas,$idjunta)
    {
         if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

           $_anchoinicial = 8;
            $_anchocolumnas = $totalcolumnas / 3;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 8;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' ><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr>
                          <td  width='20%' class='labelpregunta3' colspan='".$_ancho_2."'>Ubicación del tanque</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Capacidad del tanque (metros cúbicos)</td>"     
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>¿Realiza la medición a la entrada del tanque?</td>"     
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Material</td>"     
                        ."<td  width='20%' class='labelpregunta3' colspan='".$_ancho_2."'>Especifique material</td>"    
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Frecuencia mantenimiento</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Estado de la estructura del tanque</td>"
                        ."<td  width='10%' class='labelpregunta3' colspan='".$_ancho_2."'>Problemas identificados</td></tr>";
        
        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = \common\models\poc\FdTanquesAlmacenaApscom::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta,'id_junta'=>$idjunta])
                            ->asArray()->all();

            foreach ($_searchinv as $_tipo35cl) {
                
             $_medicion_entrada = FdOpcionSelect::find()->where(['id_opcion_select'=>$_tipo35cl['medicion_entrada']])->one();
             $medicion_tanque="";
             if(!empty($_medicion_entrada)) $medicion_tanque=$_medicion_entrada->nom_opcion_select;
             
             $_material = FdOpcionSelect::find()->where(['id_opcion_select'=>$_tipo35cl['material']])->one();
             $material_tanque="";
             if(!empty($_material)) $material_tanque=$_material->nom_opcion_select;
             
             $_frecuencia_mantenimiento = FdOpcionSelect::find()->where(['id_opcion_select'=>$_tipo35cl['frecuencia_mantenimiento']])->one();
             $mantenimiento_tanque="";
             if(!empty($_frecuencia_mantenimiento)) $mantenimiento_tanque=$_frecuencia_mantenimiento->nom_opcion_select;
             
             $_estado_tanque = FdOpcionSelect::find()->where(['id_opcion_select'=>$_tipo35cl['estado_tanque']])->one();
             $est_tanque="";
             if(!empty($_estado_tanque)) $est_tanque=$_estado_tanque->nom_opcion_select;
             
             $_problemas = FdOpcionSelect::find()->where(['id_opcion_select'=>$_tipo35cl['problemas']])->one();
             $problema_tanque="";
             if(!empty($_problemas)) $problema_tanque=$_problemas->nom_opcion_select;  
              
                $this->htmlvista .= "<tr><td class='inputpregunta' colspan='".$_ancho_2."'>".$_tipo35cl['ubicacion_tanque'].'</td>';                 
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo35cl['capacidad_tanque'].'</td>';                 
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$medicion_tanque.'</td>';  
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$material_tanque.'</td>';  
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo35cl['especifique'].'</td>';                 
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$mantenimiento_tanque.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$est_tanque.'</td>';
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$problema_tanque.'</td></tr>';
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }
    
    
    
    //VICTOR MOREIRA
    public function tipohtml_36($vectordata, $totalcolumnas, $idjunta="")
    {
        if ($this->tipo_archivo == 'excel') {
            $this->htmlvista .= '</table>';

            $_anchoinicial = $totalcolumnas;
            $_anchocolumnas = $totalcolumnas / 4;

            if (!is_int($_anchocolumnas)) {
                $_ancho_1 = floor($_anchocolumnas);
                $_ancho_2 = ceil($_anchocolumnas);
            } else {
                $_ancho_1 = $_anchocolumnas;
                $_ancho_2 = $_anchocolumnas;
            }
        } else {
            $_anchoinicial = 6;
            $_ancho_1 = 1;
            $_ancho_2 = 1;

            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>&nbsp;</td></tr><tr>";
            //$this->htmlvista.="<td colspan='".$totalcolumnas."'>";
            $this->htmlvista .= '</table>';
        }

        $this->htmlvista .= "<table width='100%' class='tbespeciales'><tr><td colspan='".$_anchoinicial."' class='labelpregunta'>".$vectordata['nom_pregunta'].'</td></tr>';
        $this->htmlvista .= "<tr><td width='20%' class='labelpregunta3' colspan='".$_ancho_2."'>Nombre conducción</td>"
                        ."<td width='20%' class='labelpregunta3' colspan='".$_ancho_2."'>Forma de conducción</td>"
                        ."<td width='15%' class='labelpregunta3' colspan='".$_ancho_2."'>Material de la conducción</td>"
                        ."<td width='15%' class='labelpregunta3' colspan='".$_ancho_2."'>Frecuencia de mantenimiento de la conducción</td>"
                        ."<td width='15%' class='labelpregunta3' colspan='".$_ancho_2."'>Estado de la conducción</td>"
                        ."<td width='15%' class='labelpregunta3' colspan='".$_ancho_2."'>Problemas identificados</td></tr>";
                        
                        

        $_ct = 0;
        if (!empty($vectordata['id_respuesta'])) {
            $_searchinv = FdConduccionGravedadAp::find()//FdDetallesCaptacion::find()
                            ->where(['id_respuesta' => $vectordata['id_respuesta'], 'id_pregunta' => $vectordata['id_pregunta'], 'id_conjunto_respuesta' => $this->id_conj_rpta,'id_junta'=>$idjunta])
                            ->asArray()->all();           
             

            foreach ($_searchinv as $_tipo36cl) {
                
                $_data_forma_conduc = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo36cl['id_forma_conduccion_g']])->one();//ok
                $conduccion_gravedad="";
                if(!empty($_data_forma_conduc)) $conduccion_gravedad=$_data_forma_conduc->nom_opcion_select;
                
                $_data_material_tuberia = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo36cl['id_material_conduccion_g']])->one();//ok
                $material_gravedad="";
                if(!empty($_data_material_tuberia)) $material_gravedad=$_data_material_tuberia->nom_opcion_select;
                
                $_data_frec_mant_g = FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo36cl['id_frec_mantenimiento_g']])->one();//ok
                $mantenimiento_gravedad="";
                if(!empty($_data_frec_mant_g)) $mantenimiento_gravedad=$_data_frec_mant_g->nom_opcion_select;
                
                $_data_estado_conduc= FdOpcionSelect::find()->where(['id_opcion_select' => $_tipo36cl['id_estado_conduccion_g']])->one();//ok
                $estado_gravedad="";
                if(!empty($_data_estado_conduc)) $estado_gravedad=$_data_estado_conduc->nom_opcion_select;
                
                //$this->htmlvista .= "<td class='inputpregunta' colspan='".$_ancho_1."'>".$_personal_capacitado['nom_opcion_select'].'</td>';
                $this->htmlvista .= "<tr><td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo36cl['nombre_conduccion_g'].'</td>';//ok                
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$conduccion_gravedad.'</td>';//ok
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$material_gravedad.'</td>';//ok                
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$mantenimiento_gravedad.'</td>';//ok               
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$estado_gravedad.'</td>';//ok                                                                             
                $this->htmlvista .= "<td class='inputpregunta'  colspan='".$_ancho_2."'>".$_tipo36cl['problemas_identificados'].'</td></tr>';//
                ++$_ct;
            }
        }

        if ($_ct == 0) {
            $this->htmlvista .= "<tr><td colspan='".$_anchoinicial."' class='inputpregunta'>No hay Respuesta.</td></tr>";
        }

        $this->htmlvista .= "</table><table width='100%' class='tbespeciales'>";
    }   
    
    
    
    
    
    
    /*=========================================FUNCIONES PQRS===============================================================*/
    public function gen_htmlPqrsCuerpoExcel($pqrs, $responsable, $actividad_quipux)
    {
        $_string = ' <tr>
							<td class="datosbasicos2">'.$pqrs->idCproceso['numero'].'</td>
							<td class="datosbasicos2">'.$pqrs->fecha_recepcion.'</td>
							<td class="datosbasicos2">'.$pqrs->idCproceso['num_quipux'].' </td>
					'   ;         
		if(!empty( $responsable) ){
			$_string  .= '     <td class="datosbasicos2">'.$responsable->idTresponsabilidad['nom_responsabilidad'].'</td>
							   <td class="datosbasicos2">'.$responsable->idUsuario['nombres'].'</td>';
		}else{
			$_string  .= '     <td class="datosbasicos2"></td>
							   <td class="datosbasicos2"></td>';
		}
		 
		$_string  .= '      <td class="datosbasicos2">'.$pqrs->usuario['nombres'].'</td>
							<td class="datosbasicos2"> '.$pqrs->idCproceso['fecha_registro_quipux'].' </td>';
		 
		if(!empty( $actividad_quipux) ){
			$_string  .= '      <td class="datosbasicos2">'.$actividad_quipux['accion_realizada'].'</td>                       
								<td class="datosbasicos2">'.$actividad_quipux['usuario_destino_quipux'].'</td>';
		}
		else{
			 $_string  .= '     <td class="datosbasicos2"></td>                       
								<td class="datosbasicos2"></td>';
		}
		 
		$_string  .= '      <td class="datosbasicos2">'.$pqrs->idCproceso['asunto_quipux'].'</td>
							<td class="datosbasicos2"> '.$pqrs->idCproceso['ult_fecha_actividad'].' </td>
							<td class="datosbasicos2">'.$pqrs->estado['nom_eproceso'].'</td>
								
							<td class="datosbasicos2">'.$pqrs->actividad['nom_actividad'].'</td>
							<td class="datosbasicos2">'.$pqrs->idCproceso['ult_fecha_estado'].'</td>

						</tr>';
        return utf8_decode($_string);//$_string;
    }
    public function gen_htmlPqrsEncabezadoExcel(){
         $_string = '<table class="excelpqrs"> <tr>
                            <td class="pqrstitulo"> N&uacute;mero documento</td>
                            <td class="pqrstitulo">Fecha de Oficio</td>
                            <td class="pqrstitulo"> N&uacute;mero de oficio </td>
                            <td class="pqrstitulo">&Aacute;rea Responsable</td>

                            <td class="pqrstitulo"> Reasignado por</td>
                            <td class="pqrstitulo">Funcionario responsable</td>
                            <td class="pqrstitulo"> Fecha Actualizaci&oacute;n QUIPUX </td>
                            <td class="pqrstitulo">&Uacute;ltimo comentario QUIPUX</td>

                            <td class="pqrstitulo">Firmado por </td>
                            <td class="pqrstitulo">Asunto</td>
                            <td class="pqrstitulo"> Fecha de Reasignaci&oacute;n </td>
                            <td class="pqrstitulo">Estado del Tramite</td>

                            <td class="pqrstitulo">Actividad</td>
                            <td class="pqrstitulo">Fecha &Uacute;ltima Actividad</td>

                        </tr>';

         return $_string;
    }

    public function gen_htmlPqrsPieExcel()
    {
        $_string = '</table>';

        return $_string;
    }

    public function gen_htmlPqrsDenunciaPdf($pqrs)
    {
        $_string = ' <table class="pdfpqrs"> 
                    <tr>
                        <td class="titulopqr" colspan="7">FORMATO DE DENUNCIAS</td>
                    </tr>
                    <tr>
                        <td class="legalpqr" colspan="7">Comunicaci&oacute;n de car&aacute;cter legal y debidamente motivada a trav&eacute;s de la cual se pone en conocimiento de
                            la autoridad administrativa de la presunta ocurrencia de hechos u omisiones que amenazan el uso adecuado, eficiente, eficaz
                            o el incumplimiento de los requisitos y disposiciones legales.</td>
                    </tr>
                    <tr>
                        <td class="datospdf1" colspan="2">Fecha de recepci&oacute;n</td>
                        <td class="datospdf2" colspan="2">'.$pqrs->fecha_recepcion.'</td>
                        <td class="datospdf1" colspan="2">No Consecutivo <span class="legalpqrspan">(Automatico por sistema no visible para el usuario)</span></td>
                        <td class="datospdf3">'.$pqrs->num_consecutivo.'</td>
                    </tr>
                    
                    <tr>
                        <td class="titulopqr" colspan="7">INDENTIFICACI&Oacute;N DEL USUARIO</td>
                    </tr>
                    <tr>
                        <td class="datospdf1" colspan="2">Nombres y Apellidos Completos </td>
                        <td class="datospdf4" colspan="5">'.$pqrs->sol_nombres.'</td>
                    </tr>
                    <tr>
                        <td class="datospdf1" colspan="2">Documento de identificaci&oacute;n </td>
                        <td class="datospdf4" colspan="5">'.$pqrs->sol_doc_identificacion.'</td>
                    </tr>
                    <tr>
                        <td class="datospdf1" colspan="2">Direcci&oacute;n </td>
                        <td class="datospdf4" colspan="5">'.$pqrs->sol_direccion.'</td>
                    </tr>
                    <tr>
                        <td class="datospdf1" colspan="2">Provincia</td>
                        <td class="datospdf5">'.$pqrs->solCodProvincia0['nombre_provincia'].'</td>
                        <td class="datospdf6">Cant&oacute;n</td>
                        <td class="datospdf7" colspan="3">'.$pqrs->solCodProvincia['nombre_canton'].'</td>
                    </tr>
                    <tr>
                        <td class="datospdf1" colspan="2">Correo Electr&oacute;nico</td>
                        <td class="datospdf5">'.$pqrs->sol_email.'</td>
                        <td class="datospdf6">Tel&eacute;fono</td>
                        <td class="datospdf7" colspan="3">'.$pqrs->sol_telefono.'</td>
                    </tr>
                    <tr>
                        <td class="titulopqr" colspan="7">**Si usted escribe en representaci&oacute;n de una empresa o una organizaci&oacute;n por favor incluya</td>
                    </tr>
                     <tr>
                        <td class="datospdf8">Nombre </td>
                        <td class="datospdf9" colspan="6">'.$pqrs->en_nom_nombres.'</td>
                    </tr>
                    
                    <tr>
                        <td class="datospdf8">RUC </td>
                        <td class="datospdf9" colspan="6">'.$pqrs->en_nom_ruc.'</td>
                    </tr>
                    <tr>
                        <td class="datospdf8">Direcci&oacute;n </td>
                        <td class="datospdf9" colspan="6">'.$pqrs->en_nom_direccion.'</td>
                    </tr>
                    <tr>
                        <td class="datospdf10">Provincia</td>
                        <td class="datospdf11"  colspan="2">'.$pqrs->enNomCodProvincia0['nombre_provincia'].'</td>
                        <td class="datospdf6">Cant&oacute;n</td>
                        <td class="datospdf7"  colspan="3">'.$pqrs->enNomCodProvincia['nombre_canton'].'</td>
                    </tr>
                    <tr>
                        <td class="datospdf10">Correo Electr&oacute;nico</td>
                        <td class="datospdf11" colspan="2">'.$pqrs->en_nom_email.'</td>
                        <td class="datospdf6">Tel&eacute;fono</td>
                        <td class="datospdf7" colspan="3">'.$pqrs->en_nom_telefono.'</td>
                    </tr>
                    <tr>
                        <td class="titulopqr" colspan="7">DESCRIPCI&Oacute;N DE LA DENUNCIA</td>
                    </tr>
                    <tr>
                        <td class="titulopqr" colspan="7">Datos del Denunciado</td>
                    </tr>
                    <tr>
                        <td class="datospdf8">Nombre del denunciado </td>
                        <td class="datospdf9" colspan="6">'.$pqrs->denunc_nombre.'</td>
                    </tr>
                    
                    <tr>
                        <td class="datospdf10">Direcci&oacute;n</td>
                        <td class="datospdf11" colspan="2">'.$pqrs->denunc_direccion.'</td>
                        <td class="datospdf6">Tel&eacute;fono</td>
                        <td class="datospdf7" colspan="3">'.$pqrs->denunc_telefono.'</td>
                    </tr>
                    <tr>
                        <td class="datospdf1" colspan="2">Lugar donde ocurri&oacute; el hecho</td>
                        <td class="datospdf5">'.$pqrs->lugar_hechos.'</td>
                        <td class="datospdf6">Fecha</td>
                        <td class="datospdf7" colspan="3">'.$pqrs->fecha_hechos.'</td>
                    </tr>
                    
                    <tr>
                        <td class="datospdf1" colspan="1">Narraci&oacute;n de los hechos <span class="legalpqrspan">(La narraci&oacute;n debe ser concreta , describiendo la forma en que sucedieron los hechos, especificando el orden en que acontecieron)</span>  </td>
                        <td class="datospdf4" colspan="6">'.$pqrs->naracion_hechos.'</td>
                    </tr>
                    <tr>
                        <td class="datospdf1" colspan="1">Elementos de prueba <span class="legalpqrspan"> En caso que tenga algÃºn elemento que pueda servir como prueba, favor adjuntarlo y describirlo (documentos, fotografias, etc))</span> </td>
                        <td class="datospdf4" colspan="6">'.$pqrs->elementos_probatorios.'</td>
                    </tr>
                    
                </table>
                       ';

        return $_string;
    }

    public function gen_htmlPqrsQuejaPdf($pqrs)
    {
        $_string = ' <table class="pdfpqrs"> 
                    <tr>
                            <td class="titulopqr" colspan="9">FORMATO DE QUEJA / RECLAMO / CONTROVERSIA</td>
                    </tr>
                    <tr>
                            <td class="titulopqr" colspan="9">Seleccionar la casilla correspondiente a la diligencia que ud desea realizar</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Queja</td>
                        <td class="pdf" colspan="1">'.($pqrs->subtipo_queja ? 'X' : '').'</td>
                        <td class="pdft" colspan="2">Reclamo</td>
                        <td class="pdf" colspan="1">'.($pqrs->subtipo_reclamo ? 'X' : '').'</td>
                        <td class="pdft" colspan="2">Controversia</span></td>
                        <td class="pdf" colspan="1">'.($pqrs->subtipo_controversia ? 'X' : '').'</td>
                    </tr>
                    <tr>
                        <td  colspan="3" class="pdf33t" > 
                                <span class="legalpqrspan">Manifestaci&oacute;n de protesta, censura, descontento o inconformidad debidamente motivada, 
                                que formula una persona con realci&oacute;n a la conducta irregular realizada por un servidor pÃºblico de la ARCA en el 
                                desarrollo de sus funciones</span>  
                        </td>
                        <td  colspan="3" class="pdf33t"> 
                                <span class="legalpqrspan">Manifestaci&oacute;n debidamente motivada, referente a la prestaci&oacute;n indebida de los servicios 
                                de la ARCA o la falta de atenci&oacute;n oportuna de una solicitud presentada ante la ARCA. </span> 
                        </td>
                        <td  colspan="3" class="pdf33t"> 
                                <span class="legalpqrspan">Discuci&oacute;n de opiniones contrapuestas entre dos o m&aacute;s personas</span>  
                        </td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Fecha de recepci&oacute;n</td>
                        <td class="pdf" colspan="3">'.$pqrs->fecha_recepcion.'</td>
                        <td class="pdft" colspan="2">No Consecutivo <span class="legalpqrspan">(Automatico por sistema no visible para el usuario)</span></td>
                        <td class="pdf">'.$pqrs->num_consecutivo.'</td>
                    </tr>
                    <tr>
                        <td class="titulopqr" colspan="9">INDENTIFICACI&Oacute;N DEL USUARIO</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Nombres y Apellidos Completos </td>
                        <td class="pdf" colspan="6">'.$pqrs->sol_nombres.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Documento de identificaci&oacute;n </td>
                        <td class="pdf" colspan="6">'.$pqrs->sol_doc_identificacion.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Direcci&oacute;n </td>
                        <td class="pdf" colspan="6">'.$pqrs->sol_direccion.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Provincia</td>
                        <td class="pdf" colspan="2">'.$pqrs->solCodProvincia0['nombre_provincia'].'</td>
                        <td class="pdft" colspan="2">Cant&oacute;n</td>
                        <td class="pdf" colspan="3">'.$pqrs->solCodProvincia['nombre_canton'].'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Correo Electr&oacute;nico</td>
                        <td class="pdf" colspan="2">'.$pqrs->sol_email.'</td>
                        <td class="pdft" colspan="2">Tel&eacute;fono</td>
                        <td class="pdf" colspan="3">'.$pqrs->sol_telefono.'</td>
                    </tr>
                    <tr>
                        <td class="titulopqr" colspan="9">**Si usted escribe en representaci&oacute;n de una empresa o una organizaci&oacute;n por favor incluya</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Nombre </td>
                        <td class="pdf" colspan="7">'.$pqrs->en_nom_nombres.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">RUC </td>
                        <td class="pdf" colspan="7">'.$pqrs->en_nom_ruc.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Direcci&oacute;n </td>
                        <td class="pdf" colspan="7">'.$pqrs->en_nom_direccion.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Provincia</td>
                        <td class="pdf"  colspan="2">'.$pqrs->enNomCodProvincia0['nombre_provincia'].'</td>
                        <td class="pdft" colspan="2">Cant&oacute;n</td>
                        <td class="pdf"  colspan="3">'.$pqrs->enNomCodProvincia['nombre_canton'].'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Correo Electr&oacute;nico</td>
                        <td class="pdf" colspan="2">'.$pqrs->en_nom_email.'</td>
                        <td class="pdft" colspan="2">Tel&eacute;fono</td>
                        <td class="pdf" colspan="3">'.$pqrs->en_nom_telefono.'</td>
                    </tr>
                    <tr>
                        <td class="titulopqr" colspan="9">DESCRIPCI&Oacute;N QUEJA / RECLAMO / CONTROVERSIA</td>
                    </tr>

                    <tr>
                        <td class="pdft" colspan="3">Queja / <br> Proceso, servicio o producto objeto del reclamo / <br> Ente o persona con el que surgio la controversia</td>
                        <td class="pdf" colspan="6">'.$pqrs->por_quien_qrc.'</td>
                    </tr>
                    
                    <tr>
                        <td class="pdft" colspan="2">Lugar donde ocurri&oacute; el hecho</td>
                        <td class="pdf" colspan="2">'.$pqrs->lugar_hechos.'</td>
                        <td class="pdft" colspan="2">Fecha</td>
                        <td class="pdf" colspan="3">'.$pqrs->fecha_hechos.'</td>
                    </tr>
                    
                    <tr>
                        <td class="pdft" colspan="3">Narraci&oacute;n de los hechos <span class="legalpqrspan">(La narraci&oacute;n debe ser concreta , describiendo la forma en que sucedieron los hechos, especificando el orden en que acontecieron)</span>  </td>
                        <td class="pdf" colspan="6">'.$pqrs->naracion_hechos.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Elementos de prueba <span class="legalpqrspan"> En caso que tenga algÃºn elemento que pueda servir como prueba, favor adjuntarlo y describirlo (documentos, fotografias, etc))</span> </td>
                        <td class="pdf" colspan="6">'.$pqrs->elementos_probatorios.'</td>
                    </tr>
   
                </table>
                       ';

        return $_string;
    }

    public function gen_htmlPqrsPeticionPdf($pqrs)
    {
        $_string = ' <table class="pdfpqrs"> 
                    <tr>
                            <td class="titulopqr" colspan="9">FORMATO DE PETICIONES</td>
                    </tr>
                    <tr>
                            <td class="pdf" colspan="9"><span class="legalpqrspan">Derecho que tiene toda persona para solicitar, para elevar solicitudes respetuosas de informacion y/o consulta sobre los servicios que presta la ARCA, para la satisfacciï¿½n de sus necesidades, la peticiï¿½n debe estar debidamente motivada</span></td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Fecha de recepci&oacute;n</td>
                        <td class="pdf" colspan="3">'.$pqrs->fecha_recepcion.'</td>
                        <td class="pdft" colspan="2">No Consecutivo <span class="legalpqrspan">(Automatico por sistema no visible para el usuario)</span></td>
                        <td class="pdf">'.$pqrs->num_consecutivo.'</td>
                    </tr>

                    <tr>
                        <td class="titulopqr" colspan="9">INDENTIFICACI&Oacute;N DEL USUARIO</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Nombres y Apellidos Completos </td>
                        <td class="pdf" colspan="6">'.$pqrs->sol_nombres.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Documento de identificaci&oacute;n </td>
                        <td class="pdf" colspan="6">'.$pqrs->sol_doc_identificacion.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Direcci&oacute;n </td>
                        <td class="pdf" colspan="6">'.$pqrs->sol_direccion.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Provincia</td>
                        <td class="pdf" colspan="2">'.$pqrs->solCodProvincia0['nombre_provincia'].'</td>
                        <td class="pdft" colspan="2">Cant&oacute;n</td>
                        <td class="pdf" colspan="3">'.$pqrs->solCodProvincia['nombre_canton'].'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Correo Electr&oacute;nico</td>
                        <td class="pdf" colspan="2">'.$pqrs->sol_email.'</td>
                        <td class="pdft" colspan="2">Tel&eacute;fono</td>
                        <td class="pdf" colspan="3">'.$pqrs->sol_telefono.'</td>
                    </tr>
                    <tr>
                        <td class="titulopqr" colspan="9">**Si usted escribe en representaci&oacute;n de una empresa o una organizaci&oacute;n por favor incluya</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Nombre </td>
                        <td class="pdf" colspan="7">'.$pqrs->en_nom_nombres.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">RUC </td>
                        <td class="pdf" colspan="7">'.$pqrs->en_nom_ruc.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Direcci&oacute;n </td>
                        <td class="pdf" colspan="7">'.$pqrs->en_nom_direccion.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Provincia</td>
                        <td class="pdf"  colspan="2">'.$pqrs->enNomCodProvincia0['nombre_provincia'].'</td>
                        <td class="pdft" colspan="2">Cant&oacute;n</td>
                        <td class="pdf"  colspan="3">'.$pqrs->enNomCodProvincia['nombre_canton'].'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Correo Electr&oacute;nico</td>
                        <td class="pdf" colspan="2">'.$pqrs->en_nom_email.'</td>
                        <td class="pdft" colspan="2">Tel&eacute;fono</td>
                        <td class="pdf" colspan="3">'.$pqrs->en_nom_telefono.'</td>
                    </tr>
                    <tr>
                        <td class="titulopqr" colspan="9">DESCRIPCI&Oacute;N DE LA PETICI&Oacute;N</td>
                    </tr>

                    <tr>
                        <td class="pdft" colspan="3">Proceso, servicio, producto a que se dirige la petici&oacute;n</td>
                        <td class="pdf" colspan="6">'.$pqrs->aquien_dirige.'</td>
                    </tr>
                    
                    <tr>
                        <td class="pdft" colspan="3">Objeto de la petici&oacute;n <span class="legalpqrspan">(Qu&eacute; es lo que desea alcanzar por medio de la petici&oacute;n)</span></td>
                        <td class="pdf" colspan="6">'.$pqrs->objeto_peticion.'</td>

                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Descripci&oacute;n de la petici&oacute;n <span class="legalpqrspan">(Explique claramente lo que requiere, este debe ser alcanzable y estar en competencia de la ARCA)</span>  </td>
                        <td class="pdf" colspan="6">'.$pqrs->descripcion_peticion.'</td>
                    </tr>
                    
                </table>
                       ';

        return $_string;
    }

    public function gen_htmlPqrsSugerenciaPdf($pqrs)
    {
        $_string = ' <table class="pdfpqrs"> 
                    <tr>
                            <td class="titulopqr" colspan="9">FORMATO DE SUGERENCIAS Y FELICITACIONES</td>
                    </tr>
                   <tr>
                            <td class="titulopqr" colspan="9">Seleccionar la casilla correspondiente a la diligencia que ud desea realizar</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="4">Sugerencia</td>
                        <td class="pdf" colspan="1">'.($pqrs->subtipo_sugerencia ? 'X' : '').'</td>
                        <td class="pdft" colspan="3">Felicitacion</td>
                        <td class="pdf" colspan="1">'.($pqrs->subtipo_felicitacion ? 'X' : '').'</td>

                    </tr>
                    <tr>
                        <td  colspan="5" class="pdf" > 
                                <span class="legalpqrspan">Propuesta que se presenta para incidir o mejorar un proceso cuyo objeto est&aacute; relacionado con la prestaci&oacute;n de un servicio o el cumplimiento de una funci&oacute;n pÃºblica.</span>  
                        </td>
                        <td  colspan="4" class="pdf"> 
                                <span class="legalpqrspan">Expresi&oacute;n de la alegria y satisfacci&oacute;n que se siente por la atenci&oacute;n de los servidores de la ARCA y/o provisi&oacute;n de un servicio de la ARCA</span> 
                        </td>
                       
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Fecha de recepci&oacute;n</td>
                        <td class="pdf" colspan="2">'.$pqrs->fecha_recepcion.'</td>
                        <td class="pdft" colspan="3">No Consecutivo <span class="legalpqrspan">(Automatico por sistema no visible para el usuario)</span></td>
                        <td class="pdf">'.$pqrs->num_consecutivo.'</td>
                    </tr>

                    <tr>
                        <td class="titulopqr" colspan="9">INDENTIFICACI&Oacute;N DEL USUARIO</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Nombres y Apellidos Completos </td>
                        <td class="pdf" colspan="6">'.$pqrs->sol_nombres.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Documento de identificaci&oacute;n </td>
                        <td class="pdf" colspan="6">'.$pqrs->sol_doc_identificacion.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Direcci&oacute;n </td>
                        <td class="pdf" colspan="6">'.$pqrs->sol_direccion.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Provincia</td>
                        <td class="pdf" colspan="2">'.$pqrs->solCodProvincia0['nombre_provincia'].'</td>
                        <td class="pdft" colspan="2">Cant&oacute;n</td>
                        <td class="pdf" colspan="3">'.$pqrs->solCodProvincia['nombre_canton'].'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Correo Electr&oacute;nico</td>
                        <td class="pdf" colspan="2">'.$pqrs->sol_email.'</td>
                        <td class="pdft" colspan="2">Tel&eacute;fono</td>
                        <td class="pdf" colspan="3">'.$pqrs->sol_telefono.'</td>
                    </tr>
                    <tr>
                        <td class="titulopqr" colspan="9">**Si usted escribe en representaci&oacute;n de una empresa o una organizaci&oacute;n por favor incluya</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Nombre </td>
                        <td class="pdf" colspan="7">'.$pqrs->en_nom_nombres.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">RUC </td>
                        <td class="pdf" colspan="7">'.$pqrs->en_nom_ruc.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Direcci&oacute;n </td>
                        <td class="pdf" colspan="7">'.$pqrs->en_nom_direccion.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Provincia</td>
                        <td class="pdf"  colspan="2">'.$pqrs->enNomCodProvincia0['nombre_provincia'].'</td>
                        <td class="pdft" colspan="2">Cant&oacute;n</td>
                        <td class="pdf"  colspan="3">'.$pqrs->enNomCodProvincia['nombre_canton'].'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="2">Correo Electr&oacute;nico</td>
                        <td class="pdf" colspan="2">'.$pqrs->en_nom_email.'</td>
                        <td class="pdft" colspan="2">Tel&eacute;fono</td>
                        <td class="pdf" colspan="3">'.$pqrs->en_nom_telefono.'</td>
                    </tr>
                    <tr>
                        <td class="titulopqr" colspan="9">DESCRIPCI&Oacute;N DE LA PETICI&Oacute;N</td>
                    </tr>

                    <tr>
                        <td class="pdft" colspan="3">Proceso, servicio, producto a que se dirige la comunicaci&oacute;n</td>
                        <td class="pdf" colspan="6">'.$pqrs->aquien_dirige.'</td>
                    </tr>
                    <tr>
                        <td class="pdft" colspan="3">Descripci&oacute;n de la sugerencia o la felicitaci&oacute;n </td>
                        <td class="pdf" colspan="6">'.$pqrs->descripcion_sugerencia.'</td>
                    </tr>
                    
                </table>
                       ';

        return $_string;
    }

    /*===========================================FUNCIONES DE FORMATO====================================================================*/
    protected function romanic_number($integer)
    {
        $table = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $return = '';
        while ($integer > 0) {
            foreach ($table as $rom => $arb) {
                if ($integer >= $arb) {
                    $integer -= $arb;
                    $return .= $rom;
                    break;
                }
            }
        }

        return $return;
    }

    /*Reemplaza para construir el formato de fecha valido para PHP
    * dd -> d => entrega el dia en formato de dos digitos
    * MM -> m => entrega el mes en formato de dos digitos
    * YYYY -> Y => entrega el aÃ±o en formato de 4 digitos
    */
    protected function formatear($tipoformato)
    {
        $tipoformato = str_replace('dd', 'd', $tipoformato);
        $tipoformato = str_replace('MM', 'm', $tipoformato);
        $tipoformato = str_replace('yyyy', 'Y', $tipoformato);

        return $tipoformato;
    }

    /*Funcion que entrega e nombre de una parroqui*/
    protected function nom_parroquia($cod_parroquia, $cod_canton, $cod_provincia)
    {
        $_data = Parroquias::find()->where(['cod_parroquia' => $cod_parroquia, 'cod_canton' => $cod_canton, 'cod_provincia' => $cod_provincia])->one();

        if (empty($_data)) {
            return '';
        } else {
            return $_data->nombre_parroquia;
        }
    }

    /*Funcion que entrega e nombre de un canton*/
    protected function nom_canton($cod_canton, $cod_provincia = null)
    {
        $_data = Cantones::find()->where(['cod_canton' => $cod_canton, 'cod_provincia' => $cod_provincia])->one();

        if (empty($_data)) {
            return '';
        } else {
            return $_data->nombre_canton;
        }
    }

    /*Funcion que entrega el nombre de una provincia*/
    protected function nom_provincia($cod_provincia)
    {
        if (is_null($cod_provincia) or empty($cod_provincia)) {
            return '';
        } else {
            $_data = Provincias::find()->where(['cod_provincia' => $cod_provincia])->one();

            return $_data->nombre_provincia;
        }
    }

    /*Funcion par anombre demarcaciones*/
    protected function demarcaciones($id_demarcacion)
    {
        $_data = \common\models\autenticacion\Demarcaciones::find()->where(['id_demarcacion' => $id_demarcacion])->one();

        if (empty($_data)) {
            return '';
        } else {
            return $_data->nombre_demarcacion;
        }
    }

    /*Funcion par anombre demarcaciones*/
    protected function centrociudadano($id_centro)
    {
        $_data = \common\models\poc\CentroAtencionCiudadano::find()->where(['cod_centro_atencion_ciudadano' => $id_centro])->one();

        if (empty($_data)) {
            return '';
        } else {
            return $_data->nom_centro_atencion_ciudadano;
        }
    }

    /*Funcion par anombre de tipo de coordenada*/
    protected function tipocoordenada($id_tcoordenada)
    {
        $_data = \common\models\poc\TrTipoCoordenada::find()->where(['id_tcoordenada' => $id_tcoordenada])->one();

        if (empty($_data)) {
            return '';
        } else {
            return $_data->nom_tcoordenada;
        }
    }

    /*Funcion para traer la respuesta a un tipo de pregunta Multiple*/
    protected function getResponse($tipo, $id_pregunta, $id_capitulo, $id_formato, $id_version, $id_conjunto_pregunta, $id_conjunto_respuesta)
    {
        $_stringreturn = '';

        if ($tipo == 1) {
            $_campo = 'ra_fecha';
        } elseif ($tipo == 15) {
            $_campo = 'ra_descripcion';
        } elseif ($tipo == 8) {
            $_campo = 'ra_moneda';
        } elseif ($tipo == 7) {
            $_campo = 'ra_porcentaje';
        } elseif ($tipo == 6) {
            $_campo = 'ra_decimal';
        } elseif ($tipo == 5) {
            $_campo = 'ra_entero';
        } elseif ($tipo == '3') {
            $_campo = 'id_opcion_select';
        }

        $_data = \common\models\poc\FdRespuesta::find()
               ->where(['id_capitulo' => $id_capitulo,
                        'id_formato' => $id_formato,
                        'id_version' => $id_version,
                        'id_conjunto_pregunta' => $id_conjunto_pregunta,
                        'id_conjunto_respuesta' => $id_conjunto_respuesta,
                        'id_pregunta' => $id_pregunta, ])->all();

        foreach ($_data as $_clave) {
            if ($tipo == '3') {
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select' => $_clave->{$_campo}])
                        ->one();

				if(empty($_nombrevalor->nom_opcion_select) or is_null($_nombrevalor->nom_opcion_select)){
					$_datarespuesta = '';
				}else{
                $_datarespuesta = $_nombrevalor->nom_opcion_select;
				}		
                
            } else {
                $_datarespuesta = $_clave->{$_campo};
            }

            $_stringreturn .= "<div id='".$_clave->id_respuesta."' style='display:block'>".$_datarespuesta;
            $_stringreturn .= '<button type="button" onclick="deleteRpta('.$_clave->id_respuesta.')">-</button></div>';
        }

        return $_stringreturn;
    }
    
    /*
     * Agregada Dian b: 2019-02-25
     */
    protected function getTipoPregunta($id_pregunta){
        $datospregunta = \common\models\poc\FdPregunta::findOne($id_pregunta);
       
        if($datospregunta->id_tpregunta == '1'){
            $value=null;
        }else if($datospregunta->id_tpregunta == '2'){
            $value="NA";
        }else {
            $value="";
        }
        
        return $value;
    }
    protected function Validar_respuesta($valores_el)
    {
        $separa = explode(",", $valores_el);
        
        $contar=array();
 
	foreach($separa as $value)
	{
		if(isset($contar[$value]))
		{
			// si ya existe, le añadimos uno
			$contar[$value]+=1;
		}else{
			// si no existe lo añadimos al array
			$contar[$value]=1;
		}
	}
	return $contar;
        
    }
}
