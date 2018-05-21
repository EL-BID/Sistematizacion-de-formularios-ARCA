<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoPregunta */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-tipo-pregunta-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_tpregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Tpregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Tpregunta'        
                                         ]) ?>

    <?= $form->field($model, 'nom_tpregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Tpregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Tpregunta'        
                                         ]) ?>

    <?= $form->field($model, 'pantalla_lectura')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Pantalla Lectura',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Pantalla Lectura'        
                                         ]) ?>

    <?= $form->field($model, 'url_subpantalla')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Url Subpantalla',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Url Subpantalla'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
