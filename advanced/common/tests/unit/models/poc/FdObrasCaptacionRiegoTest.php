<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdObrasCaptacionRiego;
/**
 * Este es el unit test para la clase "fd_obras_captacion_riego".
 *
 * @property int4 $id_obracaptacion
 * @property int4 $numero_obras
 * @property int4 $tipo_obra
 * @property varchar $especifique
 * @property int4 $estado_obra
 * @property int4 $ubicacion_obra
 * @property varchar $especifique_ubicacion
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_pregunta
 * @property int4 $id_respuesta
 * @property int4 $id_capitulo
 *
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdOpcionSelect $tipoObra
 * @property FdOpcionSelect $estadoObra
 * @property FdOpcionSelect $ubicacionObra
 * @property FdPregunta $idPregunta
 */
class FdObrasCaptacionRiegoTest extends \Codeception\Test\Unit
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
        $tester = new FdObrasCaptacionRiego();
        $tester->id_obracaptacion = "Ingresar valor de pruebas para el campo id_obracaptacion de tipo int4";
        $tester->numero_obras = "Ingresar valor de pruebas para el campo numero_obras de tipo int4";
        $tester->tipo_obra = "Ingresar valor de pruebas para el campo tipo_obra de tipo int4";
        $tester->especifique = "Ingresar valor de pruebas para el campo especifique de tipo varchar";
        $tester->estado_obra = "Ingresar valor de pruebas para el campo estado_obra de tipo int4";
        $tester->ubicacion_obra = "Ingresar valor de pruebas para el campo ubicacion_obra de tipo int4";
        $tester->especifique_ubicacion = "Ingresar valor de pruebas para el campo especifique_ubicacion de tipo varchar";
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
        $tester = new FdObrasCaptacionRiego;
        $tester->id_obracaptacion = "Ingresar valor de pruebas para el campo id_obracaptacion de tipo int4";
        $tester->numero_obras = "Ingresar valor de pruebas para el campo numero_obras de tipo int4";
        $tester->tipo_obra = "Ingresar valor de pruebas para el campo tipo_obra de tipo int4";
        $tester->especifique = "Ingresar valor de pruebas para el campo especifique de tipo varchar";
        $tester->estado_obra = "Ingresar valor de pruebas para el campo estado_obra de tipo int4";
        $tester->ubicacion_obra = "Ingresar valor de pruebas para el campo ubicacion_obra de tipo int4";
        $tester->especifique_ubicacion = "Ingresar valor de pruebas para el campo especifique_ubicacion de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdObrasCaptacionRiego  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdObrasCaptacionRiego::findOne(                                                               
        [
           'id_obracaptacion' => "Ingresar valor de pruebas para el campo id_obracaptacion de tipo int4",
           'numero_obras' => "Ingresar valor de pruebas para el campo numero_obras de tipo int4",
           'tipo_obra' => "Ingresar valor de pruebas para el campo tipo_obra de tipo int4",
           'especifique' => "Ingresar valor de pruebas para el campo especifique de tipo varchar",
           'estado_obra' => "Ingresar valor de pruebas para el campo estado_obra de tipo int4",
           'ubicacion_obra' => "Ingresar valor de pruebas para el campo ubicacion_obra de tipo int4",
           'especifique_ubicacion' => "Ingresar valor de pruebas para el campo especifique_ubicacion de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdObrasCaptacionRiego No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdObrasCaptacionRiego Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdObrasCaptacionRiego::findOne(                                                               
        [
           'id_obracaptacion' => "Ingresar valor de pruebas para el campo id_obracaptacion de tipo int4",
           'numero_obras' => "Ingresar valor de pruebas para el campo numero_obras de tipo int4",
           'tipo_obra' => "Ingresar valor de pruebas para el campo tipo_obra de tipo int4",
           'especifique' => "Ingresar valor de pruebas para el campo especifique de tipo varchar",
           'estado_obra' => "Ingresar valor de pruebas para el campo estado_obra de tipo int4",
           'ubicacion_obra' => "Ingresar valor de pruebas para el campo ubicacion_obra de tipo int4",
           'especifique_ubicacion' => "Ingresar valor de pruebas para el campo especifique_ubicacion de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdObrasCaptacionRiego::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdObrasCaptacionRiego();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdObrasCaptacionRiego();
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
         expect($tester->id_obracaptacion)->equals('Ingresar valor de pruebas para el campo id_obracaptacion de tipo int4');
         expect($tester->numero_obras)->equals('Ingresar valor de pruebas para el campo numero_obras de tipo int4');
         expect($tester->tipo_obra)->equals('Ingresar valor de pruebas para el campo tipo_obra de tipo int4');
         expect($tester->especifique)->equals('Ingresar valor de pruebas para el campo especifique de tipo varchar');
         expect($tester->estado_obra)->equals('Ingresar valor de pruebas para el campo estado_obra de tipo int4');
         expect($tester->ubicacion_obra)->equals('Ingresar valor de pruebas para el campo ubicacion_obra de tipo int4');
         expect($tester->especifique_ubicacion)->equals('Ingresar valor de pruebas para el campo especifique_ubicacion de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
      }

}
