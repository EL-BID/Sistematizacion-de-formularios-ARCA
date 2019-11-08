<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdCaudalAguaPublicos */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this);

$pregunta =$_GET['id_prta'];
$val_cod ="";
if($pregunta=="2131")$val_cod="VCsup";
elseif($pregunta=="2132")$val_cod="VCsub";
elseif($pregunta=="2194")$val_cod="VAlc";
elseif($pregunta=="2199")$val_cod="VIP";
elseif($pregunta=="2202")$val_cod="VTPP";
elseif($pregunta=="2299")$val_cod="VTD";
elseif($pregunta=="2413")$val_cod="NAFQR";
elseif($pregunta=="2414")$val_cod="NAFQC";
elseif($pregunta=="2417")$val_cod="NAMR";
elseif($pregunta=="2418")$val_cod="NAMC";
elseif($pregunta=="2421")$val_cod="NACR";
elseif($pregunta=="2422")$val_cod="NACC";
elseif($pregunta=="2486")$val_cod="VIAR";
elseif($pregunta=="2489")$val_cod="VSAR";
elseif($pregunta=="2588")$val_cod="NACR1";
elseif($pregunta=="2589")$val_cod="NACC1";
elseif($pregunta=="2612")$val_cod="VFM";
elseif($pregunta=="2614")$val_cod="VFE";
elseif($pregunta=="2616")$val_cod="VNF";
elseif($pregunta=="2617")$val_cod="VVT";
elseif($pregunta=="2618")$val_cod="FAP";
elseif($pregunta=="2619")$val_cod="REF";
elseif($pregunta=="2623")$val_cod="VAlp";
elseif($pregunta=="2627")$val_cod="VFOP";

?>

<div class="fd-caudal-agua-publicos-form">
        <?php
    $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
                ]
            ]);
    ?>

    <table class="tbcapitulo" width="100%" style="table-layout:auto">
        <tr>
            <td class="nomcapitulo" colspan="13"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpreguntacaudal">Código</td>                   
            <td class="labelpreguntacaudal" >Ene.</td> 
            <td class="labelpreguntacaudal" >Feb.</td>            
            <td class="labelpreguntacaudal" >Mar.</td>            
            <td class="labelpreguntacaudal" >Abr.</td>            
            <td class="labelpreguntacaudal" >May.</td>            
            <td class="labelpreguntacaudal" >Jun.</td>            
            <td class="labelpreguntacaudal" >Jul.</td>            
            <td class="labelpreguntacaudal" >Ago.</td>            
            <td class="labelpreguntacaudal" >Sep.</td>            
            <td class="labelpreguntacaudal" >Oct.</td>            
            <td class="labelpreguntacaudal" >Nov.</td>            
            <td class="labelpreguntacaudal" >Dic.</td>            
        </tr>
        <tr>
            <td class="inputpreguntacaudal"><?= $form->field($model, 'codigo')->textInput(['maxlength' => 10,'value'=>$val_cod,'readonly'=>'true'])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'enero')->textInput(['maxlength' => 10])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'febrero')->textInput(['maxlength' => 10])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'marzo')->textInput(['maxlength' => 10])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'abril')->textInput(['maxlength' => 10])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'mayo')->textInput(['maxlength' => 10])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'junio')->textInput(['maxlength' => 10])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'julio')->textInput(['maxlength' => 10])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'agosto')->textInput(['maxlength' => 10])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'septiembre')->textInput(['maxlength' => 10])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'octubre')->textInput(['maxlength' => 10])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'noviembre')->textInput(['maxlength' => 10])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'diciembre')->textInput(['maxlength' => 10])->label(false); ?></td>
        </tr>
        

    </table>    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>    

    <?php ActiveForm::end(); ?>

</div>
