<?php
namespace frontend\tests\acceptance;

use Yii;
use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class ListadoClientesCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/clientesprueba/create'));
     
        $I->wait(5);
        $I->fillField("#clientesprueba-name",'');
        $I->see('Name cannot be blank.','.help-block');
    }
}
