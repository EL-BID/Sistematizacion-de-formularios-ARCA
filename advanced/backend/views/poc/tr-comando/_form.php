<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\TrComando */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="tr-comando-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_comando')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Comando',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Comando'        
                                         ]) ?>

    <?= $form->field($model, 'nom_comando')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Comando',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Comando'        
                                         ]) ?>

    <?= $form->field($model, 'clase_comando')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Clase Comando',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Clase Comando'        
                                         ]) ?>

    <?= $form->field($model, 'hash_comando')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Hash Comando',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Hash Comando'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
