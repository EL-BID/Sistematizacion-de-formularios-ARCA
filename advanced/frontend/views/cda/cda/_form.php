<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\Cda */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'fecha_ingreso')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'fecha_solicitud')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'tramite_administrativo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Tramite Administrativo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Tramite Administrativo'        
                                         ]) ?>

    <?= $form->field($model, 'id_cproceso_arca')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Cproceso Arca',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Cproceso Arca'        
                                         ]) ?>

    <?= $form->field($model, 'id_cproceso_senagua')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Cproceso Senagua',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Cproceso Senagua'        
                                         ]) ?>

    <?= $form->field($model, 'rol_en_calidad')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Rol En Calidad',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Rol En Calidad'        
                                         ]) ?>

    <?= $form->field($model, 'numero_tramites')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Numero Tramites',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Numero Tramites'        
                                         ]) ?>

    <?= $form->field($model, 'id_cda')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Cda',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Cda'        
                                         ]) ?>

    <?= $form->field($model, 'id_usuario_enviado_por')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Usuario Enviado Por',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Usuario Enviado Por'        
                                         ]) ?>

    <?= $form->field($model, 'institucion_solicitante')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Institucion Solicitante',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Institucion Solicitante'        
                                         ]) ?>

    <?= $form->field($model, 'solicitante')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Solicitante',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Solicitante'        
                                         ]) ?>

    <?= $form->field($model, 'cod_centro_atencion_ciudadano')->dropDownList(\yii\helpers\ArrayHelper::map(centro_atencion_ciudadano::find()->all(),'cod_centro_atencion_ciudadano','cod_centro_atencion_ciudadano'),['prompt'=>'Indique el valor para cod_centro_atencion_ciudadano']) ?>

    <?= $form->field($model, 'id_demarcacion')->dropDownList(\yii\helpers\ArrayHelper::map(demarcaciones::find()->all(),'id_demarcacion','id_demarcacion'),['prompt'=>'Indique el valor para id_demarcacion']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
