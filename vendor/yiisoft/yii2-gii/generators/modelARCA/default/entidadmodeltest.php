<?php
/**
 * This is the template for generating the test class of a specified table.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\model\Generator */
/* @var $tableName string full table name */
/* @var $className string class name */
/* @var $queryClassName string query class name */
/* @var $tableSchema yii\db\TableSchema */
/* @var $labels string[] list of attribute labels (name => label) */
/* @var $rules string[] list of validation rules */
/* @var $relations array list of relations (name => relation declaration) */

echo "<?php\n";
?>

namespace <?= $generator->nsa ?>;

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;
use Codeception\Util\Debug;
use <?= $generator->ns ?>\<?= $className ?>;
/**
 * Este es el unit test para la clase "<?= $generator->generateTableName($tableName) ?>".
 *
<?php foreach ($tableSchema->columns as $column): ?>
 * @property <?= "{$column->dbType} \${$column->name}\n" ?>
<?php endforeach; ?>
<?php if (!empty($relations)): ?>
 *
<?php foreach ($relations as $name => $relation): ?>
 * @property <?= $relation[1] . ($relation[2] ? '[]' : '') . ' $' . lcfirst($name) . "\n" ?>
<?php endforeach; ?>
<?php endif; ?>
 */
class <?= $generator->testClassPry ?> extends \Codeception\Test\Unit
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
        $tester = new <?= $className ?>();
    <?php foreach ($tableSchema->columns as $column): ?>
    $tester-><?= "{$column->name}" ?> = "<?= "Ingresar valor de pruebas para el campo {$column->name} de tipo {$column->dbType}" ?>";
    <?php endforeach; ?>
        
        expect_that($tester->validate());
        // en caso de incluir valores errados para el modelo: expect_not($model->validate());
        return $tester;
    }
    
    public function testInsert()                                                             
    {                                                                                        
        $tester = new <?= $className ?>;
    <?php foreach ($tableSchema->columns as $column): ?>
    $tester-><?= "{$column->name}" ?> = "<?= "Ingresar valor de pruebas para el campo {$column->name} de tipo {$column->dbType}" ?>";
    <?php endforeach; ?>
        
        expect_that($tester->save());
        
        /**
        Esta prueba tambie puede ser evauada con Asserts, ejemplo:
        $tester->save();
        $this->assertNotNull($tester,                                                          
            '<?= $className ?>  Errors no se puede insertar en la base de datos.'); 
            */
        
        return $tester;
    }                     
    
    
    public function testSelect()                                                          
    {                                                                                        
        $tester = <?= $className ?>::findOne(                                                               
        [
    <?php foreach ($tableSchema->columns as $column): ?>
       '<?= "{$column->name}" ?>' => "<?= "Ingresar valor de pruebas para el campo {$column->name} de tipo {$column->dbType}" ?>",
    <?php endforeach; ?>
      ]);                                                
        
        
        // caso exitoso de consulta
        $this->assertNotNull($tester,                                                          
            '<?= $className ?> No se puede consultar en la base de datos, retorna nulo produciendose un error'); 
             /** Es posible tambien relizr con asserts, ejemplos
            en caso de un  retorno de un valor en caso de esperar nulo
        $this->assertNull($tester,                                                          
            '<?= $className ?> Ee puede consultar en la base de datos.');   */
            
            return $tester;
    }   
    
     
    public function testDelete()                                                             
    {                                                                                        
      
       $tester = <?= $className ?>::findOne(                                                               
        [
    <?php foreach ($tableSchema->columns as $column): ?>
       '<?= "{$column->name}" ?>' => "<?= "Ingresar valor de pruebas para el campo {$column->name} de tipo {$column->dbType}" ?>",
    <?php endforeach; ?>
     ]);              

       expect_that($tester->delete());
    }   

    
    
    public function testTableName()
    {
        $table= <?= $className ?>::tableName();
        $this->assertNotEmpty($table,                                                          
            'Se devolvio vacio el nombre de la tabla, se produjo un error '.$table); 

    }
    
<?php if ($generator->db !== 'db'): ?>

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public function testGetDb()
    {
       $Db= <?= $className ?>::getDb();
        $this->assertNotEmpty($Db,                                                          
            'Se devolvio vacio la conexion, se produce un error '.$Db);  
 
    }
<?php endif; ?>


    
    
    public function testRules()
    {
        $tester = new <?= $className ?>();
        $rules= $tester->rules();
         $this->assertNotEmpty($rules,
            'Se devolvio vacio el array de rules');  
    }


    
    
    public function testAttributeLabels()
    {
        $tester = new <?= $className ?>();
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
    <?php foreach ($tableSchema->columns as $column): ?>
     expect($tester-><?= "{$column->name}" ?>)->equals('<?= "Ingresar valor de pruebas para el campo {$column->name} de tipo {$column->dbType}" ?>');
    <?php endforeach; ?>
  }

}
