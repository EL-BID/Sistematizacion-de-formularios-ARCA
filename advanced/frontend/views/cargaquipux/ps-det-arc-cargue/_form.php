<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cargaquipux\PsDetArcCargue */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-det-arc-cargue-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_archivo_cargue')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\cargaquipux\PsArchivoCargue::find()->all(),'id_archivo_cargue','id_archivo_cargue'),['prompt'=>'Indique el valor para id_archivo_cargue']) ?>

    <?= $form->field($model, 'id_det_arc_cargue')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Det Arc Cargue',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Det Arc Cargue'        
                                         ]) ?>

    <?= $form->field($model, 'num_nom_hoja')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Nom Hoja',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Nom Hoja'        
                                         ]) ?>

    <?= $form->field($model, 'num_columna_excel')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Columna Excel',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Columna Excel'        
                                         ]) ?>

    <?= $form->field($model, 'nom_columna_cargue')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Columna Cargue',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Columna Cargue'        
                                         ]) ?>

    <?= $form->field($model, 'nom_columna_excel')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Columna Excel',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Columna Excel'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
