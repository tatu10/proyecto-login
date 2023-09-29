<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Usuarios</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre completo</th>
                <th>Correo</th>
                <th col="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
                    // Realiza la inserción en la base de datos
                    $conn = new mysqli("localhost", "root", "", "login");

                    if ($conn->connect_error) {
                        die("La conexión a la base de datos falló: " . $conn->connect_error);
                    }

                    $sql = "SELECT id_persona, id_usuario, nombre_completo, correo, persona FROM usuarios INNER JOIN personas WHERE id_persona = persona"; 
                    
                    if($result = $conn->query($sql)):
                        while($row = $result->fetch_assoc()):
                ?>
            <tr>
                <td><?php echo $row["id_persona"] ?></td>
                <td><?php echo $row["nombre_completo"] ?></td>
                <td><?php echo $row["correo"] ?></td>
                <td><a href="modificar_usuario.php?id=<?php echo $row["id_persona"] ?>">Editar</a></td>
                <td><a href="eliminar_usuario.php?id=<?php echo $row["id_persona"] ?>">Eliminar</a></td>
            </tr>
            <?php
                endwhile;
            endif;
            ?>
        </tbody>
    </table>
</body>
</html>