<?php

namespace common\tests\unit\models\cda;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cda\PsOpcTipoSelect;
/**
 * Este es el unit test para la clase "ps_opc_tipo_select".
 *
 * @property int4 $id_tselect
 * @property int4 $id_opc_tselect
 * @property varchar $nom_opc_tselect
 * @property varchar $es_otra
 *
 * @property PsCactividadProceso[] $psCactividadProcesos
 * @property PsTipoSelect $idTselect
 */
class PsOpcTipoSelectTest extends \Codeception\Test\Unit
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
        $tester = new PsOpcTipoSelect();
        $tester->id_tselect = "Ingresar valor de pruebas para el campo id_tselect de tipo int4";
        $tester->id_opc_tselect = "Ingresar valor de pruebas para el campo id_opc_tselect de tipo int4";
        $tester->nom_opc_tselect = "Ingresar valor de pruebas para el campo nom_opc_tselect de tipo varchar";
        $tester->es_otra = "Ingresar valor de pruebas para el campo es_otra de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsOpcTipoSelect;
        $tester->id_tselect = "Ingresar valor de pruebas para el campo id_tselect de tipo int4";
        $tester->id_opc_tselect = "Ingresar valor de pruebas para el campo id_opc_tselect de tipo int4";
        $tester->nom_opc_tselect = "Ingresar valor de pruebas para el campo nom_opc_tselect de tipo varchar";
        $tester->es_otra = "Ingresar valor de pruebas para el campo es_otra de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsOpcTipoSelect  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsOpcTipoSelect::findOne(                                                               
        [
           'id_tselect' => "Ingresar valor de pruebas para el campo id_tselect de tipo int4",
           'id_opc_tselect' => "Ingresar valor de pruebas para el campo id_opc_tselect de tipo int4",
           'nom_opc_tselect' => "Ingresar valor de pruebas para el campo nom_opc_tselect de tipo varchar",
           'es_otra' => "Ingresar valor de pruebas para el campo es_otra de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsOpcTipoSelect No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsOpcTipoSelect Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsOpcTipoSelect::findOne(                                                               
        [
           'id_tselect' => "Ingresar valor de pruebas para el campo id_tselect de tipo int4",
           'id_opc_tselect' => "Ingresar valor de pruebas para el campo id_opc_tselect de tipo int4",
           'nom_opc_tselect' => "Ingresar valor de pruebas para el campo nom_opc_tselect de tipo varchar",
           'es_otra' => "Ingresar valor de pruebas para el campo es_otra de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsOpcTipoSelect::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsOpcTipoSelect();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsOpcTipoSelect();
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
         expect($tester->id_tselect)->equals('Ingresar valor de pruebas para el campo id_tselect de tipo int4');
         expect($tester->id_opc_tselect)->equals('Ingresar valor de pruebas para el campo id_opc_tselect de tipo int4');
         expect($tester->nom_opc_tselect)->equals('Ingresar valor de pruebas para el campo nom_opc_tselect de tipo varchar');
         expect($tester->es_otra)->equals('Ingresar valor de pruebas para el campo es_otra de tipo varchar');
      }

}
