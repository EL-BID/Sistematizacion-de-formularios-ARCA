<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\CdaAnalisisHidrologico;
use common\models\cda\CdaAnalisisHidrologicoSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdaanalisishidrologicoControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo CdaAnalisisHidrologico.
 */
class CdaanalisishidrologicoControllerFachada extends FachadaPry
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
	
	public function actionProgress($urlroute=null,$id=null,$labelmiga=null,$id_cda_tramite=null,$id_cproceso=null,$actividadactual=null,$tipo=null){
		
	
            $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif').'</div>';
            $progressbar = $progressbar."<div style='text-align:center'>Guardando</div>"; 	
            $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id,'labelmiga'=>$labelmiga,'actividadactual'=>$actividadactual,'id_cda_tramite'=>$id_cda_tramite,'id_cproceso'=>$id_cproceso,'tipo'=>$tipo])."'>";
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo CdaAnalisisHidrologico que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams,$id_cda_tramite,$actividadactual,$id_cproceso)
    {
        
         //Obteniendo la informacion del encabezado =====================================================
        $searchModel = new \common\models\cda\PantallaprincipalSearch();
        $encabezado = $searchModel->searchT($id_cda_tramite);
        
        
        //Sacando el html para el encabezado ===========================================================
        $basicas = New BasicController();
        $encabezado = $basicas->encabezadoTramite($encabezado[0]);
        
        
        //Averiguando id_cactividad_proceso actual ====================================================
        $ps_cactividad_proceso = $basicas->actualPsCactividadProceso($id_cproceso,$id_cda_tramite);
        
        
          //Nombre de la actividad actual =======================================================
        $nameactividad = $basicas->findActividades(null,$actividadactual);
        
        
        //Total de cod_cda que tengo
        //Averiguando cantidad de codigos CDA asociados al tramite ====================================
        $_totalcodcda = \common\models\cda\PsCodCda::find()
                        ->leftJoin('cda','cda.id_cda=ps_cod_cda.id_cda')
                        ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso =  cda.id_cactividad_proceso')
                        ->where(['ps_cactividad_proceso.id_cproceso'=>$id_cproceso])
                        ->count();
        
        
        
        
        $searchModel = new CdaAnalisisHidrologicoSearch();
        $queryParams['CdaAnalisisHidrologicoSearch']['id_cactividad_proceso'] = $ps_cactividad_proceso->id_cactividad_proceso;
        $dataProvider = $searchModel->search($queryParams);

          if ($dataProvider->getTotalCount()<$_totalcodcda) {
              $enableCreate=true;
         }else{
              $enableCreate=false;
         }

        return [
           'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'encabezado' => $encabezado,
            'pscactividadproceso' => $ps_cactividad_proceso,
            'enableCreate'=>$enableCreate,
            'nombreactividad'=>$nameactividad['nom_actividad']
        ];
    }

    /**
     * Presenta un dato unico en el modelo CdaAnalisisHidrologico.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaAnalisisHidrologico .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso,$tipo,$id_cda_tramite)
    {
        $model = new CdaAnalisisHidrologico();

        if ($model->load($request)) {
            
                $transaction = Yii::$app->db->beginTransaction();
                $model->id_tipo = '2';
                $model->id_actividad = $actividadactual;
                $model->id_cactividad_proceso = $pscactividad_proceso;
             
                 if($model->save()){
                 
                  $crear_pscactividadproceso = $this->pasardiligenciada($id_cproceso, $pscactividad_proceso);
                  
                   if($crear_pscactividadproceso == TRUE){
                            
                            $model4 = $this->findPscactividadProceso($pscactividad_proceso);
                            $model4->diligenciado = 'S';
                            
                            if($model4->save()){
                                $transaction->commit();
                                return [
                                    'model' => $model,
                                    'create' => 'True'
                                ];
                                
                            }else{
                                $transaction->rollBack(); 
                                throw new \yii\web\HttpException(404, 'Error al registrar actividad');
                            }
                   }else{
                       
                        $transaction->commit();

                        return [
                            'model' => $model,
                            'create' => 'True'
                        ];
                   }
                  
                }else{
                   $transaction->rollBack(); 
                   throw new \yii\web\HttpException(404, 'Error al registrar el evento');
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
     * Modifica un dato existente en el modelo CdaAnalisisHidrologico.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso)
    {
        $model = $this->findModel($id);
        
        if(!empty($model->id_ehidrografica)){
            $model->nom_ehidrografica = $this->nomhidrografica($model->id_ehidrografica);
        }
        
        if(!empty($model->id_emeteorologica)){
            $model->nom_emeteorologica = $this->actionNommeteorlogica($model->id_emeteorologica);
        }

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
     * Deletes an existing CdaAnalisisHidrologico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de CdaAnalisisHidrologico basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return CdaAnalisisHidrologico el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = CdaAnalisisHidrologico::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  CdaAnalisisHidrologico     */
    protected function findModelByParams($params)
    {
        if (($model = CdaAnalisisHidrologico::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo CdaAnalisisHidrologico     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type CdaAnalisisHidrologico     */
     public function cargaCdaAnalisisHidrologico($params){
        return $this->findModelByParams($params);
    }
	
	   /*
     * Funcion que pasa la solicitud a diligenciada
     */
    protected function pasardiligenciada($id_cproceso,$id_cactividad_proceso){
        
        $_totalcodcda = \common\models\cda\PsCodCda::find()
                ->leftJoin('cda','cda.id_cda=ps_cod_cda.id_cda')
                ->leftJoin('ps_cactividad_proceso','ps_cactividad_proceso.id_cactividad_proceso =  cda.id_cactividad_proceso')
                ->where(['ps_cactividad_proceso.id_cproceso'=>$id_cproceso])
                ->count();
        
        $_totalreporte = CdaAnalisisHidrologico::find()->where(['id_cactividad_proceso'=>$id_cactividad_proceso])->count();
        
        
        if($_totalcodcda == $_totalreporte){
            return TRUE;
        }else{
            return FALSE;
        }
        
    }
    
    public function findPscactividadProceso($id_cactividad_cproceso){
       
        if (($model = \common\models\cda\PsCactividadProceso::findOne($id_cactividad_cproceso)) !== null) {
              return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    protected function nomhidrografica($idehidrografica){
        
        
        $modelname = \common\models\cda\CdaEstacionHidrologica::findOne($idehidrografica);
        
        if(!empty($modelname)){
            return $modelname->nom_ehidrografica;
        }
    }
    
    
     /*
     * Entrega nombre de emeteorlogica
     */
     protected function actionNommeteorlogica($id){
        
        
        $modelname = \common\models\cda\CdaEstacionMeteorologica::findOne($id);
        
        if(!empty($modelname)){
            return $modelname->nom_emeteorologica;
        }
    }
}