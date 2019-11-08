<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdCapitulo */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-capitulo-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_capitulo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Capitulo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Capitulo'        
                                         ]) ?>

    <?= $form->field($model, 'nom_capitulo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Capitulo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Capitulo'        
                                         ]) ?>

    <?= $form->field($model, 'orden')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Orden',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Orden'        
                                         ]) ?>

    <?= $form->field($model, 'url')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Url',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Url'        
                                         ]) ?>

    <?= $form->field($model, 'consulta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Consulta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Consulta'        
                                         ]) ?>

    <?= $form->field($model, 'id_tview_cap')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdTipoViewCap::find()->all(),'id_tview_cap','id_tview_cap'),['prompt'=>'Indique el valor para id_tview_cap']) ?>

    <?= $form->field($model, 'id_tcapitulo')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdTipoCapitulo::find()->all(),'id_tcapitulo','id_tcapitulo'),['prompt'=>'Indique el valor para id_tcapitulo']) ?>

    <?= $form->field($model, 'icono')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Icono',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Icono'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\poc\FdConjuntoPregunta::find()->all(),'id_conjunto_pregunta','id_conjunto_pregunta'),['prompt'=>'Indique el valor para id_conjunto_pregunta']) ?>

    <?= $form->field($model, 'id_comando')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\TrComando::find()->all(),'id_comando','id_comando'),['prompt'=>'Indique el valor para id_comando']) ?>

    <?= $form->field($model, 'num_columnas')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Columnas',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Columnas'        
                                         ]) ?>

    <?= $form->field($model, 'stylecss')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Stylecss',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Stylecss'        
                                         ]) ?>

    <?= $form->field($model, 'numeracion')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Numeracion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Numeracion'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
