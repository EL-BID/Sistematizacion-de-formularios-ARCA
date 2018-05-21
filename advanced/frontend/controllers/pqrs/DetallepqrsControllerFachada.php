<?php

namespace frontend\controllers\pqrs;

use Yii;
use common\models\cda\PantallaprincipalSearch;
use common\controllers\controllerspry\FachadaPry;
use common\models\cda\PsResponsablesProceso;
use common\models\cda\PsCactividadProceso;
use common\models\cda\PsCproceso;
use common\models\cda\PsProceso;
use common\models\cda\PsActvidadRuta;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * ModulocdaControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Cda.
 */
class DetallepqrsControllerFachada extends FachadaPry
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

	
    
    /*Funcion para modificar Datos Basicos*/
    public function actionUpdatepscproceso($id,$request,$isAjax)
    {
        $model = $this->getPscproceso($id);

        if ($model->load($request) && $model->save()) {
			
			
			return [
                            'model' => $model,
                            'update' => 'True'
                        ];
        } 
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'update' => 'Ajax'
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'update' => 'False'
                        ];
        }
    }
    
    
    /*Funcion para obtener modelo de Pscproceso asociado a pqrs*/
    public function getPscproceso($id_cproceso){
        
       if (($model = PsCproceso::findOne($id_cproceso)) !== null) {
            $model ->setScenario('datosbasicospqr');
            return $model;
       }else{
            throw new NotFoundHttpException('The requested page does not exist.');
       }
    }
        
    
    /*Url Datos Basicos*/
    public function getUrldatosbasicos($id_proceso){
    
       if (($_urldatosbasicos = PsProceso::findOne($id_proceso)) !== null) {
            return $_urldatosbasicos->url_datos_basicos;
        }
        else{
            return null;
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
                       ->orderBy(['orden'=>SORT_DESC,'fecha_creacion'=>SORT_ASC])
                       ->all();
                
        return $actividades;               
    }
    
    
    
    /*Obteniendo registro de ultima actividad registrada*/
    
    public function asignado_actividad($id_cproceso,$tipo){
        $asignado_actividad = PsCactividadProceso::find()
                       ->select(['id_usuario','id_cactividad_proceso'])
                       ->where(['=','id_cproceso',$id_cproceso])
                       ->orderBy(['fecha_creacion'=>SORT_DESC])
                       ->limit('1')
                       ->one();
      
        
        if($tipo == 1){
            return $asignado_actividad->id_usuario;   
        }else if($tipo==2){
            return $asignado_actividad->id_cactividad_proceso;  
        }
    }
    
    
    
    public function findrutadinamina($id_cactividad_proceso){
        
        $query = "SELECT
                    actorigen.nom_actividad AS nom_origen,
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
                    WHERE ps_cactividad_proceso.id_cactividad_proceso = :id_cactividad_proceso and ruta_origen.estado = 'A' ORDER BY actorigen.orden DESC LIMIT 1 ";
        
        $resultado = Yii::$app->db->createCommand($query)->bindValue(':id_cactividad_proceso',$id_cactividad_proceso)->queryOne();

        
        return $resultado; 
    }
    
    
    
    
}
