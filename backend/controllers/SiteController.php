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
class SiteController extends Controller
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

    /**
     * Crea un nuevo dato sobre el modelo User .
     * Si se crea correctamente se guarda el usuario.
     *
     * @return mixed
     */
    public function actionCreateUser()
    {
        $model = new \backend\models\autenticacion\CreateUserForm();
        $msg = '';

        if ($model->load(Yii::$app->request->post())) {
            //$msg = 'post '.Yii::$app->request->post('POC')."----".$model->POC;

            if ($model->POC == 1) {
                $model->POC = true;
            } else {
                $model->POC = false;
            }

            if ($model->CreateUser()) {
                Yii::$app->getSession()->setFlash('success', [
                           //'type' => 'error',
                           'message' => 'El usuario ha sido creado éxitosamente, le será enviado un correo a la dirección proporcionada en el registro, con el usuario y la contraseña generadas.',
                       ]);

                $model = new \backend\models\autenticacion\CreateUserForm();
            } else {
                //$msg = 'Ha ocurrido un error al llevar a cabo tu registro';
                Yii::$app->getSession()->setFlash('success', [
                           //'type' => 'error',
                           'message' => 'Ha ocurrido un error al llevar a cabo tu registro',
                       ]);
            }
        } else {
            $model->getErrors();
        }

        return $this->render('createuser', [
            'model' => $model, 'msg' => $msg,
        ]);
    }
    
    public function actionCreateUserExcel()
    {
        $model = new \backend\models\autenticacion\CreateUserExcelForm();
        $msg = "";
        $formato="";

        if ($model->load(Yii::$app->request->post())) {                      
         $formato = $model->id_formato;                    
         if(empty($formato))
         {
              Yii::$app->getSession()->setFlash('error', [
                             'message' => 'Debe seleccionar un formato',
                         ]);
              return $this->render('createuserexcel', [
             'model' => $model, 'msg' => $msg,'formato'=>$formato
        ]);
         }

            if ($model->POC == 1) {
                $model->POC = true;
            } else {
                $model->POC = false;
            }

            if ($model->createUserExcel()) {
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
        } else {
            $model->getErrors();
        }

        return $this->render('createuserexcel', [
            'model' => $model, 'msg' => $msg,'formato'=>$formato
        ]);
    }

    public function actionActualizaFormulario($id)
    {
        $model = new \backend\models\autenticacion\CreateUserForm();
        $datos = $model->cargaFormato($id);
        if (count($datos) > 0) {
            // echo "<option> ".count($datos)." </option>";
            foreach ($datos as $data) {
                echo "<option value='".$data['id_formato']."'>".$data['nom_formato'].'</option>';
            }
        } else {
            echo "<option value='0'> - </option>";
        }
    }

    public function actionActualizaCanton($cod_provincia)
    {
        $model = new \backend\models\autenticacion\CreateUserForm();
        $datos = $model->cargaCantones($cod_provincia);
        echo "<option value=''>Indique el canton</option>";
        if (count($datos) > 0) {
            // echo "<option> ".count($datos)." </option>";
            foreach ($datos as $data) {
                echo "<option value='".$data['cod_canton']."'>".$data['nombre_canton'].'</option>';
            }
        } else {
            echo '<option> - </option>';
        }
    }

    public function actionActualizaParroquia($cod_canton, $cod_provincia)
    {
        $model = new \backend\models\autenticacion\CreateUserForm();
        $datos = $model->cargaParroquias($cod_provincia, $cod_canton);
        echo "<option value=''>Indique la parroquia</option>";
        if (count($datos) > 0) {
            // echo "<option> ".count($datos)." </option>";
            foreach ($datos as $data) {
                echo "<option value='".$data['cod_parroquia']."'>".$data['nombre_parroquia'].'</option>';
            }
        } else {
            echo '<option> - </option>';
        }
    }
}
