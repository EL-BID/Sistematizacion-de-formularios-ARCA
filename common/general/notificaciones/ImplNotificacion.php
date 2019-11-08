<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\general\notificaciones;
use Yii;
/**
 * Description of ImplNotificacion
 *
 * @author asus1
 */
class ImplNotificacion {
    
    public static function Enviar($destinatarios,$cuerpo,$asunto){
        
         $message = \Yii::$app->mailer->compose();

        $c=0;
        if ( \yii\helpers\ArrayHelper::keyExists("DE", $destinatarios, false)){
            $deFinal=array();
            foreach($destinatarios["DE"] as $de){
                $c=$c+1;
                $deFinal[]=$de;
               
            }
             $message->setFrom($deFinal);
        }
        if($c==0){$message->setFrom(\Yii::$app->params['adminEmail']);}
        
        if ( \yii\helpers\ArrayHelper::keyExists("PARA", $destinatarios, false)){
            $paraFinal=array();
            foreach($destinatarios["PARA"] as $para){
                $paraFinal[]=$para;
            }
            $message->setTo($paraFinal);
        }
        
        if ( \yii\helpers\ArrayHelper::keyExists("CON COPIA", $destinatarios, false)){
            $paraFinal=array();
            foreach($destinatarios["CON COPIA"] as $para){
                $paraFinal[]=$para;
            }
             $message->setCc($para);
        }
        
        if ( \yii\helpers\ArrayHelper::keyExists("CON COPIA OCULTA", $destinatarios, false)){
            $paraFinal=array();
            foreach($destinatarios["CON COPIA OCULTA"] as $para){
                 $paraFinal[]=$para;
            }
            $message->setBcc($para);
        }
        
        $patternImg ='/src\s*=\s*\"(.+?)\"/'; 

        $busqueda=array();
           // echo $correo;
        preg_match_all($patternImg, $cuerpo,$busqueda);
        foreach($busqueda[1] as $imagen){
//            echo \Yii::getAlias("@app/../..$imagen");
            $cid=$message->embed( \Yii::getAlias("@app/../..$imagen"));      
            $cuerpo= str_replace($imagen,$cid,$cuerpo);
        }
       

        
        $message->setSubject($asunto);
        $message->setHtmlBody($cuerpo);
         ini_set('max_execution_time', 60); 
       $message->send();
        
        return $message;

            
    }
}
