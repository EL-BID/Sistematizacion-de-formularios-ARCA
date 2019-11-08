<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaUsoSolicitado */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-uso-solicitado-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_uso_solicitado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Uso Solicitado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Uso Solicitado'        
                                         ]) ?>

    <?= $form->field($model, 'nom_uso_solicitado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Uso Solicitado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Uso Solicitado'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
