<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cargaquipux\PsCargue */

$this->title = 'Nueva Carga Archivo Quipux';
$this->params['breadcrumbs'][] = ['label' => 'Nueva Carga Archivo Quipux', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-cargue-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
