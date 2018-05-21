<?php

namespace common\tests\unit\models\hidricos;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\hidricos\PsActividad;
/**
 * Este es el unit test para la clase "ps_actividad".
 *
 * @property int4 $id_actividad
 * @property varchar $nom_actividad
 * @property int4 $orden
 * @property int4 $id_proceso
 * @property int4 $id_tactividad
 * @property varchar $subpantalla
 *
 * @property PsProceso $idProceso
 * @property PsTipoActividad $idTactividad
 * @property PsActvidadRuta[] $psActvidadRutas
 * @property PsActvidadRuta[] $psActvidadRutas0
 * @property PsCactividadProceso[] $psCactividadProcesos
 * @property PsCproceso[] $psCprocesos
 * @property PsHistoricoEstados[] $psHistoricoEstados
 */
class PsActividadTest extends \Codeception\Test\Unit
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
        $tester = new PsActividad();
        $tester->id_actividad = "Ingresar valor de pruebas para el campo id_actividad de tipo int4";
        $tester->nom_actividad = "Ingresar valor de pruebas para el campo nom_actividad de tipo varchar";
        $tester->orden = "Ingresar valor de pruebas para el campo orden de tipo int4";
        $tester->id_proceso = "Ingresar valor de pruebas para el campo id_proceso de tipo int4";
        $tester->id_tactividad = "Ingresar valor de pruebas para el campo id_tactividad de tipo int4";
        $tester->subpantalla = "Ingresar valor de pruebas para el campo subpantalla de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsActividad;
        $tester->id_actividad = "Ingresar valor de pruebas para el campo id_actividad de tipo int4";
        $tester->nom_actividad = "Ingresar valor de pruebas para el campo nom_actividad de tipo varchar";
        $tester->orden = "Ingresar valor de pruebas para el campo orden de tipo int4";
        $tester->id_proceso = "Ingresar valor de pruebas para el campo id_proceso de tipo int4";
        $tester->id_tactividad = "Ingresar valor de pruebas para el campo id_tactividad de tipo int4";
        $tester->subpantalla = "Ingresar valor de pruebas para el campo subpantalla de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsActividad  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsActividad::findOne(                                                               
        [
           'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",
           'nom_actividad' => "Ingresar valor de pruebas para el campo nom_actividad de tipo varchar",
           'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",
           'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",
           'id_tactividad' => "Ingresar valor de pruebas para el campo id_tactividad de tipo int4",
           'subpantalla' => "Ingresar valor de pruebas para el campo subpantalla de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsActividad No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsActividad Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsActividad::findOne(                                                               
        [
           'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",
           'nom_actividad' => "Ingresar valor de pruebas para el campo nom_actividad de tipo varchar",
           'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",
           'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",
           'id_tactividad' => "Ingresar valor de pruebas para el campo id_tactividad de tipo int4",
           'subpantalla' => "Ingresar valor de pruebas para el campo subpantalla de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsActividad::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsActividad();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsActividad();
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
         expect($tester->id_actividad)->equals('Ingresar valor de pruebas para el campo id_actividad de tipo int4');
         expect($tester->nom_actividad)->equals('Ingresar valor de pruebas para el campo nom_actividad de tipo varchar');
         expect($tester->orden)->equals('Ingresar valor de pruebas para el campo orden de tipo int4');
         expect($tester->id_proceso)->equals('Ingresar valor de pruebas para el campo id_proceso de tipo int4');
         expect($tester->id_tactividad)->equals('Ingresar valor de pruebas para el campo id_tactividad de tipo int4');
         expect($tester->subpantalla)->equals('Ingresar valor de pruebas para el campo subpantalla de tipo varchar');
      }

}
