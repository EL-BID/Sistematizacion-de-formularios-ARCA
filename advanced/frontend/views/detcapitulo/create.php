<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesprueba */

$this->title = 'Detalle Capitulo';

/*Construyendo Miga de Pan*/
if(!empty($migadepan)){
  
   if($migadepan['url'] == 'dashboard/index'){
       $_labelmiga = "Dashboard";
       $_urlmiga = array($migadepan['url'],'id_conj_rpta' => $migadepan['id_conj_rpta'],'id_conj_prta' => $migadepan['id_conj_prta'],'id_fmt' => $migadepan['id_fmt'], 'last' => $migadepan['id_version'], 'estado' => $migadepan['estado']) ;
   }else{
       $_labelmiga = "Gestor de Formatos";
   }
    
}

$this->params['breadcrumbs'][] = ['label' => $_labelmiga, 'url' => $_urlmiga];
$this->params['breadcrumbs'][] = $this->title;

/*Final Consturccion miga de PAN*/
?>
<div class="headSection">
<h1 class="titSection"><?= Html::encode($this->title) ?></h1>
</div>

<div class="clientesprueba-create">


    <?= $this->render('_form', [
        'model' => $model,'vista'=>$vista,'tipo'=>'Create','permisos'=>$permisos,'_urlmiga'=>$_urlmiga
    ]) ?>

</div>
