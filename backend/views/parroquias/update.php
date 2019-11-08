<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Parroquias */

$this->title = 'Update Parroquias: ' . $model->cod_parroquia;
$this->params['breadcrumbs'][] = ['label' => 'Parroquias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_parroquia, 'url' => ['view', 'cod_parroquia' => $model->cod_parroquia, 'cod_canton' => $model->cod_canton, 'cod_provincia' => $model->cod_provincia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parroquias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
