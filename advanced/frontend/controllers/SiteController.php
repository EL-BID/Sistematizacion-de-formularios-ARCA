<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\LoginForm2;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\Url;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
       
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
       
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
       
    }
	
	
	/**
     * Logs in a user.  //Ejemplo para validar datos desde el controlador
     *
     * @return mixed
     */
    /*public function actionRevision()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		
		//return $this->render('index');
		$model = new LoginForm2();
		$model->username=$_POST['username'];
		$model->password=$_POST['password'];
		$model->rememberMe=$_POST['rememberMe'];
		
		if($model ->validate()){
			$model->login();
			return $this->goBack();
		}else{
			 return $this->render('login', [
                'model' => $model,
            ]);
		}
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
       $msg=null;
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            
            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
//                    return $this->goHome();
//                }
                if ($model->sendEmail($user)) {
                    Yii::$app->session->setFlash('success', 'Revise su correo para más instrucciones.');
                    return $this->goHome();
                } else {
                   $msg =  'Lo sentimos, no es posible hacer la petición para el correo ingresado.';
                }

            }
              else
              {
               $msg =  "Ha ocurrido un error al llevar a cabo su registro";

              }

        }
        else
        {
              $model->getErrors();
        }
        

        return $this->render('signup', [
            'model' => $model, "msg" => $msg
        ]);
    }
    
    /**
     * 
     * @return type
     */
    public function actionConfirm()
    {
       $msg=null;
       $model = new SignupForm();
       if (Yii::$app->request->get())
       {

           //Obtenemos el valor de los parámetros get
           $id = (int) \yii\helpers\Html::encode($_GET["id"]);
           $auth_key = $_GET["key"];


              
               //Si el registro existe
               if ($model->confirm($id,$auth_key))
               {

                        $msg= "Proceso llevado a cabo correctamente, ya puede ingresar al sitio.";
                       
                
                }
               else //Si no existe redireccionamos a login
               {
                   $msg= "Ha ocurrido un error al realizar la confirmación.";
               }
           }
            else
        {
              $model->getErrors();
        }

        $login= new LoginForm;
        return $this->render('login', [
             'model' => $login, "msg" => $msg
         ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Revise su correo para m&aacute;s instrucciones.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Los sentimos, no es posible hacer la peticiòn para el correo ingresado.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Se ha reseteado el password correctamente.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Changes password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionChangePassword()
    {
       
        $model = new \common\models\ChangePassword();
        
        
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->changePassword()) {
            Yii::$app->session->setFlash('success', 'Se ha cambiado el password correctamente.');
            return $this->goHome();
        }else{
            Yii::$app->session->setFlash('error', 'NO ha sido posible cambiar el password');
        }
        //Yii::$app->user->usuario;
        $model->usuario=Yii::$app->user->identity->usuario;
        return $this->render('changePassword', [
            'model' => $model,
        ]);
    }

    public function actionPermisos()
    {
          return $this->render('permisonegado');
    }
    
     public function actionActualizaCanton($cod_provincia)
    {
         $model = new \backend\models\autenticacion\CreateUserForm();
         $datos = $model->cargaCantones($cod_provincia);
         echo "<option value=''>Indique el canton</option>";
        if (count($datos) > 0) {
           // echo "<option> ".count($datos)." </option>";
            foreach ($datos as $data ) {
                echo "<option value='" . $data['cod_canton']  . "'>" . $data['nombre_canton'] . "</option>";
            }
        } else {
            echo "<option> - </option>";
        }
    }
    
        public function actionActualizaParroquia($cod_canton,$cod_provincia)
    {
         $model = new \backend\models\autenticacion\CreateUserForm();
         $datos = $model->cargaParroquias($cod_provincia,$cod_canton);
         echo "<option value=''>Indique la parroquia</option>";
        if (count($datos) > 0) {
           // echo "<option> ".count($datos)." </option>";
            foreach ($datos as $data ) {
                echo "<option value='" . $data['cod_parroquia']  . "'>" . $data['nombre_parroquia'] . "</option>";
            }
        } else {
            echo "<option> - </option>";
        }
    }
    
    
}
