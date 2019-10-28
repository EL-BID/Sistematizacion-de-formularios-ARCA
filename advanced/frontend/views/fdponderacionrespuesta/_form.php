<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPonderacionRespuesta */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-ponderacion-respuesta-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_tpondera')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Tpondera',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Tpondera'        
                                         ]) ?>

    <?= $form->field($model, 'descripcion_ponderacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Descripcion Ponderacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Descripcion Ponderacion'        
                                         ]) ?>

    <?= $form->field($model, 'valor')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Valor',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Valor'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
