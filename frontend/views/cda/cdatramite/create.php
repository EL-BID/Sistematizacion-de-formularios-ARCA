<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaTramite */

$this->title = 'Crear Tramite';
$this->params['breadcrumbs'][] = ['label' => 'Cda Tramites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-tramite-create">

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
