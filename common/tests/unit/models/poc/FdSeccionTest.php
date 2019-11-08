<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdSeccion;
/**
 * Este es el unit test para la clase "fd_seccion".
 *
 * @property int4 $id_seccion
 * @property varchar $nom_seccion
 * @property int4 $orden
 * @property int4 $id_capitulo
 * @property int4 $num_columnas
 * @property int4 $num_col
 * @property varchar $stylecss
 *
 * @property FdPregunta[] $fdPreguntas
 * @property FdCapitulo $idCapitulo
 */
class FdSeccionTest extends \Codeception\Test\Unit
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
        $tester = new FdSeccion();
        $tester->id_seccion = "Ingresar valor de pruebas para el campo id_seccion de tipo int4";
        $tester->nom_seccion = "Ingresar valor de pruebas para el campo nom_seccion de tipo varchar";
        $tester->orden = "Ingresar valor de pruebas para el campo orden de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
        $tester->num_columnas = "Ingresar valor de pruebas para el campo num_columnas de tipo int4";
        $tester->num_col = "Ingresar valor de pruebas para el campo num_col de tipo int4";
        $tester->stylecss = "Ingresar valor de pruebas para el campo stylecss de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdSeccion;
        $tester->id_seccion = "Ingresar valor de pruebas para el campo id_seccion de tipo int4";
        $tester->nom_seccion = "Ingresar valor de pruebas para el campo nom_seccion de tipo varchar";
        $tester->orden = "Ingresar valor de pruebas para el campo orden de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
        $tester->num_columnas = "Ingresar valor de pruebas para el campo num_columnas de tipo int4";
        $tester->num_col = "Ingresar valor de pruebas para el campo num_col de tipo int4";
        $tester->stylecss = "Ingresar valor de pruebas para el campo stylecss de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdSeccion  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdSeccion::findOne(                                                               
        [
           'id_seccion' => "Ingresar valor de pruebas para el campo id_seccion de tipo int4",
           'nom_seccion' => "Ingresar valor de pruebas para el campo nom_seccion de tipo varchar",
           'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
           'num_columnas' => "Ingresar valor de pruebas para el campo num_columnas de tipo int4",
           'num_col' => "Ingresar valor de pruebas para el campo num_col de tipo int4",
           'stylecss' => "Ingresar valor de pruebas para el campo stylecss de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdSeccion No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdSeccion Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdSeccion::findOne(                                                               
        [
           'id_seccion' => "Ingresar valor de pruebas para el campo id_seccion de tipo int4",
           'nom_seccion' => "Ingresar valor de pruebas para el campo nom_seccion de tipo varchar",
           'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
           'num_columnas' => "Ingresar valor de pruebas para el campo num_columnas de tipo int4",
           'num_col' => "Ingresar valor de pruebas para el campo num_col de tipo int4",
           'stylecss' => "Ingresar valor de pruebas para el campo stylecss de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdSeccion::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdSeccion();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdSeccion();
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
         expect($tester->id_seccion)->equals('Ingresar valor de pruebas para el campo id_seccion de tipo int4');
         expect($tester->nom_seccion)->equals('Ingresar valor de pruebas para el campo nom_seccion de tipo varchar');
         expect($tester->orden)->equals('Ingresar valor de pruebas para el campo orden de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
         expect($tester->num_columnas)->equals('Ingresar valor de pruebas para el campo num_columnas de tipo int4');
         expect($tester->num_col)->equals('Ingresar valor de pruebas para el campo num_col de tipo int4');
         expect($tester->stylecss)->equals('Ingresar valor de pruebas para el campo stylecss de tipo varchar');
      }

}
