<?php

    $company = $_POST['company'];    
    $project = $_POST['project'];
    $contact = $_POST['contact'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    include("conexion.php");
    

    if($email === "" OR $name === "" OR $company === "" OR $project === "" OR          $contact === ""){
		echo "No completaste todos los campos!";
	} else {

        // check if e-mail address is well-formed
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            $insertarData = "INSERT INTO information
            VALUES(
                NULL,
                '$email',
                '$name',
                '$company',
                '$project',
                '$contact'
            )";

            // 3. Ejecutamos la query
            $ej2 = mysqli_query($conexion, $insertarData);

            // 4. Preguntamos si funcionó
            if($ej2 === true){
                echo "¡Muchas gracias por ponerte en contacto conmigo, en breves me voy a estar contactando!";

                //include("suscribe-response.php");
                // Uno o varios mails entre " y separados con ,
                $destino = "vvullioud.works@gmail.com,
                            vicky.vullioud@gmail.com";
                
                
                $cuerpo = "$name de $company se ha puesto en contacto con vos acerca de un proyecto de $project. Eligió que lo contactes por $contact, su email es $email";

                /*
                1. Destinatario
                2. Asunto del mail
                3. Cuerpo del mail
                4. Headers (opcional)
                */
                mail(
                $destino,
                "Mail desde vv-works",
                $cuerpo
                );

                $cabeceras = 'From: Mensajes y avisos <vvullioud.works@gmail.com>';

                mail(
                $email,
                "Contacto realizado con éxito",
                "Muchas gracias por ponerte en contacto conmigo, en breves me voy a estar contactando.",
                $cabeceras
                );

            } else {
                echo "Falló el formulario de contacto, por favor escribime a vvullioud.works@gmail.com";
            }
        } else {
            echo "El email ingresado no es válido";
        } 

    }// Cierra else de validación




        /*

		
        // 2. Genero la query

        $insertarData = "INSERT INTO information
        VALUES(
            '$email',
            '$name',
            '$company',
            '$project',
            '$contact'
        )";

        // 3. Ejecutamos la query
        $ej2 = mysqli_query($conexion, $insertarData);


        // 4. Preguntamos si funcionó
        if($ej2 === true){
        echo "Yay!";
        } else {
        echo "Nope, mira el SQL";
        }
		
	} // Cierra else de validación

*/
?>