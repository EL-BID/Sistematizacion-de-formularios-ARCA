<?php

namespace common\tests\unit\models\hidricos;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\hidricos\PsActividadQuipux;
/**
 * Este es el unit test para la clase "ps_actividad_quipux".
 *
 * @property int4 $id_actividad_quipux
 * @property date $fecha_actividad_quipux
 * @property varchar $usuario_actual_quipux
 * @property varchar $accion_realizada
 * @property varchar $descripcion
 * @property varchar $estado_actual
 * @property varchar $numero_referencia
 * @property varchar $usuario_origen_quipux
 * @property varchar $usuario_destino_quipux
 * @property varchar $respondido_a
 * @property date $fecha_carga
 * @property int4 $id_cproceso
 *
 * @property PsCproceso $idCproceso
 */
class PsActividadQuipuxTest extends \Codeception\Test\Unit
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
        $tester = new PsActividadQuipux();
        $tester->id_actividad_quipux = "Ingresar valor de pruebas para el campo id_actividad_quipux de tipo int4";
        $tester->fecha_actividad_quipux = "Ingresar valor de pruebas para el campo fecha_actividad_quipux de tipo date";
        $tester->usuario_actual_quipux = "Ingresar valor de pruebas para el campo usuario_actual_quipux de tipo varchar";
        $tester->accion_realizada = "Ingresar valor de pruebas para el campo accion_realizada de tipo varchar";
        $tester->descripcion = "Ingresar valor de pruebas para el campo descripcion de tipo varchar";
        $tester->estado_actual = "Ingresar valor de pruebas para el campo estado_actual de tipo varchar";
        $tester->numero_referencia = "Ingresar valor de pruebas para el campo numero_referencia de tipo varchar";
        $tester->usuario_origen_quipux = "Ingresar valor de pruebas para el campo usuario_origen_quipux de tipo varchar";
        $tester->usuario_destino_quipux = "Ingresar valor de pruebas para el campo usuario_destino_quipux de tipo varchar";
        $tester->respondido_a = "Ingresar valor de pruebas para el campo respondido_a de tipo varchar";
        $tester->fecha_carga = "Ingresar valor de pruebas para el campo fecha_carga de tipo date";
        $tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsActividadQuipux;
        $tester->id_actividad_quipux = "Ingresar valor de pruebas para el campo id_actividad_quipux de tipo int4";
        $tester->fecha_actividad_quipux = "Ingresar valor de pruebas para el campo fecha_actividad_quipux de tipo date";
        $tester->usuario_actual_quipux = "Ingresar valor de pruebas para el campo usuario_actual_quipux de tipo varchar";
        $tester->accion_realizada = "Ingresar valor de pruebas para el campo accion_realizada de tipo varchar";
        $tester->descripcion = "Ingresar valor de pruebas para el campo descripcion de tipo varchar";
        $tester->estado_actual = "Ingresar valor de pruebas para el campo estado_actual de tipo varchar";
        $tester->numero_referencia = "Ingresar valor de pruebas para el campo numero_referencia de tipo varchar";
        $tester->usuario_origen_quipux = "Ingresar valor de pruebas para el campo usuario_origen_quipux de tipo varchar";
        $tester->usuario_destino_quipux = "Ingresar valor de pruebas para el campo usuario_destino_quipux de tipo varchar";
        $tester->respondido_a = "Ingresar valor de pruebas para el campo respondido_a de tipo varchar";
        $tester->fecha_carga = "Ingresar valor de pruebas para el campo fecha_carga de tipo date";
        $tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsActividadQuipux  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsActividadQuipux::findOne(                                                               
        [
           'id_actividad_quipux' => "Ingresar valor de pruebas para el campo id_actividad_quipux de tipo int4",
           'fecha_actividad_quipux' => "Ingresar valor de pruebas para el campo fecha_actividad_quipux de tipo date",
           'usuario_actual_quipux' => "Ingresar valor de pruebas para el campo usuario_actual_quipux de tipo varchar",
           'accion_realizada' => "Ingresar valor de pruebas para el campo accion_realizada de tipo varchar",
           'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo varchar",
           'estado_actual' => "Ingresar valor de pruebas para el campo estado_actual de tipo varchar",
           'numero_referencia' => "Ingresar valor de pruebas para el campo numero_referencia de tipo varchar",
           'usuario_origen_quipux' => "Ingresar valor de pruebas para el campo usuario_origen_quipux de tipo varchar",
           'usuario_destino_quipux' => "Ingresar valor de pruebas para el campo usuario_destino_quipux de tipo varchar",
           'respondido_a' => "Ingresar valor de pruebas para el campo respondido_a de tipo varchar",
           'fecha_carga' => "Ingresar valor de pruebas para el campo fecha_carga de tipo date",
           'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsActividadQuipux No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsActividadQuipux Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsActividadQuipux::findOne(                                                               
        [
           'id_actividad_quipux' => "Ingresar valor de pruebas para el campo id_actividad_quipux de tipo int4",
           'fecha_actividad_quipux' => "Ingresar valor de pruebas para el campo fecha_actividad_quipux de tipo date",
           'usuario_actual_quipux' => "Ingresar valor de pruebas para el campo usuario_actual_quipux de tipo varchar",
           'accion_realizada' => "Ingresar valor de pruebas para el campo accion_realizada de tipo varchar",
           'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo varchar",
           'estado_actual' => "Ingresar valor de pruebas para el campo estado_actual de tipo varchar",
           'numero_referencia' => "Ingresar valor de pruebas para el campo numero_referencia de tipo varchar",
           'usuario_origen_quipux' => "Ingresar valor de pruebas para el campo usuario_origen_quipux de tipo varchar",
           'usuario_destino_quipux' => "Ingresar valor de pruebas para el campo usuario_destino_quipux de tipo varchar",
           'respondido_a' => "Ingresar valor de pruebas para el campo respondido_a de tipo varchar",
           'fecha_carga' => "Ingresar valor de pruebas para el campo fecha_carga de tipo date",
           'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsActividadQuipux::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsActividadQuipux();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsActividadQuipux();
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
         expect($tester->id_actividad_quipux)->equals('Ingresar valor de pruebas para el campo id_actividad_quipux de tipo int4');
         expect($tester->fecha_actividad_quipux)->equals('Ingresar valor de pruebas para el campo fecha_actividad_quipux de tipo date');
         expect($tester->usuario_actual_quipux)->equals('Ingresar valor de pruebas para el campo usuario_actual_quipux de tipo varchar');
         expect($tester->accion_realizada)->equals('Ingresar valor de pruebas para el campo accion_realizada de tipo varchar');
         expect($tester->descripcion)->equals('Ingresar valor de pruebas para el campo descripcion de tipo varchar');
         expect($tester->estado_actual)->equals('Ingresar valor de pruebas para el campo estado_actual de tipo varchar');
         expect($tester->numero_referencia)->equals('Ingresar valor de pruebas para el campo numero_referencia de tipo varchar');
         expect($tester->usuario_origen_quipux)->equals('Ingresar valor de pruebas para el campo usuario_origen_quipux de tipo varchar');
         expect($tester->usuario_destino_quipux)->equals('Ingresar valor de pruebas para el campo usuario_destino_quipux de tipo varchar');
         expect($tester->respondido_a)->equals('Ingresar valor de pruebas para el campo respondido_a de tipo varchar');
         expect($tester->fecha_carga)->equals('Ingresar valor de pruebas para el campo fecha_carga de tipo date');
         expect($tester->id_cproceso)->equals('Ingresar valor de pruebas para el campo id_cproceso de tipo int4');
      }

}
