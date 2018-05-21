<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaCartografia */

$this->title = 'Actualizar Cda Cartografia: ' . $model->id_cartografia;
$this->params['breadcrumbs'][] = ['label' => 'Cda Cartografias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cartografia, 'url' => ['view', 'id' => $model->id_cartografia]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-cartografia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
