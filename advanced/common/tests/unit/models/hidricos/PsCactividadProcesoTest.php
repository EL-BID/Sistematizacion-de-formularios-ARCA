<?php

namespace common\tests\unit\models\hidricos;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\hidricos\PsCactividadProceso;
/**
 * Este es el unit test para la clase "ps_cactividad_proceso".
 *
 * @property int4 $id_cactividad_proceso
 * @property varchar $observacion
 * @property date $fecha_realizacion
 * @property date $fecha_prevista
 * @property varchar $numero_quipux
 * @property int4 $id_cproceso
 * @property int4 $id_usuario
 * @property int4 $id_actividad
 * @property date $fecha_creacion
 * @property varchar $diligenciado
 *
 * @property PsActividad $idActividad
 * @property PsCproceso $idCproceso
 * @property UsuariosAp $idUsuario
 */
class PsCactividadProcesoTest extends \Codeception\Test\Unit
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
        $tester = new PsCactividadProceso();
        $tester->id_cactividad_proceso = "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4";
        $tester->observacion = "Ingresar valor de pruebas para el campo observacion de tipo varchar";
        $tester->fecha_realizacion = "Ingresar valor de pruebas para el campo fecha_realizacion de tipo date";
        $tester->fecha_prevista = "Ingresar valor de pruebas para el campo fecha_prevista de tipo date";
        $tester->numero_quipux = "Ingresar valor de pruebas para el campo numero_quipux de tipo varchar";
        $tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo int4";
        $tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo int4";
        $tester->id_actividad = "Ingresar valor de pruebas para el campo id_actividad de tipo int4";
        $tester->fecha_creacion = "Ingresar valor de pruebas para el campo fecha_creacion de tipo date";
        $tester->diligenciado = "Ingresar valor de pruebas para el campo diligenciado de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsCactividadProceso;
        $tester->id_cactividad_proceso = "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4";
        $tester->observacion = "Ingresar valor de pruebas para el campo observacion de tipo varchar";
        $tester->fecha_realizacion = "Ingresar valor de pruebas para el campo fecha_realizacion de tipo date";
        $tester->fecha_prevista = "Ingresar valor de pruebas para el campo fecha_prevista de tipo date";
        $tester->numero_quipux = "Ingresar valor de pruebas para el campo numero_quipux de tipo varchar";
        $tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo int4";
        $tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo int4";
        $tester->id_actividad = "Ingresar valor de pruebas para el campo id_actividad de tipo int4";
        $tester->fecha_creacion = "Ingresar valor de pruebas para el campo fecha_creacion de tipo date";
        $tester->diligenciado = "Ingresar valor de pruebas para el campo diligenciado de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsCactividadProceso  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsCactividadProceso::findOne(                                                               
        [
           'id_cactividad_proceso' => "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4",
           'observacion' => "Ingresar valor de pruebas para el campo observacion de tipo varchar",
           'fecha_realizacion' => "Ingresar valor de pruebas para el campo fecha_realizacion de tipo date",
           'fecha_prevista' => "Ingresar valor de pruebas para el campo fecha_prevista de tipo date",
           'numero_quipux' => "Ingresar valor de pruebas para el campo numero_quipux de tipo varchar",
           'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",
           'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo int4",
           'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",
           'fecha_creacion' => "Ingresar valor de pruebas para el campo fecha_creacion de tipo date",
           'diligenciado' => "Ingresar valor de pruebas para el campo diligenciado de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsCactividadProceso No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsCactividadProceso Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsCactividadProceso::findOne(                                                               
        [
           'id_cactividad_proceso' => "Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4",
           'observacion' => "Ingresar valor de pruebas para el campo observacion de tipo varchar",
           'fecha_realizacion' => "Ingresar valor de pruebas para el campo fecha_realizacion de tipo date",
           'fecha_prevista' => "Ingresar valor de pruebas para el campo fecha_prevista de tipo date",
           'numero_quipux' => "Ingresar valor de pruebas para el campo numero_quipux de tipo varchar",
           'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",
           'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo int4",
           'id_actividad' => "Ingresar valor de pruebas para el campo id_actividad de tipo int4",
           'fecha_creacion' => "Ingresar valor de pruebas para el campo fecha_creacion de tipo date",
           'diligenciado' => "Ingresar valor de pruebas para el campo diligenciado de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsCactividadProceso::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsCactividadProceso();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsCactividadProceso();
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
         expect($tester->id_cactividad_proceso)->equals('Ingresar valor de pruebas para el campo id_cactividad_proceso de tipo int4');
         expect($tester->observacion)->equals('Ingresar valor de pruebas para el campo observacion de tipo varchar');
         expect($tester->fecha_realizacion)->equals('Ingresar valor de pruebas para el campo fecha_realizacion de tipo date');
         expect($tester->fecha_prevista)->equals('Ingresar valor de pruebas para el campo fecha_prevista de tipo date');
         expect($tester->numero_quipux)->equals('Ingresar valor de pruebas para el campo numero_quipux de tipo varchar');
         expect($tester->id_cproceso)->equals('Ingresar valor de pruebas para el campo id_cproceso de tipo int4');
         expect($tester->id_usuario)->equals('Ingresar valor de pruebas para el campo id_usuario de tipo int4');
         expect($tester->id_actividad)->equals('Ingresar valor de pruebas para el campo id_actividad de tipo int4');
         expect($tester->fecha_creacion)->equals('Ingresar valor de pruebas para el campo fecha_creacion de tipo date');
         expect($tester->diligenciado)->equals('Ingresar valor de pruebas para el campo diligenciado de tipo varchar');
      }

}
