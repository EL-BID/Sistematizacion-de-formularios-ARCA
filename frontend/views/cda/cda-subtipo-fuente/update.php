<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaSubtipoFuente */

$this->title = 'Actualizar Cda Subtipo Fuente: ' . $model->id_subtfuente;
$this->params['breadcrumbs'][] = ['label' => 'Cda Subtipo Fuentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_subtfuente, 'url' => ['view', 'id' => $model->id_subtfuente]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-subtipo-fuente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
