<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cargaquipux\PsCargue */

$this->title = 'Actulizar Cargue Archivo Quipux: ' . $model->id_cargues;
$this->params['breaadcrumbs'][] = ['label' => 'Cargue Archivo Quipux', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cargues, 'url' => ['view', 'id' => $model->id_cargues]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ps-cargue-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
