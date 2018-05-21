<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdCoordenada;
/**
 * Este es el unit test para la clase "fd_coordenada".
 *
 * @property int4 $id_coordenada
 * @property numeric $x
 * @property numeric $y
 * @property numeric $altura
 * @property numeric $longitud
 * @property numeric $latitud
 * @property int4 $id_tcoordenada
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_pregunta
 * @property int4 $id_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 * @property TrTipoCoordenada $idTcoordenada
 */
class FdCoordenadaTest extends \Codeception\Test\Unit
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
        $tester = new FdCoordenada();
        $tester->id_coordenada = "Ingresar valor de pruebas para el campo id_coordenada de tipo int4";
        $tester->x = "Ingresar valor de pruebas para el campo x de tipo numeric";
        $tester->y = "Ingresar valor de pruebas para el campo y de tipo numeric";
        $tester->altura = "Ingresar valor de pruebas para el campo altura de tipo numeric";
        $tester->longitud = "Ingresar valor de pruebas para el campo longitud de tipo numeric";
        $tester->latitud = "Ingresar valor de pruebas para el campo latitud de tipo numeric";
        $tester->id_tcoordenada = "Ingresar valor de pruebas para el campo id_tcoordenada de tipo int4";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdCoordenada;
        $tester->id_coordenada = "Ingresar valor de pruebas para el campo id_coordenada de tipo int4";
        $tester->x = "Ingresar valor de pruebas para el campo x de tipo numeric";
        $tester->y = "Ingresar valor de pruebas para el campo y de tipo numeric";
        $tester->altura = "Ingresar valor de pruebas para el campo altura de tipo numeric";
        $tester->longitud = "Ingresar valor de pruebas para el campo longitud de tipo numeric";
        $tester->latitud = "Ingresar valor de pruebas para el campo latitud de tipo numeric";
        $tester->id_tcoordenada = "Ingresar valor de pruebas para el campo id_tcoordenada de tipo int4";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdCoordenada  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdCoordenada::findOne(                                                               
        [
           'id_coordenada' => "Ingresar valor de pruebas para el campo id_coordenada de tipo int4",
           'x' => "Ingresar valor de pruebas para el campo x de tipo numeric",
           'y' => "Ingresar valor de pruebas para el campo y de tipo numeric",
           'altura' => "Ingresar valor de pruebas para el campo altura de tipo numeric",
           'longitud' => "Ingresar valor de pruebas para el campo longitud de tipo numeric",
           'latitud' => "Ingresar valor de pruebas para el campo latitud de tipo numeric",
           'id_tcoordenada' => "Ingresar valor de pruebas para el campo id_tcoordenada de tipo int4",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdCoordenada No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdCoordenada Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdCoordenada::findOne(                                                               
        [
           'id_coordenada' => "Ingresar valor de pruebas para el campo id_coordenada de tipo int4",
           'x' => "Ingresar valor de pruebas para el campo x de tipo numeric",
           'y' => "Ingresar valor de pruebas para el campo y de tipo numeric",
           'altura' => "Ingresar valor de pruebas para el campo altura de tipo numeric",
           'longitud' => "Ingresar valor de pruebas para el campo longitud de tipo numeric",
           'latitud' => "Ingresar valor de pruebas para el campo latitud de tipo numeric",
           'id_tcoordenada' => "Ingresar valor de pruebas para el campo id_tcoordenada de tipo int4",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdCoordenada::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdCoordenada();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdCoordenada();
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
         expect($tester->id_coordenada)->equals('Ingresar valor de pruebas para el campo id_coordenada de tipo int4');
         expect($tester->x)->equals('Ingresar valor de pruebas para el campo x de tipo numeric');
         expect($tester->y)->equals('Ingresar valor de pruebas para el campo y de tipo numeric');
         expect($tester->altura)->equals('Ingresar valor de pruebas para el campo altura de tipo numeric');
         expect($tester->longitud)->equals('Ingresar valor de pruebas para el campo longitud de tipo numeric');
         expect($tester->latitud)->equals('Ingresar valor de pruebas para el campo latitud de tipo numeric');
         expect($tester->id_tcoordenada)->equals('Ingresar valor de pruebas para el campo id_tcoordenada de tipo int4');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
      }

}
