<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaEstacionMeteorologica */

$this->title = 'Nuevo Cda Estacion Meteorologica';
$this->params['breadcrumbs'][] = ['label' => 'Cda Estacion Meteorologicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-estacion-meteorologica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
