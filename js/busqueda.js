jQuery(document).on("submit", "#formulario",function(e){
	e.preventDefault();
	jQuery.ajax({
		url: "busqueda.php",
		type: "POST",
		dataType: 'json',
		data: $(this).serialize(),
		beforeSend: function(){
			$('#envio').val('Enviando...');
		}
	}).done(function(respuesta){
		console.log(respuesta.responseText);
		if (!respuesta.error) {
			if (respuesta.tipo="1") {

			};
		};
	}).fail(function(resp){
		console.log(resp.responseText);
	}).always(function(res){
		console.log(res.responseText);
	});
});