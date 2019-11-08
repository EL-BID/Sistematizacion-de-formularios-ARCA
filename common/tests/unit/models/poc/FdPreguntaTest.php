<?php

namespace common\tests\unit\models\poc;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\poc\FdPregunta;
/**
 * Este es el unit test para la clase "fd_pregunta".
 *
 * @property int4 $id_pregunta
 * @property varchar $nom_pregunta
 * @property varchar $ayuda_pregunta
 * @property varchar $obligatorio
 * @property int4 $max_largo
 * @property int4 $min_largo
 * @property date $max_date
 * @property date $min_date
 * @property int4 $orden
 * @property varchar $estado
 * @property date $ini_fecha
 * @property date $fin_fecha
 * @property int4 $id_tpregunta
 * @property int4 $id_capitulo
 * @property int4 $id_seccion
 * @property int4 $id_agrupacion
 * @property int4 $id_tselect
 * @property varchar $caracteristica_preg
 * @property int4 $id_conjunto_pregunta
 * @property varchar $visible
 * @property varchar $visible_desc_preg
 * @property int4 $num_col_label
 * @property int4 $num_col_input
 * @property varchar $stylecss
 * @property varchar $format
 * @property numeric $min_number
 * @property numeric $max_number
 * @property varchar $atributos
 * @property varchar $reg_exp
 * @property varchar $numerada
 *
 * @property FdClasificacionPregunta[] $fdClasificacionPreguntas
 * @property FdComandoPregunta[] $fdComandoPreguntas
 * @property TrComando[] $idComandos
 * @property FdCoordenada[] $fdCoordenadas
 * @property FdElementoCondicion[] $fdElementoCondicions
 * @property FdElementoCondicion[] $fdElementoCondicions0
 * @property FdInvolucrado[] $fdInvolucrados
 * @property FdAgrupacion $idAgrupacion
 * @property FdCapitulo $idCapitulo
 * @property FdConjuntoPregunta $idConjuntoPregunta
 * @property FdSeccion $idSeccion
 * @property FdTipoPregunta $idTpregunta
 * @property FdTipoSelect $idTselect
 * @property FdPreguntaDescendiente[] $fdPreguntaDescendientes
 * @property FdPreguntaDescendiente[] $fdPreguntaDescendientes0
 * @property FdRespuesta[] $fdRespuestas
 * @property FdRespuestaXMes[] $fdRespuestaXMes
 * @property FdUbicacion[] $fdUbicacions
 */
class FdPreguntaTest extends \Codeception\Test\Unit
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
        $tester = new FdPregunta();
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->nom_pregunta = "Ingresar valor de pruebas para el campo nom_pregunta de tipo varchar";
        $tester->ayuda_pregunta = "Ingresar valor de pruebas para el campo ayuda_pregunta de tipo varchar";
        $tester->obligatorio = "Ingresar valor de pruebas para el campo obligatorio de tipo varchar";
        $tester->max_largo = "Ingresar valor de pruebas para el campo max_largo de tipo int4";
        $tester->min_largo = "Ingresar valor de pruebas para el campo min_largo de tipo int4";
        $tester->max_date = "Ingresar valor de pruebas para el campo max_date de tipo date";
        $tester->min_date = "Ingresar valor de pruebas para el campo min_date de tipo date";
        $tester->orden = "Ingresar valor de pruebas para el campo orden de tipo int4";
        $tester->estado = "Ingresar valor de pruebas para el campo estado de tipo varchar";
        $tester->ini_fecha = "Ingresar valor de pruebas para el campo ini_fecha de tipo date";
        $tester->fin_fecha = "Ingresar valor de pruebas para el campo fin_fecha de tipo date";
        $tester->id_tpregunta = "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
        $tester->id_seccion = "Ingresar valor de pruebas para el campo id_seccion de tipo int4";
        $tester->id_agrupacion = "Ingresar valor de pruebas para el campo id_agrupacion de tipo int4";
        $tester->id_tselect = "Ingresar valor de pruebas para el campo id_tselect de tipo int4";
        $tester->caracteristica_preg = "Ingresar valor de pruebas para el campo caracteristica_preg de tipo varchar";
        $tester->id_conjunto_pregunta = "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4";
        $tester->visible = "Ingresar valor de pruebas para el campo visible de tipo varchar";
        $tester->visible_desc_preg = "Ingresar valor de pruebas para el campo visible_desc_preg de tipo varchar";
        $tester->num_col_label = "Ingresar valor de pruebas para el campo num_col_label de tipo int4";
        $tester->num_col_input = "Ingresar valor de pruebas para el campo num_col_input de tipo int4";
        $tester->stylecss = "Ingresar valor de pruebas para el campo stylecss de tipo varchar";
        $tester->format = "Ingresar valor de pruebas para el campo format de tipo varchar";
        $tester->min_number = "Ingresar valor de pruebas para el campo min_number de tipo numeric";
        $tester->max_number = "Ingresar valor de pruebas para el campo max_number de tipo numeric";
        $tester->atributos = "Ingresar valor de pruebas para el campo atributos de tipo varchar";
        $tester->reg_exp = "Ingresar valor de pruebas para el campo reg_exp de tipo varchar";
        $tester->numerada = "Ingresar valor de pruebas para el campo numerada de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new FdPregunta;
        $tester->id_pregunta = "Ingresar valor de pruebas para el campo id_pregunta de tipo int4";
        $tester->nom_pregunta = "Ingresar valor de pruebas para el campo nom_pregunta de tipo varchar";
        $tester->ayuda_pregunta = "Ingresar valor de pruebas para el campo ayuda_pregunta de tipo varchar";
        $tester->obligatorio = "Ingresar valor de pruebas para el campo obligatorio de tipo varchar";
        $tester->max_largo = "Ingresar valor de pruebas para el campo max_largo de tipo int4";
        $tester->min_largo = "Ingresar valor de pruebas para el campo min_largo de tipo int4";
        $tester->max_date = "Ingresar valor de pruebas para el campo max_date de tipo date";
        $tester->min_date = "Ingresar valor de pruebas para el campo min_date de tipo date";
        $tester->orden = "Ingresar valor de pruebas para el campo orden de tipo int4";
        $tester->estado = "Ingresar valor de pruebas para el campo estado de tipo varchar";
        $tester->ini_fecha = "Ingresar valor de pruebas para el campo ini_fecha de tipo date";
        $tester->fin_fecha = "Ingresar valor de pruebas para el campo fin_fecha de tipo date";
        $tester->id_tpregunta = "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4";
        $tester->id_capitulo = "Ingresar valor de pruebas para el campo id_capitulo de tipo int4";
        $tester->id_seccion = "Ingresar valor de pruebas para el campo id_seccion de tipo int4";
        $tester->id_agrupacion = "Ingresar valor de pruebas para el campo id_agrupacion de tipo int4";
        $tester->id_tselect = "Ingresar valor de pruebas para el campo id_tselect de tipo int4";
        $tester->caracteristica_preg = "Ingresar valor de pruebas para el campo caracteristica_preg de tipo varchar";
        $tester->id_conjunto_pregunta = "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4";
        $tester->visible = "Ingresar valor de pruebas para el campo visible de tipo varchar";
        $tester->visible_desc_preg = "Ingresar valor de pruebas para el campo visible_desc_preg de tipo varchar";
        $tester->num_col_label = "Ingresar valor de pruebas para el campo num_col_label de tipo int4";
        $tester->num_col_input = "Ingresar valor de pruebas para el campo num_col_input de tipo int4";
        $tester->stylecss = "Ingresar valor de pruebas para el campo stylecss de tipo varchar";
        $tester->format = "Ingresar valor de pruebas para el campo format de tipo varchar";
        $tester->min_number = "Ingresar valor de pruebas para el campo min_number de tipo numeric";
        $tester->max_number = "Ingresar valor de pruebas para el campo max_number de tipo numeric";
        $tester->atributos = "Ingresar valor de pruebas para el campo atributos de tipo varchar";
        $tester->reg_exp = "Ingresar valor de pruebas para el campo reg_exp de tipo varchar";
        $tester->numerada = "Ingresar valor de pruebas para el campo numerada de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'FdPregunta  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = FdPregunta::findOne(                                                               
        [
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'nom_pregunta' => "Ingresar valor de pruebas para el campo nom_pregunta de tipo varchar",
           'ayuda_pregunta' => "Ingresar valor de pruebas para el campo ayuda_pregunta de tipo varchar",
           'obligatorio' => "Ingresar valor de pruebas para el campo obligatorio de tipo varchar",
           'max_largo' => "Ingresar valor de pruebas para el campo max_largo de tipo int4",
           'min_largo' => "Ingresar valor de pruebas para el campo min_largo de tipo int4",
           'max_date' => "Ingresar valor de pruebas para el campo max_date de tipo date",
           'min_date' => "Ingresar valor de pruebas para el campo min_date de tipo date",
           'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",
           'estado' => "Ingresar valor de pruebas para el campo estado de tipo varchar",
           'ini_fecha' => "Ingresar valor de pruebas para el campo ini_fecha de tipo date",
           'fin_fecha' => "Ingresar valor de pruebas para el campo fin_fecha de tipo date",
           'id_tpregunta' => "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
           'id_seccion' => "Ingresar valor de pruebas para el campo id_seccion de tipo int4",
           'id_agrupacion' => "Ingresar valor de pruebas para el campo id_agrupacion de tipo int4",
           'id_tselect' => "Ingresar valor de pruebas para el campo id_tselect de tipo int4",
           'caracteristica_preg' => "Ingresar valor de pruebas para el campo caracteristica_preg de tipo varchar",
           'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",
           'visible' => "Ingresar valor de pruebas para el campo visible de tipo varchar",
           'visible_desc_preg' => "Ingresar valor de pruebas para el campo visible_desc_preg de tipo varchar",
           'num_col_label' => "Ingresar valor de pruebas para el campo num_col_label de tipo int4",
           'num_col_input' => "Ingresar valor de pruebas para el campo num_col_input de tipo int4",
           'stylecss' => "Ingresar valor de pruebas para el campo stylecss de tipo varchar",
           'format' => "Ingresar valor de pruebas para el campo format de tipo varchar",
           'min_number' => "Ingresar valor de pruebas para el campo min_number de tipo numeric",
           'max_number' => "Ingresar valor de pruebas para el campo max_number de tipo numeric",
           'atributos' => "Ingresar valor de pruebas para el campo atributos de tipo varchar",
           'reg_exp' => "Ingresar valor de pruebas para el campo reg_exp de tipo varchar",
           'numerada' => "Ingresar valor de pruebas para el campo numerada de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'FdPregunta No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'FdPregunta Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = FdPregunta::findOne(                                                               
        [
           'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",
           'nom_pregunta' => "Ingresar valor de pruebas para el campo nom_pregunta de tipo varchar",
           'ayuda_pregunta' => "Ingresar valor de pruebas para el campo ayuda_pregunta de tipo varchar",
           'obligatorio' => "Ingresar valor de pruebas para el campo obligatorio de tipo varchar",
           'max_largo' => "Ingresar valor de pruebas para el campo max_largo de tipo int4",
           'min_largo' => "Ingresar valor de pruebas para el campo min_largo de tipo int4",
           'max_date' => "Ingresar valor de pruebas para el campo max_date de tipo date",
           'min_date' => "Ingresar valor de pruebas para el campo min_date de tipo date",
           'orden' => "Ingresar valor de pruebas para el campo orden de tipo int4",
           'estado' => "Ingresar valor de pruebas para el campo estado de tipo varchar",
           'ini_fecha' => "Ingresar valor de pruebas para el campo ini_fecha de tipo date",
           'fin_fecha' => "Ingresar valor de pruebas para el campo fin_fecha de tipo date",
           'id_tpregunta' => "Ingresar valor de pruebas para el campo id_tpregunta de tipo int4",
           'id_capitulo' => "Ingresar valor de pruebas para el campo id_capitulo de tipo int4",
           'id_seccion' => "Ingresar valor de pruebas para el campo id_seccion de tipo int4",
           'id_agrupacion' => "Ingresar valor de pruebas para el campo id_agrupacion de tipo int4",
           'id_tselect' => "Ingresar valor de pruebas para el campo id_tselect de tipo int4",
           'caracteristica_preg' => "Ingresar valor de pruebas para el campo caracteristica_preg de tipo varchar",
           'id_conjunto_pregunta' => "Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4",
           'visible' => "Ingresar valor de pruebas para el campo visible de tipo varchar",
           'visible_desc_preg' => "Ingresar valor de pruebas para el campo visible_desc_preg de tipo varchar",
           'num_col_label' => "Ingresar valor de pruebas para el campo num_col_label de tipo int4",
           'num_col_input' => "Ingresar valor de pruebas para el campo num_col_input de tipo int4",
           'stylecss' => "Ingresar valor de pruebas para el campo stylecss de tipo varchar",
           'format' => "Ingresar valor de pruebas para el campo format de tipo varchar",
           'min_number' => "Ingresar valor de pruebas para el campo min_number de tipo numeric",
           'max_number' => "Ingresar valor de pruebas para el campo max_number de tipo numeric",
           'atributos' => "Ingresar valor de pruebas para el campo atributos de tipo varchar",
           'reg_exp' => "Ingresar valor de pruebas para el campo reg_exp de tipo varchar",
           'numerada' => "Ingresar valor de pruebas para el campo numerada de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= FdPregunta::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new FdPregunta();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new FdPregunta();
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
         expect($tester->id_pregunta)->equals('Ingresar valor de pruebas para el campo id_pregunta de tipo int4');
         expect($tester->nom_pregunta)->equals('Ingresar valor de pruebas para el campo nom_pregunta de tipo varchar');
         expect($tester->ayuda_pregunta)->equals('Ingresar valor de pruebas para el campo ayuda_pregunta de tipo varchar');
         expect($tester->obligatorio)->equals('Ingresar valor de pruebas para el campo obligatorio de tipo varchar');
         expect($tester->max_largo)->equals('Ingresar valor de pruebas para el campo max_largo de tipo int4');
         expect($tester->min_largo)->equals('Ingresar valor de pruebas para el campo min_largo de tipo int4');
         expect($tester->max_date)->equals('Ingresar valor de pruebas para el campo max_date de tipo date');
         expect($tester->min_date)->equals('Ingresar valor de pruebas para el campo min_date de tipo date');
         expect($tester->orden)->equals('Ingresar valor de pruebas para el campo orden de tipo int4');
         expect($tester->estado)->equals('Ingresar valor de pruebas para el campo estado de tipo varchar');
         expect($tester->ini_fecha)->equals('Ingresar valor de pruebas para el campo ini_fecha de tipo date');
         expect($tester->fin_fecha)->equals('Ingresar valor de pruebas para el campo fin_fecha de tipo date');
         expect($tester->id_tpregunta)->equals('Ingresar valor de pruebas para el campo id_tpregunta de tipo int4');
         expect($tester->id_capitulo)->equals('Ingresar valor de pruebas para el campo id_capitulo de tipo int4');
         expect($tester->id_seccion)->equals('Ingresar valor de pruebas para el campo id_seccion de tipo int4');
         expect($tester->id_agrupacion)->equals('Ingresar valor de pruebas para el campo id_agrupacion de tipo int4');
         expect($tester->id_tselect)->equals('Ingresar valor de pruebas para el campo id_tselect de tipo int4');
         expect($tester->caracteristica_preg)->equals('Ingresar valor de pruebas para el campo caracteristica_preg de tipo varchar');
         expect($tester->id_conjunto_pregunta)->equals('Ingresar valor de pruebas para el campo id_conjunto_pregunta de tipo int4');
         expect($tester->visible)->equals('Ingresar valor de pruebas para el campo visible de tipo varchar');
         expect($tester->visible_desc_preg)->equals('Ingresar valor de pruebas para el campo visible_desc_preg de tipo varchar');
         expect($tester->num_col_label)->equals('Ingresar valor de pruebas para el campo num_col_label de tipo int4');
         expect($tester->num_col_input)->equals('Ingresar valor de pruebas para el campo num_col_input de tipo int4');
         expect($tester->stylecss)->equals('Ingresar valor de pruebas para el campo stylecss de tipo varchar');
         expect($tester->format)->equals('Ingresar valor de pruebas para el campo format de tipo varchar');
         expect($tester->min_number)->equals('Ingresar valor de pruebas para el campo min_number de tipo numeric');
         expect($tester->max_number)->equals('Ingresar valor de pruebas para el campo max_number de tipo numeric');
         expect($tester->atributos)->equals('Ingresar valor de pruebas para el campo atributos de tipo varchar');
         expect($tester->reg_exp)->equals('Ingresar valor de pruebas para el campo reg_exp de tipo varchar');
         expect($tester->numerada)->equals('Ingresar valor de pruebas para el campo numerada de tipo varchar');
      }

}
