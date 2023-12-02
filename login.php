<?php
include 'conexion.php';
include 'cargos.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $cargoSeleccionado = $_POST['cargo']; // Nuevo campo de selección para el cargo

    // Verificar las credenciales en la tabla 'registro'
    $sql = "SELECT * FROM registro WHERE mail = '$mail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];
        $cargoReal = $row['cargo'];

        // Verificar la contraseña utilizando password_verify
        if (password_verify($password, $hashedPassword)) {
            // Validar el cargo
            if (validarCargo($cargoReal)) {
                // Verificar si el cargo seleccionado coincide con el cargo real
                if ($cargoSeleccionado == $cargoReal) {
                    // Redirigir según el cargo
                    if ($cargoReal == 'estudiante') {
                        header("Location: ./estudiante.php");
                        exit();
                    } elseif ($cargoReal == 'profesor') {
                        header("Location: ./profesor.php");
                        exit();
                    } elseif ($cargoReal == 'administrador') {
                        header("Location: ./administrador.php");
                        exit();
                    } else {
                        // Cargo no válido, manejar el error
                        echo "Error: Cargo no válido.";
                    }
                } else {
                    // El cargo seleccionado no coincide con el cargo real, acceso denegado
                    echo "Error: Acceso denegado. Cargo incorrecto.";
                }
            } else {
                // Cargo no válido, manejar el error
                echo "Error: Cargo no válido.";
            }
        } else {
            // Contraseña incorrecta, manejar el error
            echo "Error: Contraseña incorrecta.";
        }
    } else {
        // Usuario no encontrado, manejar el error
        echo "Error: Usuario no encontrado.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css_roles.css">
    <title>Iniciar Sesión</title>
</head>
<body>
<h1>Iniciar Sesión</h1>
<form action="login.php" method="post">
    <label for="mail">Correo Electrónico:</label>
    <input type="email" name="mail" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>

    <!-- Nuevo campo de selección para el cargo -->
    <label for="cargo">Cargo:</label>
    <select name="cargo" required>
        <?php foreach (obtenerCargos() as $cargoOption) : ?>
            <option value="<?php echo $cargoOption; ?>"><?php echo $cargoOption; ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Iniciar Sesión</button>
</form>

<a href="./registro.php">Registrarse ahora</a>
</body>
</html>
