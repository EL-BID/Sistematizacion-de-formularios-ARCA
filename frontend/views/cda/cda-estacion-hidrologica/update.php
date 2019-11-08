<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaEstacionHidrologica */

$this->title = 'Actualizar Cda Estacion Hidrologica: ' . $model->id_ehidrografica;
$this->params['breadcrumbs'][] = ['label' => 'Cda Estacion Hidrologicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ehidrografica, 'url' => ['view', 'id' => $model->id_ehidrografica]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cda-estacion-hidrologica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
