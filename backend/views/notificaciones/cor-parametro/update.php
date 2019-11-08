<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\notificaciones\CorParametro */

$this->title = 'Actualizar Parametro: ' . $model->id_parametro;
$this->params['breadcrumbs'][] = ['label' => 'Parametro', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_parametro, 'url' => ['view', 'id' => $model->id_parametro]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cor-parametro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
