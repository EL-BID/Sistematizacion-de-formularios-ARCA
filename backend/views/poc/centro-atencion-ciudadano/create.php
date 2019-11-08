<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\poc\CentroAtencionCiudadano */

$this->title = 'Create Centro Atencion Ciudadano';
$this->params['breadcrumbs'][] = ['label' => 'Centro Atencion Ciudadanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centro-atencion-ciudadano-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
