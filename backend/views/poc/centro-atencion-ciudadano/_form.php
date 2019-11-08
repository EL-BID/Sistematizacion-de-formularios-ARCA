<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\CentroAtencionCiudadano */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="centro-atencion-ciudadano-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'cod_centro_atencion_ciudadano')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Cod Centro Atencion Ciudadano',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Cod Centro Atencion Ciudadano'        
                                         ]) ?>

    <?= $form->field($model, 'nom_centro_atencion_ciudadano')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Centro Atencion Ciudadano',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Centro Atencion Ciudadano'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
