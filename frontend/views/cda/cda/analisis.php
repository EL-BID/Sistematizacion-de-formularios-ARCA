<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\Cda */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-create">
    
    <?php
    if(empty($ajax)){
    ?>
    <div class="headSection"><h1 class="titSection"><?= Html::encode('Analizar la Información y asignar la solicitud de CDA') ?></h1></div>
    
    <div class="aplicativo table-responsive">
        <div class="cda-form">
        
         <!----------------------------------Boton de Regresar---------------------------->
        <?php echo Html::button("Regresar",
                ['class'=>'btn btn-default btn-xs',
                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cda/detalleproceso/index','id_cda'=>$id_cda]) . "';",
                    'data-toggle'=>'Regresar'
                ]
            ); 
    }
    ?>
     
     <!----------------------------------Encabezado------------------------------------>
        <table class="table table-bordered">
            <tr>
                <td class="datosbasicos1"> Numero CDA </td>
                <td class="datosbasicos2">
                    <table width="100%">
                        <tr>
                            <td width="50%"><?= $encabezado[0]['numero']; ?></td>
                        </tr>
                    </table>
                </td>
                <td class="datosbasicos1"> Fecha Ingreso </td>
                <td class="datosbasicos2"><?= $encabezado[0]['fecha_ingreso'];  ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Numero de Quipux Arca </td>
                <td class="datosbasicos2"><?= $encabezado[0]['arca']; ?></td>
                <td class="datosbasicos1"> Enviado por: </td>
                <td class="datosbasicos2"><?= $encabezado[0]['enviadopor']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Numero de Quipux Senagua </td>
                <td class="datosbasicos2"><?= $encabezado[0]['senagua']; ?></td>
                <td class="datosbasicos1"> En calidad de: </td>
                <td class="datosbasicos2"><?= $encabezado[0]['encalidade']; ?></td>
            </tr>
            
            <tr>
                <td class="datosbasicos1"> Responsable </td>
                <td class="datosbasicos2"><?= $encabezado[0]['usuario_accion']; ?></td>
                <td class="datosbasicos1"> Fecha de Solicitud </td>
                <td class="datosbasicos2"><?= $encabezado[0]['fecha_solicitud']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Fecha Ultima Actividad </td>
                <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_actividad']; ?></td>
                <td class="datosbasicos1"> Fecha Ultimo Estado </td>
                <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_estado']; ?></td>
            </tr>
        </table>        

        
            <?php $form = ActiveForm::begin(['options' => [
                            'id' => 'crear-form'
                                                ]
                        ]); ?>


             <?= $form->field($model, 'puntos_solicitados')->textInput([
                                                'maxlength' => true,
                                                'title' => 'Puntos Solicitados',
                                                'data-toggle' => 'tooltip',
                                                'placeholder'=>'Puntos Solicitados'        
                                                 ]) ?>

             <?= $form->field($model, 'codigo_solicitud_tecnico')->textInput([
                                                'maxlength' => true,
                                                'title' => 'Codigo Solicitud',
                                                'data-toggle' => 'tooltip',
                                                'placeholder'=>'Codigo Solicitud',
                                                'disabled' => !$_editararca    
                                                 ]) ?>


            <div class="form-group">
                <?php if($_editararca == TRUE){
                         echo Html::submitButton('Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
                }?>
                
            </div>

            <?php ActiveForm::end(); ?>
        </div>     
    </div>
</div>
 
    
