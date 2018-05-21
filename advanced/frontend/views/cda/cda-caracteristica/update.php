<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaCaracteristica */

$this->title = 'Actualizar Cda Caracteristica: ' . $model->id_caracteristica;
$this->params['breadcrumbs'][] = ['label' => 'Cda Caracteristicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_caracteristica, 'url' => ['view', 'id' => $model->id_caracteristica]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-caracteristica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
