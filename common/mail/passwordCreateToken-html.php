<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="confirm-user">
    <p>Hola <?= Html::encode($user->nombres) ?>,</p>

    <p>Se ha creado un usuario con la siguiente información:</p>
    
    <p>Usuario:<?= Html::encode($user->usuario) ?> <br>Contraseña:<?= Html::encode($user->login) ?></p>

    <?php


        

            if($user->estado_usuario!="s"){
                   
                $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/confirm', "id" => $user->id_usuario, "key" => $user->authKey]);

                    echo'<p>Por favor confirme su correo para activar el usuario en el siguiente enlace: '. Html::a(Html::encode($resetLink), $resetLink) .'</p>';

                   
            }
    ?>
    
</div>


  
