<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaEstacionHidrologica */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="cda-estacion-hidrologica-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_ehidrografica')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Ehidrografica',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Ehidrografica'        
                                         ]) ?>

    <?= $form->field($model, 'nom_ehidrografica')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Ehidrografica',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Ehidrografica'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
