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
     * @param type $id id n�merico de la columna Excel, inicia en 1
     * @return string
     */
    public function getLetterColumn($id){
        $_arraycolm=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ'];
        return $_arraycolm[$id-1];
    }
    
    /*Esta funcion es un clone de la funcion de andres
     * a partir desde donde dice HASTA AQUI.....
     */
    
    
    public function generadorExcelHTML2($_stringhtml,$filename,$filecss,$nombre=null,$eval=null,$array_graf_radial=null,$array_graf_barras=null,$formato=null,$_stringhtml2=null,$_stringhtml3=null,$_stringhtml4=null,$_stringhtml5=null,$_stringhtml6=null,$_stringhtml7=null,$_stringhtml8=null,$_stringhtml9=null,$_stringhtml10=null){
        
        
        //Vector para tamaño aplicado ==========================================================================================
        $aplsize = array();     //Tamaña columnas
        $aplrowsize = array();  //Tamaño filas
        
        //Nombre del formato ==================================================================================================
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
        
        if($nombre){ 
            $objPHPExcel->getActiveSheet()->setTitle($nombre); 
        }else{
            $objPHPExcel->getActiveSheet()->setTitle('Formato'); // Change sheet's title if you want
        }
        

        foreach($_vclases as $_clave){
            
            $clase_aplicar=$_clave['class'];
            $celda_aplicar=$_clave['celda'];
            
            //Determina la columna sobre la que se aplica el tamaño ======================================================================
            $arrcol = preg_split('/[^A-Z]+/i', $celda_aplicar);
            $columna = implode("", $arrcol);
            
            //Determina la fila sobre la que se aplica el tamaño alto =====================================================================
            $arrrow = preg_split('/[^0-9]+/i', $celda_aplicar);
            $fila = implode("", $arrrow);
         
            //Calculando el tamaño de la celda ============================================================================================
            $size_col = ceil($_clave['sizecelda']/7);
            
            if(empty($_clave['colspan'])){
                $size_row = (ceil($_clave['sizecelda']/2)<20)? 20:ceil($_clave['sizecelda']/2);
            }else{
                $size_row = 40;
            }
            
            
            
            Yii::trace("que llega de ".$celda_aplicar." : --".$_clave['sizecelda']."--".$size_col."---".$size_row);  
            
            if(!empty($clase_aplicar)){
                
                 if($eval==1){
                     $this->estilosEvaluacionclases($objPHPExcel,$clase_aplicar,$celda_aplicar);        //Linea agregada externa
                 }
                 else{
                     
                    //Se agregan estilos dinamicos ===================================================================================
                    $objPHPExcel->getActiveSheet()->getStyle($celda_aplicar)->applyFromArray($_arraystilos[$clase_aplicar]);          
                    
                    //Se agrega tamaño de columna ====================================================================================
                    if(empty($aplsize[$columna])){
                        $aplsize[$columna] =  $size_col;
                    }else{
                        $aplsize[$columna] = ($aplsize[$columna]<$size_col)? $size_col : $aplsize[$columna];
                    }
                    
                    //Se agrega ancho de filas =======================================================================================
                    if(empty($aplrowsize[$fila])){
                        $aplrowsize[$fila] =  $size_row;
                    }else{
                        $aplrowsize[$fila] = ($aplrowsize[$fila]<$size_row)? $size_row : $aplrowsize[$fila];
                    }
                 }
            } 
        }
        
        if($eval == 1){
            
            $bande=false;
            for($col = 'A'; $col !== 'Z'; $col++) {
             $objPHPExcel->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize($bande);
            }
            
        }else{
            
            foreach($aplsize as $key => $value ){
                $objPHPExcel->getActiveSheet()->getColumnDimension($key)->setWidth($value);
            }
            
            foreach($aplrowsize as $key => $value ){
                $objPHPExcel->getActiveSheet()->getRowDimension($key)->setRowHeight($value);
            }
            
            $objPHPExcel->getActiveSheet()->getStyle('A2:Z200')->getAlignment()->setWrapText(true); 
        }
        
        //Autosize Columnas  --- Se necesitaria entonces el total de columnas que va a tener el documento
        /*else{
            //$bande=true;
            for($col = 'A'; $col !== 'Z'; $col++) {
            
            }
        }*/
        
        /*Es formato evaluaciones para aplicar estilos*/
        if($eval==1)
        {            
            $this->ValidacionesGrafico($objPHPExcel,$array_graf_radial,$array_graf_barras);
            $objPHPExcel->getActiveSheet() ->getPageMargins()->setTop(0.4); 
            $objPHPExcel->getActiveSheet() ->getPageMargins()->setRight(0); 
            $objPHPExcel->getActiveSheet() ->getPageMargins()->setLeft(0); 
            $objPHPExcel->getActiveSheet() ->getPageMargins()->setBottom(0.4); 
            $objPHPExcel->getActiveSheet() ->getPageSetup() ->setPrintArea('A1:I163'); 
            
        }        

        if(!empty($_stringhtml2))
        {
            $titulo="N Campos";
            if($formato==5)$titulo='Fuentes hídricas';
            elseif($formato==6)$titulo='Detalle Fuentes';
            $tmpfile2 = tempnam(sys_get_temp_dir(), 'html');
            file_put_contents($tmpfile2, $_stringhtml2);

            $objReader = \PHPExcel_IOFactory::createReader('HTML');
            $objReader->load($tmpfile2);

            $objPHPExcel2     = new \PHPExcel();
            $objPHPExcel2->setActiveSheetIndex(0); 
            $objPHPExcel2= $objReader->load($tmpfile2); 
            $objWorkSheet=$objPHPExcel2->getActiveSheet()->setTitle($titulo); 
            $objPHPExcel->addExternalSheet($objWorkSheet); 
        }        
        
        if(!empty($_stringhtml3))
        {
            $titulo="N Campos";
            if($formato==5)$titulo='Ubicación geográfica';
            elseif($formato==6)$titulo='Detalle Captación';
            $tmpfile3 = tempnam(sys_get_temp_dir(), 'html');
            file_put_contents($tmpfile3, $_stringhtml3);

            $objReader = \PHPExcel_IOFactory::createReader('HTML');
            $objReader->load($tmpfile3);

            $objPHPExcel3     = new \PHPExcel();
            $objPHPExcel3->setActiveSheetIndex(0); 
            $objPHPExcel3= $objReader->load($tmpfile3); 
            $objWorkSheet=$objPHPExcel3->getActiveSheet()->setTitle($titulo); 
            $objPHPExcel->addExternalSheet($objWorkSheet); 
        } 
        if(!empty($_stringhtml4))
        {
            $titulo="N Campos";
            if($formato==5)$titulo='Obras captación';
            elseif($formato==6)$titulo='Bombas Captación';
            $tmpfile4 = tempnam(sys_get_temp_dir(), 'html');
            file_put_contents($tmpfile4, $_stringhtml4);

            $objReader = \PHPExcel_IOFactory::createReader('HTML');
            $objReader->load($tmpfile4);

            $objPHPExcel4     = new \PHPExcel();
            $objPHPExcel4->setActiveSheetIndex(0); 
            $objPHPExcel4= $objReader->load($tmpfile4); 
            $objWorkSheet=$objPHPExcel4->getActiveSheet()->setTitle($titulo); 
            $objPHPExcel->addExternalSheet($objWorkSheet); 
        }
        if(!empty($_stringhtml5))
        {
            $titulo="N Campos";            
            if($formato==6)$titulo='Conducción a gravedad';
            $tmpfile5 = tempnam(sys_get_temp_dir(), 'html');
            file_put_contents($tmpfile5, $_stringhtml5);

            $objReader = \PHPExcel_IOFactory::createReader('HTML');
            $objReader->load($tmpfile5);

            $objPHPExcel5     = new \PHPExcel();
            $objPHPExcel5->setActiveSheetIndex(0); 
            $objPHPExcel5= $objReader->load($tmpfile5); 
            $objWorkSheet=$objPHPExcel5->getActiveSheet()->setTitle($titulo); 
            $objPHPExcel->addExternalSheet($objWorkSheet); 
        }         
        if(!empty($_stringhtml6))
        {
            $titulo="N Campos";            
            if($formato==6)$titulo='Conducción a impulsión';
            $tmpfile6 = tempnam(sys_get_temp_dir(), 'html');
            file_put_contents($tmpfile6, $_stringhtml6);

            $objReader = \PHPExcel_IOFactory::createReader('HTML');
            $objReader->load($tmpfile6);

            $objPHPExcel6     = new \PHPExcel();
            $objPHPExcel6->setActiveSheetIndex(0); 
            $objPHPExcel6= $objReader->load($tmpfile6); 
            $objWorkSheet=$objPHPExcel6->getActiveSheet()->setTitle($titulo); 
            $objPHPExcel->addExternalSheet($objWorkSheet); 
        }  
        if(!empty($_stringhtml7))
        {
            $titulo="N Campos";            
            if($formato==6)$titulo='Tratamiento agua desinfección';
            $tmpfile7 = tempnam(sys_get_temp_dir(), 'html');
            file_put_contents($tmpfile7, $_stringhtml7);

            $objReader = \PHPExcel_IOFactory::createReader('HTML');
            $objReader->load($tmpfile7);

            $objPHPExcel7     = new \PHPExcel();
            $objPHPExcel7->setActiveSheetIndex(0); 
            $objPHPExcel7= $objReader->load($tmpfile7); 
            $objWorkSheet=$objPHPExcel7->getActiveSheet()->setTitle($titulo); 
            $objPHPExcel->addExternalSheet($objWorkSheet); 
        } 
        if(!empty($_stringhtml8))
        {
            $titulo="N Campos";            
            if($formato==6)$titulo='Potabilización del agua';
            $tmpfile8 = tempnam(sys_get_temp_dir(), 'html');
            file_put_contents($tmpfile8, $_stringhtml8);

            $objReader = \PHPExcel_IOFactory::createReader('HTML');
            $objReader->load($tmpfile8);

            $objPHPExcel8     = new \PHPExcel();
            $objPHPExcel8->setActiveSheetIndex(0); 
            $objPHPExcel8= $objReader->load($tmpfile8); 
            $objWorkSheet=$objPHPExcel8->getActiveSheet()->setTitle($titulo); 
            $objPHPExcel->addExternalSheet($objWorkSheet); 
        } 
        if(!empty($_stringhtml9))
        {
            $titulo="N Campos";            
            if($formato==6)$titulo='Operación planta de tratamiento';
            $tmpfile9 = tempnam(sys_get_temp_dir(), 'html');
            file_put_contents($tmpfile9, $_stringhtml9);

            $objReader = \PHPExcel_IOFactory::createReader('HTML');
            $objReader->load($tmpfile9);

            $objPHPExcel9     = new \PHPExcel();
            $objPHPExcel9->setActiveSheetIndex(0); 
            $objPHPExcel9= $objReader->load($tmpfile9); 
            $objWorkSheet=$objPHPExcel9->getActiveSheet()->setTitle($titulo); 
            $objPHPExcel->addExternalSheet($objWorkSheet); 
        } 
        if(!empty($_stringhtml10))
        {
            $titulo="N Campos";            
            if($formato==6)$titulo='Almacenamiento tanques';
            $tmpfile10 = tempnam(sys_get_temp_dir(), 'html');
            file_put_contents($tmpfile10, $_stringhtml10);

            $objReader = \PHPExcel_IOFactory::createReader('HTML');
            $objReader->load($tmpfile10);

            $objPHPExcel10     = new \PHPExcel();
            $objPHPExcel10->setActiveSheetIndex(0); 
            $objPHPExcel10= $objReader->load($tmpfile10); 
            $objWorkSheet=$objPHPExcel10->getActiveSheet()->setTitle($titulo); 
            $objPHPExcel->addExternalSheet($objWorkSheet); 
        }
        
        unlink($tmpfile); // delete temporary file because it isn't needed anymore

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8'); // header for .xlxs file
        header('Content-Disposition: attachment;filename='.$filename); // specify the download file name 
        header('Cache-Control: max-age=0');

        // Creates a writer to output the $objPHPExcel's content
        $writer = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        /*Construir las gráficas*/    
        $writer->setIncludeCharts(TRUE);
        $writer->save('php://output');
        exit;
    }
    
    /*Generado Externo*/
    public function ValidacionesGrafico($objPHPExcel,$array_graf_radial,$array_graf_barras)
    {
        $this->estilosEvaluacion($objPHPExcel);
            $i=4;    
            $styleocutlo = array(
                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => 'FFFFFF'),
                                'size'  => 9,
                                'name'  => 'Century Gothic'
                            ),                             
           );    
            foreach($array_graf_radial as $k=>$v)
            {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$i,$k."\n".($v*100)."%");
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$i,$k);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$i,$v);                                
                $objPHPExcel->getActiveSheet()->getStyle('K'.$i)->applyFromArray($styleocutlo);
                $objPHPExcel->getActiveSheet()->getStyle('L'.$i)->applyFromArray($styleocutlo);
                $objPHPExcel->getActiveSheet()->getStyle('M'.$i)->getNumberFormat()->applyFromArray( 
                array( 
                    'code' => \PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE
                ));
                $objPHPExcel->getActiveSheet()->getStyle('M'.$i)->applyFromArray($styleocutlo);
                $i++;
            }
            $this->getGraficoRadial($objPHPExcel);
            $j=11; 
            foreach($array_graf_barras as $k=>$v)
            {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$j,$k);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$j,$v['valor']);                                
                //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$j,$v['color']); 
                $objPHPExcel->getActiveSheet()->getStyle('K'.$j)->applyFromArray($styleocutlo);
                $objPHPExcel->getActiveSheet()->getStyle('L'.$j)->applyFromArray($styleocutlo);
                //$objPHPExcel->getActiveSheet()->getStyle('M'.$j)->applyFromArray($styleocutlo);
                $j++;
            }   
            $this->getGraficoBarras($objPHPExcel);   
    }
    
    /*Generado Externo*/
    private function estilosEvaluacionclases($objPHPExcel,$clase_aplicar,$celda_aplicar)
    {
          if($clase_aplicar=='capituloeval')
                {
                     $styleArray = array(
                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '000000'),
                                'size'  => 13,
                                'name'  => 'Century Gothic'
                            ), 
                            'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                            )
                   );                    
                     $objPHPExcel->getActiveSheet()->getStyle($celda_aplicar)->applyFromArray($styleArray);                 
                }
                else if($clase_aplicar=='seccioneval')
                {
                     $styleArray = array(
                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '000000'),
                                'size'  => 10,
                                'name'  => 'Century Gothic'
                            ),
                        'fill' => array(
                           'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                            'color' => array('rgb' => 'BDD8ED')
                       ),
                          'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_JUSTIFY
                        )
                   );                    
                     //$objPHPExcel->getActiveSheet()->getStyle($celda_aplicar)->applyFromArray($styleArray);                 
                     $objPHPExcel->getActiveSheet()->getStyle('A10:I10')->applyFromArray($styleArray);  
                     $objPHPExcel->getActiveSheet()->getStyle('A58:I58')->applyFromArray($styleArray);  
                     $objPHPExcel->getActiveSheet()->getStyle('A77:I77')->applyFromArray($styleArray);  
                     $objPHPExcel->getActiveSheet()->getStyle('A129:I129')->applyFromArray($styleArray);  
                }
                else if($clase_aplicar=='seccioneval1')
                {
                     $styleArray = array(
                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '000000'),
                                'size'  => 11,
                                'name'  => 'Century Gothic'
                            ),
                        'fill' => array(
                           'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                            'color' => array('rgb' => 'BDD8ED')
                       ),
                          'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_JUSTIFY
                        )
                   );                    
                     $objPHPExcel->getActiveSheet()->getStyle($celda_aplicar)->applyFromArray($styleArray);                 
                }
               
                else if($clase_aplicar=='celdaevalcenter')
                {
                     $styleArray = array(  
                         'font'  => array(
                                'bold'  => false,
                                'color' => array('rgb' => '000000'),
                                'size'  => 9,
                                'name'  => 'Century Gothic'
                            ), 
                       'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        ),
                        
                   );                    
                     $objPHPExcel->getActiveSheet()->getStyle($celda_aplicar)->applyFromArray($styleArray);   
                }
                 else if($clase_aplicar=='celdageneral')
                {
                     $styleArray = array(   
                         'font'  => array(
                                'bold'  => false,
                                'color' => array('rgb' => '000000'),
                                'size'  => 9,
                                'name'  => 'Century Gothic'
                            ),
                         'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                              
                        ),
                   );                    
                     $objPHPExcel->getActiveSheet()->getStyle($celda_aplicar)->applyFromArray($styleArray);   
                }
                else if(strpos($clase_aplicar,'inputpreguntaevaluacionres')==false)
                {      
                    $separa_color = explode("_",$clase_aplicar);
                    $color = $separa_color[1];
                 
                    if($color=="verde")$est_color="4AB767";
                    else if($color=="naranja")$est_color="FFB300";
                    else if($color=="amarillo")$est_color="FCFC0E";
                    else if($color=="rojo")$est_color="F91B03";
                     $styleArray = array(
                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '000000'),
                                'size'  => 9,
                                'name'  => 'Century Gothic'
                            ),
                        'fill' => array(
                           'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                            'color' => array('rgb' => $est_color)
                       ),
                          'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_JUSTIFY
                        )
                   );                 
                     $objPHPExcel->getActiveSheet()->getStyle('G55')->applyFromArray($styleArray);   
                     $objPHPExcel->getActiveSheet()->getStyle('G56')->applyFromArray($styleArray);    
                }
    }
    
    /*Generado Externo*/
    private function estilosEvaluacion($objPHPExcel)
    {        
           $styleArray = array(                            
                       'borders' => array(
                        'allborders' => array(
                            'style' => \PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    ));                    
            $objPHPExcel->getActiveSheet()->getStyle('A1:I56')->applyFromArray($styleArray); 
            $objPHPExcel->getActiveSheet()->getStyle('A58:I74')->applyFromArray($styleArray);            
            
            $styleArrayBorder = array(                            
                       'borders' => array(
                        'outline' => array(
                            'style' => \PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '000000')
                        )
                    )); 
            $objPHPExcel->getActiveSheet()->getStyle('A129:I163')->applyFromArray($styleArrayBorder);
           
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(18);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(4);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(26);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(4);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(14);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(11);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(8);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(14);
            $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
            $objPHPExcel->getActiveSheet()->getRowDimension('10')->setRowHeight(40);
            $objPHPExcel->getActiveSheet()->getRowDimension('11')->setRowHeight(30);
            $objPHPExcel->getActiveSheet()->getRowDimension('131')->setRowHeight(85);
            
            $objPHPExcel->getActiveSheet()->getRowDimension('133')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('134')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('135')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('136')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('137')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('138')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('139')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('140')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('141')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('142')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('143')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('144')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('145')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('146')->setRowHeight(45);
            $objPHPExcel->getActiveSheet()->getRowDimension('147')->setRowHeight(45);
            
                        
            
            /*Son indicadores*/
            $objPHPExcel->getActiveSheet()->getRowDimension('58')->setRowHeight(30);
            $objPHPExcel->getActiveSheet()->getRowDimension('59')->setRowHeight(30);
            
            for($i=60;$i<75;$i++)
              $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(30);
            
            $objPHPExcel->getActiveSheet()->getStyle('A12:A13')->getAlignment()->setTextRotation(90);
            $objPHPExcel->getActiveSheet()->getStyle('A14:A34')->getAlignment()->setTextRotation(90);
            $objPHPExcel->getActiveSheet()->getStyle('A35:A46')->getAlignment()->setTextRotation(90);
            $objPHPExcel->getActiveSheet()->getStyle('A47:A50')->getAlignment()->setTextRotation(90);
            $objPHPExcel->getActiveSheet()->getStyle('A51:A54')->getAlignment()->setTextRotation(90);   
            
            
            $styleArray_cab = array(
                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '000000'),
                                'size'  => 9,
                                'name'  => 'Century Gothic'
                            ),
                        'fill' => array(
                           'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                            'color' => array('rgb' => 'BDD8ED')
                       ),
                       'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_JUSTIFY
                        )
                   );
            
            $objPHPExcel->getActiveSheet()->getStyle('A11:I11')->applyFromArray($styleArray_cab);   
            $objPHPExcel->getActiveSheet()->getStyle('A59:I59')->applyFromArray($styleArray_cab);   
            
            $styleArray_deta= array(
                            'font'  => array(
                                'bold'  => false,
                                'color' => array('rgb' => '000000'),
                                'size'  => 9,
                                'name'  => 'Century Gothic'
                            ),
                       'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
                        )
                   );
            
            $objPHPExcel->getActiveSheet()->getStyle('C12:C54')->applyFromArray($styleArray_deta);  
            $objPHPExcel->getActiveSheet()->getStyle('E12:E54')->applyFromArray($styleArray_deta);  
            $objPHPExcel->getActiveSheet()->getStyle('F12:F54')->applyFromArray($styleArray_deta);  
            $objPHPExcel->getActiveSheet()->getStyle('I60:I74')->applyFromArray($styleArray_deta);  
            
            $styleArray_detacump= array(
                            'font'  => array(
                                'bold'  => false,
                                'color' => array('rgb' => '000000'),
                                'size'  => 9,
                                'name'  => 'Century Gothic'
                            ),
                       'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_JUSTIFY
                        )
             );
            
            $objPHPExcel->getActiveSheet()->getStyle('F12:F54')->applyFromArray($styleArray_detacump);  
            
            $styleArray_deta2= array(
                            'font'  => array(
                                'bold'  => false,
                                'color' => array('rgb' => '000000'),
                                'size'  => 9,
                                'name'  => 'Century Gothic'
                            ),
                       'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
                        )
                   );
            $objPHPExcel->getActiveSheet()->getStyle('B12:B54')->applyFromArray($styleArray_deta2);      
            $objPHPExcel->getActiveSheet()->getStyle('D12:D54')->applyFromArray($styleArray_deta2);
            $objPHPExcel->getActiveSheet()->getStyle('A149:H149')->applyFromArray($styleArray_deta2);            
            
             $styleArray_deta_negrita= array(
                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '000000'),
                                'size'  => 9,
                                'name'  => 'Century Gothic'
                            ),
                       'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_DISTRIBUTED
                        )
                   );
            
            $objPHPExcel->getActiveSheet()->getStyle('D154:E154')->applyFromArray($styleArray_deta_negrita);
            $objPHPExcel->getActiveSheet()->getStyle('D153:E153')->applyFromArray($styleArray_deta_negrita);            
            $objPHPExcel->getActiveSheet()->getStyle('D158:E158')->applyFromArray($styleArray_deta_negrita);
            $objPHPExcel->getActiveSheet()->getStyle('D159:E159')->applyFromArray($styleArray_deta_negrita);
            $objPHPExcel->getActiveSheet()->getStyle('D160:G160')->applyFromArray($styleArray_deta_negrita);
            /*$objPHPExcel->getActiveSheet()->getStyle('A149:B149')->applyFromArray($styleArray_deta_negrita);
            $objPHPExcel->getActiveSheet()->getStyle('E149:F149')->applyFromArray($styleArray_deta_negrita);*/
            
            $styleArray_indi= array(
                            'font'  => array(
                                'bold'  => false,
                                'color' => array('rgb' => '000000'),
                                'size'  => 11,
                                'name'  => 'Century Gothic'
                            ),
                       'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_JUSTIFY
                        )
                   );
                        
            
            $objPHPExcel->getActiveSheet()->getStyle('E60:E74')->applyFromArray($styleArray_indi);   
            $objPHPExcel->getActiveSheet()->getStyle('F60:F74')->applyFromArray($styleArray_indi);
            $objPHPExcel->getActiveSheet()->getStyle('A78:I78')->applyFromArray($styleArray_indi);
            $objPHPExcel->getActiveSheet()->getStyle('A101:I101')->applyFromArray($styleArray_indi);  
            
            $styleArray_recom= array(
                            'font'  => array(
                                'bold'  => false,
                                'color' => array('rgb' => '000000'),
                                'size'  => 10,
                                'name'  => 'Century Gothic'
                            ),
                       'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
                        )
                   );
            
            $objPHPExcel->getActiveSheet()->getStyle('D60:D74')->applyFromArray($styleArray_recom);   
            $objPHPExcel->getActiveSheet()->getStyle('B132:I148')->applyFromArray($styleArray_recom);
            $objPHPExcel->getActiveSheet()->getStyle('A131:I131')->applyFromArray($styleArray_recom);
            
             $styleArray_tot= array(
                            'font'  => array(
                                'bold'  => true,
                                'color' => array('rgb' => '000000'),
                                'size'  => 11,
                                'name'  => 'Century Gothic'
                            ),
                       'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
                        )
                   );
             $objPHPExcel->getActiveSheet()->getStyle('A55:F55')->applyFromArray($styleArray_tot);      
             $objPHPExcel->getActiveSheet()->getStyle('A56:F56')->applyFromArray($styleArray_tot);  
             
             $styleArray_center= array(
                            'font'  => array(
                                'bold'  => false,
                                'color' => array('rgb' => '000000'),
                                'size'  => 10,
                                'name'  => 'Century Gothic'
                            ),
                       'alignment' => array(
                              'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                              'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
                        )
                   );
             $objPHPExcel->getActiveSheet()->getStyle('A133:A147')->applyFromArray($styleArray_center);              
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

        $_arraycolm=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
            'AA',	'AB',	'AC',	'AD',	'AE',	'AF',	'AG',	'AH',	'AI',	'AJ',	'AK',	'AL',	'AM',	'AN',	'AO',	'AP',	'AQ',	'AR',	'AS',	'AT',	'AU',	'AV',	'AW',	'AX',	'AY',   'AZ',
            'BA',	'BB',	'BC',	'BD',	'BE',	'BF',	'BG',	'BH',	'BI',	'BJ',	'BK',	'BL',	'BM',	'BN',	'BO',	'BP',	'BQ',	'BR',	'BS',	'BT',	'BU',	'BV',	'BW',	'BX',	'BY',	'BZ',
            'CA',	'CB',	'CC',	'CD',	'CE',	'CF',	'CG',	'CH',	'CI',	'CJ',	'CK',	'CL',	'CM',	'CN',	'CO',	'CP',	'CQ',	'CR',	'CS',	'CT',	'CU',	'CV',	'CW',	'CX',	'CY',	'CZ',
            'DA',	'DB',	'DC',	'DD',	'DE',	'DF',	'DG',	'DH',	'DI',	'DJ',	'DK',	'DL',	'DM',	'DN',	'DO',	'DP',	'DQ',	'DR',	'DS',	'DT',	'DU',	'DV',	'DW',	'DX',	'DY',	'DZ',
            'EA',	'EB',	'EC',	'ED',	'EE',	'EF',	'EG',	'EH',	'EI',	'EJ',	'EK',	'EL',	'EM',	'EN',	'EO',	'EP',	'EQ',	'ER',	'ES',	'ET',	'EU',	'EV',	'EW',	'EX',	'EY',	'EZ',
            'FA',	'FB',	'FC',	'FD',	'FE',	'FF',	'FG',	'FH',	'FI',	'FJ',	'FK',	'FL',	'FM',	'FN',	'FO',	'FP',	'FQ',	'FR',	'FS',	'FT',	'FU',	'FV',	'FW',	'FX',	'FY',	'FZ',
            'GA',	'GB',	'GC',	'GD',	'GE',	'GF',	'GG',	'GH',	'GI',	'GJ',	'GK',	'GL',	'GM',	'GN',	'GO',	'GP',	'GQ',	'GR',	'GS',	'GT',	'GU',	'GV',	'GW',	'GX',	'GY',	'GZ',
            'HA',	'HB',	'HC',	'HD',	'HE',	'HF',	'HG',	'HH',	'HI',	'HJ',	'HK',	'HL',	'HM',	'HN',	'HO',	'HP',	'HQ',	'HR',	'HS',	'HT',	'HU',	'HV',	'HW',	'HX',	'HY',	'HZ',
            'IA',	'IB',	'IC',	'ID',	'IE',	'IF',	'IG',	'IH',	'II',	'IJ',	'IK',	'IL',	'IM',	'IN',	'IO',	'IP',	'IQ',	'IR',	'IS',	'IT',	'IU',	'IV',	'IW',	'IX',	'IY',	'IZ',
            'JA',	'JB',	'JC',	'JD',	'JE',	'JF',	'JG',	'JH',	'JI',	'JJ',	'JK',	'JL',	'JM',	'JN',	'JO',	'JP',	'JQ',	'JR',	'JS',	'JT',	'JU',	'JV',	'JW',	'JX',	'JY',	'JZ',
            'KA',	'KB',	'KC',	'KD',	'KE',	'KF',	'KG',	'KH',	'KI',	'KJ',	'KK',	'KL',	'KM',	'KN',	'KO',	'KP',	'KQ',	'KR',	'KS',	'KT',	'KU',	'KV',	'KW',	'KX',	'KY',	'KZ',
            'LA',	'LB',	'LC',	'LD',	'LE',	'LF',	'LG',	'LH',	'LI',	'LJ',	'LK',	'LL',	'LM',	'LN',	'LO',	'LP',	'LQ',	'LR',	'LS',	'LT',	'LU',	'LV',	'LW',	'LX',	'LY',	'LZ',
            'MA',	'MB',	'MC',	'MD',	'ME',	'MF',	'MG',	'MH',	'MI',	'MJ',	'MK',	'ML',	'MM',	'MN',	'MO',	'MP',	'MQ',	'MR',	'MS',	'MT',	'MU',	'MV',	'MW',	'MX',	'MY',	'MZ',
            'NA',	'NB',	'NC',	'ND',	'NE',	'NF',	'NG',	'NH',	'NI',	'NJ',	'NK',	'NL',	'NM',	'NN',	'NO',	'NP',	'NQ',	'NR',	'NS',	'NT',	'NU',	'NV',	'NW',	'NX',	'NY',	'NZ',
            'OA',	'OB',	'OC',	'OD',	'OE',	'OF',	'OG',	'OH',	'OI',	'OJ',	'OK',	'OL',	'OM',	'ON',	'OO',	'OP',	'OQ',	'OR',	'OS',	'OT',	'OU',	'OV',	'OW',	'OX',	'OY',	'OZ',
            'PA',	'PB',	'PC',	'PD',	'PE',	'PF',	'PG',	'PH',	'PI',	'PJ',	'PK',	'PL',	'PM',	'PN',	'PO',	'PP',	'PQ',	'PR',	'PS',	'PT',	'PU',	'PV',	'PW',	'PX',	'PY',	'PZ',
            'QA',	'QB',	'QC',	'QD',	'QE',	'QF',	'QG',	'QH',	'QI',	'QJ',	'QK',	'QL',	'QM',	'QN',	'QO',	'QP',	'QQ',	'QR',	'QS',	'QT',	'QU',	'QV',	'QW',	'QX',	'QY',	'QZ',
            'RA',	'RB',	'RC',	'RD',	'RE',	'RF',	'RG',	'RH',	'RI',	'RJ',	'RK',	'RL',	'RM',	'RN',	'RO',	'RP',	'RQ',	'RR',	'RS',	'RT',	'RU',	'RV',	'RW',	'RX',	'RY',	'RZ',
            'SA',	'SB',	'SC',	'SD',	'SE',	'SF',	'SG',	'SH',	'SI',	'SJ',	'SK',	'SL',	'SM',	'SN',	'SO',	'SP',	'SQ',	'SR',	'SS',	'ST',	'SU',	'SV',	'SW',	'SX',	'SY',	'SZ',
            'TA',	'TB',	'TC',	'TD',	'TE',	'TF',	'TG',	'TH',	'TI',	'TJ',	'TK',	'TL',	'TM',	'TN',	'TO',	'TP',	'TQ',	'TR',	'TS',	'TT',	'TU',	'TV',	'TW',	'TX',	'TY',	'TZ',
            'UA',	'UB',	'UC',	'UD',	'UE',	'UF',	'UG',	'UH',	'UI',	'UJ',	'UK',	'UL',	'UM',	'UN',	'UO',	'UP',	'UQ',	'UR',	'US',	'UT',	'UU',	'UV',	'UW',	'UX',	'UY',	'UZ',
            'VA',	'VB',	'VC',	'VD',	'VE',	'VF',	'VG',	'VH',	'VI',	'VJ',	'VK',	'VL',	'VM',	'VN',	'VO',	'VP',	'VQ',	'VR',	'VS',	'VT',	'VU',	'VV',	'VW',	'VX',	'VY',	'VZ',
            'WA',	'WB',	'WC',	'WD',	'WE',	'WF',	'WG',	'WH',	'WI',	'WJ',	'WK',	'WL',	'WM',	'WN',	'WO',	'WP',	'WQ',	'WR',	'WS',	'WT',	'WU',	'WV',	'WW',	'WX',	'WY',	'WZ',
            'XA',	'XB',	'XC',	'XD',	'XE',	'XF',	'XG',	'XH',	'XI',	'XJ',	'XK',	'XL',	'XM',	'XN',	'XO',	'XP',	'XQ',	'XR',	'XS',	'XT',	'XU',	'XV',	'XW',	'XX',	'XY',	'XZ',
            'YA',	'YB',	'YC',	'YD',	'YE',	'YF',	'YG',	'YH',	'YI',	'YJ',	'YK',	'YL',	'YM',	'YN',	'YO',	'YP',	'YQ',	'YR',	'YS',	'YT',	'YU',	'YV',	'YW',	'YX',	'YY',	'YZ',
            'ZA',	'ZB',	'ZC',	'ZD',	'ZE',	'ZF',	'ZG',	'ZH',	'ZI',	'ZJ',	'ZK',	'ZL',	'ZM',	'ZN',	'ZO',	'ZP',	'ZQ',	'ZR',	'ZS',	'ZT',	'ZU',	'ZV',	'ZW',	'ZX',	'ZY',	'ZZ',
            'AAA',	'AAB',	'AAC',	'AAD',	'AAE',	'AAF',	'AAG',	'AAH',	'AAI',	'AAJ',	'AAK',	'AAL',	'AAM',	'AAN',	'AAO',	'AAP',	'AAQ',	'AAR',	'AAS',	'AAT',	'AAU',	'AAV',	'AAW',	'AAX',	'AAY',	'AAZ',
            'ABA',	'ABB',	'ABC',	'ABD',	'ABE',	'ABF',	'ABG',	'ABH',	'ABI',	'ABJ',	'ABK',	'ABL',	'ABM',	'ABN',	'ABO',	'ABP',	'ABQ',	'ABR',	'ABS',	'ABT',	'ABU',	'ABV',	'ABW',	'ABX',	'ABY',	'ABZ',
            'ACA',	'ACB',	'ACC',	'ACD',	'ACE',	'ACF',	'ACG',	'ACH',	'ACI',	'ACJ',	'ACK',	'ACL',	'ACM',	'ACN',	'ACO',	'ACP',	'ACQ',	'ACR',	'ACS',	'ACT',	'ACU',	'ACV',	'ACW',	'ACX',	'ACY',	'ACZ',

            ];

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
                                            
                                                $tamañocelda = strlen($_celda->nodeValue);
                                            
						$_class[]=array('class' => trim($_celda->getAttribute('class')),'celda'=>$_arraycolm[$_td].''.$_ln,'text' => $_celda->nodeValue,'sizecelda'=>$tamañocelda);
                                                
                                                if(!empty($_celda->getAttribute('colspan'))){
                                                    
                                                    $_apclase = trim($_celda->getAttribute('class'));
                                                    $_cantidadceldas=$_celda->getAttribute('colspan');
                                                    //$_cantidadfilas=$_celda->getAttribute('rowspan');
                                                    
                                                    for($col = 1; $col<$_cantidadceldas; $col++) {
                                                        $_tdnext=$_td+$col;
                                                        $_class[]=array('class' => trim($_apclase),'celda'=>$_arraycolm[$_tdnext].''.$_ln,'text' => $_celda->nodeValue,'sizecelda'=>$tamañocelda,'colspan'=>$_cantidadceldas);
                                                    }
                                                    /*for($col = 1; $col<$_cantidadfilas; $col++) {
                                                        
                                                        $_tdnext=$_td+$col;
                                                        $_class[]=array('class' => trim($_apclase),'celda'=>$_arraycolm[$_tdnext].''.$_ln,'text' => $_celda->nodeValue);
                                                    }*/
                                                    
                                                }
						$_td+=1;
					}
				
				}	
			}
			
		}	

        }
        
//print_r($_class);
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
    
    public function getGraficoRadial($excel)
    {       
        $objWorksheet = $excel->getActiveSheet();   
         
       $dataseriesLabels1 = array(
            new \PHPExcel_Chart_DataSeriesValues('String', 'Formato!$L$4:$L$8', NULL, 1), //  Labels
        );       
        $xAxisTickValues = array(
            new \PHPExcel_Chart_DataSeriesValues('String', 'Formato!$K$4:$K$8', NULL, 5), //  Jan to Dec
        );
        $dataSeriesValues1 = array(
            new \PHPExcel_Chart_DataSeriesValues('Number', 'Formato!$M$4:$M$8', NULL, 5),
        );

        //  Build the dataseries
        $series1 = new \PHPExcel_Chart_DataSeries(
                \PHPExcel_Chart_DataSeries::TYPE_RADARCHART, // plotType
                NULL,
                range(0, count($dataSeriesValues1) - 1), // plotOrder
                $dataseriesLabels1, // plotLabel
                $xAxisTickValues, // plotCategory
                $dataSeriesValues1,                              // plotValues
                NULL,
                NULL,
                \PHPExcel_Chart_DataSeries::STYLE_MARKER
                
        );
        //$series1->setPlotDirection(\PHPExcel_Chart_DataSeries::DIRECTION_VERTICAL);

        $layout2=new \PHPExcel_Chart_Layout();
        $layout2->setShowVal(TRUE);

        //  Set the series in the plot area
        $plotarea = new \PHPExcel_Chart_PlotArea(NULL, array($series1));
        //  Set the chart legend
        $legend = new \PHPExcel_Chart_Legend(\PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);

        $title = new \PHPExcel_Chart_Title('');

        //  Create the chart
        $chart = new \PHPExcel_Chart(
                'chart1', // name
                $title, // title
                $legend, // legend
                $plotarea, // plotArea
                true, // plotVisibleOnly
                0, // displayBlanksAs
                NULL, // xAxisLabel
                NULL            // yAxisLabel
        );
        //  Set the position where the chart should appear in the worksheet
        $chart->setTopLeftPosition('A79');
        $chart->setBottomRightPosition('I100');
        //  Add the chart to the worksheet
        $objWorksheet->addChart($chart);
    }
    public function getGraficoBarras($excel)
    {
         $objWorksheet = $excel->getActiveSheet();      
        $dataseriesLabels1 = array(
            new \PHPExcel_Chart_DataSeriesValues('String', 'Formato!$K$11:$K$24', NULL, 1), //  Temperature
        );       
        $xAxisTickValues = array(
            new \PHPExcel_Chart_DataSeriesValues('String', 'Formato!$K$11:$K$24', NULL, 14), //  Jan to Dec
        );
        $dataSeriesValues1 = array(
            new \PHPExcel_Chart_DataSeriesValues('Number', 'Formato!$L$11:$L$24', NULL, 14),
        );
         /*$xAxisTickValues = array(
            new \PHPExcel_Chart_DataSeriesValues('String', 'Formato!$M$11:$M$25', NULL, 15),
        );*/

        //  Build the dataseries
        $series1 = new \PHPExcel_Chart_DataSeries(
                \PHPExcel_Chart_DataSeries::TYPE_BARCHART, // plotType
                \PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,
                range(0, count($dataSeriesValues1) - 1), // plotOrder
                $dataseriesLabels1, // plotLabel
                $xAxisTickValues, // plotCategory
                $dataSeriesValues1,                              // plotValues
                NULL,
                NULL,
                \PHPExcel_Chart_DataSeries::STYLE_MARKER
        );
        //$series1->setPlotDirection(\PHPExcel_Chart_DataSeries::DIRECTION_VERTICAL);

        $layout2=new \PHPExcel_Chart_Layout();
        $layout2->setShowVal(TRUE);
                

        $series1->setPlotDirection(\PHPExcel_Chart_DataSeries::DIRECTION_BAR);
        //  Set the series in the plot area
        $plotarea = new \PHPExcel_Chart_PlotArea($layout2, array($series1));
        
        
        //  Set the chart legend
        //$legend = new \PHPExcel_Chart_Legend(\PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);

        $title = new \PHPExcel_Chart_Title('');
        

        //  Create the chart
        $chart = new \PHPExcel_Chart(
                'chart1', // name
                $title, // title
                NULL, // legend
                $plotarea, // plotArea
                true, // plotVisibleOnly
                0, // displayBlanksAs
                NULL, // xAxisLabel
                NULL            // yAxisLabel
        );
        //  Set the position where the chart should appear in the worksheet
        $chart->setTopLeftPosition('A102');
        $chart->setBottomRightPosition('I127');
        //  Add the chart to the worksheet
        $objWorksheet->addChart($chart);

    }

}
