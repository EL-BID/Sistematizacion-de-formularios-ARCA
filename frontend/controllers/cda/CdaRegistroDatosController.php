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

    public function actionProgress($urlroute=null,$id=null,$id_cda=null,$id_cactividad_proceso=null,$_labelmiga=null){
            $facade =  new  CdaReporteInformacionControllerFachada;
            echo $facade->actionProgress($urlroute,$id,$id_cda,$id_cactividad_proceso,$_labelmiga);
    }

	
	
    /**
     * Listado todos los datos del modelo CdaReporteInformacion que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($id_cda,$id_cactividad_proceso,$_labelmiga)
    {
        $facade =  new  CdaReporteInformacionControllerFachada;
        $dataEncabezado = $facade->findEncabezado($id_cda);
        
        //Datos de puntos =====================================================================================
        $_puntos = $this->getPoints($id_cda);
         
        return $this->render('index', [
            'id_cda' =>$id_cda,
            'id_cactividad_proceso'=>$id_cactividad_proceso,
            '_labelmiga' => $_labelmiga,
            'encabezado' => $dataEncabezado,
            '_puntos'=>$_puntos
        ]);
    }

    
    
    protected function getPoints($id_cda){
        
        //Obteniendo id_cda relacionado con la solicitud ==================================================================
        $sql = "SELECT * FROM cda WHERE id_cproceso_arca in (SELECT ps_sub_cproceso.id_sub_cproceso FROM cda
LEFT JOIN ps_sub_cproceso ON ps_sub_cproceso.id_cproceso_ini = cda.id_cproceso_arca
WHERE cda.id_cda=".$id_cda.")";
        
        $_idcdasolictud = Yii::$app->db->createCommand($sql)->queryAll();
        $_idscda=array();
        
        foreach($_idcdasolictud as $_ids){
            $_idscda[] =  $_ids['id_cda'];
        }
        
        $_conteo1= 0;
        $_conteo2 = 0;
        $_conteo3=0;
        $_conteo4=0;
        $_conteo5=0;
        
        if(!empty($_idscda)){
            
            //Numero puntos solicitados tramite ===================================================
            $_conteo1 = \common\models\cda\CdaReporteInformacion::find()->where(['id_actividad'=>215])->andwhere(['in','id_cda',$_idscda])->count();

            //Numero de puntos visita tecanica ===================================================
            $_conteo2 = \common\models\cda\CdaReporteInformacion::find()->where(['id_actividad'=>221])->andwhere(['in','id_cda',$_idscda])->count();


            //numero de puntos verificados SENAGUA =============================================
            $_conteo3 = \common\models\cda\CdaReporteInformacion::find()->where(['id_actividad'=>217])->andwhere(['in','id_cda',$_idscda])->count();


            //numero de puntos certificados ======================================================
            $_conteo4 = \common\models\cda\CdaReporteInformacion::find()->where(['id_actividad'=>224,'decision'=>'S'])->andwhere(['in','id_cda',$_idscda])->count();

            //numero de puntos devueltos ========================================================
            $_conteo5 = \common\models\cda\CdaReporteInformacion::find()->where(['id_actividad'=>213,'decision'=>'N'])->andwhere(['in','id_cda',$_idscda])->count(); 
        }
        
        return [$_conteo1,$_conteo2,$_conteo3,$_conteo4,$_conteo5];
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
    public function actionUpdate($id,$_labelmiga)
    {
        $facade =  new  CdaReporteInformacionControllerFachada;
        $modelE= $facade->actionUpdateReporteInformacion($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];
        $modelUbicacion=$modelE['modelUbicacion'];
        $modelCoordenada=$modelE['modelCoordenada'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return  $this->redirect(['progress', 'urlroute' => 'cda/cda-registro-datos/index', 'id_cda'=>$model['id_cda'],'id_cactividad_proceso'=>$model['id_cactividad_proceso'],'_labelmiga'=>$_labelmiga]);	
            
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
    public function actionUpdatedecision($id,$_labelmiga,$id_cda,$id_cactividad_proceso,$retorno=null)
    {
        $facade =  new  CdaReporteInformacionControllerFachada;
        $modelE= $facade->actionUpdateDecision($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');	
            if(!is_null($retorno)){
                return  $this->redirect(['progress', 'urlroute' => $retorno,  'id_cda'=>$model['id_cda'],'id_cactividad_proceso'=>$model['id_cactividad_proceso'],'_labelmiga'=>$_labelmiga]);	
            }else{
                return  $this->redirect(['progress', 'urlroute' => 'cda/cda-datos-tecnicos/index',  'id_cda'=>$model['id_cda'],'id_cactividad_proceso'=>$model['id_cactividad_proceso']]);	
            }
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('../cda-decision/update', [
                        'model' => $model,'_ajax'=>true,'retorno'=>$retorno,'id_cda'=>$id_cda,'id_cactividaproceso'=>$id_cactividad_proceso
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
