<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/limpiar.js?v=<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>" media="all">
</head>
<body>


<?php
    $servername = "localhost:3306";
    $database = "promay20_pwgymregister";
    $username = "promay20_gymregisterdb";
    $password = "gymregister#18";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    //echo "Connected successfully";
    
    $user = 1;
    $nombre = $_POST["nombre"];   
    $email = $_POST["email"];   
    $fecha = date("d-m-Y");   

    $sql = "INSERT INTO amigos (id_usuario,nombre_usuario,correo_electronico,fecha) VALUES ('$user','$nombre','$email','$fecha')";
    if (mysqli_query($conn, $sql)) {
        //echo "New record created successfully";
        echo "<script type='text/javascript'>limpiar();</script>";
        echo "<div class='formulario'>";
        echo "<h1>Amigo registrado correctamente...</h1>";
        echo "<div class='cancelar'>";
        echo "<a href='regisa_principal.php' class='boton'>Aceptar</a>";
        echo  "</div>";
        echo "</div>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>

</body>
</html>