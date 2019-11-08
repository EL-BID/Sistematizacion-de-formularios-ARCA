<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesdropdown */

$this->title = 'Create Clientesdropdown';
$this->params['breadcrumbs'][] = ['label' => 'Clientesdropdowns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientesdropdown-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
