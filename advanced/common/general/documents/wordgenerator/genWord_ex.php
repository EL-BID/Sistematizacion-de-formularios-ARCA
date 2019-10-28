<?php

//error_reporting(E_ALL);

namespace common\general\documents\wordgenerator;

require_once __DIR__.'/vendor/phpoffice/phpword/bootstrap.php';
use PhpOffice\PhpWord\Settings;
use yii;

date_default_timezone_set('UTC');
define('CLI', (PHP_SAPI == 'cli') ? true : false);
define('EOL', CLI ? PHP_EOL : '<br />');
define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME'], '.php'));
define('IS_INDEX', SCRIPT_FILENAME == 'index');

class genWord_ex
{
    /*El stringhtml solo puede contener el atributo class, los
     * atributos id no seran reemplazados
     * @filename => nombre del archivo sin .doc Ej:archivo1
     * @_stringhtml => cotenido html preferiblemente sin espacio en tags
     * @style => ubicacion del archivo css ver ejemplo en css/formato.css
     */

    public function genFile($filename, $_stringhtml, $_styles)
    {
        //1) Se verifican las clases del styles que se encuentren todas contenidas
        //en el archivo para evitar errores
        $_stilos = $this->responsecss($_styles);

        //2) Se reemplazan en el string html las comillas sencillas por dobles
        $_stringhtml = ereg_replace("'", '"', $_stringhtml);

        //3) Se busca si aun quedaron comillas sencillas
        if (strpos("'", $_stringhtml) !== false) {
            throw new \yii\web\HttpException(404, 'El codigo no puede contener comillas sencillas.');
        }

        //4) Reemplazando espacios en blanco entre tags
        $_finalstringhtml = $this->limpiahtml($_stringhtml);

        //4.1) Cerrando tag de imagen yii no lo cierra por defecto
        $_finalstringhtml = $this->closeimg($_finalstringhtml);

        //4.2)Eliminando errores de lineas sin celdas internas
        /* $_finalstringhtml=str_replace("<tr></tr>","",$_finalstringhtml);
         $_finalstringhtml= str_replace('</tr></tr>', '</tr>', $_finalstringhtml);
         $_finalstringhtml= str_replace('</td><tr>', '</td></tr><tr>', $_finalstringhtml);
         $_finalstringhtml= str_replace('rowspan=""', '', $_finalstringhtml);*/

        //5) Reemplazando la palabra class por el style
        $_finalstringhtml = str_replace('class=', 'style=', $_finalstringhtml);

        //6) Reemplazando br sin cerrar
        $_finalstringhtml = str_replace('<br>', '<br/>', $_finalstringhtml);

        //4) se Reemplazan las clases
        foreach ($_stilos[1] as $_claveclase) {
            // Yii::trace('Clases a modificar: '.$_claveclase." : ".$_stilos[0][$_claveclase].PHP_EOL, 'DEBUG');

            $_finalstringhtml = str_replace($_claveclase, $_stilos[0][$_claveclase], $_finalstringhtml);
        }

        $_finalstringhtml = ereg_replace(' >', '>', $_finalstringhtml);
        $_finalstringhtml = ereg_replace('< ', '<', $_finalstringhtml);

        //Yii::trace('String final: '.$_finalstringhtml.PHP_EOL, 'DEBUG');

        Settings::loadConfig();
        $writers = array('Word2007' => 'docx');
        Settings::setOutputEscapingEnabled(true);
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $_finalstringhtml);

        // Save file
        $this->write($phpWord, $filename, $writers);
    }

    /**
     * Write documents.
     *
     * @param \PhpOffice\PhpWord\PhpWord $phpWord
     * @param string                     $filename
     * @param array                      $writers
     *
     * @return string
     */
    public function write($phpWord, $filename, $writers)
    {
        $result = '';

        // Write documents
        foreach ($writers as $format => $extension) {
            if (null !== $extension) {
                $targetFile = __DIR__."/results/{$filename}.{$extension}";
                $phpWord->save($targetFile, $format);
            }

            /*Se agrega codigo para Descarga de archivo en sitio*/
            $_filedown = $targetFile;
            $basefichero = basename($_filedown);
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            header('Content-Length: '.filesize($_filedown));
            header('Content-Disposition: attachment; filename='.$basefichero.'');
            readfile($_filedown);
        }
    }

    /*Funcion response css, reemplaza los estilos
     * en el string HTML
     */

    public function responsecss($_archivocss)
    {
        $_contenidocss = file_get_contents($_archivocss);
        $_vector1 = explode('}', $_contenidocss);              //Pasando clases a vector
        $_filecss = array();
        $_clasescss = array();

        for ($_css = 0; $_css < count($_vector1); ++$_css) {
            $_clase = trim($_vector1[$_css]);

            if (!empty($_clase)) {
                $_vectorint = explode('{', $_clase);

                //Asignando nombre de la clase==================================//
                $_nombreclase = trim(str_replace('.', '', $_vectorint[0]));

                //Asignando contenido de la clase===============================//
                $_contenidoclase = explode(';', $_vectorint[1]);
                $_stringclase = '';

                foreach ($_contenidoclase as $_propiedades) {
                    $_stringclase .= trim($_propiedades).';';
                }

                $_stringclase = substr($_stringclase, 0, -2);

                if (!empty($_stringclase) and !empty($_nombreclase)) {
                    $_clasescss[$_nombreclase] = $_stringclase;
                    $_nombreclases[] = $_nombreclase;
                }
            }
        }

        return [$_clasescss, $_nombreclases];
    }

    public function limpiahtml($codigo)
    {
        $buscar = array('/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s');
        $reemplazar = array('>', '<', '\\1');
        $codigo = preg_replace($buscar, $reemplazar, $codigo);
        $codigo = str_replace('> <', '><', $codigo);

        return $codigo;
    }

    public function closeimg($codigo)
    {
        $str = preg_replace('~(?s)<img(?=\s|>)(?>(?:".*?"|\'.*?\'|[^>]*?)+\K>)(?<!/>)~', '/>', $codigo);

        return $str;
    }
}
