<?php
namespace common\components;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AutoUser
 *
 * @author asus1
 */

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
 
class AutoUserCp extends Component
{
    public static function getMenuHorizontal($ambiente=null)
    {
        $usuario = Yii::$app->user->identity->usuario;
        $menus= \common\models\autenticacion\AutoUser::menuNIvel0($usuario, 'h');
        $menuItems=Array();
        foreach($menus as $menu)
        {
            $menuItemsChild=static::getMenuHorizontalChlids($usuario,'h',$menu['id_menu']);
             if (count($menuItemsChild)>0){
               $menuItems[]=array('label'=>$menu['nom_menu'],'url'=>[$menu['modulo'].'/'.$menu['nombre_pagina']],'items'=>$menuItemsChild);
            }
            else{
                $menuItems[]=array('label'=>$menu['nom_menu'],'url'=>[$menu['modulo'].'/'.$menu['nombre_pagina']]);
            }
            
        }
        
        return $menuItems;
    }
     private function getMenuHorizontalChlids($usuario,$tipo,$id_menu,$ambiente=null){
        $menus= \common\models\autenticacion\AutoUser::menuHijo($usuario, $tipo,$id_menu); 
        $menuItems=Array();
        foreach($menus as $menu){
            $menuItemsChild=static::getMenuHorizontalChlids($usuario,$tipo,$menu['id_menu']);
            if (count($menuItemsChild)>0){
                   $menuItems[]=array('label'=>$menu['nom_menu'],'url'=>[$menu['modulo'].'/'.$menu['nombre_pagina']],'items'=>$menuItemsChild);
            }
            else{
                $menuItems[]=array('label'=>$menu['nom_menu'],'url'=>[$menu['modulo'].'/'.$menu['nombre_pagina']]);
            }
                      
        }
        return $menuItems;
     }
    
    public static function getMenuVertical($ambiente=null)
    {
         $usuario = Yii::$app->user->identity->usuario;
        $menus= \common\models\autenticacion\AutoUser::menuNIvel0($usuario, 'v');
        $menuItems=Array();
        foreach($menus as $menu)
        {
            $menuItemsChild=static::getMenuHorizontalChlids($usuario,'v',$menu['id_menu']);
             if (count($menuItemsChild)>0){
               $menuItems[]=array('label'=>$menu['nom_menu'],'url'=>[$menu['modulo'].'/'.$menu['nombre_pagina']],'items'=>$menuItemsChild);
            }
            else{
                $menuItems[]=array('label'=>$menu['nom_menu'],'url'=>[$menu['modulo'].'/'.$menu['nombre_pagina']]);
            }
            
        }
        
        return $menuItems;

    }

     public static function getMenuVericalChlids($usuario,$tipo,$id_menu,$ambiente=null){
        $menus= \common\models\autenticacion\AutoUser::menuHijo($usuario, $tipo,$id_menu); 
        $menuItems=Array();
        foreach($menus as $menu){
            $menuItemsChild=static::getMenuHorizontalChlids($usuario,$tipo,$menu['id_menu']);
            if (count($menuItemsChild)>0){
                   $menuItems[]=array('label'=>$menu['nom_menu'],'url'=>[$menu['modulo'].'/'.$menu['nombre_pagina']],'items'=>$menuItemsChild);
            }
            else{
                $menuItems[]=array('label'=>$menu['nom_menu'],'url'=>[$menu['modulo'].'/'.$menu['nombre_pagina']]);
            }
                      
        }
        return $menuItems;
     }
    
     
    public static function getFirstTime($usuario){
        $usuario = \common\models\autenticacion\AutoUser::validateFirstTime($usuario);
        if(count($usuario)>0){
            return true;
        }
        return false;
    }
    
    public function getPermission()
    {
//        $actions = array();
//        $actions['index']  = 'view';
//        $actions['view']   = 'view';
//        $actions['create'] = 'new';
//        $actions['update'] = 'save';
//        $actions['delete'] = 'remove';
//        
//        $role_id = Yii::$app->user->identity->user_level;    	
//        $action = $actions[Yii::$app->controller->action->id];
//        $controller = Yii::$app->controller->id;
//        
//        $permission = \app\models\RolePermission::find()
//                             ->select($action)
//                             ->join('LEFT JOIN', 'modules_list AS ML', 'ML.module_id = role_module_permission.module_id')
//                             ->where('role_id = :role_id', [':role_id' => $role_id])
//                             ->andWhere($action.' = :'.$action, [':'.$action => 1])
//                             ->andWhere('controller = :controller', [':controller' => $controller])
//                             ->one();
//        return $permission[$action] ? true : false;
    }
}

