<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorDestinatario */

$this->title = 'Update Destinatario: ' . $model->id_destinatario;
$this->params['breadcrumbs'][] = ['label' => 'Destinatario', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_destinatario, 'url' => ['view', 'id' => $model->id_destinatario]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cor-destinatario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
