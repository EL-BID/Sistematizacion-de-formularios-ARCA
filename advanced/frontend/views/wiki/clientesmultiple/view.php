<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesmultiple */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clientesmultiples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientesmultiple-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['deletep', 'id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Asigne aqui su mensaje?::'.Url::toRoute(['clientesmultiple/deletep','id' => $model->Id],true),
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
            'Id',
            'name',
            'lastname',
            'birthdate',
            'createdate',
            'type',
            'ciudad',
            'ciudad2_id',
        ],
    ]) ?>

</div>
