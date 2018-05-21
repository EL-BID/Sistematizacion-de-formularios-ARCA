<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
//use common\documents\genPDF;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorParametro */

$this->title = 'Generar PDF';
$this->params['breadcrumbs'][] = ['label' => 'Generar PDF', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
//$generacion = new genPDF();
?>
<div class="cor-parametro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

<label for="contenido">Contenido HTML</label>
    <?= \yii\redactor\widgets\Redactor::widget([
        'name' => 'contenido',
        'attribute' => 'body',
        'value'=>'<h1 style="text-align: center;">TITULO</h1><br><hr>
            <p style="text-align: center;"><img src="uploadfolder/redactor/f76cb028c8-manual-aps02.jpg">
</p>
            <div align="center">
             <table>
             <tr>
               <th><b>Titulo1</b></th>
               <th><b>Titulo2</b></th>
               <th><b>Titulo3</b></th>
               <th><b>Titulo4</b></th>
               <th><b>Titulo5</b></th>
             </tr>
             <tr>
               <td>Dato1</td>
               <td>Dato2</td>
               <td>Dato3</td>
               <td>Dato4</td>
               <td>Dato5</td>
             </tr>
              <tr>
               <td>Dato1</td>
               <td>Dato2</td>
               <td>Dato3</td>
               <td>Dato4</td>
               <td>Dato5</td>
             </tr>
            </table> 
            </div>

            <p align="justify">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et enim eu dui mattis dictum. Vivamus purus augue, luctus at tristique id, gravida sit amet tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque ultricies vestibulum urna, suscipit euismod purus eleifend non. Donec mollis, nisl eget mattis ultricies, erat massa dictum dui, quis imperdiet massa sem gravida est. In hac habitasse platea dictumst. Ut in hendrerit velit. Fusce vehicula lorem rhoncus, dictum felis eget, varius dolor.
            </p>
            <p align="justify">
            Sed ultrices pulvinar vehicula. Vivamus velit nibh, maximus eu consequat vel, rutrum quis sapien. Fusce molestie sodales facilisis. Ut iaculis dignissim massa, vitae pretium massa cursus ac. Donec a nunc id nulla volutpat scelerisque ac vel lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum quis dignissim elit. Etiam non sem et elit condimentum pretium semper ut leo. Cras a interdum nunc.
            </p>
            <p align="justify">
            Nullam nec volutpat ex. Ut scelerisque ipsum tortor, non semper sem posuere non. Nam hendrerit egestas felis vitae tincidunt. Sed mollis blandit lorem vel cursus. Nunc ex ante, fermentum a justo eget, elementum congue felis. Sed hendrerit mi at turpis vestibulum accumsan. Fusce auctor dictum nibh sit amet fermentum. Proin non efficitur massa, vel porttitor ante.
            </p>
            <p align="justify">
            Integer congue in neque ut tempus. Phasellus id erat eu turpis vestibulum tristique nec et ligula. Curabitur a justo vitae arcu molestie iaculis. Integer in lacus in justo egestas pellentesque. Vestibulum quam odio, auctor in venenatis id, semper in elit. Fusce ac elit sem. Praesent vitae ligula quis lectus sodales malesuada.
            </p>
            <p align="justify">
            Aenean iaculis commodo massa a accumsan. Aenean tristique arcu odio, sed dictum tellus faucibus et. Pellentesque dapibus, nulla sed ullamcorper ultrices, dui leo egestas metus, non dapibus libero quam ut ex. Vestibulum dui leo, suscipit et justo sit amet, varius finibus diam. Aliquam nec dui at mauris ornare dapibus. Nullam et eros pretium elit hendrerit consequat porttitor eget mauris. Pellentesque iaculis purus dui, ac accumsan ex ultrices sed. Integer dui elit, condimentum et orci in, porttitor faucibus justo. Quisque facilisis quam eget tellus bibendum, vel luctus felis convallis. Proin tristique felis ipsum, non cursus odio fermentum eu. Fusce ullamcorper sit amet ipsum nec lacinia. 
            </p>',
         'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
    ]) ?>

    <label for="destino">Formato</label>
    <br> 
        <?= Html::dropDownList('formato','Letter',array(common\general\documents\genPDF::FORMATO_A3 =>'A3',common\general\documents\genPDF::FORMATO_A4 =>'A4',common\general\documents\genPDF::FORMATO_CARTA =>'CARTA' ,common\general\documents\genPDF::FORMATO_OFICIO =>'OFICIO',common\general\documents\genPDF::FORMATO_LIBRO =>'LIBRO',common\general\documents\genPDF::FORMATO_TABLA =>'TABLA',common\general\documents\genPDF::FORMATO_PERIODICO=>'PERIODICO') ) ?>
    <br> 
    <br> 
    <label for="destino">Destino</label>
    <br> 
    <?= Html::dropDownList('destino',null,array(common\general\documents\genPDF::DESTINO_NAVEGADOR=>'NAVEGADOR',common\general\documents\genPDF::DESTINO_DESCARGA=>'DESCARGA', common\general\documents\genPDF::DESTINO_ARCHIVO =>'ARCHIVO',common\general\documents\genPDF::DESTINO_STRING=>'STRING'),['onchange'=>'if(this.value=="F"){document.getElementById("direccion").innerHTML="frontend\\\\web\\\\documentos\\\\pdf\\\\ ";}else{document.getElementById("direccion").innerHTML="";}'] ) ?>
    <br> 
    <br> 
    <label for="nombre">Nombre Archivo</label>
    <br> 
    <span id="direccion"></span> <?= Html::input('text', 'nombre', 'Archivo.pdf') ?>
    <br> 
    <br> 
        <div class="form-group">
            <?= Html::submitButton('GenerarPdf', ['class' => 'btn btn-primary']) ?>
        
        </div>

    <?php ActiveForm::end(); ?>

</div>
 <h1><?php if( \yii\helpers\ArrayHelper::keyExists("pdf", $datos )){ echo Html::encode($datos['pdf']); }?></h1>
  <h1><?php if( \yii\helpers\ArrayHelper::keyExists("descarga", $datos )){ echo Html::decode('<a href="'.$datos['descarga'].'">DESCARGAR </a> '); }?></h1>
