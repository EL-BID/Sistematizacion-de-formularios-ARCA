<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdDetallesFuente;
/**
 * Este es el unit test para la clase "fd_detalles_fuente".
 *
 * @property int4 $id_detalles_fuente
 * @property varchar $nombre_fuente
 * @property int4 $id_t_fuente
 * @property int4 $coor_x
 * @property int4 $coor_y
 * @property int4 $coor_z
 * @property int4 $caudal_captado
 * @property int4 $caudal_autorizado
 * @property int4 $id_problema_fuente
 * @property varchar $especifique
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_pregunta
 * @property int4 $id_respuesta
 * @property int4 $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdDetallesFuenteTest extends \Codeception\Test\Unit
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
        $tester = new FdDetallesFuente();
        $tester->id_detalles_fuente = "Ingresar valor de pruebas para el campo id_detalles_fuente de tipo int4";
        $tester->nombre_fuente = "Ingresar valor de pruebas para el campo nombre_fuente de tipo varchar";
        $tester->id_t_fuente = "Ingresar valor de pruebas para el campo id_t_fuente de tipo int4";
        $tester->coor_x = "Ingresar valor de pruebas para el campo coor_x de tipo int4";
        $tester->coor_y = "Ingresar valor de pruebas para el campo coor_y de tipo int4";
        $tester->coor_z = "Ingresar valor de pruebas para el campo coor_z de tipo int4";
        $tester->caudal_captado = "Ingresar valor de pruebas para el campo caudal_captado de tipo int4";
        $tester->caudal_autorizado = "Ingresar valor de pruebas para el campo caudal_autorizado de tipo int4";
        $tester->id_problema_fuente = "Ingresar valor de pruebas para el campo id_problema_fuente de tipo int4";
        $tester->especifique = "Ingresar valor de pruebas para el campo especifique de tipo varchar";
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
        $tester = new FdDetallesFuente;
        $tester->id_detalles_fuente = "Ingresar valor de pruebas para el campo id_detalles_fuente de tipo int4";
        $tester->nombre_fuente = "Ingresar valor de pruebas para el campo nombre_fuente de tipo varchar";
        $tester->id_t_fuente = "Ingresar valor de pruebas para el campo id_t_fuente de tipo int4";
        $tester->coor_x = "Ingresar valor de pruebas para el campo coor_x de tipo int4";
        $tester->coor_y = "Ingresar valor de pruebas para el campo coor_y de tipo int4";
        $tester->coor_z = "Ingresar valor de pruebas para el campo coor_z de tipo int4";
        $tester->caudal_captado = "Ingresar valor de pruebas para el campo caudal_captado de tipo int4";
        $tester->caudal_autorizado = "Ingresar valor de pruebas para el campo caudal_autorizado de tipo int4";
        $tester->id_problema_fuente = "Ingresar valor de pruebas para el campo id_problema_fuente de tipo int4";
        $tester->especifique = "Ingresar valor de pruebas para el campo especifique de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdDetallesFuente  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdDetallesFuente::findOne(                                                               
        [
           'id_detalles_fuente' => "Ingresar valor de pruebas para el campo id_detalles_fuente de tipo int4",
           'nombre_fuente' => "Ingresar valor de pruebas para el campo nombre_fuente de tipo varchar",
           'id_t_fuente' => "Ingresar valor de pruebas para el campo id_t_fuente de tipo int4",
           'coor_x' => "Ingresar valor de pruebas para el campo coor_x de tipo int4",
           'coor_y' => "Ingresar valor de pruebas para el campo coor_y de tipo int4",
           'coor_z' => "Ingresar valor de pruebas para el campo coor_z de tipo int4",
           'caudal_captado' => "Ingresar valor de pruebas para el campo caudal_captado de tipo int4",
           'caudal_autorizado' => "Ingresar valor de pruebas para el campo caudal_autorizado de tipo int4",
           'id_problema_fuente' => "Ingresar valor de pruebas para el campo id_problema_fuente de tipo int4",
           'especifique' => "Ingresar valor de pruebas para el campo especifique de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdDetallesFuente No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdDetallesFuente Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdDetallesFuente::findOne(                                                               
        [
           'id_detalles_fuente' => "Ingresar valor de pruebas para el campo id_detalles_fuente de tipo int4",
           'nombre_fuente' => "Ingresar valor de pruebas para el campo nombre_fuente de tipo varchar",
           'id_t_fuente' => "Ingresar valor de pruebas para el campo id_t_fuente de tipo int4",
           'coor_x' => "Ingresar valor de pruebas para el campo coor_x de tipo int4",
           'coor_y' => "Ingresar valor de pruebas para el campo coor_y de tipo int4",
           'coor_z' => "Ingresar valor de pruebas para el campo coor_z de tipo int4",
           'caudal_captado' => "Ingresar valor de pruebas para el campo caudal_captado de tipo int4",
           'caudal_autorizado' => "Ingresar valor de pruebas para el campo caudal_autorizado de tipo int4",
           'id_problema_fuente' => "Ingresar valor de pruebas para el campo id_problema_fuente de tipo int4",
           'especifique' => "Ingresar valor de pruebas para el campo especifique de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdDetallesFuente::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdDetallesFuente();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdDetallesFuente();
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
         expect($tester->id_detalles_fuente)->equals('Ingresar valor de pruebas para el campo id_detalles_fuente de tipo int4');
         expect($tester->nombre_fuente)->equals('Ingresar valor de pruebas para el campo nombre_fuente de tipo varchar');
         expect($tester->id_t_fuente)->equals('Ingresar valor de pruebas para el campo id_t_fuente de tipo int4');
         expect($tester->coor_x)->equals('Ingresar valor de pruebas para el campo coor_x de tipo int4');
         expect($tester->coor_y)->equals('Ingresar valor de pruebas para el campo coor_y de tipo int4');
         expect($tester->coor_z)->equals('Ingresar valor de pruebas para el campo coor_z de tipo int4');
         expect($tester->caudal_captado)->equals('Ingresar valor de pruebas para el campo caudal_captado de tipo int4');
         expect($tester->caudal_autorizado)->equals('Ingresar valor de pruebas para el campo caudal_autorizado de tipo int4');
         expect($tester->id_problema_fuente)->equals('Ingresar valor de pruebas para el campo id_problema_fuente de tipo int4');
         expect($tester->especifique)->equals('Ingresar valor de pruebas para el campo especifique de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
      }

}
