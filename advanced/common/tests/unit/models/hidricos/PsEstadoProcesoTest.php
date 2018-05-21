<?php

namespace common\tests\unit\models\hidricos;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\hidricos\PsEstadoProceso;
/**
 * Este es el unit test para la clase "ps_estado_proceso".
 *
 * @property int4 $id_eproceso
 * @property varchar $nom_eproceso
 * @property int4 $id_proceso
 *
 * @property PsActvidadRuta[] $psActvidadRutas
 * @property PsCproceso[] $psCprocesos
 * @property PsProceso $idProceso
 * @property PsHistoricoEstados[] $psHistoricoEstados
 */
class PsEstadoProcesoTest extends \Codeception\Test\Unit
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
        $tester = new PsEstadoProceso();
        $tester->id_eproceso = "Ingresar valor de pruebas para el campo id_eproceso de tipo int4";
        $tester->nom_eproceso = "Ingresar valor de pruebas para el campo nom_eproceso de tipo varchar";
        $tester->id_proceso = "Ingresar valor de pruebas para el campo id_proceso de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsEstadoProceso;
        $tester->id_eproceso = "Ingresar valor de pruebas para el campo id_eproceso de tipo int4";
        $tester->nom_eproceso = "Ingresar valor de pruebas para el campo nom_eproceso de tipo varchar";
        $tester->id_proceso = "Ingresar valor de pruebas para el campo id_proceso de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsEstadoProceso  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsEstadoProceso::findOne(                                                               
        [
           'id_eproceso' => "Ingresar valor de pruebas para el campo id_eproceso de tipo int4",
           'nom_eproceso' => "Ingresar valor de pruebas para el campo nom_eproceso de tipo varchar",
           'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsEstadoProceso No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsEstadoProceso Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsEstadoProceso::findOne(                                                               
        [
           'id_eproceso' => "Ingresar valor de pruebas para el campo id_eproceso de tipo int4",
           'nom_eproceso' => "Ingresar valor de pruebas para el campo nom_eproceso de tipo varchar",
           'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsEstadoProceso::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsEstadoProceso();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsEstadoProceso();
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
         expect($tester->id_eproceso)->equals('Ingresar valor de pruebas para el campo id_eproceso de tipo int4');
         expect($tester->nom_eproceso)->equals('Ingresar valor de pruebas para el campo nom_eproceso de tipo varchar');
         expect($tester->id_proceso)->equals('Ingresar valor de pruebas para el campo id_proceso de tipo int4');
      }

}
