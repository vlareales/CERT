
// EDITAR USUARIOS



$(".btnEditarUsuario").click(function(){


	var idUsuario = $(this).attr("idUsuario");
	 

	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax();

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos, 
		cache: false,
		contentType: false,
		processData: false, 
		dataType: "json",
		success: function(respuesta){

			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").html(respuesta["perfil"]);
		}

})