<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdResulEvaluaciones;
/**
 * Este es el unit test para la clase "fd_resul_evaluaciones".
 *
 * @property int4 $id_resul_evaluaciones
 * @property int4 $id_evaluacion
 * @property numeric $puntaje
 * @property int4 $id_conjunto_respuesta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdParamEvaluaciones $idEvaluacion
 */
class FdResulEvaluacionesTest extends \Codeception\Test\Unit
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
        $tester = new FdResulEvaluaciones();
        $tester->id_resul_evaluaciones = "Ingresar valor de pruebas para el campo id_resul_evaluaciones de tipo int4";
        $tester->id_evaluacion = "Ingresar valor de pruebas para el campo id_evaluacion de tipo int4";
        $tester->puntaje = "Ingresar valor de pruebas para el campo puntaje de tipo numeric";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdResulEvaluaciones;
        $tester->id_resul_evaluaciones = "Ingresar valor de pruebas para el campo id_resul_evaluaciones de tipo int4";
        $tester->id_evaluacion = "Ingresar valor de pruebas para el campo id_evaluacion de tipo int4";
        $tester->puntaje = "Ingresar valor de pruebas para el campo puntaje de tipo numeric";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdResulEvaluaciones  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdResulEvaluaciones::findOne(                                                               
        [
           'id_resul_evaluaciones' => "Ingresar valor de pruebas para el campo id_resul_evaluaciones de tipo int4",
           'id_evaluacion' => "Ingresar valor de pruebas para el campo id_evaluacion de tipo int4",
           'puntaje' => "Ingresar valor de pruebas para el campo puntaje de tipo numeric",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdResulEvaluaciones No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdResulEvaluaciones Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdResulEvaluaciones::findOne(                                                               
        [
           'id_resul_evaluaciones' => "Ingresar valor de pruebas para el campo id_resul_evaluaciones de tipo int4",
           'id_evaluacion' => "Ingresar valor de pruebas para el campo id_evaluacion de tipo int4",
           'puntaje' => "Ingresar valor de pruebas para el campo puntaje de tipo numeric",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdResulEvaluaciones::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdResulEvaluaciones();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdResulEvaluaciones();
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
         expect($tester->id_resul_evaluaciones)->equals('Ingresar valor de pruebas para el campo id_resul_evaluaciones de tipo int4');
         expect($tester->id_evaluacion)->equals('Ingresar valor de pruebas para el campo id_evaluacion de tipo int4');
         expect($tester->puntaje)->equals('Ingresar valor de pruebas para el campo puntaje de tipo numeric');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
      }

}
