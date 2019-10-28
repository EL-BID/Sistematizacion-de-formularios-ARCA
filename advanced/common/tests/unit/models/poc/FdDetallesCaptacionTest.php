<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdDetallesCaptacion;
/**
 * Este es el unit test para la clase "fd_detalles_captacion".
 *
 * @property int4 $id_detalles_captacion
 * @property varchar $nombre_captacion
 * @property int4 $id_estruc_hidrau
 * @property int4 $anio_construc
 * @property int4 $id_material_estruc
 * @property int4 $id_problema_capt
 * @property int4 $id_estado_capt
 * @property int4 $id_t_medicion
 * @property varchar $especifique_mat_estr
 * @property varchar $especifique_probl
 * @property varchar $especifique_t_med
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
class FdDetallesCaptacionTest extends \Codeception\Test\Unit
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
        $tester = new FdDetallesCaptacion();
        $tester->id_detalles_captacion = "Ingresar valor de pruebas para el campo id_detalles_captacion de tipo int4";
        $tester->nombre_captacion = "Ingresar valor de pruebas para el campo nombre_captacion de tipo varchar";
        $tester->id_estruc_hidrau = "Ingresar valor de pruebas para el campo id_estruc_hidrau de tipo int4";
        $tester->anio_construc = "Ingresar valor de pruebas para el campo anio_construc de tipo int4";
        $tester->id_material_estruc = "Ingresar valor de pruebas para el campo id_material_estruc de tipo int4";
        $tester->id_problema_capt = "Ingresar valor de pruebas para el campo id_problema_capt de tipo int4";
        $tester->id_estado_capt = "Ingresar valor de pruebas para el campo id_estado_capt de tipo int4";
        $tester->id_t_medicion = "Ingresar valor de pruebas para el campo id_t_medicion de tipo int4";
        $tester->especifique_mat_estr = "Ingresar valor de pruebas para el campo especifique_mat_estr de tipo varchar";
        $tester->especifique_probl = "Ingresar valor de pruebas para el campo especifique_probl de tipo varchar";
        $tester->especifique_t_med = "Ingresar valor de pruebas para el campo especifique_t_med de tipo varchar";
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
        $tester = new FdDetallesCaptacion;
        $tester->id_detalles_captacion = "Ingresar valor de pruebas para el campo id_detalles_captacion de tipo int4";
        $tester->nombre_captacion = "Ingresar valor de pruebas para el campo nombre_captacion de tipo varchar";
        $tester->id_estruc_hidrau = "Ingresar valor de pruebas para el campo id_estruc_hidrau de tipo int4";
        $tester->anio_construc = "Ingresar valor de pruebas para el campo anio_construc de tipo int4";
        $tester->id_material_estruc = "Ingresar valor de pruebas para el campo id_material_estruc de tipo int4";
        $tester->id_problema_capt = "Ingresar valor de pruebas para el campo id_problema_capt de tipo int4";
        $tester->id_estado_capt = "Ingresar valor de pruebas para el campo id_estado_capt de tipo int4";
        $tester->id_t_medicion = "Ingresar valor de pruebas para el campo id_t_medicion de tipo int4";
        $tester->especifique_mat_estr = "Ingresar valor de pruebas para el campo especifique_mat_estr de tipo varchar";
        $tester->especifique_probl = "Ingresar valor de pruebas para el campo especifique_probl de tipo varchar";
        $tester->especifique_t_med = "Ingresar valor de pruebas para el campo especifique_t_med de tipo varchar";
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
            'FdDetallesCaptacion  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdDetallesCaptacion::findOne(                                                               
        [
           'id_detalles_captacion' => "Ingresar valor de pruebas para el campo id_detalles_captacion de tipo int4",
           'nombre_captacion' => "Ingresar valor de pruebas para el campo nombre_captacion de tipo varchar",
           'id_estruc_hidrau' => "Ingresar valor de pruebas para el campo id_estruc_hidrau de tipo int4",
           'anio_construc' => "Ingresar valor de pruebas para el campo anio_construc de tipo int4",
           'id_material_estruc' => "Ingresar valor de pruebas para el campo id_material_estruc de tipo int4",
           'id_problema_capt' => "Ingresar valor de pruebas para el campo id_problema_capt de tipo int4",
           'id_estado_capt' => "Ingresar valor de pruebas para el campo id_estado_capt de tipo int4",
           'id_t_medicion' => "Ingresar valor de pruebas para el campo id_t_medicion de tipo int4",
           'especifique_mat_estr' => "Ingresar valor de pruebas para el campo especifique_mat_estr de tipo varchar",
           'especifique_probl' => "Ingresar valor de pruebas para el campo especifique_probl de tipo varchar",
           'especifique_t_med' => "Ingresar valor de pruebas para el campo especifique_t_med de tipo varchar",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdDetallesCaptacion No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdDetallesCaptacion Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdDetallesCaptacion::findOne(                                                               
        [
           'id_detalles_captacion' => "Ingresar valor de pruebas para el campo id_detalles_captacion de tipo int4",
           'nombre_captacion' => "Ingresar valor de pruebas para el campo nombre_captacion de tipo varchar",
           'id_estruc_hidrau' => "Ingresar valor de pruebas para el campo id_estruc_hidrau de tipo int4",
           'anio_construc' => "Ingresar valor de pruebas para el campo anio_construc de tipo int4",
           'id_material_estruc' => "Ingresar valor de pruebas para el campo id_material_estruc de tipo int4",
           'id_problema_capt' => "Ingresar valor de pruebas para el campo id_problema_capt de tipo int4",
           'id_estado_capt' => "Ingresar valor de pruebas para el campo id_estado_capt de tipo int4",
           'id_t_medicion' => "Ingresar valor de pruebas para el campo id_t_medicion de tipo int4",
           'especifique_mat_estr' => "Ingresar valor de pruebas para el campo especifique_mat_estr de tipo varchar",
           'especifique_probl' => "Ingresar valor de pruebas para el campo especifique_probl de tipo varchar",
           'especifique_t_med' => "Ingresar valor de pruebas para el campo especifique_t_med de tipo varchar",
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
        $table= FdDetallesCaptacion::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdDetallesCaptacion();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdDetallesCaptacion();
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
         expect($tester->id_detalles_captacion)->equals('Ingresar valor de pruebas para el campo id_detalles_captacion de tipo int4');
         expect($tester->nombre_captacion)->equals('Ingresar valor de pruebas para el campo nombre_captacion de tipo varchar');
         expect($tester->id_estruc_hidrau)->equals('Ingresar valor de pruebas para el campo id_estruc_hidrau de tipo int4');
         expect($tester->anio_construc)->equals('Ingresar valor de pruebas para el campo anio_construc de tipo int4');
         expect($tester->id_material_estruc)->equals('Ingresar valor de pruebas para el campo id_material_estruc de tipo int4');
         expect($tester->id_problema_capt)->equals('Ingresar valor de pruebas para el campo id_problema_capt de tipo int4');
         expect($tester->id_estado_capt)->equals('Ingresar valor de pruebas para el campo id_estado_capt de tipo int4');
         expect($tester->id_t_medicion)->equals('Ingresar valor de pruebas para el campo id_t_medicion de tipo int4');
         expect($tester->especifique_mat_estr)->equals('Ingresar valor de pruebas para el campo especifique_mat_estr de tipo varchar');
         expect($tester->especifique_probl)->equals('Ingresar valor de pruebas para el campo especifique_probl de tipo varchar');
         expect($tester->especifique_t_med)->equals('Ingresar valor de pruebas para el campo especifique_t_med de tipo varchar');
         expect($tester->observaciones)->equals('Ingresar valor de pruebas para el campo observaciones de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
      }

}
