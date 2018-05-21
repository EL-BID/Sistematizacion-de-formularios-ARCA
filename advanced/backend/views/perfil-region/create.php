<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PerfilRegion */

$this->title = 'Create Perfil Region';
$this->params['breadcrumbs'][] = ['label' => 'Perfil Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-region-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
