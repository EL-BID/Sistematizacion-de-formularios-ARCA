<?php

namespace common\tests\unit\models\cargaquipux;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cargaquipux\PsArchivoCargue;
/**
 * Este es el unit test para la clase "ps_archivo_cargue".
 *
 * @property int4 $id_archivo_cargue
 * @property varchar $nom_archivo_cargue
 * @property varchar $nom_tabla_cargue
 * @property int4 $fila_inicio
 * @property varchar $estado
 * @property int4 $id_tarea_programada
 *
 * @property TarTareaProgramada $idTareaProgramada
 * @property PsCargue[] $psCargues
 * @property PsDetArcCargue[] $psDetArcCargues
 */
class PsArchivoCargueTest extends \Codeception\Test\Unit
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
        $tester = new PsArchivoCargue();
        $tester->id_archivo_cargue = "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4";
        $tester->nom_archivo_cargue = "Ingresar valor de pruebas para el campo nom_archivo_cargue de tipo varchar";
        $tester->nom_tabla_cargue = "Ingresar valor de pruebas para el campo nom_tabla_cargue de tipo varchar";
        $tester->fila_inicio = "Ingresar valor de pruebas para el campo fila_inicio de tipo int4";
        $tester->estado = "Ingresar valor de pruebas para el campo estado de tipo varchar";
        $tester->id_tarea_programada = "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsArchivoCargue;
        $tester->id_archivo_cargue = "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4";
        $tester->nom_archivo_cargue = "Ingresar valor de pruebas para el campo nom_archivo_cargue de tipo varchar";
        $tester->nom_tabla_cargue = "Ingresar valor de pruebas para el campo nom_tabla_cargue de tipo varchar";
        $tester->fila_inicio = "Ingresar valor de pruebas para el campo fila_inicio de tipo int4";
        $tester->estado = "Ingresar valor de pruebas para el campo estado de tipo varchar";
        $tester->id_tarea_programada = "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsArchivoCargue  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsArchivoCargue::findOne(                                                               
        [
           'id_archivo_cargue' => "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4",
           'nom_archivo_cargue' => "Ingresar valor de pruebas para el campo nom_archivo_cargue de tipo varchar",
           'nom_tabla_cargue' => "Ingresar valor de pruebas para el campo nom_tabla_cargue de tipo varchar",
           'fila_inicio' => "Ingresar valor de pruebas para el campo fila_inicio de tipo int4",
           'estado' => "Ingresar valor de pruebas para el campo estado de tipo varchar",
           'id_tarea_programada' => "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsArchivoCargue No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsArchivoCargue Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsArchivoCargue::findOne(                                                               
        [
           'id_archivo_cargue' => "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4",
           'nom_archivo_cargue' => "Ingresar valor de pruebas para el campo nom_archivo_cargue de tipo varchar",
           'nom_tabla_cargue' => "Ingresar valor de pruebas para el campo nom_tabla_cargue de tipo varchar",
           'fila_inicio' => "Ingresar valor de pruebas para el campo fila_inicio de tipo int4",
           'estado' => "Ingresar valor de pruebas para el campo estado de tipo varchar",
           'id_tarea_programada' => "Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsArchivoCargue::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsArchivoCargue();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsArchivoCargue();
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
         expect($tester->id_archivo_cargue)->equals('Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4');
         expect($tester->nom_archivo_cargue)->equals('Ingresar valor de pruebas para el campo nom_archivo_cargue de tipo varchar');
         expect($tester->nom_tabla_cargue)->equals('Ingresar valor de pruebas para el campo nom_tabla_cargue de tipo varchar');
         expect($tester->fila_inicio)->equals('Ingresar valor de pruebas para el campo fila_inicio de tipo int4');
         expect($tester->estado)->equals('Ingresar valor de pruebas para el campo estado de tipo varchar');
         expect($tester->id_tarea_programada)->equals('Ingresar valor de pruebas para el campo id_tarea_programada de tipo int4');
      }

}
