<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Usuarios</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <h1>Formulario de Usuarios</h1>

    <!-- Formulario para crear o modificar un usuario -->
    <form action="procesar_usuario.php" method="POST">
        <input type="hidden" name="id" value="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value=""><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value=""><br>
        <br>
        <input type="submit" value="Guardar">
    </form>

    <!-- Formulario para eliminar un usuario -->
    <form action="procesar_usuario.php" method="POST">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="accion" value="eliminar">
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>