<?php
namespace backend\models\autenticacion;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class CreateUserForm extends Model
{
    public $id_usuario;
    public $usuario;
    public $tipo_usuario;
    public $identificacion;
    public $nombres;
    public $id_tipo_entidad;
    public $email;
    public $cod_rol;
    public $id_correo; 
    public $id_formato;
    public $cod_canton;
    public $cod_provincia;
    public $cod_parroquia;

/**
 *  <?= $form->field($model, 'id_correo')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\notificaciones\CorCorreo::find()->all(),'id_correo','nom_correo'),['prompt'=>'Indique la configuracion del correo']) ?>
 */
 
    /**
     * @inheritdoc
     */
  
    /**
     * @inheritdoc Reglas de Validaci�n
     */
    public function rules()
    {
        return [
            [['tipo_usuario', 'identificacion','nombres', 'email','id_tipo_entidad','cod_rol'], 'required','message'=>'Campo Obligatorio'],
            [['identificacion'], 'number', 'message'=>'Campo de solo numeros, escriba el documento sin . ó ,'],
            [['tipo_usuario'], 'string', 'max' => 1,'message'=>'Maximo 200 caracteres'],
            [['nombres', 'email'], 'string', 'max' => 200,'message'=>'Maximo 200 caracteres'],
            [['email'], 'email','message'=>'Correo mal formado'],
            [['email'], 'email_existe'],
            [['identificacion'], 'identificacion_existe'],
            [['cod_canton','cod_provincia','cod_parroquia'], 'string'],
            // [['id_correo'], 'number'],
            [['id_formato'], 'number'],
        ];
    }
    
    
    
    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
        return [
            'tipo_usuario' => 'Tipo Usuario',
            'identificacion' => 'Identificacion',
            'email' => 'Email',
            'id_tipo_entidad' => 'Tipo Entidad',
            'cod_provincia' => 'Provincia',
            'cod_canton' => 'Canton',
            'cod_parroquia' => 'Parroquia',
//            'id_correo' => 'Configuracion Correo',
            'cod_rol' => 'Rol',
            'id_formato' => 'Formato',
            
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function createUser()
    {
        
        if (!$this->validate()) {
            return null;
        }
        $user = new User();

        // 1. Generar clave automaticamente
        $clave= $user->generatePassword(8);
        $login=$clave;
        
        //2. Generar login del usuario
        $usuario = $user->generateUser($this->tipo_usuario,$this->nombres);
        if($usuario==""){
             $this->addError('usuario', "NO fue posible generar el usuario, verifique los datos");
             return null;
        }
        
      // $transaction=$user->dbConnection->beginTransaction();
        $existeUsuario= $user->getUsuarioDocument($this->identificacion);
        if($existeUsuario->count()>0){
            $this->addError('identificacion', "La identficación ya se encuentra registrada ");
             return null; 
        }

        if($this->id_tipo_entidad=="" || $this->id_tipo_entidad==0){
            $this->addError('id_tipo_entidad', "Tipo de entidad no encontrada");
            return null;
        }
        

        $canton=$this->cargaCanton($this->cod_provincia,$this->cod_canton);
        if(count($canton)<=0){
             $this->addError('cod_canton', "NO Existe el canton, por favor verifique");
            return null;
        }

        if($this->id_tipo_entidad===6 || ($this->cod_parroquia !==null && $this->cod_parroquia !=="" && $this->cod_parroquia!==0) ){
            $provincia=$this->cargaParroquia($this->cod_parroquia,$this->cod_provincia,$this->cod_canton);
             if(count($provincia)<=0){
                 $this->addError('cod_parroquia', "NO Existe la parroquia, por favor verifique ".$this->cod_parroquia." ".$this->cod_provincia." ".$this->cod_canton);
                return null;
            }
        }
     
        
        
        $transaction=Yii::$app->db->beginTransaction();
        $UsuarioAp= $user->saveUser([
            //'id_usuario'=> $this->id_usuario,
            'usuario'=>  $usuario,
            'clave'=> $clave,
            'login'=> $login,
            'tipo_usuario'=> $this->tipo_usuario,
            'estado_usuario'=> "s",
            'identificacion'=>$this->identificacion,
            'nombres'=>$this->nombres,
            'fecha_digitacion'=> null,
            'email'=> $this->email,
            'usuario_digitador'=> null,
            'auth_key'=>null
        ]);
        //$transaction->rollback;
       
        if($this->cargaErrores($UsuarioAp)!=""){ 
            $this->addError('tipo_usuario', "NO fue posible generar el usuario, verifique los datos: ".$this->cargaErrores($UsuarioAp));
            $transaction->rollBack();
            return null;
        }  
        
        $Perfiles = $user->savePerfil($UsuarioAp->id_usuario, $this->cod_rol);
        if($this->cargaErrores($Perfiles)!=""){ 
            $this->addError('cod_rol', "NO fue posible generar perfil del usuario, verifique los datos: ".$this->cargaErrores($Perfiles));
            $transaction->rollBack();
            return null;
        }   
        

        
        $Entidad=$user->getEntidad($this->cod_canton, $this->cod_provincia, $this->cod_parroquia);
//        if($Entidad && $this->cargaErrores($Entidad)!=""){ 
//            $this->addError('cod_canton', "NO fue posible consultar la entidad, verifique los datos: ".$errores);
//            $transaction->rollBack();
//            return null;
//        }   
            
        
         if(count($Entidad)<0 || $this->tipo_usuario='p'){
                $Nentidad=$user->saveEntidad($this->nombres,$this->cod_canton, $this->cod_provincia, $this->cod_parroquia,$this->identificacion,$this->id_tipo_entidad);

                if($this->cargaErrores($Nentidad)!=""){     
                     $this->addError('cod_provincia', "NO fue posible crear la entidad, verifique los datos: ".$this->cargaErrores($Nentidad));
                     $transaction->rollBack();
                     return null;
                 }

                $cod_region=substr($usuario.$Nentidad->id_entidad,-10);
                $nombre_region=substr($Nentidad['nombre_entidad'],0,100);
                $region=$user->saveRegion($cod_region, $nombre_region);
                if($this->cargaErrores($region)!=""){ 
                     $this->addError('cod_provincia', "NO fue posible generar la region del usuario, verifique los datos: ".$this->cargaErrores($region));
                     $transaction->rollBack();
                     return null;
                 }
                 
                $regionEmtidad=$user->saveRegionEntidad($cod_region, $Nentidad['id_entidad']);
                if($this->cargaErrores($regionEmtidad)!=""){ 
                     $this->addError('cod_provincia', "NO fue posible generar la realion entidad región del usuario, verifique los datos: ".$errores);
                     $transaction->rollBack();
                     return null;
                 } 
                 
                 $perfilRegion=$user->savePerfilRegion($UsuarioAp->id_usuario,$this->cod_rol,$cod_region);
                 if($this->cargaErrores($perfilRegion)!=""){ 
                     $this->addError('cod_provincia', "NO fue posible generar perfil del usuario, verifique los datos: ".$errores);
                     $transaction->rollBack();
                     return null;
                 }
                 $Entidad=$Nentidad;
         }
        else{
            
             $regiones=$user->getEntidadRegion($Entidad['id_entidad']);
             if(count($regiones)>=1){
                //cual región si veinen varias?
               $perfilRegion=$user->savePerfilRegion($UsuarioAp->id_usuario,$this->cod_rol,$regiones[0]['cod_region']);
               if($this->cargaErrores($perfilRegion)!=""){ 
                     $this->addError('id_entidad', "NO fue posible generar perfil del usuario, verifique los datos: ".$errores);
                     $transaction->rollBack();
                     return null;
                 }   
            }else{
                $cod_region=$Entidad['nombre_entidad'].$this->cod_canton.$this->cod_provincia.$this->cod_parroquia;
                $nombre_region=$Entidad['nombre_entidad'];
                $region=$user->saveRegion($cod_region, $nombre_region);
                if($this->cargaErrores($region)!=""){ 
                     $this->addError('id_entidad', "NO fue posible generar la region del usuario, verifique los datos: ".$errores);
                     $transaction->rollBack();
                     return null;
                 }
                 
                $regionEmtidad=$user->saveRegionEntidad($cod_region, $Entidad['id_entidad']);
                if($this->cargaErrores($regionEmtidad)!=""){ 
                     $this->addError('id_entidad', "NO fue posible generar la realion entidad región del usuario, verifique los datos: ".$errores);
                     $transaction->rollBack();
                     return null;
                 } 
                 
                 $perfilRegion=$user->savePerfilRegion($UsuarioAp->id_usuario,$this->cod_rol,$cod_region);
                 if($this->cargaErrores($perfilRegion)!=""){ 
                     $this->addError('id_entidad', "NO fue posible generar perfil del usuario, verifique los datos: ".$errores);
                     $transaction->rollBack();
                     return null;
                 }  
            }
        }
        

      //  if($this->id_correo){
            $correo=$user->saveNotificacion($UsuarioAp->id_usuario, $clave, $this->id_formato);
            if($this->cargaErrores($correo)!=""){ 
                   $this->addError('id_formato', "NO fue posible crear la nueva NOtificacion de Usuario, verifique los datos: ".$errores);
                    $transaction->rollBack();
                   return null;
            } 
       // }
        
 
        $Formato=$user->getFormato($this->id_formato);
        $FdAdmEstado=$user->getFdAdmEstado($this->cod_rol,$Formato['id_modulo']);
        
        if(count($FdAdmEstado)<=0){
            $estado=$user->saveFdAdmEstado('Edición', $this->cod_rol, $Formato['id_modulo']);
            if($this->cargaErrores($estado['estado'])!=""){ 
               $this->addError('cod_rol', "NO fue posible insertar el fd adm estado del rol, verifique los datos: ".$errores);
               $transaction->rollBack();
               return null;
           }
           $FdAdmEstado=$estado['data'];
           
              
        }
        
        $FdCOnjuntoPregunta=$user->getConjuntoPreguntaFormato($this->id_formato,$this->cod_rol);
        if(count($FdCOnjuntoPregunta)<=0){
            $this->addError('id_formato', "NO fue posible encontrar el conjunto de preguntas para el formato y el rol       ".$this->id_formato."   ".$this->cod_rol);
            $transaction->rollBack();
            return null;
        }
        
        $FdPeriodoFormato=$user->getPeriodoFormato($this->id_formato);
        if(count($FdPeriodoFormato)<=0){
            $this->addError('id_formato', "NO fue posible buscar el periodo mas reciente del formato");
            $transaction->rollBack();
            return null;
        }
        
        $FdConjuntoRespuesta=$user->saveFdConjuntoRespuesta($FdCOnjuntoPregunta['id_conjunto_pregunta'], $Entidad['id_entidad'] , $this->id_formato, $FdAdmEstado['id_adm_estado'], $FdPeriodoFormato['id_periodo'], date('Y-m-d'));
        if($this->cargaErrores($FdConjuntoRespuesta)!=""){ 
               $this->addError('id_formato', "NO fue posible insertar el el conjunto respuesta del formato, verifique los datos: ".$this->cargaErrores($FdConjuntoRespuesta));
               $transaction->rollBack();
               return null;
        }
        
        $FdHistoricoRespuesta=$user->saveFdHistoricoRespuesta("Resgistro creado automaticamente desde CreateUserForm", date('Y-m-d'), 
                $usuario, $FdConjuntoRespuesta->id_conjunto_respuesta, $FdAdmEstado['id_adm_estado']);
        $transaction->commit();
        return $UsuarioAp ? $UsuarioAp : null;
        
        
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
    
    public function identificacion_existe($attribute, $params)
    {
        //Buscar el email en la tabla
         $table = User::getUsuarioDocument($this->identificacion);

         //Si el email existe mostrar el error
         if ($table->count() >= 1)
         {
                       $this->addError($attribute, "La identificación ya existe en la base de datos");
         }
    }
    
   public function cargaFormato($id)
    {
        
        return User::getFormatoXRol($id);
           
    }
    
    public function cargaCantones($cod_provincia)
    {
        
        return User::getCantones($cod_provincia);
           
    }
    
    public function cargaCanton($cod_provincia,$cod_canton)
    {
        
        return User::getCanton($cod_provincia,$cod_canton);
           
    }
    
    public function cargaParroquia($cod_parroquia,$cod_provincia,$cod_canton)
    {
        
        return User::getParroquia($cod_parroquia,$cod_provincia,$cod_canton);
           
    }
    
    public function cargaParroquias($cod_provincia,$cod_canton)
    {
        
        return User::getParroquias($cod_provincia,$cod_canton);
           
    }
    
    
    public function cargaEntidad($cod_canton,$cod_provincia,$cod_parroquia)
    {
        
        return User::getEntidad($cod_canton,$cod_provincia,$cod_parroquia);
           
    }
    
    
    
    
    
    private function cargaErrores($Consulta){
        $errores="";
        if($Consulta->getErrors()){ 
            foreach($Consulta->getErrors() as  $attribute => $errorr) {
                foreach ($errorr as $message)
                 {
                          $errores=$errores.' '.$attribute.": ".$message;
                 }

            }          
        }
        return $errores;
    }
    

}
