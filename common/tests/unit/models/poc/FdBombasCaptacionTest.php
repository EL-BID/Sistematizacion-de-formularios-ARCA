<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdBombasCaptacion;
/**
 * Este es el unit test para la clase "fd_bombas_captacion".
 *
 * @property int4 $id_bombas_captacion
 * @property varchar $nombre_bomba
 * @property int4 $id_material_caseta
 * @property int4 $id_estado_infrestructura
 * @property int4 $potencia_bomba
 * @property int4 $anio_instalacion
 * @property int4 $id_problema_bomba
 * @property varchar $especifique_material_caseta
 * @property varchar $especifique_problema_bomba
 * @property varchar $observaciones
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_pregunta
 * @property int4 $id_respuesta
 * @property int4 $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdBombasCaptacionTest extends \Codeception\Test\Unit
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
        $tester = new FdBombasCaptacion();
        $tester->id_bombas_captacion = "Ingresar valor de pruebas para el campo id_bombas_captacion de tipo int4";
        $tester->nombre_bomba = "Ingresar valor de pruebas para el campo nombre_bomba de tipo varchar";
        $tester->id_material_caseta = "Ingresar valor de pruebas para el campo id_material_caseta de tipo int4";
        $tester->id_estado_infrestructura = "Ingresar valor de pruebas para el campo id_estado_infrestructura de tipo int4";
        $tester->potencia_bomba = "Ingresar valor de pruebas para el campo potencia_bomba de tipo int4";
        $tester->anio_instalacion = "Ingresar valor de pruebas para el campo anio_instalacion de tipo int4";
        $tester->id_problema_bomba = "Ingresar valor de pruebas para el campo id_problema_bomba de tipo int4";
        $tester->especifique_material_caseta = "Ingresar valor de pruebas para el campo especifique_material_caseta de tipo varchar";
        $tester->especifique_problema_bomba = "Ingresar valor de pruebas para el campo especifique_problema_bomba de tipo varchar";
        $tester->observaciones = "Ingresar valor de pruebas para el campo observaciones de tipo varchar";
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
        $tester = new FdBombasCaptacion;
        $tester->id_bombas_captacion = "Ingresar valor de pruebas para el campo id_bombas_captacion de tipo int4";
        $tester->nombre_bomba = "Ingresar valor de pruebas para el campo nombre_bomba de tipo varchar";
        $tester->id_material_caseta = "Ingresar valor de pruebas para el campo id_material_caseta de tipo int4";
        $tester->id_estado_infrestructura = "Ingresar valor de pruebas para el campo id_estado_infrestructura de tipo int4";
        $tester->potencia_bomba = "Ingresar valor de pruebas para el campo potencia_bomba de tipo int4";
        $tester->anio_instalacion = "Ingresar valor de pruebas para el campo anio_instalacion de tipo int4";
        $tester->id_problema_bomba = "Ingresar valor de pruebas para el campo id_problema_bomba de tipo int4";
        $tester->especifique_material_caseta = "Ingresar valor de pruebas para el campo especifique_material_caseta de tipo varchar";
        $tester->especifique_problema_bomba = "Ingresar valor de pruebas para el campo especifique_problema_bomba de tipo varchar";
        $tester->observaciones = "Ingresar valor de pruebas para el campo observaciones de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdBombasCaptacion  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdBombasCaptacion::findOne(                                                               
        [
           'id_bombas_captacion' => "Ingresar valor de pruebas para el campo id_bombas_captacion de tipo int4",
           'nombre_bomba' => "Ingresar valor de pruebas para el campo nombre_bomba de tipo varchar",
           'id_material_caseta' => "Ingresar valor de pruebas para el campo id_material_caseta de tipo int4",
           'id_estado_infrestructura' => "Ingresar valor de pruebas para el campo id_estado_infrestructura de tipo int4",
           'potencia_bomba' => "Ingresar valor de pruebas para el campo potencia_bomba de tipo int4",
           'anio_instalacion' => "Ingresar valor de pruebas para el campo anio_instalacion de tipo int4",
           'id_problema_bomba' => "Ingresar valor de pruebas para el campo id_problema_bomba de tipo int4",
           'especifique_material_caseta' => "Ingresar valor de pruebas para el campo especifique_material_caseta de tipo varchar",
           'especifique_problema_bomba' => "Ingresar valor de pruebas para el campo especifique_problema_bomba de tipo varchar",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdBombasCaptacion No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdBombasCaptacion Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdBombasCaptacion::findOne(                                                               
        [
           'id_bombas_captacion' => "Ingresar valor de pruebas para el campo id_bombas_captacion de tipo int4",
           'nombre_bomba' => "Ingresar valor de pruebas para el campo nombre_bomba de tipo varchar",
           'id_material_caseta' => "Ingresar valor de pruebas para el campo id_material_caseta de tipo int4",
           'id_estado_infrestructura' => "Ingresar valor de pruebas para el campo id_estado_infrestructura de tipo int4",
           'potencia_bomba' => "Ingresar valor de pruebas para el campo potencia_bomba de tipo int4",
           'anio_instalacion' => "Ingresar valor de pruebas para el campo anio_instalacion de tipo int4",
           'id_problema_bomba' => "Ingresar valor de pruebas para el campo id_problema_bomba de tipo int4",
           'especifique_material_caseta' => "Ingresar valor de pruebas para el campo especifique_material_caseta de tipo varchar",
           'especifique_problema_bomba' => "Ingresar valor de pruebas para el campo especifique_problema_bomba de tipo varchar",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdBombasCaptacion::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdBombasCaptacion();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdBombasCaptacion();
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
         expect($tester->id_bombas_captacion)->equals('Ingresar valor de pruebas para el campo id_bombas_captacion de tipo int4');
         expect($tester->nombre_bomba)->equals('Ingresar valor de pruebas para el campo nombre_bomba de tipo varchar');
         expect($tester->id_material_caseta)->equals('Ingresar valor de pruebas para el campo id_material_caseta de tipo int4');
         expect($tester->id_estado_infrestructura)->equals('Ingresar valor de pruebas para el campo id_estado_infrestructura de tipo int4');
         expect($tester->potencia_bomba)->equals('Ingresar valor de pruebas para el campo potencia_bomba de tipo int4');
         expect($tester->anio_instalacion)->equals('Ingresar valor de pruebas para el campo anio_instalacion de tipo int4');
         expect($tester->id_problema_bomba)->equals('Ingresar valor de pruebas para el campo id_problema_bomba de tipo int4');
         expect($tester->especifique_material_caseta)->equals('Ingresar valor de pruebas para el campo especifique_material_caseta de tipo varchar');
         expect($tester->especifique_problema_bomba)->equals('Ingresar valor de pruebas para el campo especifique_problema_bomba de tipo varchar');
         expect($tester->observaciones)->equals('Ingresar valor de pruebas para el campo observaciones de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
      }

}
