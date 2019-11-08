<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pagina */

$this->title = 'Update Pagina: ' . $model->id_pagina;
$this->params['breadcrumbs'][] = ['label' => 'Paginas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pagina, 'url' => ['view', 'id' => $model->id_pagina]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pagina-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
