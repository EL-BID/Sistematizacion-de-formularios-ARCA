<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\DetalleprocesoControllerFachada;
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
class DetalleprocesoController extends ControllerPry
{
  //private $facade =    ModulocdaControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  DetalleprocesoControllerFachada;
        return $facade->behaviors();
    }
	
   
	
	/**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....*/
	
	public function actionProgress($urlroute=null,$id=null){
                $facade =  new  DetalleprocesoControllerFachada;
		echo $facade->actionProgress($urlroute,$id);
	}

	
	
    /**
     * Listado todos los datos del modelo Cda que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($id_cda)
    {
        //Verifcando conexion
        if(empty(Yii::$app->user->identity->usuario)){
             return $this->redirect(['site/index']);
        }
        
        //Guardando en Trazabilidad Informacion el acceso=====================================================================//
        Yii::info("Ingreso a Numero de CDA:".$id_cda."&6&1","Trazabilidad");
        
        
        $facade =  new  DetalleprocesoControllerFachada;
        $dataAndModel= $facade->actionIndex($id_cda);
        
        //Obteniendo ultima actividad segun fechas=========================================================
        if(!empty($dataAndModel['dataProvider'][0]['id_cproceso'])){
         $id_cactividad_proceso = $facade->asignado_actividad($dataAndModel['dataProvider'][0]['id_cproceso'],'2');
        }
        
        //Buscando Botones a activar y generar HTML========================================================
        if(!empty($dataAndModel) and !empty($id_cactividad_proceso)){
            $_validaciones = $this->actionValidaciones($dataAndModel,$id_cactividad_proceso);
            $_ultima_actividad_origen = $facade->findultimactividadorigen($id_cactividad_proceso);
        }
        
        //Entregando actividades===========================================================================
        if(!empty($dataAndModel)){
            $_actividades = $dataAndModel['actividades'];
        }
        
        
        if(!empty($dataAndModel['dataProvider'][0])){
            $_renderinformation =[  'id_cda'=>$dataAndModel['dataProvider'][0]['id_cda'], 
                                    'id_cproceso'=>$dataAndModel['dataProvider'][0]['id_cproceso'],
                                    'id_cproceso_senagua'=>$dataAndModel['dataProvider'][0]['id_cproceso_senagua'],
                                    'numero'=>$dataAndModel['dataProvider'][0]['numero'],
                                    'nom_actividad'=>$dataAndModel['dataProvider'][0]['nom_actividad'],
                                    'ult_id_actividad'=>$dataAndModel['dataProvider'][0]['ult_id_actividad'],
                                    'nom_eproceso'=>$dataAndModel['dataProvider'][0]['nom_eproceso'],
                                    'usuario_accion'=>$dataAndModel['dataProvider'][0]['usuario_accion'],
                                    'ult_fecha_actividad'=>$dataAndModel['dataProvider'][0]['ult_fecha_actividad'],
                                    'ult_fecha_estado'=>$dataAndModel['dataProvider'][0]['ult_fecha_estado'],
                                    'arca'=>$dataAndModel['dataProvider'][0]['arca'],
                                    'senagua'=>$dataAndModel['dataProvider'][0]['senagua'],
                                    'enviadopor'=>$dataAndModel['dataProvider'][0]['enviadopor'],
                                    'encalidade'=>$dataAndModel['dataProvider'][0]['encalidade'],
                                    'fecha_ingreso'=>$dataAndModel['dataProvider'][0]['fecha_ingreso'],
                                    'fecha_solicitud'=>$dataAndModel['dataProvider'][0]['fecha_solicitud'],
                                    'numero_tramites'=>$dataAndModel['dataProvider'][0]['numero_tramites'],
                                    'url_datos_basicos'=>$dataAndModel['dataProvider'][0]['url_datos_basicos']
                                ];
        }
        
        if(!empty($_validaciones)){
            $_renderinformation['validaciones'] = $_validaciones;
        }
       
        if(!empty($_actividades)){
            $_renderinformation['actividades'] = $_actividades;
        }
        
        if(!empty($id_cactividad_proceso)){
           $_renderinformation['id_cactividad_proceso'] = $id_cactividad_proceso; 
           $_renderinformation['ult_id_actividad_origen'] = $_ultima_actividad_origen; 
        }
        
        $_renderinformation['searchModel'] = $dataAndModel['searchModel'];
        
        
        
        return $this->render('index', $_renderinformation );
    }
    
    
    /*Esta funcion genera los permisos para los botones que seràn desplegados
     * en el index
     * @datamodel => datos obtenido en el modelo index 
     */
    
    public function actionValidaciones($datamodel,$id_cactividad_proceso){
        
        $acciones = array();
        
        
        /*Buscando si el Responsable del Proceso es el cliente conectado*/
        $facade =  new  DetalleprocesoControllerFachada;
        $responsable_proceso = $facade->findResponsable($datamodel['dataProvider'][0]['id_cproceso']);
        
        /*Permisos para generar boton de Editar Datos Basicos*/
        
        if(!empty($datamodel['dataProvider'][0]['url_datos_basicos']) and $datamodel['dataProvider'][0]['url_datos_basicos'] != null and $responsable_proceso == TRUE){
            $acciones['editardatosbasicos'] = TRUE;
        }else{
            $acciones['editardatosbasicos'] = FALSE;
        }
        
        /*Permisos para generar boton para Asignar Responsable*/
         if(in_array(Yii::$app->user->identity->codRols[0]->cod_rol,array(2,25))){
            $acciones['asignarresponable'] = TRUE;
        }else{
            $acciones['asignarresponable'] = FALSE;
            
        }
        
        /*Permisos para ver el boton Edicion de la actividad*/
        $_useditactividad[0] = $facade->asignado_proceso($datamodel['dataProvider'][0]['id_cproceso']);
        $_useditactividad[1] = $facade->asignado_actividad($datamodel['dataProvider'][0]['id_cproceso'],'1');
        
       if(in_array(Yii::$app->user->identity->id_usuario,$_useditactividad)){
           $acciones['editaractividad'] = TRUE;
       }else{
           $acciones['editaractividad'] = FALSE;
       }
       
       /*Habilitacion del boton detalle de la actividad*/
       $_ultima_cactividad_proceso = $facade->asignado_actividad($datamodel['dataProvider'][0]['id_cproceso'], '2');
       $_urldetalleactividad = $facade->detallegestion($_ultima_cactividad_proceso);
      
       if(!empty($_urldetalleactividad->subpantalla)){
           $acciones['botondetalle'] = TRUE;
           $acciones['subpantalla'] = $_urldetalleactividad->subpantalla;
           
       }else{
           $acciones['botondetalle'] = FALSE;
       }
       
       /*Validando Detalle Gestion
        * Se programa tipo de actividad = 1-> Gestion en la tbla ps_tipo_actividad        */
       if($_urldetalleactividad->id_tactividad == 1 ){
           $acciones['gestion'] = TRUE;
       }else{
           $acciones['gestion'] = FALSE;
       }
       
       
       /*Habilitando boton de acciones dinamicas*/
      
       $_tipopantallaruta= $facade->findrutadinamina($_ultima_cactividad_proceso); 
       
       if(empty($_tipopantallaruta)){
           $acciones['dinamicas']=array();
       }
       
       $_a=0;
       foreach($_tipopantallaruta as $_clave){
           
        if(!empty($_clave) and $_clave['tipo_pantalla_ruta'] == -1){

            $acciones['dinamicas'][$_a]['dinamicaguardar'] = TRUE;
            $acciones['dinamicas'][$_a]['dinamicaactividad'] = FALSE;
            $acciones['dinamicas'][$_a]['nom_actividad'] =  $_clave['nom_destino'];
            $acciones['dinamicas'][$_a]['id_actividad_destino'] = $_clave['id_actividad_destino'];
            $acciones['dinamicas'][$_a]['id_actividad_origen'] = $_clave['id_actividad_origen'];
            $acciones['dinamicas'][$_a]['id_clasif_actividad'] = $_clave['clas_destino'];
            $acciones['dinamicas'][$_a]['id_eproceso'] = $_clave['id_eproceso'];



        }else if(!empty($_clave) and $_clave['tipo_pantalla_ruta']==0){

            $acciones['dinamicas'][$_a]['dinamicaguardar'] = FALSE;
            $acciones['dinamicas'][$_a]['dinamicaactividad'] = TRUE;
            $acciones['dinamicas'][$_a]['nom_actividad'] = $_clave['nom_destino'];
            $acciones['dinamicas'][$_a]['id_actividad_destino'] = $_clave['id_actividad_destino'];
            $acciones['dinamicas'][$_a]['id_actividad_origen'] = $_clave['id_actividad_origen'];
            $acciones['dinamicas'][$_a]['id_clasif_actividad'] = $_clave['clas_destino'];
            $acciones['dinamicas'][$_a]['id_eproceso'] = $_clave['id_eproceso'];

        }else{

            $acciones['dinamicas'][$_a]['dinamicaguardar'] = FALSE;
            $acciones['dinamicas'][$_a]['dinamicaactividad'] = FALSE;
        }
    
        $_a+=1;
        
       }
       return $acciones;
        
    }

    /**
     * Presenta un dato unico en el modelo Cda.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  DetalleprocesoControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Cda .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  DetalleprocesoControllerFachada;
       $modelE= $facade->actionCreate();
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_cda]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo Cda.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  DetalleprocesoControllerFachada;
        $modelE= $facade->actionUpdate($id);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
			
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_cda]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    

    /**
     * Deletes an existing Cda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  DetalleprocesoControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
}
