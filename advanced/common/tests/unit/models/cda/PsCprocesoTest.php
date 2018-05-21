<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\PsCproceso;
/**
 * Este es el unit test para la clase "ps_cproceso".
 *
 * @property int4 $id_cproceso
 * @property int4 $ult_id_eproceso
 * @property int4 $id_proceso
 * @property numeric $id_usuario
 * @property int4 $id_modulo
 * @property varchar $num_quipux
 * @property date $fecha_registro_quipux
 * @property varchar $asunto_quipux
 * @property varchar $tipo_documento_quipux
 * @property int4 $ult_id_actividad
 * @property numeric $ult_id_usuario
 * @property date $ult_fecha_actividad
 * @property date $ult_fecha_estado
 * @property varchar $numero
 *
 * @property Cda[] $cdas
 * @property Cda[] $cdas0
 * @property Pqrs[] $pqrs
 * @property PsActividadQuipux[] $psActividadQuipuxes
 * @property PsAlertaActividad[] $psAlertaActividads
 * @property PsCactividadProceso[] $psCactividadProcesos
 * @property FdModulo $idModulo
 * @property PsActividad $ultIdActividad
 * @property PsEstadoProceso $ultIdEproceso
 * @property PsProceso $idProceso
 * @property UsuariosAp $idUsuario
 * @property UsuariosAp $ultIdUsuario
 * @property PsHistoricoEstados[] $psHistoricoEstados
 * @property PsResponsablesProceso[] $psResponsablesProcesos
 */
class PsCprocesoTest extends \Codeception\Test\Unit
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
        $tester = new PsCproceso();
        $tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo int4";
        $tester->ult_id_eproceso = "Ingresar valor de pruebas para el campo ult_id_eproceso de tipo int4";
        $tester->id_proceso = "Ingresar valor de pruebas para el campo id_proceso de tipo int4";
        $tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo numeric";
        $tester->id_modulo = "Ingresar valor de pruebas para el campo id_modulo de tipo int4";
        $tester->num_quipux = "Ingresar valor de pruebas para el campo num_quipux de tipo varchar";
        $tester->fecha_registro_quipux = "Ingresar valor de pruebas para el campo fecha_registro_quipux de tipo date";
        $tester->asunto_quipux = "Ingresar valor de pruebas para el campo asunto_quipux de tipo varchar";
        $tester->tipo_documento_quipux = "Ingresar valor de pruebas para el campo tipo_documento_quipux de tipo varchar";
        $tester->ult_id_actividad = "Ingresar valor de pruebas para el campo ult_id_actividad de tipo int4";
        $tester->ult_id_usuario = "Ingresar valor de pruebas para el campo ult_id_usuario de tipo numeric";
        $tester->ult_fecha_actividad = "Ingresar valor de pruebas para el campo ult_fecha_actividad de tipo date";
        $tester->ult_fecha_estado = "Ingresar valor de pruebas para el campo ult_fecha_estado de tipo date";
        $tester->numero = "Ingresar valor de pruebas para el campo numero de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsCproceso;
        $tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo int4";
        $tester->ult_id_eproceso = "Ingresar valor de pruebas para el campo ult_id_eproceso de tipo int4";
        $tester->id_proceso = "Ingresar valor de pruebas para el campo id_proceso de tipo int4";
        $tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo numeric";
        $tester->id_modulo = "Ingresar valor de pruebas para el campo id_modulo de tipo int4";
        $tester->num_quipux = "Ingresar valor de pruebas para el campo num_quipux de tipo varchar";
        $tester->fecha_registro_quipux = "Ingresar valor de pruebas para el campo fecha_registro_quipux de tipo date";
        $tester->asunto_quipux = "Ingresar valor de pruebas para el campo asunto_quipux de tipo varchar";
        $tester->tipo_documento_quipux = "Ingresar valor de pruebas para el campo tipo_documento_quipux de tipo varchar";
        $tester->ult_id_actividad = "Ingresar valor de pruebas para el campo ult_id_actividad de tipo int4";
        $tester->ult_id_usuario = "Ingresar valor de pruebas para el campo ult_id_usuario de tipo numeric";
        $tester->ult_fecha_actividad = "Ingresar valor de pruebas para el campo ult_fecha_actividad de tipo date";
        $tester->ult_fecha_estado = "Ingresar valor de pruebas para el campo ult_fecha_estado de tipo date";
        $tester->numero = "Ingresar valor de pruebas para el campo numero de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsCproceso  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsCproceso::findOne(                                                               
        [
           'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",
           'ult_id_eproceso' => "Ingresar valor de pruebas para el campo ult_id_eproceso de tipo int4",
           'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",
           'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo numeric",
           'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",
           'num_quipux' => "Ingresar valor de pruebas para el campo num_quipux de tipo varchar",
           'fecha_registro_quipux' => "Ingresar valor de pruebas para el campo fecha_registro_quipux de tipo date",
           'asunto_quipux' => "Ingresar valor de pruebas para el campo asunto_quipux de tipo varchar",
           'tipo_documento_quipux' => "Ingresar valor de pruebas para el campo tipo_documento_quipux de tipo varchar",
           'ult_id_actividad' => "Ingresar valor de pruebas para el campo ult_id_actividad de tipo int4",
           'ult_id_usuario' => "Ingresar valor de pruebas para el campo ult_id_usuario de tipo numeric",
           'ult_fecha_actividad' => "Ingresar valor de pruebas para el campo ult_fecha_actividad de tipo date",
           'ult_fecha_estado' => "Ingresar valor de pruebas para el campo ult_fecha_estado de tipo date",
           'numero' => "Ingresar valor de pruebas para el campo numero de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsCproceso No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsCproceso Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsCproceso::findOne(                                                               
        [
           'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",
           'ult_id_eproceso' => "Ingresar valor de pruebas para el campo ult_id_eproceso de tipo int4",
           'id_proceso' => "Ingresar valor de pruebas para el campo id_proceso de tipo int4",
           'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo numeric",
           'id_modulo' => "Ingresar valor de pruebas para el campo id_modulo de tipo int4",
           'num_quipux' => "Ingresar valor de pruebas para el campo num_quipux de tipo varchar",
           'fecha_registro_quipux' => "Ingresar valor de pruebas para el campo fecha_registro_quipux de tipo date",
           'asunto_quipux' => "Ingresar valor de pruebas para el campo asunto_quipux de tipo varchar",
           'tipo_documento_quipux' => "Ingresar valor de pruebas para el campo tipo_documento_quipux de tipo varchar",
           'ult_id_actividad' => "Ingresar valor de pruebas para el campo ult_id_actividad de tipo int4",
           'ult_id_usuario' => "Ingresar valor de pruebas para el campo ult_id_usuario de tipo numeric",
           'ult_fecha_actividad' => "Ingresar valor de pruebas para el campo ult_fecha_actividad de tipo date",
           'ult_fecha_estado' => "Ingresar valor de pruebas para el campo ult_fecha_estado de tipo date",
           'numero' => "Ingresar valor de pruebas para el campo numero de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsCproceso::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsCproceso();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsCproceso();
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
         expect($tester->id_cproceso)->equals('Ingresar valor de pruebas para el campo id_cproceso de tipo int4');
         expect($tester->ult_id_eproceso)->equals('Ingresar valor de pruebas para el campo ult_id_eproceso de tipo int4');
         expect($tester->id_proceso)->equals('Ingresar valor de pruebas para el campo id_proceso de tipo int4');
         expect($tester->id_usuario)->equals('Ingresar valor de pruebas para el campo id_usuario de tipo numeric');
         expect($tester->id_modulo)->equals('Ingresar valor de pruebas para el campo id_modulo de tipo int4');
         expect($tester->num_quipux)->equals('Ingresar valor de pruebas para el campo num_quipux de tipo varchar');
         expect($tester->fecha_registro_quipux)->equals('Ingresar valor de pruebas para el campo fecha_registro_quipux de tipo date');
         expect($tester->asunto_quipux)->equals('Ingresar valor de pruebas para el campo asunto_quipux de tipo varchar');
         expect($tester->tipo_documento_quipux)->equals('Ingresar valor de pruebas para el campo tipo_documento_quipux de tipo varchar');
         expect($tester->ult_id_actividad)->equals('Ingresar valor de pruebas para el campo ult_id_actividad de tipo int4');
         expect($tester->ult_id_usuario)->equals('Ingresar valor de pruebas para el campo ult_id_usuario de tipo numeric');
         expect($tester->ult_fecha_actividad)->equals('Ingresar valor de pruebas para el campo ult_fecha_actividad de tipo date');
         expect($tester->ult_fecha_estado)->equals('Ingresar valor de pruebas para el campo ult_fecha_estado de tipo date');
         expect($tester->numero)->equals('Ingresar valor de pruebas para el campo numero de tipo varchar');
      }

}
