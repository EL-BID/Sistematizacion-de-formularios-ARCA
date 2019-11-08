<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\PsProceso */

$this->title = 'Nuevo Ps Proceso';
$this->params['breadcrumbs'][] = ['label' => 'Ps Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-proceso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
