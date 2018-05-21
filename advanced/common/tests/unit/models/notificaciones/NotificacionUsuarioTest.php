<?php

namespace common\tests\unit\models\notificaciones;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\notificaciones\NotificacionUsuario;
/**
 * Este es el unit test para la clase "notificacion_usuario".
 *
 * @property numeric $id_usuario
 * @property varchar $password
 * @property date $fecha
 * @property int4 $id_formato
 */
class NotificacionUsuarioTest extends \Codeception\Test\Unit
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
        $tester = new NotificacionUsuario();
        $tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo numeric";
        $tester->password = "Ingresar valor de pruebas para el campo password de tipo varchar";
        $tester->fecha = "Ingresar valor de pruebas para el campo fecha de tipo date";
        $tester->id_formato = "Ingresar valor de pruebas para el campo id_formato de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new NotificacionUsuario;
        $tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo numeric";
        $tester->password = "Ingresar valor de pruebas para el campo password de tipo varchar";
        $tester->fecha = "Ingresar valor de pruebas para el campo fecha de tipo date";
        $tester->id_formato = "Ingresar valor de pruebas para el campo id_formato de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'NotificacionUsuario  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = NotificacionUsuario::findOne(                                                               
        [
           'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo numeric",
           'password' => "Ingresar valor de pruebas para el campo password de tipo varchar",
           'fecha' => "Ingresar valor de pruebas para el campo fecha de tipo date",
           'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'NotificacionUsuario No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'NotificacionUsuario Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = NotificacionUsuario::findOne(                                                               
        [
           'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo numeric",
           'password' => "Ingresar valor de pruebas para el campo password de tipo varchar",
           'fecha' => "Ingresar valor de pruebas para el campo fecha de tipo date",
           'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= NotificacionUsuario::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new NotificacionUsuario();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new NotificacionUsuario();
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
         expect($tester->id_usuario)->equals('Ingresar valor de pruebas para el campo id_usuario de tipo numeric');
         expect($tester->password)->equals('Ingresar valor de pruebas para el campo password de tipo varchar');
         expect($tester->fecha)->equals('Ingresar valor de pruebas para el campo fecha de tipo date');
         expect($tester->id_formato)->equals('Ingresar valor de pruebas para el campo id_formato de tipo int4');
      }

}
