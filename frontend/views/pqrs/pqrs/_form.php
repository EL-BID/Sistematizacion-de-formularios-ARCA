<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\pqrs\Pqrs */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="pqrs-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_pqrs')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Pqrs',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Pqrs'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_recepcion')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'num_consecutivo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Consecutivo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Consecutivo'        
                                         ]) ?>

    <?= $form->field($model, 'sol_nombres')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Nombres',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sol Nombres'        
                                         ]) ?>

    <?= $form->field($model, 'sol_doc_identificacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Doc Identificacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sol Doc Identificacion'        
                                         ]) ?>

    <?= $form->field($model, 'sol_direccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Direccion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sol Direccion'        
                                         ]) ?>

    <?= $form->field($model, 'sol_email')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Email',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sol Email'        
                                         ]) ?>

    <?= $form->field($model, 'sol_telefono')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Telefono',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sol Telefono'        
                                         ]) ?>

    <?= $form->field($model, 'en_nom_nombres')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique En Nom Nombres',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique En Nom Nombres'        
                                         ]) ?>

    <?= $form->field($model, 'en_nom_ruc')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique En Nom Ruc',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique En Nom Ruc'        
                                         ]) ?>

    <?= $form->field($model, 'en_nom_direccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique En Nom Direccion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique En Nom Direccion'        
                                         ]) ?>

    <?= $form->field($model, 'en_nom_email')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique En Nom Email',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique En Nom Email'        
                                         ]) ?>

    <?= $form->field($model, 'en_nom_telefono')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique En Nom Telefono',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique En Nom Telefono'        
                                         ]) ?>

    <?= $form->field($model, 'aquien_dirige')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Aquien Dirige',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Aquien Dirige'        
                                         ]) ?>

    <?= $form->field($model, 'objeto_peticion')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
              ]) ?>

    <?= $form->field($model, 'descripcion_peticion')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
              ]) ?>

    <?= $form->field($model, 'subtipo_queja')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Subtipo Queja',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Subtipo Queja'        
                                         ]) ?>

    <?= $form->field($model, 'subtipo_reclamo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Subtipo Reclamo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Subtipo Reclamo'        
                                         ]) ?>

    <?= $form->field($model, 'subtipo_controversia')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Subtipo Controversia',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Subtipo Controversia'        
                                         ]) ?>

    <?= $form->field($model, 'por_quien_qrc')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Por Quien Qrc',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Por Quien Qrc'        
                                         ]) ?>

    <?= $form->field($model, 'lugar_hechos')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Lugar Hechos',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Lugar Hechos'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_hechos')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => Yii::$app->fmtfechasql,        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'naracion_hechos')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
              ]) ?>

    <?= $form->field($model, 'elementos_probatorios')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
              ]) ?>

    <?= $form->field($model, 'denunc_nombre')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Denunc Nombre',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Denunc Nombre'        
                                         ]) ?>

    <?= $form->field($model, 'denunc_direccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Denunc Direccion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Denunc Direccion'        
                                         ]) ?>

    <?= $form->field($model, 'denunc_telefono')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Denunc Telefono',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Denunc Telefono'        
                                         ]) ?>

    <?= $form->field($model, 'subtipo_sugerencia')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Subtipo Sugerencia',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Subtipo Sugerencia'        
                                         ]) ?>

    <?= $form->field($model, 'subtipo_felicitacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Subtipo Felicitacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Subtipo Felicitacion'        
                                         ]) ?>

    <?= $form->field($model, 'descripcion_sugerencia')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
              ]) ?>

    <?= $form->field($model, 'sol_cod_provincia')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Cod Provincia',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sol Cod Provincia'        
                                         ]) ?>

    <?= $form->field($model, 'sol_cod_canton')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Sol Cod Canton',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Sol Cod Canton'        
                                         ]) ?>

    <?= $form->field($model, 'en_nom_cod_provincia')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique En Nom Cod Provincia',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique En Nom Cod Provincia'        
                                         ]) ?>

    <?= $form->field($model, 'en_nom_cod_canton')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique En Nom Cod Canton',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique En Nom Cod Canton'        
                                         ]) ?>

    <?= $form->field($model, 'id_cproceso')->dropDownList(\yii\helpers\ArrayHelper::map(PsCproceso::find()->all(),'id_cproceso','id_cproceso'),['prompt'=>'Indique el valor para id_cproceso']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
