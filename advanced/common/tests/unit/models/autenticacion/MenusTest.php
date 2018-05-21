<?php

namespace frontend\tests\unit\models\autenticacion;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\autenticacion\Menus;
/**
 * Este es el unit test para la clase "menus".
 *
 * @property int4 $id_menu
 * @property varchar $nom_menu
 * @property int4 $nivel
 * @property numeric $id_pagina
 * @property varchar $parametros
 * @property int4 $id_menu_padre
 * @property varchar $tipo_menu
 * @property int4 $orden
 *
 * @property Menus $idMenuPadre
 * @property Menus[] $menuses
 * @property Pagina $idPagina
 */
class MenusTest extends \Codeception\Test\Unit
{

    /**
     * @var \frontend\tests\UnitTester
     */

    public function _before()
    {
        
    }
                                                                                        
    public function _after()                                                              
    {             
                                                             
    }                
    
    
     /** en caso de querer utilizar Asserts por favor revisar la documentacion en http://codeception.com/docs/modules/Asserts */
    public function testValidate()                                                             
    {                                                                                        
        $tester = new Menus();
        $tester->id_menu = "Ingresar valor de pruebas para el campo id_menu de tipo int4";
        $tester->nom_menu = "Ingresar valor de pruebas para el campo nom_menu de tipo varchar";
        $tester->nivel = "Ingresar valor de pruebas para el campo nivel de tipo int4";
        $tester->id_pagina = "Ingresar valor de pruebas para el campo id_pagina de tipo numeric";
        $tester->parametros = "Ingresar valor de pruebas para el campo parametros de tipo varchar";
        $tester->id_menu_padre = "Ingresar valor de pruebas para el campo id_menu_padre de tipo int4";
        $tester->tipo_menu = "Ingresar valor de pruebas para el campo tipo_menu de tipo varchar";
        $tester->orden = "Ingresar valor de pruebas para el campo orden de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new Menus;
        $tester->id_menu = "Ingresar valor de pruebas para el campo id_menu de tipo int4";
        $tester->nom_menu = "Ingresar valor de pruebas para el campo nom_menu de tipo varchar";
        $tester->nivel = "Ingresar valor de pruebas para el campo nivel de tipo int4";
        $tester->id_pagina = "Ingresar valor de pruebas para el campo id_pagina de tipo numeric";
        $tester->parametros = "Ingresar valor de pruebas para el campo parametros de tipo varchar";
        $tester->id_menu_padre = "Ingresar valor de pruebas para el campo id_menu_padre de tipo int4";
        $tester->tipo_menu = "Ingresar valor de pruebas para el campo tipo_menu de tipo varchar";
        $tester->orden = "Ingresar valor de pruebas para el campo orden de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'Menus  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = Menus::findOne(                                                               
        [
           'id_menu' => "Ingresar valor de pruebas para el campo id_menu de tipo int4",
           'nom_menu' => "Ingresar valor de pruebas para el campo nom_menu de tipo varchar",
           'nivel' => "Ingresar valor de pruebas para el campo nivel de tipo int4",
           'id_pagina' => "Ingresar valor de pruebas para el campo id_pagina de tipo numeric",
           'parametros' => "Ingresar valor de pruebas para el campo parametros de tipo varchar",
           'id_menu_padre' => "Ingresar valor de pruebas para el campo id_menu_padre de tipo int4",
           'tipo_menu' => "Ingresar valor de pruebas para el campo tipo_menu de tipo varchar",
           'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'Menus No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'Menus Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = Menus::findOne(                                                               
        [
           'id_menu' => "Ingresar valor de pruebas para el campo id_menu de tipo int4",
           'nom_menu' => "Ingresar valor de pruebas para el campo nom_menu de tipo varchar",
           'nivel' => "Ingresar valor de pruebas para el campo nivel de tipo int4",
           'id_pagina' => "Ingresar valor de pruebas para el campo id_pagina de tipo numeric",
           'parametros' => "Ingresar valor de pruebas para el campo parametros de tipo varchar",
           'id_menu_padre' => "Ingresar valor de pruebas para el campo id_menu_padre de tipo int4",
           'tipo_menu' => "Ingresar valor de pruebas para el campo tipo_menu de tipo varchar",
           'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= Menus::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new Menus();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new Menus();
        $labels= $tester->attributeLabels();
         $this->assertNotEmpty($labels,
            'Se devolvio vacio array con los labels ');  
        
    }
    
    
    /**
    *  The following line indicates that the parameter values entered here are derived from testSelect Output 
    * @depends testSelect
    */
   public function testModelProperty($tester)
   {
         expect($tester->id_menu)->equals('Ingresar valor de pruebas para el campo id_menu de tipo int4');
         expect($tester->nom_menu)->equals('Ingresar valor de pruebas para el campo nom_menu de tipo varchar');
         expect($tester->nivel)->equals('Ingresar valor de pruebas para el campo nivel de tipo int4');
         expect($tester->id_pagina)->equals('Ingresar valor de pruebas para el campo id_pagina de tipo numeric');
         expect($tester->parametros)->equals('Ingresar valor de pruebas para el campo parametros de tipo varchar');
         expect($tester->id_menu_padre)->equals('Ingresar valor de pruebas para el campo id_menu_padre de tipo int4');
         expect($tester->tipo_menu)->equals('Ingresar valor de pruebas para el campo tipo_menu de tipo varchar');
         expect($tester->orden)->equals('Ingresar valor de pruebas para el campo orden de tipo int4');
      }

}
