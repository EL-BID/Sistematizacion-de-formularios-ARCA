<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdVersion */

$this->title = 'Update Fd Version: ' . $model->id_version;
$this->params['breadcrumbs'][] = ['label' => 'Fd Versions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_version, 'url' => ['view', 'id' => $model->id_version]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-version-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
