<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdTipoCapitulo;
/**
 * Este es el unit test para la clase "fd_tipo_capitulo".
 *
 * @property int4 $id_tcapitulo
 * @property varchar $nom_tcapitulo
 *
 * @property FdCapitulo[] $fdCapitulos
 */
class FdTipoCapituloTest extends \Codeception\Test\Unit
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
        $tester = new FdTipoCapitulo();
        $tester->id_tcapitulo = "Ingresar valor de pruebas para el campo id_tcapitulo de tipo int4";
        $tester->nom_tcapitulo = "Ingresar valor de pruebas para el campo nom_tcapitulo de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdTipoCapitulo;
        $tester->id_tcapitulo = "Ingresar valor de pruebas para el campo id_tcapitulo de tipo int4";
        $tester->nom_tcapitulo = "Ingresar valor de pruebas para el campo nom_tcapitulo de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdTipoCapitulo  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdTipoCapitulo::findOne(                                                               
        [
           'id_tcapitulo' => "Ingresar valor de pruebas para el campo id_tcapitulo de tipo int4",
           'nom_tcapitulo' => "Ingresar valor de pruebas para el campo nom_tcapitulo de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdTipoCapitulo No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdTipoCapitulo Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdTipoCapitulo::findOne(                                                               
        [
           'id_tcapitulo' => "Ingresar valor de pruebas para el campo id_tcapitulo de tipo int4",
           'nom_tcapitulo' => "Ingresar valor de pruebas para el campo nom_tcapitulo de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdTipoCapitulo::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdTipoCapitulo();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdTipoCapitulo();
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
         expect($tester->id_tcapitulo)->equals('Ingresar valor de pruebas para el campo id_tcapitulo de tipo int4');
         expect($tester->nom_tcapitulo)->equals('Ingresar valor de pruebas para el campo nom_tcapitulo de tipo varchar');
      }

}
