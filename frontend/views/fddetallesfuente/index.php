<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\poc\FdOpcionSelect;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdDetallesFuenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $numerar.' '.$nom_prta;
if (!empty($capitulo)) {
    $_urlmiga = array($migadepan, 'id_conj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado, 'capitulo' => $capitulo, 'cantones' => $cantones, 'provincia' => $provincia, 'parroquias' => $parroquias, 'periodos' => $periodos, 'antvista' => $antvista, 'focus' => $focus,'idjunta'=>$idjunta);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
} else {
    $_urlmiga = array($migadepan, 'id_conj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado, 'capitulo' => '', 'cantones' => $cantones, 'provincia' => $provincia, 'parroquias' => $parroquias, 'periodos' => $periodos, 'antvista' => $antvista, 'focus' => $focus,'idjunta'=>$idjunta);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Formato', 'url' => $_urlmiga];
}
//$_urlmiga = array($migadepan,'id_conj_rpta' => $id_cnj_rpta,'id_conj_prta' => $id_conj_prta,'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado,'capitulo'=>$capitulo,'cantones'=>$cantones,'provincia'=>$provincia,'parroquias'=>$parroquias,'periodos'=>$periodos,'antvista'=>$antvista) ;
//$this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-detalles-fuente-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 <div class="aplicativo">
    <p>

        
         <?= ($btnadd === true) ? Html::button('Adicionar',
        ['value' => Url::to(['fddetallesfuente/createdetcapitulo',
                            'id_fmt' => $id_fmt,
                            'id_version' => $id_version,
                            'id_conj_prta' => $id_conj_prta,
                            'id_cnj_rpta' => $id_cnj_rpta,
                            'id_capitulo' => $id_capitulo,
                            'id_prta' => $id_prta,
                            'id_rpta' => $id_rpta,
                            'nom_prta' => $nom_prta,
                            'numerar' => $numerar,
                            'estado' => $estado,
                            'capitulo' => $capitulo,
                            'cantones' => $cantones,
                            'provincia' => $provincia,
                            'parroquias' => $parroquias,
                            'periodos' => $periodos,
                            'antvista' => $antvista,
                            'migadepan' => $migadepan,
                            'focus' => $focus,
                            'idjunta' => $idjunta,
                            ]), 'title' => 'Adicionar',
        'class' => 'showModalButton btn btn-success', ]) : ''; ?>
       
       <?php echo Html::a('Regresar', $_urlmiga, ['class' => 'btn btn-default']); ?>
    </p>
    	<?php
        if ($botton === false) {
            $_adbutton = '{update}{delete}';
        } else {
            $_adbutton = '';
        }       
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'options'=>['style'=>'table-layout:fixed; font-size:13px;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_detalles_fuente',
            //'nombre_fuente',
            ['attribute' => 'nombre_fuente', 'label' => 'Nombre o lugar de la fuente' ],
            //'id_t_fuente',
            ['attribute' => 'id_t_fuente', 'label' => 'Tipo de la fuente' ,'value'=>
            function ($data)
            {            
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->id_t_fuente])
                        ->one(); 
                        if(!empty($_nombrevalor))
                return $_nombrevalor->nom_opcion_select;
            }
            ],                     
            //'especifique',
            //'coor_x',
            ['attribute' => 'coor_x', 'label' => 'X(m)' ],
            //'coor_y',
            ['attribute' => 'coor_y', 'label' => 'Y(m)' ],
            //'coor_z',
            ['attribute' => 'coor_z', 'label' => 'Cota(m)' ],
            // 'autorizacion_senagua',
            ['attribute' => 'autorizacion_senagua', 'label' => 'La fuente cuenta con autorización de Senagua' ,'value'=>
            function ($data)
            {
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->autorizacion_senagua])
                        ->one();
                        if(!empty($_nombrevalor))
                return $_nombrevalor->nom_opcion_select;
            }
            ],
            
            // 'caudal_autorizado',
            ['attribute' => 'caudal_autorizado', 'label' => 'Caudal autorizado(l/s)' ],
            ['attribute' => 'id_problema_fuente', 'label' => 'Problemas en la fuente' ,'value'=>
            function ($data)
            {
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->id_problema_fuente])
                        ->one();
                        if(!empty($_nombrevalor))
                return $_nombrevalor->nom_opcion_select;
            }
            ],
            // 'id_problema_fuente',
            // 'id_conjunto_respuesta',
            // 'id_pregunta',
            // 'id_respuesta',
            // 'id_capitulo',

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acción',
                'template' => $_adbutton,
                'buttons' => [
                    'update' => function ($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus, $idjunta) {
                        $urlup = Url::toRoute(['fddetallesfuente/updatedetcapitulo',
                                                        'id' => $model->id_detalles_fuente,
                                                        'id_fmt' => $id_fmt,
                                                        'id_version' => $id_version,
                                                        'id_conj_prta' => $id_conj_prta,
                                                        'id_cnj_rpta' => $id_cnj_rpta,
                                                        'id_capitulo' => $id_capitulo,
                                                        'id_prta' => $id_prta,
                                                        'id_rpta' => $id_rpta,
                                                        'nom_prta' => $nom_prta,
                                                        'numerar' => $numerar,
                                                        'estado' => $estado,
                                                        'capitulo' => $capitulo,
                                                        'cantones' => $cantones,
                                                        'provincia' => $provincia,
                                                        'parroquias' => $parroquias,
                                                        'periodos' => $periodos,
                                                        'antvista' => $antvista,
                                                        'migadepan' => $migadepan,
                                                        'focus' => $focus,
                                                        'idjunta' => $idjunta,
                            ]);

                        return Html::button('<span class="glyphicon glyphicon-pencil"></span> Editar', ['value' => $urlup,
                                            'title' => 'Editar',
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada id_fuentehidrica
                    'delete' => function ($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus, $idjunta) {
                        $url2 = Url::toRoute(['fddetallesfuente/deletep',
                                                        'id' => $model->id_detalles_fuente,
                                                        'id_fmt' => $id_fmt,
                                                        'id_version' => $id_version,
                                                        'id_conj_prta' => $id_conj_prta,
                                                        'id_cnj_rpta' => $id_cnj_rpta,
                                                        'id_capitulo' => $id_capitulo,
                                                        'id_prta' => $id_prta,
                                                        'id_rpta' => $id_rpta,
                                                        'nom_prta' => $nom_prta,
                                                        'numerar' => $numerar,
                                                        'estado' => $estado,
                                                        'capitulo' => $capitulo,
                                                        'cantones' => $cantones,
                                                        'provincia' => $provincia,
                                                        'parroquias' => $parroquias,
                                                        'periodos' => $periodos,
                                                        'antvista' => $antvista,
                                                        'migadepan' => $migadepan,
                                                        'focus' => $focus, 
                                                        'idjunta' => $idjunta,
                                                        ], true);

                        return Html::button('<span class="glyphicon glyphicon-trash"></span> Borrar', ['value' => $url2,
                                        'title' => Yii::t('app', 'Borrar'),
                                    'data-method' => 'post',
                                        'class' => 'btn btn-default btn-xs',
                                        'data-confirm' => Yii::t('yii', 'Desea eliminar el registro'.'::'.$url2),
                            ]);
                    },
            ],
	],
        ],
    ]); ?>
</div>
