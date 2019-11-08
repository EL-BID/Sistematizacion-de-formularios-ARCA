<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\TrTipoCoordenada */

$this->title = 'Update Tr Tipo Coordenada: ' . $model->id_tcoordenada;
$this->params['breadcrumbs'][] = ['label' => 'Tr Tipo Coordenadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tcoordenada, 'url' => ['view', 'id' => $model->id_tcoordenada]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-tipo-coordenada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
