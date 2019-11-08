<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdClasificacion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-clasificacion-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_clasificacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Clasificacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Clasificacion'        
                                         ]) ?>

    <?= $form->field($model, 'nom_clasificacion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Clasificacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Clasificacion'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
