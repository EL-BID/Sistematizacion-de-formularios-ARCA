<?php

namespace frontend\controllers\pqrs;

use Yii;
use frontend\controllers\pqrs\DetallepqrsControllerFachada;
use frontend\controllers\pqrs\PqrsControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\data\ArrayDataProvider;

/**
 * ModulocdaController implementa las acciones a través del sistema CRUD para el modelo Cda.
 */
class DetallepqrsController extends ControllerPry
{
  //private $facade =    ModulocdaControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  DetallepqrsControllerFachada;
        return $facade->behaviors();
    }
	
   
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  DetallepqrsControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo Cda que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($numero,$id_pqr)
    {
        //Verifcando conexion
        if(empty(Yii::$app->user->identity->usuario)){
             return $this->redirect(['site/index']);
        }
        
        $facade =  new DetallepqrsControllerFachada;
        
        //Guardando en Trazabilidad Informacion el acceso=====================================================================//
        Yii::info("Ingreso al modulo PQRS numero :".$numero.", el parametro corresponde al campo numero de la tabla ps_cproceso&6&1","Trazabilidad");
        
        
        //Recibiendo Encabezado ============================================================================================//
        $_facadepqrs = new PqrsControllerFachada();
        $_encabezado = $_facadepqrs->getEncabezado($id_pqr);
      

        //Recogiendo validacion para presentar boton de datos basicos ===================================================//
        $_showdatosbasicos = $this->showEditardatosbasicos($_encabezado->usuario['id_usuario']);
        
        
        //Recogiendo actividades para presentar en pantalla =============================================================//
        $actividades = $facade->findActividades($_encabezado->id_cproceso);
        
        
        //Permisos para ver el boton de edicion de actividad=============================================================//
        $edicionactividad = $this->showEdicionactividad($_encabezado->usuario['id_usuario'],$_encabezado->id_cproceso);
        $_ultimaactividadCproceso =  $facade->asignado_actividad($_encabezado->id_cproceso, '2');
        
        
        //Organiznado informacion para actividad dinamica ===============================================================//
        $validaciones = $this->accionesruta($_ultimaactividadCproceso);
        
        
        return $this->render('index',['encabezado'=>$_encabezado,'_showdatosbasicos'=>$_showdatosbasicos[0],'_urldatosbasicos'=>$_showdatosbasicos[1],'actividades'=>$actividades,'edicionactividad'=>$edicionactividad,'ultimacactividadproceso'=>$_ultimaactividadCproceso,'validaciones'=>$validaciones]);
        
    }
    
    
    protected function accionesruta($_ultimaactividadCproceso){
                
        $acciones=array();
        $facade =  new DetallepqrsControllerFachada;
        $_tipopantallaruta = $facade->findrutadinamina($_ultimaactividadCproceso);
        
        
        if(!empty($_tipopantallaruta) and $_tipopantallaruta['tipo_pantalla_ruta'] == -1){
       
           $acciones['dinamicaguardar'] = TRUE;
           $acciones['dinamicaactividad'] = FALSE;
           $acciones['nom_actividad'] =  $_tipopantallaruta['nom_destino'];
           $acciones['id_actividad_destino'] = $_tipopantallaruta['id_actividad_destino'];
           $acciones['id_actividad_origen'] = $_tipopantallaruta['id_actividad_origen'];
           $acciones['id_clasif_actividad'] = $_tipopantallaruta['clas_destino'];
           $acciones['id_eproceso'] = $_tipopantallaruta['id_eproceso'];

          
           
       }else if(!empty($_tipopantallaruta) and $_tipopantallaruta['tipo_pantalla_ruta']==0){
           
           $acciones['dinamicaguardar'] = FALSE;
           $acciones['dinamicaactividad'] = TRUE;
           $acciones['nom_actividad'] = $_tipopantallaruta['nom_destino'];
           $acciones['id_actividad_destino'] = $_tipopantallaruta['id_actividad_destino'];
           $acciones['id_actividad_origen'] = $_tipopantallaruta['id_actividad_origen'];
           $acciones['id_clasif_actividad'] = $_tipopantallaruta['clas_destino'];
           $acciones['id_eproceso'] = $_tipopantallaruta['id_eproceso'];
           
       }else{
           
           $acciones['dinamicaguardar'] = FALSE;
           $acciones['dinamicaactividad'] = FALSE;
         //  $acciones['nom_actividad'] = $_tipopantallaruta->idActividadDestino->nom_actividad;
           
       }
       
       
       return $acciones;
    }
    
    public function actionDatosbasicos($id_pqr){
        
        $_facadepqrs = new PqrsControllerFachada();
        $_encabezado = $_facadepqrs->getEncabezado($id_pqr);
        
        $facade =  new DetallepqrsControllerFachada;
        
        //Organizando modelo =========================================================================
        $_returnmodel = $facade->actionUpdatepscproceso($_encabezado->idCproceso['id_cproceso'],Yii::$app->request->post(),Yii::$app->request->isAjax);
        $_model = $_returnmodel['model'];
        
        //Responsable =================================================================================
        $_responsable = ($_encabezado->usuario['id_usuario'] == Yii::$app->user->identity->id_usuario) ? FALSE:TRUE;
        
        
        //Tipo de PQRS ================================================================================
        if($_encabezado->tipo_pqrs == 1){
           
            $_tipopqr = 'Petición';
        
            
        }else if($_encabezado->tipo_pqrs == 2){
            
            if(!empty($_encabezado->subtipo_queja)){
                $_tipopqr = 'Queja';
            }else if(!empty($_encabezado->subtipo_reclamo)){
                $_tipopqr = 'Reclamo';
            }else if(!empty($_encabezado->subtipo_controversia)){
                $_tipopqr = 'Controversia';
            }
            
        }else if($_encabezado->tipo_pqrs == 3){
            
           $_tipopqr = 'Denuncia'; 
           
        }else if($_encabezado->tipo_pqrs == 4){
            
            if(!empty($_encabezado->subtipo_sugerencia)){
                $_tipopqr = 'Sugerencia';
            }else if(!empty($_encabezado->subtipo_reclamo)){
                $_tipopqr = 'Felicitacion';
            }
            
        }
        
        
        //Retornando al a vista ========================================================================================$_model->tipo_pqrs = 'P';
        if ($_returnmodel['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['pqrs/detallepqrs/index', 'numero' => $_encabezado->idCproceso['numero'],'id_pqr'=>$_encabezado->id_pqrs,'disabled_responsable'=>$_responsable]);
            
        }
        
        elseif($_returnmodel['update']=='Ajax'){
            return $this->renderAjax('updatedaosbasicos', ['_ajax'=>TRUE,'model'=>$_model,'numero'=>$_encabezado->idCproceso['numero'],'pqr'=>$_encabezado->id_pqrs,'tipo_pqr'=>'pendiente programar','fecha_recepcion'=>$_encabezado->fecha_recepcion,'disabled_responsable'=>$_responsable,'tipopqr'=>$_tipopqr]);
        } 
        
        else {
            
             return $this->render('updatedaosbasicos',['model'=>$_model,'numero'=>$_encabezado->idCproceso['numero'],'pqr'=>$_encabezado->id_pqrs,'tipo_pqr'=>'pendiente programar','fecha_recepcion'=>$_encabezado->fecha_recepcion,'disabled_responsable'=>$_responsable,'tipopqr'=>$_tipopqr]);
        }
       
    }
    
    
    protected function showEditardatosbasicos($usuario_id){
        
        
        //Usuario conectado Responsable del proceso ============================================================================================//
        $_responsable = ($usuario_id == Yii::$app->user->identity->id_usuario) ? TRUE:FALSE;
        
        
        //Url Datos Basicos ===================================================================================================================//
        $facade =  new DetallepqrsControllerFachada;
        $_urldatosbasicos = $facade->getUrldatosbasicos('2');
        
        if(!is_null($_urldatosbasicos) and $_responsable == TRUE){
            
            return  [TRUE,$_urldatosbasicos];
            
        }else{
            
            return [FALSE,null];
            
        }
        
    }
    
    
    protected function showEdicionactividad($usuario_id,$id_cproceso){
        
         $_responsableproceso = ($usuario_id == Yii::$app->user->identity->id_usuario) ? TRUE:FALSE;
         
         
         $facade =  new DetallepqrsControllerFachada;
         $_getresponsable = $facade->asignado_actividad($id_cproceso, '1');
         $_responsableactividad = ($_getresponsable == Yii::$app->user->identity->id_usuario) ? TRUE:FALSE;
         
         
         if($_responsableproceso === TRUE or $_responsableactividad === TRUE){
             
             return TRUE;
         }else{
             return FALSE;
         }
         
    }
    
    
   
    

    
}
