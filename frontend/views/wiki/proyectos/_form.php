<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\jui\DatePicker;					/*Libreria para el modulo de fechas*/

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="proyectos-form">

    <?php $form = ActiveForm::begin(['options' => [
                    'id' => 'create-form'
					]
                ]); ?>

  
    <?= $form->field($model, 'nombre')->textInput([
                                        'maxlength' => true,
                                        'title' => 'Indique nombre',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'Indique nombre'        
                                         ]) ?>

    <?= $form->field($model, 'fecha_inicio')->
             widget(DatePicker::className(),[
              'dateFormat' => Yii::$app->fmtfechasql,
                'class' => 'form-control',
                'clientOptions' => [
                    'yearRange' => '-90:+0',        //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]            //Permitir cambio de Mes
            ]) ?>

    <?= $form->field($model, 'fecha_fin')->
             widget(DatePicker::className(),[
               'dateFormat' => Yii::$app->fmtfechasql,
                 'class' => 'form-control',
                'clientOptions' => [
                    'yearRange' => '-90:+0',         //Años habilitados 90 años atras hasta el actual        
                    'changeYear' => true,            //Permitir cambio de año
                    'changeMonth' => true]           //Permitir cambio de Mes
            ]) ?>
    
    <?= $form->field($model2, 'ciudad_id')->dropDownList(
           $model->getCiudadesDropdown(),
            ['class' => 'form-control', 'multiple' => true]
            ) 
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
