<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdTrataguaDesinfeccionApscom;
/**
 * Este es el unit test para la clase "fd_tratagua_desinfeccion_apscom".
 *
 * @property int4 $id_trat_aguadesinf_apscom
 * @property varchar $ubicacion_lug_tratamiento
 * @property int4 $realiza_desinfeccion
 * @property int4 $metodo_desinfeccion
 * @property varchar $especifique_otro_metdesinf
 * @property int4 $mide_salida_desinfeccion
 * @property int4 $estado_func_sistema
 * @property int4 $problemas_identificados
 * @property varchar $especifique_otros_problemas
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_pregunta
 * @property int4 $id_respuesta
 * @property int4 $id_capitulo
 * @property int4 $id_junta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 * @property JuntasGad $idJunta
 */
class FdTrataguaDesinfeccionApscomTest extends \Codeception\Test\Unit
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
        $tester = new FdTrataguaDesinfeccionApscom();
        $tester->id_trat_aguadesinf_apscom = "Ingresar valor de pruebas para el campo id_trat_aguadesinf_apscom de tipo int4";
        $tester->ubicacion_lug_tratamiento = "Ingresar valor de pruebas para el campo ubicacion_lug_tratamiento de tipo varchar";
        $tester->realiza_desinfeccion = "Ingresar valor de pruebas para el campo realiza_desinfeccion de tipo int4";
        $tester->metodo_desinfeccion = "Ingresar valor de pruebas para el campo metodo_desinfeccion de tipo int4";
        $tester->especifique_otro_metdesinf = "Ingresar valor de pruebas para el campo especifique_otro_metdesinf de tipo varchar";
        $tester->mide_salida_desinfeccion = "Ingresar valor de pruebas para el campo mide_salida_desinfeccion de tipo int4";
        $tester->estado_func_sistema = "Ingresar valor de pruebas para el campo estado_func_sistema de tipo int4";
        $tester->problemas_identificados = "Ingresar valor de pruebas para el campo problemas_identificados de tipo int4";
        $tester->especifique_otros_problemas = "Ingresar valor de pruebas para el campo especifique_otros_problemas de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
        $tester->id_junta = "Ingresar valor de pruebas para el campo id_junta de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdTrataguaDesinfeccionApscom;
        $tester->id_trat_aguadesinf_apscom = "Ingresar valor de pruebas para el campo id_trat_aguadesinf_apscom de tipo int4";
        $tester->ubicacion_lug_tratamiento = "Ingresar valor de pruebas para el campo ubicacion_lug_tratamiento de tipo varchar";
        $tester->realiza_desinfeccion = "Ingresar valor de pruebas para el campo realiza_desinfeccion de tipo int4";
        $tester->metodo_desinfeccion = "Ingresar valor de pruebas para el campo metodo_desinfeccion de tipo int4";
        $tester->especifique_otro_metdesinf = "Ingresar valor de pruebas para el campo especifique_otro_metdesinf de tipo varchar";
        $tester->mide_salida_desinfeccion = "Ingresar valor de pruebas para el campo mide_salida_desinfeccion de tipo int4";
        $tester->estado_func_sistema = "Ingresar valor de pruebas para el campo estado_func_sistema de tipo int4";
        $tester->problemas_identificados = "Ingresar valor de pruebas para el campo problemas_identificados de tipo int4";
        $tester->especifique_otros_problemas = "Ingresar valor de pruebas para el campo especifique_otros_problemas de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
        $tester->id_junta = "Ingresar valor de pruebas para el campo id_junta de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdTrataguaDesinfeccionApscom  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdTrataguaDesinfeccionApscom::findOne(                                                               
        [
           'id_trat_aguadesinf_apscom' => "Ingresar valor de pruebas para el campo id_trat_aguadesinf_apscom de tipo int4",
           'ubicacion_lug_tratamiento' => "Ingresar valor de pruebas para el campo ubicacion_lug_tratamiento de tipo varchar",
           'realiza_desinfeccion' => "Ingresar valor de pruebas para el campo realiza_desinfeccion de tipo int4",
           'metodo_desinfeccion' => "Ingresar valor de pruebas para el campo metodo_desinfeccion de tipo int4",
           'especifique_otro_metdesinf' => "Ingresar valor de pruebas para el campo especifique_otro_metdesinf de tipo varchar",
           'mide_salida_desinfeccion' => "Ingresar valor de pruebas para el campo mide_salida_desinfeccion de tipo int4",
           'estado_func_sistema' => "Ingresar valor de pruebas para el campo estado_func_sistema de tipo int4",
           'problemas_identificados' => "Ingresar valor de pruebas para el campo problemas_identificados de tipo int4",
           'especifique_otros_problemas' => "Ingresar valor de pruebas para el campo especifique_otros_problemas de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
           'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdTrataguaDesinfeccionApscom No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdTrataguaDesinfeccionApscom Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdTrataguaDesinfeccionApscom::findOne(                                                               
        [
           'id_trat_aguadesinf_apscom' => "Ingresar valor de pruebas para el campo id_trat_aguadesinf_apscom de tipo int4",
           'ubicacion_lug_tratamiento' => "Ingresar valor de pruebas para el campo ubicacion_lug_tratamiento de tipo varchar",
           'realiza_desinfeccion' => "Ingresar valor de pruebas para el campo realiza_desinfeccion de tipo int4",
           'metodo_desinfeccion' => "Ingresar valor de pruebas para el campo metodo_desinfeccion de tipo int4",
           'especifique_otro_metdesinf' => "Ingresar valor de pruebas para el campo especifique_otro_metdesinf de tipo varchar",
           'mide_salida_desinfeccion' => "Ingresar valor de pruebas para el campo mide_salida_desinfeccion de tipo int4",
           'estado_func_sistema' => "Ingresar valor de pruebas para el campo estado_func_sistema de tipo int4",
           'problemas_identificados' => "Ingresar valor de pruebas para el campo problemas_identificados de tipo int4",
           'especifique_otros_problemas' => "Ingresar valor de pruebas para el campo especifique_otros_problemas de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
           'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdTrataguaDesinfeccionApscom::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdTrataguaDesinfeccionApscom();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdTrataguaDesinfeccionApscom();
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
         expect($tester->id_trat_aguadesinf_apscom)->equals('Ingresar valor de pruebas para el campo id_trat_aguadesinf_apscom de tipo int4');
         expect($tester->ubicacion_lug_tratamiento)->equals('Ingresar valor de pruebas para el campo ubicacion_lug_tratamiento de tipo varchar');
         expect($tester->realiza_desinfeccion)->equals('Ingresar valor de pruebas para el campo realiza_desinfeccion de tipo int4');
         expect($tester->metodo_desinfeccion)->equals('Ingresar valor de pruebas para el campo metodo_desinfeccion de tipo int4');
         expect($tester->especifique_otro_metdesinf)->equals('Ingresar valor de pruebas para el campo especifique_otro_metdesinf de tipo varchar');
         expect($tester->mide_salida_desinfeccion)->equals('Ingresar valor de pruebas para el campo mide_salida_desinfeccion de tipo int4');
         expect($tester->estado_func_sistema)->equals('Ingresar valor de pruebas para el campo estado_func_sistema de tipo int4');
         expect($tester->problemas_identificados)->equals('Ingresar valor de pruebas para el campo problemas_identificados de tipo int4');
         expect($tester->especifique_otros_problemas)->equals('Ingresar valor de pruebas para el campo especifique_otros_problemas de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
         expect($tester->id_junta)->equals('Ingresar valor de pruebas para el campo id_junta de tipo int4');
      }

}
