<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\CdaAnalisisHidrologicoControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdaAnalisisHidrologicoController implementa las acciones a través del sistema CRUD para el modelo CdaAnalisisHidrologico.
 */
class CdaAnalisisHidrologicoController extends ControllerPry
{
  //private $facade =    CdaAnalisisHidrologicoControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  CdaAnalisisHidrologicoControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  CdaAnalisisHidrologicoControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo CdaAnalisisHidrologico que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($id_cda,$id_cactividad_proceso)
    {
        
        $facade =  new  CdaAnalisisHidrologicoControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams,$id_cda);
        //Encabezado
        $dataEncabezado = $facade->findEncabezado($id_cda);
        
        //Fin encabezado
        
        
        $facadeCact= new PsCactividadProcesoControllerFachada();
        $dataCact= $facadeCact->cargaPsCactividadProceso(['id_cactividad_proceso'=>$id_cactividad_proceso]);
        
         if ($dataCact !== null) {
              $_validaciones['editar']=$this->findResponsable(['id_cproceso'=>$dataCact['id_cproceso'],'id_usuario'=>Yii::$app->user->identity->id_usuario]);
         }else{
              $_validaciones['editar']=true;
         }
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'id_cda' =>$id_cda,
            'id_cactividad_proceso'=>$id_cactividad_proceso,
            'validaciones'=>$_validaciones,
            'encabezado'=>$dataEncabezado
        ]);
    }

        /**
     * Finds the Cda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public  function findResponsable($params)
    {
        $facadeResp= new PsResponsablesProcesoControllerFachada();
        
       return $facadeResp->findResponsable($params) ;
    }
    /**
     * Presenta un dato unico en el modelo CdaAnalisisHidrologico.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  CdaAnalisisHidrologicoControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaAnalisisHidrologico .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($id_cda,$id_cactividad_proceso)
    {
       $facade =  new  CdaAnalisisHidrologicoControllerFachada;
       $modelE= $facade->actionCreateCda(Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cda,$id_cactividad_proceso);
       $model = $modelE['model'];
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'index', 'id' => $model->id_analisis_hidrologico, 'id_cda'=> $model->id_cda]);		
			
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
     * Modifica un dato existente en el modelo CdaAnalisisHidrologico.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  CdaAnalisisHidrologicoControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id_cda'=>$model['id_cda'],'id_cactividad_proceso'=>$model['id_cactividad_proceso']]);
            
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
     * Deletes an existing CdaAnalisisHidrologico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  CdaAnalisisHidrologicoControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
}
