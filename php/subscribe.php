<?php
    
    $email = $_POST['email'];

    include("conexion.php");
//    include("suscribe-response.php");



      if (empty($email) === true) {
        $emailErr = "Por favor ingresar un email";
        echo $emailErr;

      } else {
            // check if e-mail address is well-formed
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $existe = "SELECT * FROM email
                           WHERE email LIKE '$email'
                ";

                $ej1 = mysqli_query($conexion, $existe);

                if ($ej1 === false) {
                    echo "Error en la base de datos";
                } else {

                    $cant = mysqli_num_rows($ej1);
                    // echo "Tenes $cant resultados.";
                    if($cant === 0){
                        
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
                            echo "Falló la suscripción, por favor escribime a vvullioud.works@gmail.com";
                        }
                    } else {
                        echo "El email ingresado ya se encuentra en la base de datos";

                    } 


                } 
            } else {
                $emailErr = "El email ". $email ." no es valido"; 
                echo $emailErr;
            }
        }// Cierra else de validación

    
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