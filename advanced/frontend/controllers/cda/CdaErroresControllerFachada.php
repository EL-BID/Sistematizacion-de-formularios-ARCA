<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\CdaErrores;
use common\models\cda\CdaErroresSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdaerroresControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo CdaErrores.
 */
class CdaerroresControllerFachada extends FachadaPry
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
     * Listado todos los datos del modelo CdaErrores que se encuentran en el tablename.
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
        
        $searchModel = new CdaErroresSearch();
        $queryParams['CdaErroresSearch']['id_cactividad_proceso'] = $ps_cactividad_proceso->id_cactividad_proceso;
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
     * Presenta un dato unico en el modelo CdaErrores.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaErrores .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso,$tipo,$id_cda_tramite)
    {
        $basicas = New BasicController();
        $fechaactual = date(Yii::$app->fmtfechahoraphp);
        $model = new CdaErrores();
       
        
        //Sacando listado de tipo de errores
        $listadoerrores = $this->arrayErrores();
        
        
        if ($model->load($request) ) {
			
             $transaction = Yii::$app->db->beginTransaction();
             $model->id_tipo = '2';
             $model->id_actividad = $actividadactual;
             $model->id_cactividad_proceso = $pscactividad_proceso;
             
             $bandera=0;   
             if($model->save()){
                 
                 
                foreach($request['CdaErrores']['tipoerror'] as $clave_e){

                    $model2 = new \common\models\cda\CdaRegistroError();

                    $model2->id_tipo_error = $clave_e;
                    $model2->id_cda_error = $model->id_error;

                    if($model2->save()){
                        $bandera+=1;
                        continue;
                    }else{
//                        $errores = $model2->getErrors();
//                        foreach($errores as $clave){
//                            $_revisando = implode(",",$clave);
////                            Yii::trace("sera que asi si: ".$_revisando,"DEBUG");
//                        }
                        
                        $transaction->rollBack(); 
                        throw new \yii\web\HttpException(404, 'Error al registrar error'); 
                    }
                }
                 
//                $crear_pscactividadproceso = $this->pasardiligenciada($id_cproceso, $pscactividad_proceso);
                  
                if($bandera>0){
                 
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
                     $transaction->rollBack(); 
                     throw new \yii\web\HttpException(404, 'Error al registrar errores');
                }
            }else{

                 $transaction->commit();

                 return [
                     'model' => $model,
                     'create' => 'True'
                 ];
            }
                  
            
            
        }
        elseif ($isAjax) {
        
                return [
                    'model' => $model,
                    'create' => 'Ajax',
                    'listadoerrores' => $listadoerrores
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
     * Modifica un dato existente en el modelo CdaErrores.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$request,$isAjax,$actividadactual,$id_cproceso,$pscactividad_proceso)
    {
        $model = $this->findModel($id);
        $_registroError = \common\models\cda\CdaRegistroError::find()->where(['id_cda_error'=>$id])->all(); 

        //Sacando listado de tipo de errores
        $listadoerrores = $this->arrayErrores();
        
        if ($model->load($request) && $model->save()) {
			
             $transaction = Yii::$app->db->beginTransaction();
             
             if($model->save()){
                 
                 $this->deleteRegistros($id);
                 
                 if(empty($request['CdaErrores']['tipoerror'])){
                     
                      $model2 = new \common\models\cda\CdaRegistroError();

                      $model2->id_tipo_error = 7;
                      $model2->id_cda_error = $model->id_error;

                      $model2->save();
                     
                 }else{
                 
                    foreach($request['CdaErrores']['tipoerror'] as $clave_e){

                       $model2 = new \common\models\cda\CdaRegistroError();

                       $model2->id_tipo_error = $clave_e;
                       $model2->id_cda_error = $model->id_error;

                       if($model2->save()){
                           continue;
                       }else{
                           $transaction->rollBack(); 
                           throw new \yii\web\HttpException(404, 'Error al registrar actividad'); 
                       }
                   }
                 }
                
                $transaction->commit();

                        return [
                            'model' => $model,
                            'update' => 'True'
                        ];
                 
             }else{
                $transaction->rollBack(); 
                throw new \yii\web\HttpException(404, 'Error al registrar actividad');  
             }
	
        } 
         elseif ($isAjax) {
             
                foreach($_registroError as $_clave){
                    $model->tipoerror[]= $_clave->id_tipo_error;
                }
        
                return [
                    'model' => $model,
                    'update' => 'Ajax',
                    'listadoerrores' => $listadoerrores
                ];	
           
        }  
        else {
                         return [
                            'model' => $model,
                            'update' => 'False',
                              'listadoerrores' => $listadoerrores
                        ];
        }
    }

    /**
     * Deletes an existing CdaErrores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }
    
    /*
     * Borrando Registro de errores antes de modificaicon
     */
    protected function deleteRegistros($id){
        
        $cda_Reg = \common\models\cda\CdaRegistroError::find()->where(['id_cda_error'=>$id])->all();
        
        foreach($cda_Reg as $_errores){
            $_errores->delete();
        }
    }

    /**
     * Encuentra el modelo de CdaErrores basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return CdaErrores el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = CdaErrores::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  CdaErrores     */
    protected function findModelByParams($params)
    {
        if (($model = CdaErrores::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo CdaErrores     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type CdaErrores     */
     public function cargaCdaErrores($params){
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
        
        $_totalreporte = CdaErrores::find()->where(['id_cactividad_proceso'=>$id_cactividad_proceso])->count();
        
        
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
    
    protected function arrayErrores(){
        $listitpoerrores = \common\models\cda\CdaTipoError::find()->all();
        $v_tipoerrores=array();
        foreach($listitpoerrores as $clave){
            $v_tipoerrores[$clave->id_terror] = $clave->nom_terror;
        }
        
        return $v_tipoerrores;
    }
}