<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cantones */

$this->title = 'Create Cantones';
$this->params['breadcrumbs'][] = ['label' => 'Cantones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cantones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
