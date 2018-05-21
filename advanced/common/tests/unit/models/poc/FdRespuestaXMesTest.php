<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdRespuestaXMes;
/**
 * Este es el unit test para la clase "fd_respuesta_x_mes".
 *
 * @property numeric $ene_decimal
 * @property numeric $feb_decimal
 * @property numeric $mar_decimal
 * @property numeric $abr_decimal
 * @property numeric $may_decimal
 * @property numeric $jun_decimal
 * @property numeric $jul_decimal
 * @property numeric $ago_decimal
 * @property numeric $sep_decimal
 * @property numeric $oct_decimal
 * @property numeric $nov_decimal
 * @property numeric $dic_decimal
 * @property int4 $id_respuesta
 * @property int4 $id_pregunta
 * @property varchar $descripcion
 * @property int4 $id_opcion_select
 * @property int4 $id_respuesta_x_mes
 *
 * @property FdOpcionSelect $idOpcionSelect
 * @property FdPregunta $idPregunta
 * @property FdRespuesta $idRespuesta
 */
class FdRespuestaXMesTest extends \Codeception\Test\Unit
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
        $tester = new FdRespuestaXMes();
        $tester->ene_decimal = "Ingresar valor de pruebas para el campo ene_decimal de tipo numeric";
        $tester->feb_decimal = "Ingresar valor de pruebas para el campo feb_decimal de tipo numeric";
        $tester->mar_decimal = "Ingresar valor de pruebas para el campo mar_decimal de tipo numeric";
        $tester->abr_decimal = "Ingresar valor de pruebas para el campo abr_decimal de tipo numeric";
        $tester->may_decimal = "Ingresar valor de pruebas para el campo may_decimal de tipo numeric";
        $tester->jun_decimal = "Ingresar valor de pruebas para el campo jun_decimal de tipo numeric";
        $tester->jul_decimal = "Ingresar valor de pruebas para el campo jul_decimal de tipo numeric";
        $tester->ago_decimal = "Ingresar valor de pruebas para el campo ago_decimal de tipo numeric";
        $tester->sep_decimal = "Ingresar valor de pruebas para el campo sep_decimal de tipo numeric";
        $tester->oct_decimal = "Ingresar valor de pruebas para el campo oct_decimal de tipo numeric";
        $tester->nov_decimal = "Ingresar valor de pruebas para el campo nov_decimal de tipo numeric";
        $tester->dic_decimal = "Ingresar valor de pruebas para el campo dic_decimal de tipo numeric";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->descripcion = "Ingresar valor de pruebas para el campo descripcion de tipo varchar";
        $tester->id_opcion_select = "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4";
        $tester->id_respuesta_x_mes = "Ingresar valor de pruebas para el campo id_respuesta_x_mes de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdRespuestaXMes;
        $tester->ene_decimal = "Ingresar valor de pruebas para el campo ene_decimal de tipo numeric";
        $tester->feb_decimal = "Ingresar valor de pruebas para el campo feb_decimal de tipo numeric";
        $tester->mar_decimal = "Ingresar valor de pruebas para el campo mar_decimal de tipo numeric";
        $tester->abr_decimal = "Ingresar valor de pruebas para el campo abr_decimal de tipo numeric";
        $tester->may_decimal = "Ingresar valor de pruebas para el campo may_decimal de tipo numeric";
        $tester->jun_decimal = "Ingresar valor de pruebas para el campo jun_decimal de tipo numeric";
        $tester->jul_decimal = "Ingresar valor de pruebas para el campo jul_decimal de tipo numeric";
        $tester->ago_decimal = "Ingresar valor de pruebas para el campo ago_decimal de tipo numeric";
        $tester->sep_decimal = "Ingresar valor de pruebas para el campo sep_decimal de tipo numeric";
        $tester->oct_decimal = "Ingresar valor de pruebas para el campo oct_decimal de tipo numeric";
        $tester->nov_decimal = "Ingresar valor de pruebas para el campo nov_decimal de tipo numeric";
        $tester->dic_decimal = "Ingresar valor de pruebas para el campo dic_decimal de tipo numeric";
        $tester->id_respuesta = "Ingresar valor de pruebas para el campo id_respuesta de tipo int4";
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->descripcion = "Ingresar valor de pruebas para el campo descripcion de tipo varchar";
        $tester->id_opcion_select = "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4";
        $tester->id_respuesta_x_mes = "Ingresar valor de pruebas para el campo id_respuesta_x_mes de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdRespuestaXMes  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdRespuestaXMes::findOne(                                                               
        [
           'ene_decimal' => "Ingresar valor de pruebas para el campo ene_decimal de tipo numeric",
           'feb_decimal' => "Ingresar valor de pruebas para el campo feb_decimal de tipo numeric",
           'mar_decimal' => "Ingresar valor de pruebas para el campo mar_decimal de tipo numeric",
           'abr_decimal' => "Ingresar valor de pruebas para el campo abr_decimal de tipo numeric",
           'may_decimal' => "Ingresar valor de pruebas para el campo may_decimal de tipo numeric",
           'jun_decimal' => "Ingresar valor de pruebas para el campo jun_decimal de tipo numeric",
           'jul_decimal' => "Ingresar valor de pruebas para el campo jul_decimal de tipo numeric",
           'ago_decimal' => "Ingresar valor de pruebas para el campo ago_decimal de tipo numeric",
           'sep_decimal' => "Ingresar valor de pruebas para el campo sep_decimal de tipo numeric",
           'oct_decimal' => "Ingresar valor de pruebas para el campo oct_decimal de tipo numeric",
           'nov_decimal' => "Ingresar valor de pruebas para el campo nov_decimal de tipo numeric",
           'dic_decimal' => "Ingresar valor de pruebas para el campo dic_decimal de tipo numeric",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo varchar",
           'id_opcion_select' => "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4",
           'id_respuesta_x_mes' => "Ingresar valor de pruebas para el campo id_respuesta_x_mes de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdRespuestaXMes No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdRespuestaXMes Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdRespuestaXMes::findOne(                                                               
        [
           'ene_decimal' => "Ingresar valor de pruebas para el campo ene_decimal de tipo numeric",
           'feb_decimal' => "Ingresar valor de pruebas para el campo feb_decimal de tipo numeric",
           'mar_decimal' => "Ingresar valor de pruebas para el campo mar_decimal de tipo numeric",
           'abr_decimal' => "Ingresar valor de pruebas para el campo abr_decimal de tipo numeric",
           'may_decimal' => "Ingresar valor de pruebas para el campo may_decimal de tipo numeric",
           'jun_decimal' => "Ingresar valor de pruebas para el campo jun_decimal de tipo numeric",
           'jul_decimal' => "Ingresar valor de pruebas para el campo jul_decimal de tipo numeric",
           'ago_decimal' => "Ingresar valor de pruebas para el campo ago_decimal de tipo numeric",
           'sep_decimal' => "Ingresar valor de pruebas para el campo sep_decimal de tipo numeric",
           'oct_decimal' => "Ingresar valor de pruebas para el campo oct_decimal de tipo numeric",
           'nov_decimal' => "Ingresar valor de pruebas para el campo nov_decimal de tipo numeric",
           'dic_decimal' => "Ingresar valor de pruebas para el campo dic_decimal de tipo numeric",
           'id_respuesta' => "Ingresar valor de pruebas para el campo id_respuesta de tipo int4",
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo varchar",
           'id_opcion_select' => "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4",
           'id_respuesta_x_mes' => "Ingresar valor de pruebas para el campo id_respuesta_x_mes de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdRespuestaXMes::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdRespuestaXMes();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdRespuestaXMes();
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
         expect($tester->ene_decimal)->equals('Ingresar valor de pruebas para el campo ene_decimal de tipo numeric');
         expect($tester->feb_decimal)->equals('Ingresar valor de pruebas para el campo feb_decimal de tipo numeric');
         expect($tester->mar_decimal)->equals('Ingresar valor de pruebas para el campo mar_decimal de tipo numeric');
         expect($tester->abr_decimal)->equals('Ingresar valor de pruebas para el campo abr_decimal de tipo numeric');
         expect($tester->may_decimal)->equals('Ingresar valor de pruebas para el campo may_decimal de tipo numeric');
         expect($tester->jun_decimal)->equals('Ingresar valor de pruebas para el campo jun_decimal de tipo numeric');
         expect($tester->jul_decimal)->equals('Ingresar valor de pruebas para el campo jul_decimal de tipo numeric');
         expect($tester->ago_decimal)->equals('Ingresar valor de pruebas para el campo ago_decimal de tipo numeric');
         expect($tester->sep_decimal)->equals('Ingresar valor de pruebas para el campo sep_decimal de tipo numeric');
         expect($tester->oct_decimal)->equals('Ingresar valor de pruebas para el campo oct_decimal de tipo numeric');
         expect($tester->nov_decimal)->equals('Ingresar valor de pruebas para el campo nov_decimal de tipo numeric');
         expect($tester->dic_decimal)->equals('Ingresar valor de pruebas para el campo dic_decimal de tipo numeric');
         expect($tester->id_respuesta)->equals('Ingresar valor de pruebas para el campo id_respuesta de tipo int4');
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->descripcion)->equals('Ingresar valor de pruebas para el campo descripcion de tipo varchar');
         expect($tester->id_opcion_select)->equals('Ingresar valor de pruebas para el campo id_opcion_select de tipo int4');
         expect($tester->id_respuesta_x_mes)->equals('Ingresar valor de pruebas para el campo id_respuesta_x_mes de tipo int4');
      }

}
