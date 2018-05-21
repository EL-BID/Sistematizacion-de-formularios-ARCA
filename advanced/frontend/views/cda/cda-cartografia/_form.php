<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaCartografia */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-cartografia-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_cartografia')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Cartografia',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Cartografia'        
                                         ]) ?>

    <?= $form->field($model, 'nom_cartografia')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Cartografia',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Cartografia'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
