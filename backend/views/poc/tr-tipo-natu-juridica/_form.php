<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\TrTipoNatuJuridica */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="tr-tipo-natu-juridica-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_natu_juridica')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Natu Juridica',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Natu Juridica'        
                                         ]) ?>

    <?= $form->field($model, 'nom_natu_juridica')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Natu Juridica',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Natu Juridica'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
