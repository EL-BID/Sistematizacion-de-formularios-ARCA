<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\PsResponsablesProcesoControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * PsResponsablesProcesoController implementa las acciones a través del sistema CRUD para el modelo PsResponsablesProceso.
 */
class PsResponsablesProcesoController extends ControllerPry
{
  //private $facade =    PsResponsablesProcesoControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  PsResponsablesProcesoControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  PsResponsablesProcesoControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo PsResponsablesProceso que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  PsResponsablesProcesoControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }
    
    
    /**
     * Listado los datos relacionados con el id_cproceso
     * @return mixed
     */
    public function actionIndexdetproceso($id_cproceso)
    {
        $facade =  new  PsResponsablesProcesoControllerFachada;
        $_busqueda['id_cproceso'] = $id_cproceso;
        $dataAndModel= $facade->actionIndex($_busqueda);
        
        return $this->renderAjax('indexdetproceso', [
            '_ajax'=>TRUE,
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo PsResponsablesProceso.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  PsResponsablesProcesoControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo PsResponsablesProceso .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  PsResponsablesProcesoControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_responsable_proceso]);		
			
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
     * Crea un nuevo responsable del proceso segun lo entregado en el requerimiento 5.4.3.2 Asignar Responsable
      * del requerimiento Detalle Proceso
     * @return mixed
     */
    public function actionCreatedetproceso($id_cproceso,$id_cda)
    {
       $facade =  new  PsResponsablesProcesoControllerFachada;
       $modelE= $facade->actionCreatedetproceso(Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cproceso,$id_cda);
       $model = $modelE['model'];
       
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('createdetproceso', [
                        '_ajax'=>TRUE,
                        'model' => $model,'id_cproceso'=>$id_cproceso,'id_cda'=>$id_cda, 'tecnicos' => $modelE['tecnicos'], 'tiporesponsabilidad'=>$modelE['tipos_responsabilidad']
            ]);
        } 
        
        else {
            return $this->render('createdetproceso', [
                'model' => $model,'id_cproceso'=>$id_cproceso,'id_cda'=>$id_cda, 'tecnicos' => $modelE['tecnicos'], 'tiporesponsabilidad'=>$modelE['tipos_responsabilidad']
            ]);
        }
    }
    

    /**
     * Modifica un dato existente en el modelo PsResponsablesProceso.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  PsResponsablesProcesoControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_responsable_proceso]);
            
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
     * Deletes an existing PsResponsablesProceso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  PsResponsablesProcesoControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
}
