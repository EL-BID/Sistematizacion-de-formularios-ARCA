<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorDestinatario */

$this->title = 'Nuevo Destinatario';
$this->params['breadcrumbs'][] = ['label' => 'Destinatario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cor-destinatario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
