<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdPotabilizPlantatraApscom;
/**
 * Este es el unit test para la clase "fd_potabiliz_plantatra_apscom".
 *
 * @property int4 $id_potab_plantatr_apscom
 * @property varchar $ubicacion_lug_ptratamiento
 * @property int4 $tipo_planta_tratatmiento
 * @property varchar $especifique_tplantat
 * @property int4 $metodo_desinfeccion_planta
 * @property varchar $especifique_metdesinfeccionp
 * @property int4 $midicion_agua_tratplanta
 * @property int4 $estado_planta
 * @property int4 $problemas_identificados
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
class FdPotabilizPlantatraApscomTest extends \Codeception\Test\Unit
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
        $tester = new FdPotabilizPlantatraApscom();
        $tester->id_potab_plantatr_apscom = "Ingresar valor de pruebas para el campo id_potab_plantatr_apscom de tipo int4";
        $tester->ubicacion_lug_ptratamiento = "Ingresar valor de pruebas para el campo ubicacion_lug_ptratamiento de tipo varchar";
        $tester->tipo_planta_tratatmiento = "Ingresar valor de pruebas para el campo tipo_planta_tratatmiento de tipo int4";
        $tester->especifique_tplantat = "Ingresar valor de pruebas para el campo especifique_tplantat de tipo varchar";
        $tester->metodo_desinfeccion_planta = "Ingresar valor de pruebas para el campo metodo_desinfeccion_planta de tipo int4";
        $tester->especifique_metdesinfeccionp = "Ingresar valor de pruebas para el campo especifique_metdesinfeccionp de tipo varchar";
        $tester->midicion_agua_tratplanta = "Ingresar valor de pruebas para el campo midicion_agua_tratplanta de tipo int4";
        $tester->estado_planta = "Ingresar valor de pruebas para el campo estado_planta de tipo int4";
        $tester->problemas_identificados = "Ingresar valor de pruebas para el campo problemas_identificados de tipo int4";
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
        $tester = new FdPotabilizPlantatraApscom;
        $tester->id_potab_plantatr_apscom = "Ingresar valor de pruebas para el campo id_potab_plantatr_apscom de tipo int4";
        $tester->ubicacion_lug_ptratamiento = "Ingresar valor de pruebas para el campo ubicacion_lug_ptratamiento de tipo varchar";
        $tester->tipo_planta_tratatmiento = "Ingresar valor de pruebas para el campo tipo_planta_tratatmiento de tipo int4";
        $tester->especifique_tplantat = "Ingresar valor de pruebas para el campo especifique_tplantat de tipo varchar";
        $tester->metodo_desinfeccion_planta = "Ingresar valor de pruebas para el campo metodo_desinfeccion_planta de tipo int4";
        $tester->especifique_metdesinfeccionp = "Ingresar valor de pruebas para el campo especifique_metdesinfeccionp de tipo varchar";
        $tester->midicion_agua_tratplanta = "Ingresar valor de pruebas para el campo midicion_agua_tratplanta de tipo int4";
        $tester->estado_planta = "Ingresar valor de pruebas para el campo estado_planta de tipo int4";
        $tester->problemas_identificados = "Ingresar valor de pruebas para el campo problemas_identificados de tipo int4";
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
            'FdPotabilizPlantatraApscom  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdPotabilizPlantatraApscom::findOne(                                                               
        [
           'id_potab_plantatr_apscom' => "Ingresar valor de pruebas para el campo id_potab_plantatr_apscom de tipo int4",
           'ubicacion_lug_ptratamiento' => "Ingresar valor de pruebas para el campo ubicacion_lug_ptratamiento de tipo varchar",
           'tipo_planta_tratatmiento' => "Ingresar valor de pruebas para el campo tipo_planta_tratatmiento de tipo int4",
           'especifique_tplantat' => "Ingresar valor de pruebas para el campo especifique_tplantat de tipo varchar",
           'metodo_desinfeccion_planta' => "Ingresar valor de pruebas para el campo metodo_desinfeccion_planta de tipo int4",
           'especifique_metdesinfeccionp' => "Ingresar valor de pruebas para el campo especifique_metdesinfeccionp de tipo varchar",
           'midicion_agua_tratplanta' => "Ingresar valor de pruebas para el campo midicion_agua_tratplanta de tipo int4",
           'estado_planta' => "Ingresar valor de pruebas para el campo estado_planta de tipo int4",
           'problemas_identificados' => "Ingresar valor de pruebas para el campo problemas_identificados de tipo int4",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
           'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdPotabilizPlantatraApscom No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdPotabilizPlantatraApscom Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdPotabilizPlantatraApscom::findOne(                                                               
        [
           'id_potab_plantatr_apscom' => "Ingresar valor de pruebas para el campo id_potab_plantatr_apscom de tipo int4",
           'ubicacion_lug_ptratamiento' => "Ingresar valor de pruebas para el campo ubicacion_lug_ptratamiento de tipo varchar",
           'tipo_planta_tratatmiento' => "Ingresar valor de pruebas para el campo tipo_planta_tratatmiento de tipo int4",
           'especifique_tplantat' => "Ingresar valor de pruebas para el campo especifique_tplantat de tipo varchar",
           'metodo_desinfeccion_planta' => "Ingresar valor de pruebas para el campo metodo_desinfeccion_planta de tipo int4",
           'especifique_metdesinfeccionp' => "Ingresar valor de pruebas para el campo especifique_metdesinfeccionp de tipo varchar",
           'midicion_agua_tratplanta' => "Ingresar valor de pruebas para el campo midicion_agua_tratplanta de tipo int4",
           'estado_planta' => "Ingresar valor de pruebas para el campo estado_planta de tipo int4",
           'problemas_identificados' => "Ingresar valor de pruebas para el campo problemas_identificados de tipo int4",
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
        $table= FdPotabilizPlantatraApscom::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdPotabilizPlantatraApscom();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdPotabilizPlantatraApscom();
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
         expect($tester->id_potab_plantatr_apscom)->equals('Ingresar valor de pruebas para el campo id_potab_plantatr_apscom de tipo int4');
         expect($tester->ubicacion_lug_ptratamiento)->equals('Ingresar valor de pruebas para el campo ubicacion_lug_ptratamiento de tipo varchar');
         expect($tester->tipo_planta_tratatmiento)->equals('Ingresar valor de pruebas para el campo tipo_planta_tratatmiento de tipo int4');
         expect($tester->especifique_tplantat)->equals('Ingresar valor de pruebas para el campo especifique_tplantat de tipo varchar');
         expect($tester->metodo_desinfeccion_planta)->equals('Ingresar valor de pruebas para el campo metodo_desinfeccion_planta de tipo int4');
         expect($tester->especifique_metdesinfeccionp)->equals('Ingresar valor de pruebas para el campo especifique_metdesinfeccionp de tipo varchar');
         expect($tester->midicion_agua_tratplanta)->equals('Ingresar valor de pruebas para el campo midicion_agua_tratplanta de tipo int4');
         expect($tester->estado_planta)->equals('Ingresar valor de pruebas para el campo estado_planta de tipo int4');
         expect($tester->problemas_identificados)->equals('Ingresar valor de pruebas para el campo problemas_identificados de tipo int4');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
         expect($tester->id_junta)->equals('Ingresar valor de pruebas para el campo id_junta de tipo int4');
      }

}
