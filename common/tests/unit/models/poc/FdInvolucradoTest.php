<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdInvolucrado;
/**
 * Este es el unit test para la clase "fd_involucrado".
 *
 * @property int4 $id_involucrado
 * @property varchar $nombre
 * @property int4 $telefono_convencional
 * @property int4 $celular
 * @property varchar $correo_electronico
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_pregunta
 * @property int4 $id_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdInvolucradoTest extends \Codeception\Test\Unit
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
        $tester = new FdInvolucrado();
        $tester->id_involucrado = "Ingresar valor de pruebas para el campo id_involucrado de tipo int4";
        $tester->nombre = "Ingresar valor de pruebas para el campo nombre de tipo varchar";
        $tester->telefono_convencional = "Ingresar valor de pruebas para el campo telefono_convencional de tipo int4";
        $tester->celular = "Ingresar valor de pruebas para el campo celular de tipo int4";
        $tester->correo_electronico = "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdInvolucrado;
        $tester->id_involucrado = "Ingresar valor de pruebas para el campo id_involucrado de tipo int4";
        $tester->nombre = "Ingresar valor de pruebas para el campo nombre de tipo varchar";
        $tester->telefono_convencional = "Ingresar valor de pruebas para el campo telefono_convencional de tipo int4";
        $tester->celular = "Ingresar valor de pruebas para el campo celular de tipo int4";
        $tester->correo_electronico = "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdInvolucrado  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdInvolucrado::findOne(                                                               
        [
           'id_involucrado' => "Ingresar valor de pruebas para el campo id_involucrado de tipo int4",
           'nombre' => "Ingresar valor de pruebas para el campo nombre de tipo varchar",
           'telefono_convencional' => "Ingresar valor de pruebas para el campo telefono_convencional de tipo int4",
           'celular' => "Ingresar valor de pruebas para el campo celular de tipo int4",
           'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdInvolucrado No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdInvolucrado Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdInvolucrado::findOne(                                                               
        [
           'id_involucrado' => "Ingresar valor de pruebas para el campo id_involucrado de tipo int4",
           'nombre' => "Ingresar valor de pruebas para el campo nombre de tipo varchar",
           'telefono_convencional' => "Ingresar valor de pruebas para el campo telefono_convencional de tipo int4",
           'celular' => "Ingresar valor de pruebas para el campo celular de tipo int4",
           'correo_electronico' => "Ingresar valor de pruebas para el campo correo_electronico de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdInvolucrado::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdInvolucrado();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdInvolucrado();
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
         expect($tester->id_involucrado)->equals('Ingresar valor de pruebas para el campo id_involucrado de tipo int4');
         expect($tester->nombre)->equals('Ingresar valor de pruebas para el campo nombre de tipo varchar');
         expect($tester->telefono_convencional)->equals('Ingresar valor de pruebas para el campo telefono_convencional de tipo int4');
         expect($tester->celular)->equals('Ingresar valor de pruebas para el campo celular de tipo int4');
         expect($tester->correo_electronico)->equals('Ingresar valor de pruebas para el campo correo_electronico de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
      }

}
