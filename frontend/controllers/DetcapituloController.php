<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;               //Para presentar la barra de espera
use yii\helpers\Url;                //Para presentar la barra de espera
use DateTime;
use frontend\helpers\savecapitulo;
use frontend\helpers\helperHTML;
use common\helpers\general\command\pregunta\EjecutorComando;
use common\models\poc\FdPreguntaSearch;
use common\models\poc\FdCapitulo;
use common\models\poc\FdCapituloSearch;
use common\models\poc\FdSeccionSearch;
use common\models\poc\FdAdmEstadoSearch;
use common\models\poc\FdConjuntoRespuesta;
use common\models\poc\FdElementoCondicion;
use common\models\poc\FdFormato;
use common\models\Detcapitulo;
use common\models\poc\TrComando;
use common\models\poc\FdDatosGenerales;
use common\models\poc\FdDatosGeneralesSearch;
use common\models\poc\FdDatosGeneralesRiego;
use common\models\poc\FdDatosGeneralesPublicos;
use common\models\poc\FdPregunta;
use common\models\poc\FdRespuesta;
use common\models\poc\FdDatosGenerales_var;
use common\models\poc\FdCoordenada_var;
use common\models\poc\FdUbicacion_var;
use common\models\autenticacion\Cantones;
use common\models\autenticacion\Demarcaciones;
use common\models\poc\FdOpcionSelect;
use common\models\autenticacion\Parroquias;
use common\models\poc\FdDatosGeneralesComunitarioAp;
use common\models\poc\FdUbicacion_var_ap;


use yii\web\UploadedFile;



/***Modelo a utilizar*
 * Yii::trace('Accediendo en POST'.$vista->_varpass, 'DEBUG');*
 * Para ver versiones anteriores a la fecha 2017-09-16 */


/**
 * Controlador que gestionara la informaciòn para la creacion de la vista y modelos de detalle capitulo
 */
class DetcapituloController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
	
    
    /**En esta funcion se gestionarà el proceso de la informacion
    * Si se reciben datos via POST entonces empezara el proceso de guardar, modificas las respuestas a la preguntas.
    * Si no se reciben datos osea solo se tiene abierto se redirigirá a la funcion gestion_informacion
     * @id_capitulo => id del capitulo a visualizar
     * @id_conj_rpta => id del conjunto de respuesta
     * @id_conj_prta => id del conjunto de pregunta
     * @id_fmt => id del formato
     * @last => ultima version
     * @estado => id_adm_estado
     * @$_lastvista => vista de donde viene
    */    
    public function actionIndex($id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,$id_capitulo,$_lastvista,$idjunta="")
    {
        
        if(!empty(Yii::$app->request->post())){
            
        }else{          
            return $this->redirect(['genvistaformato','capitulo'=>$id_capitulo,'id_conj_prta'=>$id_conj_prta,'id_conj_rpta'=>$id_conj_rpta,'id_fmt'=>$id_fmt,'last'=>$last,'antvista'=>$_lastvista,'estado'=>$estado,'provincia'=>'','cantones'=>'','parroquias'=>'','periodos'=>'','focus'=>'','idjunta'=>$idjunta]);
        }
        
    }
    
    
    
    /*GENERAR VISTA FORMATO ===========================================================
     * @antvista => en la direccion de la vista por medio de la cual se accedio al detalle capitulo
     */
    public function actionGenvistaformato($capitulo,$id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus=0,$idjunta=""){
        
        $r_secciones=array();
        $r_pseccion=array();
        
       
         /* -3) Consultando permisos del usuario al acceder*/
        if(empty(Yii::$app->user->identity->usuario)){
            
             return $this->redirect(['site/index']);
        
        }else{
           
            $m_permisos = new FdAdmEstadoSearch();
            $_login = Yii::$app->user->identity->usuario;
            $_permisos = $m_permisos->buscar($id_fmt,$id_conj_rpta,$_login); 
           
        }
        
        /* -2) Creando la Miga de Pan
         * Tipo 1 miga de pan para aplicativonew
         * Tipo 2 miga de pan para dashboard         */
        $_migadepan['url'] = $antvista;

        if($antvista=='gestorformatos/index' or $antvista=='juntasgad/index'){
            $_migadepan['id_cnj_rpta'] = $id_conj_rpta;
            $_migadepan['id_conj_prta'] = $id_conj_prta;
            $_migadepan['id_fmt'] = $id_fmt;
            $_migadepan['id_capitulo'] = $capitulo;
            $_migadepan['id_version'] = $last;
            $_migadepan['estado'] = $estado;
            $_migadepan['provincia'] = $provincia;
            $_migadepan['cantones'] = $cantones;
            $_migadepan['parroquias'] = $parroquias;
            $_migadepan['periodos'] = $periodos;
            $_migadepan['idjunta'] = $idjunta;
         }else if($antvista=='dashboard/index'){
            $_migadepan['id_conj_rpta'] = $id_conj_rpta;
            $_migadepan['id_conj_prta'] = $id_conj_prta;
            $_migadepan['id_fmt'] = $id_fmt;
            $_migadepan['id_capitulo'] = $capitulo;
            $_migadepan['id_version'] = $last;
            $_migadepan['estado'] = $estado;
            $_migadepan['provincia'] = $provincia;
            $_migadepan['cantones'] = $cantones;
            $_migadepan['parroquias'] = $parroquias;
            $_migadepan['periodos'] = $periodos;
            $_migadepan['idjunta'] = $idjunta;
        }else if($antvista=='listcapitulos/index'){
            $_migadepan['id_conj_rpta'] = $id_conj_rpta;
            $_migadepan['id_conj_prta'] = $id_conj_prta;
            $_migadepan['id_fmt'] = $id_fmt;
            $_migadepan['id_capitulo'] = $capitulo;
            $_migadepan['id_version'] = $last;
            $_migadepan['estado'] = $estado;
            $_migadepan['provincia'] = $provincia;
            $_migadepan['cantones'] = $cantones;
            $_migadepan['parroquias'] = $parroquias;
            $_migadepan['periodos'] = $periodos;
            $_migadepan['idjunta'] = $idjunta;
        }

        
        /*-1 Consultando fecha de creacion del conjunto respuesta*/
        $m_conjrespuesta = FdConjuntoRespuesta::findOne($id_conj_rpta);
        $_fechaconjrpta = $m_conjrespuesta->fecha_creacion;
        
        /*0) Consultando si el formato tiene numeración*/
        $m_formato = FdFormato::findOne($id_fmt);
        $_numeracionpreg = $m_formato -> numeracion;
        $_rutaformato = $m_formato->sop_ruta;
		$_nameformato = $m_formato->id_formato."_".$m_formato->nom_formato;
               
        
        /*1)Consultando capitulos ==================================================
         Si $$capitulo no viene vacio es por ue la consulta se hace desde el dashboard
         Si viene vacio hay que consultar los capitulos asociados al formato*/
        if(!empty($capitulo)){
            
              $_capitulos = FdCapitulo::find()->where(['id_capitulo' => $capitulo])->asArray()->all();
       
        }else{
            
              $m_capitulo = new FdCapituloSearch();
              $_capitulos =$m_capitulo->searcCapFormato($id_fmt, $id_conj_prta, $estado,null);
        }
        
        $_arraycap=array();             //Array que lleva los capitulos a presentarle al usuario , solo id's
        $_conteo=0;
        $_positions=array();
        $inc_datos_generales = FALSE;       //Bandera para saber si se incluye el capitulo datos generales...
        $inc_basicos_coorubicacion = FALSE; //Bandera para saber si se incluye el capitulo basicos con ubicacion y coordenadas
        $inc_datos_generales_riego = FALSE;
        $inc_datos_generales_comunitario_ap=FALSE;
        $inc_datos_generales_publicos=FALSE;
        
        /*Recorriendo vector o si es del dashboard consultando datos
         @_arraycap => array con los id's de los capitulos*/
        if($antvista=='gestorformatos/index' or $antvista=='juntasgad/index'){
            
            foreach($_capitulos as $clave){
                
               /*Verificando si existe el capitulo de datos generales
                * La condicion para que este capitulo exista por ahora es con el nombre "INFORMACIÓN  GENERAL DEL SOLICITANTE"
                */
                
                if($clave["id_tcapitulo"] == "2" and  $clave["url"] == "poc/datosbasicos.php"){
                     $_positions[] = $_conteo;
                     $inc_datos_generales = TRUE;
                     continue;
                }
                
                
                if($clave["id_tcapitulo"] == "2" and  $clave["url"] == "poc/basicosubicacioncoordenada.php"){
                     $_positions[] = $_conteo;
                     $inc_basicos_coorubicacion = TRUE;
                     $_capitulobasico= $clave["id_capitulo"];
                     continue;
                }
                
                 if($clave["id_tcapitulo"] == "2" and  $clave["url"] == "poc/datosgeneralesriego.php"){
                     $_positions[] = $_conteo;
                     $inc_datos_generales_riego = TRUE;
                     $_capitulobasico= $clave["id_capitulo"];
                     continue;
                }
                
                if($clave["id_tcapitulo"] == "2" and  $clave["url"] == "poc/datosgeneralescomunitarioap.php"){
                     $_positions[] = $_conteo;
                     $inc_datos_generales_comunitario_ap = TRUE;
                     $_capitulobasico= $clave["id_capitulo"];
                     continue;
                }
                if($clave["id_tcapitulo"] == "2" and  $clave["url"] == "poc/datosgeneralespublicos.php"){
                     $_positions[] = $_conteo;
                     $inc_datos_generales_publicos = TRUE;
                     $_capitulobasico= $clave["id_capitulo"];
                     continue;
                } 
                
                /*Se verifica si el capitulo esta condicionado*/
                if($clave['condiciones'] > 0){
                    $_eliminar = $this->evaluarcondiciones($clave['id_capitulo'],$id_fmt,$id_conj_rpta,$last,$id_conj_prta,$_permisos['cod_rol']);

                    if($_eliminar === FALSE){       //Si no cumple la condicion se guarda la posicion del vector para eliminacion
                        
                        $_positions[] = $_conteo;
                    
                        
                    }else{                          //Si cumple la condicion se procede a consultar secciones  y preguntas
                        
                        $_arraycap[] = $clave['id_capitulo'];
                        $id_capitulo=$clave['id_capitulo'];
                        
                        /*2)Consultando secciones===============================================*/
                        $m_secciones=new FdSeccionSearch();
                        $r_secciones[$id_capitulo] = $m_secciones->buscar($id_capitulo);   

                        /*3)Consultando Preguntas================================================/*/
                        $m_preguntas=new FdPreguntaSearch();
                        $r_pregunta[$id_capitulo]=$m_preguntas->buscar($id_capitulo,$id_conj_prta,$id_conj_rpta);       /*sE MODIFICA 2019-02-27*/
                        
                    }
                }else{
                    
                    $_arraycap[] = $clave['id_capitulo'];
                    $id_capitulo=$clave['id_capitulo'];
                     
                    /*2)Consultando secciones===============================================*/
                    $m_secciones=new FdSeccionSearch();
                    $r_secciones[$id_capitulo] = $m_secciones->buscar($id_capitulo);   

                    /*3)Consultando Preguntas================================================/*/
                    $m_preguntas=new FdPreguntaSearch();
                    $r_pregunta[$id_capitulo]=$m_preguntas->buscar($id_capitulo,$id_conj_prta,$id_conj_rpta,$idjunta);
                     
                     
                }
                $_conteo+=1;
            }
            
            //Eliminando capitulos condicionados==================================================================
            foreach($_positions as $_clpos){
                unset($_capitulos[$_clpos]);
            }
            $_capitulos = array_values($_capitulos);
            
            
        }else{                                            
                /*1) Consultando el nombre del capitulo para saber si pasa por secciones y pregunas o se va directo a 
                 * la tabla FD_DATOS_GENERALES
                 */
                $id_capitulo= $capitulo;
                
                //Yii::trace("aqui entrega capitulo ".$id_capitulo."--".$_capitulos[0]["url"],"DEBUG");
               
                if($_capitulos[0]["id_tcapitulo"] == "2" and $_capitulos[0]["url"] == "poc/datosbasicos.php"){
                     $inc_datos_generales = TRUE;
                     $_capitulos=array();    
                }else if($_capitulos[0]["id_tcapitulo"] == "2" and  $_capitulos[0]["url"] == "poc/basicosubicacioncoordenada.php"){
                     $inc_basicos_coorubicacion = TRUE;
                     $_capitulobasico= $_capitulos[0]["id_capitulo"];
                     $_capitulos=array(); 
                }else if($_capitulos[0]["id_tcapitulo"] == "2" and $_capitulos[0]["url"] == "poc/datosgeneralesriego.php"){//para formulario
                     $inc_datos_generales_riego = TRUE;
                     $_capitulobasico= $_capitulos[0]["id_capitulo"];
                     $_capitulos=array();    
                }else if($_capitulos[0]["id_tcapitulo"] == "2" and $_capitulos[0]["url"] == "poc/datosgeneralescomunitarioap.php"){//para formulario
                     $inc_datos_generales_comunitario_ap = TRUE;
                     $_capitulobasico= $_capitulos[0]["id_capitulo"];
                     $_capitulos=array();    
                }else if($_capitulos[0]["id_tcapitulo"] == "2" and $_capitulos[0]["url"] == "poc/datosgeneralespublicos.php"){//para formulario
                     $inc_datos_generales_publicos = TRUE;
                     $_capitulobasico= $_capitulos[0]["id_capitulo"];
                     $_capitulos=array();    
                }
                else{
                   
                    /*2)Consultando secciones===============================================*/
                    $m_secciones=new FdSeccionSearch();
                    $r_secciones[$id_capitulo] = $m_secciones->buscar($id_capitulo); 

                    /*3)Consultando Preguntas================================================/*/
                    $m_preguntas=new FdPreguntaSearch();

                    $r_pregunta[$id_capitulo]=$m_preguntas->buscar($id_capitulo,$id_conj_prta,$id_conj_rpta,$idjunta);

                    $_arraycap[] = $id_capitulo;
                }    
        
        }

        
        
        /*4) Organizando Preguntas con seccion o sin seccion          ==========================================*/
        $r_pnoseccion=array();
        $r_pseccion=array();
        $_rptamodel=array();
        $_rptapreguntas=array();
        $_contadorrpta=0;
        $_ismultiple=array();
        

        for($a=0;$a<count($_arraycap);$a++){
            
            $_indicecap= $_arraycap[$a];
            
            foreach($r_pregunta[$_indicecap] as $_claverecor){
                
                /*Evaluacion si ini_fecha no es vacia
                * y es mayor o igual a la fecha de creacion del conjunto respuestas se muestra la pregunta
                * sino se da continue para la siguiente pregunta
                * Y tambien se evalua si fin_fecha no es vacia
                * y es menor o igual a la fecha de creacion del conjunto respuestas se muestra la pregunta
                * sino se da continue para la siguiente pregunta.
                */
               if(!empty($_claverecor['ini_fecha']) and $_claverecor['ini_fecha']<$_fechaconjrpta){
                   continue;
               }

               if(!empty($_claverecor['fin_fecha']) and $_claverecor['fin_fecha']>$_fechaconjrpta){
                   continue;
               }


               //Guardando si son multiples ==========================================================================================
               if($_claverecor['caracteristica_preg'] == 'M'){
                   $_ismultiple[$_claverecor['id_pregunta']] = "1" ;
               }
               
               
               /* Organizando vectores de pregunta 
                * con seccion y sin seccion`*/
               $_indiceseccion=$_claverecor['id_seccion'];
               $_indicepregunta=$_claverecor['id_pregunta'];
               $_campo=$this->_respuestastipo($_claverecor['id_tpregunta']);           /*Asigna el campo de respuesta segun el tipod de pregunta*/

               if(empty($_indiceseccion)){
                   
                   
                   //Organizando vector de preguntas sin seccion=======================================
                   $r_pnoseccion[$_indicecap][$_indicepregunta]=['id_capitulo'=>$_claverecor['id_capitulo'],
                                                                 'id_conjunto_pregunta'=>$_claverecor['id_conjunto_pregunta'],
                                                                'id_pregunta'=>$_indicepregunta,
                                                                'nom_pregunta'=>$_claverecor['nom_pregunta'],
                                                                'id_tpregunta'=>$_claverecor['id_tpregunta'],
                                                                'num_col_label'=>$_claverecor['num_col_label'],
                                                                'num_col_input'=>$_claverecor['num_col_input'],
                                                                'visible'=>$_claverecor['visible'],
                                                                'visible_desc_pregunta'=>$_claverecor['visible_desc_preg'],
                                                                'max_largo'=>$_claverecor['max_largo'],
                                                                'min_largo'=>$_claverecor['min_largo'],
                                                                'obligatorio'=>$_claverecor['obligatorio'],
                                                                'min_date'=>$_claverecor['min_date'],
                                                                'max_date'=>$_claverecor['max_date'],
                                                                'atributos'=>$_claverecor['atributos'],
                                                                'reg_exp'=>$_claverecor['reg_exp'],
                                                                'max_number'=>$_claverecor['max_number'],
                                                                'min_number'=>$_claverecor['min_number'],
                                                                'id_tselect'=>$_claverecor['id_tselect'],
                                                                'id_agrupacion'=>$_claverecor['id_agrupacion'],
                                                                'tp_url_subpantalla'=>$_claverecor['tp_url_subpantalla'],
                                                                'ayuda_pregunta'=>$_claverecor['ayuda_pregunta'],
                                                                'id_respuesta'=>$_claverecor['id_respuesta'],
                                                                'ag_descripcion'=>$_claverecor['ag_descripcion'],
                                                                'respuesta'=>$_claverecor[$_campo],
                                                                'ra_otros'=>$_claverecor['ra_otros'],    
                                                                'stylecss'=>$_claverecor['stylecss'],
                                                                'caracteristica_preg'=>$_claverecor['caracteristica_preg'],
                                                                'ag_num_col'=>$_claverecor['ag_num_col'],
                                                                'ag_num_row'=>$_claverecor['ag_num_row'],
                                                                'format'=>$_claverecor['format'],
                                                                'numerada'=>$_numeracionpreg,
                                                                'id_pregunta_habilitadora'=>$_claverecor['id_pregunta_habilitadora'],
                                                                'operacion'=>$_claverecor['operacion'],
                                                                'valor'=>$_claverecor['valor'],
                                                                'tipo_agrupacion'=>$_claverecor['tipo_agrupacion'],
                                                                'id_tcondicion'=>$_claverecor['id_tcondicion'],
                                                                'id_pregunta_condicionada'=>$_claverecor['id_pregunta_condicionada'],
                                                                'opercond'=>$_claverecor['opercond'],
                                                                'valorcond'=>$_claverecor['valorcond'],
                                                                'tcond'=>$_claverecor['tcond'], 
                                                                'max_files'=>$_claverecor['max_files'],
                                                                'idjunta'=>$_claverecor['id_junta'],
                                                                'max_registros'=>$_claverecor['max_registros'],
                                                                'id_pregunta_anidada'=>$_claverecor['id_pregunta_anidada']];
               }else{
                   $r_pseccion[$_indicecap][$_indiceseccion][$_indicepregunta]=['id_capitulo'=>$_claverecor['id_capitulo'],
                       'id_conjunto_pregunta'=>$_claverecor['id_conjunto_pregunta'],
                       'id_pregunta'=>$_indicepregunta,
                       'nom_pregunta'=>$_claverecor['nom_pregunta'],
                       'id_tpregunta'=>$_claverecor['id_tpregunta'],
                       'num_col_label'=>$_claverecor['num_col_label'],
                       'num_col_input'=>$_claverecor['num_col_input'],
                       'visible'=>$_claverecor['visible'],
                       'visible_desc_pregunta'=>$_claverecor['visible_desc_preg'],
                       'max_largo'=>$_claverecor['max_largo'],
                       'min_largo'=>$_claverecor['min_largo'],
                       'obligatorio'=>$_claverecor['obligatorio'],
                       'min_date'=>$_claverecor['min_date'],
                       'max_date'=>$_claverecor['max_date'],
                       'atributos'=>$_claverecor['atributos'],
                       'reg_exp'=>$_claverecor['reg_exp'],
                       'max_number'=>$_claverecor['max_number'],
                       'min_number'=>$_claverecor['min_number'],
                       'id_tselect'=>$_claverecor['id_tselect'],
                       'id_agrupacion'=>$_claverecor['id_agrupacion'],
                       'tp_url_subpantalla'=>$_claverecor['tp_url_subpantalla'],
                       'ayuda_pregunta'=>$_claverecor['ayuda_pregunta'],
                       'id_respuesta'=>$_claverecor['id_respuesta'],
                       'ag_descripcion'=>$_claverecor['ag_descripcion'],
                       'respuesta'=>$_claverecor[$_campo],
                       'ra_otros'=>$_claverecor['ra_otros'],
                       'stylecss'=>$_claverecor['stylecss'],
                       'caracteristica_preg'=>$_claverecor['caracteristica_preg'],
                       'ag_num_col'=>$_claverecor['ag_num_col'],
                       'ag_num_row'=>$_claverecor['ag_num_row'],
                       'format'=>$_claverecor['format'],
                       'numerada'=>$_numeracionpreg,
                       'id_pregunta_habilitadora'=>$_claverecor['id_pregunta_habilitadora'],
                       'operacion'=>$_claverecor['operacion'],
                       'valor'=>$_claverecor['valor'],
                       'tipo_agrupacion'=>$_claverecor['tipo_agrupacion'],
                       'id_tcondicion'=>$_claverecor['id_tcondicion'],
                       'id_pregunta_condicionada'=>$_claverecor['id_pregunta_condicionada'],
                       'opercond'=>$_claverecor['opercond'],
                       'valorcond'=>$_claverecor['valorcond'],
                       'tcond'=>$_claverecor['tcond'], 
                       'max_files'=>$_claverecor['max_files'],                       
                       'idjunta'=>$_claverecor['id_junta'],
                        'max_registros'=>$_claverecor['max_registros'],
                        'id_pregunta_anidada'=>$_claverecor['id_pregunta_anidada']
                       ];                   
               }
                
            }
            
        }
        /*mceron 2018-11-14
		Se colocó la validación para que se pueda visualizar por listado de capítulos
		*/
        //Si no existen capitulos se envia un excepcion =======================================================================================        
        if(count($_arraycap)==0 and $inc_datos_generales == FALSE and $inc_basicos_coorubicacion == FALSE and $inc_datos_generales_riego == FALSE and $inc_datos_generales_comunitario_ap==FALSE and $inc_datos_generales_publicos==FALSE){
             throw new \yii\web\HttpException(404, 'No existen capitulos asociadas al formato');
        }
               
        /* 4.1) Modelo llama al objeto que crea la clase detcapitulo
            * r_pnoseccion => array de preguntas sin secciones asociado al capitulo
            * r_secciones => array de seccion asociadas al capitulo
            * r_pseccion=> Preguntas que estan asociadas a una seccion
            */
            if(!empty($_arraycap)){
                
                $model=new detcapitulo($_arraycap,$r_pnoseccion,$r_secciones,$r_pseccion);  
               
            }else{
                $model="";
            }
           
           
        /* 4-1-1) Agregando modelo de datos generales*/
           if($inc_datos_generales == TRUE){
               
               if(!empty($_findsearch= FdDatosGenerales::find()->where(['id_conjunto_respuesta' => $id_conj_rpta])->one())){
                   $_modelgenerales  = $_findsearch;
               }else{
                   $_modelgenerales = new FdDatosGenerales();
               }
           }else{
               $_modelgenerales="";
           }
           
        /*  4-1-2) Agregando modelo de datos para basicosubicacioncoordenadas*/
           if($inc_basicos_coorubicacion == TRUE){
               
               //deshabilitando focus ========================================================================================
               if(empty($focus) or $focus==0){
                    $focus = "null";
               }     
               
               //Datos sacados de datos generales//
               if(!empty($_findsearch= FdDatosGenerales_var::find()->where(['id_conjunto_respuesta' => $id_conj_rpta])->one())){
                   $_modelbasicos  = $_findsearch;
               }else{
                   $_modelbasicos = new FdDatosGenerales_var();
               }
               
               
               //Datos sacados de coordendas//
               if(!empty($_findsearch= FdCoordenada_var::find()->where(['id_conjunto_respuesta' => $id_conj_rpta,'id_capitulo' =>$_capitulobasico ])->one())){
                   $_modelbasicos_coordenadas  = $_findsearch;
               }else{
                   $_modelbasicos_coordenadas = new FdCoordenada_var();
               }
               
               //Datos sacados de ubicacion//
               if(!empty($_findsearch= FdUbicacion_var::find()->where(['id_conjunto_respuesta' => $id_conj_rpta,'id_capitulo' =>$_capitulobasico ])->one())){
                   $_modelbasicos_ubicacion  = $_findsearch;
                    
                   if(!empty($_modelbasicos_ubicacion->cod_canton)){
                       $cantonesPost=Cantones::find()
                        ->where(['=', 'cantones.cod_provincia', $_modelbasicos_ubicacion->cod_provincia])
                        ->all(); 
                       
                   }else{
                       $cantonesPost="";
                   }
                   
                   if(!empty($_modelbasicos_ubicacion->id_demarcacion)){
                        $DemarcacionPost= Demarcaciones::find()
                                        ->leftJoin('cantones', 'cantones.id_demarcacion=demarcaciones.id_demarcacion')
                                        ->where(['=', 'cantones.cod_canton', $_modelbasicos_ubicacion->cod_canton])
                                        ->all();
                   }else{
                       $DemarcacionPost="";
                   }
                   
               }else{
                   $_modelbasicos_ubicacion = new FdUbicacion_var();
                   $cantonesPost="";
                   $DemarcacionPost="";
               }
           }else{
               
               $_modelbasicos="";
               $_modelbasicos_coordenadas="";
               $_modelbasicos_ubicacion="";
               $cantonesPost="";
               $DemarcacionPost="";               
           }
           
           if($inc_datos_generales_riego == TRUE){               
               if(!empty($_findsearch= FdDatosGeneralesRiego::find()->where(['id_conjunto_respuesta' => $id_conj_rpta])->one())){
                   $_modelgeneralesriego  = $_findsearch;
               }else{
                   $_modelgeneralesriego = new FdDatosGeneralesRiego();
               }     
               
               
               
                  if(!empty($_findsearch= FdUbicacion_var::find()->where(['id_conjunto_respuesta' => $id_conj_rpta,'id_capitulo' =>$_capitulobasico ])->one())){
                   $_modelriego_ubicacion  = $_findsearch;
                    
                   if(!empty($_modelriego_ubicacion->cod_canton)){
                       $cantonesPost=Cantones::find()
                        ->where(['=', 'cantones.cod_provincia', $_modelriego_ubicacion->cod_provincia])
                        ->all(); 
                       
                   }else{
                       $cantonesPost="";
                   }
                   
                   if(!empty($_modelriego_ubicacion->cod_parroquia)){
                       $parroquiasPost=Parroquias::find()
                        ->where(['=', 'parroquias.cod_provincia', $_modelriego_ubicacion->cod_provincia])
                        ->andwhere(['=','parroquias.cod_canton', $_modelriego_ubicacion->cod_canton])
                        ->all(); 
                   }else{
                       $parroquiasPost="";
                   }
                   
                   if(!empty($_modelriego_ubicacion->id_demarcacion)){
                        $DemarcacionPost= Demarcaciones::find()
                                        ->leftJoin('cantones', 'cantones.id_demarcacion=demarcaciones.id_demarcacion')
                                        ->where(['=', 'cantones.cod_canton', $_modelriego_ubicacion->cod_canton])
                                        ->all();
                   }else{
                       $DemarcacionPost="";
                   }
                   
               }else{
                   /*$_modelriego_ubicacion = new FdUbicacion_var();
                   $cantonesPost="";
                   $parroquiasPost="";
                   $DemarcacionPost="";*/
                   $_modelriego_ubicacion=  new FdUbicacion_var;
                   $_select_cjresp = \common\models\poc\FdConjuntoRespuesta::find()
                        ->where(['id_conjunto_respuesta'=>$id_conj_rpta])
                        ->one();
                    $valor_cjresp= $_select_cjresp->id_entidad;

                    $_select_entidad = \common\models\autenticacion\Entidades::find()
                                   ->where(['id_entidad'=>$valor_cjresp])
                        ->one();
                    $valor_prov= $_select_entidad->cod_provincia_p;           
                    $valor_canton= $_select_entidad->cod_canton_p;  
                    
                    $demarcacion="";
                    if(empty($_modelriego_ubicacion->cod_canton)){
                       $cantonesPost=Cantones::find()
                        ->where(['=', 'cantones.cod_provincia', $valor_prov])
                        ->all();  
                       
                        $cantones_n=Cantones::find()
                        ->where(['=', 'cantones.cod_provincia', $valor_prov])
                        ->andWhere(['=', 'cantones.cod_canton', $valor_canton])
                        ->one();
                        $demarcacion = $cantones_n->id_demarcacion;
                       
                   }
                   
                   if(empty($_modelriego_ubicacion->cod_parroquia)){
                       $parroquiasPost=Parroquias::find()
                        ->where(['=', 'parroquias.cod_provincia', $valor_prov])
                        ->andwhere(['=','parroquias.cod_canton', $valor_canton])
                        ->all(); 
                   }
                   
                   if(empty($_modelriego_ubicacion->id_demarcacion)){
                        $DemarcacionPost= Demarcaciones::find()                                        
                                        ->where(['=', 'id_demarcacion', $demarcacion])
                                        ->all();
                   }
               }
               
           }else{
               $_modelgeneralesriego="";
               $_modelriego_ubicacion="";              
               $parroquiasPost="";               
           }
           //-----------------------------------
           
           if($inc_datos_generales_comunitario_ap == TRUE){               
               if(!empty($_findsearch= FdDatosGeneralesComunitarioAp::find()->where(['id_conjunto_respuesta' => $id_conj_rpta, 'id_junta' =>$idjunta])->one())){
                   $_modelgeneralescomunitarioap  = $_findsearch;
               }else{
                   $_modelgeneralescomunitarioap = new FdDatosGeneralesComunitarioAp();
               }                              
                  if(!empty($_findsearch= FdUbicacion_var_ap::find()->where(['id_conjunto_respuesta' => $id_conj_rpta,'id_capitulo' =>$_capitulobasico,'id_junta' =>$idjunta ])->one())){                      
                   $_modelcomunitarioap_ubicacion  = $_findsearch;
                    
                   if(!empty($_modelcomunitarioap_ubicacion->cod_canton)){
                       $cantonesPost=Cantones::find()
                        ->where(['=', 'cantones.cod_provincia', $_modelcomunitarioap_ubicacion->cod_provincia])
                        ->all(); 
                       
                   }else{
                       $cantonesPost="";
                   }
                   
                   if(!empty($_modelcomunitarioap_ubicacion->cod_parroquia)){
                       $parroquiasPost=Parroquias::find()
                        ->where(['=', 'parroquias.cod_provincia', $_modelcomunitarioap_ubicacion->cod_provincia])
                        ->andwhere(['=','parroquias.cod_canton', $_modelcomunitarioap_ubicacion->cod_canton])
                        ->all(); 
                   }else{
                       $parroquiasPost="";
                   }                  
                   
                   
               }else{
                   /*$_modelcomunitarioap_ubicacion = new FdUbicacion_var_ap();
                   $cantonesPost="";
                   $parroquiasPost="";*/
                   
                   /*$_modelriego_ubicacion = new FdUbicacion_var();
                   $cantonesPost="";
                   $parroquiasPost="";
                   $DemarcacionPost="";*/
                   $_modelcomunitarioap_ubicacion=  new FdUbicacion_var_ap();
                   $_select_cjresp = \common\models\poc\FdConjuntoRespuesta::find()
                        ->where(['id_conjunto_respuesta'=>$id_conj_rpta])
                        ->one();
                    $valor_cjresp= $_select_cjresp->id_entidad;

                    $_select_entidad = \common\models\autenticacion\Entidades::find()
                                   ->where(['id_entidad'=>$valor_cjresp])
                        ->one();
                    $valor_prov= $_select_entidad->cod_provincia_p;           
                    $valor_canton= $_select_entidad->cod_canton_p;  
                    
                    
                    $demarcacion="";
                    if(empty($_modelcomunitarioap_ubicacion->cod_canton)){
                       $cantonesPost=Cantones::find()
                        ->where(['=', 'cantones.cod_provincia', $valor_prov])
                        ->all();                         
                   }
                   if(empty($_modelcomunitarioap_ubicacion->cod_parroquia)){
                       $parroquiasPost=Parroquias::find()
                        ->where(['=', 'parroquias.cod_provincia', $valor_prov])
                        ->andwhere(['=','parroquias.cod_canton', $valor_canton])
                        ->all(); 
                   }
               }
               
           }else{
               $_modelgeneralescomunitarioap="";
               $_modelcomunitarioap_ubicacion="";              
               //$parroquiasPost="";               
           }
           
           
           
           if($inc_datos_generales_publicos == TRUE){               
               if(!empty($_findsearch= FdDatosGeneralesPublicos::find()->where(['id_conjunto_respuesta' => $id_conj_rpta])->one())){
                   $_modelgeneralespublicos  = $_findsearch;
               }else{
                   $_modelgeneralespublicos = new FdDatosGeneralesPublicos();
               }                              
                  if(!empty($_findsearch= FdUbicacion_var::find()->where(['id_conjunto_respuesta' => $id_conj_rpta,'id_capitulo' =>$_capitulobasico ])->one())){
                   $_modelpublicos_ubicacion  = $_findsearch;
                    
                   if(!empty($_modelpublicos_ubicacion->cod_canton)){
                       $cantonesPost=Cantones::find()
                        ->where(['=', 'cantones.cod_provincia', $_modelpublicos_ubicacion->cod_provincia])
                        ->all(); 
                       
                   }else{
                       $cantonesPost="";
                   }
                   
                   if(!empty($_modelpublicos_ubicacion->id_demarcacion)){
                        $DemarcacionPost= Demarcaciones::find()
                                        ->leftJoin('cantones', 'cantones.id_demarcacion=demarcaciones.id_demarcacion')
                                        ->where(['=', 'cantones.cod_canton', $_modelpublicos_ubicacion->cod_canton])
                                        ->all();
                   }else{
                       $DemarcacionPost="";
                   }            
                   
                   
               }else{
                   $_modelpublicos_ubicacion = new FdUbicacion_var();
                   $cantonesPost="";
                  // $parroquiasPost="";
                   
               }
               
           }else{
               $_modelgeneralespublicos="";
               $_modelpublicos_ubicacion="";              
               //$parroquiasPost="";               
           }           
           
           
           
           //-----------------------------------
           
           
           
           
           
        /*4.2)creando la vista*/
           
            $_helperHTML= new helperHTML();
            $_helperHTML->id_conj_rpta = $id_conj_rpta;
            $_helperHTML->id_fmt = $id_fmt;
            $_helperHTML->id_version = $last;
            $_helperHTML->antvista = $antvista;
            $_helperHTML->estado = $estado;
            $_helperHTML->periodos = $periodos;
            $_helperHTML->cantones = $cantones;
            $_helperHTML->parroquias = $parroquias;
            $_helperHTML->provincia = $provincia;
            $_helperHTML->idjunta = $idjunta;
           
            
            if($antvista=='gestorformatos/index'){
                $_helperHTML->capituloid ="";
            }else{
                $_helperHTML->capituloid =$capitulo;
            }    

            
            $_helperHTML->gen_detacapituloview($_capitulos,$r_pnoseccion,$r_secciones,$r_pseccion,$_numeracionpreg,$_permisos,$_modelgenerales,$_modelbasicos,$_modelbasicos_coordenadas,$_modelbasicos_ubicacion,$_modelgeneralesriego,$_modelriego_ubicacion,$_modelgeneralescomunitarioap,$_modelcomunitarioap_ubicacion,$_modelgeneralespublicos,$_modelpublicos_ubicacion);
            $_string=$_helperHTML->_stringhtml; 
            
            /*$_string1= implode('***',$_helperHTML->_stringhtml);
            $_pasdata= implode('***',$_helperHTML->agrupadas);
            Yii::trace('Variables que entrega gen_detacapituloview en helperHTML'.PHP_EOL."_stringhtml:".PHP_EOL.$_string1.PHP_EOL."agrupadas:".PHP_EOL.$_pasdata.PHP_EOL."_varpass:".PHP_EOL.$_helperHTML->_varpass, 'DEBUG');*/
         
        //=========================================GUARDANDO Y RECOPILANDO LAS RESPUESTAS=====================================//
            
            
            
            if(!empty(Yii::$app->request->post())){                
                
                $_filesup=array();                      //Array que lleva la relacion rptaNo. -> nombre de archivo solo para tipo 11
                $_saveerror=0;
                $_variablespost=Yii::$app->request->post();
                //Yii::trace($_POST,'DEBUG');
                
               if ($inc_datos_generales == TRUE) {
                   
                   $_modelgenerales->id_conjunto_respuesta = $id_conj_rpta;
                   $_modelgenerales->nombres = $_variablespost['FdDatosGenerales']['nombres'];
                   $_modelgenerales->num_documento = $_variablespost['FdDatosGenerales']['num_documento'];
                   $_modelgenerales->num_convencional = $_variablespost['FdDatosGenerales']['num_convencional'];
                   $_modelgenerales->correo_electronico = $_variablespost['FdDatosGenerales']['correo_electronico'];
                   $_modelgenerales->num_celular = $_variablespost['FdDatosGenerales']['num_celular'];
                   $_modelgenerales->direccion = $_variablespost['FdDatosGenerales']['direccion'];
                   $_modelgenerales->descripcion_trabajo = $_variablespost['FdDatosGenerales']['descripcion_trabajo'];
                   $_modelgenerales->nombres_apellidos_replegal = $_variablespost['FdDatosGenerales']['nombres_apellidos_replegal'];
                   $_modelgenerales->id_tdocumento = $_variablespost['FdDatosGenerales']['id_tdocumento'];
                   $_modelgenerales->id_natu_juridica = $_variablespost['FdDatosGenerales']['id_natu_juridica'];
                             
                   if($_modelgenerales->save()){
                       $_saveerror=1;
                   }else{
                       return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus]);
                   } 
              }              
              if ($inc_datos_generales_riego == TRUE) {
                   
                   $_modelgeneralesriego->id_conjunto_respuesta = $id_conj_rpta;
                   $_modelgeneralesriego->nombres_prestador_servicio = $_variablespost['FdDatosGeneralesRiego']['nombres_prestador_servicio'];
                   $_modelgeneralesriego->direccion_oficinas = $_variablespost['FdDatosGeneralesRiego']['direccion_oficinas'];
                   $_modelgeneralesriego->nombres_apellidos_replegal = $_variablespost['FdDatosGeneralesRiego']['nombres_apellidos_replegal'];
                   $_modelgeneralesriego->posee_convencional = $_variablespost['FdDatosGeneralesRiego']['posee_convencional'];
                   $_modelgeneralesriego->num_convencional = @$_variablespost['FdDatosGeneralesRiego']['num_convencional'];
                   $_modelgeneralesriego->num_celular = $_variablespost['FdDatosGeneralesRiego']['num_celular'];
                   $_modelgeneralesriego->num_celular_otro = $_variablespost['FdDatosGeneralesRiego']['num_celular_otro'];
                   $_modelgeneralesriego->posee_email = $_variablespost['FdDatosGeneralesRiego']['posee_email'];
                   $_modelgeneralesriego->correo_electronico = @$_variablespost['FdDatosGeneralesRiego']['correo_electronico'];
                            
                   $_modelriego_ubicacion->cod_provincia = $_variablespost['FdUbicacion_var']['cod_provincia'];
                   $_modelriego_ubicacion->cod_canton = $_variablespost['FdUbicacion_var']['cod_canton'];
                   $_modelriego_ubicacion->cod_parroquia = $_variablespost['FdUbicacion_var']['cod_parroquia'];
                   $_modelriego_ubicacion->id_demarcacion = $_variablespost['FdUbicacion_var']['id_demarcacion'];
                   $_modelriego_ubicacion->id_conjunto_respuesta = $id_conj_rpta;
                   $_modelriego_ubicacion->id_capitulo = $_capitulobasico;
                   
                             
                   if($_modelgeneralesriego->save()){
                       $_saveerror=1;
                           if($_modelriego_ubicacion->save()){                               
                                $_saveerror=1;                                
                           }else{
                               
                                return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus]);
                           }
                   }else{
                       return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus]);
                   } 
              }
              //------------------------------------------
              if ($inc_datos_generales_comunitario_ap == TRUE) {
                   
                  
                   $_modelgeneralescomunitarioap->id_conjunto_respuesta = $id_conj_rpta;
                   $_modelgeneralescomunitarioap->nombres_prestador = $_variablespost['FdDatosGeneralesComunitarioAp']['nombres_prestador'];
                   $_modelgeneralescomunitarioap->nombre_comunidad = $_variablespost['FdDatosGeneralesComunitarioAp']['nombre_comunidad'];
                   $_modelgeneralescomunitarioap->numero_personas_servicio = $_variablespost['FdDatosGeneralesComunitarioAp']['numero_personas_servicio'];
                   $_modelgeneralescomunitarioap->tipo_prestador_comunitario = $_variablespost['FdDatosGeneralesComunitarioAp']['tipo_prestador_comunitario'];
                   $_modelgeneralescomunitarioap->especifique = $_variablespost['FdDatosGeneralesComunitarioAp']['especifique'];
                   $_modelgeneralescomunitarioap->id_junta = $idjunta;
                   
                            
                   $_modelcomunitarioap_ubicacion->cod_provincia = $_variablespost['FdUbicacion_var_ap']['cod_provincia'];
                   $_modelcomunitarioap_ubicacion->cod_canton = $_variablespost['FdUbicacion_var_ap']['cod_canton'];
                   $_modelcomunitarioap_ubicacion->cod_parroquia = $_variablespost['FdUbicacion_var_ap']['cod_parroquia'];                   
                   $_modelcomunitarioap_ubicacion->id_conjunto_respuesta = $id_conj_rpta;
                   $_modelcomunitarioap_ubicacion->id_capitulo = $_capitulobasico;
                   $_modelcomunitarioap_ubicacion->id_junta = $idjunta;
                   
                             
                   if($_modelgeneralescomunitarioap->save()){
                       $_saveerror=1;
                           if($_modelcomunitarioap_ubicacion->save()){                               
                                $_saveerror=1;                                
                           }else{
                               
                                return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus,'id_junta'=>$idjunta]);
                           }
                   }else{
                       return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus,'id_junta'=>$idjunta]);
                   } 
              }
              
              
              if ($inc_datos_generales_publicos == TRUE) {
                   
                   $dt =  $_variablespost['FdDatosGeneralesPublicos']['fecha_llenado_fichas'];                  

                   $fecha= Yii::$app->formatter->asDate($dt);
                   
                   $_modelgeneralespublicos->id_conjunto_respuesta = $id_conj_rpta;
                   $_modelgeneralespublicos->pagina_web_prestador = $_variablespost['FdDatosGeneralesPublicos']['pagina_web_prestador'];
                   $_modelgeneralespublicos->correo_electronico_prestador = $_variablespost['FdDatosGeneralesPublicos']['correo_electronico_prestador'];
                   $_modelgeneralespublicos->fecha_llenado_fichas = $fecha;
                   $_modelgeneralespublicos->nombres_responsable_informacion = $_variablespost['FdDatosGeneralesPublicos']['nombres_responsable_informacion'];
                   $_modelgeneralespublicos->cargo_desempenia = $_variablespost['FdDatosGeneralesPublicos']['cargo_desempenia'];
                   $_modelgeneralespublicos->correo_electronico = $_variablespost['FdDatosGeneralesPublicos']['correo_electronico'];
                   $_modelgeneralespublicos->num_celular = $_variablespost['FdDatosGeneralesPublicos']['num_celular'];
                   
                            
                   $_modelpublicos_ubicacion->cod_provincia = $_variablespost['FdUbicacion_var']['cod_provincia'];
                   $_modelpublicos_ubicacion->cod_canton = $_variablespost['FdUbicacion_var']['cod_canton'];
                   $_modelpublicos_ubicacion->id_demarcacion = $_variablespost['FdUbicacion_var']['id_demarcacion'];                 
                   $_modelpublicos_ubicacion->id_conjunto_respuesta = $id_conj_rpta;
                   $_modelpublicos_ubicacion->id_capitulo = $_capitulobasico;
                   
                             
                   if($_modelgeneralespublicos->save()){
                       $_saveerror=1;
                           if($_modelpublicos_ubicacion->save()){                               
                                $_saveerror=1;                                
                           }else{
                               
                                return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus]);
                           }
                   }else{
                       return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus]);
                   } 
              }
              
              
              //-----------------------------------------
              
              
              
              
              
              
              
              
               
               
               if($inc_basicos_coorubicacion == TRUE){
                   
                   $_modelbasicos->id_conjunto_respuesta = $id_conj_rpta;
                   $_modelbasicos->nombres = $_variablespost['FdDatosGenerales_var']['nombres'];
                   $_modelbasicos->nom_replegal = $_variablespost['FdDatosGenerales_var']['nom_replegal'];
                   $_modelbasicos->nom_sistema = $_variablespost['FdDatosGenerales_var']['nom_sistema'];
                   $_modelbasicos->fecha = $_variablespost['FdDatosGenerales_var']['fecha'];
                   
                   $_modelbasicos_coordenadas->x = $_variablespost['FdCoordenada_var']['x'];
                   $_modelbasicos_coordenadas->y = $_variablespost['FdCoordenada_var']['y'];
                   $_modelbasicos_coordenadas->altura = $_variablespost['FdCoordenada_var']['altura'];
                   $_modelbasicos_coordenadas->id_tcoordenada = $_variablespost['FdCoordenada_var']['id_tcoordenada'];
                   $_modelbasicos_coordenadas->id_conjunto_respuesta = $id_conj_rpta;
                   $_modelbasicos_coordenadas->id_capitulo = $_capitulobasico;
                   
                   $_modelbasicos_ubicacion->cod_provincia = $_variablespost['FdUbicacion_var']['cod_provincia'];
                   $_modelbasicos_ubicacion->cod_canton = $_variablespost['FdUbicacion_var']['cod_canton'];
                   $_modelbasicos_ubicacion->id_demarcacion = $_variablespost['FdUbicacion_var']['id_demarcacion'];
                   $_modelbasicos_ubicacion->id_conjunto_respuesta = $id_conj_rpta;
                   $_modelbasicos_ubicacion->id_capitulo = $_capitulobasico;
                   
                   if($_modelbasicos->save()){
                        
                       $_saveerror=1;
                       if($_modelbasicos_coordenadas->save()){
                           
                           $_saveerror=1;
                           
                           if($_modelbasicos_ubicacion->save()){
                               
                                $_saveerror=1;

                           }else{
                               
                                return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus]);
                           }
                       }else{
                           return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus]);
                       }
                       
                   }else{
                       return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus]);
                   }
                   
                   
               }
                
               
                if(!empty($_helperHTML->_tiposoporte)){
                    foreach($_helperHTML->_tiposoporte as $_tpsoporte){

                        $model->$_tpsoporte = UploadedFile::getInstances($model, $_tpsoporte); 
                        $resultado=$model->upload($_tpsoporte,$_rutaformato,$_nameformato); 

                        if($resultado[0] === TRUE){

                            foreach($resultado[1] as $_clfile){
                                $_filesup[$_tpsoporte][] =  $_clfile;
                            }

                        }else{
                            return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus,'idjunta'=>$idjunta]);
                        }
                    }
                }
                
                
                $_savecapitulo=new savecapitulo();
                $_savecapitulo->_vcapitulo = Yii::$app->request->post();
                $_savecapitulo->_idconjprta = $id_conj_prta;
                $_savecapitulo->_idconjrpta = $id_conj_rpta;
                $_savecapitulo->_idformato = $id_fmt;
                $_savecapitulo->_idversion = $last;
                $_savecapitulo->_idjunta = $idjunta;
                $_savecapitulo->_relaciones = $_helperHTML->_varpass;
                $_savecapitulo->_tipo11 = $_filesup;
                $_savecapitulo->_agrupadas = $_helperHTML->agrupadas;
                $_savecapitulo->multiples = $_ismultiple;
                                              
                if($_savecapitulo->guardar()){
                    
                    $_saveerror=1;
                    if($_saveerror==1){
                    Yii::$app->getSession()->setFlash('success', [
                           'type' => 'success',
                           'message' => 'Capítulo Guardado con Éxito',
                       ]);
                    }
                    
                    
                    
                    if(!empty(Yii::$app->request->post('subpantalla'))){
                        
                        $_tiposubpantalla= explode("%%",Yii::$app->request->post('subpantalla'));
                        
                        if($_tiposubpantalla[0] == 'tp_detallemensual'){
                            
                            if(!empty($_tiposubpantalla[8])){
                                $id_capitulop = $_tiposubpantalla[8];
                            }else{
                                $id_capitulop = $capitulo;
                            }
                            
                            return $this->redirect([$_tiposubpantalla[1],"id_prta"=>$_tiposubpantalla[2],"id_rpta"=>$_tiposubpantalla[3],"numerar"=>$_tiposubpantalla[4],"nom_prta"=>$_tiposubpantalla[5],'id_capitulo'=>$id_capitulop,'capitulo'=>$capitulo,'id_cnj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'antvista'=>$antvista,'id_fmt'=>$id_fmt,'id_version'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'migadepan'=>$_tiposubpantalla[6],'tipo_select'=>$_tiposubpantalla[7],'focus'=>$_tiposubpantalla[9]]); 
                        
                            
                        }else{
                            
                            if(!empty($_tiposubpantalla[7])){
                                $id_capitulop = $_tiposubpantalla[7];
                            }else{
                                $id_capitulop = $capitulo;
                            }
                            
                            

                            //exit;
//<<<<<<< .mine
 //                           return $this->redirect([$_tiposubpantalla[1],"id_prta"=>$_tiposubpantalla[2],"id_rpta"=>$_tiposubpantalla[3],"numerar"=>$_tiposubpantalla[4],"nom_prta"=>$_tiposubpantalla[5],'id_capitulo'=>$id_capitulop,'capitulo'=>$capitulo,'id_cnj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'antvista'=>$antvista,'id_fmt'=>$id_fmt,'id_version'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'migadepan'=>$_tiposubpantalla[6],'focus'=>$_tiposubpantalla[8],'fuentes'=>$fuentes,'idjunta'=>$idjunta]);                             
//||||||| .r211
//                            return $this->redirect([$_tiposubpantalla[1],"id_prta"=>$_tiposubpantalla[2],"id_rpta"=>$_tiposubpantalla[3],"numerar"=>$_tiposubpantalla[4],"nom_prta"=>$_tiposubpantalla[5],'id_capitulo'=>$id_capitulop,'capitulo'=>$capitulo,'id_cnj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'antvista'=>$antvista,'id_fmt'=>$id_fmt,'id_version'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'migadepan'=>$_tiposubpantalla[6],'focus'=>$_tiposubpantalla[8],'fuentes'=>$fuentes]);                             
//=======
                            return $this->redirect([$_tiposubpantalla[1],"id_prta"=>$_tiposubpantalla[2],"id_rpta"=>$_tiposubpantalla[3],"numerar"=>$_tiposubpantalla[4],"nom_prta"=>$_tiposubpantalla[5],'id_capitulo'=>$id_capitulop,'capitulo'=>$capitulo,'id_cnj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'antvista'=>$antvista,'id_fmt'=>$id_fmt,'id_version'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'migadepan'=>$_tiposubpantalla[6],'focus'=>$_tiposubpantalla[8],'idjunta'=>$idjunta]);                             
                        
                        }
                       
                        
                    }else{
                     
                        return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus,'idjunta'=>$idjunta]);
                    
                        
                    }
                    
                }else{
                    
                    return $this->redirect(['genvistaformato','capitulo'=>$capitulo,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones'=>$cantones,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista,'focus'=>$focus,'idjunta'=>$idjunta]);
                }                                              
        }else{             
            return $this->render('create_all', [
                    'model' => $model,'vista'=>$_string,'dinamicjavascript'=>$_helperHTML->_stringjavascriptcond,'permisos'=>$_permisos,'migadepan'=>$_migadepan,'modelgenerales' => $_modelgenerales,
                    'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'id_capitulo'=>$capitulo,'_modelbasicos'=>$_modelbasicos,
                    '_modelbasicos_coordenadas'=>$_modelbasicos_coordenadas,'_modelbasicos_ubicacion'=>$_modelbasicos_ubicacion,'cantonesPost'=>$cantonesPost,'DemarcacionPost'=>$DemarcacionPost,'focus'=>$focus,
                   'modelgeneralesriego' => $_modelgeneralesriego,'_modelriego_ubicacion' => $_modelriego_ubicacion,'parroquiasPost'=>$parroquiasPost,'modelgeneralescomunitarioap'=>$_modelgeneralescomunitarioap,'_modelcomunitarioap_ubicacion'=>$_modelcomunitarioap_ubicacion,
                   'modelgeneralespublicos'=>$_modelgeneralespublicos,'_modelpublicos_ubicacion'=>$_modelpublicos_ubicacion,'idjunta'=>$idjunta
            ]);
        }                
    }
    
    
    /*Evalua las codnciones un capitulo puede tener tres tipos de condiciones
     * 1) El capitulo esta condicionado por una pregunta, en este caso en la tabla fd_elemento_condicion estan diligenciados los campos
     *      Valor, Operacion, id_tcondicion = 3 , id_pregunta_habilitado e id_capitulo condicionado, se evalua que la respuerta a la pregunta habilitadora
     *      cumpla con la operacion de acuerdo al valor, osea RESPUESTA.ID_PREGUNTA_HABILITADORA (OPERACION "=,<,>,<>") VALOR
     * 2) El capitulo esta condicionado por un estado, es esta caso estan diligenciados en la tabla fd_elemento_condicion los campos
     *      Operacion, id_tcondicion = 3, id_adm_estado, id_capitulo_condicionado; en este caso se habilita el capitulo cuando el estado del formato cumpla
     *      con la operacion del estado asignado en fd_elementos.id_adm_estado
     * 3) El capitulo esta condicionado por un rol, en este caso estan diligenciados en la tabla fd_elementos_codicion los campos 
     *      Operacion, id_tcondicion = 3, cod_rol e id_capitulo_condicionado, en este caso el rol de usuario debe cumplir con la operacion de acuerdo al valor en cod_rol
     * 
     * Para los tres tipos de condicion se programan las siguiente operaciones: igual, mayor que, menor que, mayor igual, menor igual y diferente
     * Con los siguiente signos =,>,<,>=,<= ,  se evalua que el respuesta operacion valor, osea respuesta > valor 
     */
    
    protected function evaluarcondiciones($id_capitulo,$id_fmt,$id_conj_rpta,$last,$id_conj_prta,$codrol){
        
        //1) Traer vector de condiciones=============================================================
        $_condiciones = FdElementoCondicion::find()->where(['id_capitulo_condicionado' => $id_capitulo])->all();
        $_mostrarcapitulo='';
        
        foreach($_condiciones as $_clavecondiciones){
           
            /*Evalua condicion tipo 1)*/
            if(!empty($_clavecondiciones->id_pregunta_habilitadora) and $_clavecondiciones->id_tcondicion == '3'){
              
                $_valorpregunta= $this->valor_pregunta($_clavecondiciones->id_pregunta_habilitadora,$id_capitulo,$id_fmt,$id_conj_rpta,$last,$id_conj_prta);
                
                if($_valorpregunta === FALSE){
                    throw new \yii\web\HttpException(404, 'Error en la configuracion de la condicion '.$_clavecondiciones->id_condicion.'.');
                }else{
                    $_mostrarcapitulo = $this->condicionalidades($_valorpregunta, $_clavecondiciones->operacion, $_clavecondiciones->valor);
                }
                
            }
            
            /*Evalua condicion tipo 3)*/
            else if(!empty($_clavecondiciones->cod_rol) and $_clavecondiciones->id_tcondicion == '3'){
               $_mostrarcapitulo = $this->condicionalidades($codrol, $_clavecondiciones->operacion, $_clavecondiciones->cod_rol);
            }
            
            /*Evalua condicion tipo 2)*/
            else if(!empty($_clavecondiciones->id_adm_estado) and $_clavecondiciones->id_tcondicion == '3'){
                $_mostrarcapitulo = $this->condicionalidades($last, $_clavecondiciones->operacion, $_clavecondiciones->id_adm_estado);
            }
        }
        
        
        
       return $_mostrarcapitulo;
        
        
    }
    
    
     /*Funcion que entrega el valor de la respuesta a una pregunta*/
    protected function valor_pregunta($id_pregunta,$id_capitulo,$id_fmt,$id_conj_rpta,$last,$id_conj_prta){
        
        //1) Se busca el tipo de pregunta para averiguar el campo en FD_RESPUESTA asociado a ese tipo de pregunta
        $_condiciones = FdPregunta::find()
                        ->where(['id_pregunta' => $id_pregunta, 
                            'id_conjunto_pregunta' => $id_conj_prta,
                            'id_capitulo' => $id_capitulo
                            ])->one();
        
        //2) Si se encuentra el tipo de pregunta se busca el campo asociado para conocer la respuesta a la pregunta, sino retorna FALSE para 
        //presentar el error
        
        if(!empty($_condiciones['id_tpregunta'])){
            
            //a) buscando campo en donde esta guardada la respuesta en fd_respuestas
            $_campo = $this->_respuestastipo($_condiciones['id_tpregunta']);
            
            $_valorrpta = FdRespuesta::find()
                        ->where(['id_pregunta' => $id_pregunta, 
                                'id_conjunto_respuesta' => $id_conj_rpta,
                                'id_capitulo' => $id_capitulo,
                                'id_formato' => $id_fmt,
                                'id_version' => $last,
                                ])->one();
            
            return $_valorrpta[$_campo];
            
        }else{
            return FALSE;
        }    
    }
    
    
    /*Funcion que devuelve si se cumple una condicionalidad
     * $rpta => respuesta de la pregunta
     * $operacion => operacion que se debe aplicar, se acepta =,>,<,>=,<=,!=
     * $valor => dato guardado en la columna valor de la tabla FD_ELEMENTO_CONDICION
     *     */
    
    
    protected function condicionalidades($rpta,$operacion,$valor){
        
        if($rpta == $valor and $operacion == '='){
            return TRUE;
        }else if($rpta > $valor and $operacion == '>'){
             return TRUE;
        }else if($rpta < $valor and $operacion == '<'){
             return TRUE;
        }else if($rpta >= $valor and $operacion == '>='){
             return TRUE;
        }else if($rpta <= $valor and $operacion == '<='){
             return TRUE;
        }else if($rpta != $valor and $operacion == '!='){
             return TRUE;
        }else{
             return FALSE;
        }
    }
    
    /*Funcion que asigna la respuesta segun el tipo de pregunta*/
    
    protected function _respuestastipo($tipo){
        
        
        if($tipo==1){
            
            $_campo = 'ra_fecha';
            
        }else if($tipo==2){
            
            $_campo = 'ra_check';
            
        }else if($tipo==3){
            
            $_campo = 'id_opcion_select';
            
        }else if($tipo==4){
            
            $_campo = 'ra_descripcion';
            
        }else if($tipo==5){
            
            $_campo = 'ra_entero';
            
        }else if($tipo==6){
            
            $_campo = 'ra_decimal';
            
        }else if($tipo==7){
            
            $_campo = 'ra_porcentaje';
            
        }else if($tipo==8){
            
            $_campo = 'ra_moneda';
            
        }else{
           
            $_campo = 'ra_descripcion';
        }
        
        return $_campo;
    }
    
    
    /*Funcion para ejecutar el comando*/
    
    public function actionEjec_comand($id_prta,$id_conj_prta){
        
        $_comandos=new TrComando();
        $_vcomandos=$_comandos->help_comandos($id_prta);
        
        ///Yii::trace('Obteniendo Comandos'.$_vcomandos['id_comando'], 'DEBUG');
        
        /*Variablas que pide ejecutar
         * String $className, array $preguntas, int $idConjuntoPregunta, FdPregunta $pregunta
         */
        
        $_modelp=new \common\models\poc\FdConjuntoPregunta;
        $_ej_comando=new EjecutorComando("prueba",array($id_prta),$id_conj_prta,$_modelp);
        
        
        //No tiene vista para visualizacion=================================================
        
    }
    
    
     /*Aqui solo entra si la pregunta es de tipo 'M'
     * Aplica para:
     * Tipo 1-> Fecha , 15->texto 8->Moneda 7->Porcentaje , 6 -> decimal, 5-> Entero
     */
    public function actionPrueba(){
        
        //===========CAPTURANDO VALORES POST=============================================//
        
        $_valor = Yii::$app->request->post()['valor'];
        $_idconjrpta = Yii::$app->request->post()['id_conjrpta'];
        $_idconjprta = Yii::$app->request->post()['id_conjprta'];
        $_idprta = Yii::$app->request->post()['id_prta'];        
        $_idformato = Yii::$app->request->post()['id_fmt'];
        $_idtpregunta = Yii::$app->request->post()['idtprta'];
        $id_version = Yii::$app->request->post()['idversion']; 
        $idcapitulo = Yii::$app->request->post()['idcapitulo']; 
        $_idrpta = Yii::$app->request->post()['id_rpta'];
                
        
       //Formateando respuestas  =======================================================//
       $formatoarray = [6,7,8];
       if(in_array($_idtpregunta,$formatoarray)){
           $_valor = str_replace(",", "", $_valor);
       } 
       
       //==============GENERANDO SQL ===================================================//
        
        $_guardar = New savecapitulo();
        $_guardarRpta = $_guardar->guardartipoM($_idtpregunta, $_valor, $_idconjrpta, $_idprta, $idcapitulo, $_idformato, $_idconjprta, $id_version);
        
        if($_guardarRpta[0] === TRUE){
            
            if($_idtpregunta == 3){
               $_valor = $this->getOpcion($_valor);
            }
            
            $_stringreturn = "<div id='".$_guardarRpta[1]."' style='display:block'>".$_valor;
            $_stringreturn .= '<button type="button" onclick="deleteRpta('.$_guardarRpta[1].')">-</button></div>';
            
            return $_stringreturn;
        
            
        }else{
            
        }        
                
    }    
    public function actionDeletrpta(){
       $_idrpta = Yii::$app->request->post()['id_rpta'];
       
        $_guardar = New savecapitulo();
        $_guardarRpta = $_guardar->deletetipoM($_idrpta);
        
        return $_guardarRpta;
      
    }
    
    protected function getOpcion($_valor){
        
        $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$_valor])
                        ->one();
        return $_nombrevalor->nom_opcion_select;
    }    
}

