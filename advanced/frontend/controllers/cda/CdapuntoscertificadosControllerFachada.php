<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\CdaPuntosCertificados;
use common\models\cda\CdaPuntosCertificadosSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * CdapuntoscertificadosControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo CdaPuntosCertificados.
 */
class CdapuntoscertificadosControllerFachada extends FachadaPry
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
	
	public function actionProgress($urlroute=null,$id=null){
		
	
            $progressbar = "<div style='display:block;margin:auto;width:50%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>"; 
            $progressbar = $progressbar . "<div style='display:block;margin:auto;width:50%;text-align:center'>Guardando</div>"; 	
            $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo CdaPuntosCertificados que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                $searchModel = new CdaPuntosCertificadosSearch();
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
            }

    /**
     * Presenta un dato unico en el modelo CdaPuntosCertificados.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo CdaPuntosCertificados .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     * Modificado: DB 20191002
     */
    public function actionCreate($request,$isAjax,$id_cda_tramite,$id_cproceso,$pscactividadproceso)
    {
        
        if($this->findModel2($id_cda_tramite) == false){
            $model = new CdaPuntosCertificados();
        }else{
            $model =  $this->findModel2($id_cda_tramite);
        }
        
        
        
        
        if ($model->load($request) ) {
		
                $model->id_cda_tramite = $id_cda_tramite;
                
                if($model->save()){
                    
                    $model4 = $this->findPscactividadProceso($pscactividadproceso);
                    $model4->diligenciado = 'S';
                    
                    if($model4->save()){
                        return [
                            'model' => $model,
                            'create' => 'True'
                        ];
                    }else{
                         throw new \yii\web\HttpException(404, 'Error al diligenciar ACTIVIDAD');
                    }
                }/*else{
                        $errores = $model->getErrors();
                        foreach($errores as $clave){
                            $_revisando = implode(",",$clave);
                            Yii::trace("sera que asi si: ".$_revisando,"DEBUG");
                        }
                }*/

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
     * Modifica un dato existente en el modelo CdaPuntosCertificados.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$request,$isAjax)
    {
        $model = $this->findModel($id);

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
     * Deletes an existing CdaPuntosCertificados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }
    
    
    protected function findModel_proceso($id)
    {
        if (($model = PsCactividadProceso::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Encuentra el modelo de CdaPuntosCertificados basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return CdaPuntosCertificados el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = CdaPuntosCertificados::findOne($id)) !== null) {
                        return $model;
                    } else {
                        return false;
                    }
    }
    
    
    protected function findModel2($id_cda_tramite)
    {
        if (($model = CdaPuntosCertificados::find()->where(['id_cda_tramite'=>$id_cda_tramite])->one()) !== null) {
            return $model;
        } else {
            return false;
        }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  CdaPuntosCertificados     */
    protected function findModelByParams($params)
    {
        if (($model = CdaPuntosCertificados::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo CdaPuntosCertificados     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type CdaPuntosCertificados     */
     public function cargaCdaPuntosCertificados($params){
        return $this->findModelByParams($params);
    }
    
     public function findPscactividadProceso($id_cactividad_cproceso){
       
        if (($model = \common\models\cda\PsCactividadProceso::findOne($id_cactividad_cproceso)) !== null) {
              return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}