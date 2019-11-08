<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdClasificacionPregunta;
/**
 * Este es el unit test para la clase "fd_clasificacion_pregunta".
 *
 * @property varchar $valor
 * @property int4 $id_clasificacion
 * @property int4 $id_pregunta
 *
 * @property FdClasificacion $idClasificacion
 * @property FdPregunta $idPregunta
 */
class FdClasificacionPreguntaTest extends \Codeception\Test\Unit
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
        $tester = new FdClasificacionPregunta();
        $tester->valor = "Ingresar valor de pruebas para el campo valor de tipo varchar";
        $tester->id_clasificacion = "Ingresar valor de pruebas para el campo id_clasificacion de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdClasificacionPregunta;
        $tester->valor = "Ingresar valor de pruebas para el campo valor de tipo varchar";
        $tester->id_clasificacion = "Ingresar valor de pruebas para el campo id_clasificacion de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdClasificacionPregunta  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdClasificacionPregunta::findOne(                                                               
        [
           'valor' => "Ingresar valor de pruebas para el campo valor de tipo varchar",
           'id_clasificacion' => "Ingresar valor de pruebas para el campo id_clasificacion de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdClasificacionPregunta No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdClasificacionPregunta Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdClasificacionPregunta::findOne(                                                               
        [
           'valor' => "Ingresar valor de pruebas para el campo valor de tipo varchar",
           'id_clasificacion' => "Ingresar valor de pruebas para el campo id_clasificacion de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdClasificacionPregunta::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdClasificacionPregunta();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdClasificacionPregunta();
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
         expect($tester->valor)->equals('Ingresar valor de pruebas para el campo valor de tipo varchar');
         expect($tester->id_clasificacion)->equals('Ingresar valor de pruebas para el campo id_clasificacion de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
      }

}
