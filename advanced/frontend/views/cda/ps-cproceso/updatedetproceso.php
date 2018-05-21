<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\hidricos\PsCproceso */

$this->title = 'Editar Datos Basicos';
$this->params['breadcrumbs'][] = ['label' => 'Ps Cprocesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cproceso, 'url' => ['view', 'id' => $model->id_cproceso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ps-cproceso-update">
        
        <?php
            if(empty($_ajax)){
        ?>
             <div class="headSection">
             <h1 class="titSection"><?= Html::encode($this->title) ?></h1>
             </div>
        <?php
            }
        ?>
       
    
    <?php
    
    if(empty($tipo)){
         echo $this->render('_form', [
            'model' => $model,
        ]);
        
    }else if(!empty($tipo) and $tipo==1){
       
        echo $this->render('_formdatosbasicos', [
            'model' => $model,'ult_eproceso' => $ult_eproceso, 'ult_usuario' => $ult_usuario
        ]);
    }
    ?>

</div>
