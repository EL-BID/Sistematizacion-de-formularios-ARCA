<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cargaquipux\PsArchivoCargue */

$this->title = 'Nuevo Ps Archivo Cargue';
$this->params['breadcrumbs'][] = ['label' => 'Ps Archivo Cargues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-archivo-cargue-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
