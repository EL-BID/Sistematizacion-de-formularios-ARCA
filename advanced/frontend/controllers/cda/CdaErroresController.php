<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\CdaerroresControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdaerroresController implementa las acciones a través del sistema CRUD para el modelo CdaErrores.
 */
class CdaerroresController extends ControllerPry
{
  //private $facade =    CdaerroresControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  CdaerroresControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/
    
     public function actionProgress($urlroute=null,$id=null,$labelmiga=null,$id_cda_tramite=null,$id_cproceso=null,$actividadactual=null,$tipo=null){
            $facade =  new  CdaerroresControllerFachada;
            echo $facade->actionProgress($urlroute,$id,$labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo);
    }

	
	
    /**
     * Listado todos los datos del modelo CdaErrores que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo)
    {
        $facade =  new  CdaerroresControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams,$id_cda_tramite,$actividadactual,$id_cproceso);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'id_cda_tramite' =>$id_cda_tramite,
            'id_cactividad_proceso'=>$dataAndModel['pscactividadproceso']->id_cactividad_proceso,
            'encabezado'=>$dataAndModel['encabezado'],
            'labelmiga'=>$labelmiga,
            'id_cproceso'=>$id_cproceso,
            'actividadactual'=>$actividadactual,
            'tipo'=>$tipo,
            'enableCreate'=>$dataAndModel['enableCreate']
        ]);
    }

    /**
     * Presenta un dato unico en el modelo CdaErrores.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  CdaerroresControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaErrores .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso)
    {
       $facade =  new  CdaerroresControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax,$actividadactual,$id_cproceso,$pscactividadproceso,$tipo,$id_cda_tramite);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
          Yii::$app->session->setFlash('FormSubmitted','2');
            /*
             * $labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo
             */
            return  $this->redirect(['progress', 'urlroute' => 'index','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		

			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model,'ps_cproceso'=>$id_cproceso,'_ajax'=>true,'listadoerrores' => $modelE['listadoerrores']
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,'ps_cproceso'=>$id_cproceso,'listadoerrores' => $modelE['listadoerrores']
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo CdaErrores.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$tipo,$pscactividadproceso)
    {
        $facade =  new  CdaerroresControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax,$actividadactual,$id_cproceso,$pscactividadproceso);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','2');		
            return  $this->redirect(['progress', 'urlroute' => 'index','labelmiga'=>$labelmiga,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo,'actividadactual'=>$actividadactual]);		
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model,'ps_cproceso'=>$id_cproceso,'_ajax'=>true,'listadoerrores' => $modelE['listadoerrores']
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,'ps_cproceso'=>$id_cproceso,'listadoerrores' => $modelE['listadoerrores']
            ]);
        }
    }

    /**
     * Deletes an existing CdaErrores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  CdaerroresControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
}
