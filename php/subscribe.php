<?php
    
    $email = $_POST['email'];

    include("conexion.php");


      if (empty($email) === true) {
        $emailErr = "Por favor ingresar un email";
        echo $emailErr;

      } else {
            // check if e-mail address is well-formed
            if ($email) {
            $emailErr = "El email ingresado no es valido"; 
            echo $emailErr;
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
                    echo "¡Muchas gracias por suscribirte, vas a ser de los primeros en enterarte!" . $email;
                    //echo filter_var($email, FILTER_VALIDATE_EMAIL);

                } else {
                    echo "Falló la suscripción, por favor escribime a vv.works@gmail.com";
                }
            }
      } // Cierra else de validación

    
/*    

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        
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

	} else {

        echo "El email ingresado no es valido";
		
	} // Cierra else de validación

*/
?>