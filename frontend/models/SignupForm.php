<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $id_usuario;
    public $usuario;
    public $clave;
    public $login;
    public $tipo_usuario;
    public $estado_usuario;
    public $usuario_digitacion;
    public $identificacion;
    public $nombres;
    public $fecha_digitacion;
    public $email;
    public $auth_key;


 
    /**
     * @inheritdoc
     */
  
    /**
     * @inheritdoc Reglas de Validaci�n
     */
    public function rules()
    {
        return [
            [['usuario', 'login','identificacion','clave','tipo_usuario', 'nombres', 'email','id_usuario'], 'required'], //'fecha_digitacion','estado_usuario',
            [['identificacion'], 'number'],
            //[['fecha_digitacion'], 'string'],
            [['usuario', 'clave', 'login'], 'string', 'max' => 50],
            [['tipo_usuario', 'estado_usuario'], 'string', 'max' => 1],
            [['nombres', 'email'], 'string', 'max' => 200],
            [['email'], 'email_existe'],
            [['id_usuario'], 'id_existe'],
            [['usuario'], 'usuario_existe'],
            [['login','clave'], 'string', 'min' => 6,'message' => 'Minimo 6 Caracteres'],
            [['login'], 'compare','compareAttribute'=>'clave','operator'=>'==','message'=>'Password y la confirmacion deben coincidir'],
            //[['authkey'], 'string', 'max' => 250],, 'usuario_digitador', 'authkey'    
        ];
    }
    
    
    
    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'usuario' => 'Usuario',
            'clave' => 'Password',
            'login' => 'Valida Password',
            'tipo_usuario' => 'Tipo Usuario',
            'estado_usuario' => 'Estado Usuario',
            'identificacion' => 'Identificacion',
            'nombres' => 'Nombres',
            //'usuario_digitador' => 'Usuario Digitador',
            'fecha_digitacion' => 'Fecha Digitacion',
            'email' => 'Email',
            //'authkey' => 'Authkey',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        
        if (!$this->validate()) {
            return null;
        }
        
        $usuario = new User();
        $user =$usuario->saveUser([
            'id_usuario'=> $this->id_usuario,
            'usuario'=>  $this->usuario,
            'clave'=> $this->clave,
            'login'=> $this->login,
            'tipo_usuario'=> $this->tipo_usuario,
            'estado_usuario'=> "n",
            'identificacion'=>$this->identificacion,
            'nombres'=>$this->nombres,
            'fecha_digitacion'=> null,
            'email'=> $this->email,
            'usuario_digitador'=> null,
            'auth_key'=>null
        ]);
        
       
        return $user ? $user : null;
    }
    
     public function confirm($id,$auth_key)
    {

      
               $user = User::findIdentityByAccessToken($auth_key,'Auth');
                   if ($user && $user->estado_usuario!='s'){
                        $user->estado_usuario = 's';
                        $user->login =$user->clave ;
                        $user->auth_key=null;
                        return $user->save() ? $user : null;
                   }else{
                       
                       return $user;
                   }
           
                
    }
  
    public function usuario_existe($attribute, $params)
    {
        //Buscar el email en la tabla
         $table = User::getUsuario($this->usuario);

         //Si el email existe mostrar el error
         if ($table->count() == 1)
         {
                       $this->addError($attribute, "El usuario ingresado ya existe en la base de datos");
         }
    }
    
    public function id_existe($attribute, $params)
    {
        //Buscar el email en la tabla
         $table = User::getIdUsuario($this->id_usuario);

         //Si el email existe mostrar el error
         if ($table->count() == 1)
         {
                       $this->addError($attribute, "El id_usuario ingresado ya existe en la base de datos");
         }
    }
    
    public function email_existe($attribute, $params)
    {
        //Buscar el email en la tabla
         $table = User::getEmail($this->email);

         //Si el email existe mostrar el error
         if (count($table) >= 1)
         {
                       $this->addError($attribute, "El email ingresado ya existe en la base de datos");
         }
    }
    
     /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail($user)
    {

        if (!$user) {
            return false;
        }
        

         return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordCreateToken-html', 'text' => 'passwordCreateToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name . ' Confirmar Usuario'])
            ->setTo($this->email)
            ->setSubject('Confirmar Usuario ' . Yii::$app->name)
            ->send();
        
    }
}
