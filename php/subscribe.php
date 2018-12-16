<?php
    
    $email = $_POST['email'];
    
    include("conexion.php");
    

    if($email === ""){
		echo "No completaste todos los campos!";
	} else {

		
		// 2. Genero la query
        $insertar = "INSERT INTO email
        VALUES(
            NULL,
            '$email'
        )";

        // 3. Ejecutamos la query
        $ej = mysqli_query($conexion, $insertar);

        // 4. Preguntamos si funcionó
        if($ej === true){
            echo "¡Muchas gracias por suscribirte, vas a ser de los primeros en enterarte!";
        } else {
            echo "Falló la suscripción, por favor escribime a vv.works@gmail.com";
        }
		
	} // Cierra else de validación


?>