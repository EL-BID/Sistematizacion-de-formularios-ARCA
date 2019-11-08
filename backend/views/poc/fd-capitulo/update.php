<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdCapitulo */

$this->title = 'Update Fd Capitulo: ' . $model->id_capitulo;
$this->params['breadcrumbs'][] = ['label' => 'Fd Capitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_capitulo, 'url' => ['view', 'id' => $model->id_capitulo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-capitulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
