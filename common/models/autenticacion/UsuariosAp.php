<?php

namespace common\models\autenticacion;
use common\models\modelpry\ModelPry;
use Yii;

/**
 * Este es el modelo para la clase "usuarios_ap".
 *
 * @property string $id_usuario
 * @property string $usuario
 * @property string $clave
 * @property string $login
 * @property string $tipo_usuario
 * @property string $estado_usuario
 * @property string $identificacion
 * @property string $nombres
 * @property string $usuario_digitador
 * @property string $fecha_digitacion
 * @property string $email
 * @property string $authkey
 *
 * @property Perfiles[] $perfiles
 * @property Rol[] $codRols
 */
class UsuariosAp extends ModelPry 
{
    const STATUS_DELETED = "n";
    const STATUS_INACTIVE = "n";
    const STATUS_ACTIVE = "s";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios_ap';
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function rules()
    {
        return [
//            [['usuario', 'login'], 'required'],
//            [['identificacion'], 'number'],
//            [['fecha_digitacion'], 'date'],
//            [['usuario', 'clave', 'login'], 'string', 'max' => 50],
//            [['tipo_usuario', 'estado_usuario'], 'string', 'max' => 1],
//            [['nombres', 'email'], 'string', 'max' => 200],
//            [['email'], 'email'],
//            //[['authkey'], 'string', 'max' => 250],, 'usuario_digitador', 'authkey'
        ];
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
//            'id_usuario' => 'Id Usuario',
//            'usuario' => 'Usuario',
//            'clave' => 'Password',
//            'login' => 'Valida Password',
//            'tipo_usuario' => 'Tipo Usuario',
//            'estado_usuario' => 'Estado Usuario',
//            'identificacion' => 'Identificacion',
//            'nombres' => 'Nombres',
//            //'usuario_digitador' => 'Usuario Digitador',
//            'fecha_digitacion' => 'Fecha Digitacion',
//            'email' => 'Email',
//            //'authkey' => 'Authkey',
        ];
    }

    
    public function behaviors()
    {
        return [
           // TimestampBehavior::className(),
            'timestamp' => [
                        'class' => 'yii\behaviors\TimestampBehavior',
                        'attributes' => [
                            \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['fecha_digitacion'],
                            ],
                        'value' => new \yii\db\Expression('NOW()'), //utiliza la expresion now de postgres para obtener la hora senecesita yii\db\Expression;
                        ],
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getPerfiles()
    {
        return $this->hasMany(Perfiles::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery -> Relaciones que presenta la tabla
     */
    public function getCodRols()
    {
        return $this->hasMany(Rol::className(), ['cod_rol' => 'cod_rol'])->viaTable('perfiles', ['id_usuario' => 'id_usuario']);
    }
    
    
    public function getAuthKey() {
        return $this->clave;
    }

    public function getId() {
        return $this->id_usuario;
    }

//    public function validateAuthKey($authKey) {
//        $this->clave === $authKey;
//        
//    }
//
//    public static function findIdentity($id){
//        return self::findOne($id);
//                
//    }
//
//    public static function findIdentityByAccessToken($token, $type = null){
//        throw new \yii\base\NotSupportedException();
//    }
//    
//    public static function  findByUsername($username){
//        return self::findOne(['id_usuario' => $username]);
//        
//    }
//    
//    public function validatePassword($password){
//       // return $this->clave === '12345';
//        return Yii::$app->security->validatePassword($password, $this->password_hash);
//    }
//
//   
//    
//     /**
//     * Finds out if password reset token is valid
//     *
//     * @param string $token password reset token
//     * @return bool
//     */
//    public static function isPasswordResetTokenValid($token)
//    {
//        if (empty($token)) {
//            return false;
//        }
//
//        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
//        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
//        return $timestamp + $expire >= time();
//    }
//
//       /**
//     * Generates password hash from password and sets it to the model
//     *
//     * @param string $password
//     */
//    public function setPassword($password)
//    {
//        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
//    }
//
//    /**
//     * Generates "remember me" authentication key
//     */
//    public function generateAuthKey()
//    {
//        $this->auth_key = Yii::$app->security->generateRandomString();
//    }
//
//    /**
//     * Generates new password reset token
//     */
//    public function generatePasswordResetToken()
//    {
//        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
//    }
//
//    /**
//     * Removes password reset token
//     */
//    public function removePasswordResetToken()
//    {
//        $this->password_reset_token = null;
//    }
//    
}


