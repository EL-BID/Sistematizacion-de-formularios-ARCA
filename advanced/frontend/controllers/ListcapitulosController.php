<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;               //Para presentar la barra de espera
use yii\helpers\Url;                //Para presentar la barra de espera
use common\models\poc\FdCapituloSearch;
use frontend\helpers\helperHTML;
use common\models\poc\FdAdmEstadoSearch;
use common\models\poc\FdElementoCondicion;
use common\models\poc\FdPregunta;
use common\models\poc\FdRespuesta;
use common\models\poc\FdDatosGenerales;

/**
 * Clase que controla las acciones del dashboard
 */
class ListcapitulosController extends Controller
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
	
	
    /*
     * @id_conj_rpta => id del conjunto de respuesta
     * @id_conj_prta => id del conjunto de pregunta
     * @id_fmt => id del formato
     * @last => ultima version
     * @estado => id_adm_estado
     */
   
    
    public function actionIndex($id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,$provincia,$cantones,$parroquias,$periodos)
    {
       /*1) Buscando Permisos del usuario===============================================
        * Esto permite evaluar si un usuario tienes permisos de actualizar, crea, borrar o ejecutar, se deja ver los capitulos
        * si el rol de usuario permite actualizar */

       $user_login=(isset(Yii::$app->user->identity->usuario))? Yii::$app->user->identity->usuario:'';
       
       if(!empty($user_login)){
           $_permisosuser = new FdAdmEstadoSearch();
           $_vpermisosuser = $_permisosuser->buscar($id_fmt,$id_conj_rpta,$user_login); 
       }else{
           return $this->redirect(['site/index']);
       }
      
       
       
       /*Realizando la busqueda de los capitulos asociados a la seleccion del usuario
        */
       $_dashboardPost = new FdCapituloSearch();
       $_arraycapitulos = $_dashboardPost->searcCapFormato($id_fmt, $id_conj_prta, $estado,null,$id_conj_rpta);
       
       
       //Verificando las condiciones de los Capitulos=========================================//
       $_positions = array();
       $_conteo= "0";
       
       foreach($_arraycapitulos as $_clave){
           
           /*Se verifica si el capitulo esta condicionado*/
           if($_clave['condiciones'] > 0){
               $_eliminar = $this->evaluarcondiciones($_clave['id_capitulo'],$id_fmt,$id_conj_rpta,$last,$id_conj_prta,$_vpermisosuser['cod_rol']);
               
               if($_eliminar === FALSE){
                   $_positions[] = $_conteo;
               }
           }
           
           if($_clave['url'] == 'poc/datosbasicos.php'){
               $_dil_DatosGenerales= FdDatosGenerales::find()
               ->where(['id_conjunto_respuesta' => $id_conj_rpta])
               ->andWhere(['not', ['nombres' => null]])
               ->andWhere(['not', ['num_documento' => null]])
               ->andWhere(['not', ['num_convencional' => null]])
               ->andWhere(['not', ['correo_electronico' => null]])
               ->andWhere(['not', ['num_celular' => null]])
               ->andWhere(['not', ['direccion' => null]])
               ->andWhere(['not', ['descripcion_trabajo' => null]])
               ->andWhere(['not', ['nombres_apellidos_replegal' => null]])  
               ->andWhere(['not', ['id_tdocumento' => null]])
               ->andWhere(['not', ['id_natu_juridica' => null]])->one();
           }
           
           
           if($_clave['url'] == 'poc/basicosubicacioncoordenada.php'){
               $_dil_DatosGenerales_var= \common\models\poc\FdDatosGenerales_var::find()
               ->where(['id_conjunto_respuesta' => $id_conj_rpta])
               ->andWhere(['not', ['nombres' => null]])
               ->andWhere(['not', ['nom_replegal' => null]])
               ->andWhere(['not', ['nom_sistema' => null]])
               ->andWhere(['not', ['fecha' => null]])->one();
           }
           
           $_conteo+=1;
       }
       
       
       foreach($_positions as $_clpos){
           unset($_arraycapitulos[$_clpos]);
       }
       $_arraycapitulos = array_values($_arraycapitulos);
       
       
       /*Generando vista para el usuario=======================================*/
       $_helperHTML = new helperHTML();
       
       /*Registrando variables por si vienen vacias===============================*/
       if(empty($_dil_DatosGenerales)){
           $_dil_DatosGenerales = null;
       }
       
       if(empty($_dil_DatosGenerales_var)){
           $_dil_DatosGenerales_var = null;
       }
       
       $_HTMLdashboard = $_helperHTML->gen_listcapitulos($_arraycapitulos,$id_conj_rpta,$id_conj_prta,$id_fmt,$last,$estado,'listcapitulos/index',$_vpermisosuser,$_dil_DatosGenerales,$_dil_DatosGenerales_var);
       
       if($_HTMLdashboard[0] === FALSE){
           
            throw new \yii\web\HttpException(404, 'No tiene permisos para visualizar el Listado de Capitulos');
            
       }else{
           
           return $this->render('index', [
            '_stringhtml' => $_HTMLdashboard[0],'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'provincia'=>$provincia,'cantones' => $cantones,'parroquias' => $parroquias, 'periodos' => $periodos
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
               
               if($_mostrarcapitulo === FALSE){
                    throw new \yii\web\HttpException(404, 'El comparador no es valido en la condicion '.$_clavecondiciones->id_condicion.'.');
                }
            }
            
            /*Evalua condicion tipo 2)*/
            else if(!empty($_clavecondiciones->id_adm_estado) and $_clavecondiciones->id_tcondicion == '3'){
                $_mostrarcapitulo = $this->condicionalidades($last, $_clavecondiciones->operacion, $_clavecondiciones->id_adm_estado);
                
                if($_mostrarcapitulo === FALSE){
                    throw new \yii\web\HttpException(404, 'El comparador no es valido en la condicion '.$_clavecondiciones->id_condicion.'.');
                }
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
    
   
    
}

