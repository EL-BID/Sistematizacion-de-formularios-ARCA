<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/

/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaPuntosCertificados */
/* @var $form yii\widgets\ActiveForm */

SweetSubmitAsset::register($this);
?>

<div class="cda-puntos-certificados-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form',
                    ],
                ]); ?>


    <?= $form->field($model, 'puntos_solicitados_tramite')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Puntos Solicitados Tramite',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Puntos Solicitados Tramite',
                                         ]); ?>

    <?= $form->field($model, 'puntos_visita_tecnica')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Puntos Visita Tecnica',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Puntos Visita Tecnica',
                                         ]); ?>

    <?= $form->field($model, 'puntos_verificados_senagua')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Puntos Verificados Senagua',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Puntos Verificados Senagua',
                                         ]); ?>

    <?= $form->field($model, 'puntos_certificados')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Puntos Certificados',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Puntos Certificados',
                                         ]); ?>

    <?= $form->field($model, 'puntos_devueltos')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Puntos Devueltos',
                                        'data-toggle' => 'tooltip',
                                        'placeholder' => 'Indique Puntos Devueltos',
                                         ]); ?>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
