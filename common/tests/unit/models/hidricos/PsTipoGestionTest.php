<?php

namespace common\tests\unit\models\hidricos;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\hidricos\PsTipoGestion;
/**
 * Este es el unit test para la clase "ps_tipo_gestion".
 *
 * @property int4 $id_tgestion
 * @property varchar $nom_tgestion
 *
 * @property PsHistoricoEstados[] $psHistoricoEstados
 */
class PsTipoGestionTest extends \Codeception\Test\Unit
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
        $tester = new PsTipoGestion();
        $tester->id_tgestion = "Ingresar valor de pruebas para el campo id_tgestion de tipo int4";
        $tester->nom_tgestion = "Ingresar valor de pruebas para el campo nom_tgestion de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsTipoGestion;
        $tester->id_tgestion = "Ingresar valor de pruebas para el campo id_tgestion de tipo int4";
        $tester->nom_tgestion = "Ingresar valor de pruebas para el campo nom_tgestion de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsTipoGestion  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsTipoGestion::findOne(                                                               
        [
           'id_tgestion' => "Ingresar valor de pruebas para el campo id_tgestion de tipo int4",
           'nom_tgestion' => "Ingresar valor de pruebas para el campo nom_tgestion de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsTipoGestion No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsTipoGestion Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsTipoGestion::findOne(                                                               
        [
           'id_tgestion' => "Ingresar valor de pruebas para el campo id_tgestion de tipo int4",
           'nom_tgestion' => "Ingresar valor de pruebas para el campo nom_tgestion de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsTipoGestion::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsTipoGestion();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsTipoGestion();
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
         expect($tester->id_tgestion)->equals('Ingresar valor de pruebas para el campo id_tgestion de tipo int4');
         expect($tester->nom_tgestion)->equals('Ingresar valor de pruebas para el campo nom_tgestion de tipo varchar');
      }

}
