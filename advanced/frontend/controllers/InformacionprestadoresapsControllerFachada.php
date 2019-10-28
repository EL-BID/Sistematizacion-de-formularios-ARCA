<?php

namespace frontend\controllers;

use Yii;
use common\models\Informacionprestadores;
use common\models\InformacionprestadoresSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * InformacionprestadoresriegoControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Informacionprestadores.
 */
class InformacionprestadoresapsControllerFachada extends FachadaPry
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
	
	public function actionProgress($urlroute, $id_fmt, $id_conj_prta, $id_cnj_rpta, $migadepan,$estado, $capitulo, $provincia, $cantones, $parroquias, $periodos, $antvista){
		
	
       $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>"; 
       $progressbar = $progressbar . "<div style='text-align:center'>Guardando</div>";

        if($urlroute == 'detcapitulo/genvistaformato'){
                     $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id_fmt'=>$id_fmt,
                                'id_conj_prta' => $id_conj_prta,       
                                'id_cnj_rpta' => $id_cnj_rpta,                                
                                'id_fmt' => $id_fmt,    
                                'migadepan' => $migadepan,
                                'estado' => $estado,
                                'capitulo'=>$capitulo,
                                'cantones'=>$cantones,
                                'provincia'=>$provincia,
                                'parroquias'=>$parroquias,
                                'periodos'=>$periodos,
                                'antvista'=>$antvista,
                                ])."'>";
            }else{
                $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id_fmt'=>$id_fmt,                                
                                'id_conj_prta'=>$id_conj_prta,
                                'id_cnj_rpta'=>$id_cnj_rpta, 
                                'migadepan' => $migadepan,                    
                                'estado'=>$estado,
                                'capitulo'=>$capitulo,
                                'cantones'=>$cantones,
                                'parroquias'=>$parroquias,
                                'periodos'=>$periodos,
                                'provincia'=>$provincia,
                                'antvista'=>$antvista,                                
                                ])."'>";
            }
            return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo Informacionprestadores que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                $searchModel = new InformacionprestadoresSearch();
                $dataProvider = $searchModel->search($queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
            }

    /**
     * Presenta un dato unico en el modelo Informacionprestadores.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo Informacionprestadores .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax,$id_cnj_rpta)
    {
        $model = new Informacionprestadores();
        
       if(!empty($id_cnj_rpta)){
            $model->id_conjunto_respuesta =$id_cnj_rpta;
        }

        if ($model->load($request) && $model->save()) {
			
                return [
                    'model' => $model,
                    'create' => 'True'
                ];	

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
     * Modifica un dato existente en el modelo Informacionprestadores.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param string $id
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
     * Deletes an existing Informacionprestadores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de Informacionprestadores basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param string $id
     * @return Informacionprestadores el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = Informacionprestadores::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  Informacionprestadores     */
    protected function findModelByParams($params)
    {
        if (($model = Informacionprestadores::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo Informacionprestadores     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type Informacionprestadores     */
     public function cargaInformacionprestadores($params){
        return $this->findModelByParams($params);
    }
}