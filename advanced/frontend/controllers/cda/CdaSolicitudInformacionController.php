<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\CdaSolicitudInformacionControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdasolicitudinformacionController implementa las acciones a través del sistema CRUD para el modelo CdaSolicitudInformacion.
 */
class CdaSolicitudInformacionController extends ControllerPry
{
  //private $facade =    CdasolicitudinformacionControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  CdaSolicitudInformacionControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null,$id_cda,$id_cactividad_proceso){
            $facade =  new  CdasolicitudinformacionControllerFachada;
            echo $facade->actionProgress($urlroute,$id,$id_cda,$id_cactividad_proceso);
    }

	
	
    /**
     * Listado todos los datos del modelo CdaSolicitudInformacion que se encuentran en el tablename.
     * @return mixed
     * $tipo == 1 -> se consulta la tabla cda_solicitud_informacion a travès de id_cactividad_proceso
     * $tipo == 2 -> se consulta la tabla cda_solicitud_informacion a traves de id_cactividad_proceso_res
     */
    public function actionIndex($id_cda,$id_cactividad_proceso,$tipo)
    {
        $facade =  new  CdaSolicitudInformacionControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams,$id_cda,$id_cactividad_proceso,$tipo);
        
        //Traiendo datos del encabezado=====================================================
        $dataEncabezado = $facade->findEncabezado($id_cda);
        
        if($tipo == 1){
            return $this->render('index', [
                'searchModel' => $dataAndModel['searchModel'],
                'dataProvider' => $dataAndModel['dataProvider'],'id_cda' =>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso,'encabezado'=>$dataEncabezado
            ]);
        }else if($tipo == 2){
           return $this->render('respuestasolicitud', [
                'searchModel' => $dataAndModel['searchModel'],
                'dataProvider' => $dataAndModel['dataProvider'],'id_cda' =>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso,'encabezado'=>$dataEncabezado
            ]); 
        }    
        
    }

    /**
     * Presenta un dato unico en el modelo CdaSolicitudInformacion.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  CdasolicitudinformacionControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Permite dar respuesta a una solicitud, se abre con RespuestaSolicitud
     * $clase => TRUE
     * $id_cda => id del registro en la tabla cda
     * $id_cactividad_proceso => ultima actividad del proceso registrada
     * @return mixed
     */
    public function actionCreate($id_cda,$id_cactividad_proceso)
    {
       $facade =  new  CdasolicitudinformacionControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cda,$id_cactividad_proceso);
       $model = $modelE['model'];
       
       
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['index','id_cda' => $id_cda, 'id_cactividad_proceso' =>$id_cactividad_proceso,'tipo'=>1 ]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model,
                        'listinfofaltante' => $modelE['listinfofaltante'],
                        'listtiporeporte'=>$modelE['listtiporeporte'],
                        'listtipoatencion'=>$modelE['listtipoatencion']
                        
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
                'listinfofaltante' => $modelE['listinfofaltante'],
                'listtiporeporte'=>$modelE['listtiporeporte'],
                'listtipoatencion'=>$modelE['listtipoatencion']
               
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo CdaSolicitudInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$id_cda,$id_cactividad_proceso)
    {
        $facade =  new  CdasolicitudinformacionControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cactividad_proceso);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
             return  $this->redirect(['index','id_cda' => $id_cda, 'id_cactividad_proceso' =>$id_cactividad_proceso,'tipo'=>2 ]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model,
                        'listinfofaltante' => $modelE['listinfofaltante'],
                        'listtiporeporte'=>$modelE['listtiporeporte'],
                        'listtipoatencion'=>$modelE['listtipoatencion'],
                        'clase' => TRUE
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,
                'listinfofaltante' => $modelE['listinfofaltante'],
                'listtiporeporte'=>$modelE['listtiporeporte'],
                'listtipoatencion'=>$modelE['listtipoatencion'],
                'clase' => TRUE
            ]);
        }
    }

    /**
     * Deletes an existing CdaSolicitudInformacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id,$id_cda,$id_cactividad_proceso)
    {
        $facade =  new  CdasolicitudinformacionControllerFachada;
        $facade->actionDeletep($id,$id_cda,$id_cactividad_proceso);
        return  $this->redirect(['index','id_cda' => $id_cda, 'id_cactividad_proceso' =>$id_cactividad_proceso,'tipo'=>1 ]);
    }

    
}
