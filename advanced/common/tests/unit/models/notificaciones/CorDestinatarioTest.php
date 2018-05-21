<?php

namespace common\tests\unit\models\notificaciones;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\notificaciones\CorDestinatario;
/**
 * Este es el unit test para la clase "cor_destinatario".
 *
 * @property int4 $id_destinatario
 * @property varchar $val_defecto
 * @property text $consulta_sql
 * @property int4 $id_correo
 * @property int4 $id_tdestinatario
 *
 * @property CorCorreo $idCorreo
 * @property CorTipoDestinatario $idTdestinatario
 */
class CorDestinatarioTest extends \Codeception\Test\Unit
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
        $tester = new CorDestinatario();
        $tester->id_destinatario = "Ingresar valor de pruebas para el campo id_destinatario de tipo int4";
        $tester->val_defecto = "Ingresar valor de pruebas para el campo val_defecto de tipo varchar";
        $tester->consulta_sql = "Ingresar valor de pruebas para el campo consulta_sql de tipo text";
        $tester->id_correo = "Ingresar valor de pruebas para el campo id_correo de tipo int4";
        $tester->id_tdestinatario = "Ingresar valor de pruebas para el campo id_tdestinatario de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new CorDestinatario;
        $tester->id_destinatario = "Ingresar valor de pruebas para el campo id_destinatario de tipo int4";
        $tester->val_defecto = "Ingresar valor de pruebas para el campo val_defecto de tipo varchar";
        $tester->consulta_sql = "Ingresar valor de pruebas para el campo consulta_sql de tipo text";
        $tester->id_correo = "Ingresar valor de pruebas para el campo id_correo de tipo int4";
        $tester->id_tdestinatario = "Ingresar valor de pruebas para el campo id_tdestinatario de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'CorDestinatario  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = CorDestinatario::findOne(                                                               
        [
           'id_destinatario' => "Ingresar valor de pruebas para el campo id_destinatario de tipo int4",
           'val_defecto' => "Ingresar valor de pruebas para el campo val_defecto de tipo varchar",
           'consulta_sql' => "Ingresar valor de pruebas para el campo consulta_sql de tipo text",
           'id_correo' => "Ingresar valor de pruebas para el campo id_correo de tipo int4",
           'id_tdestinatario' => "Ingresar valor de pruebas para el campo id_tdestinatario de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'CorDestinatario No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'CorDestinatario Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = CorDestinatario::findOne(                                                               
        [
           'id_destinatario' => "Ingresar valor de pruebas para el campo id_destinatario de tipo int4",
           'val_defecto' => "Ingresar valor de pruebas para el campo val_defecto de tipo varchar",
           'consulta_sql' => "Ingresar valor de pruebas para el campo consulta_sql de tipo text",
           'id_correo' => "Ingresar valor de pruebas para el campo id_correo de tipo int4",
           'id_tdestinatario' => "Ingresar valor de pruebas para el campo id_tdestinatario de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= CorDestinatario::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new CorDestinatario();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new CorDestinatario();
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
         expect($tester->id_destinatario)->equals('Ingresar valor de pruebas para el campo id_destinatario de tipo int4');
         expect($tester->val_defecto)->equals('Ingresar valor de pruebas para el campo val_defecto de tipo varchar');
         expect($tester->consulta_sql)->equals('Ingresar valor de pruebas para el campo consulta_sql de tipo text');
         expect($tester->id_correo)->equals('Ingresar valor de pruebas para el campo id_correo de tipo int4');
         expect($tester->id_tdestinatario)->equals('Ingresar valor de pruebas para el campo id_tdestinatario de tipo int4');
      }

}
