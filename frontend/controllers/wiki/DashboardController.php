<?php

namespace frontend\controllers\wiki;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;               //Para presentar la barra de espera
use yii\helpers\Url;                //Para presentar la barra de espera


/**
 * ClientesdropdownController implementa las acciones a través del sistema CRUD para el modelo Clientesdropdown.
 */
class DashboardController extends Controller
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





    public function actionIndex($id_rpta,$id_prta,$id_fmt,$last)
    {
       $alldata=array();
       $_dashboardPost = Yii::$app->db2->createCommand('SELECT fd_capitulo.* FROM fd_capitulo '
                    . 'LEFT JOIN fd_conjunto_pregunta ON fd_conjunto_pregunta.id_conjunto_pregunta=fd_capitulo.id_conjunto_pregunta '
                    . 'WHERE fd_conjunto_pregunta.id_formato=:formato '
                    . 'AND fd_conjunto_pregunta.id_conjunto_pregunta=:pregunta '
                    . ' ORDER BY orden ASC')
                    ->bindValue(':formato',$id_fmt)
                    ->bindValue(':pregunta', $id_prta)
                    ->queryAll();

       foreach($_dashboardPost as $clave){
           $alldata[] = ['id'=>$clave['id_capitulo'],'nomcapitulo' => $clave['nom_capitulo'], 'icono'=> $clave['icono'] ];
       }

        return $this->render('index', [
            'array_data' => $alldata,
        ]);
    }
}

