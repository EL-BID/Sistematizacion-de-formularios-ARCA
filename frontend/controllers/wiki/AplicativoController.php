<?php

namespace frontend\controllers\wiki;

use Yii;
use frontend\models\wiki\Aplicativo;
use frontend\models\wiki\Conjuntorespuesta;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;               //Para presentar la barra de espera
use yii\helpers\Url;                //Para presentar la barra de espera
use yii\data\ArrayDataProvider;

/**
 * ClientesdropdownController implementa las acciones a través del sistema CRUD para el modelo Clientesdropdown.
 */
class AplicativoController extends Controller
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




    /**
     * Crea un nuevo dato sobre el modelo Clientesdropdown .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function actionIndex()
    {
        $datos="";
        return $this->render('index', [
            'datos' => $datos,
        ]);
    }


    public function actionGrilla()
    {

        $provincia = (Yii::$app->request->post('provincia'))? Yii::$app->request->post('provincia'):NULL;
        $cantones = (Yii::$app->request->post('cantones'))? Yii::$app->request->post('cantones'):NULL;
        $parroquias = (Yii::$app->request->post('parroquias'))? Yii::$app->request->post('parroquias'):NULL;
        $formato = (Yii::$app->request->post('formato'))? Yii::$app->request->post('formato'):NULL;
        $periodos = (Yii::$app->request->post('periodos'))? Yii::$app->request->post('periodos'):NULL;
        $estado = (Yii::$app->request->post('estados'))? Yii::$app->request->post('estados'):NULL;


        $grillaPost = Yii::$app->db2->createCommand('SELECT entidades.nombre_entidad,fd_formato.nom_formato,fd_adm_estado.nom_adm_estado '
                    . 'FROM fd_conjunto_respuesta '
                    . 'LEFT JOIN entidades ON entidades.id_entidad=fd_conjunto_respuesta.id_entidad '
                    . 'LEFT JOIN fd_formato ON fd_formato.id_formato=fd_conjunto_respuesta.id_formato '
                    . 'LEFT JOIN fd_adm_estado ON fd_adm_estado.id_adm_estado=fd_conjunto_respuesta.ult_id_adm_estado '
                    . 'WHERE entidades.cod_canton=:cantones '
                    . 'AND entidades.cod_provincia=:provincia '
                    . 'AND entidades.cod_parroquia=:parroquias '
                    . 'AND fd_conjunto_respuesta.id_formato=:formato '
                    . 'AND fd_conjunto_respuesta.id_periodo=:periodos '
                    . 'AND fd_conjunto_respuesta.ult_id_adm_estado=:estado')
                    ->bindValue(':cantones',$cantones)
                    ->bindValue(':parroquias', $parroquias)
                    ->bindValue(':formato', $formato)
                    ->bindValue(':provincia', $provincia)
                    ->bindValue(':periodos', $periodos)
                    ->bindValue(':estado', $estado)
                    ->queryAll();


             $datos = new ArrayDataProvider([
                        'allModels' => $grillaPost,
                        'pagination' => [
                            'pageSize' => 10,
                        ],
                        'sort' => [
                            'attributes' => ['nombre_entidad', 'nom_formato'],
                        ],
                    ]);

        return $this->renderPartial('_grilla', [
            'datos' => $datos,
        ]);
    }
}

