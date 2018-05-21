<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoViewFormato */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-tipo-view-formato-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_tipo_view_formato')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Tipo View Formato',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Tipo View Formato'        
                                         ]) ?>

    <?= $form->field($model, 'nom_tipo_view_formato')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Tipo View Formato',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Tipo View Formato'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
