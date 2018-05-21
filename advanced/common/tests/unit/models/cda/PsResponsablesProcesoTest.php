<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\PsResponsablesProceso;
/**
 * Este es el unit test para la clase "ps_responsables_proceso".
 *
 * @property int4 $id_responsable_proceso
 * @property numeric $id_usuario
 * @property int4 $id_cproceso
 * @property int4 $id_tresponsabilidad
 * @property date $fecha
 * @property varchar $observacion
 *
 * @property PsCproceso $idCproceso
 * @property PsTipoResponsabilidad $idTresponsabilidad
 * @property UsuariosAp $idUsuario
 */
class PsResponsablesProcesoTest extends \Codeception\Test\Unit
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
        $tester = new PsResponsablesProceso();
        $tester->id_responsable_proceso = "Ingresar valor de pruebas para el campo id_responsable_proceso de tipo int4";
        $tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo numeric";
        $tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo int4";
        $tester->id_tresponsabilidad = "Ingresar valor de pruebas para el campo id_tresponsabilidad de tipo int4";
        $tester->fecha = "Ingresar valor de pruebas para el campo fecha de tipo date";
        $tester->observacion = "Ingresar valor de pruebas para el campo observacion de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsResponsablesProceso;
        $tester->id_responsable_proceso = "Ingresar valor de pruebas para el campo id_responsable_proceso de tipo int4";
        $tester->id_usuario = "Ingresar valor de pruebas para el campo id_usuario de tipo numeric";
        $tester->id_cproceso = "Ingresar valor de pruebas para el campo id_cproceso de tipo int4";
        $tester->id_tresponsabilidad = "Ingresar valor de pruebas para el campo id_tresponsabilidad de tipo int4";
        $tester->fecha = "Ingresar valor de pruebas para el campo fecha de tipo date";
        $tester->observacion = "Ingresar valor de pruebas para el campo observacion de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsResponsablesProceso  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsResponsablesProceso::findOne(                                                               
        [
           'id_responsable_proceso' => "Ingresar valor de pruebas para el campo id_responsable_proceso de tipo int4",
           'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo numeric",
           'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",
           'id_tresponsabilidad' => "Ingresar valor de pruebas para el campo id_tresponsabilidad de tipo int4",
           'fecha' => "Ingresar valor de pruebas para el campo fecha de tipo date",
           'observacion' => "Ingresar valor de pruebas para el campo observacion de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsResponsablesProceso No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsResponsablesProceso Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsResponsablesProceso::findOne(                                                               
        [
           'id_responsable_proceso' => "Ingresar valor de pruebas para el campo id_responsable_proceso de tipo int4",
           'id_usuario' => "Ingresar valor de pruebas para el campo id_usuario de tipo numeric",
           'id_cproceso' => "Ingresar valor de pruebas para el campo id_cproceso de tipo int4",
           'id_tresponsabilidad' => "Ingresar valor de pruebas para el campo id_tresponsabilidad de tipo int4",
           'fecha' => "Ingresar valor de pruebas para el campo fecha de tipo date",
           'observacion' => "Ingresar valor de pruebas para el campo observacion de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsResponsablesProceso::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsResponsablesProceso();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsResponsablesProceso();
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
         expect($tester->id_responsable_proceso)->equals('Ingresar valor de pruebas para el campo id_responsable_proceso de tipo int4');
         expect($tester->id_usuario)->equals('Ingresar valor de pruebas para el campo id_usuario de tipo numeric');
         expect($tester->id_cproceso)->equals('Ingresar valor de pruebas para el campo id_cproceso de tipo int4');
         expect($tester->id_tresponsabilidad)->equals('Ingresar valor de pruebas para el campo id_tresponsabilidad de tipo int4');
         expect($tester->fecha)->equals('Ingresar valor de pruebas para el campo fecha de tipo date');
         expect($tester->observacion)->equals('Ingresar valor de pruebas para el campo observacion de tipo varchar');
      }

}
