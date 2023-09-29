<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $id_usuario = $_POST["id_usuario"];
    $correo_usuario = $_POST["correo_usuario_actualizado"];
    $contraseña_usuario = $_POST["contraseña_usuario_actualizado"];
    
    // Actualiza el registro en la base de datos
    $conn = new mysqli("localhost", "tu_correo", "tu_contraseña", "tu_base_de_datos");

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    $sql = "UPDATE usuarios SET correo_usuario = '$correo_usuario' WHERE id = $id_usuario";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de usuario actualizado con éxito.";
    } else {
        echo "Error al actualizar el registro de usuario: " . $conn->error;
    }

    $conn->close();
}
?>
