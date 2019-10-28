<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaDestino */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-destino-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_destino')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Destino',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Destino'        
                                         ]) ?>

    <?= $form->field($model, 'nom_destino')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Destino',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Destino'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
