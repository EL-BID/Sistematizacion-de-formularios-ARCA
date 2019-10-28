<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaAnalisisHidrologico */

$this->title = 'Create Cda Analisis Hidrologico';
$this->params['breadcrumbs'][] = ['label' => 'Cda Analisis Hidrologicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-analisis-hidrologico-create">

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
