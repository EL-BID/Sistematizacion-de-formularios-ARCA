<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\CdaReporteInformacionControllerFachada;
use common\controllers\controllerspry\ControllerPry;


class CdaRegistroDatosController extends ControllerPry
{
  //private $facade =    CdaReporteInformacionControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  CdaReporteInformacionControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo CdaReporteInformacion que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($id_cda,$id_cactividad_proceso)
    {
        $facade =  new  CdaReporteInformacionControllerFachada;
        $dataAndModel= $facade->actionIndexDatosTecnicos(Yii::$app->request->queryParams,$id_cda,$id_cactividad_proceso);
        $dataAndModel['dataProvider']->pagination->pageParam='datos_tecnicos_page';
        $dataAndModel['dataProvider']->sort->sortParam='datos_tecnicos_sort';

        $facadeCact= new PsCactividadProcesoControllerFachada();
        $dataCact= $facadeCact->cargaPsCactividadProceso(['id_cactividad_proceso'=>$id_cactividad_proceso]);
        
         if ($dataCact !== null) {
              $_validaciones['editar']=$this->findResponsable(['id_cproceso'=>$dataCact['id_cproceso'],'id_usuario'=>Yii::$app->user->identity->id_usuario]);
         }else{
              $_validaciones['editar']=true;
         }
       

        return $this->render('index', [
            'searchModelReporteInformacion' => $dataAndModel['searchModel'],
            'dataProviderReporteInformacion' => $dataAndModel['dataProvider'],
            'id_cda' =>$id_cda,
            'id_cactividad_proceso'=>$id_cactividad_proceso,
            'validaciones'=>$_validaciones,
        ]);
    }

    /**
     * Presenta un dato unico en el modelo CdaReporteInformacion.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  CdaReporteInformacionControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
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
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  CdaReporteInformacionControllerFachada;
        $modelE= $facade->actionUpdateReporteInformacion($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];
        $modelUbicacion=$modelE['modelUbicacion'];
        $modelCoordenada=$modelE['modelCoordenada'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['progress', 'urlroute' => 'cda/cda-registro-datos/index', 'id_cda'=>$model['id_cda'],'id_cactividad_proceso'=>$model['id_cactividad_proceso']]);	
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model,
                        'modelUbicacion' => $modelUbicacion,
                        'modelCoordenada' => $modelCoordenada,
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,
                'modelUbicacion' => $modelUbicacion,
                'modelCoordenada' => $modelCoordenada,
            ]);
        }
    }
    
    /**
     * Modifica un dato existente en el modelo CdaReporteInformacion.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatedecision($id)
    {
        $facade =  new  CdaReporteInformacionControllerFachada;
        $modelE= $facade->actionUpdateDecision($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['progress', 'urlroute' => 'cda/cda-datos-tecnicos/index',  'id_cda'=>$model['id_cda'],'id_cactividad_proceso'=>$model['id_cactividad_proceso']]);	
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('../cda-decision/update', [
                        'model' => $model,
            ]);
        } 
        else {
            return $this->render('../cda-decision/update', [
                'model' => $model,
            ]);
        }
    }
    
    
    

    /**
     * Deletes an existing CdaReporteInformacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  CdaReporteInformacionControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
}
