<?php

namespace frontend\controllers\wiki;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//Agregando Modelos
use frontend\models\wiki\Cantones_new;                   //Se agrega modelo cantones
use frontend\models\wiki\Parroquias_new;                 //Se agrega modelo parroquias
use frontend\models\wiki\Admestado_new;                  //Se agrega modelo Admestado
use frontend\models\wiki\Trperiodo_new;                  //Se agrega modelo Trperiodo


/**
 * ProvinciasControllerFachadaPry implementa las variables globales y estaticas, las funciones y valores base para el modelo Provincias.
 */
class AplicativonewControllerFachadaPry
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
     * Listado todos los datos del modelo Provincias que se encuentran en el tablename.
     * @return mixed
     */
    public function actionIndex()
    {

    }


}
