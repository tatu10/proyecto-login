<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Recupera el ID del usuario a eliminar
    $id = $_GET["id"];
    
    // Realiza la inserción en la base de datos
    $conn = new mysqli("localhost", "root", "", "login");

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta de autenticación
    $sql = "DELETE FROM personas WHERE id_persona = $id";

    if($conn->query($sql)){
        $sql = "DELETE FROM usuarios WHERE persona = $id";

        if($conn->query($sql)){
            header("Location: panel.php");
        }else{
            echo "ERROR";
            echo '<a href="panel.php">Volver</a>';
        }
    }

    $conn->close();
}
?>
