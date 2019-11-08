<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\InformacionprestadoresapsControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use common\models\poc\FdAdmEstadoSearch;
use common\models\poc\FdTipoSelect;
use common\models\poc\FdOpcionSelect;
use yii\helpers\ArrayHelper;

/**
 * InformacionprestadoresController implementa las acciones a través del sistema CRUD para el modelo Informacionprestadores.
 */
class InformacionprestadoresapsController extends ControllerPry
{
  //private $facade =    InformacionprestadoresapsControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  InformacionprestadoresapsControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute, $id_fmt, $id_conj_prta, $id_cnj_rpta, $migadepan,$estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista){
            $facade =  new  InformacionprestadoresapsControllerFachada;
            echo $facade->actionProgress($urlroute, $id_fmt, $id_conj_prta, $id_cnj_rpta, $migadepan, $estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista);
    }

	
	
    /**
     * Listado todos los datos del modelo Informacionprestadores que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($id_fmt,$id_conj_prta,$id_cnj_rpta,$estado,$provincia,$cantones,$hashbutton)
    {
        
                //0)Verificando permisos del usuario========================================================
        if (empty(Yii::$app->user->identity->usuario)) {
            return $this->redirect(['site/index']);
        } else {
            $m_permisos = new FdAdmEstadoSearch();
            $_login = Yii::$app->user->identity->usuario;
            $_permisos = $m_permisos->buscar($id_fmt, $id_cnj_rpta, $_login);

            if (empty($_permisos)) {
                return $this->redirect(['site/index']);
            } elseif ($_permisos['p_actualizar'] == 'S') {
                $_boton = false;
            } elseif ($_permisos['p_actualizar'] == 'N') {
                $_boton = true;
            }
        }
        
        $list_provincias = $this->getProvincias();
        $_initCantones = array();

        $_post= Yii::$app->request->post();
        $list_entaps=array();
               
       if(!empty($hashbutton))
       {

            if(!empty($provincia)){
                  $_initCantones = $this->actionListado('2',$provincia);
               }else{
                  $_initCantones = array();
               }
            
            $list_entaps = $this->getEntidadesaps($provincia,$cantones);
       }        
       if(!empty($_post))
         {           
             
              $provincia = @$_post['provincia'];
              $cantones = @$_post['cantones'];
            
            if(!empty($provincia)){
                  $_initCantones = $this->actionListado('2',$provincia);
               }else{
                  $_initCantones = array();
               }
            
            $list_entaps = $this->getEntidadesaps($provincia,$cantones);            
         }
        $facade =  new InformacionprestadoresapsControllerFachada;
        //$dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        $_busquedap = ['InformacionprestadoresSearch' => [
                        'id_conjunto_respuesta' => $id_cnj_rpta,
                    ]];

        //$dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        $dataAndModel = $facade->actionIndex($_busquedap);
        
        $_conteodata = $dataAndModel['dataProvider']->getTotalCount();

        

        //Enviando dato para habilitar o no boton adicionar
        if ($_conteodata == 0) {
            $_btnadd = true;
        } else {
            $_btnadd = false;
        }
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'id_fmt' => $id_fmt,            
            'id_conj_prta' => $id_conj_prta,
            'id_cnj_rpta' => $id_cnj_rpta,             
            'estado' => $estado,
            'btnadd' => $_btnadd,
            'list_entaps'=>$list_entaps,
            'list_provincias'=>$list_provincias,
            'initcantones'=>$_initCantones,
            'provincia'=>$provincia,
            'cantones'=>$cantones,
        ]);
    }

    /**
     * Presenta un dato unico en el modelo Informacionprestadores.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  InformacionprestadoresriegoControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

  
   
    public function getEntidadesaps($provincia,$cantones){
        
        if(!empty($provincia) && !empty($cantones) )
        {
             $formatoPOST = Yii::$app->db->createCommand('select ent.nombre_entidad as enti, CONCAT(res.id_conjunto_respuesta,\'/\',dgr.id_junta)as id_conj_res,CONCAT(dgr.nombres_prestador,\'/\',ubi.cod_provincia,\'/\',ubi.cod_canton) as presta
                                                    from entidades as ent 
                                                    inner join fd_conjunto_respuesta as res on ent.id_entidad = res.id_entidad
                                                    inner join fd_datos_generales_comunitario_ap as dgr on dgr.id_conjunto_respuesta = res.id_conjunto_respuesta
                                                    inner join fd_ubicacion as ubi on ubi.id_conjunto_respuesta = res.id_conjunto_respuesta
                                                    where res.id_formato=:formato and ubi.cod_provincia=:provincia and ubi.cod_canton=:cantones')
                  ->bindValue(':formato',6)    
                  ->bindValue(':provincia',$provincia)  
                  ->bindValue(':cantones',$cantones)  
                  ->queryAll();
                    
         }
        else if(!empty($provincia))
        {
           $formatoPOST = Yii::$app->db->createCommand('select ent.nombre_entidad as enti, CONCAT(res.id_conjunto_respuesta,\'/\',dgr.id_junta)as id_conj_res,CONCAT(dgr.nombres_prestador,\'/\',ubi.cod_provincia,\'/\',ubi.cod_canton) as presta
                                                    from entidades as ent 
                                                    inner join fd_conjunto_respuesta as res on ent.id_entidad = res.id_entidad
                                                    inner join fd_datos_generales_comunitario_ap as dgr on dgr.id_conjunto_respuesta = res.id_conjunto_respuesta
                                                    inner join fd_ubicacion as ubi on ubi.id_conjunto_respuesta = res.id_conjunto_respuesta
                                                    where res.id_formato=:formato and ubi.cod_provincia=:provincia')
                  ->bindValue(':formato',6)    
                 ->bindValue(':provincia',$provincia)  
                  ->queryAll();
        }
        
        else
        {
            $formatoPOST = Yii::$app->db->createCommand('select ent.nombre_entidad as enti, CONCAT(res.id_conjunto_respuesta,\'/\',dgr.id_junta)as id_conj_res,CONCAT(dgr.nombres_prestador,\'/\',ubi.cod_provincia,\'/\',ubi.cod_canton) as presta
                                                    from entidades as ent 
                                                    inner join fd_conjunto_respuesta as res on ent.id_entidad = res.id_entidad
                                                    inner join fd_datos_generales_comunitario_ap as dgr on dgr.id_conjunto_respuesta = res.id_conjunto_respuesta                                                    
                                                    inner join fd_ubicacion as ubi on ubi.id_conjunto_respuesta = res.id_conjunto_respuesta
                                                    where res.id_formato=:formato')
                  ->bindValue(':formato',6)     
                  ->queryAll();
        }
          $list_formato   = ArrayHelper::map($formatoPOST,'presta','id_conj_res');          
          return $list_formato;
    }
    public function getProvincias(){
        
           
           $provinciasPost = Yii::$app->db->createCommand('SELECT * FROM provincias')
                                ->queryAll();
            $list   = ArrayHelper::map($provinciasPost,'cod_provincia','nombre_provincia');
            
            return $list;

    }
    
    public function actionListado($tipo,$id){

       $html="";    
       $user_login=(isset(Yii::$app->user->identity->usuario))? Yii::$app->user->identity->usuario:'';
       
       $cantonesPost=  \common\models\autenticacion\Cantones::find()
                        ->where(['=', 'cantones.cod_provincia', $id])
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
    
    public function ObtenerNombreProvincia($cod_prov)
    {    
        $provincias = \common\models\autenticacion\Provincias::find()
                ->where(['=','provincias.cod_provincia',$cod_prov])->one();
        return $provincias['nombre_provincia'];
    }
    
    public function ObtenerNombreCanton($cod_prov,$cod_canton)
    {
    
        $provincias = \common\models\autenticacion\Cantones::find()
                ->where(['=','cantones.cod_provincia',$cod_prov])
                ->andWhere(['=','cantones.cod_canton',$cod_canton])
                ->one();
        return $provincias['nombre_canton'];
    }
    
    public function ObtenerNombreDemarcacion($cod_prov,$cod_canton)
    {    
        $provincias = \common\models\autenticacion\Cantones::find()
                ->where(['=','cantones.cod_provincia',$cod_prov])
                ->andWhere(['=','cantones.cod_canton',$cod_canton])
                ->one();
        $demarcac = $provincias['id_demarcacion'];
        $nom_demarca = \common\models\autenticacion\Demarcaciones::find()
                ->where(['=','demarcaciones.id_demarcacion',$demarcac])
                ->one();
        return $nom_demarca->nombre_demarcacion;
    }
}
