<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */


?>
<div class="password-reset">
    <p>Hola <?= Html::encode($user->nombres) ?>,</p>

    <p>El Password ha sido cambiado.</p>

    <p>Si no ha sido por favor comuniquese con nosotros.</p>
</div>
