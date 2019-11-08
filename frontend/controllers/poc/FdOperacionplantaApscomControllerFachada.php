<?php

namespace frontend\controllers\poc;

use Yii;
use common\models\poc\FdOperacionplantaApscom;
use common\models\poc\FdOperacionplantaApscomSearch;
use common\controllers\controllerspry\FachadaPry;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * FdOperacionplantaApscomControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo FdOperacionplantaApscom.
 */
class FdOperacionplantaApscomControllerFachada extends FachadaPry
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
	
public function actionProgress($urlroute,$id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus,$idjunta){
		
$progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif')."</div>"; 
       $progressbar = $progressbar . "<div style='text-align:center'>Guardando</div>";

       
        if($urlroute == 'detcapitulo/genvistaformato'){
                     $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id_fmt'=>$id_fmt,
                                'id_conj_rpta' => $id_cnj_rpta,
                                'id_conj_prta' => $id_conj_prta,
                                'id_fmt' => $id_fmt, 
                                'last' => $id_version, 
                                'estado' => $estado,
                                'capitulo'=>$capitulo,
                                'cantones'=>$cantones,
                                'provincia'=>$provincia,
                                'parroquias'=>$parroquias,
                                'periodos'=>$periodos,
                                'antvista'=>$antvista,
                                'focus'=>$focus, 
                  		'idjunta' => $idjunta,
                                ])."'>";
            }else{
                $progressbar = $progressbar .  "<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id_fmt'=>$id_fmt,
                                'id_version'=>$id_version,
                                'id_conj_prta'=>$id_conj_prta,
                                'id_cnj_rpta'=>$id_cnj_rpta,
                                'id_capitulo'=>$id_capitulo,
                                'id_prta'=>$id_prta,
                                'id_rpta'=>$id_rpta,
                                'numerar'=>$numerar,
                                'nom_prta'=>$nom_prta,
                                'migadepan'=>$migadepan,
                                'estado'=>$estado,
                                'capitulo'=>$capitulo,
                                'cantones'=>$cantones,
                                'parroquias'=>$parroquias,
                                'periodos'=>$periodos,
                                'provincia'=>$provincia,
                                'antvista'=>$antvista,
                                'focus'=>$focus, 
                                'idjunta' => $idjunta,
                                ])."'>";
            }
       return $progressbar;
	}

	
	
    /**
     * Listado todos los datos del modelo FdOperacionplantaApscom que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex($queryParams)
    {
                $searchModel = new FdOperacionplantaApscomSearch();
                $parametros = Yii::$app->request->queryParams;
                $dataProvider = $searchModel->search($parametros,$queryParams);

                return [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                ];
            }

    /**
     * Presenta un dato unico en el modelo FdOperacionplantaApscom.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {       
            return $this->findModel($id);
 
    }

    /**
     * Crea un nuevo dato sobre el modelo FdOperacionplantaApscom .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionCreate($request,$isAjax,$id_cnj_rpta,$id_prta,$id_rpta,$focus,$idjunta)
    {
        $model = new FdOperacionplantaApscom();
        
        if(!empty($id_cnj_rpta)){
            $model->id_conjunto_respuesta =$id_cnj_rpta;
            $model->id_junta =$idjunta;
        }
        
        if(!empty($id_rpta)){
           $model->id_respuesta =$id_rpta; 
        }
        
        if(!empty($id_prta)){
           $model->id_pregunta =$id_prta; 
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
     * Modifica un dato existente en el modelo FdOperacionplantaApscom.
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
     * Deletes an existing FdOperacionplantaApscom model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletep($id)
    {
        $this->findModel($id)->delete();

    }

    /**
     * Encuentra el modelo de FdOperacionplantaApscom basado en el valor de la primary key.
     * Si no encuentra respuesta, arroja una excepcion 404 HTTP.
     * @param integer $id
     * @return FdOperacionplantaApscom el modelo cargado
     * @throws NotFoundHttpException si no puede ser encontrada la respuesta
     */
    protected function findModel($id)
    {
                    if (($model = FdOperacionplantaApscom::findOne($id)) !== null) {
                        return $model;
                    } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                    }
    }
    
    /**
     * Funcion generica para la consulta por parametros, debe ser llamada por la funcion publica
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type  FdOperacionplantaApscom     */
    protected function findModelByParams($params)
    {
        if (($model = FdOperacionplantaApscom::findAll($params)) !== null) {
            return $model;
        }
        else{
            return null;
        } 
    }
     
    /**
     * Funcion visible para los objetos que necesiten una consulta al modelo FdOperacionplantaApscom     
     * @param type $params contiene array con valores de query a columnas de la tabla
     * @return type FdOperacionplantaApscom     */
     public function cargaFdOperacionplantaApscom($params){
        return $this->findModelByParams($params);
    }
}