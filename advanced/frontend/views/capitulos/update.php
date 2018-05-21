<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Capitulos */

$this->title = 'Update Capitulos: '. $model->id_capitulo;
$this->params['breadcrumbs'][] = ['label' => 'Capitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_capitulo, 'url' => ['view', 'id' => $model->id_capitulo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>
<div class="capitulos-create">

    <?= $this->render('_form', [
        'model' => $model,'model2'=>$model2,
    ]) ?>

</div>
