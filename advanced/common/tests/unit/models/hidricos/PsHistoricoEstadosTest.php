<?php

namespace common\tests\unit\models\hidricos;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\hidricos\PsHistoricoEstados;
/**
 * Este es el unit test para la clase "ps_historico_estados".
 *
 * @property int4 $id_hisotrico_cproceso
 * @property date $fecha_estado
 * @property varchar $observaciones
 * @property int4 $id_eproceso
 * @property int4 $id_cproceso
 * @property int4 $id_usuario
 * @property int4 $id_actividad
 * @property int4 $id_tgestion
 *
 * @property PsActividad $idActividad
 * @property PsCproceso $idCproceso
 * @property PsEstadoProceso $idEproceso
 * @property PsTipoGestion $idTgestion
 * @property UsuariosAp $idUsuario
 */
class PsHistoricoEstadosTest extends \Codeception\Test\Unit
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
        $tester = new PsHistoricoEstados();
        $tester->id_hisotrico_cproceso = "Ingresar valor de pruebas para el campo id_hisotrico_cproceso de tipo int4";
        $tester->fecha_estado = "Ingresar valor de pruebas para el campo fecha_estado de tipo date";
        $tester->observaciones = "Ingresar valor de pruebas para el campo observaciones de tipo varchar";
        $tester->id_eproceso = "Ingresar valor de pruebas para el campo id_eproceso de tipo int4";
        $tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo int4";
        $tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo int4";
        $tester->id_actividad = "Ingresar valor de pruebas para el campo id_actividad de tipo int4";
        $tester->id_tgestion = "Ingresar valor de pruebas para el campo id_tgestion de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsHistoricoEstados;
        $tester->id_hisotrico_cproceso = "Ingresar valor de pruebas para el campo id_hisotrico_cproceso de tipo int4";
        $tester->fecha_estado = "Ingresar valor de pruebas para el campo fecha_estado de tipo date";
        $tester->observaciones = "Ingresar valor de pruebas para el campo observaciones de tipo varchar";
        $tester->id_eproceso = "Ingresar valor de pruebas para el campo id_eproceso de tipo int4";
        $tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo int4";
        $tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo int4";
        $tester->id_actividad = "Ingresar valor de pruebas para el campo id_actividad de tipo int4";
        $tester->id_tgestion = "Ingresar valor de pruebas para el campo id_tgestion de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsHistoricoEstados  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsHistoricoEstados::findOne(                                                               
        [
           'id_hisotrico_cproceso' => "Ingresar valor de pruebas para el campo id_hisotrico_cproceso de tipo int4",
           'fecha_estado' => "Ingresar valor de pruebas para el campo fecha_estado de tipo date",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'id_eproceso' => "Ingresar valor de pruebas para el campo id_eproceso de tipo int4",
           'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",
           'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo int4",
           'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",
           'id_tgestion' => "Ingresar valor de pruebas para el campo id_tgestion de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsHistoricoEstados No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsHistoricoEstados Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsHistoricoEstados::findOne(                                                               
        [
           'id_hisotrico_cproceso' => "Ingresar valor de pruebas para el campo id_hisotrico_cproceso de tipo int4",
           'fecha_estado' => "Ingresar valor de pruebas para el campo fecha_estado de tipo date",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'id_eproceso' => "Ingresar valor de pruebas para el campo id_eproceso de tipo int4",
           'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",
           'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo int4",
           'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",
           'id_tgestion' => "Ingresar valor de pruebas para el campo id_tgestion de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsHistoricoEstados::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsHistoricoEstados();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsHistoricoEstados();
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
         expect($tester->id_hisotrico_cproceso)->equals('Ingresar valor de pruebas para el campo id_hisotrico_cproceso de tipo int4');
         expect($tester->fecha_estado)->equals('Ingresar valor de pruebas para el campo fecha_estado de tipo date');
         expect($tester->observaciones)->equals('Ingresar valor de pruebas para el campo observaciones de tipo varchar');
         expect($tester->id_eproceso)->equals('Ingresar valor de pruebas para el campo id_eproceso de tipo int4');
         expect($tester->id_cproceso)->equals('Ingresar valor de pruebas para el campo id_cproceso de tipo int4');
         expect($tester->id_usuario)->equals('Ingresar valor de pruebas para el campo id_usuario de tipo int4');
         expect($tester->id_actividad)->equals('Ingresar valor de pruebas para el campo id_actividad de tipo int4');
         expect($tester->id_tgestion)->equals('Ingresar valor de pruebas para el campo id_tgestion de tipo int4');
      }

}
