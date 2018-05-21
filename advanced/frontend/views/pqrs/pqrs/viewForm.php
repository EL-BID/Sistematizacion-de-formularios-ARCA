
<?php


if($tipo == 'peticion'){
    echo $this->render('_formpeticion', ['model'=>$model]);
}else if($tipo == 'queja'){
    echo $this->render('_formquejareclamo', ['model'=>$model]);
}else if($tipo == 'denuncia'){
    echo $this->render('_formdenuncia', ['model'=>$model]);
}else if($tipo == 'felicitacion'){
    echo $this->render('_formsugerenciafelicitacion', ['model'=>$model]);
}

?>