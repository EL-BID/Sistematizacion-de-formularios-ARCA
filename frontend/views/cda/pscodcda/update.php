<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\PsCodCda */

$this->title = 'Update Ps Cod Cda: ' . $model->id_cod_cda;
$this->params['breadcrumbs'][] = ['label' => 'Ps Cod Cdas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cod_cda, 'url' => ['view', 'id' => $model->id_cod_cda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ps-cod-cda-update">

    <?php
        if(empty($_ajax)){
        ?>
    <h1><?= Html::encode($this->title) ?></h1>
	<?php
            }
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
