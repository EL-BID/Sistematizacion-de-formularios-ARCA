<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaEstacionHidrologica */

$this->title = 'Nuevo Cda Estacion Hidrologica';
$this->params['breadcrumbs'][] = ['label' => 'Cda Estacion Hidrologicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-estacion-hidrologica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
