<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class ChangePassword extends Model
{
    public $usuario;
    public $clave;
    public $login;
    public $clave_anterior;
    
    
  
    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
            [['usuario'], 'required','message' => 'Debe haber ingresado al sistema'],
            [['login','clave','clave_anterior'], 'required','message' => 'Campo requerido'], //'fecha_digitacion','estado_usuario',          
            [['usuario', 'clave', 'login','clave_anterior'], 'string', 'max' => 50],
            [['usuario'], 'usuario_existe'],
            [['login','clave','clave_anterior'], 'string', 'min' => 6,'message' => 'Minimo 6 Caracteres'],
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
            'usuario' => 'Usuario',
            'clave' => 'Password',
            'login' => 'Valida Password',
            'clave_anterior' => 'Password Anterior',

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function changePassword()
    {
        echo$this->usuario;
        if (!$this->validate()) {
            return false;
        }

        $usuario = new User();
        $user=$usuario->changePassword($this->usuario,$this->clave,$this->clave_anterior);
        return $user ? true : false;
    }
    
   
  
    public function usuario_existe($attribute, $params)
    {
        //Buscar el email en la tabla
         $table = User::getUsuario($this->usuario);

         //Si el email existe mostrar el error
         if (count($table) == 0)
         {
             $this->addError($attribute, "El usuario ingresado no existe en la base de datos o debe ingresar al sistema");
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
                ['html' => 'passwordChangePassword-html', 'text' => 'passwordCreateToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name . ' Cambio de Password'])
            ->setTo($this->email)
            ->setSubject('Cambio de password ' . Yii::$app->name)
            ->send();
        
    }
}
