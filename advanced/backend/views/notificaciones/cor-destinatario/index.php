<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\notificaciones\CorDestinatarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Destinatario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cor-destinatario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Nuevo Destinatario', 
        ['value' =>Url::to(['notificaciones/cor-destinatario/create']), 'title' => 'Nuevo Destinatario',
        'class' => 'showModalButton btn btn-success']); ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_destinatario',
            'val_defecto',
            'consulta_sql:ntext',
             [
                'attribute' => 'id_correo',
                'value' => function($model){
                    $correo = common\models\notificaciones\CorCorreo::findOne($model->id_correo);
                    return $correo->nom_correo;
                },
                'filter' => yii\helpers\ArrayHelper::map(common\models\notificaciones\CorCorreo::find()->all(), 'id_correo', 'nom_correo'),
            ],
                         [
                'attribute' => 'id_tdestinatario',
                'value' => function($model){
                    $correo = common\models\notificaciones\CorTipoDestinatario::findOne($model->id_tdestinatario);
                    return $correo->nom_tdestinatario;
                },
                'filter' => yii\helpers\ArrayHelper::map(common\models\notificaciones\CorTipoDestinatario::find()->all(), 'id_tdestinatario', 'nom_tdestinatario'),
            ],
            //'id_correo',
            //'id_tdestinatario',

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => ' {view} {update} {delete}',
                'buttons' => [
                    'view' => function($url, $model){
                            return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                    'title' => Yii::t('app', 'Ver'),
                                    'data-method' => 'post',
                            ]);
                    },
                    'update' => function ($url, $model) {
                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada id_destinatario                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['notificaciones/cor-destinatario/deletep','id' => $model->id_destinatario],true);
                            return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>',$url2,[
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t('yii', '¿Desea Eliminar el Regitro?'),
                            ]);
                    }
                                        
                                        
            ],
			
			
	],
        ],
    ]); ?>
</div>
