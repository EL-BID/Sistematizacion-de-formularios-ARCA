<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdConduccionGravedadAp;
/**
 * Este es el unit test para la clase "fd_conduccion_gravedad_ap".
 *
 * @property int4 $id_conduccion_gravedad_ap
 * @property varchar $nombre_conduccion_g
 * @property int4 $id_forma_conduccion_g
 * @property int4 $id_material_conduccion_g
 * @property int4 $id_frec_mantenimiento_g
 * @property int4 $id_estado_conduccion_g
 * @property varchar $problemas_identificados
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_pregunta
 * @property int4 $id_respuesta
 * @property int4 $id_capitulo
 * @property int4 $id_junta
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdConduccionGravedadApTest extends \Codeception\Test\Unit
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
        $tester = new FdConduccionGravedadAp();
        $tester->id_conduccion_gravedad_ap = "Ingresar valor de pruebas para el campo id_conduccion_gravedad_ap de tipo int4";
        $tester->nombre_conduccion_g = "Ingresar valor de pruebas para el campo nombre_conduccion_g de tipo varchar";
        $tester->id_forma_conduccion_g = "Ingresar valor de pruebas para el campo id_forma_conduccion_g de tipo int4";
        $tester->id_material_conduccion_g = "Ingresar valor de pruebas para el campo id_material_conduccion_g de tipo int4";
        $tester->id_frec_mantenimiento_g = "Ingresar valor de pruebas para el campo id_frec_mantenimiento_g de tipo int4";
        $tester->id_estado_conduccion_g = "Ingresar valor de pruebas para el campo id_estado_conduccion_g de tipo int4";
        $tester->problemas_identificados = "Ingresar valor de pruebas para el campo problemas_identificados de tipo varchar";
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
        $tester = new FdConduccionGravedadAp;
        $tester->id_conduccion_gravedad_ap = "Ingresar valor de pruebas para el campo id_conduccion_gravedad_ap de tipo int4";
        $tester->nombre_conduccion_g = "Ingresar valor de pruebas para el campo nombre_conduccion_g de tipo varchar";
        $tester->id_forma_conduccion_g = "Ingresar valor de pruebas para el campo id_forma_conduccion_g de tipo int4";
        $tester->id_material_conduccion_g = "Ingresar valor de pruebas para el campo id_material_conduccion_g de tipo int4";
        $tester->id_frec_mantenimiento_g = "Ingresar valor de pruebas para el campo id_frec_mantenimiento_g de tipo int4";
        $tester->id_estado_conduccion_g = "Ingresar valor de pruebas para el campo id_estado_conduccion_g de tipo int4";
        $tester->problemas_identificados = "Ingresar valor de pruebas para el campo problemas_identificados de tipo varchar";
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
            'FdConduccionGravedadAp  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdConduccionGravedadAp::findOne(                                                               
        [
           'id_conduccion_gravedad_ap' => "Ingresar valor de pruebas para el campo id_conduccion_gravedad_ap de tipo int4",
           'nombre_conduccion_g' => "Ingresar valor de pruebas para el campo nombre_conduccion_g de tipo varchar",
           'id_forma_conduccion_g' => "Ingresar valor de pruebas para el campo id_forma_conduccion_g de tipo int4",
           'id_material_conduccion_g' => "Ingresar valor de pruebas para el campo id_material_conduccion_g de tipo int4",
           'id_frec_mantenimiento_g' => "Ingresar valor de pruebas para el campo id_frec_mantenimiento_g de tipo int4",
           'id_estado_conduccion_g' => "Ingresar valor de pruebas para el campo id_estado_conduccion_g de tipo int4",
           'problemas_identificados' => "Ingresar valor de pruebas para el campo problemas_identificados de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
           'id_junta' => "Ingresar valor de pruebas para el campo id_junta de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdConduccionGravedadAp No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdConduccionGravedadAp Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdConduccionGravedadAp::findOne(                                                               
        [
           'id_conduccion_gravedad_ap' => "Ingresar valor de pruebas para el campo id_conduccion_gravedad_ap de tipo int4",
           'nombre_conduccion_g' => "Ingresar valor de pruebas para el campo nombre_conduccion_g de tipo varchar",
           'id_forma_conduccion_g' => "Ingresar valor de pruebas para el campo id_forma_conduccion_g de tipo int4",
           'id_material_conduccion_g' => "Ingresar valor de pruebas para el campo id_material_conduccion_g de tipo int4",
           'id_frec_mantenimiento_g' => "Ingresar valor de pruebas para el campo id_frec_mantenimiento_g de tipo int4",
           'id_estado_conduccion_g' => "Ingresar valor de pruebas para el campo id_estado_conduccion_g de tipo int4",
           'problemas_identificados' => "Ingresar valor de pruebas para el campo problemas_identificados de tipo varchar",
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
        $table= FdConduccionGravedadAp::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdConduccionGravedadAp();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdConduccionGravedadAp();
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
         expect($tester->id_conduccion_gravedad_ap)->equals('Ingresar valor de pruebas para el campo id_conduccion_gravedad_ap de tipo int4');
         expect($tester->nombre_conduccion_g)->equals('Ingresar valor de pruebas para el campo nombre_conduccion_g de tipo varchar');
         expect($tester->id_forma_conduccion_g)->equals('Ingresar valor de pruebas para el campo id_forma_conduccion_g de tipo int4');
         expect($tester->id_material_conduccion_g)->equals('Ingresar valor de pruebas para el campo id_material_conduccion_g de tipo int4');
         expect($tester->id_frec_mantenimiento_g)->equals('Ingresar valor de pruebas para el campo id_frec_mantenimiento_g de tipo int4');
         expect($tester->id_estado_conduccion_g)->equals('Ingresar valor de pruebas para el campo id_estado_conduccion_g de tipo int4');
         expect($tester->problemas_identificados)->equals('Ingresar valor de pruebas para el campo problemas_identificados de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
         expect($tester->id_junta)->equals('Ingresar valor de pruebas para el campo id_junta de tipo int4');
      }

}
