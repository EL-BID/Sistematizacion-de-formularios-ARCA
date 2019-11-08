<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdRepresentantesPrestador;
/**
 * Este es el unit test para la clase "fd_representantes_prestador".
 *
 * @property int4 $id_representantes_prestador
 * @property varchar $nombre
 * @property varchar $cargo
 * @property int4 $telefono
 * @property varchar $correo
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_pregunta
 * @property int4 $id_respuesta
 * @property int4 $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdRepresentantesPrestadorTest extends \Codeception\Test\Unit
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
        $tester = new FdRepresentantesPrestador();
        $tester->id_representantes_prestador = "Ingresar valor de pruebas para el campo id_representantes_prestador de tipo int4";
        $tester->nombre = "Ingresar valor de pruebas para el campo nombre de tipo varchar";
        $tester->cargo = "Ingresar valor de pruebas para el campo cargo de tipo varchar";
        $tester->telefono = "Ingresar valor de pruebas para el campo telefono de tipo int4";
        $tester->correo = "Ingresar valor de pruebas para el campo correo de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdRepresentantesPrestador;
        $tester->id_representantes_prestador = "Ingresar valor de pruebas para el campo id_representantes_prestador de tipo int4";
        $tester->nombre = "Ingresar valor de pruebas para el campo nombre de tipo varchar";
        $tester->cargo = "Ingresar valor de pruebas para el campo cargo de tipo varchar";
        $tester->telefono = "Ingresar valor de pruebas para el campo telefono de tipo int4";
        $tester->correo = "Ingresar valor de pruebas para el campo correo de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdRepresentantesPrestador  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdRepresentantesPrestador::findOne(                                                               
        [
           'id_representantes_prestador' => "Ingresar valor de pruebas para el campo id_representantes_prestador de tipo int4",
           'nombre' => "Ingresar valor de pruebas para el campo nombre de tipo varchar",
           'cargo' => "Ingresar valor de pruebas para el campo cargo de tipo varchar",
           'telefono' => "Ingresar valor de pruebas para el campo telefono de tipo int4",
           'correo' => "Ingresar valor de pruebas para el campo correo de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdRepresentantesPrestador No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdRepresentantesPrestador Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdRepresentantesPrestador::findOne(                                                               
        [
           'id_representantes_prestador' => "Ingresar valor de pruebas para el campo id_representantes_prestador de tipo int4",
           'nombre' => "Ingresar valor de pruebas para el campo nombre de tipo varchar",
           'cargo' => "Ingresar valor de pruebas para el campo cargo de tipo varchar",
           'telefono' => "Ingresar valor de pruebas para el campo telefono de tipo int4",
           'correo' => "Ingresar valor de pruebas para el campo correo de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdRepresentantesPrestador::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdRepresentantesPrestador();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdRepresentantesPrestador();
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
         expect($tester->id_representantes_prestador)->equals('Ingresar valor de pruebas para el campo id_representantes_prestador de tipo int4');
         expect($tester->nombre)->equals('Ingresar valor de pruebas para el campo nombre de tipo varchar');
         expect($tester->cargo)->equals('Ingresar valor de pruebas para el campo cargo de tipo varchar');
         expect($tester->telefono)->equals('Ingresar valor de pruebas para el campo telefono de tipo int4');
         expect($tester->correo)->equals('Ingresar valor de pruebas para el campo correo de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
      }

}
