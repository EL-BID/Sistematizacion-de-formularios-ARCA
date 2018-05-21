<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cantones */

$this->title = 'Update Cantones: ' . $model->cod_canton;
$this->params['breadcrumbs'][] = ['label' => 'Cantones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_canton, 'url' => ['view', 'cod_canton' => $model->cod_canton, 'cod_provincia' => $model->cod_provincia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cantones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
