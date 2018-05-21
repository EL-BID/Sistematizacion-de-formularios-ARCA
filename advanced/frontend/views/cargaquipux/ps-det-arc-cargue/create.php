<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cargaquipux\PsDetArcCargue */

$this->title = 'Nuevo Ps Det Arc Cargue';
$this->params['breadcrumbs'][] = ['label' => 'Ps Det Arc Cargues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-det-arc-cargue-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
