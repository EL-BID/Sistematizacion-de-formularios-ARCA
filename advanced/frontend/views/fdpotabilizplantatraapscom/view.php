<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPotabilizPlantatraApscom */

$this->title = $model->id_potab_plantatr_apscom;
$this->params['breadcrumbs'][] = ['label' => 'Fd Potabiliz Plantatra Apscoms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-potabiliz-plantatra-apscom-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_potab_plantatr_apscom], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_potab_plantatr_apscom], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	
	<!--VALIDACION DE GUARDADO DE LOS DATOS---->

	<?php if  (Yii::$app->session->getFlash('FormSubmitted')=='2'):

		echo Alert::widget([
			'options' => [
				'class' => 'alert-info',
			],
			'body' =>'Guardado con Exito',
		]);
		elseif (Yii::$app->session->getFlash('FormSubmitted')=='1'):
		
		echo Alert::widget([
			'options' => [
				'class' => 'alert-info',
			],
			'body' =>'Modificado con Exito',
		]);
		
		
	endif; ?>
	
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_potab_plantatr_apscom',
            'ubicacion_lug_ptratamiento',
            'tipo_planta_tratatmiento',
            'especifique_tplantat',
            'metodo_desinfeccion_planta',
            'especifique_metdesinfeccionp',
            'midicion_agua_tratplanta',
            'estado_planta',
            'problemas_identificados',
            'id_conjunto_respuesta',
            'id_pregunta',
            'id_respuesta',
            'id_capitulo',
            'id_junta',
        ],
    ]) ?>

</div>
