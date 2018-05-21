<style>
    
    /*
    */
</style>    

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Url;	
use yii\helpers\Html;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="headSection">
<h1 class="titSection"><?= Html::encode($this->title) ?></h1>
</div>
<!---------------IMPRIMIENDO FORMULAIO------------------------------------->
    <?php
    foreach($_stringhtml as $_clave){
       eval('?>'.$_clave);
    }
    ?>
    
  


