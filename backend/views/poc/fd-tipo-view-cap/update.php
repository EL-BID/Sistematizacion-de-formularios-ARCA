<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTipoViewCap */

$this->title = 'Update Fd Tipo View Cap: ' . $model->id_tview_cap;
$this->params['breadcrumbs'][] = ['label' => 'Fd Tipo View Caps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tview_cap, 'url' => ['view', 'id' => $model->id_tview_cap]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fd-tipo-view-cap-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
