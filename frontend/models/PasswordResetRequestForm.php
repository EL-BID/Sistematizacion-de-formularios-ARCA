<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required', 'message' => 'El correo eléctronico no puede estar vacio'],
            ['email', 'email'],
            [['email'],'validateRequest'],
           
        ];
    }

    
//     ['email', 'exist',
//                'targetClass' => '\common\models\User',
//                'filter' => ['estado_usuario' => User::STATUS_ACTIVE],
//                'message' => 'There is no user with this email address.'
//            ],
//    
    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        
        $user = new User();
        

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user->findUserByEmal($this->email)]
            )
            ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name . 'robot'])
            ->setTo($this->email)
            ->setSubject('Reinicio de contraseña para' . Yii::$app->name)
            ->send();
        

        
                
    }
    
    public function validateRequest(){
        /* @var $user User */
        $user = new User();
       return $user->requestResetPassword($this->email);
//        $user = User::findOne([
//            
//            'estado_usuario' => User::STATUS_ACTIVE,
//            'email' => $this->email,
//        ]);
//
//        if (!$user) {
//            return false;
//        }
//        
//        if (!User::isPasswordResetTokenValid($user->auth_key)) {
//            $user->generatePasswordResetToken();
//            if (!$user->save()) {
//                return false;
//            }
//        }
        
    }
}
