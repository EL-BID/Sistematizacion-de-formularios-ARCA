<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdAdmEstado */

$this->title = 'Update Fd Adm Estado: ' . $model->id_adm_estado;
$this->params['breadcrumbs'][] = ['label' => 'Fd Adm Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_adm_estado, 'url' => ['view', 'id' => $model->id_adm_estado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-adm-estado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
