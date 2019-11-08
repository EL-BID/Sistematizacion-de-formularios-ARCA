<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\db\Expression;
use common\models\autenticacion\FUsuariosAp;

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
 * @property string $usuario_digitacion
 * @property string $fecha_digitacion
 * @property string $email
 * @property string $auth_key
 *
 * @property Perfiles[] $perfiles
 * @property Rol[] $codRols
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = "n";
    const STATUS_INACTIVE = "n";
    const STATUS_ACTIVE = "s";


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%usuarios_ap}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
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
        return $this->hasMany(autenticacion\Rol::className(), ['cod_rol' => 'cod_rol'])->viaTable('perfiles', ['id_usuario' => 'id_usuario']);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id_usuario' => $id, 'estado_usuario' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        if($type=='Auth'){
             $Usuario = new FUsuariosAp;
            return $Usuario->buscarIdentidadAccesToken($token);
        }
    
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['usuario' => $username, 'estado_usuario' => self::STATUS_ACTIVE]);
    }

   /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        $Usuario = new FUsuariosAp;
        return $Usuario->buscaUsuarioResetToken($token);
     }

    /**
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    
 /**
    * 
    * @param type $email
    * @return type
    */
    public static function getEmail($email)
    {
        //return static::find()->where("email=:email", [":email" => $email]);;
        $Usuario = new FUsuariosAp;
        return $Usuario->buscaUsuarioEmail($email);
        
    }
    
   /**
    * 
    * @param type $id_usuario
    * @return type
    */
    public static function getIdUsuario($id_usuario)
    {
        $Usuario = new FUsuariosAp;
        return $Usuario->buscaUsuarioId($id_usuario);
    }
    
        
    /**
    * 
    * @param type $id_usuario
    * @return type
    */
    public static function getUsuario($usuario)
    {
         $Usuario = new FUsuariosAp;
        return $Usuario->buscaUsuarioUsuario($usuario);
    
    }   
    
    /**
     * 
     * @param type $document
     * @return type
     */
    public static function getUsuarioDocument($document)
    {
         $Usuario = new FUsuariosAp;
        return $Usuario->buscaUsuarioDocument($document);
    }
    
    public static function getFormatoXRol($cod_rol){
         $Usuario = new FUsuariosAp;
        return $Usuario->buscarConjuntoPreguntaRol($cod_rol);
    }
    
    public static function getCantones($cod_provincia){
         $Usuario = new FUsuariosAp;
        return $Usuario->buscarCantones($cod_provincia);
    }
    
    public static function getCanton($cod_provincia,$cod_canton){
         $Usuario = new FUsuariosAp;
        return $Usuario->buscarCantones($cod_provincia,$cod_canton);
    }
    
    public static function getParroquia($cod_parroquia,$cod_provincia,$cod_canton){
         $Usuario = new FUsuariosAp;
        return $Usuario->buscarParroquia($cod_parroquia,$cod_provincia,$cod_canton);
    }
    
    
    public static function getParroquias($cod_provincia,$cod_canton){
         $Usuario = new FUsuariosAp;
        return $Usuario->buscarParroquias($cod_provincia,$cod_canton);
    }
    
    public static function getEntidad($cod_canton,$cod_provincia,$cod_parroquia)
    {
         $Usuario = new FUsuariosAp;
        return $Usuario->buscaEntidad($cod_canton,$cod_provincia,$cod_parroquia);
    }
    
    
    public static function getFdAdmEstado($cod_rol,$id_modulo)
    {
         $Usuario = new FUsuariosAp;
        return $Usuario->buscaFdAdmEstado($cod_rol,$id_modulo);
    }
    
        
    public static function getFormato($id_formato)
    {
         $Usuario = new FUsuariosAp;
        return $Usuario->buscarFormato($id_formato);
    }
    
   public static function getConjuntoPreguntaFormato($id_formato,$cod_rol)
    {
         $Usuario = new FUsuariosAp;
        return $Usuario->buscarConjuntoPreguntaFormato($id_formato,$cod_rol);
    }
    
    public static function getPeriodoFormato($id_formato)
    {
         $Usuario = new FUsuariosAp;
        return $Usuario->buscarPeriodoFormato($id_formato);
    }
    
    
    
    
     /**
     * 
     * @param type $document
     * @return type
     */
    public static function getEntidadRegion($id_Entidad)
    {
         $Usuario = new FUsuariosAp;
        return $Usuario->buscaEntidadRegion($id_Entidad);
    }
    
    


    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password,$idUsuario)
    {
        $Usuario = new FUsuariosAp;
        $user= $Usuario->buscaUsuario(['id_usuario' => $idUsuario, 'estado_usuario' => self::STATUS_ACTIVE])->clave;
        return Yii::$app->security->validatePassword($password, $user );
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        return Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generate random password
     * @param type $length
     */
    public function generatePassword($length){
        return Yii::$app->security->generateRandomString($length);
    }

    public function generateUser($tipo,$nombre){
        $usuario;
        if($tipo=='p'){
           $usuario= $this-> generatePerson($nombre);
        }
        else{
            $usuario= $this->generateEnterprise($nombre);
        }
        
        $FUsuario = new FUsuariosAp();
        $CUsuarios = count($FUsuario->buscaUsuarioUsuario($usuario));
        if($CUsuarios>0){
            $CUsuarios=$CUsuarios+1;
            $usuario=$usuario.$CUsuarios;
        }
        return $usuario;
    }
            
    private function generatePerson($nombre){
            $usuario="";
            $nombres = explode(" ",preg_replace('/\s+/', ' ', $nombre)); 
            $i=count($nombres);
            switch ($i) {
                case 0:
                    $usuario="";
                    break;
                case 1:
                    $usuario=$nombre;
                    break;
                case 2:
                    $usuario=substr($nombres[0], 0, 1).$nombres[1];
                    break;
                case 3:
                    $usuario=substr($nombres[0], 0, 1).substr($nombres[1], 0, 1).$nombres[2];
                    break;
                case 4:
                    $usuario=substr($nombres[0], 0, 1).substr($nombres[1], 0, 1).$nombres[2].substr($nombres[3], 0, 1);
                    break;
                default:
                    for ($j = 0; $j < $i; $j++) {
                        if($i===$j-2){ $usuario=$usuario.$nombres[$j];}
                        else{$usuario=$usuario.substr($nombres[$j], 0, 1);}
                    }    
            }
            return $usuario;
    }
    
        private function generateEnterprise($nombre){
            $usuario="";
            $nombres = explode(" ",preg_replace('/\s+/', ' ', $nombre)); 
            $i=count($nombres);
            switch ($i) {
                case 0:
                    $usuario="";
                    break;
                case 1:
                    $usuario=$nombre;
                    break;
                default:
                    for ($j = 0; $j < $i; $j++) {
                       
                       $usuario=$usuario.substr($nombres[$j], 0, 2);
                    }    
            }
            return $usuario;
    }
    
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        return Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        return Yii::$app->security->generateRandomString() . '_' . time();
    }

//    /**
//     * Removes password reset token
//     */
//    public function removePasswordResetToken()
//    {
//        $this->password_reset_token = null;
//    }
    
  
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->auth_key = null;
    }
    
 
    /**
     * 
     * @param type $user
     * @param type $password
     * @return type
     */
    public function resetPassword($user,$password){
        
        $Usuario = new FUsuariosAp;
        return $Usuario->recuperaPassword($user,$this->setPassword($password));
       
    }
    
    /**
     * 
     * @param type $user
     * @param type $clave
     * @return type
     */
    public function changePassword ($user,$clave,$clave_anterior){
        $Usuario = new FUsuariosAp;
                
        $rta=$Usuario->cambiarPassword($user,$clave_anterior,$this->setPassword($clave),$this->generateAuthKey());     
        return $rta ? $rta : false;
        
        
    }
    
    /**
     * 
     * @param type $data
     * @return type
     */
    public function saveUser($data){

        $data['auth_key']=$this->generateAuthKey();
        $data['clave']= $this->setPassword($data['login']);
        
        $Usuario = new FUsuariosAp;
        $user=$Usuario->guardarUsuario($data);
        return $user ? $user : null;
    }
    
    /**
     * 
     * @param type $id_usuario
     * @param type $cod_rol
     * @return type
     */
    public function savePerfil($id_usuario,$cod_rol){
     
        $Usuario = new FUsuariosAp;
        $perfil=$Usuario->guardarPerfil($id_usuario,$cod_rol);
        return $perfil ? $perfil : null;
    }
    
    public function savePerfilRegion($id_usuario,$cod_rol,$cod_region){
     
        $Usuario = new FUsuariosAp;
        $perfil=$Usuario->guardarPerfilRegion($id_usuario,$cod_rol,$cod_region);
        return $perfil ? $perfil : null;
    }
    
    public function saveEntidad($nombre_entidad,$cod_canton, $cod_provincia, $cod_parroquia,$identificacion,$tipo_identidad){
     
        $Usuario = new FUsuariosAp;
		
        $entidad=$Usuario->guardarEntidad($nombre_entidad,$cod_canton, $cod_provincia, $cod_parroquia,$identificacion,$tipo_identidad);
        return $entidad ? $entidad : null;
    }
    
    public function saveRegion($cod_region,$nombre_region){
     
        $Usuario = new FUsuariosAp;
        $entidad=$Usuario->guardarRegion($cod_region,$nombre_region);
        return $entidad ? $entidad : null;
    }
    
    public function saveRegionEntidad($cod_region,$id_entidad){
     
        $Usuario = new FUsuariosAp;
        $entidad=$Usuario->guardarRegionEntidad($cod_region,$id_entidad);
        return $entidad ? $entidad : null;
    }
    
    public function saveNotificacion($id_usuario,$password,$id_formato){
     
        $Usuario = new FUsuariosAp;
        $notificacion=$Usuario->guardarNotificacion($id_usuario,$password,$id_formato);
        return $notificacion ? $notificacion : null;
    }
    
    
    public function saveFdAdmEstado($nom_adm_estado,$cod_rol,$id_modulo){
        $Usuario = new FUsuariosAp;
        $estado=$Usuario->guardarFdAdmEstado($nom_adm_estado,$cod_rol,$id_modulo);
        return $estado['estado'] ? $estado : null;
    }
    
    public function saveFdConjuntoRespuesta($id_conjunto_pregunta,$id_entidad,$id_formato,$id_adm_estado,$id_periodo,$fecha){
        $Usuario = new FUsuariosAp;
        $FdConjuntoRespuesta=$Usuario->guardarFdConjuntoRespuesta($id_conjunto_pregunta,$id_entidad,$id_formato,$id_adm_estado,$id_periodo,$fecha);
		Yii::trace("paso por aqui 3","DEBUG");
        return $FdConjuntoRespuesta ? $FdConjuntoRespuesta : null;
    }  
    
    public function saveFdHistoricoRespuesta($observaciones,$fecha,$usuario,$id_conjunto_respuesta,$id_adm_estado){
        $Usuario = new FUsuariosAp;
        $FdHistoricoRespuesta=$Usuario->guardarFdHistoricoRespuesta($observaciones,$fecha,$usuario,$id_conjunto_respuesta,$id_adm_estado);
        return $FdHistoricoRespuesta ? $FdHistoricoRespuesta : null;
    }
    
    
    
        
    /**
     * 
     * @param type $email
     * @return type
     */
   public function requestResetPassword($email){
        $auth_key=$this->generatePasswordResetToken();     
        $Usuario = new FUsuariosAp;
        return $Usuario->solicitudResetPassword($email,$auth_key);
   }
   
   /**
    * 
    * @param type $email
    * @return type
    */
   public function findUserByEmal($email){
         
       $Usuario = new FUsuariosAp;
       return $Usuario->buscaUsuarioEmail($email);
   }
   
   /**
    * 
    * @param type $user
    */
   public static function loadDataUserSession($user){
       $Usuario = new FUsuariosAp;
       static::addDataSession('perfiles',$Usuario->buscaPerfilesUsuario($user));
        static::addDataSession('accesos',$Usuario->buscaAccesosUsuario($user));
        static::addDataSession('regionales',$Usuario->buscaRegionesUsuario($user));
   }       
   
   /**
    * 
    * @param type $name
    * @param type $data
    * @return boolean
    */
   public static function addDataSession($name,$data){
       $session = Yii::$app->session;
       if ($session->isActive){
                      $session[$name] = $data;
           return true;
       }else{
           return false;
       }
       
   }
   
   /**
    * 
    * @param type $name
    * @return boolean
    */
   public static function deleteDataSession($name){
       $session = Yii::$app->session;
       if ($session->isActive){
           $session->remove($name);
           return true;
       }else{
           return false;
       }
   }
   
   /**
    * 
    * @param type $name
    * @return type
    */
   public static function getDataSession($name){
       $session = Yii::$app->session;
       if ($session->isActive){
          
          return $session[$name];
     
       }else{
           return null;
       }
   }
}
