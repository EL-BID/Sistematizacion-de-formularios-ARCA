<?php
namespace frontend\controllers\wiki;

use Yii;
use yii\web\Controller;
use common\models\wiki\Fileuploadmultiple;
use yii\web\UploadedFile;
use yii\data\ArrayDataProvider;

class FileuploadmultipleController extends Controller
{

    /*Accion para subir un archivo*/

    public function actionCreate()
    {
        $model = new Fileuploadmultiple();

        if (Yii::$app->request->isPost) {

            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            $resultado=$model->upload();

            if ($resultado===TRUE) {
                return $this->redirect(['/wiki/fileuploadmultiple/index']);
            }else{
                return $this->render('/wiki/fileuploadmultiple/create', ['model' => $model,'mensaje'=>$resultado]);
            }
        }

        return $this->render('/wiki/fileuploadmultiple/create', ['model' => $model,'mensaje'=>'']);
    }


    /*Accion para el Index*/

    public function actionIndex()
    {
        $searchModel = new Fileuploadmultiple();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/wiki/fileuploadmultiple/index',[
            'dataProvider' => $dataProvider,'searchModel' => $searchModel,
        ]);
    }
}

?>