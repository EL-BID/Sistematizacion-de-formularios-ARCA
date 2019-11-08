<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdSeccion */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-seccion-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_seccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Seccion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Seccion'        
                                         ]) ?>

    <?= $form->field($model, 'nom_seccion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Seccion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Seccion'        
                                         ]) ?>

    <?= $form->field($model, 'orden')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Orden',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Orden'        
                                         ]) ?>

    <?= $form->field($model, 'id_capitulo')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdCapitulo::find()->all(),'id_capitulo','id_capitulo'),['prompt'=>'Indique el valor para id_capitulo']) ?>

    <?= $form->field($model, 'num_columnas')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Columnas',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Columnas'        
                                         ]) ?>

    <?= $form->field($model, 'num_col')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Col',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Col'        
                                         ]) ?>

    <?= $form->field($model, 'stylecss')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Stylecss',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Stylecss'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
