<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model common\models\Regionentidades */

$this->title = $model->cod_region;
$this->params['breadcrumbs'][] = ['label' => 'Regionentidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regionentidades-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'cod_region' => $model->cod_region, 'id_entidad' => $model->id_entidad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'cod_region' => $model->cod_region, 'id_entidad' => $model->id_entidad], [
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
            'cod_region',
            'id_entidad',
        ],
    ]) ?>

</div>
