<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesauto */

$this->title = 'Update Clientesauto: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clientesautos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clientesauto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'autocomplete'=>$autocomplete,'autocomplete2'=>$autcomplete2,'custom'=>$custom,
    ]) ?>

</div>
