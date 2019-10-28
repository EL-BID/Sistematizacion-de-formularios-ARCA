<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\cda\CdaReporteInformacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = ['label' => 'Cda', 'url' => ['cda/cda/pantallaprincipal']];

if ($_labelmiga == 'cda/detalleproceso/index' or $_labelmiga == 'cda/cda/pantallaprincipal') {
    $_urlregresar = \Yii::$app->urlManager->createUrl(['cda/detalleproceso/index', 'id_cda' => $id_cda, '_labelmiga' => $_labelmiga]);
    $this->params['breadcrumbs'][] = ['label' => 'Detalle Proceso', 'url' => ['cda/detalleproceso/index', 'id_cda' => $id_cda, '_labelmiga' => $_labelmiga]];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Gestor de Actividades', 'url' => ['cda/ps-cproceso/index_gestor', 'tipo' => '1']];
    $_urlregresar = \Yii::$app->urlManager->createUrl(['cda/ps-cproceso/index_gestor', 'tipo' => '1']);
}
$this->title = 'Registro datos CDA';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="cda-reporte-informacion-index">

    <div class="headSection"> <h1 class="titSection"><?= Html::encode($this->title); ?></h1></div>
   
    <div class="aplicativo table-responsive">
        
    
        <p style="display: inline-block;">
         
        <?php 

            if ($_labelmiga == 'cda/cda/pantallaprincipal') {
                echo Html::button('Regresar',
                        ['class' => 'btn btn-default btn-xs',
                            'onclick' => "window.location.href = '".\Yii::$app->urlManager->createUrl(['cda/detalleproceso/index', 'id_cda' => $id_cda, '_labelmiga' => $_labelmiga])."';",
                            'data-toggle' => 'Regresar',
                        ]
                    );
            } else {
                echo Html::button('Regresar',
                        ['class' => 'btn btn-default btn-xs',
                            'onclick' => "window.location.href = '".\Yii::$app->urlManager->createUrl(['cda/ps-cproceso/index_gestor', 'tipo' => '1'])."';",
                            'data-toggle' => 'Regresar',
                        ]
                    );
            }

        ?>
        </p>
 <table class="table table-bordered">
            <tr>
                <td class="datosbasicos1"> Número <?= $nom_proceso; ?> </td>
                <td class="datosbasicos2">
                    <table width="100%">
                        <tr>
                            <td width="50%"><?= $encabezado[0]['numero']; ?></td>
                        </tr>
                    </table>
                </td>
                <td class="datosbasicos1"> Fecha Ingreso </td>
                <td class="datosbasicos2"><?= $encabezado[0]['fecha_ingreso']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Número de Quipux Arca </td>
                <td class="datosbasicos2"><?= $encabezado[0]['arca']; ?></td>
                <td class="datosbasicos1"> Enviado por: </td>
                <td class="datosbasicos2"><?= $encabezado[0]['enviadopor']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Número de Quipux Senagua </td>
                <td class="datosbasicos2"><?= $encabezado[0]['senagua']; ?></td>
                <td class="datosbasicos1"> Rol: </td>
                <td class="datosbasicos2"><?= $encabezado[0]['nom_cda_rol']; ?></td>
            </tr>
            
            <tr>
                <td class="datosbasicos1"> Responsable </td>
                <td class="datosbasicos2"><?= $encabezado[0]['usuario_accion']; ?></td>
                <td class="datosbasicos1"> Fecha de Solicitud </td>
                <td class="datosbasicos2"><?= $encabezado[0]['fecha_solicitud']; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Fecha Última Actividad </td>
                <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_actividad']; ?></td>
                <td class="datosbasicos1"> Fecha Último Estado </td>
                <td class="datosbasicos2"><?= $encabezado[0]['ult_fecha_estado']; ?></td>
            </tr>
        </table>

        <table class='table table-bordered'>
            <tr>
                <td class="datosbasicos1">Número puntos solicitados tramite</td>
                <td class="datosbasicos2"><?= $_puntos[0]; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1">Número puntos visita tecnica</td>
                <td class="datosbasicos2"><?= $_puntos[1]; ?></td>
            </tr>    
            <tr>    
                <td class="datosbasicos1">Número puntos verificados SENAGAUA</td>
                <td class="datosbasicos2"><?= $_puntos[2]; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1">Número puntos certificados</td>
                <td class="datosbasicos2"><?= $_puntos[3]; ?></td>
            </tr>
             <tr>
                <td class="datosbasicos1">Número puntos devueltos</td>
                <td class="datosbasicos2"><?= $_puntos[4]; ?></td>
            </tr>

        </table>
    </div>    
</div>
