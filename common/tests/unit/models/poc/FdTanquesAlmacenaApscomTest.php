<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdTanquesAlmacenaApscom;
/**
 * Este es el unit test para la clase "fd_tanques_almacena_apscom".
 *
 * @property int4 $id_tanquesalmacena
 * @property varchar $ubicacion_tanque
 * @property numeric $capacidad_tanque
 * @property int4 $medicion_entrada
 * @property int4 $material
 * @property int4 $frecuencia_mantenimiento
 * @property int4 $estado_tanque
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
class FdTanquesAlmacenaApscomTest extends \Codeception\Test\Unit
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
        $tester = new FdTanquesAlmacenaApscom();
        $tester->id_tanquesalmacena = "Ingresar valor de pruebas para el campo id_tanquesalmacena de tipo int4";
        $tester->ubicacion_tanque = "Ingresar valor de pruebas para el campo ubicacion_tanque de tipo varchar";
        $tester->capacidad_tanque = "Ingresar valor de pruebas para el campo capacidad_tanque de tipo numeric";
        $tester->medicion_entrada = "Ingresar valor de pruebas para el campo medicion_entrada de tipo int4";
        $tester->material = "Ingresar valor de pruebas para el campo material de tipo int4";
        $tester->frecuencia_mantenimiento = "Ingresar valor de pruebas para el campo frecuencia_mantenimiento de tipo int4";
        $tester->estado_tanque = "Ingresar valor de pruebas para el campo estado_tanque de tipo int4";
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
        $tester = new FdTanquesAlmacenaApscom;
        $tester->id_tanquesalmacena = "Ingresar valor de pruebas para el campo id_tanquesalmacena de tipo int4";
        $tester->ubicacion_tanque = "Ingresar valor de pruebas para el campo ubicacion_tanque de tipo varchar";
        $tester->capacidad_tanque = "Ingresar valor de pruebas para el campo capacidad_tanque de tipo numeric";
        $tester->medicion_entrada = "Ingresar valor de pruebas para el campo medicion_entrada de tipo int4";
        $tester->material = "Ingresar valor de pruebas para el campo material de tipo int4";
        $tester->frecuencia_mantenimiento = "Ingresar valor de pruebas para el campo frecuencia_mantenimiento de tipo int4";
        $tester->estado_tanque = "Ingresar valor de pruebas para el campo estado_tanque de tipo int4";
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
            'FdTanquesAlmacenaApscom  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdTanquesAlmacenaApscom::findOne(                                                               
        [
           'id_tanquesalmacena' => "Ingresar valor de pruebas para el campo id_tanquesalmacena de tipo int4",
           'ubicacion_tanque' => "Ingresar valor de pruebas para el campo ubicacion_tanque de tipo varchar",
           'capacidad_tanque' => "Ingresar valor de pruebas para el campo capacidad_tanque de tipo numeric",
           'medicion_entrada' => "Ingresar valor de pruebas para el campo medicion_entrada de tipo int4",
           'material' => "Ingresar valor de pruebas para el campo material de tipo int4",
           'frecuencia_mantenimiento' => "Ingresar valor de pruebas para el campo frecuencia_mantenimiento de tipo int4",
           'estado_tanque' => "Ingresar valor de pruebas para el campo estado_tanque de tipo int4",
           'problemas' => "Ingresar valor de pruebas para el campo problemas de tipo int4",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdTanquesAlmacenaApscom No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdTanquesAlmacenaApscom Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdTanquesAlmacenaApscom::findOne(                                                               
        [
           'id_tanquesalmacena' => "Ingresar valor de pruebas para el campo id_tanquesalmacena de tipo int4",
           'ubicacion_tanque' => "Ingresar valor de pruebas para el campo ubicacion_tanque de tipo varchar",
           'capacidad_tanque' => "Ingresar valor de pruebas para el campo capacidad_tanque de tipo numeric",
           'medicion_entrada' => "Ingresar valor de pruebas para el campo medicion_entrada de tipo int4",
           'material' => "Ingresar valor de pruebas para el campo material de tipo int4",
           'frecuencia_mantenimiento' => "Ingresar valor de pruebas para el campo frecuencia_mantenimiento de tipo int4",
           'estado_tanque' => "Ingresar valor de pruebas para el campo estado_tanque de tipo int4",
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
        $table= FdTanquesAlmacenaApscom::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdTanquesAlmacenaApscom();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdTanquesAlmacenaApscom();
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
         expect($tester->id_tanquesalmacena)->equals('Ingresar valor de pruebas para el campo id_tanquesalmacena de tipo int4');
         expect($tester->ubicacion_tanque)->equals('Ingresar valor de pruebas para el campo ubicacion_tanque de tipo varchar');
         expect($tester->capacidad_tanque)->equals('Ingresar valor de pruebas para el campo capacidad_tanque de tipo numeric');
         expect($tester->medicion_entrada)->equals('Ingresar valor de pruebas para el campo medicion_entrada de tipo int4');
         expect($tester->material)->equals('Ingresar valor de pruebas para el campo material de tipo int4');
         expect($tester->frecuencia_mantenimiento)->equals('Ingresar valor de pruebas para el campo frecuencia_mantenimiento de tipo int4');
         expect($tester->estado_tanque)->equals('Ingresar valor de pruebas para el campo estado_tanque de tipo int4');
         expect($tester->problemas)->equals('Ingresar valor de pruebas para el campo problemas de tipo int4');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_junta)->equals('Ingresar valor de pruebas para el campo id_junta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
      }

}
