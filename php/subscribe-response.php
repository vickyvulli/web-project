<?php
	// Conseguimos los datos del form
	$email  = $_POST['email'];
	
	// Uno o varios mails entre " y separados con ,
	$destino = "vvullioud.works@gmail.com,
			    vicky.vullioud@gmail.com";
				
				
	$cuerpo = "$email se han suscrito a tu newsletter";
	
	/*
		1. Destinatario
		2. Asunto del mail
		3. Cuerpo del mail
		4. Headers (opcional)
	*/
	mail(
		$destino,
		"Mail desde web",
		$cuerpo
	);
	
	$cabeceras = 'From: Mensajes y avisos <vvullioud.works@gmail.com>';
	
	mail(
		$email,
		"Suscripción a vv-works",
		"Muchas gracias por suscribirte, dentro de poco vas a recibir novedades.",
		$cabeceras
	);
	
?>