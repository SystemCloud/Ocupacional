function crearTarifas(){
	conteo=$('#agregar_tarifa .required').length;
	variable=0;
	for(i=0;i<conteo;i++){
		if($('#agregar_tarifa .required:eq('+i+')').val()==''){
			$('#agregar_tarifa .requerido').fadeIn();
			$('#agregar_tarifa .required:eq('+i+')').css({'border-color' : 'red'})
			variable=variable+1;
		}else{
			$('#agregar_tarifa .required:eq('+i+')').css({'border-color' : '#D6D6D6'})
		}
	}
	if(variable>0){
		notification('¡Los campos marcados en rojo son obligatorios!','error','2000');
		return false;
	}
	route='tarifas';
	data=$('#agregar_tarifa').serialize();	
	var token =$('#token').val();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: data,
		success: function(msj){
			notification('Acabas de crear un nueva tarifa','success','2000');
			$('#agregar_tarifa')[0].reset();
		},
		error:function(msj){

		}
	});
	
}

function editarTarifa(){
	route='tarifas/'+actividades_id;
	data=$('#editar_tarifa').serialize();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: data,
		success: function(msj){
			actividades_id=msj.mensaje;
			$('.preload_layout').hide();
			$('#actividades_add').trigger("reset");
			abrirMenu('actividades');
			var n = noty({text: 'Acabas de actualizar la informacion del Cliente.',type: 'success',dismissQueue: true,layout: 'bottomRight',theme: 'defaultTheme',timeout: 2500});
		},
		error:function(msj){
			var n = noty({text: 'Hubo un error al momento de actualizar la informacion del Cliente, intentalo nuevamente.',type: 'error',dismissQueue: true,layout: 'bottomRight',theme: 'defaultTheme',timeout: 2500});
			$('.preload_layout').hide();
		}
	});
}