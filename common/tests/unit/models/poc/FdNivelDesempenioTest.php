<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdNivelDesempenio;
/**
 * Este es el unit test para la clase "fd_nivel_desempenio".
 *
 * @property int4 $id_nivel
 * @property int4 $intervalo_inicio
 * @property int4 $intervalo_fin
 * @property varchar $nivel_desempenio
 * @property varchar $descripcion
 * @property int4 $semaforizacion
 */
class FdNivelDesempenioTest extends \Codeception\Test\Unit
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
        $tester = new FdNivelDesempenio();
        $tester->id_nivel = "Ingresar valor de pruebas para el campo id_nivel de tipo int4";
        $tester->intervalo_inicio = "Ingresar valor de pruebas para el campo intervalo_inicio de tipo int4";
        $tester->intervalo_fin = "Ingresar valor de pruebas para el campo intervalo_fin de tipo int4";
        $tester->nivel_desempenio = "Ingresar valor de pruebas para el campo nivel_desempenio de tipo varchar";
        $tester->descripcion = "Ingresar valor de pruebas para el campo descripcion de tipo varchar";
        $tester->semaforizacion = "Ingresar valor de pruebas para el campo semaforizacion de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdNivelDesempenio;
        $tester->id_nivel = "Ingresar valor de pruebas para el campo id_nivel de tipo int4";
        $tester->intervalo_inicio = "Ingresar valor de pruebas para el campo intervalo_inicio de tipo int4";
        $tester->intervalo_fin = "Ingresar valor de pruebas para el campo intervalo_fin de tipo int4";
        $tester->nivel_desempenio = "Ingresar valor de pruebas para el campo nivel_desempenio de tipo varchar";
        $tester->descripcion = "Ingresar valor de pruebas para el campo descripcion de tipo varchar";
        $tester->semaforizacion = "Ingresar valor de pruebas para el campo semaforizacion de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdNivelDesempenio  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdNivelDesempenio::findOne(                                                               
        [
           'id_nivel' => "Ingresar valor de pruebas para el campo id_nivel de tipo int4",
           'intervalo_inicio' => "Ingresar valor de pruebas para el campo intervalo_inicio de tipo int4",
           'intervalo_fin' => "Ingresar valor de pruebas para el campo intervalo_fin de tipo int4",
           'nivel_desempenio' => "Ingresar valor de pruebas para el campo nivel_desempenio de tipo varchar",
           'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo varchar",
           'semaforizacion' => "Ingresar valor de pruebas para el campo semaforizacion de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdNivelDesempenio No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdNivelDesempenio Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdNivelDesempenio::findOne(                                                               
        [
           'id_nivel' => "Ingresar valor de pruebas para el campo id_nivel de tipo int4",
           'intervalo_inicio' => "Ingresar valor de pruebas para el campo intervalo_inicio de tipo int4",
           'intervalo_fin' => "Ingresar valor de pruebas para el campo intervalo_fin de tipo int4",
           'nivel_desempenio' => "Ingresar valor de pruebas para el campo nivel_desempenio de tipo varchar",
           'descripcion' => "Ingresar valor de pruebas para el campo descripcion de tipo varchar",
           'semaforizacion' => "Ingresar valor de pruebas para el campo semaforizacion de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdNivelDesempenio::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdNivelDesempenio();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdNivelDesempenio();
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
         expect($tester->id_nivel)->equals('Ingresar valor de pruebas para el campo id_nivel de tipo int4');
         expect($tester->intervalo_inicio)->equals('Ingresar valor de pruebas para el campo intervalo_inicio de tipo int4');
         expect($tester->intervalo_fin)->equals('Ingresar valor de pruebas para el campo intervalo_fin de tipo int4');
         expect($tester->nivel_desempenio)->equals('Ingresar valor de pruebas para el campo nivel_desempenio de tipo varchar');
         expect($tester->descripcion)->equals('Ingresar valor de pruebas para el campo descripcion de tipo varchar');
         expect($tester->semaforizacion)->equals('Ingresar valor de pruebas para el campo semaforizacion de tipo int4');
      }

}
