   

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

<div class="cda-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'crear-form'
					]
                ]); ?>
    
   
     <?= $form->field($modelpscproceso['model2'], '[model2]numero')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Numero CDA',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Numero CDA'        
                                         ]) ?>
    
     <?= $form->field($modelpscproceso['model2'], '[model2]num_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Numero Quipux Arca',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Numero Quipux Arca',
                                        'disabled' => $_editararca    
                                         ]) ?>
    
    <?= $form->field($modelpscproceso['model3'], '[model3]num_quipux')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Numero Quipux Senagua',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Numero Quipux Senagua',
                                        'disabled' => $_editarsenagua 
                                         ]) ?>
    
     <?= $form->field($model, 'tramite_administrativo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique tramite_administrativo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique tramite_administrativo'        
                                         ]) ?>
    
    
    <?php /*$form->field($model, 'tipodeproceso')->dropDownList([ '1' => 'SEAGUA', '2' => 'ARCA', ], 
            ['prompt' => '','title'=>'Seleccione un tipo de Proceso','data-toggle' => 'tooltip','data-trigger' => 'focus',
                'onchange'=>'changevalidate()']) */ ?>
    
    

    <?= $form->field($model, 'fecha_ingreso')->
             widget(DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($modelpscproceso['model2'], '[model2]fecha_solicitud')->
             widget(DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

   
     <?= $form->field($model, 'numero_tramites')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Numero de Tramites',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Numero de Tramites'        
                                         ]) ?>

    <?php /*$form->field($model, 'id_cproceso_arca')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_cproceso_arca',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_cproceso_arca'        
                                         ])*/ ?>

    <?php /*$form->field($model, 'id_cproceso_senagua')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_cproceso_senagua',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_cproceso_senagua'        
                                         ])*/ ?>
    
    <?= $form->field($model, 'rol_en_calidad')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\autenticacion\Rol::find()->all(),
                                            'cod_rol','nombre_rol'),
                                            ['prompt'=>'Rol Calidad']); ?>
    
   

    <?php /*$form->field($model, 'id_cda')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique id_cda',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique id_cda'        
                                         ])*/ ?>
    
    <?= $form->field($model, 'id_usuario_enviado_por')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(common\models\autenticacion\UsuariosAp::find()->all(),
                                            'id_usuario','nombres'),
                                            ['prompt'=>'Usuario Enviado']); ?>
    
    
   

    <div class="form-group">
        <?php
            if($model->isNewRecord == TRUE){
               echo  Html::submitButton('Crear' , ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
            }else{
                if($boleanbotton == TRUE){
                  echo   Html::submitButton('Update' , ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
                }
                
            }
        ?>
     </div>

    <?php ActiveForm::end(); ?>

</div>
