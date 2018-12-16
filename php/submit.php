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


?>