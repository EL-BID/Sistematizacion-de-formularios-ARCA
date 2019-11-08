<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsEstadoProceso */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="ps-estado-proceso-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_eproceso')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Eproceso',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Eproceso'        
                                         ]) ?>

    <?= $form->field($model, 'nom_eproceso')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Eproceso',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Eproceso'        
                                         ]) ?>

    <?= $form->field($model, 'id_proceso')->dropDownList(\yii\helpers\ArrayHelper::map(ps_proceso::find()->all(),'id_proceso','id_proceso'),['prompt'=>'Indique el valor para id_proceso']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
