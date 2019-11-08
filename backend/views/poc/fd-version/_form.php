<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdVersion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-version-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_version')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Version',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Version'        
                                         ]) ?>

    <?= $form->field($model, 'desc_version')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Desc Version',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Desc Version'        
                                         ]) ?>

    <?= $form->field($model, 'num_version')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Version',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Version'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
