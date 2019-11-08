<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Anexos */

$this->title = 'Create Anexos';
$this->params['breadcrumbs'][] = ['label' => 'Anexos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="headSection">
<h1 class="titSection"><?= Html::encode($this->title) ?></h1>
</div>
<div class="anexos-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
