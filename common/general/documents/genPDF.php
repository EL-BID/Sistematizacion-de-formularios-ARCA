<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\general\documents;
use Yii;
use kartik\mpdf\Pdf;

/**
 * Clase para generar pdf pasando los parametros necesarios para el mismo, para mayor informacion http://demos.krajee.com/mpdf
 *
 * @author 
 */
class genPDF {
    
    
    
    const MODO_UTF8=Pdf::MODE_UTF8;
    const MODO_CORE=Pdf::MODE_CORE;
    const MODO_BLANK=Pdf::MODE_BLANK;
    const MODO_ASIAN=Pdf::MODE_ASIAN;
    
    const FORMATO_A3= Pdf::FORMAT_A3;
    const FORMATO_A4=Pdf::FORMAT_A4;
    const FORMATO_CARTA=Pdf::FORMAT_LETTER; 
    const FORMATO_OFICIO=Pdf::FORMAT_LEGAL;
    const FORMATO_LIBRO =Pdf::FORMAT_FOLIO;
    const FORMATO_TABLA=Pdf::FORMAT_LEDGER; 
    const FORMATO_PERIODICO=Pdf::FORMAT_TABLOID;
    
    const ORIENTACION_HORIZONTAL=Pdf::ORIENT_LANDSCAPE; 
    const ORIENTACION_VERTICAL=Pdf::ORIENT_PORTRAIT;
    
    const DESTINO_NAVEGADOR =Pdf::DEST_BROWSER;
    const DESTINO_DESCARGA =Pdf::DEST_DOWNLOAD;
    const DESTINO_ARCHIVO =Pdf::DEST_FILE;
    const DESTINO_STRING =Pdf::DEST_STRING;
    
    
    /**
     * Tomado de http://www.mpdfonline.com/repos/mpdfmanual.pdf
     * @param type $html STRING Contenido del pdf
     * @param type $nombre STRING Nombre del archivo pdf, si el destino es un archivo se debe colocar el path
     * @param type $propiedadesPagina ARRAY La informacion del modo, pathTemporal, formato, orientacion, destino, tamanoFuente, fuente, <br>margenIzquierdo, margenDerecho, margenSuperior, margenInferior, margeneEncabezado, margenPie. <br>Se debe llenar con la variable publicas O con un valor valido.
     * @param type $opciones ARRAY COntiene los valores de informacion del archivo como el title, subject, keywords, autor, creator
     * @param type $metodos ARRAY Sirve para llamar lo metodos de la libreria mpdf, debe ser un arrar que tenga la llave con el nombre de la funcion y el valor sea un array 'metodo' => ['SetFooter' =>['{PAGENO}']]
     * @param type $css STRING Definicion de css incluido en el html, no se debe encerrar entre etiquetas '<STYLE>'
     * @param type $cssDir STRING Ubicación de archivo css, con clases usadas en html, <br>debe tener la ruta de la forma @vendor/kartik-v/yii2-mpdf/assets/bootstrap.min.css
     */
    
    
    
    //SE REALIZA CCOMENTARIO DEBIDO A LOS ERRORES QUE PRESENTA VER LINEA 72 Y LINEA 84 .... LAS PROPIEDADES DE LA FUENTE NO PUEDEN SER IGUALES
    //A LA DEL FORMATO DE LA PAGINA///////
   public function generadorPDF($html,$nombre,$propiedadesPagina=null,$opciones=null,$metodos=null,$css=null,$cssDir=null){
        

        //Corrigiendo posibles errores html ============================================================
        $html = str_replace('"=', '', $html);
        
        Yii::trace("que llega aqui de PDF ".$html,"DEBUG");
        
        $Pdf=Array();
        
        /////////////Propiedades
        if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("modo",$propiedadesPagina )){
            $Pdf["mode"]=$propiedadesPagina["modo"];
        }
        if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("formato",$propiedadesPagina )){
            $Pdf["format"]=$propiedadesPagina["formato"];

        }
        if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("orientacion", $propiedadesPagina )){
            $Pdf["orientation"]=$propiedadesPagina["orientacion"];
        }
        if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("destino", $propiedadesPagina )){
            $Pdf["destination"]=$propiedadesPagina["destino"];
        }
        /*if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("tamanoFuente", $propiedadesPagina)){
            $Pdf["defaultFontSize"]=$propiedadesPagina["modo"];
        }
        if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("fuente", $propiedadesPagina )){
            $Pdf["defaultFont"]=$propiedadesPagina["formato"];
        }
        if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("margenIzquierdo", $propiedadesPagina)){
            $Pdf["marginLeft"]=$propiedadesPagina["orientacion"];
        }
        if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("margenDerecho", $propiedadesPagina)){
            $Pdf["marginRight"]=$propiedadesPagina["destino"];
        }
         if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("margenSuperior", $propiedadesPagina )){
            $Pdf["marginTop"]=$propiedadesPagina["orientacion"];
        }
        if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("margenInferior", $propiedadesPagina )){
            $Pdf["marginBottom"]=$propiedadesPagina["destino"];
        }
         if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("margeneEncabezado", $propiedadesPagina )){
            $Pdf["marginHeader"]=$propiedadesPagina["orientacion"];
        }
        if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("margenPie", $propiedadesPagina )){
            $Pdf["marginFooter"]=$propiedadesPagina["destino"];
        }*/
        if (!is_null($propiedadesPagina) && \yii\helpers\ArrayHelper::keyExists("pathTemporal", $propiedadesPagina )){
            $Pdf["tempPath"]=$propiedadesPagina["pathTemporal"];
        }
        
        if(!is_null($nombre)){
            $Pdf["filename"]=$nombre;
        }
        
        //Contenido
        if(!is_null($html)){
           $Pdf["content"]=$html;
        }else{
           throw new \yii\web\HttpException(404, 'Error el contenido html no puede ser vacio'); 
        }
        
        //Estilos CSS
        if(!is_null($css)){
             $Pdf["cssInline"]=$css;
             
             
        }
        
        
        if(!is_null($cssDir)){
             $Pdf["cssFile"]=$cssDir;
    
        }
        
        //metodos --- se agrega verificacion de array;
        if(!is_null($metodos) and is_array($metodos)){
             $Pdf["methods"]=$metodos;
        }
     

         
        
        $genPDfOutput= new Pdf($Pdf);
        return $genPDfOutput->render();
    }
    
    
    
    
    
    
}
