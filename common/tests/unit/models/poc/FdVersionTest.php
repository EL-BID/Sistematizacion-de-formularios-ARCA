<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdVersion;
/**
 * Este es el unit test para la clase "fd_version".
 *
 * @property int4 $id_version
 * @property varchar $desc_version
 * @property varchar $num_version
 *
 * @property FdConjuntoPregunta[] $fdConjuntoPreguntas
 * @property FdFormato[] $fdFormatos
 * @property FdPreguntaDescendiente[] $fdPreguntaDescendientes
 * @property FdPreguntaDescendiente[] $fdPreguntaDescendientes0
 * @property FdRespuesta[] $fdRespuestas
 */
class FdVersionTest extends \Codeception\Test\Unit
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
        $tester = new FdVersion();
        $tester->id_version = "Ingresar valor de pruebas para el campo id_version de tipo int4";
        $tester->desc_version = "Ingresar valor de pruebas para el campo desc_version de tipo varchar";
        $tester->num_version = "Ingresar valor de pruebas para el campo num_version de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdVersion;
        $tester->id_version = "Ingresar valor de pruebas para el campo id_version de tipo int4";
        $tester->desc_version = "Ingresar valor de pruebas para el campo desc_version de tipo varchar";
        $tester->num_version = "Ingresar valor de pruebas para el campo num_version de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdVersion  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdVersion::findOne(                                                               
        [
           'id_version' => "Ingresar valor de pruebas para el campo id_version de tipo int4",
           'desc_version' => "Ingresar valor de pruebas para el campo desc_version de tipo varchar",
           'num_version' => "Ingresar valor de pruebas para el campo num_version de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdVersion No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdVersion Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdVersion::findOne(                                                               
        [
           'id_version' => "Ingresar valor de pruebas para el campo id_version de tipo int4",
           'desc_version' => "Ingresar valor de pruebas para el campo desc_version de tipo varchar",
           'num_version' => "Ingresar valor de pruebas para el campo num_version de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdVersion::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdVersion();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdVersion();
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
         expect($tester->id_version)->equals('Ingresar valor de pruebas para el campo id_version de tipo int4');
         expect($tester->desc_version)->equals('Ingresar valor de pruebas para el campo desc_version de tipo varchar');
         expect($tester->num_version)->equals('Ingresar valor de pruebas para el campo num_version de tipo varchar');
      }

}
