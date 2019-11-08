<?php

namespace frontend\controllers\cargaquipux;

use Yii;
use common\models\cargaquipux\PsCargue;
use common\models\cargaquipux\PsCargueSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\web\UploadedFile;

/**
 * PsCargueControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo PsCargue.
 */
class PsCargueControllerFachada extends FachadaPry
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
		
	
            $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>"; 
            $progressbar = $progressbar . "<div style='text-align:center'>Guardando</div>";
            $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo PsCargue que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                $searchModel = new PsCargueSearch();
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
            }

    /**
     * Presenta un dato unico en el modelo PsCargue.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo PsCargue .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax)
    {
        $model = new PsCargue();
        $fechaactual = date(Yii::$app->fmtfechaphp);

       
            if ($model->load($request)){
                $model->ruta = UploadedFile::getInstance($model, 'ruta');
                $model->procesado="N";
                $model->fecha_cargue=$fechaactual;
                if ($model->ruta) {
                    $model->upload();
                }
                
                if ($model->save(false)) {

                        return [
                            'model' => $model,
                            'create' => 'True'
                        ];	

                }
            }
            elseif ($isAjax) {

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
     * Modifica un dato existente en el modelo PsCargue.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$request,$isAjax)
    {
        $model = $this->findModel($id);

        if ($model->load($request) && $model->save()) {
			
			
			return [
                            'model' => $model,
                            'update' => 'True'
                        ];
        } 
         elseif ($isAjax) {
        
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
     * Deletes an existing PsCargue model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Finds the PsCargue model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PsCargue the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
                    if (($model = PsCargue::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
        
    /** 
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica 
     * @param type $params contiene array con valores de query a columnas de la tabla 
     * @return type PsCargue    */ 
    protected function findModelByParams($params) 
    { 
        if (($model = PsCargue::findAll($params)) !== null) { 
            return $model; 
        } 
        else{ 
            return null; 
        }  
    } 

    /** 
     * Funcion visible para los objetos que necesiten una consulta al modelo PsCargue     
     * @param type $params contiene array con valores de query a columnas de la tabla 
     * @return type PsCargue    */ 
     public function cargaPsCargue($params){ 
        return $this->findModelByParams($params); 
    } 
    
    public function actualizaPscargueProcesado($id){
         $PsCargue= $this->findModel($id);
         $PsCargue->procesado="S";
         $PsCargue->update(false);
    }
}
