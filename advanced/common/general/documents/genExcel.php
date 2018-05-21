<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\general\documents;
use yii;

//use codemix\excelexport;
/**
 * Description of genExcel
 *
 * @author asus1
 */
class genExcel {
    
    
    const DESTINO_DESCARGA ='D';
    const DESTINO_ARCHIVO ='F';

    
    public function generadorExcel($datos,$columnas,$nombre,$destino,$encabezados=null){
        $mode='export';
        $isMultipleSheet=false;
        if (count($datos) != count($datos, 1)) {
            $isMultipleSheet=true;
        }
        
        
        $excel=Array();
        $excel['models']=$datos;
        $excel['format']=$this->resolveFormat($nombre);
        $excel['columns']=$columnas;
        
        if(!is_null($encabezados)){ $excel['headers']=$encabezados;}

        if($destino=='F'){
            $inf=pathinfo($nombre);
            $excel['savePath']=$inf['dirname'];
            $excel['fileName']=$inf['basename'];
            $excel['asAttachment']=false;
        }else{
            $excel['fileName']=$nombre;
            $excel['asAttachment']=true;
        }
        
        $excel['isMultipleSheet']=$isMultipleSheet;

        \moonland\phpexcel\ExcelARCA::export($excel);
        
 
    }
    
    
    public function generadorExcelHTML($datos,$nombre,$destino,$filecss){
        $mode='exportHTML';
        $isMultipleSheet=false;
        if (count($datos) >1) {
            $isMultipleSheet=true;
        }
        
        
        $excel=Array();
        $excel['models']=$datos;
        $excel['mode']=$mode;
        $excel['format']=$this->resolveFormat($nombre);
        

        if($destino=='F'){
            $inf=pathinfo($nombre);
            $excel['savePath']=$inf['dirname'];
            $excel['fileName']=$inf['basename'];
            $excel['asAttachment']=false;
        }else{
            $excel['fileName']=$nombre;
            $excel['asAttachment']=true;
        }
        
        $excel['isMultipleSheet']=$isMultipleSheet;

        \moonland\phpexcel\ExcelARCA::widget($excel);           //Excel arca no existe en advanced....:(
     
    }
    
    
    /**
     * 
     * @param type $fileName Ubicacion del archivo de excel
     * @return type Array con los datos del excel
     */
    public function cargaExcel($fileName){

        $excel=Array();
        $excel['mode']='import';
        $excel['setFirstRecordAsKeys']=false;
        $excel['setIndexSheetByName']=true;
        $excel['fileName']=$fileName;
        
      return  \moonland\phpexcel\ExcelARCA::widget($excel);
        
                
    }
    
    public function cargaExcelSheet($fileName,$sheet){

        $excel=Array();
        $excel['mode']='import';
        $excel['setFirstRecordAsKeys']=false;
        $excel['setIndexSheetByName']=true;
        $excel['fileName']=$fileName;
        $excel['getOnlySheet']=$sheet;
      return  \moonland\phpexcel\ExcelARCA::widget($excel);
        
                
    }
    
    /**
     * 
     * @param type $id id númerico de la columna Excel, inicia en 1
     * @return string
     */
    public function getLetterColumn($id){
        $_arraycolm=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ'];
        return $_arraycolm[$id-1];
    }
    
    /*Esta funcion es un clone de la funcion de andres
     * a partir desde donde dice HASTA AQUI.....
     */
    
    
    public function generadorExcelHTML2($_stringhtml,$filename,$filecss,$nombre=null){
        
        
        $filename = $filename.".xlsx";                  //Aqui va el nombre del formato
       
        //Limpiando stringhtml============================================================================//
        //Yii::trace('Excel'.$_stringhtml.PHP_EOL, 'DEBUG');
        
       //Averignado a que celdas se les aplica formato de estilos, vector que entrega clases relacionada con celda
        //Ej: A1 -> inputpregunta
       $_vclases=$this->classceldas($_stringhtml);
       
       //Convirtiendo css en estilos
       $_arraystilos=$this->responsecss($filecss);
        
       /****************************HASTA AQUI****************************************************************/
       
        // save $table inside temporary file that will be deleted later
        $tmpfile = tempnam(sys_get_temp_dir(), 'html');
        file_put_contents($tmpfile, $_stringhtml);
        
        

        // insert $table into $objPHPExcel's Active Sheet through $excelHTMLReader
        $objPHPExcel     = new \PHPExcel();
            
        $excelHTMLReader = \PHPExcel_IOFactory::createReader('HTML');
        $excelHTMLReader->loadIntoExisting($tmpfile, $objPHPExcel);
        if($nombre){ $objPHPExcel->getActiveSheet()->setTitle($nombre); 
        }else{
            $objPHPExcel->getActiveSheet()->setTitle('Formato'); // Change sheet's title if you want
        }
        foreach($_vclases as $_clave){
            $clase_aplicar=$_clave['class'];
            $celda_aplicar=$_clave['celda'];
            
            if(!empty($clase_aplicar)){
                 $objPHPExcel->getActiveSheet()->getStyle($celda_aplicar)->applyFromArray($_arraystilos[$clase_aplicar]);
            }
           
        }
        
        //Autosize Columnas  --- Se necesitaria entonces el total de columnas que va a tener el documento
        for($col = 'A'; $col !== 'Z'; $col++) {
            $objPHPExcel->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }
        

        unlink($tmpfile); // delete temporary file because it isn't needed anymore

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8'); // header for .xlxs file
        header('Content-Disposition: attachment;filename='.$filename); // specify the download file name
        header('Cache-Control: max-age=0');

        // Creates a writer to output the $objPHPExcel's content
        $writer = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }
    
    
    
   
    
    
    private function resolveFormat($filename)
    {
        // see IOFactory::createReaderForFile etc.
        $list = [
            'ods' => 'OpenDocument',
            'xls' => 'Excel5',
            'xlsx' => 'Excel2007',
            'csv' => 'CSV',
            'pdf' => 'PDF',
            'html' => 'HTML',
        ];
        // TODO: check strtolower
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        return isset($list[$extension]) ? $list[$extension] : 'Excel2007'   ;
    }
    
    
   
    /*Funcion que entrega el css a aplicar en cada celda

     * Entrada: String HTML solo aplica para tablas
     * Salida: Array asociativo con  class -> clase de la celda, celda -> celda sobre la cual se aplica
     * text->contenidod de la celda    */
    
   private function classceldas($_stringhtml){
       
       
       // Create a new DOM Document to hold our webpage structure 
        $xml = new \DOMDocument(); 

        // Load the url's contents into the DOM 
        $xml->loadHTML($_stringhtml); 

        // Empty array to hold all links to return 
        $_class = array(); 
        $_ln=0;

        $_arraycolm=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AF','AG','AH','AI','AJ','AK'];

        foreach($xml->getElementsByTagName('table') as $_table) { 	
		
		$_valuetable = $_table->nodeValue;
                
                if($_ln>0){
                   $_ln+=1; 
                }
		
		foreach($_table->getElementsByTagName('tr') as $_lineas) {
			
			$_canttr = $_lineas->getElementsByTagName('tr');
			$_ln+=1;
			$_td=0;
			
			if($_canttr->length == 0){
				
				foreach($_lineas->getElementsByTagName('td') as $_celda) {
					
					if(!empty($_celda)){
                                            
						$_class[]=array('class' => trim($_celda->getAttribute('class')),'celda'=>$_arraycolm[$_td].''.$_ln,'text' => $_celda->nodeValue);
                                                
                                                if(!empty($_celda->getAttribute('colspan'))){
                                                    
                                                    $_apclase = trim($_celda->getAttribute('class'));
                                                    $_cantidadceldas=$_celda->getAttribute('colspan');
                                                    
                                                    for($col = 1; $col<$_cantidadceldas; $col++) {
                                                        
                                                        $_tdnext=$_td+$col;
                                                        $_class[]=array('class' => trim($_apclase),'celda'=>$_arraycolm[$_tdnext].''.$_ln,'text' => $_celda->nodeValue);
                                                    }
                                                    
                                                }
						$_td+=1;
					}
				
				}	
			}
			
		}	

        }
        
        return $_class;
   }
   
   
   
   /*Funcion que entrega el array el de estilos
    * para aplicar en el archivo de excel
    * 
    * el resultado es un vector de vectores, cada vector al interior contiene esta forma
    *  $styleArray = array(
                        'font' => array(
                            'bold' => true,
                        ),
                        'alignment' => array(
                            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                        ),
                        'borders' => array(
                            'top' => array(
                                'style' => \PHPExcel_Style_Border::BORDER_THIN,
                            ),
                        ),
                        'fill' => array(
                            'type' => \PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                            'rotation' => 90,
                            'startcolor' => array(
                                'argb' => 'FFA0A0A0',
                            ),
                            'endcolor' => array(
                                'argb' => 'FFFFFFFF',
                            ),
                        ),
                    );
    */
   
   
   
   /*Funcion conversora de CSS a estilos de PHPEXCEL*/
   
   public function responsecss($_archivocss){
        
        $_contenidocss = file_get_contents($_archivocss);
        $_vector1=explode("}",$_contenidocss);              //Pasando clases a vector
        $_filecss=array();
        $_clasescss=array();
        
        for($_css=0;$_css<count($_vector1);$_css++){
            $_clase= trim($_vector1[$_css]);
      
            if(!empty($_clase)){
         
                $_vectorint=explode("{",$_clase);
                
                //Asignando nombre de la clase==================================//
                $_nombreclase = trim(str_replace(".", "", $_vectorint[0]));
                
                //Asignando contenido de la clase===============================//
                $_vcontenido=explode(";",$_vectorint[1]);
                $_propiedades="";
                $_arrayexcel=array();
                
                /*Transformacion de las propiedades*/
                foreach($_vcontenido as $_propiedad){
                    
                    $_vpropiedad=explode(":",$_propiedad);
                    if(!empty($_vpropiedad[0]) and !empty($_vpropiedad[1])){
                        
                            
                        if(trim($_vpropiedad[0])=='text-align'){
                            
                           
                            if(trim($_vpropiedad[1]) == 'right'){
                                
                                $_arrayexcel['alignment'] = array(
                                        'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                                );
                                        
                            }else if(trim($_vpropiedad[1]) == 'left'){
                                
                                $_arrayexcel['alignment'] = array(
                                        'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                                );
                           
                            }else if(trim($_vpropiedad[1]) == 'center'){
                            
                                $_arrayexcel['alignment'] = array(
                                        'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                                );
                            }
                            
                        }else if(trim($_vpropiedad[0])=='border'){
                            
                             
                                if(strpos($_vpropiedad[1],'solid') !== false){
                                    
                                    $_arrayexcel['borders']['allborders']['style'] =  \PHPExcel_Style_Border::BORDER_THIN;        
                                } 
                                
                                if(strpos($_vpropiedad[1],'dotted') !== false){
                                    $_arrayexcel['borders']['allborders']['style'] =  \PHPExcel_Style_Border::BORDER_DOTTED;    
                                }
                                
                                if(strpos($_vpropiedad[1],'double') !== false){
                                    $_arrayexcel['borders']['allborders']['style'] =  \PHPExcel_Style_Border::BORDER_DOUBLE;   
                                }
                                
                                if(strpos($_vpropiedad[1],'dashed') !== false){
                                    $_arrayexcel['borders']['allborders']['style'] =  \PHPExcel_Style_Border::BORDER_DASHED;   
                                }
                                
                                
                                if(strpos($_vpropiedad[1],'#') !== false){        
                                    $_color= substr($_vpropiedad[1], (strpos(trim($_vpropiedad[1]),'#')+1),strpos(trim($_vpropiedad[1]),' '));
                                    $_arrayexcel['borders']['allborders']['color']['rgb'] = $_color;   
                                     
                                }
                            
                            
                        }else if(trim($_vpropiedad[0])=='border-right'){
                            
                            if(strpos($_vpropiedad[1],'solid') !== false){
                                    
                                    $_arrayexcel['borders']['right']['style'] =  \PHPExcel_Style_Border::BORDER_THIN;        
                                } 
                                
                                if(strpos($_vpropiedad[1],'dotted') !== false){
                                    $_arrayexcel['borders']['right']['style'] =  \PHPExcel_Style_Border::BORDER_DOTTED;    
                                }
                                
                                if(strpos($_vpropiedad[1],'double') !== false){
                                    $_arrayexcel['borders']['right']['style'] =  \PHPExcel_Style_Border::BORDER_DOUBLE;   
                                }
                                
                                if(strpos($_vpropiedad[1],'dashed') !== false){
                                    $_arrayexcel['borders']['right']['style'] =  \PHPExcel_Style_Border::BORDER_DASHED;   
                                }
                                
                                
                                if(strpos($_vpropiedad[1],'#') !== false){        
                                    $_color= substr($_vpropiedad[1], (strpos(trim($_vpropiedad[1]),'#')+1),strpos(trim($_vpropiedad[1]),' '));
                                    $_arrayexcel['borders']['right']['color']['rgb'] = $_color;   
                                     
                                }
                            
                            
                            
                        }else if(trim($_vpropiedad[0])=='border-left'){
                            
                            if(strpos($_vpropiedad[1],'solid') !== false){
                                    
                                    $_arrayexcel['borders']['left']['style'] =  \PHPExcel_Style_Border::BORDER_THIN;        
                                } 
                                
                                if(strpos($_vpropiedad[1],'dotted') !== false){
                                    $_arrayexcel['borders']['left']['style'] =  \PHPExcel_Style_Border::BORDER_DOTTED;    
                                }
                                
                                if(strpos($_vpropiedad[1],'double') !== false){
                                    $_arrayexcel['borders']['left']['style'] =  \PHPExcel_Style_Border::BORDER_DOUBLE;   
                                }
                                
                                if(strpos($_vpropiedad[1],'dashed') !== false){
                                    $_arrayexcel['borders']['left']['style'] =  \PHPExcel_Style_Border::BORDER_DASHED;   
                                }
                                
                                
                                if(strpos($_vpropiedad[1],'#') !== false){        
                                    $_color= substr($_vpropiedad[1], (strpos(trim($_vpropiedad[1]),'#')+1),strpos(trim($_vpropiedad[1]),' '));
                                    $_arrayexcel['borders']['left']['color']['rgb'] = $_color;   
                                     
                                }
                            
                            
                            
                        }else if(trim($_vpropiedad[0])=='border-bottom'){
                            
                            if(strpos($_vpropiedad[1],'solid') !== false){
                                    
                                    $_arrayexcel['borders']['bottom']['style'] =  \PHPExcel_Style_Border::BORDER_THIN;        
                                } 
                                
                                if(strpos($_vpropiedad[1],'dotted') !== false){
                                    $_arrayexcel['borders']['bottom']['style'] =  \PHPExcel_Style_Border::BORDER_DOTTED;    
                                }
                                
                                if(strpos($_vpropiedad[1],'double') !== false){
                                    $_arrayexcel['borders']['bottom']['style'] =  \PHPExcel_Style_Border::BORDER_DOUBLE;   
                                }
                                
                                if(strpos($_vpropiedad[1],'dashed') !== false){
                                    $_arrayexcel['borders']['bottom']['style'] =  \PHPExcel_Style_Border::BORDER_DASHED;   
                                }
                                
                                
                                if(strpos($_vpropiedad[1],'#') !== false){        
                                    $_color= substr($_vpropiedad[1], (strpos(trim($_vpropiedad[1]),'#')+1),strpos(trim($_vpropiedad[1]),' '));
                                    $_arrayexcel['borders']['bottom']['color']['rgb'] = $_color;   
                                     
                                }
                            
                            
                            
                        }else if(trim($_vpropiedad[0])=='background-color'){
                            
                            $_color= substr($_vpropiedad[1], (strpos(trim($_vpropiedad[1]),'#')+1));
                            
                            $_arrayexcel['fill']['type'] = \PHPExcel_Style_Fill::FILL_SOLID;
                            $_arrayexcel['fill']['color']['rgb'] = $_color;
                           
                            
                        }
                        
                        
                        
                        
                    }
                   
                }
                
                $styleArray[$_nombreclase]=$_arrayexcel;
                
            }
        }
        
       
        
        return $styleArray;
    }
    
    
   
}
