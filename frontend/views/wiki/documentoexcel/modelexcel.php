<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/
//use common\documents\genExcel;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorParametro */

$this->title = 'Generar Excel';
$this->params['breadcrumbs'][] = ['label' => 'Generar Excel', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
//$generacion = new genExcel();
?>
<div class="cor-parametro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

     <br> 

    <?= Html::dropDownList('tabla',null,array('rol'=>'ROL','tipoacceso'=>'TIPO ACCESO','join'=>'JOIN CANTONES PROVINCIA')) ?>
    <br> 
   
    <br> 
    <label for="destino">Destino</label>
    <br> 

    <?= Html::dropDownList('destino',null,array(common\general\documents\genExcel::DESTINO_DESCARGA=>'DESCARGA', common\general\documents\genExcel::DESTINO_ARCHIVO =>'ARCHIVO'),['onchange'=>'if(this.value=="F"){document.getElementById("direccion").innerHTML="frontend\\\\web\\\\documentos\\\\excel\\\\ ";}else{document.getElementById("direccion").innerHTML="";}'] ) ?>
    <br> 
    <br> 
    <label for="nombre">Nombre Archivo</label>
    <br> 
    <span id="direccion"></span> <?= Html::input('text', 'nombre', 'Archivo.xlsx') ?>
    <br> 
    <br> 
        <div class="form-group">
            <?= Html::submitButton('Generar Excel Model', ['class' => 'btn btn-primary']) ?>
        
        </div>

    <?php ActiveForm::end(); ?>

</div>
 <h1><?php if( \yii\helpers\ArrayHelper::keyExists("descarga", $datos )){ echo Html::decode('<a href="'.$datos['descarga'].'">DESCARGAR</a>'); }?></h1>