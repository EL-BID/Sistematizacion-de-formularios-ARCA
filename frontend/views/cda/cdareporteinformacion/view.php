<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\cda\CdaReporteInformacion */

$this->title = $model->id_reporte_informacion;
$this->params['breadcrumbs'][] = ['label' => 'Cda Reporte Informacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-reporte-informacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_reporte_informacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_reporte_informacion], [
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
            'id_reporte_informacion',
            'sector_solicitado',
            'institucion_solicitante',
            'solicitante',
            'fuente_solicitada',
            'q_solicitado',
            'tiempo_years',
            'id_tfuente',
            'id_subtfuente',
            'id_caracteristica',
            'id_treporte',
            'id_destino',
            'id_uso_solicitado',
            'id_ubicacion',
            'abscisa',
            'observaciones',
            'proba_excedencia_obtenida',
            'proba_excedencia_certificado',
            'decision',
            'observaciones_decision',
            'id_actividad',
            'id_cactividad_proceso',
            'estado',
            'causa_anulacion',
            'causa_correccion',
            'id_tipo',
            'id_tramite',
            'id_cod_cda',
        ],
    ]) ?>

</div>
