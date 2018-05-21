<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdOpcionSelect;
/**
 * Este es el unit test para la clase "fd_opcion_select".
 *
 * @property int4 $id_opcion_select
 * @property varchar $nom_opcion_select
 * @property int4 $orden
 * @property int4 $id_tselect
 * @property varchar $estado
 *
 * @property FdTipoSelect $idTselect
 * @property FdRespuesta[] $fdRespuestas
 * @property FdRespuestaXMes[] $fdRespuestaXMes
 */
class FdOpcionSelectTest extends \Codeception\Test\Unit
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
        $tester = new FdOpcionSelect();
        $tester->id_opcion_select = "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4";
        $tester->nom_opcion_select = "Ingresar valor de pruebas para el campo nom_opcion_select de tipo varchar";
        $tester->orden = "Ingresar valor de pruebas para el campo orden de tipo int4";
        $tester->id_tselect = "Ingresar valor de pruebas para el campo id_tselect de tipo int4";
        $tester->estado = "Ingresar valor de pruebas para el campo estado de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdOpcionSelect;
        $tester->id_opcion_select = "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4";
        $tester->nom_opcion_select = "Ingresar valor de pruebas para el campo nom_opcion_select de tipo varchar";
        $tester->orden = "Ingresar valor de pruebas para el campo orden de tipo int4";
        $tester->id_tselect = "Ingresar valor de pruebas para el campo id_tselect de tipo int4";
        $tester->estado = "Ingresar valor de pruebas para el campo estado de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdOpcionSelect  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdOpcionSelect::findOne(                                                               
        [
           'id_opcion_select' => "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4",
           'nom_opcion_select' => "Ingresar valor de pruebas para el campo nom_opcion_select de tipo varchar",
           'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",
           'id_tselect' => "Ingresar valor de pruebas para el campo id_tselect de tipo int4",
           'estado' => "Ingresar valor de pruebas para el campo estado de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdOpcionSelect No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdOpcionSelect Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdOpcionSelect::findOne(                                                               
        [
           'id_opcion_select' => "Ingresar valor de pruebas para el campo id_opcion_select de tipo int4",
           'nom_opcion_select' => "Ingresar valor de pruebas para el campo nom_opcion_select de tipo varchar",
           'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",
           'id_tselect' => "Ingresar valor de pruebas para el campo id_tselect de tipo int4",
           'estado' => "Ingresar valor de pruebas para el campo estado de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdOpcionSelect::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdOpcionSelect();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdOpcionSelect();
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
         expect($tester->id_opcion_select)->equals('Ingresar valor de pruebas para el campo id_opcion_select de tipo int4');
         expect($tester->nom_opcion_select)->equals('Ingresar valor de pruebas para el campo nom_opcion_select de tipo varchar');
         expect($tester->orden)->equals('Ingresar valor de pruebas para el campo orden de tipo int4');
         expect($tester->id_tselect)->equals('Ingresar valor de pruebas para el campo id_tselect de tipo int4');
         expect($tester->estado)->equals('Ingresar valor de pruebas para el campo estado de tipo varchar');
      }

}
