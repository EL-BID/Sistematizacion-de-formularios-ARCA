<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorMensajeEnviado */

$this->title = 'Nuevo Mensaje Enviado';
$this->params['breadcrumbs'][] = ['label' => 'Nuevo Mensaje Enviado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cor-mensaje-enviado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
