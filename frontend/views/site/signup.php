<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

$this->title = 'Registrarse';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1>
    </div>
    <h3><?= $msg ?></h3>

    <p>Por favor llene los siguientes campos para crear el usuario:</p>
    <div class="aplicativo">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'id_usuario')->textInput(['autofocus' => true,
                                        'maxlength' => true,
                                        'title' => 'Indique id_usuario',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'id_usuario'        
                                         ]) ?>
            
                <?= $form->field($model, 'usuario')->textInput(['maxlength' => true,
                                        'title' => 'Indique usuario',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'usuario'   ]) ?>

                <?= $form->field($model, 'clave')->passwordInput(['maxlength' => true,
                                        'title' => 'Indique clave',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'clave'   ]) ?>
            
                <?= $form->field($model, 'login')->passwordInput(['maxlength' => true,
                                        'title' => 'Indique clave',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'clave'   ]) ?>
            
                <?= $form->field($model, 'tipo_usuario')->dropDownList(["a"=>"Tipo A"])  ?>
            
                <?= $form->field($model, 'estado_usuario')->hiddenInput()->label(false) ?>
            
                <?= $form->field($model, 'identificacion')->textInput(['maxlength' => true,
                                        'title' => 'Indique identificacion',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'identificacion'   ]) ?>
            
                <?= $form->field($model, 'nombres')->textInput(['maxlength' => true,
                                        'title' => 'Indique nombres',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'nombres'   ]) ?>


                <?= $form->field($model, 'fecha_digitacion')->hiddenInput()->label(false)?>
            
                <?= $form->field($model, 'email')->textInput(['maxlength' => true,
                                        'title' => 'Indique email',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'email']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

        <?php ActiveForm::end(); ?>
        </div>
    </div>
    </div>
</div>
