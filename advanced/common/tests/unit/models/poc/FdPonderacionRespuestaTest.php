<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdPonderacionRespuesta;
/**
 * Este es el unit test para la clase "fd_ponderacion_respuesta".
 *
 * @property int4 $id_ponderacion_resp
 * @property int4 $id_tpondera
 * @property varchar $descripcion_ponderacion
 * @property numeric $valor
 *
 * @property FdTipoValoracion $idTpondera
 */
class FdPonderacionRespuestaTest extends \Codeception\Test\Unit
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
        $tester = new FdPonderacionRespuesta();
        $tester->id_ponderacion_resp = "Ingresar valor de pruebas para el campo id_ponderacion_resp de tipo int4";
        $tester->id_tpondera = "Ingresar valor de pruebas para el campo id_tpondera de tipo int4";
        $tester->descripcion_ponderacion = "Ingresar valor de pruebas para el campo descripcion_ponderacion de tipo varchar";
        $tester->valor = "Ingresar valor de pruebas para el campo valor de tipo numeric";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdPonderacionRespuesta;
        $tester->id_ponderacion_resp = "Ingresar valor de pruebas para el campo id_ponderacion_resp de tipo int4";
        $tester->id_tpondera = "Ingresar valor de pruebas para el campo id_tpondera de tipo int4";
        $tester->descripcion_ponderacion = "Ingresar valor de pruebas para el campo descripcion_ponderacion de tipo varchar";
        $tester->valor = "Ingresar valor de pruebas para el campo valor de tipo numeric";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdPonderacionRespuesta  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdPonderacionRespuesta::findOne(                                                               
        [
           'id_ponderacion_resp' => "Ingresar valor de pruebas para el campo id_ponderacion_resp de tipo int4",
           'id_tpondera' => "Ingresar valor de pruebas para el campo id_tpondera de tipo int4",
           'descripcion_ponderacion' => "Ingresar valor de pruebas para el campo descripcion_ponderacion de tipo varchar",
           'valor' => "Ingresar valor de pruebas para el campo valor de tipo numeric",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdPonderacionRespuesta No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdPonderacionRespuesta Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdPonderacionRespuesta::findOne(                                                               
        [
           'id_ponderacion_resp' => "Ingresar valor de pruebas para el campo id_ponderacion_resp de tipo int4",
           'id_tpondera' => "Ingresar valor de pruebas para el campo id_tpondera de tipo int4",
           'descripcion_ponderacion' => "Ingresar valor de pruebas para el campo descripcion_ponderacion de tipo varchar",
           'valor' => "Ingresar valor de pruebas para el campo valor de tipo numeric",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdPonderacionRespuesta::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdPonderacionRespuesta();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdPonderacionRespuesta();
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
         expect($tester->id_ponderacion_resp)->equals('Ingresar valor de pruebas para el campo id_ponderacion_resp de tipo int4');
         expect($tester->id_tpondera)->equals('Ingresar valor de pruebas para el campo id_tpondera de tipo int4');
         expect($tester->descripcion_ponderacion)->equals('Ingresar valor de pruebas para el campo descripcion_ponderacion de tipo varchar');
         expect($tester->valor)->equals('Ingresar valor de pruebas para el campo valor de tipo numeric');
      }

}
