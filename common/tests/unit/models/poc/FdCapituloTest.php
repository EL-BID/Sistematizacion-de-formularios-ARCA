<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdCapitulo;
/**
 * Este es el unit test para la clase "fd_capitulo".
 *
 * @property int4 $id_capitulo
 * @property varchar $nom_capitulo
 * @property int4 $orden
 * @property varchar $url
 * @property varchar $consulta
 * @property int4 $id_tview_cap
 * @property int4 $id_tcapitulo
 * @property varchar $icono
 * @property int4 $id_conjunto_pregunta
 * @property int4 $id_comando
 * @property int4 $num_columnas
 * @property varchar $stylecss
 * @property varchar $numeracion
 *
 * @property FdConjuntoPregunta $idConjuntoPregunta
 * @property FdTipoCapitulo $idTcapitulo
 * @property FdTipoViewCap $idTviewCap
 * @property TrComando $idComando
 * @property FdElementoCondicion[] $fdElementoCondicions
 * @property FdPregunta[] $fdPreguntas
 * @property FdRespuesta[] $fdRespuestas
 * @property FdSeccion[] $fdSeccions
 */
class FdCapituloTest extends \Codeception\Test\Unit
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
        $tester = new FdCapitulo();
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
        $tester->nom_capitulo = "Ingresar valor de pruebas para el campo nom_capitulo de tipo varchar";
        $tester->orden = "Ingresar valor de pruebas para el campo orden de tipo int4";
        $tester->url = "Ingresar valor de pruebas para el campo url de tipo varchar";
        $tester->consulta = "Ingresar valor de pruebas para el campo consulta de tipo varchar";
        $tester->id_tview_cap = "Ingresar valor de pruebas para el campo id_tview_cap de tipo int4";
        $tester->id_tcapitulo = "Ingresar valor de pruebas para el campo id_tcapitulo de tipo int4";
        $tester->icono = "Ingresar valor de pruebas para el campo icono de tipo varchar";
        $tester->id_conjunto_pregunta = "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4";
        $tester->id_comando = "Ingresar valor de pruebas para el campo id_comando de tipo int4";
        $tester->num_columnas = "Ingresar valor de pruebas para el campo num_columnas de tipo int4";
        $tester->stylecss = "Ingresar valor de pruebas para el campo stylecss de tipo varchar";
        $tester->numeracion = "Ingresar valor de pruebas para el campo numeracion de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdCapitulo;
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
        $tester->nom_capitulo = "Ingresar valor de pruebas para el campo nom_capitulo de tipo varchar";
        $tester->orden = "Ingresar valor de pruebas para el campo orden de tipo int4";
        $tester->url = "Ingresar valor de pruebas para el campo url de tipo varchar";
        $tester->consulta = "Ingresar valor de pruebas para el campo consulta de tipo varchar";
        $tester->id_tview_cap = "Ingresar valor de pruebas para el campo id_tview_cap de tipo int4";
        $tester->id_tcapitulo = "Ingresar valor de pruebas para el campo id_tcapitulo de tipo int4";
        $tester->icono = "Ingresar valor de pruebas para el campo icono de tipo varchar";
        $tester->id_conjunto_pregunta = "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4";
        $tester->id_comando = "Ingresar valor de pruebas para el campo id_comando de tipo int4";
        $tester->num_columnas = "Ingresar valor de pruebas para el campo num_columnas de tipo int4";
        $tester->stylecss = "Ingresar valor de pruebas para el campo stylecss de tipo varchar";
        $tester->numeracion = "Ingresar valor de pruebas para el campo numeracion de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdCapitulo  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdCapitulo::findOne(                                                               
        [
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
           'nom_capitulo' => "Ingresar valor de pruebas para el campo nom_capitulo de tipo varchar",
           'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",
           'url' => "Ingresar valor de pruebas para el campo url de tipo varchar",
           'consulta' => "Ingresar valor de pruebas para el campo consulta de tipo varchar",
           'id_tview_cap' => "Ingresar valor de pruebas para el campo id_tview_cap de tipo int4",
           'id_tcapitulo' => "Ingresar valor de pruebas para el campo id_tcapitulo de tipo int4",
           'icono' => "Ingresar valor de pruebas para el campo icono de tipo varchar",
           'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",
           'id_comando' => "Ingresar valor de pruebas para el campo id_comando de tipo int4",
           'num_columnas' => "Ingresar valor de pruebas para el campo num_columnas de tipo int4",
           'stylecss' => "Ingresar valor de pruebas para el campo stylecss de tipo varchar",
           'numeracion' => "Ingresar valor de pruebas para el campo numeracion de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdCapitulo No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdCapitulo Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdCapitulo::findOne(                                                               
        [
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
           'nom_capitulo' => "Ingresar valor de pruebas para el campo nom_capitulo de tipo varchar",
           'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",
           'url' => "Ingresar valor de pruebas para el campo url de tipo varchar",
           'consulta' => "Ingresar valor de pruebas para el campo consulta de tipo varchar",
           'id_tview_cap' => "Ingresar valor de pruebas para el campo id_tview_cap de tipo int4",
           'id_tcapitulo' => "Ingresar valor de pruebas para el campo id_tcapitulo de tipo int4",
           'icono' => "Ingresar valor de pruebas para el campo icono de tipo varchar",
           'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",
           'id_comando' => "Ingresar valor de pruebas para el campo id_comando de tipo int4",
           'num_columnas' => "Ingresar valor de pruebas para el campo num_columnas de tipo int4",
           'stylecss' => "Ingresar valor de pruebas para el campo stylecss de tipo varchar",
           'numeracion' => "Ingresar valor de pruebas para el campo numeracion de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdCapitulo::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdCapitulo();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdCapitulo();
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
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
         expect($tester->nom_capitulo)->equals('Ingresar valor de pruebas para el campo nom_capitulo de tipo varchar');
         expect($tester->orden)->equals('Ingresar valor de pruebas para el campo orden de tipo int4');
         expect($tester->url)->equals('Ingresar valor de pruebas para el campo url de tipo varchar');
         expect($tester->consulta)->equals('Ingresar valor de pruebas para el campo consulta de tipo varchar');
         expect($tester->id_tview_cap)->equals('Ingresar valor de pruebas para el campo id_tview_cap de tipo int4');
         expect($tester->id_tcapitulo)->equals('Ingresar valor de pruebas para el campo id_tcapitulo de tipo int4');
         expect($tester->icono)->equals('Ingresar valor de pruebas para el campo icono de tipo varchar');
         expect($tester->id_conjunto_pregunta)->equals('Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4');
         expect($tester->id_comando)->equals('Ingresar valor de pruebas para el campo id_comando de tipo int4');
         expect($tester->num_columnas)->equals('Ingresar valor de pruebas para el campo num_columnas de tipo int4');
         expect($tester->stylecss)->equals('Ingresar valor de pruebas para el campo stylecss de tipo varchar');
         expect($tester->numeracion)->equals('Ingresar valor de pruebas para el campo numeracion de tipo varchar');
      }

}
