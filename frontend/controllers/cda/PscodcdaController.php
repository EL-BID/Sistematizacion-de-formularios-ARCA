<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\PscodcdaControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * PscodcdaController implementa las acciones a través del sistema CRUD para el modelo PsCodCda.
 */
class PscodcdaController extends ControllerPry
{
  //private $facade =    PscodcdaControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  PscodcdaControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....
 return $this->redirect(['progress', 'urlroute' => 'index',  'labelmiga'=>$labelmiga,
            'id_cda_tramite'=>$id_cda_tramite,
            'id_cproceso'=>$id_cproceso,
            'actividadactual'=>$actividadactual,
            'tipo'=>$tipo]);     */

    public function actionProgress($urlroute=null,$id=null,$labelmiga=null,$id_cproceso=null,$id_cda_tramite=null,$actividadactual=null,$tipo=null){
            $facade =  new  PscodcdaControllerFachada;
            echo $facade->actionProgress($urlroute,$id,$labelmiga,$id_cproceso,$id_cda_tramite,$actividadactual,$tipo);
    }

	
	
    /**
     * Listado todos los datos del modelo PsCodCda que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo)
    {
        $facade =  new  PscodcdaControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams,$id_cproceso,$id_cda_tramite);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'encabezado' => $dataAndModel['encabezado'],
            'labelmiga'=>$labelmiga,
            'id_cda_tramite'=>$id_cda_tramite,
            'id_cproceso'=>$id_cproceso,
            'actividadactual'=>$actividadactual,
            'tipo'=>$tipo
        ]);
    }

    /**
     * Presenta un dato unico en el modelo PsCodCda.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  PscodcdaControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo PsCodCda .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($labelmiga,$id_cda_tramite,$id_cproceso,$actividadactual,$tipo)
    {
       $facade =  new  PscodcdaControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cproceso,$id_cda_tramite);
       $model = $modelE['model'];
       
       
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return $this->redirect(['progress', 'urlroute' => 'index',  'labelmiga'=>$labelmiga,
            'id_cda_tramite'=>$id_cda_tramite,
            'id_cproceso'=>$id_cproceso,
            'actividadactual'=>$actividadactual,
            'tipo'=>$tipo]);
             
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model,'_ajax'=>true
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo PsCodCda.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id,$id_cda_tramite,$id_cproceso,$actividadactual,$labelmiga,$tipo)
    {
        $facade =  new  PscodcdaControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'index',  'labelmiga'=>$labelmiga,
            'id_cda_tramite'=>$id_cda_tramite,
            'id_cproceso'=>$id_cproceso,
            'actividadactual'=>$actividadactual,
            'tipo'=>$tipo]);
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model,'_ajax'=>true
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PsCodCda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  PscodcdaControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
}
