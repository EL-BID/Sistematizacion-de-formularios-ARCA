<?php
use yii\jui\ProgressBar;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<p>
 <?= Html::button('Abrir Proceso a Modal', ['value' => Url::to(['reloaddata/list']), 'title' => 'Crear Nuevo Cliente', 'class' => 'showModalButton btn btn-success']); ?>
</p>
        

