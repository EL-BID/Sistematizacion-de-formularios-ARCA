<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdHistoricoRespuesta;
/**
 * Este es el unit test para la clase "fd_historico_respuesta".
 *
 * @property int4 $id_historico_respuesta
 * @property varchar $observaciones
 * @property date $fecha
 * @property varchar $usuario
 * @property int4 $id_conjunto_respuesta
 * @property int4 $id_adm_estado
 *
 * @property FdAdmEstado $idAdmEstado
 * @property FdConjuntoRespuesta $idConjuntoRespuesta
 */
class FdHistoricoRespuestaTest extends \Codeception\Test\Unit
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
        $tester = new FdHistoricoRespuesta();
        $tester->id_historico_respuesta = "Ingresar valor de pruebas para el campo id_historico_respuesta de tipo int4";
        $tester->observaciones = "Ingresar valor de pruebas para el campo observaciones de tipo varchar";
        $tester->fecha = "Ingresar valor de pruebas para el campo fecha de tipo date";
        $tester->usuario = "Ingresar valor de pruebas para el campo usuario de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_adm_estado = "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdHistoricoRespuesta;
        $tester->id_historico_respuesta = "Ingresar valor de pruebas para el campo id_historico_respuesta de tipo int4";
        $tester->observaciones = "Ingresar valor de pruebas para el campo observaciones de tipo varchar";
        $tester->fecha = "Ingresar valor de pruebas para el campo fecha de tipo date";
        $tester->usuario = "Ingresar valor de pruebas para el campo usuario de tipo varchar";
        $tester->id_conjunto_respuesta = "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4";
        $tester->id_adm_estado = "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdHistoricoRespuesta  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdHistoricoRespuesta::findOne(                                                               
        [
           'id_historico_respuesta' => "Ingresar valor de pruebas para el campo id_historico_respuesta de tipo int4",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'fecha' => "Ingresar valor de pruebas para el campo fecha de tipo date",
           'usuario' => "Ingresar valor de pruebas para el campo usuario de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_adm_estado' => "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdHistoricoRespuesta No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdHistoricoRespuesta Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdHistoricoRespuesta::findOne(                                                               
        [
           'id_historico_respuesta' => "Ingresar valor de pruebas para el campo id_historico_respuesta de tipo int4",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'fecha' => "Ingresar valor de pruebas para el campo fecha de tipo date",
           'usuario' => "Ingresar valor de pruebas para el campo usuario de tipo varchar",
           'id_conjunto_respuesta' => "Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4",
           'id_adm_estado' => "Ingresar valor de pruebas para el campo id_adm_estado de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdHistoricoRespuesta::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdHistoricoRespuesta();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdHistoricoRespuesta();
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
         expect($tester->id_historico_respuesta)->equals('Ingresar valor de pruebas para el campo id_historico_respuesta de tipo int4');
         expect($tester->observaciones)->equals('Ingresar valor de pruebas para el campo observaciones de tipo varchar');
         expect($tester->fecha)->equals('Ingresar valor de pruebas para el campo fecha de tipo date');
         expect($tester->usuario)->equals('Ingresar valor de pruebas para el campo usuario de tipo varchar');
         expect($tester->id_conjunto_respuesta)->equals('Ingresar valor de pruebas para el campo id_conjunto_respuesta de tipo int4');
         expect($tester->id_adm_estado)->equals('Ingresar valor de pruebas para el campo id_adm_estado de tipo int4');
      }

}
