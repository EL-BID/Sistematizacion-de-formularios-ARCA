<?php

namespace common\tests\unit\models\notificaciones;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\notificaciones\TarTareaProgramada;
/**
 * Este es el unit test para la clase "tar_tarea_programada".
 *
 * @property int4 $id_tarea_programada
 * @property varchar $nom_tarea_programada
 * @property date $fecha_inicio
 * @property date $fecha_termina
 * @property date $fecha_proxima_eje
 * @property int4 $intervalo_ejecucion
 * @property int4 $numero_ejecucion
 *
 * @property CorCorreo[] $corCorreos
 */
class TarTareaProgramadaTest extends \Codeception\Test\Unit
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
        $tester = new TarTareaProgramada();
        $tester->id_tarea_programada = "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4";
        $tester->nom_tarea_programada = "Ingresar valor de pruebas para el campo nom_tarea_programada de tipo varchar";
        $tester->fecha_inicio = "Ingresar valor de pruebas para el campo fecha_inicio de tipo date";
        $tester->fecha_termina = "Ingresar valor de pruebas para el campo fecha_termina de tipo date";
        $tester->fecha_proxima_eje = "Ingresar valor de pruebas para el campo fecha_proxima_eje de tipo date";
        $tester->intervalo_ejecucion = "Ingresar valor de pruebas para el campo intervalo_ejecucion de tipo int4";
        $tester->numero_ejecucion = "Ingresar valor de pruebas para el campo numero_ejecucion de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new TarTareaProgramada;
        $tester->id_tarea_programada = "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4";
        $tester->nom_tarea_programada = "Ingresar valor de pruebas para el campo nom_tarea_programada de tipo varchar";
        $tester->fecha_inicio = "Ingresar valor de pruebas para el campo fecha_inicio de tipo date";
        $tester->fecha_termina = "Ingresar valor de pruebas para el campo fecha_termina de tipo date";
        $tester->fecha_proxima_eje = "Ingresar valor de pruebas para el campo fecha_proxima_eje de tipo date";
        $tester->intervalo_ejecucion = "Ingresar valor de pruebas para el campo intervalo_ejecucion de tipo int4";
        $tester->numero_ejecucion = "Ingresar valor de pruebas para el campo numero_ejecucion de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'TarTareaProgramada  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = TarTareaProgramada::findOne(                                                               
        [
           'id_tarea_programada' => "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4",
           'nom_tarea_programada' => "Ingresar valor de pruebas para el campo nom_tarea_programada de tipo varchar",
           'fecha_inicio' => "Ingresar valor de pruebas para el campo fecha_inicio de tipo date",
           'fecha_termina' => "Ingresar valor de pruebas para el campo fecha_termina de tipo date",
           'fecha_proxima_eje' => "Ingresar valor de pruebas para el campo fecha_proxima_eje de tipo date",
           'intervalo_ejecucion' => "Ingresar valor de pruebas para el campo intervalo_ejecucion de tipo int4",
           'numero_ejecucion' => "Ingresar valor de pruebas para el campo numero_ejecucion de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'TarTareaProgramada No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'TarTareaProgramada Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = TarTareaProgramada::findOne(                                                               
        [
           'id_tarea_programada' => "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4",
           'nom_tarea_programada' => "Ingresar valor de pruebas para el campo nom_tarea_programada de tipo varchar",
           'fecha_inicio' => "Ingresar valor de pruebas para el campo fecha_inicio de tipo date",
           'fecha_termina' => "Ingresar valor de pruebas para el campo fecha_termina de tipo date",
           'fecha_proxima_eje' => "Ingresar valor de pruebas para el campo fecha_proxima_eje de tipo date",
           'intervalo_ejecucion' => "Ingresar valor de pruebas para el campo intervalo_ejecucion de tipo int4",
           'numero_ejecucion' => "Ingresar valor de pruebas para el campo numero_ejecucion de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= TarTareaProgramada::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new TarTareaProgramada();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new TarTareaProgramada();
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
         expect($tester->id_tarea_programada)->equals('Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4');
         expect($tester->nom_tarea_programada)->equals('Ingresar valor de pruebas para el campo nom_tarea_programada de tipo varchar');
         expect($tester->fecha_inicio)->equals('Ingresar valor de pruebas para el campo fecha_inicio de tipo date');
         expect($tester->fecha_termina)->equals('Ingresar valor de pruebas para el campo fecha_termina de tipo date');
         expect($tester->fecha_proxima_eje)->equals('Ingresar valor de pruebas para el campo fecha_proxima_eje de tipo date');
         expect($tester->intervalo_ejecucion)->equals('Ingresar valor de pruebas para el campo intervalo_ejecucion de tipo int4');
         expect($tester->numero_ejecucion)->equals('Ingresar valor de pruebas para el campo numero_ejecucion de tipo int4');
      }

}
