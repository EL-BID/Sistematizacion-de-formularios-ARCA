<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\FdUbicacion */

$this->title = 'Create Fd Ubicacion';
$this->params['breadcrumbs'][] = ['label' => 'Fd Ubicacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-ubicacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
