<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdResulIndicadores;
/**
 * Este es el unit test para la clase "fd_resul_indicadores".
 *
 * @property int4 $id_resul_indicadores
 * @property int4 $id_indicador
 * @property numeric $resultado
 * @property varchar $recomendacion
 * @property int4 $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdParamIndicadores $idIndicador
 */
class FdResulIndicadoresTest extends \Codeception\Test\Unit
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
        $tester = new FdResulIndicadores();
        $tester->id_resul_indicadores = "Ingresar valor de pruebas para el campo id_resul_indicadores de tipo int4";
        $tester->id_indicador = "Ingresar valor de pruebas para el campo id_indicador de tipo int4";
        $tester->resultado = "Ingresar valor de pruebas para el campo resultado de tipo numeric";
        $tester->recomendacion = "Ingresar valor de pruebas para el campo recomendacion de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdResulIndicadores;
        $tester->id_resul_indicadores = "Ingresar valor de pruebas para el campo id_resul_indicadores de tipo int4";
        $tester->id_indicador = "Ingresar valor de pruebas para el campo id_indicador de tipo int4";
        $tester->resultado = "Ingresar valor de pruebas para el campo resultado de tipo numeric";
        $tester->recomendacion = "Ingresar valor de pruebas para el campo recomendacion de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdResulIndicadores  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdResulIndicadores::findOne(                                                               
        [
           'id_resul_indicadores' => "Ingresar valor de pruebas para el campo id_resul_indicadores de tipo int4",
           'id_indicador' => "Ingresar valor de pruebas para el campo id_indicador de tipo int4",
           'resultado' => "Ingresar valor de pruebas para el campo resultado de tipo numeric",
           'recomendacion' => "Ingresar valor de pruebas para el campo recomendacion de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdResulIndicadores No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdResulIndicadores Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdResulIndicadores::findOne(                                                               
        [
           'id_resul_indicadores' => "Ingresar valor de pruebas para el campo id_resul_indicadores de tipo int4",
           'id_indicador' => "Ingresar valor de pruebas para el campo id_indicador de tipo int4",
           'resultado' => "Ingresar valor de pruebas para el campo resultado de tipo numeric",
           'recomendacion' => "Ingresar valor de pruebas para el campo recomendacion de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdResulIndicadores::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdResulIndicadores();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdResulIndicadores();
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
         expect($tester->id_resul_indicadores)->equals('Ingresar valor de pruebas para el campo id_resul_indicadores de tipo int4');
         expect($tester->id_indicador)->equals('Ingresar valor de pruebas para el campo id_indicador de tipo int4');
         expect($tester->resultado)->equals('Ingresar valor de pruebas para el campo resultado de tipo numeric');
         expect($tester->recomendacion)->equals('Ingresar valor de pruebas para el campo recomendacion de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
      }

}
