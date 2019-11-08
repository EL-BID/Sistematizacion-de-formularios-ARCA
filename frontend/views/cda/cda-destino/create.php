<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaDestino */

$this->title = 'Nuevo Cda Destino';
$this->params['breadcrumbs'][] = ['label' => 'Cda Destinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-destino-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
