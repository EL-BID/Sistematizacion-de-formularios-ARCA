<?php
include_once 'Sample_Header.php';

// New Word Document
echo date('H:i:s') , ' Create new PhpWord object' , EOL;
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$section = $phpWord->addSection();
/*$html  = '<table style="width: 50%; border: 6px #0000FF solid;">'.
            '<thead>'.
                '<tr style="background-color: #FF0000; text-align: center; color: #FFFFFF; font-weight: bold; ">'.
                    '<th>a</th>'.
                    '<th>b</th>'.
                    '<th>c</th>'.
                '</tr>'.
            '</thead>'.
            '<tbody>'.
                '<tr><td>1</td><td colspan="2">2</td></tr>'.
                '<tr><td>4</td><td>5</td><td>6</td></tr>'.
            '</tbody>'.
         '</table>';*/
		 
		 
$html = '<table style="width: 90%; border: 1px #000000 solid;"><tr><td style="font-size: 14pt; color:#4169E1; font-weight: bold; border: solid 2px #ccccccc; text-align: center;" colspan="4"> I.INFORMACI&Oacute;N GENERAL DEL SOLICITANTE</td></tr><tr><td colspan="2" width="50%" style="border: solid 1px #000; border-bottom: dotted 2px #5F9EA0; padding: 2px 2px; font-size:1em; width: 25%; color:#00a; background-color:#F0FFF0;">NOMBRES Y APELLIDOS DEL USUARIO AUTORIZADO/CONCESIONADO, REPRESENTANTE LEGAL O SOLICITANTES AUTORIZADO: </td><td style="inputpregunta" colspan="2" width="50%">pepito grillo perez 4</td></tr><tr><td style="border: solid 1px #000; border-bottom: dotted 2px #5F9EA0; padding: 2px 2px; font-size:1em; width: 25%; color:#00a; background-color:#F0FFF0;">Numero de Celular: </td><td style="inputpregunta">6253213</td><td style="border: solid 1px #000; border-bottom: dotted 2px #5F9EA0; padding: 2px 2px; font-size:1em; width: 25%; color:#00a; background-color:#F0FFF0;">Numero Convencional:</td><td style="inputpregunta">623691</td></tr><tr><td style="border: solid 1px #000; border-bottom: dotted 2px #5F9EA0; padding: 2px 2px; font-size:1em; width: 25%; color:#00a; background-color:#F0FFF0;">Tipo de Documento:</td><td style="inputpregunta">Cédula</td><td style="border: solid 1px #000; border-bottom: dotted 2px #5F9EA0; padding: 2px 2px; font-size:1em; width: 25%; color:#00a; background-color:#F0FFF0;">C&eacute;dula y/o RUC:</td><td style="inputpregunta">1095623157</td></tr><tr><td colspan="1" style="border: solid 1px #000; border-bottom: dotted 2px #5F9EA0; padding: 2px 2px; font-size:1em; width: 25%; color:#00a; background-color:#F0FFF0;">Direccion:</td><td colspan="3" style="inputpregunta">Ninguna 45</td></tr><tr><td colspan="1" style="border: solid 1px #000; border-bottom: dotted 2px #5F9EA0; padding: 2px 2px; font-size:1em; width: 25%; color:#00a; background-color:#F0FFF0;">Descripcion Trabajo:</td><td colspan="3" style="inputpregunta">No tengo trabajo 2</td></tr><tr><td colspan="1" style="border: solid 1px #000; border-bottom: dotted 2px #5F9EA0; padding: 2px 2px; font-size:1em; width: 25%; color:#00a; background-color:#F0FFF0;">Correo Electronico:</td><td colspan="3" style="inputpregunta">ana39@correo.com</td></tr><tr><td style="border: solid 1px #000; border-bottom: dotted 2px #5F9EA0; padding: 2px 2px; font-size:1em; width: 25%; color:#00a; background-color:#F0FFF0;">Tipo de Personal:</td><td style="inputpregunta">Persona Natural</td><td style="border: solid 1px #000; border-bottom: dotted 2px #5F9EA0; padding: 2px 2px; font-size:1em; width: 25%; color:#00a; background-color:#F0FFF0;">Nombres y Apellidos Rep. Legal:</td><td style="inputpregunta">pepe 3</td></tr></table>';		 


\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);

// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    include_once 'Sample_Footer.php';
}