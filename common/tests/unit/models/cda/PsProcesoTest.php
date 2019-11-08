<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\PsProceso;
/**
 * Este es el unit test para la clase "ps_proceso".
 *
 * @property int4 $id_proceso
 * @property varchar $nom_proceso
 * @property int4 $id_tproceso
 * @property int4 $id_modulo
 * @property varchar $url_datos_basicos
 *
 * @property PsActividad[] $psActividads
 * @property PsCproceso[] $psCprocesos
 * @property PsEstadoProceso[] $psEstadoProcesos
 * @property FdModulo $idModulo
 * @property PsTipoProceso $idTproceso
 * @property PsTipoResponsabilidad[] $psTipoResponsabilidads
 */
class PsProcesoTest extends \Codeception\Test\Unit
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
        $tester = new PsProceso();
        $tester->id_proceso = "Ingresar valor de pruebas para el campo id_proceso de tipo int4";
        $tester->nom_proceso = "Ingresar valor de pruebas para el campo nom_proceso de tipo varchar";
        $tester->id_tproceso = "Ingresar valor de pruebas para el campo id_tproceso de tipo int4";
        $tester->id_modulo = "Ingresar valor de pruebas para el campo id_modulo de tipo int4";
        $tester->url_datos_basicos = "Ingresar valor de pruebas para el campo url_datos_basicos de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsProceso;
        $tester->id_proceso = "Ingresar valor de pruebas para el campo id_proceso de tipo int4";
        $tester->nom_proceso = "Ingresar valor de pruebas para el campo nom_proceso de tipo varchar";
        $tester->id_tproceso = "Ingresar valor de pruebas para el campo id_tproceso de tipo int4";
        $tester->id_modulo = "Ingresar valor de pruebas para el campo id_modulo de tipo int4";
        $tester->url_datos_basicos = "Ingresar valor de pruebas para el campo url_datos_basicos de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsProceso  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsProceso::findOne(                                                               
        [
           'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",
           'nom_proceso' => "Ingresar valor de pruebas para el campo nom_proceso de tipo varchar",
           'id_tproceso' => "Ingresar valor de pruebas para el campo id_tproceso de tipo int4",
           'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",
           'url_datos_basicos' => "Ingresar valor de pruebas para el campo url_datos_basicos de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsProceso No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsProceso Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsProceso::findOne(                                                               
        [
           'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",
           'nom_proceso' => "Ingresar valor de pruebas para el campo nom_proceso de tipo varchar",
           'id_tproceso' => "Ingresar valor de pruebas para el campo id_tproceso de tipo int4",
           'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",
           'url_datos_basicos' => "Ingresar valor de pruebas para el campo url_datos_basicos de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsProceso::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsProceso();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsProceso();
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
         expect($tester->id_proceso)->equals('Ingresar valor de pruebas para el campo id_proceso de tipo int4');
         expect($tester->nom_proceso)->equals('Ingresar valor de pruebas para el campo nom_proceso de tipo varchar');
         expect($tester->id_tproceso)->equals('Ingresar valor de pruebas para el campo id_tproceso de tipo int4');
         expect($tester->id_modulo)->equals('Ingresar valor de pruebas para el campo id_modulo de tipo int4');
         expect($tester->url_datos_basicos)->equals('Ingresar valor de pruebas para el campo url_datos_basicos de tipo varchar');
      }

}
