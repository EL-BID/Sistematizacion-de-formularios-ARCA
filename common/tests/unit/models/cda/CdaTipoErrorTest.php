<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\CdaTipoError;
/**
 * Este es el unit test para la clase "cda_tipo_error".
 *
 * @property int4 $id_terror
 * @property varchar $nom_terror
 *
 * @property CdaErrores[] $cdaErrores
 */
class CdaTipoErrorTest extends \Codeception\Test\Unit
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
        $tester = new CdaTipoError();
        $tester->id_terror = "Ingresar valor de pruebas para el campo id_terror de tipo int4";
        $tester->nom_terror = "Ingresar valor de pruebas para el campo nom_terror de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new CdaTipoError;
        $tester->id_terror = "Ingresar valor de pruebas para el campo id_terror de tipo int4";
        $tester->nom_terror = "Ingresar valor de pruebas para el campo nom_terror de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'CdaTipoError  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = CdaTipoError::findOne(                                                               
        [
           'id_terror' => "Ingresar valor de pruebas para el campo id_terror de tipo int4",
           'nom_terror' => "Ingresar valor de pruebas para el campo nom_terror de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'CdaTipoError No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'CdaTipoError Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = CdaTipoError::findOne(                                                               
        [
           'id_terror' => "Ingresar valor de pruebas para el campo id_terror de tipo int4",
           'nom_terror' => "Ingresar valor de pruebas para el campo nom_terror de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= CdaTipoError::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new CdaTipoError();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new CdaTipoError();
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
         expect($tester->id_terror)->equals('Ingresar valor de pruebas para el campo id_terror de tipo int4');
         expect($tester->nom_terror)->equals('Ingresar valor de pruebas para el campo nom_terror de tipo varchar');
      }

}
