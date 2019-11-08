<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaAnalisisHidrologico */

$this->title = 'Nuevo Cda Analisis Hidrologico';
$this->params['breadcrumbs'][] = ['label' => 'Cda Analisis Hidrologicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-analisis-hidrologico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
