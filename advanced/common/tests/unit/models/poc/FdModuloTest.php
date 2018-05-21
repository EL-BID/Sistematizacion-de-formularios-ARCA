<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdModulo;
/**
 * Este es el unit test para la clase "fd_modulo".
 *
 * @property int4 $id_modulo
 * @property varchar $nom_modulo
 *
 * @property FdAdmEstado[] $fdAdmEstados
 * @property FdFormato[] $fdFormatos
 */
class FdModuloTest extends \Codeception\Test\Unit
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
        $tester = new FdModulo();
        $tester->id_modulo = "Ingresar valor de pruebas para el campo id_modulo de tipo int4";
        $tester->nom_modulo = "Ingresar valor de pruebas para el campo nom_modulo de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdModulo;
        $tester->id_modulo = "Ingresar valor de pruebas para el campo id_modulo de tipo int4";
        $tester->nom_modulo = "Ingresar valor de pruebas para el campo nom_modulo de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdModulo  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdModulo::findOne(                                                               
        [
           'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",
           'nom_modulo' => "Ingresar valor de pruebas para el campo nom_modulo de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdModulo No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdModulo Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdModulo::findOne(                                                               
        [
           'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",
           'nom_modulo' => "Ingresar valor de pruebas para el campo nom_modulo de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdModulo::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdModulo();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdModulo();
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
         expect($tester->id_modulo)->equals('Ingresar valor de pruebas para el campo id_modulo de tipo int4');
         expect($tester->nom_modulo)->equals('Ingresar valor de pruebas para el campo nom_modulo de tipo varchar');
      }

}
