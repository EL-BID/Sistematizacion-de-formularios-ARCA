<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPregunta */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="fd-pregunta-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

    <?= $form->field($model, 'id_pregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Id Pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Id Pregunta'        
                                         ]) ?>

    <?= $form->field($model, 'nom_pregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Nom Pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Nom Pregunta'        
                                         ]) ?>

    <?= $form->field($model, 'ayuda_pregunta')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Ayuda Pregunta',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Ayuda Pregunta'        
                                         ]) ?>

    <?= $form->field($model, 'obligatorio')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Obligatorio',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Obligatorio'        
                                         ]) ?>

    <?= $form->field($model, 'max_largo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Max Largo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Max Largo'        
                                         ]) ?>

    <?= $form->field($model, 'min_largo')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Min Largo',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Min Largo'        
                                         ]) ?>

    <?= $form->field($model, 'max_date')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'min_date')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'orden')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Orden',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Orden'        
                                         ]) ?>

    <?= $form->field($model, 'estado')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Estado',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Estado'        
                                         ]) ?>

    <?= $form->field($model, 'ini_fecha')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'fin_fecha')->
             widget(\yii\jui\DatePicker::className(),[
                'dateFormat' => 'dd/MM/yyyy',        //Formato de la fecha
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'id_tpregunta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdTipoPregunta::find()->all(),'id_tpregunta','nom_tpregunta'),['prompt'=>'Indique el valor para id_tpregunta']) ?>

    <?= $form->field($model, 'id_capitulo')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_capitulo','id_capitulo'),['prompt'=>'Indique el valor para id_capitulo']) ?>

    <?= $form->field($model, 'id_seccion')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_seccion','id_seccion'),['prompt'=>'Indique el valor para id_seccion']) ?>

    <?= $form->field($model, 'id_agrupacion')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_agrupacion','id_agrupacion'),['prompt'=>'Indique el valor para id_agrupacion']) ?>

    <?= $form->field($model, 'id_tselect')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_tselect','id_tselect'),['prompt'=>'Indique el valor para id_tselect']) ?>

    <?= $form->field($model, 'caracteristica_preg')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Caracteristica Preg',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Caracteristica Preg'        
                                         ]) ?>

    <?= $form->field($model, 'id_conjunto_pregunta')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\poc\FdPregunta::find()->all(),'id_conjunto_pregunta','id_conjunto_pregunta'),['prompt'=>'Indique el valor para id_conjunto_pregunta']) ?>

    <?= $form->field($model, 'visible')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Visible',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Visible'        
                                         ]) ?>

    <?= $form->field($model, 'visible_desc_preg')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Visible Desc Preg',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Visible Desc Preg'        
                                         ]) ?>

    <?= $form->field($model, 'num_col_label')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Col Label',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Col Label'        
                                         ]) ?>

    <?= $form->field($model, 'num_col_input')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Num Col Input',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Num Col Input'        
                                         ]) ?>

    <?= $form->field($model, 'stylecss')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Stylecss',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Stylecss'        
                                         ]) ?>

    <?= $form->field($model, 'format')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Format',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Format'        
                                         ]) ?>

    <?= $form->field($model, 'min_number')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Min Number',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Min Number'        
                                         ]) ?>

    <?= $form->field($model, 'max_number')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Max Number',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Max Number'        
                                         ]) ?>

    <?= $form->field($model, 'atributos')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Atributos',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Atributos'        
                                         ]) ?>

    <?= $form->field($model, 'reg_exp')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'lang' => 'es',
                    'plugins' => ['clips', 'fontcolor','imagemanager']
                ]
              ])?> 

    <?= $form->field($model, 'numerada')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique Numerada',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique Numerada'        
                                         ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
