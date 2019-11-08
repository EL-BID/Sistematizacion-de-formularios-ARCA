<style>
    
   /* .caja{
        
        
        -webkit-box-shadow: 10px 10px 32px -12px rgba(0,0,0,0.68);
        -moz-box-shadow: 10px 10px 32px -12px rgba(0,0,0,0.68);
        box-shadow: 10px 10px 32px -12px rgba(0,0,0,0.68);
        border: 1px inset #a697a6;
        float:left;
        width:100%;
        margin:5%;
        height:auto;
        padding:2px;   
       
    }
    
    .nomcapitulo{
        display: block;
        height: auto;
        width: 100%;
        padding: 10px;
        border:solid;
        border-color: blue;
        overflow: auto;
    }
    
    
    .title{
       
        color: #81BEF7;
        float:left;
        width:70%;
    }
    
    .buttonmod{
        float:right;
         width:25%;
    }
    
    .boton_m{
        font-size:1.2em;
        font-family: Arial;
        color: #81BEF7;
    }
    
   
    
    .seccion{
        display: block;
        height: auto;
        width: 100%;
        margin:10px 0px 4px 0px;
        padding: 5px 10px;
        font-size:1.4em;
        background-color: #ccc;
    }
    
    
    .pregunta{
        display: block;
        height: auto;
        width: 100%;
        padding: 10px 10px;  
        border-bottom:solid 1px #81BEF7;
        overflow: auto;
    }
    
    .descpregunta{
        float:left;
        height: auto;
        width: 45%;
    }
    
    .descrespuesta{
        float:left;
        height: auto;
        width: 45%;
    }*/
    
</style>    

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Url;	
use yii\helpers\Html;

$this->title = 'Detalle Formato';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>

   
<?php
if(!empty($_indicapitulo)){

    foreach($_indicapitulo as $_llavecap){
    
    ?>    
        <div class="caja">
           
            <div class="linea1">
                <div class="nomcapitulo">
                    <div class="title">
                        <?= $_vcapitulo[$_llavecap]['orden'].".".$_vcapitulo[$_llavecap]['nomcapitulo']; ?>
                    </div>
                    <div class="buttonmod">
                        <?php
                        $url3 = Url::toRoute(['index,php','id_capitulo'=>$_vcapitulo[$_llavecap]['id']],true);
                        
                        //Boton de Modificar
                        echo Html::button('<span class="boton_m">Modificar</span>', 
                                                                ['value'=>$url3,
                                                                 'class' => 'btn btn-default btn-xs showModalButton'
                                                                ]);
                        ?>
                        
                    </div>
                </div>
            </div>
            
            <!----------------MOSTRANDO PREGUNTAS SIN SECCION-------------------------------------------->
            
            <?php
            
                
                foreach($_indipreguntasns as $_llavepregns){
                   
                    if(!empty($_vpreguntasns[$_llavecap][$_llavepregns])){
            ?>
                <div class="pregunta">
                    <div class="descpregunta"><?= $_vpreguntasns[$_llavecap][$_llavepregns]['pregunta_orden'].". ".$_vpreguntasns[$_llavecap][$_llavepregns]['nom_pregunta'].": " ?></div>
                    <div class="descrespuesta"><?= $_vpreguntasns[$_llavecap][$_llavepregns]['ra_descripcion'] ?></div>

                </div>
            
            <?php
                    }
                }
            ?>
            
            <!-----------------PRESENTANDO SECCIONES ----------------------------------------------------->
            <?php
                foreach($_indiseccion as $_llaveseccion){
            
                    if(!empty($_vseccion[$_llavecap][$_llaveseccion])){
            ?>        
                    <div class="seccion">
                        <div class="titleseccion"><?= $_vseccion[$_llavecap][$_llaveseccion]['nom_seccion']; ?></div>
                    </div>

                    <!---------------------PRESENTANDO PREGUNTAS POR SECCION----------------------------->
           <?php


                        foreach($__indipreguntas as $_llavepreg){

                            if(!empty($_vpreguntas[$_llavecap][$_llaveseccion][$_llavepreg])){
            ?>
                                <div class="pregunta">
                                    <div class="descpregunta"><?= $_vpreguntas[$_llavecap][$_llaveseccion][$_llavepreg]['pregunta_orden'].". ".$_vpreguntas[$_llavecap][$_llaveseccion][$_llavepreg]['nom_pregunta'].": " ?></div>
                                    <div class="descrespuesta"><?= $_vpreguntas[$_llavecap][$_llaveseccion][$_llavepreg]['ra_descripcion'] ?></div>

                                </div>

            <?php
                            }
                        }
                    }
                }
            ?>
            
            
                
                
           
            
        </div>
      
    <?php
    }
}
?>
