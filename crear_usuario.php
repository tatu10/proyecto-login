<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $correo= $_POST["email"];
    $contrasena = $_POST["contrasena"];
    // $persona_id = $_POST["persona_id"]; // Esto debe venir de alguna manera, por ejemplo, un formulario de selección de persona.

    // Realiza la inserción en la base de datos
    $conn = new mysqli("localhost", "root", "", "login");

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta de autenticación
    $sql = "INSERT INTO personas (nombre_completo) VALUES ('$nombre')";

    if($conn->query($sql)){
        $id = mysqli_insert_id($conn);
        $sql = "INSERT INTO usuarios (correo, pass, persona) VALUES ('$correo','$contrasena', $id)";

        if($conn->query($sql)){
            echo "Registrado";
            echo '<a href="panel.html">Volver atras</a>';
        }else{
            echo "ERROR";
        }
    }

    $conn->close();
}
?>
