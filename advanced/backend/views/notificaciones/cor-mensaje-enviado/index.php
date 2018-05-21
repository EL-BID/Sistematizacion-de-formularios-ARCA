<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\notificaciones\CorMensajeEnviadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cor Mensaje Enviados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cor-mensaje-enviado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php  //=Html::button('Nuevo Mensaje Enviado', 
        //['value' =>Url::to(['notificaciones/cor-mensaje-enviado/create']), 'title' => 'Nuevo Mensaje Enviado',
        //'class' => 'showModalButton btn btn-success']); 
    ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_mensaje_enviado',
            'cor_parametro:ntext',
            'cor_destinatario:ntext',
            'asunto',
            'id_correo',

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => ' {view}  {delete}', //{update}
                'buttons' => [
                    'view' => function($url, $model){
                            return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>',Yii::getAlias($url),[
                                    'title' => Yii::t('app', 'View'),
                                    'data-method' => 'post',
                            ]);
                    },
//                    'update' => function ($url, $model) {
//                            return Html::button('<span class="glyphicon glyphicon-pencil">Editar</span>',  ['value'=>$url,
//                                         'class' => 'btn btn-default btn-xs showModalButton',
//                            ]);
//                    }, //Primera columna encontrada id_mensaje_enviado                    
                    'delete' => function($url, $model){
                            $url2 = Url::toRoute(['notificaciones/cor-mensaje-enviado/deletep','id' => $model->id_mensaje_enviado],true);
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
