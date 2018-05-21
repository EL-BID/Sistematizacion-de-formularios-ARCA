<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cargaquipux\PsArchivoCargue */

$this->title = 'Actualizar Ps Archivo Cargue: ' . $model->id_archivo_cargue;
$this->params['breadcrumbs'][] = ['label' => 'Ps Archivo Cargues', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_archivo_cargue, 'url' => ['view', 'id' => $model->id_archivo_cargue]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ps-archivo-cargue-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
