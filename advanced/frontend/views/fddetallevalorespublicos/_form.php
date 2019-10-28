<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdCaudalAguaPublicos */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this);



$array_descripcion = array(
  1=>'Gastos en personal para la producción',
  2=>'Bienes y servicios para la producción',
  3=>'Otros gastos de producción',    
  4=>'Gastos en personal para inversión',        
  5=>'Bienes y servicios para inversión',        
  6=>'Obras públicas de agua potable',
  7=>'Obras públicas del alcantarillado sanitario',    
  8=>'Obras públicas del alcantarillado pluvial',        
  9=>'Otros gastos de inversión',        
 10=>'Transferencias y donaciones para inversión',
 11=>'Amortización de la deuda pública',
 12=>'Pasivo circulante',               
 13=>'Gastos corrientes en personal',
 14=>'Bienes y servicios de consumo',
 15=>'Gastos financieros',
 16=>'Otros gastos corrientes',
 17=>'Transferencias y donaciones corrientes',    
 18=>'Previsiones para reasignación',
 19=>'Bienes de larga duración',    
 20=>'Egresos totales por prestación de servicio de agua potable',    
 21=>'Egresos totales por prestación de servicio de saneamiento',        
 22=>'Ingresos totales por prestación de servicio de agua potable',            
 23=>'Ingresos totales por prestación de servicio de saneamiento',                
);

$accion = $_GET['r'];

$posi= strpos($accion, 'update');
if($posi!=false) //es edición
{
?>
<div class="fd-detalle-valores-publicos-form">
        <?php
    $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
                ]
            ]);
    ?>

    <table class="tbcapitulo" width="100%" style="table-layout:auto" >
        <tr>
            <td class="nomcapitulo" colspan="13"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpreguntacaudal">Descripción</td>                   
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
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'descripcion')->textarea(['rows' => '4','readonly'=>'true','style'=>'WIDTH: 200px; HEIGHT: 35px; padding:0px; font-size:11px;'])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'enero')->textInput()->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'febrero')->textInput()->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'marzo')->textInput()->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'abril')->textInput()->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'mayo')->textInput()->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'junio')->textInput()->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'julio')->textInput()->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'agosto')->textInput()->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'septiembre')->textInput()->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'octubre')->textInput()->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'noviembre')->textInput()->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'diciembre')->textInput()->label(false); ?></td>
            
        </tr>      
    </table>    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>    

    <?php ActiveForm::end(); ?>

</div>
<?php
}
else
{
?>

<div class="fd-detalle-valores-publicos-form">
        <?php
    $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
                ]
            ]);
    ?>

    <table class="tbcapitulo" width="100%" style="table-layout:auto" >
        <tr>
            <td class="nomcapitulo" colspan="13"><?= $numerar.' '.$nom_prta; ?></td>
        </tr>
        <tr>
            <td class="labelpreguntacaudal">Descripción</td>                   
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
        <?php
        foreach($array_descripcion as $clave =>$valor)
        {
        ?>
        <tr>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'descripcion_'.$clave)->textarea(['rows' => '4','value'=>$valor,'readonly'=>'true','style'=>'WIDTH: 200px; HEIGHT: 35px; padding:0px; font-size:11px;'])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'enero_'.$clave)->textInput(['maxlength' => 10,'value'=>''])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'febrero_'.$clave)->textInput(['maxlength' => 10,'value'=>''])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'marzo_'.$clave)->textInput(['maxlength' => 10,'value'=>''])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'abril_'.$clave)->textInput(['maxlength' => 10,'value'=>''])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'mayo_'.$clave)->textInput(['maxlength' => 10,'value'=>''])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'junio_'.$clave)->textInput(['maxlength' => 10,'value'=>''])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'julio_'.$clave)->textInput(['maxlength' => 10,'value'=>''])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'agosto_'.$clave)->textInput(['maxlength' => 10,'value'=>''])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'septiembre_'.$clave)->textInput(['maxlength' => 10,'value'=>''])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'octubre_'.$clave)->textInput(['maxlength' => 10,'value'=>''])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'noviembre_'.$clave)->textInput(['maxlength' => 10,'value'=>''])->label(false); ?></td>
            <td class="inputpreguntacaudal" ><?= $form->field($model, 'diciembre_'.$clave)->textInput(['maxlength' => 10,'value'=>''])->label(false); ?></td>
            
        </tr>
        <?php
        }
        ?>

    </table>    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>    

    <?php ActiveForm::end(); ?>

</div>
<?php 
}
?>
