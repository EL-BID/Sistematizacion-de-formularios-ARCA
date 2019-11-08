<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdUbicacion */

$this->title = 'Update Fd Ubicacion: ' . $model->id_ubicacion;
$this->params['breadcrumbs'][] = ['label' => 'Fd Ubicacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ubicacion, 'url' => ['view', 'id' => $model->id_ubicacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-ubicacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
