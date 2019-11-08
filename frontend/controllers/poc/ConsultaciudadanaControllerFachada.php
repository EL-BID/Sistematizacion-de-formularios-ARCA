<?php

namespace frontend\controllers\poc;

use Yii;
use common\controllers\controllerspry\FachadaPry;
use common\models\poc\FdConjuntoPregunta;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera
use yii\jui\ProgressBar;

/**
 * FdCoordenadaControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo FdCoordenada.
 */
class ConsultaciudadanaControllerFachada extends FachadaPry
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
	
	
       /*
     * funcion que entrega el conjunto pregunta
     * asociado al formato Consulta Ciudadana id=> 4
     * se consulta la ultima version del formato pues se da como formato activo
     * y se consulta el conjunto de preguntas asociado al formato
     */
    public function getConjuntoPregunta($id_fmt){
     
        $_conjuntopregunta = FdConjuntoPregunta::find()
                             ->leftJoin('fd_formato','fd_formato.id_formato=fd_conjunto_pregunta.id_formato')
                             ->leftJoin('fd_version','fd_version.id_version=fd_conjunto_pregunta.id_version')
                             ->where(['=','fd_formato.id_formato',$id_fmt])
                             ->orderBy(['fd_conjunto_pregunta.id_version'=>SORT_DESC])
                             ->limit(1)
                             ->one();
        
        if(empty($_conjuntopregunta->id_conjunto_pregunta)){
            throw new NotFoundHttpException("No se encuentra habilitado el formato");
        }else{
            $_idconjuntopregunta= $_conjuntopregunta->id_conjunto_pregunta;
        }
        
        return $_idconjuntopregunta;
        
    }
}
