<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaReporteInformacion */

$this->title = 'Información SENAGUA';
$this->params['breadcrumbs'][] = ['label' => 'Información SENAGUA', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-reporte-informacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'modelCoordenada' => $modelCoordenada,
    ]) ?>

</div>
