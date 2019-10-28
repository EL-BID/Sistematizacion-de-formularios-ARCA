<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdBombasCaptacion */

$this->title = $model->id_bombas_captacion;
$this->params['breadcrumbs'][] = ['label' => 'Fd Bombas Captacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-bombas-captacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_bombas_captacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_bombas_captacion], [
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
            'id_bombas_captacion',
            'nombre_bomba',
            'id_material_caseta',
            'id_estado_infrestructura',
            'potencia_bomba',
            'anio_instalacion',
            'id_problema_bomba',
            'especifique_material_caseta',
            'especifique_problema_bomba',
            'observaciones',
            'id_conjunto_respuesta',
            'id_pregunta',
            'id_respuesta',
            'id_capitulo',
        ],
    ]) ?>

</div>
