<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\hidricos\CdaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle Proceso';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cda-index">

    <div class="headSection"><h1 class="titSection"><?= Html::encode($this->title) ?></h1></div>
    
    <!------------------div con class="aplicativo"-------------------------------------->
    <div class="aplicativo table-responsive">
        
        <!----------------------------------Boton de Regresar---------------------------->
        <?php echo Html::button("Regresar",
                ['class'=>'btn btn-default btn-xs',
                    'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cda/cda/pantallaprincipal']) . "';",
                    'data-toggle'=>'Regresar'
                ]
            ); ?>
        
        <table class="table table-bordered">
            <!----------------------------INICIA CABEZOTE DATOS BASICOS --------------------------------->
            <tr>
                <td class="datosbasicos1"> Numero CDA </td>
                <td class="datosbasicos2">
                    <table width="100%">
                        <tr>
                            <td width="50%"><?= $numero; ?></td>
                            <td width="50%" align="center"> 
                                <?php
                                  echo Html::button("Ver",
                                            ['class'=>'btn btn-default btn-xs',
                                                'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['cda/cda/updateproceso','id_cda' => $id_cda,'tipo' =>2,'ult_id_actividad'=>$ult_id_actividad]) . "';",
                                                'data-toggle'=>'Datos Administrativos'
                                            ]
                                        );
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td class="datosbasicos1"> Fecha Ingreso </td>
                <td class="datosbasicos2"><?= $fecha_ingreso ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Numero de Quipux </td>
                <td class="datosbasicos2"><?= $arca; ?></td>
                <td class="datosbasicos1"> Estado </td>
                <td class="datosbasicos2"><?= $nom_eproceso; ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Responsable </td>
                <td class="datosbasicos2"><?= $usuario_accion; ?></td>
                <td class="datosbasicos1"> Fecha de Solicitud </td>
                <td class="datosbasicos2"><?= $fecha_solicitud ?></td>
            </tr>
            <tr>
                <td class="datosbasicos1"> Fecha Ultima Actividad </td>
                <td class="datosbasicos2"><?= $ult_fecha_actividad ?></td>
                <td class="datosbasicos1"> Fecha Ultimo Estado </td>
                <td class="datosbasicos2"><?= $ult_fecha_estado ?></td>
            </tr>
           <!-----------------------------------FIN CABEZOTE DATOS BASICOS -------------------------------> 
            
            <!----------------------------INICIA ACCIONES GENERALES---------------------------------------->
            <tr>
                <td colspan="4"> 
                    <table width="100%">
                        <tr>
                            
                    <?php 
                            /**************************IMPRIMIENDO BOTON DATOS BASICOS*******************************/
                            if($validaciones['editardatosbasicos'] === TRUE){
                                
                                echo "<td>".yii\helpers\Html::button("EDITAR DATOS BASICOS", 
                                                        ["value"=>yii\helpers\Url::toRoute([$url_datos_basicos,'id'=>$id_cproceso,'tipo'=>1,'id_cda'=>$id_cda],true),
                                                         "class" => "btn btn-default btn-xs showModalButton","title"=>'Datos Básicos'
                                                        ])."</td>";
                            }
                            
                            echo "<td>".yii\helpers\Html::button("HISTORICO ESTADOS", 
                                                        ["value"=>yii\helpers\Url::toRoute(["cda/ps-historico-estados/indexestados",'id_cproceso'=>$id_cproceso,'tipo'=>'2'],true),
                                                         "class" => "btn btn-default btn-xs showModalButton","title"=>'Histórico Estados'
                                                        ])."</td>";
                            
                            
                            echo "<td>".yii\helpers\Html::button("OFICIOS RELACIONADOS", 
                                                        ["value"=>yii\helpers\Url::toRoute(["cda/ps-actividad-quipux/indexdetproceso",'id_cproceso'=>$id_cproceso],true),
                                                         "class" => "btn btn-default btn-xs showModalButton","title"=>'Oficios Relacionados'
                                                        ])."</td>";
                            
                            echo "<td>".yii\helpers\Html::button("RESPONSABLES", 
                                                        ["value"=>yii\helpers\Url::toRoute(["cda/ps-responsables-proceso/indexdetproceso",'id_cproceso'=>$id_cproceso],true),
                                                         "class" => "btn btn-default btn-xs showModalButton","title"=>'Responsables'
                                                        ])."</td>";
                            
                            if($validaciones['asignarresponable'] === TRUE){
                                echo "<td>".yii\helpers\Html::button("ASIGNAR RESPONSABLES", 
                                                            ["value"=>yii\helpers\Url::toRoute(["cda/ps-responsables-proceso/createdetproceso",'id_cproceso'=>$id_cproceso,'id_cda'=>$id_cda],true),
                                                             "class" => "btn btn-default btn-xs showModalButton","title"=>'Asignar Responsables'
                                                            ])."</td>";
                            }
                    ?>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <!---------------------------------------------INICIA ACTIVIDADES-------------------------------------------------------->
            <!------------------------Los estilos estan en web/css/site------------------------------------------------------------>
            <tr>
                <td colspan="4"> 
                    <table width="100%" class="actividades">
                        <thead>    
                        <tr>
                            <td>Fecha de Creacion</td><td>Descripcion de la Actividad</td>
                        </tr>
                        </thead>
                        <tbody>
                    
                    <?php
                    $_nomactividadactual = $actividades[0]['idActividad']['nom_actividad'];
                    
                    foreach($actividades as $_clave){
                    ?>
                        <tr>
                            <td><?= $_clave['fecha_creacion']; ?></td>
                            <td><?= $_clave['idActividad']['nom_actividad']; ?></td>
                        </tr>
                    <?php
                    
                    
                    }
        
                    ?>
                        </tbody>
                    </table>    
                
                </td>
            </tr>
            
            <!------------------------------INICIA ACCIONES ESTATICAS Y DINAMICAS--------------------------------------------------->
            <tr>
                <td colspan="4">
                    <table width="100%">
                        <tr>
                        <?php
                        if($validaciones['editaractividad'] === TRUE){
                             echo "<td>".yii\helpers\Html::button("EDITAR ACTIVIDAD", 
                                    ["value"=>yii\helpers\Url::toRoute(["cda/ps-cactividad-proceso/updatedetproceso",'id_cactividad_proceso'=>$id_cactividad_proceso,'id_cda'=>$id_cda],true),
                                     "class" => "btn btn-default btn-xs showModalButton","title"=>'Editar Actividad'
                                    ])."</td>";
                             
                             
                             echo "<td>".yii\helpers\Html::button("ASIGNAR RESPONSABLE DE LA ACTIVIDAD", 
                                    ["value"=>yii\helpers\Url::toRoute(["cda/ps-cactividad-proceso/update",'id'=>$id_cactividad_proceso,'tipo'=>'1','id_cda'=>$id_cda],true),
                                     "class" => "btn btn-default btn-xs showModalButton","title"=>'Asignar Responsable'
                                    ])."</td>";
                        }
                        
                        if($validaciones['botondetalle'] == TRUE){
                            
                           
                           //Programacion de rutas segun la subpantalla que se encuentra ne la tabla ps_actividad
                             if($validaciones['subpantalla']== 'cda/cda/updateproceso'){
                                       
                                $_ulrsend =  yii\helpers\Url::toRoute([$validaciones['subpantalla'],'id_cda' => $id_cda, 'id_cproceso' =>$id_cproceso,'tipo'=>2,'ult_id_actividad'=>$ult_id_actividad ]);
                                    
                            }else if($validaciones['subpantalla'] == 'cda/cda/analisis'){

                                $_ulrsend =  yii\helpers\Url::toRoute([$validaciones['subpantalla'],'id_cda' => $id_cda, 'id_cproceso' =>$id_cproceso ]);

                            }else if($validaciones['subpantalla'] == 'cda/cda/registrardatos'){

                                $_ulrsend = yii\helpers\Url::toRoute([$validaciones['subpantalla'],'id_cda' => $id_cda, 'id_cproceso' =>$id_cproceso ]);

                            }else if($validaciones['subpantalla'] == 'cda/cdasolicitudinformacion/index&tipo=1'){

                                $_ulrsend =  yii\helpers\Url::toRoute(['cda/cdasolicitudinformacion/index','id_cda' => $id_cda, 'id_cactividad_proceso' =>$_id_cactividad_proceso,'tipo' => '1' ]);

                            }else if($validaciones['subpantalla'] == 'cda/cdasolicitudinformacion/index&tipo=2'){

                                 $_ulrsend =  yii\helpers\Url::toRoute(['cda/cdasolicitudinformacion/index','id_cda' => $id_cda, 'id_cactividad_proceso' =>$_id_cactividad_proceso,'tipo' => '2' ]);
                            
                            }else{
                                
                               $_ulrsend = yii\helpers\Url::toRoute([$validaciones['subpantalla'],'id_cda'=>$id_cda],true);
                            } 
                            
                           echo "<td>".yii\helpers\Html::button("DETALLE ACTIVIDAD", 
                                    ["value"=>$_ulrsend,
                                     "class" => "btn btn-default btn-xs showModalButton","title"=>$_nomactividadactual
                                    ])."</td>";
                           
                        }
                        
                        if($validaciones['gestion'] == TRUE){
                            
                           echo "<td>".yii\helpers\Html::button("REGISTRAR GESTION", 
                                    ["value"=>yii\helpers\Url::toRoute(["cda/ps-cactividad-proceso/updatedetproceso",'id_cactividad_proceso'=>$id_cactividad_proceso,'id_cda'=>$id_cda],true),
                                     "class" => "btn btn-default btn-xs showModalButton","title"=>'Registrar gestión'
                                    ])."</td>";
                           
                        }
                        
                        
                        //=================================================acciones dinamicas ================================================//
                        echo "</tr><tr>";
                        foreach($validaciones['dinamicas'] as $_actdinamicas){
                            
                            if($_actdinamicas['dinamicaguardar'] == TRUE){
                            
                                echo "<td>".yii\helpers\Html::button($_actdinamicas['nom_actividad'], 
                                         ["value"=>yii\helpers\Url::toRoute(["cda/ps-cactividad-proceso/habupdate",'id_cproceso'=>$id_cproceso,'id_cda'=>$id_cda,'id_actividad_destino'=>$_actdinamicas['id_actividad_destino'],'id_cactividad_proceso'=>$id_cactividad_proceso,'id_eproceso'=>$_actdinamicas['id_eproceso'],'id_actividad_origen'=>$_actdinamicas['id_actividad_origen']],true),
                                          "class" => "btn btn-default btn-xs showModalButton"
                                         ])."</td>";

                            }
                            
                            //pscactividadproceso/updatedetproceso
                            if($_actdinamicas['dinamicaactividad'] == TRUE){

                              echo "<td>".yii\helpers\Html::button($_actdinamicas['nom_actividad'], 
                                       ["value"=>yii\helpers\Url::toRoute(["cda/ps-cactividad-proceso/adddestino",'id_cproceso'=>$id_cproceso,'id_cda'=>$id_cda,'id_actividad_destino'=>$_actdinamicas['id_actividad_destino'],'id_cactividad_proceso'=>$id_cactividad_proceso,'id_eproceso'=>$_actdinamicas['id_eproceso'],'id_actividad_origen'=>$_actdinamicas['id_actividad_origen']],true),
                                        "class" => "btn btn-default btn-xs showModalButton"
                                       ])."</td>";

                           }
                            
                        }
                        
                        ?>
                        </tr>
                    </table>
                </td>
            </tr>
            
         </table>
    </div>    
   
</div>
