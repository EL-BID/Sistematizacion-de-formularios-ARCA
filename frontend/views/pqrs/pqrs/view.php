<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\pqrs\Pqrs */

$this->title = $model->id_pqrs;
$this->params['breadcrumbs'][] = ['label' => 'Pqrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pqrs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pqrs], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pqrs], [
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
            'id_pqrs',
            'fecha_recepcion',
            'num_consecutivo',
            'sol_nombres',
            'sol_doc_identificacion',
            'sol_direccion',
            'sol_email:email',
            'sol_telefono',
            'en_nom_nombres',
            'en_nom_ruc',
            'en_nom_direccion',
            'en_nom_email:email',
            'en_nom_telefono',
            'aquien_dirige',
            'objeto_peticion:ntext',
            'descripcion_peticion:ntext',
            'subtipo_queja',
            'subtipo_reclamo',
            'subtipo_controversia',
            'por_quien_qrc',
            'lugar_hechos',
            'fecha_hechos',
            'naracion_hechos:ntext',
            'elementos_probatorios:ntext',
            'denunc_nombre',
            'denunc_direccion',
            'denunc_telefono',
            'subtipo_sugerencia',
            'subtipo_felicitacion',
            'descripcion_sugerencia:ntext',
            'sol_cod_provincia',
            'sol_cod_canton',
            'en_nom_cod_provincia',
            'en_nom_cod_canton',
            'id_cproceso',
        ],
    ]) ?>

</div>
