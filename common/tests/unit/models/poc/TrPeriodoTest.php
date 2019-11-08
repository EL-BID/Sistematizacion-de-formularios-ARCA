<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\TrPeriodo;
/**
 * Este es el unit test para la clase "tr_periodo".
 *
 * @property int4 $id_periodo
 * @property varchar $nom_periodo
 * @property varchar $identificador
 * @property int4 $vigencia
 * @property int4 $id_tperiodo
 *
 * @property FdConjuntoRespuesta[] $fdConjuntoRespuestas
 * @property FdPeriodoFormato[] $fdPeriodoFormatos
 * @property FdFormato[] $idFormatos
 * @property TrTipoPeriodo $idTperiodo
 */
class TrPeriodoTest extends \Codeception\Test\Unit
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
        $tester = new TrPeriodo();
        $tester->id_periodo = "Ingresar valor de pruebas para el campo id_periodo de tipo int4";
        $tester->nom_periodo = "Ingresar valor de pruebas para el campo nom_periodo de tipo varchar";
        $tester->identificador = "Ingresar valor de pruebas para el campo identificador de tipo varchar";
        $tester->vigencia = "Ingresar valor de pruebas para el campo vigencia de tipo int4";
        $tester->id_tperiodo = "Ingresar valor de pruebas para el campo id_tperiodo de tipo int4";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new TrPeriodo;
        $tester->id_periodo = "Ingresar valor de pruebas para el campo id_periodo de tipo int4";
        $tester->nom_periodo = "Ingresar valor de pruebas para el campo nom_periodo de tipo varchar";
        $tester->identificador = "Ingresar valor de pruebas para el campo identificador de tipo varchar";
        $tester->vigencia = "Ingresar valor de pruebas para el campo vigencia de tipo int4";
        $tester->id_tperiodo = "Ingresar valor de pruebas para el campo id_tperiodo de tipo int4";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'TrPeriodo  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = TrPeriodo::findOne(                                                               
        [
           'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",
           'nom_periodo' => "Ingresar valor de pruebas para el campo nom_periodo de tipo varchar",
           'identificador' => "Ingresar valor de pruebas para el campo identificador de tipo varchar",
           'vigencia' => "Ingresar valor de pruebas para el campo vigencia de tipo int4",
           'id_tperiodo' => "Ingresar valor de pruebas para el campo id_tperiodo de tipo int4",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'TrPeriodo No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'TrPeriodo Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = TrPeriodo::findOne(                                                               
        [
           'id_periodo' => "Ingresar valor de pruebas para el campo id_periodo de tipo int4",
           'nom_periodo' => "Ingresar valor de pruebas para el campo nom_periodo de tipo varchar",
           'identificador' => "Ingresar valor de pruebas para el campo identificador de tipo varchar",
           'vigencia' => "Ingresar valor de pruebas para el campo vigencia de tipo int4",
           'id_tperiodo' => "Ingresar valor de pruebas para el campo id_tperiodo de tipo int4",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= TrPeriodo::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new TrPeriodo();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new TrPeriodo();
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
         expect($tester->id_periodo)->equals('Ingresar valor de pruebas para el campo id_periodo de tipo int4');
         expect($tester->nom_periodo)->equals('Ingresar valor de pruebas para el campo nom_periodo de tipo varchar');
         expect($tester->identificador)->equals('Ingresar valor de pruebas para el campo identificador de tipo varchar');
         expect($tester->vigencia)->equals('Ingresar valor de pruebas para el campo vigencia de tipo int4');
         expect($tester->id_tperiodo)->equals('Ingresar valor de pruebas para el campo id_tperiodo de tipo int4');
      }

}
