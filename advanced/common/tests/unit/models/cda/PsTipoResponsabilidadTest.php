<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\PsTipoResponsabilidad;
/**
 * Este es el unit test para la clase "ps_tipo_responsabilidad".
 *
 * @property int4 $id_tresponsabilidad
 * @property varchar $nom_responsabilidad
 * @property int4 $id_proceso
 *
 * @property PsResponsablesProceso[] $psResponsablesProcesos
 * @property PsProceso $idProceso
 */
class PsTipoResponsabilidadTest extends \Codeception\Test\Unit
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
        $tester = new PsTipoResponsabilidad();
        $tester->id_tresponsabilidad = "Ingresar valor de pruebas para el campo id_tresponsabilidad de tipo int4";
        $tester->nom_responsabilidad = "Ingresar valor de pruebas para el campo nom_responsabilidad de tipo varchar";
        $tester->id_proceso = "Ingresar valor de pruebas para el campo id_proceso de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsTipoResponsabilidad;
        $tester->id_tresponsabilidad = "Ingresar valor de pruebas para el campo id_tresponsabilidad de tipo int4";
        $tester->nom_responsabilidad = "Ingresar valor de pruebas para el campo nom_responsabilidad de tipo varchar";
        $tester->id_proceso = "Ingresar valor de pruebas para el campo id_proceso de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsTipoResponsabilidad  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsTipoResponsabilidad::findOne(                                                               
        [
           'id_tresponsabilidad' => "Ingresar valor de pruebas para el campo id_tresponsabilidad de tipo int4",
           'nom_responsabilidad' => "Ingresar valor de pruebas para el campo nom_responsabilidad de tipo varchar",
           'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsTipoResponsabilidad No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsTipoResponsabilidad Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsTipoResponsabilidad::findOne(                                                               
        [
           'id_tresponsabilidad' => "Ingresar valor de pruebas para el campo id_tresponsabilidad de tipo int4",
           'nom_responsabilidad' => "Ingresar valor de pruebas para el campo nom_responsabilidad de tipo varchar",
           'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsTipoResponsabilidad::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsTipoResponsabilidad();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsTipoResponsabilidad();
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
         expect($tester->id_tresponsabilidad)->equals('Ingresar valor de pruebas para el campo id_tresponsabilidad de tipo int4');
         expect($tester->nom_responsabilidad)->equals('Ingresar valor de pruebas para el campo nom_responsabilidad de tipo varchar');
         expect($tester->id_proceso)->equals('Ingresar valor de pruebas para el campo id_proceso de tipo int4');
      }

}
