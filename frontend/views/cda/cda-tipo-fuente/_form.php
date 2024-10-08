<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaTipoFuente */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-tipo-fuente-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_tfuente')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Tfuente',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Tfuente'        
                                         ]) ?>

    <?= $form->field($model, 'nom_tfuente')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Tfuente',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Tfuente'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
