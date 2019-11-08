<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\Informacionprestadores;
/**
 * Este es el unit test para la clase "informacion_prestadores".
 *
 * @property numeric $id_informacion_prestadores
 * @property varchar $posee_prestadores
 * @property int4 $numero_prestadores
 * @property int4 $numero_prestadores_legal
 * @property int4 $numero_prestadores_economico
 * @property int4 $numero_prestadores_tecnico
 * @property int4 $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 */
class InformacionprestadoresTest extends \Codeception\Test\Unit
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
        $tester = new Informacionprestadores();
        $tester->id_informacion_prestadores = "Ingresar valor de pruebas para el campo id_informacion_prestadores de tipo numeric";
        $tester->posee_prestadores = "Ingresar valor de pruebas para el campo posee_prestadores de tipo varchar";
        $tester->numero_prestadores = "Ingresar valor de pruebas para el campo numero_prestadores de tipo int4";
        $tester->numero_prestadores_legal = "Ingresar valor de pruebas para el campo numero_prestadores_legal de tipo int4";
        $tester->numero_prestadores_economico = "Ingresar valor de pruebas para el campo numero_prestadores_economico de tipo int4";
        $tester->numero_prestadores_tecnico = "Ingresar valor de pruebas para el campo numero_prestadores_tecnico de tipo int4";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new Informacionprestadores;
        $tester->id_informacion_prestadores = "Ingresar valor de pruebas para el campo id_informacion_prestadores de tipo numeric";
        $tester->posee_prestadores = "Ingresar valor de pruebas para el campo posee_prestadores de tipo varchar";
        $tester->numero_prestadores = "Ingresar valor de pruebas para el campo numero_prestadores de tipo int4";
        $tester->numero_prestadores_legal = "Ingresar valor de pruebas para el campo numero_prestadores_legal de tipo int4";
        $tester->numero_prestadores_economico = "Ingresar valor de pruebas para el campo numero_prestadores_economico de tipo int4";
        $tester->numero_prestadores_tecnico = "Ingresar valor de pruebas para el campo numero_prestadores_tecnico de tipo int4";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'Informacionprestadores  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = Informacionprestadores::findOne(                                                               
        [
           'id_informacion_prestadores' => "Ingresar valor de pruebas para el campo id_informacion_prestadores de tipo numeric",
           'posee_prestadores' => "Ingresar valor de pruebas para el campo posee_prestadores de tipo varchar",
           'numero_prestadores' => "Ingresar valor de pruebas para el campo numero_prestadores de tipo int4",
           'numero_prestadores_legal' => "Ingresar valor de pruebas para el campo numero_prestadores_legal de tipo int4",
           'numero_prestadores_economico' => "Ingresar valor de pruebas para el campo numero_prestadores_economico de tipo int4",
           'numero_prestadores_tecnico' => "Ingresar valor de pruebas para el campo numero_prestadores_tecnico de tipo int4",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'Informacionprestadores No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'Informacionprestadores Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = Informacionprestadores::findOne(                                                               
        [
           'id_informacion_prestadores' => "Ingresar valor de pruebas para el campo id_informacion_prestadores de tipo numeric",
           'posee_prestadores' => "Ingresar valor de pruebas para el campo posee_prestadores de tipo varchar",
           'numero_prestadores' => "Ingresar valor de pruebas para el campo numero_prestadores de tipo int4",
           'numero_prestadores_legal' => "Ingresar valor de pruebas para el campo numero_prestadores_legal de tipo int4",
           'numero_prestadores_economico' => "Ingresar valor de pruebas para el campo numero_prestadores_economico de tipo int4",
           'numero_prestadores_tecnico' => "Ingresar valor de pruebas para el campo numero_prestadores_tecnico de tipo int4",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= Informacionprestadores::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new Informacionprestadores();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new Informacionprestadores();
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
         expect($tester->id_informacion_prestadores)->equals('Ingresar valor de pruebas para el campo id_informacion_prestadores de tipo numeric');
         expect($tester->posee_prestadores)->equals('Ingresar valor de pruebas para el campo posee_prestadores de tipo varchar');
         expect($tester->numero_prestadores)->equals('Ingresar valor de pruebas para el campo numero_prestadores de tipo int4');
         expect($tester->numero_prestadores_legal)->equals('Ingresar valor de pruebas para el campo numero_prestadores_legal de tipo int4');
         expect($tester->numero_prestadores_economico)->equals('Ingresar valor de pruebas para el campo numero_prestadores_economico de tipo int4');
         expect($tester->numero_prestadores_tecnico)->equals('Ingresar valor de pruebas para el campo numero_prestadores_tecnico de tipo int4');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
      }

}
