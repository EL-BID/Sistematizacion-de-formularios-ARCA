<link rel="stylesheet" href="css/site.css">
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\SweetSubmitAsset;			/* Para la confirmacion, ver archivo web/js/yiioverride*/
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\hidricos\Cda */
/* @var $form yii\widgets\ActiveForm */


SweetSubmitAsset::register($this)
?>

<div class="consulta-create">
 
    <div class="headSection"><h1 class="titSection"><?= Html::encode('Formulario para consulta ciudadana') ?></h1></div>
    
    <div class="aplicativo table-responsive">
        <div class="alert alert-success">
            <strong>Datos Enviados con Exito</strong></br> 
           <?php echo Html::button("Nueva Encuesta",
                            ['class'=>'btn btn-default btn-xs',
                                'onclick'=>"window.location.href = '" . \Yii::$app->urlManager->createUrl(['consultaciudadana/index','id_fmt'=>$id_fmt]) . "';",
                                'data-toggle'=>'Regresar'
                            ]
                        ); ?>
        </div>  
    </div>
</div>

