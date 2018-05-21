<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\poc\FdPreguntaDescendiente */

$this->title = $model->id_pregunta_padre;
$this->params['breadcrumbs'][] = ['label' => 'Fd Pregunta Descendientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-pregunta-descendiente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_pregunta_padre' => $model->id_pregunta_padre, 'id_pregunta_descendiente' => $model->id_pregunta_descendiente, 'id_version_descendiente' => $model->id_version_descendiente, 'id_version_padre' => $model->id_version_padre], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pregunta_padre' => $model->id_pregunta_padre, 'id_pregunta_descendiente' => $model->id_pregunta_descendiente, 'id_version_descendiente' => $model->id_version_descendiente, 'id_version_padre' => $model->id_version_padre], [
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
            'id_pregunta_padre',
            'id_pregunta_descendiente',
            'id_version_descendiente',
            'id_version_padre',
        ],
    ]) ?>

</div>
