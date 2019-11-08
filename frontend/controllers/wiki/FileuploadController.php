<?php
namespace frontend\controllers\wiki;

use Yii;
use yii\web\Controller;
use common\models\wiki\Fileupload;
use yii\web\UploadedFile;
use yii\data\ArrayDataProvider;

class FileuploadController extends Controller
{

    /*Accion para subir un archivo*/

    public function actionCreate()
    {
        $model = new Fileupload();

        if (Yii::$app->request->isPost) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $resultado=$model->upload();

            if ($resultado===TRUE) {
                return $this->redirect(['/wiki/fileupload/index']);
            }else{
                return $this->render('/wiki/fileupload/create', ['model' => $model,'mensaje'=>$resultado]);
            }
        }

        return $this->render('/wiki/fileupload/create', ['model' => $model,'mensaje'=>'']);
    }


    /*Accion para el Index*/

    public function actionIndex()
    {
        $searchModel = new Fileupload();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/wiki/fileupload/index',[
            'dataProvider' => $dataProvider,'searchModel' => $searchModel,
        ]);
    }
}

?>