<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdElementoCondicion */

$this->title = 'Update Fd Elemento Condicion: ' . $model->id_condicion;
$this->params['breadcrumbs'][] = ['label' => 'Fd Elemento Condicions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_condicion, 'url' => ['view', 'id' => $model->id_condicion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-elemento-condicion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
