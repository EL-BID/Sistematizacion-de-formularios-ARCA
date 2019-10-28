<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\hidricos\CdaSolicitudInformacion */


$this->title = 'Agregar Solicitud Información';
$this->params['breadcrumbs'][] = ['label' => 'CDA Solicitud Información', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-solicitud-informacion-create">

    <?php
        if(empty($_ajax)){
        ?>
    <h1><?= Html::encode($this->title) ?></h1>
	<?php
            }
    ?>

    <?= $this->render('_form', [
        'model' => $model,'listinfofaltante'=>$listinfofaltante,'listtiporeporte'=>$listtiporeporte,'listtipoatencion'=>$listtipoatencion
    ]) ?>

</div>
