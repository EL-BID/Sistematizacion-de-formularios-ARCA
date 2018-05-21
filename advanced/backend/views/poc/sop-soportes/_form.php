<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\SopSoportes */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="sop-soportes-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_soportes')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Soportes',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Soportes'        
                                         ]) ?>

    <?= $form->field($model, 'ruta_soporte')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ruta Soporte',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ruta Soporte'        
                                         ]) ?>

    <?= $form->field($model, 'titulo_soporte')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Titulo Soporte',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Titulo Soporte'        
                                         ]) ?>

    <?= $form->field($model, 'palabras_clave')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Palabras Clave',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Palabras Clave'        
                                         ]) ?>

    <?= $form->field($model, 'descripcion')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
              ]) ?>

    <?= $form->field($model, 'fuente_soporte')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Fuente Soporte',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Fuente Soporte'        
                                         ]) ?>

    <?= $form->field($model, 'autor_soporte')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Autor Soporte',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Autor Soporte'        
                                         ]) ?>

    <?= $form->field($model, 'idioma_soporte')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Idioma Soporte',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Idioma Soporte'        
                                         ]) ?>

    <?= $form->field($model, 'formato_soportes')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Formato Soportes',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Formato Soportes'        
                                         ]) ?>

    <?= $form->field($model, 'tamanio_soportes')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Tamanio Soportes',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Tamanio Soportes'        
                                         ]) ?>

    <?= $form->field($model, 'id_respuesta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdRespuesta::find()->all(),'id_respuesta','id_respuesta'),['prompt'=>'Indique el valor para id_respuesta']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
