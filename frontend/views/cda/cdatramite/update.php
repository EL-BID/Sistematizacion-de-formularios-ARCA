<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaTramite */

$this->title = 'Update Cda Tramite: ' . $model->id_cda_tramite;
$this->params['breadcrumbs'][] = ['label' => 'Cda Tramites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cda_tramite, 'url' => ['view', 'id' => $model->id_cda_tramite]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cda-tramite-update">

     <?php
        if(empty($_ajax)){
        ?>
            <h1><?= Html::encode($this->title) ?></h1>
	<?php
        }
    ?>

    <?= $this->render('_form', [
        'model' => $model,'listusuario'=>$listusuario
    ]) ?>

</div>
