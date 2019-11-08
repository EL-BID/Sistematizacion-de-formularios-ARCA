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
use common\models\autenticacion\Accesos;

/**
 * Description of AutoUser
 *
 * @author asus1
 */
class AutoUser {
    
    
    
    public function accessUser(){
        
        //1) Rol del usuario que accede ====================================================================
        $_role = (!empty(Yii::$app->user->identity->codRols[0]->cod_rol))? Yii::$app->user->identity->codRols[0]->cod_rol:null;
       
        
        //Armando menu segun datos en la base de datos =====================================================
        $menus=array();
        $_menunivel0 = $this->menuNIvel0($_role, 'H');
                
        $a=0;
        foreach($_menunivel0 as $_padre){

        
            $_vhijos=array();
            $_menuHijo = $this->menuHijo($_role, 'H',$_padre['id_menu']);
            
            foreach($_menuHijo as $_hijos){
                $_vhijos[] = ['label' => $_hijos['nom_menu'], 'url' => [$_hijos['parametros']]];
							
            }
            
            //$menus[$a]['label']=  $_padre['estilos'].$_padre['nom_menu'];
            $menus[$a]['label']=$_padre['estilos'].$_padre['nom_menu'];
            //$menus['items'][]= ['label' => 'PQRS', 'url' => ['/pqrs/pqrs/']];
            
            if(count($_vhijos)>0){
                $menus[$a]['items'] = $_vhijos;
            }
            $a+=1;   
        }
        
      
        return $menus;
    }
    
    public static function menuNIvel0($rol,$tipo){
        
         if($rol == null){
          
            return  Yii::$app->db->createCommand("select menus.id_menu,menus.nom_menu,menus.estilos,menus.parametros from accesos 
                                                    LEFT JOIN pagina ON pagina.id_pagina = accesos.id_pagina
                                                    LEFT JOIN menus ON  menus.id_pagina = pagina.id_pagina
                                                    where accesos.cod_rol is null and menus.nivel = '0' and menus.tipo_menu = 'H'
                                                    and accesos.id_tipo_acceso = 5 
                                                    GROUP BY menus.id_menu ORDER BY menus.orden ASC")->queryAll();
           
             
         }else{
            
             return  Yii::$app->db->createCommand("select menus.id_menu,menus.nom_menu,menus.estilos,menus.parametros from accesos 
                                                    LEFT JOIN pagina ON pagina.id_pagina = accesos.id_pagina
                                                    LEFT JOIN menus ON  menus.id_pagina = pagina.id_pagina
                                                    where accesos.cod_rol=:role and menus.nivel = '0' and menus.tipo_menu = 'H'
                                                    and accesos.id_tipo_acceso = 5 
                                                    GROUP BY menus.id_menu ORDER BY menus.orden ASC")
                                                     ->bindValue(':role',$rol)
                                                    ->queryAll();
         }    
    }
    
     public static function menuHijo($rol,$tipo,$id_menu=null){
        
         if($rol == null){
          
            return  Yii::$app->db->createCommand("select menus.id_menu,menus.nom_menu,menus.estilos,menus.parametros from accesos 
                                                    LEFT JOIN pagina ON pagina.id_pagina = accesos.id_pagina
                                                    LEFT JOIN menus ON  menus.id_pagina = pagina.id_pagina
                                                    where accesos.cod_rol is null and menus.nivel = '1' and menus.tipo_menu = 'H'
                                                    and accesos.id_tipo_acceso = 1 and menus.id_menu_padre = :id_menu
                                                    GROUP BY menus.id_menu ORDER BY menus.orden ASC")
                                                ->bindValue(':id_menu',$id_menu)
                                                ->queryAll();
           
             
         }else{
         
             return  Yii::$app->db->createCommand("select menus.id_menu,menus.nom_menu,menus.estilos,menus.parametros from accesos 
                                                    LEFT JOIN pagina ON pagina.id_pagina = accesos.id_pagina
                                                    LEFT JOIN menus ON  menus.id_pagina = pagina.id_pagina
                                                    where accesos.cod_rol =:role and menus.nivel = '1' and menus.tipo_menu = 'H'
                                                    and accesos.id_tipo_acceso = 1 and menus.id_menu_padre = :id_menu
                                                    GROUP BY menus.id_menu ORDER BY menus.orden ASC")
                                                ->bindValue(':id_menu',$id_menu)
                                                 ->bindValue(':role',$rol)
                                                ->queryAll();
         }
    }
    
    
    public static function validateFirstTime($usuario){
        return UsuariosAp::find()->select('usuarios_ap.login,usuarios_ap.clave,usuarios_ap.auth_key')
                ->where('usuarios_ap.usuario= :xy',[':xy'=>$usuario])
                ->andWhere("usuarios_ap.login != usuarios_ap.clave")
                 ->andWhere("usuarios_ap.auth_key!=''")
                ->asArray()->one();
         
    }
    
}
