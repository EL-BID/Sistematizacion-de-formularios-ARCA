<?php

namespace common\tests\unit\models\cargaquipux;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\cargaquipux\PsDetArcCargue;
/**
 * Este es el unit test para la clase "ps_det_arc_cargue".
 *
 * @property int4 $id_archivo_cargue
 * @property int4 $id_det_arc_cargue
 * @property varchar $num_nom_hoja
 * @property int4 $num_columna_excel
 * @property varchar $nom_columna_cargue
 * @property varchar $nom_columna_excel
 *
 * @property PsArchivoCargue $idArchivoCargue
 */
class PsDetArcCargueTest extends \Codeception\Test\Unit
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
        $tester = new PsDetArcCargue();
        $tester->id_archivo_cargue = "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4";
        $tester->id_det_arc_cargue = "Ingresar valor de pruebas para el campo id_det_arc_cargue de tipo int4";
        $tester->num_nom_hoja = "Ingresar valor de pruebas para el campo num_nom_hoja de tipo varchar";
        $tester->num_columna_excel = "Ingresar valor de pruebas para el campo num_columna_excel de tipo int4";
        $tester->nom_columna_cargue = "Ingresar valor de pruebas para el campo nom_columna_cargue de tipo varchar";
        $tester->nom_columna_excel = "Ingresar valor de pruebas para el campo nom_columna_excel de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsDetArcCargue;
        $tester->id_archivo_cargue = "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4";
        $tester->id_det_arc_cargue = "Ingresar valor de pruebas para el campo id_det_arc_cargue de tipo int4";
        $tester->num_nom_hoja = "Ingresar valor de pruebas para el campo num_nom_hoja de tipo varchar";
        $tester->num_columna_excel = "Ingresar valor de pruebas para el campo num_columna_excel de tipo int4";
        $tester->nom_columna_cargue = "Ingresar valor de pruebas para el campo nom_columna_cargue de tipo varchar";
        $tester->nom_columna_excel = "Ingresar valor de pruebas para el campo nom_columna_excel de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsDetArcCargue  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsDetArcCargue::findOne(                                                               
        [
           'id_archivo_cargue' => "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4",
           'id_det_arc_cargue' => "Ingresar valor de pruebas para el campo id_det_arc_cargue de tipo int4",
           'num_nom_hoja' => "Ingresar valor de pruebas para el campo num_nom_hoja de tipo varchar",
           'num_columna_excel' => "Ingresar valor de pruebas para el campo num_columna_excel de tipo int4",
           'nom_columna_cargue' => "Ingresar valor de pruebas para el campo nom_columna_cargue de tipo varchar",
           'nom_columna_excel' => "Ingresar valor de pruebas para el campo nom_columna_excel de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsDetArcCargue No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsDetArcCargue Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsDetArcCargue::findOne(                                                               
        [
           'id_archivo_cargue' => "Ingresar valor de pruebas para el campo id_archivo_cargue de tipo int4",
           'id_det_arc_cargue' => "Ingresar valor de pruebas para el campo id_det_arc_cargue de tipo int4",
           'num_nom_hoja' => "Ingresar valor de pruebas para el campo num_nom_hoja de tipo varchar",
           'num_columna_excel' => "Ingresar valor de pruebas para el campo num_columna_excel de tipo int4",
           'nom_columna_cargue' => "Ingresar valor de pruebas para el campo nom_columna_cargue de tipo varchar",
           'nom_columna_excel' => "Ingresar valor de pruebas para el campo nom_columna_excel de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsDetArcCargue::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsDetArcCargue();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsDetArcCargue();
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
         expect($tester->id_det_arc_cargue)->equals('Ingresar valor de pruebas para el campo id_det_arc_cargue de tipo int4');
         expect($tester->num_nom_hoja)->equals('Ingresar valor de pruebas para el campo num_nom_hoja de tipo varchar');
         expect($tester->num_columna_excel)->equals('Ingresar valor de pruebas para el campo num_columna_excel de tipo int4');
         expect($tester->nom_columna_cargue)->equals('Ingresar valor de pruebas para el campo nom_columna_cargue de tipo varchar');
         expect($tester->nom_columna_excel)->equals('Ingresar valor de pruebas para el campo nom_columna_excel de tipo varchar');
      }

}
