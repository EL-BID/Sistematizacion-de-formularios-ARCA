<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\hidricos\CdaSolicitudInformacion */


$this->title = 'Modificar Datos Salida';
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

    <?= $this->render('_formdatosalida', [
        'model' => $model,'actividadactual'=>$actividadactual,'listinfofaltante'=>$listinfofaltante,
        'listtiporeporte'=>$listtiporeporte,'listtipoatencion'=>$listtipoatencion,'ps_cproceso'=>$ps_cproceso,'listadoscda'=>$listadocdas,'listadodemarcacion'=>$listadodemarcacion,'listadocentro'=>$listadocentro,
        'botondisabled'=>$botondisabled,'listadocodcanton'=>$listadocodcanton
    ]) ?>

</div>
