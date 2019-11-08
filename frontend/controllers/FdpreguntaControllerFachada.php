<?php

namespace frontend\controllers;

use Yii;
use common\models\poc\FdPregunta;
use common\models\poc\FdpreguntaSearch;
use frontend\controllers\FdpreguntaControllerFachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * FdpreguntaControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo fdpregunta.
 */
class FdpreguntaControllerFachada extends FdpreguntaControllerFachadaPry
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return parent::behaviors();
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
     * Listado todos los datos del modelo fdpregunta que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                        $searchModel = new fdpreguntasearch();
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
            }

    /**
     * Presenta un dato unico en el modelo fdpregunta.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo fdpregunta .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
       $model = new fdpregunta();
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
                Yii::$app->session->setFlash('FormSubmitted','2');
                return [
                    'model' => $model,
                    'create' => 'True'
                ];	

        }
        elseif (Yii::$app->request->isAjax) {
        
                return [
                    'model' => $model,
                    'create' => 'Ajax'
                ];	
           
        }  
        
        else {
        
                 return [
                    'model' => $model,
                    'create' => 'False'
                ];

        }
    }
    
    /**
     * Crea una nueva pregunta para una agrupacion
     * solo aplica para agrupaciones donde las preguntas son caracteristica_preg = M
     * @return mixed
     */
    public function actionCreatem($_tipopregunta,$id_capitulo,$id_seccion,$id_agrupacion,$id_conj_prta)
    {
       $model = new fdpregunta();
       $model->id_tpregunta = $_tipopregunta;
       $model->id_capitulo = $id_capitulo;
       $model->id_seccion = $id_seccion;
       $model->id_agrupacion = (!empty($id_agrupacion))? $id_agrupacion:null;
       $model->id_conjunto_pregunta = $id_conj_prta;
       $model->caracteristica_preg = 'M';
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
                Yii::$app->session->setFlash('FormSubmitted','2');
                return [
                    'model' => $model,
                    'create' => 'True'
                ];	

        }elseif (Yii::$app->request->isAjax) {
        
                return [
                    'model' => $model,
                    'create' => 'Ajax'
                ];	
           
        }else {
        
                 return [
                    'model' => $model,
                    'create' => 'False'
                ];

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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			Yii::$app->session->setFlash('FormSubmitted','1');
			return [
                            'model' => $model,
                            'update' => 'True'
                        ];
        } 
         elseif (Yii::$app->request->isAjax) {
        
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

    /**
     * Deletes an existing fdpregunta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Finds the fdpregunta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return fdpregunta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
                                if (($model = fdpregunta::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
}
