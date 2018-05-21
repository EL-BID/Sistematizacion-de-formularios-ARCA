<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Accesos */

$this->title = 'Update Accesos: ' . $model->id__acceso;
$this->params['breadcrumbs'][] = ['label' => 'Accesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id__acceso, 'url' => ['view', 'id' => $model->id__acceso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accesos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
