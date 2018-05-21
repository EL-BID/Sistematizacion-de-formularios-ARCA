<?php

namespace common\tests\unit\models\hidricos;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use common\models\hidricos\PsClasifActividad;
/**
 * Este es el unit test para la clase "ps_clasif_actividad".
 *
 * @property int4 $id_clasif_actividad
 * @property varchar $nom_clasif_tactividad
 * @property varchar $vis_c_obs
 * @property varchar $nom_c_obs
 * @property varchar $obl_c_obs
 * @property varchar $hab_c_obs
 * @property varchar $vis_c_fec_rea
 * @property varchar $nom_c_fec_rea
 * @property varchar $obl_c_fec_rea
 * @property varchar $hab_c_fec_rea
 * @property varchar $vis_c_fec_pre
 * @property varchar $nom_c_fec_pre
 * @property varchar $obl_c_fec_pre
 * @property varchar $hab_c_fec_pre
 * @property varchar $vis_c_num_qpx
 * @property varchar $nom_c_num_qpx
 * @property varchar $obl_c_num_qpx
 * @property varchar $hab_c_num_qpx
 * @property varchar $vis_c_usua
 * @property varchar $nom_c_usua
 * @property varchar $obl_c_usua
 * @property varchar $hab_c_usua
 * @property varchar $vis_c_dia_pau
 * @property varchar $nom_c_dia_pau
 * @property varchar $obl_c_dia_pau
 * @property varchar $hab_c_dia_pau
 * @property varchar $vis_c_caus
 * @property varchar $nom_c_caus
 * @property varchar $obl_c_caus
 * @property varchar $hab_c_caus
 * @property varchar $vis_c_fec_qpx
 * @property varchar $nom_c_fec_qpx
 * @property varchar $obl_c_fec_qpx
 * @property varchar $hab_c_fec_qpx
 *
 * @property PsActividad[] $psActividads
 */
class PsClasifActividadTest extends \Codeception\Test\Unit
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
        $tester = new PsClasifActividad();
        $tester->id_clasif_actividad = "Ingresar valor de pruebas para el campo id_clasif_actividad de tipo int4";
        $tester->nom_clasif_tactividad = "Ingresar valor de pruebas para el campo nom_clasif_tactividad de tipo varchar";
        $tester->vis_c_obs = "Ingresar valor de pruebas para el campo vis_c_obs de tipo varchar";
        $tester->nom_c_obs = "Ingresar valor de pruebas para el campo nom_c_obs de tipo varchar";
        $tester->obl_c_obs = "Ingresar valor de pruebas para el campo obl_c_obs de tipo varchar";
        $tester->hab_c_obs = "Ingresar valor de pruebas para el campo hab_c_obs de tipo varchar";
        $tester->vis_c_fec_rea = "Ingresar valor de pruebas para el campo vis_c_fec_rea de tipo varchar";
        $tester->nom_c_fec_rea = "Ingresar valor de pruebas para el campo nom_c_fec_rea de tipo varchar";
        $tester->obl_c_fec_rea = "Ingresar valor de pruebas para el campo obl_c_fec_rea de tipo varchar";
        $tester->hab_c_fec_rea = "Ingresar valor de pruebas para el campo hab_c_fec_rea de tipo varchar";
        $tester->vis_c_fec_pre = "Ingresar valor de pruebas para el campo vis_c_fec_pre de tipo varchar";
        $tester->nom_c_fec_pre = "Ingresar valor de pruebas para el campo nom_c_fec_pre de tipo varchar";
        $tester->obl_c_fec_pre = "Ingresar valor de pruebas para el campo obl_c_fec_pre de tipo varchar";
        $tester->hab_c_fec_pre = "Ingresar valor de pruebas para el campo hab_c_fec_pre de tipo varchar";
        $tester->vis_c_num_qpx = "Ingresar valor de pruebas para el campo vis_c_num_qpx de tipo varchar";
        $tester->nom_c_num_qpx = "Ingresar valor de pruebas para el campo nom_c_num_qpx de tipo varchar";
        $tester->obl_c_num_qpx = "Ingresar valor de pruebas para el campo obl_c_num_qpx de tipo varchar";
        $tester->hab_c_num_qpx = "Ingresar valor de pruebas para el campo hab_c_num_qpx de tipo varchar";
        $tester->vis_c_usua = "Ingresar valor de pruebas para el campo vis_c_usua de tipo varchar";
        $tester->nom_c_usua = "Ingresar valor de pruebas para el campo nom_c_usua de tipo varchar";
        $tester->obl_c_usua = "Ingresar valor de pruebas para el campo obl_c_usua de tipo varchar";
        $tester->hab_c_usua = "Ingresar valor de pruebas para el campo hab_c_usua de tipo varchar";
        $tester->vis_c_dia_pau = "Ingresar valor de pruebas para el campo vis_c_dia_pau de tipo varchar";
        $tester->nom_c_dia_pau = "Ingresar valor de pruebas para el campo nom_c_dia_pau de tipo varchar";
        $tester->obl_c_dia_pau = "Ingresar valor de pruebas para el campo obl_c_dia_pau de tipo varchar";
        $tester->hab_c_dia_pau = "Ingresar valor de pruebas para el campo hab_c_dia_pau de tipo varchar";
        $tester->vis_c_caus = "Ingresar valor de pruebas para el campo vis_c_caus de tipo varchar";
        $tester->nom_c_caus = "Ingresar valor de pruebas para el campo nom_c_caus de tipo varchar";
        $tester->obl_c_caus = "Ingresar valor de pruebas para el campo obl_c_caus de tipo varchar";
        $tester->hab_c_caus = "Ingresar valor de pruebas para el campo hab_c_caus de tipo varchar";
        $tester->vis_c_fec_qpx = "Ingresar valor de pruebas para el campo vis_c_fec_qpx de tipo varchar";
        $tester->nom_c_fec_qpx = "Ingresar valor de pruebas para el campo nom_c_fec_qpx de tipo varchar";
        $tester->obl_c_fec_qpx = "Ingresar valor de pruebas para el campo obl_c_fec_qpx de tipo varchar";
        $tester->hab_c_fec_qpx = "Ingresar valor de pruebas para el campo hab_c_fec_qpx de tipo varchar";
            
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new PsClasifActividad;
        $tester->id_clasif_actividad = "Ingresar valor de pruebas para el campo id_clasif_actividad de tipo int4";
        $tester->nom_clasif_tactividad = "Ingresar valor de pruebas para el campo nom_clasif_tactividad de tipo varchar";
        $tester->vis_c_obs = "Ingresar valor de pruebas para el campo vis_c_obs de tipo varchar";
        $tester->nom_c_obs = "Ingresar valor de pruebas para el campo nom_c_obs de tipo varchar";
        $tester->obl_c_obs = "Ingresar valor de pruebas para el campo obl_c_obs de tipo varchar";
        $tester->hab_c_obs = "Ingresar valor de pruebas para el campo hab_c_obs de tipo varchar";
        $tester->vis_c_fec_rea = "Ingresar valor de pruebas para el campo vis_c_fec_rea de tipo varchar";
        $tester->nom_c_fec_rea = "Ingresar valor de pruebas para el campo nom_c_fec_rea de tipo varchar";
        $tester->obl_c_fec_rea = "Ingresar valor de pruebas para el campo obl_c_fec_rea de tipo varchar";
        $tester->hab_c_fec_rea = "Ingresar valor de pruebas para el campo hab_c_fec_rea de tipo varchar";
        $tester->vis_c_fec_pre = "Ingresar valor de pruebas para el campo vis_c_fec_pre de tipo varchar";
        $tester->nom_c_fec_pre = "Ingresar valor de pruebas para el campo nom_c_fec_pre de tipo varchar";
        $tester->obl_c_fec_pre = "Ingresar valor de pruebas para el campo obl_c_fec_pre de tipo varchar";
        $tester->hab_c_fec_pre = "Ingresar valor de pruebas para el campo hab_c_fec_pre de tipo varchar";
        $tester->vis_c_num_qpx = "Ingresar valor de pruebas para el campo vis_c_num_qpx de tipo varchar";
        $tester->nom_c_num_qpx = "Ingresar valor de pruebas para el campo nom_c_num_qpx de tipo varchar";
        $tester->obl_c_num_qpx = "Ingresar valor de pruebas para el campo obl_c_num_qpx de tipo varchar";
        $tester->hab_c_num_qpx = "Ingresar valor de pruebas para el campo hab_c_num_qpx de tipo varchar";
        $tester->vis_c_usua = "Ingresar valor de pruebas para el campo vis_c_usua de tipo varchar";
        $tester->nom_c_usua = "Ingresar valor de pruebas para el campo nom_c_usua de tipo varchar";
        $tester->obl_c_usua = "Ingresar valor de pruebas para el campo obl_c_usua de tipo varchar";
        $tester->hab_c_usua = "Ingresar valor de pruebas para el campo hab_c_usua de tipo varchar";
        $tester->vis_c_dia_pau = "Ingresar valor de pruebas para el campo vis_c_dia_pau de tipo varchar";
        $tester->nom_c_dia_pau = "Ingresar valor de pruebas para el campo nom_c_dia_pau de tipo varchar";
        $tester->obl_c_dia_pau = "Ingresar valor de pruebas para el campo obl_c_dia_pau de tipo varchar";
        $tester->hab_c_dia_pau = "Ingresar valor de pruebas para el campo hab_c_dia_pau de tipo varchar";
        $tester->vis_c_caus = "Ingresar valor de pruebas para el campo vis_c_caus de tipo varchar";
        $tester->nom_c_caus = "Ingresar valor de pruebas para el campo nom_c_caus de tipo varchar";
        $tester->obl_c_caus = "Ingresar valor de pruebas para el campo obl_c_caus de tipo varchar";
        $tester->hab_c_caus = "Ingresar valor de pruebas para el campo hab_c_caus de tipo varchar";
        $tester->vis_c_fec_qpx = "Ingresar valor de pruebas para el campo vis_c_fec_qpx de tipo varchar";
        $tester->nom_c_fec_qpx = "Ingresar valor de pruebas para el campo nom_c_fec_qpx de tipo varchar";
        $tester->obl_c_fec_qpx = "Ingresar valor de pruebas para el campo obl_c_fec_qpx de tipo varchar";
        $tester->hab_c_fec_qpx = "Ingresar valor de pruebas para el campo hab_c_fec_qpx de tipo varchar";
            
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            'PsClasifActividad  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = PsClasifActividad::findOne(                                                               
        [
           'id_clasif_actividad' => "Ingresar valor de pruebas para el campo id_clasif_actividad de tipo int4",
           'nom_clasif_tactividad' => "Ingresar valor de pruebas para el campo nom_clasif_tactividad de tipo varchar",
           'vis_c_obs' => "Ingresar valor de pruebas para el campo vis_c_obs de tipo varchar",
           'nom_c_obs' => "Ingresar valor de pruebas para el campo nom_c_obs de tipo varchar",
           'obl_c_obs' => "Ingresar valor de pruebas para el campo obl_c_obs de tipo varchar",
           'hab_c_obs' => "Ingresar valor de pruebas para el campo hab_c_obs de tipo varchar",
           'vis_c_fec_rea' => "Ingresar valor de pruebas para el campo vis_c_fec_rea de tipo varchar",
           'nom_c_fec_rea' => "Ingresar valor de pruebas para el campo nom_c_fec_rea de tipo varchar",
           'obl_c_fec_rea' => "Ingresar valor de pruebas para el campo obl_c_fec_rea de tipo varchar",
           'hab_c_fec_rea' => "Ingresar valor de pruebas para el campo hab_c_fec_rea de tipo varchar",
           'vis_c_fec_pre' => "Ingresar valor de pruebas para el campo vis_c_fec_pre de tipo varchar",
           'nom_c_fec_pre' => "Ingresar valor de pruebas para el campo nom_c_fec_pre de tipo varchar",
           'obl_c_fec_pre' => "Ingresar valor de pruebas para el campo obl_c_fec_pre de tipo varchar",
           'hab_c_fec_pre' => "Ingresar valor de pruebas para el campo hab_c_fec_pre de tipo varchar",
           'vis_c_num_qpx' => "Ingresar valor de pruebas para el campo vis_c_num_qpx de tipo varchar",
           'nom_c_num_qpx' => "Ingresar valor de pruebas para el campo nom_c_num_qpx de tipo varchar",
           'obl_c_num_qpx' => "Ingresar valor de pruebas para el campo obl_c_num_qpx de tipo varchar",
           'hab_c_num_qpx' => "Ingresar valor de pruebas para el campo hab_c_num_qpx de tipo varchar",
           'vis_c_usua' => "Ingresar valor de pruebas para el campo vis_c_usua de tipo varchar",
           'nom_c_usua' => "Ingresar valor de pruebas para el campo nom_c_usua de tipo varchar",
           'obl_c_usua' => "Ingresar valor de pruebas para el campo obl_c_usua de tipo varchar",
           'hab_c_usua' => "Ingresar valor de pruebas para el campo hab_c_usua de tipo varchar",
           'vis_c_dia_pau' => "Ingresar valor de pruebas para el campo vis_c_dia_pau de tipo varchar",
           'nom_c_dia_pau' => "Ingresar valor de pruebas para el campo nom_c_dia_pau de tipo varchar",
           'obl_c_dia_pau' => "Ingresar valor de pruebas para el campo obl_c_dia_pau de tipo varchar",
           'hab_c_dia_pau' => "Ingresar valor de pruebas para el campo hab_c_dia_pau de tipo varchar",
           'vis_c_caus' => "Ingresar valor de pruebas para el campo vis_c_caus de tipo varchar",
           'nom_c_caus' => "Ingresar valor de pruebas para el campo nom_c_caus de tipo varchar",
           'obl_c_caus' => "Ingresar valor de pruebas para el campo obl_c_caus de tipo varchar",
           'hab_c_caus' => "Ingresar valor de pruebas para el campo hab_c_caus de tipo varchar",
           'vis_c_fec_qpx' => "Ingresar valor de pruebas para el campo vis_c_fec_qpx de tipo varchar",
           'nom_c_fec_qpx' => "Ingresar valor de pruebas para el campo nom_c_fec_qpx de tipo varchar",
           'obl_c_fec_qpx' => "Ingresar valor de pruebas para el campo obl_c_fec_qpx de tipo varchar",
           'hab_c_fec_qpx' => "Ingresar valor de pruebas para el campo hab_c_fec_qpx de tipo varchar",
          ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            'PsClasifActividad No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            'PsClasifActividad Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = PsClasifActividad::findOne(                                                               
        [
           'id_clasif_actividad' => "Ingresar valor de pruebas para el campo id_clasif_actividad de tipo int4",
           'nom_clasif_tactividad' => "Ingresar valor de pruebas para el campo nom_clasif_tactividad de tipo varchar",
           'vis_c_obs' => "Ingresar valor de pruebas para el campo vis_c_obs de tipo varchar",
           'nom_c_obs' => "Ingresar valor de pruebas para el campo nom_c_obs de tipo varchar",
           'obl_c_obs' => "Ingresar valor de pruebas para el campo obl_c_obs de tipo varchar",
           'hab_c_obs' => "Ingresar valor de pruebas para el campo hab_c_obs de tipo varchar",
           'vis_c_fec_rea' => "Ingresar valor de pruebas para el campo vis_c_fec_rea de tipo varchar",
           'nom_c_fec_rea' => "Ingresar valor de pruebas para el campo nom_c_fec_rea de tipo varchar",
           'obl_c_fec_rea' => "Ingresar valor de pruebas para el campo obl_c_fec_rea de tipo varchar",
           'hab_c_fec_rea' => "Ingresar valor de pruebas para el campo hab_c_fec_rea de tipo varchar",
           'vis_c_fec_pre' => "Ingresar valor de pruebas para el campo vis_c_fec_pre de tipo varchar",
           'nom_c_fec_pre' => "Ingresar valor de pruebas para el campo nom_c_fec_pre de tipo varchar",
           'obl_c_fec_pre' => "Ingresar valor de pruebas para el campo obl_c_fec_pre de tipo varchar",
           'hab_c_fec_pre' => "Ingresar valor de pruebas para el campo hab_c_fec_pre de tipo varchar",
           'vis_c_num_qpx' => "Ingresar valor de pruebas para el campo vis_c_num_qpx de tipo varchar",
           'nom_c_num_qpx' => "Ingresar valor de pruebas para el campo nom_c_num_qpx de tipo varchar",
           'obl_c_num_qpx' => "Ingresar valor de pruebas para el campo obl_c_num_qpx de tipo varchar",
           'hab_c_num_qpx' => "Ingresar valor de pruebas para el campo hab_c_num_qpx de tipo varchar",
           'vis_c_usua' => "Ingresar valor de pruebas para el campo vis_c_usua de tipo varchar",
           'nom_c_usua' => "Ingresar valor de pruebas para el campo nom_c_usua de tipo varchar",
           'obl_c_usua' => "Ingresar valor de pruebas para el campo obl_c_usua de tipo varchar",
           'hab_c_usua' => "Ingresar valor de pruebas para el campo hab_c_usua de tipo varchar",
           'vis_c_dia_pau' => "Ingresar valor de pruebas para el campo vis_c_dia_pau de tipo varchar",
           'nom_c_dia_pau' => "Ingresar valor de pruebas para el campo nom_c_dia_pau de tipo varchar",
           'obl_c_dia_pau' => "Ingresar valor de pruebas para el campo obl_c_dia_pau de tipo varchar",
           'hab_c_dia_pau' => "Ingresar valor de pruebas para el campo hab_c_dia_pau de tipo varchar",
           'vis_c_caus' => "Ingresar valor de pruebas para el campo vis_c_caus de tipo varchar",
           'nom_c_caus' => "Ingresar valor de pruebas para el campo nom_c_caus de tipo varchar",
           'obl_c_caus' => "Ingresar valor de pruebas para el campo obl_c_caus de tipo varchar",
           'hab_c_caus' => "Ingresar valor de pruebas para el campo hab_c_caus de tipo varchar",
           'vis_c_fec_qpx' => "Ingresar valor de pruebas para el campo vis_c_fec_qpx de tipo varchar",
           'nom_c_fec_qpx' => "Ingresar valor de pruebas para el campo nom_c_fec_qpx de tipo varchar",
           'obl_c_fec_qpx' => "Ingresar valor de pruebas para el campo obl_c_fec_qpx de tipo varchar",
           'hab_c_fec_qpx' => "Ingresar valor de pruebas para el campo hab_c_fec_qpx de tipo varchar",
         ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= PsClasifActividad::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    


    
    
    public function testRules()
    {
        $tester = new PsClasifActividad();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new PsClasifActividad();
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
         expect($tester->id_clasif_actividad)->equals('Ingresar valor de pruebas para el campo id_clasif_actividad de tipo int4');
         expect($tester->nom_clasif_tactividad)->equals('Ingresar valor de pruebas para el campo nom_clasif_tactividad de tipo varchar');
         expect($tester->vis_c_obs)->equals('Ingresar valor de pruebas para el campo vis_c_obs de tipo varchar');
         expect($tester->nom_c_obs)->equals('Ingresar valor de pruebas para el campo nom_c_obs de tipo varchar');
         expect($tester->obl_c_obs)->equals('Ingresar valor de pruebas para el campo obl_c_obs de tipo varchar');
         expect($tester->hab_c_obs)->equals('Ingresar valor de pruebas para el campo hab_c_obs de tipo varchar');
         expect($tester->vis_c_fec_rea)->equals('Ingresar valor de pruebas para el campo vis_c_fec_rea de tipo varchar');
         expect($tester->nom_c_fec_rea)->equals('Ingresar valor de pruebas para el campo nom_c_fec_rea de tipo varchar');
         expect($tester->obl_c_fec_rea)->equals('Ingresar valor de pruebas para el campo obl_c_fec_rea de tipo varchar');
         expect($tester->hab_c_fec_rea)->equals('Ingresar valor de pruebas para el campo hab_c_fec_rea de tipo varchar');
         expect($tester->vis_c_fec_pre)->equals('Ingresar valor de pruebas para el campo vis_c_fec_pre de tipo varchar');
         expect($tester->nom_c_fec_pre)->equals('Ingresar valor de pruebas para el campo nom_c_fec_pre de tipo varchar');
         expect($tester->obl_c_fec_pre)->equals('Ingresar valor de pruebas para el campo obl_c_fec_pre de tipo varchar');
         expect($tester->hab_c_fec_pre)->equals('Ingresar valor de pruebas para el campo hab_c_fec_pre de tipo varchar');
         expect($tester->vis_c_num_qpx)->equals('Ingresar valor de pruebas para el campo vis_c_num_qpx de tipo varchar');
         expect($tester->nom_c_num_qpx)->equals('Ingresar valor de pruebas para el campo nom_c_num_qpx de tipo varchar');
         expect($tester->obl_c_num_qpx)->equals('Ingresar valor de pruebas para el campo obl_c_num_qpx de tipo varchar');
         expect($tester->hab_c_num_qpx)->equals('Ingresar valor de pruebas para el campo hab_c_num_qpx de tipo varchar');
         expect($tester->vis_c_usua)->equals('Ingresar valor de pruebas para el campo vis_c_usua de tipo varchar');
         expect($tester->nom_c_usua)->equals('Ingresar valor de pruebas para el campo nom_c_usua de tipo varchar');
         expect($tester->obl_c_usua)->equals('Ingresar valor de pruebas para el campo obl_c_usua de tipo varchar');
         expect($tester->hab_c_usua)->equals('Ingresar valor de pruebas para el campo hab_c_usua de tipo varchar');
         expect($tester->vis_c_dia_pau)->equals('Ingresar valor de pruebas para el campo vis_c_dia_pau de tipo varchar');
         expect($tester->nom_c_dia_pau)->equals('Ingresar valor de pruebas para el campo nom_c_dia_pau de tipo varchar');
         expect($tester->obl_c_dia_pau)->equals('Ingresar valor de pruebas para el campo obl_c_dia_pau de tipo varchar');
         expect($tester->hab_c_dia_pau)->equals('Ingresar valor de pruebas para el campo hab_c_dia_pau de tipo varchar');
         expect($tester->vis_c_caus)->equals('Ingresar valor de pruebas para el campo vis_c_caus de tipo varchar');
         expect($tester->nom_c_caus)->equals('Ingresar valor de pruebas para el campo nom_c_caus de tipo varchar');
         expect($tester->obl_c_caus)->equals('Ingresar valor de pruebas para el campo obl_c_caus de tipo varchar');
         expect($tester->hab_c_caus)->equals('Ingresar valor de pruebas para el campo hab_c_caus de tipo varchar');
         expect($tester->vis_c_fec_qpx)->equals('Ingresar valor de pruebas para el campo vis_c_fec_qpx de tipo varchar');
         expect($tester->nom_c_fec_qpx)->equals('Ingresar valor de pruebas para el campo nom_c_fec_qpx de tipo varchar');
         expect($tester->obl_c_fec_qpx)->equals('Ingresar valor de pruebas para el campo obl_c_fec_qpx de tipo varchar');
         expect($tester->hab_c_fec_qpx)->equals('Ingresar valor de pruebas para el campo hab_c_fec_qpx de tipo varchar');
      }

}
