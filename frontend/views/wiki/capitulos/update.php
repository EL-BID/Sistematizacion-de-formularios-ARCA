<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Capitulos */

$this->title = 'Update Capitulos: '. $model->id_capitulo;
$this->params['breadcrumbs'][] = ['label' => 'Capitulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_capitulo, 'url' => ['view', 'id' => $model->id_capitulo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="capitulos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'model2'=>$model2,
    ]) ?>

</div>
