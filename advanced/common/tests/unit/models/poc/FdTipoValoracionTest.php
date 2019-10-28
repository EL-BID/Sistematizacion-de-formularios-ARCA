<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdTipoValoracion;
/**
 * Este es el unit test para la clase "fd_tipo_valoracion".
 *
 * @property int4 $id_tipo_valoracion
 * @property varchar $descripcion_valoracion
 *
 * @property FdParamEvaluaciones[] $fdParamEvaluaciones
 * @property FdPonderacionRespuesta[] $fdPonderacionRespuestas
 */
class FdTipoValoracionTest extends \Codeception\Test\Unit
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
        $tester = new FdTipoValoracion();
        $tester->id_tipo_valoracion = "Ingresar valor de pruebas para el campo id_tipo_valoracion de tipo int4";
        $tester->descripcion_valoracion = "Ingresar valor de pruebas para el campo descripcion_valoracion de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdTipoValoracion;
        $tester->id_tipo_valoracion = "Ingresar valor de pruebas para el campo id_tipo_valoracion de tipo int4";
        $tester->descripcion_valoracion = "Ingresar valor de pruebas para el campo descripcion_valoracion de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdTipoValoracion  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdTipoValoracion::findOne(                                                               
        [
           'id_tipo_valoracion' => "Ingresar valor de pruebas para el campo id_tipo_valoracion de tipo int4",
           'descripcion_valoracion' => "Ingresar valor de pruebas para el campo descripcion_valoracion de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdTipoValoracion No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdTipoValoracion Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdTipoValoracion::findOne(                                                               
        [
           'id_tipo_valoracion' => "Ingresar valor de pruebas para el campo id_tipo_valoracion de tipo int4",
           'descripcion_valoracion' => "Ingresar valor de pruebas para el campo descripcion_valoracion de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdTipoValoracion::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdTipoValoracion();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdTipoValoracion();
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
         expect($tester->id_tipo_valoracion)->equals('Ingresar valor de pruebas para el campo id_tipo_valoracion de tipo int4');
         expect($tester->descripcion_valoracion)->equals('Ingresar valor de pruebas para el campo descripcion_valoracion de tipo varchar');
      }

}
