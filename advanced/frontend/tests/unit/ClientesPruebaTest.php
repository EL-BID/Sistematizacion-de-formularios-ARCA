<?php
namespace frontend\tests;

use Yii;
use frontend\fixtures\Clientes as UserFixture;

class ClientesPruebaTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    use \Codeception\Specify;
    protected $tester;
    

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $_cliente = new Clientesprueba(['name'=>'','lastname'=>'creado']);
        $_cliente->save();
        $this->tester->seeInDatabase('clientes', ['name' => 'dedo']);

    }
    
    private $cliente;

    public function testValidation()
    {
        
    }
}