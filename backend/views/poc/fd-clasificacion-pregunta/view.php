<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdClasificacionPregunta */

$this->title = $model->id_clasificacion;
$this->params['breadcrumbs'][] = ['label' => 'Fd Clasificacion Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-clasificacion-pregunta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_clasificacion' => $model->id_clasificacion, 'id_pregunta' => $model->id_pregunta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_clasificacion' => $model->id_clasificacion, 'id_pregunta' => $model->id_pregunta], [
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
            'valor',
            'id_clasificacion',
            'id_pregunta',
        ],
    ]) ?>

</div>
