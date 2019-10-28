<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdTanquesAlmacenaApscom */

$this->title = $model->id_tanquesalmacena;
$this->params['breadcrumbs'][] = ['label' => 'Fd Tanques Almacena Apscoms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-tanques-almacena-apscom-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tanquesalmacena], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tanquesalmacena], [
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
            'id_tanquesalmacena',
            'ubicacion_tanque',
            'capacidad_tanque',
            'medicion_entrada',
            'material',
            'frecuencia_mantenimiento',
            'estado_tanque',
            'problemas',
            'id_conjunto_respuesta',
            'id_junta',
            'id_pregunta',
            'id_respuesta',
            'id_capitulo',
        ],
    ]) ?>

</div>
