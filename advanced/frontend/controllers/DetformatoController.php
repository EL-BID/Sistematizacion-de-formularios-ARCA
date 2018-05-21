<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;               //Para presentar la barra de espera
use yii\helpers\Url;                //Para presentar la barra de espera
use common\models\poc\FdCapitulo;
use common\models\poc\FdCapituloSearch;
use common\models\poc\FdFormato;
use common\models\poc\FdAdmEstadoSearch;
use common\models\poc\FdConjuntoRespuesta;
use common\models\poc\FdElementoCondicion;
use common\models\poc\FdSeccionSearch;
use common\models\poc\FdPreguntaSearch;
use common\models\Detcapitulo;
use common\models\poc\FdDatosGenerales;
use common\models\poc\FdDatosGeneralesSearch;
use common\models\poc\FdDatosGenerales_var;
use common\models\poc\FdCoordenada_var;
use common\models\poc\FdUbicacion_var;
use common\models\autenticacion\Cantones;
use common\models\autenticacion\Demarcaciones;
use frontend\helpers\helperHTML;
use common\general\documents\genPDF;
use common\general\documents\genExcel;
//use common\general\documents\genWord;
use common\general\documents\genExcelsimple;
use common\general\documents\wordgenerator\genWord_ex;


//Llamado directo al Widget del PDF========================================================//
/*use kartik\mpdf\Pdf;
use moonland\phpexcel\Excel;*/


/**
 * ClientesdropdownController implementa las acciones a través del sistema CRUD para el modelo Clientesdropdown.
 */
class DetformatoController extends Controller
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
	
	
    
    
    public function romanic_number($integer) 
    { 
        $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
        $return = ''; 
        while($integer > 0) 
        { 
            foreach($table as $rom=>$arb) 
            { 
                if($integer >= $arb) 
                { 
                    $integer -= $arb; 
                    $return .= $rom; 
                    break; 
                } 
            } 
        } 

        return $return; 
    }
    
    
    
    /*Funcion para sacar el HTML de un formato 
     * se debe entregar a la siguiente funcion las siguiente variables:
     * @id_conj_rpta => id conjunto respuesta
     * @id_conj_prta => id conjuento pregunta
     * @id_fmt => id formato
     * @last => version del formato
     * @estado => estado
     * 
     * $tipoarchivo = excel
     *                pdf
     *                word
     */
    
    public function actionGenhtml($id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,$vista=null,$capitulo=null,$tipoarchivo=null){
        
        /*Declarando variables*/
        $r_secciones=array();
        
        //Algunas dudas: cuaqlueir persona puede acceder.....??
         /* -3) Consultando permisos del usuario al acceder*/
        if(empty(Yii::$app->user->identity->usuario)){
            
             return $this->redirect(['site/index']);
        
        }else{
           
            $m_permisos = new FdAdmEstadoSearch();
            $_login = Yii::$app->user->identity->usuario;
            $_permisos = $m_permisos->buscar($id_fmt,$id_conj_rpta,$_login); 
           
        }
        
         /*-1 Consultando fecha de creacion del conjunto respuesta*/
        $m_conjrespuesta = FdConjuntoRespuesta::findOne($id_conj_rpta);
        $_fechaconjrpta = $m_conjrespuesta->fecha_creacion;
        
        /*0) Consultando si el formato tiene numeración*/
        $m_formato = FdFormato::findOne($id_fmt);
        $_numeracionpreg = $m_formato -> numeracion;
        $_nombreformato = $m_formato->nom_formato;
        
        //1) Consultando capitulos
        $m_capitulo = new FdCapituloSearch();
        if(!empty($capitulo)){
            $_capitulos =$m_capitulo->searcCapFormato($id_fmt, $id_conj_prta, $estado,$capitulo);
        }else{
            $_capitulos =$m_capitulo->searcCapFormato($id_fmt, $id_conj_prta, $estado,null);
        }
        
        //2) Organiznado capitulos para presentar al usuario
        
        $_arraycap=array();             //Array que lleva los capitulos a presentarle al usuario , solo id's
        $_conteo=0;
        $_positions=array();
        $inc_datos_generales = FALSE;       //Bandera para saber si se incluye el capitulo datos generales...
        $inc_basicos_coorubicacion = FALSE;
        
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
                     $r_pregunta[$id_capitulo]=$m_preguntas->buscar($id_capitulo,$id_conj_prta,$id_conj_rpta);

                 }
             }else{

                 $_arraycap[] = $clave['id_capitulo'];
                 $id_capitulo=$clave['id_capitulo'];

                 /*2)Consultando secciones===============================================*/
                 $m_secciones=new FdSeccionSearch();
                 $r_secciones[$id_capitulo] = $m_secciones->buscar($id_capitulo);   

                 /*3)Consultando Preguntas================================================/*/
                 $m_preguntas=new FdPreguntaSearch();
                 $r_pregunta[$id_capitulo]=$m_preguntas->buscar($id_capitulo,$id_conj_prta,$id_conj_rpta);


             }
             $_conteo+=1;
        }
            
        //Eliminando capitulos condicionados==================================================================
        foreach($_positions as $_clpos){
            unset($_capitulos[$_clpos]);
        }
        $_capitulos = array_values($_capitulos);
        
        
        /*4) Organizando Preguntas con seccion o sin seccion          ==========================================*/
        $r_pnoseccion=array();
        $r_pseccion=array();
        $_rptamodel=array();
        $_rptapreguntas=array();
        $_contadorrpta=0;
        
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


               /* Organizando vectores de pregunta 
                * con seccion y sin seccion`*/
               $_indiceseccion=$_claverecor['id_seccion'];
               $_indicepregunta=$_claverecor['id_pregunta'];
               $_campo=$this->_respuestastipo($_claverecor['id_tpregunta']);           /*Asigna el campo de respuesta segun el tipod de pregunta*/

               if(empty($_indiceseccion)){
                   $r_pnoseccion[$_indicecap][$_indicepregunta]=['id_capitulo'=>$_claverecor['id_capitulo'],'id_conjunto_pregunta'=>$_claverecor['id_conjunto_pregunta'],'id_pregunta'=>$_indicepregunta,'nom_pregunta'=>htmlentities($_claverecor['nom_pregunta']),'id_tpregunta'=>$_claverecor['id_tpregunta'],'num_col_label'=>$_claverecor['num_col_label'],'num_col_input'=>$_claverecor['num_col_input'],'visible'=>$_claverecor['visible'],'visible_desc_pregunta'=>$_claverecor['visible_desc_preg'],'max_largo'=>$_claverecor['max_largo'],'min_largo'=>$_claverecor['min_largo'],'obligatorio'=>$_claverecor['obligatorio'],'min_date'=>$_claverecor['min_date'],'max_date'=>$_claverecor['max_date'],'atributos'=>$_claverecor['atributos'],'reg_exp'=>$_claverecor['reg_exp'],'max_number'=>$_claverecor['max_number'],'min_number'=>$_claverecor['min_number'],'id_tselect'=>$_claverecor['id_tselect'],'id_agrupacion'=>$_claverecor['id_agrupacion'],'tp_url_subpantalla'=>$_claverecor['tp_url_subpantalla'],'ayuda_pregunta'=>$_claverecor['ayuda_pregunta'],'id_respuesta'=>$_claverecor['id_respuesta'],'ag_descripcion'=>$_claverecor['ag_descripcion'],'respuesta'=>$_claverecor[$_campo],'stylecss'=>$_claverecor['stylecss'],'caracteristica_preg'=>$_claverecor['caracteristica_preg'],'ag_num_col'=>$_claverecor['ag_num_col'],'ag_num_row'=>$_claverecor['ag_num_row'],'format'=>$_claverecor['format'],'numerada'=>$_numeracionpreg,'id_pregunta_habilitadora'=>$_claverecor['id_pregunta_habilitadora'],'operacion'=>$_claverecor['operacion'],'valor'=>$_claverecor['valor'],'tipo_agrupacion'=>$_claverecor['tipo_agrupacion']];
               }else{
                   $r_pseccion[$_indicecap][$_indiceseccion][$_indicepregunta]=['id_capitulo'=>$_claverecor['id_capitulo'],'id_conjunto_pregunta'=>$_claverecor['id_conjunto_pregunta'],'id_pregunta'=>$_indicepregunta,'nom_pregunta'=>htmlentities($_claverecor['nom_pregunta']),'id_tpregunta'=>$_claverecor['id_tpregunta'],'num_col_label'=>$_claverecor['num_col_label'],'num_col_input'=>$_claverecor['num_col_input'],'visible'=>$_claverecor['visible'],'visible_desc_pregunta'=>$_claverecor['visible_desc_preg'],'max_largo'=>$_claverecor['max_largo'],'min_largo'=>$_claverecor['min_largo'],'obligatorio'=>$_claverecor['obligatorio'],'min_date'=>$_claverecor['min_date'],'max_date'=>$_claverecor['max_date'],'atributos'=>$_claverecor['atributos'],'reg_exp'=>$_claverecor['reg_exp'],'max_number'=>$_claverecor['max_number'],'min_number'=>$_claverecor['min_number'],'id_tselect'=>$_claverecor['id_tselect'],'id_agrupacion'=>$_claverecor['id_agrupacion'],'tp_url_subpantalla'=>$_claverecor['tp_url_subpantalla'],'ayuda_pregunta'=>$_claverecor['ayuda_pregunta'],'id_respuesta'=>$_claverecor['id_respuesta'],'ag_descripcion'=>$_claverecor['ag_descripcion'],'respuesta'=>$_claverecor[$_campo],'stylecss'=>$_claverecor['stylecss'],'caracteristica_preg'=>$_claverecor['caracteristica_preg'],'ag_num_col'=>$_claverecor['ag_num_col'],'ag_num_row'=>$_claverecor['ag_num_row'],'format'=>$_claverecor['format'],'numerada'=>$_numeracionpreg,'id_pregunta_habilitadora'=>$_claverecor['id_pregunta_habilitadora'],'operacion'=>$_claverecor['operacion'],'valor'=>$_claverecor['valor'],'tipo_agrupacion'=>$_claverecor['tipo_agrupacion']];
               }
                
            }
            
        }
        
        //Si no existen capitulos se envia un excepcion =======================================================================================
        if(count($_arraycap)==0 and $inc_datos_generales == FALSE and $inc_basicos_coorubicacion == FALSE){
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
           
           
            /*4-1-1) Agregando modelo de datos generales*/
           if($inc_datos_generales == TRUE){
               
               if(!empty($_findsearch= FdDatosGenerales::find()->where(['id_conjunto_respuesta' => $id_conj_rpta])->one())){
                   $_modelgenerales  = $_findsearch;
               }else{
                   $_modelgenerales = new FdDatosGenerales();
               }
           }else{
               $_modelgenerales="";
           }
           
           
           
           if($inc_basicos_coorubicacion == TRUE){
               
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
               }
           }else{
               
               $_modelbasicos="";
               $_modelbasicos_coordenadas="";
               $_modelbasicos_ubicacion="";
               $cantonesPost="";
               $DemarcacionPost="";
           }
           
           
           /**Organizando vista puro HTML**/
            $_helperHTML= new helperHTML();
            $_helperHTML->id_conj_rpta = $id_conj_rpta;
            $_helperHTML->tipo_archivo=$tipoarchivo;
            $_helperHTML->gen_formatoHTML($_capitulos,$r_pnoseccion,$r_secciones,$r_pseccion,$_numeracionpreg,$_permisos,$_modelgenerales,$model,$_modelbasicos,$_modelbasicos_coordenadas,$_modelbasicos_ubicacion);
            $_vista = $_helperHTML->htmlvista;
            
            
            $_vista = $this->limpiarhtml($_vista);
            
            Yii::trace('Vista generada para el capitulo nuevo'.$_vista,'DEBUG');
            
            if($vista==null){
                return $this->render('formatoHTML', [
                        '_stringhtml'=>$_vista,'nombre_formato'=>$_nombreformato,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado
                ]);
            }else{
                return $_vista;
            }
           
        
    }
    
    
    /**Evalua las codnciones un capitulo puede tener tres tipos de condiciones
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
    
    
    /*Funcin para limpiar el stringhtml errores
     * que ocurren al cambiar de un tipo de pregunta normal a uno de  tipo table por aparte,
     * 
     */
    
     public function limpiarhtml($_stringhtml){
        
        $_stringhtml=str_replace("<tr></tr>","",$_stringhtml);
        $_stringhtml= str_replace('</tr></tr>', '</tr>', $_stringhtml);
        $_stringhtml= str_replace('</td></table>', '</td></tr></table>', $_stringhtml);
        $_stringhtml= str_replace('</td><tr>', '</td></tr><tr>', $_stringhtml);
        $_stringhtml= str_replace('<table><table>', '<table>', $_stringhtml);
        $_stringhtml= str_replace('<table></table>', '', $_stringhtml);
        $_stringhtml= str_replace("<table class='tbespeciales'></table>", '', $_stringhtml);
        $_stringhtml= str_replace('</table></table>', '</table>', $_stringhtml);
        $_stringhtml= str_replace('<tr></table>', '</table>', $_stringhtml);
        $_stringhtml= str_replace('<table></tr>', '<table>', $_stringhtml);
        $_stringhtml= str_replace("<table class='tbespeciales' width='100%'></tr>", "<table class='tbespeciales' width='100%'>", $_stringhtml);
        $_stringhtml= str_replace("<table width='100%' class='tbespeciales'></tr>", "<table width='100%' class='tbespeciales'>", $_stringhtml);
        $_stringhtml= str_replace("<table class='tbespeciales'></tr>", "<table class='tbespeciales' width='100%'>", $_stringhtml);
        $_stringhtml= str_replace('rowspan=""', '', $_stringhtml);
        $_stringhtml= str_replace('colspan=""', '', $_stringhtml);
        
        return $_stringhtml;
        
    }
    
    
    //=================================FUNCIONES PARA GENERAR ARCHIVO PDF EXCEL O WORD====================================//
    
    //No funciona no se cual sea el error que hay por que no me genera cuando se asigna PDF
    //Se usara lo mismo directamente con el widget de YII
    public function actionGenpdf($id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,$nombre_formato=null,$id_capitulo=null){
        
        //Generando contenido HTML
        $_stringprint = $this->actionGenhtml($id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,'retorno',$id_capitulo);
        
        //Probando CSS en Linea
        //$_css=".nomcapitulo{ font-size: 1.8em; font-family:arial; color:#4169E1; font-weight: bolder; border: solid 2px #000; }";
        
        //Iniciando array de retorno
        $datos=[];
        
        //Declarando Metodos header and footer
        $methods = [ 
            'SetHeader'=>['POC'], 
            'SetFooter'=>['{PAGENO}'],
        ];
        
        //Si nmbre formato viene vacio se busca en la bd
         if($nombre_formato==null){
            $m_formato= FdFormato::findOne($id_fmt);
            $nombre_formato = $m_formato->nom_formato;
        }
        
        
        //Generando el PDF==================================================================================================
        $GeneraPdf = new genPDF();
        $propiedades=array('formato'=>$GeneraPdf::FORMATO_A4,'destino'=>$GeneraPdf::DESTINO_NAVEGADOR);
        $retorno=$GeneraPdf->generadorPDF($_stringprint,$nombre_formato,$propiedades,null,$methods,null,'@vendor/kartik-v/yii2-mpdf/assets/format.css');
        $datos['pdf']=$retorno;         
    }
    
    
    
    //Funcion para generar archivo PDF
    //basandose en el string HTML generado para el formato
    /*public function actionGenpdf($id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,$nombre_formato=null,$id_capitulo=null){
        
        //Generando String
        $_stringprint = $this->actionGenhtml($id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,'retorno',$id_capitulo);
        $_stringprint= str_replace('row=""', '', $_stringprint);
        
        //Yii::trace('string pdf'.$_stringprint, 'DEBUG');
        if($nombre_formato==null){
            $m_formato= FdFormato::findOne($id_fmt);
            $nombre_formato = $m_formato->nom_formato;
        }
                      
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $_stringprint,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/format.css',
            // any css to be embedded if required
            'cssInline' => '.nomcapitulo{ font-family:arial; color:#4169E1; font-weight: bolder; border: solid 2px #000;font-size:14pt }',            // set mPDF properties on the fly
            'options' => ['title' => 'Reporte PDF Formato '.$nombre_formato],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>[$nombre_formato], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render(); 
 
        
    }*/
    
    
    
    /*Funcion para genera el formato en EXCEL*/    
    public function actionGenexcel($id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,$nombre_formato=null,$id_capitulo=null){
        
        
        /*Generando contenido HTML*/
        $_stringprint = $this->actionGenhtml($id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,'retorno',$id_capitulo,'excel');
       
        /*Se modifica la siguiente secuencia de codigo teniendo en cuetna que la libreria no reconoce table dentro de table*/
        
        //Iniciando array de retorno
        $datos=[];
        
        if($nombre_formato==null){
            $m_formato= FdFormato::findOne($id_fmt);
            $nombre_formato = $m_formato->nom_formato;
        }
        
        $GeneraExcel = new genExcel();
        $GeneraExcel->generadorExcelHTML2($_stringprint,$nombre_formato,'css/formato.css');
        
    }
    
    
    
    
    /*Funcion para general el formato en Word*/
    public function actionGenword($id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,$nombre_formato=null,$id_capitulo=null){
        
        
        /*Generando contenido HTML*/
        $_stringprint = $this->actionGenhtml($id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,'retorno',$id_capitulo);
        
        if($nombre_formato==null){
            $m_formato= FdFormato::findOne($id_fmt);
            $nombre_formato = $m_formato->nom_formato;
        }
        
        
        //Generando Excel========================================================================================
        $Generaword = new genWord_ex();
        $Generarword = $Generaword->genFile($nombre_formato, $_stringprint, 'css/formato.css');
     
    }
    
    
    
    
    
}

