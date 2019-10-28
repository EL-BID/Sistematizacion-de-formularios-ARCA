<?php

namespace backend\controllers;

use Yii;
use common\models\autenticacion\Accesos;
use backend\models\autenticacion\AccesosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * AccesosController implementa las acciones a través del sistema CRUD para el modelo Accesos.
 */
class AccesosController extends Controller
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
		
	
		echo "<div class='imgProgress'>".Html::img('@web/images/lazul.gif')."</div>"; 
		echo "<div class='textProgress'>Guardando</div>"; 
				
		echo "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";
	}

	
	
    /**
     * Listado todos los datos del modelo Accesos que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccesosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Presenta un dato unico en el modelo Accesos.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo Accesos .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Accesos();

        $tipo_usuario = Yii::$app->request->post('Accesos')['tipo_usuario'];
      
        
        if ($model->load(Yii::$app->request->post())) {

            
            if($tipo_usuario == 0){
                
                $_todosroles = \common\models\autenticacion\Rol::find()->all();
                $_nombre = $model->nombre_acceso;
                $_idpagina = $model->id_pagina;
                $_idtipo = $model->id_tipo_acceso;
                
                foreach($_todosroles as $_clrol){
                    
                    $model = new Accesos();
                    $model->nombre_acceso = $_nombre;
                    $model->id_pagina = $_idpagina;
                    $model->id_tipo_acceso = $_idtipo;
                    $model->cod_rol = $_clrol->cod_rol;
                    $model->save();
                    
                }
                
                return $this->redirect(['index']);
                
                
            }else if($tipo_usuario == 1){
                $model->cod_rol = null;
                $model->save();
                 
                return	$this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_acceso]);
            
                
            }else if($tipo_usuario == 2){
                $model->save();
                Yii::$app->session->setFlash('FormSubmitted','2');
                return	$this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_acceso]);
            }
            
            
	    
			
			
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo Accesos.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			Yii::$app->session->setFlash('FormSubmitted','1');
			return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id__acceso]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Accesos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Accesos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Accesos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Accesos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
