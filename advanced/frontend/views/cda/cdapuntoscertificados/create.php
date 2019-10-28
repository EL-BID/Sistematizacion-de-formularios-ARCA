<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaPuntosCertificados */

$this->title = 'Create Cda Puntos Certificados';
$this->params['breadcrumbs'][] = ['label' => 'Cda Puntos Certificados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-puntos-certificados-create">

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
