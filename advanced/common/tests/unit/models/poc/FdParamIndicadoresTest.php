<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdParamIndicadores;
/**
 * Este es el unit test para la clase "fd_param_indicadores".
 *
 * @property int4 $id_indicador
 * @property varchar $tipo_indicador
 * @property int4 $item
 * @property varchar $indicador
 * @property varchar $variable_a
 * @property varchar $variable_b
 * @property varchar $formula
 * @property varchar $detalle
 * @property varchar $consideracion
 */
class FdParamIndicadoresTest extends \Codeception\Test\Unit
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
        $tester = new FdParamIndicadores();
        $tester->id_indicador = "Ingresar valor de pruebas para el campo id_indicador de tipo int4";
        $tester->tipo_indicador = "Ingresar valor de pruebas para el campo tipo_indicador de tipo varchar";
        $tester->item = "Ingresar valor de pruebas para el campo item de tipo int4";
        $tester->indicador = "Ingresar valor de pruebas para el campo indicador de tipo varchar";
        $tester->variable_a = "Ingresar valor de pruebas para el campo variable_a de tipo varchar";
        $tester->variable_b = "Ingresar valor de pruebas para el campo variable_b de tipo varchar";
        $tester->formula = "Ingresar valor de pruebas para el campo formula de tipo varchar";
        $tester->detalle = "Ingresar valor de pruebas para el campo detalle de tipo varchar";
        $tester->consideracion = "Ingresar valor de pruebas para el campo consideracion de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdParamIndicadores;
        $tester->id_indicador = "Ingresar valor de pruebas para el campo id_indicador de tipo int4";
        $tester->tipo_indicador = "Ingresar valor de pruebas para el campo tipo_indicador de tipo varchar";
        $tester->item = "Ingresar valor de pruebas para el campo item de tipo int4";
        $tester->indicador = "Ingresar valor de pruebas para el campo indicador de tipo varchar";
        $tester->variable_a = "Ingresar valor de pruebas para el campo variable_a de tipo varchar";
        $tester->variable_b = "Ingresar valor de pruebas para el campo variable_b de tipo varchar";
        $tester->formula = "Ingresar valor de pruebas para el campo formula de tipo varchar";
        $tester->detalle = "Ingresar valor de pruebas para el campo detalle de tipo varchar";
        $tester->consideracion = "Ingresar valor de pruebas para el campo consideracion de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdParamIndicadores  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdParamIndicadores::findOne(                                                               
        [
           'id_indicador' => "Ingresar valor de pruebas para el campo id_indicador de tipo int4",
           'tipo_indicador' => "Ingresar valor de pruebas para el campo tipo_indicador de tipo varchar",
           'item' => "Ingresar valor de pruebas para el campo item de tipo int4",
           'indicador' => "Ingresar valor de pruebas para el campo indicador de tipo varchar",
           'variable_a' => "Ingresar valor de pruebas para el campo variable_a de tipo varchar",
           'variable_b' => "Ingresar valor de pruebas para el campo variable_b de tipo varchar",
           'formula' => "Ingresar valor de pruebas para el campo formula de tipo varchar",
           'detalle' => "Ingresar valor de pruebas para el campo detalle de tipo varchar",
           'consideracion' => "Ingresar valor de pruebas para el campo consideracion de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdParamIndicadores No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdParamIndicadores Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdParamIndicadores::findOne(                                                               
        [
           'id_indicador' => "Ingresar valor de pruebas para el campo id_indicador de tipo int4",
           'tipo_indicador' => "Ingresar valor de pruebas para el campo tipo_indicador de tipo varchar",
           'item' => "Ingresar valor de pruebas para el campo item de tipo int4",
           'indicador' => "Ingresar valor de pruebas para el campo indicador de tipo varchar",
           'variable_a' => "Ingresar valor de pruebas para el campo variable_a de tipo varchar",
           'variable_b' => "Ingresar valor de pruebas para el campo variable_b de tipo varchar",
           'formula' => "Ingresar valor de pruebas para el campo formula de tipo varchar",
           'detalle' => "Ingresar valor de pruebas para el campo detalle de tipo varchar",
           'consideracion' => "Ingresar valor de pruebas para el campo consideracion de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdParamIndicadores::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdParamIndicadores();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdParamIndicadores();
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
         expect($tester->id_indicador)->equals('Ingresar valor de pruebas para el campo id_indicador de tipo int4');
         expect($tester->tipo_indicador)->equals('Ingresar valor de pruebas para el campo tipo_indicador de tipo varchar');
         expect($tester->item)->equals('Ingresar valor de pruebas para el campo item de tipo int4');
         expect($tester->indicador)->equals('Ingresar valor de pruebas para el campo indicador de tipo varchar');
         expect($tester->variable_a)->equals('Ingresar valor de pruebas para el campo variable_a de tipo varchar');
         expect($tester->variable_b)->equals('Ingresar valor de pruebas para el campo variable_b de tipo varchar');
         expect($tester->formula)->equals('Ingresar valor de pruebas para el campo formula de tipo varchar');
         expect($tester->detalle)->equals('Ingresar valor de pruebas para el campo detalle de tipo varchar');
         expect($tester->consideracion)->equals('Ingresar valor de pruebas para el campo consideracion de tipo varchar');
      }

}
