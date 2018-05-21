<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\CdaSolicitudInformacion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-solicitud-informacion-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'crear-form'
					]
                ]); ?>

    <?php /*$form->field($model, 'id_solicitud_info')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Solicitud Info',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Solicitud Info'        
                                         ]) */?>

    <?= $form->field($model, 'id_tinfo_faltante')->dropDownList(\yii\helpers\ArrayHelper::map($listinfofaltante,'id_tinfo_faltante','nom_tinfo_faltante'),['prompt'=>'Indique el valor para id_tinfo_faltante']) ?>

    <?= $form->field($model, 'id_treporte')->dropDownList(\yii\helpers\ArrayHelper::map($listtiporeporte,'id_treporte','nom_treporte'),['prompt'=>'Indique el valor para id_treporte']) ?>

    <?php //$form->field($model, 'id_cactividad_proceso')->dropDownList(\yii\helpers\ArrayHelper::map(ps_cactividad_proceso::find()->all(),'id_cactividad_proceso','id_cactividad_proceso'),['prompt'=>'Indique el valor para id_cactividad_proceso']) ?>

    <?= $form->field($model, 'id_tatencion')->dropDownList(\yii\helpers\ArrayHelper::map($listtipoatencion,'id_tatencion','nom_tatencion'),['prompt'=>'Indique el valor para id_tatencion']) ?>

    <?= $form->field($model, 'observaciones')->textarea([
                                        'maxlength' => true,
                                        'title' => 'Indique Observaciones',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observaciones'        
                                         ]) ?>

    <?= $form->field($model, 'oficio_atencion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Oficio Atencion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Oficio Atencion'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_atencion')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?php  //$form->field($model, 'id_cda')->dropDownList(\yii\helpers\ArrayHelper::map(cda::find()->all(),'id_cda','id_cda'),['prompt'=>'Indique el valor para id_cda']) ?>

    <?= (!empty($clase) && $clase==TRUE)? $form->field($model, 'id_trespuesta')->dropDownList(\yii\helpers\ArrayHelper::map($listtipoatencion,'id_tatencion','nom_tatencion'),['prompt'=>'Indique el valor para el tipo de respuesta']):'' ?>

   
    <?php /*$form->field($model, 'observaciones_res')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Observaciones Res',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Observaciones Res'        
                                         ])*/ ?>

    <?= (!empty($clase) && $clase==TRUE)? $form->field($model, 'oficio_respuesta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Oficio Respuesta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Oficio Respuesta'        
                                         ]):'' ?>

    <?= (!empty($clase) && $clase==TRUE)? $form->field($model, 'fecha_respuesta')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]):'' ?>

    <?php /*$form->field($model, 'id_cactividad_proceso_res')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Cactividad Proceso Res',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Cactividad Proceso Res'        
                                         ])*/ ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
