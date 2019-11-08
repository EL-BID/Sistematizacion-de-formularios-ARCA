<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->auth_key]);
?>
Hola <?= $user->nombres ?>,

Por favor dirijase al siguiente enlace para resetear su password:

<?= $resetLink ?>
