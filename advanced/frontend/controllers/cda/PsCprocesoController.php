<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\PsCprocesoControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * PsCprocesoController implementa las acciones a través del sistema CRUD para el modelo PsCproceso.
 */
class PsCprocesoController extends ControllerPry
{
  //private $facade =    PsCprocesoControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  PsCprocesoControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  PsCprocesoControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo PsCproceso que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
        $facade =  new  PsCprocesoControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }
    
    /*
     * Modificado Diana B.
     * Modulo: CDA
     * 2019-02-25
     */
    public function actionGestor(){
        
        $facade =  new  PscprocesoControllerFachada;
        $dataAndModel= $facade->actionIndex_gestor();
        
        return $this->render('index_gestor', [
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }
        
     /**
     * Listado todos los datos del modelo PsCproceso que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex_gestor($tipo)
    {
        $facade =  new  PscprocesoControllerFachada;
        
        //Recogiendo datos de envio===============================================
        $_vectorsearch = Yii::$app->request->queryParams;
        
        //Agregando usuario conectado ==============================================
        $dataAndModel= $facade->actionIndex_gestorpqrs($_vectorsearch,$tipo);
        $_page = 'index_gestorpqrs'; 
        
        return $this->render($_page, [
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo PsCproceso.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  PsCprocesoControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo PsCproceso .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  PsCprocesoControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_cproceso]);		
			
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
     * Modifica un dato existente en el modelo PsCproceso.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  PsCprocesoControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_cproceso]);
            
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
     * Modifica un dato existente en el modelo PsCproceso.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
   public function actionUpdatedetproceso($id,$tipo=null,$id_cda=null,$_labelmiga)
    {
        $facade =  new  PscprocesoControllerFachada;
        $modelE= $facade->actionUpdatedetproceso($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');
            if($tipo==1){
                 return  $this->redirect(['cda/detalleproceso/index', 'id_cda' => $id_cda,'_labelmiga'=>$_labelmiga]);	
            }else{
                return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_cproceso]);
            }
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('updatedetproceso', [
                        '_ajax'=>TRUE,
                        'model' => $model,
                        'tipo' => $tipo,
                        'ult_eproceso' =>$modelE['ult_eproceso'],
                        'ult_usuario'=>$modelE['ult_usuario']
                
            ]);
        } 
        else {
            return $this->render('updatedetproceso', [
                'model' => $model,
                'tipo' => $tipo,
                'ult_eproceso' =>$modelE['ult_eproceso'],
                'ult_usuario'=>$modelE['ult_usuario']
            ]);
        }
    }

    /**
     * Deletes an existing PsCproceso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  PsCprocesoControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
}
