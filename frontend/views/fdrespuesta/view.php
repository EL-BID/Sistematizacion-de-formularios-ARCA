<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\fdrespuesta */

$this->title = $model->id_respuesta;
$this->params['breadcrumbs'][] = ['label' => 'Fdrespuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fdrespuesta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_respuesta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_respuesta], [
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
            'id_respuesta',
            'ra_fecha',
            'ra_check',
            'ra_descripcion:ntext',
            'ra_entero',
            'ra_decimal',
            'ra_porcentaje',
            'id_conjunto_respuesta',
            'ra_moneda',
            'id_pregunta',
            'id_opcion_select',
            'id_tpregunta',
            'id_capitulo',
            'id_formato',
            'id_conjunto_pregunta',
            'id_version',
            'cantidad_registros',
        ],
    ]) ?>

</div>
