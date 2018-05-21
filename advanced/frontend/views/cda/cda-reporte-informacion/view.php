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
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_reporte_informacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id_reporte_informacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro que desea borrar este elemento?',
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
			'body' =>'Guardado con Éxito',
		]);
		elseif (Yii::$app->session->getFlash('FormSubmitted')=='1'):
		
		echo Alert::widget([
			'options' => [
				'class' => 'alert-info',
			],
			'body' =>'Modificado con Ëxito',
		]);
		
		
	endif; ?>
	
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'id_coordenada',
            'id_reporte_informacion',
            'abscisa',
            'id_cda',
            'observaciones',
            'proba_excedencia_obtenida',
            'proba_excedencia_certificado',
            'decision',
            'observaciones_decision',
            'id_actividad',
        ],
    ]) ?>

</div>
