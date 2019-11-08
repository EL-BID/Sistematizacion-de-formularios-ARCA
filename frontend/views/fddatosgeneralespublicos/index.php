<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdDatosGeneralesPublicosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fd Datos Generales Publicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-datos-generales-publicos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Fd Datos Generales Publicos', 
        ['value' =>Url::to(['fd-datos-generales-publicos/create']), 'title' => 'Create Fd Datos Generales Publicos',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_datos_generales_publicos',
            'pagina_web_prestador',
            'correo_electronico_prestador',
            'fecha_llenado_fichas',
            'nombres_responsable_informacion',
            // 'cargo_desempenia',
            // 'correo_electronico',
            // 'num_celular',
            // 'id_conjunto_respuesta',

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
                    }, //Primera columna encontrada id_datos_generales_publicos                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['fd-datos-generales-publicos/deletep','id' => $model->id_datos_generales_publicos],true);
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
