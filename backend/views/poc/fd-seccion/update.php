<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdSeccion */

$this->title = 'Update Fd Seccion: ' . $model->id_seccion;
$this->params['breadcrumbs'][] = ['label' => 'Fd Seccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_seccion, 'url' => ['view', 'id' => $model->id_seccion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-seccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
