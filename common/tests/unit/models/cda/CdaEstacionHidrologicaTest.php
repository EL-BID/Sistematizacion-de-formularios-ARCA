<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\CdaEstacionHidrologica;
/**
 * Este es el unit test para la clase "cda_estacion_hidrologica".
 *
 * @property varchar $id_ehidrografica
 * @property varchar $nom_ehidrografica
 *
 * @property CdaAnalisisHidrologico[] $cdaAnalisisHidrologicos
 */
class CdaEstacionHidrologicaTest extends \Codeception\Test\Unit
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
        $tester = new CdaEstacionHidrologica();
        $tester->id_ehidrografica = "Ingresar valor de pruebas para el campo id_ehidrografica de tipo varchar";
        $tester->nom_ehidrografica = "Ingresar valor de pruebas para el campo nom_ehidrografica de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new CdaEstacionHidrologica;
        $tester->id_ehidrografica = "Ingresar valor de pruebas para el campo id_ehidrografica de tipo varchar";
        $tester->nom_ehidrografica = "Ingresar valor de pruebas para el campo nom_ehidrografica de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'CdaEstacionHidrologica  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = CdaEstacionHidrologica::findOne(                                                               
        [
           'id_ehidrografica' => "Ingresar valor de pruebas para el campo id_ehidrografica de tipo varchar",
           'nom_ehidrografica' => "Ingresar valor de pruebas para el campo nom_ehidrografica de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'CdaEstacionHidrologica No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'CdaEstacionHidrologica Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = CdaEstacionHidrologica::findOne(                                                               
        [
           'id_ehidrografica' => "Ingresar valor de pruebas para el campo id_ehidrografica de tipo varchar",
           'nom_ehidrografica' => "Ingresar valor de pruebas para el campo nom_ehidrografica de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= CdaEstacionHidrologica::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new CdaEstacionHidrologica();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new CdaEstacionHidrologica();
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
         expect($tester->id_ehidrografica)->equals('Ingresar valor de pruebas para el campo id_ehidrografica de tipo varchar');
         expect($tester->nom_ehidrografica)->equals('Ingresar valor de pruebas para el campo nom_ehidrografica de tipo varchar');
      }

}
