<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\PantallaprincipalSearch;
use common\controllers\controllerspry\FachadaPry;
use common\models\cda\PsResponsablesProceso;
use common\models\cda\PsCactividadProceso;
use common\models\cda\PsCproceso;
use common\models\cda\PsActvidadRuta;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * ModulocdaControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Cda.
 */
class DetalleprocesoControllerFachada extends FachadaPry
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
	
	
	/**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....*/
	
	public function actionProgress($urlroute=null,$id=null){
		
	
            $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>"; 
            $progressbar = $progressbar . "<div style='text-align:center'>Guardando</div>";
            $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo Cda que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($id_cda)
    {
        
            //Para llamar al modelo de la funcion search de common/models/hidricos/HidricosDetalleProceso
            /* Esta funcion entrega el encabeza descrito en detalle proceso que son los Datos Basicos
            Se presentan en la vista, frontend/views/detalleproceso/index.php, para verlos correctamente
             * el controlador DetalleprocesoController los organiza en un vector ver ahi   */
            
            $searchModel = new PantallaprincipalSearch();
            
            if(!empty($id_cda)){
                $searchModel->id_cda = $id_cda;
            }
            
            //Informacion general obtenida de la consulta para datos basicos / Cabezote =======================================
            $dataProvider = $searchModel->searchdetalleproceso();
            
            //Actividades =====================================================================================================
            $actividades="";
            if(!empty($dataProvider)){
                $actividades = $this->findActividades($dataProvider[0]['id_cproceso']);
            }
            
            
            return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,'actividades'=>$actividades
                ];
    }

    /**
     * Presenta un dato unico en el modelo Cda.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

        
    
    /**
     * Finds the Cda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public  function findResponsable($id_cproceso)
    {
        if (($model = PsResponsablesProceso::findOne(['id_cproceso'=>$id_cproceso,'id_usuario'=>Yii::$app->user->identity->id_usuario])) !== null) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /*Entrega listado de actividad asociadas a un id_cproceso
     * Organizadas por fecha junto con su relaciona a la tabla ps_actividad
     */
    
    public function findActividades($id_cproceso)
    {
        $actividades = PsCactividadProceso::find()
                       ->leftJoin('ps_actividad','ps_actividad.id_actividad = ps_cactividad_proceso.id_actividad')
                       ->where(['=','id_cproceso',$id_cproceso])
                       ->andwhere(['=','id_tactividad','2'])
                       ->orderBy(['fecha_creacion'=>SORT_DESC,'id_cactividad_proceso'=>SORT_DESC,'orden'=>SORT_DESC])
                       ->all();
                
        return $actividades;               
    }
    
    /*Entrega id_usuario para consulta tipo 1 
     * y entrega id_cactividad_procesos tipo 2 de la ultima actividad registrada segun fecha, 
     * segun id_cproceso recibido.
     */
    
    public function asignado_actividad($id_cproceso,$tipo){
        
        
        $asignado_actividad = PsCactividadProceso::find()
                       ->select(['id_usuario','id_cactividad_proceso'])
                       ->where(['=','id_cproceso',$id_cproceso])
                       ->orderBy(['fecha_creacion'=>SORT_DESC,'id_cactividad_proceso'=>SORT_DESC])
                       ->limit('1')
                       ->one();
      
        
        if($tipo == 1){
            return $asignado_actividad->id_usuario;   
        }else if($tipo==2){
            return $asignado_actividad->id_cactividad_proceso;  
        }
    }
    
    
    public function asignado_proceso($id_cproceso){
        
        $asignado_actividad = PsCproceso::find()
                       ->select(['id_usuario'])
                       ->where(['=','id_cproceso',$id_cproceso])
                       ->one();
        
        return $asignado_actividad->id_usuario;      
        
    }
    
    
    public function detallegestion($id_cactividad_proceso){
        
         $actividades = \common\models\cda\PsActividad::find()
                       ->leftJoin('ps_cproceso','ps_cproceso.ult_id_actividad = ps_actividad.id_actividad')
                       ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cproceso = ps_cproceso.id_cproceso')
                       ->where(['=','id_cactividad_proceso',$id_cactividad_proceso])
                       ->one();
                
        return $actividades;   
    }
    
    
    public function findrutadinamina($id_cactividad_proceso){
        
        $query = "SELECT
                    actdestino.id_actividad AS id_actividad_destino,actorigen.nom_actividad AS nom_origen,
                    actorigen.id_clasif_actividad AS clas_origen,
                    actdestino.nom_actividad AS nom_destino,
                    actdestino.id_clasif_actividad AS clas_destino,
                    ps_clasif_actividad.nom_clasif_tactividad,
                    ruta_origen.tipo_pantalla_ruta,ruta_origen.id_actividad_destino,ruta_origen.id_eproceso,ruta_origen.id_actividad_origen
                    FROM
                    ps_cactividad_proceso
                    LEFT JOIN ps_actividad as actorigen ON actorigen.id_actividad = ps_cactividad_proceso.id_actividad
                    LEFT JOIN ps_actvidad_ruta as ruta_origen ON ruta_origen.id_actividad_origen = actorigen.id_actividad
                    LEFT JOIN ps_actividad as actdestino ON actdestino.id_actividad = ruta_origen.id_actividad_destino
                    LEFT JOIN ps_clasif_actividad ON ps_clasif_actividad.id_clasif_actividad = actdestino.id_clasif_actividad
                    WHERE ps_cactividad_proceso.id_cactividad_proceso = :id_cactividad_proceso and ruta_origen.estado = 'A' 
                    GROUP BY actdestino.id_actividad,actorigen.nom_actividad,actorigen.id_clasif_actividad,
                    actdestino.nom_actividad,ps_clasif_actividad.nom_clasif_tactividad,ruta_origen.tipo_pantalla_ruta,
                    ruta_origen.id_actividad_destino,ruta_origen.id_eproceso,ruta_origen.id_actividad_origen,actorigen.orden
                    ORDER BY actorigen.orden DESC ";
        
        $resultado = Yii::$app->db->createCommand($query)->bindValue(':id_cactividad_proceso',$id_cactividad_proceso)->queryAll();

        
        return $resultado; 
    }
    
    
    public function findultimactividadorigen($id_cactividad_proceso){
        
        $acciondinamica=PsActvidadRuta::find()
                        ->leftJoin('ps_actividad','ps_actividad.id_actividad = ps_actvidad_ruta.id_actividad_origen')
                        ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_actividad = ps_actividad.id_actividad')
                        ->where(['=','id_cactividad_proceso',$id_cactividad_proceso])
                        ->one();
        
        return $acciondinamica; 
    }
    
}
