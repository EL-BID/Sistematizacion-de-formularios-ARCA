<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html> 
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?=  Yii::$app->homeUrl; ?>
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    
    $menuItems[]=['label' =>'Notificaciones',  'url' => ['notificaciones/tar-tarea-programada'],
                            'items' => [
                                                    ['label' => 'Tarea Programada', 'url' => ['notificaciones/tar-tarea-programada']],
                                                    ['label' => 'Tipo Destinatario', 'url' => ['notificaciones/cor-tipo-destinatario']],
                                                    ['label' => 'Tipo Parametro', 'url' => ['notificaciones/cor-tipo-parametro']],
                                                    ['label' => 'Destinatario', 'url' => ['notificaciones/cor-destinatario']],
                                                    ['label' => 'Parametro', 'url' => ['notificaciones/cor-parametro']],
                        ['label' => 'Correo', 'url' => ['notificaciones/cor-correo']],
                        ['label' => 'Mensaje Enviado', 'url' => ['notificaciones/cor-mensaje-enviado']]
                                                    ],	
                            ];
     $menuItems[] = ['label' => 'Crear Usuarios', 'url' => ['/site/create-user']];
     
     $prueba = '@frontend/manual.php';
     $menuItems[]=['label' =>'Wiki',
				'items' => [
					['label' => 'Manual', 'url' => '../../frontend/web/manual.php'],
					/*['label' => 'Tarifarios', 'url' => ['#']],*/ 
					],	
				];  
     
     
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->usuario . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
       $menuItems= common\components\AutoUserCp::getMenuHorizontal();
       
         // array_merge($menuItems,$itemsUsuario );
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <!------------------------------------------------------------------------------------------>
	<!-----------------MIGA DE PAN-------------------------------------------------------------->
	<!------------------------------------------------------------------------------------------>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <!------------------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------------------>

        <!------------------------------------------------------------------------------------------>
        <!--ACTIVA LA VENTANA MODAL PARA LOS FORMULARIOS-------------------------------------------->
        <!------------------------------------------------------------------------------------------>
        <?php
                yii\bootstrap\Modal::begin([
                //'headerOptions' => ['id' => 'modalHeader'],
                'id' => 'modal',
                'size' => 'modal-lg',
                //'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
                ]);
                echo "<div id='modalContent'></div>";
                yii\bootstrap\Modal::end();
        ?>
        <!------------------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------------------>


        <!--PERSONALIZACION A LA PLANTILLA PARA CONTENER MENU VERTICAL-->
        <!--@itemsmn trae los enlaces para agregar en el menu vertical-->
        <?php 

                if(isset($this->params['itemsmn'])){		//PRESENTACION DE PLANTILLA CON MENU VERTICAL============================
        ?>
                <div class="row">
                        <div class="col-xs-1 col-md-1">

                                <?php
                                        echo SideNav::widget(['items' => $this->params['itemsmn'],'type' => SideNav::TYPE_DEFAULT, 'heading' => false]);
                                ?>
                        </div>
                        <div id="content" class="col-xs-10 col-sm-10 col-md-10">
                                <?= $content ?>
                        </div>
                </div>
        <?php

                }else{									//PRESENTACION DE PLANTILLA SIN MENU VERTICAL==================================	

                        echo $content;

                }
        ?>

		
		
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
