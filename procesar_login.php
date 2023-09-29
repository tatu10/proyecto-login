<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    
    // Aquí puedes realizar la lógica de autenticación, como verificar los datos en una base de datos.
    
    // Ejemplo: Verificar los datos en una base de datos MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    // Crear una conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta de autenticación
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND pass = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Inicio de sesión exitoso. ¡Bienvenido, $correo!";
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }

    $conn->close();
}
?>
