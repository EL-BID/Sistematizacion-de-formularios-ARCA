<?php

namespace common\tests\unit\models\hidricos;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\hidricos\CdaSolicitudInformacion;
/**
 * Este es el unit test para la clase "cda_solicitud_informacion".
 *
 * @property int4 $id_solicitud_info
 * @property int4 $id_tinfo_faltante
 * @property int4 $id_treporte
 * @property int4 $id_cactividad_proceso
 * @property int4 $id_tatencion
 * @property varchar $observaciones
 * @property varchar $oficio_atencion
 * @property date $fecha_atencion
 * @property int4 $id_cda
 * @property int4 $id_trespuesta
 * @property varchar $observaciones_res
 * @property varchar $oficio_respuesta
 * @property date $fecha_respuesta
 * @property int4 $id_cactividad_proceso_res
 *
 * @property Cda $idCda
 * @property CdaTipoAtencion $idTatencion
 * @property CdaTipoAtencion $idTrespuesta
 * @property CdaTipoInfoFaltante $idTinfoFaltante
 * @property CdaTipoReporte $idTreporte
 * @property PsCactividadProceso $idCactividadProceso
 */
class CdaSolicitudInformacionTest extends \Codeception\Test\Unit
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
        $tester = new CdaSolicitudInformacion();
        $tester->id_solicitud_info = "Ingresar valor de pruebas para el campo id_solicitud_info de tipo int4";
        $tester->id_tinfo_faltante = "Ingresar valor de pruebas para el campo id_tinfo_faltante de tipo int4";
        $tester->id_treporte = "Ingresar valor de pruebas para el campo id_treporte de tipo int4";
        $tester->id_cactividad_proceso = "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4";
        $tester->id_tatencion = "Ingresar valor de pruebas para el campo id_tatencion de tipo int4";
        $tester->observaciones = "Ingresar valor de pruebas para el campo observaciones de tipo varchar";
        $tester->oficio_atencion = "Ingresar valor de pruebas para el campo oficio_atencion de tipo varchar";
        $tester->fecha_atencion = "Ingresar valor de pruebas para el campo fecha_atencion de tipo date";
        $tester->id_cda = "Ingresar valor de pruebas para el campo id_cda de tipo int4";
        $tester->id_trespuesta = "Ingresar valor de pruebas para el campo id_trespuesta de tipo int4";
        $tester->observaciones_res = "Ingresar valor de pruebas para el campo observaciones_res de tipo varchar";
        $tester->oficio_respuesta = "Ingresar valor de pruebas para el campo oficio_respuesta de tipo varchar";
        $tester->fecha_respuesta = "Ingresar valor de pruebas para el campo fecha_respuesta de tipo date";
        $tester->id_cactividad_proceso_res = "Ingresar valor de pruebas para el campo id_cactividad_proceso_res de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new CdaSolicitudInformacion;
        $tester->id_solicitud_info = "Ingresar valor de pruebas para el campo id_solicitud_info de tipo int4";
        $tester->id_tinfo_faltante = "Ingresar valor de pruebas para el campo id_tinfo_faltante de tipo int4";
        $tester->id_treporte = "Ingresar valor de pruebas para el campo id_treporte de tipo int4";
        $tester->id_cactividad_proceso = "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4";
        $tester->id_tatencion = "Ingresar valor de pruebas para el campo id_tatencion de tipo int4";
        $tester->observaciones = "Ingresar valor de pruebas para el campo observaciones de tipo varchar";
        $tester->oficio_atencion = "Ingresar valor de pruebas para el campo oficio_atencion de tipo varchar";
        $tester->fecha_atencion = "Ingresar valor de pruebas para el campo fecha_atencion de tipo date";
        $tester->id_cda = "Ingresar valor de pruebas para el campo id_cda de tipo int4";
        $tester->id_trespuesta = "Ingresar valor de pruebas para el campo id_trespuesta de tipo int4";
        $tester->observaciones_res = "Ingresar valor de pruebas para el campo observaciones_res de tipo varchar";
        $tester->oficio_respuesta = "Ingresar valor de pruebas para el campo oficio_respuesta de tipo varchar";
        $tester->fecha_respuesta = "Ingresar valor de pruebas para el campo fecha_respuesta de tipo date";
        $tester->id_cactividad_proceso_res = "Ingresar valor de pruebas para el campo id_cactividad_proceso_res de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'CdaSolicitudInformacion  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = CdaSolicitudInformacion::findOne(                                                               
        [
           'id_solicitud_info' => "Ingresar valor de pruebas para el campo id_solicitud_info de tipo int4",
           'id_tinfo_faltante' => "Ingresar valor de pruebas para el campo id_tinfo_faltante de tipo int4",
           'id_treporte' => "Ingresar valor de pruebas para el campo id_treporte de tipo int4",
           'id_cactividad_proceso' => "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4",
           'id_tatencion' => "Ingresar valor de pruebas para el campo id_tatencion de tipo int4",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'oficio_atencion' => "Ingresar valor de pruebas para el campo oficio_atencion de tipo varchar",
           'fecha_atencion' => "Ingresar valor de pruebas para el campo fecha_atencion de tipo date",
           'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",
           'id_trespuesta' => "Ingresar valor de pruebas para el campo id_trespuesta de tipo int4",
           'observaciones_res' => "Ingresar valor de pruebas para el campo observaciones_res de tipo varchar",
           'oficio_respuesta' => "Ingresar valor de pruebas para el campo oficio_respuesta de tipo varchar",
           'fecha_respuesta' => "Ingresar valor de pruebas para el campo fecha_respuesta de tipo date",
           'id_cactividad_proceso_res' => "Ingresar valor de pruebas para el campo id_cactividad_proceso_res de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'CdaSolicitudInformacion No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'CdaSolicitudInformacion Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = CdaSolicitudInformacion::findOne(                                                               
        [
           'id_solicitud_info' => "Ingresar valor de pruebas para el campo id_solicitud_info de tipo int4",
           'id_tinfo_faltante' => "Ingresar valor de pruebas para el campo id_tinfo_faltante de tipo int4",
           'id_treporte' => "Ingresar valor de pruebas para el campo id_treporte de tipo int4",
           'id_cactividad_proceso' => "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4",
           'id_tatencion' => "Ingresar valor de pruebas para el campo id_tatencion de tipo int4",
           'observaciones' => "Ingresar valor de pruebas para el campo observaciones de tipo varchar",
           'oficio_atencion' => "Ingresar valor de pruebas para el campo oficio_atencion de tipo varchar",
           'fecha_atencion' => "Ingresar valor de pruebas para el campo fecha_atencion de tipo date",
           'id_cda' => "Ingresar valor de pruebas para el campo id_cda de tipo int4",
           'id_trespuesta' => "Ingresar valor de pruebas para el campo id_trespuesta de tipo int4",
           'observaciones_res' => "Ingresar valor de pruebas para el campo observaciones_res de tipo varchar",
           'oficio_respuesta' => "Ingresar valor de pruebas para el campo oficio_respuesta de tipo varchar",
           'fecha_respuesta' => "Ingresar valor de pruebas para el campo fecha_respuesta de tipo date",
           'id_cactividad_proceso_res' => "Ingresar valor de pruebas para el campo id_cactividad_proceso_res de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= CdaSolicitudInformacion::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new CdaSolicitudInformacion();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new CdaSolicitudInformacion();
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
         expect($tester->id_solicitud_info)->equals('Ingresar valor de pruebas para el campo id_solicitud_info de tipo int4');
         expect($tester->id_tinfo_faltante)->equals('Ingresar valor de pruebas para el campo id_tinfo_faltante de tipo int4');
         expect($tester->id_treporte)->equals('Ingresar valor de pruebas para el campo id_treporte de tipo int4');
         expect($tester->id_cactividad_proceso)->equals('Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4');
         expect($tester->id_tatencion)->equals('Ingresar valor de pruebas para el campo id_tatencion de tipo int4');
         expect($tester->observaciones)->equals('Ingresar valor de pruebas para el campo observaciones de tipo varchar');
         expect($tester->oficio_atencion)->equals('Ingresar valor de pruebas para el campo oficio_atencion de tipo varchar');
         expect($tester->fecha_atencion)->equals('Ingresar valor de pruebas para el campo fecha_atencion de tipo date');
         expect($tester->id_cda)->equals('Ingresar valor de pruebas para el campo id_cda de tipo int4');
         expect($tester->id_trespuesta)->equals('Ingresar valor de pruebas para el campo id_trespuesta de tipo int4');
         expect($tester->observaciones_res)->equals('Ingresar valor de pruebas para el campo observaciones_res de tipo varchar');
         expect($tester->oficio_respuesta)->equals('Ingresar valor de pruebas para el campo oficio_respuesta de tipo varchar');
         expect($tester->fecha_respuesta)->equals('Ingresar valor de pruebas para el campo fecha_respuesta de tipo date');
         expect($tester->id_cactividad_proceso_res)->equals('Ingresar valor de pruebas para el campo id_cactividad_proceso_res de tipo int4');
      }

}
