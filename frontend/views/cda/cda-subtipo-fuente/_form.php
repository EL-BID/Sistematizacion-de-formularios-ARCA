<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaSubtipoFuente */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-subtipo-fuente-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_subtfuente')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Subtfuente',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Subtfuente'        
                                         ]) ?>

    <?= $form->field($model, 'nom_subtfuente')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Subtfuente',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Subtfuente'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
