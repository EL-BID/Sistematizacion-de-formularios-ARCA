<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaTramite */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-tramite-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>



    <?= $form->field($model, 'num_tramite')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Número de Trámite',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Número de Trámite'        
                                         ]) ?>

    <?= $form->field($model, 'cod_solicitud_tecnico')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Código de Solicitud',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Código de la Solicitud',
                                        'readonly'=>true,
                                         ]) ?>

    <?= $form->field($model, 'id_usuario')->dropDownList(\yii\helpers\ArrayHelper::map($listusuario,'id_usuario','nombres'),['prompt'=>'Seleccione el técnico']) ?>

    <?php //$form->field($model, 'fecha_solicitud')->
//             widget(\yii\jui\DatePicker::className(),[
//                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
//                'clientOptions' => [
//                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
//                    'changeYear' => true,            //Permitir cambio de año
//                    'changeMonth' => true]            //Permitir cambio de Mes
//            ]) ?>
    
     <?= $form->field($model, 'observacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Observacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observacion'        
                                         ]) ?>
    
    <?= $form->field($model, 'devolver')->checkbox(); ?>

    <?php //$form->field($model, 'puntos_solicitados')->textInput([
//                                        'maxlength' => true,
//                                        'title' => 'Indique Puntos Solicitados',
//                                        'data-toggle' => 'tooltip',
//                                        'placeholder'=>'Indique Puntos Solicitados'        
//                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
