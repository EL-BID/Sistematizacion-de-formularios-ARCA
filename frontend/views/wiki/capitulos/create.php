<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Capitulos */

$this->title = 'Create Capitulos';
$this->params['breadcrumbs'][] = ['label' => 'Capitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capitulos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'model2'=>$model2,
    ]) ?>

</div>
