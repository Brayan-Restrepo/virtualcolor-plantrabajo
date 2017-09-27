
$(document).ready(function() {
	
	$(".textarea").wysihtml5();

	$('#btn-guardar-plantrabajo').click(function(event) {

		$.ajax({
			type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: 'plantrabajo',
		    data: { 
		        fecha_inicio: $('#fecha-inicio').val(),
		        fecha_finalizacion: $('#fecha-finalizacion').val(),
		        responsable: $('#responsable').val(),
		        avance: $('#avance').val(),
		        objetivo: $('#objetivo').val(),
		        ruta_imagen: 'ruta-----'
		    },
            dataType: 'json',
            success: function(data){
            	$('#responsable-actividad').val(data.responsable);
            	$('#plan_trabajo_id').val(data.id);
            	$('#btn-guardar-actividad').removeAttr('disabled');
            	$('#sede').removeAttr('disabled');
            	$('#actividad').removeAttr('disabled');
            	
            	$('#fecha-inicio').attr('disabled', '');
            	$('#fecha-finalizacion').attr('disabled', '');
            	$('#responsable').attr('disabled', '');
            	$('#avance').attr('disabled', '');
            	$('#objetivo').attr('disabled', '');
            	$('#btn-guardar-plantrabajo').attr('disabled', '');
            },
            error: function(data){
            }
		});
	});

	$('#btn-guardar-actividad').click(function(event) {

		$.ajax({
			type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: 'plantrabajo/actividad',
		    data: { 
		    	plan_trabajo_id: $('#plan_trabajo_id').val(),
		        sede: $('#sede').val(),
		        actividad: $('#actividad').val()
		    },
            dataType: 'json',
            success: function(data){
            	$('#sede').val('');
            	$('#actividad').val('');

            	datosTabla(data);
                
                $('.eliminar_actividad').unbind( "click" );
                $('.eliminar_actividad').click(eliminarActividad);

                $('.editar_actividad').unbind( "click" );
                $('.editar_actividad').click(editarActividad);
            },
            error: function(data){
            }
		});
	});			

	$('#btn-editar-actividad').click(function(event) {
		var id_actividad = $('#actividad_id').val();
		$.ajax({
			type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: 'plantrabajo/actividad/'+id_actividad,
		    data: { 
		    	plan_trabajo_id: $('#plan_trabajo_id').val(),
		        sede: $('#sede').val(),
		        actividad: $('#actividad').val()
		    },
            dataType: 'json',
            success: function(data){
            	$('#sede').val('');
            	$('#actividad').val('');
            	
            	$('#'+data.id).closest('tr').remove();

				datosTabla(data);            	
                
                                
                $('.eliminar_actividad').unbind( "click" );
                $('.eliminar_actividad').click(eliminarActividad);

                $('.editar_actividad').unbind( "click" );
                $('.editar_actividad').click(editarActividad);

                $('#btn-editar-actividad').addClass('hide');
            	$('#btn-guardar-actividad').removeClass('hide')
            },
            error: function(data){
            }
		});
	});			

	function datosTabla(data){
		var nuevaFila = '<tr id='+data.id+'><td>'+data.sede+'</td>';
		nuevaFila += '<td>'+data.actividad+'</td>';
		nuevaFila += '<td>'+data.responsable+'</td>';
		nuevaFila += '<td>'+data.avance+'</td>';
		nuevaFila += '<td>'+data.fecha_inicio+'</td>';
		nuevaFila += '<td>'+data.fecha_finalizacion+'</td>';
        nuevaFila += "<td><a data-id="+data.id+" class='btn btn-sm btn-primary btn-espacio5 editar_actividad'>Editar</a> <a data-id="+data.id+" class='btn btn-sm btn-danger eliminar_actividad'>Eliminar</a></td></tr>";
        $("#tabla-actividades").append(nuevaFila);
	}

	function eliminarActividad(){
		var id_actividad = $(this).data("id");
		$.ajax({
			type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: 'plantrabajo/actividad/'+id_actividad,
            dataType: 'json',
            success: function(data){
            	$('#'+id_actividad).closest('tr').remove();
            },
            error: function(data){
            }
		});
	}

	function editarActividad(){
		var id_actividad = $(this).data("id");
		$.ajax({
			type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: 'plantrabajo/actividad/'+id_actividad+"/edit",
            dataType: 'json',
            success: function(data){
            	$('#sede').val(data.sede);
            	$('#actividad').val(data.actividad);
            	$('#actividad_id').val(data.id);
            	
            	$('#btn-editar-actividad').removeClass('hide');
            	$('#btn-guardar-actividad').addClass('hide')
            },
            error: function(data){
            }
		});
	}
});
	