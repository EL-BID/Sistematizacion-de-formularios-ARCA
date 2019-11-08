<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaAnalisisHidrologico */

$this->title = 'Update Cda Analisis Hidrologico: ' . $model->id_analisis_hidrologico;
$this->params['breadcrumbs'][] = ['label' => 'Cda Analisis Hidrologicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_analisis_hidrologico, 'url' => ['view', 'id' => $model->id_analisis_hidrologico]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cda-analisis-hidrologico-update">

    <?php
        if(empty($_ajax)){
        ?>
    <h1><?= Html::encode($this->title) ?></h1>
	<?php
            }
    ?>

    <?= $this->render('_form', [
        'model' => $model,'ps_cproceso'=>$ps_cproceso
    ]) ?>

</div>
