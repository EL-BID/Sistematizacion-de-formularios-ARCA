<?php

namespace frontend\controllers\cda;

use Yii;
use common\models\cda\PantallaprincipalSearch;
use common\controllers\controllerspry\FachadaPry;
use common\models\cda\PsResponsablesProceso;
use common\models\cda\PsCactividadProceso;
use common\models\cda\PsCproceso;
use common\models\cda\PsActividadRuta;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;	//Para presentar la barra de espera
use yii\helpers\Url;	//Para presentar la barra de espera

/**
 * ModulocdaControllerFachada implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo Cda.
 */
class DetalleprocesoControllerFachada extends FachadaPry
{
    /**
     * {@inheritdoc}
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

    public function actionProgress($urlroute = null, $id = null)
    {
        $progressbar = "<div style='margin-top:20%;text-align:center'>".Html::img('@web/images/lazul.gif').'</div>';
        $progressbar = $progressbar."<div style='text-align:center'>Guardando</div>";
        $progressbar = $progressbar."<meta http-equiv='refresh' content='3;".Url::toRoute([$urlroute, 'id' => $id])."'>";

        return $progressbar;
    }

    

    /**
     * Presenta un dato unico en el modelo Cda.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->findModel($id);
    }

   
    
}
