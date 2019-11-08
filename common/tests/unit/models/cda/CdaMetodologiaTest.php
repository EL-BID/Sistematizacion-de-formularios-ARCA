<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\CdaMetodologia;
/**
 * Este es el unit test para la clase "cda_metodologia".
 *
 * @property int4 $id_metodologia
 * @property varchar $nom_metodologia
 *
 * @property CdaAnalisisHidrologico[] $cdaAnalisisHidrologicos
 */
class CdaMetodologiaTest extends \Codeception\Test\Unit
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
        $tester = new CdaMetodologia();
        $tester->id_metodologia = "Ingresar valor de pruebas para el campo id_metodologia de tipo int4";
        $tester->nom_metodologia = "Ingresar valor de pruebas para el campo nom_metodologia de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new CdaMetodologia;
        $tester->id_metodologia = "Ingresar valor de pruebas para el campo id_metodologia de tipo int4";
        $tester->nom_metodologia = "Ingresar valor de pruebas para el campo nom_metodologia de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'CdaMetodologia  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = CdaMetodologia::findOne(                                                               
        [
           'id_metodologia' => "Ingresar valor de pruebas para el campo id_metodologia de tipo int4",
           'nom_metodologia' => "Ingresar valor de pruebas para el campo nom_metodologia de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'CdaMetodologia No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'CdaMetodologia Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = CdaMetodologia::findOne(                                                               
        [
           'id_metodologia' => "Ingresar valor de pruebas para el campo id_metodologia de tipo int4",
           'nom_metodologia' => "Ingresar valor de pruebas para el campo nom_metodologia de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= CdaMetodologia::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new CdaMetodologia();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new CdaMetodologia();
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
         expect($tester->id_metodologia)->equals('Ingresar valor de pruebas para el campo id_metodologia de tipo int4');
         expect($tester->nom_metodologia)->equals('Ingresar valor de pruebas para el campo nom_metodologia de tipo varchar');
      }

}
