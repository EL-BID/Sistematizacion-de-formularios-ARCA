<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsActividadQuipux */

$this->title = 'Create Ps Actividad Quipux';
$this->params['breadcrumbs'][] = ['label' => 'Ps Actividad Quipuxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-actividad-quipux-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
