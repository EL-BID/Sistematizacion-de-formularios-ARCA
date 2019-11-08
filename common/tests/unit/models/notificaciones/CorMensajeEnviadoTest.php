<?php

namespace common\tests\unit\models\notificaciones;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\notificaciones\CorMensajeEnviado;
/**
 * Este es el unit test para la clase "cor_mensaje_enviado".
 *
 * @property int4 $id_mensaje_enviado
 * @property text $cor_parametro
 * @property text $cor_destinatario
 * @property varchar $asunto
 * @property int4 $id_correo
 *
 * @property CorCorreo $idCorreo
 */
class CorMensajeEnviadoTest extends \Codeception\Test\Unit
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
        $tester = new CorMensajeEnviado();
        $tester->id_mensaje_enviado = "Ingresar valor de pruebas para el campo id_mensaje_enviado de tipo int4";
        $tester->cor_parametro = "Ingresar valor de pruebas para el campo cor_parametro de tipo text";
        $tester->cor_destinatario = "Ingresar valor de pruebas para el campo cor_destinatario de tipo text";
        $tester->asunto = "Ingresar valor de pruebas para el campo asunto de tipo varchar";
        $tester->id_correo = "Ingresar valor de pruebas para el campo id_correo de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new CorMensajeEnviado;
        $tester->id_mensaje_enviado = "Ingresar valor de pruebas para el campo id_mensaje_enviado de tipo int4";
        $tester->cor_parametro = "Ingresar valor de pruebas para el campo cor_parametro de tipo text";
        $tester->cor_destinatario = "Ingresar valor de pruebas para el campo cor_destinatario de tipo text";
        $tester->asunto = "Ingresar valor de pruebas para el campo asunto de tipo varchar";
        $tester->id_correo = "Ingresar valor de pruebas para el campo id_correo de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'CorMensajeEnviado  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = CorMensajeEnviado::findOne(                                                               
        [
           'id_mensaje_enviado' => "Ingresar valor de pruebas para el campo id_mensaje_enviado de tipo int4",
           'cor_parametro' => "Ingresar valor de pruebas para el campo cor_parametro de tipo text",
           'cor_destinatario' => "Ingresar valor de pruebas para el campo cor_destinatario de tipo text",
           'asunto' => "Ingresar valor de pruebas para el campo asunto de tipo varchar",
           'id_correo' => "Ingresar valor de pruebas para el campo id_correo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'CorMensajeEnviado No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'CorMensajeEnviado Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = CorMensajeEnviado::findOne(                                                               
        [
           'id_mensaje_enviado' => "Ingresar valor de pruebas para el campo id_mensaje_enviado de tipo int4",
           'cor_parametro' => "Ingresar valor de pruebas para el campo cor_parametro de tipo text",
           'cor_destinatario' => "Ingresar valor de pruebas para el campo cor_destinatario de tipo text",
           'asunto' => "Ingresar valor de pruebas para el campo asunto de tipo varchar",
           'id_correo' => "Ingresar valor de pruebas para el campo id_correo de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= CorMensajeEnviado::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new CorMensajeEnviado();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new CorMensajeEnviado();
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
         expect($tester->id_mensaje_enviado)->equals('Ingresar valor de pruebas para el campo id_mensaje_enviado de tipo int4');
         expect($tester->cor_parametro)->equals('Ingresar valor de pruebas para el campo cor_parametro de tipo text');
         expect($tester->cor_destinatario)->equals('Ingresar valor de pruebas para el campo cor_destinatario de tipo text');
         expect($tester->asunto)->equals('Ingresar valor de pruebas para el campo asunto de tipo varchar');
         expect($tester->id_correo)->equals('Ingresar valor de pruebas para el campo id_correo de tipo int4');
      }

}
