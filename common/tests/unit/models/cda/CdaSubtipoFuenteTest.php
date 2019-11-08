<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\CdaSubtipoFuente;
/**
 * Este es el unit test para la clase "cda_subtipo_fuente".
 *
 * @property int4 $id_subtfuente
 * @property varchar $nom_subtfuente
 *
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 */
class CdaSubtipoFuenteTest extends \Codeception\Test\Unit
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
        $tester = new CdaSubtipoFuente();
        $tester->id_subtfuente = "Ingresar valor de pruebas para el campo id_subtfuente de tipo int4";
        $tester->nom_subtfuente = "Ingresar valor de pruebas para el campo nom_subtfuente de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new CdaSubtipoFuente;
        $tester->id_subtfuente = "Ingresar valor de pruebas para el campo id_subtfuente de tipo int4";
        $tester->nom_subtfuente = "Ingresar valor de pruebas para el campo nom_subtfuente de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'CdaSubtipoFuente  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = CdaSubtipoFuente::findOne(                                                               
        [
           'id_subtfuente' => "Ingresar valor de pruebas para el campo id_subtfuente de tipo int4",
           'nom_subtfuente' => "Ingresar valor de pruebas para el campo nom_subtfuente de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'CdaSubtipoFuente No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'CdaSubtipoFuente Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = CdaSubtipoFuente::findOne(                                                               
        [
           'id_subtfuente' => "Ingresar valor de pruebas para el campo id_subtfuente de tipo int4",
           'nom_subtfuente' => "Ingresar valor de pruebas para el campo nom_subtfuente de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= CdaSubtipoFuente::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new CdaSubtipoFuente();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new CdaSubtipoFuente();
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
         expect($tester->id_subtfuente)->equals('Ingresar valor de pruebas para el campo id_subtfuente de tipo int4');
         expect($tester->nom_subtfuente)->equals('Ingresar valor de pruebas para el campo nom_subtfuente de tipo varchar');
      }

}
