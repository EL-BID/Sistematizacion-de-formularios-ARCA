<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\general\documents;
use yii;

/**
 * Description of genWord
 *
 * @author asus1
 */
class genWord {
   
    
    const DESTINO_DESCARGA ='D';
    const DESTINO_ARCHIVO ='F';
    
     public function generadorWordHTML($contenido,$nombre,$destino,$portada=null,$indice=null){
        \VsWord::autoLoad();
        $doc = new \VsWord();  
        $parser = new \HtmlParser($doc);
        $parser->addHandlerInitNode( new initNodeStyles() );
        
        
        
        $contador = 0;
        $body = $doc->getDocument()->getBody();

        if($portada!=null){
            $parser->parse($portada);
            $contador++;
        }
        
        if($indice!=null){
            $body->addNode(new \PageBreakNode());
            $parser->parse($indice);
            $contador++;
        }
        
        
        if(is_array($contenido)){
            foreach($contenido as $content){
                if($contador>0){
                    $body->addNode(new \PageBreakNode());
                }
                $parser->parse($contenido);
            }
        }
        else{
            $body->addNode(new \PageBreakNode());
            $parser->parse($contenido);
        }

        
        
        /*Se agrega codigo para descarga
         * Fecha Modificado: 2017-11-09
         */
        
        
        if($destino=='D'){
            $destino="documentos/";
            $nombre="documentos/".$nombre;
        }  
        $doc->saveAs($nombre,$destino);
                
        /*Se agrega codigo para Descarga de archivo en sitio*/
        $_filedown=$nombre;
        $basefichero = basename($_filedown);
        header( "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header( "Content-Length: ".filesize($_filedown));
        header( "Content-Disposition: attachment; filename=".$basefichero."");
        readfile($_filedown);
        
            
     }
    
    
}
