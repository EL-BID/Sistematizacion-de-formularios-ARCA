<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\CdatramiteControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdatramiteController implementa las acciones a través del sistema CRUD para el modelo CdaTramite.
 */
class CdatramiteController extends ControllerPry
{
  //private $facade =    CdatramiteControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade =  new  CdatramiteControllerFachada;
        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null,$id_cda_solicitud=null,$id_cproceso=null,$labelmiga=null,$actividadactual=null){
            $facade =  new  CdatramiteControllerFachada;
            echo $facade->actionProgress($urlroute,$id,$id_cda_solicitud,$id_cproceso,$labelmiga,$actividadactual);
    }

	
	
    /**
     * Listado todos los datos del modelo CdaTramite que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($labelmiga=null,$id_cda_solicitud=null,$id_cproceso=null,$actividadactual=null,$disable_button=null)
    {
        $facade =  new  CdatramiteControllerFachada;
        $_search = Yii::$app->request->queryParams;
        
        if(!is_null($id_cda_solicitud)){
            $_search['CdaTramiteSearch']['id_cda_solicitud'] = $id_cda_solicitud;
        }
        
        $dataAndModel= $facade->actionIndex($_search,$labelmiga,$id_cda_solicitud,$id_cproceso,$actividadactual,$disable_button);
       
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
            'encabezado'=>$dataAndModel['encabezado'],
            'disable_button' => $dataAndModel['disable_button'],
            'labelmiga'=> $labelmiga,
            'id_cda_solicitud' => $id_cda_solicitud,
            'id_cproceso' => $id_cproceso,
            'actividadactual' => $actividadactual,
            'disable_edit'=>$dataAndModel['disable_edit']
        ]);
    }

    /**
     * Presenta un dato unico en el modelo CdaTramite.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  CdatramiteControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaTramite .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($id_cda_solicitud,$id_cproceso,$labelmiga,$actividadactual)
    {
       $facade =  new  CdatramiteControllerFachada;
       $modelE= $facade->actionCreate(Yii::$app->request->post(),Yii::$app->request->isAjax,$id_cda_solicitud,$id_cproceso,$labelmiga);
       $model = $modelE['model'];
       
       
       
        if ($modelE['create'] == 'True') {
			
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'index', 'labelmiga' => $labelmiga,'id_cda_solicitud'=>$id_cda_solicitud,'id_cproceso'=>$id_cproceso,'actividadactual'=>$actividadactual]);		
			
        }elseif($modelE['create']=='Ajax'){
             return $this->renderAjax('create', [
                        'model' => $model,
                         'listusuario' => $modelE['listusuario'],'_ajax'=>TRUE
            ]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
                 'listusuario' => $modelE['listusuario'],
            ]);
        }
    }

    /**
     * Modifica un dato existente en el modelo CdaTramite.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$id_cda_solicitud,$id_cproceso,$labelmiga,$actividadactual)
    {
        $facade =  new  CdatramiteControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        Yii::trace("tipo de ventana que estamos abriendo ".$modelE['update'],"DEBUG");
        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','2');
            return  $this->redirect(['progress', 'urlroute' => 'index', 'labelmiga' => $labelmiga,'id_cda_solicitud'=>$id_cda_solicitud,'id_cproceso'=>$id_cproceso,'actividadactual'=>$actividadactual]);		
	
            
        }elseif($modelE['update']=='Ajax'){
            return $this->renderAjax('update', [
                        'model' => $model, 'listusuario' => $modelE['listusuario'],'_ajax'=>TRUE
            ]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CdaTramite model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  CdatramiteControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
    /*
     * Subproceso del tramite
     * se separa del subproceso de solicitud para poder
     * dar entrada a las especificaciones
     * Diana B
     * Mod: 2019-03-12
     */

    public function actionSubproceso($id_cda_tramite,$labelmiga,$numero=null){
        
        if(empty(Yii::$app->user->identity->usuario)){
             return $this->redirect(['site/index']);
        }
        
        //Guardando en Trazabilidad Informacion el acceso=====================================================================//
        Yii::info("Ingreso al módulo CDA numero de Tramite: ".$numero."&6&1","Trazabilidad");
       
        //Procesando la informacion ============================================================================
        $facade = new CdatramiteControllerFachada();
        $_dataP = $facade->actionProceso($id_cda_tramite,'2');
        
        //Pasando validacion del ultimo usuario asignado =====================================================
        if($_dataP['asignaciones']['ult_id_usuario'] == Yii::$app->user->identity->id_usuario){
            $editar_actividad = TRUE;
        }else{
            $editar_actividad = FALSE;
        }
        

        return $this->render('subproceso', ['encabezado'=>$_dataP['encabezado'],
                                            'stringencabezado'=>$_dataP['stringencabezado'],
                                            'labelmiga' =>$labelmiga,
                                            'tipo'=>'Tramite',
                                            'actividades'=>$_dataP['actividades'],
                                            'editarActividad'=>$editar_actividad,
                                            'actividadactual'=>$_dataP['actividadactual'],
                                            'actividadruta'=>$_dataP['actividadruta'],
                                            ]);
    }
    
}
