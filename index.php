<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/general.css">
	<title>Chat php</title>
</head>
<body>
	<div class="container-fluid">
		<section class="section1">
			<div class="row">
				<h1 class="text-center">Chat: <small></small></h1>
				<hr>
			</div>
			<div class="row">
				<form  id="formChat" role="form">
					<div class="form-group">
						<label for="user">Usuario</label>
						<input type="text" class="form-control" id="user" name="user" placeholder="Ingresa usuario">
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<div id="conversation" class="conversacion">
									
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="message">Mensaje</label>
						<textarea name="message" id="message" placeholder="Ingresa texto" class="form-control" rows="3"></textarea>
					</div>
					<button class="btn btn-success" id="send">Enviar</button>
				</form>
			</div>
		</section>
	</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$(document).on("ready", function(){
		registerMessages();
		$.ajaxSetup({"cache":false});
		setInterval("loadOldMessages()",500);
	});

	var registerMessages = function(){
		$("#send").on("click", function(e){
			e.preventDefault();
			var frm = $("#formChat").serialize();
			$.ajax({
				type : "POST",
				url : "registro.php",
				data : frm
			}).done(function(info){
				console.log(info);
			})
		});
	}

	var loadOldMessages = function(){
		$.ajax({
			type: "POST",
			url : "conversation.php"
		}).done(function(info){
			console.log(info);
			$("#conversation").html(info);
			$("#conversation p:last-child").css({
				"background-color": "lightgreen",
				"padding-bottom": "20px",
			});
		});
	}
</script>
</body>
</html>