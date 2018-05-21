<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cargaquipux\PsArchivoCargue */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-archivo-cargue-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_archivo_cargue')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Archivo Cargue',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Archivo Cargue'        
                                         ]) ?>

    <?= $form->field($model, 'nom_archivo_cargue')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Archivo Cargue',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Archivo Cargue'        
                                         ]) ?>

    <?= $form->field($model, 'nom_tabla_cargue')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Tabla Cargue',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Tabla Cargue'        
                                         ]) ?>

    <?= $form->field($model, 'fila_inicio')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Fila Inicio',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Fila Inicio'        
                                         ]) ?>

    <?= $form->field($model, 'estado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Estado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Estado'        
                                         ]) ?>

    <?= $form->field($model, 'id_tarea_programada')->dropDownList(\yii\helpers\ArrayHelper::map(tar_tarea_programada::find()->all(),'id_tarea_programada','id_tarea_programada'),['prompt'=>'Indique el valor para id_tarea_programada']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
