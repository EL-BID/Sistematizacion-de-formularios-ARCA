<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaDestino */

$this->title = 'Actualizar Cda Destino: ' . $model->id_destino;
$this->params['breadcrumbs'][] = ['label' => 'Cda Destinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_destino, 'url' => ['view', 'id' => $model->id_destino]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-destino-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
