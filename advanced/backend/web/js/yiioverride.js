$(function () {

/*------------------------------------------------------------------------------------------------*/
/*---------------------------------Funcion para el TOOLTIP----------------------------------------*/
/*------------------------------------------------------------------------------------------------*/
	
$('[data-toggle="tooltip"]').tooltip({
    placement: "right",
    trigger: "focus hover"
});



/*------------------------------------------------------------------------------------------------*/
/*--------------------------Funcion Ventana Emergente GridView------------------------------------*/
/*------------------------------------------------------------------------------------------------*/

$(document).on('click','.showModalButton', function(){
	if ($('#modal').data('bs.modal').isShown){
		 $('#modal').find('#modalContent')
                    .load(''+$(this).attr('value')+'');
	}else{
		$('#modal').modal('show')
				.find('#modalContent')
				.load(''+$(this).attr('value')+'');
		//document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
	}
});


});


$(document).on('click','.buttonotify', function(){
     $(".notify").toggle();
});





/*------------------------------------------------------------------------------------------------*/
/*--------------------------Funcion Confirmación Submit-------------------------------------------*/
/*------------------------------------------------------------------------------------------------*/

$('#create-form').submit(function (e, params) {
        var localParams = params || {};

        if (!localParams.send) {
            e.preventDefault();
        }

           //Entradas adicionales de validación

    swal({
                title: "Solicitud de Confirmacion",
                text: "Estas seguro de Guardar los Datos?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#6A9944",
                confirmButtonText: "Confirmar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: true
            }, function (isConfirm) {
                if (isConfirm) {
                    $(e.currentTarget).trigger(e.type, { 'send': true });
                } else {

              //Funciones adicionales cuando se cancela 

            }
    });
});


/*------------------------------------------------------------------------------------------------*/
/*--------------------------Reemplazo Ventana de Confirmación--------------------------------------*/
/*Variables a recibir:  @message => Mensaje que se debe mostrar en la ventana de confirmacion, esta variable es un string concatenado, debe contener dos datos separados por "::" (dato1::dato2) el dato 1 es el mensaje a mostrar en pantalla y el dato2 es la url completa de redireccionamiento ver ejemplo en /view/clientesprueba/index.php funcion deletep
/*------------------------------------------------------------------------------------------------*/

yii.allowAction = function ($e) {
        var message = $e.data('confirm');
		var id=$e.data('id');
        return message === undefined || yii.confirm(message,$e,id);
};
	
yii.confirm = function (message, $e, id) {
	
   var datos=message.split('::');
   swal({
       title: datos[0],
       type: 'warning',
       showCancelButton: true,
       closeOnConfirm: false,
       allowOutsideClick: true
   }, function(isConfirm){
		if (isConfirm) {
			window.location=datos[1];
		} else {

			  //Funciones adicionales cuando se cancela 

		}
   });
};



