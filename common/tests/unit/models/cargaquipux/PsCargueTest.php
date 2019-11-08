<?php

namespace common\tests\unit\models\cargaquipux;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cargaquipux\PsCargue;
/**
 * Este es el unit test para la clase "ps_cargue".
 *
 * @property int4 $id_cargues
 * @property varchar $ruta
 * @property varchar $procesado
 * @property date $fecha_cargue
 * @property date $fecha_proceso
 * @property int4 $id_archivo_cargue
 *
 * @property PsArchivoCargue $idArchivoCargue
 */
class PsCargueTest extends \Codeception\Test\Unit
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
        $tester = new PsCargue();
        $tester->id_cargues = "Ingresar valor de pruebas para el campo id_cargues de tipo int4";
        $tester->ruta = "Ingresar valor de pruebas para el campo ruta de tipo varchar";
        $tester->procesado = "Ingresar valor de pruebas para el campo procesado de tipo varchar";
        $tester->fecha_cargue = "Ingresar valor de pruebas para el campo fecha_cargue de tipo date";
        $tester->fecha_proceso = "Ingresar valor de pruebas para el campo fecha_proceso de tipo date";
        $tester->id_archivo_cargue = "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsCargue;
        $tester->id_cargues = "Ingresar valor de pruebas para el campo id_cargues de tipo int4";
        $tester->ruta = "Ingresar valor de pruebas para el campo ruta de tipo varchar";
        $tester->procesado = "Ingresar valor de pruebas para el campo procesado de tipo varchar";
        $tester->fecha_cargue = "Ingresar valor de pruebas para el campo fecha_cargue de tipo date";
        $tester->fecha_proceso = "Ingresar valor de pruebas para el campo fecha_proceso de tipo date";
        $tester->id_archivo_cargue = "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsCargue  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsCargue::findOne(                                                               
        [
           'id_cargues' => "Ingresar valor de pruebas para el campo id_cargues de tipo int4",
           'ruta' => "Ingresar valor de pruebas para el campo ruta de tipo varchar",
           'procesado' => "Ingresar valor de pruebas para el campo procesado de tipo varchar",
           'fecha_cargue' => "Ingresar valor de pruebas para el campo fecha_cargue de tipo date",
           'fecha_proceso' => "Ingresar valor de pruebas para el campo fecha_proceso de tipo date",
           'id_archivo_cargue' => "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsCargue No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsCargue Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsCargue::findOne(                                                               
        [
           'id_cargues' => "Ingresar valor de pruebas para el campo id_cargues de tipo int4",
           'ruta' => "Ingresar valor de pruebas para el campo ruta de tipo varchar",
           'procesado' => "Ingresar valor de pruebas para el campo procesado de tipo varchar",
           'fecha_cargue' => "Ingresar valor de pruebas para el campo fecha_cargue de tipo date",
           'fecha_proceso' => "Ingresar valor de pruebas para el campo fecha_proceso de tipo date",
           'id_archivo_cargue' => "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsCargue::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsCargue();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsCargue();
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
         expect($tester->id_cargues)->equals('Ingresar valor de pruebas para el campo id_cargues de tipo int4');
         expect($tester->ruta)->equals('Ingresar valor de pruebas para el campo ruta de tipo varchar');
         expect($tester->procesado)->equals('Ingresar valor de pruebas para el campo procesado de tipo varchar');
         expect($tester->fecha_cargue)->equals('Ingresar valor de pruebas para el campo fecha_cargue de tipo date');
         expect($tester->fecha_proceso)->equals('Ingresar valor de pruebas para el campo fecha_proceso de tipo date');
         expect($tester->id_archivo_cargue)->equals('Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4');
      }

}
