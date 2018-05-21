<?php

namespace common\models\tests\unit\hidricos;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\hidricos\PsCproceso;
/**
 * Este es el unit test para la clase "ps_cproceso".
 *
 * @property integer $id_cproceso
 * @property integer $ult_id_eproceso
 * @property integer $id_proceso
 * @property integer $id_usuario
 * @property integer $id_modulo
 * @property string $num_quipux
 * @property string $fecha_registro_quipux
 * @property string $asunto_quipux
 * @property string $tipo_documento_quipux
 * @property integer $ult_id_actividad
 * @property integer $ult_id_usuario
 * @property string $ult_fecha_actividad
 * @property string $ult_fecha_estado
 * @property string $numero
 *
 * @property Cda[] $cdas
 * @property Cda[] $cdas0
 * @property Pqrs[] $pqrs
 * @property PsActividadQuipux[] $psActividadQuipuxes
 * @property PsCactividadProceso[] $psCactividadProcesos
 * @property FdModulo $idModulo
 * @property PsActividad $ultIdActividad
 * @property PsEstadoProceso $ultIdEproceso
 * @property PsProceso $idProceso
 * @property UsuariosAp $ultIdUsuario
 * @property PsHistoricoEstados[] $psHistoricoEstados
 * @property PsResponsablesProceso[] $psResponsablesProcesos
 */
class PsCprocesoTest extends \Codeception\Test\Unit
{

    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester = new  PsCproceso;
    }


                                                                 
                                                                                             
    protected function _after()                                                              
    {             
    
        /** Se pregunta si aun existe el registro despues de probar*/
        if($this->tester)                                                                      
        {                                                                                    
            $this->tester->delete();                                                           
        }                                                                                    
    }                
    
    
     
                                                                                             
    protected function testInsert()                                                             
    {                                                                                        
        
               $this->tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo integer";
 
               $this->tester->ult_id_eproceso = "Ingresar valor de pruebas para el campo ult_id_eproceso de tipo integer";
 
               $this->tester->id_proceso = "Ingresar valor de pruebas para el campo id_proceso de tipo integer";
 
               $this->tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo integer";
 
               $this->tester->id_modulo = "Ingresar valor de pruebas para el campo id_modulo de tipo integer";
 
               $this->tester->num_quipux = "Ingresar valor de pruebas para el campo num_quipux de tipo string";
 
               $this->tester->fecha_registro_quipux = "Ingresar valor de pruebas para el campo fecha_registro_quipux de tipo string";
 
               $this->tester->asunto_quipux = "Ingresar valor de pruebas para el campo asunto_quipux de tipo string";
 
               $this->tester->tipo_documento_quipux = "Ingresar valor de pruebas para el campo tipo_documento_quipux de tipo string";
 
               $this->tester->ult_id_actividad = "Ingresar valor de pruebas para el campo ult_id_actividad de tipo integer";
 
               $this->tester->ult_id_usuario = "Ingresar valor de pruebas para el campo ult_id_usuario de tipo integer";
 
               $this->tester->ult_fecha_actividad = "Ingresar valor de pruebas para el campo ult_fecha_actividad de tipo string";
 
               $this->tester->ult_fecha_estado = "Ingresar valor de pruebas para el campo ult_fecha_estado de tipo string";
 
               $this->tester->numero = "Ingresar valor de pruebas para el campo numero de tipo string";
 
                          /** Tablas en donde se encuentra como llave foranea */
                   $this->tester->cdas = "Colocar un valor valido para la llave foranea Cda[] $cdas";
 
                       $this->tester->cdas0 = "Colocar un valor valido para la llave foranea Cda[] $cdas0";
 
                       $this->tester->pqrs = "Colocar un valor valido para la llave foranea Pqrs[] $pqrs";
 
                       $this->tester->psActividadQuipuxes = "Colocar un valor valido para la llave foranea PsActividadQuipux[] $psActividadQuipuxes";
 
                       $this->tester->psCactividadProcesos = "Colocar un valor valido para la llave foranea PsCactividadProceso[] $psCactividadProcesos";
 
                       $this->tester->idModulo = "Colocar un valor valido para la llave foranea FdModulo $idModulo";
 
                       $this->tester->ultIdActividad = "Colocar un valor valido para la llave foranea PsActividad $ultIdActividad";
 
                       $this->tester->ultIdEproceso = "Colocar un valor valido para la llave foranea PsEstadoProceso $ultIdEproceso";
 
                       $this->tester->idProceso = "Colocar un valor valido para la llave foranea PsProceso $idProceso";
 
                       $this->tester->ultIdUsuario = "Colocar un valor valido para la llave foranea UsuariosAp $ultIdUsuario";
 
                       $this->tester->psHistoricoEstados = "Colocar un valor valido para la llave foranea PsHistoricoEstados[] $psHistoricoEstados";
 
                       $this->tester->psResponsablesProcesos = "Colocar un valor valido para la llave foranea PsResponsablesProceso[] $psResponsablesProcesos";
 
                          
        $this->tester->save();
        $this->assertNotNull($tester,                                                          
            'PsCproceso  puede ser insertado en la base de datos.');      
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $pscproceso= PsCproceso::findOne(                                                               
            [

                                                     'id_cproceso' => $this->tester->id_cproceso                    ,
                                     'ult_id_eproceso' => $this->tester->ult_id_eproceso                    ,
                                     'id_proceso' => $this->tester->id_proceso                    ,
                                     'id_usuario' => $this->tester->id_usuario                    ,
                                     'id_modulo' => $this->tester->id_modulo                    ,
                                     'num_quipux' => $this->tester->num_quipux                    ,
                                     'fecha_registro_quipux' => $this->tester->fecha_registro_quipux                    ,
                                     'asunto_quipux' => $this->tester->asunto_quipux                    ,
                                     'tipo_documento_quipux' => $this->tester->tipo_documento_quipux                    ,
                                     'ult_id_actividad' => $this->tester->ult_id_actividad                    ,
                                     'ult_id_usuario' => $this->tester->ult_id_usuario                    ,
                                     'ult_fecha_actividad' => $this->tester->ult_fecha_actividad                    ,
                                     'ult_fecha_estado' => $this->tester->ult_fecha_estado                    ,
                                     'numero' => $this->tester->numero                                                 ]);                                                
        $this->assertNotNull($pscproceso,                                                          
            'PsCproceso se puede consultar en la base de datos.'); 
        $this->assertNull($pscproceso,                                                          
            'PsCproceso NO se puede consultar en la base de datos.');   
    }   
    
    
    protected function testDelete()                                                             
    {                                                                                        
       
        $this->tester->delete();
        $this->assertNull($tester,                                                          
            'PsCproceso  fue eliminado de la base de datos.');      
    }   
    /**
     * @inheritdoc
     */
    public function testTableName()
    {
        $table= PsCproceso::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio correctamente el nombre de la tabla '.$table); 
        $this->assertEmpty($table,                                                          
            'NO se devolvio correctamente el nombre de la tabla '.$table);  
    }

    /**
     * @inheritdoc Reglas de Validación
     */
    public function testRules()
    {
        $rules= $this->tester->rules();
         $this->assertNotEmpty($rules,                                                          
            'Se devolvio correctamente laconexion '.implode(",", $rules));  
        $this->assertEmpty($rules,                                                          
            'NO ee devolvio correctamente la conexion '.implode(",", $rules));  
    }

    /**
     * @inheritdoc Atributos para los labes del formulario CAMPO -> Label
     */
    public function testAttributeLabels()
    {
        $labels= $this->tester->attributeLabels();
         $this->assertNotEmpty($labels,                                                          
            'Se devolvio correctamente los labels '.implode(",", $labels));  
        $this->assertEmpty($labels,                                                          
            'NO ee devolvio correctamente la conexion '.implode(",", $labels));  
    }

}
