<style>
    
    .caja{
        border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
        -webkit-box-shadow: 10px 10px 32px -12px rgba(0,0,0,0.68);
        -moz-box-shadow: 10px 10px 32px -12px rgba(0,0,0,0.68);
        box-shadow: 10px 10px 32px -12px rgba(0,0,0,0.68);
        border: 1px inset #a697a6;
        float:left;
        width:30%;
        margin:5%;
        height:200px;
        padding:2px;    
    }
    
    .linea1{
        display: block;
        height: 20%;
        width: 100%;
    }
    
    
    .title{
        font-size:1.3em;
        font-family: Arial;
        color: #81BEF7;
        float:left;
    }
    
    .funciones{
        text-align: right;
        vertical-align: top;
        width:30%;
        height:20%;
        float:right;
    }
    
    .linea2{
        display: block;
        height: 70%;
        width: 100%;
        padding: 10px;
    }
    
    .icono{
        text-align: left;
        vertical-align: bottom;
        width:50%;
        height:50%;
        float:left;
    }
    
    .valores{
        text-align: right;
        padding-top:20%;
        padding-right:3%;
        width:50%;
        height:30px;
        float:right;
        font-family: Arial;
        font-style: italic;
        color: #81BEF7;
    }
</style>    

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Url;	
use yii\helpers\Html;

$v_capitulos=1;
$t_linea=3;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>
    <?php 
     $url2 = Url::toRoute(['capitulos/create','id_prta' => $_GET['id_prta'],'id_fmt' => $_GET['id_fmt'],'id_rpta' => $_GET['id_rpta'],'last' => $_GET['last']],true);
    ?>

    <p>
        <?= Html::button('Create Capitulos', 
        ['value' =>$url2, 'title' => 'Create Capitulos',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>

<?php
if(!empty($array_data)){

    foreach($array_data as $_clave){
         $url3 = Url::toRoute(['capitulos/update','id'=>$_clave['id'],'id_prta' => $_GET['id_prta'],'id_fmt' => $_GET['id_fmt'],'id_rpta' => $_GET['id_rpta'],'last' => $_GET['last']],true);
         $url4 = Url::toRoute(['capitulos/deletep','id' => $_clave['id'],'id_prta' => $_GET['id_prta'],'id_fmt' => $_GET['id_fmt'],'id_rpta' => $_GET['id_rpta'],'last' => $_GET['last']],true);
    ?>    
        <div class="caja">
           
            <div class="linea1">
                <div class="title"><?= $_clave['nomcapitulo']; ?></div>
                
                <div class="funciones"> 
                               <?= Html::button('<span class="glyphicon glyphicon-pencil"></span>', 
                                       ['value'=>$url3,
                                        'class' => 'btn btn-default btn-xs showModalButton'
                                        ]);
                                ?>        
                               <?= Html::a('<span class="glyphicon glyphicon-trash"></span>',$url4,[
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?::'.$url4),
                                    'data-method' => 'post',
				]);
                                ?>
                </div>
            </div>
            
            <div class="linea2">
                <div class="icono"><img src="<?= $_clave['icono']; ?>"/></div>

                <div class="valores">
                    <p>10/20</p>
                    <p>50%</p>
                </div>
             </div>
        
            
        </div>
      
    <?php
    }
}
?>
