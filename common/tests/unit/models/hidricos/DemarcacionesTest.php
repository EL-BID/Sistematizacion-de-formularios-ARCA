<?php

namespace common\tests\unit\models\hidricos;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\hidricos\Demarcaciones;
/**
 * Este es el unit test para la clase "demarcaciones".
 *
 * @property numeric $id_demarcacion
 * @property varchar $cod_demarcacion
 * @property varchar $nombre_demarcacion
 *
 * @property Cantones[] $cantones
 * @property FdUbicacion[] $fdUbicacions
 */
class DemarcacionesTest extends \Codeception\Test\Unit
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
        $tester = new Demarcaciones();
        $tester->id_demarcacion = "Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric";
        $tester->cod_demarcacion = "Ingresar valor de pruebas para el campo cod_demarcacion de tipo varchar";
        $tester->nombre_demarcacion = "Ingresar valor de pruebas para el campo nombre_demarcacion de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new Demarcaciones;
        $tester->id_demarcacion = "Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric";
        $tester->cod_demarcacion = "Ingresar valor de pruebas para el campo cod_demarcacion de tipo varchar";
        $tester->nombre_demarcacion = "Ingresar valor de pruebas para el campo nombre_demarcacion de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'Demarcaciones  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = Demarcaciones::findOne(                                                               
        [
           'id_demarcacion' => "Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric",
           'cod_demarcacion' => "Ingresar valor de pruebas para el campo cod_demarcacion de tipo varchar",
           'nombre_demarcacion' => "Ingresar valor de pruebas para el campo nombre_demarcacion de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'Demarcaciones No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'Demarcaciones Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = Demarcaciones::findOne(                                                               
        [
           'id_demarcacion' => "Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric",
           'cod_demarcacion' => "Ingresar valor de pruebas para el campo cod_demarcacion de tipo varchar",
           'nombre_demarcacion' => "Ingresar valor de pruebas para el campo nombre_demarcacion de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= Demarcaciones::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new Demarcaciones();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new Demarcaciones();
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
         expect($tester->id_demarcacion)->equals('Ingresar valor de pruebas para el campo id_demarcacion de tipo numeric');
         expect($tester->cod_demarcacion)->equals('Ingresar valor de pruebas para el campo cod_demarcacion de tipo varchar');
         expect($tester->nombre_demarcacion)->equals('Ingresar valor de pruebas para el campo nombre_demarcacion de tipo varchar');
      }

}
