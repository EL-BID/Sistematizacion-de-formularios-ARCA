<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaAnalisisHidrologicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'CDA Análisis Hidrológico';
$this->params['breadcrumbs'][] = $this->title;

//Atrayendo pagina inmediatamente anterior
$regresarurl='cda/cdatramite/subproceso';
$_urlregresar = \Yii::$app->urlManager->createUrl([$regresarurl, 'id_cda_tramite' => $id_cda_tramite, 'labelmiga' => $labelmiga]);

?>
<div class="cda-analisis-hidrologico-index">

   <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title); ?></h1></div>
    
    
    <div class="aplicativo table-responsive">
   <!------------------div con class="aplicativo"-------------------------------------->
              <!----------------------------------Boton de Regresar---------------------------->
            <table>
                <tr>
                    <td>
                       <?php echo Html::button("Continuar",
                            ['class'=>'btn btn-default btn-xs',
                                'onclick'=>"window.location.href = '" . $_urlregresar . "';",
                                'data-toggle'=>'Regresar'
                            ]
                        ); ?>
                    </td>
                </tr>
            </table>
            

           <!----------------------------------Encabezado------------------------------------>
            <?= $encabezado ?>

               <p>
            <?php

                if ($enableCreate == true) {
                    echo Html::button('Registrar Análisis',
                    ['value' => Url::to(['cda/cdaanalisishidrologico/create',
                        'labelmiga' => $labelmiga,
                        'id_cda_tramite' => $id_cda_tramite,
                        'id_cproceso' => $id_cproceso,
                        'actividadactual' => $actividadactual,
                        'tipo' => $tipo, 'pscactividadproceso' => $id_cactividad_proceso, ]), 'title' => 'Registrar Análisis Hidrológico',
                     'class' => 'showModalButton btn btn-success', ]);
                }
            ?>
           </p>
    
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

			[
				  'attribute' => 'idCodCda.cod_cda',
				  'value' => 'idCodCda.cod_cda',
				  'label' => 'Cod. CDA',
			],
                        [
				  'attribute' => 'nom_cartografia',
				  'value' => 'idCartografia.nom_cartografia',
				  'label' => 'Cartografía',
			],
			[
				  'attribute' => 'id_ehidrografica',
				  'value' => 'idEhidrografica.nom_ehidrografica',
				  'label' => 'Estación Hidrográfica',
			],
                        [
				  'attribute' => 'cod_ehidrografica_base',
				  'value' => 'idEhidrografica.cod_ehidrografica_base',
				  'label' => 'Código E. Hidrográfica Base',
			],
			[
				  'attribute' => 'id_emeteorologica',
				  'value' => 'idEmeteorologica.nom_emeteorologica',
				  'label' => 'Estación Meteorológica',
			],
                        [
				  'attribute' => 'cod_emeteorologica_base',
				  'value' => 'idEmeteorologica.cod_emeteorologica_base',
				  'label' => 'Código E. Meteorológica Base',
			],
			[
				  'attribute' => 'nom_metodologia',
				  'value' => 'idMetodologia.nom_metodologia',
				  'label' => 'Metodología',
			],

            // 'id_cod_cda',
            'informe_utilizado',
            'probabilidad',
            'observacion',

            [
			
                'class' => 'yii\grid\ActionColumn',
                            'header' => 'Acción',
                            'template' => '{update} ',
                            'buttons' => [
                                'update' => function ($url, $model) use ($labelmiga,$id_cda_tramite,$actividadactual,$id_cproceso,$id_cactividad_proceso) {
                                       $url2 = Url::toRoute(['cda/cdaanalisishidrologico/update','id' => $model->id_analisis_hidrologico,
                                                             'id_cda_tramite'=>$id_cda_tramite,
                                                             'id_cproceso'=>$id_cproceso,
                                                              'actividadactual'=>$actividadactual,
                                                              'labelmiga'=>$labelmiga,'tipo'=>'2','pscactividadproceso'=>$id_cactividad_proceso],true);
                                      
                                       return Html::button('<span class="glyphicon glyphicon-pencil"/>',  ['value'=>$url2,
                                                     'class' => 'btn btn-default btn-xs showModalButton','title'=>'Modificar Análisis Hidrológico '
                                        ]);
                                }, //Primera columna encontrada id_reporte_informacion
                                'delete' => function ($url, $model) {
                                    $url2 = Url::toRoute(['cdaanalisishidrologico/deletep', 'id' => $model->id_error], true);

                                    return Html::a('<span class="glyphicon glyphicon-trash">Borrar</span>', $url2, [
                                                'title' => Yii::t('app', 'Delete'),
                                                'data-method' => 'post',
                                                'data-confirm' => Yii::t('yii', 'Desea Eliminar el Regitro?'),
                                        ]);
                                },
               ],
			
			
			],
        ],
    ]); ?>
</div>
