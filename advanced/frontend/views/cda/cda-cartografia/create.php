<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaCartografia */

$this->title = 'Nuevo Cda Cartografia';
$this->params['breadcrumbs'][] = ['label' => 'Cda Cartografias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-cartografia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
