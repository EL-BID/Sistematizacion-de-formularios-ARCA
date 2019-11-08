<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaErrores */

$this->title = 'Update Cda Errores: ' . $model->id_error;
$this->params['breadcrumbs'][] = ['label' => 'Cda Errores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_error, 'url' => ['view', 'id' => $model->id_error]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cda-errores-update">

    <?php
        if(empty($_ajax)){
        ?>
    <h1><?= Html::encode($this->title) ?></h1>
	<?php
            }
    ?>

    <?= $this->render('_form', [
        'model' => $model,'ps_cproceso'=>$ps_cproceso,'listadoerrores' => $listadoerrores

    ]) ?>

</div>
