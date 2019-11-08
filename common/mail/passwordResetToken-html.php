<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->auth_key]);
?>
<div class="password-reset">
    <p>Hola <?= Html::encode($user->nombres) ?>,</p>

    <p>Dirijase al siguiente enlace para resetear el password o clave:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
