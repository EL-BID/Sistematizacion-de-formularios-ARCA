<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\FdpreguntaControllerFachada;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * FdpreguntaController implementa las acciones a través del sistema CRUD para el modelo FdPregunta.
 */
class FdpreguntaController extends FdpreguntaControllerPry
{
  //private $facade =    FdpreguntaControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  FdpreguntaControllerFachada;
        return $facade->behaviors();
    }
	
	
	/**Accion para la barra de progreso y render de nuevo a la vista
	Ubicación: @web = frontend\web....*/
	
	public function actionProgress($urlroute=null,$id=null){
                $facade =  new  FdpreguntaControllerFachada;
		echo $facade->actionProgress($urlroute,$id);
	}

	
	
    /**
     * Listado todos los datos del modelo fdpregunta que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
        $facade =  new  FdpreguntaControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo fdpregunta.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  FdpreguntaControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo fdpregunta .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $facade =  new  FdpreguntaControllerFachada;
       $modelE= $facade->actionCreate();
       $model = $modelE['model'];
       
        if ($modelE['create'] == 'True') {
			
            return  $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_pregunta]);		
			
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
     * Crea un nuevo dato sobre el modelo fdpregunta .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreatem($_tipopregunta,$id_seccion,$id_agrupacion,$id_capitulo,$id_conj_prta,$id_conj_rpta,$id_fmt,$id_version,$antvista,$estado,$provincia,$cantones,$parroquias,$periodos,$capituloid)
    {
       $facade =  new  FdpreguntaControllerFachada;
       $modelE= $facade->actionCreatem($_tipopregunta,$id_capitulo,$id_seccion,$id_agrupacion,$id_conj_prta);
       $model = $modelE['model'];

        if ($modelE['create'] == 'True') {
			
            return $this->redirect(['detcapitulo/genvistaformato','capitulo'=>$capituloid,'id_conj_prta'=>$id_conj_prta,'id_conj_rpta'=>$id_conj_rpta,'id_fmt'=>$id_fmt,'last'=>$id_version,'antvista'=>$antvista,'estado'=>$estado,'cantones'=>$cantones,'provincia'=>$provincia,'periodos'=>$periodos,'parroquias'=>$parroquias]);
         
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
     * Modifica un dato existente en el modelo fdpregunta.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  FdpreguntaControllerFachada;
        $modelE= $facade->actionUpdate($id);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
			
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_pregunta]);
            
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
     * Deletes an existing fdpregunta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  FdpreguntaControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }
    
    /**
     * Borra una pregunta asociada a un tipo preg_caracteristica M.
     * Si encuentra respuesta asociada a la pregunta la borra y despues borra la pregunta
     */
    
    public function actionDeletem($id,$id_rpta,$id_capitulo,$id_conj_prta,$id_conj_rpta,$id_fmt,$id_version,$antvista,$estado,$provincia,$cantones,$parroquias,$periodos,$capituloid)
    {
        if(!empty($id_rpta)){
           $_modelrpta = fdrespuesta::findOne($id_rpta);
           $_modelrpta->delete();
        }
        
        /*Eliminando la respuesta asociada*/
        $facade =  new  FdpreguntaControllerFachada;
        $facade->actionDeletep($id);
        
        return $this->redirect(['detcapitulo/genvistaformato','capitulo'=>$capituloid,'id_conj_prta'=>$id_conj_prta,'id_conj_rpta'=>$id_conj_rpta,'id_fmt'=>$id_fmt,'last'=>$id_version,'antvista'=>$antvista,'estado'=>$estado,'cantones'=>$cantones,'provincia'=>$provincia,'periodos'=>$periodos,'parroquias'=>$parroquias]);
                
    }

    
}

