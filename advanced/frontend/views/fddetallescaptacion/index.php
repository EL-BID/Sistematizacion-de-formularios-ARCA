<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\poc\FdOpcionSelect;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdDetallesCaptacionSearch */
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
<div class="fd-detalles-captacion-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 <div class="aplicativo">
    <p>

        
         <?= ($btnadd === true) ? Html::button('Adicionar',
        ['value' => Url::to(['fddetallescaptacion/createdetcapitulo',
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

            //'id_detalles_captacion',
            //'nombre_captacion',
            ['attribute' => 'nombre_captacion', 'label' => 'Nombre o lugar de la captación'],
            
            ['attribute' => 'id_estruc_hidrau', 'label' => 'Cuenta con estructura hidráulica de captación' ,'value'=>
            function ($data)
            {            
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->id_estruc_hidrau])
                        ->one(); 
                        if(!empty($_nombrevalor))
                return $_nombrevalor->nom_opcion_select;
            }
            ],  
            ['attribute' => 'id_material_estruc', 'label' => 'Material de la estructura' ,'value'=>
            function ($data)
            {            
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->id_material_estruc])
                        ->one();  
                        if(!empty($_nombrevalor))
                return $_nombrevalor->nom_opcion_select;
            }
            ],
            // 'id_problema_capt',
            ['attribute' => 'id_problema_capt', 'label' => 'Problemas de la captación' ,'value'=>
            function ($data)
            {
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->id_problema_capt])
                        ->one();
                        if(!empty($_nombrevalor))
                return $_nombrevalor->nom_opcion_select;
            }
            ],
            
            ['attribute' => 'id_estado_capt', 'label' => 'Estado de la captación' ,'value'=>
            function ($data)
            {
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->id_estado_capt])
                        ->one();
                        if(!empty($_nombrevalor))
                return $_nombrevalor->nom_opcion_select;
            }
            ],
            ['attribute' => 'id_t_medicion', 'label' => 'Tipo de medición' ,'value'=>
            function ($data)
            {
                $_nombrevalor = FdOpcionSelect::find()
                        ->where(['id_opcion_select'=>$data->id_t_medicion])
                        ->one();
                        if(!empty($_nombrevalor))
                return $_nombrevalor->nom_opcion_select;
            }
            ],
            ['attribute' => 'observaciones', 'label' => 'Observaciones'],
            //'id_material_estruc',
            
            // 'id_estado_capt',
            // 'id_t_medicion',
            // 'especifique_mat_estr',
            // 'especifique_probl',
            // 'especifique_t_med',
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
                        $urlup = Url::toRoute(['fddetallescaptacion/updatedetcapitulo',
                                                        'id' => $model->id_detalles_captacion,
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
                        $url2 = Url::toRoute(['fddetallescaptacion/deletep',
                                                        'id' => $model->id_detalles_captacion,
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
