<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;


//Agregando Modelos
use common\models\autenticacion\Cantones;                   //Se agrega modelo cantones
use common\models\autenticacion\Parroquias;                 //Se agrega modelo parroquias
use common\models\poc\FdAdmEstado;                          //Se agrega modelo Admestado
use common\models\poc\TrPeriodo;                            //Se agrega modelo Trperiodo


class GestorformatosController extends Controller
{
 
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
    
    /**
     * Esta accion nos lleva al index y envia en un primer acceso el array para la grilla vacio y ademas pasa la list de valores de provincias
	 * segun usuario conectado
     * @return mixed
     */
    public function actionIndex($provincia=null,$cantones=null,$parroquias=null,$periodos=null,$id_fmt=null,$estado=null,$hashbutton=null)
    {            
            /*En yii normal antes del cambio de andres la identidad del usuario venia de user_name, 
             * con el nuevo login es "usuario" */
        
            $user_login=(isset(Yii::$app->user->identity->usuario))? Yii::$app->user->identity->usuario:'';
            
            //Sacando listado de provincias asociadas al usuario===================================================================
            $list = $this->getProvincias();
            
            //Mantener valor de cantones seleccionado en le formaulrio ===========================================================
            if(!empty($provincia)){
                $_initCantones = $this->actionListado('2',$provincia);
            }else{
                $_initCantones = array();
            }
            
            //Mantener valor de parroquias seleccionado===========================================================================
            if(!empty($cantones)){
                $_initParroquias = $this->actionListadop('2',$provincia,$cantones);
               // \yii\helpers\VarDumper::dump($_initParroquias);
            }else{
               $_initParroquias= array() ;  
            }
            
            
            //Mantener valor de Estado y Periodo ==================================================================================
            if(!empty($id_fmt)){
                $_initData = $this->actionListadoe('2', $id_fmt);
                
                $_initEstados = $_initData[0];
                $_initPeriodos = $_initData[1];
                   
            }else{
                $_initEstados = array();
                $_initPeriodos = array();
            }
            
            
            //Sacando listado de Formatos asociados al usuario=====================================================================
            $list_formato= $this->getFormatos();
            $list_juntas="";
            
            $filtros_search="";
            $url_acceso="";
            $valores = array_values($list_formato);
            $separa_form = explode("-",$valores[0]);
            if(!empty($separa_form[3]))
              $filtros_search =$separa_form[3];
            if(!empty($separa_form[2]))
              $url_acceso =$separa_form[2];
            
            if(key($list_formato)==6)
              $list_juntas= $this->getJuntas();                    
           
            
            //Generando modelo de busqueda================================================================================================
            $_modelsearch = new \common\models\poc\Gestorformato();
                        
            
            $_modelsearch->provincia = (!empty($provincia))? $provincia:NULL;
            $_modelsearch->cantones = (!empty($cantones))? $cantones:NULL;
            $_modelsearch->parroquias = (!empty($parroquias))? $parroquias:NULL;
            $_modelsearch->formato = (!empty($id_fmt))? $id_fmt:NULL;
            $_modelsearch->periodos = (!empty($periodos))? $periodos:NULL;
            $_modelsearch->estado= (!empty($estado))? $estado:NULL;
            $_modelsearch->user_login = (isset(Yii::$app->user->identity->usuario))? Yii::$app->user->identity->usuario:'';
       
            if($hashbutton === null){
                $grillaPost=array();
            }else{
                $grillaPost = $_modelsearch->search();
            }
            
            $dataProvider = new ArrayDataProvider([
               'allModels' => $grillaPost,
               'pagination' => [
                   'pageSize' => 10,
               ],
               'sort' => [
                   'attributes' => ['Entidad', 'Formato','Estado','Digitador'],
               ],
           ]);
        
            
            //Retornando valores=============================================================================================================
            return $this->render('index', [
                'dataProvider' => $dataProvider,'list' =>$list,
                'list_formato'=>$list_formato,'provincia'=>$provincia,
                'cantones'=>$cantones,'parroquias'=>$parroquias,
                'periodos'=>$periodos,'id_fmt'=>$id_fmt,'initcantones'=>$_initCantones,
                'initparroquias'=>$_initParroquias,
                'initestados'=>$_initEstados,
                'initperiodos'=>$_initPeriodos,'estado'=>$estado,
                'list_juntas'=>$list_juntas,
                'filtros_search'=>$filtros_search,
                'url_acceso'=>$url_acceso,
             ]);
            
           
    }
	
    
    /*Accion que trae las provincias asociadas al usuario
     * 
     */
    
    public function getProvincias(){
        
            $user_login=(isset(Yii::$app->user->identity->usuario))? Yii::$app->user->identity->usuario:'';
           $provinciasPost = Yii::$app->db->createCommand('SELECT provincias.* '
                                . 'FROM provincias '
                                . 'INNER JOIN entidades ON entidades.cod_provincia=provincias.cod_provincia or entidades.cod_provincia_p = provincias.cod_provincia '
                                . 'INNER JOIN regionentidades ON regionentidades.id_entidad=entidades.id_entidad '
                                . 'INNER JOIN region ON region.cod_region=regionentidades.cod_region '
                                . 'INNER JOIN perfil_region ON perfil_region.cod_region=region.cod_region '
                                . 'INNER JOIN usuarios_ap ON usuarios_ap.id_usuario=perfil_region.id_usuario '
                                . 'WHERE usuarios_ap."usuario"=:usuario ')
                                ->bindValue(':usuario',$user_login)           
                                ->queryAll();
            $list   = ArrayHelper::map($provinciasPost,'cod_provincia','nombre_provincia');
            
            return $list;

    }
    
    /*Funcion que trae los formatos asociados al usuario en session
     * 
     */
    
    public function getFormatos(){
        
         $user_login=(isset(Yii::$app->user->identity->usuario))? Yii::$app->user->identity->usuario:'';
         $formatoPOST = Yii::$app->db->createCommand('SELECT DISTINCT fd_formato.id_formato,CONCAT(fd_formato.num_formato,\'-\',fd_formato.nom_formato,\'-\',fd_formato.url_acceso,\'-\',fd_formato.filtros_search) as fullformato '
                                . 'FROM fd_formato '
                                . 'INNER JOIN fd_conjunto_respuesta ON fd_conjunto_respuesta.id_formato=fd_formato.id_formato '
                                . 'INNER JOIN entidades ON entidades.id_entidad=fd_conjunto_respuesta.id_entidad '
                                . 'INNER JOIN regionentidades ON regionentidades.id_entidad=entidades.id_entidad '
                                . 'INNER JOIN region ON region.cod_region=regionentidades.cod_region '
                                . 'INNER JOIN perfil_region ON perfil_region.cod_region=region.cod_region '
                                . 'INNER JOIN usuarios_ap ON usuarios_ap.id_usuario=perfil_region.id_usuario '
                                . 'WHERE usuarios_ap."usuario"=:usuario ')
                                ->bindValue(':usuario',$user_login)           
                                ->queryAll();
            
          $list_formato   = ArrayHelper::map($formatoPOST,'id_formato','fullformato');
          
          return $list_formato;
    }
    
    public function getJuntas()
    {
         $user_login=(isset(Yii::$app->user->identity->usuario))? Yii::$app->user->identity->usuario:'';
         $juntasPOST = Yii::$app->db->createCommand('SELECT DISTINCT juntas_gad.*'
                                . 'FROM juntas_gad '
                                . 'INNER JOIN fd_conjunto_respuesta ON fd_conjunto_respuesta.id_conjunto_respuesta=juntas_gad.id_conjunto_respuesta '
                                . 'INNER JOIN entidades ON entidades.id_entidad=fd_conjunto_respuesta.id_entidad '
                                . 'INNER JOIN regionentidades ON regionentidades.id_entidad=entidades.id_entidad '
                                . 'INNER JOIN region ON region.cod_region=regionentidades.cod_region '
                                . 'INNER JOIN perfil_region ON perfil_region.cod_region=region.cod_region '
                                . 'INNER JOIN usuarios_ap ON usuarios_ap.id_usuario=perfil_region.id_usuario '
                                . 'WHERE usuarios_ap."usuario"=:usuario ')
                                ->bindValue(':usuario',$user_login)           
                                ->queryAll();
            
          $list_juntas   = ArrayHelper::map($juntasPOST,'id_junta','nombre_junta');
          
          return $list_juntas;
    }
    
    //Accion que llena el listado de cantones con la provincia
    /*Listado de cantones segun provincia seleccionada => Este ejemplo se hace con find()

     * tipo = 1 entrega html para impresion
     * tipo = 2 entrega vector para presentacion     */
    
    public function actionListado($tipo,$id){

       $html="";    
       $user_login=(isset(Yii::$app->user->identity->usuario))? Yii::$app->user->identity->usuario:'';
       
       $cantonesPost=Cantones::find()
                        ->innerJoin('entidades', 'entidades.cod_canton=cantones.cod_canton or entidades.cod_canton_p=cantones.cod_canton')
                        ->innerJoin('regionentidades', 'regionentidades.id_entidad=entidades.id_entidad')
                        ->innerJoin('region', 'region.cod_region=regionentidades.cod_region')
                        ->innerJoin('perfil_region', 'perfil_region.cod_region=region.cod_region')
                        ->innerJoin('usuarios_ap', 'usuarios_ap.id_usuario=perfil_region.id_usuario')
                        ->where(['=', 'cantones.cod_provincia', $id])
                        ->andwhere(['=', 'usuarios_ap.usuario', $user_login])
                        ->all();
       
       if($tipo == 1){
            
            $html.="<option value=''>Seleccione un Canton</option>"; 

            if(count($cantonesPost)>0){
             foreach($cantonesPost AS $clave){
                 $html .= "<option value='".$clave->cod_canton."'>".$clave->nombre_canton."</option>";
             }
            }else{
                  $html .="<option value=''></option>";
            }  
            echo $html;
            
       }else if($tipo==2){
           
            $list_cantones   = ArrayHelper::map($cantonesPost,'cod_canton','nombre_canton');
           //  \yii\helpers\VarDumper::dump($list_cantones);
           
            return $list_cantones;
       }
    }
    
    
    
    
    //Accion que llena el listado de parroquias con el canton seleccionado
    public function actionListadop($tipo,$id_provincia,$id_canton){

        $html="";
        $modelo = new Parroquias();
        $parroquiasPost= $modelo->getParroquiasD($id_provincia,$id_canton);
       
        if($tipo == 1){
            
            $html.="<option value=''>Seleccione una Parroquia</option>"; 
            if(count($parroquiasPost)>0){
             foreach($parroquiasPost AS $clave){
                 $html.="<option value='".$clave->cod_parroquia."'>".$clave->nombre_parroquia."</option>";
             }
            }else{
                $html.="<option value=''></option>";
            }  

            echo $html;
            
        }else if($tipo == 2){
           
            $array_data = ArrayHelper::toArray($parroquiasPost,['common\models\autenticacion\Parroquias'=>['cod_parroquia','nombre_parroquia']]);
            $list_parroquias   = ArrayHelper::map($array_data,'cod_parroquia','nombre_parroquia');
            return $list_parroquias; 
            
        }
    }
    
    
    
     /*Entrega estados y periodos*/
     public function actionListadoe($tipo,$id){

        $variable1="";
        
        $estadosPost= FdAdmEstado::find()
        ->leftJoin('fd_modulo', 'fd_modulo.id_modulo=fd_adm_estado.id_modulo')
        ->leftJoin('fd_formato', 'fd_formato.id_modulo=fd_modulo.id_modulo')
        ->leftJoin('rol', 'rol.cod_rol=fd_adm_estado.cod_rol')
        ->leftJoin('perfiles', 'perfiles.cod_rol=rol.cod_rol')
        ->where(['=', 'fd_formato.id_formato', $id])
        ->andwhere(['=','perfiles.id_usuario',Yii::$app->user->identity->id_usuario])
        ->all();
        
         $periodosPost= TrPeriodo::find()
            ->leftJoin('fd_periodo_formato', 'fd_periodo_formato.id_periodo=tr_periodo.id_periodo')          
            ->leftJoin('fd_formato', 'fd_formato.id_formato=fd_periodo_formato.id_formato')
            ->where(['=', 'fd_formato.id_formato', $id])
            ->all();
        
        
        if($tipo == 1){
            
            $variable1.="<option value=''>Seleccione un Estado</option>"; 
            if(count($estadosPost)>0){
                foreach($estadosPost AS $clave){
                    $variable1.="<option value='".$clave->id_adm_estado."'>".$clave->nom_adm_estado."</option>";
                }

            }else{
                $variable1.="<option value=''></option>";
            }  

            $variable1.="::";
            $variable1.="<option value=''>Seleccione un Periodo</option>"; 

           

             if(count($periodosPost)>0){
                foreach($periodosPost AS $clave){
                    $variable1.="<option value='".$clave->id_periodo."'>".$clave->nom_periodo."</option>";
                }

            }else{
                $variable1.="<option value=''></option>";
            }  

            echo $variable1;
            
        }else if($tipo==2){
            
            $list_estados   = ArrayHelper::map($estadosPost,'id_adm_estado','nom_adm_estado');
            $list_periodos   = ArrayHelper::map($periodosPost,'id_periodo','nom_periodo');
            return [$list_estados,$list_periodos]; 
        }
        
    }
    
   
    
   /* public function actionGrilla()
    {
       
       $provincia = (Yii::$app->request->post('provincia'))? Yii::$app->request->post('provincia'):NULL;
       $cantones = (Yii::$app->request->post('cantones'))? Yii::$app->request->post('cantones'):NULL;
       $parroquias = (Yii::$app->request->post('parroquias'))? Yii::$app->request->post('parroquias'):NULL;
       $formato = (Yii::$app->request->post('formato'))? Yii::$app->request->post('formato'):NULL;
       $periodos = (Yii::$app->request->post('periodos'))? Yii::$app->request->post('periodos'):NULL;
       $estado = (Yii::$app->request->post('estados'))? Yii::$app->request->post('estados'):NULL;
       $user_login=(isset(Yii::$app->user->identity->usuario))? Yii::$app->user->identity->usuario:'';
       
       $filtro="";
       $v_bindvalues=array();
       
       
       
       if(!empty($cantones)){
           $filtro.=" WHERE (entidades.cod_canton=:cantones or entidades.cod_canton_p=:cantones) ";
           $v_bindvalues[':cantones']=$cantones;
       }
       
       $_comandosql=(!empty($filtro))? " AND ":" WHERE ";
       
       if(!empty($provincia)){
           $filtro.=$_comandosql." (entidades.cod_provincia=:provincia or entidades.cod_provincia_p=:provincia) ";
           $v_bindvalues[':provincia']=$provincia;
       }
       
       $_comandosql=(!empty($filtro))? " AND ":" WHERE ";

       if(!empty($parroquias)){
           $filtro.=$_comandosql." entidades.cod_parroquia=:parroquias ";
            $v_bindvalues[':parroquias']=$parroquias;
       }
       
        $_comandosql=(!empty($filtro))? " AND ":" WHERE ";
       
       if(!empty($formato)){
           $filtro.=$_comandosql." fd_conjunto_respuesta.id_formato=:formato ";
            $v_bindvalues[':formato']=$formato;
       }
       
       $_comandosql=(!empty($filtro))? " AND ":" WHERE ";
        
       if(!empty($periodos)){
           $filtro.=$_comandosql." fd_conjunto_respuesta.id_periodo=:periodos ";
           $v_bindvalues[':periodos']=$periodos;
       }
       
        $_comandosql=(!empty($filtro))? " AND ":" WHERE ";
        
       if(!empty($estado)){
           $filtro.=$_comandosql." fd_conjunto_respuesta.ult_id_adm_estado=:estado ";
           $v_bindvalues[':estado']=$estado;
       }
       
       
       //Se agrega codigo a la consulta de la grilla de gestor formatos, que valida si el usuario puede o no ver el formato
       $_comandosql=(!empty($filtro))? " AND ":" WHERE ";
       
       $filtro.=$_comandosql.' usuarios_ap."usuario"= :usuario ';
       $v_bindvalues[':usuario']=$user_login;
               
       if(empty($filtro)){
           return $this->redirect(['index',"provincia"=>"","cantones"=>"","parroquias"=>"","periodos"=>"","id_fmt"=>"","estado"=>""]);
       }
       
       
       
       
       
        
       
       
        
        return $datos;
         
    }*/
    
    
}
