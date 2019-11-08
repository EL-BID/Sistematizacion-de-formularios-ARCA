<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required', 'message' => 'El campo no puede estar en blanco.'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !User::validatePassword($this->password,$user->id_usuario)) {
                $this->addError($attribute, 'Usuario o password incorrecto.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        
        //$this->validarLog($this->username);
        if ($this->validate()) {
            
            $login= Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);            
            if ($login){
                User::loadDataUserSession($this->username);
            }
            return $login;
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
	
	
    public function attributeLabels()
    {
        return [
            'username' => 'Usuario',
            'password' => 'Contraseña',
            'rememberMe' => 'Recordar',
        ];
    }
    
    public function validarLog($usuario)
    {
        $respuesta = Yii::$app->db->createCommand('select id_formato from fd_conjunto_respuesta where id_entidad in(select id_entidad from entidades where identificacion  in (select identificacion from usuarios_ap where usuario =:usuario))')
             ->bindValue(':usuario', $usuario)             
             ->queryOne(); 
        $formato = $respuesta['id_formato'];
            
        if($formato==5)
        {
            print "<center>";
            print "<img src='../../frontend/web/images/mantenimiento.jpg' alt='Mantenimiento' width='878' height='627'/>";
            print "<h1>Estimado usuario, en este momento no puede ingresar al sistema</h1>";
            print "<h3>Disculpe las molestias</h3>";
            print "</center>";   
            exit;
        }
    }
    
    
}
