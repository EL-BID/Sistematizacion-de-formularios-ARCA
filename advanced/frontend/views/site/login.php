<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Ingreso';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="headSection2">
<h1 class="titSection"><?= Html::encode($this->title) ?></h1>
</div>
<div class="site-login">
     

    <p>Por favor complete los siguientes campos para iniciar sesi&oacute;n:</p>
    <div class="aplicativo">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                Si olvid&oacute; su contrase&ntilde;a, puede  <?= Html::a('restablecerla', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Iniciar Sesi&oacute;n', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    </div>
</div>
