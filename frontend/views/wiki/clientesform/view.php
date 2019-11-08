<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clientesform */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clientesforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientesform-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['deletep', 'id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de querer borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	
	
	<!--VALIDACION DE GUARDADO DE LOS DATOS---->

	<?php if (Yii::$app->session->hasFlash('FormSubmitted')):

		echo Alert::widget([
			'options' => [
				'class' => 'alert-info',
			],
			'body' =>($model->isNewRecord)? 'Cliente Guardado con Exito':'Cliente Modificado con Exito',
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
        ],
    ]) ?>

</div>
