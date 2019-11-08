<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

$this->title = 'Cambio Contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-change password">
    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1>
    </div>

	
    
    <div class="aplicativo">
	<p>Por complete los siguientes campos para cambiar la contraseña:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'usuario')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'clave_anterior')->passwordInput(['maxlength' => true,
                                        'title' => 'Indique clave anterior',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'clave anterior'   ])->label('Contraseña Actual') ?>
            
                <?= $form->field($model, 'clave')->passwordInput(['maxlength' => true,
                                        'title' => 'Indique clave',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'clave'   ]) ->label('Nueva Contraseña')?>
            
                <?= $form->field($model, 'login')->passwordInput(['maxlength' => true,
                                        'title' => 'Indique clave',
                                        'data-toggle' => 'tooltip',
                                        'placeholder'=>'clave'   ]) ->label('Confirmar Contraseña')?>
            
            
                <div class="form-group">
                    <?= Html::submitButton('Cambiar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

        <?php ActiveForm::end(); ?>
        </div>
    </div>
    </div>
</div>
