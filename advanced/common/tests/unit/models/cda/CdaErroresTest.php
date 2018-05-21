<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\CdaErrores;
/**
 * Este es el unit test para la clase "cda_errores".
 *
 * @property int4 $id_error
 * @property varchar $observaciones
 * @property int4 $id_terror
 * @property int4 $id_cda
 *
 * @property Cda $idCda
 * @property CdaTipoError $idTerror
 */
class CdaErroresTest extends \Codeception\Test\Unit
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
        $tester = new CdaErrores();
        $tester->id_error = "Ingresar valor de pruebas para el campo id_error de tipo int4";
        $tester->observaciones = "Ingresar valor de pruebas para el campo observaciones de tipo varchar";
        $tester->id_terror = "Ingresar valor de pruebas para el campo id_terror de tipo int4";
        $tester->id_cda = "Ingresar valor de pruebas para el campo id_cda de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new CdaErrores;
        $tester->id_error = "Ingresar valor de pruebas para el campo id_error de tipo int4";
        $tester->observaciones = "Ingresar valor de pruebas para el campo observaciones de tipo varchar";
        $tester->id_terror = "Ingresar valor de pruebas para el campo id_terror de tipo int4";
        $tester->id_cda = "Ingresar valor de pruebas para el campo id_cda de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'CdaErrores  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = CdaErrores::findOne(                                                               
        [
           'id_error' => "Ingresar valor de pruebas para el campo id_error de tipo int4",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'id_terror' => "Ingresar valor de pruebas para el campo id_terror de tipo int4",
           'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'CdaErrores No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'CdaErrores Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = CdaErrores::findOne(                                                               
        [
           'id_error' => "Ingresar valor de pruebas para el campo id_error de tipo int4",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'id_terror' => "Ingresar valor de pruebas para el campo id_terror de tipo int4",
           'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= CdaErrores::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new CdaErrores();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new CdaErrores();
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
         expect($tester->id_error)->equals('Ingresar valor de pruebas para el campo id_error de tipo int4');
         expect($tester->observaciones)->equals('Ingresar valor de pruebas para el campo observaciones de tipo varchar');
         expect($tester->id_terror)->equals('Ingresar valor de pruebas para el campo id_terror de tipo int4');
         expect($tester->id_cda)->equals('Ingresar valor de pruebas para el campo id_cda de tipo int4');
      }

}
