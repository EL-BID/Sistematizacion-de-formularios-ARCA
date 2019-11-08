<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdDatosSaneamientoAmbiental;
/**
 * Este es el unit test para la clase "fd_datos_saneamiento_ambiental".
 *
 * @property int4 $id_datos_saneamiento_ambiental
 * @property varchar $comunidad
 * @property int4 $viviendas_existentes
 * @property int4 $viviendas_conexiones
 * @property int4 $viviendas_conex_fsept_letrinas
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_pregunta
 * @property int4 $id_respuesta
 * @property int4 $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdDatosSaneamientoAmbientalTest extends \Codeception\Test\Unit
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
        $tester = new FdDatosSaneamientoAmbiental();
        $tester->id_datos_saneamiento_ambiental = "Ingresar valor de pruebas para el campo id_datos_saneamiento_ambiental de tipo int4";
        $tester->comunidad = "Ingresar valor de pruebas para el campo comunidad de tipo varchar";
        $tester->viviendas_existentes = "Ingresar valor de pruebas para el campo viviendas_existentes de tipo int4";
        $tester->viviendas_conexiones = "Ingresar valor de pruebas para el campo viviendas_conexiones de tipo int4";
        $tester->viviendas_conex_fsept_letrinas = "Ingresar valor de pruebas para el campo viviendas_conex_fsept_letrinas de tipo int4";
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
        $tester = new FdDatosSaneamientoAmbiental;
        $tester->id_datos_saneamiento_ambiental = "Ingresar valor de pruebas para el campo id_datos_saneamiento_ambiental de tipo int4";
        $tester->comunidad = "Ingresar valor de pruebas para el campo comunidad de tipo varchar";
        $tester->viviendas_existentes = "Ingresar valor de pruebas para el campo viviendas_existentes de tipo int4";
        $tester->viviendas_conexiones = "Ingresar valor de pruebas para el campo viviendas_conexiones de tipo int4";
        $tester->viviendas_conex_fsept_letrinas = "Ingresar valor de pruebas para el campo viviendas_conex_fsept_letrinas de tipo int4";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdDatosSaneamientoAmbiental  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdDatosSaneamientoAmbiental::findOne(                                                               
        [
           'id_datos_saneamiento_ambiental' => "Ingresar valor de pruebas para el campo id_datos_saneamiento_ambiental de tipo int4",
           'comunidad' => "Ingresar valor de pruebas para el campo comunidad de tipo varchar",
           'viviendas_existentes' => "Ingresar valor de pruebas para el campo viviendas_existentes de tipo int4",
           'viviendas_conexiones' => "Ingresar valor de pruebas para el campo viviendas_conexiones de tipo int4",
           'viviendas_conex_fsept_letrinas' => "Ingresar valor de pruebas para el campo viviendas_conex_fsept_letrinas de tipo int4",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdDatosSaneamientoAmbiental No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdDatosSaneamientoAmbiental Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdDatosSaneamientoAmbiental::findOne(                                                               
        [
           'id_datos_saneamiento_ambiental' => "Ingresar valor de pruebas para el campo id_datos_saneamiento_ambiental de tipo int4",
           'comunidad' => "Ingresar valor de pruebas para el campo comunidad de tipo varchar",
           'viviendas_existentes' => "Ingresar valor de pruebas para el campo viviendas_existentes de tipo int4",
           'viviendas_conexiones' => "Ingresar valor de pruebas para el campo viviendas_conexiones de tipo int4",
           'viviendas_conex_fsept_letrinas' => "Ingresar valor de pruebas para el campo viviendas_conex_fsept_letrinas de tipo int4",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdDatosSaneamientoAmbiental::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdDatosSaneamientoAmbiental();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdDatosSaneamientoAmbiental();
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
         expect($tester->id_datos_saneamiento_ambiental)->equals('Ingresar valor de pruebas para el campo id_datos_saneamiento_ambiental de tipo int4');
         expect($tester->comunidad)->equals('Ingresar valor de pruebas para el campo comunidad de tipo varchar');
         expect($tester->viviendas_existentes)->equals('Ingresar valor de pruebas para el campo viviendas_existentes de tipo int4');
         expect($tester->viviendas_conexiones)->equals('Ingresar valor de pruebas para el campo viviendas_conexiones de tipo int4');
         expect($tester->viviendas_conex_fsept_letrinas)->equals('Ingresar valor de pruebas para el campo viviendas_conex_fsept_letrinas de tipo int4');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
      }

}
