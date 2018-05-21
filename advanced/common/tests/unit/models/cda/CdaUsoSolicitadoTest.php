<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\CdaUsoSolicitado;
/**
 * Este es el unit test para la clase "cda_uso_solicitado".
 *
 * @property int4 $id_uso_solicitado
 * @property varchar $nom_uso_solicitado
 *
 * @property CdaReporteInformacion[] $cdaReporteInformacions
 */
class CdaUsoSolicitadoTest extends \Codeception\Test\Unit
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
        $tester = new CdaUsoSolicitado();
        $tester->id_uso_solicitado = "Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4";
        $tester->nom_uso_solicitado = "Ingresar valor de pruebas para el campo nom_uso_solicitado de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new CdaUsoSolicitado;
        $tester->id_uso_solicitado = "Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4";
        $tester->nom_uso_solicitado = "Ingresar valor de pruebas para el campo nom_uso_solicitado de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'CdaUsoSolicitado  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = CdaUsoSolicitado::findOne(                                                               
        [
           'id_uso_solicitado' => "Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4",
           'nom_uso_solicitado' => "Ingresar valor de pruebas para el campo nom_uso_solicitado de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'CdaUsoSolicitado No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'CdaUsoSolicitado Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = CdaUsoSolicitado::findOne(                                                               
        [
           'id_uso_solicitado' => "Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4",
           'nom_uso_solicitado' => "Ingresar valor de pruebas para el campo nom_uso_solicitado de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= CdaUsoSolicitado::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new CdaUsoSolicitado();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new CdaUsoSolicitado();
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
         expect($tester->id_uso_solicitado)->equals('Ingresar valor de pruebas para el campo id_uso_solicitado de tipo int4');
         expect($tester->nom_uso_solicitado)->equals('Ingresar valor de pruebas para el campo nom_uso_solicitado de tipo varchar');
      }

}
