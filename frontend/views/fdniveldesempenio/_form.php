<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdNivelDesempenio */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-nivel-desempenio-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_nivel')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Nivel',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Nivel'        
                                         ]) ?>

    <?= $form->field($model, 'intervalo_inicio')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Intervalo Inicio',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Intervalo Inicio'        
                                         ]) ?>

    <?= $form->field($model, 'intervalo_fin')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Intervalo Fin',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Intervalo Fin'        
                                         ]) ?>

    <?= $form->field($model, 'nivel_desempenio')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nivel Desempenio',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nivel Desempenio'        
                                         ]) ?>

    <?= $form->field($model, 'descripcion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Descripcion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Descripcion'        
                                         ]) ?>

    <?= $form->field($model, 'semaforizacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Semaforizacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Semaforizacion'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
