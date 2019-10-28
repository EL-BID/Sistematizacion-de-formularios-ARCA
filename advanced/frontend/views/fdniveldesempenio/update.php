<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdNivelDesempenio */

$this->title = 'Update Fd Nivel Desempenio: ' . $model->id_nivel;
$this->params['breadcrumbs'][] = ['label' => 'Fd Nivel Desempenios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_nivel, 'url' => ['view', 'id' => $model->id_nivel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-nivel-desempenio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
