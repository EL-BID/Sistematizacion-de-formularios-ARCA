<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdCoordenada */

$this->title = 'Update Fd Coordenada: ' . $model->id_coordenada;
$this->params['breadcrumbs'][] = ['label' => 'Fd Coordenadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_coordenada, 'url' => ['view', 'id' => $model->id_coordenada]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-coordenada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
