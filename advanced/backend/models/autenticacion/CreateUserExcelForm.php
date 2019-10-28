<?php
namespace backend\models\autenticacion;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;

/**
 * Signup form
 */
class CreateUserExcelForm extends Model
{
    public $file;
    public $id_formato;
    public $POC;
   /* public $usuario;
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
	public $POC;*/

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
       /* return [
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
			[['POC'],'safe'],
        ];*/
        return [
            [['file'], 'file'],
            [['id_formato'], 'number'],
            [['POC'],'safe'],
        ];
    }
    
    
    
    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function attributeLabels()
    {
       /* return [
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
            
        ];*/
        return [
            'file'=>'Archivo',
            'id_formato'=>'Formato',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function createUserExcel()
    {
         $model = new CreateUserExcelForm();
         $uploaded_file_name = $_FILES['CreateUserExcelForm']['tmp_name'];
         $UsuarioAp="";
        
         if(empty($uploaded_file_name['file']))
         {
              Yii::$app->getSession()->setFlash('error', [
                             'message' => 'Debe seleccionar un archivo',
                         ]);
             
              return null;
         }
        if ($model->load(Yii::$app->request->post())) {                      
         $formato = $model->id_formato;  
        }
         $objReader = \PHPExcel_IOFactory::createReaderForFile($uploaded_file_name['file']);
         $objPhpExcel = $objReader->load($uploaded_file_name['file']);

        $sheetData = $objPhpExcel->getActiveSheet()->toArray(null, true, true, true);
        $i=0;
        print "<br/><br/><br/><br>";
        foreach($sheetData as $k=>$valor)
        {
              if($k==1)continue;  //valor cabecera archivo excel     
               $user = new User();

               // 1. Generar clave automaticamente
               $clave= $user->generatePassword(8);
               $login=$clave;

               //2. Generar login del usuario
               $usuario = $user->generateUser($valor['A'],$valor['C']);
               $nombre =$valor['C'];
               $tipo_usuario='p';
               $identificacion = $valor['B'];
               $cuenta_i = strlen($identificacion);
               //print $cuenta_i;
               //exit;
               if($cuenta_i>10)$tipo_usuario='e';
               $email = $valor['D'];
               $tipo_entidad ='4';
               $cod_rol='22';
               //$formato=5;
               if($usuario==""){
                    $this->addError('usuario', "NO fue posible generar el usuario, verifique los datos");
                    return null;
               }
               $prov=$this->eliminar_tildes($valor['F']);
               $prov = trim(strtoupper($prov));

               $cant = trim(strtoupper($valor['G']));
               $parro = trim(strtoupper($valor['H']));
               $cod_pro = $this->buscaProvxNombre($prov);
               $cod_cant = $this->buscaCanxNombre($cod_pro,$cant);
               $cod_parr = $this->buscaParrxNombre($cod_pro,$cod_cant,$parro);

               $table = User::getUsuarioDocument($identificacion);
               
                //Si el email existe mostrar el error
                if ($table->count() >= 1)
                {
                    print "<br/>La identificación".$identificacion." ya existe en la base de datos";
                    continue;
                }
               if(empty($cod_pro))
               {
                   print  "<br/>NO existe la provincia para el usuario ".$valor['C'].", verifique los datos";
                   continue;
               }
               if(empty($cod_cant))
               {
                   print "<br/>NO existe el cantón para el usuario ".$valor['C'].", verifique los datos";
                   continue;
               }
               if(empty($cod_parr))
               {
                   print "<br/>NO existe la parroquia para el usuario ".$valor['C'].", verifique los datos";
                   continue;

               }
               $canton=$this->cargaCanton($cod_pro,$cod_cant);
               if(count($canton)<=0){
                   $this->addError('cod_canton', "NO Existe el canton, por favor verifique");
                   continue;
               }
               $parroquia=$this->cargaParroquia($cod_parr,$cod_pro,$cod_cant);
                    if(count($parroquia)<=0){
                      print "<br/>NO Existe la parroquia, por favor verifique ";
                      continue;
                   }
               $transaction=Yii::$app->db->beginTransaction();
               $UsuarioAp= $user->saveUser([
                   //'id_usuario'=> $this->id_usuario,
                   'usuario'=>  $usuario,
                   'clave'=> $clave,
                   'login'=> $login,
                   'tipo_usuario'=> $tipo_usuario,
                   'estado_usuario'=> "s",
                   'identificacion'=>$identificacion,
                   'nombres'=>$nombre,
                   'fecha_digitacion'=> null,
                   'email'=> $email,
                   'usuario_digitador'=> null,
                   'auth_key'=>null
               ]);        
              if($this->cargaErrores($UsuarioAp)!=""){ 
                   print "<br/>NO fue posible generar el usuario, verifique los datos: ".$this->cargaErrores($UsuarioAp);
                   $transaction->rollBack();
                   continue;
               }        
               $Perfiles = $user->savePerfil($UsuarioAp->id_usuario, $cod_rol);
               if($this->cargaErrores($Perfiles)!=""){ 
                   print "<br/>NO fue posible generar perfil del usuario, verifique los datos: ".$this->cargaErrores($Perfiles);
                   $transaction->rollBack();
                   continue;
               }  
               $Entidad=$user->getEntidad($cod_cant, $cod_pro, $cod_parr);        
               if(count($Entidad)<1 || $tipo_usuario=='p'){
                    $Nentidad=$user->saveEntidad($nombre,$cod_cant, $cod_pro, $cod_parr,$identificacion,$tipo_entidad);
                    if($this->cargaErrores($Nentidad)!=""){     
                        print "<br/>NO fue posible crear la entidad, verifique los datos: ".$this->cargaErrores($Nentidad);
                        $transaction->rollBack();
                        continue;
                     }
                     $cod_region=substr($usuario.$Nentidad->id_entidad,-10);
                     $nombre_region=substr($Nentidad['nombre_entidad'],0,100);
                     $region=$user->saveRegion($cod_region, $nombre_region);
                     if($this->cargaErrores($region)!=""){ 
                        print "<br/>NO fue posible generar la region del usuario, verifique los datos ".$valor['C'];
                        $transaction->rollBack();
                        continue;
                     }
                     $regionEmtidad=$user->saveRegionEntidad($cod_region, $Nentidad['id_entidad']);
                     if($this->cargaErrores($regionEmtidad)!=""){ 
                        print "<br/>NO fue posible generar la realion entidad región del usuario, verifique los datos: ".$errores;
                        $transaction->rollBack();
                        continue;
                      } 
                      $perfilRegion=$user->savePerfilRegion($UsuarioAp->id_usuario,$cod_rol,$cod_region);
                      if($this->cargaErrores($perfilRegion)!=""){ 
                        print "<br/>NO fue posible generar perfil del usuario, verifique los datos: ".$errores;
                        $transaction->rollBack();
                        continue;
                      }
                      $Entidad=$Nentidad;
              }
              else{            
                    $regiones=$user->getEntidadRegion($Entidad['id_entidad']);
                    if(count($regiones)>=1){
                       //cual región si veinen varias?
                      $perfilRegion=$user->savePerfilRegion($UsuarioAp->id_usuario,$cod_rol,$regiones[0]['cod_region']);
                      if($this->cargaErrores($perfilRegion)!=""){ 
                            print "<br/>NO fue posible generar perfil del usuario, verifique los datos: ".$errores;
                            $transaction->rollBack();
                            continue;
                        }   
                   }else{
                       $cod_region=$Entidad['nombre_entidad'].$cod_cant.$cod_pro.$cod_parr;
                       $nombre_region=$Entidad['nombre_entidad'];
                       $region=$user->saveRegion($cod_region, $nombre_region);
                       if($this->cargaErrores($region)!=""){ 
                            print "<br/>NO fue posible generar la region del usuario, verifique los datos: ".$valor['C'];
                            $transaction->rollBack();
                            continue;
                    }
                    $regionEmtidad=$user->saveRegionEntidad($cod_region, $Entidad['id_entidad']);
                    if($this->cargaErrores($regionEmtidad)!=""){ 
                      print "<br/>NO fue posible generar la realion entidad región del usuario, verifique los datos: ".$errores;
                      $transaction->rollBack();
                      continue;
                    } 
                    $perfilRegion=$user->savePerfilRegion($UsuarioAp->id_usuario,$cod_rol,$cod_region);
                    if($this->cargaErrores($perfilRegion)!=""){ 
                       print "<br/>NO fue posible generar perfil del usuario, verifique los datos: ".$errores;
                       $transaction->rollBack();
                       continue;
                    }  
                 }
               }
                Yii::trace("aqui si crea conjunto respuesta","DEBUG");
                $Formato=$user->getFormato($formato);
                $FdAdmEstado=$user->getFdAdmEstado($cod_rol,$Formato['id_modulo']);
                if(count($FdAdmEstado)<=0){
                    $estado=$user->saveFdAdmEstado('Edición', $cod_rol, $Formato['id_modulo']);
                    if($this->cargaErrores($estado['estado'])!=""){ 
                    print  "NO fue posible insertar el fd adm estado del rol, verifique los datos: ".$errores;
                    $transaction->rollBack();
                    continue;
                    }
                    $FdAdmEstado=$estado['data'];
                }
                $FdCOnjuntoPregunta=$user->getConjuntoPreguntaFormato($formato,$cod_rol);
                if(count($FdCOnjuntoPregunta)<=0){
                    print "No fue posible encontrar el conjunto de preguntas para el formato y el rol       ".$formato."   ".$cod_rol;
                    $transaction->rollBack();
                    continue;
                }
                $FdPeriodoFormato=$user->getPeriodoFormato($formato);
                if(count($FdPeriodoFormato)<=0){
                    print "No fue posible buscar el periodo mas reciente del formato";
                    $transaction->rollBack();
                    continue;
                }
                $FdConjuntoRespuesta=$user->saveFdConjuntoRespuesta($FdCOnjuntoPregunta['id_conjunto_pregunta'], $Entidad['id_entidad'] , $formato, $FdAdmEstado['id_adm_estado'], $FdPeriodoFormato['id_periodo'], date('Y-m-d'));
                Yii::trace("aqui si crea conjunto respuesta 2 ","DEBUG");
                if($this->cargaErrores($FdConjuntoRespuesta)!=""){ 
                  print "NO fue posible insertar el el conjunto respuesta del formato, verifique los datos: ".$this->cargaErrores($FdConjuntoRespuesta);
                  $transaction->rollBack();
                  continue;
                }
                $this->guardarUsuarioDigitador($this->id_formato,$Entidad['nombre_entidad'],$UsuarioAp->id_usuario);
                $FdHistoricoRespuesta=$user->saveFdHistoricoRespuesta("Resgistro creado automaticamente desde CreateUserForm", date('Y-m-d'), 
                $usuario, $FdConjuntoRespuesta->id_conjunto_respuesta, $FdAdmEstado['id_adm_estado']);
                $transaction->commit();
        }
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
    public function identificacion_existe($identifica)
    {
        //Buscar el email en la tabla
         $table = User::getUsuarioDocument($identifica);

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
    public function buscaProvxNombre($prov)
    {
        $provi = \common\models\autenticacion\Provincias::find()
                ->where(['nombre_provincia'=>$prov])                
                ->one();
        
        return $provi['cod_provincia'];
    }
    public function buscaCanxNombre($cod_prov,$canto)
    {
        $canto = \common\models\autenticacion\Cantones::find()
                ->where(['nombre_canton'=>$canto])
                ->andWhere(['cod_provincia'=>$cod_prov])
                ->one();
        
        return $canto['cod_canton'];
    }
    public function buscaParrxNombre($cod_prov,$cod_canto,$parro)
    {
        $parro = \common\models\autenticacion\Parroquias::find()
                ->where(['nombre_parroquia'=>$parro])
                ->andWhere(['cod_provincia'=>$cod_prov])
                ->andWhere(['cod_canton'=>$cod_canto])
                ->one();
        
        return $parro['cod_parroquia'];
    }
    
    public function eliminar_tildes($cadena){

    //Codificamos la cadena en formato utf8 en caso de que nos de errores
    //$cadena = utf8_encode($cadena);

    //Ahora reemplazamos las letras
    $cadena = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $cadena
    );

    $cadena = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $cadena );

    $cadena = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $cadena );

    $cadena = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $cadena );

    $cadena = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $cadena );

    /*$cadena = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C'),
        $cadena
    );*/

    return $cadena;
   }
   public function guardarUsuarioDigitador($formato,$usuario,$id_usuario){
        if($formato ==7)
        {
                      //createCommand($sql1)->execute();
          Yii::$app->db->createCommand('UPDATE usuarios_ap SET usuario_digitador=:usuario  WHERE  id_usuario =:id_usuario')                    
                        ->bindValue(':usuario', $usuario)                        
                        ->bindValue(':id_usuario', $id_usuario)        
                        ->execute();            
        }
     }
}
