<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\CdapuntoscertificadosControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdapuntoscertificadosController implementa las acciones a través del sistema CRUD para el modelo CdaPuntosCertificados.
 */
class CdapuntoscertificadosController extends ControllerPry
{
  //private $facade =    CdapuntoscertificadosControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  CdapuntoscertificadosControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  CdapuntoscertificadosControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo CdaPuntosCertificados que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  CdapuntoscertificadosControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo CdaPuntosCertificados.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  CdapuntoscertificadosControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaPuntosCertificados .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     * Modificado: DB 20191002
     */
    public function actionCreate($id_cda_solicitud=null,$id_cda_tramite,$labelmiga,$tipo,$id_cproceso)
    {
        $basicas = New BasicController(); 
        $pscactividadproceso = $basicas->actualPsCactividadProceso($id_cproceso,$id_cda_tramite);
        
        $facade =  new  CdapuntoscertificadosControllerFachada;
        $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cda_tramite,$id_cproceso,$pscactividadproceso->id_cactividad_proceso);
        $model = $modelE['model'];
       
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            $basicas->retornoPantalla(null, $id_cda_tramite, $labelmiga, $tipo);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model,'_ajax'=>TRUE
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo CdaPuntosCertificados.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  CdapuntoscertificadosControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_puntos_certificados]);
            
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
     * Deletes an existing CdaPuntosCertificados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  CdapuntoscertificadosControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
}
