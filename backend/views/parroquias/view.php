<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model common\models\Parroquias */

$this->title = $model->cod_parroquia;
$this->params['breadcrumbs'][] = ['label' => 'Parroquias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parroquias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'cod_parroquia' => $model->cod_parroquia, 'cod_canton' => $model->cod_canton, 'cod_provincia' => $model->cod_provincia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'cod_parroquia' => $model->cod_parroquia, 'cod_canton' => $model->cod_canton, 'cod_provincia' => $model->cod_provincia], [
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
            'cod_parroquia',
            'nombre_parroquia',
            'cod_canton',
            'cod_provincia',
        ],
    ]) ?>

</div>
