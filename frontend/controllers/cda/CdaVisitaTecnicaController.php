<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\CdaReporteInformacionControllerFachada;
use common\controllers\controllerspry\ControllerPry;


class CdaVisitaTecnicaController extends ControllerPry
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

    public function actionProgress($urlroute=null,$id=null, $id_cda=null,$id_cactividad_proceso=null,$_labelmiga=null){
            $facade =  new  CdaReporteInformacionControllerFachada;
            echo $facade->actionProgress($urlroute,$id, $id_cda,$id_cactividad_proceso,$_labelmiga);
    }

	
	
    /**
     * Listado todos los datos del modelo CdaReporteInformacion que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($id_cda,$id_cactividad_proceso,$_labelmiga)
    {
        $facade =  new  CdareporteinformacionControllerFachada;
    //$dataAndModel= $facade->actionIndexVisitaTecnica(Yii::$app->request->queryParams,$id_cda,$id_cactividad_proceso);

		//Encabezado
        $dataEncabezado = $facade->findEncabezado($id_cda);
        //Fin encabezado        
		$dataAndModel= $facade->actionIndexVisitaTecnica(Yii::$app->request->queryParams,$id_cda,$id_cactividad_proceso);

        $dataAndModel['dataProvider']->pagination->pageParam='datos_tecnicos_page';
        $dataAndModel['dataProvider']->sort->sortParam='datos_tecnicos_sort';
        $id_reporte_informacion=0;
        $data=$facade->cargaCdaReporteInformacion(['id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso]);
       // echo var_dump(['id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso]);
        
         if (count($data) >0) {
            $id_reporte_informacion=$data[0]['id_reporte_informacion'];
           
         }
         

            $dataCoordenada= $facade->actionIndexCoordenadas(Yii::$app->request->queryParams,$id_cda,$id_cactividad_proceso,$id_reporte_informacion);
            $dataCoordenada['dataProvider']->pagination->pageParam='coordenadas_page';
            $dataCoordenada['dataProvider']->sort->sortParam='coordenadas_sort';
        
        $facadeCact= new PsCactividadProcesoControllerFachada();
        $dataCact= $facadeCact->cargaPsCactividadProceso(['id_cactividad_proceso'=>$id_cactividad_proceso]);
        if ($dataCact !== null) {
              $_validaciones['editar']=$this->findResponsable(['id_cproceso'=>$dataCact['id_cproceso'],'id_usuario'=>Yii::$app->user->identity->id_usuario]);
              $_validaciones['agregar']=$this->findResponsable(['id_cproceso'=>$dataCact['id_cproceso'],'id_usuario'=>Yii::$app->user->identity->id_usuario]);
              $_validaciones['editarC']=$this->findResponsable(['id_cproceso'=>$dataCact['id_cproceso'],'id_usuario'=>Yii::$app->user->identity->id_usuario]);
              $_validaciones['agregarC']=$this->findResponsable(['id_cproceso'=>$dataCact['id_cproceso'],'id_usuario'=>Yii::$app->user->identity->id_usuario]);
         }else{
              $_validaciones['editar']=false;
              $_validaciones['agregar']=false;
              $_validaciones['editarC']=true;
              $_validaciones['agregarC']=true;
              
         }
        
        if (count($dataAndModel['dataProvider']) >0) {
              $_validaciones['agregar']=false;
         }else{
              $_validaciones['agregar']=true;
         }
         
         if (count($dataCoordenada['dataProvider']) >0) {
              $_validaciones['agregarC']=false;
         }else{
              $_validaciones['agregarC']=true;
         }
       

        return $this->render('index', [
            'searchModelVisitaTecnica' => $dataAndModel['searchModel'],
            'dataProviderVisitaTecnica' => $dataAndModel['dataProvider'],
            'searchModelCoordenadas' => $dataCoordenada['searchModel'],
            'dataProviderCoordenadas' => $dataCoordenada['dataProvider'],
            'encabezado' => $dataEncabezado,
            'id_cda' => $id_cda,
            'id_cactividad_proceso' => $id_cactividad_proceso,
            'validaciones' => $_validaciones,
            'id_reporte_informacion' => $id_reporte_informacion,
            '_labelmiga' => $_labelmiga,
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
     * Crea un nuevo dato sobre el modelo CdaReporteInformacion .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($id_cda,$id_cactividad_proceso)//ReporteInformacion
    {

        $facade =  new  CdaReporteInformacionControllerFachada;
        $modelE= $facade->actionCreateVisitaTecnica(Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cda,$id_cactividad_proceso);
        $model = $modelE['model'];

        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'cda/cda-visita-tecnica/index',  'id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso,'_labelmiga'=>null]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model,'_ajax'=>true
                        
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
          
            ]);
        }
    }
       
    /**
     * Crea un nuevo dato sobre el modelo CdaReporteInformacion .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreatecoordenadas($id_cda,$id_cactividad_proceso,$id_reporte_informacion,$_labelmiga)//ReporteInformacion
    {
        $facade =  new  CdaReporteInformacionControllerFachada;
        
        $modelE= $facade->actionCreateCoordenadas(Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cda,$id_cactividad_proceso,$id_reporte_informacion);
        $model = $modelE['model'];
        $modelCoordenada=$modelE['modelCoordenada'];
        

        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'cda/cda-visita-tecnica/index', 'id_cda'=>$id_cda,'id_cactividad_proceso'=>$id_cactividad_proceso,'_labelmiga'=>$_labelmiga]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create_coordenadas_visita', [
                        'model' => $model,
                        'modelCoordenada' => $modelCoordenada,'_ajax'=>true
            ]);
        } 
        else {
            return $this->render('create_coordenadas_visita', [
                'model' => $model,
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
    public function actionUpdate($id,$_labelmiga)
    {
        $facade =  new  CdaReporteInformacionControllerFachada;
        $modelE= $facade->actionUpdateVisitaTecnica($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['progress', 'urlroute' => 'cda/cda-visita-tecnica/index',  'id_cda'=>$model['id_cda'],'id_cactividad_proceso'=>$model['id_cactividad_proceso'],'_labelmiga'=>$_labelmiga]);	
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model,'_ajax'=>true
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
    public function actionUpdatecoordenadas($id)
    {
        $facade =  new  CdaReporteInformacionControllerFachada;
        $modelE= $facade->actionUpdateSenagua($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];
        $modelCoordenada=$modelE['modelCoordenada'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['progress', 'urlroute' => 'cda/cda-datos-tecnicos/index',  'id_cda'=>$model['id_cda'],'id_cactividad_proceso'=>$model['id_cactividad_proceso']]);	
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('../cda-reporte-informacion/update', [
                        'model' => $model,
                        'modelCoordenada' => $modelCoordenada,
            ]);
        } 
        else {
            return $this->render('../cda-reporte-informacion/update', [
                'model' => $model,
                'modelCoordenada' => $modelCoordenada,
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
