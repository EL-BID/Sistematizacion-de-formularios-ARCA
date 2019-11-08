<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\PsResponsablesProceso */

$this->title = 'Nuevo Ps Responsables Proceso';
$this->params['breadcrumbs'][] = ['label' => 'Ps Responsables Procesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-responsables-proceso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
