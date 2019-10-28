<style>
    
    /*.tbcapitulo{
        margin: 0 auto;
        width: 90%;
        border: 1px solid #000;
    }
    
    .nomcapitulo{
        font-size: 1.3em;
        color:#4169E1;
        font-weight: bolder;
        border: solid 2px #000;
    }
    
    .tbseccion{
       width: 100%; 
    }
    .titleseccion{
       font-size: 1.2em;
       font-weight: bolder;
       background-color: DarkGray;
       border-bottom: solid 1px #ccc;
    }
    
    .labelpregunta{
        border: solid 1px #000;
        border-bottom: solid 2px #5F9EA0;
        padding: 2px 2px;
        font-size:1em;
        width: 25%;
        color:#00a;
        background-color:#F0FFF0;
    }
    
     .inputpregunta{
        border-right: solid 1px #000;
        border-bottom: solid 2px #5F9EA0;
        padding: 2px 2px;
    }
    
    .labelpregunta2{
        border: solid 2px #000;
        border-bottom: solid 2px #ccc;
        padding: 2px 2px;
        font-size:1em;
        color:#00a;
        background-color:#F0FFF0;
    }
    
    .tdtable_tipo{
        border: solid 2px #000;
        border-bottom: solid 1px #000;
        padding: 2px 2px;
        font-size:1em;
        color:#000;
        background-color:#F5F5DC;
        text-align: center;
    }*/
</style>  
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
SweetSubmitAsset::register($this);

if($boton)
  $url2 = Url::toRoute([$url_actual.'/index','id_cnj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'idjunta'=>$idjunta,'hashbutton'=>'submit','provincia'=>$provincia,'cantones'=>$cantones],true);

//Declarando Menu Vertical 
$this->params['itemsmn']=[ 
    ['label' => 'Excel', 'icon' => '', 'url' => Url::to(['/detformato/genexcel','nombre_formato'=>$nombre_formato,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'idjunta'=>$idjunta])], 
    ['label' => 'Word', 'icon' => '', 'url' => Url::to(['/detformato/genword','nombre_formato'=>$nombre_formato,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'idjunta'=>$idjunta])], 
    ['label' => 'PDF', 'icon' => '', 'url' => Url::to(['/detformato/genpdf','nombre_formato'=>$nombre_formato,'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'last'=>$last,'estado'=>$estado,'idjunta'=>$idjunta])], 
]; 
?>
<div class="clientesprueba-create">    
 <?php
 if($boton){
 ?>
<?= Html::a('Regresar', $url2, ['class' => 'btn btn-default'])?> 
  <?php
 }
 ?>   
<?=  $_stringhtml; ?>
</div>



   
        
    
