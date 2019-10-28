<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller.
 */
class ReportesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['login', 'error'],
//                        'allow' => true,
//                    ],
//                    [
//                        'actions' => ['logout', 'index'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            /*   Yii::$app->getSession()->setFlash('success', [
                              'type' => 'error',
                              'message' => 'Hola si llega mensaje',
                          ]);

               return $this->render('login', [
                   'model' => $model,
               ]);*/
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionReporteFormato()
    {        
        $model = new \backend\models\autenticacion\ReporteFormatoForm();
        $msg = '';

        $entidades ="";
        $preguntas ="";
        $formato="";
        $provincia="";
        $_stringprint2= $_stringprint3=  $_stringprint4= $_stringprint5= $_stringprint6=$_stringprint7=$_stringprint8=$_stringprint9=$_stringprint10="";
        if ($model->load(Yii::$app->request->post())) {
          $formato = $model->id_formato;          
          $provincia = $model->provincia;    
          if(empty($formato))
          {
               Yii::$app->getSession()->setFlash('error', [
                             'message' => 'Debe seleccionar un formato',
                         ]);
                return $this->render('reporteformato', [
                'model' => $model, 
                'msg' => $msg,
                'formato'=>$formato
                ]);
          }
           if(empty($provincia)&& $formato==6)
              {
                Yii::$app->getSession()->setFlash('error', [
                             'message' => 'Debe seleccionar una provincia',
                         ]);
                return $this->render('reporteformato', [
                'model' => $model, 
                'msg' => $msg,
                'formato'=>$formato
                ]);
              }
          
          $_stringprint = utf8_decode($model->actionGenhtmlrepo($formato,$provincia)); 
          if(empty($_stringprint))
          {
              Yii::$app->getSession()->setFlash('error', [
                           'message' => 'No existen registros para esta información',
                       ]);
                return $this->render('reporteformato', [
                'model' => $model, 
                'msg' => $msg,
                'formato'=>$formato
                ]);
          }
          if($formato==5)
          {
                $_stringprint2 = utf8_decode($model->ObtenernFuentes($formato));
                $_stringprint3 = utf8_decode($model->ObtenernUbicacion($formato));
                $_stringprint4 = utf8_decode($model->ObtenernObrasCaptacion($formato));
          }
          else if($formato==6)
          {              
                $_stringprint2 = utf8_decode($model->ObtenernDetFuentes($formato,$provincia));
                $_stringprint3 = utf8_decode($model->ObtenernDetCaptacion($formato,$provincia));
                $_stringprint4 = utf8_decode($model->ObtenernBombaCapta($formato,$provincia));
                $_stringprint5 = utf8_decode($model->ObtenernConduccionGra($formato,$provincia));
                $_stringprint6 = utf8_decode($model->ObtenernConduccionIm($formato,$provincia));
                $_stringprint7 = utf8_decode($model->ObtenernTrataD($formato,$provincia));
                $_stringprint8 = utf8_decode($model->ObtenernPotaAgua($formato,$provincia));
                $_stringprint9 = utf8_decode($model->ObtenernOperacionPlanta($formato,$provincia));
                $_stringprint10 = utf8_decode($model->ObtenernTanquesAlmacena($formato,$provincia));
          }
          $nombre_formato="REPORTE FORMATO ";    
          $GeneraExcel = new \common\general\documents\genExcel();        
          $GeneraExcel->generadorExcelHTML2($_stringprint,$nombre_formato,'../../frontend/web/css/formato.css','','','','',$formato,$_stringprint2,$_stringprint3,$_stringprint4,$_stringprint5,$_stringprint6,$_stringprint7,$_stringprint8,$_stringprint9,$_stringprint10);          
        } else {
            $model->getErrors();
        }

        return $this->render('reporteformato', [
            'model' => $model, 
            'msg' => $msg,
            'formato'=>$formato
        ]);
    }
    
    public function actionReporteUnir()
    {
         $model = new \backend\models\autenticacion\ReporteUnirForm();
         $formato="";
         $msg="";
         
          if ($model->load(Yii::$app->request->post())) {  
              $formato = $model->id_formato; 
              if ($model->actionReporteUnir($formato)) {
                Yii::$app->getSession()->setFlash('success', [
                           //'type' => 'error',
                           'message' => 'El usuario ha sido creado éxitosamente.',
                       ]);
                
            } else {
                //$msg = 'Ha ocurrido un error al llevar a cabo tu registro';
                Yii::$app->getSession()->setFlash('error', [
                           //'type' => 'error',
                           'message' => 'Error al ejecutar el proceso, verifique la información',
                       ]);
            }
          }
                  
         return $this->render('reporteunir', [
            'model' => $model, 
            'msg' => $msg,
            'formato'=>$formato
        ]);
         
         
         
         
         
         
    }

   
}
