<?php

namespace frontend\controllers;

use Yii;
use yii\rest\ActiveController;
use frontend\models\Auditoria;

/**
 * Controlador para el sistema service REST
 */

class RestController extends ActiveController
{

    public $modelClass='frontend\models\Auditoria';
    
   /* protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
        ];
    }*/
    
    /*public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }*/
    
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;	
    }
	
    public function actionCreate(){
       /* print_r(Yii::$app->request->post());
        die();*/
        $model = new Auditoria();
        if ($model->load(Yii::$app->request->post(),'')) {
            $model->save();
            return $model;
        }else{
            return "No fue posible guardar el error en el servicio web";
        }
    }
    
    
    
    
}


