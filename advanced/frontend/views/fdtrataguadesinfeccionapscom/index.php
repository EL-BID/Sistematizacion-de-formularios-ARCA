<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\poc\FdOpcionSelect;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdTrataguaDesinfeccionApscomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $numerar.' '.$nom_prta;
if (!empty($capitulo)) {
    $_urlmiga = array($migadepan, 'id_conj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado, 'capitulo' => $capitulo, 'cantones' => $cantones, 'provincia' => $provincia, 'parroquias' => $parroquias, 'periodos' => $periodos, 'antvista' => $antvista, 'focus' => $focus,'idjunta'=>$idjunta);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Capitulo', 'url' => $_urlmiga];
} else {
    $_urlmiga = array($migadepan, 'id_conj_rpta' => $id_cnj_rpta, 'id_conj_prta' => $id_conj_prta, 'id_fmt' => $id_fmt, 'last' => $id_version, 'estado' => $estado, 'capitulo' => '', 'cantones' => $cantones, 'provincia' => $provincia, 'parroquias' => $parroquias, 'periodos' => $periodos, 'antvista' => $antvista, 'focus' => $focus,'idjunta'=>$idjunta);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Formato', 'url' => $_urlmiga];
}

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fd-tratagua-desinfeccion-apscom-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="aplicativo">
    <p>
         <?= ($btnadd === true) ? Html::button('Adicionar',
        ['value' => Url::to(['fdtrataguadesinfeccionapscom/createdetcapitulo',
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
                            'idjunta'=>$idjunta,]), 'title' => 'Adicionar',
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

            //'id_trat_aguadesinf_apscom',            
            ['attribute' => 'ubicacion_lug_tratamiento', 'label' => 'Lugar Tratamiento'],                        
            ['attribute' => 'realiza_desinfeccion', 'label' => 'Realiza desinfección' ,'value'=>
                    function ($data)
                    {            
                        $_nombrevalor = FdOpcionSelect::find()
                                ->where(['id_opcion_select'=>$data->realiza_desinfeccion])
                                ->one(); 
                        if(!empty($_nombrevalor))
                          return $_nombrevalor->nom_opcion_select;
                    }
            ],
            ['attribute' => 'metodo_desinfeccion', 'label' => 'Método de desinfección' ,'value'=>
                    function ($data)
                    {            
                        $_nombrevalor = FdOpcionSelect::find()
                                ->where(['id_opcion_select'=>$data->metodo_desinfeccion])
                                ->one();      
                        if(!empty($_nombrevalor))
                          return $_nombrevalor->nom_opcion_select;
                    }
            ],
            
            ['attribute' => 'especifique_otro_metdesinf', 'label' => 'Otro método de desinfección'],             
            ['attribute' => 'mide_salida_desinfeccion', 'label' => 'Mide desinfección a la salida' ,'value'=>
                    function ($data)
                    {            
                        $_nombrevalor = FdOpcionSelect::find()
                                ->where(['id_opcion_select'=>$data->mide_salida_desinfeccion])
                                ->one();
                        if(!empty($_nombrevalor))        
                          return $_nombrevalor->nom_opcion_select;
                    }
            ],             
            ['attribute' => 'estado_func_sistema', 'label' => 'Estado del sistema' ,'value'=>
                    function ($data)
                    {            
                        $_nombrevalor = FdOpcionSelect::find()
                                ->where(['id_opcion_select'=>$data->estado_func_sistema])
                                ->one();   
                        if(!empty($_nombrevalor))
                          return $_nombrevalor->nom_opcion_select;
                    }
            ],             
            ['attribute' => 'problemas_identificados', 'label' => 'Problemas idetificados' ,'value'=>
                    function ($data)
                    {            
                        $_nombrevalor = FdOpcionSelect::find()
                                ->where(['id_opcion_select'=>$data->problemas_identificados])
                                ->one();   
                        if(!empty($_nombrevalor))
                          return $_nombrevalor->nom_opcion_select;
                    }
            ],
            ['attribute' => 'especifique_otros_problemas', 'label' => 'Otros problemas'],
            // 'id_conjunto_respuesta',
            // 'id_pregunta',
            // 'id_respuesta',
            // 'id_capitulo',
            // 'id_junta',

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => $_adbutton,
                'buttons' => [
                    
                    'update' => function ($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus,$idjunta) {
                        $urlup = Url::toRoute(['fdtrataguadesinfeccionapscom/updatedetcapitulo',
                                                        'id' => $model->id_trat_aguadesinf_apscom,
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
                                                        'idjunta'=>$idjunta,
                                                        ]);

                        return Html::button('<span class="glyphicon glyphicon-pencil"></span> Editar', ['value' => $urlup,
                                            'title' => 'Editar',
                                         'class' => 'btn btn-default btn-xs showModalButton',
                            ]);
                    }, //Primera columna encontrada id_info_comunida                   
                    'delete' => function ($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus,$idjunta) {
                        $url2 = Url::toRoute(['fdtrataguadesinfeccionapscom/deletep',
                                                        'id' => $model->id_trat_aguadesinf_apscom,
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
                                                        'idjunta'=>$idjunta,], true);

                        return Html::button('<span class="glyphicon glyphicon-trash"></span> Borrar', ['value' => $url2,
                                        'title' => Yii::t('app', 'Borrar'),
                                    'data-method' => 'post',
                                        'class' => 'btn btn-default btn-xs',
                                        'data-confirm' => Yii::t('yii', 'Desea eliminar el registro'.'::'.$url2),
                            ]);
                    }
                                        
                                        
            ],
			
			
	],
        ],
    ]); ?>
</div>
