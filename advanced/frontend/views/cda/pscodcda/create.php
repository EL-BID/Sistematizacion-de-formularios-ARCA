<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\PsCodCda */

$this->title = 'Create Ps Cod Cda';
$this->params['breadcrumbs'][] = ['label' => 'Ps Cod Cdas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-cod-cda-create">

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
