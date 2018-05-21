<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsCproceso */

$this->title = 'Actualizar Ps Cproceso: ' . $model->id_cproceso;
$this->params['breadcrumbs'][] = ['label' => 'Ps Cprocesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cproceso, 'url' => ['view', 'id' => $model->id_cproceso]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ps-cproceso-update">

        <?php
            if(empty($_ajax)){
        ?>
            <div class="headSection">
                <h1 class="titSection"><?= Html::encode($this->title) ?></h1>
            </div>
        <?php
            }
        ?>
        

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
