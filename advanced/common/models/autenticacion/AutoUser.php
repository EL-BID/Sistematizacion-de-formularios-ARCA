<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models\autenticacion;
use Yii;
use common\models\autenticacion\UsuariosAp;
use common\models\autenticacion\Menus;

/**
 * Description of AutoUser
 *
 * @author asus1
 */
class AutoUser {
    
    public static function menuNIvel0($usuario,$tipo){
        
         return Menus::find()
               ->select('menus.id_menu,menus.nom_menu,menus.parametros,menus.id_menu_padre,menus.nivel,a.nombre_pagina,a.modulo,d.id_usuario')
               ->join('LEFT JOIN','pagina AS a','menus.id_pagina = a.id_pagina')
               ->join('LEFT JOIN','accesos AS b','a.id_pagina = b.id_pagina')
               ->join('LEFT JOIN','rol AS c','b.cod_rol=c.cod_rol')
               ->join('LEFT JOIN','perfiles AS d','c.cod_rol =d.cod_rol')
               ->join('INNER JOIN','usuarios_ap AS e','e.id_usuario=d.id_usuario')
               ->where('e.usuario= :xy',[':xy'=>$usuario])
               ->andWhere("d.estado_perfil='s'")
               ->andWhere("menus.tipo_menu=:fh",[':fh'=>$tipo])
               ->andWhere("menus.nivel=0")->distinct()->asArray()->all();
    }
    
     public static function menuHijo($usuario,$tipo,$id_menu){
        
         return Menus::find()
               ->select('menus.id_menu,menus.nom_menu,menus.parametros,menus.id_menu_padre,menus.nivel,a.nombre_pagina,a.modulo,d.id_usuario')
               ->join('LEFT JOIN','pagina AS a','menus.id_pagina = a.id_pagina')
               ->join('LEFT JOIN','accesos AS b','a.id_pagina = b.id_pagina')
               ->join('LEFT JOIN','rol AS c','b.cod_rol=c.cod_rol')
               ->join('LEFT JOIN','perfiles AS d','c.cod_rol =d.cod_rol')
               ->join('INNER JOIN','usuarios_ap AS e','e.id_usuario=d.id_usuario')
               ->where('e.usuario= :xy',[':xy'=>$usuario])
               ->andWhere("d.estado_perfil='s'")
               ->andWhere("menus.tipo_menu=:fh",[':fh'=>$tipo])
               ->andWhere("menus.id_menu_padre= :za",[':za'=>$id_menu])->distinct()->asArray()->all();
    }
    
    
    public static function validateFirstTime($usuario){
        return UsuariosAp::find()->select('usuarios_ap.login,usuarios_ap.clave,usuarios_ap.auth_key')
                ->where('usuarios_ap.usuario= :xy',[':xy'=>$usuario])
                ->andWhere("usuarios_ap.login != usuarios_ap.clave")
                 ->andWhere("usuarios_ap.auth_key!=''")
                ->asArray()->one();
         
    }
    
}
