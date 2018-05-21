<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPreguntaDescendiente */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-pregunta-descendiente-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_pregunta_padre')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Pregunta Padre',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Pregunta Padre'        
                                         ]) ?>

    <?= $form->field($model, 'id_pregunta_descendiente')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Pregunta Descendiente',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Pregunta Descendiente'        
                                         ]) ?>

    <?= $form->field($model, 'id_version_descendiente')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Version Descendiente',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Version Descendiente'        
                                         ]) ?>

    <?= $form->field($model, 'id_version_padre')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Version Padre',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Version Padre'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
