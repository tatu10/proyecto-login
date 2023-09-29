<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre_completo"]; 
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
    $sql = "INSERT INTO personas (nombre_completo) VALUES ('$nombre')";

    if($conn->query($sql)){
        $id = mysqli_insert_id($conn);
        $sql = "INSERT INTO usuarios (correo, pass, persona) VALUES ('$correo','$contrasena', $id)";

        if($conn->query($sql)){
            echo "Registrado";
            echo '<a href="login.html">Iniciar sesion</a>';
        }else{
            echo "ERROR";
        }
    }

    $conn->close();
}
?>
