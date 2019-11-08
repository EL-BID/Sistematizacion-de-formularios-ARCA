<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdPeriodoFormato;
/**
 * Este es el unit test para la clase "fd_periodo_formato".
 *
 * @property date $fecha_creacion
 * @property int4 $id_formato
 * @property int4 $id_periodo
 *
 * @property FdFormato $idFormato
 * @property TrPeriodo $idPeriodo
 */
class FdPeriodoFormatoTest extends \Codeception\Test\Unit
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
        $tester = new FdPeriodoFormato();
        $tester->fecha_creacion = "Ingresar valor de pruebas para el campo fecha_creacion de tipo date";
        $tester->id_formato = "Ingresar valor de pruebas para el campo id_formato de tipo int4";
        $tester->id_periodo = "Ingresar valor de pruebas para el campo id_periodo de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdPeriodoFormato;
        $tester->fecha_creacion = "Ingresar valor de pruebas para el campo fecha_creacion de tipo date";
        $tester->id_formato = "Ingresar valor de pruebas para el campo id_formato de tipo int4";
        $tester->id_periodo = "Ingresar valor de pruebas para el campo id_periodo de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdPeriodoFormato  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdPeriodoFormato::findOne(                                                               
        [
           'fecha_creacion' => "Ingresar valor de pruebas para el campo fecha_creacion de tipo date",
           'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",
           'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdPeriodoFormato No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdPeriodoFormato Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdPeriodoFormato::findOne(                                                               
        [
           'fecha_creacion' => "Ingresar valor de pruebas para el campo fecha_creacion de tipo date",
           'id_formato' => "Ingresar valor de pruebas para el campo id_formato de tipo int4",
           'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdPeriodoFormato::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdPeriodoFormato();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdPeriodoFormato();
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
         expect($tester->fecha_creacion)->equals('Ingresar valor de pruebas para el campo fecha_creacion de tipo date');
         expect($tester->id_formato)->equals('Ingresar valor de pruebas para el campo id_formato de tipo int4');
         expect($tester->id_periodo)->equals('Ingresar valor de pruebas para el campo id_periodo de tipo int4');
      }

}
