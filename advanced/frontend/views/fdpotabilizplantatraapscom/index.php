<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\poc\FdOpcionSelect;

/* @var $this yii\web\View */
/* @var $searchModel common\models\poc\FdPotabilizPlantatraApscomSearch */
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
<div class="fd-potabiliz-plantatra-apscom-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="aplicativo">
    <p>
         <?= ($btnadd === true) ? Html::button('Adicionar',
        ['value' => Url::to(['fdpotabilizplantatraapscom/createdetcapitulo',
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

            //'id_potab_plantatr_apscom',
            
            ['attribute' => 'ubicacion_lug_ptratamiento', 'label' => 'Ubicación Planta'],            
            ['attribute' => 'tipo_planta_tratatmiento', 'label' => 'Tipo de planta de tratamiento' ,'value'=>
                    function ($data)
                    {            
                        $_nombrevalor = FdOpcionSelect::find()
                                ->where(['id_opcion_select'=>$data->tipo_planta_tratatmiento])
                                ->one(); 
                        if(!empty($_nombrevalor))
                          return $_nombrevalor->nom_opcion_select;
                    }
            ],                        
            ['attribute' => 'especifique_tplantat', 'label' => 'Especifique otro tipo de planta'],            
            ['attribute' => 'metodo_desinfeccion_planta', 'label' => 'Método de desinfección' ,'value'=>
                    function ($data)
                    {            
                        $_nombrevalor = FdOpcionSelect::find()
                                ->where(['id_opcion_select'=>$data->metodo_desinfeccion_planta])
                                ->one();
                        if(!empty($_nombrevalor))                                
                          return $_nombrevalor->nom_opcion_select;
                    }
            ],       
             
             ['attribute' => 'especifique_metdesinfeccionp', 'label' => 'Especifique método de desinfección'],            
             
             ['attribute' => 'midicion_agua_tratplanta', 'label' => 'Realiza medición del agua tratada en la planta' ,'value'=>
                    function ($data)
                    {            
                        $_nombrevalor = FdOpcionSelect::find()
                                ->where(['id_opcion_select'=>$data->midicion_agua_tratplanta])
                                ->one();     
                        if(!empty($_nombrevalor))                                
                          return $_nombrevalor->nom_opcion_select;
                    }
            ],    
             
             ['attribute' => 'estado_planta', 'label' => 'Estado de la planta' ,'value'=>
                    function ($data)
                    {            
                        $_nombrevalor = FdOpcionSelect::find()
                                ->where(['id_opcion_select'=>$data->estado_planta])
                                ->one();         
                        if(!empty($_nombrevalor))
                          return $_nombrevalor->nom_opcion_select;
                    }
            ],   
             ['attribute' => 'problemas_identificados', 'label' => 'Problemas identificados'],            
            //'id_conjunto_respuesta',
            //'id_pregunta',
            // 'id_respuesta',
            // 'id_capitulo',
            // 'id_junta',

            [
			
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => ' {update} {delete}',
                'buttons' => [
                    
                    'update' => function ($url, $model) use ($id_fmt,$id_version,$id_conj_prta,$id_cnj_rpta,$id_capitulo,$id_prta,$id_rpta,$nom_prta,$numerar,$migadepan,$estado,$capitulo,$provincia,$cantones,$parroquias,$periodos,$antvista,$focus,$idjunta) {
                        $urlup = Url::toRoute(['fdpotabilizplantatraapscom/updatedetcapitulo',
                                                        'id' => $model->id_potab_plantatr_apscom,
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
                        $url2 = Url::toRoute(['fdpotabilizplantatraapscom/deletep',
                                                        'id' => $model->id_potab_plantatr_apscom,
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
