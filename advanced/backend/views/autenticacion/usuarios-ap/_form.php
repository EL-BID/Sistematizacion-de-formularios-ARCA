<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\autenticacion\UsuariosAp */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="usuarios-ap-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_usuario')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Usuario',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Usuario'        
                                         ]) ?>

    <?= $form->field($model, 'usuario')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Usuario',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Usuario'        
                                         ]) ?>

    <?= $form->field($model, 'clave')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Clave',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Clave'        
                                         ]) ?>

    <?= $form->field($model, 'login')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Login',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Login'        
                                         ]) ?>

    <?= $form->field($model, 'tipo_usuario')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Tipo Usuario',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Tipo Usuario'        
                                         ]) ?>

    <?= $form->field($model, 'estado_usuario')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Estado Usuario',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Estado Usuario'        
                                         ]) ?>

    <?= $form->field($model, 'identificacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Identificacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Identificacion'        
                                         ]) ?>

    <?= $form->field($model, 'nombres')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nombres',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nombres'        
                                         ]) ?>

    <?= $form->field($model, 'usuario_digitador')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Usuario Digitador',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Usuario Digitador'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_digitacion')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'email')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Email',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Email'        
                                         ]) ?>

    <?= $form->field($model, 'auth_key')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Auth Key',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Auth Key'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
