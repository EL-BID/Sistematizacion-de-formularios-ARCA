<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Capitulos */

$this->title = 'Create Capitulos';
$this->params['breadcrumbs'][] = ['label' => 'Capitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>
<div class="capitulos-create">

     <?= $this->render('_form', [
        'model' => $model,'model2'=>$model2,
    ]) ?>

</div>
