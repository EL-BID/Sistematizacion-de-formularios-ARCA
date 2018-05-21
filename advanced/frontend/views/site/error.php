<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error text-center">
	
    <h1 class="text-center"><?= $name; //Html::encode($this->title) ?></h1>
	<img src="../../frontend/web/images/customskin/error404.png"/>
    <div class="alert borderBox">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
		El error reportado ha ocurrido mientras el servidor estaba procesando su solicitud
        
    </p>
    <p>
        Por favor, intente nuevamente, si el error persiste, no dude en contactarnos. Muchas Gracias
    </p>

</div>
