<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model frontend\models\Anexos */

$this->title = $model->cod_anexo;
$this->params['breadcrumbs'][] = ['label' => 'Anexos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anexos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'cod_anexo' => $model->cod_anexo, 'cod_ficha' => $model->cod_ficha], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'cod_anexo' => $model->cod_anexo, 'cod_ficha' => $model->cod_ficha], [
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
            'cod_anexo',
            'anexo1:boolean',
            'anexo2:boolean',
            'anexo3:boolean',
            'anexo4:boolean',
            'anexo5:boolean',
            'anexo6:boolean',
            'anexo7:boolean',
            'anexo8:boolean',
            'anexo9:boolean',
            'cod_ficha',
        ],
    ]) ?>

</div>
