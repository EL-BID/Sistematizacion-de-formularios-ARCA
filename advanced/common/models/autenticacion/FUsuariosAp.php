<?php

namespace common\models\autenticacion;
use common\models\modelpry\FUsuarioFachadaPry;
use common\models\autenticacion\UsuariosAp;
use Yii;

/**
 * La clase FUsuarioAp tiene las siguientes funcionalidades
•	Autenticar al usuario
•	Cargar la información del usuario
•	Actualizar la información del usuario
•	Cambar de password /chage password
•	Asignar otro password /reset password
.
 */
class FUsuariosAp extends FUsuarioFachadaPry 
{
   
    public function buscaUsuarioNombre($data){
       
        return UsuariosAp::findOne(['usuario' => $data['usuario'], 'estado_usuario' => $data['estado_usuario']]);
    }
    public function buscaUsuario($data){
       
        return UsuariosAp::findOne(['id_usuario' => $data['id_usuario'], 'estado_usuario' => $data['estado_usuario']]);
    }
    
    public function cambiarPassword($usuario,$clave,$password,$authKey){
        $user= $this->buscaUsuarioNombre(['usuario' => $usuario, 'estado_usuario' => UsuariosAp::STATUS_ACTIVE]);
       

        if(Yii::$app->security->validatePassword($clave, $user->clave )){
            $user->clave=$password;
            $user->auth_key='';
            $user->login=$user->clave;

            return $user->save() ? $user : false;
        }else{return false;}
    }
    
    
    public function recuperaPassword($id_user,$password){

        $usuario = UsuariosAp::findOne([
            'id_usuario' => $id_user
        ]); 
         $usuario->clave=$password;
         $usuario->login=$usuario->clave;
         $usuario->auth_key='';

        return $usuario->save(false);
    }
    
     public function buscaUsuarioResetToken($token){
            $usuario = new UsuariosAp;
            return UsuariosAp::findOne([
                'auth_key' => $token,
                'estado_usuario' => UsuariosAp::STATUS_ACTIVE,
            ]);
        }
    
        
     public function buscarIdentidadAccesToken($token){
       return  UsuariosAp::find()->where("auth_key=:auth", [":auth" => $token])->one();
     }
       
     
     public function guardarUsuario($data){
         
        $user= new UsuariosAp;
        $user->usuario =            $data['usuario'];
        $user->clave =              $data['clave'];
        $user->login =              $data['login'];
        $user->tipo_usuario =       $data['tipo_usuario'];
        $user->estado_usuario =     $data['estado_usuario'];//$this->estado_usuario;
        $user->identificacion =     $data['identificacion'];
        $user->nombres =            $data['nombres'];
        $user->fecha_digitacion=    $data['fecha_digitacion'];//$this->fecha_digitacion;
        $user->email =              $data['email'];
        $user->usuario_digitador=   $data['usuario_digitador'];
        $user->auth_key=             $data['auth_key'];

        $user->save();
         
        return $user;
     }
     
     public function guardarPerfil($id_usuario,$cod_rol){
         $perfil = new Perfiles();
         $perfil->id_usuario=$id_usuario;
         $perfil->cod_rol=$cod_rol;
         $perfil->estado_perfil='1';
         $perfil->save();
         return $perfil;
     }
    
     public function guardarPerfilRegion($id_usuario,$cod_rol,$cod_region){
         $perfilRegion = new PerfilRegion();
         $perfilRegion->id_usuario=$id_usuario;
         $perfilRegion->cod_rol=$cod_rol;
         $perfilRegion->cod_region=$cod_region;
         $perfilRegion->estado_per_reg='1';
         $perfilRegion->save();
         return $perfilRegion;
     }
     
    public function guardarEntidad($nombre_entidad,$cod_canton, $cod_provincia, $cod_parroquia,$identificacion){
         $entidad = new Entidades();
         $entidad->nombre_entidad=$nombre_entidad;
         if($cod_parroquia==="" || $cod_parroquia===null ){
            
             $entidad->cod_canton=$cod_canton;
             $entidad->cod_provincia=$cod_provincia;
         }else{

             $entidad->cod_canton_p=$cod_canton;
             $entidad->cod_provincia_p=$cod_provincia;
             $entidad->cod_parroquia=$cod_parroquia;
             $entidad->identificacion=$identificacion;
         }
          $entidad->save();
          return $entidad;
     }
     
    public function guardarRegion($cod_region,$nombre_region){
         $entidad = new Region();
         $entidad->cod_region = $cod_region;
         $entidad->nombre_region=$nombre_region;
          $entidad->save();
          return $entidad;
     }
     
     public function guardarRegionEntidad($cod_region,$id_entidad){
         $entidad = new Regionentidades();
         $entidad->cod_region = $cod_region;
         $entidad->id_entidad=$id_entidad;
          $entidad->save();
          return $entidad;
     }
     
      public function guardarNotificacion($id_usuario,$password,$id_formato){
         $notificacion = new \common\models\notificaciones\NotificacionUsuario();
         $notificacion->id_usuario=$id_usuario;
         $notificacion->password=$password;
         $notificacion->id_formato=$id_formato;
         $notificacion->save();
         return $notificacion;
     }
     
     
     public function guardarFdAdmEstado($nom_adm_estado,$cod_rol,$id_modulo){
         $estado = new \common\models\poc\FdAdmEstado();
         $estado->nom_adm_estado = $nom_adm_estado;
         $estado->cod_rol=$cod_rol;
         $estado->id_modulo=$id_modulo;
         $estado->p_actualizar='S';
         $estado->p_borrar='S';
         $estado->p_crear='S';
         $estado->p_ejecutar='S';
         
          $estado->save();
          
           $data = \yii\helpers\ArrayHelper::toArray($estado, [
                '\common\models\poc\FdAdmEstado' => [
                    'id_adm_Estado',
                    'nom_adm_estado',
                    
                ],
            ]);
          return ['estado'=> $estado,'data'=>$data];
     }
     
    public function guardarFdConjuntoRespuesta($id_conjunto_pregunta,$id_entidad,$id_formato,$id_adm_estado,$id_periodo,$fecha){
         $conjuntoRespuesta = new \common\models\poc\FdConjuntoRespuesta();
         $conjuntoRespuesta->id_conjunto_pregunta = $id_conjunto_pregunta;
         $conjuntoRespuesta->id_entidad=$id_entidad;
         $conjuntoRespuesta->id_formato=$id_formato;
         $conjuntoRespuesta->ult_id_adm_estado=$id_adm_estado;
         $conjuntoRespuesta->id_periodo=$id_periodo;
         $conjuntoRespuesta->fecha_creacion=$fecha;
         
          $conjuntoRespuesta->save();
          return $conjuntoRespuesta;
     }
     
     public function guardarFdHistoricoRespuesta($observaciones,$fecha,$usuario,$id_conjunto_respuesta,$id_adm_estado){
         $historicoRespuesta = new \common\models\poc\FdHistoricoRespuesta();
         $historicoRespuesta->observaciones = $observaciones;
         $historicoRespuesta->fecha=$fecha;
         $historicoRespuesta->usuario=$usuario;
         $historicoRespuesta->id_conjunto_respuesta=$id_conjunto_respuesta;
         $historicoRespuesta->id_adm_estado=$id_adm_estado;

         
          $historicoRespuesta->save();
          return $historicoRespuesta;
     }
     
     

    public function buscaTokenUsuarioEmail($email){

       $usuario= UsuariosAp::findOne([
            'email' => $email,
           'estado_usuario' => UsuariosAp::STATUS_ACTIVE,
       ]);
       return $usuario->auth_key;
    }
    
     
    public function solicitudResetPassword($email,$auth_key){

        $usuario= UsuariosAp::findOne([
                'email' => $email,
               'estado_usuario' => UsuariosAp::STATUS_ACTIVE,
           ]);
       $usuario->auth_key=$auth_key;
       if (!$usuario->save()) {
               return false;
       }
       return true;

    }
     
    public function buscaUsuarioEmail($email){

      return UsuariosAp::findOne([
          'email' => $email,
          //'estado_usuario' => UsuariosAp::STATUS_ACTIVE,
      ]);

    }
    
    public function buscaUsuarioUsuario($usuario){
      return UsuariosAp::find()->where(["like", "usuario",":usuario", [":usuario" => $usuario]])->asArray()->all();
    }
    
    public function buscaUsuarioDocument($document){
      return UsuariosAp::find()->where("identificacion=:identificacion", [":identificacion" => $document]);
    }
    
    public function buscaUsuarioId($id_usuario){
       return UsuariosAp::find()->where("id_usuario=:id_usuario", [":id_usuario" => $id_usuario]);
    }
    
    public function buscarFormatoXRol($cod_rol){
        return \common\models\poc\FdFormato::find()->where("cod_rol=:xv",[":xv"=>$cod_rol])->asArray()->all();
    }
    
    public function buscarFormato($id_formato){
        return \common\models\poc\FdFormato::find()->where("id_formato=:xv",[":xv"=>$id_formato])->asArray()->one();
    }
    
    public function buscarConjuntoPreguntaFormato($id_formato,$cod_rol){
        return \common\models\poc\FdConjuntoPregunta::find()
                ->where("id_formato=:xv",[":xv"=>$id_formato])
                ->andWhere("cod_rol=:xy",[":xy"=>$cod_rol])
                ->orderBy(['id_version' => SORT_DESC])
                ->asArray()->one();
    }
    
    public function buscarConjuntoPreguntaRol($cod_rol){
        return \common\models\poc\FdConjuntoPregunta::find()
               ->select('b.id_formato,b.nom_formato')
               ->join('INNER JOIN','fd_formato AS b','fd_conjunto_pregunta.id_formato=b.id_formato')
               ->where('fd_conjunto_pregunta.cod_rol= :xy',[':xy'=>$cod_rol])->asArray()->all();
    }
    
    public function buscarPeriodoFormato($id_formato){
        return \common\models\poc\FdPeriodoFormato::find()
                ->where("id_formato=:xv",[":xv"=>$id_formato])
                ->orderBy(['id_periodo' => SORT_DESC])
                ->asArray()->one();
    }
    
    
    public function buscarCantones($cod_provincia){
        return Cantones::find()->where("cod_provincia=:xv",[":xv"=>$cod_provincia])->asArray()->all();
    }
    
    public function buscarCantone($cod_provincia,$cod_canton){
        return Cantones::find()->where("cod_provincia=:xv",[":xv"=>$cod_provincia])->andWhere("cod_canton=:xv",[":xv"=>$cod_canton])->asArray()->all();
    }
    
    public function buscarParroquia($cod_parroquia,$cod_provincia,$cod_canton){
        return Parroquias::find()->where("cod_canton=:xv",[":xv"=>$cod_canton])->andWhere("cod_provincia=:yv",[":yv"=>$cod_provincia])->andWhere("cod_parroquia=:yz",[":yz"=>$cod_parroquia])->asArray()->all();
    }
    
    public function buscarParroquias($cod_provincia,$cod_canton){
        return Parroquias::find()->where("cod_canton=:xv",[":xv"=>$cod_canton])->andWhere("cod_provincia=:yv",[":yv"=>$cod_provincia])->asArray()->all();
    }
    
    
    
    public function buscaEntidad($cod_canton,$cod_provincia,$cod_parroquia){
        if($cod_parroquia==="" or $cod_parroquia===null){
            return Entidades::find()
               ->select('entidades.id_entidad,entidades.nombre_entidad')
               ->where('entidades.cod_canton= :xy',[':xy'=>$cod_canton])
               ->andWhere('entidades.cod_canton= :yz',[':yz'=>$cod_provincia])
               ->asArray()->one();
        }else{
            return Entidades::find()
               ->select('entidades.id_entidad')
               ->where('entidades.cod_canton_p= :xy',[':xy'=>$cod_canton])
               ->andWhere('entidades.cod_canton= :yz',[':yz'=>$cod_provincia])
               ->andWhere('entidades.cod_parroquia= :yz',[':yz'=>$cod_parroquia])
               ->asArray()->one();
        }
                
    }
    
   public function buscaEntidadRegion($id_entidad){
        return Entidades::find()
               ->select('b.cod_region')
               ->join('INNER JOIN','regionentidades AS a','entidades.id_entidad=a.id_entidad')
               ->join('INNER JOIN','region AS b','a.cod_region=b.cod_region')
               ->where('entidades.id_entidad= :xy',[':xy'=>$id_entidad])->asArray()->one();
                
    }
    
    public function buscaFdAdmEstado($cod_rol,$id_modulo){
        return \common\models\poc\FdAdmEstado::find()
               ->select('id_adm_estado')
               ->where('cod_rol= :xy',[':xy'=>$cod_rol])
                ->andWhere('id_modulo= :zy',[':zy'=>$id_modulo])
                ->andWhere("fd_adm_estado.nom_adm_estado='Edición'")
                ->asArray()->one();
                
    }
    
   public function buscaPerfilesUsuario($usuario){
       return UsuariosAp::find()
               ->select('usuarios_ap.usuario,a.id_usuario,a.cod_rol,b.nombre_rol')
               ->join('INNER JOIN','perfiles AS a','usuarios_ap.id_usuario=a.id_usuario')
               ->join('INNER JOIN','rol AS b','a.cod_rol=b.cod_rol')
               ->where('usuarios_ap.usuario= :xy',[':xy'=>$usuario])
               ->andWhere("a.estado_perfil='s'")->asArray()->all();
   }

   public function buscaAccesosUsuario($usuario){
        return UsuariosAp::find()
               ->select('usuarios_ap.usuario,a.id_usuario,c.id_acceso,d.id_tipo_acceso, d.nombre_acceso, e.id_pagina,e.nombre_pagina,e.modulo')
               ->join('INNER JOIN','perfiles AS a','usuarios_ap.id_usuario=a.id_usuario')
               ->join('INNER JOIN','rol AS b','a.cod_rol=b.cod_rol')
               ->join('INNER JOIN','accesos AS c','b.cod_rol=c.cod_rol')
               ->join('INNER JOIN','tipo_acceso AS d','c.id_tipo_acceso=d.id_tipo_acceso')
               ->join('INNER JOIN','pagina AS e','c.id_pagina = e.id_pagina')
               ->where('usuarios_ap.usuario= :xy',[':xy'=>$usuario])
               ->andWhere("a.estado_perfil='s'")->asArray()->all();
   }
   
   public function buscaRegionesUsuario($usuario){
        return UsuariosAp::find()
               ->select('usuarios_ap.usuario,a.id_usuario,c.cod_region,c.nombre_region,e.id_entidad,e.nombre_entidad ')
               ->join('INNER JOIN','perfiles AS a','usuarios_ap.id_usuario=a.id_usuario')
               ->join('INNER JOIN','perfil_region AS b','a.id_usuario=b.id_usuario and a.cod_rol=b.cod_rol')
               ->join('INNER JOIN','region AS c','b.cod_region = c.cod_region')
               ->join('INNER JOIN','regionentidades AS d','c.cod_region=d.cod_region')
               ->join('INNER JOIN','entidades AS e','d.id_entidad=e.id_entidad')
               ->where('usuarios_ap.usuario= :xy',[':xy'=>$usuario])
               ->andWhere("a.estado_perfil='s'")
               ->andWhere("b.estado_per_reg='s'")->asArray()->all();
   }
   
  
   
}


