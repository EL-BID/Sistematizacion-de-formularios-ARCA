<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\PsHistoricoestadosControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * PsHistoricoEstadosController implementa las acciones a través del sistema CRUD para el modelo PsHistoricoEstados.
 */
class PsHistoricoEstadosController extends ControllerPry
{
  //private $facade =    PsHistoricoEstadosControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  PsHistoricoestadosControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  PsHistoricoestadosControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo PsHistoricoEstados que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
        $facade =  new  PsHistoricoestadosControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }
    
    
    /*Funcion que entrega el Historico de Estados
    de acuerdo al id_cproceso seleccionado
     * @tipo = 1 -> Envia a indexmodal
     * @tipo = 2 -> Envia a indexdetproceso     */    
     public function actionIndexestados($id_cproceso,$tipo)
    {
        $facade =  new  PsHistoricoEstadosControllerFachada;
        $_busqueda['id_cproceso'] = $id_cproceso;
        $dataAndModel= $facade->actionIndex($_busqueda);
        
        if($tipo==1){
            return $this->render('indexmodal', [
                '_ajax'=>TRUE,
                'searchModel' => $dataAndModel['searchModel'],
                'dataProvider' => $dataAndModel['dataProvider'],
            ]);
        }else if($tipo==2){
            return $this->renderAjax('indexdetprocesol', [
                '_ajax'=>TRUE,
                'searchModel' => $dataAndModel['searchModel'],
                'dataProvider' => $dataAndModel['dataProvider'],
            ]);
        }else if($tipo==3){
            return $this->render('indexmodalpqrs', [
                '_ajax'=>TRUE,
                'searchModel' => $dataAndModel['searchModel'],
                'dataProvider' => $dataAndModel['dataProvider'],
            ]);
        }else if($tipo==4){
            return $this->renderAjax('indexmodalpqrs', [
                '_ajax'=>TRUE,
                'searchModel' => $dataAndModel['searchModel'],
                'dataProvider' => $dataAndModel['dataProvider'],
            ]);
        }    
    }
   

    /**
     * Presenta un dato unico en el modelo PsHistoricoEstados.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  PsHistoricoestadosControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo PsHistoricoEstados .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  PsHistoricoestadosControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_hisotrico_cproceso]);		
			
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
     * Modifica un dato existente en el modelo PsHistoricoEstados.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  PsHistoricoestadosControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_hisotrico_cproceso]);
            
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
     * Deletes an existing PsHistoricoEstados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  PsHistoricoestadosControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
}
