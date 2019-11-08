<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cargaquipux\PsCargueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cargar Archivo Quipux';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-cargue-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Cargar Archivo', 
        ['value' =>Url::to(['cargaquipux/ps-cargue/create']), 'title' => 'Nueva Carga',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cargues',
 //           'id_archivo_cargue',
            'procesado',
            'fecha_cargue',
            'fecha_proceso',
            ['attribute'=>'id_archivo_cargue',
               // 'filter'=> \yii\helpers\ArrayHelper::map(common\models\cargaquipux\PsArchivoCargue::find()->asArray->all(), 'id_archivo_cargue', 'nom_archivo_cargue'),
                'label'=>'Tipo de Archivo',
                'value' => function ($data) {
                     return common\models\cargaquipux\PsArchivoCargue::findOne(['id_archivo_cargue'=>$data->id_archivo_cargue])->nom_archivo_cargue;
                },
            ],
            

//            [
//			
//                'class' => 'yii\grid\ActionColumn',
//                'header' => 'Acción',
//                'template' => ' {view} {update} {delete}',
//                'buttons' => [
//                    'view' => function($url, $model){
//                            return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
//                                    'title' => Yii::t('app', 'Ver'),
//                                    'data-method' => 'post',
//                            ]);
//                    },
//                    'update' => function ($url, $model) {
//                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
//                                         'class' => 'btn btn-default btn-xs showModalButton',
//                            ]);
//                    }, //Primera columna encontrada id_cargues                    
//                    'delete' => function($url, $model){
//                            $url2 = Url::toRoute(['cargaquipux/ps-cargue/deletep','id' => $model->id_cargues],true);
//                            return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
//                                    'title' => Yii::t('app', 'Borrar'),
//                                    'data-method' => 'post',
//                                    'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?'),
//                            ]);
//                    }
//                                        
//                                        
//            ],
//			
//			
//	],
        ],
    ]); ?>
</div>
