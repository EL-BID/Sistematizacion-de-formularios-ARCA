<?php

namespace frontend\controllers\cda;

use Yii;
use frontend\controllers\cda\CdaControllerFachada;
use common\controllers\controllerspry\ControllerPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdaController implementa las acciones a través del sistema CRUD para el modelo Cda.
 */
class CdaController extends ControllerPry
{
  //private $facade =    CdaControllerFachada;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $facade = new  CdaControllerFachada();

        return $facade->behaviors();
    }
	
    
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function actionProgress($urlroute=null,$id=null){
            $facade =  new  CdaControllerFachada;
            echo $facade->actionProgress($urlroute,$id);
    }

	
	
    /**
     * Listado todos los datos del modelo Cda que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {
         $facade =  new  CdaControllerFachada;
        $dataAndModel= $facade->actionIndex(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $dataAndModel['searchModel'],
            'dataProvider' => $dataAndModel['dataProvider'],
        ]);
    }

    /**
     * Presenta un dato unico en el modelo Cda.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $facade =  new  CdaControllerFachada;
        return $this->render('view', [
            'model' => $facade->actionView($id),
        ]);
    }
    
    
    /*
     * Esta es la fncion raiz si existe ya un detalle actividad diligenciados
     * para el ps_cactividad_proceso envia a update, sino envia a create
     */
    public function actionPoc($labelmiga,$id_cda_solicitud=null,$actividadactual,$id_cda_tramite=null,$tipo){
        
        
        //Llamando a basicas ============================================================================
        $basicas = New BasicController();
        
        //Id del procso realizado puede ser un tramite o una solicitud ==================================
        $id_tipoproceso = (is_null($id_cda_solicitud))? $id_cda_tramite:$id_cda_solicitud;
        
        $validateinformation = $this->datanedPoc($id_tipoproceso,$actividadactual,$tipo);
        $pscactividaproceso = $validateinformation[1];
        
      
        //3) Si el valor en diligenciado es igual a 'S' se envia editar activdad
        if($pscactividaproceso->diligenciado == 'S'){
            
            $retornaupdate = $this->actionUpdatepoc($labelmiga,$id_tipoproceso,$actividadactual,TRUE,$validateinformation[1],Yii::$app->request->post(),$tipo);
            $encabezado = $validateinformation[0];
            
            //REtornando string html para el encabezado =============================================
            if($tipo == '1'){
                $retornaupdate['encabezado'] = $basicas->encabezadoSolicitud($encabezado);
            }else{
                $retornaupdate['encabezado'] = $basicas->encabezadoTramite($encabezado);
            }
            
            if($retornaupdate['_ajax'] == '1'){
                return $this->renderAjax('update', $retornaupdate);
           }else{
               $basicas->retornoPantalla($id_cda_solicitud, $id_cda_tramite, $labelmiga, $tipo);
           }
            
        }else{          //Aqui entra si aun no se ha diligenciado el detalle actividad ================================
          
            
           $retornacreate = $this->actionCreate($labelmiga,$id_tipoproceso,$actividadactual,TRUE,$validateinformation[1],Yii::$app->request->post(),$tipo);          
           $encabezado = $validateinformation[0];
          
           //REtornando string html para el encabezado =============================================
            if($tipo == '1'){
                $retornacreate['encabezado'] = $basicas->encabezadoSolicitud($encabezado);
            }else{
                $retornacreate['encabezado'] = $basicas->encabezadoTramite($encabezado);
            }
           
           if($retornacreate['_ajax'] == '1'){
               
                return $this->renderAjax('create', $retornacreate);
           }else{
               
                $basicas->retornoPantalla($id_cda_solicitud, $id_cda_tramite, $labelmiga, $tipo);
           }
            
        }
    }

    /*
     * id_cda_tipo = puedes ser el id_cda_solicitud o el id_cda_tramite
     * tipo => tipo '1' solicitud, '2' tramite
     * 
     */
    protected function datanedPoc($id_tipoproceso,$actividadactual,$tipo){
        
        //1) Trayendo informacion del id_cda_solicitud ===================================
        if($tipo == '1'){
            $searchModel = new \common\models\cda\PantallaprincipalSearch();
            $searchModel->id_cda_solicitud = $id_tipoproceso;
            $params=array();
            $encabezado = $searchModel->search($params);
        }else{
            $searchModel = new \common\models\cda\PantallaprincipalSearch();
            $encabezado = $searchModel->searchT($id_tipoproceso);
        }
        
        
        //2) Buscando el ps_cactividad_proceso en el cual va el proceso
        $basicas = New BasicController();
        $pscactividaproceso = $basicas->actualPsCactividadProceso($encabezado[0]['id_cproceso']);
        
        $nombreactividad = $basicas->findActividades(null,$actividadactual);
        
        return[$encabezado[0],$pscactividaproceso,$nombreactividad['nom_actividad']];
    }
    /**
     * Crea un nuevo dato sobre el modelo Cda .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     * Mod: Diana B 2018-03-08
     * var1 => labelmiga
     * var2 => id_cda_solicitud o id_cda_tramite
     * var3 => actividad actual
     * var4 => retorno de todo sin abrir ventana
     * var5 => modelo de la pscactiviproceso actual
     * var6 => Yii::$app->request->post()
     */
    
    public function actionCreate($var1,$var2,$var3,$var4=null,$var5=null,$var6=null,$tipo)
    {        
            $facade =  new  CdaControllerFachada;
            $modelE= $facade->actionCreate($var2,$var5,$var6,'true',$tipo);
            $model = $modelE['model'];
            
            if ($modelE['create'] == 'True') {

               return  ['_ajax'=>'0'];
                
            }elseif($modelE['create']=='Ajax'){
                
                return [         'model' => $model,
                                 'labelmiga'=>$var1,
                                 'id_cda_solicitud'=>$var2,
                                 '_ajax'=>'1',
                                 'tipo'=>$tipo,
                                 'listadodemarcacion'=>$modelE['demarcaciones'],
                                 'stringClasificacion'=>$modelE['stringClasificacion'],
                                 'modelpsactividad'=>$modelE['modelpsactividad'],
                                 'listadocentro'=>$modelE['centros'],
                     ];
            }   
    }
    
    
    /*
     * Modifica registro de la POC
      * Mod: Diana B 2018-03-08
     * var1 => labelmiga
     * var2 => id_cda_solicitud
     * var3 => actividad actual
     * var4 => retorno de todo sin abrir ventana
     * var5 => modelo de la pscactiviproceso actual
     * var6 => Yii::$app->request->post()
     * tipo =< '1' solicitud , '2' tramite
     */
    
    
    public function actionUpdatepoc($var1,$var2,$var3,$var4=null,$var5=null,$var6=null,$tipo){
        
        $facade =  new  CdaControllerFachada;
        $modelE= $facade->actionUpdate($var2,$var5,$var6,'true',$tipo);
        $model = $modelE['model'];
        
        if ($modelE['update'] == 'True') {

            return  ['_ajax'=>'0'];
        }else{
            
            if($tipo == '1'){
                return [        'model' => $model,
                                'labelmiga'=>$var1,
                                'id_cda_solicitud'=>$var2,
                                '_ajax'=>'1',
                                'tipo'=>$tipo,
                                'listadodemarcacion'=>$modelE['demarcaciones'],
                                'stringClasificacion'=>$modelE['stringClasificacion'],
                                'listadocentro'=>$modelE['centros'],
                                'modelpsactividad'=>$modelE['modelpsactividad']
                    ];
            }else{
                return [        'model' => $model,
                                'labelmiga'=>$var1,
                                'id_cda_solicitud'=>$var2,
                                '_ajax'=>'1',
                                 'tipo'=>$tipo,
                                'listadodemarcacion'=>$modelE['demarcaciones'],
                                'listadocentro'=>$modelE['centros'],
                                'stringClasificacion'=>$modelE['stringClasificacion'],
                                'modelpsactividad'=>$modelE['modelpsactividad']
                              
                    ];
            }
        }
        
    }

    /**
     * Modifica un dato existente en el modelo Cda.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $facade =  new  CdaControllerFachada;
        $modelE= $facade->actionUpdate($id,Yii::$app->request->post(),Yii::$app->request->isAjax);
        $model = $modelE['model'];

        if ($modelE['update'] == 'True') {
            
            Yii::$app->session->setFlash('FormSubmitted','1');		
            return $this->redirect(['progress', 'urlroute' => 'view', 'id' => $model->id_cda]);
            
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
     * Deletes an existing Cda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $facade =  new  CdaControllerFachada;
        $facade->actionDeletep($id);

        return $this->redirect(['index']);
    }

    
    
    public function actionCentrociudadano($id=null){
        
        
        $basicas = New BasicController();
        $centrociudadano = $basicas ->centrociudadano($id);
        
        return $centrociudadano;
        
    }
    
}
