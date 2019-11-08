<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsHistoricoEstados */

$this->title = 'Create Ps Historico Estados';
$this->params['breadcrumbs'][] = ['label' => 'Ps Historico Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-historico-estados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
