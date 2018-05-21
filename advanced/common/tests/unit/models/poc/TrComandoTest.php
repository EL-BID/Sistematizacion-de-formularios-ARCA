<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\TrComando;
/**
 * Este es el unit test para la clase "tr_comando".
 *
 * @property int4 $id_comando
 * @property varchar $nom_comando
 * @property varchar $clase_comando
 * @property varchar $hash_comando
 *
 * @property FdCapitulo[] $fdCapitulos
 * @property FdComandoPregunta[] $fdComandoPreguntas
 * @property FdPregunta[] $idPreguntas
 */
class TrComandoTest extends \Codeception\Test\Unit
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
        $tester = new TrComando();
        $tester->id_comando = "Ingresar valor de pruebas para el campo id_comando de tipo int4";
        $tester->nom_comando = "Ingresar valor de pruebas para el campo nom_comando de tipo varchar";
        $tester->clase_comando = "Ingresar valor de pruebas para el campo clase_comando de tipo varchar";
        $tester->hash_comando = "Ingresar valor de pruebas para el campo hash_comando de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new TrComando;
        $tester->id_comando = "Ingresar valor de pruebas para el campo id_comando de tipo int4";
        $tester->nom_comando = "Ingresar valor de pruebas para el campo nom_comando de tipo varchar";
        $tester->clase_comando = "Ingresar valor de pruebas para el campo clase_comando de tipo varchar";
        $tester->hash_comando = "Ingresar valor de pruebas para el campo hash_comando de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'TrComando  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = TrComando::findOne(                                                               
        [
           'id_comando' => "Ingresar valor de pruebas para el campo id_comando de tipo int4",
           'nom_comando' => "Ingresar valor de pruebas para el campo nom_comando de tipo varchar",
           'clase_comando' => "Ingresar valor de pruebas para el campo clase_comando de tipo varchar",
           'hash_comando' => "Ingresar valor de pruebas para el campo hash_comando de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'TrComando No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'TrComando Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = TrComando::findOne(                                                               
        [
           'id_comando' => "Ingresar valor de pruebas para el campo id_comando de tipo int4",
           'nom_comando' => "Ingresar valor de pruebas para el campo nom_comando de tipo varchar",
           'clase_comando' => "Ingresar valor de pruebas para el campo clase_comando de tipo varchar",
           'hash_comando' => "Ingresar valor de pruebas para el campo hash_comando de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= TrComando::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new TrComando();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new TrComando();
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
         expect($tester->id_comando)->equals('Ingresar valor de pruebas para el campo id_comando de tipo int4');
         expect($tester->nom_comando)->equals('Ingresar valor de pruebas para el campo nom_comando de tipo varchar');
         expect($tester->clase_comando)->equals('Ingresar valor de pruebas para el campo clase_comando de tipo varchar');
         expect($tester->hash_comando)->equals('Ingresar valor de pruebas para el campo hash_comando de tipo varchar');
      }

}
