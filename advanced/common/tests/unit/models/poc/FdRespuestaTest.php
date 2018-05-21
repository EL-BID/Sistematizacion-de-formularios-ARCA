<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdRespuesta;
/**
 * Este es el unit test para la clase "fd_respuesta".
 *
 * @property int4 $id_respuesta
 * @property date $ra_fecha
 * @property varchar $ra_check
 * @property text $ra_descripcion
 * @property int4 $ra_entero
 * @property numeric $ra_decimal
 * @property numeric $ra_porcentaje
 * @property int4 $id_conjunto_respuesta
 * @property numeric $ra_moneda
 * @property int4 $id_pregunta
 * @property int4 $id_opcion_select
 * @property int4 $id_tpregunta
 * @property int4 $id_capitulo
 * @property int4 $id_formato
 * @property int4 $id_conjunto_pregunta
 * @property int4 $id_version
 * @property int4 $cantidad_registros
 *
 * @property FdCoordenada[] $fdCoordenadas
 * @property FdInvolucrado[] $fdInvolucrados
 * @property FdCapitulo $idCapitulo
 * @property FdConjuntoPregunta $idConjuntoPregunta
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 * @property FdFormato $idFormato
 * @property FdOpcionSelect $idOpcionSelect
 * @property FdPregunta $idPregunta
 * @property FdTipoPregunta $idTpregunta
 * @property FdVersion $idVersion
 * @property FdRespuestaXMes[] $fdRespuestaXMes
 * @property FdUbicacion[] $fdUbicacions
 * @property SopSoportes[] $sopSoportes
 */
class FdRespuestaTest extends \Codeception\Test\Unit
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
        $tester = new FdRespuesta();
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->ra_fecha = "Ingresar valor de pruebas para el campo ra_fecha de tipo date";
        $tester->ra_check = "Ingresar valor de pruebas para el campo ra_check de tipo varchar";
        $tester->ra_descripcion = "Ingresar valor de pruebas para el campo ra_descripcion de tipo text";
        $tester->ra_entero = "Ingresar valor de pruebas para el campo ra_entero de tipo int4";
        $tester->ra_decimal = "Ingresar valor de pruebas para el campo ra_decimal de tipo numeric";
        $tester->ra_porcentaje = "Ingresar valor de pruebas para el campo ra_porcentaje de tipo numeric";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->ra_moneda = "Ingresar valor de pruebas para el campo ra_moneda de tipo numeric";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_opcion_select = "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4";
        $tester->id_tpregunta = "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
        $tester->id_formato = "Ingresar valor de pruebas para el campo id_formato de tipo int4";
        $tester->id_conjunto_pregunta = "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4";
        $tester->id_version = "Ingresar valor de pruebas para el campo id_version de tipo int4";
        $tester->cantidad_registros = "Ingresar valor de pruebas para el campo cantidad_registros de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdRespuesta;
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->ra_fecha = "Ingresar valor de pruebas para el campo ra_fecha de tipo date";
        $tester->ra_check = "Ingresar valor de pruebas para el campo ra_check de tipo varchar";
        $tester->ra_descripcion = "Ingresar valor de pruebas para el campo ra_descripcion de tipo text";
        $tester->ra_entero = "Ingresar valor de pruebas para el campo ra_entero de tipo int4";
        $tester->ra_decimal = "Ingresar valor de pruebas para el campo ra_decimal de tipo numeric";
        $tester->ra_porcentaje = "Ingresar valor de pruebas para el campo ra_porcentaje de tipo numeric";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->ra_moneda = "Ingresar valor de pruebas para el campo ra_moneda de tipo numeric";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->id_opcion_select = "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4";
        $tester->id_tpregunta = "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
        $tester->id_formato = "Ingresar valor de pruebas para el campo id_formato de tipo int4";
        $tester->id_conjunto_pregunta = "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4";
        $tester->id_version = "Ingresar valor de pruebas para el campo id_version de tipo int4";
        $tester->cantidad_registros = "Ingresar valor de pruebas para el campo cantidad_registros de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdRespuesta  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdRespuesta::findOne(                                                               
        [
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'ra_fecha' => "Ingresar valor de pruebas para el campo ra_fecha de tipo date",
           'ra_check' => "Ingresar valor de pruebas para el campo ra_check de tipo varchar",
           'ra_descripcion' => "Ingresar valor de pruebas para el campo ra_descripcion de tipo text",
           'ra_entero' => "Ingresar valor de pruebas para el campo ra_entero de tipo int4",
           'ra_decimal' => "Ingresar valor de pruebas para el campo ra_decimal de tipo numeric",
           'ra_porcentaje' => "Ingresar valor de pruebas para el campo ra_porcentaje de tipo numeric",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'ra_moneda' => "Ingresar valor de pruebas para el campo ra_moneda de tipo numeric",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_opcion_select' => "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4",
           'id_tpregunta' => "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
           'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",
           'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",
           'id_version' => "Ingresar valor de pruebas para el campo id_version de tipo int4",
           'cantidad_registros' => "Ingresar valor de pruebas para el campo cantidad_registros de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdRespuesta No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdRespuesta Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdRespuesta::findOne(                                                               
        [
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'ra_fecha' => "Ingresar valor de pruebas para el campo ra_fecha de tipo date",
           'ra_check' => "Ingresar valor de pruebas para el campo ra_check de tipo varchar",
           'ra_descripcion' => "Ingresar valor de pruebas para el campo ra_descripcion de tipo text",
           'ra_entero' => "Ingresar valor de pruebas para el campo ra_entero de tipo int4",
           'ra_decimal' => "Ingresar valor de pruebas para el campo ra_decimal de tipo numeric",
           'ra_porcentaje' => "Ingresar valor de pruebas para el campo ra_porcentaje de tipo numeric",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'ra_moneda' => "Ingresar valor de pruebas para el campo ra_moneda de tipo numeric",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'id_opcion_select' => "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4",
           'id_tpregunta' => "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
           'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",
           'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",
           'id_version' => "Ingresar valor de pruebas para el campo id_version de tipo int4",
           'cantidad_registros' => "Ingresar valor de pruebas para el campo cantidad_registros de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdRespuesta::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdRespuesta();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdRespuesta();
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
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->ra_fecha)->equals('Ingresar valor de pruebas para el campo ra_fecha de tipo date');
         expect($tester->ra_check)->equals('Ingresar valor de pruebas para el campo ra_check de tipo varchar');
         expect($tester->ra_descripcion)->equals('Ingresar valor de pruebas para el campo ra_descripcion de tipo text');
         expect($tester->ra_entero)->equals('Ingresar valor de pruebas para el campo ra_entero de tipo int4');
         expect($tester->ra_decimal)->equals('Ingresar valor de pruebas para el campo ra_decimal de tipo numeric');
         expect($tester->ra_porcentaje)->equals('Ingresar valor de pruebas para el campo ra_porcentaje de tipo numeric');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->ra_moneda)->equals('Ingresar valor de pruebas para el campo ra_moneda de tipo numeric');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->id_opcion_select)->equals('Ingresar valor de pruebas para el campo id_opcion_select de tipo int4');
         expect($tester->id_tpregunta)->equals('Ingresar valor de pruebas para el campo id_tpregunta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
         expect($tester->id_formato)->equals('Ingresar valor de pruebas para el campo id_formato de tipo int4');
         expect($tester->id_conjunto_pregunta)->equals('Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4');
         expect($tester->id_version)->equals('Ingresar valor de pruebas para el campo id_version de tipo int4');
         expect($tester->cantidad_registros)->equals('Ingresar valor de pruebas para el campo cantidad_registros de tipo int4');
      }

}
