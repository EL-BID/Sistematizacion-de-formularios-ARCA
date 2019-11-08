<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdOperacionplantaApscom;
/**
 * Este es el unit test para la clase "fd_operacion_planta_apscom".
 *
 * @property int4 $id_operacionplanta
 * @property int4 $manual_operacion
 * @property int4 $operacion_planta
 * @property int4 $personal_capacitado
 * @property int4 $frecuencia_mantenimiento
 * @property int4 $problemas
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_junta
 * @property int4 $id_pregunta
 * @property int4 $id_respuesta
 * @property int4 $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property JuntasGad $idJunta
 */
class FdOperacionplantaApscomTest extends \Codeception\Test\Unit
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
        $tester = new FdOperacionplantaApscom();
        $tester->id_operacionplanta = "Ingresar valor de pruebas para el campo id_operacionplanta de tipo int4";
        $tester->manual_operacion = "Ingresar valor de pruebas para el campo manual_operacion de tipo int4";
        $tester->operacion_planta = "Ingresar valor de pruebas para el campo operacion_planta de tipo int4";
        $tester->personal_capacitado = "Ingresar valor de pruebas para el campo personal_capacitado de tipo int4";
        $tester->frecuencia_mantenimiento = "Ingresar valor de pruebas para el campo frecuencia_mantenimiento de tipo int4";
        $tester->problemas = "Ingresar valor de pruebas para el campo problemas de tipo int4";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_junta = "Ingresar valor de pruebas para el campo id_junta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdOperacionplantaApscom;
        $tester->id_operacionplanta = "Ingresar valor de pruebas para el campo id_operacionplanta de tipo int4";
        $tester->manual_operacion = "Ingresar valor de pruebas para el campo manual_operacion de tipo int4";
        $tester->operacion_planta = "Ingresar valor de pruebas para el campo operacion_planta de tipo int4";
        $tester->personal_capacitado = "Ingresar valor de pruebas para el campo personal_capacitado de tipo int4";
        $tester->frecuencia_mantenimiento = "Ingresar valor de pruebas para el campo frecuencia_mantenimiento de tipo int4";
        $tester->problemas = "Ingresar valor de pruebas para el campo problemas de tipo int4";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_junta = "Ingresar valor de pruebas para el campo id_junta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdOperacionplantaApscom  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdOperacionplantaApscom::findOne(                                                               
        [
           'id_operacionplanta' => "Ingresar valor de pruebas para el campo id_operacionplanta de tipo int4",
           'manual_operacion' => "Ingresar valor de pruebas para el campo manual_operacion de tipo int4",
           'operacion_planta' => "Ingresar valor de pruebas para el campo operacion_planta de tipo int4",
           'personal_capacitado' => "Ingresar valor de pruebas para el campo personal_capacitado de tipo int4",
           'frecuencia_mantenimiento' => "Ingresar valor de pruebas para el campo frecuencia_mantenimiento de tipo int4",
           'problemas' => "Ingresar valor de pruebas para el campo problemas de tipo int4",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdOperacionplantaApscom No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdOperacionplantaApscom Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdOperacionplantaApscom::findOne(                                                               
        [
           'id_operacionplanta' => "Ingresar valor de pruebas para el campo id_operacionplanta de tipo int4",
           'manual_operacion' => "Ingresar valor de pruebas para el campo manual_operacion de tipo int4",
           'operacion_planta' => "Ingresar valor de pruebas para el campo operacion_planta de tipo int4",
           'personal_capacitado' => "Ingresar valor de pruebas para el campo personal_capacitado de tipo int4",
           'frecuencia_mantenimiento' => "Ingresar valor de pruebas para el campo frecuencia_mantenimiento de tipo int4",
           'problemas' => "Ingresar valor de pruebas para el campo problemas de tipo int4",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdOperacionplantaApscom::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdOperacionplantaApscom();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdOperacionplantaApscom();
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
         expect($tester->id_operacionplanta)->equals('Ingresar valor de pruebas para el campo id_operacionplanta de tipo int4');
         expect($tester->manual_operacion)->equals('Ingresar valor de pruebas para el campo manual_operacion de tipo int4');
         expect($tester->operacion_planta)->equals('Ingresar valor de pruebas para el campo operacion_planta de tipo int4');
         expect($tester->personal_capacitado)->equals('Ingresar valor de pruebas para el campo personal_capacitado de tipo int4');
         expect($tester->frecuencia_mantenimiento)->equals('Ingresar valor de pruebas para el campo frecuencia_mantenimiento de tipo int4');
         expect($tester->problemas)->equals('Ingresar valor de pruebas para el campo problemas de tipo int4');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_junta)->equals('Ingresar valor de pruebas para el campo id_junta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
      }

}
