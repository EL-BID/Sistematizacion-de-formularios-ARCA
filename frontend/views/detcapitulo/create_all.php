<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesprueba */

$this->title = 'Detalle Capitulo';

/*Construyendo Miga de Pan*/
if(!empty($migadepan)){

   if($migadepan['url'] == 'dashboard/index'){
       $_labelmiga = "Dashboard";
       $_urlmiga = array($migadepan['url'],'id_conj_rpta' => $migadepan['id_conj_rpta'],'id_conj_prta' => $migadepan['id_conj_prta'],'id_fmt' => $migadepan['id_fmt'], 'last' => $migadepan['id_version'], 'estado' => $migadepan['estado'],'idjunta' => $migadepan['idjunta']) ;
       $this->title = 'Detalle Capitulo';
	   $_habreportes = FALSE;
   }else if($migadepan['url'] == 'listcapitulos/index'){
       $_labelmiga = "Listado";
       $_urlmiga = array($migadepan['url'],'id_conj_rpta' => $migadepan['id_conj_rpta'],'id_conj_prta' => $migadepan['id_conj_prta'],'id_fmt' => $migadepan['id_fmt'], 'last' => $migadepan['id_version'], 'estado' => $migadepan['estado'],'provincia' => $migadepan['provincia'],'cantones' => $migadepan['cantones'],'parroquias' => $migadepan['parroquias'], 'periodos' => $migadepan['periodos'],'idjunta' => $migadepan['idjunta']);
       $this->title = 'Detalle Capitulo';
	   $_habreportes = FALSE;
   }else{
       $_labelmiga = "Gestor Formatos";                                                                                                                                                                                                                                                                                                                                 
       $_urlmiga = array($migadepan['url'],'id_cnj_rpta' => $migadepan['id_cnj_rpta'],'id_conj_prta' => $migadepan['id_conj_prta'],'provincia' => $migadepan['provincia'],'cantones' => $migadepan['cantones'],'parroquias' => $migadepan['parroquias'], 'periodos' => $migadepan['periodos'], 'estado' => $migadepan['estado'],'id_fmt' => $migadepan['id_fmt'],'idjunta' => $migadepan['idjunta'],'capitulo'=>'','antvista'=>'','migadepan'=>'') ;
       $this->title = 'Detalle Formato';
	   $_habreportes = TRUE;
   }
    
}

$this->params['breadcrumbs'][] = ['label' => $_labelmiga, 'url' => $_urlmiga];
$this->params['breadcrumbs'][] = $this->title;

/*Final Consturccion miga de PAN*/
?>
<div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>

<div class="clientesprueba-create">

    <?= $this->render('_form', [
        'model' => $model,'vista'=>$vista,'tipo'=>'Create','permisos'=>$permisos,'_urlmiga'=>$_urlmiga,'modelgenerales'=>$modelgenerales,
        'id_conj_rpta'=>$id_conj_rpta,'id_conj_prta'=>$id_conj_prta,'id_fmt'=>$id_fmt,'id_version'=>$last,'estado'=>$estado,'id_capitulo'=>$id_capitulo,'_modelbasicos'=>$_modelbasicos,
		'_modelbasicos_coordenadas'=>$_modelbasicos_coordenadas,'_modelbasicos_ubicacion'=>$_modelbasicos_ubicacion,'cantonesPost'=>$cantonesPost,'demarcacionespost'=>$DemarcacionPost,
		'focus'=>$focus,'dinamicjavascript'=>$dinamicjavascript,'_habreportes'=>$_habreportes,'modelgeneralesriego' => $modelgeneralesriego,'_modelriego_ubicacion' => $_modelriego_ubicacion,
                'parroquiasPost'=>$parroquiasPost,'modelgeneralescomunitarioap'=>$modelgeneralescomunitarioap,'_modelcomunitarioap_ubicacion'=>$_modelcomunitarioap_ubicacion,
                'modelgeneralespublicos'=>$modelgeneralespublicos,'_modelpublicos_ubicacion'=>$_modelpublicos_ubicacion,'idjunta'=>$idjunta
    ]) ?>

</div>
