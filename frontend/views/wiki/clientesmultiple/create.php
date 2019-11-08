<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesmultiple */

$this->title = 'Create Clientesmultiple';
$this->params['breadcrumbs'][] = ['label' => 'Clientesmultiples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientesmultiple-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
