<?php
include 'conexion.php';
include 'cargos.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $cargo = $_POST['cargo'];

    // Hashear la contraseña antes de insertarla en la base de datos
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertar datos en la tabla 'registro'
    $sql = "INSERT INTO registro (nombre, mail, password, cargo) VALUES ('$nombre', '$mail', '$hashedPassword', '$cargo')";
    $conn->query($sql);

    // Redirigir a index.php después de un registro exitoso
    header("Location: index.php");
}

// Obtener los cargos para el combobox desde la función en cargos.php
$cargos = obtenerCargos();

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_roles.css">
    <title>Registro</title>
</head>
<body>
<h1>Registrarse</h1>
<form action="./registro.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <label for="mail">Correo Electrónico:</label>
    <input type="email" name="mail" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>

    <label for="cargo">Cargo:</label>
    <select name="cargo" required>
        <?php foreach ($cargos as $cargoOption) : ?>
            <option value="<?php echo $cargoOption; ?>"><?php echo $cargoOption; ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Registrarse</button>
</form>

<a href="./index.php">Regresar</a>
</body>
</html>
