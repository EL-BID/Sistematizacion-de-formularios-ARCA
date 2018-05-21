<?php

namespace frontend\controllers\wiki;

use Yii;
use frontend\models\wiki\Capitulos;
use frontend\models\wiki\CapituloUpload;
use frontend\models\wiki\CapitulosSearch;
use frontend\controllers\CapitulosControllerFachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;
use yii\web\UploadedFile;

/**
 * CapitulosControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Capitulos.
 */
class CapitulosControllerFachada extends CapitulosControllerFachadaPry
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
     * Listado todos los datos del modelo Capitulos que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                        $searchModel = new CapitulosSearch();
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
            }

    /**
     * Presenta un dato unico en el modelo Capitulos.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
            return $this->findModel($id);

    }

    /**
     * Crea un nuevo dato sobre el modelo Capitulos .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     * @prta -> id_conjunto_pregunta_asignada
     */
    public function actionCreate($id_prta,$id_fmt,$id_rpta,$last)
    {
        $model = new Capitulos();
        $model2 = new CapituloUpload();

        if ($model->load(Yii::$app->request->post())) {

                $model2->imageFile = UploadedFile::getInstance($model2, 'imageFile');
                $resultado=$model2->upload();

                if ($resultado!="") {

                    $model->icono=$resultado;
                        if($model->save()){
                            Yii::$app->session->setFlash('FormSubmitted','2');
                            return [
                            'model' => $model,'model2'=>$model2,
                            'create' => 'True','id_fmt'=>$id_fmt,'id_rpta'=>$id_rpta,'id_prta'=>$id_prta,'last'=>$last
                            ];
                        }else{

                        }
                }else{
                    Yii::$app->session->setFlash('FormSubmitted','2');
                    return [
                    'model' => $model,'model2'=>$model2,
                    'create' => 'False','id_fmt'=>$id_fmt,'id_prta'=>$id_prta,'id_prta'=>$id_prta,'last'=>$last
                    ];
                }
        }
        elseif (Yii::$app->request->isAjax) {

                $model->id_conjunto_pregunta = $id_prta;
                return [
                    'model' => $model,'model2'=>$model2,
                    'create' => 'Ajax'
                ];

        }
        else {
                 $model->id_conjunto_pregunta = $id_prta;
                 return [
                    'model' => $model,'model2'=>$model2,
                    'create' => 'False'
                ];

        }
    }

    /**
     * Modifica un dato existente en el modelo Capitulos.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$id_prta,$id_fmt,$id_rpta,$last)
    {
        $model = $this->findModel($id);
        $model2 = new CapituloUpload();
        $model2->imageFile = $model->icono;
        $icono_anterior = $model->icono;

        if ($model->load(Yii::$app->request->post())) {

                $model2->imageFile = UploadedFile::getInstance($model2, 'imageFile');
                $resultado=$model2->upload();

                if(empty($resultado)){
                    $model->icono=$icono_anterior;
                }else{
                    $model->icono=$resultado;
                }

                if($model->save()){
                    Yii::$app->session->setFlash('FormSubmitted','2');
                       return [
                       'model' => $model,'model2'=>$model2,
                       'update' => 'True','id_fmt'=>$id_fmt,'id_rpta'=>$id_rpta,'id_prta'=>$id_prta,'last'=>$last
                       ];

                 }


        }
         elseif (Yii::$app->request->isAjax) {

                return [
                    'model' => $model,'model2'=>$model2,
                    'update' => 'Ajax'
                ];

        }
        else {
                         return [
                            'model' => $model,'model2'=>$model2,
                            'update' => 'False'
                        ];
        }
    }

    /**
     * Deletes an existing Capitulos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id,$id_prta,$id_fmt,$id_rpta,$last)
    {
        $this->findModel($id)->delete();
        return [
                'id'=>$id,'id_fmt'=>$id_fmt,'id_rpta'=>$id_rpta,'id_prta'=>$id_prta,'last'=>$last
        ];

    }

    /**
     * Finds the Capitulos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Capitulos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Capitulos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
