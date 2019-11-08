<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\PsActividad */

$this->title = 'Nuevo Ps Actividad';
$this->params['breadcrumbs'][] = ['label' => 'Ps Actividads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-actividad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
