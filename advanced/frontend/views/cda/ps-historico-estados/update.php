<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsHistoricoEstados */

$this->title = 'Update Ps Historico Estados: ' . $model->id_hisotrico_cproceso;
$this->params['breadcrumbs'][] = ['label' => 'Ps Historico Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hisotrico_cproceso, 'url' => ['view', 'id' => $model->id_hisotrico_cproceso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ps-historico-estados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
