

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Url;	
use yii\helpers\Html;

$_labelmiga = "Gestor Formatos";
$_urlmiga = array('/gestorformatos/index','provincia'=>$provincia,'cantones' => $cantones,'parroquias' => $parroquias, 'periodos' => $periodos, 'estado'=> $estado,'id_fmt'=>$id_fmt) ;
$this->title = 'Listado Capitulos';
$this->params['breadcrumbs'][] = ['label' => $_labelmiga, 'url' => $_urlmiga];
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
    
  


