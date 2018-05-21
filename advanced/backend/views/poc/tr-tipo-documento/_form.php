<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\TrTipoDocumento */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="tr-tipo-documento-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_tdocumento')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Tdocumento',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Tdocumento'        
                                         ]) ?>

    <?= $form->field($model, 'nom_tdocumento')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Tdocumento',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Tdocumento'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
