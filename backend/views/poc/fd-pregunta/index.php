<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdPreguntaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fd Preguntas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-pregunta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Fd Pregunta', 
        ['value' =>Url::to(['poc/fd-pregunta/create']), 'title' => 'Create Fd Pregunta',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pregunta',
            'nom_pregunta',
            'ayuda_pregunta',
            'obligatorio',
            'max_largo',
            // 'min_largo',
            // 'max_date',
            // 'min_date',
            // 'orden',
            // 'estado',
            // 'ini_fecha',
            // 'fin_fecha',
            // 'id_tpregunta',
            // 'id_capitulo',
            // 'id_seccion',
            // 'id_agrupacion',
            // 'id_tselect',
            // 'caracteristica_preg',
            // 'id_conjunto_pregunta',
            // 'visible',
            // 'visible_desc_preg',
            // 'num_col_label',
            // 'num_col_input',
            // 'stylecss',
            // 'format',
            // 'min_number',
            // 'max_number',
            // 'atributos',
            // 'reg_exp',
            // 'numerada',

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => ' {view} {update} {delete}',
                'buttons' => [
                    'view' => function($url, $model){
                            return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                    'title' => Yii::t('app', 'View'),
                                    'data-method' => 'post',
                            ]);
                    },
                    'update' => function ($url, $model) {
                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada id_pregunta                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['poc/fd-pregunta/deletep','id' => $model->id_pregunta],true);
                            return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?'),
                            ]);
                    }
                                        
                                        
            ],
			
			
	],
        ],
    ]); ?>
</div>
